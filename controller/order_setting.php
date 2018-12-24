<?php
$_PageBeforeLoginOut = 'index';

if(isset($_SESSION['memberID']) and $_SESSION['memberID'] <=0){
    $processingOrder =  Database::get()->execute('select m.account as account, orderList_id,o.member_id as member_id ,cost,date_time,state,r_name,r_address,r_phone,r_email from member m,order_list o where m.member_id = o.member_id and state ="p" ;');
    $confirmedOrder =  Database::get()->execute('select m.account as account, orderList_id,o.member_id as member_id ,cost,date_time,state,r_name,r_address,r_phone,r_email from member m,order_list o where m.member_id = o.member_id and state ="c" ;');
    $finishedOrder =  Database::get()->execute('select m.account as account, orderList_id,o.member_id as member_id ,cost,date_time,state,r_name,r_address,r_phone,r_email from member m,order_list o where m.member_id = o.member_id and state ="f" ;');
    if(isset($_POST['submit']))
    {
        if(isset($_POST['key']))
        {
            $key = $_POST['key'];
            $processingOrder =  Database::get()->execute('select m.account as account, orderList_id,o.member_id as member_id ,cost,date_time,state,r_name,r_address,r_phone,r_email from member m,order_list o where m.member_id = o.member_id and state ="p" and account LIKE "%'.$key.'";');
            $confirmedOrder =  Database::get()->execute('select m.account as account, orderList_id,o.member_id as member_id ,cost,date_time,state,r_name,r_address,r_phone,r_email from member m,order_list o where m.member_id = o.member_id and state ="c" and account LIKE "%'.$key.'";');
            $finishedOrder =  Database::get()->execute('select m.account as account, orderList_id,o.member_id as member_id ,cost,date_time,state,r_name,r_address,r_phone,r_email from member m,order_list o where m.member_id = o.member_id and state ="f" and account LIKE "%'.$key.'";');
        }
    }
   
    include('view/header/header.php');
    include('view/body/order_setting.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}