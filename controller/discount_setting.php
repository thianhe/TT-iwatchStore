<?php

$_PageBeforeLoginOut = 'index';
if (isset($_SESSION['memberID']) and $_SESSION['memberID'] <= 0) {
    $result = Database::get()->execute('select * from discount order by discount_id desc;');
    include 'view/header/header.php';
    include 'view/body/discount_setting.php';
    include 'view/footer/footer.php';
} else {
    header('Location: index');
}
