 
 

<?php if ($keywords): ?>
	<div id="panel-4" class="panel">
	<div class="panel-hdr">
                                        <h2>
                                            <?php echo $module_details['name']?> <span class="fw-300"><i>Tables</i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content">
    <table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo lang('keywords:name');?></th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					<div class="inner"><?php $this->load->view('admin/partials/pagination') ?></div>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($keywords as $keyword):?>
			<tr>
				<td><?php echo $keyword->name ?></td>
				<td class="actions">
				<?php echo anchor('admin/keywords/edit/'.$keyword->id, '<i class="fal fa-edit"></i>', 'alt="Edit" class="btn btn-success btn-xs btn-icon waves-effect waves-themed"   data-toggle="tooltip" title="Edit" data-original-title="Edit"') ?>
				<?php if ( ! in_array($keyword->name, array('user', 'admin'))): ?>
					<?php echo anchor('admin/keywords/delete/'.$keyword->id, '<i class="fal fa-times"></i>', ' onclick="return confirm(\'Do you want to delete this data? \')" class="confirm btn btn-danger btn-xs btn-icon waves-effect waves-themed delete"    title="Delete" data-original-title="Delete"') ?>
				<?php endif ?>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
    </table>
	</div>
	</div>
	</div>

<?php else: ?>
	<div class="no_data"><?php echo lang('keywords:no_keywords');?></div>
<?php endif;?>

 