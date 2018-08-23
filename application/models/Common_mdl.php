<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_mdl extends CI_Model {

	public function __construct()
	{
	  parent::__construct();
	}

	
	public function getCount($tbl, $where=''){
		$count = 0;
		if($where == ''){
			$count = $this->db->count_all($tbl);			
		}else{
			$this->db->where($where);
			$this->db->from($tbl);
			$count = $this->db->count_all_results();
		}
		return $count;
	}
	
	public function select($tbl , $where)
	{
		if(!empty($where)){
			//$this->db->order_by('id','DESC');
			$this->db->where($where);
			$result = $this->db->get($tbl)->result_array();
			return $result;
		}
		else {
			$result = $this->db->get($tbl)->result_array();
			return $result;
		}
	}

	public function searchText($tbl, $where, $search){
		$this->db->where($where);
		$this->db->like('first_name', $search);
		$this->db->or_like('last_name', $search);
		$result = $this->db->get($tbl)->result_array();
		return $result;
	}
	
	public function select_single_row($tbl , $where)
	{
		if(!empty($where)){
			$this->db->where($where);
			$result = $this->db->get($tbl)->row_array();
			return $result;
		}
	}

	public function select_single_row_by_order($tbl , $where, $order_by)
	{
		if(!empty($where)){
			$this->db->order_by($order_by);
			$this->db->where($where);
			$result = $this->db->get($tbl)->row_array();
			return $result;
		}
	}
	public function insert($table, $data){
		$this->db->insert($table, $data); 
		return $this->db->insert_id();
	}

	public function update($table, $data, $where){
		$status = $this->db->update($table, $data, $where);
		if ($this->db->affected_rows($status) > 0)
		  return 1;
		else
		  return 0;
	}
	public function check($where, $table){
		$this->db->where($where);
		$this->db->limit(1);
		$result = $this->db->get($table)->result();
		return $result;
	}
	public function delete($table , $where){
		$status = $this->db->delete($table, $where);
		if ($this->db->affected_rows($status) > 0)
		  return 1;
		else
		  return 0;
	}

}	



