<?php
	class Inventory_model extends CI_Model{
		/**
		* Getting all Inventory
		*/
		public function get_inventory($id = FALSE){
			if($id === FALSE){
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('inventory');
			return $query->result_array();
			}

			$query = $this->db->get_where('inventory', array('id' => $id));
			return $query->row_array();
		}

		/**
		* Creating Inventory
		*/
		public function create_inventory(){
			// Inventory data array
			$data = array(
				'name' => $this->input->post('name'),
				'number' => $this->input->post('number'),
				'user_id' => $this->session->userdata('user_id')
			);

			// Insert user
			return $this->db->insert('inventory', $data);
		}

		/**
		* Deleting an order
		*/
		public function delete_inventory($id){
			$this->db->where('id', $id);
			$this->db->delete('inventory');
			return true;
		}

		/**
		* updating an order
		*/
		public function update_inventory(){
			// Inventory data array
			$data = array(
				'name' => $this->input->post('name'),
				'number' => $this->input->post('number')
			);

			// Updating user
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('inventory', $data);
		}
	}