<?php
include_once('phpScripts/login_header.php');
?>
<?php
include_once('phpScripts/db_config.php');

$query_subcat_top = $conn->prepare("call get_subcat_top(?, ?);");
$query_subcat_By_id = $conn->prepare("call get_subcat_by_id(?);");

$has_Data = false;
if(isset($_GET["id"])){

	$id = (int)$_GET["id"];
	$limit = 3;
	$query_subcat_top->bind_param("ii", $id, $limit);
	$query_subcat_top->execute();
	$result = $query_subcat_top->get_result();
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
	$top_products = json_encode($data);

	$result->close();
    $conn->next_result();

	$query_subcat_By_id->bind_param("i", $id);
	$query_subcat_By_id->execute();
	$result = $query_subcat_By_id->get_result();

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
	$all_products = json_encode($data);

	
	$result->close();
    $conn->next_result();

	$sql = "SELECT * FROM subcategory WHERE id = $id;";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$subcat_title = $row['title'];

}
?>

<!DOCTYPE html>
<html>

<head>
	<?php include("templates/head.html");?>

	<script>
		var top_products = <?php echo $top_products; ?>;
		var all_products = <?php echo $all_products; ?>;

		$(document).ready(function () {

			$("#top_sub").empty();
			$("#top_sub").html('<div class="kic "><h3>Popular Products</h3></div>');

			var prod_view_factory =  new Product_View();
			
			$.each(top_products, function (i, item) {
				prod_view_factory.setproduct(item);
				$("#top_sub").append(prod_view_factory.create_top());
			});

			$("#all_sub").empty();
			$("#prod_modals").empty();
			$.each(all_products, function (i, item) {
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
			<h3><?php echo $subcat_title; ?></h3>
			<h4>
				<a href="index.php">Home</a>
				<label>/</label>Subcategory</h4>
			<div class="clearfix"> </div>
		</div>
	</div>
	
	<?php include("templates/carousel.html");?>

	<!--content-->
	<div class="kic-top ">
		<div class="container " id="top_sub">

		</div>
	</div>

	<!--content-->
	<div style="margin:3em 0;">
		<div class="container">
			<div class="spec ">
				<h3>All Products</h3>
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

	<div id="prod_modals"><div>
	<!--footer-->
	<?php include("templates/footer.html");?>
	<!-- //footer-->

</body>

</html>