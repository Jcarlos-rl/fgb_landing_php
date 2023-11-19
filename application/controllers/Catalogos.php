<?php
    class Catalogos extends Controller{

        public function __construct(){
        }
        
        public function index(){
            $data = [
                'title' => 'Catálogos',
                'page' => 'catalogue'
            ];

            $this->view('templates/header', $data);
            $this->view('catalogue', $data);
            $this->view('templates/footer', $data);
        }
    }
?>