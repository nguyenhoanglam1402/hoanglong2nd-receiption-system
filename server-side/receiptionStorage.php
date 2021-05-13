<?php
require 'connect.php';

$function = $_POST['function'];
$status = $_POST['updatedStatus'];
$receiptionId = $_POST['receiptionID'];
//$query = "UPDATE public.receiption_product_service SET is_done = $updatedStatus WHERE rid = $receiptionId";
$result = pg_query($connect, $query);
?>