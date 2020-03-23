<?php
//الان باید از سیشن استفاده کنیم تا یوزر پسورد و قخم را به دیتا بیس ارسال کند
session_start();
include_once "inc/classes/db.php";
include_once "inc/classes/User_Cls.php";
if (isset($_POST["LoginSubmit"])){
    $UserName=$_POST["UserName"];
    $Password=$_POST["Password"];
//    الان باید یوزرها را از دیتا بیس بخوانیم و آن یوزری که رول آن ادمین است بتواند ورود بکند
$UserObj=new User();
//الان بایددر بخش هدر ارتباط این صفحه با هدر را برقرار کنیم
$User=$UserObj->getUserByUsername($UserName);
if (count($User)>0 && ($User["UserName"] === $UserName && $User["Password"] === $Password)) {
 $_SESSION["UserName"]=$UserName;
 $_SESSION["Rol"]=$User["Rol"];
 $_SESSION["FirstName"]=$User["FirstName"];
 $_SESSION["LastName"]=$User["LastName"];
    //1-اگر یوزر و پسورد دقیقا درست بودن هدر کن به صفحه ادمین
    header("Location:admin");
}
    else{
        header("Location: index.php");
    }
}
if (isset($_GET["Logout"])) {
    unset($_SESSION["Rol"]);
    unset($_SESSION["UserName"]);
    header("location: index.php");
}
?>