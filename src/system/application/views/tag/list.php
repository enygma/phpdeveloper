
<?php 
$tagged='';
if(is_array($tag)){ foreach($tag as $t){ $tagged.=$t.','; } }
echo 'Tagged with <b>'.substr($tagged,0,strlen($tagged)-1).'</b>';
$this->load->view('main/_news-item-list',array('news_items'=>$news_items)); 
?>