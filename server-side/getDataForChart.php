<?php

require 'connect.php';
$startDate = '2021-4-1';
$endDate = '2021-4-14';

class DailyData
{
    private string $typeOfService;
    private string $created_date;

    public function __construct($typeOfService, $created_date)
    {
        $this->typeOfService = $typeOfService;
        $this->created_date = $created_date;
    }
}

class WeeklyData
{
    private array $weeklyData = [];

    public function __construct()
    { }

    public function AddDailyData($dailyData){
        array_push($this->weeklyData, $dailyData);
    }

    public function ExportWeeklyData(): array
    {
        return $this->weeklyData;
    }
}

function &fetchDailyData($startDate, $endDate, $connect): array
{
    $weeklyDate = new WeeklyData();
    $query = "SELECT title, created_date FROM receiption_product_service WHERE created_date >= '$startDate' AND created_date <= '$endDate'";
    $result = pg_query($connect, $query);
    while ($data = pg_fetch_assoc($result)){
        $dailyDate = new DailyData($data['title'], $data['created_date']);
        $weeklyDate->AddDailyData($dailyDate);
    }
    $exportData = $weeklyDate->ExportWeeklyData();
    return $exportData;
}

$result =& fetchDailyData($startDate, $endDate, $connect);
echo json_encode($result);

//fetch data from PostgreSQL



