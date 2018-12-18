<?php
$_PageBeforeLoginOut = 'index';
if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0){
    include('view/header/header.php');
    include('view/body/user_setting.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}