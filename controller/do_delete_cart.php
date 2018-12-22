<?php
$watch_id = $_POST['watch_id'];
$member_id;
if(isset($_SESSION['memberID'])){
    $member_id = $_SESSION['memberID'];
    $table = 'SHOPPING_CART';
    Database::get()->execute('DELETE FROM '.$table.' where member_id = "'.$member_id.'"and product_id="'.$watch_id.'"');
}
foreach($_SESSION['shopping_cart'] as $key => $cart){
    if($cart->product_id == $watch_id)
        unset($_SESSION['shopping_cart'][$key]);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>