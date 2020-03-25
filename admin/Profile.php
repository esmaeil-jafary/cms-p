<?php include "Incs/header.php" ?>
<?php include "Incs/Navigation.php" ?>
    <div id="wrapper">

    <!-- Sidebar -->
<?php include "Incs/Sidebar.php" ?>
<?php
//ابتدا باید اطلاعات کاربر را از دیتا بیس بخواند
$UserObj=new User();
//الان باید بگوئیم اگر سیشن ما ست شده بود انجام بده
if (isset($_SESSION['UserName'])){
    $User= $UserObj->getUserByUsername($_SESSION['UserName']);
}
if (isset($_POST["SubmitEditUser"])) {
    $UserObj->UpdateUser($User["id"], $_POST["UserName"], $_POST["Password"], $_POST["FirstName"], $_POST["LastName"], $_POST["Email"], $_POST["Rol"]);
    $pagename=$_SERVER["PHP_SELF"];
    header("Location: $pagename ");
}
?>
    <div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">داشبورد</a>
            </li>
            <li class="breadcrumb-item active">پروفایل کاربر</li>
        </ol>
        <!--            الان می خواهیم تک جدول درست کنیم تا کتگوری ها را نمایش دهد-->
        <!--            tr>th*8 برای زمانی که زیاد می خواهیم.بعدش تب میزنیم-->
        <div class="row">
            <div class="col">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="UserName">نام کاربری:</label>
                        <input type="text" class="form-control" name="UserName" value="<?=$User["UserName"]?>" id="UserName">
                    </div>
                    <div class="form-group">
                        <label for="Password">پسورد:</label>
<!--                        چون هنگام آپدیت کردن از پروفایل پسورد مجدد ذخیره نمیشد باید آن را دوباره دستی وارد کنیم تا زمان هشت شدن بهم نریزد و بتوان لاگین کرد-->
                        <input type="password" class="form-control" name="Password"  id="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="FirstName">نام:</label>
                        <input type="text" class="form-control" name="FirstName" value="<?=$User["FirstName"]?>" id="FirstName">
                    </div>
                    <div class="form-group">
                        <label for="LastName">نام خانوادگی:</label>
                        <input type="text" class="form-control" name="LastName" value="<?=$User["LastName"]?>" id="LastName">
                    </div>
                    <div class="form-group">
                        <label for="Email">ایمیل:</label>
                        <input type="text" class="form-control" name="Email" value="<?=$User["Email"]?>" id="Email">
                    </div>
                    <div class="form-group">
                        <label for="Rol">Rol: </label>
                        <!--        برای نمایش رول ها باید بگوئیم اگر ادمین انتخاب شده بود ادمین را نمایش بده . اگر سابسکرابر انتخاب شده بود آن را نشان بده-->
                        <select class="form-control" name="Rol">

                            <option value="Subscriber" <?php if ($User["Rol"]=="Subscriber") echo "selected" ?> >Subscriber</option>
                            <option value="Admin" <?php if ($User["Rol"]=="Admin") echo "selected" ?> >Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="SubmitEditUser" value="  ویرایش پروفایل" class="btn btn-lg btn-primary">

                </form>

            </div>

        </div>
        <!-- Icon Cards-->




    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->

<?php include "Incs/Footer.php" ?>