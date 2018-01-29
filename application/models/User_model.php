<?php

	class User_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}
		//register user
		public function register($enc_password) {
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => $enc_password
			);

			// Insert user
			return $this->db->insert('users', $data);
		}

		// login user
		public function login($email, $password) {
			//validate
			$this->db->where('email', $email);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1) {
				return $result->row(0)->id;
			} else {
				return false;
			}
		}

		//check email exist
		public function check_email_exists($email) {
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else{
				return false;
			}
		}
	}