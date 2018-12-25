<?php
error_reporting(E_ALL ^ E_WARNING);
if(isset($_SESSION['memberID']) and $_SESSION['memberID'] <=0){
    if(isset($_POST['discount_id']) or isset($_SESSION['updateKey']))
    {
        if(isset($_POST['discount_id']))  $discount_id = $_POST['discount_id'];
        if(isset($_SESSION['updateKey'])) $discount_id = $_SESSION['updateKey'];
        $discountInfo =  Database::get()->execute('select * from discount where discount_id ='.$discount_id.';');
        $discountInfo = $discountInfo[0];
        unset($_SESSION['updateKey']);
    }
    include('view/header/header.php');
    include('view/body/discount_edit.php');
    include('view/footer/footer.php');
}
else{
    header('Location: index');
}