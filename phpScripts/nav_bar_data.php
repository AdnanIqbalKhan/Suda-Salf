<?php
include_once('./db_config.php');

$sql = "SELECT * FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $data[$row["title"]] = array($row["id"],$row["image"]);     
    }
	$result->close();
    $conn->next_result();

    foreach ($data as $key => $value){
        $id = $value[0];
        $sql = "SELECT * FROM subcategory WHERE category= $id ";
        $result = $conn->query($sql);
        $data1 = array();

        while ($row = $result->fetch_assoc()) {
            $data1[$row["title"]] = array($row["id"]);     
        }

        $result->close();
        $conn->next_result();

        foreach ($data1 as $key1 => $value1){
            $id1 = $value1[0];            
            $sql = "SELECT * FROM products WHERE subcategory= $id1 ";
            $result = $conn->query($sql);
            $data2 = array();
    
            while ($row = $result->fetch_assoc()) {
                $data2[$row["name"]] = array($row["id"]);     
            }
    
            $result->close();
            $conn->next_result();

            array_push($data1[$key1],$data2);
        }

        array_push($data[$key],$data1);
    }
    
    $JSONdata = json_encode($data);
    echo $JSONdata;

} else {
    echo "0 results";
}
?>