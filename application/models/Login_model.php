<?php

    class Login_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        public function validate_user($username, $password)
        {
            $this->db->where('username', $username);
            $query = $this->db->get('user');

            if ($query->num_rows() > 0) {
                $user = $query->row_array();
                if ($user['password'] != $password) {
                    return 'Password is incorrect';
                } else {
                    return $user;
                }
            } else {
                return 'Username is incorrect';
            }
        }

        public function login($username, $password)
        {
            $errmsg_arr = array();
            $errflag = false;

            if ($username == '') {
                $errmsg_arr[] = 'Username missing';
                $errflag = true;
            }
            if ($password == '') {
                $errmsg_arr[] = 'Password missing';
                $errflag = true;
            }

            if ($errflag) {
                return $errmsg_arr;
            }

            $user = $this->validate_user($username, $password);

            if (is_array($user)) {
                $this->session->set_userdata('SESS_MEMBER_ID', $user['id']);
                $this->session->set_userdata('SESS_FIRST_NAME', $user['name']);
                $this->session->set_userdata('SESS_MEMBER_POSITION', $user['position']);
                return true;
            } else {
                return $user;
            }
        }
    }