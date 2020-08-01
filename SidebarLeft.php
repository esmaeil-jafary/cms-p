<!--        ساید بار سمت چپ--> 

            <?php
            include_once "inc/classes/db.php";
            include_once "inc/classes/Categorys_cls.php";
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
                        <h3><i class="fa fa "></i><?= $N["Title"] ?></h3>
                        <li><h3><?= $N["Content"] ?></h3></li>
                        <p>زمان ثبت خبر:<span class="fa fa-clock "></span><?= $N["Date"] ?></p>
                    </ul>

                <?php }
                ?>
				</ul>
            </div>