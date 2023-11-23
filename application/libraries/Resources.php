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
    }
?>