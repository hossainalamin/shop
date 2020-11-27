					<div class="sidebar">
						<div class="all_dept">
							<i class=" fa fa-bars"></i>
							<span>All departments</span>
						</div>
						<div class="items">
							<ul>
								<?php 
								$getCat = $cat->catagoryList();
								if($getCat){
								foreach($getCat as $data){
								?>
								<li><a href="search.php?id=<?php echo $data['catId'];?>"><?php echo $data['catName'];?></a></li>
								<?php } }?>
							</ul>
						</div>
					</div>
