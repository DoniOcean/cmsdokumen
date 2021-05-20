
 

 
<?php echo form_open(uri_string(), ' name="agama_frm" id="agama_frm" class="crud"') ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput"><?php echo lang('agama:name');?></label>
													<?php echo form_input('agama_name', $agama->agama_name,' id="agama_name" class="form-control"');?>
                                                </div>
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons" id="agama_button">
													<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
												</div>	
												</div>
	
<?php echo form_close();?>

 