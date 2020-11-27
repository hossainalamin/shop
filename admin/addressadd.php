<?php 
include '../classes/Address.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$add = new Address();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $address  = $_POST['address'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $addAddress = $add->AddAddress($address,$email,$phone); 
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Add Address</h2>
		<div class="block copyblock">
			<?php
                if(isset($addAddress)){
                    echo $addAddress;
                }
                ?>
			<form action="" method="post">
				<table class="form">
					<tr>
						<td>
							<input type="text" name="address" class="medium" />
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="phone" class="medium" />
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="email" class="medium" />
						</td>
					</tr>
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
