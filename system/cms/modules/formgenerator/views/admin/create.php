 
 Copy paste Form berikut ini : <strong class="text-main">view/form.php</strong>
 <section>
	<pre>
	<?php echo $form?>
	</pre>
 </section>
 <hr>
 Copy paste validation array berikut ini tempatkan pada controller modules : <strong class="text-main">controller/modul_controller.php</strong>
 <section>
	<pre>
	<?php echo $validation?>
	</pre>
 </section>
  
  <hr>
   Copy paste create function berikut ini letakkan pada controller anda : <strong class="text-main">controller/modul_controller.php</strong>
 <section>
	<pre>
	<?php
echo 'public function create()
{	
	$this->load->library(\'form_validation\');
	$this->form_validation->set_rules($this->validation_rules);
	      if ($this->form_validation->run())
	        {
	$id = $this->blog_m->insert(array(';
	foreach($this->input->post('ischeck') as $data){	
	echo '\''.$data.'\'=> $this->input->post(\''.$data.'\'),';
	}
	echo '
	));
	if ($id)
	{ 
	$this->session->set_flashdata(\'success\', \'\', $this->input->post(\'title\')));
	}
	else
	{
	$this->session->set_flashdata(\'error\',\'\');
	}// Redirect back to the form or main page
	$this->input->post(\'btnAction\') == \'save_exit\' ?
	redirect(\'admin/$this->nama_modul\') : redirect(\'admin/$this->nama_modul/edit/\' . $id);
	}else{// Go through all the known fields and get the post values
	foreach ($this->validation_rules as $key => $field)
	{
	@$post->$field[\'field\'] = set_value($field[\'field\']);
	}
	$post->created_on = $created_on;
	}
	$this->template->append_metadata($this->load->view(\'fragments/wysiwyg\', $this->data, TRUE))
	->set(\'post\', $post)
	->build(\'admin/form\', $this->data);
}';
	?>
	</pre>
 </section>
  						