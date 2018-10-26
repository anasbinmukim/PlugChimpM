<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common extends CI_Model{

    function insert( $table = '',$data = array() ) {
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	function update( $table = '',$data = array(),$condition = array() ) {
		if(!empty($condition))
			$this->db->where($condition);

		$this->db->update($table,$data);
	}

  function update_app_option($option_name, $option_value){
      $already_exist_opt = $this->get( 'app_options', array( 'option_name' => trim($option_name) ) );
      if(empty($already_exist_opt)){
        $option_id = $this->insert( 'app_options', array( 'option_name' => trim($option_name), 'option_value' => trim($option_value) ) );
      }else{
        $this->update('app_options', array( 'option_value' => trim($option_value) ), array( 'option_name' => trim($option_name) ) );
      }
  }

  function get_app_option($option_name){
      $option_value = FALSE;
      $options_obj = $this->get( 'app_options', array( 'option_name' => trim($option_name) ) );
      if(!empty($options_obj)){
        $option_value = $options_obj->option_value;
      }
      return $option_value;
  }

  function update_metadata($option_name, $option_value){
      $already_exist_opt = $this->get( 'app_options', array( 'option_name' => trim($option_name), 'option_value' => trim($option_value) ) );
      if(empty($already_exist_opt)){
        $option_id = $this->insert( 'app_options', array( 'option_name' => trim($option_name), 'option_value' => trim($option_value) ) );
      }else{
        $this->update('app_options', array( 'option_value' => trim($option_value) ), array( 'option_name' => trim($option_name) ) );
      }
  }

	function truncate( $table = '' ){
		$this->db->truncate($table);
	}

	function delete( $table = '',$condition = array() ){
		$this->db->where($condition);
		$this->db->delete($table);
	}

	function get( $table = '', $condition = array(), $type = 'object', $select = '', $join_arr_left = '', $join_arr = '', $order_by = ''  ) {
		if(!empty($condition))
			$this->db->where($condition);

		if($select)
			$this->db->select($select);

		if( $join_arr_left ) {
			foreach( $join_arr_left as $tbl => $cond ) {
				$this->db->join( $tbl, $cond, 'left');
			}
		}
		if( $join_arr ) {
			foreach( $join_arr as $tbl => $cond ) {
				$this->db->join( $tbl, $cond);
			}
		}

		if( $order_by ) {
			$this->db->order_by($order_by);
		}

		$query = $this->db->get($table);
		return ($type == 'object'?$query->row():$query->row_array());
	}

	function get_all( $table = '',$condition = array(),$select = '',$order_by = '', $limit = 0, $offset = 0, $join_arr_left = '', $join_arr = '' ) {
		if(!empty($condition))
			$this->db->where($condition);
		if($select)
			$this->db->select($select,false);
		if($order_by)
			$this->db->order_by($order_by);

		if($limit)
			$this->db->limit($limit,$offset);

		if( $join_arr_left ) {
			foreach( $join_arr_left as $tbl => $cond ) {
				$this->db->join( $tbl, $cond, 'left');
			}
		}
		if( $join_arr ) {
			foreach( $join_arr as $tbl => $cond ) {
				$this->db->join( $tbl, $cond);
			}
		}
		$query = $this->db->get($table);

		return $query->result();
	}

	function get_search_count()	{
		$search_query = 'SELECT FOUND_ROWS() cnt';
		$query = $this->db->query($search_query);
		$row = $query->row();
		return $row->cnt;
	}

	function get_total_count($table = '', $condition = '', $join_arr_left = '', $join_arr = '' )	{
		if( $join_arr_left ) {
			foreach( $join_arr_left as $tbl => $cond ) {
				$this->db->join( $tbl, $cond, 'left');
			}
		}
		if( $join_arr ) {
			foreach( $join_arr as $tbl => $cond ) {
				$this->db->join( $tbl, $cond);
			}
		}

		$this->db->from($table);

		if( $condition )
			$this->db->where($condition);

		return $this->db->count_all_results();
	}

	function check_user_exists(){
		$user = $this->get('users', array('id' => $this->session->userdata('user_id')) );
		if( count($user) == 0 ) {
			$this->session->sess_destroy();
       		redirect('/');
		}
	}

}
