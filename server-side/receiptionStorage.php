<?php
string $function = $_POST['function'];
string $status = $_POST['updatedStatus'];
string $receiptionId = $_POST['receiptionID'];

function SetStatus($updatedStatus) {
    $query = "UPDATE public.receiption_product_service
	SET is_done = $updatedStatus
	WHERE rid = $receiptionId;"
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