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



<div class="row">
    <!--        ساید بار سمت راست-->
    <div class="col-md-3">
        <div class="card-header">
            <h1 class="text-center" style="color: red;">دسته بندی ها</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <?php
                include_once "inc/classes/db.php" ;
                include_once "inc/classes/Categorys_cls.php" ;
                $cat=new Category ();
                $cats=$cat->getAllCategories();

                $cnt=count($cats);
                ?>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php
                        for($i=0;$i<=$cnt/2;$i++){ ?>
                            <!--          الان برای اینکه وقتی در دسته بندی ها را در سایدبار کلیک می کنیم برود بر بروی آن دسته لینک تگ ا را قرا می دیهی-->
                            <li><button style="width: 310px; height:70px; margin-right: -55px;color: blue;margin-top: 5px; background: yellow;"><h2><a href="/web3/index/Category/<?=$cats[$i]["id"]?>"><?=$cats[$i]["name"]?></a></h2></button></li>
                        <?php } ?>



                        <!-- نمایش گتگوری در دو ستون و اینجا ستون دوم -->
                        <?php
                        for ($i = $cnt/2 + 1 ; $i < $cnt ; $i++) {
//                            ی دسته بندی دوم هم مانند بالا انجام
                            $href="/web3/index/Category/{$cats[$i]["id"] } " ;
                            echo ' <li><button style="width: 310px;height:70px; margin-right: -55px;margin-top: 5px; background: yellow;" ><h2><a href="'.$href.'"> ' . $cats[$i]["name"]. '</a></h2> </button></li>';
                        }
                        ?>
					
                    </ul>

</div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
    </div>
    <!--        پست ها-->
    <div class="col-md-6 card-header">
<div class="row pb-5 mt-5">
    <div class="col-md-7 mx-auto">
        <div class="section-title text-center">
            <h2>آخرین پست ها</h2>
            <p>تمامی پست های ارسالی توسط اعضاء در این قسمت نمایش داده می شود</p>
        </div>
    </div>
</div>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md card-header">



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



                <img class="img-fluid " src="/web3/images/<?=$post["Image"]?>" alt="" style="width: 630px; height: 300px;" ">
             <h2 class="mt-3">
                    <!--             برای اینکه در صفحه اصلی روی هر لینکی کایک کردیم برود به صفحه جدید و توضیحاتش را نمایش دهد-->
                    <p><b style="color: red;">موضوع مطلب:</b><a href="/web3/Post/<?=$post["id"]?>"><?=$post["Title"]?></a></p>
                </h2>
                <p><?=substr($post["Content"],0,70)?></p>
                <p class="lead">
                    <!--                 برای نویسند یور آر ال کار نکرد بعداد آدرس دهی آن را به صورت عکس و غیره تغییر بده-->
                    نویسنده: <a href="?Author=<?=$post["Author"]?>"><?=$post["Author"]?></a>
                </p>
                <p>ساعت ثبت پست:<span class="fa fa-clock "></span><?=$post["Date"]?></p>
                             <!--                    برای اینکه کل متن رانمایش ندهد و تعداد مشخص نمابیش بدهد و با زدن رید مور همه را نشان بدهد از تابع ساب اس تی ار استفاده میکنیم-->

                <!--			 یعنی زمانیکه ریدمور زده شده برود به همان صفحه ای که پی ای دی آن را صدازدیم-->
                <a class="btn btn-primary " href="/web3/Post/<?=$post["id"]?>">توضیحات بیشتر.. <span class="fa fa-angle-right"></span></a>

                <hr style="margin-bottom: 5px;">

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
    </div>

        
    </div>
    <!--        ساید بار سمت چپ-->
    <div class="col-md-3">
       <div class="card-header">
		    <?php
                include_once "inc/classes/db.php" ;
                include_once "inc/classes/Categorys_cls.php" ;
                $News=new Post();
                $New=$News->getNewsView();
		   ?>
        <div class="card-body">
            <h1 style="color: blue;text-align: center;">خبرهای فوری و مسائل روز</h1>
            <hr>
			<?php
				foreach($New as $N){?>
				<ul class="list-unstyled">
                    <li style="color: red;"><h2 ><u style="color: yellow">موضوع:</u><?=$N["Title"]?></h2></li>
                    <li><h3><?=$N["Content"]?></h3></li>
                    <p style="color: blue">زمان ثبت خبر:<span class="fa fa-clock "></span><?=$N["Date"]?></p>
				</ul>
			<hr>
				<?php }
			?>

    </div>

</div>
    </div>