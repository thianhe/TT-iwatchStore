<?php
$_PageBeforeLoginOut = 'user_setting';
if(isset($_SESSION['memberID'])){
    if(!isset($_POST['account']))
        $account = $_SESSION['account'];
    if(isset($_POST['account']) or isset($_SESSION['updateKey']))
    {   
        if(isset($_POST['account']))  $account = $_POST['account'];
        if(isset($_SESSION['updateKey'])) $account = $_SESSION['updateKey'];
        unset($_SESSION['updateKey']);
    }
    $userInfo =  Database::get()->execute('select * from MEMBERS where account = "'.$account.'";');
    $userInfo = $userInfo[0];
    $OrderList =  Database::get()->execute('select m.account as account, orderList_id,o.member_id as member_id ,cost,date_time,state,r_name,r_address,r_phone,r_email from members m,order_list o where m.member_id = o.member_id and o.member_id ="'.$_SESSION['memberID'].'" order by date_time DESC;');
    $traceList =  Database::get()->execute('select watch_name,quantity ,w.watch_id as watch_id from watch w, trace_list t where member_id ="'.$userInfo['member_id'].'" and w.watch_id = t.watch_id order by date_time DESC;');
    include('view/header/header.php');
    include('view/body/manage_user.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}