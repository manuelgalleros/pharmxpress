<?php
include('../config/connection.php');

// Get the id from the POST request
$id = $_POST['id'];

// Create a query to delete the product
$deleteQuery = "DELETE FROM products WHERE product_id = '$id'";

// Execute the query
$result = mysqli_query($conn, $deleteQuery);

// Check if the query was executed successfully
if ($result) {
    echo "Product deleted successfully";
} else {
    echo "Error: ". mysqli_error($conn);
}




$query2 = "SELECT *, selling_price * quantity as total FROM products ORDER BY product_id DESC";
$result2 = mysqli_query($conn, $query2);
$row = mysqli_fetch_assoc($result2);
$data = array('qty_sold' => $row["qty_sold"]);
echo json_encode($data);


mysqli_close($conn);
?>