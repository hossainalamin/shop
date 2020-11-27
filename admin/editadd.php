<?php 
include '../classes/Address.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$add = new Address();
if(!isset($_GET['catId']) or $_GET['catId'] == NULL){
    echo "<script>window.location = 'viewadress.php'</script>";
}else{
    $id  = $_GET['catId'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $upAdd = $add->UpAdd($address,$email,$phone,$id);
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Update Address</h2>
		<div class="block copyblock">
			<?php
                if(isset($upAdd)){
                    echo $upAdd;
                }
                $getadd = $add->getAddById($id);
                if($getadd){
                    while ($result = $getadd->fetch_assoc()) {
                    
                ?>
			<form action="" method="post">
				<table class="form">
					<tr>
						<td>
							<input type="text" name="address" value="<?php echo $result['address'];?>" class="medium" />
							<input type="text" name="email" value="<?php echo $result['email'];?>" class="medium" /><input type="text" name="phone" value="<?php echo $result['phone'];?>" class="medium" />
						</td>
					</tr>
					<?php } } ?>
					<tr>
						<td>
							<input type="submit" name="submit" Value="Save" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<?php include 'inc/footer.php';?>
