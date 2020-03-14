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

?>
<table id="PostTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>کد دسته بندی ه</th>
        <th>تیر</th>
        <th>نویسنده</th>
        <th>زمان</th>
        <th>عکس ها</th>
        <th>محتوای دسته بندی ها</th>
        <th>تگ ها</th>
        <th>status</th>
        <th>شمارش محتوا </th>
        <th>حذف</th>
    </tr>
    </thead>
    <!--    برای اینکه بتوانیم از استایل دیتا تیبل استفاده کنیم باید از thed و tbody استفاده کنیم -->
    <tbody>
    <?php
    foreach ($posts as $post){ ?>
        <tr>
            <td><?=$post["Category_id"]?></td>
            <td><?=$post["Title"]?></td>
            <td><?=$post["Author"]?></td>
            <td><?=$post["Date"]?></td>
            <!--            برای اینکه خود عکس را نشان دهد-->
            <td><img class="img-fluid" width="100" src="../images/<?=$post["Image"]?>"></td>
            <td><?=$post["Content"]?></td>
            <td><?=$post["Tage"]?></td>
            <td><?=$post["Comment_Count"]?></td>
            <td><?=$post["Status"]?></td>
            <td><a href="?Delete=<?=$post["id"]?>" class="btn btn-danger">حذفف</a></td>
        </tr>
    <?php }
    ?>

    </tbody>
</table>
<!--ایجاد کردن دیلیت برای پست ها-->
<?php


?>