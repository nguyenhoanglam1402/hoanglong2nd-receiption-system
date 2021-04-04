<?php


class WeeklyData
{
    private $weeklyData = [];
    private static $amountOfDate = 0;

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