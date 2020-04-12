<?php include_once "classes/db.php";?>
<?php include_once "classes/Menu_Cls.php"; ?>

<?php
$MenuObj = new Menu();
$Menus = $MenuObj->getMenu();

//برای اینکه سر منو ها را شناسای کنیم
function getSubMenu($Menus, $MenuId = null)
{
    $SubMenus = [];
    foreach ($Menus as $M) {
        if ($M["parent_id"] == $MenuId) {
            $SubMenus[] = $M;
        }
    }
    return $SubMenus;
}
function renderMenu($Menus,$SubMenu){
//دو نوع ساب منو داریم که ممکن است خودش اخرین باشد و دیگر ساب منو نداشته باشد و یا خودش ساب منو دیگر هم داشته باشد
$SubSubMenu=getSubMenu($Menus,$SubMenu["id"]);
//کوچکتر از یک یعنی خودش انتهایی بود
if (count($SubSubMenu )<1){
    echo " <li class=\"dropdown-item\"><a href='{$SubMenu['url']}'> {$SubMenu['name']}</a></li>";
}
//اما اگر خودش ساب منو دارد
else{
   echo"<li class=\"dropdown-item dropdown-submenu\">";
   echo "<a class=\"test\" tabindex=\"-1\" href=\"#\">{$SubMenu['Name']} <span class=\"caret\"></span></a>";
   echo "<ul class=\"dropdown-menu\">";
//   حالا باید بگوییم رندر منو کن این ساب منو را
foreach ($SubSubMenu as $sMenu){
    renderMenu($Menus,$sMenu);
}
echo "</ul>";
echo "</li>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js">

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <style>
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
        }

        .dropdown {
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="container">
    <!--    برای نمایش منو هنوها ابتدا باید منو های اصلی را پیدا کنیم-->
    <?php
    $MasterMenu = getSubMenu($Menus);
    //الان مستر منو  ها را می گیریم و باید یه حلقه ایجاد کنیم تا
    //قبلا حلقه را می بستیم اما پی اچ پی یک روش دیگر هم دارد  که بصورت زیر است
    foreach ($MasterMenu as $men): ?>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?= $men["name"] ?>
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
<!--                برای اینکه منو باد زیر منوهای خود را صدا بزند از تابع بازگشتی استفتده می کنیم -->
                <?php
//                        الان می گوئیم ساب منو های این منو را برای ما در بیاور
                $SubMenus=getSubMenu($Menus,$men["id"]);
//                    حالا یک حلقه می گذاریم و می گوییم هر یاب منو که در اوردی باید ال ای ان را هم نمایش بدهی
                foreach ($SubMenus as $subMenu){
//                    کل منو ها را به تابع رندر می دهیم و می گوییم ساب منو هایش را هم بیاور
                    renderMenu($Menus,$subMenu);

                }
                ?>
            </ul>
        </div>

    <?php endforeach; ?>
<!--    برای ایجاد ajax-->

    <div class="form-group mt-5">
        <input class="form-control" type="text" id="text" placeholder="type Is">
    </div>
<div id="cn">

</div>

</div>
<script>
    $(document).ready(function () {
        $('.dropdown-submenu a.test').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
        $('#text').keydown(function (e) {
            var value=$('#text').val();
            $.ajax({
                url:'Ajax.php?q='+value,
                method:'get',
                success:function (data) {
                    $('#cn').html(data);
                }
            });
        })
    });
</script>

</body>
</html>
