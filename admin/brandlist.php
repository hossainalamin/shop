<?php 
include '../classes/Brand.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$brand = new Brand();
$brandList = $brand->BrandList();
if(isset($_GET['brandId'])){
    $brandId  = $_GET['brandId'];
    $delBrand = $brand->delBrandById($brandId);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                 <?php
                if(isset($delBrand)){
                    echo $delBrand;
                }
                ?>
                <div class="block">   
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if($brandList){
							$count = 0;
							if($brandList){
								foreach ($brandList as $brandName) {
								$count++;			
						?>
						<tr class="odd gradeX">
							<td><?php echo $count;?></td>
							<td><?php echo $brandName['brandName'];?></td>
							<td><a onclick="return confirm('Are You sure to delete?')" href="?brandId=<?php echo $brandName['brandId'];?>">Delete</a></td>
						</tr>
					<?php } } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

