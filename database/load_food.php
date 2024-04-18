<?php
$link = mysqli_connect("localhost", "root", "", "e_canteen");

$sqlFoodTable = "CREATE TABLE IF NOT EXISTS food_list(food_id VARCHAR(6) NOT NULL, food_name VARCHAR(20) NOT NULL , food_photo VARCHAR(200) NOT NULL, food_pric INT(5) NOT NULL, food_dec VARCHAR(200) NOT NULL, food_ingred VARCHAR(200) NOT NULL, expec_time INT(5) NOT NULL, quantity INT(10) NOT NULL, PRIMARY KEY (food_id));";

$sqlOrderTable = "CREATE TABLE IF NOT EXISTS list_order(order_no INT(15) NOT NULL , user_name VARCHAR(20) NOT NULL , canteen_number INT(2) NOT NULL , food_id VARCHAR(6) NOT NULL , payment_status INT(1) NOT NULL , order_date DATE NOT NULL , order_time TIME NOT NULL, order_status INT(1) NOT NULL);";

if((mysqli_query($link, $sqlFoodTable))===false){
    echo "Error";
}
else{
    echo 'created food table';
}
if((mysqli_query($link, $sqlOrderTable))===false){
    echo "Error";
}
else{
    echo 'created order table';
}



?>
