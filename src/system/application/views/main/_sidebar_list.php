<div class="box_sb">

<span class="box_sb_title"><?php echo $title; ?></span><br/>
<?php 
foreach($items as $k=>$item){ 
	echo '<li><a class="sidebar_link" href="/news/view/'.$item->id.'">'.$item->title.'</a>';
}
?>

</div>