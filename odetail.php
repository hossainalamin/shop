<?php
include_once"inc/header.php";
?>

<body>
	<hr>
	<!--header end-->
	<!--hero section start-->
	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-4">
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
	<?php
	if(isset($_GET)){
	$prodId  = $_GET['detail'];
	}
	if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['buy'])){
		$quantity = $_POST['qty'];
		$addProd = $ct->AddOCart($prodId,$quantity); 
	}
	?>
	<!--search-->
	<section class="detail">
		<div class="container">
			<div class="row">
				<?php
				if(isset($_GET)){
					$prodId  = $_GET['detail'];
				}
				$getPd = $pd->GetOProById($prodId);
				if($getPd){
					while($value = $getPd->fetch_assoc()){	
		    	?>
				<div class="col-md-3">
					<img src="admin/<?php echo $value['image'];?>" class=".card-img-top img-fluid" alt="">
				</div>
				<div class="col-md-8">
					<h5>Product : <?php echo $value['productName'];?></h5>
					<p>Price:<?php echo $value['price'];?></p>
					<p>Detail:<?php echo $value['body'];?></p>
					<form action="" method="post">
						<table>
							<tr>
								<td>Quantity:<input type="number" class="w 25%" name="qty" value="1"></td>
							</tr>
							<tr>
								<td><input type="submit" class="btn btn-danger" value="Add to cart" name="buy"></td>
							</tr>
						</table>
					</form>
					<?php
						if(isset($addProd)){
							echo $addProd;
						}
					?>
				</div>

				<?php } } else { ?>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<img src="image/add/cranium-2028555_960_720.webp" class=".card-img-top img-fluid" alt="">
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!--footer section start-->
	<?php 
	include_once "inc/footer.php";
	?>
