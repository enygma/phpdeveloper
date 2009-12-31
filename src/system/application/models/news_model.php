<?php

class News_model extends Model {

	function __constructor(){
		parent::Model();
	}
	//----------------------
	public function getNewsDetail($nid=null,$limit=10){
		$this->CI=&get_instance(); //print_r($this->CI);
		$this->CI->load->model('news_tags_model','ntm');
		$this->CI->load->model('comments_model','cm');
		
		$this->db->select('id,title,date_posted,author,story,views');
		$this->db->from('news');
		$this->db->order_by('date_posted','desc');
		if($nid){ 
			if(is_array($nid)){
				$this->db->where_in('id',$nid); 
			}else{ $this->db->where('id',$nid); }
		}else{ $this->db->limit($limit); }
		$q	= $this->db->get();
		$res= $q->result();

		// Get the tags for each news item
		foreach($res as $k=>$v){
			$res[$k]->tags		= $this->CI->ntm->getNewsTags($v->id);
			$res[$k]->comments	= $this->CI->cm->getNewsComments($v->id);
		}
		return $res;
	}
	public function getNewsByTag($tags){
		$this->CI=&get_instance();
		$this->CI->load->model('news_tags_model','ntm');
		
		$news_id	= $this->CI->ntm->getNewsIdByTag($tags,10);
		$ids		= array();
		foreach($news_id as $n){ $ids[]=$n->news_id; }
		$news=$this->getNewsDetail($ids);
		return $news;
	}
	public function getPopularNews($duration='-1 week'){
		$this->db->select('id,title,date_posted,author,story,views');
		$this->db->from('news');
		$this->db->where('date_posted >=',strtotime($duration));
		$this->db->order_by('views','desc');
		$this->db->limit(10);
		
		$q	= $this->db->get();
		return $q->result();
	}
	
}

?>