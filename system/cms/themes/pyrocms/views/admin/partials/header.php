<noscript>
	<span>  requires that JavaScript be turned on for many of the functions to work correctly. Please turn JavaScript on and reload the page.</span>
</noscript>

<div class="topbar" dir=<?php $vars = $this->load->get_vars(); echo $vars['lang']['direction'] ?>>
	<div class="topbar-inner">
		<div class="wrapper">
			<div id="logo">
				<!-- <?php echo anchor('', 'system/cms/themes/admin/img/logo.png', 'target="_blank"') ?> -->
				<?php echo anchor('','<span id="pyro-logo"></span>', 'target="_blank"') ?>
			</div>
		
			<nav id="primary">
				<?php file_partial('navigation') ?>
			</nav>
			
			<div class="topbar-form">
	
				 
	
				 
			</div>
			
		</div>
	</div>
	
</div>

<div class="subbar">
	<div class="wrapper">
		<div class="subbar-inner">
			<h2><?php echo $module_details['name'] ? anchor('admin/'.$module_details['slug'], $module_details['name']) : lang('global:dashboard') ?></h2>
		
			<small>
				<?php if ( $this->uri->segment(2) ) { echo '<span class="divider">&nbsp; | &nbsp;</span>'; } ?>
				<?php echo $module_details['description'] ? $module_details['description'] : '' ?>
				<?php if ( $this->uri->segment(2) ) { echo '<span class="divider">&nbsp; | &nbsp;</span>'; } ?>
				<?php if($module_details['slug']): ?>
				<?php echo anchor('admin/help/'.$module_details['slug'], lang('help_label'), array('title' => $module_details['name'].'&nbsp;'.lang('help_label'), 'class' => 'modal')); ?>
				<?php endif; ?>
			</small>
			
			<?php file_partial('shortcuts') ?>
	
		</div>
	</div>
</div>

<?php if ( ! empty($module_details['sections'])) file_partial('sections') ?>
