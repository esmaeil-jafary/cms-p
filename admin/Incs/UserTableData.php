<?php
$UserObj=new User();
if (isset($_GET["Delete"])){
    $id=$_GET["Delete"];
    $UserObj->DeleteUser($id);
    $PageName=$_SERVER["PHP_SELF"];
    header("location: $PageName");
}
$Users=$UserObj->getAllUser();

?>
<table id="PostTable" class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>  id  </th>
        <th>نام کاربری</th>
        <th>نام</th>
        <th> نام خانوادگی</th>
        <th> ایمیل</th>
        <th>rolا</th>
        <th>ویرایش</th>
        <th>حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($Users as $User){ ?>
        <tr>


            <td><?=$User["id"]?></td>
            <td><?=$User["UserName"]?></td>
            <td><?=$User["FirstName"]?></td>
            <td><?=$User["LastName"]?></td>
            <td><?=$User["Email"]?></td>
            <td><?=$User["Rol"]?></td>
            <td><a href="?type=EditUser&Uid= <?= $User["id"] ?>" class="btn btn-primary">ویرایش</a></td>
<!--            آن کلیک را برای اینکه هنگام پاک کردن پیغام آیا مطمئن هستید می خواهید پاک کنید را نمایش بهد-->
            <td><a onclick="return confirmMessage()" href="?Delete=<?=$User["id"] ?>" class="btn btn-danger">حذفف</a></td>
        </tr>
    <?php }
    ?>
    </tbody>
</table>
