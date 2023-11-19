<?php
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
    }
?>