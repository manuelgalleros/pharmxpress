<?php
include('../config/connection.php');

session_start();

// Check if transaction array is set
if (isset($_POST['transaction'])) {
  $transaction = $_POST['transaction'];

  // Generate invoice number and transaction ID
  $invoiceNumber = generateInvoiceNumber();
  $transactionId = generateTransactionId();

  // Loop through transaction array and insert into orders table
  foreach ($transaction as $product) {
    $productId = $product['productId'];
    $quantity = $product['quantity'];
    $productName = $product['productName'];
    $productPrice = $product['productPrice'];

    $query = "INSERT INTO orders (product_id, quantity, product_name, product_price, invoice_number, transaction_id) VALUES ('$productId', '$quantity', '$productName', '$productPrice', '$invoiceNumber', '$transactionId')";
    $result = mysqli_query($conn, $query);

    if ($result) {
      // Return HTML for cart table
      echo '<tr>
        <td class="align-middle">' . $productName . '</td>

        
        <td class="align-middle">
          <div class="custom-number" style="width: 4rem;">
            <input type="number" class="form-control" name="qty" min="1" step="1" value="' . $quantity . '" placeholder="Quantity">
            </div>
        </td>
                        
                        
        <td class="align-middle">₱' . $productPrice . '</td>
        <td class="align-middle">
          <a href="#" class="btn btn-sm btn-icon" style="background-color: #D21B1B"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a>
        </td>
      </tr>';
    } else {
      echo 'Error: ' . mysqli_error($conn);
    }
  }
}

function generateInvoiceNumber() {
  $invoiceNumber = rand(100000, 999999);
  return $invoiceNumber;
}

function generateTransactionId() {
  $prefix = 'PHARM-X-';
  $length = 6;
  $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $key = '';
  for ($i = 0; $i < $length; $i++) {
    $key .= $chars[rand(0, strlen($chars) - 1)];
  }
  return $prefix . $key;
}
?>