<?php
if(isset($_SESSION['memberID'])){
    $table = 'trace_list';
    $data_array = array(
        'watch_id'=>$_POST['watch_id'],
        'member_id'=>$_SESSION['memberID'],
        'date_time'=> date('Y-m-d H:i:s')
      );
    Database::get()->insert($table,$data_array);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
else{
    header('Location: login');
    exit;
}
?>