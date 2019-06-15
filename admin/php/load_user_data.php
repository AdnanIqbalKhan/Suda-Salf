<?php
include_once('../../phpScripts/db_config.php');

$sql = "call get_all_user()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $item = array(
            "email" => $row["email"],
            "name" => $row["name"],
            "type" => $row["type"],
            "status" => $row["status"],
            "userimage" => $row["image"],
            "action" => ''
        );

        array_push($data,$item);
        
    }
    $JSONdata = json_encode($data);
    echo $JSONdata;

} else {
    echo "0 results";
}

?>