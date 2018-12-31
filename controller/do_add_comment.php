<?php
$table = 'commentRate_List';
$data_array = array(
    'member_id'=>$_SESSION['memberID'],
    "watch_id" => $_POST['watch_id'],
    "comment_datetime" => date('Y-m-d H:i:s'),
    "rate" => $_POST['rate'],
    "comment" => $_POST['comment'],
  );
Database::get()->insert($table, $data_array);
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>