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
$createDate = $_POST['credate'];
$phone = $_POST['phone'];
$checkCustomerID =0;

function &checkCustomerID($name, $phone, $connect){
    $checkingQuery = "SELECT cus_id FROM customer WHERE customer_name = '$name' AND phone_number = '$phone'";
    $resultCheckingQuery = pg_query($connect, $checkingQuery);
    while($resultOfRows = pg_fetch_assoc($resultCheckingQuery)){
        if($resultOfRows['cus_id'] != null || $resultOfRows != ''){
            //submit to database
            return $resultOfRows['cus_id'];
        }
    }
    return;
}

function createCustomerInformation($name, $phone, $connect){
    $query = "INSERT INTO customer (customer_name, phone_number) VALUES ('$name', '$phone')";
    pg_query($connect, $query);
}

function createNewReceiption($checkCustomerID, $type, $descr,
                             $date, $createDate, $depos, $last, $connect){
    $requestSubmitQuery = "INSERT INTO receiption_product_service 
    (cid, title, description, expected_delivery_date, created_date, deposit, rest_amount, is_done)
    VALUES(".$checkCustomerID.", '$type', '$descr', '$date', '$createDate', $depos, $last, false)";
    $resultOfCreationQuery = pg_query($connect, $requestSubmitQuery);
    echo 'Hóa đơn đã được xử lý !';
}

//check exist customer via their name and phone number
do{
    $checkCustomerID =& checkCustomerID($name, $phone, $connect);
    if($checkCustomerID != null){
        createNewReceiption($checkCustomerID, $type, $descr,
            $date, $createDate, $depos, $last, $connect);
        break;
    }
    else{
        createCustomerInformation($name, $phone, $connect);
    }
} while (true);


?>