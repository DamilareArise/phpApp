<?php
    class Brand{
        private $brand_name;
        protected $product_name;

        function __construct($inp_brand_name, $inp_product_name){
            $this->brand_name = $inp_brand_name;
            $this->product_name = $inp_product_name;
        }

        public function showcase(){
            return "Displaying $this->brand_name $this->product_name to the viewers. <br>";
        }
    }

    // mysqli prepared statement
    // i - integer
    // d - double/float
    // s - string
    // b - BLOB/boolean


    $host = 'localhost';
    $user = 'root';
    $password = 'password';
    $database = 'jan_blog_db';

    $conn = new mysqli($host, $user, $password, $database);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    // signup

    // $sql = 'INSERT INTO user_table(fullname, email, `password`) VALUES(?,?,?)';
    // $stmt = $conn->prepare($sql);

    // $fullname = 'Arise Damilare';
    // $email = 'arisedamilare@gmail.com';
    // $password = 'password123'; 
    // $hash_pw = password_hash($password, PASSWORD_DEFAULT);

    // $stmt->bind_param('sss', $fullname, $email, $hash_pw);
    // $stmt->execute();
    // echo 'signup successful';
    // $stmt->close();


    // signin
    $email = 'arisedamilare@gmail.com';
    $password = 'password1234'; 
    

    $sql = "SELECT * FROM user_table WHERE email = '$email'";
    $result = $conn->query($sql);
    // print_r($result);

    if ($result->num_rows > 0){
        $user = $result->fetch_assoc();
        // print_r($user);
        $hash_pw = $user['password'];
        if(password_verify($password, $hash_pw)){
            echo 'signin successful';
        }else{
            echo 'Invalid email or password';
        }
    }else{
        echo 'Invalid email or password';
    }

?>
