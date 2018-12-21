<?php
if (isset($_POST['submit'])) {
    $_SESSION['updateKey'] = $_POST['account'];
    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $validation_rules_array = array(
        'phoneNumber' => 'integer',
    );
    $gump->validation_rules($validation_rules_array);
    $filter_rules_array = array(
        'account' => 'trim',
        'firstName' => 'trim',
        'lastName' => 'trim',
        'phoneNumber' => 'trim',
        'bday' => 'trim',
        'gender' => 'trim',
        'address' => 'trim',
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
            $table = 'MEMBER';
            $data_array = array(
                "first_name" => $firstName,
                "last_name" => $lastName,
                "phone_number" => $phoneNumber,
                "birthday" => $bday,
                "gender" => $gender,
                "address" => $address,
            );
            Database::get()->Update($table, $data_array, "account", $account);
            $msg->success("Update user information success");
            //redirect to login page
            header('Location: manage_user');
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
