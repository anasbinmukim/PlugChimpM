<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends RM_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function register(){

		if ( $this->session->userdata('logged_in') ) {
			redirect('/');
		}

		$this->data['js_files'] = array(
			//base_url('assets/pages/js/register.js?ver=1.0.0')
		);

		$this->data['page_title'] = 'Sign Up';
		$this->data["row"] = array(
			'first_name' => '',
			'last_name' => '',
			'email' => '',
			'username' => '',
			'conf_username' => '',
			'password' => '',
			'conf_password' => '',
			'tnc' => '',
		);

		$this->form_validation->set_message('required', '%s is required.');
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required|htmlspecialchars');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|callback_email_check',  array('is_unique' => 'This email is already being used by someone.'));
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|callback_username_check|htmlspecialchars',  array('is_unique' => 'This user name or phone number is already being used by someone.'));
		$this->form_validation->set_rules('conf_username', 'Re-type User Name', 'trim|required|htmlspecialchars|matches[username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|htmlspecialchars');
		$this->form_validation->set_rules('conf_password', 'Re-Password', 'trim|required|htmlspecialchars|matches[password]');
		$this->form_validation->set_rules('tnc', 'Terms and Conditions', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if( $_POST ){

			$_POST['terms'] = isset($_POST['terms']) ? 1 : '';
			if( !$this->form_validation->run() ) {

				$this->data["row"] = array_merge( $this->data["row"], $_POST );

			} else {

				$key = random_string();

				$password = md5( $this->config->item('encryption_key').$this->input->post('password') );

				$user_arr = array(
					'user_name'=> trim($this->input->post('username')),
					'email'=> trim($this->input->post('email')),
					'first_name'=> trim($this->input->post('first_name')),
					'last_name' => trim($this->input->post('last_name')),
					'is_active' => 1,
					'password' => $password,
					'created_at' => date('Y-m-d H:i:s'),
				);

				$user_id = $this->common->insert( 'users', $user_arr );


				// $params = array(
				// 	'user-firstname' => trim($this->input->post('first_name')).' '.trim($this->input->post('last_name')),
				// 	'email' => trim($this->input->post('email')),
				// 	'login-url' => '<a href="'.site_url('login').'">'.site_url('login').'</a>',
				// 	'site-name' => $this->data['core_settings']->site_name,
				// 	'site-email' => $this->data['core_settings']->email,
				// );
				//send_mail('welcome', $user_id, $params);

				// $click_here = '<a href="'.site_url('set_password/'.$key).'" target="_blank">'.site_url('set_password/'.$key).' </a>';
				// $params = array(
				// 	'user-firstname' => trim($this->input->post('first_name')).' '.trim($this->input->post('last_name')),
				// 	'invite-url' => $click_here,
				// 	'site-name' => $this->data['core_settings']->site_name,
				// 	'site-email' => $this->data['core_settings']->email,
				// );

				//send_mail('invite-user', $user_id, $params);

				redirect('/');
			}
		}

		$this->load->view('templates/header-login', $this->data);
		$this->load->view('auth/register', $this->data);
		$this->load->view('templates/footer-login', $this->data);
	}

	public function email_check()
	{
		$user = $this->common->get( 'users', array( 'email' => trim($this->input->post('email')) ) );
		if(!empty($user)){
				$this->form_validation->set_message('email_check', 'This email already exists, please try with new one.');
				return FALSE;
		}
		else
			return TRUE;
	}

	public function username_check()
	{
		$user = $this->common->get( 'users', array( 'user_name' => trim($this->input->post('username')) ) );
		if(!empty($user)){
				$this->form_validation->set_message('username_check', 'This user already exists, please try using new one.');
				return FALSE;
		}
		else
			return TRUE;
	}

	public function login() {
		if ( $this->session->userdata('logged_in') ) {
			redirect('/');
		}

		$this->data['error'] = '';
		$this->data['page_title'] = 'Sign In';

		if ( $_POST ){

			$username = trim($this->input->post('username'));
			$password = md5($this->config->item('encryption_key').trim($this->input->post('password')));
			if($username && $password){

				$condition = 'lower(user_name) = "'.strtolower($username).'" AND password = "'.$password.'" AND is_active = 1';
				$user = $this->common->get('users', $condition);

				if( !empty($user) ){

					if ( $this->input->post('remember') == 1 ) {

						$cookie = array(
							'name' => 'seat_username',
							'value' => $username,
							'expire' => '2592000'
						);
						set_cookie($cookie);

					} else {

						$cookie = array(
							'name' => 'seat_username',
							'value' => '',
							'expire' => '1'
						);
						set_cookie($cookie);
					}

					if ( $user->is_active == 1 ) {
						$sess_array = array(
							'username'       => $user->user_name,
							'email'          => $user->email,
							'user_id'        => $user->ID,
							'logged_in' => TRUE,
							'user_level'       => $user->user_level,
						);
						$this->session->set_userdata($sess_array);

						$this->common->update('users', array( 'last_login' => date('Y-m-d H:i:s') ), array( 'ID' => $user->ID ) );

						$user_loginlog_arr = array(
							'user_id'=> $user->ID,
							'ip_address'=> $_SERVER['REMOTE_ADDR'],
							'browser_agent'=> $this->input->user_agent(),
							'login_time' => date('Y-m-d H:i:s'),
						);
						$user_loginlog_id = $this->common->insert( 'user_login_log', $user_loginlog_arr );

						redirect('/');
					} else {
						$this->data['error'] = 'Your account is not active. Please contact admin.';
					}
				} else {
					$this->data['error'] = 'Invalid Email or Password';
				}

			} else {
				$this->data['error'] = 'Invalid Email or Password';
			}
		}

		$this->load->view('templates/header-login', $this->data);
		$this->load->view('auth/login', $this->data);
		$this->load->view('templates/footer-login', $this->data);
	}

	public function forgot_password(){

		if ($this->session->userdata('logged_in'))
			redirect('/');

		$defaults =  array('email' => '');
		$this->data['error'] = '';
		$this->data['success'] = '';
		$this->data['page_title'] = 'Forgot Password';

		if($_POST) {

			$email = trim($this->input->post('email'));
			if( $email ) {

				$user = $this->common->get( 'users', array( 'lower(email)'=>strtolower($email), 'is_active' => 1 ) );
				if( !empty($user) ) {
					$key = random_string();
					$today = time();
					$tomorrow = date('Y-m-d H:i:s', strtotime('+1 day', $today));

					$update_arr = array(
						'password_reset_key' => $key,
						'password_reset_key_expiration' => $tomorrow
					);

					$this->common->update('users',$update_arr,array('id'=>$user->id));
					$click_here = '<a href="'.site_url('reset_password/'.$key).'" target="_blank">'.site_url('reset_password/'.$key).' </a>';
					//send reset mail
					$params = array(
						'name' => $user->first_name.' '.$user->last_name,
						'reset-url' => $click_here,
						'site_name' => $this->data['core_settings']->site_name,
						'site_email' => $this->data['core_settings']->email,
					);

					$mail = send_mail('forgot-password', $user->id, $params);
					$this->data['success'] = 'Email has been sent to the address you entered.';

				} else {
					$this->data['success'] = 'You will receive an email if the email you have entered is correct.';
				}
			} else {
				$this->data['success'] = 'You will receive an email if the email you have entered is correct.';
			}
		}

		$this->load->view('templates/header-login', $this->data);
		$this->load->view('auth/forgot_password', $this->data);
		$this->load->view('templates/footer-login', $this->data);
	}

	public function reset_password( $key = "" ){

		if ($this->session->userdata('logged_in'))
			redirect('/');

		$this->data['page_title'] = 'Reset Password';
		$query = $this->db->query("select * from users WHERE password_reset_key ='".$key."' AND ( password_reset_key_expiration > (NOW() - INTERVAL 1 DAY))");
		$user = $query->row();
		if(empty($user)){
			$this->session->set_flashdata('error', 'Your  password reset time expired. Please try again. ');
			redirect('forgot_password');
		}

		$this->data["row"] = array(
			'password' => '',
			'cpassword' => '',
		);

		$this->form_validation->set_message('required', '%s is required.');
		$this->form_validation->set_rules('password', 'Password', 'required|htmlspecialchars|min_length[5]|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|htmlspecialchars');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($_POST) {

			if ( $this->form_validation->run() ) {

				$update_arr = array(
					'password' => md5( $this->config->item('encryption_key').$this->input->post('password') ),
					'password_reset_key' => '',
					'password_reset_key_expiration' => ''
				);

				$this->common->update( 'users',$update_arr,array('id' => $user->id) );

				$params = array(
					'name' => $user->first_name.' '.$user->last_name,
					'site_name' => $this->data['core_settings']->site_name,
					'site_email' => $this->data['core_settings']->email,
				);

				send_mail('password-changed ', $user_id, $params);

				$this->session->set_flashdata('success', 'Your password changed successfully. ');
				redirect('/login');

			} else {
				$this->data["row"] = array_merge($this->data["row"],$_POST);
			}
		}

		$this->load->view('templates/header-login', $this->data);
		$this->load->view('auth/reset_password', $this->data);
		$this->load->view('templates/footer-login', $this->data);
	}

	public function set_password( $key = "" ){

		if ($this->session->userdata('logged_in'))
			redirect('/');

		$this->data['page_title'] = 'Set Password';

		$user = $this->common->get( 'users', array( 'invite_key' => $key ) );

		if( empty($user) ){
			redirect('login');
		}

		$this->data["row"] = array(
			'password' => '',
			'cpassword' => '',
		);

		$this->form_validation->set_message('required', '%s is required.');
		$this->form_validation->set_rules('password', 'Password', 'required|htmlspecialchars|min_length[5]|matches[cpassword]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|htmlspecialchars');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($_POST) {

			if ( $this->form_validation->run() ) {
				$update_arr = array(
					'password' => md5( $this->config->item('encryption_key').$this->input->post('password') ),
					'invite_key' => '',
					'is_active' => 1,
				);
				$this->common->update( 'users', $update_arr, array('id' => $user->id) );
				$sess_array = array(
					'username'       => $user->email,
					'email'          => $user->email,
					'user_id'        => $user->id,
					'logged_in' => TRUE,
					'group_id'       => $user->group_id,
				);

				$this->session->set_userdata($sess_array);
				$this->common->update('users', array( 'last_login' => date('Y-m-d H:i:s') ), array( 'id' => $user->id ) );
				redirect('/dashboard');
			} else {
				$this->data["row"] = array_merge($this->data["row"],$_POST);
			}
		}

		$this->load->view('templates/header-login', $this->data);
		$this->load->view('auth/set_password', $this->data);
		$this->load->view('templates/footer-login', $this->data);
	}

	public function logout(){
			$current_logged_user_id = $this->session->userdata('user_id');
			$user_loginlog_arr = array(
				'user_id'=> $current_logged_user_id,
				'ip_address'=> '',
				'browser_agent'=> '',
				'logout_time' => date('Y-m-d H:i:s'),
			);
			$user_loginlog_id = $this->common->insert( 'user_login_log', $user_loginlog_arr );

			$this->session->sess_destroy();
	    redirect('/');
	}


}
