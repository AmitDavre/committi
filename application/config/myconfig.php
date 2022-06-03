<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

//////////////// TIER DROPDOWN //////////////////
$config['tier'] = array(

					//'' => 'Select One',
					
					1 => 'Tier 1',
					2 => 'Tier 2',
					3 => 'Tier 3',
					4 => 'Tier 4',
			
);


/////////////// BIDDING CYCLE DROPDOWN //////////
$config['bidding_cycle'] = array(

					//'' => 'Select One',
					1 => 'Please Select',
					2 => 'Weekly',
					3 => 'Bi Weekly',
					4 => 'Monthly',
					5 => 'Bi Monthly',
					6 => 'Quarterly',
					7 => 'Semi Anually',
			
);

/////////////// PLAN STATUS DROPDOWN //////////
$config['status'] = array(

					//'' => 'Select One',
					1 => 'Please Select',
					2 => 'Active',
					3 => 'Inactive',
					
			
);

/////////////// NO OF BIDDING CYCLE STATUS DROPDOWN //////////
$config['no_of_bidding_cycle'] = array(

					//'' => 'Select One',
					1 => 'Please Select',
					2 => '1',
					3 => '2',
					4 => '3',
					5 => '4',
					
			
);


/////////////// DUMMY PLAN OPTION DROPDOWN //////////
$config['options'] = array(

					//'' => 'Select One',
					0 => 'Please Select',
					1 => 'Option #1',
					2 => 'Option #2'
					
			
);


/////////////// GENDER DROPDOWN //////////
$config['gender'] = array(

					//'' => 'Select One',
					0 => 'Please Select',
					1 => 'Male',
					2 => 'Female',
					3 => 'Other'
					
			
);

/////////////// BIDDING RESTRICTION CYCLE  //////////
$config['BiddingRestriciton'] = array(
					//'' => 'Select One',
					1 => 'No Restriciton ',
					2 => 'Restricted For Bidding ',
					3 => 'Restriction Level 1',
					4 => 'Restriction Level 2',							
);


/////////////// PROVINCE  //////////
$config['Province'] = array(
					//'' => 'Select One',
					1  => 'Alberta',
					2  => 'British Columbia',
					3  => 'Manitoba',
					4  => 'NewFoundland and Labrador',	
					5  => 'New Brunswick',							
					6  => 'Nova Scotia',	
					7  => 'Ontario',		
					8  => 'Prince Edward Island',	
					9  => 'Quebec',							
					10 => 'Saskatchewan',
);

$config['HouseHoldIncome'] = array(
					//'' => 'Select One',
					1  => '$0 	    -  $24,999',
					2  => '$25,000  -  $49,999',
					3  => '$50,000  -  $74,999',	
					4  => '$75,000  -  $99,999',
					5  => '$100,000 -  $124,999',							
					6  => '$125,000 -  $149,999',
					7  => '$150,000 -  Up ',	
);

$config['employmentStatus'] = array(
					//'' => 'Select One',
					1  => 'Employed',
					2  => 'Self Employed',
					3  => 'Other',
	
);

$config['yesnoselect'] = array(
					//'' => 'Select One',
					1  => 'Yes',
					2  => 'No',
	
);

$config['plan_sequence'] = array(
					//'' => 'Select One',
					1  => '100',
					2  => '1000',
);

$config['bank_account_type'] = array(
					//'' => 'Select One',
					1  => 'Checking Account',
					2  => 'Savings Account',
);
$config['user_application_status'] = array(
					//'' => 'Select One',
	               ''  => 'All',
					1  => 'Approved',
					2  => 'Pending',
					3  => 'Withdraw',
					4  => 'Terminated',
);

$config['payment_status'] = array(

					1  => 'Pending',
					2  => 'In Process',
					3  => 'Paid',
					4  => 'Denied',
	);
$config['PAD_payment_setting'] = array(
					2  => 'Recurring Payment',
	);

?>

