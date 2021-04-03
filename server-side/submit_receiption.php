<?php
//check connect with Server
require 'connect.php';
//parameters
$name = $_POST['name'];
$type = $_POST['type'];
$descr = $_POST['descr'];
$last = $_POST['last'];
$depos = $_POST['depos'];
$date = $_POST['date'];
$creatDate = $_POST['credate'];
$phone = $_POST['phone'];
//check exist customer via their name and phone number
while(checkCustomerID() != true){
    createCustomerInformation();
}
createNewReceiption();


function checkCustomerID(){
    $checkingQuery = "SELECT cus_id FROM customer WHERE customer_name = '$name' AND phone_number = '$phone'";
    $resultCheckingQuery = pg_query($connect, $checkingQuery);
    while($resultOfRows = pg_fetch_assoc($resultCheckingQuery)){
        if($resultOfRows['cus_id'] != null || $resultOfRows != ''){
            //submit to database
            return true;
        }
        else{
            //create new customer
            return false;
        }
    }
}

function createCustomerInformation(){
    $query = "INSERT INTO customer (customer_name, phone_number) VALUES ($name, $phone)";
}

function createNewReceiption(){
    $requestSubmitQuery = "INSERT INTO receiption_product_service 
    (cid, title, description, expected_delivery_date, created_date, deposit, rest_amount, is_done)
    VALUES(".$resultOfRows['cus_id'].", '$type', '$descr', '$date', '$creatDate', $depos, $last, false)";
    $resultOfCreationQuery = pg_query($connect, $requestSubmitQuery);
    echo 'Hóa đơn đã được xử lý !';
}

?>