<?php

class Tag extends Controller {

	function __constructor(){
		parent::Controller();
	}
	//-------------------
	function index($tag=null){
		$out=array();
		$this->template->write_view('content','tag/list',$out);
		$this->template->render();
	}
	function view($tag){
		$this->load->model('news_model');
		$out=array();
		
		// Get the news for the tag(s)
		$out['news_items']	= $this->news_model->getNewsByTag($tag);
		$out['tag']			= $tag;
		
		$this->template->write_view('content','tag/list',$out);
		$this->template->render();
	}
}

?>