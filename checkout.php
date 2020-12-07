<?php
include "inc/header.php";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])){
	$addCustomer = $cmr->AddCustomer($_POST);
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
						<div class="col">
							<h2 class="py-2 text-center"><span style="font-family:cursive;">Please Enter your Address to complete order</span></h2>
						</div>
					</div>
					<?php 
					if(isset($upQuantity)){
						echo $upQuantity;
					}
					if(isset($delPro)){
						echo $delPro;
					}
					if(isset($addCustomer)){
						echo $addCustomer;
					}
					?>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<form action="" method="post">
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="name" placeholder="Enter your name">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="city" placeholder="Enter city">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="address" placeholder="Enter address">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="phone" placeholder="Enter Phone">
										</div>
										<div class="form-group">
											<input type="Email" class="form-control" name="email" placeholder="Enter email">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="submit" class="btn btn-success mt-3" value="Order" name="register">
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-2"></div>
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
