
 

 
<?php echo form_open(uri_string(), ' name="Datin_frm" id="Datin_frm" class="crud"') ?>
<div class="row">
    <div class="col-sm">
     
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Judul</label>
													<?php echo form_input('Datin_name', $Datin->Datin_name,' id="Datin_name" class="form-control"');?>
                                                    <input type="text" name="id" id="id" value="<?php echo $Datin->id?>" style="display:none">
                                                </div>
    </div>
    <div class="col-sm">
     
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Jenis Informasi</label>
													<div class="input"><?php echo form_dropdown('jenis_informasi', $jenis_info, $Datin->jenis_informasi,' class="form-control"') ?></div>
                                                </div>
    </div>
    <div class="col-sm">
      
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Urusan</label>
													<div class="input"><?php echo form_dropdown('urusan', $urusan, $Datin->urusan,' class="form-control"') ?></div>
                                                </div>
    </div>
  </div>


  <div class="row" style="padding-top:30px">
    <div class="col-sm">
     
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Ringkasan Informasi</label>
													<textarea name="ringkasan" class="form-control"><?php echo $Datin->ringkasan?></textarea>
                                                </div>
    </div>
    <div class="col-sm">
     
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Tgl.Dokumen</label>
													<div class="input-group">
                                                        <input name="tgl_dokumen" type="text" class="form-control " readonly="" placeholder="Select date" id="datepicker-2" value="<?php echo date_format(date_create($Datin->tgl_dokumen),'Y-m-d')?>">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text fs-xl">
                                                                <i class="fal fa-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
    </div>
    <div class="col-sm">
      
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Hak Akses</label>
													<div class="input"><?php echo form_dropdown('status', data_enum('default_datins','status'), $Datin->status,' class="form-control"') ?></div>
                                                </div>
    </div>
  </div>
  
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons" id="Datin_button">
                                                <button type="submit" name="btnAction" value="save" class="btn btn-primary waves-effect waves-themed">
                                                <?php if ($this->method == 'edit'){ ?>
                                                   <span>Edit Dokumen</span>
                                                   <?php }else{ ?>
                                                    <span>Simpan & Upload Dokumen</span>
                                                   <?php }?>
                                                </button>
												</div>	
												</div>
	
<?php echo form_close();?>

 