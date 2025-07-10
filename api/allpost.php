<?php
    include '../models/post.php';
    header("Access-Control-Allow-Origin: *");
    header('Content-Type: application/json');
    $posts = new PostConfig();
    
    if($_SERVER['REQUEST_METHOD']=='GET'){
        http_response_code(200);
        if(isset($_GET['post_id'])){
            $data = $posts->postById($_GET['post_id']);
            if(!$data){
                echo json_encode([]);
                exit;
            }
        }else{
            $data = $posts->PostByLimit();   
        }
        echo json_encode($data);
    }

    else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $payload = file_get_contents("php://input");
        $payload = json_decode($payload, true);

        $title = $payload['title'];
        $content = $payload['content'];
        $category_id = $payload['category_id'];
        
        $result = $posts->addPost($title, $content, null, $category_id, 1);
        echo json_encode($result);
    
    }

    else{
        http_response_code(405);
        echo json_encode([
            "message" => "Method Not Allowed"
        ]);
    }
?>