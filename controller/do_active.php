<?php
if(isset($_POST['active'])){
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
    $userData = Database::get()->execute('SELECT * from member where member_id = '.$_SESSION['memberID'].'');
    $userData = $userData[0];
    if($userData['active'] == $_POST['active']){
        Database::get()->execute('UPDATE member set active = "active" where member_id = '.$_SESSION['memberID'].'');
    }else{
        $msg->error("Activation code not match.");
    }
}
if(isset($_GET['id']) && isset($_GET['activation'])){
    $userData = Database::get()->execute('SELECT * from member where member_id = '.$_GET['id'].'');
    $userData = $userData[0];
    if($userData['active'] == $_GET['activation']){
        Database::get()->execute('UPDATE member set active = "active" where member_id = '.$_GET['id'].'');
        $msg->success("Activation success.");
        header('Location: login');
        exit;
    }else{
        $msg->error("Activation error.");
    }
}
header('Location: index');
?>