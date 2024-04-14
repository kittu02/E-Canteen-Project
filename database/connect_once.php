<?php
    $link = mysqli_connect("localhost", "root", "", "");
    $sqlDB = "CREATE DATABASE IF NOT EXISTS e_canteen";
    if(mysqli_query($link, $sqlDB)===false){
        echo "Error" . mysqli_error($link);
    }
    
    $link = mysqli_connect("localhost", "root", "", "e_canteen");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sqlTB = "CREATE TABLE IF NOT EXISTs user_table (user_name VARCHAR(20) NOT NULL,email VARCHAR(30) NOT NULL,user_pwd VARCHAR(10) NOT NULL, enrolment_no INT(15) NOT NULL PRIMARY KEY,user_type VARCHAR(10) NOT NULL DEFAULT 'user');";
    if(mysqli_query($link, $sqlTB)===false){
        echo "Error" . mysqli_error($link);
    }

?>
