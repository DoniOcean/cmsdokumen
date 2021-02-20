<h2 class="page-title" id="page_title"><?php echo lang('user:login_header') ?></h2>

<?php if (validation_errors()): ?>
	<div class="alert alert-danger">
	<?php echo validation_errors();?>
</div>
<?php endif ?>

<?php echo form_open('users/login', array('id'=>'login'), array('redirect_to' => $redirect_to)) ?>
 
	 <div class="form-group float-label">
		<label for="email" class="form-control-label"><?php echo lang('global:email') ?></label>
		<?php echo form_input('email', $this->input->post('email') ? $this->input->post('email') : '','class="form-control" ')?>
	</div>
	 <div class="form-group float-label">
		<label for="password" class="form-control-label"><?php echo lang('global:password') ?></label>
		<input type="password" id="password" name="password" maxlength="20" class="form-control" />
	</div>
	 
	<div class="form-group float-label">
	<button class="button button-3d button-black nomargin">Login</button> <span class="register"> | <?php echo anchor('users/pendaftaran', lang('user:register_btn'));?></span>
	</div>
	<div class="form-group float-label">
		<?php echo anchor('users/reset_pass', 'Lupa Password?');?>
	</div>
 
<?php echo form_close() ?>