<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
	<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<!---fonts-->
	<link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!---fonts-->
	<!--script-->
	<link rel="stylesheet" href="css/swipebox.css">
	<script src="js/jquery.swipebox.min.js"></script> 
	<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
	</script>
	<!--script-->
</head>
<body>
	<!---header--->
	<?php 
	include_once 'header.php';
	if (isset($_GET['id'])) {
		$pageid= $_GET['id'];
		$ulheading = $prod->showHeading($pageid);
		$heading = $ulheading['prod_name'];
		$uldata = $ulheading['link'];
		$catdata= $prod->getcatPageDetail($pageid);
		if ($ulheading==false || $catdata== false) {
			header("Location : index.php");
		}
	}
	else{
		header("Location : index.php");
	}

	?>
	<!---singleblog--->
	<div class="content">
		<div class="linux-section">
			<div class="container">
				<div class="linux-grids">
					<div class="col-md-8 linux-grid">
						<h2><?php echo $heading; ?></h2>
						<ul>
							<?php echo $uldata ?>	
						</ul>
						<a href="#">view plans</a>
					</div>
					<div class="col-md-4 linux-grid1">
						<?php
						$pattern=array("/window/i", "/word/i", "/cms/i", "/linux/i", "/mac/i");
						$temp=true;
						foreach ($pattern as $val) {
							if (preg_match($val, $ulheading['prod_name'])) {
								$temp=false;
								$str=str_replace("/", "", $val);
								$strfinal=rtrim($str, "i");
								echo '<img src="images/'.$strfinal.'.png" class="img-responsive" alt=""/>';
								break;
							}
						}
						if ($temp==true) {
							echo '<img src="images/linux.png" class="img-responsive" alt=""/>';
						}
						?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="tab-prices">
			<div class="container">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="linux-prices" id="linuxprice">
								<?php
								$htmldata='';
								for ($i=0; $i<count($catdata) ; $i++) {

									$htmldata.='<div class="col-md-3 linux-price">
									<div class="linux-top">
									<h4>'. $catdata[$i]["prod_name"] .'</h4>
									</div>
									<div class="linux-bottom">
									<h5>₹'. $catdata[$i]["mon_price"] .' <span class="month">per month</span></h5>
									<h5>₹'. $catdata[$i]["annual_price"] .' <span class="month">per year</span></h5>
									<h6>'. $catdata[$i]["freedomain"] . ' Domain</h6>
									<ul>
									<li><strong>'. $catdata[$i]["webspace"] .'GB</strong> WebSpace</li>
									<li><strong>'. $catdata[$i]["bandwidth"] .'GB</strong> BandWidth</li>
									<li><strong> '. $catdata[$i]["mailbox"] .'</strong> Mail Box</li>
									<li><strong>'. $catdata[$i]["technology"] .'</strong> Technology/ Language</li>
									<li><strong>High Performance</strong>  Servers</li>
									<li><strong>location</strong> : <img src="images/india.png"></li>
									</ul>
									</div>
									<a href="#" data-toggle="modal" data-target="#exampleModal'.$catdata[$i]["prod_id"].'">Add Cart</a>
									</div>  
									<div class="modal fade" id="exampleModal'.$catdata[$i]["prod_id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>
									<div class="modal-body">
									<div class="form-group">
									<select class="form-control" id="planselect'.$catdata[$i]["prod_id"].'">
									<option value="">Select Plan</option>
									<option value="'.$catdata[$i]['mon_price'].'">Monthly Plan</option>
									<option value="'.$catdata[$i]['annual_price'].'">Annual Plan</option>
									</select>
									</div>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" data-addid='. $catdata[$i]["prod_id"] .' id="addcart"  class="btn btn-primary">Add Cart</button>
									</div>
									</div>
									</div>
									</div>   
									';
								}
								print_r($htmldata);
								?>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->


<!-- clients -->
<div class="clients">
	<div class="container">
		<h3>Some of our satisfied clients include...</h3>
		<ul>
			<li><a href="#"><img src="images/c1.png" title="disney" /></a></li>
			<li><a href="#"><img src="images/c2.png" title="apple" /></a></li>
			<li><a href="#"><img src="images/c3.png" title="microsoft" /></a></li>
			<li><a href="#"><img src="images/c4.png" title="timewarener" /></a></li>
			<li><a href="#"><img src="images/c5.png" title="disney" /></a></li>
			<li><a href="#"><img src="images/c6.png" title="sony" /></a></li>
		</ul>
	</div>
</div>
<!-- clients -->
<div class="whatdo">
	<div class="container">
		<h3>Linux Features</h3>
		<div class="what-grids">
			<div class="col-md-4 what-grid">
				<div class="what-left">
					<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 what-grid">
				<div class="what-left">
					<i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 what-grid">
				<div class="what-left">
					<i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="what-grids">
			<div class="col-md-4 what-grid">
				<div class="what-left">
					<i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 what-grid">
				<div class="what-left">
					<i class="glyphicon glyphicon-move" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 what-grid">
				<div class="what-left">
					<i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
				</div>
				<div class="what-right">
					<h4>Expert Web Design</h4>
					<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
</div>
<!---footer--->
<?php include 'footer.php'; ?>
<!---footer--->

<script type="text/javascript">
	$(function(){

		$("#linuxprice").on("click","#addcart",function(){
			var cartId= $(this).data('addid');
			var month_annual = $("#planselect"+cartId+ " option:selected").val();
			alert(month_annual); 
			if (month_annual =='') {
				alert("Please select plan");
			}
			else {
			$.ajax({
				type: "POST",
				url: "usermediator.php",
				data:{action: 'cart', cartId, month_annual},
				success: function(data)
				{
					console.log(data);
					$(location).attr('href','cart.php');
					
				} 
			});
		}
		})
	});
</script>
</body>
</html>