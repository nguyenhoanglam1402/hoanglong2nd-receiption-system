<?php
require 'connect.php';

$function = $_POST['function'];
$status = $_POST['updatedStatus'];
$receiptionId = $_POST['receiptionID'];

function SetStatus($updatedStatus) {
    $query = "UPDATE public.receiption_product_service
	SET is_done = $updatedStatus
	WHERE rid = $receiptionId";
	pg_query($connect, $query);
}

function DeleteItem() {
	//Coming soon
}

switch ($function) {
	case'setStatus':
		SetStatus($status);
		break;
	case'deleteItem':
		DeleteItem();
		break;
}