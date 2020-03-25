<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-md-3">
    <a class="navbar-brand" href="index.php">صفحه اصلی</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li> -->
            <?php
            $cat=new Category ();
            $cats=$cat->getAllCategories();
            foreach ($cats as $c) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?=$c["name"]?><a/>
                </li>

                <?php
            }
//            الان میخواهیم حالتی را بگذاریم که وقتی کاربر ادمین ادمین وارد شد بتواند از همان صفحه اصلی پست ها را ادیت کند
//            اگر سیشن یوز نیم ست شده بود و رول آن هم ادمین بود و صفحه ای که در ان قرار داریم Post.php باشد
            if (isset($_SESSION['UserName']) && $_SESSION['Rol']=="Admin" && strpos($_SERVER["PHP_SELF"],"Post.php")>0){
                echo '<li class="nav-item"><a class="nav-link" href="admin/Post.php?Type=EditPost&Pid='.$_GET["Pid"].'"> EditPost  </a></li>';
            }
            ?>
			<li class="nav-item ">
				<a class="nav-link" href="admin">Admin</a>
			</li>
        </ul>
        <!--<span class="navbar-text">-->
        <!--Navbar text with an inline element-->
        <!--</span>-->
    </div>
</nav>
