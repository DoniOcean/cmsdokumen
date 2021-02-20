
 

 
<?php echo form_open(uri_string(), ' name="master_urusan_frm" id="master_urusan_frm" class="crud"') ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput"><?php echo lang('master_urusan:name');?></label>
													<?php echo form_input('master_urusan_name', $master_urusan->master_urusan_name,' id="master_urusan_name" class="form-control"');?>
                                                </div>
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons" id="master_urusan_button">
													<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
												</div>	
												</div>
	
<?php echo form_close();?>

 