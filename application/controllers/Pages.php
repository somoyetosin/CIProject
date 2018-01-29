<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	 *
	 * Controller for loading all static pages
	 */
	public function index($page = 'index')
	{
		if (!file_exists(APPPATH. 'views/pages/'.$page.'.php')) {
			//show error page if page doesn't exist
			show_404();
		}

		$data['title'] = ucfirst($page); //ucfirst() for making first letter capital letter

		$this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
	}
}
