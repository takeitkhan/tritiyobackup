<?php
$route['sms'] = 'sms/index';
$route['sms-setting'] = 'sms/setting';
$route['sms-compose'] = 'sms/compose';
$route['sms-archive'] = 'sms/archive';
$route['sms-template'] = 'sms/template';
$route['sms-template-delete/(.+)'] = 'sms/delete/$1';
$route['sms-template-edit/(.+)'] = 'sms/edit/$1';
$route['send-single-compose'] = 'sms/send_single_compose';
$route['sms-transaction'] = 'sms/transaction';

$route['sms-transaction-delete/(.+)'] = 'sms/transaction_delete/$1';
$route['sms-transaction-edit/(.+)'] = 'sms/transaction_edit/$1';
$route['sms-transaction-active/(.+)/(.+)'] = 'sms/transaction_active/$1/$2';

$route['post-sms-send']= 'sms/post_sms_send';
$route['post-sms-send-multile']= 'sms/post_sms_send_multile';
$route['send_result_all_sms'] = 'sms/send_result_all_sms';




?>
