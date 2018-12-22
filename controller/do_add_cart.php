<?php
$watch_id = $_POST['watch_id'];
$member_id;
if(isset($_SESSION['memberID'])){
    $member_id = $_SESSION['memberID'];
    $table = 'SHOPPING_CART';
    $data_array = array(
        'member_id'=>$member_id,
        "watch_id" => $watch_id,
        "quantity" => 1
      );
    Database::get()->insert($table, $data_array);
}
else
    $member_id = null;
$product = new ProductOrder($member_id ,$watch_id,1);
$_SESSION['shopping_cart'][]=$product;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>