<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['print_quotation/(:num)'] = 'Quotetion/print_quotation/$1';
$route['editor'] = 'editor/index';
$route['editor/save_content'] = 'editor/save_content';
$route['editor/view_all'] = 'editor/view_all';
$route['editor/view/(:num)'] = 'editor/view/$1';

