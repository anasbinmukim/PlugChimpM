<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends RM_Controller {
		public function __construct()
		{
						parent::__construct();
		}
		public function index()
		{
						if ( ! $this->session->userdata('logged_in') ) {
							redirect('/login/');
						}

						// $this->data['page_title'] = 'Edit My Profle';
						// $this->data['menu'] = 'admin';
						// $this->data['submenu'] = 'profile';

						$this->data['css_files'] = array(
						  base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css'),
						  base_url('assets/pages/css/profile.min.css'),
						);

						$this->data['js_files'] = array(
						  base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'),
						  base_url('assets/global/plugins/jquery.sparkline.min.js'),
						  base_url('assets/pages/scripts/profile.min.js'),
						);

						if(isset($_GET['psection']) && ($_GET['psection'] == 'personal-info')){
							$this->data['profile_section'] = 'personal-info';
						}elseif(isset($_GET['psection']) && ($_GET['psection'] == 'profile-photo')){
							$this->data['profile_section'] = 'profile-photo';
						}elseif(isset($_GET['psection']) && ($_GET['psection'] == 'profile-settings')){
							$this->data['profile_section'] = 'profile-settings';
						}elseif(isset($_GET['psection']) && ($_GET['psection'] == 'update-password')){
							$this->data['profile_section'] = 'update-password';
						}else{
							$this->data['profile_section'] = 'personal-info';
						}

						//Start: Process profile photo
						if(isset($_POST['save_profile_photo'])){
							$config['upload_path'] = './files/media/';
							$config['allowed_types'] = 'gif|jpg|png';
							$config['max_width']  = '600';
							$config['max_height']  = '600';
							$this->load->library('upload', $config);

							if ( $this->upload->do_upload('profile_photo') ) {
								$data = array('upload_data' => $this->upload->data());
								$_POST['profile_photo'] = $data['upload_data']['file_name'];
								$profile_photo_name = $_POST['profile_photo'];

								$this->common->update('users', array('profile_photo' => $profile_photo_name), array( 'ID' => $this->session->userdata('user_id') ));
								$this->session->set_flashdata('success_msg','Updated done!');

							}else{
								$this->session->set_flashdata('error_msg','Updated failed!');
							}
						}
						//End: Process profile photo




						$this->load->view('templates/header',$this->data);
						$this->load->view('templates/sidebar', $this->data);
						$this->load->view('profile/profile',$this->data);
						$this->load->view('templates/footer',$this->data);
		}

		public function image_thumb( $old_path = '', $new_path = '' ) {

			ini_set('memory_limit', '1024M');
					$pathinfo = pathinfo($old_path);
					$original = $old_path;
					if (!file_exists($original)) {
							show_404($original);
					}

					$width = 400;
					$height = 400;
					// only continue with a valid width and height
					if ( $width >= 0 && $height >= 0) {
							// initialize library
							$config["source_image"] = $old_path;
							$config['new_image'] = $new_path;
							$config["width"] = $width;
							$config["height"] = $height;
							$config["dynamic_output"] = FALSE; // always save as cache
							$this->load->library('image_lib');
							$this->image_lib->initialize($config);
							$this->image_lib->fit();
							$this->image_lib->clear();
					}
		}


}
