<?php 
    include "../models/post.php";
    $post = new PostConfig();

    if($_GET['post_id']){
        $post_id = $_GET['post_id'];
        $result = $post->handleStatus($post_id);
        $message = $result['message'];
        header("location: /phpApp/views/handlePost.php?message=$message");
        exit;
    }

?>