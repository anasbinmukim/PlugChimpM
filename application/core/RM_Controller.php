<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RM_Controller extends CI_Controller
{
	var $user = FALSE;
	var $site_settings = false;
	protected $data = array();

	function __construct() {
		parent::__construct();
		$this->data['site_title'] = $this->common->get_app_option('site_title');
		$this->data['site_tagline'] = $this->common->get_app_option('site_tagline');
		$this->data['site_logo'] = base_url('seatassets/images/logo-seat-booking-bd-1.png');
		if( $this->common->get_app_option('site_logo') && file_exists( getcwd().'/files/media/'.$this->common->get_app_option('site_logo') ) ){
			$this->data['site_logo'] = base_url( 'files/media/'.$this->common->get_app_option('site_logo') );
		}
		$this->data['page_title'] = 'Online Reservation in Bangladesh';
		$this->user = $this->session->userdata('user_id') ? $this->common->get( 'users', array( 'ID' => $this->session->userdata('user_id'), 'is_active' => 1 ) ) : FALSE;
		if ( $this->session->userdata('logged_in') ) {
			$this->data['profile_photo'] = base_url('seatassets/images/placeholder-profile-photo.jpg');
			$user_profile = $this->common->get( 'users', array( 'ID' => $this->session->userdata('user_id') ) );
			if(!empty($user_profile)){
					$profile_photo = $user_profile->profile_photo;
					if( $profile_photo && file_exists( getcwd().'/files/media/'.$profile_photo ) ){
							$this->data['profile_photo'] = base_url( 'files/media/'.$profile_photo );
					}
			}
		}
	}
}
