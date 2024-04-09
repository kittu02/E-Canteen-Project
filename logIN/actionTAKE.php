<?php
// if(isset($_POST['signUP'])){
//     include "./Signup.html";
// }

if(isset($_POST['submitButton'])){
    $email = $_POST['e_mail'];
    $pass = $_POST['pass'];

    // link to the database
    $link = mysqli_connect("localhost", "root", "", "e-canteen");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    else{
        echo "Connected";
    }
    // inserting 
    // $add = 
    // check user is in table or not 
    $verify = "SELECT * FROM user_table WHERE email='$email' AND user_pwd='$pass'";
    if($verify === FALSE){
        die("No User Found"); 
    }
    else{
        include "../user/home/home-page.html" ;
    }
}
?>

