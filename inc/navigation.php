<?php include_once "inc/classes/Menu_Cls.php" ?>
<!-- Navigation -->

<div class="navbar bg-dark rounded" style="height: 35px; ">
    <div class="row">
        <ul>
    <a class="text-white" href="/cms-p/reg-lo-meno.php"><i class="fa fa-lock"></i>ورود</a>

        <a class="text-white mr-5 " href="/cms-p/Register.php"><i class="fa fa-pen"></i>ثبت نام</a></div>

       <?php
         include_once 'jdf.php';

    $day_number = jdate('j');
    $month_number = jdate('n');
    $year_number = jdate('y');
    $day_name = jdate('l');
    echo "<h5 class='text-white'> امروز $day_name ، $day_number-$month_number-$year_number</h5>";



  ?>

    </ul>
</div>
<!--<div class="navbar bg-info">-->
<!--    <div class="row">-->
<!--        <ul>-->
<!---->
<!--<a href="#">-->
<!---->
<!--    <h1><i class="fa fa-home" style="width: 60px;"></i></h1>-->
<!--    <span class="text">صفحه نخست</span>-->
<!--            </a>-->
<!---->
<!--            </a>-->
<!--<div style="width: auto;height: 40px; float: right;">-->
<!---->
<!--</div>-->
<!--            <a href="/Forum/index">-->
<!--                <i class="fa fa-users"></i>-->
<!--                <span class="text">تالار گفتگو</span>-->
<!--            </a>-->
<!--            <a href="/Users/CooperationForm.aspx">-->
<!--                <i class="fa fa-user-plus"></i>-->
<!--                <span class="text">جذب مدرس</span>-->
<!--            </a>-->
<!--            <a href="/FooterInfo/ContactUS.aspx">-->
<!--                <i class="fa fa-phone"></i>-->
<!--                <span class="text">تماس با ما</span>-->
<!--            </a>-->
<!---->
<!---->
<!---->
<!---->
<!--    </div>-->
<!---->
<!---->
<!---->
<!--    </ul>-->
<!--</div>-->
<div class="row">


    <div class="col-md-2 float-right">
        <a href="#"><img src="images/haib.png"></a>
    </div>
    <div class="col-md-8">
        <div class="site-contact mt-2">

            <form class="col-md" method="post" action="/cms-p/Search.php">
                <input class="col-md-6 rounded" name="SearchQuery" type="text" placeholder="جستجو کنید" required>
                <button class="rounded bg-primary mt-1" name="SearchSubmit" type="submit"><i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="col-md-2">
<a href="index">
   <h2><i class="fa fa-home float-left ml-4 text-info"></i></h2>
</a>
        <a href="index">
            <h3><i class="fa fa-phone float-left ml-4 text-justify"></i></h3>
        </a>
    </div>


</div>


<!--<nav class="navbar bg_semi_dark navbar-expand-md  mb-md-3 mt-1">-->

<!--    <a class="navbar-brand" href="/cms-p/index">صفحه اصلی</a>-->
<!--    <button class="navbar-toggler fa-menorah" type="button" data-toggle="collapse" data-target="#navbarText"-->
<!--            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <div class="collapse navbar-collapse" id="navbarText">-->
<!--        <ul class="open- navbar-nav mr-auto">-->
    <nav class="navbar navbar-expand-md navbar-dark bg_hover_3 mb-md-3">

        <a class="" href="/cms-p/index"><img class="rounded" src="images/haib.png"> </a>

      
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

            function renderMenu($Menus, $SubMenu)
            {
//دو نوع ساب منو داریم که ممکن است خودش اخرین باشد و دیگر ساب منو نداشته باشد و یا خودش ساب منو دیگر هم داشته باشد
                $SubSubMenu = getSubMenu($Menus, $SubMenu["id"]);
//کوچکتر از یک یعنی خودش انتهایی بود
                if (count($SubSubMenu) < 1) {
                    echo " <li class=\"dropdown-item\"><a href='{$SubMenu['url']}'> {$SubMenu['name']}</a></li>";
                } //اما اگر خودش ساب منو دارد
                else {
                    echo "<li class=\"dropdown-item dropdown-submenu\">";
                    echo "<a class=\"test\" tabindex=\"-1\" href=\"#\">{$SubMenu['Name']} <span class=\"caret\"></span></a>";
                    echo "<ul class=\"dropdown-menu\">";
//   حالا باید بگوییم رندر منو کن این ساب منو را
                    foreach ($SubSubMenu as $sMenu) {
                        renderMenu($Menus, $sMenu);
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
                    <button class="btn dropdown-toggle " type="button"
                            data-toggle="dropdown"><?= $men["name"] ?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                        <!--                برای اینکه منو باد زیر منوهای خود را صدا بزند از تابع بازگشتی استفتده می کنیم -->
                        <?php
                        //                        الان می گوئیم ساب منو های این منو را برای ما در بیاور
                        $SubMenus = getSubMenu($Menus, $men["id"]);
                        //                    حالا یک حلقه می گذاریم و می گوییم هر یاب منو که در اوردی باید ال ای ان را هم نمایش بدهی
                        foreach ($SubMenus as $subMenu) {
//                    کل منو ها را به تابع رندر می دهیم و می گوییم ساب منو هایش را هم بیاور
                            renderMenu($Menus, $subMenu);

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
                var value = $('#text').val();
                $.ajax({
                    url: 'Ajax.php?q=' + value,
                    method: 'get',
                    success: function (data) {
                        $('#cn').html(data);
                    }
                });
            })
        });
    </script>

    <?php
    $UserObj = new User();
    if (isset($_SESSION['UserName']) && $UserObj->IsAdmin($_SESSION["UserName"]) && strpos($_SERVER["PHP_SELF"], "Post.php") > 0) {
        echo '<li class="nav-item"><a class="nav-link" href="/cms-p/admin/Post.php?Type=EditPost&Pid=' . $_GET["Pid"] . '"> EditPost  </a></li>';
    }
    //            الان می گوییم اگر یوزر ادمین ورود نکرده بود دکمه ادمین را نمایش نده و زمانیکه ورود کرده بوده نمایش بده
    if (isset($_SESSION["UserName"]) && $UserObj->IsAdmin($_SESSION["UserName"])) { ?>


        <li class="nav-link">
            <a class="nav-link bg-danger rounded" href="/cms-p/admin">مدیریت</a>
        </li>
    <?php }
    ?>
    </ul>

    <!--<span class="navbar-text">-->
    <!--Navbar text with an inline element-->
    <!--</span>-->

</nav>





