<?php
Database::get()->execute('DELETE FROM discount where discount_id = '.$_POST['discount_id'].'');
header('Location: discount_setting' );
?>