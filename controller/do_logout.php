<?php
/**
 * 清除登入資料
 */
unset($_SESSION['memberID']);
unset($_SESSION['name']);
/**
 * 導向登入頁
 */
header('Location: '.$_SERVER['HTTP_REFERER']);