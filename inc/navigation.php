<?php include_once "inc/classes/Menu_Cls.php"?>
<!-- Navigation -->

<nav class="navbar navbar-expand-md navbar-dark bg-info mb-md-3 mt-1">
    <a class="navbar-brand" href="/web3/index">صفحه اصلی</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li> -->
            <?php
            $MenuObj = new Menu();
            $Menus = $MenuObj->getMenu();

            //برای اینکه سر منو ها را شناسای کنیم
            function getSubMenu($Menus, $MenuId = null)
            {
                $SubMenus = [];
                foreach ($Menus as $M) {
                    if ($M["parent_id"] == $MenuId) {
                        $SubMenus[] = $M;
                    }
                }
                return $SubMenus;
            }
            function renderMenu($Menus,$SubMenu){
//دو نوع ساب منو داریم که ممکن است خودش اخرین باشد و دیگر ساب منو نداشته باشد و یا خودش ساب منو دیگر هم داشته باشد
                $SubSubMenu=getSubMenu($Menus,$SubMenu["id"]);
//کوچکتر از یک یعنی خودش انتهایی بود
                if (count($SubSubMenu )<1){
                    echo " <li class=\"dropdown-item\"><a href='{$SubMenu['url']}'> {$SubMenu['name']}</a></li>";
                }
//اما اگر خودش ساب منو دارد
                else{
                    echo"<li class=\"dropdown-item dropdown-submenu\">";
                    echo "<a class=\"test\" tabindex=\"-1\" href=\"#\">{$SubMenu['Name']} <span class=\"caret\"></span></a>";
                    echo "<ul class=\"dropdown-menu\">";
//   حالا باید بگوییم رندر منو کن این ساب منو را
                    foreach ($SubSubMenu as $sMenu){
                        renderMenu($Menus,$sMenu);
                    }
                    echo "</ul>";
                    echo "</li>";

                }
            }
            ?>


<!--            <div class="container"> -->
                <!--    برای نمایش منو هنوها ابتدا باید منو های اصلی را پیدا کنیم-->
                <?php
                $MasterMenu = getSubMenu($Menus);
                //الان مستر منو  ها را می گیریم و باید یه حلقه ایجاد کنیم تا
                //قبلا حلقه را می بستیم اما پی اچ پی یک روش دیگر هم دارد  که بصورت زیر است
                foreach ($MasterMenu as $men): ?>
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle " type="button" data-toggle="dropdown"><?= $men["name"] ?>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <!--                برای اینکه منو باد زیر منوهای خود را صدا بزند از تابع بازگشتی استفتده می کنیم -->
                            <?php
                            //                        الان می گوئیم ساب منو های این منو را برای ما در بیاور
                            $SubMenus=getSubMenu($Menus,$men["id"]);
                            //                    حالا یک حلقه می گذاریم و می گوییم هر یاب منو که در اوردی باید ال ای ان را هم نمایش بدهی
                            foreach ($SubMenus as $subMenu){
//                    کل منو ها را به تابع رندر می دهیم و می گوییم ساب منو هایش را هم بیاور
                                renderMenu($Menus,$subMenu);

                            }
                            ?>
                        </ul>
                    </div>

                <?php endforeach; ?>



<!--                        <div class="input-group">-->
<!--                            <input  type="text" class="form-control">-->
<!--                            <span class="btn-group">-->
<!--                       <button  class="btn btn-primary " type="submit">-->
<!--                      <span class="fa fa-search "></span>-->
<!--                   </button>-->
<!--                </span>-->
<!--                        </div>-->
<!--                    </form>-->
<!--
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-cart-arrow-down"></i><span class="product-count">5</span></a>
            </li>
-->


                <div class="search-form">
                    <form method="post" action="/web3/Search.php" >
                        <input name="SearchQuery" type="text"  placeholder="جستجو کنید" required="" style="border-radius: 5px; border: 1px solid #d4cdcd; margin-right:20px; width: 250px">
                        <button name="SearchSubmit" type="submit" style="border-radius: 5px;"><i class="fa fa-search"></i></button>
                    </form>
                </div>




                <!--    برای ایجاد ajax-->

                <!--                <div class="form-group mt-5">-->
                <!--                    <input class="form-control" type="text" id="text" placeholder="type Is">-->
                <!--                </div>-->
                <div id="cn">

                </div>

            </div>
            <script>
                $(document).ready(function () {
                    $('.dropdown-submenu a.test').on("click", function (e) {
                        $(this).next('ul').toggle();
                        e.stopPropagation();
                        e.preventDefault();
                    });
                    $('#text').keydown(function (e) {
                        var value=$('#text').val();
                        $.ajax({
                            url:'Ajax.php?q='+value,
                            method:'get',
                            success:function (data) {
                                $('#cn').html(data);
                            }
                        });
                    })
                });
            </script>

            <?php
            $UserObj=new User();
            if (isset($_SESSION['UserName']) && $UserObj->IsAdmin($_SESSION["UserName"]) && strpos($_SERVER["PHP_SELF"],"Post.php")>0){
                echo '<li class="nav-item"><a class="nav-link" href="/web3/admin/Post.php?Type=EditPost&Pid='.$_GET["Pid"].'"> EditPost  </a></li>';
            }
            //            الان می گوییم اگر یوزر ادمین ورود نکرده بود دکمه ادمین را نمایش نده و زمانیکه ورود کرده بوده نمایش بده
            if (isset($_SESSION["UserName"]) && $UserObj->IsAdmin($_SESSION["UserName"])){ ?>


                <li class="nav-link">
                   <button class="btn-danger"> <a class="nav-link" href="/web3/admin">Admin</a></button>
                </li>
            <?php }
            ?>
        </ul>
        <!--<span class="navbar-text">-->
        <!--Navbar text with an inline element-->
        <!--</span>-->
    </div>
</nav>

<div class="row">

<div class="card bg-light mb-4 col-md-3">

    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4>ثبت نام/ورود</h4>
            </div>
            <div class="col-md-6">
                <a href="Register" class="btn btn-secondary">ثبت نام</a>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="Login.php" >
                <input class="form-control mb-1" name="UserName" placeholder="نام کاربری را وارد نمایید">
                <div class="input-group">
                    <input type="password" name="Password" class="form-control" placeholder="کلمه عبور را وارد نمایید">

                    <button name="LoginSubmit" class="btn btn-primary " type="submit">ورود</button>
                    </span>
                </div>
            </form>
            <!--            برای قسمت فراموش گردن پسورد و ارسال مجدد پسور. و یک نقطه اسلش در آدرس دهی یعنی همینجا که هستیمد-->
            <a href="./ForgotPassword">رمز عبور را فراموش کرده ام؟</a>
        </div>
        <!-- /.input-group -->
    </div>


</div>
    <div class="col-md-9 mb-4 ">

        <div>
            <section class="slider rounded-top" data-aos="fade-up">
                <div class="owl-carousel slider-carousel">
                    <div class="slider-area" style="background-image:url(assets/images/slider_bg_01.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slider-content row height-250 align-items-center">
                                        <div class="col-md-6">
                                            <div class="slider-text text-white">
                                                <h2 class="display-4">کارشناسان برای حل مشکل <span>کسب و کار</span>   و چالش ها و مسائل های شما اینجا هستند.</h2>
                                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                                                <a href="#" class="button-one mt-4">بیشتر ببینید</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img class="img-fluid" src="assets/images/slider_01.png" alt="slider" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</header>



