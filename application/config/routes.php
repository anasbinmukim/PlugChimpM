<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

// $route['default_controller'] = 'auth/login';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;

$route['login']   = 'auth/login';
$route['logout']  = 'auth/logout';
$route['register']   = 'auth/register';
$route['forgot-password'] = 'auth/forgot_password';
$route['reset-password/(:any)'] = 'auth/reset_password/$1';
$route['set-password/(:any)'] = 'auth/set_password/$1';

$route['profile']  = 'profile';
//$route['admin/settings']  = 'admin/settings';

// $route['news/create'] = 'news/create';
// $route['news/(:any)'] = 'news/view/$1';
// $route['news'] = 'news';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

//$route['default_controller'] = 'pages/view';
