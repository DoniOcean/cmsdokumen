
 

 
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
     <?php
     for($i=1;$i<=31;$i++){
        $array_bulan[$i]=$i;
     }
     for($i=2010;$i<=date('Y');$i++){
        $array_tahun[$i]=$i;
     }
     
     ?>
<div class="form-group">
                                                    <label class="form-label" for="simpleinput">Bulan & Tahun</label>
													<div class="input-group">

                                                    <?php echo form_dropdown('bulan', array('0'=>'Bulan')+$array_bulan, $datin->bulan,' class="form-control"') ?>
                                                    <?php echo form_dropdown('tahun', array('0'=>'Tahun')+$array_tahun, $datin->tahun,' class="form-control"') ?>
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

 