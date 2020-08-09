<?php include "Incs/header.php" ?>
<?php include "Incs/Navigation.php" ?>
<?php
$catobj=new Category();
$categories=$catobj->getallCategories();
$UserObj=new User();
if(isset($_GET["delete"]) && $UserObj->IsAdmin($_SESSION["UserName"])  )
{
    $deleteId=$_GET["delete"];
    $catobj->deleteCategory($deleteId);
    $pageName=$_SERVER["PHP_SELF"];
    header("Location:$pageName");
}
$CatError= '';
if(isset($_POST["addCategorySubmit"]))

{
    $name= $_POST["name"];
    $descrip= $_POST["description"];
    if($name=="" || empty($name))
    {
        $error="نام را وارد نمایی";
    }
//    ما نام دسته بندی ها را یونیک قرار دادیم و وقتی نام تکراری وارد کنیم مای اسکیو ال پیغام خطا می دهد که ما قبل از آن باید اجازه ندهیم کار به پیغام خطا برسد و اجازه ندهد
    else {
        try {
            $catobj->addcategory($name, $descrip);
        }
        catch (Exception $e){
            $CatError= "نام دسته بندی قبلا موجود می باشد لطفا نام دیگری وارد نمایید!!";
        }
//        برای رفرش صفحه می گوییم اگر خطای کت ارور وجود نداشت صفحه را رفرش کن وگرنه پیغام خطا را نمایش بده
        if (!$CatError){
        $pageName=$_SERVER["PHP_SELF"];
        header("Location:$pageName");
        }

    }
}
//نمایش فیلد ذخیره شده از قبل برای اینکه کاربر آن را ببیند و ورایش کند
if(isset($_GET["Edit"])) {
    $id=$_GET['Edit'];
    $selectedcategory=$catobj->getCategory($id);
//    چون آرایه است ما فقط خانه شذوع آن یعنی صفر را باید بدهیم بهش
    if(count($selectedcategory)>0 ) {
        $selectedName = $selectedcategory[0]["name"];
        $selectedDescription = $selectedcategory[0]["Description"];
//        برای اینکه ویرایش کنیم ای دی هم نیاز است که یک متغیر برای ان تعریف می کنیم
$selectedId=$selectedcategory[0]["id"];
    }
}
//ویرایش کردن وقتی رکورد قبلی رامشاهده کردیم و آن را عوض کردیم و دکمه ویرایش را زدیم
if (isset($_POST["editCategorySubmit"])) {
//    Update
$updateId=$_POST["EditId"];
$updateName=$_POST["name"];
$updateDescription=$_POST["Description"];
//برای ایکه نام خالی نباشد
if ($updateName=="" || empty($updateName)) {
    $CatError="لطفا نام را جهت ویرایش وارد نمایید";
}
else{
    try {
        $catobj->updateCategory($updateId,$updateName,$updateDescription);
    } catch (Exception $e){
        $CatError= " آبدیت انجام نشد! نام دسته بندی قبلا موجود می باشد لطفا نام دیگری وارد نمایید!!";
    }
    if (!$CatError){
        $pageName=$_SERVER["PHP_SELF"];
        header("Location:$pageName");
    }
   }
}
?>




    <div id="wrapper">

    <!-- Sidebar -->
<?php include "Incs/Sidebar.php" ?>

    <div id="content-wrapper">

    <div class="container-fluid">
    <!--نمایش خطای ولیدیشن کردن فرم-->
    <?php if (isset($error)) {
        echo "<span class='alert alert-danger' >$CatError</span>";
//  برای زمانی که ارورداد دیگر ست نشود//
        unset($error);
    } ?>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">داشبورد</a>
        </li>
        <li class="breadcrumb-item active">دسته بندی ها</li>
    </ol>
    <span class="alert-danger"><?=$CatError ?></span>
    <!--  در بوت استرپ کال ام دی شش و پنج و.. به معنای نیمی از صفحه می باشد وکلاس رو بخش کلی است-->
    <div class="row">
        <div class="col-md-5">
            <form method="post" action="">
                <div class="form-group">
                    <label for="nameInput">:نام</label>
                    <input type="text" class="form-control" name="name" id="nameInput">
                </div>
                <div class="form-group">
                    <label for="descriptionInput">:توضیحات</label>
                    <input type="text" class="form-control" name="description" id="nameInput">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name="addCategorySubmit" type="submit">افزودن</button>
                </div>
            </form>
<!--            برای ویرایش کردن و زمانی که دکمه ویرایش زده شود-->
<!--            وقتی به این شکل فرم را داخل ایف میگذاریم یعنی زمانی که صدا زده شد توسط دکمه ویرایش نشانش بده-->
            <?php
            if(isset($_GET["Edit"])){ ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="nameInput">:نام</label>
                    <input type="text" class="form-control" value="<?php if (isset($selectedName)){
                        echo $selectedName;
                    }
                    ?> " name="name"  id="nameInput">
                </div>
<!--                ای دی را هم باتیید بفرستیم ولی همخفی میکنیم تا کسی دسترسی نداشته باشد-->
                <input type="hidden" name="EditId" value="<?php if (isset($selectedId)){
                    echo $selectedId;
                }?>">
                <div class="form-group">
                    <label for="descriptionInput">:توضیحات</label>
                    <input type="text" class="form-control" value="<?php if (isset($selectedDescription)){
                        echo $selectedDescription;
                    }
                    ?>" name="Description" id="nameInput">
                </div>
                <div class="form-group">
                    <button class="btn btn-info " name="editCategorySubmit" type="submit">اعمال ویرایش</button>
                </div>
            </form>
            <?php } ?>
        </div>
        <div class="col-md-5">
            <!--کلاس تیبل هاور برای زیبا کردن تیبل می باشد-->
            <table id="categoryTable" class="table table-hover table-bordered">
                <!--برای استفاده از دیتاتیبل برای جداول باید ساختار آن را مشخص کنیم tbody,thead-->
                <thead>
                <tr>
                    <th>کد</th>
                    <th>نام</th>
                    <th>توضیحات</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($categories as $category) {
                    echo "<tr>";
                    echo ' <td> ' . $category["id"] . ' </td> ';
                    echo ' <td> ' . $category["name"] . ' </td> ';
                    echo ' <td> ' . $category["Description"] . ' </td> ';
                    echo '<td>' . '<a onclick="return confirmMessage()" href="?delete=' . $category["id"] . ' " class="btn btn-danger">حذف</a>' . '</td>';
                    echo '<td>' . '<a href="?Edit=' . $category["id"] . ' " class="btn btn-warning">ویرایش</a>' . '</td>';
                    "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Icon Cards-->


    <!-- /.container-fluid -->

    <!-- Sticky Footer -->

<?php include "Incs/Footer.php" ?>