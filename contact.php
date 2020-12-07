<?php
include_once"inc/header.php";
?>

<body>
	<!--image-->
	<div>
		<img src="image/Background_new.jpg" width="1350px" height="500px" alt="">
	</div>
	<hr class="bg-success">
	<!--contact-->
	<?php 
	if(isset($_POST['save'])){
		$contact = $cmr->Contact($_POST);
	}
	?>
	<section id="from">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<form action="" method="post">
						<div class="card">
							<div class="card-body text-center">
								<?php 
									if(isset($contact)){
										echo $contact;
									}
									?>
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
											<input type="submit" class="btn btn-block btn-primary mt-3" name="save" value="Send">
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
								<p class="lead">Online shopping with BissoBazar</p>
								<?php
								$address = $add->addressList();
								if($address){
									foreach($address as $value){
								?>
								<h4>Address</h4>
								<p><?php echo $value['address'];?></p>
								<h4>Email</h4>
								<p><?php echo $value['email'];?></p>
								<h4>Phone</h4>
								<p class="lead mb-2">
									<?php echo $value['phone'];?>
								</p>
								<?php } }?>
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
