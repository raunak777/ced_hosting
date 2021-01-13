
<?php
include_once 'Userclass.php';
extract($_POST);
$user = new user();

switch ($action) {
	case 'email_reg':
	if ($password == $cnfpassword) {
		$pass = password_hash($password, PASSWORD_BCRYPT);
		$user->user_email_reg($email,$name,$mobile,$pass,$security,$answer);
	}
	else{
		echo "Password and Confirm password not matched";
	}
	break;
	
	case 'mobile_reg':
	if ($password == $cnfpassword) {
		$pass = password_hash($password, PASSWORD_BCRYPT);
		$user->user_mobile_reg($email,$name,$mobile,$pass,$security,$answer);
	}
	else{
		echo "Password and Confirm password not matched";
	}
	break;

	case 'login':
		$data = $user->userLogin($emailmob, $password);
		print_r($data);
		break;

	default:	
	break;
}

?>