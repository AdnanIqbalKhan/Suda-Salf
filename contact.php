<?php
include_once('phpScripts/login_header.php');
?>
<?php
include_once('phpScripts/db_config.php');
$msg_done = false;
if(isset($_POST["msg_mail"])){
	if($_POST["msg_mail"] != 'Email'){
		$name = $_POST["msg_name"];
		$email = $_POST["msg_mail"];
		$msg = $_POST["message"];
		$sql = "INSERT INTO messages(name,email,message) VALUES('$name','$email','$msg')";
		$result = $conn->query($sql);

		$msg_done = true;
	}
}
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
	<?php include("templates/head.html");?>
</head>

<body>
	<?php include("templates/header.html");?>

	<?php if($msg_done == true){
		echo '<script>bootbox.alert("Thanks for your feedback");</script>';
		$msg_done = false;
	} ?>
	<!--banner-->
	<div class="banner-top">
		<div class="container">
			<h3>Contact</h3>
			<h4>
				<a href="index.php">Home</a>
				<label>/</label>Contact</h4>
			<div class="clearfix"> </div>
		</div>
	</div>

	<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="spec ">
				<h3>Contact</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
			<div class=" contact-w3">	
				<div class="col-md-5 contact-right">	
					<img src="images/cac.jpg" class="img-responsive" alt="">
					<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6480.432383990807!2d72.9904857!3d33.6439573!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819" style="border:0"></iframe>
				</div>
				<div class="col-md-7 contact-left">
					<h4>Contact Information</h4>
					<p>We are trying to help out the students, faculty and families of the related people inside NUST. Now, you people don't need to go to the concordias or cafes. You can order and get your required thing at your doorstep.</p>
					<ul class="contact-list">
						<li> <i class="fa fa-map-marker" aria-hidden="true"></i>NUST H-12, ISlamabad</li>
						<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@sudasalf.com">info@sudasalf.com</a></li>
						<li> <i class="fa fa-phone" aria-hidden="true"></i>+923155490285</li>
					</ul>
					<div id="container">
						<!--Horizontal Tab-->
						<div id="parentHorizontalTab">
							<ul class="resp-tabs-list hor_1">
								<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
								<li> <i class="fa fa-map-marker" aria-hidden="true"></i> </span></li>
								<li> <i class="fa fa-phone" aria-hidden="true"></i></li>
							</ul>
							<div class="resp-tabs-container hor_1">
								<div>
									<form action="" method="post">
										<input type="text" value="Name" name="msg_name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required>
										<input type="email" value="Email" name="msg_mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required>
										<textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required>Message...</textarea>
										<input type="submit" value="Submit" >
									</form>
								</div>
								<div>
									<div class="map-grid">
									<h5>Our Branches</h5>
										<ul>
											<li><i class="fa fa-arrow-right" aria-hidden="true"></i>concordia 1, NUST, H12</li>
											<li><i class="fa fa-arrow-right" aria-hidden="true"></i>concordia 2, NUST, H12</li>
											<li><i class="fa fa-arrow-right" aria-hidden="true"></i>cafe 309, NUST, H12</li>
											<li><i class="fa fa-arrow-right" aria-hidden="true"></i>The Jango, NUSt, H12</li>
											<li><i class="fa fa-arrow-right" aria-hidden="true"></i>The Wall, NUSt, H12</li>
										</ul>
									</div>
								</div>
								<div>
									<div class="map-grid">
										<h5>Contact us Through</h5>
										<ul>
											<li>Mobile No : +123 456 7890</li>
											<li>Office No : +123 222 2222</li>
											<li>Home No : +123 456 7890</li>
											<li>Fax No : +123 456 7890</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			<div class="clearfix"></div>
		</div>
		</div>
	</div>
	<!-- //contact -->

	<!--footer-->
	<?php include("templates/footer.html");?>
	<!-- //footer-->

</body>

</html>