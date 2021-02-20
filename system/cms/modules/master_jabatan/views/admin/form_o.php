
 

 
<?php echo form_open(uri_string(), ' name="master_jabatan_frm" id="master_jabatan_frm" class="crud"') ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput"><?php echo lang('master_jabatan:name');?></label>
													<?php echo form_input('master_jabatan_name', $master_jabatan->master_jabatan_name,' id="master_jabatan_name" class="form-control"');?>
                                                </div>
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons" id="master_jabatan_button">
													<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
												</div>	
												</div>
	
<?php echo form_close();?>

 