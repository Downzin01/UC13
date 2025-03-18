<?php
    class Database {
        private static $instance = null;
        private $pdo;

        private function __construct() {
            $dsn = 'mysql:dbname=db_login;host=127.0.0.1';
            $user = 'root';
            $password = '';
            $this->pdo = new PDO($dsn, $user, $password);
            
            // Ativar o modo de erros para exceções
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public static function getInstance() {
            if (self::$instance === null) {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        public function getConnection() {
            return $this->pdo;
        }
    }
?>
