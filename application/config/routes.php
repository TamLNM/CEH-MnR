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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['106a6c241b8797f52e1e77317b96a201'] = "home";
$route['106a6c241b8797f52e1e77317b96a201/([a-zA-Z0-9]+)'] = "home/$1";

$route['ee11cbb19052e40b07aac0ca060c23ee'] = "user";
$route['ee11cbb19052e40b07aac0ca060c23ee/([a-zA-Z0-9]+)'] = "user/$1";

$route['d13bc5b68b2bd9e18f29777db17cc563'] = "Common";
$route['d13bc5b68b2bd9e18f29777db17cc563/([a-zA-Z0-9]+)'] = "Common/$1";

$route['e4dd8e60c486d79d6a49a49678a78e2f'] = "ExpertiseAndRepair";
$route['e4dd8e60c486d79d6a49a49678a78e2f/([a-zA-Z0-9]+)'] = "ExpertiseAndRepair/$1";

$route['4b1b4dc8cf38b3c64b1d657da8f5ac8c'] = "Report";
$route['4b1b4dc8cf38b3c64b1d657da8f5ac8c/([a-zA-Z0-9]+)'] = "Report/$1";

$route['742e367b489bd598edcb306560e3b1f4'] = "Tariff";
$route['742e367b489bd598edcb306560e3b1f4/([a-zA-Z0-9]+)'] = "Tariff/$1";

$route['d421fd439cd14456726791338b3b397e'] = "Tool";
$route['d421fd439cd14456726791338b3b397e/([a-zA-Z0-9]+)'] = "Tool/$1";

$route['f678b82c579ba5e54832d72ae5cc5f91'] = "gate_inspector";
$route['f678b82c579ba5e54832d72ae5cc5f91/([a-zA-Z0-9]+)'] = "gate_inspector/$1";