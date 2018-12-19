<?php
if(isset($_POST['submit'])) 
{
  $gump = new GUMP();
  $_POST = $gump->sanitize($_POST); 
  $filter_rules_array = array(
      'account' =>'trim',
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
  } 
  //if no errors have been created carry on
  if(count($error) == 0)
  {
    try {
      // 新增到資料庫
      $table = 'MEMBER';
      $data_array = array(
        "first_name" => $firstName,
        "last_name" => $lastName,
        "phone_number" => $phoneNumber,
        "birthday" => $bday,
        "gender" => $gender
      );
      Database::get()->Update($table,$data_array,"account",$account);
      
        $msg->success("Update user information success");
        //redirect to login page
        header('Location: user_setting');
        exit;

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