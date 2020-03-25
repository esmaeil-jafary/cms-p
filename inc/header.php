<?php
//برای اینکه ما در صفحاتی بکه از سیشن استفاده می کنیم ابتدا باید سیشن را استارت کنیم  آن را در هدر خود استارت می کنیم تا در همه جا اعمال گرد
session_start();
include_once "inc/classes/db.php" ;
include_once "inc/classes/Categorys_cls.php" ;


include_once "inc/classes/User_Cls.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>

<body>