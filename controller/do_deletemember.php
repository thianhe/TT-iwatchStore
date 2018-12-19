<?php
if(isset($_POST['submit'])) 
{
  $error = array(); 
  $gump = new GUMP();
  $_POST = $gump->sanitize($_POST); 
  $filter_rules_array = array(
      'account' => 'trim',
  );
  $gump->filter_rules($filter_rules_array);
  $validated_data = $gump->run($_POST);
  if($validated_data === false) {
    $error = $gump->get_readable_errors(false);
  } else {
    // basic validation successful
    foreach($filter_rules_array as $key => $val) {
      ${$key} = $_POST[$key]; // trans to local parameters
    }
    if(count($error) == 0){
        try {
            // 新增到資料庫
            $table = 'MEMBER';
            $id = $account;
            $key_column = "account";
            Database::get()->delete($table, $key_column,$id);
            $msg->success("Delete user '".$account."' success");
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
        } catch(PDOException $e) {
            $error[] = $e->getMessage();
        }
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
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  $msg->error("ee");
  exit;
}