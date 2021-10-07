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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'dashboard/home';
$route['about-us'] = 'dashboard/about';
$route['wellness'] = 'dashboard/wellness';
$route['surgery'] = 'dashboard/surgery';
$route['blog'] = 'dashboard/blog';
$route['catalog'] = 'dashboard/catalog';
$route['branch'] = 'dashboard/branch';
$route['teambranch'] = 'dashboard/teambranch';

// User Controller Routes/Links
$route['login'] = 'user/login';
$route['login_submit'] = 'user/login_submit';
$route['signup'] = 'user/signup';
$route['submit-signup'] = 'user/submit_signup';
$route['logout'] = 'user/logout';
$route['activate-account'] = 'user/activateAccount';
$route['signup-success'] = 'user/signUpSuccess';
$route['forgot-password'] = 'user/forgotPass';
$route['requested-reset-password'] = 'user/resetPasswordLink';
$route['account'] = 'user/account';
$route['account/edit'] = 'user/edit';
$route['account/change-password'] = 'user/changePassword';

// Client Controller Routes/Links
$route['client-dashboard'] = 'client/index';

// Staff Controller Routes/Links
$route['admin'] = 'staff/index';
$route['staff-login'] = 'staff/login';
$route['staff-portal'] = 'staff/dashboard';

// Admin Controller Routes/Links
$route['admin-dashboard'] = 'admin/index';

    // Appointment Controller
    $route['admin/appointment/add'] = 'appointment/add';
    $route['admin/appointment/edit/(:any)'] = 'appointment/edit/$1';
    $route['admin/appointment/view/(:any)'] = 'appointment/view/$1';

    // Branch Controller
    $route['admin/branch/add'] = 'branch/add';
    $route['admin/branch/edit/(:any)'] = 'branch/edit/$1';
    $route['admin/branch/view/(:any)'] = 'branch/view/$1';

    // Inventory Controller
    $route['inventories/index'] = 'admin/inventories/index';
    $route['admin/inventory/add'] = 'inventory/add';
    $route['admin/inventory/edit/(:any)'] = 'inventory/edit/$1';

// Species Controller Routes/Links
$route['species'] = 'species/dashboard';
$route['validateSpeciesName'] = 'species/validateName';
$route['updateSpecies'] = 'species/updateSpecies';
$route['delete-species/(:any)'] = 'species/delete/$1';

// Breeds Controller Routes/Links
$route['breeds'] = 'breed/dashboard';
$route['validateBreedName'] = 'breed/validateName';
$route['updateBreed'] = 'breed/update';
$route['delete-breed/(:any)'] = 'breed/delete/$1';

// Pets Controller Routes/Links
$route['pets/add'] = 'pet/add';
$route['pets/edit/(:any)'] = 'pet/edit/$1';
$route['pets/view/(:any)'] = 'pet/view/$1';
$route['patients'] = 'pet/dahsboard';

// Appointment Controller Routes/Links
$route['appointment/add'] = 'appointment/add';
$route['appointment/edit/(:any)'] = 'appointment/edit/$1';
$route['appointments'] = 'appointment/dahsboard';
$route['confirm-appointment/(:any)'] = 'appointment/confirm/$1';
$route['appointment/cancel'] = 'appointment/cancel';
$route['appointment/done'] = 'appointment/done';

$route['vets'] = 'vet/dahsboard';
$route['branches'] = 'branch/dahsboard';

$route['schedules'] = 'schedule/dashboard';
$route['add-schedule'] = 'schedule/add';