<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath."/../lib/Database.php");
include_once ($filePath."/../helpers/Formate.php");
class Customer{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Formate();
	}
	public function AddCustomer($data){
		$sId = session_id();
		$name     = mysqli_real_escape_string($this->db->link,$data['name']);
		$address  = mysqli_real_escape_string($this->db->link,$data['address']);
		$city     = mysqli_real_escape_string($this->db->link,$data['city']);
		$phone    = mysqli_real_escape_string($this->db->link,$data['phone']);
		$email    = mysqli_real_escape_string($this->db->link,$data['email']);
		if($name == "" || $address == "" || $city == ""  || $phone == ""){
				$Msg  = "<span class='error'>Feild should not be empty!</span>";
				return $Msg;
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$Msg  = "<span class='error'>Invalid Email!</span>";
			return $Msg;
		}
		else{
			$query = "insert into tbl_customer(name,address,city,session,phone,email)
			values('$name', '$address', '$city', '$sId','$phone', '$email')";
			$cusAdd = $this->db->insert($query);
			if($cusAdd){
				echo "<script>window.location='confirm.php'</script>";
			}else{
				$Msg = "<span class='error'>Sorry Something went wrong!</span>";
				return $Msg;
			}
		}
	}
	public function DelLastCustomer(){
		$query  = "delete from tbl_customer order by id desc limit 1";
		$result = $this->db->delete($query);
		if($result){
			echo"<script>window.location = 'index.php'</script>"; 
		}
		else{
			return false;
		}
	}
	public function DelCustomerCart(){
		$sId = session_id();
		$query  = "delete from tbl_cart where sId = '$sId'";
		$result = $this->db->delete($query);
		if($result){
			$Msg = "<span class='success'>Order confirm.Thank you for being with us.</span>";
			return $Msg;
		}
		else{
			$Msg = "<span class='error'>Sorry Something went wrong!</span>";
			return $Msg;
		}
	}
	public function OrderProduct(){
		$sId = session_id();
		$sql = "SELECT * from tbl_customer where session = '$sId'";
		$result = $this->db->select($sql);
		if($result){
			foreach($result as $data)
			{
				$id = $data['id'];
			}
		}
		$query = "SELECT * from tbl_cart where sId = '$sId'";
		$result1 = $this->db->select($query);
		if($result1){
			foreach($result1 as $data){
				$productId = $data['productId'];
				$name = $data['productName'];
				$quantity = $data['quantity'];
				$price = $data['price']* $quantity;
				$image = $data['image'];
				$query = "insert into tbl_order(cmrId,productId,productName,quantity,price,image)
				values('$id', '$productId', '$name', '$quantity', '$price', '$image')";
				$orderAdd = $this->db->insert($query);
			}
		}
	}
	public function GetCustomerInfo($id){
		$query  = "select * from tbl_customer where id='$id'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}
		else{
			return false;
		}
	}
	function Contact($data){
	$fname   = $this->fm->validation($data['fname']);
    $lname   = $this->fm->validation($data['lname']);
    $email   = $this->fm->validation($data['email']);
    $phone   = $this->fm->validation($data['phone']);
    $text    = $this->fm->validation($data['text']);
        
    $fname   = mysqli_real_escape_string($this->db->link,$fname);
    $lname   = mysqli_real_escape_string($this->db->link,$lname);
    $email   = mysqli_real_escape_string($this->db->link,$email);
    $phone   = mysqli_real_escape_string($this->db->link,$phone);
    $text   = mysqli_real_escape_string($this->db->link,$text);
    
    if($fname == ""|| $lname == ""|| $email == ""|| $phone == ""|| $text == "")
    {
        $error = "<span class='error'>Any of the field should not be empty.</span>";
		return $error;
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error = "<span class='error'>Invalid email..</span>";
		return $error;
    }
    else
    {
        $sql = "insert into tbl_contact(fname,lname,email,phone,message) values('$fname','$lname','$email','$phone','$text')";
        $contact = $this->db->insert($sql);
        if($contact)
        {
            $msg = "<span class='success'>Message sent successfully.Thank you</span>";
			return $msg;
        }
        else
        {
            $error = "<span class='error'>Something wrong.Message not sent.</span>"; 
			return $error;
        }
    }
    }
	function inbox(){
		$sql     = "select * from tbl_contact";
        $result  = $this->db->select($sql);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	function view($msgId){
		$sql     = "select * from tbl_contact where id ='$msgId'";
        $result  = $this->db->select($sql);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	function delete($id){
		$sql     = "delete from tbl_contact where id ='$id'";
        $result  = $this->db->delete($sql);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
}
?>
