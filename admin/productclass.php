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

	public function edit_product_category($id){
		$query="SELECT * FROM `tbl_product` WHERE `id`=$id and prod_parent_id=1";
		$res=$this->conn->query($query);
		if($res->num_rows>0)
		{
			$arrdata=array();
			while ($row= $res->fetch_assoc()) {
				$arrdata = $row;
			}
			return $arrdata;
		}
		else{
			return false;
		}
	}

	public function update_product_category($prodname, $link, $availibility, $id){
		$query="UPDATE `tbl_product` SET `prod_name`='$prodname',`link`='$link',`prod_available`='$availibility' WHERE id='$id'";
		$res= $this->conn->query($query);
		if ($res) {
			return true;
		}
		else{
			return false;
		}
	}

	public function delete_product_category($id)
	{
		$query ="DELETE FROM `tbl_product` WHERE id='$id'";
		$res= $this->conn->query($query);
		$query="SELECT * FROM `tbl_product` WHERE `prod_parent_id`='$id'";
		$res=$this->conn->query($query);
		if ($res->num_rows>0) {
			while ($row=$res->fetch_assoc()) {
				$id=$row['id'];
				$query="DELETE FROM `tbl_product_description` WHERE `prod_id`='$id'";
				$this->conn->query($query);
				$query="DELETE FROM `tbl_product` WHERE `id`='$id'";
				$this->conn->query($query);
			}
		}
		return true;
	}

	public function show_product_subproduct()
	{
		$query="SELECT * from tbl_product as p join tbl_product_description as pd ON p.id=pd.prod_id";
		$res = $this->conn->query($query);
		while ($rows= $res->fetch_assoc()) {
			if ($rows['prod_available']=='1') {
				$available="available";
			}
			else{
				$available="Unavailable";
			}
			$decode_descr= json_decode($rows['description']);
			$de_webspace= $decode_descr->{'webspace'};
			$de_bandwidth= $decode_descr->{'bandwidth'};
			$de_freedomain= $decode_descr->{'freedomain'};
			$de_technology= $decode_descr->{'technology'};
			$de_mailbox= $decode_descr->{'mailbox'};
			$prod_parent_id=$rows['prod_parent_id'];
			$sql="SELECT * FROM `tbl_product` WHERE `id`='$prod_parent_id'";
			$res1=$this->conn->query($sql);
			$row=$res1->fetch_assoc();
			$arrdata[]=array($row['prod_name'],$rows['prod_name'],$rows['link'],$available,$rows['prod_launch_date'],$rows['mon_price'], $rows['annual_price'],$rows['sku'],$de_webspace,$de_bandwidth,$de_freedomain,$de_technology,$de_mailbox,$rows['prod_id']);
		}
		return $arrdata;

	}
	public function delete_product_of_category($id)
	{
		$query="DELETE FROM `tbl_product_description` WHERE prod_id=$id";
		$res= $this->conn->query($query);
		if ($res) {
			return true;
		}
		else{
			return false;
		}
	}
//edit product in viewproduct page
	public function edit_product_subproduct($id)
	{
		$query="SELECT * FROM `tbl_product` as p JOIN tbl_product_description as pd on p.id=pd.prod_id where pd.prod_id=$id";
		$res = $this->conn->query($query);
		while ($rows= $res->fetch_assoc()) {
			if ($rows['prod_available']=='1') {
				$available="available";
			}
			else{
				$available="Unavailable";
			}
			$decode_descr= json_decode($rows['description']);
			$de_webspace= $decode_descr->{'webspace'};
			$de_bandwidth= $decode_descr->{'bandwidth'};
			$de_freedomain= $decode_descr->{'freedomain'};
			$de_technology= $decode_descr->{'technology'};
			$de_mailbox= $decode_descr->{'mailbox'};
			$prod_parent_id=$rows['prod_parent_id'];
			$sql="SELECT * FROM `tbl_product` WHERE `id`='$prod_parent_id'";
			$res1=$this->conn->query($sql);
			$row=$res1->fetch_assoc();
			$arrdata['data'][]=array($row['prod_name'],$rows['prod_name'],$rows['link'],$available,$rows['prod_launch_date'],$rows['mon_price'], $rows['annual_price'],$rows['sku'],$de_webspace,$de_bandwidth,$de_freedomain,$de_technology,$de_mailbox,$rows['prod_id']);
		}
		return $arrdata;

	}
	public function showHeading($id){
		$query="SELECT * FROM `tbl_product` WHERE `id`=$id";
		$res= $this->conn->query($query);
		if ($res->num_rows>0) {
			$row= $res->fetch_assoc();
			return $row;
		}
		else{
			return false;
		}
	}

	public function getcatPageDetail($id)
	{
		$query="select * from tbl_product as p join tbl_product_description as pd ON p.id= pd.prod_id where p.prod_parent_id=$id";
		$res= $this->conn->query($query);
		
		if ($res->num_rows>0) {
			while ($rows=$res->fetch_assoc()) {
				if ($rows['prod_available']=='0') {
					continue;
				} else {
					$available="available";
				}
				$decode_descr= json_decode($rows['description']);
				$de_webspace= $decode_descr->{'webspace'};
				$de_bandwidth= $decode_descr->{'bandwidth'};
				$de_freedomain= $decode_descr->{'freedomain'};
				$de_technology= $decode_descr->{'technology'};
				$de_mailbox= $decode_descr->{'mailbox'};
				$arrdata[]= array( "prod_id"=>$rows['prod_id'],
                    "sku"=>$rows['sku'],
                    "mon_price"=>$rows['mon_price'],
                    "annual_price"=>$rows['annual_price'],
                    "prod_parent_id"=>$rows['prod_parent_id'],
                    "prod_name"=>$rows['prod_name'],
                    "link"=>$rows['link'],
                    "available"=>$available,
                    "prod_launch_date"=>$rows['prod_launch_date'],
                    "webspace"=>$de_webspace,
                    "bandwidth"=>$de_bandwidth,
                    "freedomain"=>$de_freedomain,
                    "technology"=>$de_technology,
                    "mailbox"=>$de_mailbox);
			}
			return $arrdata;
		}
		else{
			return false;
		}
	}

}

?>