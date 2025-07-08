<?php
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable("../");
    $dotenv->load();
    
    class DBconfig{
        private $host;
        private $user;
        private $password;
        private $database;
        protected $conn;

        function __construct(){   
            $this->host  = $_ENV['HOST'];
            $this->user = $_ENV['USER'];
            $this->password = $_ENV['PASSWORD'];
            $this->database = $_ENV['DATABASE'];

            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($this->conn->connect_error){
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
        function getConn(){
            return $this->conn;
        }
    }


