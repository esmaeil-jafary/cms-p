<!--        ساید بار سمت چپ--> 

            <?php
            include_once "inc/classes/db.php";
            include_once "inc/classes/Categorys_cls.php";
//ارتباط با دیتا بیس این قسمت در قسمت آخر پست سی ال اس نوشته شده
            $News = new Post();
            $New = $News->getNewsView();
            ?>
            <div class="row">
				<ul class="list-unstyled mt-3 ">
					<li class="bg_semi_dark shadow"><h3 class="text-center">  خبرهای جدید</h3></li>
                <hr>
                <?php
                foreach ($New as $N) {
                    ?>
                    <ul class="list-unstyled  mt-1 shadow">
                        <li class="h3 text-primary"><?= $N["Title"] ?></li>
                        <li class="h5"><?= $N["Content"] ?></li>
<li class="text-danger"><p><span class="fa fa-clock ">&nbsp;زمان ثبت خبر:</span><?= $N["Date"] ?></p></li>
                    </ul>

                <?php }
                ?>
				</ul>
            </div>