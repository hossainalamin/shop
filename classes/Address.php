<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath."/../lib/Database.php");
include_once ($filePath."/../helpers/Formate.php");
class Address{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Formate();
	}
	public function AddAddress($address,$email,$phone)
	{
		if(empty($address) or empty($email) or empty($phone)){
			$catMsg = "<span class='error'>Address Should not be empty</span>";
			return $catMsg;
		}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$catMsg = "<span class='error'>Error email type..</span>";
			return $catMsg;
		}
		else{
			$query  = "insert into tbl_address(address,email,phone) values('$address','$email','$phone')";
			$addressAdd = $this->db->insert($query);
			if($addressAdd){
				$catMsg = "<span class='success'>Address Added Successfully</span>";
				return $catMsg;
			}else{
				$catMsg = "<span class='error'>Address not Added</span>";
				return $catMsg;
			}
		}
	}
	public function addressList(){
		$query    = "select * from tbl_address order by id desc";
		$addList  = $this->db->select($query);
		return $addList; 
	}
	public function getAddById($id){
		$query    = "select * from tbl_address where id = '$id'";
		$getCat   = $this->db->select($query);
		return $getCat; 
	}
	public function UpAdd($address,$email,$phone,$id)
	{
		if(empty($address) or empty($email) or empty($phone)){
			$catMsg = "<span class='error'>Any filed Should not be empty</span>";
			return $catMsg;
		}
		else{
			$query  = "update tbl_address
			set 
			address = '$address',
			email = '$email',
			phone  = '$phone'
			where id = '$id'";
			$UpCat = $this->db->update($query);
			if($UpCat){
				$catMsg = "<span class='success'>Catagory Updated Successfully</span>";
				return $catMsg;
			}else{
				$catMsg = "<span class='error'>Catagory not Update</span>";
				return $catMsg;
			}
		}
	}
	public function DelAddById($id){
		$query = "delete from tbl_address where id = '$id'";
		$del   = $this->db->delete($query);
		if($del){
			$catMsg = "<span class='success'>Address Deleted Successfully</span>";
			return $catMsg;
		}
		else{
			$catMsg = "<span class='error'>Address not Deleted</span>";
				return $catMsg;
		}
    }
	}
?>