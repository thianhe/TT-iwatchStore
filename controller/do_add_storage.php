<?php
if(isset($_POST['submit'])) 
{
  $_SESSION['updateKey'] = $_POST['watch_id'];
  $gump = new GUMP();
  $_POST = $gump->sanitize($_POST); 
  $validation_rules_array = array(
    'cost' => 'integer',
    'quantity' => 'integer'
  );
  $gump->validation_rules($validation_rules_array);
  $filter_rules_array = array(
    'cost' =>'trim',
    'quantity' => 'trim',
    'watch_id' => 'trim',
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
        $id = Database::get()->getLastId("storage_id","STORAGE_LIST") +1;
        $table = 'STORAGE_LIST';
        $data_array = array(
          'storage_id'=>$id,
          'watch_id'=>$watch_id,
          'quantity'=>$quantity,
          'cost'=>$cost,
          'date_time'=> date('Y-m-d H:i:s')
        );
        Database::get()->insert($table, $data_array);
        $msg->success("Add storage ".$watch_name." success");
        
      //redirect to login page
      header('Location: ' . $_SERVER['HTTP_REFERER']);
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