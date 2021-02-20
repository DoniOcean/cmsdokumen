
 

 <style>
 .row{
	margin-top:10px;
 }

 </style>
 <?php echo form_open(uri_string(), ' name="pegawai_frm" id="pegawai_frm" class="crud" onSubmit="return cek();"') ?>
 <input type="text" id="user_id" value="<?php echo @$pegawai->id?>" style="display:none">   
 <div id="panel-4" class="panel">
	<div class="panel-hdr">
                                        <h2>
										<?php if ($this->method == 'edit'): ?>
	<section class="title">
    	<h4><?php echo sprintf(lang('pegawai:edit_title'), '<i>'.$pegawai->display_name.'</i>') ?></h4>
	</section>
<?php else: ?>
	<section class="title">
    	<h4><?php echo lang('pegawai:add_title') ?></h4>
	</section>
<?php endif ?>
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content">



<div class="row">
<div class="col-md-4">
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Nama Lengkap</label>
													<?php echo form_input('display_name', $pegawai->display_name,' id="display_name " class="form-control" required');?>
													<div class="invalid-feedback">
                                                               Nama lengkap wajib diisi!
															</div>
														</div>
</div>
<div class="col-md-4">
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">NRK</label>
													<?php echo form_input('NRK', $pegawai->NRK,' id="NRK" class="form-control" required');?>
                                                </div>
</div>
<div class="col-md-4">
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">NIP</label>
													<?php echo form_input('NIP', $pegawai->NIP,' id="NIP" class="form-control" required');?>
                                                </div>
</div>
</div>


<div class="row">
<div class="col-md-4">
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Pangkat</label>
													<?php echo form_dropdown('id_pangkat',array('Pilih Pangkat')+$pangkat, $pegawai->id_pangkat,' id="id_pangkat" class="form-control" required');?>
                                                </div>
</div>
<div class="col-md-4">
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Jabatan</label>
													<?php echo form_dropdown('id_jabatan',array('Pilih Jabatan')+$jabatan, $pegawai->id_jabatan,' id="id_jabatan" class="form-control" required');?>
                                                </div>
</div>
<div class="col-md-4">
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Satuan Kerja</label>
													<?php echo form_dropdown('id_satuan_kerja',array('Pilih Satuan Kerja')+$satuan_kerja, $pegawai->id_satuan_kerja,' id="id_satuan_kerja" class="form-control" required');?>
                                                </div>
</div>
</div>

<div class="row" style="margin-bottom:20px">
<div class="col-md-4">
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Email <small>*Digunakan untuk login</small></label>
													<?php echo form_input('email', $pegawai->email,' id="email" class="form-control" required');?>
                                                </div>
</div>
<div class="col-md-4">
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Password <small>*Digunakan untuk login</small></label>
													<?php echo form_input('password', @$pegawai->password,' id="password" class="form-control"');?>
                                                </div>
</div>
<div class="col-md-4">
<div class="form-group" style="margin-top:20px">
<?php if($this->uri->segment('3')=='edit'){ $button='Update Data Pegawai';}else{$button='Tambah Data Pegawai';}?>
<button class="btn btn-md btn-primary" id="btnpegawai"> <?php echo $button?></button>
</div>
</div>
</div>
											
	


</div> 
</div>
</div>
	 
<?php echo form_close();?>
<?php if($this->uri->segment('3')=='edit'){?>
<div id="panel-4" class="panel">
	<div class="panel-hdr"> 
	<h2>
	<section class="title">
    	<h4>Berkas Jabatan Struktural</h4>
	</section> 
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content">

<!-- Jabatan struktural -->
<div clasd="row">
<button class="btn btn-primary waves-effect waves-themed" icon="fa-plus" onClick="dokumen('Jabatan Struktural');"><span class="fal fa-plus mr-1" ></span>Tambah jabatan struktural</button>
</div>
<div clasd="row" style="margin-top:10px">
<table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Nama Jabatan Struktural</th>
				<th class="text-center">Tgl awal Menjabat</th>
				<th class="text-center">Tgl akhir Menjabat</th>
				<th class="text-center">Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					 
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php 
		$js = $this->db->where('id_pegawai',$pegawai->id)->where('kategori','Jabatan Struktural')->order_by('mulai','DESC')->get('pegawai_dokumen')->result();
		if($js){
		foreach ($js as $resjs){?>
<tr>
<td>
<?php echo $resjs->nama?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->mulai),'d-m-Y')?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->akhir),'d-m-Y')?>
</td>
<td class="text-center">
<a href="<?php echo base_url().'assets/images/pegawai/'.$resjs->dok_path?>" type="button" class="btn btn-xs btn-info waves-effect waves-themed">Download</a>

</td>
<td class="text-center">
<a href="<?php echo base_url().'admin/pegawai/rs/delete/?id='.$resjs->id.'&user_id='.@$pegawai->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a> 
</td>
</tr>

		<?php }}?>
		</tbody>
		</table>
 </div>
 
									</div>
									</div>
									</div>

									<!-- jabatan non struktural -->
 <div id="panel-4" class="panel">
	<div class="panel-hdr"> 
	<h2>
	<section class="title">
    	<h4>Berkas Jabatan Fungsional</h4>
	</section> 
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content"> 
<div clasd="row">
<button class="btn btn-primary waves-effect waves-themed" icon="fa-plus" onClick="dokumen('Jabatan Fungsional');"><span class="fal fa-plus mr-1" ></span>Tambah Jabatan Fungsional</button>
</div>
<div clasd="row" style="margin-top:10px">
<table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Nama Jabatan Fungsional</th>
				<th class="text-center">Tgl awal Menjabat</th>
				<th class="text-center">Tgl akhir Menjabat</th>
				<th class="text-center">Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					 
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php 
		$js = $this->db->where('id_pegawai',$pegawai->id)->where('kategori','Jabatan Fungsional')->order_by('mulai','DESC')->get('pegawai_dokumen')->result();
		if($js){
		foreach ($js as $resjs){?>
<tr>
<td>
<?php echo $resjs->nama?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->mulai),'d-m-Y')?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->akhir),'d-m-Y')?>
</td>
<td class="text-center">
<a href="<?php echo base_url().'assets/images/pegawai/'.$resjs->dok_path?>" type="button" class="btn btn-xs btn-info waves-effect waves-themed">Download</a>

</td>
<td class="text-center">
<a href="<?php echo base_url().'admin/pegawai/rs/delete/?id='.$resjs->id.'&user_id='.@$pegawai->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a> 
</td>
</tr>

		<?php }}?>
		</tbody>
		</table>
 </div>
 </div>
</div>
</div>

<!-- jabatan non struktural -->
<div id="panel-4" class="panel">
	<div class="panel-hdr"> 
	<h2>
	<section class="title">
    	<h4>Berkas Pendidikan Formal</h4>
	</section> 
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content"> 
<div clasd="row">
<button class="btn btn-primary waves-effect waves-themed" icon="fa-plus" onClick="dokumen('Pendidikan Formal');"><span class="fal fa-plus mr-1" ></span>Tambah Pendidikan Formal</button>
</div>
<div clasd="row" style="margin-top:10px">
<table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Nama Pendidikan Formal</th>
				<th class="text-center">Tgl masuk </th>
				<th class="text-center">Tgl lulus</th>
				<th class="text-center">Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					 
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php 
		$js = $this->db->where('id_pegawai',$pegawai->id)->where('kategori','Pendidikan Formal')->order_by('mulai','DESC')->get('pegawai_dokumen')->result();
		if($js){
		foreach ($js as $resjs){?>
<tr>
<td>
<?php echo $resjs->nama?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->mulai),'d-m-Y')?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->akhir),'d-m-Y')?>
</td>
<td class="text-center">
<a href="<?php echo base_url().'assets/images/pegawai/'.$resjs->dok_path?>" type="button" class="btn btn-xs btn-info waves-effect waves-themed">Download</a>

</td>
<td class="text-center">
<a href="<?php echo base_url().'admin/pegawai/rs/delete/?id='.$resjs->id.'&user_id='.@$pegawai->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a> 
</td>
</tr>

		<?php }}?>
		</tbody>
		</table>
 </div>
 </div>
</div>
</div>

<!-- jabatan non formal -->
<div id="panel-4" class="panel">
	<div class="panel-hdr"> 
	<h2>
	<section class="title">
    	<h4>Berkas Pendidikan Non-Formal</h4>
	</section> 
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content"> 
<div clasd="row">
<button class="btn btn-primary waves-effect waves-themed" icon="fa-plus" onClick="dokumen('Pendidikan Non-Formal');"><span class="fal fa-plus mr-1" ></span>Tambah Pendidikan Non-Formal</button>
</div>
<div clasd="row" style="margin-top:10px">
<table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Nama Pendidikan Non-Formal</th>
				<th class="text-center">Tgl masuk </th>
				<th class="text-center">Tgl lulus</th>
				<th class="text-center">Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					 
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php 
		$js = $this->db->where('id_pegawai',$pegawai->id)->where('kategori','Pendidikan Non-Formal')->order_by('mulai','DESC')->get('pegawai_dokumen')->result();
		if($js){
		foreach ($js as $resjs){?>
<tr>
<td>
<?php echo $resjs->nama?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->mulai),'d-m-Y')?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->akhir),'d-m-Y')?>
</td>
<td class="text-center">
<a href="<?php echo base_url().'assets/images/pegawai/'.$resjs->dok_path?>" type="button" class="btn btn-xs btn-info waves-effect waves-themed">Download</a>

</td>
<td class="text-center">
<a href="<?php echo base_url().'admin/pegawai/rs/delete/?id='.$resjs->id.'&user_id='.@$pegawai->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a> 
</td>
</tr>

		<?php }}?>
		</tbody>
		</table>
 </div>
 </div>
</div>
</div>

<!-- pangkat -->
<div id="panel-4" class="panel">
	<div class="panel-hdr"> 
	<h2>
	<section class="title">
    	<h4>Berkas Kepangkatan</h4>
	</section> 
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content"> 
<div clasd="row">
<button class="btn btn-primary waves-effect waves-themed" icon="fa-plus" onClick="dokumen('Pangkat');"><span class="fal fa-plus mr-1" ></span>Tambah Kepangkatan</button>
</div>
<div clasd="row" style="margin-top:10px">
<table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Pangkat</th>
				<th class="text-center">Tgl Diperoleh </th>
				<th class="text-center">Tgl Akhir</th>
				<th class="text-center">Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					 
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php 
		$js = $this->db->where('id_pegawai',$pegawai->id)->where('kategori','Pangkat')->order_by('mulai','DESC')->get('pegawai_dokumen')->result();
		if($js){
		foreach ($js as $resjs){?>
<tr>
<td>
<?php echo $resjs->nama?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->mulai),'d-m-Y')?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->akhir),'d-m-Y')?>
</td>
<td class="text-center">
<a href="<?php echo base_url().'assets/images/pegawai/'.$resjs->dok_path?>" type="button" class="btn btn-xs btn-info waves-effect waves-themed">Download</a>

</td>
<td class="text-center">
<a href="<?php echo base_url().'admin/pegawai/rs/delete/?id='.$resjs->id.'&user_id='.@$pegawai->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a> 
</td>
</tr>

		<?php }}?>
		</tbody>
		</table>
 </div>
 </div>
</div>
</div>


<!-- pangkat -->
<div id="panel-4" class="panel">
	<div class="panel-hdr"> 
	<h2>
	<section class="title">
    	<h4>Berkas Gaji</h4>
	</section> 
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content"> 
<div clasd="row">
<button class="btn btn-primary waves-effect waves-themed" icon="fa-plus" onClick="dokumen('Gaji');"><span class="fal fa-plus mr-1" ></span>Tambah Gaji</button>
</div>
<div clasd="row" style="margin-top:10px">
<table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Nama</th>
				<th class="text-center">Tgl Diperoleh </th>
				<th class="text-center">Tgl Akhir</th>
				<th class="text-center">Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					 
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php 
		$js = $this->db->where('id_pegawai',$pegawai->id)->where('kategori','Gaji')->order_by('mulai','DESC')->get('pegawai_dokumen')->result();
		if($js){
		foreach ($js as $resjs){?>
<tr>
<td>
<?php echo $resjs->nama?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->mulai),'d-m-Y')?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->akhir),'d-m-Y')?>
</td>
<td class="text-center">
<a href="<?php echo base_url().'assets/images/pegawai/'.$resjs->dok_path?>" type="button" class="btn btn-xs btn-info waves-effect waves-themed">Download</a>

</td>
<td class="text-center">
<a href="<?php echo base_url().'admin/pegawai/rs/delete/?id='.$resjs->id.'&user_id='.@$pegawai->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a> 
</td>
</tr>

		<?php }}?>
		</tbody>
		</table>
 </div>
 </div>
</div>
</div>


<!-- pangkat -->
<div id="panel-4" class="panel">
	<div class="panel-hdr"> 
	<h2>
	<section class="title">
    	<h4>Berkas Personal Keluarga</h4>
	</section> 
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content"> 
<div clasd="row">
<button class="btn btn-primary waves-effect waves-themed" icon="fa-plus" onClick="dokumen('Personal');"><span class="fal fa-plus mr-1" ></span>Tambah Dokumen Personal Keluarga</button>
</div>
<div clasd="row" style="margin-top:10px">
<table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Nama Dokumen</th>
				<th class="text-center">Tgl Diperoleh </th>
				<th class="text-center">Tgl Akhir</th>
				<th class="text-center">Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					 
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php 
		$js = $this->db->where('id_pegawai',$pegawai->id)->where('kategori','Personal')->order_by('mulai','DESC')->get('pegawai_dokumen')->result();
		if($js){
		foreach ($js as $resjs){?>
<tr>
<td>
<?php echo $resjs->nama?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->mulai),'d-m-Y')?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->akhir),'d-m-Y')?>
</td>
<td class="text-center">
<a href="<?php echo base_url().'assets/images/pegawai/'.$resjs->dok_path?>" type="button" class="btn btn-xs btn-info waves-effect waves-themed">Download</a>

</td>
<td class="text-center">
<a href="<?php echo base_url().'admin/pegawai/rs/delete/?id='.$resjs->id.'&user_id='.@$pegawai->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a> 
</td>
</tr>

		<?php }}?>
		</tbody>
		</table>
 </div>
 </div>
</div>
</div>

<!-- pangkat -->
<div id="panel-4" class="panel">
	<div class="panel-hdr"> 
	<h2>
	<section class="title">
    	<h4>Berkas Sasaran Kinerja</h4>
	</section> 
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content"> 
<div clasd="row">
<button class="btn btn-primary waves-effect waves-themed" icon="fa-plus" onClick="dokumen('Sasaran');"><span class="fal fa-plus mr-1" ></span>Tambah Sasaran Kinerja</button>
</div>
<div clasd="row" style="margin-top:10px">
<table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Nama Dokumen</th>
				<th class="text-center">Tgl Diperoleh </th>
				<th class="text-center">Tgl Akhir</th>
				<th class="text-center">Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					 
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php 
		$js = $this->db->where('id_pegawai',$pegawai->id)->where('kategori','Sasaran')->order_by('mulai','DESC')->get('pegawai_dokumen')->result();
		if($js){
		foreach ($js as $resjs){?>
<tr>
<td>
<?php echo $resjs->nama?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->mulai),'d-m-Y')?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->akhir),'d-m-Y')?>
</td>
<td class="text-center">
<a href="<?php echo base_url().'assets/images/pegawai/'.$resjs->dok_path?>" type="button" class="btn btn-xs btn-info waves-effect waves-themed">Download</a>

</td>
<td class="text-center">
<a href="<?php echo base_url().'admin/pegawai/rs/delete/?id='.$resjs->id.'&user_id='.@$pegawai->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a> 
</td>
</tr>

		<?php }}?>
		</tbody>
		</table>
 </div>
 </div>
</div>
</div>


<!-- pangkat -->
<div id="panel-4" class="panel">
	<div class="panel-hdr"> 
	<h2>
	<section class="title">
    	<h4>Berkas Dokumen Lain</h4>
	</section> 
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content"> 
<div clasd="row">
<button class="btn btn-primary waves-effect waves-themed" icon="fa-plus" onClick="dokumen('Dokumen Lain');"><span class="fal fa-plus mr-1" ></span>Tambah Dokumen Lain</button>
</div>
<div clasd="row" style="margin-top:10px">
<table class="table table-bordered table-striped m-0" cellspacing="0">
		<thead>
			<tr>
				<th>Nama Dokumen</th>
				<th class="text-center">Tgl Diperoleh </th>
				<th class="text-center">Tgl Akhir</th>
				<th class="text-center">Dokumen</th>
				<th width="10%"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="3">
					 
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php 
		$js = $this->db->where('id_pegawai',$pegawai->id)->where('kategori','Dokumen Lain')->order_by('mulai','DESC')->get('pegawai_dokumen')->result();
		if($js){
		foreach ($js as $resjs){?>
<tr>
<td>
<?php echo $resjs->nama?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->mulai),'d-m-Y')?>
</td>
<td class="text-center">
<?php echo date_format(date_create($resjs->akhir),'d-m-Y')?>
</td>
<td class="text-center">
<a href="<?php echo base_url().'assets/images/pegawai/'.$resjs->dok_path?>" type="button" class="btn btn-xs btn-info waves-effect waves-themed">Download</a>

</td>
<td class="text-center">
<a href="<?php echo base_url().'admin/pegawai/rs/delete/?id='.$resjs->id.'&user_id='.@$pegawai->id?>" class="btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1" title="Delete Record" onclick="return confirm('Do you want to delete this data? ')">
							<i class="fal fa-times"></i>
						</a> 
</td>
</tr>

		<?php }}?>
		</tbody>
		</table>
 </div>
 </div>
</div>
</div>


<?php }?>

<?php if($this->uri->segment('3')=='edit'){?>
	<script>
		 
		 function cek(){
     return true;
 
 }
		</script>
<?php }else{?>
	<script>
		 function cek(){
     if($('#password').val().length <= 6){
         alert('Password harus lebih dari 6 karakter!');
         return false;
	 }
	 
	 if(empty($('#password').val())){
         alert('Password Tidak boleh kosong');
         return false;
     }
 
 }
		</script>
<?php }?>