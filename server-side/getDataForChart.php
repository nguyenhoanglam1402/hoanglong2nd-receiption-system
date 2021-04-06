<?php

require 'connect.php';
include 'WeeklyData.php';

$startDate = '2021-4-1';
$endDate = '2021-4-14';
$weeklyDate = new WeeklyData($startDate, $endDate, $connect);
$weeklyDate->setDailyData($connect);
echo json_encode($weeklyDate);

//fetch data from PostgreSQL



