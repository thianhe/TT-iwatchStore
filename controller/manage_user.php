<?php
$_PageBeforeLoginOut = 'user_setting';
if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0){
    if(isset($_POST['account']))
    {
        $account = $_POST['account'];
        $userInfo =  Database::get()->execute('select * from MEMBER where account = "'.$account.'";');
        $userInfo = $userInfo[0];
    }
    include('view/header/header.php');
    include('view/body/manage_user.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}