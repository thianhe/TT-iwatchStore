<?php
if(isset($_SESSION['memberID'])){
    
    $_SESSION['updateKey'] = $_POST['account'];
    Database::get()->execute('DELETE FROM trace_list where member_id = '.$_POST['member_id'].' and watch_id = '.$_POST['watch_id'].'');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
else{
    header('Location: login');
    exit;
}
?>