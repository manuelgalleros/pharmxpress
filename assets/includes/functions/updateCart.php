<?php
include('../config/connection.php');

$productId = $_POST['productId'];
$quantity = $_POST['quantity'];
$productPrice = $_POST['productPrice'];

// Update quantity in orders table
$query = "UPDATE orders SET quantity = '$quantity' WHERE product_id = '$productId'";
$result = mysqli_query($conn, $query);
?>