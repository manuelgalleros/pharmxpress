<?php
class DashboardController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index() {
            $data['SESS_FIRST_NAME'] = $this->session->userdata('SESS_FIRST_NAME');
            $this->load->view('pages/dashboard', $data);
    }
    
    public function app_header() {
            $data['SESS_FIRST_NAME'] = $this->session->userdata('SESS_FIRST_NAME');
            $data['SESS_MEMBER_POSITION'] = $this->session->set_userdata('SESS_MEMBER_POSITION');
            $this->load->view('pages/app-header', $data);
    }
    
    public function getProfitData() {
        $expired_count = $this->Product_model->count_expired_products();
        $total_products = $this->Product_model->count_all_products();
        $prescription_required_count = $this->Product_model->count_prescription_required();
        $low_stock_count = $this->Product_model->getLowStockCount();
        
        echo json_encode([
            'expired_count' => $expired_count,
            'total_products' => $total_products,
            'prescription_required_count' => $prescription_required_count,
            'low_stock_count' => $low_stock_count
        ]);

    }
}

