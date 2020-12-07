<?php 
include '../classes/Brand.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$cat = new Brand();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $addImage   = $cat->AddImage($_FILES); 
}
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Add New Brand</h2>
		<div class="block copyblock">
			<?php
                if(isset($addImage)){
                    echo $addImage;
                }
                ?>
			<form action="" method="post" enctype="multipart/form-data">
				<table class="form">
					<tr>
						<td>
							<label>Upload Image</label>
						</td>
						<td>
							<input type="file" name="img"/>
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
