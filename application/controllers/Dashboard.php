<?php

    require_once BASE_PATH . 'application/models/User.php';
    require_once BASE_PATH . 'application/libraries/Resources.php';

    class Dashboard extends Controller{

        public function __construct(){
            $this->User = new User(CRYPTO_KEY);
            $this->Resources = new ResourcesFunctions();
        }
        
        public function index(){
            
            $fileNewsletter = BASE_PATH . 'public/js/Data/newsletter.json';
            $fileContac = BASE_PATH . 'public/js/Data/contac.json';

            $contentNewsletter = file_get_contents($fileNewsletter);
            $newletters = json_decode($contentNewsletter);

            $contentContac = file_get_contents($fileContac);
            $contacs = json_decode($contentContac);

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

            $this->User->accessControl();

            $data = [
                'title' => 'Dashboard',
                'newsletters' => $newletters,
                'contacs' => $contacs,
                'files' => $brands
            ];

            $this->view('templates/header', $data);
            $this->view('dashboard', $data);
            $this->view('templates/footer', $data);
        }

        public function create(){

            $path = BASE_PATH . 'public/media/catalogues/' . $_REQUEST['brand'];

            $save = $this->Resources->saveFile($_FILES['file'], $path);

            echo json_encode($save);
        }
    }
?>