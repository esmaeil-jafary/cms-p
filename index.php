<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>
<?php include_once "inc/classes/Categorys_cls.php"?>
<?php 
	include_once "inc/classes/db.php";
	include_once "inc/classes/Post_Cls.php";
$postobj= new Post();
//اگر شرط ایف را نگذاریم تمام کتگوری ها نمایش میدهد ولی ما میخواهیم فقط کتگوری مورد نظر نمایش داده شو
if (isset($_GET["catid"])){
//    قبلا گت ال کتگوری گذاشته بودیم که همه را نشان می داد ولی الان شرط می گذاریم
//    باید بگوییم ای دی خواصی که می فرستیم
$posts=$postobj->GetPosts($_GET["catid"]);
}else{
//    تمام پست ها
    $posts=$postobj->getAllPost();
}


?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
           
			<?php 
//	برای اینکه فقط پستهایی که پابلیش شده اند را نمایش دهد ددر صفحه اصلی
				foreach($posts as $post) {
				    if ($post["Status"] != "publish") {
//				        اجرا نکن
                continue;
                    }
				    ?>

			 
		 <h2>
<!--             برای اینکه در صفحه اصلی روی هر لینکی کایک کردیم برود به صفحه جدید و توضیحاتش را نمایش دهد-->
                <a href="Post.php?Pid=<?=$post["id"]?>"><?=$post["Title"]?></a>
            </h2>
			
			 <p class="lead">
                نویسنده: <a href="index.php"><?=$post["Author"]?></a>
            </p>
			 <p>ساعت ثبت پست:<span class="fa fa-clock "></span><?=$post["Date"]?></p>
			 <hr>
            <img class="img-fluid" src="images/<?=$post["Image"]?>" alt="">
            <hr>
<!--                    برای اینکه کل متن رانمایش ندهد و تعداد مشخص نمابیش بدهد و با زدن رید مور همه را نشان بدهد از تابع ساب اس تی ار استفاده میکنیم-->
			<p><?=substr($post["Content"],0,100)?></p>
<!--			 یعنی زمانیکه ریدمور زده شده برود به همان صفحه ای که پی ای دی آن را صدازدیم-->
            <a class="btn btn-primary" href="Post.php?Pid=<?=$post["id"]?>">Read More <span class="fa fa-angle-right"></span></a>

            <hr>
			
				<?php }
			?>
            <a class="btn btn-primary" href="#">Read More <span class="fa fa-angle-right"></span></a>

            <hr>


            <!-- Pager -->
            <ul class="">
                <li class="btn  btn-outline-primary">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="btn float-md-right btn-outline-primary">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "inc/sidebar.php" ?>
           

<?php include "inc/footer.php" ?>
