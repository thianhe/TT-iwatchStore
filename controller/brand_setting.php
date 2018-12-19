<?php

$_PageBeforeLoginOut = 'index';
if(isset($_SESSION['memberID']) and $_SESSION['memberID'] ==0){
    $result = Database::get()->execute('select c.brand as brandName, watch_id ,count(*) as productsNumber from watch w right outer join company c on c.company_id=w.brand_id group by c.company_id;');
    foreach($result as $key => $r){
        if(!isset($r['watch_id'])) $result[$key]['productsNumber'] = 0;
    }
    include('view/header/header.php');
    include('view/body/brand_setting.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}