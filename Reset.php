<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>

<?php
include_once "inc/classes/db.php";
include_once "inc/classes/User_Cls.php";
//پیغام خطا برای تکرار مجدد اشتباه پسورد
$ErrorMsg='';
if (isset($_POST["Reset"])){


    $Password=$_POST["Password"];
    $PasswordConfirm=$_POST["PasswordConfirm"];
//    اگر هرکدامشان خالی بود
    if ( empty($Password) || empty($PasswordConfirm)){
        die("لطفا تمامی مقادیر را وارد نمایید");
    }
    if ($Password!==$PasswordConfirm){
        $ErrorMsg="تکرار پسورد صحیح نمی باشد";
    }
    $UserObj=new User();
    $Uid=$_GET["Uid"];
    $Token=$_GET["Token"];
//    الان باید دنبال یک یو ایدی بگردیم و ببینیم آیا توکن ان همین است یا خیر
    $User=$UserObj->getUser($Uid);
    if ($User["Token"]===$Token){
//        یعنی اگر در جدول یوزر یو آیدی مورد نظر توکن مورد نظر موجود بود اجازه اضافه کردن پسورد را بده

//        حالا باید پسورد هشت شده جدید را بعنوان پسورد جدید ذخیره بکنیم

        $UserObj->UpdateUser($User["id"],$User["UserName"],$Password,$User["FirstName"],$User["LastName"],$User["Email"],$User["Rol"]);
        header("Location: /cms-p/index");
    }else{
        $ErrorMsg="توکن امنیتی شما صحیح نمی باشد";
    }

}

?>
<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto ">
                    <!--                    برای نمایش خطای تکرار پسورد-->
                    <span class=" alert-danger"><?=$ErrorMsg?></span>
                    <!--                    اوتو کامپلیت برای این است که در فیلد ها نام هایی که از قبل وجود داشته را نمایش ندهد-->
                    <form class="" method="post" autocomplete="off">

                        <div class="form-group">
                            <label for="">پسورد : </label>
                            <input type="Password" class="form-control" name="Password" placeholder="پسورد را وارد نمایید" required>
                        </div>
                        <div class="form-group">
                            <label for="">تکرار پسورد : </label>
                            <input type="Password" class="form-control" name="PasswordConfirm" placeholder="پسورد را دوباره وارد نمایید" required>
                        </div>
                        <input type="submit" name="Reset" value="ریست پسورد  " class="btn btn-success btn-lg">
                    </form>
                </div>

            </div>
        </div>


    </div>
    <!--</div>-->
    <?php include "inc/footer.php" ?>

