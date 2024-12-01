<?php
include('../config/connection.php');

$productName = $_POST['productName'];

$query = "SELECT *, selling_price * quantity as total FROM products WHERE brand_name LIKE '%$productName%' OR generic_name LIKE '%$productName%' OR category LIKE '%$productName%' ORDER BY product_id DESC";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $total = $row['total'];
  $availableqty = $row['qty_sold'];
  $badgeClass = $row['qty_sold'] < 10 ? 'badge-danger' : 'badge-success';
  echo '
    <tr class="' . ($availableqty < 10 ? 'bg-secondary' : '') . ' productrecord">
      <td class="align-middle">
        ' . $row['brand_name'] . '
      </td>
      <td class="align-middle">
        ' . $row['generic_name'] . '
      </td>
      <td class="align-middle">
        ' . $row['category'] . '
      </td>
      <td class="align-middle">
        ' . $row['expiry_date'] . '
      </td>
      <td class="align-middle">
        ₱' . $row['selling_price'] . '
      </td>
      <td class="align-middle">
        <span class="badge badge-subtle ' . $badgeClass . '">
          ' . $row['qty_sold'] . ' pieces
        </span>
      </td>
      <td class="align-middle">
        <div class="custom-number" style="width: 4rem">
          <input type="number" class="form-control" name="qty" min="1" step="1" value="1" placeholder="Quantity">
        </div>
      </td>
      <td class="align-middle">
        <button class="btn btn-success" id="pi' . $row['product_id'] . '"><i class="fa-sharp fa-solid fa-cart-plus"> </i></button>
      </td>
    </tr>
  ';
}
?>