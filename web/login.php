<!--
Au
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
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
	<?php include 'header.php'; ?>
	<!---header--->
	<!---login--->
	<div class="content">
		<div class="main-1">
			<div class="container">
				<div class="login-page">
					<div class="account_grid">
						<div class="col-md-6 login-left">
							<h3>new customers</h3>
							<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
							<a class="acount-btn" href="account.php">Create an Account</a>
						</div>
						<div class="col-md-6 login-right">
							<h3>registered</h3>
							<p>If you have an account with us, please log in.</p>
							
							<div>
								<span>Email or Mobile<label>*</label></span>
								<input type="text" name="email" id="email"> 
							</div><br>
							<div>
								<span>Password<label>*</label></span>
								<input type="password" name="password" id="password">
							</div><br> 
							<a class="forgot" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal">Forgot Your Password?</a>
							<input type="submit" id="login" value="Login">
							
						</div>	
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title text-center" id="exampleModalLabel">Reset Password</h2>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="text-success text-center h4" id="success"></div>
				<div  class="text-danger text-center h4" id="error"></div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="emailid" aria-describedby="emailHelp">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Select Security Question</label>
						<select class="form-control" id="selectsecurity">
							<option value="">please select security question</option>
							<option>What was your childhood nickname?</option>
							<option>What is your oldest sibling's middle name?</option>
							<option>What is the name of the company of your first job?</option>
							<option>Who was your childhood hero?</option>
							<option>What is your pet's name?</option>
							<option>What is your mother’s (father's) first name?</option>
							<option>What is your favorite team?</option>
							<option>What is your favorite movie?</option>
							<option>What is your favorite sport?</option>
							<option>What was your dream job as a child?</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInput">Security Answer</label>
						<input type="text" class="form-control" id="securityans">
					</div>
					<div class="form-group">
						<label for="exampleInput2">New Password</label>
						<input type="password" class="form-control" id="newpassword">
					</div>
					<div class="form-group">
						<label for="exampleInput2">Confirm Password</label>
						<input type="password" class="form-control" id="cnfpassword">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" id="uptpass" class="btn btn-primary">Save</button>
					</div>
					
				</div>
			</div>
		</div>
		<!---footer--->
		<!-- <?php include 'footer.php'; ?> -->
		<!---footer--->
	</body>
	<script type="text/javascript">
		$(function(){
			$("#login").on("click",function(){
				var emailmob = $("#email").val();
				var password = $("#password").val();
				$.ajax({
					type: "POST",
					url: "usermediator.php",
					data: {action: 'login', emailmob: emailmob, password : password},
					success: function(data)
					{
						console.log(data);
						if (data == 0) {
							location.replace('index.php');

						}
						else if(data == 1){
							location.replace('../admin/');
						}
						else if (data == 2){
							alert("Password incorrect");
						}
						else{
							alert("Email or Mobile number not registered");
						}	
					}

				});
			});

			$("#uptpass").on("click", function(){
				var email = $("#emailid").val();
				var question = $("#selectsecurity").val();
				var ans = $("#securityans").val();
				var password = $("#newpassword").val();
				var cnfpassword = $("#cnfpassword").val();
				if (email=='') {
					$("#error").text("Enter registered email id").fadeOut(5000);
					$("#emailid").focus();
				}
				else if(question=='')
				{
					$("#error").text("Select Question").fadeOut(5000);
					$("#selectsecurity").focus();
				}
				else if(ans =='')
				{
					$("#error").text("Enter answer").fadeOut(5000);
					$("#securityans").focus();
				}
				else if(password=='')
				{
					$("#error").text("Enter new password").fadeOut(5000);
					$("#newpassword").focus();
				}
				else if(cnfpassword=='')
				{
					$("#error").text("Enter Confirm Password").fadeOut(5000);
					$("#cnfpassword").focus();
				}
				else{
					$.ajax({
						type:"POST",
						url: "usermediator.php",
						data:{action:"forgot", email, question, ans, password, cnfpassword},
						success: function(data)
						{
							if (data==3) {
								$("#success").text("Password change successfully");
								$("#error").fadeOut();
							}
							else if(data==1){
								$("#error").text("Security Question & Answer wrong!");
							}
							else if(data==2)
							{
								$("#error").text("Some error Password not update");
							}
							else if(data==0)
							{
								$("#error").text("Email id not registered!");
							}
							else if (data==4) {
								$("#error").text("Password and Confirm password not matched!");
							}
							else{
								$("#error").text(data);
							}
						}
					});
				}
			});
		});
	</script>
	</html>