<?php
include_once('../../phpScripts/db_config.php');

$sql = "SELECT * FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $item = array(
            "email" => $row["email"],
            "name" => $row["name"],
            "time" => $row["timestamp"],
            "message" => $row["message"]
        );

        array_push($data,$item);
        
    }
    $JSONdata = json_encode($data);
    echo $JSONdata;

} else {
    echo "0 results";
}

?>