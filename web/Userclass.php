<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
include_once '../admin/dbcon.php';
class user{
	public $conn;

	public function __construct()
	{
		$db = new dbcon();
		$this->conn = $db->createconn();
	}


	public function user_email_reg($email,$name,$mobile,$password,$securityQ, $securityans)
	{
		$qu="INSERT INTO `tbl_user`(`email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES ('$email','$name','$mobile','1','0','1','0',NOW(),'$password','$securityQ','$securityans')";
		$res = $this->conn->query($qu);
		if ($res) {
			echo "Data insert";
		}
		else{
			echo "Data not insert";
		}
		
	}

	public function user_mobile_reg($email,$name,$mobile,$password,$securityQ, $securityans)
	{
		$query="INSERT INTO `tbl_user`(`email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES ('$email','$name','$mobile','0','1','1','0',NOW(),'$password','$securityQ','$securityans')";
		$res = $this->conn->query($query);
		if ($res) {
			echo "Data insert";
		}
		else{
			echo "Data not insert";
		}
		
	}

	public function userLogin($emailmob, $password)
	{
		$query= "SELECT * FROM `tbl_user` WHERE email='$emailmob' or mobile='$emailmob' ";
		$res= $this->conn->query($query) or die("query not execute");
		if ($res->num_rows>0) {
			$row = $res->fetch_assoc();
			$dbpass = $row['password'];
			$is_admin = $row['is_admin'];
			$active = $row['active'];
			$pass_check = password_verify($password, $dbpass);
			if ($pass_check) {
				
				if ($is_admin == 1 && $active == 1) {
					$_SESSION['admin'] = $row['name'];
					$_SESSION['admin_id'] = $row['id'];
					return 1;
				}
				else if($is_admin == 0 && $active ==1){
					$_SESSION['username']=$row['name'];
					$_SESSION['user_id']=$row['id'];
					return 0;

				}
				
			}
			else{
				return 2;
			}
		}
		else{
			return 3;
		}
	}


	public function forgot_reset_pass($email, $password, $ques, $ans){
		$query = "SELECT * FROM `tbl_user` WHERE email= '$email'";
		$res = $this->conn->query($query);
		if ($res->num_rows>0) {
			$rows = $res->fetch_assoc();
			if ($rows['security_question'] == $ques && $rows['security_answer'] == $ans) {
				$query1= "UPDATE `tbl_user` SET  password ='$password' WHERE email='$email'";
				$res1= $this->conn->query($query1);
				if ($res1) {
					echo 3;
				}
				else{
					echo 2;
				}
			}
			else{
				echo 1;
			}
		}
		else{
			echo 0;
		}
	}

	public function addCart($id)
	{
		$query="select * from tbl_product as p join tbl_product_description as pd ON p.id= pd.prod_id where p.id=$id";
		$res= $this->conn->query($query);
		
		if ($res->num_rows>0) {
			$arrdata= array();
			while ($rows=$res->fetch_assoc()) {
				if ($rows['prod_available']=='0') {
					continue;
				} else {
					$available="available";
				}
				$prod_parent=$rows['prod_parent_id'];
				$decode_descr = json_decode($rows['description']);
				$de_webspace= $decode_descr->{'webspace'};
				$de_bandwidth= $decode_descr->{'bandwidth'};
				$de_freedomain= $decode_descr->{'freedomain'};
				$de_technology= $decode_descr->{'technology'};
				$de_mailbox= $decode_descr->{'mailbox'};
				$query="SELECT * FROM `tbl_product` WHERE id=$prod_parent";
				$ress=$this->conn->query($query);
				$row= $ress->fetch_assoc();
				// $_SESSION['cartdata'][]=[$rows['prod_id'],$row['prod_name'],$rows['prod_name'],$rows['mon_price'],$rows['sku'],'1',$rows['prod_id']];
				$arrdata['data']= array( "prod_id"=>$rows['prod_id'],
					"prod_p_name"=>$row['prod_name'],
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

	public function getState_name()
	{
		$query="select name from tbl_state order by name asc";
		$res = $this->conn->query($query);
		while ( $rows= $res->fetch_assoc()) {
			$statearr[]=$rows;
		}
		return $statearr;
	}
	public function company_info()
	{
		$query="SELECT * FROM `tbl_company_info`";
		$res = $this->conn->query($query);
		while ($rows= $res->fetch_assoc()) {
			$comp=$rows;
		}
		return $comp;
	}

	public function bill_address_order_insert($name,$houseno,$city,$state,$country,$pincode, $taxamount, $ttamount)
	{
		$user_id= $_SESSION['user_id'];
		$query="INSERT INTO `tbl_user_billing_add`(`user_id`, `billing_name`, `house_no`, `city`, `state`, `country`, `pincode`) VALUES ('$user_id','$name','$houseno','$city','$state','$country','$pincode')";
		$res = $this->conn->query($query);
		if ($res) {
			$last_id= $this->conn->insert_id;
		}

		// $select="SELECT MAX(`user_billing_id`) FROM `tbl_orders`";
		// $sel = $this->conn->query($select);
		// $row = $sel->fetch_assoc();
		// $billing = $row['MAX(`user_billing_id`)'];
		// $split= explode("-",$billing);
		// $new_num= $split[1]+1;
		// $billing_id = $split[0]."-".$new_num;

		$query1= "INSERT INTO `tbl_orders`(`user_id`, `user_billing_id`, `order_date`, `status`, `promocode_applied_id`, `discount_amt`, `total_amt_after_dis`, `tax_amt`, `final_invoice_amt`) VALUES ('$user_id','$last_id',NOW(),'0','0','0','$ttamount','$taxamount','$ttamount')";
		$exec = $this->conn->query($query1);
		if ($exec) {
			echo 1;
			unset($_SESSION['cartdata']);
		}
		else{
			echo 0;
		}
	}
}

?>