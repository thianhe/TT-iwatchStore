<?php
$_PageBeforeLoginOut = 'products';
$productList =  Database::get()->execute('select * from WATCH w,company,operating_system o where company_id = brand_id and w.op_id = o.op_id order by watch_id;');
if(isset($_POST['searchValue'])){
    $productList =  Database::get()->execute('select * from WATCH w,company,operating_system o where company_id = brand_id and w.op_id = o.op_id and w.watch_name LIKE "%'.$_POST['searchValue'].'%" order by watch_id ;');
}
if(isset($_GET['brand'])){
    $productList =  Database::get()->execute('select * from WATCH w,company,operating_system o where company_id = brand_id and w.op_id = o.op_id and w.brand_id ='.$_GET['brand'].' order by watch_id ;');
}
if(isset($_GET['op'])){
    $productList =  Database::get()->execute('select * from WATCH w,company,operating_system o where company_id = brand_id and w.op_id = o.op_id and w.op_id ='.$_GET['op'].' order by watch_id ;');
}
if(isset($_GET['min']) && isset($_GET['max'])){
    $productList =  Database::get()->execute('select * from WATCH w,company,operating_system o where company_id = brand_id and w.op_id = o.op_id and w.price >='.$_GET['min'].' and w.price <='.$_GET['max'].' order by watch_id ;');
}
$brandList = Database::get()->execute('select * from company');
$opList = Database::get()->execute('select * from operating_system');
$opList[] = array_shift($opList);
include('view/header/header.php');
include('view/body/products.php');
include('view/footer/footer.php');