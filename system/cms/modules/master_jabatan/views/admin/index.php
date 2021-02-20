 
 
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
									<?php echo form_open(base_url().'admin/master_jabatan/search', 'class="crud"') ?>
									<div id="dt-basic-example_filter" class="dataTables_filter">
									<label> 
									<input value="<?php echo @$_SESSION['keyword']?>" name="search" type="search" class="form-control border-top-left-radius-0 border-bottom-left-radius-0 ml-0 width-lg shadow-inset-1" placeholder="Search" aria-controls="dt-basic-example">
									</label>
									<label> 
									<?php echo form_dropdown('kategorisrch',array('0'=>'--PILIH SEMUA--'),@$_SESSION['kategori'],' class="form-control "')?>
									</label>
									<button type="submit" class="btn btn-primary btn-icon waves-effect waves-themed">
                                                        <i class="fal fa-search"></i> 
                                                    </button>
													<a data-toggle="tooltip" title="Reset Search" href="<?php echo base_url()?>admin/master_jabatan_barang/reset" class="btn btn-default btn-icon waves-effect waves-themed" >
                                                        <i class="fal fa-sync"></i> 
                                                    </a>
									</form>
<?php if ($master_jabatans): ?>
	<div class="table-responsive-sm table-responsive-md">
    <table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo lang('master_jabatan:name');?></th>
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
		<?php foreach ($master_jabatans as $master_jabatan):?>
			<tr>
				<td><?php echo $master_jabatan->master_jabatan_name ?></td>
				<td class="actions text-center">
			 <?php if ( ! in_array($master_jabatan->master_jabatan_name, array('user', 'admin'))): ?>
					<a href="<?php echo base_url().'admin/master_jabatan/delete/'.$master_jabatan->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a>
					 	<?php endif ?>
						 <div class="dropdown d-inline-block">
							<a href="<?php echo base_url().'admin/master_jabatan/edit/'.$master_jabatan->id?>"   class="btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0"  aria-expanded="true" title="More options" >
								<i class="fal fa-edit"></i>
							</a>
							 
						</div>
				</td>
 

				 
			</tr>
		<?php endforeach;?>
		</tbody>
    </table>
	</div>

<?php else: ?>
	<div class="alert alert-warning" role="alert">
                                                    <strong>Oops!</strong> No Data Found!.
                                                </div>
<?php endif;?>

</div>
	</div>
	</div>
	<script>
  
				 
  document.getElementById("totaldata").innerHTML = '<?php echo $total?>';
</script>