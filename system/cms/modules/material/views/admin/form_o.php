
 

 
<?php echo form_open(uri_string(), ' name="material_frm" id="material_frm" class="crud"') ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput"><?php echo lang('material:name');?></label>
													<?php echo form_input('material_name', $material->material_name,' id="material_name" class="form-control"');?>
                                                </div>
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons" id="material_button">
													<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
												</div>	
												</div>
	
<?php echo form_close();?>

 