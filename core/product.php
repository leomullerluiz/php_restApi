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

        public function create(){
            $query = "INSERT INTO ".$this->table." SET name = :name";
            $stmt = $this->conn->prepare($query);
            $this->name = htmlspecialchars(strip_tags($this->name));
            $stmt->bindParam(':name', $this->name);
            if($stmt->execute()){
                return true;
            }
            return $stmt->error;
        }

        public function read(){
            $query = 'SELECT * FROM '.$this->table;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function read_single(){
            $query = "SELECT * FROM ".$this->table." WHERE id = ".$this->id." LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($row){
                $this->id = $row['id'];
                $this->name = $row['name'];
                return $stmt;
            }
            return false;
        }
        
        public function search(){
            $query = "SELECT * FROM ".$this->table." WHERE name LIKE '%".$this->name."%'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;

        }

    }//END class

?>