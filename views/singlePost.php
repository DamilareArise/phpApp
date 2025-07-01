<?php
    include '../models/post.php';

    $post_id = $_GET['post_id'] ?? null;

    $post = new PostConfig();
    $data = $post->postById($post_id);
    if ($data=='') {
        header("location: ../notFound.php");
        exit;
    }

    print_r($data);
?>