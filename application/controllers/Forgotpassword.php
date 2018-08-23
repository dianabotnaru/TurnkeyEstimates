<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
        $this->load->model(array('Common_mdl','Login_mdl'));
	}

	public function index()
	{	
		$data = array();
		$data['validation'] = 'false';
		$data['message'] = '';
		$this->load->view('login/forgotpassword',$data);
	}

	public function verifyEmail(){

		$this->form_validation->set_error_delimiters('<p class="error" style="color:red;text-align: left;">', '</p>');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_db_email');
		
		$email = $this->input->post('email', true);

		$data = array();

		if ($this->form_validation->run() == false)
		{
			$data['validation']  = 'false';
			$data['message'] ='';
		}
		else{
			$data['validation']  = 'true';
			$user = $this->Common_mdl->select_single_row($tbl="users",$where=array('email' => $email));
			$userid = $user['id'];
			$slug = md5($userid . $email . date('Ymd'));
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_port' => 587,
				'smtp_user' => 'elijahwrandall@gmail.com', // change it to yours
				'smtp_pass' => 'knit4Hi~', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");  
            $this->email->from('', "Turnkey Estimates");
            $this->email->to($email);
            $this->email->subject("Reset your Password");

            $message = 'To reset your password please click the link below and follow the instructions: '. base_url().'forgotpassword/reset/'.$userid .'/'. $slug.'
						If you did not request to reset your password then please just ignore this email and no changes will occur.
						Note: This reset code will expire after '. date('j M Y') .'.';

            $this->email->message($message);
            if($this->email->send()){
                $data['message'] ='We have sent you e-mail with reset link.';
            }
            else{

            	$data['message'] = 'Failed to send e-mail with reset link. Please try again.';
            }
		}
		$this->load->view('login/forgotpassword',$data);

	}

	public function reset(){
		$this->userId = $this->uri->segment(3);
		if(!$this->userId) show_error('Invalid reset code.');

		$hash = $this->uri->segment(4);
		if(!$hash) show_error('Invalid reset code.');

		$user = $this->Common_mdl->select_single_row($tbl="users",$where=array('id' => $this->userId));
		if($user){
			$email = $user['email'];
			$slug = md5($this->userId . $email . date('Ymd'));
			if($slug == $hash){
				$this->load->view('login/resetpassword');
			}
		}
	}

	public function resetPassword(){		
		$this->userId = $this->uri->segment(3);
		$this->form_validation->set_error_delimiters('<p class="error" style="color:red;text-align: left;">', '</p>');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('confirmpassword', 'Confirm password', 'trim|required|callback_confirm_password');
		if ($this->form_validation->run() == FALSE)
		{
			$response['status']  = FALSE;
		    $this->load->view('login/resetpassword');
		}else{
			$password = $this->input->post('password');
			$this->Login_mdl->update_pass($password,$this->userId);
			$data = array();
			$data['status']  = 'true';
			$data['message'] = 'Password is reset successfully!';
			$this->load->view('login/resetpassword',$data);
		}
	}

	public function confirm_password($confirmpassword){
		$password = $this->input->post('password');
		if($password == $confirmpassword){
			return true;
		}else{
			$this->form_validation->set_message('confirm_password', 'Passwords need to match');
			return false;
		}
	}


	public function check_db_email() {
		$email = $this->input->post('email');
		if($this->Common_mdl->check($where=array('email' => $email),$tbl="users"))
			return true;
		else{
			$this->form_validation->set_message('check_db_email', 'We cannot find any user information with this email. please try again with other email.');
			return false;
		}
	}


	function randomString($length = 6) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
}
	