<?php
//check connect with Server
require 'connect.php';
//parameters
echo "<script>alert('Im here');</script>";
$name = $_POST['name'];
$type = $_POST['type'];
$descr = $_POST['descr'];
$last = $_POST['last'];
$depos = $_POST['depos'];
$date = $_POST['date'];
$phone = $_POST['phone'];
die("I'm here");
echo "<script>alert('$name');</script>";
//check exist customer via their name and phone number
$checkingQuery = "SELECT cus_id FROM customer WHERE customer_name = '$name' AND phone_number = '$phone'";
$resultCheckingQuery = pg_query($connect, $checkingQuery);
while($resultOfRows = pg_fetch_assoc($resultCheckingQuery)){
    echo "<script>console.log('".$resultOfRows["cus_id"]."');</script>";
}
?>