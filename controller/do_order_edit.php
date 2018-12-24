<?php
if (isset($_POST['submit'])) {
    $_SESSION['updateKey'] = $_POST['orderList_id'];
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $validation_rules_array = array(
        'Receiver_Phone' => 'integer',
        'Cost' => 'integer',
        'Receiver_Email' => 'required|valid_email',
    );
    $gump->validation_rules($validation_rules_array);
    $filter_rules_array = array(
        'state' => 'trim',
        'orderList_id' => 'trim',
        'Receiver_Name' => 'trim',
        'Receiver_Email' => 'trim',
        'Receiver_Phone' => 'trim',
        'Receiver_Address' => 'trim',
        'Cost' => 'trim',
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
    if (empty($gump->get_readable_errors())) {
        $orderItem = Database::get()->execute('SELECT * FROM watch w , order_item o where orderList_id = "'.$orderList_id.' "and w.watch_id = o.watch_id;');
        foreach($orderItem as  $oi){
            $index = 'order_item'.$oi['watch_id'];
            if(!is_numeric($_POST[$index])){
                $msg->error("Quantity must input integer");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
        }
        try {
            // 新增到資料庫
            $table = 'ORDER_LIST';
            $data_array = array(
                "state" => $state,
                "r_name" => $Receiver_Name,
                "r_address" => $Receiver_Address,
                "r_phone" => $Receiver_Phone,
                "r_email" => $Receiver_Email,
                "cost" => $Cost,
            );
            Database::get()->Update($table, $data_array, "orderList_id", $orderList_id);
            foreach($orderItem as  $oi){
                $index = 'order_item'.$oi['watch_id'];
                Database::get()->execute('UPDATE ORDER_ITEM SET quantity = '.$_POST[$index].' where watch_id="'.$oi['watch_id'].'" and orderList_id="'.$orderList_id.'";');
            }
            $msg->success("Update order information success");
            header('Location: ' . Config::BASE_URL.'manage_order');
            exit;

            //else catch the exception and show the error.
        } catch (PDOException $e) {
            $error[] = $e->getMessage();
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
