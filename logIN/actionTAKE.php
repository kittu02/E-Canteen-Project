<?php
    // link to the database
    if(isset($_POST['signUP'])){
        include "./Signup.html";
    }
    if(isset($_POST['submitButton'])){
        require_once "../database/connect_once.php";
        $email = $_POST['e_mail'];
        $pass = $_POST['pass'];

        // check user is in table or not 
        $verify = "SELECT * FROM user_table WHERE email='".$email."' AND user_pwd='".$pass."'";
        $result = mysqli_query($link,$verify);
        $data  = mysqli_fetch_array($result);

        if($result === FALSE){
            die("No User Found"); 
        }else if($data["user_type"]=="user"){
            header("Location: ../user/home/home-page.html");           // change here
        }else if($data["user_type"]=="admin"){
            require_once '../database/load_food.php';
            header("Location: ../admin/home/admin_index.html");     
        }
    }
?>
