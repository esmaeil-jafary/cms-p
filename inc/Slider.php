



<div class="col-md-4">
    <!--    الان می خواهیم بگوییم وقتی لاگین کرده بودیم دیگر قسمت ورود و ثبت نام را نشان نده-->
    <!--    میگوییم اگر یوزر ورود نکرده بود لاگین را نمایش بده-->
    <?php
    if (!isset($_SESSION["UserName"])){ ?>

    <div class="card bg-light mb-4">


        <?php }
        ?>


        <!-- Blog Categories Well -->
        <div class="card bg-light mt-4">
            <div class="card-header">
                <h4>دسته بندی ها</h4>
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
                                <li><a href="/index/Category/<?=$cats[$i]["id"]?>"><?=$cats[$i]["name"]?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <!-- نمایش گتگوری در دو ستون و اینجا ستون دوم -->
                            <?php
                            for ($i = $cnt/2 + 1 ; $i < $cnt ; $i++) {
//                            ی دسته بندی دوم هم مانند بالا انجام
                                $href="/index/Category/{$cats[$i]["id"] } " ;
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



    </div>

