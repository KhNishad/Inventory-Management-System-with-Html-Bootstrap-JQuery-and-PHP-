<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:" . DOMAIN . "/");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/97c02f89cd.js"></script>
	<script type="text/javascript" src="./js/main.js"></script>
	<script type="text/javascript" rel="stylesheet" src="./js/manage.js"></script>
</head>

<body>

	<?php include_once("./templates/header.php") ?>
	<?php include_once("./templates/catagory.php") ?>
	<?php include_once("./templates/brand.php") ?>
	<?php include_once("./templates/product.php") ?>
	<?php include_once("./templates/update_profile.php") ?>
	<!-- Navbar -->
	<br /><br />
	<div class="container">
		<div class="row">
			<div class="col-md-4 ">
				<div class="card mx-auto">
					<img class="card-img-top mx-auto" style="width:60%;" src="./images/download.png" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Profile Info</h4>
						<p class="card-text"><i class="fa fa-user text-success"> Name: </i> <?php echo $_SESSION["username"]; ?></p>
						<p class="card-text"><i class="fa fa-user text-danger"> User Type:</i> <?php echo $_SESSION["usertype"]; ?></p>

						<p class="card-text"><i class="fa fa-clock-o text-info" aria-hidden="true"> Last Login:</i> <?php echo $_SESSION["last_login"]; ?></p>
						<a href="#" eid="<?php echo $_SESSION["userid"] ?>" class="btn btn-primary edit_profile" data-toggle="modal" data-target="#form_pro"> <i class="fas fa-edit"> Edit Profile</i></a>


					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1 class="text-center text-primary">Welcome <?php echo $_SESSION["username"]; ?> </h1>
					<div class="row">
						<div class="col py-4">
							<div class="text-center">
								<iframe src="http://free.timeanddate.com/clock/i71t13mj/n73/szw110/szh110/hbw0/hfc000/cf100/hgr0/fav0/fiv0/mqcfff/mql15/mqw4/mqd94/mhcfff/mhl15/mhw4/mhd94/mmv0/hhcbbb/hmcddd/hsceee" frameborder="0" width="110" height="110"></iframe>

							</div>
						</div>

						<br>
						<div class="row p-2">
							<div class="col-sm-6">
								<div class="card bg-dark text-light text-left">
									<div class="card-body">
										<h4 class="card-title">New Orders</h4>
										<p class="card-text">Here you can make invoices and create new orders</p>
										<a href="new_order.php" class="btn btn-primary"><i class="fab fa-first-order"></i> New Orders</a>
									</div>
								</div>
							</div>
							<div class="col-sm-6 ">
								<div class=" card bg-dark text-light">
									<div class="card-body">
										<h4 class="card-title">Sales</h4>
										<p class="card-text">Here you can Check invoices and Order Details</p>
										<a href="sales.php" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Sales</a>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4 py-2">
				<div class="card bg-dark text-white">
					<div class="card-body">
						<h4 class="card-title">Categories</h4>
						<p class="card-text">  Here you can manage your categories and you add new parent and sub categories</p>
						<a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
						<a href="manage_categories.php" class="btn btn-primary"><i class="fa fa-tasks" aria-hidden="true"></i> Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 py-2">
				<div class="card  bg-dark text-white">
					<div class="card-body">
						<h4 class="card-title">Brands</h4>
						<p class="card-text">Here you can manage your brand and you add new brand</p>
						<a href="#" data-toggle="modal" data-target="#brand" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
						<a href="manage_brand.php" class="btn btn-primary"><i class="fa fa-tasks" aria-hidden="true"></i> Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 py-2">
				<div class="card  bg-dark text-white">
					<div class="card-body">
						<h4 class="card-title">Products</h4>
						<p class="card-text">Here you can manage your prpducts and you add new products</p>
						<a href="#" data-toggle="modal" data-target="#product" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
						<a href="manage_product.php" class="btn btn-primary"><i class="fa fa-tasks" aria-hidden="true"></i> Manage</a>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>