<?php

include 'DailyData.php';

class WeeklyData
{
    public $weeklyData = [];
    private $dateStart;
    private $dateEnd;

    public function __construct($dateStart, $dateEnd, $connect)
    {
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->setDailyData($connect);
    }

    public function setDailyData($connect)
    {
        for($date = strtotime($this->dateStart); $date < strtotime($this->dateEnd);
            $date = strtotime('+1 day', $date)){
            $dailyData = new DailyData();
            $dailyData->setNodes($date, $connect);
            array_push($this->weeklyData, $dailyData);
        }
    }
}