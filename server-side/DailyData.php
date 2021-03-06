<?php

include 'Node.php';

class DailyData
{
    private $nodes = [];

    public function __construct()
    {
    }

    public function setNodes($date, $connect)
    {
        $listOfTitles = [
            "Chụp ảnh cưới",
            "Đặt mâm quả cưới",
            "Làm đám cưới",
            "Áo cưới/ trang phục"
        ];
        for($indexOfNode = 0; $indexOfNode < count($listOfTitles); $indexOfNode++) {
            //query to select amount of each node.
            $query = "SELECT COUNT(rid) AS amount FROM receiption_product_service WHERE created_date = '$date' AND title = '$listOfTitles[$indexOfNode]'";
            $result = pg_query($connect, $query);
            $dataRow = pg_fetch_assoc($result);
            $node = new Node($listOfTitles[$indexOfNode], $dataRow['amount']);
            // add node object into list of nodes (nodes)
            array_push($this->nodes, $node);
        }
    }

    public function getNodes(): array
    {
        return $this->nodes;
    }

}