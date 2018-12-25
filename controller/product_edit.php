<?php
$_PageBeforeLoginOut = 'index';

if(isset($_SESSION['memberID']) and $_SESSION['memberID'] <=0){
    if(isset($_POST['watch_id']) or isset($_SESSION['updateKey']))
    {
        if(isset($_POST['watch_id'])) $watch_id = $_POST['watch_id'];
        if(isset($_SESSION['updateKey'])) $watch_id = $_SESSION['updateKey'];
        $watchInfo =  Database::get()->execute('select * from WATCH w,company,operating_system o where watch_id = "'.$watch_id.'" and brand_id = company_id and w.op_id = o.op_id;');
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