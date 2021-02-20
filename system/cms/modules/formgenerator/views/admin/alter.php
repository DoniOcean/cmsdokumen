 <?php
 $this->load->view('admin/partials/filters');
 

 ?>
 
   <div class="row">
		<div class="col-md-4">	
		<div class="panel panel-default ">
							<div class="panel-heading">
							<b>	<?php echo $this->uri->segment(4)?> 	<a href="javascript:void(0)" style="float:right" class="btn btn-sm btn-info" onClick="showModal('<?php echo site_url('admin/formgenerator/addField/modal');?>');"><i class="fa fa-plus"></i> Add Column</a></b>
							</div>
							<div class="panel-body">
								<ul class="list-group">
								 <?php foreach($fields_detail as $dat => $val){?>
								 <li class="list-group-item clearfix">
											 
											   <span><?php echo $val->Field?></span> &raquo; <small><?php echo $val->Type?></small> 
												<a class="btn btn-sm btn-danger" style="float: right" href="<?php echo str_replace('index/','delete_act/',uri_string()).'/'.$val->Field?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
												
												 
											 
										</li>
								 <?php }?>
								  
								</ul>
							</div>
							<div class="panel-footer text-right">
										<a href="javascript:void(0)" class="btn btn-sm btn-info" onClick="showModal('<?php echo site_url('admin/formgenerator/addField/modal');?>');"><i class="fa fa-plus"></i> Add Column</a>
									</div>
						</div>
		</div>
	</div>
 
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
						<h4>Alter Table</h4>
      				</div>
						<?php echo form_open('admin/formgenerator/alter_act', 'class="crud"'); ?>
						<input type="hidden" name="table" value="<?php echo @$this->uri->segment(4)?>">
											  <input type="hidden" name="page" value="<?php echo @$this->uri->segment(5)?>">
				    <div class="modal-body">
				        <p id="isiModal">Please wait while Loading...</p>
				    </div>
					  <?php echo form_close()?>
				    <div class="modal-footer">
				        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
				    </div>
			  	</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->