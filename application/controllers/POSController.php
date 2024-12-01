<?php

    class POSController extends CI_Controller {

    public function index() {
        $this->load->model('Product_model');
        $products = $this->Product_model->viewProducts();
        $this->load->view('pages/pos/index', array('products' => $products));
    }
        
    public function search_product() {
        $this->load->model('Product_model');
        $productName = $this->input->post('productName');
        $products = $this->Product_model->searchProduct($productName);
        $output = '';
        if (empty($products)) {
        $output .= '
            <tr>
              <td colspan="9" class="text-center">
                No product found
              </td>
            </tr>
        ';
        } 
        else {
        foreach ($products as $product) {
            $output .= '
                <tr class="' . ($product['qty_sold'] < 10 ? 'bg-secondary' : '') . ' productrecord">
                  <td class="align-middle">
                  <a class="tile tile-img mr-1"><img class="img-fluid" src="' . base_url() . 'uploads/products/'. $product['product_image'] . '"></a>
                  </td>
                  <td class="align-middle">
                    ' . $product['brand_name'] . '
                  </td>
                  <td class="align-middle">
                    ' . $product['generic_name'] . '
                  </td>
                  <td class="align-middle">
                    ' . $product['category'] . '
                  </td>
                  <td class="align-middle">
                    ₱' . $product['selling_price'] . '
                  </td>
                  <td class="align-middle">
                    <span class="badge badge-subtle ' . $product['prescriptionBadgeClass'] . '">
                    ' . $product['prescription_required'] . '
                    </span>
                  </td>
                  <td class="align-middle">
                    <span class="badge badge-subtle ' . $product['badgeClass'] . '">
                      ' . $product['qty_sold'] . ' pieces
                    </span>
                  </td>
                    <td class="align-middle">
                        <div class="custom-number" style="width: 4rem">
                            <input type="number" class="form-control quantity-input" name="qty" min="1" step="1" value="1" placeholder="Quantity">
                            <div class="custom-number-controls">
                                <div class="custom-number-btn custom-number-up">+</div>
                                <div class="custom-number-btn custom-number-down">-</div>
                            </div>
                        </div>
                    </td>
                  <td class="align-middle">
                    <button class="btn btn-success" id="pi' . $product['product_id'] . '"><i class="fa-sharp fa-solid fa-cart-plus"> </i></button>
                  </td>
                </tr>
            ';
            }
        }
            echo $output;
        
    }
 }
