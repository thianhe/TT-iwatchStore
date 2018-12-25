<?php
$_PageBeforeLoginOut = 'index';

if(isset($_SESSION['memberID']) and $_SESSION['memberID'] <=0){
    $product =  Database::get()->execute('select * from WATCH,company where company_id = brand_id;');
    $brandList =  Database::get()->execute('select * from company;');
    $opList = Database::get()->execute('select * from OPERATING_SYSTEM');
    $othersOP = Database::get()->execute('select * from OPERATING_SYSTEM where op_id == 0;');
    $opList[] = array_shift($opList);
    if(isset($_POST['key']))
        {
            $key = $_POST['key'];
            $product =  Database::get()->execute('select *from WATCH,company where company_id = brand_id and (watch_name LIKE "%'.$key.'%" or brand LIKE "%'.$key.'%");');
        }

    include('view/header/header.php');
    include('view/body/product_setting.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}