<?php

use JetBrains\PhpStorm\Pure;

require 'connect.php';
include 'DailyData.php';
include 'WeeklyData.php';

$startDate = '2021-4-1';
$endDate = '2021-4-14';

function &fetchDailyData($startDate, $endDate, $connect): array
{
    $weeklyDate = new WeeklyData($startDate, $endDate, $connect);
    return $weeklyDate->ExportWeeklyData();
}

$result =& fetchDailyData($startDate, $endDate, $connect);
echo json_encode($result);

//fetch data from PostgreSQL



