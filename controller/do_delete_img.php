<?php
    $path = $_POST['path'];
    $_SESSION['updateKey']= $_POST['watch_id'];
    unlink($path);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>