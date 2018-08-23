<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view('login');
	}

	public function verifylogin()
	{
		$this->form_validation->set_error_delimiters('<p class="error" style="color:red;text-align: left;">', '</p>');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_db_user');
		
		if ($this->form_validation->run() == FALSE)
		{
	       	$this->load->view('login');
		}
		else
		{
			redirect('Dashboard');
		}	
	}

	public function check_db_user($password) {
		
		$username = $this->input->post('username');
		
		//query the database
		$table = "users";
		$where = 'password ="'.$password.'" AND (email = "'.$username.'" OR name = "'.$username.'")'; 
		$result = $this->Common_mdl->check($where, $table);
		
		if($result){
			 $sess_array = array();
			 foreach($result as $row)
			 {
				$sess_array = array(
					'user_id' 	=> $row->id,
                    'username' 	=> trim($row->name),
					'email' 	=> trim($row->email),
                    'logged_in'	=> TRUE        	  				 
                );
				$this->session->set_userdata('logged_in', $sess_array);       
			 }
			 return TRUE;
		 } else{
			$this->form_validation->set_message('check_db_user', 'Invalid username or password');
		 	return false;
		}			
	}

	public function logout(){
		//$this->session->unset_userdata('purechiro_logged_in');
		$userdata = array(
						'user_id' 	=> '',
						'username' 	=> '',
						'email'			=> '',
						'logged_in'	=> FALSE,		
					);
		$this->session->unset_userdata($userdata);
		$this->session->sess_destroy();
		redirect('login');
	}

}
