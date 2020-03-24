<?php
$UserObj=new User();
if (isset($_GET["Uid"])){
    $UserObj=new User();
    $User=$UserObj->getUser($_GET["Uid"]);
}
if (isset($_POST["SubmitEditUser"])){
$UserObj->UpdateUser($_GET["Uid"],$_POST["UserName"],$_POST["Password"],$_POST["FirstName"],$_POST["LastName"],$_POST["Email"],$_POST["Rol"]);
$pagename=$_SERVER["PHP_SELF"];
header("Location: $pagename ");

}
?>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="UserName">نام کاربری:</label>
        <input type="text" class="form-control" name="UserName" value="<?=$User["UserName"]?>" id="UserName">
    </div>
    <div class="form-group">
        <label for="Password">پسورد:</label>
        <input type="password" class="form-control" name="Password"  value="<?=$User["Password"]?>" id="Password">
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
    <input type="submit" name="SubmitEditUser" value="  ثبت ویرایش" class="btn btn-lg btn-primary">

</form>



