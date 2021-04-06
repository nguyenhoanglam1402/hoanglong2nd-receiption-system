<?php

include 'DailyData.php';

class WeeklyData
{
    private $weeklyData = [];
    public $dateStart;
    public $dateEnd;
    private $date;

    public function __construct($dateStart, $dateEnd, $connect)
    {
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }

    public function setDailyData($connect)
    {
        for($date = strtotime($this->dateStart); $date <= strtotime($this->dateEnd); $date = strtotime("+1 day", $date)){
            $dailyData = new DailyData();
            $dailyData->setNodes(date("Y-m-d", $date), $connect);
            $this->date = $date;
            array_push($this->weeklyData, $dailyData);
        }
    }

    public function getWeeklyData(): array
    {
        return $this->weeklyData;
    }
}