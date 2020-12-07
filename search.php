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
	<!--search-->
	<section class="search">
		<div class="container">
			<div class="row">
				<?php
				if(isset($_GET)){
					$catId  = $_GET['id'];
				}
				$getSpd = $pd->GetSpd($catId);
				if($getSpd){
					while($value = $getSpd->fetch_assoc()){	
		    	?>
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="admin/<?php echo $value['image'];?>" class=".card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#"><?php echo $value['productName'];?></a></h5>
							<p>BDT : <?php echo $value['price'];?></p>
							<a href="detail.php?detail=<?php echo $value['productId'];?>" class="btn btn-outline-dark">Detail</a>
						</div>
					</div>
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
