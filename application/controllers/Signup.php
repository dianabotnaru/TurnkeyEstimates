<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

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
		$this->load->view('login/signup');
	}

	public function verifySignup()
	{
		$this->form_validation->set_error_delimiters('<p class="error" style="color:red;text-align: left;">', '</p>');
		$this->form_validation->set_rules('username', 'Username', 'required|trim')	;
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$userData = array(
				'name'  	=> $username,
				'email' 	=> $email,
				'password' 	=> $password);
			$this->Common_mdl->insert('users',$userData);
	       	$this->load->view('login');
		}
		else
		{
			$this->load->view('login/signup');
		}	
	}

}
