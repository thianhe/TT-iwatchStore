<?php
$_PageBeforeLoginOut = 'index';

if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0){
    if(isset($_POST['submit']))
    {
        if(isset($_POST['account']))
        {
            $account = $_POST['account'];
            $userInfo =  Database::get()->execute('select * from MEMBER where account = "'.$account.'";');
            $userInfo = $userInfo[0];
        }
    }
    include('view/header/header.php');
    include('view/body/user_edit.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}