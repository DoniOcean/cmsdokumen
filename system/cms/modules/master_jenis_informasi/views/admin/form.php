
 


<div id="panel-4" class="panel">
	<div class="panel-hdr">
                                        <h2>
										<?php if ($this->method == 'edit'): ?>
	<section class="title">
    	<h4><?php echo sprintf(lang('master_jenis_informasi:edit_title'), '<i>'.$master_jenis_informasi->master_jenis_informasi_name.'</i>') ?></h4>
	</section>
<?php else: ?>
	<section class="title">
    	<h4><?php echo lang('master_jenis_informasi:add_title') ?></h4>
	</section>
<?php endif ?>
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content">
 <?php include('form_o.php')?>

</div> 
</div>
</div>