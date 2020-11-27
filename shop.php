<?php
include_once"inc/header.php";
?>
<style>
	body {
		font-family: "Open Sans", sans-serif;
	}

	h2 {
		color: #000;
		font-size: 26px;
		font-weight: 300;
		text-align: center;
		text-transform: uppercase;
		position: relative;
		margin: 30px 0 80px;
	}

	h2 b {
		color: #ffc000;
	}

	h2::after {
		content: "";
		width: 100px;
		position: absolute;
		margin: 0 auto;
		height: 4px;
		background: rgba(0, 0, 0, 0.2);
		left: 0;
		right: 0;
		bottom: -20px;
	}

	.carousel {
		margin: 50px auto;
		padding: 0 70px;
	}

	.carousel .carousel-item {
		min-height: 330px;
		text-align: center;
		overflow: hidden;
	}

	.carousel .carousel-item .img-box {
		height: 160px;
		width: 100%;
		position: relative;
	}

	.carousel .carousel-item img {
		max-width: 100%;
		max-height: 100%;
		display: inline-block;
		position: absolute;
		bottom: 0;
		margin: 0 auto;
		left: 0;
		right: 0;
	}

	.carousel .carousel-item h4 {
		font-size: 18px;
		margin: 10px 0;
	}

	.carousel .carousel-item .btn {
		color: #333;
		border-radius: 0;
		font-size: 11px;
		text-transform: uppercase;
		font-weight: bold;
		background: none;
		border: 1px solid #ccc;
		padding: 5px 10px;
		margin-top: 5px;
		line-height: 16px;
	}

	.carousel .carousel-item .btn:hover,
	.carousel .carousel-item .btn:focus {
		color: #fff;
		background: #000;
		border-color: #000;
		box-shadow: none;
	}

	.carousel .carousel-item .btn i {
		font-size: 14px;
		font-weight: bold;
		margin-left: 5px;
	}

	.carousel .thumb-wrapper {
		text-align: center;
	}

	.carousel .thumb-content {
		padding: 15px;
	}
	.carousel-control-prev i,
	.carousel-control-next i {
		color: black;
		font-size: 30px;
		position: absolute;
		top: 50%;
		display: inline-block;
		margin: -16px 0 0 0;
		z-index: 5;
		left: 0;
		right: 0;
		color: rgba(0, 0, 0, 0.8);
		text-shadow: none;
	}

	.carousel-control-prev i {
		margin-left: -3px;
	}

	.carousel-control-next i {
		margin-right: -3px;
	}

	.carousel .item-price {
		font-size: 13px;
		padding: 2px 0;
	}

	.carousel .item-price strike {
		color: #999;
		margin-right: 5px;
	}

	.carousel .item-price span {
		color: #86bd57;
		font-size: 110%;
	}

	.carousel .carousel-indicators {
		bottom: -50px;
	}

	.carousel-indicators li,
	.carousel-indicators li.active {
		width: 10px;
		height: 10px;
		margin: 4px;
		border-radius: 50%;
		border-color: transparent;
		border: none;
	}

	.carousel-indicators li {
		background: rgba(0, 0, 0, 0.2);
	}

	.carousel-indicators li.active {
		background: rgba(0, 0, 0, 0.6);
	}

	.star-rating li {
		padding: 0;
	}

	.star-rating i {
		font-size: 14px;
		color: #ffc000;
	}

</style>

<body>
	<!--header start-->
	<?php include"inc/navbar.php";?>
	<hr>
	<!--header end-->
	<!--hero section start-->
	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
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
							<h5>+65 11.188.888</h5>
							<span>support 24/7 time</span>
						</div>
					</div>
				</div>
			</div>
			<!--
			<div class="row">
				<div class="col">
					<div class="slidersection templete clear">
						<div id="slider">
							<a href="#"><img src="image/featured_product/bananna.png" alt="nature 1" title="<?php echo $data['title'];?>" /></a>
						</div>
					</div>
				</div>
			</div>
			-->
		</div>
	</section>
	<!--Slider-->
	<?php include"inc/slider.php";?>
	<!--featured section start-->
	<div class="featured">
		<div class="container3">
			<div class="row4">
				<div class="section_title">
					<h2 class="my-3">All PRODUCTS</h2>
				</div>
			</div>
			<div class="row" id="featured">
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="image/featured_product/mango.png" class="card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#">Crab Pool Security</a></h5>
							<p>Price:$30.00</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="image/featured_product/mango.png" class="card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#">Crab Pool Security</a></h5>
							<p>Price:$30.00</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="image/featured_product/mango.png" class="card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#">Crab Pool Security</a></h5>
							<p>Price:$30.00</p>
						</div>
					</div>

				</div>

				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="image/featured_product/mango.png" class="card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#">Crab Pool Security</a></h5>
							<p>Price:$30.00</p>
						</div>
					</div>

				</div>
			</div>
			<div class="row" id="featured">
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="image/featured_product/mango.png" class="card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#">Crab Pool Security</a></h5>
							<p>Price:$30.00</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="image/featured_product/mango.png" class="card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#">Crab Pool Security</a></h5>
							<p>Price:$30.00</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="image/featured_product/mango.png" class="card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#">Crab Pool Security</a></h5>
							<p>Price:$30.00</p>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="image/featured_product/mango.png" class="card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#">Crab Pool Security</a></h5>
							<p>Price:$30.00</p>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
	<!--featured section end-->
	<!---banner start-->
	<!--banner end-->
	<!--latest product section start-->
	<div class="latest_product">
		<div class="container">
			<div class="row" id="leatest">
				<div class="col-md-4">
					<div class="latest_product">
						<h4>Latest Product</h4>
						<div class="latest_slider_product">
							<a class="latest_product_item">
								<div class="latest_product_item_pic">
									<img src="image/latest/pd1.png" alt="latest product">
								</div>
								<div class="latest_product_item_text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a class="latest_product_item">
								<div class="latest_product_item_pic">
									<img src="image/latest/pd2.png" alt="latest product">
								</div>
								<div class="latest_product_item_text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a class="latest_product_item">
								<div class="latest_product_item_pic">
									<img src="image/latest/pd3.png" alt="latest product">
								</div>
								<div class="latest_product_item_text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="latest_product">
						<h4>Latest Product</h4>
						<div class="latest_slider_product">
							<a class="latest_product_item">
								<div class="latest_product_item_pic">
									<img src="image/latest/pd1.png" alt="latest product">
								</div>
								<div class="latest_product_item_text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a class="latest_product_item">
								<div class="latest_product_item_pic">
									<img src="image/latest/pd2.png" alt="latest product">
								</div>
								<div class="latest_product_item_text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a class="latest_product_item">
								<div class="latest_product_item_pic">
									<img src="image/latest/pd3.png" alt="latest product">
								</div>
								<div class="latest_product_item_text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="latest_product">
						<h4>Latest Product</h4>
						<div class="latest_slider_product">
							<a class="latest_product_item">
								<div class="latest_product_item_pic">
									<img src="image/latest/pd1.png" alt="latest product">
								</div>
								<div class="latest_product_item_text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a class="latest_product_item">
								<div class="latest_product_item_pic">
									<img src="image/latest/pd2.png" alt="latest product">
								</div>
								<div class="latest_product_item_text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
							<a class="latest_product_item">
								<div class="latest_product_item_pic">
									<img src="image/latest/pd3.png" alt="latest product">
								</div>
								<div class="latest_product_item_text">
									<h6>Crab Pool Security</h6>
									<span>$30.00</span>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--latest product section end-->
	<!--footer section start-->
	<div class="footer">
		<div class="container">
			<div class="row" id="footer">
				<div class="col-md-4">
					<div class="footer_img">
						<img src="image/header_logo.png" alt="footer image">
					</div>
					<div class="footer_left_text">
						<ul>
							<li>Address: 60-49 Road 11378 New York</li>
							<li>Phone: +65 11.188.888</li>
							<li>Email: hello@colorlib.com</li>
						</ul>

					</div>
				</div>
				<div class="col-md-4">
					<div class="footer_middle">
						<h5>Useful Links</h5>
						<ul>
							<li>About Us</li>
							<li>About Our Shop</li>
							<li>Delivery information</li>
							<li>Our Services</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="footer_last">
						<div class="footer_last_text">
							<h5>Join Our Newsletter Now</h5>
							<p>Get E-mail Updates Bout our latest shop and special offers</p>
						</div>
						<div class="footer_last_social">
							<ul>
								<li><a href=""><i class="fab fa-facebook"></i></a></li>
								<li><a href=""><i class="fab fa-instagram"></i></a></li>
								<li><a href=""><i class="fab fa-twitter"></i></a></li>
								<li><a href=""><i class="fab fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<hr style="  color:#fff;opacity: .3; margin: auto;">
					<div class="row_footer_bottom" id="footer">
						<p>Copyright ©2020 All rights reserved </p>
					</div>
				</div>
			</div>
		</div>
		<!--footer section end-->
		<script src="js/script.js"></script>
	</div>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
