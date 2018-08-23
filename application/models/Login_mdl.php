<?php 
class Login_mdl extends CI_Model {

	public function __construct()
	{
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	public function check_login($username = '', $password = ''){
		if($username == '' || $password == ''){
			return false;
		}else{
			$sql 		= "SELECT * FROM users where ( username	= '".$username."' or email	= '".$username."' )and password = '".md5($password)."' and status = '1' limit 1 ";
			$query 	= $this->db->query($sql);
			return $query->row_array();			
		}		
	}
	public function check_email($email = ''){
		if($email == ''){
			return false;
		}else{
			$sql 		= "SELECT * FROM users where email	= '".$email."' and status = '1' limit 1 ";
			$query 	= $this->db->query($sql);
			return $query->row_array();			
		}		
	}	
	public function update_pass($pass = '', $id){
		if($pass == ''){
			return false;
		}else{
			$sql 		= "update users set password = '".md5($pass)."' where id	= '".$id."'";
			$this->db->query($sql);
			return 1;			
		}		
	}	
}
?>