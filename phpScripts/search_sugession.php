<?php
include_once('db_config.php');
if(isset($_GET['term'])){
    $term = $_GET['term'];
    
	$query_like_suggest->bind_param("s", $term );
	$query_like_suggest->execute();
	$result = $query_like_suggest->get_result();
    $num_of_rows = $result->num_rows;

    $data = array();

	while ($row = $result->fetch_assoc()) {
        array_push($data,$row["name"]);
    }
    $JSONdata = json_encode($data);
    echo $JSONdata;
}