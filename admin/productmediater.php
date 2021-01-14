<?php
include 'productclass.php';
$prod= new product();
extract($_POST);

switch ($action) {
	case 'ins_cat':
		$data= $prod->insertCategory($mainprodid, $newprod, $link);
		print_r($data);
		break;
	case 'prod_insert':
		$data= $prod->insertProduct($productid,$productname,$pageurl,$monthly,$anual,$sku,$webspace,$bandwidth,$freedomain,$technology,$mailbox);
		print_r($data);
		break;
	case 'update':
	$data=$prod->update_product_category($cat, $link, $avail, $id);
	print_r($data);
	break;

	case 'delete':
		$data = $prod->delete_product_category($currentId);
		print_r($data);
		break;
	case 'show':
			$data = $prod->show_product_subproduct();
			print_r(json_encode($data));
			break;
	case 'productdel':
			$data = $prod->delete_product_of_category($id);
			print_r($data);
			break;	

	default:
		break;
}
?>

