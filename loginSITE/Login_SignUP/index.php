<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <link rel="stylesheet" href="style.css">
    <form>
        <div class="input-group">
            <label id="email-label" style="font-size: 20px;"> Email</label>
            <input id="email-feild" type="email" name="e_mail" spellcheck="false" placeholder="xyz@marwadiuniversity.ac.in" onkeyup="validateEmail()" required>
            <span id="email-error"> </span>
        </div>
        <br> 
        <label for="password" style="font-size: 20px;">Password</label>
        <input type="password" id="password" name="pass" placeholder="Your placeholder here" required>
        <input type="button" name="submitButton" value="SUBMIT"/>         
        <br>

        <h4>Forgot Password?</h4>
        <a href="reset.html">Reset</a>
        <br>
        ------------------ Or ------------------
        <br>
        <a href="Signup.html" style="text-decoration: none;" >
            <input type="button" value="SignUp"  />
        </a> 
    </form>
</body>
</html>

<?php
if(isset($_POST['submitButton'])){
    $email = $_POST['e_mail'];
    $pass = $_POST['pass'];

    
}
?>
