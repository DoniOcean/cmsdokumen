<div>
	 <div class="panel panel-default">
	     <?php if ($categories): ?>
       <div class="panel-heading">
	<h3><?php echo lang('cat_list_title'); ?></h3>
       </div>
<div class="panel-body">
						<form class="form-inline no-margin" action="<?php echo site_url('admin/'.$this->MNAME.'/categories/index')?>" method="post">
							<div class="row">
								<div class="col-md-5">
									<div class="input-group">
							            <input class="form-control input-sm" type="text" name="search">
							            <div class="input-group-btn">
							            	<button type="submit" class="btn btn-sm btn-success" tabindex="-1">Search</button> 
							            </div> <!-- /input-group-btn -->
							        </div> <!-- /input-group -->
								</div><!-- /.col -->
							</div><!-- /.row -->
						</form>
					</div>
	<?php echo form_open('admin/blog/categories/delete'); ?>

	<table border="0" class="table table-bordered table-condensed table-hover table-striped">
		<thead>
		<tr>
			<th width="20">
			  	<label class="label-checkbox">
										<?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all')); ?>

										<span class="custom-checkbox"></span>
									</label>

                </th>
			<th style="width:50px">ID</th>
			<th><?php echo lang('cat_category_label'); ?></th>
			<th>Slug</th>
			<th>Url</th>
			<th width="200" class="align-center"><span><?php echo lang('cat_actions_label'); ?></span></th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="4">
					<div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach ($categories as $category): ?>
			<tr>
				
				<td>	<label class="label-checkbox">
										<?php echo form_checkbox('action_to[]', $category->id); ?>
										<span class="custom-checkbox"></span>
									</label></td>
				<td>
					<?php echo $category->id?>
				</td>
				
				
				
				<td><?php echo $category->title; ?></td>
				<td>
					<?php echo $category->slug?>
				</td>
				<td>
					<?php echo site_url($this->MNAME.'/category/'.$category->slug)?>
				</td>
				
                <td class="align-center buttons buttons-small">
						<div class="btn-group">
							<button class="btn btn-success btn-sm" data-toggle="dropdown">Action</button>
							<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-sm"><span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li>	<?php echo anchor('admin/'.$this->MNAME.'/categories/edit/' . $category->id, 'Edit', 'class="button edit"'); ?> </li>
								<li><?php echo anchor('admin/'.$this->MNAME.'/categories/delete/' . $category->id, 'Delete', 'class="confirm button delete confirm PopConfirm_open"') ;?>   </li>

							</ul>
						</div>



					</td>


			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div class="buttons align-right padding-top">
	    <div class="panel-heading">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete') )); ?>
	    </div>
	</div>

	<?php echo form_close(); ?>

<?php else: ?>
	<div class="blank-slate">
		<h2><?php echo lang('cat_no_categories'); ?></h2>
	</div>
<?php endif; ?>
	 </div>
</div>