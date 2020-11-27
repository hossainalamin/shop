<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Offered <b>Products</b></h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
				<!-- Carousel indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for carousel items -->
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="row">
							<?php 
							$getFpd = $pd->GetFpd();
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
										<p class="item-price"><strike>$400.00</strike> <span><?php echo $value['price'];?></span></p>
										<a href="#" class="btn btn-primary">Add to Cart</a>
									</div>
								</div>
							</div>
							<?php } } ?>
						</div>
					</div>
				</div>
				<!-- Carousel controls -->
				<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
				</a>
				<a class="carousel-control-next" href="#myCarousel" data-slide="next">
					<i class="fa fa-chevron-right" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
</div>