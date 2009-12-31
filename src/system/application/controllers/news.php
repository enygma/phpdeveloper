<?php

class News extends Controller {

	function __constructor(){
		parent::Controller();
	}
	//-------------------
	/**
	* Show the main news listing, similar to the index
	*/ 
	public function index($nid=null){
		$this->load->model('news_model');
		$out=array(
			'news_items'=>$this->news_model->getNewsDetail($nid),
		);
		$this->template->write_view('content','news/list',$out);
		$this->template->render();
	}
	public function view($nid){
		$this->load->model('news_model');
		$out=array('news_items'=>$this->news_model->getNewsDetail($nid));
		$this->template->write_view('content','news/list',$out);
		$this->template->render();
	}
	public function add($nid=null){
		$this->load->library('validation');
		$this->load->model('news_model');
		$this->load->model('user_model');
		
		$out			= array();
		$out['target']	= 'news/add';
		
		$rules=array(
			'title'	=> 'required',
			'story'	=> 'required',
			'author'=> 'required'
		);
		$this->validation->set_rules($rules);
		
		$fields=array(
			'title'	=>	'News Title',
			'author'=>	'News Author',
			'story'	=>	'News Story'
		);
		$this->validation->set_fields($fields);
		
		if($nid){
			//Editing a news item
			$news_detail=$this->news_model->getNewsDetail($nid);
			$udata		=$this->user_model->getUserDetail($news_detail[0]->author);
		}

		######################
		if($this->validation->run()==FALSE){
			echo 'fail';
		}else{
			//success!
			
			// See if we need to remove any of our tags
			$tags=$this->input->post('tag'); //print_r($tags);
			foreach($news_detail[0]->tags as $nt){
				if(!in_array($nt->tag,array_keys($tags))){ $this->ntm->removeNewsTag($nid,$nt->tag); }
			}
			// Now see if we need to add a new one
			$ntag=$this->input->post('new_tag');
			if(!empty($ntag)){
				$this->ntm->addNewsTag($nid,$ntag);
			}
		}
		######################
		
		if($nid){
			$this->validation->title	= $news_detail[0]->title;
			$this->validation->story	= $news_detail[0]->story;
			$this->validation->author	= $news_detail[0]->author;
			$out['author_fname']=	$udata[0]->full_name;
			$out['target']		=	'news/edit/'.$nid;
			$out['tags']		= 	$news_detail[0]->tags;
		}else{
			$out['author_fname']= '';
			$out['tags']		= array();
		}
		
		$this->template->write_view('content','news/add',$out);
		$this->template->render();
	}
	public function edit($nid){
		$this->add($nid);
	}
	public function delete(){
		
	}
}
?>