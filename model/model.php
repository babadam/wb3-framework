<?php

class Model
{
    public $pdo;
    public $table;
    public $attributes = [];
    public $database = 'blog';
    public $user = 'root';
    public $password = '';
    public $is_new = true;

    public function __construct($table)
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname='.$this->database, $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
        $this->table = $table;
    }

    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }
    public function __get($key)
    {
        return $this->attributes[$key];
    }
    public function save()
    {
        if($this->is_new){
            $query = 'INSERT INTO '
            . $this->table
            . ' ('
            . implode(', ', array_keys($this->attributes))
            . ') VALUES (:'
            . implode(', :', array_keys($this->attributes))
            . ')';
            $this->execute($query, $this->attributes);
            $this->id = $this->pdo->lastInsertId;
        } else{
            // $query = 'UPDATE contact SET prenom = :prenom, nom = :nom, phone = :phone';
            $query = 'UPDATE ' . $this->table . ' SET ';
            foreach($this->attributes as $key => $attributes){
                $query .= $key . ' = :' .$key . ', ';
            }
            $query = substr($query, 0, strlen($query) -2);
            dd($query);
            $query .= ' WHERE id = :id';

            $this->execute($query, $this->attributes);
        }
    }
    public function execute($query, $params = [], $query_type ='')
    {
        $statement = $this->pdo->prepare($query);
        foreach($params as $key => &$param){
            if(is_null($param)){
                $type = PDO::PARAM_NULL;
            } elseif(is_bool($param)){
                $type = PDO::PARAM_BOOL;
            }  elseif(is_int($param)){
                $type = PDO::PARAM_INT;
            } else{
                $type = PDO::PARAM_STR;
            }
            $statement->bindParam($key, $param, $type);
        }
        $q = $statement->execute();
        if($query_type == 'all'){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } elseif($query_type == 'select'){
            $this->attributes = $statement->fetch(PDO::FETCH_ASSOC);
            $this->is_new = false;
        }
        return $q;
    }

    public function all()
    {
        $query = 'SELECT * FROM ' . $this->table;
        return $this->execute($query, [], 'all');
    }

    public function find($id)
    {
        $this->execute('SELECT * FROM ' . $this->table . ' WHERE id = :id', ['id' => $id], 'select');
    }

    public function delete($id)
    {
        $this->execute('DELETE FROM ' . $this->table . ' WHERE id = :id', ['id' => $id]);
    }
}
// $model = new Model('contact');
// $model->execute('INSERT INTO contacts (prenom, nom, phone) VALUES (:prenom, :nom, :phone)', ['prenom' => 'Adam',
//  'nom' => 'Ahamada',
//  'phone' => '0123456789']);
