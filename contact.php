<!DOCTYPE html>
<html lang="en">

<?php
include_once"inc/header.php";
?>
<body>
	<!--header start-->
	<nav class="navbar navbar-light navbar-expand-md">
		<div class="container">
			<a href="index.html" class="navbar-brand">
				<img src="image/header_logo.png" alt="">
			</a>
			<span class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"><i class="fa fa-bars" aria-hidden="true"></i></span>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a class="nav-link  active" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="shop.php">Shop</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cart.php">Cart</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="blog.php">Blog</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="contact.php">contact</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--header end-->
	<!--image-->
	<div id="image">
		<div class="dark-overlay">
		</div>
		<h2 style='color: black;'>Feel free to contact us</h2>
	</div>
	<hr class="bg-success">
	<!--contact-->

	<section id="from">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<form action="" method="post">
						<div class="card">
							<div class="card-body text-center">
								<h1>Please Fill this form </h1>
								<br>
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="fname" placeholder="Enter your first name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="lname" placeholder="Enter your last name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="Email" class="form-control" name="email" placeholder="Enter email">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" name="phone" placeholder="Enter Phone">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea rows="10" cols="30" class="form-control" name="text">
                                            </textarea>
											<button class="btn btn-block btn-primary mt-3">Send</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card">
							<div class="card-body">
								<h4>Get in touch</h4>
								<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, molestias.</p>
								<h4>Address</h4>
								<p>Mirpur</p>
								<h4>Email</h4>
								<p class="lead">hossainalamin980@gmail.com</p>
								<h4>Phone</h4>
								<p class="lead mb-2">************</p>
								<p class="lead">***********</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
<?php
include_once"inc/footer.php";
?>
