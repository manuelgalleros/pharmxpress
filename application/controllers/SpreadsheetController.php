<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class InventoryController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User Model');
    }

    public function importData() {
        // Check if a file was uploaded
        if (isset($_FILES['files']['name'][0]) && $_FILES['files']['name'][0] != '') {
            $file = $_FILES['files']['tmp_name'][0];

            // Load the spreadsheet
            $spreadsheet = IOFactory::load($file);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // Loop through the rows and insert data into the database
            foreach ($sheetData as $row) {
                // Assuming the first row contains headers
                if ($row['A'] != 'name') { // Skip header row
                    $data = [
                        'name' => $row['A'],
                        'email' => $row['B'],
                        'phone' => $row['C']
                    ];
                    $this->User Model->insertUser ($data);
                }
            }

            // Return success response
            echo json_encode(['success' => true, 'message' => 'Data imported successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'No file uploaded.']);
        }
    }
}