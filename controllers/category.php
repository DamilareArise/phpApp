<?php
    include "../models/post.php";
    session_start();

    $user_id = $_SESSION['user']['id'];
    $is_admin = $_SESSION['user']['is_admin'];
    $post = new PostConfig();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);

        if($name == '' || $description == ''){
            header("location: ../views/categoryForm.php?message=Please fill in all fields");
            exit;
        }

        $result = $post->createCategory($name, $description, $user_id);
        $message = $result['message'];
        header("location: ../views/categoryForm.php?message=$message");
        
    }


?>