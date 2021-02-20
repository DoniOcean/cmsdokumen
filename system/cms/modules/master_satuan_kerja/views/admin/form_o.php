
 

 
<?php echo form_open(uri_string(), ' name="master_satuan_kerja_frm" id="master_satuan_kerja_frm" class="crud"') ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput"><?php echo lang('master_satuan_kerja:name');?></label>
													<?php echo form_input('master_satuan_kerja_name', $master_satuan_kerja->master_satuan_kerja_name,' id="master_satuan_kerja_name" class="form-control"');?>
                                                </div>
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons" id="master_satuan_kerja_button">
													<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
												</div>	
												</div>
	
<?php echo form_close();?>

 