<?php
$_PageBeforeLoginOut = 'index';
if(isset($_SESSION['memberID']) and $_SESSION['memberID'] <=0){
    include('view/header/header.php');
    include('view/body/admin.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}