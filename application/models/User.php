<?php

    require_once BASE_PATH . 'application/models/Database.php';
    require_once BASE_PATH . 'application/models/JWT.php';

    class User{

        private $collection = 'users';
        private $secretKey;
        private $expirationTime;
        private $encrypt = 'HS256';

        public function __construct($secretKey, $expirationTime = 3600){
            $this->secretKey = $secretKey;
            $this->expirationTime = $expirationTime;
            $this->database = new Database($this->collection);
        }

        public function login($email, $password){
            $query = [
                'email' => $email
            ];
            $user = $this->database->findOne($query);

            //Ocurrio un error en la DB
            if(!$user['status']){
                $response = [
                    'status' => false,
                    'message' => 'Lo sentimos, ocurrio un problema.'
                ];
                
                return $response;
            }

            //No se encontro registro
            if(!$user['data']){
                $response = [
                    'status' => false,
                    'message' => 'Lo sentimos, usuario o contraseña incorrectos.'
                ];
                
                return $response;
            }

            //Validar contraseñas
            if(!password_verify($password, $user['data']['password'])){
                $response = [
                    'status' => false,
                    'message' => 'Lo sentimos, usuario o contraseña incorrectos.'
                ];
                
                return $response;
            }

            $userObj = new JSONWT(
                $user['data']['_id']->__toString(), 
                $user['data']['email'],
            );
            $token = $userObj->generateToken($this->secretKey, $this->expirationTime, $this->encrypt);
            
            $response = [
                'status' => true,
                'email' => $user['data']['email'],
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