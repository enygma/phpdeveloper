
<?php if(isset($msg)){ $this->load->view('main/_msg-error',array('msg'=>$msg)); } ?>

<?php echo form_open('user/login'); ?>

<table cellpadding="3" cellspacing="0" border="0">
<tr><td>Username:</td><td><?php echo form_input('user',$this->validation->user); ?></td></tr>
<tr><td>Password:</td><td><?php echo form_password('pass'); ?></td></tr>
<tr><td colspan="2" align="right"><?php echo form_submit('sub','Login'); ?></td></tr>
</table>

<?php echo form_close(); ?>