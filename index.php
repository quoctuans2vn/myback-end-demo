<?php
    session_start();
    $GLOBALS['DB'] = new mysqli('localhost','root','','user');
    $c = (isset($_GET['c']))?$_GET['c'].'Controller':'HomeController';
    $a = (isset($_GET['a']))?$_GET['a']:'index';
    require_once 'Controller/'.$c.'.php';
    $controller = new $c();
    $controller->$a();
    /**
     * 
     * /host/controller/action/
     */
    /*
    $dir = explode('/',$_SERVER['REQUEST_URI']);
    
    $c = (isset($dir[2])&&$dir[2])?$dir[2].'Controller':'HomeController';
    $a = (isset($dir[3])&&$dir[3])?$dir[3]:'index';
    require 'Controller/'.$c.'.php';
    $controller = new $c();
    $controller->$a();
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="http://localhost/myback-end-demo/" />
    <title>Document</title>
    <link rel="stylesheet" href=<?php echo "asset/css/bootstrap.min.css"?> />
    <link rel="stylesheet" href=<?php echo "asset/css/style.css"?> />
    <script src=<?php echo "asset/js/jquery-3.3.1.min.js"?>></script>
    <script src=<?php echo "asset/js/bootstrap.js"?>></script>
    <script src=<?php echo "asset/js/popper.min.js"?>></script>
    <script src=<?php echo "asset/js/main.js"?>></script>
</head>
<body class="bg-light container">
<?php
    require $controller->view;
?>

</body>
</html>