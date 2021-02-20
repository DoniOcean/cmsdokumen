<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('app.php');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| 	www.your-site.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://www.codeigniter.com/user_guide/general/routing.html
*/
// public
$route['('.$config['mname'].')/(:num)/(:num)/(:any)']	= $config['mname'].'/view/$4';
$route['('.$config['mname'].')/page(/:num)?']			=  $config['mname'].'/index$2';
$route['('.$config['mname'].')/document/(/:num)?/(:num)/(:num)/(:any)']			=  $config['mname'].'/document/$5'; 
// admin
$route[''.$config['mname'].'/admin/categories(/:any)?']		= 'admin_categories$1';