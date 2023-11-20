<?php

    require_once BASE_PATH . 'application/models/User.php';

    class Dashboard extends Controller{

        public function __construct(){
            $this->User = new User(CRYPTO_KEY);
        }
        
        public function index(){

            $this->User->accessControl();

            $data = [
                'title' => 'Inicio'
            ];

            $this->view('templates/header', $data);
            $this->view('dashboard', $data);
            $this->view('templates/footer', $data);
        }
    }
?>