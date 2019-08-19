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
$route['default_controller'] = 'Dashboard';
/*
| -------------------------------------------------------------------------
| -------------------------------------------------------------------------
*/

/* Dashboard */
$route['dashboard']          	= 'Dashboard';

/* Clients */
$route['clients']             	= 'Clients';
$route['clients/add']         	= 'Clients/add';
$route['clients/view/(:any)']   = 'Clients/view/$1';
$route['clients/edit/(:any)']   = 'Clients/edit/$1';
$route['clients/delete/(:any)'] = 'Clients/delete/$1';

/* Invoices */
$route['invoices/(:any)']     					= 'Invoices/invoice/$1';
$route['invoices/(:any)/make_payment']  		= 'Invoices/make_payment/$1';
$route['invoices/(:any)/print']  				= 'Invoices/print_invoice/$1';
$route['invoices/(:any)/void'] 					= 'Invoices/void/$1';
$route['invoices/(:any)/payment/delete']  		= 'Invoices/payment_delete/$1';
$route['invoices/(:any)/sale']  				= 'Invoices/sale/$1';

/* Setup */
$route['setup']              				= 'Setup';
$route['setup/branch/add']              	= 'Setup/add_branch';
$route['setup/branch/edit/(:any)']          = 'Setup/edit_branch/$1';
$route['setup/branch/delete/(:any)']       	= 'Setup/delete_branch/$1';
$route['setup/vehicle_class/add']           = 'Setup/add_vehicle_class';
$route['setup/vehicle_class/edit/(:any)']   = 'Setup/edit_vehicle_class/$1';
$route['setup/vehicle_class/delete/(:any)'] = 'Setup/delete_vehicle_class/$1';

/* Vehicles */
$route['vehicles']            		= 'Vehicles';
$route['vehicles/view/(:any)'] 		= 'Vehicles/view/$1';
$route['vehicles/add']		 		= 'Vehicles/add';
$route['vehicles/edit/(:any)']  	= 'Vehicles/edit/$1';
$route['vehicles/delete/(:any)']    = 'Vehicles/delete/$1';

/* Agreement */
$route['agreement']		 			= 'Agreement';
$route['agreement/view/(:any)']		= 'Agreement/view/$1';
$route['agreement/new']		 		= 'Agreement/new_agreement';
$route['agreement/new/step2']		= 'Agreement/step2';
$route['agreement/new/finish']		= 'Agreement/finish';
$route['agreement/(:any)/print']	= 'Agreement/print_agreement/$1';
$route['agreement/delete/(:any)']	= 'Agreement/delete/$1';
$route['agreement/(:any)/check_in'] = 'Agreement/check_in/$1';

/* Reports */
$route['reports']	= 'Reports';


/* Services */
$route['services/getbranchvehicle/(:any)']		 	= 'Services/getVehicle/$1';
$route['services/getclientinfo/(:any)/(:any)']		= 'Services/getClient/$1/$2';
$route['services/getclientdrivers/(:any)']		 	= 'Services/getClientDrivers/$1';


/* Auth */
$route['login']		 		= 'Auth/login';
$route['logout']		 	= 'Auth/logout';
$route['profile']		 	= 'Auth/profile';

/* Other */
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
