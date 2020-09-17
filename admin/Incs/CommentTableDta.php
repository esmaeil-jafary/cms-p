<!--برای کامنت ها از پست تیبل دیتا را کلا کپی می کنیم و می آوریم در این صفحه برای کامنت ها-->
<?php
$commentobj=new Comment();
$UserObj=new User();
if (isset($_GET["Delete"]) && $UserObj->IsAdmin($_SESSION["UserName"])) {
    $id=$_GET["Delete"];
//    الان بابد برویم در پست سی ال اس فانکشنش را بنویسیم
    $commentobj->DeleteComment($id);
    $PageName= $_SERVER["PHP_SELF"];
    header("Location: $PageName" );
}
if (isset($_GET["ApproveId"])){
//    آیدی را بگیرد
$id=$_GET["ApproveId"];
//حالا باید به دیتا بیس بگوییم حالت این را عوض کند
$commentobj->ChangeStatus($id);
    $PageName= $_SERVER["PHP_SELF"];
    header("Location: $PageName" );
}
//$posts=$Postobj->getAllPost();
////برای اینکه بجای کد خود کتگوری را نمایش دهد
//$CatObj=new Category();
$Comments=$commentobj->getAllComment();

?>
<table id="PostTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>  کد </th>
        <th>پست</th>
        <th>نویسنده</th>
        <th>ایمیل</th>
        <th>محتوا</th>
        <th>زمان</th>
        <th>استتوس</th>


        <!--        اپروو یعنی می توان کامنت را تایید کرد و یا عدم تایید-->
        <th>اپروو  </th>
<!--      کامنت ها ویرایش ندارند-->
        <th>حذف</th>
    </tr>
    </thead>
    <!--    برای اینکه بتوانیم از استایل دیتا تیبل استفاده کنیم باید از thed و tbody استفاده کنیم -->
<!--    الان باید کامنته ها را نمایش دهیم-->
    <tbody>
    <?php
    foreach ($Comments as $Comment){ ?>
        <tr>
            <!--            برای اینکه نام کتگوری را بیاوریم بجای کد آن-->
<!--            <td>--><?php
//                $cat=$CatObj->getCategory($Comment["id"]);
//                echo $cat[0]["name"];
//                ?><!--</td>-->
            <td><?=$Comment["id"]?></td>
<!--            <td>--><?//=$Comment["Post_id"]?><!--</td>-->
<!--            الان وقتی اینر جوین زده ایم می توانیم تایتل را هم نمایش دهیم به جای پست ای دی-->
<!--            یک لینک هم برایش میگذاریم که وقتی کاربر روی تایتل کلیک کرد برود آن پست را نشان دهد-->
            <td><a href="../Post.php?Pid=<?=$Comment["Post_id"]?>"><?=$Comment["Post_Title"]?></a></td>
            <td><?=$Comment["Author"]?></td>
            <td><?=$Comment["email"]?></td>
            <td><?=$Comment["Content"]?></td>
            <td><?=$Comment["Date"]?></td>
<!--            الان برای استتوس شرط می گذاریم که اگر مقدارش صفر بود مثلا اپروو نکند و اگر یک بود تایید را نمایش دهد-->
            <td><?= $Comment["Status"]==1?"تایید شده":" تایید نشده " ?></td>
            <!--            برای اینکه برود به صفحه ادیت پست به شکل زیر می نویسیم.دیلیت چون در این صفحه است نیازی نیست به این شکل بنویسیم-->
<!--            برای اینکه مشخص باشد کامنت تایید شده (اپروو) رنگ دکمه را عوض میکنیم تا کاربر کامنت تایید شده و نشده را تشخیص دهد-->

            <td>
                <?php
                if ($Comment["Status"]==1) { ?>
<!--                    برای تایید نکردن کامنت-->
                    <a href="?ApproveId=<?=$Comment["id"]?>" class="btn btn-warning">تایید نکردن </a>
                    <?php }
                else{ ?>
<!--                    برای تایید کامنت-->
                    <a href="?ApproveId=<?=$Comment["id"]?>" class="btn btn-primary">تایید کردن</a>
                    <?php
                }
                ?>
            </td>
            <td><a onclick="return confirmMessage()" href="?Delete=<?=$Comment["id"]?>" class="btn btn-danger">حذف</a></td>
        </tr>
    <?php }
    ?>

    </tbody>
</table>
<!--ایجاد کردن دیلیت برای پست ها-->
<?php


?>