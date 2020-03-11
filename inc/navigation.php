<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-md-3">
    <a class="navbar-brand" href="#">CMS Site</a>
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
            include_once "inc/classes/db.php" ;
            include_once "inc/classes/Categorys_cls.php" ;
            $cat=new Category ();
            $cats=$cat->getAllCategories();
            foreach ($cats as $c) {
                ?>
            <li class="nav-item">
                <a class="nav-link" href="#"><?=$c["name"]?><a/>
            </li>
            
            <?php 
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
