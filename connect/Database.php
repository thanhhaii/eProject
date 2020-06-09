<?php
    include_once "../validation/ErrorPHP.php";
    class Database
    {
        private $host ="mysql:host = localhost; dbname = eProject; charset = utf8";
        private $username = "root";
        private $password = "";
        private $pdo;
        private $stmt;

        public function __construct()
        {
            try {
                $this->pdo = new PDO($this->host, $this->username, $this->password);
            }catch (PDOException $e){
                ErrorPHP::showMessage($e->getMessage());
            }
        }

        public function queryDataParam($query, $param) {
            try {
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute($param);
                return $this->stmt;
            }catch (Exception $e){
                   ErrorPHP::showMessage($e->getMessage());
            }
        }

        public function selectData($query)
        {
            try {
                $this->stmt = $this->pdo->prepare($query);
                $this->stmt->execute();
                return $this->stmt;
            }catch (Exception $e){
                ErrorPHP::showMessage($e->getMessage());
            }
        }
    }