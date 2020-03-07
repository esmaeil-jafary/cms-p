<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="card bg-light">
        <div class="card-header">
            <h4>Blog Search</h4>
        </div>
        <div class="card-body">
			<form method="post" action="/phpcms-master/Search.php" >
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
       <li><a href="#"><?=$cats[$i]["name"]?></a></li>
      <?php } ?>
             </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <!-- نمایش گتگوری در دو ستون و اینجا ستون دوم -->
                        <?php
                        for ($i<$cnt/2;$i<$cnt;$i++) { ?>
                        <li><a href="#"><?=$cats[$i]["name"]?></a></li>
                    <?php   }
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
