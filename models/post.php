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
    }

?>
