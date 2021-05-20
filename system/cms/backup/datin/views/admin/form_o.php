
 

 
<?php 
 
echo form_open(uri_string(), ' name="datin_frm" id="datin_frm" class="crud"') ?>
<div class="row">
    <div class="col-sm">
     
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Judul</label>
													<?php echo form_input('datin_name', $datin->datin_name,' id="datin_name" class="form-control"');?>
                                                    <input type="text" name="id" id="id" value="<?php echo $datin->id?>" style="display:none">
                                                </div>
    </div>
    <div class="col-sm">
     
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Jenis Informasi</label>
													<div class="input"><?php echo form_dropdown('jenis_informasi', $jenis_info, $datin->jenis_informasi,' class="form-control"') ?></div>
                                                </div>
    </div>
    <div class="col-sm">
      
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Urusan</label>
													<div class="input"><?php echo form_dropdown('urusan', $urusan, $datin->urusan,' class="form-control"') ?></div>
                                                </div>
    </div>
  </div>


  <div class="row" style="padding-top:30px">
    <div class="col-sm">
     
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Ringkasan Informasi</label>
													<textarea name="ringkasan" class="form-control"><?php echo $datin->ringkasan?></textarea>
                                                </div>
    </div>
    <div class="col-sm">
     
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Tgl.Dokumen</label>
													<div class="input-group">
                                                        <input name="tgl_dokumen" type="text" class="form-control " readonly="" placeholder="Select date" id="datepicker-2" value="<?php echo date_format(date_create($datin->tgl_dokumen),'Y-m-d')?>">
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
													<div class="input"><?php echo form_dropdown('status', data_enum('default_datins','status'), $datin->status,' class="form-control"') ?></div>
                                                </div>
    </div>
  </div>
  
 
    
												<div class="form-group">
												<label class="form-label" for="simpleinput"> </label>
												<div class="buttons" id="datin_button">
                                                <button type="submit" name="btnAction" value="save" class="btn btn-primary waves-effect waves-themed">
                                                <?php if ($this->method == 'edit'){ ?>
                                                   <span>Simpan Dokumen</span>
                                                   <?php }else{ ?>
                                                    <span>Next &raquo;</span>
                                                   <?php }?>
                                                </button>
												</div>	
												</div>
	
<?php echo form_close();?>

 