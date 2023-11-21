<?php
    class Contacto extends Controller{

        public function __construct(){
        }
        
        public function index(){
            $data = [
                'title' => 'Contacto',
                'page' => 'contac',
                'extra_js' => '
                    <script src="'. base_url .'public/js/contac.js"></script>
                '
            ];

            $this->view('templates/header', $data);
            $this->view('contac', $data);
            $this->view('templates/footer', $data);
        }
    }
?>