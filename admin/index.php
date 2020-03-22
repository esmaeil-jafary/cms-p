<?php include "Incs/header.php" ?>
<?php include "Incs/Navigation.php" ?>


  

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "Incs/Sidebar.php" ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">داشبورد</a>
          </li>
          <li class="breadcrumb-item active">مدیر</li>
        </ol>
        <h1> خوش آمدی: <?=$_SESSION["FirstName"]." ".$_SESSION["LastName"]?></h1>
        <!-- Icon Cards-->
        

      

      </div>
      <!-- /.container-fluid -->


    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-header">
                    <!--                ?-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-file fa-5x " aria-hidden="true"></i>
                            </div>
                            <div class="col-md-9 text-right">
                                <div class='h2'>1</div>
                                <div>پست ها</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="Post.php">
                    <div class="card-footer text-dark">
                        <span class="-pull-left">دیدن پست ها </span>
                        <span class="-pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>



        <div class="col-lg-3 col-md-6">
            <div class="card bg-success">
                <!--            heading-->
                <div class="card-header"></div>
                <div class="container">
                    <div class="row text-white">
                        <div class="col-md-3">
                            <i class="fa fa-comment fa-5x"></i>
                        </div>
                        <div class="col-md-9 text-right">
                            <div class="h2">2</div>
                            <div> کامنت ها</div>
                        </div>
                    </div>
                </div>

                <a href="Comment.php">
                    <div class="card-footer">
                        <span class="-pull-left">دیدن کامنت ها</span>
                        <span class="-pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning text-white">
                <div class="card-header">
                    <!--                ?-->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-9 text-right">
                                <div class='h2'>3</div>
                                <div> کاربرها</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="User.php">
                    <div class="card-footer text-dark">
                        <span class="-pull-left">دیدن کاربران</span>
                        <span class="-pull-right"><i class="fa fa-5x"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card bg-warning text-white">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-md-9 text-right">
                                <div class='h2'>4</div>
                                <div>دسته ها</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="Category.php">
                    <div class="card-footer">
                        <span class="-pull-left">دیدن دسته ها</span>
                        <span class="-pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
      <!-- Sticky Footer -->
    
   <?php include "Incs/Footer.php" ?>