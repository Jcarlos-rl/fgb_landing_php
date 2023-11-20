<?php
    class ResourcesFunctions{
        public function __construct(){}

        public function saveFile($file, $filePath){

            $fileName = $file['name'];
            $type = pathinfo($file['name'], PATHINFO_EXTENSION);

            if(!is_dir($filePath)){
                mkdir($filePath, 0777, true);
            }

            $uploadedFilename = $filePath .'/'. $fileName;
            $fileInfoArr = [
                'name' => $fileName,
                'type' => $type,
                'size' => $file['size'],
                'path' => $uploadedFilename
            ];
            if(move_uploaded_file($file['tmp_name'], $uploadedFilename)){
                $response = [
                    'status' => true,
                    'data' => $fileInfoArr
                ];
            }else{
                $response = [
                    'status' => false,
                    'errorMessage' => 'Lo sentimos, no se pudo guardar el archivo.'
                ];
            }
    
            return $response;
        }

        public function createSlug($text){
            $slug = trim($text);
            $slug = $this->removeAccents($slug);
            $slug = preg_replace('/[^a-zA-Z0-9\- ]/', '', $slug);
            $slug = preg_replace('/[ ]/', '_', $slug);
            $slug = strtolower($slug);
            $slug = preg_replace('/-+/', '-', $slug);
            $slug = trim($slug, '-');
            return $slug;
        }

        public function validate($campo, $configuracion){

            // Verificar si el campo es requerido (Si es aplicable)
            if ($configuracion['requerido'] && (empty($campo) || (is_array($campo) && empty($campo['tmp_name'])))) {
                $response = [
                    'status' => false,
                    'errorMessage' => "El campo {$configuracion['campo']} es requerido."
                ];
                return $response;
            }

            // Verificar longitud min y max (Si es aplicable)
            if (is_string($campo)) {
                $longitud = strlen($campo);
                if (isset($configuracion['longitud_min']) && $longitud < $configuracion['longitud_min']) {
                    $response = [
                        'status' => false,
                        'errorMessage' => "El campo {$configuracion['campo']} debe tener al menos {$configuracion['longitud_min']} caracteres."
                    ];
                    return $response;
                }
        
                if (isset($configuracion['longitud_max']) && $longitud > $configuracion['longitud_max']) {
                    $response = [
                        'status' => false,
                        'errorMessage' => "El campo {$configuracion['campo']} no puede tener más de {$configuracion['longitud_max']} caracteres."
                    ];
                    return $response;
                }
            }

            if(isset($configuracion['tipo'])){
                // Verificar el tipo de campo
                switch($configuracion['tipo']){
                    case 'entero':
                        if (!is_numeric($campo) || $campo != (int)$campo) {
                            $response = [
                                'status' => false,
                                'errorMessage' => "El campo {$configuracion['campo']} debe ser un número entero."
                            ];
                            return $response;
                        }
                        break;
            
                    case 'flotante':
                        if (!is_numeric($campo)) {
                            $response = [
                                'status' => false,
                                'errorMessage' => "El campo {$configuracion['campo']} debe ser un número flotante."
                            ];
                            return $response;
                        }
                        break;
            
                    case 'cadena':
                        if (!is_string($campo)) {
                            $response = [
                                'status' => false,
                                'errorMessage' => "El campo {$configuracion['campo']} debe ser una cadena de texto."
                            ];
                            return $response;
                        }
                        break;
            
                    case 'archivo':
                        if (!isset($campo['tmp_name']) || !is_uploaded_file($campo['tmp_name'])) {
                            $response = [
                                'status' => false,
                                'errorMessage' => "No se ha proporcionado un archivo válido para el campo {$configuracion['campo']}."
                            ];
                            return $response;
                        }
                        break;
    
                    case 'email':
                        if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $campo)){
                            $response = [
                                'status' => false,
                                'errorMessage' => "El campo {$configuracion['campo']} debe ser valido."
                            ];
                            return $response;
                        }
                        break;
                }
            }

            $response = ['status' => true];

            return $response;
        }

        protected function removeAccents($text){
            $replace = array(
                'á' => 'a',
                'é' => 'e',
                'í' => 'i',
                'ó' => 'o',
                'ú' => 'u',
                'ñ' => 'n',
                'ü' => 'u',
                'ç' => 'c',
                'Á' => 'A',
                'É' => 'E',
                'Í' => 'I',
                'Ó' => 'O',
                'Ú' => 'U',
                'Ñ' => 'N',
                'Ü' => 'U',
                'Ç' => 'C'
            );
            $str = strtr($text, $replace);
            return $str;
        }
    }
?>