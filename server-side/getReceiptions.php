<?php
require 'connect.php';
include 'Receiption.php';

$listReceiptions = [];
$query = "SELECT rid, customer_name, phone_number, 
            expected_delivery_date, title, deposit, rest_amount, is_done, created_date
            FROM receiption_product_service 
            iNNER JOIN customer ON cid=cus_id
            ORDER BY expected_delivery_date ASC LIMIT 4";

$result = pg_query($connect, $query);

while($dataRow = pg_fetch_assoc($result)) {
    $recieption = new Receiption(
        $dataRow['rid'],
        $dataRow['customer_name'],
        $dataRow['expected_delivery_date'],
        $dataRow['title'],
        $dataRow['deposit'],
        $dataRow['is_done'],
        $dataRow['created_date']
    );
   array_push($listReceiptions, $recieption);
}

echo json_encode($listReceiptions);

?>