<?php

require 'connect.php';
$startDate = '2021-4-1';
$endDate = '2021-4-14';


function &fetchDailyData($startDate, $endDate, $connect): array
{
    $query = "SELECT title, created_date FROM receiption_product_service WHERE created_date >= '$startDate' AND created_date <= '$endDate'";
    $result = pg_query($connect, $query);
    $data = pg_fetch_assoc($result);
    return $data;
}

$result =& fetchDailyData($startDate, $endDate, $connect);
echo json_encode($result);

//fetch data from PostgreSQL



