<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath."/../lib/Database.php");
include_once ($filePath."/../helpers/Formate.php");
class Brand 
{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Formate();
	}
	public function AddImgae($file){
		$permitted   = array('jpg','gif','png','jpeg');
		$fileName    = $file['img']['name'];
		$fileSize    = $file['img']['size'];
		$fileTemp    = $file['img']['tmp_name'];
		$div         = explode('.',$fileName);
		$fileExt     = strtolower(end($div));
		$uniqueImg   = substr(md5(time()),0,10).'.'.$fileExt;
		$uploadImg   = "uploads/".$uniqueImg;
		$fileName = mysqli_real_escape_string($this->db->link,$fileName);
		if(empty($fileName)){
			$brandMsg = "<span class='error'>Image Should not be empty</span>";
			return $brandMsg;
		}elseif ($fileSize>1048567) {
			$prodMsg  = "<span class='error'>File size should not be greater than 1 mb..</span>";
			return $prodMsg;
		}elseif (in_array($fileExt, $permitted) == false) {
			$prodMsg  = "<span class='error'>File size should  be of type png,jpg,gif or jpe!</span>";
			return $prodMsg;
		}
		else{
			move_uploaded_file($fileTemp, $uploadImg);
			$query  = "insert into tbl_brand(brandName) values('$uploadImg')";
			$brandAdd = $this->db->insert($query);
			if($brandAdd){
				$brandMsg = "<span class='success'>Imgage Added Successfully</span>";
				return $brandMsg;
			}else{
				$brandMsg = "<span class='error'>Image not Added</span>";
				return $brandMsg;
			}
		}
	}
	public function BrandList(){
		$query    = "select * from tbl_brand order by brandId desc";
		$brandList  = $this->db->select($query);
		return $brandList; 
	}
	public function GetImageById($brandId){
		$query    = "select * from tbl_brand where brandId = '$brandId'";
		$getBrand   = $this->db->select($query);
		return $getBrand; 
	}
	public function DelBrandById($brandId){
		$query  = "select * from tbl_brand where brandId = '$brandId'";
		$getPro = $this->db->select($query);
		if($getPro){
			while($delImg = $getPro->fetch_assoc()){
				$imgLink = $delImg['brandName'];
				unlink($imgLink);
			}
		}
		$query = "delete from tbl_brand where brandId = '$brandId'";
		$del   = $this->db->delete($query);
		if($del){
			$delMsg = "<span class='success'>Brand deleted Successfully</span>";
			return $delMsg;
		}
		else{
			$delMsg = "<span class='error'>Brand not deleted</span>";
				return $delMsg;
	}
    }
}
?>