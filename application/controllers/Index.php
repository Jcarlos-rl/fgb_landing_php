<?php

    require_once BASE_PATH . 'application/models/Database.php';

    class Index extends Controller{

        public function __construct(){
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
            $database = new Database('newsletter');
            $insert = $database->insertOne(['email' => $_REQUEST['email']]);
            echo json_encode($insert);
        }

        public function contac(){
            $database = new Database('contac');

            $data = [
                'name' => $_REQUEST['nombre'],
                'email' => $_REQUEST['email'],
                'phone' => $_REQUEST['telefono'],
                'message' => $_REQUEST['mensaje']
            ];

            $insert = $database->insertOne($data);
            echo json_encode($insert);
        }
    }
?>