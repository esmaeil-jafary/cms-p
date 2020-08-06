<!--برای فراموش کردن رمز عبور می باشد و چون شبیه صفحه رجیستر است از ریجستر کپی می گیریم-->
<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>
<?php
include_once "inc/classes/db.php";
include_once "inc/classes/User_Cls.php";
//پیغام خطا برای تکرار مجدد اشتباه پسورد
$ErrorMsg = '';
require 'vendor/autoload.php';
require 'inc/classes/MailConfig_cls.php';
include_once 'inc/classes/Email_Cls.php';
//در ابتدا باید چک کنیم ببینیم ایمیلی که کاربر می فرستد وجود دارد یا نه
$UserObj=new User();
//حالا برای ارسال ایمیل باید یک ایمیل آبجکت ایجاد کنیم
$EmailObj=new Email();
if (isset($_POST["SendMail"])) {
    $Email=$_POST["Email"];
    $User=$UserObj->getUserByEmail($Email);
if ($User){
//ابتدا باید یک لینک درست بکنیم و بعد باید یک ایمیل ارسال کنیم به کاربر برای ورود جهت تعویض پسورد
//    بعد باید یه توکن و کلید ایجاد کنیم که فقط مربوط به آن کاربر باشد و باید در جئول یوزر یه فیلد اضافه کنیم و توکن ها را ذخیره کنیم
//یعنی یوزر را می گیریم و اگر وجود داشت یک نوکن بوسیله تابع زیر که اعداد باینری را تبدیل می کند به حروف وباید یک عدد تصادفی تولید کنیم و بدهیم به تابعمان که با روش دودویی توکن بسازد تولید می کنیم
$Token=bin2hex(openssl_random_pseudo_bytes(16));
//الان توکن 16 رقمی تولید می کند و ما باید در دیتا بیس برای یوزر خوود ذخیره بکنیم
    $UserObj->UpdateToken($User["id"],$Token );
    $Uid=$User["id"];
//    خطا دارد نمیدانم چرا لینک تگ ا  کار نمیکند
  $EmailText=" Link ra dar mororgar copy konid : <a href='http://localhost/cms-p/Reset?Token=$Token&Uid=$Uid'> Click Me </a>";

if ($EmailObj->SendEmile("ResetPassword",$EmailText,$Email)){
header("Location:/cms-p/index.php");
}
$ErrorMsg="ارسال ایمیل موفقیت آمیز نبود";
}else{
    $ErrorMsg='ایمیل اشتباه می باشد';
}
}

?>
<div class="container">

    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto ">
                    <!--                    برای نمایش خطای تکرار پسورد-->
                    <!--                    <span class=" alert-danger">--><? //=$ErrorMsg?><!--</span>-->
                    <!--                    اوتو کامپلیت برای این است که در فیلد ها نام هایی که از قبل وجود داشته را نمایش ندهد-->
                    <form class="" method="post" autocomplete="off">

                        <div class="form-group">
                            <label for="">ایمیل : </label>
                            <input type="Email" class="form-control" name="Email" placeholder="ایمیل را وارد نمایید"
                                   required>
                        </div>


                        <input type="submit" name="SendMail" value=" ارسال ایمیل" class="btn btn-success btn-lg">
                    </form>
                </div>

            </div>
        </div>


    </div>


    <?php include "inc/footer.php" ?>


