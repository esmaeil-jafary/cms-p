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
<!--زمانیکه دکمه ثبت زده شده-->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card bg-primary text-white">
            <div class="card-header">
<!--                ?-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <i class="fa fa-file fa-5x " aria-hidden="true"></i>
                        </div>
                        <div class="col-md-9 text-right">
                            <div class='h2'>12</div>
                            <div>Post</div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="Post.php">
            <div class="card-footer text-dark">
                <span class="-pull-left">View Datalie</span>
                <span class="-pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card bg-success">
<!--            heading-->
            <div class="card-header"></div>
            <div class="container">
                <div class="row text-white">
                    <div class="col-md-3">
                        <i class="fa fa-comment fa-5x"></i>
                    </div>
                    <div class="col-md-9 text-right">
                        <div class="h2">23</div>
                        <div>comment</div>
                    </div>
                </div>
            </div>
            <a href="Comment.php">
                <div class="card-footer">
                    <span class="-pull-left">ViewDatails</span>
                    <span class="-pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-warning text-white">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <i class="fa fa-list fa-5x"></i>
                        </div>
                        <div class="col-md-9 text-right">
                            <div class='h2'>13</div>
                            <div>categories</div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="Category.php">
                <div class="card-footer">
                    <span class="-pull-left">ViewDatalis</span>
                    <span class="-pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>


