<?php
    class Database{
        public $host = "localhost";
        public $user = "root";
        public $db = "crud";
        public $pwd = "";
        public $DBHandler;

        public function connect(){
            $dsn = "mysql:host=".$this->host.";dbname=".$this->db;
            try{
                $DBHandler = new PDO($dsn,$this->user,$this->pwd);
                $DBHandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $DBHandler->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                return $DBHandler;
            }catch(PDOException $e){
                echo "Database connection failed : ".$e->getMessage();
            }
        }
    }
?>