<?php
if (isset($_POST['submit'])) {

    $response = $_POST["g-recaptcha-response"];
    $data = array(
		'secret' => '6LdlbIQUAAAAAKp_CyJ7yjAhIQweRpYleJz81aS8',
		'response' => $_POST["g-recaptcha-response"]
    );
    $options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
    );
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);
	if ($captcha_success->success==false) {
        $msg->error('You are a bot! Go away!');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
	}


    $gump = new GUMP();
    $_POST = $gump->sanitize($_POST);
    $validation_rules_array = array(
        'account'    => 'required|alpha_numeric|max_len,20|min_len,3',
    'email'       => 'required|valid_email',
    'password'    => 'required|max_len,20|min_len,3',
    'passwordConfirm' => 'required',
    'phoneNumber' => 'integer',
    );
    $gump->validation_rules($validation_rules_array);
    $filter_rules_array = array(
        'account' => 'trim|sanitize_string',
        'email' => 'trim|sanitize_email',
        'password' => 'trim',
        'passwordConfirm' => 'trim',
        'firstName' => 'trim',
        'lastName' => 'trim',
        'phoneNumber' => 'trim',
        'bday' => 'trim',
        'gender' => 'trim',
        'identity' => 'trim',
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
        $userVeridator = new UserVeridator();
        $userVeridator->isPasswordMatch($password, $passwordConfirm);
        $userVeridator->isEmailDuplicate($email);
        $userVeridator->isAccountDuplicate($account);
        $error = $userVeridator->getErrorArray();
    }
    //if no errors have been created carry on
    if (empty($userVeridator->getErrorArray())) {
        //hash the password
        $passwordObject = new Password();
        $hashedpassword = $passwordObject->password_hash($password, PASSWORD_BCRYPT);
        //create the random activasion code
        $activasion = md5(uniqid(rand(), true));
        try {
            // 新增到資料庫
            if ($identity == 'C') {
                $id = Database::get()->getLastId("member_id", "MEMBER") + 1;
            } else if ($identity == 'S') {
                $id = Database::get()->getMinId("member_id", "MEMBER") - 1;
            }

            $table = 'MEMBER';
            $data_array = array(
                'member_id' => $id,
                "first_name" => $firstName,
                "last_name" => $lastName,
                'account' => $account,
                'password' => $hashedpassword,
                'email' => $email,
                "phone_number" => $phoneNumber,
                "birthday" => $bday,
                "gender" => $gender,
                "address" => $address,
                //'active' => $activasion
            );
            Database::get()->insert($table, $data_array);

            if (isset($id) and !empty($id) and is_numeric($id)) {
                // 寄出認證信
                $subject = "Registration Confirmation";
                /*$body = "<p>Thank you for registering at demo site.</p>
                <p>To activate your account, please click on this link: <a href='".Config::BASE_URL."activate/$id/$activasion'>".Config::BASE_URL."activate/$id/$activasion</a></p>
                <p>Regards Site Admin</p>";*/
                $body = "<p>Thank you for registering at demo site.</p>";
                $mail = new Mail(Config::MAIL_USER_NAME, Config::MAIL_USER_PASSWROD);
                $mail->setFrom(Config::MAIL_FROM, Config::MAIL_FROM_NAME);
                $mail->addAddress($email);
                $mail->subject($subject);
                $mail->body($body);
                $mail->send();
                $msg->success("Create user success");
                //redirect to login page
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } else {
                $error[] = "Registration Error Occur on Database.";
            }
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
