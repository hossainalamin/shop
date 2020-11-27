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
	<!--jquery-->
	<script src="js/lightslider.min.js"></script>
	<!--slider js-->
	<script src="js/lightslider.js"></script>
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