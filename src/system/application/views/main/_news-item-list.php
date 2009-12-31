<?php foreach($news_items as $k=>$v): ?>
	<table cellpadding="3" cellspacing="0" border="0" class="news_item_list">
	<tr>
		<td class="nil_link"><a href="/news/<?php echo $v->id; ?>"><?php echo $v->title; ?></a></td>
	</tr>
	<tr>
		<td class="nil_tagged">tagged with <?php 
			foreach($v->tags as $t){ echo '<a href="/tag/'.$t->tag.'">'.$t->tag.'</a> '; } 
		?></td>
	</tr>
	</table>
<?php endforeach; ?>
