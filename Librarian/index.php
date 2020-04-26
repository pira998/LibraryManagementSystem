<?php 
session_start();

if(isset($_SESSION['username'])){

    $_SESSION['msg'] = "You must log in first to view this page";
    header("location: signin.php");
}

if(isset($_GET['logout'])){

    session_destroy();
    unset($_SESSION['username']);
    header("location:signin.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    hi
</body>
</html>




