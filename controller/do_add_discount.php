<?php
$discount_name = $_POST['discount_name'];
$discount_type = $_POST['discount_type'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$description = $_POST['description'];
$get_free = $_POST['get_free'];
$price_needed = $_POST['price_needed'];
$discount_percent = $_POST['discount_percent'];
$discount_price = $_POST['discount_price'];
$watches_content = $_POST['watches_content'];
$id = Database::get()->getLastId("discount_id","discount") +1;
$data_array = array(
    'discount_id'=>$id,
    'discount_name'=>$discount_name,
    'discount_type'=>$discount_type,
    'watches_content'=>$watches_content,
    'startDate'=>$startDate,
    'endDate'=>$endDate,
    'description'=>$description,
    'get_free'=>$get_free,
    'price_needed'=>$price_needed,
    'discount_percent'=>$discount_percent,
    'discount_price'=>$discount_price,
  );
  Database::get()->insert("discount", $data_array);
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
?>