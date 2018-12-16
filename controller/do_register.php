<?php
if(isset($_POST['submit'])) 
{
  $gump = new GUMP();
  $_POST = $gump->sanitize($_POST); 
  $validation_rules_array = array(
    'account'    => 'required|alpha_numeric|max_len,20|min_len,3',
    'email'       => 'required|valid_email',
    'password'    => 'required|max_len,20|min_len,3',
    'passwordConfirm' => 'required'
  );
  $gump->validation_rules($validation_rules_array);
  $filter_rules_array = array(
    'account' => 'trim|sanitize_string',
    'email'    => 'trim|sanitize_email',
    'password' => 'trim',
    'passwordConfirm' => 'trim',
    'firstName' => 'trim',
    'lastName' => 'trim',
    'phoneNumber' => 'trim',
    'bday' => 'trim',
    'gender'=> 'trim'
  );
  $gump->filter_rules($filter_rules_array);
  $validated_data = $gump->run($_POST);
  if($validated_data === false) {
    $error = $gump->get_readable_errors(false);
  } else {
    // validation successful
    foreach($filter_rules_array as $key => $val) {
      ${$key} = $_POST[$key];
    }
    $userVeridator = new UserVeridator();
    $userVeridator->isPasswordMatch($password, $passwordConfirm);
    $userVeridator->isEmailDuplicate($email);
    $userVeridator->isAccountDuplicate($account);
    $error = $userVeridator->getErrorArray();
  } 
  //if no errors have been created carry on
  if(count($error) == 0)
  {
    //hash the password
    $passwordObject = new Password();
    $hashedpassword = $passwordObject->password_hash($password, PASSWORD_BCRYPT);
    //create the random activasion code
    $activasion = md5(uniqid(rand(),true));
    try {
      // 新增到資料庫
      $id = Database::get()->getLastId("member_id","MEMBER");
      $table = 'MEMBER';
      $data_array = array(
        'member_id'=>$id+1,
        "first_name" => $firstName,
        "last_name" => $lastName,
        'account' => $account,
        'password' => $hashedpassword,
        'email' => $email,
        "phone_number" => $phoneNumber,
        "birthday" => $bday,
        "gender" => $gender
        //'active' => $activasion
      );
      Database::get()->insert($table, $data_array);
      
      if(isset($id) AND !empty($id) AND is_numeric($id)){
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
        //redirect to index page
        header('Location: '.Config::BASE_URL.'login');
        exit;
      }else{
        $error[] = "Registration Error Occur on Database.";
      }
    //else catch the exception and show the error.
    } catch(PDOException $e) {
        $error[] = $e->getMessage();
    }
  }
  if(isset($error) AND count($error) > 0){
    foreach( $error as $e) {
        $msg->error($e);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

}else{
  header('Location: ' . Config::BASE_URL);
  exit;
}