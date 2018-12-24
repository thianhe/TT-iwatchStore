<?php
if(isset($_POST['active'])){
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