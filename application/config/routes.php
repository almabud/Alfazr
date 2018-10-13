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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login']='admin/user/login';
$route['login/(:any)/(:any)']='admin/user/login';
$route['register']='admin/user/register';
$route['do_register']='admin/user/do_register';
$route['re_send_email']='admin/user/re_send_email';
$route['logout']='admin/user/logout';
$route['user/profile']='admin/dashboard/profile';
$route['user/profile/update/(:num)']='admin/dashboard/update_profile_c/$1';
$route['user/profile/update/photo/(:num)']='admin/dashboard/add_photos/$1';
$route['admin/hotels/rooms']='admin/rooms';
$route['admin/hotels/rooms/get_room_data']='admin/rooms/get_room_data';
$route['admin/hotels/rooms/roomlist']='admin/rooms/show_room_content';
$route['admin/hotels/rooms/edit_room_content']='admin/rooms/edit_room_content';
$route['admin/hotels/rooms/add_room_content']='admin/rooms/add_room_content';
$route['admin/hotels/rooms/add_room']='admin/rooms/add_room';
$route['admin/hotels/rooms/edit_room']='admin/rooms/edit_room';
$route['admin/hotels/rooms/dlt_room']='admin/rooms/dlt_room';


