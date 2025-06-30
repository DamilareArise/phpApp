<?php
    include 'config.php';

    class PostConfig extends DBconfig{
        private $db;

        function __construct(){
            parent::__construct();
            $this->db = $this->getConn();
        }

        public function allPost(){
            $sql = "SELECT * FROM blog_table";
            $result = $this->db->query($sql);
            $posts = $result->fetch_all(MYSQLI_ASSOC);
            return $posts;
        }

        public function createCategory($name, $description, $user_id){
            try{

                $sql = "INSERT INTO category_table(`name`, `description`, created_by) VALUES(?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param('ssi', $name, $description, $user_id);
                $stmt->execute();
                $stmt->close();
                return [
                    "status"=>true,
                    "message"=>"Category created successfully"
                ];
            }
            catch(Exception $e){
                return [
                    "status"=>false,
                    "message"=> $e->getMessage()
                ];
            }
        }

        public function fetchCategory(){
            $sql = 'SELECT c.*, u.fullname FROM `category_table` as c LEFT JOIN user_table as u ON c.created_by = u.id';
            $result = $this->db->query($sql);
            $categories=$result->fetch_all(MYSQLI_ASSOC);
            return $categories;
        }

        public function addPost($title, $content, $image_path,  $category_id, $user_id){
            try{

                $sql = "INSERT INTO blog_table(title, content, image_path, author, category) VALUES(?, ?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param('sssii', $title, $content, $image_path, $user_id, $category_id);
                $stmt->execute();
                $stmt->close();
                return [
                    "status"=>true,
                    "message"=>"Post added succesfully"
                ];
            }
            catch(Exception $e){
                return [
                    "status"=>false,
                    "message"=>$e->getMessage()
                ];
            }   
        }
    }

?>
