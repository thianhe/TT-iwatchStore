<?php
if(isset($_SESSION['name'])) header('Location: index');
include('view/header/header.php');
include('view/body/login.php');
include('view/footer/footer.php');