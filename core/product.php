<?php

    class Product{
        private $conn;
        private $table = 'products';
        // private $table = 'products_empty';

        public $id;
        public $name;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = 'SELECT * FROM '.$this->table;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function read_single(){
            $query = 'SELECT * FROM '.$this->table.' WHERE id = ? LIMIT 1';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($row){
                $this->id = $row['id'];
                $this->name = $row['name'];
                return $stmt;
            }
            return false;
        }

    }//END class

?>