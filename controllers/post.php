<?php
    include '../models/post.php';
    session_start();

    $user_id =$_SESSION['user']['id'];
    $post = new PostConfig();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $category_id = htmlspecialchars($_POST['category']);
        
        $image = $_FILES['image'];


        if($title == '' || $content == ''){
            header("location: ../views/postForm.php?message=Please fill in all fields");
            exit;
        }

        if($_FILES['image'] = '' || $_FILES['image']['error'] != UPLOAD_ERR_OK){
            header("location: ../views/postForm.php?message=Please select an image");
            exit;
        }
        
    

        $image_name = time() . '-'. $image['name'];
        $tmp_path = $image['tmp_name'];
        $image_path = "../uploads/images/$image_name";
        
        if(move_uploaded_file($tmp_path, $image_path)){
            $result = $post->addPost($title, $content, $image_name, $category_id, $user_id);

            $message = $result['message'];
            header("location: ../views/postForm.php?message=$message");
        }
    }