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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'users';
$route['404_override'] = 'errors/error_404';
$route['translate_uri_dashes'] = FALSE;

$route['users/validate'] = 'users/process_signin';
$route['users/logoff'] = 'users/logoff';


$route['dashboards/users'] = 'dashboards/users';
$route['dashboards/add_user'] = 'dashboards/add_user';
$route['users/create'] = 'users/process_registration';
$route['users/delete/(:any)'] = 'dashboards/delete/$1';
$route['users/block/(:any)'] = 'dashboards/blocked/$1';
$route['users/unblock/(:any)'] = 'dashboards/unblock/$1';
$route['dashboards/edit/(:any)'] = 'dashboards/edit/$1';
$route['dashboards/edit/(:any)/validate'] = 'dashboards/process_user_modification';

$route['dashboards/form'] = 'dashboards/form';
$route['dashboards/logs'] = 'dashboards/logs';
$route['dashboards/offices'] = 'dashboards/history';

$route['documents/create'] = 'documents/create';
$route['documents/add_location'] = 'documents/add_location';
$route['documents/view/(:any)'] = 'documents/view/$1';
$route['documents/edit/(:any)'] = 'documents/edit/$1';
$route['documents/release'] = 'documents/release';
$route['documents/update'] = 'documents/update';
$route['documents/cancel/(:any)'] = 'documents/cancel_creation/$1';
$route['documents/delete_item/(:any)'] = 'documents/delete_item/$1';
$route['documents/return/(:any)'] = 'documents/return_document/$1';
$route['documents/cancel_process/(:any)'] = 'documents/cancel_process/$1';
$route['documents/save_process'] = 'documents/save_process';
$route['documents/validate_item'] = 'documents/validate_item';


