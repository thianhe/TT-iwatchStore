<?php
if (isset($_POST['submit'])) {
    $error = array();
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $filter_rules_array = array(
        'account' => 'trim',
    );
    $gump->filter_rules($filter_rules_array);
    $validated_data = $gump->run($_POST);
    if ($validated_data === false) {
        $error = $gump->get_readable_errors(false);
    } else {
        // basic validation successful
        foreach ($filter_rules_array as $key => $val) {
            ${$key} = $_POST[$key]; // trans to local parameters
        }
        if (count($error) == 0) {
            try {
                // 新增到資料庫
                $table = 'MEMBERS';
                $id = $account;
                $key_column = "account";
                Database::get()->delete($table, $key_column, $id);
                $msg->success("Delete user '" . $account . "' success");
                header('Location: user_setting');
                exit;
            } catch (PDOException $e) {
                $error[] = $e->getMessage();
            }
        }
    }
    if (isset($error) and count($error) > 0) {
        foreach ($error as $e) {
            $msg->error($e);
        }
        header('Location: user_setting');
        exit;
    }
} else {
    header('Location: user_setting');
    $msg->error("ee");
    exit;
}