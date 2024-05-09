<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'frontend';
// $route['default_controller'] = 'layout';
// $route['page/(:any)'] = 'layout/page';
// $route['page/(:num)'] = 'layout/page';
// $route['article/(:any)'] = 'layout/single_page';
// $route['article/(:num)'] = 'layout/single_page';

// $route['category/(:num)'] = 'item/category_product/$1';
// $route['category/(:num)-(:any)'] = 'item/category_product/$1';
// $route['category/(:num)/(:any)'] = 'item/category_product/$1';
// $route['search/(:any)'] = 'item/search_product/$1';

// $route['product/(:num)'] = 'item/single_product/$1';
// $route['product/(:num)-(:any)'] = 'item/single_product/$1';
// $route['product/(:num)/(:any)'] = 'item/single_product/$1';



$route['404_override'] = 'frontend';
$route['translate_uri_dashes'] = FALSE;

/** Authentication * */
$route['logout'] = 'auth/logout';

/** Dashboard Views * */
$route['outlet'] = 'auth/login';
$route['login'] = 'auth/login';
$route['dashboard'] = 'dashboard/index';
$route['musa_control'] = 'musa/index';
// $route['myaccount'] = 'frontend/my_account';
$route['myaccount'] = 'dashboard/index';
$route['orderlist'] = 'frontend/orderlist';
$route['personal_information'] = 'frontend/personal_information';
$route['register'] = 'frontend/register';
$route['sendcontact'] = 'common/send_contact_email';
$route['send_requirment'] = 'frontend/send_client_requirment_mail';


/** Insert New Entry * */
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

/** Form Views For Modifications * */
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

/** Brings Data From Data For Modifications * */
$route['basicinformation'] = 'profileeditor/users_information';
$route['basicinformation/(:num)'] = 'profileeditor/users_information';
$route['personalinformation'] = 'profileeditor/personal_information';
$route['personalinformation/(:num)'] = 'profileeditor/personal_information';
$route['studentpersonalinformation'] = 'profileeditor/student_personal_information';
$route['studentpersonalinformation/(:num)'] = 'profileeditor/student_personal_information';

/** Modifications * */
$route['modifybasicinformation'] = 'profileeditor/modify_basic_information';
$route['modifybasicinformation/(:num)'] = 'profileeditor/modify_basic_information';
$route['modifypersonalinformation'] = 'profileeditor/modify_personal_information';
$route['modifypersonalinformation/(:num)'] = 'profileeditor/modify_personal_information';
$route['modifystudentpersonalinformation'] = 'profileeditor/modify_student_personal_information';
$route['modifystudentpersonalinformation/(:num)'] = 'profileeditor/modify_student_personal_information';
$route['modifypasswordinformation'] = 'profileeditor/modify_password_information';
$route['modifypasswordinformation/(:num)'] = 'profileeditor/modify_password_information';
$route['getupazila/(:num)'] = 'profileeditor/get_upazila';

/** Delete an item * */
$route['deleteeducation/(:num)'] = 'profileeditor/delete_education';
$route['deletework/(:num)'] = 'profileeditor/delete_work';
$route['deletebusiness/(:num)'] = 'profileeditor/delete_business';
$route['deletepage/(:num)'] = 'pages/delete_page';

/** Update Form * */
$route['addnewpage/(:num)'] = 'pages/add_page';
$route['insert_page/(:num)'] = 'pages/insert_page';
$route['checkpageroute/(:any)'] = 'pages/check_page_name';
$route['checkpostroute/(:any)'] = 'pages/check_post_name';
$route['addnewclass/(:num)'] = 'initialsettings/index';
$route['addnewsection/(:num)'] = 'initialsettings/index';
$route['addnewdepartment/(:num)'] = 'initialsettings/index';
$route['addnewsubject/(:num)'] = 'initialsettings/index';
$route['addnewexam/(:num)'] = 'initialsettings/index';
$route['addnewshift/(:num)'] = 'initialsettings/index';

/** Photo Upload Script * */
$route['uploadprofilephoto'] = 'profileeditor/upload_profile_photo';

/** Green Directory * */
$route['directory'] = 'greendirectory/index';
$route['businesses'] = 'greendirectory/index';
$route['businesses/(:num)'] = 'greendirectory/get_businesses';

/** Administrator Panel * */
$route['panel'] = 'administrator/index';
$route['subscribers'] = 'administrator/subscribers';

/** Settings Panel  * */
$route['systemsettings'] = 'settings/index';
$route['org_informations'] = 'settings/index';
$route['admin_informations'] = 'settings/admin_system_settings';
$route['modifysystemsettings'] = 'settings/modify_system_settings';
$route['modifyadminsystemsettings'] = 'settings/modify_admin_system_settings';
$route['social_login'] = 'dashboard/social_login';
$route['addclass'] = 'settings/add_class_form';

/** media * */
$route['addcategory'] = 'post/add_category';
$route['insertnewcategory'] = 'post/modify_category';
$route['viewcategories'] = 'post/view_categories';
$route['post'] = 'post/index';
$route['addpost'] = 'post/add_post';
$route['searchandedit'] = 'post/add_post';
$route['facebook_post'] = 'post/facebook_post';
$route['editpost'] = 'post/add_post';
$route['editpost/(:num)'] = 'post/add_post';
$route['editcategory/(:num)'] = 'post/add_category';
$route['deletepost/(:num)'] = 'post/delete_post';
$route['deletecategory/(:num)'] = 'post/delete_post';
$route['postupload'] = 'post/uploadpost';
$route['uploadimage'] = 'post/uploadimage';


/** Online Admission * */
$route['newadmission'] = 'onlineadmission/index';
$route['insert_online_admission'] = 'onlineadmission/insert_online_admission';
$route['deleteapplicants/(:num)'] = 'onlineadmission/delete_applicants';




/** Payment Modules * */
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

/** Result Module * */
$route['generateresultview'] = 'results/index';
$route['generateresultsnow'] = 'results/generate_results';
$route['viewresults'] = 'results/results_data_grid';
$route['marksinput/(:num)'] = 'results/results_modification';
$route['showsubjectbaseresult'] = 'results/subject_wise_result';

/** Frontend Routes * */
// $route['amp/(.+)\.html'] = 'frontend/amp_html';

$route['page/(:any)'] = 'frontend/page';
$route['services/(:any)'] = 'frontend/page';
$route['products/(:any)/(:any)'] = 'frontend/page';
$route['page/(:num)'] = 'frontend/page';
$route['article/(:any)'] = 'frontend/single_page';
$route['article/(:num)'] = 'frontend/single_page';
$route['portfolio'] = 'frontend/portfolio';
$route['web-design-web-development-digital-marketing-blog'] = 'frontend/blog';
$route['p/(:any)'] = 'frontend/blog_single/$1';
$route['page/portfolio/(:num)'] = 'frontend/category_product/$1';
$route['page/portfolio/(:num)'] = 'frontend/category_product/$1';
$route['happy_client/(:num)-(:any)'] = 'frontend/happy_client/$1';
$route['blog'] = 'frontend/blog';


//$route['category/(:num)'] = 'frontend/category_product/$1';
//$route['category/(:num)-(:any)'] = 'frontend/category_product/$1';
//$route['category/(:num)/(:any)'] = 'frontend/category_product/$1';
//$route['comfy'] = 'frontend/category_product/108';



//$route['getsubcategory'] = 'frontend/get_sub-category';



$route['catalogue/(:num)'] = 'frontend/catalogue_product/$1';
$route['catalogue/(:num)-(:any)'] = 'frontend/catalogue_product/$1';
$route['catalogue/(:num)/(:any)'] = 'frontend/catalogue_product/$1';

//$route['product/(:num)'] = 'frontend/single_product/$1';   //Single product
//$route['product/(:num)-(:any)'] = 'frontend/single_product/$1';   //Single product
//$route['product/(:num)/(:any)'] = 'frontend/single_product/$1';   //Single product

/* Frontend Cart */
$route['cart'] = 'frontend/view_cart';
$route['add_to_cart'] = 'frontend/add_to_cart';
$route['remove_from_cart'] = 'frontend/remove_from_cart';
$route['update_cart'] = 'frontend/update_cart';

$route['authentication'] = 'frontend/checkout';
$route['checkout'] = 'frontend/checkout';
$route['checkout/(:num)'] = 'frontend/checkout/$1';
$route['update_shiping_address'] = 'frontend/update_shiping_address';
$route['update_payment_info'] = 'frontend/update_payment_info';
$route['confirm_order'] = 'frontend/confirm_order';
$route['confirm_order(:any)'] = 'frontend/confirm_order';
$route['view_invoice/(:any)/(:any)'] = 'frontend/view_invoice/$1/$2';
$route['view_invoicer/(:any)'] = 'frontend/view_invoicer';
$route['return_message'] = 'frontend/return_message';
$route['compare'] = 'frontend/compare_products';
$route['regal_showrooms'] = 'frontend/showrooms';
$route['common'] = 'common/index';
//$route['search'] = 'frontend/search_product';


//$route['advance_search'] = 'frontend/advance_search_product';

//$route['advance_search/(:num)'] = 'frontend/advance_search_product/$1';
//$route['advance_search/(:num)-(:any)'] = 'frontend/advance_search_product/$1';
//$route['advance_search/(:num)/(:any)'] = 'frontend/advance_search_product/$1';
/* Front end ajax route */
$route['get_products_html'] = 'frontend/products_html';
$route['add_to_compare'] = 'frontend/add_to_compare';
$route['remove_from_compare'] = 'frontend/remove_from_compare';
$route['get_showrooms'] = 'frontend/get_showrooms';



/** Guardian Panel * */
$route['getmoneyreceipt'] = 'reports/get_fee_report';
$route['getpayslip'] = 'reports/get_pay_slip';
$route['getstdattendancereport'] = 'reports/get_std_attendance_report';
$route['getstdresultreport'] = 'reports/get_std_result_report';

/** students attendance * */
$route['generateattendance'] = 'administrator/generate_attendance';
$route['attendanceinput/(:num)'] = 'administrator/attendance_modification';


/** CRM * */
$route['crm_panel'] = 'crm/crm_functionality';
$route['crm_panel/(:num)'] = 'crm/crm_functionality';
$route['get_addresses/(:any)'] = 'crm/get_addresses';
$route['disposition'] = 'crm/insert_call_history';
$route['sendmessage'] = 'crm/insert_message';


/* Product Route */
$route['addnewproduct'] = 'product/add_new_product';
$route['productbrand'] = 'product/product_brand';
$route['productbrand/(:num)'] = 'product/product_brand/$1';
$route['saveproduct'] = 'product/save_product';
$route['productlist'] = 'product/product_list';
$route['editproduct/(:num)'] = 'product/edit_product/$1';
$route['delete_product'] = 'product/delete_product';
$route['get_products'] = 'product/get_products';


$route['addsofaproduct'] = 'product/add_new_sofa_product';
$route['savesofaproduct'] = 'product/add_sofa_product';
$route['editsofaproduct/(:num)'] = 'product/edit_sofa_product/$1';


/* Media Route */
$route['media'] = 'media/meida_list';
$route['uploadfile'] = 'media/do_upload';
$route['get_media_list_json'] = 'media/get_media_list_json';


/* Cateogry Route*/
$route['categories'] = 'term/category_list';
$route['addnewcategory'] = 'term/add_category';
$route['savecategory'] = 'term/save_category';
$route['edit_category/(:num)'] = 'term/edit_category/$1';
$route['delete_category/(:num)'] = 'term/delete_category/$1';

/* Portfolio Route*/

$route['portfolios'] = 'portfolio/portfolio_list';
$route['addnewportfolio'] = 'portfolio/add_portfolio';
$route['saveportfolio'] = 'portfolio/save_portfolio';
$route['edit_portfolio/(:num)'] = 'portfolio/edit_portfolio/$1';
$route['delete_portfolio/(:num)'] = 'portfolio/delete_portfolio/$1';

$route['portfolio_cats'] = 'portfolio/portfolio_categories';
$route['edit_portfolio_cat/(:num)'] = 'portfolio/edit_portfolio_cat/$1';
$route['save_portfolio_categories'] = 'portfolio/save_categories';
$route['delete_port_cat/(:num)'] = 'portfolio/delete_port_cat/$1';


$route['portfolio_technos'] = 'portfolio/portfolio_technos';
$route['edit_portfolio_techno/(:num)'] = 'portfolio/edit_portfolio_techno/$1';
$route['save_portfolio_technos'] = 'portfolio/save_technos';
$route['delete_port_techno/(:num)'] = 'portfolio/delete_port_techno/$1';



/* Pricing Route*/
$route['pricings'] = 'pricing/pricing_list';
$route['addnewpricing'] = 'pricing/add_pricing';
$route['savepricing'] = 'pricing/save_pricing';
$route['edit_pricing/(:num)'] = 'pricing/edit_pricing/$1';
$route['delete_pricing/(:num)'] = 'pricing/delete_pricing/$1';


/* Fabrics Route*/
$route['addnewfabric'] = 'fabric/add_fabric';
$route['savefabric'] = 'fabric/save_fabric';
$route['fabriclist'] = 'fabric/fabric_list';

$route['editfabric/(:num)'] = 'fabric/edit_fabric/$1';
$route['deletefabric/(:num)'] = 'fabric/delete_fabric/$1';

/** Show Rooms Route * */
$route['showrooms'] = 'showrooms/index';
$route['saveshowroom'] = 'showrooms/add_modify_showroom';
$route['showrooms/(:num)'] = 'showrooms/index';
$route['delete_showroom'] = 'showrooms/delete';

/* Order Manegment Route */
$route['order/(:any)/list'] = 'order/order_list/$1';
$route['order/move_to_(:any)/(:num)'] = 'order/move_to/$2/$1';
$route['order/bulk_move_to/(:any)/(:any)'] = 'order/bulk_move/$1/$2';
$route['order/row-html'] = 'order/order_rows_html';
$route['order/temporary_orders'] = 'order/temporary_orders';

/* Order Tracking */
$route['page/tracking'] = 'frontend/tracking';
/* Order Tracking */
$route['tracking-ajax'] = 'frontend/tracking_ajax';
//$route['categorization/(:num)/(:num)'] = 'frontend/categorization/$1/$2';

//$route['download-catalogue'] = 'frontend/download_catalogue';

$route['download-catalogue/(:num)'] = 'frontend/download_catalogue/$1';
$route['download-catalogue/(:num)-(:any)'] = 'frontend/download_catalogue/$1';
$route['download-catalogue/(:num)/(:any)'] = 'frontend/download_catalogue/$1';


