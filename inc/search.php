					<div class="mainbar" style="margin-bottom:180px;">
						<div class="hero_search_form">
							<form action="fsearch.php" method="get">
								<div class="all_categories">
									All Categories
								</div>
								<input type="text" placeholder="What do you need...?" name="search">
								<button type="submit">SEARCH</button>
								<h4><a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
								    <?php
									$checkCart = $ct->CheckPrice();
									if(isset($checkCart)){
									echo "$checkCart";
									}else{
										echo "(0)";
									}
								?>
								</a></h4>
							</form>
							<img src="image/add/question-1015308_960_720.webp" height="200px" alt="" style="width: 100%;margin-top:10px;" id="img">
						</div>
					</div>