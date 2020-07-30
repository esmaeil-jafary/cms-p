<?php
//برای اینکه ما در صفحاتی بکه از سیشن استفاده می کنیم ابتدا باید سیشن را استارت کنیم  آن را در هدر خود استارت می کنیم تا در همه جا اعمال گرد
session_start();
include_once "inc/classes/db.php" ;
include_once "inc/classes/Categorys_cls.php" ;

include_once "classes/Menu_Cls.php";
include_once "inc/classes/User_Cls.php";
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سایت IT FIELD</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="/cms-p/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>



<!-- Start Header -->

