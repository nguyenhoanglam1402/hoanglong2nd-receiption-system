<?php

require 'connect.php';
include 'WeeklyData.php';

$startDate = '2021-4-1';
$endDate = '2021-4-14';
$weeklyDate = new WeeklyData($startDate, $endDate, $connect);
echo json_encode($weeklyDate->weeklyData);

//fetch data from PostgreSQL



