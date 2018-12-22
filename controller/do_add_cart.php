<?php
$watch_id = $_POST['watch_id'];
$cart_member_id;
if(isset($_SESSION['memberID']))
    $cart_member_id = $_SESSION['memberID'];
else
    $cart_member_id = null;
$product = new ProductOrder($cart_member_id ,$watch_id,1);
$_SESSION['shopping_cart'][]=$product;
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>