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


<div class="row">
    <!--        ساید بار سمت راست-->

    <div class="row col-md-3 mb-3">
<!--        <div class="  bg-info w-100 h-1 mt-1 mr-2">-->
<!--            <h1 class="text-center text-white "></h1>-->
<!--        </div>-->
<ul class="list-unstyled mt-3 shadow">
    <li class="bg_semi_dark"><h3 class="text-center">دسته بندی ها</h3></li>
        <li class=" ">

            <?php
            include_once "inc/classes/db.php";
            include_once "inc/classes/Categorys_cls.php";
            $cat = new Category ();
            $cats = $cat->getAllCategories();
            foreach ($cats as $c){?>
        <li>
            <img class="rounded-top ml-auto w-100 " src="/cms-p/images/<?= $c["Image"] ?>"
                 alt="" >
        </li>

        <h3 class="text-danger text-center rounded-bottom bg-info w-100">
            <a href="/cms-p/index/Category/<?= $c["id"] ?>"><?= $c["name"] ?></a>
        </h3>


        <?php }
        ?>

        </li>
</ul>
    </div>



    <!--  پست ها-->
    
 <div class=" col-md-6 ">


            <h3 class=" text-center  bg_semi_dark rounded w-100 mr-3 ml-3 mt-3 mb-3 ">آخرین مطالب</h3>


<div class="row shadow">
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


<div class=" col-md-3 borde  ">
            <li class="list-unstyled border ">    <img class="text-center rounded-top" src="/cms-p/images/<?= $post["Image"] ?>"
                     alt="" style="width: 154px; height: 222px;" "></li>
</div>
<!--برای اینکه در صفحه اصلی روی هر لینکی کایک کردیم برود به صفحه جدید و توضیحاتش را نمایش دهد-->
<div class=" col-md-9 border mb-3">
                 

                <li class="list-unstyled">
                <h2 class=""><a class="h3" href="/cms-p/Posts/<?= $post["id"] ?>"><?= $post["Title"] ?></a></h2>
<h3 class="lead">
                    <!--                 برای نویسند یور آر ال کار نکرد بعداد آدرس دهی آن را به صورت عکس و غیره تغییر بده-->
                    نوشته: <a href="?Author=<?= $post["Author"] ?>"><?= $post["Author"] ?></a>
                </h3>
                <h3 class="btn-light text-center h3"><?= substr($post["Content"], 0, 200) ?></h3>

                <h3 class="text-info"><span class="fa fa-clock h3 text-danger "></span><?= $post["Date"] ?></h3>
                <!--                    برای اینکه کل متن رانمایش ندهد و تعداد مشخص نمابیش بدهد و با زدن رید مور همه را نشان بدهد از تابع ساب اس تی ار استفاده میکنیم-->

                <!--			 یعنی زمانیکه ریدمور زده شده برود به همان صفحه ای که پی ای دی آن را صدازدیم-->
                <a class="btn btn-primary mb-4 " href="/cms-p/Post/<?= $post["id"] ?>">توضیحات بیشتر.. <span
                            class="fa fa-angle-left"></span></a>

</div>
                <!--                        <hr style="margin-bottom: 5px;">-->
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
                    <li>
                </ul>


            </nav>

</div>
           
        </li>




    </div>


    <!--        ساید بار سمت چپ-->
    <div class="col-md-3">
        <div class="row">
            <?php
            include_once "inc/classes/db.php";
            include_once "inc/classes/Categorys_cls.php";
            $News = new Post();
            $New = $News->getNewsView();
            ?>
            <div class="card-body">
                <h3 class="text-center bg_semi_dark">خبرهای فوری و مسائل روز</h3>
                <hr>
                <?php
                foreach ($New as $N) {
                    ?>
                    <ul class="list-unstyled  mt-1 shadow">
                        <h3><i class="fa fa "></i><?= $N["Title"] ?></h3>
                        <li><h3><?= $N["Content"] ?></h3></li>
                        <p>زمان ثبت خبر:<span class="fa fa-clock "></span><?= $N["Date"] ?></p>
                    </ul>

                <?php }
                ?>

            </div>

        </div>
    </div>
</div>