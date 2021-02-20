
 


<div id="panel-4" class="panel">
	<div class="panel-hdr">
                                        <h2>
										<?php if ($this->method == 'edit'): ?>
	<section class="title">
    	<h4><?php echo sprintf(lang('keywords:edit_title'), '<i>'.$keyword->name.'</i>') ?></h4>
	</section>
<?php else: ?>
	<section class="title">
    	<h4><?php echo lang('keywords:add_title') ?></h4>
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
                                                    <label class="form-label" for="simpleinput"><?php echo lang('keywords:name');?></label>
													<?php echo form_input('name', $keyword->name,' class="form-control"');?>
                                                </div>
 
    
	<div class="buttons">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
	</div>	
	
<?php echo form_close();?>


</div> 
</div>

<script type="text/javascript">
	jQuery(function($) {
		$('form input[name="name"]').keyup($.debounce(100, function(){
			$(this).val( this.value.toLowerCase().replace(',', '') );
		}));
	});
</script>