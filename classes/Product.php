<?php
$filePath = realpath(dirname(__FILE__));
include_once ($filePath."/../lib/Database.php");
include_once ($filePath."/../helpers/Formate.php");
class Product
{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Formate();
	}
	public function AddProduct($data,$file){
		$productName = $this->fm->validation($data['productName']);
		$body        = $this->fm->validation($data['body']);
		$price       = $this->fm->validation($data['price']);
		$type        = $this->fm->validation($data['type']);
		$productName = mysqli_real_escape_string($this->db->link,$productName);
		$catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body        = mysqli_real_escape_string($this->db->link,$body);
		$price       = mysqli_real_escape_string($this->db->link,$price);
		$type        = mysqli_real_escape_string($this->db->link,$type);

		$permitted   = array('jpg','gif','png','jpeg');
		$fileName    = $file['image']['name'];
		$fileSize    = $file['image']['size'];
		$fileTemp    = $file['image']['tmp_name'];

		$div         = explode('.',$fileName);
		$fileExt     = strtolower(end($div));
		$uniqueImg   = substr(md5(time()),0,10).'.'.$fileExt;
		$uploadImg   = "uploads/".$uniqueImg;
		if($productName == "" || $body == "" || $price == "" || $type == "" || $catId == "" || $fileName ==""){
			$prodMsg  = "<span class='error'>Any of the feild should not be empty!</span>";
			return $prodMsg;
		}elseif ($fileSize>1048567) {
			$prodMsg  = "<span class='error'>File size should not be greater than 1 mb..</span>";
			return $prodMsg;
		}elseif (in_array($fileExt, $permitted) == false) {
			$prodMsg  = "<span class='error'>File size should  be of type png,jpg,gif or jpe!</span>";
			return $prodMsg;
		}

		else{
			move_uploaded_file($fileTemp, $uploadImg);
			$query = "insert into tbl_product(productName,catId,brandId,body,price,image,type)
			values('$productName', '$catId', '$brandId', '$body', '$price', '$uploadImg', '$type')";
			$prodAdd = $this->db->insert($query);
			if($prodAdd){
				$prodMsg = "<span class='success'>Product Added Successfully</span>";
				return $prodMsg;
			}else{
				$prodMsg = "<span class='error'>Product not Added</span>";
				return $prodMsg;
			}
	}
	}
	public function AddOffer($data,$file){
		$productName = $this->fm->validation($data['productName']);
		$body        = $this->fm->validation($data['body']);
		$price       = $this->fm->validation($data['price']);
		$bprice       = $this->fm->validation($data['bprice']);
		$type        = $this->fm->validation($data['type']);
		$productName = mysqli_real_escape_string($this->db->link,$productName);
		$catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body        = mysqli_real_escape_string($this->db->link,$body);
		$price       = mysqli_real_escape_string($this->db->link,$price);
		$type        = mysqli_real_escape_string($this->db->link,$type);

		$permitted   = array('jpg','gif','png','jpeg');
		$fileName    = $file['image']['name'];
		$fileSize    = $file['image']['size'];
		$fileTemp    = $file['image']['tmp_name'];

		$div         = explode('.',$fileName);
		$fileExt     = strtolower(end($div));
		$uniqueImg   = substr(md5(time()),0,10).'.'.$fileExt;
		$uploadImg   = "uploads/".$uniqueImg;
		if($productName == "" || $body == "" || $price == "" || $type == "" || $catId == "" || $fileName =="" || $bprice == ""){
			$prodMsg  = "<span class='error'>Any of the feild should not be empty!</span>";
			return $prodMsg;
		}elseif ($fileSize>1048567) {
			$prodMsg  = "<span class='error'>File size should not be greater than 1 mb..</span>";
			return $prodMsg;
		}elseif (in_array($fileExt, $permitted) == false) {
			$prodMsg  = "<span class='error'>File size should  be of type png,jpg,gif or jpe!</span>";
			return $prodMsg;
		}

		else{
			move_uploaded_file($fileTemp, $uploadImg);
			$query = "insert into tbl_offer(productName,catId,brandId,body,price,bprice,image,type)
			values('$productName', '$catId', '$brandId', '$body', '$price','$bprice', '$uploadImg', '$type')";
			$prodAdd = $this->db->insert($query);
			if($prodAdd){
				$prodMsg = "<span class='success'>Product Added Successfully</span>";
				return $prodMsg;
			}else{
				$prodMsg = "<span class='error'>Product not Added</span>";
				return $prodMsg;
			}
	}
	}
	public function GetPd(){
		$query = "select tbl_product.*, tbl_catagory.catName, tbl_brand.brandName 
		from tbl_product
		inner join tbl_catagory 
		on tbl_product.catId = tbl_catagory.catId 
		inner join tbl_brand
		on tbl_product.brandId = tbl_brand.brandId
		order by tbl_product.productId desc";
		$getPd = $this->db->select($query);
		if($getPd){
			return $getPd;
		}else{
			return false;
		}
	}
	public function GetOPd(){
		$query = "select tbl_offer.*, tbl_catagory.catName, tbl_brand.brandName 
		from tbl_offer
		inner join tbl_catagory 
		on tbl_offer.catId = tbl_catagory.catId 
		inner join tbl_brand
		on tbl_offer.brandId = tbl_brand.brandId
		order by tbl_offer.productId desc";
		$getPd = $this->db->select($query);
		if($getPd){
			return $getPd;
		}else{
			return false;
		}
	}
	public function GetAllPd($start_from,$limit){
		$query = "select tbl_product.* 
		from tbl_product
		order by tbl_product.productId desc limit $start_from,$limit";
		$getPd = $this->db->select($query);
		if($getPd){
			return $getPd;
		}else{
			return false;
		}
	}
	public function GetProById($id){
		$query    = "select tbl_product.*,tbl_brand.brandName
		from tbl_product
		inner join
		tbl_brand
		on tbl_product.brandId=tbl_brand.brandId
		where productId = '$id'";
		$getProd   = $this->db->select($query);
		return $getProd; 
	}	
	public function GetOProById($id){
		$query    = "select tbl_offer.*,tbl_brand.brandName
		from tbl_offer
		inner join
		tbl_brand
		on tbl_offer.brandId=tbl_brand.brandId
		where productId = '$id'";
		$getProd   = $this->db->select($query);
		return $getProd; ; 
	}
	public function UpProduct($data,$file,$id){
		$productName = $this->fm->validation($data['productName']);
		$body        = $this->fm->validation($data['body']);
		$price       = $this->fm->validation($data['price']);
		$type        = $this->fm->validation($data['type']);
		$productName = mysqli_real_escape_string($this->db->link,$productName);
		$catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
		$brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body        = mysqli_real_escape_string($this->db->link,$body);
		$price       = mysqli_real_escape_string($this->db->link,$price);
		$type        = mysqli_real_escape_string($this->db->link,$type);

		$permitted   = array('jpg','gif','png','jpeg');
		$fileName    = $file['image']['name'];
		$fileSize    = $file['image']['size'];
		$fileTemp    = $file['image']['tmp_name'];

		$div         = explode('.',$fileName);
		$fileExt     = strtolower(end($div));
		$uniqueImg   = substr(md5(time()),0,10).'.'.$fileExt;
		$uploadImg   = "uploads/".$uniqueImg;
		if($productName == "" || $body == "" || $price == "" || $type == "" || $catId == "" || $brandId == ""){
			$prodMsg  = "<span class='error'>Any of the feild should not be empty!</span>";
			return $prodMsg;
		}else{
			if(!empty($fileName)){
				if ($fileSize>1048567){
					$prodMsg  = "<span class='error'>File size should not be greater than 1 mb..</span>";
					return $prodMsg;
				}elseif (in_array($fileExt, $permitted) == false) {
					$prodMsg  = "<span class='error'>File size should  be of type png,jpg,gif or jpe!</span>";
					return $prodMsg;
				}
				else{
				move_uploaded_file($fileTemp, $uploadImg);
				$query = "update tbl_product
				set 
				productName = '$productName',
				catId       = '$catId',
				brandId     = '$brandId',
				body        = '$body',
				price       = '$price',
				image       = '$uploadImg',
				type        = '$type'
				where productId = '$id'";
				
				$prodUp = $this->db->update($query);
				if($prodUp){
					$prodMsg = "<span class='success'>Product updated Successfully</span>";
					return $prodMsg;
				}else{
					$prodMsg = "<span class='error'>Product not updated!</span>";
					return $prodMsg;
				}	
				}
			}else{
				$query = "update tbl_product
				set 
				productName = '$productName',
				catId       = '$catId',
				brandId     = '$brandId',
				body        = '$body',
				price       = '$price',
				type        = '$type'
				where productId = '$id'";
				$prodUp = $this->db->update($query);
				if($prodUp){
					$prodMsg = "<span class='success'>Product updated Successfully</span>";
					return $prodMsg;
				}else{
					$prodMsg = "<span class='error'>Product not updated!</span>";
					return $prodMsg;
				}	
				
			}
		}
	}
	public function DelProById($id){
		$query  = "select * from tbl_product where productId = '$id'";
		$getPro = $this->db->select($query);
		if($getPro){
			while($delImg = $getPro->fetch_assoc()){
				$imgLink = $delImg['image'];
				unlink($imgLink);
			}
		}
		$delQuery = "delete from tbl_product where productId = $id";
		$delPro = $this->db->delete($delQuery);
		if($delPro){
			$delMsg = "<span class='success'>Product deleted Successfully</span>";
			return $delMsg;
		}
		else{
			$delMsg = "<span class='error'>Product not deleted</span>";
				return $delMsg;
		}
	}
	public function GetFpd(){
		$query    = "select * from tbl_product where type = '0' order by productId desc limit 8";
		$getFpd   = $this->db->select($query);
		return $getFpd; 
	}
	public function GetSpd($id){
		$query    = "select * from tbl_product where catId = '$id' order by productId desc";
		$getSpd   = $this->db->select($query);
		return $getSpd; 
	}
	public function GetSearchpd($name,$start_from,$per_page){
		if(empty($name)){
			echo "<script>alert('Seach item should not be empty');</script>";
			return;
		}
		$query    = "select * from tbl_product where productName like '%$name%' order by productId desc limit $start_from,$per_page";
		$getFpd   = $this->db->select($query);
		return $getFpd; 
	}
	public function GetLpd(){
		$query    = "select * from tbl_product  order by productId desc limit 8";
		$getFpd   = $this->db->select($query);
		return $getFpd; 
	}
	public function GetNpd(){
		$query    = "select * from tbl_product  order by productId desc limit 4";
		$getFpd   = $this->db->select($query);
		return $getFpd; 
	}
	public function GetSinglePd($id){
		$query = "select a.*, c.catName, b.brandName 
		from tbl_product as a,tbl_catagory as c,tbl_brand as b
		where a.catId = c.catId and a.brandId = b.brandId and a.productId = '$id'
		order by a.productId desc";
		$getPd = $this->db->select($query);
		if($getPd){
			return $getPd;
		}else{
			return false;
		}
	}
	public function GetProdByCat($id){
		$query = "select * from tbl_product where catId = '$id'";
		$result = $this->db->select($query);
		if($result){
			return $result;
		}
		else{
			return false;
		}
			
	}
    function pagination($name){
        $sql = "select * from tbl_product where productName like '%$name%'";
		$per_page = 6;
        $pagination = $this->db->select($sql);
        if($pagination)
        {
            $total_row = mysqli_num_rows($pagination);
            $total_pages = ceil($total_row/$per_page);
			return $total_pages;
		}
	}
	function paginationShop(){
        $sql = "select * from tbl_product";
		$per_page = 4;
        $pagination = $this->db->select($sql);
        if($pagination)
        {
            $total_row = mysqli_num_rows($pagination);
            $total_pages = ceil($total_row/$per_page);
			return $total_pages;
		}
	}
}
?>
