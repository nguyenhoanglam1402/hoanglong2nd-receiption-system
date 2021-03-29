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
$phone = $_POST['phone'];
$createdDate = date('Y/m/d');
//check exist customer via their name and phone number
$checkingQuery = "SELECT cus_id FROM customer WHERE customer_name = $1 AND phone_number = $2";
$resultCheckingQuery = pg_query_params($connect, $query, array($name, $phone)); 
$cusid= pg_fetch_row($resultCheckingQuery, 0);
//query 
$query = "INSERT INTO receiption_product_service
(cid, title, description, expected_delivery_date, created_date, deposit, rest_amount, is_done)
values($1, $2, $3, $4, $5, $6, $7, false)";
$result = pg_query_params($connect, $query, array($cusid, $type, $descr, $date, $createdDate, $depos, $last, $phone));
//check 
?>