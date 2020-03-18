<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>
<?php
include_once "inc/classes/db.php";
include_once "inc/classes/Post_Cls.php";
include_once "inc/classes/Comment_cls.php";
//زمانیکه از صفحه ایندکس روی لینک مورد نظر کلیک شود بوسیله پی ایدی آن فرستاده می شود اینجا
if (isset($_GET["Pid"])) {
    $postobj = new Post();
    $post = $postobj->GetPost($_GET["Pid"]) [0];
}
//برای ثبت کامنت
if (isset($_POST["SendComment"])){
    $Author=$_POST["Author"];
    $Email=$_POST["Email"];
    $Content=$_POST["Comment"];
    $PostId=$_GET["Pid"];
    $CommentObj=new Comment();
   $PostComment=$CommentObj->AddComment($Author,$Email,$Content,$PostId);
}
//الان می خواهیم فقط کامنت های مربوط به پست مورد نظر لود بشو
$PostComment = $CommentObj->GetPostComment($_GET["Pid"]);

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
<!--                        برای قسمت کامنت گذاشتن چند بخش ایجاد می کنیم مانند محتوا و ایمیل و غیره-->
                        <div class="form-group">
                            <label>نویسنده:</label>
                            <input type="text" class="form-control" name="Author">
                        </div>
                        <div class="form-group">
                            <label for="">ایمیل</label>
                            <input type="email" class="form-control" name="Email">
                        </div>
                        <div class="input-group">
                            <label for="Content">محتوا</label>
                            <textarea name="Comment" class="form-group"></textarea>
                            <span class="btn-group">
                      
                      <span class="fa fa-search "></span>
                   </button>
                </span>
                        </div>
<!--                        مارجین تاپ 3-->
                        <div class="form-group mt-3">
                        <input type="submit" name="SendComment" class="btn btn-lg btn-primary" value="ارسال کامنت">
                        </div>
                    </form>
                </div>
                <!-- /.input-group -->
            </div>
<!--            یک حلقه ایجاد مکنیم تا کامنت ها را نمایش دهیم-->
            <?php
            foreach ($PostComment as $Comment){ ?>
            <div class="row">
                <span class="font-weight-bolder"><?=$Comment["Author"]?></span>
                <span><?=$Comment["Email"]?></span>
                <p><span><?=$Comment["Content"]?></span></p>

            </div>
            <?php }
            ?>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "inc/sidebar.php" ?>
        <?php include "inc/footer.php" ?>
