<?php
	include ("lib/Session.php");
	include_once "lib/Database.php";
	include_once "helpers/Formate.php";
	Session::init();
	spl_autoload_register(
		function($class){
			include_once"classes/".$class.'.php';
		});
	$db  = new Database();
	$fm  = new Formate();
	$pd  = new Product();
	$cat = new Catagory();
	$ct  = new Cart();
	$cmr = new Customer();
	$brand = new Brand();
	$add = new Address();
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache"); 
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
	header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/style.css">
	<!--jquery CDN-->
	<script>
		$(document).ready(function() {
			$(".all_dept").click(function() {
				$(".items").slideToggle(500);
			});
		});

	</script>
	<title>Shop</title>
</head>
<nav class="navbar  navbar-light navbar-expand-md">
	<div class="container">
		<a class="navbar-brand" href="index.php">
			<img src="image/M logo.eps6copy.png" alt="" height="100px" loading="lazy">
		</a>
		<span class="navbar-toggler" class="btn btn-dark" data-toggle="collapse" data-target="#navbarSupportedContent"><i class="fa fa-bars" aria-hidden="true"></i></span>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="shop.php">Shop</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
						<?php
									$checkCart = $ct->CheckCart();
									if($checkCart){
									$sum = Session::get("sum");
									$qty = Session::get("qty");
									echo "$". " ".$sum." | "."Qty:".$qty;
									}else{
										echo "0";
									}
								?></a>
				</li>
			</ul>
		</div>
	</div>
</nav>
