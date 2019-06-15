<?php
include_once('phpScripts/login_header.php');
?>
<?php
include_once('phpScripts/db_config.php');

$query_cat_top = $conn->prepare("call get_cat_top(?, ?);");
$query_cat_By_id = $conn->prepare("call get_cat_by_id(?);");

$has_Data = false;
if(isset($_GET["id"])){

	$id = (int)$_GET["id"];
	$limit = 3;
	$query_cat_top->bind_param("ii", $id, $limit);
	$query_cat_top->execute();
	$result = $query_cat_top->get_result();
    $data = array();
	while ($row = $result->fetch_assoc()) {
        
        $item = array(
            "id" => $row["id"],
            "title" => $row["title"],
            "description" => $row["description"],
            "image" => $row["image"]
        );

        array_push($data,$item);
        
    }
	$top_sub_cat = json_encode($data);

	$result->close();
    $conn->next_result();

	$query_cat_By_id->bind_param("i", $id);
	$query_cat_By_id->execute();
	$result = $query_cat_By_id->get_result();

    $data = array();
	while ($row = $result->fetch_assoc()) {
        
        $item = array(
			"id" => $row["id"],
            "title" => $row["title"],
            "description" => $row["description"],
            "image" => $row["image"]
        );

        array_push($data,$item);
        
    }
	$all_sub_cat = json_encode($data);

	
	$result->close();
    $conn->next_result();

	$sql = "SELECT * FROM sudasalf.category WHERE id = $id;";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$cat_title = $row['title'];

}
?>

<!DOCTYPE html>
<html>

<head>
	<?php include("templates/head.html");?>

	<script>

		var top_sub_cat = <?php echo $top_sub_cat; ?>;
		var all_sub_cat = <?php echo $all_sub_cat; ?>;

		$(document).ready(function () {

			$("#top_sub").empty();
			$("#top_sub").html('<div class="kic "><h3>Popular Subcategories</h3></div>');

			var sub_view_factory =  new SubCategory_View();
			
			$.each(top_sub_cat, function (i, item) {
				sub_view_factory.setsubcat(item);
				$("#top_sub").append(sub_view_factory.create_top());
			});

			$("#all_sub").empty();
			$.each(all_sub_cat, function (i, item) {
				sub_view_factory.setsubcat(item);
				$("#all_sub").append(sub_view_factory.create_all());
			});
			$("#all_sub").append('<div class="clearfix"></div>');
		});
	</script>
</head>

<body>
	<?php include("templates/header.html");?>
	<!--banner-->
	<div class="banner-top">
		<div class="container">
			<h3><?php echo $cat_title; ?></h3>
			<h4>
				<a href="index.php">Home</a>
				<label>/</label>Category</h4>
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
				<h3>All Subcategories</h3>
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

	<!--footer-->
	<?php include("templates/footer.html");?>
	<!-- //footer-->

</body>

</html>