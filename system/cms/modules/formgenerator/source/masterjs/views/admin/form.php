
 


<div id="panel-4" class="panel">
	<div class="panel-hdr">
                                        <h2>
										<?php if ($this->method == 'edit'): ?>
	<section class="title">
    	<h4><?php echo sprintf(lang('master:edit_title'), '<i>'.$master->name.'</i>') ?></h4>
	</section>
<?php else: ?>
	<section class="title">
    	<h4><?php echo lang('master:add_title') ?></h4>
	</section>
<?php endif ?>
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content">
<?php echo form_open(uri_string(), 'class="crud"') ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput"><?php echo lang('master:name');?></label>
													<?php echo form_input('name', $master->name,' class="form-control"');?>
                                                </div>
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons">
													<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
												</div>	
												</div>
	
<?php echo form_close();?>


</div> 
</div>

</div>