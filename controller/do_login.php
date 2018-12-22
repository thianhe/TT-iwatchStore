<?php
if (isset($_POST['submit'])) {
    $error = array();
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $validation_rules_array = array(
        'username' => 'required|alpha_numeric|max_len,20|min_len,3',
        'password' => 'required|max_len,20|min_len,3',
    );
    $gump->validation_rules($validation_rules_array);
    $filter_rules_array = array(
        'username' => 'trim|sanitize_string',
        'password' => 'trim',
    );
    $gump->filter_rules($filter_rules_array);
    $validated_data = $gump->run($_POST);
    if ($validated_data === false) {
        $error = $gump->get_readable_errors(false);
    } else {
        // basic validation successful
        foreach ($validation_rules_array as $key => $val) {
            ${$key} = $_POST[$key]; // trans to local parameters
        }
        $userVeridator = new UserVeridator();
        $userVeridator->loginVerification($username, $password);
        //$error = $userVeridator->getErrorArray();
        if (empty($userVeridator->getErrorArray())) {
            $result = Database::get()->execute('SELECT * FROM member WHERE account = "' . $username . '"');
            $_SESSION['memberID'] = $result[0]['member_id'];
            $_SESSION['name'] = $result[0]['first_name'] . ' ' . $result[0]['last_name'];
            $_SESSION['account'] = $result[0]['account'];

            //Reset and update shopping cart
            foreach($_SESSION['shopping_cart'] as $cart){
                $shopping_cart_exist = Database::get()->execute('SELECT * FROM shopping_cart WHERE member_id = "'. $result[0]['member_id'] .'" and watch_id = "'.$cart->product_id.'"');
                if(isset($shopping_cart_exist[0])){
                    $data_array = array("quantity" => $cart->quantity);
                    Database::get()->Update("shopping_cart", $data_array);
                }else{
                    $data_array = array(
                        'member_id'=> $result[0]['member_id'],
                        "watch_id" => $cart->product_id,
                        "quantity" => $cart->quantity
                      );
                    Database::get()->insert("shopping_cart", $data_array);
                }
            }

            $_SESSION['shopping_cart'] = [];
            $shopping_cart = Database::get()->execute('SELECT * FROM shopping_cart WHERE member_id = "'. $result[0]['member_id'] .'"');
            foreach($shopping_cart as $cart){
                $product = new ProductOrder($cart['member_id'],$cart['watch_id'],$cart['quantity']);
                $_SESSION['shopping_cart'][] = $product;
            }


            header('Location: index');
            exit;
        }
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
