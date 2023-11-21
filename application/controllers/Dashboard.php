<?php

    BASE_PATH . 'application/models/Database.php';

    require_once BASE_PATH . 'application/models/User.php';

    class Dashboard extends Controller{

        public function __construct(){
            $this->User = new User(CRYPTO_KEY);
        }
        
        public function index(){
            
            $newsletterCollection = new Database('newsletter');
            $newletters = $newsletterCollection->find([]);
            $contacCollection = new Database('contac');
            $contacs = $contacCollection->find([]);

            //$this->User->accessControl();

            $data = [
                'title' => 'Dashboard',
                'newsletters' => $newletters['data'],
                'contacs' => $contacs['data']
            ];

            $this->view('templates/header', $data);
            $this->view('dashboard', $data);
            $this->view('templates/footer', $data);
        }
    }
?>