<?php
//دستور اوبی برای اجرای بهتر هدر کردن می باشد
ob_start();
include_once "../inc/classes/db.php";
include_once "../inc/classes/Categorys_cls.php";
include_once "../inc/classes/Post_Cls.php";
include_once "../inc/classes/Comment_Cls.php";
include_once "../inc/classes/User_Cls.php";
include_once "../inc/classes/Report_Cls.php";
include_once "../inc/classes/OnlineUser_Cls.php";
include_once "../inc/classes/News_Cls.php";



//الان چون درصفحه لاگین سیژن را استارت کرده ایم می توانیم اطلعات دیتابیس را با سیژن بفرستیم مثل نام و نام خاوادگی و ..
session_start();
$UserObj=new User();
//الان باید رول را برسی کنیم تا اگر ادمین نیست نتواند ورود کند و به ایندکس برگردانده شود
//اگر سیشن مان رول نبود یا رول بود ولی ادمین نبود برش گردان به صفحه ایندکس
//گفتیم اگر رول وجود نداشت تا رول وجود داشت ولی یوزر ادمین نبود ما را برگرداند صفحه اصلی وگرنه درست است
if (!isset($_SESSION["Rol"]) || !$UserObj->IsAdmin($_SESSION["UserName"])){
    header("Location: ../");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>cms Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="/cms-p/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="/cms-p/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/cms-p/csbootf/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

</head>

<body id="page-top">
<script src="/cms-p/vendor/jquery/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!--برای سی کی ادیتور می باشد که برای محتوا ادیتور اضافه می کند-->
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>