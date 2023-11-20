<?php

use MongoDB\BSON\ObjectId;

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $databaseName = DB_NAME;

    private $db;
    private $database;
    private $collection;

    public function __construct($collection, $databaseName = NULL){
        try{
            $this->db = new MongoDB\Client(
                'mongodb+srv://'.$this->user.':'.$this->password.'@'.$this->host.'/'.$this->databaseName.'?retryWrites=true&w=majority'
            );

            $databaseName = ($databaseName == NULL) ? $this->databaseName : $databaseName;
            $this->database = $this->db->selectDatabase($databaseName);
            $this->collection = $collection;
        }catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e){
            echo "No se pudo conectar a la DB ", $e->getMessage();
        } catch (MongoDB\Driver\Exception\Exception $e){
            echo "Exception ", $e->getMessage();
        }
    }

    public function getCollection($name){
        return $this->database->selectCollection($name);
    }

    public function errorGeneral($err){
        error_log("Error DBSello: " . $err);

        return [
            'status' => false,
            'errorMessage' => 'Lo sentimos, ocurrio un error en la BD'
        ];
    }

    public function objectId($id){
        return new ObjectId($id);
    }

    public function afterUpdate(){
        return ['returnDocument' => MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER];
    }

    public function createdAt($data){
        $data['createdAt'] = date('Y-m-d H:i:s');
        return $data;
    }

    public function updatedAt($data){
        $data['updatedAt'] = date('Y-m-d H:i:s');
        return $data;
    }

    public function findOne($query){
        $response['status'] = true;
        try{
            $response['data'] = $this->getCollection($this->collection)->findOne($query);
        }catch(Exception $e){
            $response = $this->errorGeneral($e->getMessage());
        }
        return $response;
    }

    public function find($query, $index = 0, $quantity = 25, $order = []){
        $response['status'] = true;
        try{
            $response['data'] = $this->getCollection($this->collection)->find($query, ['skip' => $index, 'limit' => $quantity, 'sort' => $order])->toArray();
        }catch(Exception $e){
            $response = $this->errorGeneral($e->getMessage());
        }
        return $response;
    }

    public function insertOne($data){
        $response['status'] = true;
        try{
            $data = $this->createdAt($data);
            $response['data'] = $this->getCollection($this->collection)->insertOne($data);
        }catch(Exception $e){
            $response = $this->errorGeneral($e->getMessage());
        }

        return $response;
    }

    public function aggregate($query){
        $response['status'] = true;
        try{
            $response['data'] = $this->getCollection($this->collection)->aggregate($query)->toArray();
        }catch(Exception $e){
            $response = $this->errorGeneral($e->getMessage());
        }
        return $response;
    }

    public function findOneAndUpdate($filter, $data){
        $response['status'] = true;
        try{
            $data = $this->updatedAt($data);
            $prevDoc = $this->findOne($filter);
            $query = ['$set' => $data];
            $response['data'] = $this->getCollection($this->collection)->findOneAndUpdate($filter, $query, $this->afterUpdate());
            $this->log($prevDoc, 'UPDATE');
        }catch(Exception $e){
            $response = $this->db->errorGeneral($e->getMessage());
        }

        return $response;
    }

    protected function log($prevDoc, $type){
        $data['collection'] = $this->collection;
        $data['event'] = $type;
        $data['idDoc'] = $prevDoc['data']['_id']->__toString();
        $data['prevDoc'] = $prevDoc['data'];

        $data = $this->createdAt($data);

        $this->getCollection('log')->insertOne($data);
    }
}