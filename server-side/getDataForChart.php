<?php

require 'connect.php';
include 'WeeklyData.php';

$startDate = '2021-4-3';
$endDate = '2021-4-10';
$weeklyDate = new WeeklyData($startDate, $endDate, $connect);
$weeklyDate->setDailyData($connect);

echo json_encode($weeklyDate->getWeeklyData());

//fetch data from PostgreSQL



