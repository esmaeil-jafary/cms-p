<?php
if (isset($_POST["Submit"])) {
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
//    برای اینکه نام عکس را بیاورد و همان را ذخیره کند
    $FileName=$_FILES["MyFile"]["name"];
    move_uploaded_file($_FILES["MyFile"]["tmp_name"],"images/$FileName");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UploadFile</title>
</head>
<body>
<!--فرم برای آپلود فایلها-->
<!--برای ارسال فایل متود حتما باید پوست باشد-->
<!--برای پست از انک تایپ باید استفاده کنیم ومقدار ؛آنرا مانند پایین قرار بدهیم-->
<form method="post" action="<?=$_SERVER["PHP_SELF"]?>" enctype="multipart/form-data" >
<input type="file" name="MyFile">
<button type="Submt" name="Submit" >ارسال فایل</button>
</form>
</body>
</html>