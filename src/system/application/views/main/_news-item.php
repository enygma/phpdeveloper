<?php
//print_r($news_items);
?>

<?php foreach($news_items as $k=>$item): //print_r($item);
	// We want to split off the name from the front
	$tp=explode(':',$item->title);
	if(count($tp)>1){
		$from	='via '.$tp[0].'<br/>';
		$title	= str_replace($tp[0].':','',$item->title);
	}else{ $from=''; $title=$item->title; }
	$dt=$item->date_posted;
	?>
	<table cellpadding="0" cellspacing="0" border="0" class="news_item">
	<tr class="news_item_title"><td><?php echo $title; ?></td></tr>
	<tr class="news_item_story"><td>
		<div class="news_item_dt">
			<?php 
				echo '<span style="font-size:12px">'.date('M',$dt).'</span><br/>'; 
				echo '<span style="font-size:20px;font-weight:bold">'.date('j',$dt).'</span><br/>';
				echo '<span style="font-size:12px">'.date('Y',$dt).'</span><br/>'; 
				echo '<span style="font-size:10px">at '.date('H:i:s',$dt).'</span><br/>'; 
			?>
		</div>
		<span class="news_item_byline"><?php echo $from; ?></span>
		<?php echo stripslashes($item->story); ?>
	</td></tr>
	<tr class="news_item_tags"><td> tagged
	<?php
	foreach($item->tags as $t){
		echo '<a href="/tag/'.$t->tag.'">'.$t->tag.'</a> ';
	}
	?>
	</td></tr>
	<?php
	$lnk=(count($item->comments)>0) ? 'View '.count($item->comments).' comments' : 'Make a comment';
	?>
	<tr><td class="news_item_link"><a href="/news/view/<?php echo $item->id; ?>"><?php echo $lnk; ?></a></td></tr>
	<?php if(user_is_admin()): ?>
	<tr id="admin_row">
		<td>
		<a href="/news/edit/<?php echo $item->id; ?>">edit</a>
		<a href="#" onClick="deleteNewsItem(<?php echo $item->id; ?>);return false;">delete</a>
		</td>
	</tr>
	<?php endif; ?>
	</table><br/>
<?php endforeach; ?>	
