<?php 
if(@$notice['error']){ ?>
        <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error!</strong> <?php echo $notice['error']; ?>
                    </div>
<?php }
?>
<h3 class="subtitle">Pendaftaran Anggota</h3>
 
<?php echo form_open('users/pendaftaran', array('id'=>'register','onSubmit'=>'return cek();')) ?>
<div class="form-group float-label active">
<label class="form-control-label">Referal</label>
                    <input name="referal" type="text" class="form-control" required value="<?php echo (@$post->referal)?@$post->referal:$this->input->get('referal')?>" >
                    
                </div>
                <div class="form-group float-label active">
                <label class="form-control-label">No.KTP</label>
                    <input type="text" name="ktp" class="form-control" required value="<?php echo @$post->ktp?>" >
                    
                </div>
                 <div class="form-group float-label active">
                 <label class="form-control-label">Nama</label>
                    <input type="text" name="name" class="form-control" required value="<?php echo @$post->name?>" >
                    
                </div>
               
                
                <div class="form-group float-label active">
                <label for="inputEmail" class="form-control-label">Email</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo @$post->email?>" required autofocus>
                  
                </div>
                <div class="form-group float-label active">
                <label for="inputEmail" class="form-control-label">Keanggotaan</label>
                    <?php echo form_dropdown('group_id',array('6'=>'Anggota','5'=>'Agen','4'=>'Distributor','13'=>'Gema Gajar Perjuangan','12' => 'Koordinator distributor'),@$post->group_id,' id="group_id" class="form-control" onChange="extend(this.value)"');?>
                   
                </div>
                <div class="distributor">
<div class="form-group float-label active">
<label class="form-control-label">ID Distributor</label>
                    <input type="text" name="distributor_id" class="form-control"  value="<?php echo @$post->distributor_id?>" >
                    
                </div>
</div>
                <div class="form-group float-label active">
                <label class="form-control-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" required value="<?php echo @$post->alamat?>" >
                    
                </div>
             <div id="wilayah">
             <div class="form-group float-label active">
<label class="form-control-label">ID Koordiator Distributor</label>
                    <input type="text" name="id_koordinator_distributor" id="id_koordinator_distributor" class="form-control"  value="<?php echo @$post->id_koordinator_distributor?>" >
                    
                </div>

                <div class="form-group float-label active">
                <label for="inputEmail" class="form-control-label">Provinsi</label>
                     <select name="provinsi_id" id="provinsi_id" class="form-control" onChange="kota(this.value)" ></select>
                   
                </div> 
                <div class="form-group float-label active">
                <label for="inputEmail" class="form-control-label">Kabupaten</label>
                     <select name="kabupaten_id" id="kabupaten_id" class="form-control" onChange="kecamatan(this.value)" ></select>
                   
                </div> 
                <div class="form-group float-label active">
                <label for="inputEmail" class="form-control-label">Kecamatan</label>
                     <select name="kecamatan_id" id="kecamatan_id" class="form-control" onChange="kelurahan(this.value)" ></select>
                    
                </div> 
                <div class="form-group float-label active">
                <label for="inputEmail" class="form-control-label">Kelurahan</label>
                     <select name="kelurahan_id" id="kelurahan_id" class="form-control"  ></select>
                   
                </div> 
</div>


                <div class="form-group float-label">
                <label for="inputPassword" class="form-control-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="" required>
                   
                </div>

                <div class="form-group my-4 text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label" for="rememberme">I accept <a href="#">Terms and Condition</a></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-auto">
                        <button class="button button-3d button-black nomargin"><span>Sign Up</span></button>
                    </div>
                </div>
            </form>