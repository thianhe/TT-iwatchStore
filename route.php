<?php
    $route = new Router(Request::uri());
    $routeFile = $route->getParameter(1);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Library-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oxygen:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!--Include-->
    <script src="js/script.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="stylesheet" type="text/css" href="styles/<?php echo $routeFile; ?>.css" />
    <link rel="shortcut icon" type="image/x-icon" href="./image/icon/favicon.ico">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <?php
        $parameter = strtolower($route->getParameter(1));
        $controller_array = scandir('controller');
        $controller_array = array_change_key_case($controller_array, CASE_LOWER);
        if(isset($_SESSION['memberID'])){
            $result = Database::get()->execute('select active from members where member_id = "'.$_SESSION['memberID'].'"');
        }
        if(isset($_SESSION['memberID'])&& $result[0]['active'] != 'active' && $parameter!='do_send_active' && $parameter!='do_active'&& $parameter!='do_logout'){
            include 'controller/'.'active_account'.'.php';
        }
        else if (in_array($parameter . '.php', $controller_array)) {
            include 'controller/'.$parameter.'.php';
        } else {
            include 'controller/index.php';
        }
    ?>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

</html>