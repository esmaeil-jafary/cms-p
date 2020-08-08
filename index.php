<!--بالای هدر-->
<?php include_once "inc/header.php"?>
<?php include_once "inc/navigation.php"?>
<!-- End Header -->
<!-- Start Slider -->
<!-- End Slider -->
<!-- Start Featured -->
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h2 class="rounded mt-1 bg-light"><marquee direction="right">جدیدترین خبرهای دنیای مجازی و تجارت الکترونیک در وبسایت IT FIELD</marquee></h2>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row">
    <?php /*?><?php include_once "inc/Slider.php"?><?php */?>
</div>
<div class="row">
   
<!--سایدبار سمت راست-->
    <div class="row col-md-3 mb-3 ml-5 mr-1">
		<?php include "SidebarRight.php" ?>
	</div>
<!--	پست ها-->
	<div class="col-md-5 ml-4 mr-1">
		<h3 class="text-center bg_semi_dark mt-3 ml-3">  آخرین مطالب</h3>
		<?php include_once "Posts.php"?>
		</div>
<!--		 سایدبار سمت چپ -->
	<div class="col-md-3 ml-1 ">
     <?php include "SidebarLeft.php" ?>
        </div>
	</div>
	      
</section>
<?php include_once "inc/Sidebar.php"?>
<?php include_once "inc/Footer.php"?>