<?php
$_PageBeforeLoginOut = 'user_setting';
if(isset($_SESSION['memberID'])){
    if(!isset($_POST['account']))
        $account = $_SESSION['account'];
    if(isset($_POST['account']) or isset($_SESSION['updateKey']))
    {   
        if(isset($_POST['account']))  $account = $_POST['account'];
        if(isset($_SESSION['updateKey'])) $account = $_SESSION['updateKey'];
        unset($_SESSION['updateKey']);
    }
    $userInfo =  Database::get()->execute('select * from MEMBER where account = "'.$account.'";');
    $userInfo = $userInfo[0];
    include('view/header/header.php');
    include('view/body/manage_user.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}