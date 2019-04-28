<?php
    session_start();
    $c = isset($_GET['c'])?$_GET['c']:'Home';
    $a = isset($_GET['a'])?$_GET['a']:'index';
    require 'Controller/'.$c.'Controller.php';
    $controller->$a();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./asset/css/style.css" />
    <script src="./asset/js/jquery-3.3.1.min.js"></script>
    <script src="./asset/js/bootstrap.js"></script>
    <script src="./asset/js/popper.min.js"></script>
    <script src="./asset/js/main.js"></script>
</head>
<body class="bg-light">
<?php 
    require $controller->view;
    ?>
</body>
</html>