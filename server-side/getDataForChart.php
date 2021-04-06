<?php

require 'connect.php';
include 'WeeklyData.php';

$startDate = '2021-4-1';
$endDate = '2021-4-14';

//function &fetchDailyData($startDate, $endDate, $connect)
//{
//    $weeklyDate = new WeeklyData($startDate, $endDate, $connect);
//    return $weeklyDate;
//}
//
//$result =& fetchDailyData($startDate, $endDate, $connect);

$result = new WeeklyData();
echo json_encode($result);

//fetch data from PostgreSQL



