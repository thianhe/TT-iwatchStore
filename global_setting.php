<?php
if(!isset($_SESSION['shopping_cart']))$_SESSION['shopping_cart'] = [];
if(!is_array($_SESSION['shopping_cart']))$_SESSION['shopping_cart'] = [];
?>