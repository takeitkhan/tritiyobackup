<?php
$route['products'] = 'products';
$route['addproduct'] = 'products/add';
$route['ajaxproduct'] = 'products/ajax';
$route['deleteproduct'] = 'products/delete';

/************
 Units route
*************/
$route['units'] = 'products/units';
$route['addunits'] = 'products/add_units';
$route['editunits/(:num)'] = 'products/edit_units/$1';
$route['deleteunits/(:num)'] = 'products/delete_units/$1';
$route['aliveunits/(:num)'] = 'products/alive_units/$1';

/*********************
 Manufacturers route
**********************/
$route['manufacturers'] = 'products/manufacturers';
$route['addmanufacturers'] = 'products/add_manufacturers';
$route['editmanufacturers/(:num)'] = 'products/edit_manufacturers/$1';
$route['deletemanufacturers/(:num)'] = 'products/delete_manufacturers/$1';
$route['alivemanufacturers/(:num)'] = 'products/alive_manufacturers/$1';

/*********************
 Brands route
**********************/
$route['brands'] = 'products/brands';
$route['addbrands'] = 'products/add_brands';
$route['editbrands/(:num)'] = 'products/edit_brands/$1';
$route['deletebrands/(:num)'] = 'products/delete_brands/$1';
$route['alivebrands/(:num)'] = 'products/alive_brands/$1';

/*********************
 Vendors route
**********************/
$route['vendors'] = 'products/vendors';
$route['addvendors'] = 'products/add_vendors';
$route['editvendors/(:num)'] = 'products/edit_vendors/$1';
$route['deletevendors/(:num)'] = 'products/delete_vendors/$1';
$route['alivevendors/(:num)'] = 'products/alive_vendors/$1';

?>