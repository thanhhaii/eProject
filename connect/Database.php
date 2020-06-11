<?php
     require_once "../validation/ErrorPHP.php";
    class Database
    {
        private $host ="mysql:host=localhost; dbname=eproject; charset=utf8";
        private $username = "eProject";
        private $password = "aptech";
        private $pdo;
        private $stmt;

        public function __construct()
        {
            try {
                $this->pdo = new PDO($this->host, $this->username, $this->password);
            }catch (Exception $e){
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