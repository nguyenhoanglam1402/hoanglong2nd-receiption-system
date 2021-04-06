<?php

include 'DailyData.php';

class WeeklyData
{
    public $weeklyData = [];
    public $dateStart;
    public $dateEnd;

    public function __construct($dateStart, $dateEnd, $connect)
    {
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }

    public function setDailyData($connect)
    {
        for($date = strtotime($this->dateStart); $date <= strtotime($this->dateEnd); $date = strtotime("+1 day", $date)){
            $dailyData = new DailyData();
            $dailyData->setNodes($this->dateStart, $connect);
            array_push($this->weeklyData, $dailyData);
        }
    }
}