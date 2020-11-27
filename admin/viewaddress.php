<?php 
include '../classes/Address.php';
include 'inc/header.php';
include 'inc/sidebar.php';
$add = new Address();
$addList = $add->addressList();
if(isset($_GET['catId'])){
    $addId  = $_GET['catId'];
    $deladd = $add->DelAddById($addId);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Address List</h2>
                 <?php
                if(isset($deladd)){
                    echo $deladd;
                }
                ?>
                <div class="block">   
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Address</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if($addList){
							$count = 0;
							if($addList){
								foreach ($addList as $result) {
								$count++;			
						?>
						<tr class="odd gradeX">
							<td><?php echo $count;?></td>
							<td><?php echo $result['address'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $result['phone'];?></td>
							<td><a href="editadd.php?catId=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are You sure to delete?')" href="?catId=<?php echo $result['id'];?>">Delete</a></td>
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

