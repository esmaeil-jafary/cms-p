
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

//الان می گوییم اگر در عملیات دسته جمعی اگر بر روی دکمه کلیک شده بود
if (isset($_POST['bulkSubmit'])){
//    برای اینکه اگر چک باکس را تیک نکرده بودیم خطا ندهد یک شرط دیگر می گذاریم
    if (!isset($_POST['Cheacks'])){
        echo "هیچ آیتمی انتخاب نشده است";
    }else{
//        برای اینکه مشخص کنیم کدام آیتم انتخاب شده از سوییچ استفاده می کنیم
        switch ($_POST['OperationType']){
            case 'Publish':
                $Postobj->ChangePostStatus($_POST['Cheacks'],"Publish");
                break;
            case 'Draft':
                $Postobj->ChangePostStatus($_POST['Cheacks'],"Draft");
                break;
            case 'Delete':
                $Postobj->ِDeleteBulkPosts($_POST['Cheacks']);
                break;
        }
        $PageName=$_SERVER["PHP_SELF"];
        header("location:$PageName");
    }

}
?>
<!--برای ایجاد عملیات گروهی یک فرم طراحی می کنیم-->
<form method="post" action="">
    <div class="row">
        <div class="col-md-3">
<!--            ریکوایر برای ولیدیشن کردن میباشد-->
    <select class="form-control" name="OperationType" required>
<!--        الان برای عملیات گروهی پست ها حذف کردم پابلیسش و درفت را اضافه می کنیم-->
        <option value="">لطفا انتخاب کنید</option>
        <option value="Publish">تایید کردن پست ها</option>
        <option value="Draft">لغو پست ها</option>
        <option value="Delete">حذف پست ها</option>
    </select>
    </div>

    <div class="col-md-3">
    <input type="submit" name="bulkSubmit" value="Apply" class="btn btn-success">
        <a href="?Type=NewPost" class="btn btn-primary">AddNew</a>
    </div>
    </div>
<table id="PostTable" class="table table-bordered table-hover">
    <thead>
    <tr>
<!--        الان باید با جی کوری و جاوا اسکریپت یک چک آل یعنی انتخاب همه درست می کنیم-->
        <td><input type="checkbox" id="BulkCheachBoxHeader"></td>
        <th> دسته ها  </th>
        <th>تیر</th>
        <th>نویسنده</th>
        <th>زمان</th>
        <th>عکس ها</th>
        <th>محتوای دسته بندی ها</th>
        <th>تگ ها</th>
        <th>شمارش محتوا </th>
        <th>status</th>
        <th>تعداد بازدید پست</th>
        <th>ویرایش</th>
        <th>حذف</th>
    </tr>
    </thead>
    <!--    برای اینکه بتوانیم از استایل دیتا تیبل استفاده کنیم باید از thed و tbody استفاده کنیم -->
    <tbody>
    <?php
    foreach ($posts as $post){ ?>
        <tr>
<!--            برای اینکه جای تیک درست کنیم برای عملیات گروهی در پنل ادمین-->
<!--            برای اینکه نام کتگوری را بیاوریم بجای کد آن و همچنین چون نام آن برای همه چک باکس ها می باشد باید آن را در ارایه بگذارریم-->
<!--            یک کلاس پست چک می دهیم به ان و در پایین در جی کوری استفاده می کنیم ازآن-->
            <td><input class="post_check" type="checkbox" value="<?=$post["id"]?>" name="Cheacks[]"></td>
            <td><?php
$cat=$CatObj->getCategory($post["Category_id"]);
echo $cat[0]["name"];
                ?></td>
            <td><a href="../Post.php?Pid=<?=$post["id"]?>"><?=$post["Title"]?></a></td>
            <td><?=$post["Author"]?></td>
            <td><?=$post["Date"]?></td>
            <!--            برای اینکه خود عکس را نشان دهد-->
            <td><img class="img-fluid" width="100" src="../images/<?=$post["Image"]?>"></td>
            <td><?=$post["Content"]?></td>
            <td><?=$post["Tage"]?></td>
            <td><?=$post["Comment_Count"]?></td>
            <td><?=$post["Status"]?></td>
<!--            برای اینکه تعداد بازدید پست ها مشخص شود-->
            <td><?=$post["View_Count"]?></td>

<!--            برای اینکه برود به صفحه ادیت پست به شکل زیر می نویسیم.دیلیت چون در این صفحه است نیازی نیست به این شکل بنویسیم-->
            <td><a href="?Type=EditPost&Pid=<?=$post["id"]?>" class="btn btn-primary">ویرایش</a></td>
<!--            cnfrimMessage یک تابع است که ما هنوز تعریف نکرده ایم و برای پیغام مطمئن هستید می خواهید پاک کنید می باشو و باید برویم در دیتا تیبیل جی اس و تعریفش کنیم -->
<!--            ان کلیک آن به ما یه ترو و یا فالس برمی گرداند -->
            <td><a onclick="return confirmMessage()" href="?Delete=<?=$post["id"]?>" class="btn btn-danger">حذفف</a></td>
        </tr>
    <?php }
    ?>

    </tbody>
</table>
</form>
<!--کد جاوا و جیکوری برای دکمه چک آل و انتخاب همه-->

<script>
    $(document).ready(function () {
$('#BulkCheachBoxHeader').click(function () {
if ( this.checked) {
$('.post_check').each(function (){
this.cheacked=true
})
} else {
    $('.post_check').each(function (){
        this.cheacked=false;
    })
}
})
    })
</script>