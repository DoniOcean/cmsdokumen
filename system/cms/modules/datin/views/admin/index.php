 
 
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
									<?php echo form_open(base_url().'admin/datin/search', 'class="crud"') ?>
									<div id="dt-basic-example_filter" class="dataTables_filter">
									<label> 
									<input value="<?php echo @$_SESSION['keyword']?>" name="search" type="search" class="form-control border-top-left-radius-0 border-bottom-left-radius-0 ml-0 width-lg shadow-inset-1" placeholder="Search" aria-controls="dt-basic-example">
									</label>
									<label> 
									<?php echo form_dropdown('kategorisrch',array('0'=>'--PILIH SEMUA--')+$urusan,@$_SESSION['kategori'],' class="form-control "')?>
									</label>
									<label>
									<?php echo form_dropdown('jenis_informasi', array('0'=>'--Pilih Jenis Informasi--')+$jenis, @$_SESSION['jenis_informasi'],' class="form-control"') ?>
</label>
									<button type="submit" class="btn btn-primary btn-icon waves-effect waves-themed">
                                                        <i class="fal fa-search"></i> 
                                                    </button>
													<a data-toggle="tooltip" title="Reset Search" href="<?php echo base_url()?>admin/Datin_barang/reset" class="btn btn-default btn-icon waves-effect waves-themed" >
                                                        <i class="fal fa-sync"></i> 
                                                    </a>
									</form>
<?php if ($Datins): ?>
	<div class="table-responsive-sm table-responsive-md">
    <table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Nama Dokumen</th>
				<th>Jenis Informasi</th>
				<th>Urusan</th>
				<th>Tgl.Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<div class="inner"><?php $this->load->view('admin/partials/pagination') ?></div>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($Datins as $Datin):?>
			<tr>
				<td><?php echo $Datin->Datin_name ?></td>
				<td><?php echo $Datin->ji ?></td>
				<td><?php echo $Datin->mu ?></td>
				<td><?php echo date_format(date_create($Datin->tgl_dokumen),'d-m-Y') ?></td>
				<td class="actions text-center">
			 <?php if ( ! in_array($Datin->Datin_name, array('user', 'admin'))): ?>
					<a href="<?php echo base_url().'admin/datin/delete/'.$Datin->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a>
					 	<?php endif ?>
						 <div class="dropdown d-inline-block">
							<a href="<?php echo base_url().'admin/datin/edit/'.$Datin->id?>"   class="btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0"  aria-expanded="true" title="More options" >
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