<?php
if (isset($_POST['submit'])) {
    $_SESSION['updateKey'] = $_POST['watch_id'];
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $validation_rules_array = array(
        'price' => 'integer',
        'quantity' => 'integer',
    );
    $gump->validation_rules($validation_rules_array);
    $filter_rules_array = array(
        'watch_id' => 'trim',
        'price' => 'trim',
        'quantity' => 'trim',
        'description' => 'trim',
        'op_id' => 'trim',
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
        try {
            // 新增到資料庫
            $table = 'WATCH';
            $data_array = array(
                "price" => $price,
                "quantity" => $quantity,
                "description" => $description,
                "op_id" => $op_id,
            );
            Database::get()->Update($table, $data_array, "watch_id", $watch_id);
            $msg->success("Update product information success");
            //redirect to login page
            header('Location: manage_product');
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
