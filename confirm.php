<?php
include "inc/header.php";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])){
	$addOrder = $cmr->OrderProduct();
	$delProd  = $cmr->DelCustomerCart();
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel'])){
	$delCustomer = $cmr->DelLastCustomer();
}
?>
<body>
	<!--header start-->
	<hr>
	<!--header end-->
	<!--hero section start-->
	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-5">
					<?php
					include_once"inc/sidebar.php";
				?>
				</div>
				<div class="col-md-6">
					<?php
					include_once"inc/search.php";
					?>
				</div>
				<div class="col-md-2">
					<div class="hero_search_phone" id="phone">
						<div class="phone_icon">
							<i class=" fa fa-phone"></i>
						</div>
						<div class="phone_text" id="phone">
							<?php
							$address = $add->addressList();
							if($address){
								foreach($address as $value){
						?>
							<h5><?php echo $value['phone'];?></h5>
							<?php } }?>
							<span>support 24/7 time</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="main">
		<div class="container">
			<div class="cartoption">
				<div class="cartpage">
					<div class="row">
					<div class="col-md-4"></div>
						<div class="col-md-4">
							<form action="" method="post">
							<div class="card p-5">
								<input type="submit" name="confirm" class="btn btn-info mb-5" value="Confirm">
								<input type="submit" name="cancel" class="btn btn-danger" value="Cancel">
								</div>
							</form>
						</div>
						<div class="col-md-4">
							<?php 
							if(isset($delProd)){
							echo $delProd;
							}
							?>
						</div>
						<div class="shopping">
							<div class="shopleft">
								<a href="index.php"> <img src="image/shop.png" alt="" /></a>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<?php include "inc/footer.php"?>
