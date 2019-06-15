<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include_once('phpScripts/db_config.php');
$has_Data = false;
if(isset($_GET["id"])){

	// echo $_GET["id"] . "   ";
	

	$id = (int)$_GET["id"];

	$query_ById->bind_param("i", $id );

	$query_ById->execute();

	/* Get the result */
	$result = $query_ById->get_result();

	/* Get the number of rows */
	$num_of_rows = $result->num_rows;


	// echo $num_of_rows;

	$data = $result->fetch_assoc();
	if($num_of_rows > 0){
		$has_Data = true;
	}
	// /* free results */
	// $query_ById->free_result();

	// /* close statement */
	// $query_ById->close();
    
}


?>

	<!DOCTYPE html>
	<html>

	<head>
		<?php include("templates/head.html");?>
	</head>

	<body>
		<?php include("templates/header.html");?>

		<!--banner-->
		<div class="banner-top">
			<div class="container">
				<h3>Product Details</h3>
				<h4>
					<a href="index.php">Home</a>
					<label>/</label>details</h4>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="single">
			<div class="container">
				<?php if($has_Data) { ?>
				<div class="single-top-main">
					<div class="col-md-5 single-top">
						<div class="single-w3agile">

							<div id="picture-frame">
								<img src="img/products/<?php echo $data["image"]; ?>" data-src="img/productsZoom/<?php echo $data["image"]; ?>" alt=""
								    class="img-responsive" />
							</div>
							<script src="js/jquery.zoomtoo.js"></script>
							<script>
								$(function () {
									$("#picture-frame").zoomToo({
										magnify: 1
									});
								});
							</script>
						</div>
					</div>
					<div class="col-md-7 single-top-left ">
						<div class="single-right">
							<h3>
								<?php echo $data["name"]; ?>
							</h3>


							<div class="pr-single">
								<p class="reduced ">
									<del>
										<?php if($data["offer"]){ echo 'Rs ' . $data["oldprice"]; } ?>
									</del>
									<?php  echo 'Rs ' .  $data["price"]; ?>
								</p>
							</div>
							<div class="block block-w3">
								<div>
								<a class="googleMapPopUp"  rel="nofollow" href="https://maps.google.com/maps?q=<?php  echo $data["Cordinates"]; ?>" target="_blank" title="<?php  echo $data["location"]; ?> location">
								<p class="single_page_link"><i class="fas fa-map-marker-alt"></i>  Available at 
								<?php  echo $data["Location"]; ?></p></a></div>
								<br>
								<div class="starbox small ghosting" id="single_star_box" 
								data-start-value="<?php echo $data["rating"]; ?>"> </div>
							</div>

							<p class="in-pa">
								<?php  echo $data["description"]; ?>
							</p>

						
							<div class="add">
								<button class="btn btn-danger my-cart-btn my-cart-b" data-id="<?php  echo $data[" id "]; ?>" data-name="<?php  echo $data["name"]; ?>" data-summary="<?php  echo $data["summary"]; ?>" data-price="<?php  echo $data["price"]; ?>" data-quantity="1"
								    data-image="img/products/<?php  echo $data["image"]; ?>">
									Add to Cart</button>
							</div>



							<div class="clearfix"> </div>
						</div>


					</div>
					<div class="clearfix"> </div>
				</div>
				<?php }else { ?>
				<h2> Product Not Found</h2>
				<?php }?>

			</div>
		</div>

		<!--footer-->
		<?php include("templates/footer.html");?>
		<!-- //footer-->
	</body>

	</html>
