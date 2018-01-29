<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 *
	 * method for registering users
	 */
	public function register()
	{
		$data['title'] = 'Register';

		//input validation
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_email_exists'); //you can use is_unique[users.email] in replace of callback_check_email_exists
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('pages/register', $data);
			$this->load->view('templates/footer');
		} else {
			// Encrypt Password
			$enc_password = md5($this->input->post('password'));

			$this->user_model->register($enc_password);

			// Set message
			$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

			redirect('login');
		}
	}

	/**
	 *
	 * method for checking if email exist in database
	 */
	public function check_email_exists($email) {
		$this->form_validation->set_message('check_email_exists', 'That email has been taken. Please choose a different one');
		if($this->user_model->check_email_exists($email)){
			return true;
		} else{
			return false;
		}
	}

	/**
	 *
	 * method for login
	 */
	public function login()
	{
		$data['title'] = 'Login';

		//input validation
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); //you can use is_unique[users.email] in replace of callback_check_email_exists
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('pages/login', $data);
			$this->load->view('templates/footer');
		} else {
			// Get email
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			// Login user
			$user_id = $this->user_model->login($email, $password);

			if($user_id) {
				// Create session
				$user_data = array(
					'user_id' => $user_id,
					'email' => $email,
					'name' => $name,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);

				redirect('account/dashboard');
			} else {
				// Set message
				$this->session->set_flashdata('loginfailed', 'Login details is invalid');

				redirect('login');
			}
		}
	}

	//Logout
	public function logout() {
		// unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('email');

		// Set message
		$this->session->set_flashdata('user_logout', 'You are logged out');

		redirect('login');
	}
}
