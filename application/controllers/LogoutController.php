<?php

    class LogoutController extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }

        public function index()
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('password');


            $this->session->sess_destroy();

            redirect('login');
        }
    }