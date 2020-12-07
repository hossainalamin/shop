<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Offered <b>Products</b></h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
				<!-- Wrapper for carousel items -->
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="row">
							<?php 
							$getFpd = $pd->GetOpd();
							if($getFpd){
							while($value = $getFpd->fetch_assoc()){
							?>
							<div class="col-sm-3">
								<div class="thumb-wrapper">
									<div class="img-box">
										<img src="admin/<?php echo $value['image'];?>" class="img-fluid" alt="">
									</div>
									<div class="thumb-content">
										<h4><?php echo $value['productName'];?></h4>
										<p class="item-price"><strike><?php echo $value['bprice'];?></strike> <span><?php echo $value['price'];?></span></p>
										<a href="odetail.php?detail=<?php echo $value['productId'];?>" class="btn btn-outline-primary">Detail</a>
									</div>
								</div>
							</div>
							<?php } } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>