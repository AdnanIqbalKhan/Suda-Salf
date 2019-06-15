<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include_once('phpScripts/login_header.php');
?>
<?php
// Define database connection constants
require_once('connectvars.php');
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
  if(isset($_POST['submit']))
  {
	$error="";
	   
	   $username = mysqli_real_escape_string($dbc,trim($_POST['username']));
	   $email = mysqli_real_escape_string($dbc,trim($_POST['email']));
	   $password1= mysqli_real_escape_string($dbc,trim($_POST['password1']));
	   $password2= mysqli_real_escape_string($dbc,trim($_POST['password2']));
	   $type = mysqli_real_escape_string($dbc,trim($_POST['type']));
	  

	   if($type=="Customer")
	   {
		   $status = "Active";
	   }
	   if($type=="Shopkeeper")
	   {
		   $status = "Pending";
	   }
	   $query ="SELECT * FROM user WHERE email = '$email' ";
	   $data = mysqli_query($dbc,$query) or die("could not insert");
	   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error="Not a valid email address";
   }
	   else if(mysqli_num_rows($data)==0)
	   {
		   $query = "INSERT INTO user(email,name,password, type, status) VALUES('$email', '$username','$password1','$type','$status')";
		   mysqli_query($dbc,$query) or die("could not insert");
		   $error= "ACCOUNT HAS CREATED SUCCESSFULLY.";
		   $_SESSION['user'] = $email;
		   header("Location: index.php");
	   }
	   else 
	   {
			$error="This email already exists.";
			
			
	   }

  $email="";
			$username="";
 
  
}
mysqli_close($dbc);
?>

<!DOCTYPE html>
<html>

<head>
	<?php include("templates/head.html");?>
	<script type="text/javascript" src="myJS/sign.js"></script>
	<script type="text/javascript" src="myJS/signi.js"></script>
	<style>
		.button {
			position: relative;
			background-color: #4CAF50;
			border: none;
			font-size: 28px;
			color: #FFFFFF;
			padding: 20px;
			width: 200px;
			text-align: center;
			-webkit-transition-duration: 0.4s;
			/* Safari */
			transition-duration: 0.4s;
			text-decoration: none;
			overflow: hidden;
			cursor: pointer;
		}

		.button:after {
			content: "";
			background: #90EE90;
			display: block;
			position: absolute;
			padding-top: 300%;
			padding-left: 350%;
			margin-left: -20px!important;
			margin-top: -120%;
			opacity: 0;
			transition: all 0.8s
		}

		.button:active:after {
			padding: 0;
			margin: 0;
			opacity: 1;
			transition: 0s
		}
	</style>

</head>

<body>
	<?php include("templates/header.html");?>

	<!--banner-->
	<div class="banner-top">
		<div class="container">
			<h3>Register</h3>
			<h4>
				<a href="index.php">Home</a>
				<label>/</label>Register</h4>
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
			<div class="form-w3agile form1">
				<h3>Register</h3>

				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">


					<div class="key">

						<i class="fa fa-user" aria-hidden="true"></i>
						<input type="text" name="username" required="" placeholder="Username">
						<div class="clearfix"></div>
					</div>
					<div class="key">

						<i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="text" name="email" required="" placeholder="Email">
						<div class="clearfix"></div>
					</div>
					<div class="key">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" id="password" name="password1" required="" placeholder="Password" onkeypress="StrengthChecker()">
						<div class="clearfix"></div>

					</div>
					<div class="ullu" id="check" style="color:grey"></div>
					<div class="key">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<input type="password" name="password2" id="password2" onkeypress="StrengthCheckers();" required="" placeholder="ConfirmedPassword">
						<div class="clearfix"></div>
					</div>
					<div class="ullu" id="checkie" style=" color:grey"></div>
					<p id="divCheckPasswordMatch" style="color:grey"></p>



					<div class="key">
						<select name="type" style="height:48px;width:100%; color:grey">
							<option value="Shopkeeper">ShopKeeper</option>
							<option value="Customer">Customer</option>
						</select>
						<div class="clearfix"></div>
					</div>
					<input type="submit" value="submit" name="submit">
				</form>
			</div>
			<div class="forg">
				<a href="login.php" class="forg-right">Login</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<!--footer-->
	<?php include("templates/footer.html");?>
	<!-- //footer-->

</body>

</html>