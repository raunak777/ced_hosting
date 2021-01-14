<?php

include 'productclass.php';
$prod= new product();
extract($_POST);
$action =$_GET['action'];

switch ($action) {
	case 'get':
		$data = $prod->show_product_category();
	while ($row=$data->fetch_assoc()) {
			if ($row['prod_available']=='1') {
				$available="available";
			} else {
				$available="unavailable";
			}
			$arr['data'][]=array($row['prod_name'],$row['link'],$available,$row['prod_launch_date'],"<a href='javascript:void(0)' class='btn btn-info' data-eid='".$row['id']."' id='editproduct'>Edit</a> <a href='javascript:void(0)' class='btn btn-danger' data-did='".$row['id']."' id='deleteproduct'>Delete</a>");
		}
	print_r(json_encode($arr));
		break;
	
	default:
		break;
}
?>