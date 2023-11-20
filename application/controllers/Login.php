<?php

    require_once BASE_PATH . 'application/libraries/Resources.php';
    require_once BASE_PATH . 'application/models/User.php';

    class Login extends Controller{

        public function __construct(){
            $this->Resources = new ResourcesFunctions();
            $this->User = new User(CRYPTO_KEY);
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

        public function login(){

            $req_email = (isset($_REQUEST['email'])) ? $_REQUEST['email'] : '';
            $req_password = (isset($_REQUEST['password'])) ? $_REQUEST['password'] : '';

            // Validaciones
            $configuracion = [
                'campo' => 'correo electrónico',
                'tipo' => 'email',
                'requerido' => true
            ];
            $email = $this->Resources->validate($req_email, $configuracion);
            if(!$email['status']){
                http_response_code(400);
                echo json_encode($email);
                return;
            }

            $configuracion = [
                'campo' => 'contraseña',
                'requerido' => true,
                'longitud_min' => 5
            ];
            $pass = $this->Resources->validate($req_password, $configuracion);
            if(!$pass['status']){
                http_response_code(400);
                echo json_encode($pass);
                return;
            }

            $user = $this->User->Login($req_email, $req_password);
            
            if($user['status']){
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['fgb_token'] = $user['token'];
            }

            echo json_encode($user);
        }

        public function logout(){
            unset($_SESSION['fgb_token']);
            session_destroy();

            header('Location: ' . base_url . 'login');
        }
    }
?>