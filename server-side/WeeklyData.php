<?php


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