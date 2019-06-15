
<?php
include_once('phpScripts/login_header.php');
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

	<style>
		li {
			display: block;
			/* float: left; */
		}

		.button {
			padding: 5px 10px;
			font-size: 20px;
			text-align: center;
			cursor: pointer;
			outline: none;
			color: #fff;
			background-color: #4CAF50;
			border: none;
			margin-top: -100px;
		}

		.button:hover {
			background-color: #3e8e41
		}

		.button:active {
			background-color: #3e8e41;
			transform: translateY(4px);
		}

		#texty {
			height: 50px;
		}
	</style>

	<!---//End-rate---->

</head>

<body>
	<?php  
	
    // Define application constants
  define('MM_UPLOADPATH', 'profileImage/');
  define('MM_MAXFILESIZE', 54768);      // 32 KB
  define('MM_MAXIMGWIDTH', 3632);        // 120 pixels
  define('MM_MAXIMGHEIGHT', 5456);       // 120 pixels
  
    require_once('connectvars.php');
     if (!isset($_SESSION['user'])) {
        echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
        exit();
    } 
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT * from user  WHERE email = '" . $_SESSION['user'] . "'";
    

    $data = mysqli_query($dbc, $query) or die ('couldnot retrieve your data');
    if (mysqli_num_rows($data) == 1) {
        
        $row = mysqli_fetch_array($data);
        $username = $row['name'];
        $email = $row['email'];
        $type =$row['type'];
        $status=$row['status'];
        $image=$row['image'];
        $bio =$row['bio'];
        $address=$row['Address'];
        $contact=$row['Contact'];
		$password=$row['password'];
		
    }
    ?>




	<?php include("templates/header.html");?>

	<!--banner-->
	<div class="banner-top">
		<div class="container">
			<h3>Profile</h3>
			<h4>
				<a href="index.html">Home</a>
				<label>/</label>Profile</h4>
			<div class="clearfix"> </div>
		</div>
	</div>

	<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="spec ">
				<h3>Profile</h3>
				<div class="ser-t">
					<b></b>
					<span>
						<i></i>
					</span>
					<b class="line"></b>
				</div>
			</div>
			<div class=" contact-w3">
				<div class="col-md-5 contact-right">
					<?php echo'<img src="' . MM_UPLOADPATH . $row['image'] .'" alt="Profile Picture" class="img-responsive" >';?>


					<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2482.432383990807!2d0.028213999961443994!3d51.52362882484525!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819"
					    style="border:0"></iframe>
				</div>
				<div class="col-md-7 contact-left">
					<h4>Personal Information</h4>
					<?php  
					echo '<li><i class="fa fa-handshake-o" aria-hidden="true"> '.$bio.'</i></li><br><br>'; ?>

					<ul class="contact-list">
						<?php if(!empty($username))
                    {
                        echo ' <li><i class="fa fa-user" aria-hidden="true"> '.$username.'</i></li><br><br>';
                    }
                     if(!empty($address))
                    {

                        echo ' <li><i class="fa fa-map-marker" aria-hidden="true"> '.$address.'</i></li><br><br><br>';
                    }
                     if(!empty($email))
                    {
                        echo ' <li><i class="fa fa-envelope" aria-hidden="true"> '.$email.'</i></li><br><br><br>';
                    }
                     if(!empty($contact))
                    {
                        echo ' <li><i class="fa fa-phone" aria-hidden="true"> '.$contact.'</i></li><br><br><br>';
                    }
                    if(!empty($type))
                    {
                        echo ' <li><i class="fa fa-meh-o" aria-hidden="true"> '.$type.'</i></li><br><br><br>';
                    }
                    ?>
						<button class="button">Edit Profile</button>




					</ul>

					<!--Horizontal Tab-->
					<div id="parentHorizontalTab" style="visibility:hidden">
						<ul class="resp-tabs-list hor_1" style=>
							<li>
								<i class="fa fa-user" aria-hidden="true"></i>
							</li>

						</ul>
						<div class="resp-tabs-container hor_1">
							<div>
								<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
									<input type="text" placeholder="Name" name="username" value="<?php if (!empty($username)) echo $username; ?>">
									<input type="email" value="<?php if (!empty($email)) echo $email; ?>" name="email">
									<textarea id="texty" name="address" value="<?php if (!empty($address)) echo $address; ?>" required=""></textarea>
									<input type="text" value="<?php if (!empty($contact)) echo $contact; ?>" name="contact" placeholder="Contact" required="">
									<textarea id="texty" name="bio"  value="<?php if (!empty($bio)) echo $bio; ?>"></textarea>


									<input type="file" id="new_picture" name="new_picture" />
									<?php if (!empty($image)) {
                                        echo '<img class="profile" src="' . MM_UPLOADPATH . $image . '" alt="Profile Picture" />';
                                    } ?>


									<input type="submit" value="Confirm" name="submit">
								</form>
							</div>

						</div>
					</div>

					<?php 

                    if(isset($_POST['submit']))
                    {
                        $name = $_POST['username'];
                        $email = $_POST['email'];
                        $address= $_POST['address'];
                        $contact = $_POST['contact'];
                        $bio =$_POST['bio'];
                      /*   $new_picture = mysqli_real_escape_string($dbc, trim($_FILES['new_picture']['name']));
                        $new_picture_type = $_FILES['new_picture']['type'];
                        $new_picture_size = $_FILES['new_picture']['size']; 
                        list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']); */
                        $error = false;

                        /* if (!empty($new_picture)) {
                            if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') || ($new_picture_type == 'image/jpg') ||
                              ($new_picture_type == 'image/png')) && ($new_picture_size > 0) && ($new_picture_size <= MM_MAXFILESIZE) &&
                              ($new_picture_width <= MM_MAXIMGWIDTH) && ($new_picture_height <= MM_MAXIMGHEIGHT)) {
                              if ($_FILES['file']['error'] == 0) {
                                // Move the file to the target upload folder
                                $target = MM_UPLOADPATH . basename($new_picture);
                                if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $target)) {
                                  // The new picture file move was successful, now make sure any old picture is deleted
                                  if (!empty($image) && ($image != $new_picture)) {
                                    @unlink(MM_UPLOADPATH . $image);
                                  }
                                }
                                else {
                                  // The new picture file move failed, so delete the temporary file and set the error flag
                                  @unlink($_FILES['new_picture']['tmp_name']);
                                  $error = true;
                                  echo '<p class="error">Sorry, there was a problem uploading your picture.</p>';
                                }
                              }
                            }
                            else {
                              // The new picture file is not valid, so delete the temporary file and set the error flag
                              @unlink($_FILES['new_picture']['tmp_name']);
                              $error = true;
                              echo '<p class="error">Your picture must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024) .
                                ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</p>';
                            }
                          } */
                         

                         /*  if(!empty($new_picture))
                          {
                         /*    /* $query = "UPDATE user SET name = '$username', email = '$email', Contact = '$contact', " .
                            " Address = '$address', image = '$new_picture', bio = '$bio' WHERE email = '" . $_SESSION['email'] . "'"; */

                            /* $query = "UPDATE user SET name = '$username', email = '$email', Contact = '$contact', " .
                            " Address = '$address',image = '$new_picture', bio = '$bio' WHERE  WHERE email = 'cos145@gmail.com';";
                          } */
                          //else 
                         // { */ */
                            $query = "UPDATE user SET name = '$username', email = '$email', Contact = '$contact', " .
                            " Address = '$address', bio = '$bio' WHERE email = '" . $_SESSION['user'] . "'";
                             header("Location: /profile.php");
                           
                         // }
                          //mysqli_query($dbc, $query) or die("Couldn't get inserted");

                          if (mysqli_query($dbc, $query)) {
                            echo "Database created successfully";
                            
                        } else {
                            echo "Error creating database: " . mysqli_error($dbc);


                        }



                        
                        mysqli_close($dbc);
                        exit();

                         

                    }


                    ?>


					<!--Plug-in Initialisation-->
					<script type="text/javascript">
						$(document).ready(function () {
							//Horizontal Tab

							// $('#parentHorizontalTab').hide();
							$('#parentHorizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion
								width: 'auto', //auto or any width like 600px
								fit: true, // 100% fit in a container
								tabidentify: 'hor_1', // The tab groups identifier
								activate: function (event) { // Callback function if tab is switched
									var $tab = $(this);
									var $info = $('#nested-tabInfo');
									var $name = $('span', $info);
									$name.text($tab.text());
									$info.show();
								}
							});

							$("button").click(function () {

								$("#parentHorizontalTab").css("visibility", "visible");
							});



							// Child Tab
							$('#ChildVerticalTab_1').easyResponsiveTabs({
								type: 'vertical',
								width: 'auto',
								fit: true,
								tabidentify: 'ver_1', // The tab groups identifier
								activetab_bg: '#fff', // background color for active tabs in this group
								inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
								active_border_color: '#c1c1c1', // border color for active tabs heads in this group
								active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
							});

							//Vertical Tab
							$('#parentVerticalTab').easyResponsiveTabs({
								type: 'vertical', //Types: default, vertical, accordion
								width: 'auto', //auto or any width like 600px
								fit: true, // 100% fit in a container
								closed: 'accordion', // Start closed if in accordion view
								tabidentify: 'hor_1', // The tab groups identifier
								activate: function (event) { // Callback function if tab is switched
									var $tab = $(this);
									var $info = $('#nested-tabInfo2');
									var $name = $('span', $info);
									$name.text($tab.text());
									$info.show();
								}
							});
						});
					</script>

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