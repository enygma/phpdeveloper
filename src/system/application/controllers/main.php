<?php

class Main extends Controller {

	function __constructor(){
		parent::Controller();
	}
	public function index(){
		$this->load->model('news_model');
		
		$out=array(
			'news_items'	=> $this->news_model->getNewsDetail(null,1),
		);
		
		$pop_news=array();
		$ret=$this->news_model->getPopularNews('-1 month');
		if(count($ret)){
			$r=array_rand($ret,5);
			foreach($r as $k){ $pop_news[]=$ret[$k]; }
		}
		
		$op_news=array();
		$ret=$this->news_model->getNewsByTag('opinion');
		$r=array_rand($ret,5);
		foreach($r as $k){ $op_news[]=$ret[$k]; }
		
		$this->template->write_view('sidebar1','main/_sidebar_list',array(
			'items'=>$pop_news,
			'title'=>'Trending Stories'
		));
		$this->template->write_view('sidebar2','main/_sidebar_list',array(
			'items'=>$op_news,
			'title'=>'Community Thoughts'
		));
		
		$this->template->write_view('center_bar','main/_ad_list',array());
		
		$this->template->write_view('content','main/index',$out);
		$this->template->render();
	}
}

?>