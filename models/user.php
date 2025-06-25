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

        public function change_password($old_password, $new_password, $id){
            $query = "SELECT * FROM user_table WHERE id = '$id'";
            $result = $this->db->query($query);
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                if(password_verify($old_password, $data['password'])){
                    try{

                        $hash_pw = password_hash($new_password, PASSWORD_DEFAULT);
                        $query2 = "UPDATE user_table SET password = ? WHERE id = ?";
                        $stmt = $this->db->prepare($query2);
                        $stmt->bind_param('si', $hash_pw, $id);
                        $stmt->execute();
                        $stmt->close();
                        return [
                            'status' => true,
                            'message' => "Password updated successfully"
                        ];

                    }
                    catch (Exception $e) {
                        return [
                            'status' => false,
                            'message' => $e->getMessage()
                        ];
                    }


                }else{
                    return [
                        'status' => false,
                        'message' => 'Old password is incorrect'
                    ];
                }
   
            }else{
                return [
                    'status' => false,
                    'message' => 'User not found'
                ];
            }
        }
    }