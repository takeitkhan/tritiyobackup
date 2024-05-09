<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'auth/login';
$route['404_override'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['outlet'] = 'auth/login';
$route['login'] = 'auth/login';
$route['dashboard'] = 'dashboard/index';

/** Administrator Panel **/
$route['panel'] = 'administrator/index';
$route['subscribers'] = 'administrator/subscribers';

/** Settings Panel  **/
$route['systemsettings'] = 'settings/index';
$route['institute_informations'] = 'settings/index';
$route['admin_informations'] = 'settings/admin_system_settings';
$route['modifysystemsettings'] = 'settings/modify_system_settings';
$route['modifyadminsystemsettings'] = 'settings/modify_admin_system_settings';
$route['addclass'] = 'settings/add_class_form';






/*** Module Routes ***/
$modules_path = APPPATH.'modules/';
$modules = scandir($modules_path);
foreach($modules as $module) {
    if($module === '.' || $module === '..') continue;
    if(is_dir($modules_path) . '/' . $module) {
        $routes_path = $modules_path . $module . '/config/routes.php';
        if(file_exists($routes_path)) {
            require($routes_path);
        }
        else {
            continue;
        }
    }
}







