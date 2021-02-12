<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'dashboard';
$route['404_override'] = 'underconstruction';
$route['translate_uri_dashes'] = FALSE;
// $route['admin/'] = 'admin/dashboard';
$route['admin/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'admin/$1/$2/$3/$4/$5';
