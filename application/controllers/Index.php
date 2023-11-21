<?php

    require_once BASE_PATH . 'application/models/Database.php';

    class Index extends Controller{

        public function __construct(){
            $this->database = new Database('newsletter');
        }
        
        public function index(){
            $data = [
                'title' => 'Inicio',
                'page' => 'index'
            ];

            $this->view('templates/header', $data);
            $this->view('index', $data);
            $this->view('templates/footer', $data);
        }

        public function newsletter(){
            $insert = $this->database->insertOne(['email' => $_REQUEST['email']]);
            echo json_encode($insert);
        }
    }
?>