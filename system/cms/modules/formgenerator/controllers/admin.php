<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Cms controller for the redirects module
 * 
 * @author 		Phil Sturgeon - PyroCMS Dev Team
 * @package 	PyroCMS
 * @subpackage 	Variables Module
 * @category	Modules
 */
class Admin extends Admin_Controller
{
	/**
	 * Constructor method
	 * @access public
	 * @return void
	 */
	protected $validation_rules = array(
		array(
			'field' => 'name',
			'label' => 'Module Name',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'type',
			'label' => 'Type',
			'rules' => 'trim|required'
		), 
		array(
			'field' => 'menu',
			'label' => 'Menu',
			'rules' => 'trim|required'
		),
	);
	
	public function __construct()
	{
		parent::__construct();
		
		// Load the required classes
		$this->load->library('form_validation'); 
		$this->lang->load('formgenerator');
		$this->template
         ->set_theme('admin')
		 ->set_partial('shortcuts', 'admin/partials/shortcuts');
		  
	}
	
	/**
	 * List all redirects
	 * @access public
	 * @return void
	 */
	public function index()
	{
		 
		$fields = array();
		$fields2 = array();
        if(!($this->uri->segment(4))){
			
		}else{
		//	$tblurl=explode('_',$this->uri->segment(4));
		//	$tblprefix = $tblurl[0];
		//	$tbl = $this->db->set_dbprefix($tblprefix.'_'.$tblurl[1]);
			$tbl=$this->uri->segment(4);
			$fields2 = $this->db->query('SHOW FULL COLUMNS FROM '.$tbl)->result();
			
			 
			
			$fields = $this->db->list_fields($this->uri->segment(4));
		}
		
		$table = $this->db->list_tables();
		foreach ($table as $res)
		{
		     $tables[$res] = $res;
		}
		$page = 'index';
		switch ($this->uri->segment(5)) {
			case "index":
				$page = 'index';
				break;
			case "form":
				$page = 'form';
				break;
			case "view":
				$page = 'view';
				break;
			case "edit":
				$page = 'alter';
				break;
		}
  
		 
  
		$this->template
		->set('fields',$fields)
		->set('fields_detail',$fields2)
		->set('tables',$tables)
		->build('admin/'.$page);
	}
	
	public function _check_title($title = '')
	{
		$folder=str_replace('codeigniter','cms',BASEPATH).'modules/'.$title;
		if (!is_dir(@$folder)){
			 
			return 'TRUE';
			} 
		
		return 'FALSE';
	}
	
	function addField(){
		$this->load->view('admin/alter_add');
	}
	
	function index_act(){
		 
		 redirect('admin/formgenerator/index/'.$this->input->post('table').'/'.$this->input->post('page'));
	}
	
	public function moduleFrmAct()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules($this->validation_rules);
		$check = $this->_check_title($this->input->post('name'));
	
		if (($this->form_validation->run()) && ($check == 'TRUE'))
		{

			if($this->input->post('type') == 'master'){
				 
				  
				$source = str_replace('codeigniter','cms',BASEPATH).'modules/formgenerator/source/master';
				$target = str_replace('codeigniter','cms',BASEPATH).'modules/'.$this->input->post('name');
				 
				$this->full_copy( $source, $target );
				
			   $this->replace_string_in_file($target.'/details.php', array('Gantinamamodul','Gantidescription','Gantimenu','Gantinnavigasi'), array($this->input->post('name'),$this->input->post('description'),$this->input->post('menu'),$this->input->post('navigation')));
			   $this->replace_string_in_file($target.'/controllers/admin.php', array('master','masters'), array($this->input->post('name'),$this->input->post('name').'s'));

			   rename ($target.'/language/english/masters_lang.php', $target.'/language/english/'.$this->input->post('name').'s_lang.php');
			   rename ($target.'/language/indonesian/masters_lang.php', $target.'/language/indonesian/'.$this->input->post('name').'s_lang.php');
			   
			   $this->replace_string_in_file($target.'/language/english/'.$this->input->post('name').'s_lang.php', array('master','keyword','Keyword','Judul'), array($this->input->post('name'),$this->input->post('name'),ucfirst($this->input->post('name')),ucfirst($this->input->post('navigation'))));
			   $this->replace_string_in_file($target.'/language/indonesian/'.$this->input->post('name').'s_lang.php', array('master','keyword','Keyword','Judul'), array($this->input->post('name'),$this->input->post('name'),ucfirst($this->input->post('name')),ucfirst($this->input->post('navigation'))));

			   rename ($target.'/models/master_m.php', $target.'/models/'.$this->input->post('name').'_m.php');
			   $this->replace_string_in_file($target.'/models/'.$this->input->post('name').'_m.php', array('master','Master_m'), array($this->input->post('name'),ucfirst($this->input->post('name').'_m')));

			   $this->replace_string_in_file($target.'/views/admin/form.php', array('master','masters'), array($this->input->post('name'),$this->input->post('name').'s'));
			   $this->replace_string_in_file($target.'/views/admin/form_o.php', array('master','masters'), array($this->input->post('name'),$this->input->post('name').'s'));
			   $this->replace_string_in_file($target.'/views/admin/index.php', array('master','masters'), array($this->input->post('name'),$this->input->post('name').'s'));
			   $this->install($this->input->post('name'));
			   redirect('admin/addons');
				
			  }
			  
			  if($this->input->post('type') == 'masterjs'){
				 
				  
				$source = str_replace('codeigniter','cms',BASEPATH).'modules/formgenerator/source/masterjs';
				$target = str_replace('codeigniter','cms',BASEPATH).'modules/'.$this->input->post('name');
				 
				$this->full_copy( $source, $target );
				
			   $this->replace_string_in_file($target.'/details.php', array('Gantinamamodul','Gantidescription','Gantimenu','Gantinnavigasi'), array($this->input->post('name'),$this->input->post('description'),$this->input->post('menu'),$this->input->post('navigation')));
			   $this->replace_string_in_file($target.'/controllers/admin.php', array('master','masters'), array($this->input->post('name'),$this->input->post('name').'s'));

			   rename ($target.'/language/english/masters_lang.php', $target.'/language/english/'.$this->input->post('name').'s_lang.php');
			   rename ($target.'/language/indonesian/masters_lang.php', $target.'/language/indonesian/'.$this->input->post('name').'s_lang.php');
			   
			   $this->replace_string_in_file($target.'/language/english/'.$this->input->post('name').'s_lang.php', array('master','keyword','Keyword','Judul'), array($this->input->post('name'),$this->input->post('name'),ucfirst($this->input->post('name')),ucfirst($this->input->post('navigation'))));
			   $this->replace_string_in_file($target.'/language/indonesian/'.$this->input->post('name').'s_lang.php', array('master','keyword','Keyword','Judul'), array($this->input->post('name'),$this->input->post('name'),ucfirst($this->input->post('name')),ucfirst($this->input->post('navigation'))));

			   rename ($target.'/models/master_m.php', $target.'/models/'.$this->input->post('name').'_m.php');
			   $this->replace_string_in_file($target.'/models/'.$this->input->post('name').'_m.php', array('master','Master_m'), array($this->input->post('name'),ucfirst($this->input->post('name').'_m')));

			   $this->replace_string_in_file($target.'/views/admin/form.php', array('master','masters'), array($this->input->post('name'),$this->input->post('name').'s'));
			   $this->replace_string_in_file($target.'/views/admin/form_o.php', array('master','masters'), array($this->input->post('name'),$this->input->post('name').'s'));
			   $this->replace_string_in_file($target.'/views/admin/index.php', array('master','masters'), array($this->input->post('name'),$this->input->post('name').'s'));
			   $this->install($this->input->post('name'));
			   redirect('admin/addons');
				
  			}
			 
			if($this->input->post('type') == 'mastermodule'){
				 
						  $query = 'CREATE TABLE  `default_'.$this->input->post('name').'_categories` LIKE  `default_master_categories`;';
						  $this->db->query($query);
					       $query = 'INSERT `default_'.$this->input->post('name').'_categories` SELECT * FROM  `default_master_categories`;  ';
						  $this->db->query($query);
						   
						  
						  $query = 'CREATE TABLE  `default_'.$this->input->post('name').'` LIKE  `default_master`;';
						  $this->db->query($query);
					       $query = 'INSERT `default_'.$this->input->post('name').'` SELECT * FROM  `default_master`;  ';
						  $this->db->query($query);
						  
						  $source = str_replace('codeigniter','cms',BASEPATH).'modules/formgenerator/source/mastermodule';
						  $target = str_replace('codeigniter','cms',BASEPATH).'modules/'.$this->input->post('name');
						   
						  $this->full_copy( $source, $target );
						  
						 $this->replace_string_in_file($target.'/details.php', array('Gantinamamodul','Gantidescription','Gantimenu'), array($this->input->post('name'),$this->input->post('description'),$this->input->post('menu')));
						 $this->replace_string_in_file($target.'/config/app.php', array('Gantinama'), array($this->input->post('name')));
						 $this->replace_string_in_file($target.'/models/my_m.php','Gantinama', $this->input->post('name'));
						 $this->replace_string_in_file($target.'/models/categories_m.php', 'Gantinama_categories', $this->input->post('name').'_categories');
						  redirect('admin/modules');
						  
			}
				
		/*	if($this->input->post('type') == 'mastermoduleo'){
				  $query = 'CREATE TABLE  `default_'.$this->input->post('name').'` LIKE  `default_master`;';
						  $this->db->query($query);
					       $query = 'INSERT `default_'.$this->input->post('name').'` SELECT * FROM  `default_master`;  ';
						  $this->db->query($query);
						  
						$source = str_replace('codeigniter','cms',BASEPATH).'modules/formgenerator/source/defaulto';
						  $target = str_replace('codeigniter','cms',BASEPATH).'modules/'.$this->input->post('name');
						   
						  $this->full_copy( $source, $target );
						  
						  $this->replace_string_in_file($target.'/details.php', array('Gantinamamodul','Gantidescription','Gantimenu'), array($this->input->post('name'),$this->input->post('description'),$this->input->post('menu')));
						 $this->replace_string_in_file($target.'/config/app.php', array('Gantinama'), array($this->input->post('name')));
						 $this->replace_string_in_file($target.'/models/my_m.php','Gantinama', $this->input->post('name'));
						  redirect('admin/modules');
						  
			}*/
			
			if($this->input->post('type') == 'mastermoduleo'){
			
				if($this->input->post('tabelnya') == 'yes'){
					 
				  $query = 'CREATE TABLE  `default_'.$this->input->post('name').'` LIKE  `default_master`;';
						  $this->db->query($query);
					       $query = 'INSERT `default_'.$this->input->post('name').'` SELECT * FROM  `default_master`;  ';
							$this->db->query($query);
				}
			//	echo $this->input->post('tabelnya');exit;
						$source = str_replace('codeigniter','cms',BASEPATH).'modules/formgenerator/source/defaulto';
						  $target = str_replace('codeigniter','cms',BASEPATH).'modules/'.$this->input->post('name');
						   
						  $this->full_copy( $source, $target );
						  
						  $this->replace_string_in_file($target.'/details.php', array('Gantinamamodul','Gantidescription','Gantimenu'), array($this->input->post('name'),$this->input->post('description'),$this->input->post('menu')));
						 $this->replace_string_in_file($target.'/config/app.php', array('Gantinama'), array($this->input->post('name')));
						 $this->replace_string_in_file($target.'/models/my_m.php','Gantinama', $this->input->post('name'));
						 
						 if($this->input->post('tabelnya') == 'no'){
							 $tbd = explode('_',$this->input->post('relasi'));
							$this->replace_string_in_file($target.'/controllers/admin.php','//prefixdb', '$this->db->set_dbprefix("'.$tbd[0].'_");');
						 
						 }
						 redirect('admin/addons');
						  
			}
			
			if($this->input->post('type') == 'noinput'){
				  $query = 'CREATE TABLE  `default_'.$this->input->post('name').'` LIKE  `default_master`;';
						  $this->db->query($query);
					       $query = 'INSERT `default_'.$this->input->post('name').'` SELECT * FROM  `default_master`;  ';
						  $this->db->query($query);
						  
						$source = str_replace('codeigniter','cms',BASEPATH).'modules/formgenerator/source/'.$this->input->post('type');
						  $target = str_replace('codeigniter','cms',BASEPATH).'modules/'.$this->input->post('name');
						   
						  $this->full_copy( $source, $target );
						  
						  $this->replace_string_in_file($target.'/details.php', array('Gantinamamodul','Gantidescription','Gantimenu'), array($this->input->post('name'),$this->input->post('description'),$this->input->post('menu')));
						 $this->replace_string_in_file($target.'/config/app.php', array('Gantinama'), array($this->input->post('name')));
						 $this->replace_string_in_file($target.'/views/admin/form.php', array('Gantirelasi'), array($this->input->post('relasi')));
						 $this->replace_string_in_file($target.'/models/my_m.php',array('Gantinama','Gantirelasi'), array($this->input->post('name'),$this->input->post('relasi')));
						  redirect('admin/addons');
						  
			}
		 
			
			//copy file
			
			
			
			
			$this->session->set_flashdata(array('success' => 'Sukses'));
		}else{
			$this->session->set_flashdata(array('error' => 'Gagal!'));
		}
		
		 $this->template 
		 ->build('admin/formmod');
	}

	public function install($table)
	{ 
		 
		return  install_tables(array(
			$table.'s' => array(
				'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true,),
				$table.'_name' => array('type' => 'VARCHAR', 'constraint' => 50,),
				'user_id' => array('type' => 'INT', 'constraint' => 11,),
			),
			$table.'s_applied' => array(
				'id' => array('type' => 'INT', 'constraint' => 11, 'auto_increment' => true, 'primary' => true,),
				'hash' => array('type' => 'CHAR', 'constraint' => 32, 'default' => '',),
				'master_id' => array('type' => 'INT', 'constraint' => 11,),
			),
		));
	}
	
	function replace_string_in_file($filename, $string_to_replace, $replace_with){
    $content=file_get_contents($filename);
    $str=str_replace($string_to_replace, $replace_with,$content);

    file_put_contents($filename, $str);
	}
	
	

	function full_copy( $source, $target ) {
		if ( is_dir( $source ) ) {
			@mkdir( $target );
			$d = dir( $source );
			while ( FALSE !== ( $entry = $d->read() ) ) {
				if ( $entry == '.' || $entry == '..' ) {
					continue;
				}
				$Entry = $source . '/' . $entry; 
				if ( is_dir( $Entry ) ) {
					$this->full_copy( $Entry, $target . '/' . $entry );
					continue;
				}
				copy( $Entry, $target . '/' . $entry );
			}
	
			$d->close();
		}else {
			copy( $source, $target );
		}
	}
	

	
	public function moduleFrm()
	{
		$table = $this->db->list_tables();
		foreach ($table as $res)
		{
		     $tables[$res] = $res;
		}
		  
		 $this->template
		 ->set('table',$tables)
		 ->build('admin/formmod');
	}
	
	function alter_act(){
		 if(!$this->input->post('field')){
			$this->session->set_flashdata('error', 'Fieldnya gak boleh kosong!');
		 }else{
			$this->db->query('ALTER TABLE `'.$this->input->post('table').'` ADD `'.$this->input->post('field').'` '.$this->input->post('type').' NULL ;');
			$this->session->set_flashdata('success', 'Berhasil!');
		 }
		 redirect('admin/formgenerator/index/'.$this->input->post('table').'/'.$this->input->post('page'));
	}
	
	function delete_act(){
		 if(!$this->uri->segment(6)){
			$this->session->set_flashdata('error', 'Fieldnya gak boleh kosong!');
		 }else{
			$this->db->query('ALTER TABLE `'.$this->uri->segment(4).'` DROP `'.$this->uri->segment(6).'`;');
			$this->session->set_flashdata('success', 'Berhasil!');
		 }
		 redirect('admin/formgenerator/index/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
	}
	
	function get_key_value(){
		$fields = $this->db->list_fields($this->input->post('dropdown_tbl'));
		
		$option='';
		foreach($fields as $val){
			$option .='<option value="'.$val.'">'.$val.'</option>';
		}
		echo '  Key:<select class="form-control" id="key_'.$this->input->post('id').'" name="'.$this->input->post('field').'[key]" style="width:120px">
                            '.$option.'
                        </select>
        ==##==        Value:<select class="form-control" id="value_'.$this->input->post('id').'" name="'.$this->input->post('field').'[value]" style="width:120px">
                            '.$option.'
                        </select>';
	}
	
	public function create()
	{ 
		$rule = $this->input->post('rules');
		 //echo '<pre>';
		//print_r($_POST);
		$validation = '';
		$validation.= 'protected $validation_rules = array(';
		$form =htmlspecialchars('<?php echo form_open(uri_string(), \'class="crud"\'); ?>');
		
		$count = 0;
		$countcol = 0;
		$form .=htmlspecialchars('<div class="row"><div class="col-md-6">');
		foreach($this->input->post('ischeck') as $data){
			++$count;
			++$countcol;
			$field = $this->input->post($data);
			 
			
			 $validation .= $this->createvalidation($data,$rule[$data]);
			 if($count <=10){ 
			 if($countcol<=5){
				 $form.=$this->myform(@$field[0],$data,$field); //generate form
			 }else{
				$countcol = 0;
				$form .=htmlspecialchars('</div><div class="col-md-6">');
				 $form.=$this->myform(@$field[0],$data,$field); //generate form
			 }
			 }else{
				$form .=htmlspecialchars('</div></div><div class="row"><div class="col-md-6">');
				 $form.=$this->myform(@$field[0],$data,$field);
				$count=0;
				$countcol = 0;
			 }
			
			 
			 
		}
		/*foreach($this->input->post('ischeck') as $data){
			$field = $this->input->post($data);
			 
			
			 $validation .= $this->createvalidation($data,$rule[$data]);
			
			  $form.=$this->myform(@$field[0],$data,$field); //generate form
			 
		}*/
		 
		$form .=htmlspecialchars('
								 <br>
	<button type="submit" class="btn btn-success btn-sm">Submit</button>
<?php echo form_close(); ?>'); 
		  $validation = substr($validation,0,-1);
		  $validation.= ');';
		 
		   
		// $this->create_create();
		 
		 $this->template
		  ->set('form',$form)
		 ->set('validation',$validation)
		 ->build('admin/create');
	}
	
	public function create_table()
	{
		 $this->template 
		 ->build('admin/create_table');
	}
	
	function myform($type="",$nama="",$properties=array()){
		switch ($type) {
			case "input":
return  '<br>'.htmlspecialchars('
<div class="form-group">
	<label> '.$nama.' </label> 
	<?php echo form_input(\''.$nama.'\', htmlspecialchars_decode(@$post->'.$nama.'), \'maxlength="100" class="form-control input-lg"\'); ?>
	<span class="required-icon tooltip">'.$nama.'</span>
</div>');
				break;
			case "textarea":
return '<br>'.htmlspecialchars('
<div class="form-group">
<label> '.$nama.' </label>
<?php echo form_textarea(array(\'id\' => \''.$nama.'\', \'name\' => \''.$nama.'\', \'value\' => @$post->'.$nama.', \'rows\' => 5, \'class\' => \'wysiwyg-advanced form-control input-lg\')); ?>
</div>');
				break;
			case "select":
				if($properties['type'] =='dropdown') {
return '<br>'.htmlspecialchars('
<?php
$'.$nama.' = array();
$this->db->order_by(\''.$properties['value'].'\',\'ASC\');
$res = $this->db->get(\''.str_replace('default_','',$properties['selected_table']).'\')->result(); 
foreach($res as $dat => $val){
$'.$nama.'[$val->'.$properties['key'].'] = $val->'.$properties['value'].';
}
?>
<div class="form-group">
<label for="status">'.$nama.' </label>
<?php echo form_dropdown(\''.$nama.'\', $'.$nama.' , @$post->'.$nama.',\' class="form-control input-lg"\') ?>
</div>
				');
				}
				
				if($properties['type'] =='radio') {
return '<br>'.htmlspecialchars('
<?php $this->db->order_by(\''.$properties['value'].'\',\'ASC\');
$res = $this->db->get(\''.str_replace('default_','',$properties['selected_table']).'\')->result();
$valradio =\'\';
foreach($res as $dat => $val){
$'.$nama.'[$val->'.$properties['key'].'] = $val->'.$properties['value'].';
$valradio .=\'<br><label class="label-radio inline">\';
$valradio .=\'<input name="\'.$val->'.$properties['value'].'.\'" type="radio" value="\'. $val->'.$properties['key'].'.\'">\';
$valradio .=\'<span class="custom-radio"></span>\'.$val->'.$properties['value'].';
$valradio .=\'</label>\';
}
?>
<div class="form-group">
<label for="status">'.$nama.' </label>
<div class="">
<?php echo $valradio?>
</div>
</div>
				');
				}
				
				if($properties['type'] =='checkbox') {
return '<br>'.htmlspecialchars('
<?php $this->db->order_by(\''.$properties['value'].'\',\'ASC\');
$res = $this->db->query(\' select * from '.$properties['selected_table'].'\')->result();
$valradio =\'\';
foreach($res as $dat => $val){
$resdata[$val->'.$properties['key'].'] = $val->'.$properties['value'].';
$valradio .=\'<br><label class="label-radio inline">\';
$valradio .=\'<input class="checked" name="'.$nama.'[]" type="checkbox" value="\'. $val->'.$properties['key'].'.\'">\';
$valradio .=\'<span class="custom-checkbox"></span>\'.$val->'.$properties['value'].';
$valradio .=\'</label>\';
}
?>
<div class="form-group">
<label for="status">'.$nama.' </label>
<div class="">
<?php echo $valradio?>
</div>
</div>
				');
				}
				
				break;
			case "datepicker":
				return htmlspecialchars('<div class="form-group">
	<label class=""> '.$nama.'</label>
	<div class="">
	<div class="input-group" id="demo-dp-txtinput">
	<input name="'.$nama.'" value="<?php echo @$post->'.$nama.'?>" class="datepicker form-control" type="text">
	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	</div>
	</div>
	
</div>');
				break;
			case "enum":
				
				
				return htmlspecialchars('<?php $enum = data_enum(\''.$this->input->post('table').'\',\''.$nama.'\'); ?><div class="form-group">
	<label class=""> '.$nama.'</label>
	<div class="">
	<div class="input-group">
	<?php echo form_dropdown(\''.$nama.'\', $enum , @$post->'.$nama.',\' class="form-control input-lg"\') ?>
	 
	</div>
	</div>
	
</div>');
				break;
			case "file":
				
				
				return htmlspecialchars('
<div class="form-group">
	<label class="control-label col-lg-2"> '.$nama.'</label>
	<div class="col-lg-10">
	<div class="upload-file">
	<input name="'.$nama.'" id="upload-demo'.$nama.'" class="upload-demo" type="file">
	<label data-title="Select file" for="upload-demo'.$nama.'">
	<span data-title="No file selected..."></span>
	</label>
	 </div>
	</div>
</div>');
				break;
		}
	}
	
	function createvalidation($name="",$rules=""){
		 return '  array(
						\'field\' => \''.$name.'\',
						\'label\' => \''.str_replace('_',' ',$name).'\',
						\'rules\' => \''.$rules.'\'
					),';
	}
	
	function create_create(){
		echo 'public function create()
					{
						
						$this->load->library(\'form_validation\');
				
						$this->form_validation->set_rules($this->validation_rules);
				
						 
				
						if ($this->form_validation->run())
						{
							 
				
							$id = $this->blog_m->insert(array(';
							foreach($this->input->post('ischeck') as $data){
								
								echo '\''.$data.'\'	=> $this->input->post(\''.$data.'\'),';
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
							}
				
							// Redirect back to the form or main page
							$this->input->post(\'btnAction\') == \'save_exit\' ? redirect(\'admin/$this->nama_modul\') : redirect(\'admin/$this->nama_modul/edit/\' . $id);
						}
						else
						{
							// Go through all the known fields and get the post values
							foreach ($this->validation_rules as $key => $field)
							{
								@$post->$field[\'field\'] = set_value($field[\'field\']);
							}
							$post->created_on = $created_on;
						}
						 
						 
						$this->template 
								->append_metadata($this->load->view(\'fragments/wysiwyg\', $this->data, TRUE)) 
								->set(\'post\', $post)
								->build(\'admin/form\', $this->data);
				}
				
				------------------------------------------------ EDIT-----------------------------------------------------
				public function edit($id = 0)
										{
											$id OR redirect(\'admin/blog\');
									
											$this->load->library(\'form_validation\');
									
											$this->form_validation->set_rules($this->validation_rules);
									
											 
									
											// If we have a useful date, use it
											 
									
											$this->id = $post->id;
											
											if ($this->form_validation->run())
											{
												  
												$result = $this->db->update($id, array(';
												foreach($this->input->post('ischeck') as $data){
								
														echo '\''.$data.'\'	=> $this->input->post(\''.$data.'\'),';
													}
												echo '));
												
												if ($result)
												{
													$this->session->set_flashdata(array(\'success\' => sprintf($this->lang->line(\'blog_edit_success\'), $this->input->post(\'title\'))));
									
													// The twitter module is here, and enabled!
									//				if ($this->settings->item(\'twitter_blog\') == 1 && ($post->status != \'live\' && $this->input->post(\'status\') == \'live\'))
									//				{
									//					$url = shorten_url(\'blog/\'.$date[2].\'/\'.str_pad($date[1], 2, \'0\', STR_PAD_LEFT).\'/\'.url_title($this->input->post(\'title\')));
									//					$this->load->model(\'twitter/twitter_m\');
									//					if ( ! $this->twitter_m->update(sprintf($this->lang->line(\'blog_twitter_posted\'), $this->input->post(\'title\'), $url)))
									//					{
									//						$this->session->set_flashdata(\'error\', lang(\'blog_twitter_error\') . ": " . $this->twitter->last_error[\'error\']);
									//					}
									//				}
												}
												
												else
												{
													$this->session->set_flashdata(array(\'error\' => $this->lang->line(\'blog_edit_error\')));
												}
									
												// Redirect back to the form or main page
												$this->input->post(\'btnAction\') == \'save_exit\' ? redirect(\'admin/blog\') : redirect(\'admin/blog/edit/\' . $id);
											}
									
											// Go through all the known fields and get the post values
											foreach (array_keys($this->validation_rules) as $field)
											{
												if (isset($_POST[$field]))
												{
													$post->$field = $this->form_validation->$field;
												}
											}
									
											$post->created_on = $created_on;
											
											// Load WYSIWYG editor
											$this->template
													->title($this->module_details[\'name\'], sprintf(lang(\'blog_edit_title\'), $post->title))
													->append_metadata($this->load->view(\'fragments/wysiwyg\', $this->data, TRUE))
													->append_metadata(js(\'blog_form.js\', \'blog\'))
													->set(\'post\', $post)
													->build(\'admin/form\', $this->data);
										}
				
				
				';
	}
	
	 
}