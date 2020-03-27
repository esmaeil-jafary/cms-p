<?php
$UserError='';
if (isset($_POST["SubmitNewUser"])){
    $UserObj=new User();

    try {
        $UserObj->AddUser($_POST["UserName"],$_POST["Password"],$_POST["FirstName"],$_POST["LastName"],$_POST["Email"],$_POST["Rol"]);
    } catch (Exception $e){
        $UserError="نام کاربری یا ایمیل از قبل موجود می باشد! لطفا نام یا ایمیل دیگری را وارد نمایید!";
    }
if (!$UserError){
    $PageName= $_SERVER["PHP_SELF"];
    header("location: $PageName ");
}
}
?>
<span class="alert-danger"><?=$UserError ?></span>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="UserName">نام کاربری:</label>
        <input type="text" class="form-control" name="UserName" id="UserName">
    </div>
    <div class="form-group">
        <label for="Password">پسورد:</label>
        <input type="password" class="form-control" name="Password" id="Password">
    </div>
    <div class="form-group">
        <label for="FirstName">نام:</label>
        <input type="text" class="form-control" name="FirstName" id="FirstName">
    </div>
    <div class="form-group">
        <label for="LastName">نام خانوادگی:</label>
        <input type="text" class="form-control" name="LastName" id="LastName">
    </div>
    <div class="form-group">
        <label for="Email">ایمیل:</label>
        <input type="text" class="form-control" name="Email" id="Email">
    </div>
    <div class="form-group">
        <label for="Rol">Rol: </label>
        <select class="form-control" name="Rol">
           <option value="Subscriber">Subscriber</option>
            <option value="Admin">Admin</option>
        </select>
    </div>
    <input type="submit" name="SubmitNewUser" value="ثبت" class="btn btn-lg btn-primary">
</form>
