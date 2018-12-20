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
