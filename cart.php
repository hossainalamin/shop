<?php
include "inc/header.php";
if(isset($_GET['cartId'])){
    $cartId  = preg_replace('/[^-a-zA-Z0-9_]/','',$_GET['cartId']);
	$delPro  = $ct->DelProductByCart($cartId); 
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$quantity    = $_POST['quantity'];
	$cartId      = $_POST['cartId'];
	$upQuantity  = $ct->UpQuantity($quantity,$cartId);
	if($quantity <= 0){
		$ct->DelProductByCart($cartId);
	}
}
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
}
?>

<body>
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
				<div class="col-md-6 my-5">
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
							<h2 class="py-2">Your Cart</h2>
						</div>
					</div>
					<?php 
				if(isset($upQuantity)){
					echo $upQuantity;
				}
				if(isset($delPro)){
					echo $delPro;
				}
				?>
					<div class="row">
						<div class="col">
							<table class="table table-hover table-sm" id="table">
								<thead>
									<tr>
										<th scope="col">SL</th>
										<th scope="col">Product</th>
										<th scope="col">Image</th>
										<th scope="col">Price</th>
										<th scope="col">Quantity</th>
										<th scope="col">Total Price</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<?php
					$getCprod = $ct->GetCprod();
					if($getCprod){
						$i   = 0;
						$sum = 0;  
						$qty = 0;  
						foreach($getCprod as $value){
						$i++;	
						?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $value['productName'];?></td>
									<td><img src="admin/<?php echo $value['image'];?>" width="80px;" alt="" /></td>
									<td><?php echo $value['price'];?></td>
<!--
									<td>
										<form action="" method="post">
											<input type="hidden" name="cartId" value="<?php echo $value['cartId'];?>" />
											<input type="number" class="border" name="quantity" id="qty" value="<?php echo $value['quantity'];?>" />
											<input type="submit" class="btn btn-success" name="submit" id="qty" value="Update" />
										</form>
									</td>
-->
									<td>
										<?php
								$total = $value['price']*$value['quantity'];
								echo $total;
								$sum  = $sum + $total;
								$qty  = $qty+$value['quantity'];
								Session::set("sum", $sum);
								Session::set("qty", $qty);
								?>
									</td>
									<td><a onclick="return confirm('Are you sure to delete!')" ; href="?cartId=<?php echo $value['cartId'];?>" class="btn btn-danger">Delete</a></td>
								</tr>
								<?php } } ?>
							</table>
						</div>
					</div>
					<?php 
				$checkCart = $ct->CheckCart();
				if($checkCart){
				?>
					<table style="float:right;text-align:left;" width="40%">
						<tr>
							<th>Sub Total : </th>
							<td><?php echo $sum;?></td>
						</tr>
					</table>
					<?php } else { 
					echo "you cart is empty.Please purchase any product!";
				}?>
				</div>
				<div class="shopping">
					<div class="shopleft">
						<a href="index.php"> <img src="image/shop.png" alt="" /></a>
					</div>
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4"></div>
						<div class="col-md-4">
							<?php 
						$checkCart = $ct->CheckCart();
						if($checkCart){
						?>
							<div class="shopright">
								<a href="checkout.php"><img src="image/check.png" alt="" /></a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<?php include "inc/footer.php"?>
