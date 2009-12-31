<?php

class News_tags_model extends Model {
	
	function __constructor(){
		parent::Model();
	}
	//----------------------
	function getNewsTags($nid){
		$q=$this->db->get_where('news_tags',array('news_id'=>$nid));
		$ret=$q->result();
		return (isset($ret[0])) ? $ret : array();
	}
	/**
	* The $tag value can be an array
	*/
	function getNewsIdByTag($tag,$limit=null){
		if(!is_array($tag)){ $tag=array($tag); }
		$this->db->select('news_id, tag, ID');
		$this->db->from('news_tags');
		$this->db->where_in('tag',$tag);
		$this->db->order_by('id','desc');
		if($limit){ $this->db->limit($limit); }
		
		$q=$this->db->get();
		$ret=$q->result();
		return (isset($ret[0])) ? $ret : array();
	}
	
	function removeNewsTag($nid,$tag){
		$this->db->delete('news_tags',array('news_id'=>$nid,'tag'=>$tag));
	}
	function addNewsTag($nid,$tag){
		$arr=array('news_id'=>$nid,'tag'=>$tag);
		$this->db->insert('news_tags',$arr);
	}
}