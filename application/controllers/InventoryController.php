<?php
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

    class InventoryController extends CI_Controller {
        
        public function __construct() {
        parent::__construct();
        $this->load->model('Inventory_model');
    }

        public function index() {
            $products = $this->Inventory_model->viewAllProducts();
            $numOfTotalProducts = $this->Inventory_model->getNumOfTotalProducts();
            $numOfLowProducts = $this->Inventory_model->getNumOfLowProducts();
            $lowProducts = $this->Inventory_model->viewLowProducts();
            $numOfExpiredProducts = $this->Inventory_model->getNumOfExpiredProducts();
            $expiredProducts = $this->Inventory_model->viewExpiredProducts();
        
            $this->load->view('pages/products/index', array('products' => $products, 'numOfTotalProducts' => $numOfTotalProducts, 'numOfLowProducts' => $numOfLowProducts, 'lowProducts' => $lowProducts, 'numOfExpiredProducts' => $numOfExpiredProducts, 'expiredProducts' => $expiredProducts));
    }
   
        
        public function importData() {

            // Check if a file was uploaded
            if (isset($_FILES['files']['name'][0]) && $_FILES['files']['name'][0] != '') {
                $file = $_FILES['files']['tmp_name'][0];

                // Load the spreadsheet
                try {
                    $spreadsheet = IOFactory::load($file);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                    // Loop through the rows and insert data into the database
                    foreach ($sheetData as $row) {
                        // Assuming the first row contains headers
                        if ($row['A'] != 'Brand Name') { // Skip header row
                            $data = [
                                'brand_name' => $row['A'],
                                'generic_name' => $row['B'],
                                'category' => $row['C'],
                                'original_price' => $row['D'],
                                'selling_price' => $row['E'],
                                'profit' => $row['F'],
                                'quantity' => $row['G'],
                                'qty_sold' => $row['H'],
                                'expiry_date' => $row['I'],
                                'date_arrival' => $row['J'],
                                'prescription_required' => $row['K'],
                                'product_image' => $row['L']
                            ];
                            $this->Inventory_model->importProductData($data);
                        }
                    }

                    // Return success response with file name and URL
                    echo json_encode([
                        'files' => [
                            [
                                'name' => $_FILES['files']['name'][0],
                                'url' => base_url('uploads/products/' . $_FILES['files']['name'][0]) 
                            ]
                        ]
                    ]);
                } catch (Exception $e) {
                    // Handle any errors that occur during file processing
                    echo json_encode(['files' => [['error' => 'Error processing file: ' . $e->getMessage()]]]);
                }
            } else {
                echo json_encode(['files' => [['error' => 'No file uploaded.']]]);
            }
        }

        
        
        public function addProduct() {
            $this->load->model('Inventory_model');
            $data = $this->input->post();
            $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
            $this->form_validation->set_rules('generic_name', 'Generic Name', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
            $this->form_validation->set_rules('selling_price', 'Selling Price', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required|integer');
            $this->form_validation->set_rules('original_price', 'Original Price', 'required');
            $this->form_validation->set_rules('profit', 'Profit', 'required');
            $this->form_validation->set_rules('arrival_date', 'Arrival Date', 'required');
            $this->form_validation->set_rules('qty_sold', 'Quantity Sold', 'required|integer');
            $this->form_validation->set_rules('prescription_required', 'Prescription', 'required');

            if ($this->form_validation->run() == FALSE) {
                $error = array(
                    "success" => false,
                    "message" => "All fields should not be empty."
                );
                echo json_encode($error);
            } else {
                $config['upload_path'] = FCPATH . 'uploads/products'; 
                $config['allowed_types'] = 'webp|jpg|jpeg|png|gif';
                $config['max_size'] = 40960; 
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('product_image')) {
                    $error = array("success" => false, "message" => $this->upload->display_errors());
                    echo json_encode($error);
                    return;
                } else {
                    $upload_data = $this->upload->data();
                    $data['product_image'] = $upload_data['file_name'];
                }
                
                $data = array(
                    'brand_name' => $this->security->xss_clean($this->input->post('brand_name')),
                    'generic_name' => $this->security->xss_clean($this->input->post('generic_name')),
                    'category' => $this->security->xss_clean($this->input->post('category')),
                    'expiry_date' => $this->security->xss_clean($this->input->post('expiry_date')),
                    'selling_price' => $this->input->post('selling_price'),
                    'quantity' => $this->input->post('quantity'),
                    'original_price' => $this->input->post('original_price'),
                    'date_arrival' => $this->security->xss_clean($this->input->post('arrival_date')),
                    'prescription_required' => $this->input->post('prescription_required'),
                    'qty_sold' => $this->input->post('qty_sold'),
                    'profit' => $this->input->post('profit'),
                    'product_image' => $data['product_image']
                );
 
                $result = $this->Inventory_model->insertProduct($data);
                echo json_encode($result);
            }
        }
        
        public function removeProduct() {
            $this->load->model('Inventory_model');
            $id = $this->input->post('id');
            $result = $this->Inventory_model->deleteProduct($id);
            
        }
        
        public function updateProduct() {
            $this->load->model('Inventory_model');

            // Set validation rules
            $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
            $this->form_validation->set_rules('generic_name', 'Generic Name', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('expiry_date', 'Expiry Date', 'required');
            $this->form_validation->set_rules('selling_price', 'Selling Price', 'required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'required|integer');
            $this->form_validation->set_rules('original_price', 'Original Price', 'required');
            $this->form_validation->set_rules('arrival_date', 'Arrival Date', 'required');
            $this->form_validation->set_rules('prescription_required', 'Prescription', 'required');

            if ($this->form_validation->run() == FALSE) {
                // Validation failed
                $error = array(
                    "success" => false,
                    "message" => "All fields should not be empty."
                );
                echo json_encode($error);
            } else {
                // Validation passed
                $productId = $this->input->post('product_id');
                $existingImage = $this->input->post('existing_image');

                // Prepare data for update
                $data = array(
                    'brand_name' => $this->security->xss_clean($this->input->post('brand_name')),
                    'generic_name' => $this->security->xss_clean($this->input->post('generic_name')),
                    'category' => $this->security->xss_clean($this->input->post('category')),
                    'expiry_date' => $this->security->xss_clean($this->input->post('expiry_date')),
                    'selling_price' => $this->input->post('selling_price'),
                    'quantity' => $this->input->post('quantity'),
                    'original_price' => $this->input->post('original_price'),
                    'date_arrival' => $this->security->xss_clean($this->input->post('arrival_date')),
                    'qty_sold' => $this->input->post('remaining_stocks'),
                    'prescription_required' => $this->input->post('prescription_required'),
                    'product_id' => $productId
                );

                // Handle image upload
                if (!empty($_FILES['product_image']['name'])) {
                    // Load upload library
                    $config['upload_path'] = FCPATH . 'uploads/products'; 
                    $config['allowed_types'] = 'webp|jpg|jpeg|png|gif';
                    $config['max_size'] = 40960; 
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('product_image')) {
                        $uploadData = $this->upload->data();
                        $data['product_image'] = $uploadData['file_name']; // Set the new image path
                    } else {
                        // Handle upload error
                        $data['product_image'] = $existingImage; // Use existing image if upload fails
                    }
                } else {
                    // No new image uploaded, use the existing image
                    $data['product_image'] = $existingImage;
                }

                // Update the product in the database
                $result = $this->Inventory_model->update_product($data);
                echo json_encode($result);
            }
        }
    }