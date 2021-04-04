<?php

require 'connect.php';
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

$result =& fetchDailyData($startDate, $endDate, $connect);
echo json_encode($result);

//fetch data from PostgreSQL
function &fetchDailyData($startDate, $endDate, $connect) {
    $query = "SELECT title, created_date 
                FROM receiption_product_service 
                WHERE created_date >= $startDate AND create_date <= $endDate";
    $result = pg_query($connect, $query);
    $data = pg_fetch_assoc($result);
    return $data;
}


