<?php
if (isset($_POST["SubmitNewPost"])){
    $Category_id= $_POST["Category_id"];
    $Title= $_POST["Title"];
    $Author= $_POST["Author"];
//   برای عکس هم نام عکس و فایل عکس
    $ImageName= $_FILES["Image"]["name"];
    $ImageTemp= $_FILES["Image"]["tmp_name"];
    $Content= $_POST["Content"];
    $Tage= $_POST["Tage"];
//   $Comment_Count= $_POST["Comment_Count"];
    $Status= $_POST["Status"];
//   عکس را در پوشه عکسها بنام خود عکس دانلود بریز
    move_uploaded_file($ImageTemp,"../images/$ImageName");
//   الان باید بگوییم پست ما را ذخیره کنید که باید در صفحه پست سی ال اس کوری انرا بنویسیم و ارتباط دهیم با
//الان می گوییم حالا که عکس را آپلود کردی بیا یک شی از پست بساز
    $Postobj=new Post();
    $Postobj->AddPost($Category_id,$Title,$Author,$ImageName,$Content,$Tage,$Status);
    $PageName=$_SERVER["PHP_SELF"];
header("location:post.php");
}
?>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Title">تیتر:</label>
        <input type="text" class="form-control" name="Title" id="Title">
    </div>
    <div class="form-group">
        <label for="Category_id">کد دسته ها: </label>
<!--        برای اینکه دسته ها ی ما نمایش داده شود و کاربر از ان انتخاب کند-->
       <select class="form-control" name="Category_id">
           <?php
                $catobj= new Category();
                $cats=$catobj->getallCategories();
                foreach ($cats as $cat) {
           $Catid=$cat["id"];
           $CateText=$cat["name"];
            echo"<option value='$Catid'>$CateText</option>";
                 }
           ?>
       </select>
    </div>

    <div class="form-group">
        <label for="Author">نویسنده:</label>
        <input type="text" class="form-control" name="Author" id="Author">
    </div>
<!--    <div class="form-group">-->
<!--        <label for="Date">زمان:</label>-->
<!--        <input type="text" class="form-control" name="Date" id="Date">-->
<!--    </div>-->
    <div class="form-group">
        <label for="Image">عکس:</label>
<!--        برای عکس از تیپ فایل استفاده می کنیم-->
        <input type="file" class="form-control" name="Image" id="Image">
    </div>
    <div class="form-group">
        <label for="Content">محتوا</label>
<!--        از تکست اریا استفاده می کنیم چون طول ان بیشتر است-->
        <textarea cols="30" rows="10" class="form-control" name="Content" id="Content"></textarea>
    </div>
    <div class="form-group">
        <label for="Title">تگ</label>
        <input type="text" class="form-control" name="Tage" id="Tage">
    </div>
<!--    <div class="form-group">-->
<!--        <label for="Title">بازدیدها</label>-->
<!--        <input type="text" class="form-control" name="Comment_Count" id="Comment_Count">-->
<!--    </div>-->
    <div class="form-group">
        <label for="Title">استتوس</label>
        <input type="text" class="form-control" name="Status" id="Status">
    </div>

    <input type="submit" name="SubmitNewPost" value="ثبت" class="btn btn-lg btn-primary">

</form>
<!--زمانیکه دکمه ثبت زده شده-->
