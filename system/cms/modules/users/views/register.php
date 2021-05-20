<h2 class="page-title" id="page_title"><?php echo lang('user:register_header') ?></h2>

<p>
	<span id="active_step"><?php echo lang('user:register_step1') ?></span> -&gt;
	<span><?php echo lang('user:register_step2') ?></span>
</p>

<?php if ( ! empty($error_string)):?>
<!-- Woops... -->
<div class="alert alert-danger">
	<?php echo $error_string;?>
</div>
<?php endif;?>

<?php echo form_open('register', array('id' => 'register')) ?>
 
	
	<?php if ( ! Settings::get('auto_username')): ?>
	<div class="form-group">
	<label class="form-label"><?php echo lang('user:username') ?></label>
		<input type="text" name="username" class="form-control" maxlength="100" value="<?php echo $_user->username ?>" />
	</div>
	<?php endif ?>
	
	<div class="form-group">
	<label class="form-label"><?php echo lang('global:email') ?></label>
		<input type="text" class="form-control" name="email" maxlength="100" value="<?php echo $_user->email ?>" />
		<?php echo form_input('d0ntf1llth1s1n', ' ', 'class="form-control" style="display:none"') ?>
	</div>
	
	<div class="form-group">
	<label class="form-label"><?php echo lang('global:password') ?></label>
		<input type="password" class="form-control" name="password" maxlength="100" />
	</div>
	<div class="form-group">
	<label class="form-label">First Name</label>
		<input type="text" class="form-control" name="first_name" id="first_name" maxlength="100" />
	</div>
	<div class="form-group">
	<label class="form-label">Last Name</label>
		<input type="text" class="form-control" name="last_name" id="last_name" maxlength="100" />
	</div>
 

	
	<div class="form-group">
		<?php echo form_submit('btnSubmit', lang('user:register_btn')) ?>
	</div>
 
<?php echo form_close() ?>