<?php
include_once('db_config.php');

if(isset($_POST["search"])){
    $search = $_POST["search"];
    
	$query_like->bind_param("s", $search );
	$query_like->execute();
	$result = $query_like->get_result();
    $num_of_rows = $result->num_rows;

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
            "counter" => $row["counter"],
            "show" => true
        );

        array_push($data,$item);
        
    }
    $JSONdata = json_encode($data);
    echo $JSONdata;
}
?>