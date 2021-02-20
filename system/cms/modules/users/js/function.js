
$('#wilayah').hide();
$('.distributor').hide();
var a = $('#group_id').val();
if(a==='5'){
    $('.distributor').show();
   }else{
    $('.distributor').hide();
   }
   if(a==='4'){
    $('#wilayah').show();
    getOptions('provinsi_id','users/provinsi');
   }else{
    $('#wilayah').hide();
   }

function extend(a){
   if(a==='5'){
    $('.distributor').show();
   }else{
    $('.distributor').hide();
   }
   if(a==='4'){
    $('#wilayah').show();
    getOptions('provinsi_id','users/provinsi');
   }else{
    $('#wilayah').hide();
   }
    
}

function kota(a){
    getOptions('kabupaten_id','users/kota/'+a);
}

function kecamatan(a){
    getOptions('kecamatan_id','users/kecamatan/'+a);
}

function kelurahan(a){
    getOptions('kelurahan_id','users/kelurahan/'+a);
}

function getOptions(id,url){
 
    $('#'+id).children().remove();
    $('#'+id).append('<option value="" selected="selected">Please select...</option>');
                                    
    
    $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function(e) {
                    
                    for( var i = 0; i < e.result.length; i++ ){
                                    
                        $('#'+id).append('<option value="'+e.result[i].value+'" >'+e.result[i].label+'</option>');
                    }
                    $('#'+id).trigger("chosen:updated");
            }
    });
}

function getOptionsEdit(id,url,value){

$('#'+id).children().remove();
$('#'+id).append('<option value="" selected="selected">Please select...</option>');

$.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function(e) {
                
                for( var i = 0; i < e.result.length; i++ ){
                                
                    $('#'+id).append('<option value="'+e.result[i].value+'" >'+e.result[i].label+'</option>');
                }
                
                $('#'+id).val(value);
                $('#'+id).trigger("chosen:updated");
        }
});
}

function empty(str){
    return !str || !/[^\s]+/.test(str);
}

function cek(){
  var jml =  $('#password').val().length;
  var a = $('#group_id').val();

  if(jml <= 6){
    alert('Password harus lebih dari 6 karakter');
    return false;
  }else if((a=='4')){
      if((empty($('#id_koordinator_distributor').val()))){
        alert('ID KOORDINATOR DISTRIBUTOR WAJIB DI ISI');
        return false;
      }else if(empty($('#provinsi_id').val())){
          alert('Provinsi wajib diisi');
        return false;
      }else if(empty($('#kabupaten_id').val())){
        alert('Kabupaten wajib diisi');
      return false;
    }else if(empty($('#kecamatan_id').val())){
        alert('Kecamatan wajib diisi');
      return false;
    }else if(empty($('#kelurahan_id').val())){
        alert('Kelurahan wajib diisi');
      return false;
    }else{
        return true;
    }
      
  }else{
      return true;
  } 
    return false;
}