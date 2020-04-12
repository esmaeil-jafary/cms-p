<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>
<?php include_once "inc/classes/Categorys_cls.php"?>
<?php 
	include_once "inc/classes/db.php";
	include_once "inc/classes/Post_Cls.php";
$postobj= new Post();
//    الان می خواهیم در هر صفحه 5 پست بیشتر نشان ندهیم
$PageLength=5;
$Page=1;
if (isset($_GET["Page"])){
//    یعنی هر پیجی که انتخاب شده بود
    $Page=$_GET["Page"];
}
//اگر شرط ایف را نگذاریم تمام کتگوری ها نمایش میدهد ولی ما میخواهیم فقط کتگوری مورد نظر نمایش داده شو
$queryString='';
if (isset($_GET["catid"])){
//    قبلا گت ال کتگوری گذاشته بودیم که همه را نشان می داد ولی الان شرط می گذاریم
    $catid=$_GET["catid"];
    $queryString="catid={$catid}&";
    $PostCount=$postobj->getAllCatsPostCount($_GET["catid"]);
    $PageCount= ceil( $PostCount/$PageLength);
//    باید بگوییم ای دی خواصی که می فرستیم
$posts=$postobj->GetCategoryPostByPage($_GET["catid"],$PageLength,$Page);
}
elseif (isset($_GET["Author"])){
    $AuthorName=$_GET["Author"];
    $queryString="Author={$AuthorName}&";
    $PostCount=$postobj->getAuthorPostCount($_GET["Author"]);
    $PageCount= ceil( $PostCount/$PageLength);
//    $posts=$postobj->getPostByAuthor($_GET["Author"]);
    $posts=$postobj->getAuthorPostByPage($_GET["Author"],$PageLength,$Page);
}
else{
//    برای صفحه بندی
$queryString='';
//    تعداد پست هامان را هم با
    $PostCount=$postobj->getAllPostCount();
//برای اینکه نشان دهیم پیج کانتمان را و همچنین تابع سیل برای ما رند می کند تعداد صفحات را
$PageCount= ceil( $PostCount/$PageLength);
//    تمام پست ها
//الان برای اینکه روی پیج هر شماره صفحه کلیک کردیم برود به ان صفحه
//    همچنین شماره صفحه را باید بدهیم


    $posts=$postobj->getAllPostByPage($PageLength,$Page);
}


?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">



            <!-- First Blog Post -->
           
			<?php
//            برای اینکه زمانیکه در دسته بندی پستی وجود نداشت بنویسد پستی وجود ندارد
            if (count($posts)<1){
                echo "<h2>هیچ پستی وجود ندارد</h2>";
            }
//	برای اینکه فقط پستهایی که پابلیش شده اند را نمایش دهد ددر صفحه اصلی
				foreach($posts as $post) {
				    if ($post["Status"] != "Publish") {
//				        اجرا نکن
                continue;
                    }
				    ?>

			 
		 <h2>
<!--             برای اینکه در صفحه اصلی روی هر لینکی کایک کردیم برود به صفحه جدید و توضیحاتش را نمایش دهد-->
                <a href="/Post/<?=$post["id"]?>"><?=$post["Title"]?></a>
            </h2>
			
			 <p class="lead">
<!--                 برای نویسند یور آر ال کار نکرد بعداد آدرس دهی آن را به صورت عکس و غیره تغییر بده-->
                نویسنده: <a href="?Author=<?=$post["Author"]?>"><?=$post["Author"]?></a>
            </p>
			 <p>ساعت ثبت پست:<span class="fa fa-clock "></span><?=$post["Date"]?></p>
			 <hr>
            <img class="img-fluid" src="/images/<?=$post["Image"]?>" alt="">
            <hr>
<!--                    برای اینکه کل متن رانمایش ندهد و تعداد مشخص نمابیش بدهد و با زدن رید مور همه را نشان بدهد از تابع ساب اس تی ار استفاده میکنیم-->
			<p><?=substr($post["Content"],0,70)?></p>
<!--			 یعنی زمانیکه ریدمور زده شده برود به همان صفحه ای که پی ای دی آن را صدازدیم-->
            <a class="btn btn-primary" href="/Post/<?=$post["id"]?>">توضیحات بیشتر.. <span class="fa fa-angle-right"></span></a>

            <hr>
			
				<?php }
			?>
<!--         برای اینکه در اخر صفحه متل گوگل برای شماره صفحات پیج کانت لینک بگذاریم -->
            <nav>
                <ul class="pagination">
                    <?php
                        for ($i=1;$i<=$PageCount;$i++){ ?>
<!--                           به تعداد صفحاتی که داریم لینک درست کنیم-->

                        <li class="page-item <?php if ($i==$Page) echo "active" ?>" ><a href="?Page=<?=$i?>" class="page-link"><?=$i?></a></li>
                       <?php }
                    ?>
                </ul>
            </nav>



            <!-- Pager -->
<!--            <ul class="">-->
<!--                <li class="btn  btn-outline-primary">-->
<!--                    <a href="#">&larr; Older</a>-->
<!--                </li>-->
<!--                <li class="btn float-md-right btn-outline-primary">-->
<!--                    <a href="#">Newer &rarr;</a>-->
<!--                </li>-->
<!--            </ul>-->
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "inc/sidebar.php" ?>
           

<?php include "inc/footer.php" ?>
