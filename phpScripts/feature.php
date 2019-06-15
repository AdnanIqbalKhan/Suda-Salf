<?php
include_once('./db_config.php');

$sql = "call get_subcat_top_overall(4);";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $data = array();

    while ($row = $result->fetch_assoc()) {
        array_push($data,$row["title"]);   
    }
	$result->close();
    $conn->next_result();

    $final_data = array();
    foreach ($data as $value){
        // echo $value;
        $sql = "call get_top_products('" . $value . "',4)";
        $result = $conn->query($sql);
 
        $data1 = array();

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
    
            array_push($data1,$item);   
        }

        $result->close();
        $conn->next_result();
        $final_data[$value] = $data1;
    }
    


    $JSONdata = json_encode($final_data);
    echo $JSONdata;

} else {
    echo "0 results";
}
?>