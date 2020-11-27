<?php
include_once"inc/header.php";
if(isset($_GET['search'])){
	$name  = $_GET['search'];
}
?>
<body>
	<!--header start-->
	<?php include "inc/navbar.php"?>
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
	<!--slider-->
	<!--
	<div class="container my-4">
		<div class="row">
			<div class="col-md-3">
				<img src="image/featured_product/bananna.png" alt="">
			</div>
			<div class="col-md-3">
				<img src="image/featured_product/bananna.png" alt="">
			</div>
			<div class="col-md-3">
				<img src="image/featured_product/bananna.png" alt="">
			</div>
			<div class="col-md-3">
				<img src="image/featured_product/bananna.png" alt="">
			</div>
		</div>
	</div>
-->
	<!--slider end-->
	<!--search-->
	<?php
    $per_page = 3;
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }
    $start_from = ($page-1)*$per_page;
    ?>
	<section class="search">
		<div class="container">
			<div class="row">
				<?php
				$getSpd = $pd->GetSearchpd($name,$start_from,$per_page);
				if($getSpd){
					while($value = $getSpd->fetch_assoc()){	
		    	?>
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="admin/<?php echo $value['image'];?>" class=".card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><a href="#"><?php echo $value['productName'];?></a></h5>
							<p><?php echo $value['price'];?></p>
							<a href="detail.php?detail=<?php echo $value['productId'];?>" class="btn btn-outline-dark">Shop Now</a>
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
<!--	pgination   -->
	<section id="pagination">
    <?php
        $totalPages = $pd->pagination($name); 
		if($totalPages){
    ?>
        <nav aria-label="Page navigation example ">
            <ul class="pagination justify-content-center my-4">
            <?php 
            for($i = 1 ; $i<=$totalPages ; $i++)
            {
                
            ?>
                <li class="page-item"><a class="page-link" href="fsearch.php?page=<?php echo $i;?>&&search=<?php echo $name;?>">
                <?php echo $i;?></a></li>
                <?php } } ?>
            </ul>
        </nav>
    </section>
	<!--footer section start-->
	<?php 
	include_once "inc/footer.php";
	?>
