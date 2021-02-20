 
 <?php echo form_open('admin/formgenerator/create', 'class="crud"'); ?>
 <input type="hidden" value="<?php echo $this->uri->segment('4')?>" name="table">
 <div class="panel panel-default table-responsive">
					<div class="panel-heading">
						Form Properties 
					</div>
					<div class="panel-body">
						<div class="row">
 <table class="table table-bordered table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th>
											<input onclick="checkAllCheckbox();" id="checkAll" type="checkbox"><span class="custom-checkbox"></span>
										</th>
										<th>Field</th>
										<th>Rules</th> 
										<th>Input</th>
										<th>Textarea</th>
										<th>Select </th>
										<th>Date picker </th>
										<th>Enum </th>
										<th>File </th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=0;
									foreach($fields as $val){
										++$i;
										?>
									<tr>
										<td>
											 <input class="checked" name="ischeck[]" value="<?php echo $val?>" type="checkbox" >
											 <span class="custom-checkbox"></span>
										</td>
										<td>
											<?php echo $val?>
										</td>
										<td>
											 <input class="form-control" value="trim|required" name="rules[<?php echo $val?>]"  type="text">
										 
										</td>
										<td>
											 <input class="default_input" value="input" name="<?php echo $val?>[]" onclick="setTitle('<?php echo $val?>');close_all();" type="radio">
										<span class="custom-radio"></span>
										</td>
										
										<td>
											 <input class="form-control" value="textarea" name="<?php echo $val?>[]" onclick="setTitle('<?php echo $val?>');close_all();" type="radio">
											 <span class="custom-radio"></span>
										</td>
										
										<td>
											 <input class="form-control" value="select" name="<?php echo $val?>[]" onclick="show_tables('table_id_<?php echo $i?>');setTitle('<?php echo $val?>');" type="radio">
											 <span class="custom-radio"></span>
											 <span class="top-display" id="table_id_<?php echo $i?>" style="display: none">
											 Table:
											 <?php echo form_dropdown($val.'[type]',array('dropdown'=>'dropdown','checkbox'=>'checkbox','radio'=>'radio'),'','class="form-control" style="width:130px"')?> 
											  <br><?php echo form_dropdown($val.'[selected_table]',array(''=>'--Pilih--')+$tables,@$this->input->post('table'),'class="form-control" style="width:130px" onchange="show_key_value(this.value, \'table_key_id_'.$i.'\', \'table_value_id_'.$i.'\', \''.$val.'\', \''.$i.'\');"')?> 
											  <!-- select table for key -->
											<span id="table_key_id_<?php echo $i?>" style="display: none">
											</span>
											<!-- select table for keyvalues -->
											<span id="table_value_id_<?php echo $i?>" style="display: none">
											</span>
											 </span>
										</td>
										<td>
											 <input class="form-control" value="datepicker" name="<?php echo $val?>[]" onclick="setTitle('<?php echo $val?>');close_all();" type="radio">
											 <span class="custom-radio"></span>
										</td>
										
							<td>
							 <input class="form-control" value="enum" name="<?php echo $val?>[]" onclick="setTitle('<?php echo $val?>');close_all();" type="radio">
							 <span class="custom-radio"></span>
							</td>
							<td>
											 <input class="form-control" value="file" name="<?php echo $val?>[]" onclick="setTitle('<?php echo $val?>');close_all();" type="radio">
											 <span class="custom-radio"></span>
										</td>
									</tr>
									
									  <?php }?>
								</tbody>
							</table>
 </div><button type="submit" class="btn btn-info">Generate</button>
						 </div>
					 </div>
 <?php echo form_close(); ?>
  <script type="text/javascript">
        function checkAllCheckbox()
        {
            $(".checked").each(function () {
                if ($("#checkAll").prop("checked") == true)
                {
                    if ($(this).prop("checked") == false)
                    {
                        $(this).click();
                    }
                    $("#generate-btn").removeAttr("disabled");
                } else
                {
                    $(this).click();
                    $("#generate-btn").attr("disabled", "disabled");
                }
            });
        }

        function setTitleRadio(field)
        {
            $("#selected_field_radio").val(field);
        }

        function setTitleCheck(field)
        {
            $("#selected_field_check").val(field);
        }

        function setTitle(field, from)
        {
            $("#selected_field").val(field);
        }

        function close_all()
        {
            var selected_radio = $("#selected_radio").val();
            $("#" + selected_radio).hide();
        }

        function add_more_radio(id)
        {
            var rad_id = $("#radio_id").val();
            var selected_radio = $("#selected_radio").val();
            var accet_url = $("#accet_url").val();
            var selected_field = $("#selected_field_radio").val();
            var x = document.getElementById(selected_radio).rows.length;
            x = x + 1;
            $("#" + id).append('<tr id="radio_row_' + x + '"><td><input value="Radio" type="text" name="' + selected_field + '[radios][]"></td><td><img src="' + accet_url + '/img/button-cross_basic_red.png" width="25px" onclick="del_ratio_row(\'radio_row_' + x + '\');"></td></tr>');
        }

        function del_ratio_row(id)
        {
            $("#" + id).remove();
        }

        function select_radio(id, num)
        {
            $("#"+id).closest("tr").find(".top-display").css("display", "none");
            $("#" + id).show();
            $("#selected_radio").val(id);
            $("#radio_id").val(num);
        }
        // checkbox js start

        function close_all_select()
        {
            var selected_check = $("#selected_check").val();
            $("#" + selected_check).hide();
        }

        function add_more_check(id)
        {
            var chk_id = $("#check_id").val();
            var selected_check = $("#selected_check").val();
            var accet_url = $("#accet_url").val();
            var selected_field = $("#selected_field_check").val();
            var x = document.getElementById(selected_check).rows.length;
            x = x + 1;
            $("#" + id).append('<tr id="check_row_' + x + '"><td><input value="Checkbox" type="text" name="' + selected_field + '[checks][]"></td><td><img src="' + accet_url + '/img/button-cross_basic_red.png" width="25px" onclick="del_check_row(\'check_row_' + x + '\');"></td></tr>');
        }

        function del_check_row(id)
        {
            $("#" + id).remove();
        }

        function select_check(id, num)
        {
            $("#"+id).closest("tr").find(".top-display").css("display", "none");
            $("#" + id).show();
            $("#selected_check").val(id);
            $("#check_id").val(num);
        }
        // checkbox js end

        function show_tables(id)
        {
            $("#"+id).closest("tr").find(".top-display").css("display", "none");
            table_name_new = $("#table_name_new").val();
            $("#"+id+" select option:contains('"+table_name_new+"')").attr("disabled","disabled");

            $("#" + id).show();
            $("#"+id+" select:first").change();
        }

        function show_key_value(dropdown_id, key_id, value_id, field, id)
        {
            var dropdown_tbl = dropdown_id;
            $.ajax({
                url: '<?php echo base_url()?>admin/formgenerator/get_key_value',
                type: "post",
                data: "dropdown_tbl=" + dropdown_tbl + '&field=' + field + '&id=' + id+"&ci_csrf_token="+'',
                beforeSend: function () {
                },
                success: function (result) {
                    var arr = result.split("==##==");
                    $('#' + key_id).css('display', 'block');
                    $('#' + value_id).css('display', 'block');

                    $("#" + key_id).html(arr[0]);
                    $("#" + value_id).html(arr[1]);
                },
                error: function (output)
                {
                }
            });
        }

        function getField()
        {
            var tbl_name = $('#table_name_new').val();
            $.ajax({
                url: 'http://cigenerator.itvay.com/admin/module/get_fields',
                type: "post",
                data: "tbl_name=" + tbl_name+"&ci_csrf_token="+'',
                beforeSend: function () {
                },
                success: function (result) {
                    $("#tbl_result").html(result);
                    try{
                        $(".chosen-select").chosen();
                    } catch(e){
                        
                    }
                    
	 function checkitem(){
		  alert('asd');
	 }
                    // Input checked after select
                    $("input.checked").on('click', function () {
		
                        if($("input.checked:checked").length>0){
                            $("#generate-btn").removeAttr("disabled");
                        } else{
                            $("#generate-btn").attr("disabled", "disabled");
                        }
                        if ($(this).prop("checked")) {
                            var temp = $(this).parent().parent();
                            temp.css("background-color", "#FFFFCC");
                            var temp1 = temp.find('.default_input');
                            temp1.click();
                        } else
                        {
                            var temp = $(this).parent().parent();
                            temp.css("background-color", "#fff");
                            var temp1 = temp.find('input[type=radio],input[type=checkbox]');
                            temp1.removeAttr("checked");
                        }
                    });
                    // ./ Input checked after select /.

                    // On radio check select checkbox
                    $("input[type=radio]").click(function () {
		
                        var check = $(this).parent().parent().find("input[type=checkbox]");
                        check.prop("checked", true);
                        var temp = $(this).parent().parent();
                        temp.css("background-color", "#FFFFCC");

                        if($("input.checked:checked").length>0){
                            $("#generate-btn").removeAttr("disabled");
                        } else{
                            $("#generate-btn").attr("disabled", "disabled");
                        }
                    });
                    // ./ On radio check select checkbox /.
                },
                error: function (output)
                {
                }
            });
        }
    </script> 