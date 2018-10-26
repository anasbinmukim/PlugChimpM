<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends RM_Controller {
		public function __construct()
		{
						parent::__construct();
						$this->load->helper('url_helper');
						$this->load->helper('url');
		}
		public function view($page = 'home')
		{
						if ( ! $this->session->userdata('logged_in') ) {
							redirect('/login/');
						}

		        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		        {
		                // Whoops, we don't have a page for that!
		                show_404();
		        }

		        $this->data['title'] = ucfirst($page); // Capitalize the first letter

		        $this->load->view('templates/header', $this->data);
						$this->load->view('templates/sidebar', $this->data);
		        $this->load->view('pages/'.$page, $this->data);
		        $this->load->view('templates/footer', $this->data);
		}
}
