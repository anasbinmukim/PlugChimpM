<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if( !function_exists('create_slug') ) {
	
	function create_slug( $title = '' ) {
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $title);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", '_', $clean);
		
		if ( slug_exists($clean, $id) ) {
			$clean = make_slug_unique($clean);  
		}
		return $clean;
	}
	
}
if( !function_exists('slug_exists') ) {
	function slug_exists( $slug ) {
		$ci = &get_instance();
		$ci->db->from('processes');
		$ci->db->where('slug', $slug);
		return $ci->db->count_all_results();
	}
}
if( !function_exists('make_slug_unique') ) {
	function make_slug_unique( $slug ) {
		for ( $i=1; $i<100000; $i++ ) {
			$proposedslug = $slug .'-'. $i;
			if ( !slug_exists( $proposedslug ) ){
				return $proposedslug;
				break;
			}
		}
	}
}

if( !function_exists('random_string') ) {
	function random_string($stirng = 15){  //password_hash("rasmuslerdorf", PASSWORD_DEFAULT)
		
		$rnd_id = password_hash(uniqid(rand(),1), PASSWORD_DEFAULT);
		$rnd_id = strip_tags(stripslashes($rnd_id)); 
		$rnd_id = str_replace(".","",$rnd_id); 
		$rnd_id = strrev(str_replace("/","",$rnd_id)); 
		$rnd_id = substr($rnd_id,0,$stirng); 
		return $rnd_id;
	}
}

if ( !function_exists('username') ) {
	function username( $id = 0 ) {
		
		if( $id > 0 ) {
			$ci = &get_instance();
			$ci->db->select('username');
			$ci->db->where( 'id' , $id );
			$row = $ci->db->get('users')->row();
			if( count($row) > 0 ) {
				return $row->username;
			} else {
				return '';
			}
		} else {
			return '';
		}
	}
}

if ( !function_exists('user_details') ) {
	function user_details( $id = 0 ) {
		$ci = &get_instance();
		$ci->db->where( 'id' , $id );
		$row = $ci->db->get('users')->row();
		return $row;
	}
}


if( !function_exists('get_settings_item') ) {
	
	function get_settings_item($key = '') {
		
		$ci = &get_instance();
		$ci->db->where('field', $key);
		$row = $ci->db->get('settings')->row();
		if( count($row) > 0 ) {
			return $row->value;
		} else {
			return '';
		}
	}
	
}
if( !function_exists('get_role_name') ) {
	
	function get_role_name( $id = '' ) {
		
		$ci = &get_instance();
		$ci->db->where('id', $id);
		$row = $ci->db->get('groups')->row();
		if( count($row) > 0 ) {
			return $row->title;
		} else {
			return '';
		}
	}
	
}

if( !function_exists('is_user_active') ) {
	function is_user_active( $id = 0 ) {
		$ci = &get_instance();
		$ci->db->where( 'id' , $id );
		$row = $ci->db->get('users')->row();
		
		if( count($row) > 0 ) {
			
			if( $row->expire_date < time() ) {
				return false;
			} else {
				return true;
			}
			
		} else {
			return false;
		}
	}
}

if ( !function_exists('get_bid_type') ) {
	function get_bid_type( $key  = 0) {
		$st_arr = array(
			1 => 'Single',
			2 => 'Range',
		);
		if ( $key  == 0 ) {
			return $st_arr;
		} else {
			return $st_arr[$key];
		}
	}
}
if ( !function_exists('get_file_status') ) {
	function get_file_status( $key  = 0) {
		$st_arr = array(
			1 => 'PULLED FROM POSTING',
			2 => 'PULLED FROM SALE',
			3 => 'ACTIVE',
			4 => 'COMPLETE',
		);
		if ( $key  == 0 ) {
			return $st_arr;
		} else {
			return $st_arr[$key];
		}
	}
}

if ( !function_exists('get_array_result') ) {
	function get_array_result( $key  = 0) {
		$st_arr = array(
			1 => 'Back to Lender',
			2 => '3rd Party',
			3 => 'Back to Lender With Bidding',
			4 => 'Reinstatement',
			5 => 'TRO (Temporary Restraining Order)',
			6 => 'BKY (Bankruptcy)',
		);
		if ( $key  == 0 ) {
			return $st_arr;
		} else {
			return $st_arr[$key];
		}
	}
}

if ( !function_exists('get_user_status') ) {
	function get_user_status( $key  = 0) {
		$st_arr = array(
			1 => 'Active',
			2 => 'Inactive',
			3 => 'Deleted',
		);
		return $st_arr[$key];
	}
}

if ( !function_exists('get_user_status_class') ) {
	function get_user_status_class( $key  = 0) {  
		$st_arr = array(
			1 => 'success',
			2 => 'warning',
			3 => 'danger',
		);
		return $st_arr[$key];
	}
}

if ( !function_exists('get_user_role') ) {
	function get_user_role( $key  = 0) {
		$st_arr = array(
			1 => 'Administrator',
			2 => 'Employee',
			3 => 'Client',
			4 => 'Trustee',
			5 => 'SubTrustee',  
		);
		if ( $key  == 0 ) {
			return $st_arr;
		} else {
			return $st_arr[$key];
		}
		
	}
}

if ( !function_exists('is_primary_set') ) {
	function is_primary_set( $user_id  = 0, $county_id = 0 ) {
		if ( $user_id > 0 && $county_id > 0 ) {

			$ci = &get_instance();
			$ci->db->where(array( 'county_id' => $county_id, 'user_id !=' => $user_id, 'is_primary'=>1 ));
			$row = $ci->db->get('county_assignments')->row();
			if( count($row) > 0 ) {
				return 1;
			} else {
				return 0;
			}

		}
	}
}

if ( !function_exists('get_months') ) {
	function get_months( $month_key = 0 ) {

		$arr_month = array(
			
			"01" => "Jan",
			"02" => "Feb",
			"03" => "Mar",
			"04" => "Apr",
			"05" => "May",
			"06" => "Jun",
			"07" => "Jul",
			"08" => "Aug",
			"09" => "Sep",
			"10" => "Oct",
			"11" => "Nov",
			"12" => "Dec",

		);

		if ( $month_key  == 0 ) {
			return $arr_month;
		} else {
			return $arr_month[$month_key];
		}
	}
}

if ( !function_exists('get_sale_window') ) {
	function get_sale_window( $key  = 0) {
		$st_arr = array(
			1 => '10AM',
			2 => '11AM',
			3 => '12PM',
			4 => '1PM',
		);
		if ( $key  == 0 ) {
			return $st_arr;
		} else {
			return $st_arr[$key];
		}
	}
}



if ( !function_exists('send_mail') ) {
	function send_mail( $name, $user_id = 0, $params = array() ){
		

		$ci = &get_instance();

		$settings = $ci->db->get('core')->row();
		
		$to_name = $to_email = '';
		if (false !== ($pos = strpos($user_id, '@'))) {
			$to_email = $user_id;
			if( $to_email == '' ) {
				return;
			}
		} else {
			
			$ci->db->where( 'id' , $user_id );
			$user = $ci->db->get('users')->row();
			
			if( count($user) == 0 ){
				return;
			}
			$to_name = $user->first_name.' '.$user->last_name;
			$to_email = $user->email;
		}
		
		$ci->db->where( 'slug' , $name );
		$model = $ci->db->get('emails')->row();
		
		if( count($model) == 0 ){
			return;
		}
		
		$template = $model->body;
		$subject = $model->subject;
		
		$template = str_replace(array_map(function($key) {
			return '[*' . $key . '*]';
		}, array_keys($params)), array_values($params), $template);

		$subject = str_replace(array_map(function($key) {
			return '[*' . $key . '*]';
		}, array_keys($params)), array_values($params), $subject);
		
		$ci->load->library('phpmailer');
		
		$ci->phpmailer->IsHTML(true);
		
		$is_smtp = $settings->is_smtp;
		
		if( $is_smtp == 1 ) {
			$ci->phpmailer->IsSMTP(); 
			$ci->phpmailer->SMTPSecure = $settings->connection_prefix;
			$ci->phpmailer->SMTPAuth   = true;                  
			$ci->phpmailer->Host       = $settings->smtp_host;
			$ci->phpmailer->Port       = $settings->smtp_port;        
			$ci->phpmailer->Username   = $settings->smtp_username; 
			$ci->phpmailer->Password   = $settings->smtp_password;
		}

		$ci->phpmailer->SetFrom( $settings->email, $settings->site_name );
		$ci->phpmailer->AddAddress( $to_email, $to_name );
		$ci->phpmailer->Subject = $subject;
		$ci->phpmailer->Body = $template;
		$ci->phpmailer->Send();
		$ci->phpmailer->ClearAddresses();
	}
}



