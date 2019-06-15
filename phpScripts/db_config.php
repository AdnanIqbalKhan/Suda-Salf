<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sudasalf";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query_like = $conn->prepare("call get_like_products(?)");
$query_like_suggest = $conn->prepare("call get_like_products_suggest(?)");
$query_ById = $conn->prepare("call get_product_ById(?)");
$query_ByName = $conn->prepare("call get_like_products(?)");


$query_UpdateUser = $conn->prepare("call update_user(?, ?, ?)");
$query_DeleteUser = $conn->prepare("call delete_user(?)");
?>