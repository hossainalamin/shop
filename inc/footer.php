	<div class="footer">
		<div class="container">
			<div class="row" id="footer">
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<div class="footer_img">
						<img src="image/M logo.eps6copy.png" alt="footer image">
					</div>
					<div class="footer_left_text">
						<ul>
							<?php
							$address = $add->addressList();
							if($address){
								foreach($address as $value){
						?>
							<li><?php echo $value['address'];?></li>
							<li><?php echo $value['email'];?></li>
							<li><?php echo $value['phone'];?></li>
							<?php } }?>
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
								<li><a href=""><i class="fab fa-youtube"></i></a></li>
								<li><a href=""><i class="fab fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-2"></div>
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
