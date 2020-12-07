<?php
include '../classes/Customer.php';
include "inc/header.php";
include "inc/sidebar.php";
$cmr = new Customer();
$fm = new Formate();
?>
<?php
    if(isset($_GET['delid']))
    {
        $id = $_GET['delid'];
        $result = $cmr->delete($id);
        if($result)
        {
            echo "<span class='success'>Text deleted succesfully..</span>";
        }
    }                
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

            <?php
			$inbox = $cmr->inbox();
            $i = 0;
			if($inbox){
            foreach($inbox as $data)
            {
                $i++;
        ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $data['fname']." ".$data['lname'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $fm->textShorten($data['message'],30);?></td>
                        <td><?php echo $fm->formatDate($data['date']);?></td>
                        <td><a href="viewmsg.php?msgid=<?php echo $data['id'];?>">View</a> ||
                            <a href="replymsg.php?replayid=<?php echo $data['id'];?>">Reply</a> ||
                            <a href="?delid=<?php echo $data['id'];?>" onclick="return confirm('Are you sure to delete');">Delete</a>
                        </td>
                    </tr>
                    <?php } }?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="box round first grid">
        <h2>Seen Message</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

            <?php
			$inbox = $cmr->inbox();
            $i = 0;
            if($inbox)
            {
                foreach($inbox as $data)
                {
                    $i++;
        ?>
                    <tr class="odd gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $data['fname']." ".$data['lname'];?></td>
                        <td><?php echo $data['email'];?></td>
                        <td><?php echo $fm->textSorten($data['body'],30);?></td>
                        <td><?php echo $fm->dateFormate($data['date']);?></td>
                        <td> <a href="viewmsg.php?msgid=<?php echo $data['id'];?>">View</a> ||

                            <a onclick="return confirm('Are you sure to delete');" href="?delid=<?php echo $data['id'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php } }?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="clear">
</div>
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();


    });

</script>
<?php include "inc/footer.php";?>
