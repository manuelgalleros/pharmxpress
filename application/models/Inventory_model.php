<?php

    class Inventory_model extends CI_Model {
        
        public function viewAllProducts() {
            $query = $this->db->query('SELECT *, selling_price * quantity as total FROM products ORDER BY product_id DESC');

            $result = $query->result_array();

            return $result;
        }
         
        public function viewLowProducts() {
            $query = $this->db->query('SELECT * FROM products where qty_sold <= 10 ORDER BY product_id DESC');
            
            $lowProducts = $query->result_array();
            
            return $lowProducts;
        }
        
        public function viewExpiredProducts() {
            $query = $this->db->query('SELECT *, selling_price * quantity as total FROM products WHERE expiry_date < CURDATE();');
            
            $expiredProducts = $query->result_array();
            
            return $expiredProducts;           
        }
        
        public function getNumOfTotalProducts() {
            $query = $this->db->query('SELECT * FROM products ORDER BY qty_sold DESC');

            $numOfTotalProducts = $query->num_rows();

            return $numOfTotalProducts;
        }
        

        public function getNumOfLowProducts() {
            $query = $this->db->query("SELECT *, selling_price * quantity as total FROM products WHERE qty_sold <= 10 ORDER BY product_id DESC");
            
            $numOfLowProducts = $query->num_rows();
            
            return $numOfLowProducts;
        }
        
        public function getNumOfExpiredProducts() {
            $query = $this->db->query('SELECT *, selling_price * quantity as total FROM products WHERE expiry_date < CURDATE();');
            
            $numOfExpiredProducts = $query->num_rows();
            
            return $numOfExpiredProducts;  
        }
        
        public function importProductData($data) {
            return $this->db->insert('products', $data);
        }
        
        public function insertProduct($data) {
            $this->db->trans_start();

            $this->db->insert('products', array(
                'brand_name' => $this->security->xss_clean($data['brand_name']),
                'generic_name' => $this->security->xss_clean($data['generic_name']),
                'category' => $this->security->xss_clean($data['category']),
                'expiry_date' => $this->security->xss_clean($data['expiry_date']),
                'selling_price' => floatval($data['selling_price']),
                'quantity' => intval($data['quantity']),
                'original_price' =>  floatval($data['original_price']),
                'profit' => floatval($data['profit']),
                'date_arrival' => $this->security->xss_clean($data['date_arrival']), 
                'qty_sold' => intval($data['qty_sold']),
                'prescription_required' => $this->security->xss_clean($data['prescription_required']),
                'product_image' => $this->security->xss_clean($data['product_image']),
            ));
            $product_id = $this->db->insert_id();
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $error = array(
                    "success" => false,
                    "message" => "Error adding product"
                );
                return $error;
            } else {
                try {
                    $query = "SELECT *, selling_price * quantity as total FROM products ORDER BY product_id DESC";
                    $result = $this->db->query($query, $product_id);
                    $row = $result->row_array();

                    $total = $row['total'];
                    $badge_class = $row['qty_sold'] < 10 ? 'badge-danger' : 'badge-success';

                    $response = array(
                        "success" => true,
                        "data" => array(
                            "product_image" => $row['product_image'],
                            "brand_name" => $row['brand_name'],
                            "generic_name" => $row['generic_name'],
                            "category" => $row['category'],
                            "expiry_date" => $row['expiry_date'],
                            "selling_price" => $row['selling_price'],
                            "quantity" => $row['quantity'],
                            "original_price" => $row['original_price'],
                            "profit" => $row['profit'],
                            "date_arrival" => $row['date_arrival'],
                            "prescription_required" => $row['prescription_required'],
                            "qty_sold" => $row['qty_sold'],
                            "badge_class" => $badge_class,
                            "total" => $total,
                            "product_id" => $product_id
                        )
                    );
                    return $response;
                } catch (Exception $e) {
                    $error = array(
                        "success" => false,
                        "message" => "Error retrieving product data"
                    );
                    return $error;
                }
            }
        }
    
        public function deleteProduct($id) {
            $this->db->where('product_id', $id);
            $this->db->delete('products');

            if ($this->db->affected_rows() > 0) {
                $query = "SELECT *, selling_price * quantity as total FROM products ORDER BY product_id DESC";
                $result = $this->db->query($query);
                if ($result->num_rows() > 0) {
                    $row = $result->row_array();
                    $data = array('qty_sold' => $row["qty_sold"]);
                    return json_encode($data);
                } else {
                    return "Error: No products found";
                }
            } else {
                return "Error: Unable to delete product";
            }
        }
        
        public function update_product($data) {
            // Validate and sanitize user input
            $brand_name = $this->security->xss_clean($data['brand_name']);
            $generic_name = $this->security->xss_clean($data['generic_name']);
            $category = $this->security->xss_clean($data['category']);
            $expiry_date = $this->security->xss_clean($data['expiry_date']);
            $selling_price = floatval($data['selling_price']);
            $quantity = intval($data['quantity']);
            $original_price = floatval($data['original_price']);
            $arrival_date = $this->security->xss_clean($data['date_arrival']);
            $qty_sold = intval($data['qty_sold']);
            $product_id = intval($data['product_id']);

            // Prepare the update data
            $update_data = array(
                'brand_name' => $brand_name,
                'generic_name' => $generic_name,
                'category' => $category,
                'date_arrival' => $arrival_date,
                'expiry_date' => $expiry_date,
                'selling_price' => $selling_price,
                'original_price' => $original_price,
                'quantity' => $quantity,
                'qty_sold' => $qty_sold
            );

            // Check if the product image is set in the data
            if (isset($data['product_image']) && !empty($data['product_image'])) {
                $update_data['product_image'] = $this->security->xss_clean($data['product_image']);
            }

            // Update the product in the database
            $this->db->where('product_id', $product_id);
            $this->db->update('products', $update_data);

            if ($this->db->affected_rows() > 0) {
                $query = "SELECT *, selling_price * quantity as total FROM products WHERE product_id = ? ORDER BY product_id DESC";
                $result = $this->db->query($query, array($product_id));
                $row = $result->row_array();
                $total = $row['total'];

                // Return the new product data
                $badge_class = $qty_sold < 10 ? 'badge-danger' : 'badge-success';
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
                        "arrival_date" => $arrival_date,
                        "qty_sold" => $qty_sold,
                        "badge_class" => $badge_class,
                        "total" => $total,
                        "product_id" => $product_id,
                        "product_image" => isset($update_data['product_image']) ? $update_data['product_image'] : null 
                    )
                );
            } else {
                $response = array(
                    "success" => false,
                    "message" => "Error updating product"
                );
            }

            // Return the response
            return $response; // Ensure you return the response
        }

    }