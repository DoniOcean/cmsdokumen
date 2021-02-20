var controls = {
    leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
    rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
}

$('#datepicker-2').datepicker(
    {
        todayHighlight: true,
        orientation: "top left",
        templates: controls,
        format: 'yyyy-mm-dd'
    }); 

    Dropzone.autoDiscover = false;

    var myDropzone = new Dropzone("#my-dropzone");
    myDropzone.on("complete", function(file) {
        if (myDropzone.getUploadingFiles().length === 0 && myDropzone.getQueuedFiles().length === 0) {
            success_alert("Dokumen berhasil diupload!");
             var id = $('#id').val();
             api('./admin/datin/listdok/'+id,'get','frm',function(data){
                $('#isi').html(data.isi);
            })
          } 
      });

      function hapus(id){
          var ids=id;
          confirm_alert('Apakah anda ingin menghapus dokumen?',function(data){ 
            api('./admin/datin/hapus/'+ids,'get','frm',function(data){
                api('./admin/datin/listdok/'+data.id,'get','frm',function(data){
                    $('#isi').html(data.isi);
                })
                Swal.fire("Deleted!", "File berhasil dihapus.", "success");
            });
           
        });
      }

      function detail(id){
        $('#modaldetail').modal('show');
        api('./datin/listdata/'+id,'get','frm',function(data){
            $('#isi').html(data.isi);
        });
      }

