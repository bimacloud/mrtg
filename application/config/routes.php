<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/*$route['mrtg/generate/(:any)'] = 'SiteController/generateMrtg/$1';
$route['mrtg/view/(:any)'] = 'SiteController/viewMrtg/$1';
*/
$route['roles'] = 'Role/index';
$route['users'] = 'User/index';
$route['user/create'] = 'User/create';
$route['user/save'] = 'User/save';
$route['user/edit/(:num)'] = 'User/edit/$1';
$route['user/update/(:num)'] = 'User/update/$1';
$route['user/delete/(:num)'] = 'User/delete/$1';

$route['roles'] = 'Role/index';
$route['role/create'] = 'Role/create';
$route['role/save'] = 'Role/save';
$route['role/edit/(:num)'] = 'Role/edit/$1';
$route['role/update/(:num)'] = 'Role/update/$1';
$route['role/delete/(:num)'] = 'Role/delete/$1';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['dashboard'] = 'dashboard/index';


$route['site'] = 'site/index';
$route['site/create'] = 'site/create';
$route['site/save'] = 'site/save';
$route['site/edit/(:num)'] = 'site/edit/$1';
$route['site/update/(:num)'] = 'site/update/$1';
$route['site/delete/(:num)'] = 'site/delete/$1';
$route['site/config/(:num)'] = 'site/config/$1';
$route['site/save_config/(:num)'] = 'site/save_config/$1';
$route['site/config_mrtg/(:num)'] = 'site/config_mrtg/$1';
