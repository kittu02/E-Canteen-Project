<?php
if(isset($_POST['signUPData'])){
    $name = $_POST['username'];
    $email = $_POST['e_mail'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $en_no = $_POST['enrolment'];


    // if($pass1 == $pass2){
        // link to the database
        $link = mysqli_connect("localhost", "root", "", "e-canteen");
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        else{
            echo "Connected";
        }

        // inserting 
        $add = "INSERT INTO user_table (user_name,email,user_pwd,enrolment_no) VALUES('$name','$email','$pass1','$en_no')";
        if(mysqli_query($link, $add)){
            echo "Records added successfully.";
            include './index.html';
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    
    // else{
    //     print_r("Enter Right password")
    // }  
}
?>