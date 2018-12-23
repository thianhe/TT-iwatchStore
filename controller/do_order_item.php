<?php
if (isset($_POST['submit'])) {
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $validation_rules_array = array(
        'Remail' => 'required|valid_email',
        'Rphone' => 'integer',
    );
    $gump->validation_rules($validation_rules_array);
    $filter_rules_array = array(
        'Rname' => 'trim',
        'Remail' => 'trim|sanitize_email',
        'Rphone' => 'trim',
        'Raddress' => 'trim',
    );
    $gump->filter_rules($filter_rules_array);
    $validated_data = $gump->run($_POST);
    if ($validated_data === false) {
        $error = $gump->get_readable_errors(false);
    } else {
        // validation successful
        foreach ($filter_rules_array as $key => $val) {
            ${$key} = $_POST[$key];
        }
    }
    //if no errors have been created carry on
    if (count($error) == 0) {
        $productList = [];
        $totalPrice =0;
        foreach($_SESSION['shopping_cart'] as $cart){
            $watchInfo =  Database::get()->execute('select * from WATCH w,company,operating_system o where watch_id = "'.$cart->product_id.'" and brand_id = company_id and w.op_id = o.op_id;');
            $watchInfo[0]['SCquantity'] = $cart->quantity;
            $productList[] = $watchInfo[0];
            $totalPrice += $cart->quantity* $watchInfo[0]['price'];
        }
        $table = 'ORDER_LIST';
        $orderListID = Database::get()->getLastId("orderList_id", $table ) + 1;
        $data_array = array(
            'orderList_id' => $orderListID,
            'member_id' => $_SESSION['memberID'],
            'cost' => $totalPrice,
            'date_time' => date('Y-m-d H:i:s'),
            'state' => 'N',
            'r_name' => $Rname,
            "r_email" => $Remail,
            "r_phone" => $Rphone,
            'r_address' => $Raddress
        );
        Database::get()->insert($table, $data_array);
        foreach($productList as $product){
            $table = 'ORDER_ITEM';
            $data_array = array(
                'orderList_id' => $orderListID,
                'watch_id' => $product['watch_id'],
                'cost' => $product['SCquantity']*$product['price'],
                'quantity' => $product['SCquantity'],
            );
            Database::get()->insert($table, $data_array);
            $newStock = $product['quantity']-$product['SCquantity'];
            Database::get()->execute('UPDATE WATCH SET quantity= '.$newStock.' where watch_id = '.$product['watch_id'].';');
            Database::get()->execute('DELETE FROM SHOPPING_CART where watch_id = '.$product['watch_id'].' and member_id = '.$_SESSION['memberID'].'');
        }
        $_SESSION['shopping_cart'] = [];
        header('Location: '. Config::BASE_URL.'manage_user');
        exit;
    }
    if (isset($error) and count($error) > 0) {
        foreach ($error as $e) {
            $msg->error($e);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

} else {
    header('Location: ' . Config::BASE_URL);
    exit;
}
