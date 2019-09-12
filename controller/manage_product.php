<?php
error_reporting(E_ALL ^ E_WARNING);
$_PageBeforeLoginOut = 'user_setting';
if(isset($_SESSION['memberID']) and $_SESSION['memberID'] <=0){
    if(isset($_POST['watch_id']) or isset($_SESSION['updateKey']))
    {
        if(isset($_POST['watch_id']))  $watch_id = $_POST['watch_id'];
        if(isset($_SESSION['updateKey'])) $watch_id = $_SESSION['updateKey'];
        $watchInfo =  Database::get()->execute('select * from WATCH w,company,operating_system o where watch_id = "'.$watch_id.'" and brand_id = company_id and w.op_id = o.op_id;');
        
        $dir = './image/product/'.$watch_id.'/';
        if (file_exists('./image/product/'.$watch_id)) $images= scandir($dir); 
        array_shift($images);
        array_shift($images);
        $watchInfo = $watchInfo[0];
        unset($_SESSION['updateKey']);

        $storageList = Database::get()->execute('SELECT account,date_time, quantity, cost FROM storage_list,members where staff_id = member_id and watch_id='.$watch_id.'');
    }
    include('view/header/header.php');
    include('view/body/manage_product.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}