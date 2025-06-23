<?php
    class DBconfig{
        private $host = 'localhost';
        private $user = 'root';
        private $password = 'password';
        private $database ='jan_blog_db';
        protected $conn;

        function __construct(){            
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($this->conn->connect_error){
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
        function getConn(){
            return $this->conn;
        }
    }


