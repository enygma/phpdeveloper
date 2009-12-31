<?php

class Tutorials extends Controller {

	function __constructor(){
		parent::Controller();
	}
	//-------------------
	function index(){
		$this->load->model('news_model');
		$tag=array('tutorial');
		$out=array(
			'news_items'=>$this->news_model->getNewsByTag($tag),
			'tag'=>$tag
		);
		$this->template->write_view('content','tag/list',$out);
		$this->template->render();
	}
}
?>