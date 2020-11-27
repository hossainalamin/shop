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
		//$country  = mysqli_real_escape_string($this->db->link,$data['country']);
		//$zip      = mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone    = mysqli_real_escape_string($this->db->link,$data['phone']);
		$email    = mysqli_real_escape_string($this->db->link,$data['email']);
		//$password = mysqli_real_escape_string($this->db->link,md5($data['password']));
		
		if($name == "" || $address == "" || $city == ""  || $phone == "" || $email == ""){
				$Msg  = "<span class='error'>Any of the feild should not be empty!</span>";
				return $Msg;
		}
//		$mailchk = "select email from tbl_customer where email = '$email' limit 1";
//		$result  = $this->db->select($mailchk);
//		if($result){
//			$Msg  = "<span class='error'>Email already Exists!</span>";
//			return $Msg;
//		}
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
	public function UserLogin($data){
		$email    = mysqli_real_escape_string($this->db->link,$data['email']);
		$password = mysqli_real_escape_string($this->db->link,md5($data['password']));
		if($email == "" || $password == ""){
			$Msg = "<span class='error'>Any of the feild should not be empty</span>";
			return $Msg;
		}else{
			$query    = "select * from tbl_customer where email ='$email' and password = '$password'";
			$result   = $this->db->select($query);
			if($result){
				foreach($result as $value){
					$email    = $value['email'];
					$password = $value['password'];
					Session::set('login',true);
					Session::set('id',$value['id']);
					Session::set('name',$value['name']);
					echo "<script>window.location = 'cart.php'</script>";
				} 
			}else{
				$Msg = "<span class='error'>Login Unsuccessfully!Email or password do not match!</span>";
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
	
	public function UserProfileEdit($data,$id){
		$name     = mysqli_real_escape_string($this->db->link,$_POST['name']);
		$address  = mysqli_real_escape_string($this->db->link,$data['address']);
		$city     = mysqli_real_escape_string($this->db->link,$data['city']);
		$country  = mysqli_real_escape_string($this->db->link,$data['country']);
		$zip      = mysqli_real_escape_string($this->db->link,$data['zip']);
		$phone    = mysqli_real_escape_string($this->db->link,$data['phone']);
		$email    = mysqli_real_escape_string($this->db->link,$data['email']);
		
		if($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == ""){
				$Msg  = "<span class='error'>Any of the feild should not be empty!</span>";
				return $Msg;
		}
		else{
			$query = "UPDATE tbl_customer
			set
			name    = '$name',
			address = '$address', 
			city    = '$city',
			country = '$country',
			zip     = '$zip', 
			phone   ='$phone',
			email   ='$email'
			where id = '$id' ";
			$cusAdd = $this->db->update($query);
			if($cusAdd){
				$Msg = "<span class='success'>User profile update Successfully</span>";
					return $Msg;
			}else{
				$Msg = "<span class='error'>Sorry Something went wrong!</span>";
				return $Msg;
			}
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
	
	public function PayableAmount($id){
			$query    = "select * from tbl_order where cmrId ='$id' and date = now()";
			$result   = $this->db->select($query);
			if($result){
				return $result; 
			}else{
				return false;
			}
	}
	
}
?>
