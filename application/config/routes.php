<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Home';
///////////////////////////HOME CONTROLLER//////////////////////////
$route['terms-conditions'] 							= 'Home/termsAndConditions';
$route['contact'] 									= 'Home/contactUs';
$route['about'] 									= 'Home/aboutUs'; 
$route['ourplans'] 									= 'Home/viewsPlans';
$route['ourplans/(:any)']                           = 'Home/viewsPlans/$1';
$route['investing'] 		 						= 'Home/investingPlans';
$route['privacy'] 		 							= 'Home/privacy';
$route['disclaimer'] 		 						= 'Home/disclaimer';
$route['faq'] 		 						        = 'Home/faq';
$route['newsrelease']                               = 'Home/new_release';
//////////////////////////HOME CONTROLLER END //////////////////////
/////////  Login Controller  ///////////////
$route['login'] 											= 'Authentication/login';
$route['logout'] 											= 'Authentication/logout';
$route['login_validation'] 									= 'Authentication/login_validation';
$route['dashboard'] 										= 'Authentication/dashboard';
$route['sign-up'] 											= 'Authentication/sign_up';
$route['forgot-password'] 									= 'Authentication/forgot_password';
$route['forgot-username'] 									= 'Authentication/forgot_username';
$route['forgotPassword'] 	   								= 'Authentication/forgotPassword';
$route['forget_password_secure/(:any)'] 					= 'Authentication/forget_password_secure/$1';
$route['newPassword'] 										= 'Authentication/newPassword';
$route['username'] 											= 'Authentication/username';
$route['plan-confirmation/(:any)/(:any)'] 					= 'Authentication/plan_confirmation/$1/$2';
$route['update-user'] 										= 'Authentication/update_user';
$route['verify-email/(:any)']								= 'Authentication/email_verification/$1';
///////// Login END /////////////////////////////////////

////////////////////////////Dashboard Starts////////////////////////
$route['profile'] 											= 'Dashboard/profile';
$route['change-password'] 									= 'Dashboard/change_password';
$route['test-page'] 										= 'Dashboard/test_page';
$route['plan-description/(:any)'] 							= 'Dashboard/plan_description/$1';

///////////////////////////Dashboard Ends /////////////////////////
////////////////////////// Admin Starts////////////////////////////

$route['create-plan'] 										= 'Plans/create_new_plan';
$route['view-plans'] 										= 'Plans/view_plans';
$route['application-review'] 								= 'Admin/application_review';
$route['review-application/(:any)/(:any)'] 					= 'Admin/review_application/$1/$2';
$route['tier'] 												= 'Admin/tier';
$route['plan-details/(:any)'] 								= 'Admin/view_plan_tab/$1';
$route['manage-users'] 										= 'Admin/manage_users';
$route['edit-user/(:any)'] 									= 'Admin/edit_user_profile/$1';
$route['notes'] 											= 'Admin/manage_notes';
$route['view-note/(:any)'] 									= 'Admin/view_notes/$1';
$route['note-history/(:any)'] 								= 'Admin/view_notes_history/$1';
$route['add-transactions/(:any)/(:any)'] 					= 'Admin/add_transaction/$1/$2';
$route['view-transactions/(:any)/(:any)'] 					= 'Admin/view_transactions/$1/$2';
$route['manage-transactions'] 								= 'Admin/manage_transactions';
$route['view-user-application/(:any)/(:any)'] 				= 'Admin/view_user_application/$1/$2';
$route['new-transaction/(:any)/(:any)'] 					= 'Admin/new_transaction/$1/$2';
$route['statements'] 										= 'Admin/statements';
$route['test'] 										        = 'Admin/test';
$route['admin-reports'] 						            = 'Report/admin_index';
$route['bidding-monitor'] 									= 'Admin/bidding_monitor';
$route['setting'] 											= 'Admin/settings';
$route['terms-setting'] 									= 'Admin/terms_setting';
$route['aboutus-setting'] 									= 'Admin/aboutus_setting';
$route['investing-setting'] 								= 'Admin/investing_setting';
$route['privacy-setting'] 									= 'Admin/privacy_setting';
$route['backup'] 											= 'Admin/backup_database';
$route['privacy-setting']                                   = 'Admin/privacy_setting';
$route['faqs-setting-page']                                 = 'Admin/faqs_setting_page';
$route['faqs-setting']                                      = 'Admin/faqs_setting';
$route['faqs-setting-2']                                    = 'Admin/faqs_setting_2';
$route['faqs-setting-3']                                    = 'Admin/faqs_setting_3';
$route['faqs-setting-4']                                    = 'Admin/faqs_setting_4';
$route['setting-step-guide']                                ='Admin/setting_step_guide';
$route['setting-step-guide-1']                              = 'Admin/setting_step_guide1';
$route['setting-step-guide-2']                              = 'Admin/setting_step_guide2';
$route['setting-step-guide-3']                              = 'Admin/setting_step_guide3';
$route['setting-step-guide-4']                              = 'Admin/setting_step_guide4';
$route['setting-step-guide-5']                              = 'Admin/setting_step_guide5';
$route['setting-step-guide-6']                              = 'Admin/setting_step_guide6';
$route['setting-step-guide-7']                              = 'Admin/setting_step_guide7';
$route['setting-step-guide-8']                              = 'Admin/setting_step_guide8';
$route['setting-step-guide-9']                              = 'Admin/setting_step_guide9';
$route['setting-step-guide-10']                             = 'Admin/setting_step_guide10';
$route['setting-step-guide-11']                             = 'Admin/setting_step_guide11';
$route['setting-step-guide-12']                             = 'Admin/setting_step_guide12';
// $route['setting-news-release']                              = 'Admin/setting_news_release';
$route['setting-disclaimer']                                = 'Admin/setting_disclaimer';
$route['setting-dropdown']                                  = 'Admin/dropdown';
$route['setting-residential-dropdown']                      = 'Admin/residential_dropdown';
$route['setting-residential-dropdown/(:any)']               = 'Admin/residential_dropdown/$1';
$route['setting-committi-joining-reason-dropdown']          = 'Admin/committiiJoiningReasonDropdown';


$route['add-new-faqs']                                      = 'Admin/add_new_faqs';
$route['add-new-faqs/(:any)']                               = 'Admin/add_new_faqs/$1';

$route['news-release-settings']                             = 'Admin/news_release_setting_page';

$route['setting-news-release']                              = 'Admin/setting_news_release';
$route['setting-news-release/(:any)']                       = 'Admin/setting_news_release/$1';
$route['create-admin'] 								        = 'Admin/createAdmin';
$route['view-admin-list'] 									= 'Admin/otherAdminList';
$route['view-other-admin/(:any)'] 							= 'Admin/viewOtherAdmin/$1';
    
$route['payment-activities']                                  ='Admin/payment_activities';
$route['master-statements']                                  ='Admin/master_statements';

////////////////////////// Admin Ends////////////////////////////
//////////////////////// User Starts ///////////////////////////

$route['available-plans'] 									= 'User/available_plans';
$route['transactions/(:any)'] 								= 'User/get_transaction_details/$1';
$route['transactions'] 										= 'User/transactions_view';
$route['plans'] 											= 'User/plans_view';
$route['search-plan'] 										= 'User/search_plan';
$route['user-form/(:any)'] 									= 'User/application_form/$1';
$route['bidding/(:any)/(:any)'] 							= 'User/bidding/$1/$2';
$route['application-status'] 								= 'User/application_status';
$route['bidding-details/(:any)'] 							= 'User/bidding_details/$1';
$route['bidding-details-transactions/(:any)/(:any)'] 		= 'User/bidding_details_transactons/$1/$2';
$route['documents'] 										= 'User/upload_document';
$route['user-notes'] 										= 'User/user_notes';
$route['view-user-note/(:any)'] 							= 'User/view_user_notes';
$route['invite'] 											= 'User/invite_friend';
$route['view-application/(:any)/(:any)'] 					= 'User/view_user_application/$1/$2';
$route['payments'] 											= 'User/payments';
$route['payments-info/(:any)']                              = 'User/payments/$1';
$route['view-statement'] 									= 'User/view_statements';
$route['edit-b-account/(:any)'] 						    = 'User/edit_bank_account/$1';
$route['reports'] 						                    = 'Report/index';


//////////////////////// User Ends ///////////////////////////
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
