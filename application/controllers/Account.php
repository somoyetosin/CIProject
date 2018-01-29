<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	/**
	 *
	 * Method for fetching all inventory
	 */
	public function dashboard()
	{
		//Access Control
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['inventory_item'] = $this->inventory_model->get_inventory();
		if(empty($data['inventory_item'])) {
			show_404();
		}

		$data['title'] = 'Dashboard';

		$this->load->view('account/templates/header');
		$this->load->view('account/dashboard', $data);
		$this->load->view('account/templates/footer');
	}

	/**
	 *
	 * Method for fetching a specific inventory
	 */
	public function view($id = NULL)
	{
		//Access Control
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['inventory_item'] = $this->inventory_model->get_inventory($id);
		if(empty($data['inventory_item'])) {
			show_404();
		}

		$data['name'] = $data['inventory_item']['name'];
		$data['title'] = 'View';

		$this->load->view('account/templates/header');
		$this->load->view('account/view', $data);
		$this->load->view('account/templates/footer');
	}

	/**
	*	Method for adding Inventory
	*/
	public function create() {
		$data['title'] = 'Create Order';

		// Form Validation
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('number', 'Number', 'trim|required');

		if($this->form_validation->run()=== FALSE) {
			$this->load->view('account/templates/header');
			$this->load->view('account/order', $data);
			$this->load->view('account/templates/footer');
		} else {
			$this->inventory_model->create_inventory();

			// Set message
			$this->session->set_flashdata('invent_insert', 'Order saved successfully');

			redirect('account/inventory');
		}		
	}

	/**
	 *
	 * Method for fetching all inventory
	 */
	public function inventory()
	{
		//Access Control
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['inventory_item'] = $this->inventory_model->get_inventory();
		if(empty($data['inventory_item'])) {
			show_404();
		}

		$data['title'] = 'Order Inventory';

		$this->load->view('account/templates/header');
		$this->load->view('account/inventory', $data);
		$this->load->view('account/templates/footer');
	}

	/**
	*	Method for deleting an order
	*/
	public function delete($id) {
		$this->inventory_model->delete_inventory($id);
		// Set message
		$this->session->set_flashdata('invent_delete', 'Order deleted successfully');

		redirect('account/inventory');
	}

	/**
	*	Method for fetching an order ebfore updating
	*/
	public function edit($id) {
		//Access Control
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$data['inventory_item'] = $this->inventory_model->get_inventory($id);
		if(empty($data['inventory_item'])) {
			show_404();
		}

		$data['name'] = $data['inventory_item']['name'];
		$data['title'] = 'Update Inventory';

		$this->load->view('account/templates/header');
		$this->load->view('account/edit', $data);
		$this->load->view('account/templates/footer');
	}

	/**
	*	Method for updating an order
	*/
	public function update() {
		//Access Control
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}

		$this->inventory_model->update_inventory();

		// Set message
		$this->session->set_flashdata('invent_update', 'Order updated successfully');

		redirect('account/inventory');
	}
}
