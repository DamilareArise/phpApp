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

        }

        public function fetchCategory(){

        }

        public function addPost($title, $content, $image_path,  $category_id, $user_id){
            
        }
    }

?>
