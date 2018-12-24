<?php
$gump = new GUMP();
$_POST = $gump->sanitize($_POST);
$validation_rules_array = array(
    'email'       => 'required|valid_email',
);
$gump->validation_rules($validation_rules_array);
$filter_rules_array = array(
    'email' => 'trim|sanitize_email',
);
$gump->filter_rules($filter_rules_array);
$validated_data = $gump->run($_POST);
if ($validated_data === false) {
    $error = $gump->get_readable_errors(false);
} else {
foreach ($filter_rules_array as $key => $val) {
    ${$key} = $_POST[$key];
}
$activasion = md5(uniqid(rand(), true));
$table = 'MEMBER';
$memberID = $_SESSION['memberID'];
$data_array = array(
    'email' => $email,
    'active' => $activasion
);
Database::get()->update($table,$data_array,'member_id',$memberID);

$subject = "Registration Confirmation";
$body = "<p>Thank you for registering at demo site.<br> Your activation code is '".$activasion."'<br>.Or you can click on <a href='".Config::BASE_URL."do_active?id=".$memberID."&activation=".$activasion."'>this link</p>";
$mail = new Mail(Config::MAIL_USER_NAME, Config::MAIL_USER_PASSWROD);
$mail->setFrom(Config::MAIL_FROM, Config::MAIL_FROM_NAME);
$mail->addAddress($email);
$mail->subject($subject);
$mail->body($body);
$mail->send();
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
}
header('Location: ' . Config::BASE_URL);
?>