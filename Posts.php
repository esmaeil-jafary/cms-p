<?php
include_once "inc/header.php";
include_once "inc/classes/Post_Cls.php";
$postobj = new Post();
//    الان می خواهیم در هر صفحه 5 پست بیشتر نشان ندهیم
$PageLength = 5;
$Page = 1;
if (isset($_GET["Page"])) {
//    یعنی هر پیجی که انتخاب شده بود
    $Page = $_GET["Page"];
}
//اگر شرط ایف را نگذاریم تمام کتگوری ها نمایش میدهد ولی ما میخواهیم فقط کتگوری مورد نظر نمایش داده شو
$queryString = '';
if (isset($_GET["catid"])) {
//    قبلا گت ال کتگوری گذاشته بودیم که همه را نشان می داد ولی الان شرط می گذاریم
    $catid = $_GET["catid"];
    $queryString = "catid={$catid}&";
    $PostCount = $postobj->getAllCatsPostCount($_GET["catid"]);
    $PageCount = ceil($PostCount / $PageLength);
//    باید بگوییم ای دی خواصی که می فرستیم
    $posts = $postobj->GetCategoryPostByPage($_GET["catid"], $PageLength, $Page);
} elseif (isset($_GET["Author"])) {
    $AuthorName = $_GET["Author"];
    $queryString = "Author={$AuthorName}&";
    $PostCount = $postobj->getAuthorPostCount($_GET["Author"]);
    $PageCount = ceil($PostCount / $PageLength);
//    $posts=$postobj->getPostByAuthor($_GET["Author"]);
    $posts = $postobj->getAuthorPostByPage($_GET["Author"], $PageLength, $Page);
} else {
//    برای صفحه بندی
    $queryString = '';
//    تعداد پست هامان را هم با
    $PostCount = $postobj->getAllPostCount();
//برای اینکه نشان دهیم پیج کانتمان را و همچنین تابع سیل برای ما رند می کند تعداد صفحات را
    $PageCount = ceil($PostCount / $PageLength);
//    تمام پست ها
//الان برای اینکه روی پیج هر شماره صفحه کلیک کردیم برود به ان صفحه
//    همچنین شماره صفحه را باید بدهیم


    $posts = $postobj->getAllPostByPage($PageLength, $Page);
}


?>
<!-- Page Content -->



   

   
<!--        <div class="  bg-info w-100 h-1 mt-1 mr-2">-->
<!--            <h1 class="text-center text-white "></h1>-->
<!--        </div>-->
    

    <!--  پست ها-->      
<div class="row ">
<div class="row">
            <!-- First Blog Post -->
            <?php

            //            برای اینکه زمانیکه در دسته بندی پستی وجود نداشت بنویسد پستی وجود ندارد
            if (count($posts) < 1) {
                echo "<h2>هیچ پستی وجود ندارد</h2>";
            }
            //	برای اینکه فقط پستهایی که پابلیش شده اند را نمایش دهد ددر صفحه اصلی
            foreach ($posts as $post) {
                if ($post["Status"] != "Publish") {
//				        اجرا نکن
                    continue;
                }
                ?>



<!--برای اینکه در صفحه اصلی روی هر لینکی کایک کردیم برود به صفحه جدید و توضیحاتش را نمایش دهد-->

<div class="row shadow mt-2 mb-2">
	
<div class="col-md-8">	
	
<div class="row">
  <a class="h3 text-primary mr-5 " href="/cms-p/Posts/<?= $post["id"] ?>"><?= $post["Title"] ?></a>
</div>
  <!--برای نویسند یور آر ال کار نکرد بعداد آدرس دهی آن را به صورت عکس و غیره تغییر بده-->
	<div class="row ">
		 <p class="h4 mr-5"><?= substr($post["Content"], 0, 200) ?></p>
 
	</div>
</div>
	<div class="col-md-3">
	<img class="text-center rounded float-left  " src="/cms-p/images/<?= $post["Image"] ?>"alt="" style="width: 120px; height: 100px;">
	</div>
	<div class="row mt-1 mb-2">
	<div class="col-md-4 h4 mr-3 text-center"> نوشته: <a class=" text-danger" href="?Author=<?= $post["Author"] ?>"><?= $post["Author"] ?></a>
		</div>
		<div class="col-md-3 mb-2 text-center"><span class="fa fa-clock h3 text-danger "></span><?=$post["Date"]?>
		</div>
		<div class="col-md-4 h6 mb-2"> <a class="btn btn-primary mb-4 float-left " href="/cms-p/Post/<?= $post["id"] ?>">توضیحات بیشتر.. <span class="fa fa-angle-left"></span></a></div>
	</div>
	  <!-- برای اینکه کل متن رانمایش ندهد و تعداد مشخص نمابیش بدهد و با زدن رید مور همه را نشان بدهد از تابع ساب اس تی ار استفاده میکنیم-->

                <!--یعنی زمانیکه ریدمور زده شده برود به همان صفحه ای که پی ای دی آن را صدازدیم-->		

	
</div>
	</div>
<div class="row">
            <?php }
            ?>
	
            <!--         برای اینکه در اخر صفحه متل گوگل برای شماره صفحات پیج کانت لینک بگذاریم -->
            <nav>
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $PageCount; $i++) { ?>
                        <!--            به تعداد صفحاتی که داریم لینک درست کنیم-->

                        <li class="page-item <?php if ($i == $Page) echo "active" ?>"><a href="?Page=<?= $i ?>"class="page-link"><?= $i ?></a>
                        </li>

                    <?php }
                    ?>
                   
                </ul>


            </nav>

</div>
</div>
