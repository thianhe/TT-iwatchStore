<?php
$_PageBeforeLoginOut = 'index';
if(isset($_SESSION['memberID'])){
    $userData = Database::get()->execute('SELECT * from members where member_id = '.$_SESSION['memberID'].'');
    $userData = $userData[0];
    include('view/header/header.php');
    include('view/body/active_account.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}