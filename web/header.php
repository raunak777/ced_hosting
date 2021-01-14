<?php

session_start();
$actual_link = $_SERVER["PHP_SELF"];

if (isset($_SESSION['admin'])) {
	
	header('Location : ../admin');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	#logout{
		display: none;
	}
</style>
<body>
	<!---header--->
	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<i class="sr-only">Toggle navigation</i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
						</button>				  
						<div class="navbar-brand">
							<h1><a href="index.php"><img src="images/logo.png" class="img-fluid" style="width: 40%;"></a></h1>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="services.php">Services</a></li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
								<ul class="dropdown-menu">
									<?php

									include '../admin/productclass.php';
									$prod= new product();
									$data= $prod->get_product();
									$length= $data->num_rows;
									for ($i=0; $i <$length ; $i++) { 
										$row=$data->fetch_assoc();
										?>
										<li><a href="catpage.php?id=<?php echo $row['id'] ?>"><?php echo $row['prod_name'];  ?></a></li>
									<?php } ?>
									</ul>			
								</li>
								
								<li><a href="pricing.php">Pricing</a></li>
								<li><a href="blog.php">Blog</a></li>
								<li><a href="contact.php">Contact</a></li>
								<li><a href=""><i class="fa fa-shopping-cart"></i></b></a></li>
								<?php
								if (isset($_SESSION['username'])) {
									echo '<li><a href="logout.php">Logout</a></li>';
									echo '<li><a href="#">Hello! '.$_SESSION["username"].'</a></li>';
								}
								else {
									$active_link=($actual_link=="/cedhosting/login.php" ? "active" : "");
									echo '<li class='.$active_link.'><a href="login.php">Login</a></li>';
								}
								?>
							</ul>

						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
		<!---header--->
	</body>
	</html>