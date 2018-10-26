<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends RM_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['page_title'] = 'Home';
		$this->data['menu'] = 'home';
		$this->data['submenu'] = '';

		$this->load->view('templates/header', $this->data);
		$this->load->view('templates/sidebar', $this->data);
		//$this->load->view('pages/'.$page, $this->data);
		$this->load->view('templates/footer', $this->data);

	}
}
