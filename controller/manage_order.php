<?php
if(isset($_POST['orderList_id']) or isset($_SESSION['updateKey']))
{   
    if(isset($_POST['orderList_id']))  $orderList_id = $_POST['orderList_id'];
    if(isset($_SESSION['updateKey'])) $orderList_id = $_SESSION['updateKey'];
    unset($_SESSION['updateKey']);
}
$orderInfo =  Database::get()->execute('select m.account as account, orderList_id,o.member_id as member_id ,cost,date_time,state,r_name,r_address,r_phone,r_email from member m,order_list o where m.member_id = o.member_id and orderList_id ="'.$orderList_id .'" ;');
$orderItem = Database::get()->execute('SELECT * FROM watch w , order_item o where orderList_id = "'.$orderList_id.' "and w.watch_id = o.watch_id;');
$orderInfo = $orderInfo[0];
include('view/header/header.php');
include('view/body/manage_order.php');
include('view/footer/footer.php');
