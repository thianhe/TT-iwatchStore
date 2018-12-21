<?php
    $watch_id=$_GET['id'];
    $watchInfo =  Database::get()->execute('select * from watch,company,operating_system where watch_id = "'.$watch_id.'";');
    $dir = './image/product/'.$watch_id.'/';
    $images = [];
    if (file_exists('./image/product/'.$watch_id)) {
    $images= scandir($dir); 
    array_shift($images);
    array_shift($images);
    }
    $watchInfo = $watchInfo[0];

    include('view/header/header.php');
    include('view/body/product_info.php');
    include('view/footer/footer.php');
?>  