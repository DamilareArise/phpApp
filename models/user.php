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
            try{
                $query = "INSERT INTO user_table(fullname, email, `password`) VALUES(?, ?, ?)";
                $stmt = $this->db->prepare($query);
                $stmt->bind_param('sss', $fullname, $email, $hash_pw);
                $stmt->execute();
                $stmt->close();
                return [
                    'status' => true,
                    'message' => 'Signup successfully'
                ];
            }
            catch (Exception $e){
                echo 'Caught exception: ',  $e->getMessage();
                return [
                    'status' => false,
                    'message' => $e->getMessage()
                ];
            }
        }

        public function login($email, $password){
            $query = "SELECT * FROM user_table WHERE email = '$email'";
            $result = $this->db->query($query);
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                $hash_pw = $data['password'];
                if(password_verify($password, $hash_pw)){
                    return [
                        'status' => true,
                        'message' => 'Login successfully',
                        'data' => $data
                    ];
                }else{
                    return [
                        'status' => false,
                        'message' => 'Invalid email or password'
                    ];
                }
            }else{
                return [
                    'status' => false,
                    'message' => 'Invalid email or password'
                ];
            }

        }
    }