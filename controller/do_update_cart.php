<?php
$error =false;
foreach($_SESSION['shopping_cart'] as $cart){
    $product = Database::get()->execute('SELECT * from watch where watch_id ='.$cart->product_id.'');
    if( $_POST[$cart->product_id] > $product[0]['quantity']){
        $msg->error("Quantity cannot larger than stock");
        $error = true;
        break;
    }
    if( $_POST[$cart->product_id]<0){
        $msg->error("Quantity cannot smaller the 0");
        $error = true;
        break;
    }
}
if($error == true)
    header('Location: ' . $_SERVER['HTTP_REFERER']);
else{

    foreach($_SESSION['shopping_cart'] as $cart){
        $cart->quantity= $_POST[$cart->product_id];
        if(isset($_SESSION['memberID'])){
            Database::get()->execute('UPDATE shopping_cart set quantity = '.$cart->quantity.' where member_id = '.$_SESSION['memberID'].' and watch_id = '.$cart->product_id.'');
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}