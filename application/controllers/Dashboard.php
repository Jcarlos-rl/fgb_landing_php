<?php

    require_once BASE_PATH . 'application/models/User.php';
    require_once BASE_PATH . 'application/libraries/Resources.php';

    class Dashboard extends Controller{

        public function __construct(){
            $this->User = new User(CRYPTO_KEY);
            $this->Resources = new ResourcesFunctions();
        }
        
        public function index(){
            
            $newsletterCollection = new Database('newsletter');
            $newletters = $newsletterCollection->find([]);
            $contacCollection = new Database('contac');
            $contacs = $contacCollection->find([]);

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
                'newsletters' => $newletters['data'],
                'contacs' => $contacs['data'],
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