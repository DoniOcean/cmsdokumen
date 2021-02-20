
 

function frm2json(namaform){
   //var data =  myApp.formToJSON($('#'+namaform));
  var data = $("#"+namaform).serializeArray();
  console.log(JSON.stringify(data));
    return (JSON.stringify(data));
}

function getFormData(form){
    var unindexed_array = form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function confirm_alert(pesan,callback){
   
    Swal.fire(
        {
            title: "PERHATIAN!",
            text: pesan,
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Delete"
        }).then(function(result)
        {
            if (result.value)
            {
                callback();
               
            }
        });
            
       
}


function tgls(a){
    var dateAr = a.split('-');
    //alert(JSON.stringify(dateAr))
return  dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
}

function empty(str){
    return !str || !/[^\s]+/.test(str);
}

function pesan(status,pesan){
    bootbox.alert(
        {
            title: "<i class='fal fa-check-circle text-"+status+" mr-2'></i> <span class='text-"+status+" fw-500'>"+pesan+"</span>",
            message: "<span><strong>Terimakasih</strong> </span>",
            centerVertical: true,
            className: "modal-alert",
            closeButton: false
        });
}


function api(url,method,form, callback){ 
    var dataarr='';
    if(method==='post'){
        var frmdata = frm2json(form);
    }  
     
    $.ajax({
        url: url,
        type: method,
        dataType: 'json',
        contentType: 'application/json',
        success: function (data) {
           callback(data); 
        },
        error: function( jqXhr, textStatus, errorThrown ){
            alert('Upps!');
            
        },
        data: frmdata
    });
               


    } 

function post(url,method,form, callback){ 
    var dataarr='';
   
    if(method==='post'){
      //  var frmdata = frm2json(form);
      var frm = $("#"+form);
        var frmdata = getFormData(frm); 
    } 
   // myApp.showIndicator();  
 
     $.post(url, frmdata, function(data){
            callback(data);  
        });
     
    } 

    function api3(url,method,form, callback){ 
        var dataarr='';
        if(method==='post'){
            var frm = $("#"+form);
        var frmdata = getFormData(frm);
           // frmdata.append( 'files', $('#camerafoto')[0].files[0]);
        } 
        //myApp.showIndicator();
         
        $.ajax({
            url: url, 
            type: 'post',
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,
            data: frmdata,
            success: function (data) {
               callback(data);
               // myApp.hideIndicator(); 
            },
            error: function( jqXhr, textStatus, errorThrown ){
                alert('Upps!'); 
            },
            
        });
                   
    
    
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

        function showloading(){
             
        }

        function hideloading(){
             
        }

        function number_format(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        }

        function success_alert(msg){
            toastr.success(msg, 'Success', { timeOut: 1000 })
        }

        function error_alert(msg){
            toastr.error(msg, 'Perhatian', { timeOut: 4000 })
        }

        function info_alert(msg){
            toastr.info(msg, 'Perhatian', { timeOut: 4000 })
        }

        function pop_alert(msg){
            Swal.fire(
                {
                    type: "error",
                    title: "Oops...",
                    text: msg,
                    footer: "Terimakasih!"
                }); 
        }

        function alert(msg){
            toastr.error(msg, 'Perhatian', { timeOut: 4000 })
        }

        $(document).ready(function () {
            $('#dtHorizontalExample').DataTable({
            "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
            });