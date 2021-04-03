<?php
require 'connect.php';
class Receiption {
    // Propertives
    private $name;
    private $dueDate;
    private $typeOfService;
    private $deposit;
    private $status;

    public function __Receiption($name, $dueDate, $typeOfService, $deposit, $status){
        $this->name = $name;
        $this->dueDate = $dueDate;
        $this->typeOfService = $typeOfService;
        $this->deposit = $deposit;
        $this->status = $status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getName(){
        return $name;
    }

    public function getDueDate(){
        return $dueDate;
    }

    public function getTypeOfService(){
        return $typeOfService;
    }

}

$listReceiptions = [];
$query = "SELECT customer_name, phone_number, 
expected_delivery_date, title, description, deposit, rest_amount 
FROM receiption_product_service 
iNNER JOIN customer ON cid=cus_id
ORDER BY expected_delivery_date ASC LIMIT 4";

$result = pg_query($connect, $query);


while($dataRow = pg_fetch_assoc($result)) {
    $recieption = new __Receiption(
        $dataRow['customer_name'],
        $dataRow['expected_delivery_date'],
        $dataRow['title'],
        $dataRow['deposit'],
        $dataRow['status']
    );
    die echo 'After created object';
   $listReceiptions[] = $recieption;
}

echo json_encode($listReceiptions);

?>