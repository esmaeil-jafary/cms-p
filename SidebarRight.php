 <!--        ساید بار سمت راست-->
 <div class="row">
<ul class="list-unstyled mt-3 ">
    <li class="bg_semi_dark"><h3 class="text-center">دسته بندی ها</h3></li>
       

            <?php
            include_once "inc/classes/db.php";
            include_once "inc/classes/Categorys_cls.php";
            $cat = new Category ();
            $cats = $cat->getAllCategories();
            foreach ($cats as $c){?>
        <li>
            <img class="rounded-top ml-auto w-100 " src="/cms-p/images/<?= $c["Image"] ?>"
                 alt="" >
        </li>
<li>
        <h3 class="text-danger text-center rounded-bottom bg-info w-100">
            <a href="/cms-p/index/Category/<?= $c["id"] ?>"><?= $c["name"] ?></a>
        </h3>


        <?php }
        ?>

        </li>
</ul>
</div>