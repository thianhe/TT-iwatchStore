<?php
$_PageBeforeLoginOut = 'user_setting';
if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0){
    if(isset($_POST['watch_id']) or isset($_SESSION['updateKey']))
    {
        if(isset($_POST['watch_id']))  $watch_id = $_POST['watch_id'];
        if(isset($_SESSION['updateKey'])) $watch_id = $_SESSION['updateKey'];
        $watchInfo =  Database::get()->execute('select * from watch,company,operating_system where watch_id = "'.$watch_id.'";');
        $dir = './image/product/'.$watch_id.'/';
        $images= scandir($dir); 
        array_shift($images);
        array_shift($images);
        $watchInfo = $watchInfo[0];
        unset($_SESSION['updateKey']);
    }
    include('view/header/header.php');
    include('view/body/manage_product.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}