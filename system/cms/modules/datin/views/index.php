 
 
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
									<?php echo form_open(base_url().'datin/search', 'class="crud"') ?>
									<div id="dt-basic-example_filter" class="dataTables_filter">
									<label> 
									<input value="<?php echo @$_SESSION['keyword']?>" name="search" type="search" class="form-control border-top-left-radius-0 border-bottom-left-radius-0 ml-0 width-lg shadow-inset-1" placeholder="Search" aria-controls="dt-basic-example">
									</label>
									<label> 
									<?php echo form_dropdown('kategorisrch',array('0'=>'--PILIH SEMUA--')+$urusan,@$_SESSION['kategori'],' class="form-control "')?>
									</label>
									<label>
									<?php echo form_dropdown('jenis_informasi', array('0'=>'--Pilih Jenis Informasi--')+$jenis,  @$_SESSION['jenis_informasi'],' class="form-control"') ?>
</label>
									<button type="submit" class="btn btn-primary btn-icon waves-effect waves-themed">
                                                        <i class="fal fa-search"></i> 
                                                    </button>
													<a data-toggle="tooltip" title="Reset Search" href="<?php echo base_url()?>datin/reset" class="btn btn-default btn-icon waves-effect waves-themed" >
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
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<div class="inner">
				 
					<?php echo $this->pagination->create_links();?>
					 
					</div>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($Datins as $Datin):?>
			<tr>
				<td><a href="javascript:void(0);" onClick="detail('<?php echo $Datin->id?>')"><?php echo $Datin->Datin_name ?></a></td>
				<td><?php echo $Datin->ji ?></td>
				<td><?php echo $Datin->mu ?></td>
				<td><?php echo date_format(date_create($Datin->tgl_dokumen),'d-m-Y') ?></td>
			 
 

				 
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
	 

<!-- Modal Right Small -->
<div class="modal fade default-example-modal-right-sm" id="modaldetail" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-right modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title h4">Data Dan Informasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                             <div id="isi">
</div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>