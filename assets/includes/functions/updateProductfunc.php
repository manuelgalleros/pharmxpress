<?php
include('../config/connection.php');

if (isset($_POST)) {
// Validate and sanitize user input
$brand_name = filter_var($_POST['brand_name'], FILTER_SANITIZE_STRING);
$generic_name = filter_var($_POST['generic_name'], FILTER_SANITIZE_STRING);
$category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
$expiry_date = filter_var($_POST['expiry_date'], FILTER_SANITIZE_STRING);
$selling_price = filter_var($_POST['selling_price'], FILTER_VALIDATE_FLOAT);
$quantity = filter_var($_POST['quantity'], FILTER_VALIDATE_INT);
$original_price = filter_var($_POST['original_price'], FILTER_VALIDATE_FLOAT);
$profit = filter_var($_POST['updProfit'], FILTER_VALIDATE_FLOAT);
$arrival_date = filter_var($_POST['arrival_date'], FILTER_SANITIZE_STRING);
$qty_sold = filter_var($_POST['remaining_stocks'], FILTER_VALIDATE_INT);
$product_id = filter_var($_POST['product_id'], FILTER_VALIDATE_INT);
    
  $query = "UPDATE products SET 
              brand_name =?, 
              generic_name =?, 
              category =?, 
              date_arrival =?, 
              expiry_date =?, 
              selling_price =?, 
              original_price =?, 
              quantity =?, 
              qty_sold =? 
            WHERE product_id =?";

  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssiiiiiii", $brand_name, $generic_name, $category, $arrival_date, $expiry_date, $selling_price, $original_price, $quantity, $qty_sold, $product_id);
// execute query
if (!mysqli_stmt_execute($stmt)) {
    $error = array(
        "success" => false,
        "message" => "Execute failed: ". mysqli_stmt_error($stmt)
    );
    echo json_encode($error);
    exit();
} else {
    $query = "SELECT *, selling_price * quantity as total FROM products ORDER BY product_id DESC";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];
    $product_id = $row['product_id'];
    
    // Return the new product data in JSON format
    $badge_class = $qty_sold < 10? 'badge-danger' : 'badge-success';
    $response = array(
        "success" => true,
        "data" => array(
            "brand_name" => $brand_name,
            "generic_name" => $generic_name,
            "category" => $category,
            "expiry_date" => $expiry_date,
            "selling_price" => $selling_price,
            "quantity" => $quantity,
            "original_price" => $original_price,
            "profit" => $profit,
            "arrival_date" => $arrival_date,
            "qty_sold" => $qty_sold,
            "badge_class" => $badge_class,
            "total" => $total,
            "product_id" => $product_id
        )
    );
    echo json_encode($response);
}

// close statement
mysqli_stmt_close($stmt);

// close connection
mysqli_close($conn);
}
?>
