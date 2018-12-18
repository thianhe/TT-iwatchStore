<?php
if(isset($_SESSION['name'])) header('Location: index');
include('view/header/header.php');
include('view/body/register.php');
include('view/footer/footer.php');