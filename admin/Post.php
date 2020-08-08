<?php include "Incs/header.php" ?>
<?php include "Incs/Navigation.php" ?>
   <div id="wrapper">

    <!-- Sidebar -->
<?php include "Incs/Sidebar.php" ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">داشبورد</a>
                </li>
                <li class="breadcrumb-item active">پست ها</li>
            </ol>
<!--            الان می خواهیم تک جدول درست کنیم تا کتگوری ها را نمایش دهد-->
<!--            tr>th*8 برای زمانی که زیاد می خواهیم.بعدش تب میزنیم-->
            <div class="row">
                <div class="col">
<?php
if (isset($_GET["Type"])) {
//سوییچ بر روی یک متغیر چند شرط می گذارد
switch ($_GET["Type"]) {
//    یعنی اگز مقدار نیو پست فراخوانی شد از فرم
case "NewPost";
//زمانیکه نیو پست از صفحه نیو پست زده شد برای ما برک کند
    include "Incs/NewPost.php";
//برای ما برگردان
break;
//اگر ادیت پست زده شد در فرم ادیت
case "EditPost";
//زمانیکه ادیت زده شد برود به صفحه ادیت پوست
include "Incs/EditPost.php";
//برا ما برگردان
break;
//اما اگر هیچکدام از این ها نبود
    default:
//آن وقت برای ما اینکلود کن
//برای نمایش تمام پست میباشد
include "Incs/PostTableData.php";
break;
}
}
//اگر دکمه های سوییچ زده نشده بود
else{
    include "Incs/PostTableData.php";
}
?>

                </div>

            </div>
            <!-- Icon Cards-->




        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

<?php include "Incs/Footer.php" ?>