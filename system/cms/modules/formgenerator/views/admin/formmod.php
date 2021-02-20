 
		 	
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
			<?php echo form_open('admin/formgenerator/moduleFrmAct', 'class="crud"'); ?>
			<div class="form-group">
				<label><span class="required">*</span>Enter Module name:</label>
				<input name="name" class="form-control new-column-name input-sm" type="text">
			</div>
			<div class="form-group">
				<label><span class="required">*</span> Navigation name:</label>
				<input name="navigation" class="form-control new-column-name input-sm" type="text">
			</div>
			<div class="form-group">
				<label><span class="required">*</span>Enter Module Description:</label>
				<input name="description" class="form-control new-column-name input-sm" type="text">
			</div>
			<div class="form-group">
			<label><span class="required">*</span>Menu</label>
				<select name="menu" class="form-control new-column-type input-sm">
						<option value="purchasing">Purchasing</option>
						<option value="inventory">Inventory</option> 
						<option value="application">Application</option>
						<option value="anggota">Anggota</option>
					  <option value="Production">Produk</option>
					  <option value="distributor">Distributor</option>
						<option value="agen">Agen</option> 
					  <option value="content">Content</option>
					  <option value="Publikasi">Publikasi</option> 
					  <option value="design">Design</option>
					  <option value="distributor">Distributor</option>
					  <option value="agen">Agen</option>
					  <option value="users">Users</option>
					  <option value="utilities">Utilities</option>
					  <option value="settings">settings</option> 
					  <option value="data">Master Data</option> 
					  <option value="kasir">Kasir</option> 
				    
				     
				</select>
		      </div>
			<div class="form-group">
			<label><span class="required">*</span>Module Type</label>
				<select name="type" class="form-control new-column-type input-sm typeinput">
				    
				    <optgroup label="Style">
					  <option value="master">MASTER</option> 
					  <option value="masterjs">MASTER JS</option> 
				    </optgroup>
				     
				</select>
		      </div>
				 
			<div class="form-group relasi"> 
			</div><button type="submit"  class="btn btn-sm btn-info" value="Submit"> Submit</button>
			</div>
			 
			<?php echo form_close()?>
		</div>
		 
	</div> 
  
   