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
$route['default_controller'] = 'dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//DISTRICTS
	$route['district-list(/:num)?'] = 'districts/index';
	$route['save-district'] = 'districts/store';
	$route['update-district/(:num)'] = 'districts/update/$1';
	$route['delete-district/(:num)'] = 'districts/delete/$1';
	$route['teams-district/(:num)(/:num)?'] = 'districts/get_teams/$1';
	$route['create-branch-team/(:num)'] = 'districts/create_team/$1';
	$route['save-branch-team'] = 'districts/save_branch_team';
	$route['edit-branch-team/(:num)/(:num)'] = 'districts/edit_team/$1/$2';
	$route['update-branch-team'] = 'districts/update_district_team';
	$route['delete-branch-staff/(:num)/(:num)'] = 'districts/delete_district_team/$1/$2';
	
//PROJECTS
	$route['strategy-list(/:num)?'] = 'strategys/index';
	$route['create-strategy'] = 'strategys/create';
	$route['save-strategy']   = 'strategys/store';
	$route['edit-strategy/(:num)'] = 'strategys/singleProject/$1';
	$route['update-strategy'] = 'strategys/update';
	$route['delete-strategy/(:num)'] = 'strategys/delete/$1';
	$route['entry/(:num)'] = 'strategys/dataEntry/$1';

//OBJECTIVES
	$route['objective-list'] = 'objectives/index';
	$route['objective-list/(:num)(/:num)?'] = 'objectives/index/$1';
	$route['create-objective/(:num)'] = 'objectives/create/$1';
	$route['save-objective']          = 'objectives/store';
	$route['edit-objective/(:num)']   = 'objectives/singleObjective/$1';
	$route['update-objective']        = 'objectives/update';
	$route['delete-objective/(:num)'] = 'objectives/delete/$1';
	$route['core-objectives'] = 'objectives/core_list';

//OUTCOMES
	$route['outcome-list'] = 'outcomes/index';
	$route['outcome-list/(:num)'] = 'outcomes/index/$1';
	$route['create-outcome/(:num)'] = 'outcomes/create/$1';
	$route['save-outcome'] = 'outcomes/store';
	$route['edit-outcome/(:num)'] = 'outcomes/singleOutcome/$1';
	$route['update-outcome'] = 'outcomes/update';
	$route['delete-outcome/(:num)'] = 'outcomes/delete/$1';


//INDICATORS
	$route['indicator-list'] = 'indicators/index';
	$route['indicator-list/(:num)'] = 'indicators/index/$1';
	$route['create-indicator/(:num)'] = 'indicators/create/$1';
	$route['save-indicator']          = 'indicators/store';
	$route['edit-indicator/(:num)']   = 'indicators/singleIndicator/$1';
	$route['update-indicator']        = 'indicators/update';
	$route['delete-indicator/(:num)'] = 'indicators/delete/$1';

//FACILITIES
	$route['facility-list'] = 'facilities/index';
	$route['facility-list/(:num)'] = 'facilities/index/$1';
	$route['create-facility/(:num)'] = 'facilities/create/$1';
	$route['save-facility'] = 'facilities/create';
	$route['edit-facility/(:num)'] = 'facilities/singleIndicator/$1';
	$route['update-facility/(:num)'] = 'facilities/update/$1';
	$route['delete-facility/(:num)/(:num)'] = 'facilities/delete/$1/$2';
	$route['facility-teams/(:num)'] = 'facilities/facility_teams/$1';
	$route['create-facility-member/(:num)'] = 'facilities/create_team/$1';

//MEETINGS
	$route['meetings(/:num)?']          = 'meetings/index';
	$route['meeting/(:num)']    = 'meetings/meetingDetail/$1';
	$route['create-meeting']    = 'meetings/create';
	$route['save-meeting']      = 'meetings/store';
	$route['contacts(/:num)?']  = 'meetings/contacts';
	$route['save-contact']      = 'meetings/saveContact';
	$route['save-participant']  = 'meetings/saveContact';
	$route['save-discussion']   = 'meetings/saveDiscussion';
	$route['save-action']		= 'meetings/saveAction';
	$route['meetings-calendar'] = 'meetings/meetingCalendar';
	$route['update-meeting']    = 'meetings/update';
	$route['import-contacts']   = 'meetings/importContacts';

//CONTACTS
	$route['contacts-list(/:num)?'] = 'teams/get_all_teams';
	
	//collected data submission
	$route['submit-data'] = 'strategys/submitData';

	//Report
	$route['strategy_report'] = 'reports/strategys';
	$route['visualize/(:num)?'] = 'reports/visual_report/$1';
	$route['reports/outcomes']    = 'reports/outcomes';
	$route['reports/facilitation']    = 'reports/facilitation';
	$route['visualize'] = 'dashboard/index';
	$route['report/pdf/(:num)?'] = 'reports/pdf_report/$1';


	//Partners
	$route['partners(/:num)?'] = 'partners/index';
	$route['partner_profile/(:num)'] = 'partners/partner/$1';
	$route['save-partner'] = 'partners/save_partner';


	

	
