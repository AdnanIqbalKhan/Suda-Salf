<?php
include_once('phpScripts/db_config.php');

$sql = "SELECT * FROM products JOIN location USING (Location) ORDER BY timestamp DESC LIMIT 8;";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
	
	$item = array(
		"id" => $row["id"],
		"name" => $row["name"],
		"description" => $row["description"],
		"image" => $row["image"],
		"price" => $row["price"],
		"Location" => $row["Location"],
		"summary" => $row["summary"],
		"oldprice" => $row["oldprice"],
		"offer" => $row["offer"],
		"unit" => $row["unit"],
		"rating" => $row["rating"],
		"Cordinates" => $row["Cordinates"],
		"timestamp" => $row["timestamp"],
		"counter" => $row["counter"]
	);

	array_push($data,$item);
	
}
$new_products = json_encode($data);

?>

<!DOCTYPE html>
<html>

<head>
	<?php include("templates/head.html");?>

	<script>
		var new_products = <?php echo $new_products; ?>;

		$(document).ready(function () {
			var prod_view_factory =  new Product_View();

			$("#all_sub").empty();
			$("#prod_modals").empty();
			$.each(new_products, function (i, item) {
				prod_view_factory.setproduct(item);
				$("#all_sub").append(prod_view_factory.create_card());
				$("#prod_modals").append(prod_view_factory.create_modal());
			});
			$("#all_sub").append('<div class="clearfix"></div>');

			reinit();
		});
	</script>
</head>

<body>
	<?php include("templates/header.html");?>
	<!--banner-->
	<div class="banner-top">
		<div class="container">
			<h3>Leatest Collection</h3>
			<h4>
				<a href="index.php">Home</a>
				<label>/</label>LeatestCollection</h4>
			<div class="clearfix"> </div>
		</div>
	</div>

	<?php include("templates/carousel.html");?>
	
	<div class="kic-top ">
		<div class="container " id="top_sub">

		</div>
	</div>

	<!--content-->
	<div style="margin:3em 0;">
		<div class="container">
			<div class="spec ">
				<h3>Leatest Collection</h3>
				<div class="ser-t">
					<b></b>
					<span>
						<i></i>
					</span>
					<b class="line"></b>
				</div>
			</div>
			<div class=" con-w3l agileinf" id="all_sub">

			</div>
		</div>
	</div>

	<div id="prod_modals"></div>
	<!--footer-->
	<?php include("templates/footer.html");?>
	<!-- //footer-->

</body>

</html>