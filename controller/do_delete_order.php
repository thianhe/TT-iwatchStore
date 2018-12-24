<?php
$orderList_id = $_POST['orderList_id'];
$table = 'ORDER_LIST';
Database::get()->execute('DELETE FROM '.$table.' where orderList_id = "'.$orderList_id.'"');
header('Location: ' . Config::BASE_URL.'order_setting');
?>