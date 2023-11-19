<?php
    class Index extends Controller{

        //public $Index;

        public function __construct(){
            //$this->Index = $this->model('Indexm');
        }
        
        public function index(){
            $data = [
            ];

            $this->view('templates/header', $data);
            $this->view('index/index', $data);
            $this->view('templates/footer', $data);
        }
    }
?>