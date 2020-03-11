<?php include "inc/header.php" ?>
<?php include "inc/navigation.php" ?>
<?php include_once "inc/classes/Categorys_cls.php"?>
<?php 
	include_once "inc/classes/db.php";
	include_once "inc/classes/Post_Cls.php";
$postobj= new Post();
//$posts=$postobj->getAllPost();
if(isset($_POST['SearchSubmit'])){
	//do search 
	$posts=$postobj->SearchPost($_POST['SearchQuery']);
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
	if(count($posts)>0){
				foreach($posts as $post){ ?>
			 
		 <h2>
                <a href="#"><?=$post["Title"]?></a>
            </h2>
			
			 <p class="lead">
                نویسنده: <a href="index.php"><?=$post["Author"]?></a>
            </p>
			 <p>ساعت ثبت پست:<span class="fa fa-clock"></span><?=$post["Date"]?></p>
			 <hr>
            <img class="img-fluid" src="images/<?=$post["Image"]?>" alt="">
            <hr>
			<p><?=$post["Content"]?></p>
			 
            <a class="btn btn-primary" href="#">Read More <span class="fa fa-angle-right"></span></a>

            <hr>
			
				<?php }
	}
			else{
				echo 'مقادیر جستجو موجود نمی باشد';
			}
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
