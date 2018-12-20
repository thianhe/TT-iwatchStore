<?php
$_PageBeforeLoginOut = 'index';

if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0){
    if(isset($_POST['watch_id']) or isset($_SESSION['updateKey']))
    {
        if(isset($_POST['watch_id'])) $watch_id = $_POST['watch_id'];
        if(isset($_SESSION['updateKey'])) $watch_id = $_SESSION['updateKey'];
        $watchInfo =  Database::get()->execute('select * from WATCH,company,operating_system where watch_id = "'.$watch_id.'";');
        $watchInfo = $watchInfo[0];
        unset($_SESSION['updateKey']);
    }
    include('view/header/header.php');
    include('view/body/product_edit.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}