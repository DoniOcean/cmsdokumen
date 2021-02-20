function dokumen(a){
    $('#main-modal').modal('show');
    $('#main-title').html('Form '+a);
   
    var id = $('#user_id').val();
    var html ='<form action="admin/pegawai/struktural_add" name="strukturalfrm" method="post" id="strukturalfrm" class="crud" enctype="multipart/form-data" >';
    html += '<div style="display:none;">';
    html += '<input type="text" name="csrf_hash_name" id="csrf" value="14a6e9d3aafa2b6a8ee5959ce771c6c7" />';
    html += '<input type="text" name="user_id" id="user_id" value="'+id+'" />';
    html += '<input type="text" name="kategori" id="user_id" value="'+a+'" />';
    html += '</div>';

    if(a==='Pangkat'){
        
    html +='<div class="form-group">';
    html +='<label class="form-label" for="simpleinput">Pangkat</label>';
    html +='<select name="namajabatan" id="namajabatan" class="form-control" required=""><option value="">--Pilih Pangkat--</option></select>';
    html +='</div>';
    getOptions('namajabatan','admin/pegawai/pangkat');
    }else{
        html +='<div class="form-group">';
        html +='<label class="form-label" for="simpleinput">Nama</label>';
        html +='<input type="text" name="namajabatan" value="" id="namajabatan" class="form-control" required="">';
        html +='</div>';
    }

    
    html +='<div class="form-group">';
    html +='<label class="form-label" for="simpleinput">Tanggal mulai </label>';
    html +='<input type="date" name="mulai" value="" id="mulai " class="form-control" required="">';
    html +='</div>';
    html +='<div class="form-group">';
    html +='<label class="form-label" for="simpleinput">Tanggal Akhir </label>';
    html +='<input type="date" name="akhir" value="" id="akhir " class="form-control" required="">';
    html +='</div>';
    html +='<div class="form-group">';
    html +='<label class="form-label" for="simpleinput">Dokumen</label>';
    html +='<input type="file" name="product_image" id="product_image" class="form-control"> <small>*.jpg,.pdf</small>';
    html +='</div>';
    html +='<button class="btn btn-md btn-primary"  > Simpan</button>';
    html +='';
    html +='</form>';
    $('#main-body').html(html);
  
}

 