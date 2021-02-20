<div id="panel-4" class="panel">
	<div class="panel-hdr">
                                        <h2>
                                            <?php echo $module_details['name']?> <span class="fw-300"><i></i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                       </div>
                                    </div>
									<div class="panel-container show">
									<div class="panel-content">
 
 <div class="row container">
 <?php echo form_open('admin/formgenerator/index_act', 'class="crud"'); ?>
 <div class="form-group">
    <label for="exampleInputEmail1">Table</label>
    <?php echo form_dropdown('table',$tables,@$this->uri->segment(4),'class="form-control"')?> 
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Page to generate</label>
    <?php echo form_dropdown('page',array('index'=>'index','form'=>'form','view'=>'view','edit'=>'Alter Table'),@$this->uri->segment(5),'class="form-control"')?> 
  </div>
 <div class="form-group">
								<label class="col-lg-2 control-label"></label>
								<div class="col-lg-10"> 
									<button type="submit" class="btn btn-info waves-effect waves-themed">Generate Now!</button>
								</div><!-- /.col -->
							</div>
 <?php echo form_close(); ?>
 </div>

 </div></div></div>