<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronjob extends MY_Controller{

	public function __construct() {
        ob_start();


		parent::__construct();
		$this->load->model('User_model');
               $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'smtp.hostinger.com',
          'smtp_port' => 587,
          'smtp_user' => '',
          'smtp_pass' => '',
          'mailtype'  => 'html', 
          'charset'   => 'iso-8859-1'
      );


        $this->load->library('email',$config);

		
	}

	
	public function checkTierLimit()
	{
		die();
		
		//-----------------------------------------------------
		//
		//	cron-job details: http://rs200.whb.tempwebhost.net/~dhrivum5/committi/Cronjob/checkTierLimit
		//	
		//	check cpanel for cronjob details
		//	
		//  curl --silent http://rs200.whb.tempwebhost.net/~dhrivum5/committi/Cronjob/checkTierLimit
		//---------------------------------------------------------

 		// LOAD MODEL 
 		$this->load->model('User_model'); 

		// CHECK CURRENT DATE BETWEEN PLAN DATE 
	    $query = $this->User_model->query("SELECT * FROM plans WHERE plan_tier_1_left_memebers != '0' OR plan_tier_2_left_memebers != '0' OR plan_tier_3_left_memebers != '0' OR plan_tier_4_left_memebers != '0'");
	    if($query->num_rows() > 0)
	    {
	        $result = $query->result();
	    }
	    else
	    {
	        $result = '';
	    }

	    if($result)
	    {
            $current_date_time=date('Y-m-d H:i:s');
	    	foreach($result as $data)
	    	{
                $previous_date_time=date('Y-m-d H:i:s', strtotime('-1 day', strtotime($data->bidding_start_date)));

                if($current_date_time>=$previous_date_time)
                {	

	                $start_date=date('Y-m-d H:i:s', strtotime('+1 day', strtotime($data->bidding_start_date)));
	                $end_date=date('Y-m-d H:i:s', strtotime('+1 day', strtotime($data->bidding_end_date)));
	                $this->User_model->query('update plans set bidding_start_date="'.$start_date.'",bidding_end_date="'.$end_date.'" where id="'.$data->id.'"');        
	                $this->User_model->query('update user_application set user_application_enrollment_bidding_start_date="'.$start_date.'" where user_application_plan_id="'.$data->id.'"');

	    //             // DELETE OLD ENTRIES FROM BIDDING SCHEDULE 
		   //  		$this->User_model->query('DELETE FROM bidding_schedule WHERE bidding_schedule_plan_id="'.$data->id.'"');

		   //  		// INSERT NEW BIDDING CYCLE BASED ON NEW BIDDING START DATE 

		   //  		$start = $month = strtotime($start_date);
			  //       $bidding_count  = $data->no_bidding_cycle;
			  //       $new_month      = date('Y-m-d H:i:s', $month);
			  //       $sales_due_date = $new_month;

			  //       // create a time stamp of the date
			  //       $time           = strtotime($sales_due_date);

			  //       $selectBiddingCycle = $data->bidding_cycle;


			  //       if($selectBiddingCycle == '2')
			  //       {

			  //           // FOR WEEKLY CYCLE 

			  //           for ($x = 1; $x <= $bidding_count; $x++) 
			  //           { 
			  //               // convert timestamp back to date string
			  //               $date = date('Y-m-d H:i:s', $time);
			  //               $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
			  //               $due_dates[] = array($date,$date1);
			  //               // move to next timestamp
			  //               $time = strtotime('+7 days', $time);
			  //           }   
			  //       }        

			  //       if($selectBiddingCycle == '3')
			  //       {

			  //           // FOR BI WEEKLY  CYCLE 

			  //           for ($x = 1; $x <= $bidding_count; $x++) 
			  //           { 
			  //               // convert timestamp back to date string
			  //               $date = date('Y-m-d H:i:s', $time);
			  //               $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
			  //               $due_dates[] = array($date,$date1);
			  //               // move to next timestamp
			  //               $time = strtotime('+14 days', $time);
			  //           }   
			  //       }        

			  //       if($selectBiddingCycle == '4')
			  //       {

			  //           // FOR MONTHLY CYCLE 

			  //           for ($x = 1; $x <= $bidding_count; $x++) 
			  //           { 
			  //               // convert timestamp back to date string
			  //               $date = date('Y-m-d H:i:s', $time);
			  //               $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
			  //               $due_dates[] = array($date,$date1);
			  //               // move to next timestamp
			  //               $time = strtotime('+1 month', $time);
			  //           }
			        
			  //       }        

			  //       if($selectBiddingCycle == '5')
			  //       {

			  //           // FOR BI MONYHLY  CYCLE 


			  //           for ($x = 1; $x <= $bidding_count; $x++) 
			  //           { 
			  //               // convert timestamp back to date string
			  //               $date = date('Y-m-d H:i:s', $time);
			  //               $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
			  //               $due_dates[] = array($date,$date1);
			  //               // move to next timestamp
			  //               $time = strtotime('+15 days', $time);
			  //           }
			        
			  //       }        

			  //       if($selectBiddingCycle == '6')
			  //       {

			  //           // FOR QUARTERLY  CYCLE 

			  //           for ($x = 1; $x <= $bidding_count; $x++) 
			  //           { 
			  //               // convert timestamp back to date string
			  //               $date = date('Y-m-d H:i:s', $time);
			  //               $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
			  //               $due_dates[] = array($date,$date1);
			  //               // move to next timestamp
			  //               $time = strtotime('+3 month', $time);
			  //           } 
			        
			  //       }        

			  //       if($selectBiddingCycle == '7')
			  //       {

			  //           // FOR SEMI ANNUALY  CYCLE 

			  //           for ($x = 1; $x <= $bidding_count; $x++) 
			  //           { 
			  //               // convert timestamp back to date string
			  //               $date = date('Y-m-d H:i:s', $time);
			  //               $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
			  //               $due_dates[] = array($date,$date1);
			  //               // move to next timestamp
			  //               $time = strtotime('+6 month', $time);
			  //           }
			        
			  //       }


			  //       $y = 1;
					// foreach ($due_dates as $key => $due_datesValue) 
					// {
			  //           $countY = $y++;

			  //           $InsertBidCycleQuery = $this->User_model->query("INSERT INTO bidding_schedule (bidding_schedule_date,bidding_schedule_plan_id,bidding_cycle_count,bidding_schedule_end_date,bidding_start_amount_dynamic,bidding_start_amount_without_deduct) VALUES ('".$due_datesValue[0]."' , '".$data->id."','".$countY."','".$due_datesValue[1]."','".$data->bidding_start_amount."','".$data->bidding_start_amount."') ");

			  //       }

                }

            
	    	}
	    }
	    $this->checkEnrollmentCount();
	}

	public function checkEnrollmentCount()
	{
		$query2 = $this->User_model->query("SELECT * FROM plans");
	    if($query2->num_rows() > 0)
	    {
	        $result2 = $query2->result();
	        $todayDate = date('Y-m-d H:i');
	        foreach ($result2 as $key => $value) 
	        {
	        	# code...
		        $plan_ID = $value->id;

		        if($todayDate >= $value->enrollment_end_date_check )
		        {

		        	// COUNT ENROLLED APPLICATIONS BEFORE 24 HOURS
		        	$query3 = $this->User_model->query("SELECT * FROM user_application WHERE user_application_plan_id = '".$plan_ID."'");
				    if($query3->num_rows() >= 0)
				    {
				    	$result3 = $query3->result();
				    	$totalEnrolled = $query3->num_rows();

				    	// ADD 48 HOURS IF ENROLLED APPLICATIONS ARE NOT EQUAL TO TOTAL APPLICATIONS
				    	if($value->total_no_appliactions != $totalEnrolled)
				    	{
				    		// NEW ENROLL END DATE
				    		$newEnrolledDate=date('Y-m-d H:i', strtotime($value->enrollment_end_date)+ 60 * 60 * 48); 
				    		// NEW ENROLL END DATE CHECK 
				    		$newEnrolledDateCheck=date('Y-m-d H:i', strtotime($value->enrollment_end_date)+ 60 * 60 * 24); 
				    		// NEW BIDDING START DATE  
				    		$newbidding_start_date=date('Y-m-d H:i:s', strtotime($value->bidding_start_date)+ 60 * 60 * 48); 
				    		// NEW BIDDING START DATE  
				    		$newbidding_end_date=date('Y-m-d H:i:s', strtotime($value->bidding_end_date)+ 60 * 60 * 48); 

				    		// UPDATE THE DATES IN PLANS TABLE AND USER APPLICATION TABLE 
				    		$this->User_model->query('UPDATE plans SET enrollment_end_date="'.$newEnrolledDate.'",enrollment_end_date_check="'.$newEnrolledDateCheck.'",bidding_start_date="'.$newbidding_start_date.'",bidding_end_date="'.$newbidding_end_date.'" WHERE id="'.$plan_ID.'"');

				    		$this->User_model->query('UPDATE user_application SET user_application_enrollment_end_date="'.$newEnrolledDate.'",user_application_enrollment_bidding_start_date="'.$newbidding_start_date.'" WHERE user_application_plan_id="'.$plan_ID.'"');

				    		// DELETE OLD ENTRIES FROM BIDDING SCHEDULE 
				    		$this->User_model->query('DELETE FROM bidding_schedule WHERE bidding_schedule_plan_id="'.$plan_ID.'"');

				    		// INSERT NEW BIDDING CYCLE BASED ON NEW BIDDING START DATE 

				    		$start = $month = strtotime($newbidding_start_date);

					        $bidding_count= $value->no_bidding_cycle;


					        $new_month = date('Y-m-d H:i:s', $month);

					        $sales_due_date = $new_month;
					        // create a time stamp of the date
					        $time = strtotime($sales_due_date);

					        $selectBiddingCycle = $value->bidding_cycle;


					        if($selectBiddingCycle == '2')
					        {

					            // FOR WEEKLY CYCLE 

					            for ($x = 1; $x <= $bidding_count; $x++) 
					            { 
					                // convert timestamp back to date string
					                $date = date('Y-m-d H:i:s', $time);
					                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
					                $due_dates[] = array($date,$date1);
					                // move to next timestamp
					                $time = strtotime('+7 days', $time);
					            }   
					        }        

					        if($selectBiddingCycle == '3')
					        {

					            // FOR BI WEEKLY  CYCLE 

					            for ($x = 1; $x <= $bidding_count; $x++) 
					            { 
					                // convert timestamp back to date string
					                $date = date('Y-m-d H:i:s', $time);
					                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
					                $due_dates[] = array($date,$date1);
					                // move to next timestamp
					                $time = strtotime('+14 days', $time);
					            }   
					        }        

					        if($selectBiddingCycle == '4')
					        {

					            // FOR MONTHLY CYCLE 

					            for ($x = 1; $x <= $bidding_count; $x++) 
					            { 
					                // convert timestamp back to date string
					                $date = date('Y-m-d H:i:s', $time);
					                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
					                $due_dates[] = array($date,$date1);
					                // move to next timestamp
					                $time = strtotime('+1 month', $time);
					            }
					        
					        }        

					        if($selectBiddingCycle == '5')
					        {

					            // FOR BI MONYHLY  CYCLE 


					            for ($x = 1; $x <= $bidding_count; $x++) 
					            { 
					                // convert timestamp back to date string
					                $date = date('Y-m-d H:i:s', $time);
					                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
					                $due_dates[] = array($date,$date1);
					                // move to next timestamp
					                $time = strtotime('+15 days', $time);
					            }
					        
					        }        

					        if($selectBiddingCycle == '6')
					        {

					            // FOR QUARTERLY  CYCLE 

					            for ($x = 1; $x <= $bidding_count; $x++) 
					            { 
					                // convert timestamp back to date string
					                $date = date('Y-m-d H:i:s', $time);
					                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
					                $due_dates[] = array($date,$date1);
					                // move to next timestamp
					                $time = strtotime('+3 month', $time);
					            } 
					        
					        }        

					        if($selectBiddingCycle == '7')
					        {

					            // FOR SEMI ANNUALY  CYCLE 

					            for ($x = 1; $x <= $bidding_count; $x++) 
					            { 
					                // convert timestamp back to date string
					                $date = date('Y-m-d H:i:s', $time);
					                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
					                $due_dates[] = array($date,$date1);
					                // move to next timestamp
					                $time = strtotime('+6 month', $time);
					            }
					        
					        }


					        $y = 1;
							foreach ($due_dates as $key => $due_datesValue) {
					            $countY = $y++;

					            $InsertBidCycleQuery = $this->User_model->query("INSERT INTO bidding_schedule (bidding_schedule_date,bidding_schedule_plan_id,bidding_cycle_count,bidding_schedule_end_date,bidding_start_amount_dynamic,bidding_start_amount_without_deduct) VALUES ('".$due_datesValue[0]."' , '".$plan_ID."','".$countY."','".$due_datesValue[1]."','".$value->bidding_start_amount."','".$value->bidding_start_amount."') ");

					        }

				    	}
				    }
		        }

	        }
	    }
	    else
	    {
	        $result2 = '';
	    }
	}
	// one time payment or recurring payment
    public function generate_payment_reports(){
      $payments='';
      $all_fetch_payments=$this->User_model->query('select * from payments where payment_type="payable"');
      if($all_fetch_payments->num_rows()>0)
      {
        $payments=$all_fetch_payments->result_array();
      }
      if($payments!=''){
         $content='';
        
      }   
    }


}

