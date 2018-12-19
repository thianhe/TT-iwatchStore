<?php
$_PageBeforeLoginOut = 'index';

if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0){
    $customerResult =  Database::get()->execute('select * from MEMBER where member_id > 0;');
    $staffResult =  Database::get()->execute('select * from MEMBER where member_id < 0;');
    if(isset($_POST['submit']))
    {
        if(isset($_POST['key']))
        {
            $key = $_POST['key'];
            $customerResult =  Database::get()->execute('select * from MEMBER where ((account LIKE "%'.$key.'") or (email LIKE "%'.$key.'")) and (member_id > 0);');
            $staffResult =  Database::get()->execute('select * from MEMBER where ((account LIKE "%'.$key.'") or (email LIKE "%'.$key.'")) and (member_id < 0);');
        }
    }
    include('view/header/header.php');
    include('view/body/user_setting.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}