<?php
require 'connect.php';
include 'Receiption.php';

$listReceiptions = [];
$query = "SELECT rid, customer_name, phone_number, description, 
            expected_delivery_date, title, deposit, rest_amount, is_done, created_date
            FROM receiption_product_service 
            iNNER JOIN customer ON cid=cus_id WHERE is_done = false
            ORDER BY expected_delivery_date ASC LIMIT $_POST[amount]";

$result = pg_query($connect, $query);

while($dataRow = pg_fetch_assoc($result)) {
    $recieption = new Receiption(
        $dataRow['rid'],
        $dataRow['customer_name'],
        $dataRow['expected_delivery_date'],
        $dataRow['title'],
        $dataRow['description'],
        $dataRow['phone_number'],
        $dataRow['deposit'],
        $dataRow['is_done'],
        $dataRow['created_date']
    );
   array_push($listReceiptions, $recieption);
}

echo json_encode($listReceiptions);

?>