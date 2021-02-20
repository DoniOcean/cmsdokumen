
 

 
<?php echo form_open(uri_string(), ' name="master_jenis_informasi_frm" id="master_jenis_informasi_frm" class="crud"') ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput"><?php echo lang('master_jenis_informasi:name');?></label>
													<?php echo form_input('master_jenis_informasi_name', $master_jenis_informasi->master_jenis_informasi_name,' id="master_jenis_informasi_name" class="form-control"');?>
                                                </div>
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons" id="master_jenis_informasi_button">
													<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
												</div>	
												</div>
	
<?php echo form_close();?>

 