<?php
$_SESSION['updateKey'] = $_POST['discount_id'];
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
$data_array = array(
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
  Database::get()->update("discount", $data_array,"discount_id",$_POST['discount_id']);
  header('Location: manage_discount');
  exit;
?>