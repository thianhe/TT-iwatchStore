<?php
$_PageBeforeLoginOut = 'index';

if(isset($_SESSION['memberID'])){
    if(isset($_POST['account']) or isset($_SESSION['updateKey']))
    {
        if(isset($_POST['account'])) $account = $_POST['account'];
        if(isset($_SESSION['updateKey'])) $account = $_SESSION['updateKey'];
        $userInfo =  Database::get()->execute('select * from MEMBERS where account = "'.$account.'";');
        $userInfo = $userInfo[0];
        unset($_SESSION['updateKey']);
    }
    include('view/header/header.php');
    include('view/body/user_edit.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}