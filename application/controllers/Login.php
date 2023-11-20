<?php
    class Login extends Controller{

        public function __construct(){
        }
        
        public function index(){
            $data = [
                'title' => 'Login',
                'extra_js' => '
                    <script src="'. base_url .'public/js/login.js"></script>
                '
            ];

            $this->view('templates/header', $data);
            $this->view('login', $data);
            $this->view('templates/footer', $data);
        }
    }
?>