<?php

include 'Node.php';

class DailyData
{
    public $nodes = [];

    public function __construct()
    {
    }

    public function setNodes($date, $connect)
    {
        $listOfTitles = [
            "Ảnh cưới",
            "Mâm quả cưới",
            "Ảnh Studio (Hình phòng)",
            "Áo cưới (Cô dâu / Chú rể)"
        ];
        for($indexOfNode = 0; $indexOfNode < count($listOfTitles); $indexOfNode++) {
            //query to select amount of each node.
            $query = "SELECT COUNT(rid) FROM recieption_product_service WHERE created_date = '$date' AND title = '$listOfTitles[$indexOfNode]'";
            $result = pg_query($connect, $query);
            $dataRow = pg_fetch_row($result);
            $node = new Node($listOfTitles[$indexOfNode], $dataRow[0]);
            // add node object into list of nodes (nodes)
            array_push($this->nodes, $node);
        }

    }

}