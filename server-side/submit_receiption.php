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
$checkingQuery = "SELECT cus_id FROM customer WHERE customer_name = $name AND phone_number = $phone";
$resultCheckingQuery = pg_query($connect, $query); 
$resultOfRows = pg_fetch_row($resultCheckingQuery);
$cusId = $resultOfRows[0];
echo"alert($cusId)";
//query 
//check 
?>