<?php
include_once"inc/header.php";
?>
<link rel="stylesheet" href="css/shop.css">
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
	<!--Offer-->
	<?php include"inc/offer.php";?>
	<!--featured section start-->
	<?php
    $per_page = 4;
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
	<div class="featured">
		<div class="container3">
			<div class="row4">
				<div>
					<h2 class="mb-4">All PRODUCTS</h2>
				</div>
			</div>
			<div class="row" id="featured">
			<?php 
				$getPd = $pd->GetAllPd($start_from,$per_page);
				if($getPd){
					foreach($getPd as $data){
			?>
				<div class="col-md-3">
					<div class="card m-0 p-0">
						<img src="admin/<?php echo $data['image'];?>"class="card-img-top img-fluid" alt="">
						<div class="card-footer">
							<h5><?php echo $data['productName'];?></h5>
							<p>BDT:<?php echo $data['price'];?></p>
							<a href="detail.php?detail=<?php echo $data['productId'];?>" class="btn btn-outline-primary">Detail</a>
						</div>
					</div>
				</div>
				<?php } }?>
			</div>
		</div>
	</div>
	<section id="pagination">
    <?php
        $totalPages = $pd->paginationShop(); 
		if($totalPages){
    ?>
        <nav aria-label="Page navigation example ">
            <ul class="pagination justify-content-center my-4">
            <?php 
            for($i = 1 ; $i<=$totalPages ; $i++)
            {
                
            ?>
                <li class="page-item"><a class="page-link" href="shop.php?page=<?php echo $i;?>">
                <?php echo $i;?></a></li>
                <?php } } ?>
            </ul>
        </nav>
    </section>
	<!--footer section start-->
	<?php include "inc/footer.php"?>
