<?php echo form_open(uri_string(), 'class="crud"'); 
?>
<div class="panel panel-default sf">
<div class="panel-body">
<div class="tab-content"> 	 
	
	
	<div class="form-group">
				<label for="link_type">Parent Category</label><br>
				<span class="spacer-right">
					<?php echo form_dropdown('navigation_group_id', array('---PILIH PARENT----') + $folders_tree, @$category->navigation_group_id , 'id="folder_id" class="form-control chzn-select"'); ?>
					 
				</span>
			</div>
	
	
	
<div class="form-group">
	
										<label for="exampleInputEmail1">Judul</label>
										<?php echo  form_hidden('title_asli', $category->title,'class="form-control input-sm"'); ?>
									   	<?php echo  form_input('title', $category->title,'class="form-control input-sm"'); ?>
									</div>


              

</div>
<div class="buttons float-right padding-top">
            		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )); ?>
            	</div>
<?php echo form_close(); ?>
</div>
</div>
</div>