<?php
$route['customers'] = 'customers';
$route['deletedcustomers'] = 'customers/deleted_customers';
$route['addcustomer'] = 'customers/add';
$route['editcustomer/(:num)'] = 'customers/edit/$1';
$route['ajaxcustomer'] = 'customers/ajax';
$route['deletecustomer/(:num)'] = 'customers/delete/$1';
$route['alivecustomer/(:num)'] = 'customers/alive/$1';

?>