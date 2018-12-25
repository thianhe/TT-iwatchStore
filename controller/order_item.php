<?php

$productList = [];
$totalPrice =0;
$oTotalPrice = 500;
$shipping = 500;

$discount = new Discount();
foreach($_SESSION['shopping_cart'] as $cart){
    $watchInfo =  Database::get()->execute('select * from WATCH w,company,operating_system o where watch_id = "'.$cart->product_id.'" and brand_id = company_id and w.op_id = o.op_id;');
    $watchInfo[0]['SCquantity'] = $cart->quantity;
    $productList[] = $watchInfo[0];
    $oTotalPrice += $cart->quantity*$watchInfo[0]['price'];
    $totalPrice += $discount->special($cart->quantity,$watchInfo[0]);
}

$totalPrice = $discount->seasonings($totalPrice);
$shipping = $shipping - $discount->shipping($totalPrice);

$totalPrice +=$shipping;


$memberInfo = Database::get()->execute('select * from Member where member_id = "'.$cart->member_id.'";');
$memberInfo = $memberInfo[0];


include('view/header/header.php');
include('view/body/order_item.php');
include('view/footer/footer.php');