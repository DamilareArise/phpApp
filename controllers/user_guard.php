<?php 
    session_start();

    if(!$_SESSION['user']){
        session_destroy();
        header("location: /phpApp/views/login.php");
        exit;
    }

    if(!$_SESSION['user']['is_active']){
        session_destroy();
        header("location: /phpApp/views/login.php?message=Account as been suspended. kindly contact support@myblog.com");
        exit;
    }else{
        return;
    }

    // $A = [1, 3, 4, 6, 7];
    // $B = [2, 5, 8, 9, 10, 1, 3];

    // Inner join = [1, 3]
    // left join $A and $B = [1, 3, 4, 6, 7] 
    // right join $A and $B = [1, 3, 2, 5, 8, 9, 10]
    // outer join = [1, 3, 4, 6, 7, 2, 5, 8, 9, 10]

    // LEFT JOIN ($A and $B)
    // id blog_name  user_id
            // 1        1
            // 3        3
            // 4        null
            // 6        null
            // 7        null

    // $B 
    // id user_name

?>