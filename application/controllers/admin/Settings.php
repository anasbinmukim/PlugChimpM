<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends RM_Controller {
		public function __construct()
		{
						parent::__construct();
		}
		public function index()
		{


						// START Sttings page
						if(isset($_POST['settings_general'])){
							$this->data["row"] = array(
								'site_title' => '',
								'tagline' => '',
								'email' => '',
							);

							$this->form_validation->set_message('required', '%s is required.');
							$this->form_validation->set_rules('site_title', 'Site Title', 'trim|required|htmlspecialchars');
							$this->form_validation->set_rules('tagline', 'Site Tagline', 'trim|htmlspecialchars');
							$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
							$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
							if( $_POST ){
								if( !$this->form_validation->run() ) {
									$this->data["row"] = array_merge( $this->data["row"], $_POST );
								} else {
									if(trim($this->input->post('site_title'))){
										$this->common->update_app_option('site_title', $this->input->post('site_title'));
									}
									if(trim($this->input->post('email'))){
										$this->common->update_app_option('admin_email', $this->input->post('email'));
									}
									if(trim($this->input->post('tagline'))){
										$this->common->update_app_option('site_tagline', $this->input->post('tagline'));
									}

									$this->session->set_flashdata('success_msg_general','Settings updated successfully!');
									redirect('/admin/settings/');

								}
							}
						}

						$this->data['site_title'] = $this->common->get_app_option('site_title');
						$this->data['site_tagline'] = $this->common->get_app_option('site_tagline');
						$this->data['admin_email'] = $this->common->get_app_option('admin_email');
						// END Sttings page


						// START Sttings page Logo section
						if(isset($_POST['site_logo'])){
							$config['upload_path'] = './files/media/';
							$config['allowed_types'] = 'gif|jpg|png';
							$config['max_width']  = '600';
							$config['max_height']  = '600';
							$this->load->library('upload', $config);

							if ( $this->upload->do_upload('logo') ) {
								$data = array('upload_data' => $this->upload->data());
								$_POST['logo'] = $data['upload_data']['file_name'];
								$site_logo_name = $_POST['logo'];
								$this->common->update_app_option('site_logo', $site_logo_name);
							}

							$this->session->set_flashdata('success_msg_logo','Logo updated successfully!');
							redirect('/admin/settings/');

						}
						//$this->data['site_logo'] = $this->common->get_app_option('site_logo');
						// END Sttings page logo section

		        $this->data['title'] = 'General Settings'; // Capitalize the first letter

		        $this->load->view('templates/header', $this->data);
						$this->load->view('templates/sidebar', $this->data);
		        $this->load->view('admin/settings', $this->data);
		        $this->load->view('templates/footer', $this->data);
		}

		public function terms_and_conditions(){
			$data['title'] = 'General Settings'; // Capitalize the first letter

			$this->load->view('templates/header', $this->data);
			$this->load->view('templates/sidebar', $this->data);
			$this->load->view('admin/settings-tnc', $this->data);
			$this->load->view('templates/footer', $this->data);

		}
}
