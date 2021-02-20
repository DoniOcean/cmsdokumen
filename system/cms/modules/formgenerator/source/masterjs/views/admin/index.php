 
 
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
									<?php echo form_open(base_url().'admin/master/search', 'class="crud"') ?>
									<div id="dt-basic-example_filter" class="dataTables_filter"><label> <input value="<?php echo @$_SESSION['keyword']?>" name="search" type="search" class="form-control border-top-left-radius-0 border-bottom-left-radius-0 ml-0 width-lg shadow-inset-1" placeholder="Search" aria-controls="dt-basic-example"></label>
									<button type="submit" class="btn btn-primary btn-icon waves-effect waves-themed">
                                                        <i class="fal fa-search"></i> 
													</button>
													<a data-toggle="tooltip" title="Reset Search" href="<?php echo base_url()?>admin/master/reset" class="btn btn-default btn-icon waves-effect waves-themed" >
                                                        <i class="fal fa-sync"></i> 
                                                    </a>
									</div>
									</form>
<?php if ($masters): ?>
	
    <table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo lang('master:name');?></th>
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
		<?php foreach ($masters as $master):?>
			<tr>
				<td><?php echo $master->name ?></td>
				<td class="actions text-center">
			 <?php if ( ! in_array($master->name, array('user', 'admin'))): ?>
					<a href="<?php echo base_url().'admin/master/delete/'.$master->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a>
					 	<?php endif ?>
						 <div class="dropdown d-inline-block">
							<a href="javascript:void(0)"   class="btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0" data-toggle="dropdown" aria-expanded="true" title="More options" onClick="edit('<?php echo $master->id?>')">
								<i class="fal fa-edit"></i>
							</a>
							 
						</div>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
    </table>
	

<?php else: ?>
	<div class="alert alert-warning" role="alert">
                                                    <strong>Oops!</strong> No Data Found!.
                                                </div>
<?php endif;?>

</div>
	</div>
	</div>


	<?php echo form_open(uri_string().'/add', 'class="crud" id="frm"') ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput"><?php echo lang('master_barang:name');?></label>
													<?php echo form_input('name', '',' id="name" class="form-control" required');?>
                                                </div>
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons">
													<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'cancel') )) ?>
												</div>	
												</div>
	
<?php echo form_close();?>
	<script type="text/javascript">
	jQuery(function($) {
		$('form input[name="name"]').keyup($.debounce(100, function(){
			$(this).val( this.value.toLowerCase().replace(',', '') );
		}));
	});

	function edit(id){
		$('#master_add').attr("href","javascript:void(0);");
		$('.default-example-modal-right-sm').modal('show'); 
		api('<?php echo base_url()?>admin/master/getid/'+id,'get','form', resEdit);
	}

function resEdit(data){
	$.each(data, function(i, item) {
		$('#name').val(item.name);
		$('#frm').attr("action","admin/master/edit/"+item.id);
  });
		 
	}

$( "#master_add" ).click(function() {
	$('#name').val('');
	$('#frm').attr("action","admin/master/add");
});
 
	$(document).ready(function()
            {
                $(function()
                { 
					$('#totaldata').html('<?php echo $total?>');
				 
                });
            }); 
</script>