<?php
require 'connect.php';

$function = $_POST['function'];
$status = $_POST['updatedStatus'];
$receiptionId = number_format($_POST['receiptionID']);

$query = "UPDATE public.receiption_product_service SET is_done = $status WHERE rid = $receiptionId";
$result = pg_query($connect, $query);

echo $result;
?>