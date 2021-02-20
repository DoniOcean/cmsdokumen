<?php if (@$blog): ?>

	<?php echo form_open('admin/blog/action'); ?>
 
	<div>
	 <div class="panel panel-default">
								<div class="panel-body">
								 <div class="row"><span>Total</span> <span class="badge badge-success m-left-xs"><?php echo $total?></span></div>
								<br>
							<table class="table table-bordered table-condensed table-hover table-striped">
								<thead>
								 
				<th>Nama</th>
				<th>Provinsi</th>
				<th>Tgl Input</th>
				<th>Input By</th> 
				<th class="text-center"><span>Action</span></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($blog as $post): ?>
				<tr>
					 
					<td><?php echo $post->title; ?></td>
					<td><?php echo $post->category_title;
				
				 
				
			//		$json =  unserialize($post->json_data) ;?></td>
					<td><?php echo format_date($post->created_on); ?></td>
					<td>
					<?php if ($post->author): ?>
						<?php echo anchor('user/' . $post->createdby, $post->author->display_name, 'target="_blank"'); ?>
					<?php else: ?>
						<?php echo lang('blog_author_unknown'); ?>
					<?php endif; ?>
					</td> 
					<td class="text-center buttons buttons-small">
						<div class="btn-group">
							<button class="btn btn-success btn-sm" data-toggle="dropdown">Action</button>
							<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-sm"><span class="caret"></span></button>
							<ul class="dropdown-menu">
								<li><a href="javascript:void(0)" id="myBtn" role="button" data-toggle="modal" onClick="showModal('<?php echo site_url('admin/'.$this->MNAME.'/preview/'.$post->id).'/modal';?>')" > <i class="fa fa-eye"></i> View</a></li>
							 <li><?php echo anchor('admin/'.$this->MNAME.'/edit/' . $post->id, 'Edit', 'class="button edit"'); ?></li>

								<li class="divider"></li>
								<li><?php echo anchor('admin/'.$this->MNAME.'/delete/' . $post->id, 'Delete', array('class'=>'confirm button delete confirm PopConfirm_open','value'=>'coba')); ?></li>
							</ul>
						</div>


						
					</td>
				</tr>
			<?php endforeach; ?>
									 
								</tbody>
							</table>
							<div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
                                 
						</div>
		</div> 
	 </div>
 
	 
<?php else: ?>
	<div class="closable notification success alert alert-warning">
	<?php echo lang('blog_currently_no_posts'); ?></div>
<?php endif; ?>
<script>
function showModal(data)
			{
				 
					// var uid = $(this).data('id');
					$("#myModal").modal();
					$('#isiModal').load(data, {}, function() {
						  
					}); 
					 
			} 
  </script>


 <!--Modal-->
		<div class="modal fade" id="myModal">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>View Data</h4>
      				</div>
				    <div class="modal-body">
				        <p id="isiModal">Please wait while Loading...</p>
				    </div>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->