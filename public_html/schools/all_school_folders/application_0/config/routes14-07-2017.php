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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'frontend';
$route['404_override'] = 'frontend';
$route['translate_uri_dashes'] = FALSE;

/** Authentication **/
$route['logout'] = 'auth/logout';

/** Dashboard Views **/
$route['outlet'] = 'auth/login';
$route['login'] = 'auth/login';
$route['dashboard'] = 'dashboard/index';


/** Insert New Entry **/
$route['usergenerator'] = 'profileeditor/generate_userid';
$route['generatestudentandguardian'] = 'profileeditor/generate_student_and_guardian';
$route['generateteacherorstaff'] = 'profileeditor/generate_teacher_or_staff';
$route['insertneweducation'] = 'profileeditor/add_new_education';
$route['insertnewwork'] = 'profileeditor/add_new_work';
$route['insertnewbusiness'] = 'profileeditor/add_new_business';
$route['insertclass'] = 'settings/add_class';
$route['blockmanager'] = 'settings/block_manager';
$route['blockmanager/(:num)'] = 'settings/block_manager';
$route['insertnewblock'] = 'settings/add_new_block';
$route['deleteblock/(:num)'] = 'settings/delete_block';
$route['addnewpage'] = 'pages/add_page';
$route['insert_page'] = 'pages/insert_page';
$route['addnewclass'] = 'initialsettings/index';
$route['addnewsection'] = 'initialsettings/index';
$route['addnewdepartment'] = 'initialsettings/index';
$route['addnewsubject'] = 'initialsettings/index';
$route['addnewexam'] = 'initialsettings/index';
$route['addnewshift'] = 'initialsettings/index';
$route['insertInitialSettings'] = 'initialsettings/insert_initial_settings';
$route['promotion_manager'] = 'profileeditor/promotion_manager';

/** Form Views For Modifications **/
$route['usersexists/(:num)'] = 'profileeditor/if_user_exists';
$route['overview'] = 'profileeditor/index';
$route['overview/(:num)'] = 'profileeditor/index';
$route['educationhistory'] = 'profileeditor/education_history';
$route['educationhistory/(:num)'] = 'profileeditor/education_history';
$route['workhistory'] = 'profileeditor/work_history';
$route['workhistory/(:num)'] = 'profileeditor/work_history';
$route['mybusinesses'] = 'profileeditor/my_businesses';
$route['mybusinesses/(:num)'] = 'profileeditor/my_businesses';
$route['subscription'] = 'profileeditor/subscription';
$route['subscription/(:num)'] = 'profileeditor/subscription';
$route['changepass'] = 'profileeditor/change_password';
$route['changepass/(:num)'] = 'profileeditor/change_password';
$route['deleteanuser'] = 'profileeditor/delete_an_user';
$route['deleteanuser/(:num)'] = 'profileeditor/delete_an_user';
$route['viewpages'] = 'pages/view_page';
$route['ini_set/(:num)'] = 'initialsettings/view_initial_settings';
//$route['viewsections'] = 'initialsettings/view_initial_settings';
//$route['viewdepartments'] = 'initialsettings/view_initial_settings';
//$route['viewsubjects'] = 'initialsettings/view_initial_settings';
//$route['viewexams'] = 'initialsettings/view_initial_settings';
//$route['viewshift'] = 'initialsettings/view_initial_settings';

/** Brings Data From Data For Modifications **/
$route['basicinformation'] = 'profileeditor/users_information';
$route['basicinformation/(:num)'] = 'profileeditor/users_information';
$route['personalinformation'] = 'profileeditor/personal_information';
$route['personalinformation/(:num)'] = 'profileeditor/personal_information';
$route['studentpersonalinformation'] = 'profileeditor/student_personal_information';
$route['studentpersonalinformation/(:num)'] = 'profileeditor/student_personal_information';

/** Modifications **/
$route['modifybasicinformation'] = 'profileeditor/modify_basic_information';
$route['modifybasicinformation/(:num)'] = 'profileeditor/modify_basic_information';
$route['modifypersonalinformation'] = 'profileeditor/modify_personal_information';
$route['modifypersonalinformation/(:num)'] = 'profileeditor/modify_personal_information';
$route['modifystudentpersonalinformation'] = 'profileeditor/modify_student_personal_information';
$route['modifystudentpersonalinformation/(:num)'] = 'profileeditor/modify_student_personal_information';
$route['modifypasswordinformation'] = 'profileeditor/modify_password_information';
$route['modifypasswordinformation/(:num)'] = 'profileeditor/modify_password_information';
$route['getupazila/(:num)'] = 'profileeditor/get_upazila';

/** Delete an item **/
$route['deleteeducation/(:num)'] = 'profileeditor/delete_education';
$route['deletework/(:num)'] = 'profileeditor/delete_work';
$route['deletebusiness/(:num)'] = 'profileeditor/delete_business';
$route['deletepage/(:num)'] = 'pages/delete_page';

/** Update Form **/
$route['addnewpage/(:num)'] = 'pages/add_page';
$route['insert_page/(:num)'] = 'pages/insert_page';
$route['checkpageroute/(:any)'] = 'pages/check_page_name';
$route['addnewclass/(:num)'] = 'initialsettings/index';
$route['addnewsection/(:num)'] = 'initialsettings/index';
$route['addnewdepartment/(:num)'] = 'initialsettings/index';
$route['addnewsubject/(:num)'] = 'initialsettings/index';
$route['addnewexam/(:num)'] = 'initialsettings/index';
$route['addnewshift/(:num)'] = 'initialsettings/index';

/** Photo Upload Script **/
$route['uploadprofilephoto'] = 'profileeditor/upload_profile_photo';

/** Green Directory **/
$route['directory'] = 'greendirectory/index';
$route['businesses'] = 'greendirectory/index';
$route['businesses/(:num)'] = 'greendirectory/get_businesses';

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

/** media **/
$route['post'] = 'post/index';
$route['addpost'] = 'post/add_post';
$route['editpost/(:num)'] = 'post/add_post';
$route['deletepost/(:num)'] = 'post/delete_post';
$route['postupload'] = 'post/uploadpost';


/** Online Admission **/
$route['newadmission'] = 'onlineadmission/index';
$route['insert_online_admission'] = 'onlineadmission/insert_online_admission';
$route['deleteapplicants/(:num)'] = 'onlineadmission/delete_applicants';

/** Sitemap **/
$route['sitemap'] = 'frontend/sitemap';


/** Payment Modules **/
$route['newreceipt'] = 'payments/index';
$route['transactionidadder'] = 'payments/transaction_id';
$route['inserttransactionid'] = 'payments/insert_transaction_id';
$route['newledgername'] = 'payments/ledger_names_entry';
$route['insertledgername'] = 'payments/insert_ledger_name';
$route['newcredit'] = 'payments/new_credit_payment';
$route['newdebit'] = 'payments/new_debit_payment';
$route['insertpayment'] = 'payments/insert_payment';
$route['insertpay'] = 'payments/insert_pay';
$route['receiveatonce'] = 'payments/receive_at_once';
$route['submitreceiveatonce'] = 'payments/insert_receive_at_once';
$route['payatonce'] = 'payments/pay_at_once';
$route['submitpayatonce'] = 'payments/insert_pay_at_once';

/** Result Module **/
$route['generateresultview'] = 'results/index';
$route['generateresultsnow'] = 'results/generate_results';
$route['viewresults'] = 'results/results_data_grid';
$route['getindividualresult'] = 'results/get_individual_result';
$route['marksinput/(:num)'] = 'results/results_modification';
$route['showsubjectbaseresult'] = 'results/subject_wise_result';

/** Frontend Routes **/
$route['page/(:any)'] = 'frontend/index';
$route['content'] = 'frontend/index';
$route['admission'] = 'frontend/online_admission';
$route['admission/(:any)'] = 'frontend/online_admission';
$route['checktransactionid/(:num)'] = 'payments/check_transaction_id';
$route['checkadmission/(:num)'] = 'payments/check_admission_id';
$route['makeadmissioninstance'] = 'frontend/admission_instance';
$route['insertstudentinformation'] = 'frontend/admission_information';
$route['applicationfee'] = 'frontend/insert_payment';
$route['admissionrequest'] = 'onlineadmission/view_admission_request';
$route['singleapplicants/(:num)'] = 'onlineadmission/view_single_applicants';


/** Guardian Panel **/
$route['getmoneyreceipt'] = 'reports/get_fee_report';
$route['getfeereports'] = 'reports/get_fee_report';
$route['getpayslip'] = 'reports/get_pay_slip';
$route['getstdattendancereport'] = 'reports/get_std_attendance_report';
$route['getstdresultreport'] = 'reports/get_std_result_report';

/** studentsattendance **/
$route['generateattendance'] = 'administrator/generate_attendance';
$route['attendanceinput/(:num)'] = 'administrator/attendance_modification';


/** CRM **/
$route['crm_panel'] = 'crm/crm_functionality';
$route['crm_panel/(:num)'] = 'crm/crm_functionality';
$route['get_addresses/(:any)'] = 'crm/get_addresses';
$route['disposition'] = 'crm/insert_call_history';
$route['sendmessage'] = 'crm/insert_message';
