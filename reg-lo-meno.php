<?php include_once "inc/header.php"?>
<?php include_once "inc/navigation.php"?>
<div class="row">
    <div class="col-md-3"></div>
           <div class="card bg-light mb-4 col-md-6">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h1 style="color: #117a8b;text-align: center;"><u>ثبت نام/ورود</u></h1>
                    </div>
                    <div class="col-md-6">
                       <h3 style="float: left;margin-left: 40px;"><a href="/cms-p/Register" class="btn btn-info">ثبت نام</a></h3>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="/cms-p/Login.php" >
                        <label>نام کاربری:</label>
                        <input class="form-control mb-1" name="UserName" placeholder="لطفا نام کاربری را وارد نمایید">
                        <label>رمز عبور :</label>
                        <div class="input-group">

                            <input type="password" name="Password" class="form-control" placeholder="کلمه عبور را وارد نمایید">
                            <button name="LoginSubmit" class="btn btn-primary " type="submit">ورود</button>
                            </span>
                        </div>
                    </form>
                    <!--            برای قسمت فراموش گردن پسورد و ارسال مجدد پسور. و یک نقطه اسلش در آدرس دهی یعنی همینجا که هستیمد-->
                   <h3><a href="/cms-p/ForgotPassword">رمز عبور را فراموش کرده ام؟</a></h3>
                </div>
                <!-- /.input-group -->
            </div>


        </div>

    <div class="col-md-3"></div>
</div>

<?php include_once "inc/footer.php"?>