
<?php
session_start();
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
						if (count($_SESSION['cartdata'])>0) {
							return 4;
						}
						else{
						return 0;
					}
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
}

?>