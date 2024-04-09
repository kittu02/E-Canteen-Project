<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Your Name here">
    <label for="enrolment">Enrolment No.</label>
    <input type="text" id="enrolment" name="enrolment" placeholder="Your Enrolment No. here">
    <div class="input-group">
            <label id="email-label" style="font-size: 25px;"> Email</label>
            <input id="email-feild" type="email" name="e_mail" spellcheck="false" placeholder="xyz@marwadiuniversity.ac.in" onkeyup="validateEmail()">
            <span id="email-error">  </span>
    </div>
    <br> 
    <label for="password">Password</label>
    <input type="password" id="password" name="pass1" placeholder="Your Password here">
    <label for="cnfrm-password">Confirm Password</label>
    <input type="password" id="cnfrm-password" name="pass2" placeholder="Confirm password here">
    <p id="message"></p>
    <input type="Submit" name="signUPData" onclick="checkPassword()" value="SUBMIT"/>
    </form>
    <script src="script.js"></script>
</body>
</html>  


<?php
if(isset($_POST['signUPData'])){
    $name = $_POST['username']
    $email = $_POST['e_mail'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $en_no = $_POST['enrolment'];


    if($pass1 == $pass2){
        // link to the database
        $link = mysqli_connect("localhost", "root", "", "e-canteen");
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        else{
            echo "Connected";
        }

        // inserting 
        $add = "INSERT INTO user_table VALUES($name,$e_mail,$pass,,$en_no)";

    }
    else{
        print_r("Enter Right password")
    }

    
    
    
}
?>