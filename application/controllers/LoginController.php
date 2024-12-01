<?php

    class LoginController extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Login_model');
        }

        public function index()
        {
            $this->load->view('pages/login/index');
        }

        public function check_login()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->Login_model->login($username, $password);

            if (is_array($result)) {
                $this->session->set_flashdata('error', $result);
                redirect('login');
            } elseif ($result == 'Password is incorrect' || $result == 'Username is incorrect') {
                $this->session->set_flashdata('error', $result);
                redirect('login');
            } else {
                redirect('pos');
            }
        }
    }