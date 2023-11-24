<?php

    require_once BASE_PATH . 'application/models/Database.php';
    require_once BASE_PATH . 'application/models/JWT.php';

    class User{

        private $collection = 'users';
        private $secretKey;
        private $expirationTime;
        private $encrypt = 'HS256';
        private $email = "ventas@fgbmexico.com";
        private $password = '$2y$10$uF30divXM.E.3vZ4Sre8auup59/7.dQnqVqb5zNsDlsL17c4BH0xS';

        public function __construct($secretKey, $expirationTime = 3600){
            $this->secretKey = $secretKey;
            $this->expirationTime = $expirationTime;
            $this->database = new Database($this->collection);
        }

        public function login($email, $password){
            
            //No se encontro registro
            if($email != $this->email){
                $response = [
                    'status' => false,
                    'message' => 'Lo sentimos, usuario o contraseña incorrectos.'
                ];
                
                return $response;
            }

            //Validar contraseñas
            if(!password_verify($password, $this->password)){
                $response = [
                    'status' => false,
                    'message' => 'Lo sentimos, usuario o contraseña incorrectos.'
                ];
                
                return $response;
            }

            $userObj = new JSONWT(
                uniqid(), 
                $this->email,
            );
            $token = $userObj->generateToken($this->secretKey, $this->expirationTime, $this->encrypt);
            
            $response = [
                'status' => true,
                'email' => $this->email,
                'token' => $token
            ];

            return $response;
        }

        public function getCurrentUser($token) {
            $decodedToken = JSONWT::validateToken($token, $this->secretKey, $this->encrypt);
            $currentUser = ($decodedToken) ? $decodedToken : null;

            return $currentUser;
        }

        public function accessControl(){
            if(!isset($_SESSION['fgb_token'])){
                header('Location: ' . base_url . 'login');
            }

            if(!$this->getCurrentUser($_SESSION['fgb_token'])){

                header('Location: ' . base_url . 'login/logout');
            }
        }
    }
?>