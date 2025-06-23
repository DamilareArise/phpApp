<?php
    include 'config.php';

    class User extends DBconfig{
        private $db;

        function __construct(){
            parent::__construct();
            $this->db = $this->getConn();
        }

        public function signup($fullname, $email, $password){
            $hash_pw = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO user_table(fullname, email, `password`) VALUES(?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sss', $fullname, $email, $hash_pw);
            $stmt->execute();
            $stmt-> close();
            return true;
            
        }

    }

    $us = new User;
