<?php
require '/server-side/connect.php';
pg_parameter_status($connect);
$query = "select count(cus_id) from customer where customer_name = '?'";

?>