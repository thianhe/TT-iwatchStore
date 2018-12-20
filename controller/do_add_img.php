<?php
    $_SESSION['updateKey']= $_POST['watch_id'];
    $id =  $_POST['watch_id'];
    $file = $_FILES['images'];
    if (!file_exists('./image/product/'.$id)) {
        mkdir('./image/product/'.$id, 0777, true);
    }
    $total = count($_FILES['images']['name']);
    $imgDir = './image/product/'.$id.'/';
    $i = 0;
    while($i<$total)
    {
        move_uploaded_file($_FILES['images']['tmp_name'][$i],$imgDir.basename($_FILES['images']['name'][$i]));
        $i++;
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>