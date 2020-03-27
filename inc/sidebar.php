<div class="col-md-4">
<!--    الان می خواهیم بگوییم وقتی لاگین کرده بودیم دیگر قسمت ورود و ثبت نام را نشان نده-->
<!--    میگوییم اگر یوزر ورود نکرده بود لاگین را نمایش بده-->
    <?php
    if (!isset($_SESSION["UserName"])){ ?>

    <div class="card bg-light mb-4">

        <div class="card-header">
            <div class="row">
            <div class="col-md-6">
                <h4>ثبت نام/ورود</h4>
            </div>
            <div class="col-md-6">
            <a href="Register.php" class="btn btn-secondary">ثبت نام</a>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="Login.php" >
                <input class="form-control mb-1" name="UserName" placeholder="نام کاربری را وارد نمایید">
                <div class="input-group">
                    <input type="password" name="Password" class="form-control" placeholder="کلمه عبور را وارد نمایید">

                       <button name="LoginSubmit" class="btn btn-primary " type="submit">ورود</button>
                </span>
                </div>
            </form>
        </div>
        <!-- /.input-group -->
    </div>
       <?php }
        ?>
    <!-- Blog Search Well -->
    <div class="card bg-light">
        <div class="card-header">
            <h4>Blog Search</h4>
        </div>
        <div class="card-body">
			<form method="post" action="/cms-p/Search.php" >
            <div class="input-group">
                <input name="SearchQuery" type="text" class="form-control">
                <span class="btn-group">
                       <button name="SearchSubmit" class="btn btn-primary " type="submit">
                      <span class="fa fa-search "></span>
                   </button>
                </span>
		    </div>
			</form>
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="card bg-light mt-4">
        <div class="card-header">
            <h4>Blog Categories</h4>
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
       <li><a href="index.php?catid=<?=$cats[$i]["id"]?>"><?=$cats[$i]["name"]?></a></li>
      <?php } ?>
             </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <!-- نمایش گتگوری در دو ستون و اینجا ستون دوم -->
                        <?php
                        for ($i = $cnt/2 + 1 ; $i < $cnt ; $i++) {
//                            ی دسته بندی دوم هم مانند بالا انجام
                            $href="index.php?catid={$cats[$i]["id"] } " ;
                      echo ' <li><a href="'.$href.'"> ' . $cats[$i]["name"]. '</a> </li>';
                      }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="card bg-light mt-4">
        <div class="card-header">
            <h4>Side Widget Well</h4>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
                accusamus
                laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>
    </div>

</div>
