<?php
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    
    class JSONWT{
        private $id;
        private $email;
        private $role;

        public function __construct($id, $email, $permissions = []){
            $this->id = $id;
            $this->email = $email;
            $this->permissions = $permissions;
        }

        public function generateToken($secretKey, $expirationTime, $encrypt){
            $payload = [
                'id' => $this->id,
                'email' => $this->email,
                'permissions' => $this->permissions,
                'exp' => time() + $expirationTime
            ];

            return JWT::encode($payload, $secretKey, $encrypt);
        }

        public static function validateToken($token, $secretKey, $encrypt){
            try {
                $decoded = JWT::decode($token, new Key($secretKey, $encrypt));
                return $decoded;
            } catch (Exception $e) {
                return false;
            }
        }
    }
?>