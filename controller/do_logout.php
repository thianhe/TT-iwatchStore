<?php
/**
 * 清除登入資料
 */
unset($_SESSION['memberID']);
unset($_SESSION['name']);
unset($_SESSION['account']);
unset($_SESSION['shopping_cart']);
/**
 * 導向登入頁
 */
header('Location: '.$_SERVER['HTTP_REFERER']);