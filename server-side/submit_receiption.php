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
$checkCustomerID;

//check exist customer via their name and phone number
while(checkCustomerID() === null){
    createCustomerInformation();
    $checkCustomerID = checkCustomerID();
}

createNewReceiption();


function checkCustomerID(){
    $checkingQuery = "SELECT cus_id FROM customer WHERE customer_name = '$name' AND phone_number = '$phone'";
    $resultCheckingQuery = pg_query($connect, $checkingQuery);
    while($resultOfRows = pg_fetch_assoc($resultCheckingQuery)){
        if($resultOfRows['cus_id'] != null || $resultOfRows != ''){
            //submit to database
            return $resultOfRows['cus_id'];
        }
        return null;
    }
}

function createCustomerInformation(){
    $query = "INSERT INTO customer (customer_name, phone_number) VALUES ('$name', '$phone')";
    pg_query($connect, $query);
}

function createNewReceiption(){
    $requestSubmitQuery = "INSERT INTO receiption_product_service 
    (cid, title, description, expected_delivery_date, created_date, deposit, rest_amount, is_done)
    VALUES(".$customerID.", '$type', '$descr', '$date', '$creatDate', $depos, $last, false)";
    $resultOfCreationQuery = pg_query($connect, $requestSubmitQuery);
    echo 'Hóa đơn đã được xử lý !';
}

?>