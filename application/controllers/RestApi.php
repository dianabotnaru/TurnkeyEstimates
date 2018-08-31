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
        $username = $params['email'];
        $password = $params['password'];

		//query the database
		$table = "users";
		$where = 'password ="'.$password.'" AND (email = "'.$username.'" OR name = "'.$username.'")'; 
		$result = $this->Common_mdl->check($where, $table);
		if($result){
			 $sess_array = array();
			 foreach($result as $row)
			 {
			 	$user_id = $row->id;
				// $userData = array(
				// 	'user_id' 	=> $row->id,
    //                 'username' 	=> trim($row->name),
				// 	'email' 	=> trim($row->email),
    //                 'logged_in'	=> TRUE        	  				 
    //             );
			 }
			$response = array(
		 		'success' => true,
		 		'userId'  => $user_id,
		 		'message' => "");

		 }else{
		 	$response = array(
		 		'success' => false,
		 		'userId'  => $user_id,
		 		'message' => 'Invalid username or password');
		}
		echo json_encode($response);	
	}

	public function signup(){

		$params = json_decode(file_get_contents('php://input'), TRUE);

		$name = $params['name'];
        $email = $params['email'];
        $password = $params['password'];

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$response = array(
		 		'success' => false,
		 		'userId'  => 0,
		 		'message' => 'Invalid email format.');
			echo json_encode($response);	
			exit;
		}

        $userData = $this->Common_mdl->select('users',array('email'=>$email));
		if(!empty($userData)){
			$response = array(
		 		'success' => false,
		 		'userId'  => 0,
		 		'message' => 'Email was already used.');
		}else{
			$newUserData = array(
				'name'  	=> $name,
				'email' 	=> $email,
				'password' 	=> $password);

			$user_id =$this->Common_mdl->insert('users',$newUserData);

			$response = array(
		 		'success' => true,
		 		'userId'  => $user_id,
		 		'message' => '');
		}
		echo json_encode($response);	
	}
}