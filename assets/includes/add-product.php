<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Add a new product</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" id="addProductForm">
          <tr class="row-details bg-light">
            <td colspan="12">
              <div class="row">
                <div class="col-md-6">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Brand Name:</td>
                        <td>
                          <input name="brand_name" type="text" class="form-control" placeholder="Enter the Brand Name" required />
                        </td>
                      </tr>
                      <tr>
                        <td>Generic Name:</td>
                        <td>
                          <input name="generic_name" type="text" class="form-control" placeholder="Enter the Generic Name" required />
                        </td>
                      </tr>
                      <tr>
                        <td>Category:</td>
                        <td>
                          <input name="category" type="text" class="form-control" placeholder="Enter the product category" />
                        </td>
                      </tr>
                      <tr>
                        <td>Arrival Date:</td>
                        <td>
                          <input type="date" name="arrival_date" class="form-control" placeholder="Enter when is the product arrived" required />
                        </td>
                      </tr>
                      <tr>
                        <td>Expiration Date:</td>
                        <td>
                          <input type="date" name="expiry_date" class="form-control" placeholder="Enter when will the product expires" required />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Product Quantity:</td>
                        <td>
                          <input type="number" class="form-control" placeholder="Enter the product quantity" id="qty" name="quantity" onkeyup="sum();" />
                        </td>
                      </tr>
                      <tr>
                        <td>Selling Price:</td>
                        <td>
                          <input name="selling_price" id="sellingPrice" class="form-control" placeholder="Enter the selling price" onkeyup="sum();" />
                        </td>
                      </tr>
                      <tr>
                        <td>Original Price:</td>
                        <td>
                          <input name="original_price" id="originalPrice" class="form-control" placeholder="Enter the original price" onkeyup="sum();" />
                        </td>
                      </tr>
                      <tr>
                        <td>Profit:</td>
                        <td>
                          <input type="number" class="form-control" name="profit" id="profit" readonly />
                        </td>
                        <input type="hidden" class="form-control" name="qty_sold" id="qty_sold" readonly />
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </td>
          </tr>
          <div class="modal-footer" style="margin-top: -0.5rem;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="toAddProduct">Add Product</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {
    $("#toAddProduct").click(function(event) {
      event.preventDefault(); // Prevent the default form submission
      var formData = $("#addProductForm").serialize();
      var formFields = $("#addProductForm").find("input, select, textarea"); // Get all form fields
        
      // Check if any form fields are empty
      var isEmpty = false;
      formFields.each(function() {
        if ($(this).val() === "") {
          isEmpty = true;
          return false; // Break the loop
        }
      });
      if (isEmpty) {
        tata.error("Warning", "Invalid input. Please try again.", {
          closeBtn: !1,
          duration: 5e3
        });
        return;
      }
      $.ajax({
        type: "POST",
        url: "../../index.php/InventoryController/addProduct",
        data: formData,
        dataType: "json", // Specify the response data type as JSON
        success: function(response) {
          if (response.success) {
            $("#addProduct").modal("hide");
            tata.success("Success", "A new product has been added.", {
              closeBtn: !1,
              duration: 5e3
            });

              
            // Update the table with the new product information
            var newRow = `<tr class="${response.data.qty_sold < 10 ? 'bg-secondary' : ''} productrecord">
		<td class="align-middle col-checker">
			<div class="custom-control custom-control-nolabel custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="cid">
					<label class="custom-control-label" for="cid"></label>
				</div>
			</td>
			<td class="align-middle">
                  ${response.data.brand_name}
                </td>
			<td class="align-middle">
                  ${response.data.generic_name}
                </td>
			<td class="align-middle">
                  ${response.data.category}
                </td>
			<td class="align-middle">
                  ${response.data.arrival_date}
                </td>
			<td class="align-middle">
                  ${response.data.expiry_date}
                </td>
			<td class="align-middle">
                  ₱${response.data.selling_price}
                </td>
			<td class="align-middle">
                  ₱${response.data.original_price}
                </td>
			<td class="align-middle">
                  ${response.data.quantity}
                </td>
			<td class="align-middle">
				<span class="badge badge-subtle ${response.data.qty_sold < 10 ? 'badge-danger' : 'badge-success'}">
                    ${response.data.qty_sold} pieces
                  
				</span>
			</td>
			<td class="align-middle">
                    ₱${response.data.total}
                  
			</span>
		</td>
		<td class="align-middle text-right">
			<button class="btn btn-sm btn-icon btn-secondary" data-toggle="collapse" data-target="#pi${response.data.product_id}">
				<i class="fa fa-pencil-alt"></i>
				<span class="sr-only">Edit</span>
			</button>
			<button class="btn btn-sm btn-icon btn-secondary removeProduct" id="pi${response.data.product_id}">
				<i class="far fa-trash-alt"></i>
				<span class="sr-only">Remove</span>
			</button>
		</td>
	</tr>
	<tr class="row-details bg-light collapse lowquantity" id="pi${response.data.product_id}">
		<td colspan="12">
			<div class="row">
				<div class="col-md-6">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<td> Brand Name: </td>
								<td>
									<input class="form-control" placeholder="Enter the Brand Name">
									</td>
								</tr>
								<tr>
									<td> Generic Name: </td>
									<td>
										<input class="form-control" placeholder="Enter the Generic Name">
										</td>
									</tr>
									<tr>
										<td> Category: </td>
										<td>
											<input class="form-control" placeholder="Enter the product category">
											</td>
										</tr>
										<tr>
											<td> Arrival Date: </td>
											<td>
												<input class="form-control" placeholder="Enter when is the product arrived">
												</td>
											</tr>
											<tr>
												<td> Expiration Date: </td>
												<td>
													<input class="form-control" placeholder="Enter when will the product expires">
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col">
										<table class="table table-bordered">
											<tbody>
												<tr>
													<td> Selling Price: </td>
													<td>
														<input class="form-control" placeholder="Enter the selling price">
														</td>
													</tr>
													<tr>
														<td> Original Price: </td>
														<td>
															<input class="form-control" placeholder="Enter the original price">
															</td>
														</tr>
														<tr>
															<td> Product Quantity: </td>
															<td>
																<input class="form-control" placeholder="Enter the product category">
																</td>
															</tr>
															<tr>
																<td> Remaining Stocks: </td>
																<td>
																	<input class="form-control" placeholder="Enter when is the product arrived">
																	</td>
																</tr>
															</tbody>
														</table>
														<button class="btn btn-primary" type="button" style="float: right;">Save Changes</button>
													</div>
												</div>
											</td>
										</tr>`;
              
            // Prepend the newly added product to the table
            $("#productTable").prepend(newRow);
            
            // Clear the form after submission of the product details
            $('#addProductForm').get(0).reset();

          } else {
            tata.error("Warning", "An error occured "  + response.message, {
              closeBtn: !1,
              duration: 5e3
            });
          }
                     // Reload the table with the new product information
             location.reload();
        // If the product quantity is lesser than 10, then increment to the low quantity counter.
        if (response.data.qty_sold < 10) {
        $("#lowQty").text(parseInt($("#lowQty").text()) + 1);
        }
            
        // Increment the newly added product to the counter
         $("#totalProductsQty").text(parseInt($("#totalProductsQty").text()) + 1);        
        },
        error: function(xhr, status, error) {
          alert("An error occurred: " + error);
        }
      });
    });
  });

  function sum() {
    var sellPrice = document.getElementById('sellingPrice').value;
    var orgPrice = document.getElementById('originalPrice').value;
    var result = parseFloat(sellPrice) - parseFloat(orgPrice);
    if (!isNaN(result)) {
      document.getElementById('profit').value = result;
    }
    var txtFirstNumberValue = document.getElementById('qty').value;
    var result = parseInt(txtFirstNumberValue);
    if (!isNaN(result)) {
      document.getElementById('qty_sold').value = result;
    }
  }
</script>