<?php
$route['employees'] = 'employee';
$route['addemployee'] = 'employee/add';
$route['ajaxemployee'] = 'employee/ajax';
$route['deleteemployee'] = 'employee/delete';
$route['editemployee/(:num)'] = 'employee/edit/$1';
$route['deleteemployee/(:num)'] = 'employee/delete/$1';
$route['aliveemployee/(:num)'] = 'employee/alive/$1';
$route['deletedemployees'] = 'employee/deleted_employee';
?>