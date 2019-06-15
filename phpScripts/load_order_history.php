<?php
include_once('../phpScripts/db_config.php');
session_start();
$email = $_SESSION["user"];

$sql = "SELECT * FROM orders WHERE Customer_email = $email";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $data = array();

    while ($row = $result->fetch_assoc()) {
        $item = array(
            "Orderid" => $row["Orderid"],
            "Order_Amount" => $row["Order_Amount"],
            "Order_timestamp" => $row["Order_timestamp"],
            "status" => $row["status"],
            "ShopKeeper_email" => $row["ShopKeeper_email"],
            "Customer_email" => $row["Customer_email"]
        );

        array_push($data,$item);
        
    }
    $JSONdata = json_encode($data);
    echo $JSONdata;

} else {
    echo "0 results";
}

?>