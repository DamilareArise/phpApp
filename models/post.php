<?php
    include 'config.php';

    class PostConfig extends DBconfig{
        private $db;

        function __construct(){
            parent::__construct();
            $this->db = $this->getConn();
        }

        public function allPost(){
            $sql = "SELECT b.*, u.fullname, c.name as category_name FROM `blog_table` as b LEFT JOIN user_table as u ON u.id = b.author LEFT JOIN category_table as c ON c.id = b.category;";
            $result = $this->db->query($sql);
            $posts = $result->fetch_all(MYSQLI_ASSOC);
            return $posts;
        }

        public function PostByLimit($limit=null){
            if ($limit && $limit > 0){
                $sql = "SELECT * FROM blog_table WHERE approved=1 ORDER BY created_at DESC LIMIT $limit";
            }
            else{
                $sql = "SELECT * FROM blog_table WHERE approved=1 ORDER BY created_at DESC";
            }
            $result = $this->db->query($sql);
            $posts = $result->fetch_all(MYSQLI_ASSOC);
            return $posts;
        }

        public function postById($id){
            $sql = "SELECT b.*, u.fullname, c.name as category_name FROM blog_table AS b LEFT JOIN user_table AS u ON u.id = b.author LEFT JOIN category_table AS c ON c.id = b.category WHERE b.id = '$id'";
            $result = $this->db->query($sql);
            $post = $result->fetch_assoc();
            return $post;
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

        public function handleStatus($id){
            try{
                $sql = "UPDATE blog_table set approved = CASE WHEN approved = 0 THEN 1 ELSE 0 END WHERE id = $id";
                $this->db->query($sql);
                return [
                    "status"=>true,
                    "message"=>"Post status updated successfully"
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
