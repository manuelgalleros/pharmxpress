<?php

    class Product_model extends CI_Model {
        
        public function viewProducts() {
            $this->db->select('*, (selling_price * quantity) as total');
            $this->db->from('products');
            $this->db->where('expiry_date >', date('Y-m-d')); 
            $this->db->order_by('product_id', 'DESC');
            $query = $this->db->get();

            $result = $query->result_array();

            return $result;
        }
        
        public function searchProduct($productName) {
            $query = "SELECT *, selling_price * quantity as total FROM products WHERE (brand_name LIKE '%$productName%' OR generic_name LIKE '%$productName%' OR category LIKE '%$productName%') AND expiry_date > CURDATE() ORDER BY product_id DESC";
            $result = $this->db->query($query);
            $products = array();
            foreach ($result->result_array() as $row) {
                $total = $row['total'];
                $availableqty = $row['qty_sold'];
                $badgeClass = $row['qty_sold'] < 10 ? 'badge-danger' : 'badge-success';
                $prescriptionBadgeClass = $row['prescription_required'] == "Required" ? 'badge-warning' : 'badge-dark';
                $products[] = array(
                    'product_image' => $row['product_image'],
                    'brand_name' => $row['brand_name'],
                    'generic_name' => $row['generic_name'],
                    'category' => $row['category'],
                    'selling_price' => $row['selling_price'],
                    'prescription_required' => $row['prescription_required'],
                    'qty_sold' => $row['qty_sold'],
                    'badgeClass' => $badgeClass,
                    'prescriptionBadgeClass' => $prescriptionBadgeClass,
                    'total' => $total,
                    'product_id' => $row['product_id']
                );
            }
            return $products;
        }

        public function getLowStockCount() {
                $this->db->where('quantity <=', 10);
                $this->db->from('products'); 
                return $this->db->count_all_results();
            }
        
        public function count_expired_products() {
            $this->db->where('expiry_date <', date('Y-m-d'));
            return $this->db->count_all_results('products'); 
        }
        
        public function count_all_products() {
            return $this->db->count_all('products'); 
        }
        
        public function count_prescription_required() {
            $this->db->where('prescription_required', 'Required'); 
            return $this->db->count_all_results('products'); 
        }
    }

