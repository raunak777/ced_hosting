<?php
session_start();
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
}

?>