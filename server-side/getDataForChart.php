<?php

require 'connect.php';
include 'WeeklyData.php';

$startDate = $_POST["stardate"];
$endDate = $_POST["endate"];
$weeklyDate = new WeeklyData($startDate, $endDate, $connect);
$weeklyDate->setDailyData($connect);

echo json_encode($weeklyDate->getWeeklyData());

//fetch data from PostgreSQL



