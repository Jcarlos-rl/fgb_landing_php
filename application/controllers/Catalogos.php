<?php
    class Catalogos extends Controller{

        public function __construct(){
        }
        
        public function index(){
            
            $dir = BASE_PATH . 'public/media/catalogues';
            $scanDir = scandir($dir);

            $brands = [];
            foreach ($scanDir as $key => $brand) {
                if(!in_array($brand, array('.', '..', '.DS_Store'))){
                    $pdfs = scandir($dir . '/' . $brand);
                    foreach ($pdfs as $pdf) {
                        if(!in_array($pdf, array('.','..', '.DS_Store'))){
                            $brands[$brand][] = $pdf;
                        }
                    }
                }
            }

            $data = [
                'title' => 'Catálogos',
                'page' => 'catalogue',
                'brands' => $brands,
                'extra_js' => '
                    <script>const cataloguesArr = ' . json_encode($brands) . ';</script>
                    <script src="'. base_url .'public/js/catalogue.js"></script>
                '
            ];

            $this->view('templates/header', $data);
            $this->view('catalogue', $data);
            $this->view('templates/footer', $data);
        }
    }
?>