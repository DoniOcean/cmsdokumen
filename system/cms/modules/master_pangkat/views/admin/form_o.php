
 

 
<?php echo form_open(uri_string(), ' name="master_pangkat_frm" id="master_pangkat_frm" class="crud"') ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput"><?php echo lang('master_pangkat:name');?></label>
													<?php echo form_input('master_pangkat_name', $master_pangkat->master_pangkat_name,' id="master_pangkat_name" class="form-control"');?>
                                                </div>
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons" id="master_pangkat_button">
													<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
												</div>	
												</div>
	
<?php echo form_close();?>

 