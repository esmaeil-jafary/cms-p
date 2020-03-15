<!--برای ادیت کردن ابتدا باید اطلاعات قبلی را نمایش داد تا ماربر آنرا ببیند و اصلاح کند-->
<?php
$PostObj=new Post();
if (isset($_GET["Pid"]))
{
//    پست مربوط به پی ایدی را بگیر
//اول باید برویم کلاس پست نمایش از دیتا بیس را اوکی کنیم

//الان ای دی را میگیرد
$CurrentPost = $PostObj->GetPost($_GET["Pid"]);
//برای ادیت کردن و دستور آپدیت
}
if (isset($_POST["SubmitEditPost"]))
{
//    زمانی که ما عکس را تغییر نمی خواهیم بدهیم همان قبلی را حفط کن
    if (!empty($_FILES["Image"]["name"])){
        move_uploaded_file($_FILES["Image"]["tmp_name"],"../images/{$_FILES["Image"]["name"] }" );
        $PostObj->UpdatePost($_POST["id"],$_POST["Title"],$_POST["Category_id"], $_POST["Author"] ,$_FILES["Image"]["name"], $_POST["Content"],$_POST["Tage"],$_POST["Status"]);
    }else{
        $PostObj->UpdatePost($_POST["id"],$_POST["Title"],$_POST["Category_id"], $_POST["Author"] ,$_POST["LastImage"], $_POST["Content"],$_POST["Tage"],$_POST["Status"]);
    }

$pagename= $_SERVER["PHP_SELF"];
    header("location : $pagename" );
}
?>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Title">تیتر:</label>
        <input type="text" class="form-control" name="Title" id="Title" value=" <?=$CurrentPost[0]["Title"]?>">
    </div>
    <div class="form-group">
        <label for="Category_id">کد دسته ها: </label>
        <!--        برای اینکه دسته ها ی ما نمایش داده شود و کاربر از ان انتخاب کند-->
        <select class="form-control" name="Category_id" >
            <?php
            $catobj= new Category();
            $cats=$catobj->getallCategories();
            foreach ($cats as $cat) {
                $Catid=$cat["id"];
                $CateText=$cat["name"];
//                برای ویرایش کردن
                if ($CurrentPost[0]["Category_id"]==$Catid){
                    echo"<option value='$Catid' selected>$CateText</option>";
                }
                else {
                    echo "<option value='$Catid'>$CateText</option>";
                }
            }

            ?>
        </select>
    </div>

    <div class="form-group">
<!--        با استفاده از کارنت پست میتوانیم از دیتا بیس نمایش دهیم با ولیو-->
        <label for="Author">نویسنده:</label>
        <input type="text" class="form-control" name="Author" id="Author" value=" <?=$CurrentPost[0]["Author"]?>">
    </div>
    <img src="../images/<?=$CurrentPost[0]['Image']?>" width="100">
    <div class="form-group">

        <label for="Image">عکس:</label>
        <!--        برای عکس از تیپ فایل استفاده می کنیم-->
        <input type="file" class="form-control" name="Image" id="Image">
    </div>
    <div class="form-group">
        <label for="Content">محتوا</label>
        <!--        از تکست اریا استفاده می کنیم چون طول ان بیشتر است-->
<!--        برای تکست اریا برای نمایش از دیتا بیس ولیو نیازی نیست-->
        <textarea cols="30" rows="10" class="form-control" name="Content" id="Content"><?=$CurrentPost[0]["Content"]?></textarea>
    </div>
    <div class="form-group">
        <label for="Title">تگ</label>
        <input type="text" class="form-control" name="Tage" id="Tage" value=" <?=$CurrentPost[0]["Tage"]?>">
    </div>
    <input type="hidden" name="id" value="<?=$CurrentPost[0]["id"] ?>">
    <input type="hidden" name="LastImage" value="<?=$CurrentPost[0]["Image"] ?>">
    <div class="form-group">
<!--        برای ادیت کردن به ایدی نیاز داریم که آن را هیدن قرار می دهیم-->
        <label for="Title">استتوس</label>
        <input type="text" class="form-control" name="Status" id="Status" value=" <?=$CurrentPost[0]["Status"]?>">
    </div>

    <input type="submit" name="SubmitEditPost" value="ویرایش " class="btn btn-lg btn-primary">

</form>