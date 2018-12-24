<?php
    $watch_id=$_GET['id'];
    $watchInfo =  Database::get()->execute('select * from WATCH w,company,operating_system o where watch_id = "'.$watch_id.'" and brand_id = company_id and w.op_id = o.op_id;');
    $watchInfo = $watchInfo[0];
    
    $dir = './image/product/'.$watch_id.'/';
    $images = [];
    if (file_exists($dir)) {
        $files= scandir($dir); 
        //array_shift($images);
        //array_shift($images);
    }
    
    $brandList = Database::get()->execute('select * from company');
    $opList = Database::get()->execute('select * from operating_system');
    $opList[] = array_shift($opList);
    
    $inCart = false;
    foreach($_SESSION['shopping_cart'] as $cart){
        if($cart->product_id == $watchInfo['watch_id']) $inCart = true;
    }

    $inTrace =false;
    if(isset($_SESSION['memberID'])){
        $traceList = Database::get()->execute('SELECT * from trace_list where watch_id ='.$watch_id.' and member_id = '.$_SESSION['memberID'].'');
        $inTrace = isset($traceList[0]);
    }

    include('view/header/header.php');
    include('view/body/product_info.php');
    include('view/footer/footer.php');
?>  