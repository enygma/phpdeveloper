<?php

class User_model extends Model {

	function __constructor(){
		parent::Model();
	}
	//----------------------
	public function isAuth(){
		$user=$this->session->userdata('username');
		return (isset($user)) ? true : false;
	}
	public function validateLogin($user,$pass){
		$ret=$this->getUserDetail($user);
		return (isset($ret[0]) && md5($pass)==$ret[0]->password) ? true : false;
	}
	public function startSession($user){
		$ret=$this->getUserDetail($user);
		if(isset($ret[0])){ $this->session->set_userdata((array)$ret[0]); }
	}
	public function getUserDetail($user){
		$q=$this->db->get_where('users',array('username'=>$user));
		$ret=$q->result();
		return (isset($ret[0])) ? $ret : false;
	}
}

?>