 

 
    
      

      function detail(id){
        $('#modaldetail').modal('show');
        api('./datin/listdata/'+id,'get','frm',function(data){
            $('#isi').html(data.isi);
        });
      }

      function download_dok(url,id){ 
        window.location.href = url;
        api('./datin/update_download/'+id,'get','frm',function(data){});
      }
