
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
}

?>