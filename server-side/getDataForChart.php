<?php

require 'connect.php';

$startDate = '2021-4-1';
$endDate = '2021-4-14';

class Node
{
    public $title;
    public $amount;

    public function __construct($title, $amount)
    {
        $this->amount = $amount;
        $this->title = $title;
    }
}

class DailyData
{
    public $nodes = [];

    public function __construct()
    {
    }

    public function setNodes($date, $connect): void
    {
        $listOfTitles = [
            "Ảnh cưới",
            "Mâm quả cưới",
            "Ảnh Studio (Hình phòng)",
            "Áo cưới (Cô dâu / Chú rể)"
        ];
        for($indexOfNode = 0; $indexOfNode < count($listOfTitles); $indexOfNode++) {
            //query to select amount of each node.
            $query = "SELECT COUNT(pid) FROM recieption_product_service WHERE created_date = '$date'
                                                    AND title = '$listOfTitles[$indexOfNode]'";
            $result = pg_query($connect, $query);
            $dataRow = pg_fetch_row($result);
            $node = new Node(
                $listOfTitles[$indexOfNode],
                $dataRow[0]
            );
            // add node object into list of nodes (nodes)
            array_push($this->nodes, $node);
        }

    }

}

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

    public function ExportWeeklyData(): array
    {
        return $this->weeklyData;
    }
}

function &fetchDailyData($startDate, $endDate, $connect)
{
    $weeklyDate = new WeeklyData($startDate, $endDate, $connect);
    return $weeklyDate;
}

$result =& fetchDailyData($startDate, $endDate, $connect);

$result = [];
echo json_encode($result);

//fetch data from PostgreSQL



