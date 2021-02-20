 <?php
 $this->load->view('admin/partials/filters');

 ?>
 
  
 Copy paste Controller:  
 <section>
	<pre>
	<?php 
	
	echo htmlspecialchars('
$this->db->where(\'id\',$id);
$post = $this->db->get(\''.str_replace('default_','',$this->input->post('table')).'\')->row();
		   
		   ');
	
	?>
	</pre>
 </section>
 
  
 Copy paste View berikut ini : 
 <section>
	<pre>
		
	 <?php
	echo htmlspecialchars('
<ul class="list-group">		   
		   ');
	
	                  foreach($fields as $val){
	echo htmlspecialchars('

<li class="list-group-item clearfix inbox-item">
<span class="from"><b>'.$val.' : </b></span>
<span class="detail"> 
<?php echo $post->'.$val.'?>
</span>
</li> 
		   
		   ');	
		
		
		}
echo htmlspecialchars('
</ul>		   
		   ');		
?>
	</pre>
 </section>
 
 
