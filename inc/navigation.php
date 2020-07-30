<?php include_once "inc/classes/Menu_Cls.php" ?>
<!-- Navigation -->

<div class="navbar bg-dark rounded" style="height: 35px; " xmlns="http://www.w3.org/1999/html">
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

<div class="row mt-1 bg-info" >

    <div class="col-md-1 float-right bg-dark">
		<a href="index"><h2 class=" text-center text-white h-100 mt-1"> IT FIELD </h2></a>

    </div>



    <div class="col-md-4">
        <nav class="navbar navbar-expand-md navbar-dark " >
            <button class="navbar-toggler bg-info  " type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" value="منو" >
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">





                 
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
    </div>

        <div class="col-md-4 mt-1">
            <form class="navbar-form navbar-left" method="post" action="/cms-p/Search.php">
                <div class="input-group">
                    <input class="form-control" name="SearchQuery" type="text" placeholder="جستجو کنید" required>
                    <div class="input-group-btn">
                        <button class="btn btn-default bg-info" name="SearchSubmit" type="submit"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>







    <div class="col-md-3 float-left">
        <a href="index">
            <h2><i class="fa fa-home float-left ml-4 "></i></h2>
        </a>
        <a href="index">
            <h3><i class="fa fa-phone float-left ml-4 text-justify"></i></h3>
        </a>
    </div>
</div>












