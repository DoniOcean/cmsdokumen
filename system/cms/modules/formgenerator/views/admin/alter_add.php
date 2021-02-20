 
 <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span class="required">*</span>Enter column name:</label>
                                <input name="field" class="form-control new-column-name input-sm" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span class="required">*</span>Column Type</label>
                                <select name="type" class="form-control new-column-type input-sm">
                                    <option value="">- select column type -</option>
                                    <optgroup label="Numeric">
                                        <option value="BIGINT(255)">BIGINT(255)</option>
	                 <option value="INT(11)">INT(11)</option>
                                        <option value="TINYINT(1)">TINYINT(1)</option>
                                        <option value="DECIMAL(10,2)">DECIMAL(10,2)</option>
                                        <option value="BOOLEAN">BOOLEAN</option>
                                    </optgroup>
                                    <optgroup label="String">
                                        <option value="VARCHAR(255)">VARCHAR(255)</option>
                                        <option value="TEXT">TEXT</option>
                                    </optgroup>
                                    <optgroup label="Date">
                                        <option value="DATE">DATE</option>
                                        <option value="DATETIME">DATETIME</option>
                                    </optgroup>
                                </select>
                            </div>
	<div class="form-group text-right">
								<input type="submit"  class="btn btn-success" value="Add Column"> 
							</div>
                        </div>
                         
                    </div>
