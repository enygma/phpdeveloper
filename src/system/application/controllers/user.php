<?php

class User extends Controller {

	function __constructor(){
		parent::Controller();
	}
	//---------------
	public function index(){
	}
	public function login(){
		$out	= array();
		$fields	= array(
			'user'=>'Useraname',
			'pass'=>'Password'
		);
		$rules	= array(
			'user'=>'required',
			'pass'=>'required'
		);
		
		$this->validation->set_rules($rules);
		$this->validation->set_fields($fields);

		if($this->validation->run()!=FALSE){
			/* Login submitted! check it! */
			
			$user=$this->input->post('user');
			$pass=$this->input->post('pass');
			$is_valid=$this->user_model->validateLogin($user,$pass);
			
			//If it's a valid login, start their session...
			if($is_valid){ $this->user_model->startSession($user); }
		}else{
			$out['msg']=$this->validation->error_string;
		}
		
		$this->template->write_view('content','user/login',$out,TRUE);
		$this->template->render();
	}
	public function logout(){
		// Log them out...destroy the userdata
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect();
	}
	
}

?>