<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
 
    <!-- Navbar Search -->
   

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ">
      <li class="naw-item">
		 
		 <a class="nav-link " href="../" >
          صفحه اصلی
        </a>
		</li>
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
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

  </nav>