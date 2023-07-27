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
            global $product_table;
            $query = "SELECT * FROM ".$this->table." WHERE name LIKE '%".$this->name."%'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;

        }

    }//END class

?>