<?php

$productList = [];
$totalPrice =0;
foreach($_SESSION['shopping_cart'] as $cart){
    $watchInfo =  Database::get()->execute('select * from WATCH w,company,operating_system o where watch_id = "'.$cart->product_id.'" and brand_id = company_id and w.op_id = o.op_id;');
    $watchInfo[0]['SCquantity'] = $cart->quantity;
    $productList[] = $watchInfo[0];
    $totalPrice += $cart->quantity* $watchInfo[0]['price'];
}
$memberInfo = Database::get()->execute('select * from Member where member_id = "'.$cart->member_id.'";');
$memberInfo = $memberInfo[0];

include('view/header/header.php');
include('view/body/order_item.php');
include('view/footer/footer.php');