<?php include "inc/header.php" ?>

<?php
include_once "inc/classes/db.php";
include_once "inc/classes/User_Cls.php";
include_once "inc/classes/Notification_Cls.php";
//پیغام خطا برای تکرار مجدد اشتباه پسورد
$ErrorMsg='';
if (isset($_POST["Register"])){
    $Username=$_POST["UserName"];
    $Email=$_POST["Email"];
    $Password=$_POST["Password"];
    $PasswordConfirm=$_POST["PasswordConfirm"];
//    اگر هرکدامشان خالی بود
if (empty($Username) || empty($Email) || empty($Password) || empty($PasswordConfirm)){
    die("لطفا تمامی مقادیر را وارد نمایید");
}
if ($Password!==$PasswordConfirm){
    $ErrorMsg="تکرار پسورد صحیح نمی باشد";
}
$UserObj=new User();
//حالا باید پسورد را بصورت هشت شده بکار ببریم
$Ops=["Cost"=>11];
$Hash= password_hash($Password,PASSWORD_BCRYPT,$Ops);
//برای اینکه چک کنیم تا یوزر و ایمیل تکراری وارد نکنیم
$ExistUser=$UserObj->getUserByUsername($Username);
if ($ExistUser){
    $ErrorMsg=" نام کاربری از قبل موجود است! نام دیگری انتخاب کنید";
}else{
//    حالا برای ایمیل تکراری می نویسیم
    try {
        $UserObj->RegisterUser($Username,$Email,$Hash);
//        برای ارسال ناتیفیکیشن
        $NotifObj=new Notification();
        $data=["Message"=>"$Username Just Registered."];
        $NotifObj->sendNotification($data);
    }catch (Exception $e){
        $ErrorMsg="ثبت نام انجام نشد ایمیل قبلا ثبت شده است";
    }
   }
if (!$ErrorMsg){
    header("location:index.php");
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
                            <label for="">نام کاربری:</label>
                            <input type="text" class="form-control" name="UserName" placeholder="نام کاربری را وارد نمایید" required>
                        </div>
                        <div class="form-group">
                            <label for="">ایمیل : </label>
                            <input type="Email" class="form-control" name="Email" placeholder="ایمیل را وارد نمایید" required>
                        </div>
                        <div class="form-group">
                            <label for="">پسورد : </label>
                            <input type="Password" class="form-control" name="Password" placeholder="پسورد را وارد نمایید" required>
                        </div>
                        <div class="form-group">
                            <label for="">تکرار پسورد : </label>
                            <input type="Password" class="form-control" name="PasswordConfirm" placeholder="پسورد را دوباره وارد نمایید" required>
                        </div>
                        <input type="submit" name="Register" value="ثبت نام" class="btn btn-success btn-lg">
                    </form>
                </div>

            </div>
        </div>


    </div>
<!--</div>-->
        <?php include "inc/footer.php" ?>
