<!--<nav class="navbar navbar-expand navbar-dark static-top text-center">-->
<nav class="navbar navbar-expand navbar-dark bg-dark static-top text-center">

<div class="col-md-4 mr-2">
    <li class="h1  list-unstyled ">
        <a class="nav-link  fa fa-home " href="/cms-p/index" ></a>
    </li>
</div>
    <div class="col-md-6 mr-5">
        <ul class="navbar-nav ml-auto ">



            <li class="h3">
                <a class="nav-link ml-5 text-danger " href="#" >
                    <?php
                    $OnlineUserObj=new OnlineUser();
                    echo"کاربران آنلاین: " .$OnlineUserObj->getOnlineUser();
                    ?>
                </a>
            </li>
            <!--        برای اینکه در پنل ادمین بالا سمت راست نام و مشخصات را نمایش درهد جایی که دکمه خروج قرار دارد-->
            <li class="naw-item">
                <a class="nav-link text-white h3 bg_semi_white" href="Profile.php" >
                    <?=$_SESSION["FirstName"]." ".$_SESSION["LastName"]?>
                </a>
            </li>

            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw h3"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="Profile.php">پروفایل</a>

                    <div class="dropdown-divider"></div>
                    <!--            فعلا که مودال ها را نخوانده ایم لاگ آف را خودمان مینویسیم موقت-->
                    <a class="dropdown-item" href="../Login.php?Logout=1">خروج</a>
                    <!--            حالا باید برویم در صفحه لاگین و باسیشن انجام بدهیم-->
                    <!--          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">خروج</a>-->
                </div>
            </li>
        </ul>
    </div>

    <div class="col-md-2 mr-2 h3">
        <a class="navbar-brand mr-1" href="index.php"> پنل ادمین</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Navbar Search -->
   

    <!-- Navbar -->




  </nav>