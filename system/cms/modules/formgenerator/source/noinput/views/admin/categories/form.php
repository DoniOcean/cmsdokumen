 <div class="panel panel-default">
					<div class="panel-heading">
					    <?php if ($this->controller == 'admin_categories' && $this->method === 'edit'): ?>
<h3><?php echo sprintf(lang('cat_edit_title'), $category->title);?></h3>

<?php else: ?>
<h3><?php echo lang('cat_create_title');?></h3>

<?php endif; ?>
					</div>
<?php echo form_open($this->uri->uri_string(), 'class="crud" id="categories"'); ?>
<div class="panel-heading sf">
	
	
	 
	
	
	
<div class="form-group">
	
										<label for="exampleInputEmail1">Judul</label>
										<?php echo  form_hidden('title_asli', $category->title,'class="form-control input-sm"'); ?>
									   	<?php echo  form_input('title', $category->title,'class="form-control input-sm"'); ?>
									</div>


              <div class="panel-heading">
            	<div class="buttons float-right padding-top">
            		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
            	</div>
              </div>

</div>
<?php echo form_close(); ?>
 </div>