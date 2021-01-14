<?php
include 'productclass.php';
$prod= new product();
extract($_POST);

$action =$_GET['action'];


switch ($action) {
	case 'ins_cat':
		$data= $prod->insertCategory($mainprodid, $newprod, $link);
		print_r($data);
		break;
	case 'prod_insert':
		$data= $prod->insertProduct($productid,$productname,$pageurl,$monthly,$anual,$sku,$webspace,$bandwidth,$freedomain,$technology,$mailbox);
		print_r($data);
		break;

	case 'get':
	$data = $prod->show_product_category();
	while ($row=$data->fetch_assoc()) {
			if ($row['prod_available']=='1') {
				$available="available";
			} else {
				$available="unavailable";
			}
			$arr['data'][]=array($row['prod_name'],$row['link'],$available,$row['prod_launch_date'],"<a href='javascript:void(0)' class='btn btn-info' data-eid='".$row['id']."' id='editproduct' data-toggle='modal' data-target='#exampleModalSignUp'>Edit</a> <a href='javascript:void(0)' class='btn btn-danger' data-did='".$row['id']."' id='deleteproduct'>Delete</a>");
		}
	print_r(json_encode($arr));
	break;

	default:
		break;
}
?>

