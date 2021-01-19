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

	case 'cart':
	$price='';
	$data = $user->addCart($cartId);
	if ($month_annual == $data['data']['mon_price']) {
		$price= $month_annual. " Monthly Plan";
	}
	else if ($month_annual== $data['data']['annual_price']) {
		$price= $month_annual." Annual Plan";
	}
	$_SESSION['cartdata'][]=[$data['data']['prod_id'],$data['data']['prod_p_name'],$data['data']['prod_name'],$price,$data['data']['sku'],'1',$data['data']['prod_id']];
	print_r($_SESSION);
	break;
	case 'cartdata':
	if (isset($_SESSION['cartdata'])) { 
		$cartdata=$_SESSION['cartdata'];
		for ($i=0;$i<count($cartdata);$i++) {
			$arr['data'][]=$cartdata[$i];
		}
	}
	echo json_encode($arr);
	break;

	case 'delcart':
	if (isset($_SESSION['cartdata'])) {
		$cartdata=$_SESSION['cartdata'];
		for ($i=0;$i<count($cartdata);$i++) {
			if ($cartdata[$i][0]==$delid) {
				unset($_SESSION['cartdata'][$i]);
				$_SESSION['cartdata']=array_values($_SESSION['cartdata']);
				break;
			}
			return true;
		}
	}
	break;

	case 'checkout':
	if (isset($_SESSION['username'])) {
		if (count($_SESSION['cartdata'])==0) {
			print_r(1);
		}
		else{
			print_r(2);
		}
	}
	else{
		print_r(0);
	}
	break;

	case 'changeselect':
	$data = $user->company_info();
	$compst = (string)strtolower($data['comp_state']);
	$userst = (string)strtolower($valueSelected);
	$isequal = strcasecmp($compst,$userst);
	if ($isequal==0) {
		echo 0;
	}
	else{
		echo 1;
	}
	break;
	default:	
	break;
}

?>