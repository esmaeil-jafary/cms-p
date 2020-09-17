<?php include "inc/header.php" ?>
<?php
include_once "inc/classes/Post_Cls.php";
include_once "inc/classes/Comment_cls.php";
//زمانیکه از صفحه ایندکس روی لینک مورد نظر کلیک شود بوسیله پی ایدی آن فرستاده می شود اینجا
if (isset($_GET["Pid"])) {
    $postobj = new Post();
    $post = $postobj->GetPost($_GET["Pid"]) [0];
//    برای اینکه هر پستی که خوانده می شود یکی به شمارنده پست اضافه کند
$postobj->IncrimentView($_GET["Pid"]);
}
//برای ثبت کامنت
$CommentObj=new Comment();
if (isset($_POST["SendComment"])) {
    $Author=$_POST["Author"];
    $Email=$_POST["Email"];
    $Content=$_POST["Content"];
    $PostId=$_GET["Pid"];

   $PostComment=$CommentObj->AddComment($Author,$Email,$Content,$PostId);
}
//الان می خواهیم فقط کامنت های مربوط به پست مورد نظر لود بشو
$PostComment = $CommentObj->GetPostComment($_GET["Pid"]);

?>
<div class="row">
<div class="col-md-2 mr-5"></div>
<div class="col-md-8 card bg-light mr-1">
<ul class="list-unstyled">
	<li class="card-header mb-1 h3"><a href="Post.php?Pid=<?= $post["id"] ?>"><?= $post["Title"] ?></a></li>	
	<li class="card-header mb-1 h3">
		<!--             برای اینکه در صفحه اصلی روی هر لینکی کایک کردیم برود به صفحه جدید و توضیحاتش را نمایش دهد-->
		<p class="lead">
                نویسنده: <a href="index.php"><?= $post["Author"] ?></a></p>
	</li>	
	<li class="card-header mb-1 h3">
	<p>ساعت ثبت پست:<span class="fa fa-clock "></span><?= $post["Date"] ?></p>
	</li>	
	<li > <img class="img-fluid" src="/images/<?= $post["Image"] ?>" alt=""></li>	
	<li>
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
                            <input type="text" class="form-control" name="Author" required>
                        </div>
                        <div class="form-group">
                            <label for="">ایمیل</label>
                            <input type="email" class="form-control" name="Email" required>
                        </div>
                        <div class="input-group">
                            <label for="Content">محتوا</label>
                            <textarea name="Content"  class="form-group w-100"></textarea>
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
    </div>



<!-- /.input-group -->
<!--            یک حلقه ایجاد مکنیم تا کامنت ها را نمایش دهیم-->
            <?php
            foreach ($PostComment as $Comment) { ?>

                    <div class="card mt-1">
                        <div class="card-body">
                           <ul class="list-unstyled">
							   <div class="row">
								   	   
                            <li class=" col-md-6">
								<span class="fa fa-clock">&nbsp;زمان ثبت کامنت:</span><?= $Comment["Date"] ?></li>
							   <li class=" col-md-6"> 
								   <span class=" text-danger"><?= $Comment["Author"] ?></span>
								   </li>
							
								   </div>
							   <li>
                               <span class=""><?= $Comment["Content"] ?></span>
                            </li>
</ul>
                       
                    </div>
            <?php }
            ?>
	</div>
	</li>	
	</ul>	
	
</div>


</div>
<div class="row">
<div class="col-md-1"></div>
    <div class="col-md-5 mr-5">
    <?php include "SidebarRight.php" ?>
    </div>
    
    <div class="col-md-5 ml-4">
    <?php include "SidebarLeft.php" ?>
    </div>
    

</div>




        <!-- Blog Entries Column -->

            <!-- First Blog Post -->





        <!-- Blog Sidebar Widgets Column -->


