<?php
include_once '../admin/dbcon.php';
class product{
	public $conn;
	public function __construct()
	{
		$db = new dbcon();
		$this->conn = $db->createconn();
	}

	public function get_product()
	{
		$query="select * from tbl_product where prod_parent_id=1";
		$res= $this->conn->query($query);
		if ($res) {
			return $res;
		}
		else{
			return false;
		}
	}

	public function getMainProduct()
	{
		$query="select * from tbl_product where id=1 and prod_parent_id=0";
		$res=$this->conn->query($query);
		if($res->num_rows>0)
		{
			$arrData=array();
			while ($row= $res->fetch_assoc()) {
				$arrData = $row;
			}
			return $arrData;
		}
		else{
			return false;
		}
	}

	public function insertCategory($parentid, $catname,$link)
	{
		$query="INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES ('$parentid','$catname','$link','1',NOW())";
		$res= $this->conn->query($query);
		if ($res) {
			return true;
		}
		else{
			return false;
		}
	}

	public function insertProduct($productid,$productname,$pageurl,$monthly,$anual,$sku,$webspace,$bandwidth,$freedomain,$technology,$mailbox)
	{
		$query= "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES ('$productid','$productname','$pageurl','1',NOW())";
		if ($this->conn->query($query)) {
			$last_id= $this->conn->insert_id;
			
			$description=array(
				"webspace"=>$webspace,
				"bandwidth"=>$bandwidth,
				"freedomain"=>$freedomain,
				"technology"=>$technology,
				"mailbox"=>$mailbox
			);
			$desc= json_encode($description);
			$query= "INSERT INTO `tbl_product_description`(`prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES ('$last_id','$desc','$monthly','$anual','$sku')";
			if ($this->conn->query($query)) {
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	public function show_product_category() 
	{
		$sql="SELECT * FROM `tbl_product` WHERE `prod_parent_id`='1'";
		$row=$this->conn->query($sql);
		return $row;
	}

	

}

?>