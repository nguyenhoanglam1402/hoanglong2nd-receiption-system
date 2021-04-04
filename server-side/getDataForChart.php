<?php

require 'connect.php';
$startDate = '2021-4-1';
$endDate = '2021-4-14';


function &fetchDailyData($startDate, $endDate, $connect): array
{
    $weeklyDate = new WeeklyData();
    $query = "SELECT title, created_date FROM receiption_product_service WHERE created_date >= '$startDate' AND created_date <= '$endDate'";
    $result = pg_query($connect, $query);
    while ($data = pg_fetch_assoc($result)){
        $dailyDate = new DailyData(
          $data['title'],
          $data['created_date']
        );
        $weeklyDate->AddDailyData($dailyDate);
    }
    $exportData = $weeklyDate->ExportWeeklyData();
    return $exportData;
}

$result =& fetchDailyData($startDate, $endDate, $connect);
echo json_encode($result);

//fetch data from PostgreSQL



