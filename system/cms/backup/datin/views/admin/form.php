
 


<div id="panel-4" class="panel">
	<div class="panel-hdr">
                                        <h2>
										<?php if ($this->method == 'edit'): ?>
	<section class="title">
    	<h4><?php echo sprintf(lang('datin:edit_title'), '<i>'.$datin->datin_name.'</i>') ?></h4>
	</section>
<?php else: ?>
	<section class="title">
    	<h4><?php echo lang('datin:add_title') ?></h4>
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

<?php if ($this->method == 'edit'): ?>
<div id="panel-4" class="panel">
	<div class="panel-hdr">
                                        <h2> 
	<section class="title">
    	<h4>Upload Dokumen</h4>
	</section> 
                                        </h2>
                                     
                                    </div>
									<div class="panel-container show">
									<div class="panel-content">
									<?php echo form_open_multipart(base_url().'admin/datin/upload/'.$this->uri->segment('4'),' class="dropzone needsclick" style="min-height: 7rem;" id="my-dropzone"') ?>
									
                                                <div class="dz-message needsclick">
                                                    <i class="fal fa-cloud-upload text-muted mb-3"></i> <br>
                                                    <span class="text-uppercase">Drop files here or click to upload.</span>
                                                    <br>
                                                    <span class="fs-sm text-muted"></span>
                                                </div>
                                            </form>
											<div id="isi" style="margin-top:30px">
											<?php 
											$res = $this->db->where('master_id',$this->uri->segment('4'))->order_by('id','DESC')->get('datins_applied')->result();
											if($res){
											$html ='<table class="table table-bordered table-striped m-0" cellspacing="0" >';
											$html .='<thead>
														<tr>
															<th>Dokumen</th>
															<th width="10%">Hapus</th>
														</tr>
													</thead><tbody>';
											foreach($res as $val){
												$html .= '<tr>';
												$html .= '<td>';
												$html .= $val->dokumen;
												$html .= '</td>';
												$html .= '<td class="actions text-center">';
												$html .= '<a href="javascript:void(0);" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1 waves-effect waves-themed" title="Delete Record" onclick="return hapus(\''.$val->id.' \')">
												<i class="fal fa-times"></i>
											</a>';
												$html .= '</td>';
												$html .= '</tr>';
											}
									
											$html .= '</tbody></table>';
											echo $html;
										}
											?>
</div>

</div> 
</div>
</div>
<?php endif ?>