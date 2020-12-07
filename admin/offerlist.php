<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/Product.php';
$prod = new product();
$fm   = new Formate();
if(isset($_GET['delid'])){
    $productId  = $_GET['delid'];
	$delPro = $prod->DelProById($productId);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <?php
        if(isset($delPro)){
			echo $delPro;
        }
		?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Catagory</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Before Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$getPd = $prod->GetOPd();
				if($getPd){
					$i=0;
					while($result = $getPd->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i++;?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $result['catName'];?></td>
					<td><?php echo $result['brandName'];?></td>
					<td><?php echo $fm->textShorten($result['body'],50);?></td>
					<td><?php echo $result['price'];?></td>
					<td><?php echo $result['bprice'];?></td>
					<td><img src="<?php echo $result['image'];?>" height='50px' width='60px'></td>
					<td>
						<?php
						if($result['type'] == 0)
							echo "Featured";
						else
							echo "General";
						?>
					</td>
					<td><a onclick="return confirm('Are You sure to delete?')"href="?delid=<?php echo $result['productId'];?>">Delete</a></td>
				</tr>
			<?php  } }?>
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
