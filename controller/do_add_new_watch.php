<?php
if(isset($_POST['submit'])) 
{
  $_SESSION['updateKey'] = $_POST['account'];
  $gump = new GUMP();
  $_POST = $gump->sanitize($_POST); 
  $validation_rules_array = array(
    'price' => 'integer',
    'quantity' => 'integer'
  );
  $gump->validation_rules($validation_rules_array);
  $filter_rules_array = array(
    'price' =>'trim',
    'quantity' => 'trim',
    'brand_id' => 'trim',
    'watch_name' => 'trim',
    'op_id' => 'trim',
    'description'=> 'trim'
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
        $id = Database::get()->getLastId("watch_id","WATCH") +1;
        $table = 'WATCH';
        $data_array = array(
          'watch_id'=>$id,
          "price" => $price,
          "quantity" => $quantity,
          'brand_id' => $brand_id,
          'watch_name' => $watch_name,
          'op_id' => $op_id,
          "description" => $description
        );
        Database::get()->insert($table, $data_array);
        $file = $_FILES['images'];
        if (!file_exists('./image/product/'.$id)) {
            mkdir('./image/product/'.$id, 0777, true);
        }
        $total = count($_FILES['images']['name']);
        $imgDir = './image/product/'.$id.'/';
        $i = 0;
        while($i<$total)
        {
          move_uploaded_file($_FILES['images']['tmp_name'][$i],$imgDir.basename($_FILES['images']['name'][$i]));
          $i++;
        }
        $msg->success("Add watch ".$watch_name." success");
        
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