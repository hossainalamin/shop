<?php
include_once"inc/header.php";
?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['buy'])){
		$prodId = $_POST['id'];
		$quantity = 1;
		$addProd = $ct->AddCart($prodId,$quantity); 
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
				<div class="col-md-6">
					<?php
					include_once"inc/search.php";
					?>
				</div>
				<div class="col-md-2">
					<div class="hero_search_phone" id="phone">
						<div class="phone_icon">
							<?php
							$address = $add->addressList();
							if($address){
								foreach($address as $value){
					     	?>
							<a href="tel:<?php echo $value['phone'];?>"><i class=" fa fa-phone"></i>
							</a>
						</div>
						<div class="phone_text" id="phone">
							<h5><?php echo $value['phone'];?></h5>
							<?php } }?>
							<span>support 24/7 time</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
					$addList = $brand->BrandListImg();
							if($addList){
								foreach ($addList as $brandImage) {
				?>
				<div class="col">
					<div class="hero_item" id="image">
						<a href="shop.php"><img src="admin/<?php echo $brandImage['brandName'];?>" alt="" style="width: 1200px; height: 400px; margin-top: 10px;"></a>
					</div>
				</div>
				<?php } } ?>
			</div>
		</div>
	</section>
	<!--hero section end-->
	<!--featured section start-->
	<div class="featured">
		<div class="container3">
			<div class="row4">
				<div class="section_title mb-4">
					<h2>Featured Product</h2>
				</div>
			</div>
			<div class="row" id="featured">
				<?php
				$getFpd = $pd->GetFpd();
				if($getFpd){
					while($value = $getFpd->fetch_assoc()){	
		    	?>
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="admin/<?php echo $value['image'];?>" class=".card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><?php echo $value['productName'];?></h5>
							<p>BDT:<?php echo $value['price'];?></p>
							<a href="detail.php?detail=<?php echo $value['productId'];?>" class="btn btn-outline-primary">Detail</a>
							<form action="" method="post">
								<input type="hidden" value="<?php echo $value['productId'];?>" name="id">
								<br>
								<input type="submit" class="btn btn-danger mt-3" value="Add to cart" name="buy">
								<?php
						if(isset($addProd)){
							echo $addProd;
						}
						?>
							</form>
						</div>
					</div>
				</div>
				<?php } }?>
			</div>
		</div>
	</div>
	<!--featured section end-->
	<!---banner start-->
	<!--banner end-->
	<!--latest product section start-->
	<div class="latest_product">
		<div class="container">
			<div class="row">
				<div class="col-md-4">

				</div>
				<div class="col-md-4">
					<h4>Latest Product</h4>
				</div>
			</div>
			<div class="row" id="leatest">
				<?php
				$getLpd = $pd->GetLpd();
				if($getLpd){
					while($value = $getLpd->fetch_assoc()){	
			?>
				<div class="col-md-4">
					<div>
						<div class="latest_product_item_pic mr-4" style="float:left;">
							<img src="admin/<?php echo $value['image'];?>" alt="">
						</div>
						<div>
							<h6><?php echo $value['productName'];?></h6>
							<p>BDT:<?php echo $value['price'];?></p>
							<a href="detail.php?detail=<?php echo $value['productId'];?>" class="btn btn-outline-dark">Detail</a>
						</div>
					</div>
				</div>
				<?php } }?>
			</div>
		</div>
	</div>
	<!--latest product section end-->
	<!--footer section start-->
	<?php 
	include_once "inc/footer.php";
	?>
