<?php include "Incs/header.php" ?>
<?php include "Incs/Navigation.php" ?>
<?php
$catobj = new category();
$categories = $catobj->getallCategories();

?>



<div id="wrapper">

	<!-- Sidebar -->
	<?php include "Incs/Sidebar.php" ?>

	<div id="content-wrapper">

		<div class="container-fluid">

			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="#">داشبورد</a>
				</li>
				<li class="breadcrumb-item active">دسته بندی ها</li>
			</ol>
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
							<button class="btn btn-primary" type="submit">افزودن</button>
						</div>
				</div>
				<div class="col-md-5">
					<!--کلاس تیبل هاور برای زیبا کردن تیبل می باشد-->
<table id="categoryTable" class="table table-hover table-bordered">
	<thead>
							<tr>
								<th>کد</th>
								<th>نام</th>
								<th>توضیحات</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ( $categories as $category ) {
								?>
							<tr>
								<td>
									<?=$category["id"]?>
								</td>
								<td>
									<?=$category["name"]?>
								</td>
								<td>
									<?=$category["Discrip"]?>
								</td>
							</tr>
							<?php }
	?>
						</tbody>
					</table>
				</div>

				</form>
				<!-- Icon Cards-->

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->

			<?php include "Incs/Footer.php" ?>