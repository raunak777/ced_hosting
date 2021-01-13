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
	<title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Account :: w3layouts</title>
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
	<style type="text/css">
		#otpfield, 
		#emailotpbtn, #otpbtn
		{
			display: none;
		}
	</style>
	<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
		$(function(){
			$("#number").on("input", function() {
				var nonNumReg = /[^0-9]/g
				$(this).val($(this).val().replace(nonNumReg, ''));
			});
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
		<!-- registration -->
		<div class="main-1">
			<div class="container">
				<div class="register">
					
					<div class="register-top-grid">
						<h3>personal information(via Email)</h3>
						<span style="color: red">* mandatory fields</span>
						
						<div>
							<span>Email Address<label>*</label></span>
							<input type="email" name="email" id="email">
							<input class="btn btn-danger" name="otpbtn" id="otpbtn" type="button" value="Get OTP">
						</div>
						<div class="form-group">
							<input type="number" class="form-control" id="otpfield" maxlength="6" name="otpfield"  placeholder="Enter otp..">
							<input class="btn btn-danger" name="emailotpbtn" id="emailotpbtn" type="button" value="Verify">
						</div>
						<div>
							<span>Mobile Number<label>*(optional)</label></span>
							<input type="number" onKeyPress="if(this.value.length==10) return false;" name="mobile" id="mobile"> 
						</div>

						<div>
							<span>Name<label>*</label></span>
							<input type="text"  name="name" id="name"> 
						</div>
						<div>
							<span>SECURITY QUESTION<label>*</label></span>
							<select id="security" name="security">
								<option>please select security question</option>
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

						
						<div style="">
							<span>Security Answer<label>*</label></span>
							<input type="text" name="answer" id="answer"> 
						</div>
						<div class="clearfix"> </div>
						<a class="news-letter" href="#">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
						</a>
					</div>
					<div class="register-bottom-grid">
						<br>
						<h3>login information</h3>
						<div>
							<span>Password<label>*</label></span>
							<input type="password"  name="password" id="password">
						</div>
						<div>
							<span>Confirm Password<label>*</label></span>
							<input type="password" name="cnfpassword" id="cnfpassword">
						</div>
						<input class="btn btn-primary btn-lg" type="submit" id="submit" value="Submit">
					</div>
					<div id="error_msg">g</div>
					<div id="success_msg">g</div>
				</div>
			</div>
		</div>
	</div>
	<!-- registration -->
	
</div>
<!-- login -->
<!---footer--->
<?php include 'footer.php'; ?>
<!---footer--->
</body>
<script type="text/javascript">
	$(function(){
		$("#email").focusin(function(){
			$("#otpbtn").show();
		});

		$("#mobile").focusin(function(){
			$("#mobileotpbtn").show();
		});
	//Email send otp
	$("#otpbtn").on("click",function(){
		var email = $("#email").val();
		if (email == '') {
			$("#error_msg").text("Pls! Enter email").slideDown();
			$("#error_msg").delay(1000).slideUp(500);
		}
		else{

			$.ajax({
				type: "POST",
				url: "mailer.php",
				data: {data: "get", email : email},
				success: function(data){
					if (data == 1) {
						$("#otpfield,#emailotpbtn").show();
						$("#otpbtn").hide();
						$("#success_msg").text("Email send successfully").slideDown();
						$("#success_msg").delay(1000).slideUp(1000);
					}
					else if(data == 0) {
						$("#error_msg").text("Email not send, pls try again").slideDown();
						$("#error_msg").delay(1000).slideUp(500);
					}
					else if(data == 2) {
						$("#error_msg").text("Email already register!").slideDown();
						$("#error_msg").delay(1000).slideUp(500);
					}
				}
			});
		}
	});
    //Email verification
    $("#emailotpbtn").on("click", function(){
    	var emailotpfield = $("#otpfield").val();
    	if(emailotpfield == '')
    	{
    		$("#error_msg").text("Pls! Enter otp").slideDown();
    		$("#error_msg").delay(1000).slideUp(500);
    	}
    	else{
    		$.ajax({
    			type: "POST",
    			url: "mailer.php",
    			data: {data:"verify" ,emailotpfield : emailotpfield},
    			success: function(data)
    			{
    				if(data == 1)
    				{
    					$("#success_msg").text("Otp verified successfully").slideDown();
    					$("#success_msg").delay(1000).slideUp(1000);
    					$("#email").css("border-color", "green");
    					$("#otpfield,#emailotpbtn ").hide();
    					$("#email").attr("disabled","disabled");
    				}
    				else{
    					$("#error_msg").text("Otp incorrect, pls enter correct otp").slideDown();
    					$("#error_msg").delay(1000).slideUp(500);
    				}
    			}
    		});
    	}
    });

 //registartion
 $("#submit").on("click",function(){
 	var email = $("#email").val();
 	var mobile = $("#mobile").val();
 	var name = $("#name").val();
 	var security = $("#security").val();
 	var answer = $("#answer").val();
 	var password = $("#password").val();
 	var cnfpassword = $("#cnfpassword").val();
 	if (name == '') {
 		$("#error_msg").text("Pls enter name!").slideDown();
 		$("#error_msg").delay(1000).slideUp(500);
 	}
 	else if(password == '')
 	{
 		$("#error_msg").text("Pls enter password").slideDown();
 		$("#error_msg").delay(1000).slideUp(500);
 	}
 	else if(cnfpassword == '')
 	{
 		$("#error_msg").text("Otp incorrect, pls enter correct otp").slideDown();
 		$("#error_msg").delay(1000).slideUp(500);
 	}
 	else{
 		$.ajax({
 			type: "POST",
 			url: "usermediator.php",
 			data:{action : 'email_reg',email : email, mobile : mobile,name : name, security : security, answer: answer, password : password, cnfpassword : cnfpassword},
 			success: function(data)
 			{
 				console.log(data);
 				$("#success_msg").html(data).slideDown();
 				$("#success_msg").delay(1000).slideUp(1000);
 			}
 		});
 	}
 });

});
</script>
</html>