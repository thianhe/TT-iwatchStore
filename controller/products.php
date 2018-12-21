<?php
$_PageBeforeLoginOut = 'products';
$productList =  Database::get()->execute('select * from WATCH w,company,operating_system o where company_id = brand_id and w.op_id = o.op_id;');

include('view/header/header.php');
include('view/body/products.php');
include('view/footer/footer.php');