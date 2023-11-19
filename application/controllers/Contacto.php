<?php
    class Contacto extends Controller{

        public function __construct(){
        }
        
        public function index(){
            $data = [
                'title' => 'Contacto',
                'page' => 'contac'
            ];

            $this->view('templates/header', $data);
            $this->view('contac', $data);
            $this->view('templates/footer', $data);
        }
    }
?>