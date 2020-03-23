
<?php
$Postobj=new Post();
if (isset($_GET["Delete"])){
    $id=$_GET["Delete"];
//    الان بابد برویم در پست سی ال اس فانکشنش را بنویسیم
    $Postobj->DeletePost($id);
    $PageName=$_SERVER["PHP_SELF"];
    header("location:$PageName");
}
$posts=$Postobj->getAllPost();
//برای اینکه بجای کد خود کتگوری را نمایش دهد
$CatObj=new Category();

?>
<table id="PostTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th> دسته ها  </th>
        <th>تیر</th>
        <th>نویسنده</th>
        <th>زمان</th>
        <th>عکس ها</th>
        <th>محتوای دسته بندی ها</th>
        <th>تگ ها</th>
        <th>شمارش محتوا </th>
        <th>status</th>
        <th>ویرایش</th>
        <th>حذف</th>
    </tr>
    </thead>
    <!--    برای اینکه بتوانیم از استایل دیتا تیبل استفاده کنیم باید از thed و tbody استفاده کنیم -->
    <tbody>
    <?php
    foreach ($posts as $post){ ?>
        <tr>
<!--            برای اینکه نام کتگوری را بیاوریم بجای کد آن-->
            <td><?php
$cat=$CatObj->getCategory($post["Category_id"]);
echo $cat[0]["name"];
                ?></td>
            <td><a href="../Post.php?Pid=<?=$post["id"]?>"> <?=$post["Title"]?></a></td>
            <td><?=$post["Author"]?></td>
            <td><?=$post["Date"]?></td>
            <!--            برای اینکه خود عکس را نشان دهد-->
            <td><img class="img-fluid" width="100" src="../images/<?=$post["Image"]?>"></td>
            <td><?=$post["Content"]?></td>
            <td><?=$post["Tage"]?></td>
            <td><?=$post["Comment_Count"]?></td>
            <td><?=$post["Status"]?></td>
<!--            برای اینکه برود به صفحه ادیت پست به شکل زیر می نویسیم.دیلیت چون در این صفحه است نیازی نیست به این شکل بنویسیم-->
            <td><a href="?Type=EditPost&Pid=<?=$post["id"]?>" class="btn btn-primary">ویرایش</a></td>
            <td><a href="?Delete=<?=$post["id"]?>" class="btn btn-danger">حذفف</a></td>
        </tr>
    <?php }
    ?>

    </tbody>
</table>