<?php
// Add/Edit news items
?>

<?php echo form_open($target); ?>

<table cellpadding="3" cellspacing="0" border="0">
<tr>
	<td>Title:</td>
	<td><?php echo form_input('title',$this->validation->title); ?></td>
</tr>
<tr>
	<td>Author:</td>
	<td><?php echo form_input('author',$this->validation->author); ?> <?php echo $author_fname; ?></td>
</tr>
<tr>
	<td valign="top">Story:</td>
	<td><?php 
	$param=array(
		'value'	=>$this->validation->story,
		'name'	=>'story',
		'rows'	=> 10,
		'cols'	=> 75
	);
	echo form_textarea($param); ?></td>
</tr>
<tr>
	<td valign="top">Tags:</td>
	<td>
	<?php 
	if(!empty($tags)){
		foreach($tags as $t){
			echo form_checkbox('tag['.$t->tag.']',$t->ID,true).' ';
			echo $t->tag.'<br/>';
		}
	} 
	echo 'Add new tag: '.form_input('new_tag');
	?>
	</td>
</tr>
<tr>
	<td colspan="2" align="right"><?php echo form_submit('sub','Save Article'); ?></td>
</tr>
</table>

<?php echo form_close(); ?>