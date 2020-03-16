<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>
<?php
include_once "inc/classes/db.php";
include_once "inc/classes/Post_Cls.php";
//زمانیکه از صفحه ایندکس روی لینک مورد نظر کلیک شود بوسیله پی ایدی آن فرستاده می شود اینجا
if (isset($_GET["Pid"])) {
    $postobj = new Post();
    $post = $postobj->GetPost($_GET["Pid"]) [0];
}
?>
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- First Blog Post -->
            <h2>
                <!--             برای اینکه در صفحه اصلی روی هر لینکی کایک کردیم برود به صفحه جدید و توضیحاتش را نمایش دهد-->
                <a href="Post.php?Pid=<?= $post["id"] ?>"><?= $post["Title"] ?></a>
            </h2>
            <p class="lead">
                نویسنده: <a href="index.php"><?= $post["Author"] ?></a>
            </p>
            <p>ساعت ثبت پست:<span class="fa fa-clock "></span><?= $post["Date"] ?></p>
            <hr>
            <img class="img-fluid" src="images/<?= $post["Image"] ?>" alt="">
            <hr>
            <p><?= $post["Content"] ?></p>
            <hr>
            <div class="card bg-light">
                <div class="card-header">
                    <h4> کامنت ها</h4>
                </div>
<!--                برای ایجتد کامنت ها-->
                <div class="card-body">
                    <form method="post" action="" >
                        <div class="input-group">
                            <textarea name="CommentText" class="form-control"></textarea>
                            <span class="btn-group">
                      
                      <span class="fa fa-search "></span>
                   </button>
                </span>
                        </div>
<!--                        مارجین تاپ 3-->
                        <div class="form-group mt-3">
                        <input type="submit" class="btn btn-lg btn-primary" value="ارسال کامنت">
                        </div>
                    </form>
                </div>
                <!-- /.input-group -->
            </div>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "inc/sidebar.php" ?>
        <?php include "inc/footer.php" ?>
