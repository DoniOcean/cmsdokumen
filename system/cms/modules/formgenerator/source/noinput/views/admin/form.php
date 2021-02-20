
						
<?php echo form_open(uri_string(), 'class="crud"');
//echo $ss = $post->json_data;
//print_r( unserialize($ss));
?>
 
  
 
 <div class="panel panel-default sf">
					 
<div class="panel-body">
	<div class="tab-content">
									<div class="tab-pane fade in active" id="home1">
										<div class="form-group">
	<label> Nama   </label> 
	<?php echo form_input('title', htmlspecialchars_decode(@$post->title), 'maxlength="100" class="form-control input-sm"'); ?>
	<span class="required-icon tooltip">title</span>
</div>

 

<?php
$this->db->order_by('title','ASC');
$res = $this->db->get('Gantirelasi')->result(); 
foreach($res as $dat => $val){
$resdata[$val->id] = $val->title;
}
?>
<div class="form-group">
<label for="status">Gantirelasi </label><br>
<?php echo form_dropdown('category_id', $resdata , @$post->category_id,' class="form-control input-sm chzn-select"') ?>
</div>
 
			  
									</div>
									<div class="tab-pane fade" id="profile1">
										--
									</div>
	</div>
</div>
 </div>
								 
	
			 
<div class="buttons float-right padding-top">
	<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel'))); ?>
</div>

<?php echo form_close(); ?>
	<script>
		$(function	()	{
			var currentStep = 1;
			
			$('#wizardTab li a').click(function()	{
				return false;
			});
			
			$('#nextStep').click(function()	{
	
				currentStep++;
				
				if(currentStep == 2)	{
					$('#wizardTab li:eq(1) a').tab('show');
					$('#wizardProgress').css("width","66%");
					
					$('#prevStep').attr('disabled',false);
					$('#prevStep').removeClass('disabled');
				}
				else if(currentStep == 3)	{
					$('#wizardTab li:eq(2) a').tab('show');
					$('#wizardProgress').css("width","100%");
					
					$('#nextStep').attr('disabled',true);
					$('#nextStep').addClass('disabled');
				}
				
				return false;
			});
			
			$('#prevStep').click(function()	{
		
				currentStep--;
				
				if(currentStep == 1)	{
				
					$('#wizardTab li:eq(0) a').tab('show');
					$('#wizardProgress').css("width","66%");
						
					$('#prevStep').attr('disabled',true);
					$('#prevStep').addClass('disabled');
					
					$('#wizardProgress').css("width","33%");
				}
				else if(currentStep == 2)	{
				
					$('#wizardTab li:eq(1) a').tab('show');
					$('#wizardProgress').css("width","66%");
							
					$('#nextStep').attr('disabled',false);
					$('#nextStep').removeClass('disabled');
					
					$('#wizardProgress').css("width","66%");
				}
				
				return false;
			});
		});
	</script>