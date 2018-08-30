<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestApi extends CI_Controller
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_mdl');
	}

	public function index()
	{
	}

	public function login(){

		$params = json_decode(file_get_contents('php://input'), TRUE);
        $username = $params['username'];
        $password = $params['password'];

		//query the database
		$table = "users";
		$where = 'password ="'.$password.'" AND (email = "'.$username.'" OR name = "'.$username.'")'; 
		$result = $this->Common_mdl->check($where, $table);
		if($result){
			 $sess_array = array();
			 foreach($result as $row)
			 {
				$userData = array(
					'user_id' 	=> $row->id,
                    'username' 	=> trim($row->name),
					'email' 	=> trim($row->email),
                    'logged_in'	=> TRUE        	  				 
                );
			 }
			$response = array(
		 		'success' => true,
		 		'data' => $userData);

		 }else{
		 	$response = array(
		 		'success' => false,
		 		'message' => 'Invalid username or password');
		}
		echo json_encode($response);	
	}
}