<?php
include_once('phpScripts/login_header.php');
include_once('phpScripts/db_config.php');

if(isset($_POST["Email"]) &&  $_POST["Email"] != 'Email'){
	$uemail = $_POST["Email"];
	$upass = $_POST["Password"];
	$sql = "SELECT * FROM user WHERE email='$uemail'";

    if ($result = $conn->query($sql)){
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if($row['password']==$upass){
				if($row['status']!='Banned'){
					$_SESSION['user'] = $uemail;
					$_SESSION['username'] = $row['name'];
					$_SESSION["user_type"] = $row['type'];
					$_SESSION["user_status"] = $row['status'];
					$_SESSION["user_image"] = $row['image'];

					header("Location: index.php");
				}
				else{
					$error = "$uemail is Banned";
				}
            }
            else{
                $error = "Wrong password";
            }
        } else {
            $error = "$uemail is not a registered user";
        }
    }
    else{
        $error = "Connection Error";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
	<?php include("templates/head.html");?>

	<script src="https://apis.google.com/js/api:client.js"></script>

	<script type="text/javascript" src="//platform.linkedin.com/in.js">
		api_key: ############ // replace ############# with secret api_key
	</script>
	<script type="text/javascript" src="myJS/social.js"></script>

	<link href="myCSS/social.css" rel="stylesheet">
</head>

<body>
	<?php include("templates/header.html");?>

	<!---->
	<!--banner-->
	<div class="banner-top">
		<div class="container">
			<h3>Login</h3>
			<h4>
				<a href="index.php">Home</a>
				<label>/</label>Login</h4>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--login-->
	<?php 
	if(isset($error)){ 
		echo '<div class="alert alert-danger alert-dismissable">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
		'.$error.' </div>';
	}
	?>

	<div class="login">

		<div class="main-agileits">
			<div class="form-w3agile">
				<h3>Login</h3>
				<div class="social">
					<a id="google_login" href="#" class="login_tooltip" data-toggle="tooltip" data-placement="top" title="Sign In with Google plus">
						<i class="fab fa-google-plus-square fa-7x"></i>
					</a>
					<a scope="public_profile,email" onclick="checkLoginState();" id="facebook_login" href="#" class="login_tooltip" data-toggle="tooltip"
					    data-placement="top" title="Sign In with Facebook">
						<i class="fab fa-facebook-square fa-7x"></i>
					</a>
					<a id="linkedin_login" href="#" class="login_tooltip" data-toggle="tooltip" data-placement="top" title="Sign In with Linkedin">
						<i class="fab fa-linkedin-square fa-7x"></i>
					</a>
				</div>
				<div class="division">
					<div class="line l"></div>
					<span>or</span>
					<div class="line r"></div>
				</div>
				<form action="" method="post" id="login_form">
					<div class="key">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" value="Email" name="Email" id="Email" onfocus="if (this.value == 'Email') this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"
						    required="">
						<div class="clearfix"></div>
					</div>
					<div class="key">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" value="Password" name="Password" id="Password" onfocus="if (this.value == 'Password') this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"
						    required="">
						<div class="clearfix"></div>
					</div>
					<input type="submit" value="Login">
					<div  style="float:right" class="checkbox">
						<label><input type="checkbox" name="remember" id="remember" checked>Remember me</label>
					</div>
				</form>
			</div>
			<div class="forg">
				<a href="#" class="forg-left">Forgot Password</a>
				<a href="register.php" class="forg-right">Register</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {

		var remember = $.cookie('remember');
		if (remember == 'true') 
		{
			var email = $.cookie('email');
			var password = $.cookie('password');
			// autofill the fields
			$('#Email').val(email);
			$('#Password').val(password);
		}


		$("#login_form").submit(function() {
		if ($('#remember').is(':checked')) {
			var email = $('#Email').val();
			var password = $('#Password').val();

			// set cookies to expire in 14 days
			$.cookie('email', email, { expires: 14 });
			$.cookie('password', password, { expires: 14 });
			$.cookie('remember', true, { expires: 14 });                
		}
		else
		{
			// reset cookies
			$.cookie('email', null);
			$.cookie('password', null);
			$.cookie('remember', null);
		}
		});
		});
	</script>
	
	<!--footer-->
	<?php include("templates/footer.html");?>
	<!-- //footer-->
</body>

</html>