<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {


    function __construct() {
        ob_start();

        parent::__construct();
        if ($this->session->userdata('username') == '') {
            redirect(base_url('login'));
            exit;
        }
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

         $this->load->library('session');
    }
    /////////////////////////////////////// USER PLANS STARTS /////////////////////////////////////////////////////////////
    public function session_data_recursive(){
        $id = $session_data['session_data']=$this->session->userdata('id');
        $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        else{
            $result = '';
        }
        return $result;
    }

    public function available_plans()
    {
        $id = $session_data['session_data']=$this->session->userdata('id');
        $session_success_value = $this->session->userdata('success');
        $session_success['session_success']=$session_success_value;
        $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        else{
            $result = '';
        }
        $session_data['session_data']=$result['0'];
        //////////////// Fetching Plans ///////////////////////
        $query_plans = $this->User_model->query("SELECT * FROM plans WHERE plan_status= '2' and enrollment_left!='0'");
        if($query_plans->num_rows() > 0)
        {
            $result_plans = $query_plans->result_array();
        }
        else
        {
            $result_plans = '';
        }
        $plans['plans']=$result_plans;
        ///////////////////////////////////////////////////////    
        ///////////////////////////////////////////////////////
        $data['content'] = $this->load->view('user/available_plans',$session_data+$plans+$session_success,true);
        $this->load->view('template/template', $data);
    }

    /////////////////////////////////////// TRANSACTIONS STARTS //////////////////////////////////////////////////

    public function transactions_view()
    {
        $id = $session_data['session_data']=$this->session->userdata('id');
        $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        else
        {
            $result = '';
        }

        $session_data['session_data']=$result['0'];


        ///////////////////// FETCH PLAN NAMES ////////////////////
        // $query_plans = $this->User_model->query("SELECT * FROM plans ");
        $query_plans = $this->User_model->query("SELECT user_application_plan_name as plan_name,user_application_plan_id as id FROM user_application where u_id='".$id."' and (user_application_plan_confirmation='1' or user_application_plan_confirmation IS NULL)");
        if($query_plans->num_rows() > 0)
        {
            $result_plans = $query_plans->result_array();
        }
        else
        {
            $result_plans = '';
        }

        $plans['plans']=$result_plans;
        $plan_data['plan_data']='';

        //////////////////////FETCH PLAN NAMES END //////////////////
        $winning_bid['winning_bid']='';
        $count_rows['count_rows']='';
        $application_plan_id_value['application_plan_id_value']='';


        $data['content'] = $this->load->view('user/transactions',$session_data+$plans+$plan_data+$winning_bid+$count_rows+$application_plan_id_value,true);
        $this->load->view('template/template', $data);
    }
    /////////////////////////////////////// TRANSACTONS END ///////////////////////////////////////////////////



    /////////////////////////////////////// PLAN STARTS ///////////////////////////////////////////////////////

    public function plans_view(){
        $id = $session_data['session_data']=$this->session->userdata('id');
        $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        else{
            $result = '';
        }

        /////////////////////////// Fetch user signed up plans only /////////////////////////
        $QueryUserSignedUpPlans = $this->User_model->query("SELECT * FROM plans p JOIN confirmed_plan_users c on p.id=c.confirmed_plan_plan_id WHERE c.confirmed_plan_user_id= '".$id."'");
        if($QueryUserSignedUpPlans->num_rows() > 0)
        {
            $ResultUserSignedUpPlans = $QueryUserSignedUpPlans->result_array();
        }
        else
        {
            $ResultUserSignedUpPlans = array();
        }

         $ResultUserSignedUpPlans['ResultUserSignedUpPlans']=$ResultUserSignedUpPlans;


        /////////////////////////// Fetch user signed up plans only /////////////////////////
        $session_data['session_data']=$result['0'];
        $data['content'] = $this->load->view('user/plans',$session_data+$ResultUserSignedUpPlans ,true);
        $this->load->view('template/template', $data);
    }
    /////////////////////////////////////// PLAN END ///////////////////////////////////////////////////////////////////


    ///////////////////////////// SEARCH PLANS IN TRANSACTIONS STARTS ///////////////////////////////////////////////////////

    public function search_plan()
    {
      
            //////////// PLAN DATA STARTS  ////////////
            $plan_id = $this->input->post('plan_id');  
            $query_plan = $this->User_model->query("SELECT * FROM plans WHERE id= '".$plan_id."'");
            if($query_plan->num_rows() > 0)
            {
                $result_plan = $query_plan->result_array();
            }
            else
            {
                $result_plan = '';
                redirect(base_url() . 'transactions');
            }

            $plan_data['plan_data']=$result_plan['0'];
            //////////// PLAN DATA ENDS /////////////////

            //////////// SESSION DATA STARTS//////////////
            $id = $session_data['session_data']=$this->session->userdata('id');
            $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
            if($query->num_rows() > 0)
            {
                $result = $query->result_array();
            }
            else
            {
                $result = '';
            }

            $session_data['session_data']=$result['0'];

            //////////// SESSION DATA ENDS //////////////

             ///////////////////// FETCH PLAN NAMES ////////////////////
            $query_plans = $this->User_model->query("SELECT * FROM plans");
            if($query_plans->num_rows() > 0)
            {
                $result_plans = $query_plans->result_array();
            }
            else
            {
                $result_plans = '';
            }

            $plans['plans']=$result_plans;

        //////////////////////FETCH PLAN NAMES END //////////////////

            $data['content'] = $this->load->view('user/search_plan',$session_data+$plan_data+$plans,true);
            $this->load->view('template/template', $data);

        
    }
    /////////////////////////////////////// SEARCH PLANS IN TRANSACTIONS END //////////////////////////////////////////////////

     ////////////////destory application form session//////////////////
      public function destroyAvailablePlansSession(){
        if(isset($_SESSION['error_no_space'])){
            unset($_SESSION['error_no_space']);
        }
        if(isset($_SESSION['success'])){
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['error_already_selected'])){
            unset($_SESSION['error_already_selected']);
        }
        echo 1;
    }
    /////////////////////////////////////// APPLICATION FORM STARTS ///////////////////////////////////////////////////////
    public function application_form()
    {
        if(isset($_SESSION['error_no_space'])){
            unset($_SESSION['error_no_space']);

        }
        if(isset($_SESSION['success'])){
            unset($_SESSION['success']);
        }
        if(isset($_SESSION['error_already_selected'])){
            unset($_SESSION['error_already_selected']);
        }
        $id = $session_data['session_data']=$this->session->userdata('id');
        $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        else
        {
            $result = '';
        }
        $session_data['session_data']=$result['0'];
        $application_plan_id = base64_decode($this->uri->segment(2));
        /////////////// Fetching Assigned Plans ///////////////////////
        $query_assigned_plans = $this->User_model->query("SELECT * FROM assigned_plans WHERE assigned_plans_user_id='".$id."' AND assigned_plans_plan_id ='".$application_plan_id."'");
        if($query_assigned_plans->num_rows() > 0)
        { 
            $result_assigned_plans = $query_assigned_plans->result_array();
            // $this->session->set_flashdata('error_already_selected', 'Record Updated Successfully');
            $this->session->set_userdata('error_already_selected','Record Updated Successfully');
            redirect(base_url() .'available-plans','refresh');
        }
        else{
            $result_assigned_plans = array();
             ///////////////FETCH PLAN DETAILS ON BASIS OF ID ////////////////

            $query_plan_total_check = $this->User_model->query("SELECT * FROM plans WHERE id= '".$application_plan_id."'");
            if($query_plan_total_check->num_rows() > 0)
            {
                $result_plan_total_check = $query_plan_total_check->result_array();
            }
            else
            {
                $result_plan_total_check = '';
            }
            error_reporting(0);
            if($result_plan_total_check['0']['left_applications'] =='0')
            {
                // $this->session->set_flashdata('error_no_space', 'Record Updated Successfully');
                 $this->session->set_userdata('error_no_space','Record Updated Successfully'); 
                redirect(base_url() .'available-plans','refresh');
            }
            else
            {
                $query_plan = $this->User_model->query("SELECT * FROM plans WHERE id= '".$application_plan_id."'");
                if($query_plan->num_rows() > 0)
                {
                    $result_plan = $query_plan->result_array();
                }
                else
                {
                    $result_plan = '';
                }

                $plan_data['plan_data']=$result_plan;
                ///////////////FETCH PLAN DETAILS ON BASIS OF ID ////////////////


                ///////////////////////////FETCHING COMMITTI USERS TABLE DATA //////////////////////////////////////////

                $query_committi_users = $this->User_model->query("SELECT * FROM committi_users WHERE user_login_id= '".$id."'");
                if($query_committi_users->num_rows() > 0)
                {
                    $result_committi_users = $query_committi_users->result_array();
                }
                else
                {
                    $result_committi_users = '';
                }

                $committi_user['committi_user']=$result_committi_users['0'];

                ///////////////////////////FECTHING COMMITTI USERS TABLE DATA ENDS ////////////////////////////////////
            }
        ////////////////////////////////// UPDATE APPLICATION FORM////////////////////////////////////////////
        if(isset($_POST['submit']))
        {
            // echo 'form submitted error';
            // die();
            // fetch data from input fields 
            $application_plan_id = base64_decode($this->uri->segment(2));
            $plan_hidden_idvaluee = base64_encode($this->input->post('plan_hidden_id'));


            $street                 = $this->input->post('user_street');
            $unit                   = $this->input->post('user_suite');
            $street_name            = $this->input->post('user_street_name');
            $provience              = $this->input->post('user_provience');
            $postal_code            = $this->input->post('user_postal_code');
            $phone_number           = $this->input->post('user_phone_number');
            $employment_status      = $this->input->post('user_employment_status');
            $annual_income          = $this->input->post('user_annual_income');
            $residential_status     = $this->input->post('user_residential');
            $fund_plan              = $this->input->post('user_funds');
            $fund_time              = $this->input->post('user_funds_time');
            $household_income       = $this->input->post('user_household_income');
            $terms                  = $this->input->post('signup-terms');
            $privacy                = $this->input->post('signup-privacy');
            $disclaimer             = $this->input->post('signup-disclaimer');

            $SignupTermsCheckbox      = $terms;
            $SignupPrivacyCheckbox    = $privacy;
            $SignupDisclaimerCheckbox = $disclaimer;


            if($SignupTermsCheckbox != 'on' || $SignupPrivacyCheckbox !='on' || $SignupDisclaimerCheckbox !='on') 
            {
                $this->session->set_userdata('error_checkbox','Check box not selected ');  
            

                 redirect(base_url() .'user-form/'.$plan_hidden_idvaluee); // REDIRECT TO SAME PAGE AFTER UPDATING THE DATA 
            }

            $_SESSION['error_checkbox'] = '';

            if($SignupTermsCheckbox=='on')
            {
                $SignupTermsCheckbox='1';       // TERMS CHECKBOX
            }

            if($SignupPrivacyCheckbox=='on')
            {
                $SignupPrivacyCheckbox='1';     // PRIVACY CHECKBOX
            } 

            if($SignupDisclaimerCheckbox=='on')
            {
                $SignupDisclaimerCheckbox='1';    // DISCLAIMER CHECKBOX
            }

            $UpdateQuery = $this->User_model->query("UPDATE committi_users SET usert_street ='".$street."',user_street_name ='".$street_name."',user_unit_no ='".$unit."',user_provience ='".$provience."',user_postal_code ='".$postal_code."',user_phone_no ='".$phone_number."',user_employment_status ='".$employment_status."',user_gross_income ='".$annual_income."',user_household_income ='".$household_income."',user_residential_status ='".$residential_status."',user_planning ='".$fund_plan."',user_fund_time ='".$fund_time."',user_terms ='".$SignupTermsCheckbox."',user_privacy ='".$SignupPrivacyCheckbox."',user_disclaimer ='".$SignupDisclaimerCheckbox."' WHERE user_login_id= '".$id."'");

        
            $user_id_value = $this->input->post('hidden_user_id') ;
            //////// CALCULATING USER SERIES /////////////
            $user_id_len = strlen((string)$user_id_value);

            if($user_id_len == '1' )
            {
                $usere_series = '000000'.$user_id_value;
            }
            else if($user_id_len == '2' )
            {
                $usere_series = '00000'.$user_id_value;
            }   
            else if($user_id_len == '3' )
            {
                $usere_series = '0000'.$user_id_value;
            }            
            else if($user_id_len == '4' )
            {
                $usere_series = '000'.$user_id_value;
            } 
            else if($user_id_len == '5' )
            {
                $usere_series = '00'.$user_id_value;
            }

            /////////// INSERT FOR USER APPLICATION TABLE /////////
             $currentDate=date('Y-m-d');
             $UserApplicationTable= array(  
                                        'u_id'                                                     => $this->input->post('hidden_user_id'),
                                        'u_series'                                                 => $usere_series,
                                        'user_application_first_name'                              => $this->input->post('user_first_name'),
                                        'user_application_middle_name'                             => $this->input->post('user_middle_name'),
                                        'user_application_last_name'                               => $this->input->post('user_last_name'),
                                        'user_application_gender'                                  => $this->input->post('user_gender'),
                                        'user_application_sin'                                     => $this->input->post('user_sin'),
                                        'user_application_dob'                                     => date('Y-m-d', strtotime($this->input->post('user_date_of_birth'))),
                                        'usert_application_street'                                 => $street,
                                        'user_application_street_name'                             => $street_name,
                                        'user_application_unit_no'                                 => $unit,
                                        'user_application_provience'                               => $provience,
                                        'user_application_postal_code'                             => $postal_code,
                                        'user_application_phone_no'                                => $phone_number,
                                        'user_application_email'                                   => $this->input->post('user_email_address'),
                                        'user_application_employment_status'                       => $employment_status,
                                        'user_application_gross_income'                            => $annual_income,
                                        'user_application_household_income'                        => $household_income,
                                        'user_application_residential_status'                      => $residential_status,
                                        'user_application_planning'                                => $fund_plan,
                                        'user_application_fund_time'                               => $fund_time,
                                        'user_application_terms'                                   => $SignupTermsCheckbox,
                                        'user_application_privacy'                                 => $SignupPrivacyCheckbox,
                                        'user_application_disclaimer'                              => $SignupDisclaimerCheckbox,
                                        'user_application_plan_name'                               => $this->input->post('plan_name'),
                                        'user_application_enrollment_start_date'                   => date('Y-m-d', strtotime($this->input->post('enrollment_start_date'))),
                                        'user_application_enrollment_end_date'                     => date('Y-m-d', strtotime($this->input->post('enrollment_end_date'))),
                                        'user_application_enrollment_bidding_start_date'           => date('Y-m-d', strtotime($this->input->post('bidding_start_date'))),
                                        'user_application_enrollment_bidding_start_amount'         => $this->remove_currency_symbol($this->input->post('bidding_start_amount')),
                                        'user_application_plan_id'                                 => $this->input->post('plan_hidden_id'),
                                        'user_application_posted_date'                             => $currentDate,
                                       );  


              $insertApplicationUsersData = $this->User_model->insertdata('user_application',$UserApplicationTable);
              $UserAssignedPlanTable= array(  

                                        'assigned_plans_plan_id'                                   => $this->input->post('plan_hidden_id'),
                                        'assigned_plans_user_id'                                   => $this->input->post('hidden_user_id'),
                                       );  

              $insertUserAssignedPlanData = $this->User_model->insertdata('assigned_plans',$UserAssignedPlanTable);

              $ApplicationFormAlert= array(  

                                        'notification_detail'                     => 'You Have a New Enrollment',
                                        'user_notification_id'                    => $this->input->post('hidden_user_id'),
                                        'notification_type'                       => 'admin'
                                       );  

              $InsertApplicationFormAlert = $this->User_model->insertdata('notification',$ApplicationFormAlert);

              ////////////// TOTAL COUNT OF MEMEBRS IN EACH PLAN /////////////////////////
              $query_plans = $this->User_model->query("SELECT * FROM plans WHERE id= '".$this->input->post('plan_hidden_id')."'");
              if($query_plans->num_rows() > 0)
              {
                $result_plans = $query_plans->result_array();
              }
              else
              {
                  $result_plans = '';
              }
            
              ////////////// TOTAL COUNT OF MEMEBRS IN EACH PLAN /////////////////////////          

              ////////////// TOTAL COUNT OF MEMEBRS DEDUCTED /////////////////////////
              $query_plans1 = $this->User_model->query("SELECT * FROM plans p JOIN assigned_plans a on p.id = a.assigned_plans_plan_id WHERE assigned_plans_plan_id= '".$this->input->post('plan_hidden_id')."'");

              if($query_plans1->num_rows() > 0)
              {
                $result_plans1 = $query_plans1->result_array();
              }
              else
              {
                  $result_plans1 = '';
              }

              $total_count = $query_plans1->num_rows();
              ////////////// TOTAL COUNT OF MEMEBRS DEDUCTED /////////////////////////

              $total_value_applications = $result_plans['0']['total_no_appliactions'] - $total_count ;

              // $UpdateQuery = $this->User_model->query("UPDATE plans SET left_applications ='".$total_value_applications."' WHERE id ='".$this->input->post('plan_hidden_id')."'");\
               


               /////////////Change the enrollment left count///////
              $query_plans_count = $this->User_model->query("SELECT * FROM plans where id='".$this->input->post('plan_hidden_id')."'");
              if($query_plans_count->num_rows()>0){
                $current_count_enrollment_left=$query_plans_count->result_array();
                $latest_count=$current_count_enrollment_left[0]['enrollment_left']-1;
                // $UpdateQuery = $this->User_model->query("UPDATE plans SET enrollment_left ='".$latest_count."' WHERE id ='".$current_count_enrollment_left[0]['id']."'");
              }
              // $this->session->set_flashdata('success', 'Record Updated Successfully');
                 $this->session->set_userdata('success','Record Updated Successfully');  
              redirect(base_url() .'available-plans','refresh'); // REDIRECT TO SAME PAGE AFTER UPDATING THE DATA 
         } 

        ////////////////////////////////// UPDATE APPLICATION FORM END////////////////////////////////////////
         $joining_committi_data_array=array();
           $residential_data_array=array();
            $fetch_dropdown_values=$this->User_model->query("select * from dropdown_values");
            if($fetch_dropdown_values->num_rows()>0){
                foreach ($fetch_dropdown_values->result() as $value) {
                   if($value->dropdown_values_type=='residential status'){
                    // $data['residential_data']=$value;
                    array_push($residential_data_array,$value);
                   }
                    if($value->dropdown_values_type=='committi_joining_reasons'){
                    // $data['joining_committi_data']=$value;
                     array_push($joining_committi_data_array,$value);
                   }
                }
                 $committi_joining_data['joining_committi_data']=$joining_committi_data_array;
                 $residential_data['residential_data']=$residential_data_array;
            }else{
                 $committi_joining_data['joining_committi_data']='';
                 $residential_data['residential_data']='';
            }

        $data['content'] = $this->load->view('user/application_form',$session_data+$committi_user+$plan_data+$committi_joining_data+$residential_data ,true);
        $this->load->view('template/template', $data);
        }
    }
        /////////////////////////////////////// APPLICATION FORM END /////////////////////////////////////////
    /////////////////////////////////////////// BIDDING STARTS ////////////////////////////////////////////////

    public function bidding()
    {   
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];
        $plan_id                        = $this->uri->segment(3);


    /////////////////////////////// FETCH BIDDING DETAILS OF PLAN ///////////////////////////////
        $query_bidding_details = $this->User_model->query("SELECT * FROM plans p JOIN confirmed_plan_users c on p.id=c.confirmed_plan_plan_id WHERE c.confirmed_plan_user_id= '".$user_id."' AND c.confirmed_plan_plan_id= '".$plan_id."'");
        if($query_bidding_details->num_rows() > 0)
        {
            $result_bidding_details = $query_bidding_details->result_array();
        }
        else
        {
            $result_bidding_details = '';
        }

        $result_bidding_details['result_bidding_details']=$result_bidding_details['0'];     


        $queryBidCycle = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id= '".$plan_id."'");
            if($queryBidCycle->num_rows() > 0)
            {
                $resultBidCycle = $queryBidCycle->result_array();
                $today_date =date('Y-m-d H:i:s');

                foreach ( $resultBidCycle as $item )
                {
                    if($today_date >= $item['bidding_schedule_date'] && $today_date <= $item['bidding_schedule_end_date'])
                    {
                         $bidding_cycle_count_value = $item['bidding_cycle_count'];
                    }
                }
            }
            else
            {
                $resultBidCycle = '';
            }

 $queryBidCycle = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id= '".$plan_id."'");
        if($queryBidCycle->num_rows() > 0)
        {
            $resultBidCycle = $queryBidCycle->result_array();
            $today_date =date('Y-m-d H:i:s');
            foreach($resultBidCycle as $item )
            { 
             $today_date_int = strtotime($today_date);
             $bidding_schedule_date_int= strtotime($item['bidding_schedule_date']);
             $bidding_schedule_end_date_int=strtotime($item['bidding_schedule_end_date']);
             // echo $today_date_int.'<br>';
             // echo $bidding_schedule_date_int.'<br>';
             // echo $bidding_schedule_end_date_int.'<br>';
                if(($today_date_int >= $bidding_schedule_date_int) && ($today_date_int <= $bidding_schedule_end_date_int))
                { 
                    // echo 'if'; 
                    $bidding_cycle_count_value1 = $item['bidding_cycle_count'];
                    $bidding_status=$item['bidding_status'];
                    break;
                }
                else
                {
                    // echo 'else';
                    $bidding_cycle_count_value1='';
                    $bidding_status='';
                }
            }
            // die();
        }
        else
        {
            $resultBidCycle = '';
            $bidding_cycle_count_value1='';
            $bidding_status='';
        }

        $resultBidCycleData['resultBidCycleData']=$resultBidCycle;
        $currentBidCycleData['bidding_cycle_count_value1']=$bidding_cycle_count_value1;
        $currentbiddingStatus['current_bidding_status']=$bidding_status;


        $query_bidding_details1 = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id = '".$plan_id."' AND bidding_cycle_count = '".$bidding_cycle_count_value1."'");
        if($query_bidding_details1->num_rows() > 0)
        {
            $result_bidding_details1 = $query_bidding_details1->result_array();
            $result_bidding_details1['result_bidding_details1']=$result_bidding_details1['0'];

        }
        else
        {
            $result_bidding_details1 = '';
            redirect(base_url().'transactions');
            $result_bidding_details1['result_bidding_details1']=array();

        }


       /////////////////////////////// FETCH BIDDING DETAILS OF PLAN ///////////////////////////////



        ///////////////////////// BIDDING CYCLE DETAILS //////////////////////////////////////////

        $query_bidding_cycle = $this->User_model->query("SELECT * FROM plans WHERE id= '".$plan_id."'");
        if($query_bidding_cycle->num_rows() > 0)
        {
            $result_bidding_cycle = $query_bidding_cycle->result_array();
        }
        else
        {
            $result_bidding_cycle = '';
        }

        $result_bidding_cycle_data['result_bidding_cycle_data']=$result_bidding_cycle;        

        

       

          //////////////////////////fecth faqs for bidding page///////////////////////
        $faqs_settings = $this->User_model->query("SELECT * FROM faqs_settings WHERE faqs_settings_show_faqs_for_bidding_page='1'");
        if($faqs_settings->num_rows() > 0)
        {
            $result_faqs_settings['result_faqs_settings'] = $faqs_settings->result_array();
        }
        else
        {
            $result_faqs_settings['result_faqs_settings'] = '';
        }




        // echo '<pre>';
        // print_r($resultBidCycle);
        // echo '</pre>';
        // die();
        //////////fecth restrction information of users////////
        $fetch_restricted_upto=$this->User_model->query("select * from user_application where u_id='".$user_id."' and user_application_plan_id='".$plan_id."' and user_application_plan_confirmation='1'");
        if($fetch_restricted_upto->num_rows()>0){
              $restricted_result=$fetch_restricted_upto->result_array();
              $restricted_bid_upto['restricted_bid_upto']=$restricted_result[0]['user_application_restriction_upto'];
        }else{
        $restricted_bid_upto['restricted_bid_upto']='';
        }
        



        ///////////////////////// BIDDING CYCLE DETAILS END /////////////////////////////////////


        ///check user is already winner  or not
         
      $query_bidding_details = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_check_winning_bid = '1' and bidding_user_id='".$user_id."' and bidding_plan_id='".$plan_id."'");
        if($query_bidding_details->num_rows() > 0)
        {
        $winner_user_id['winner_user_id']=$user_id;
        }
        else{
        $winner_user_id['winner_user_id']='';
        }

         $data['content'] = $this->load->view('user/bidding',$session_data+$result_bidding_details+$result_bidding_details1+$result_bidding_cycle_data+$resultBidCycleData+$result_faqs_settings+$currentBidCycleData+$restricted_bid_upto+$winner_user_id+$currentbiddingStatus,true);
        $this->load->view('template/template', $data);
    }

    //////////////////////////////////////////// BIDDING END ///////////////////////////////////////////////////
     public function place_a_bid_data()
    {   
        if($this->input->post('bidding_user_id') != '')
        {
          $new_place_bid_amount=sprintf('%0.2f', $this->input->post('bid_place_amount'));

          $check_bid_exist_with_same_amount=$this->User_model->query("select * from bidding_details where bidding_place_bid_amount='".$new_place_bid_amount."' and bidding_plan_id='".$this->input->post('bidding_plan_id')."' and bidding_cycle_count='".$this->input->post('bidding_cycle_count')."'");
          if($check_bid_exist_with_same_amount->num_rows()>0){
            echo 'bid_with_same_amount_not_allowed';
          }else{
          
            $check_bidding_table_data=$this->User_model->query("Select * from bidding_details order by bidding_details_id DESC limit 1");
            if($check_bidding_table_data->num_rows()>0){
               $result_bidding_details=$check_bidding_table_data->result_array();
               if($result_bidding_details[0]['bidding_low_bid_check']=='1' && $result_bidding_details[0]['bidding_user_id']==$this->input->post('bidding_user_id'))
               {
                 /////////
               }
               else{
               $bidding_place_bid_amount   = sprintf('%0.2f', $this->input->post('bid_place_amount'));
            $bidding_current_bid_amount_with_comma = sprintf('%0.2f', $this->input->post('current_bid_amount'));
            $bidding_current_bid_amount = str_replace( ',', '', $this->input->post('current_bid_amount'));

            $bidding_place_bid_date = date('Y-m-d H:i:s');

            $query_Fetch_User = $this->User_model->query("SELECT * FROM user_application WHERE u_id= '".$this->input->post('bidding_user_id')."' AND user_application_plan_id = '".$this->input->post('bidding_plan_id')."'");
            if($query_Fetch_User->num_rows() > 0)
            {
                $result_FetchUser = $query_Fetch_User->result_array();
            }
            else
            {
                $result_FetchUser = '';
            }

            $queryBidCycle = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id= '".$this->input->post('bidding_plan_id')."'");
            if($queryBidCycle->num_rows() > 0)
            {
                $resultBidCycle = $queryBidCycle->result_array();
                $today_date =date('Y-m-d H:i:s');

                foreach ( $resultBidCycle as $item )
                {
                    if($today_date >= $item['bidding_schedule_date'] && $today_date <= $item['bidding_schedule_end_date'])
                    {
                         $bidding_cycle_count_value = $item['bidding_cycle_count'];
                    }
                }

            }
            else
            {
                $resultBidCycle = '';
            }


             $UpdateQueryLowBid = $this->User_model->query("UPDATE bidding_details SET bidding_low_bid_check ='0' WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' ");


            $data = array(

                'bidding_plan_id'                        => $this->input->post('bidding_plan_id'),
                'bidding_user_id'                        => $this->input->post('bidding_user_id'),
                'bidding_place_bid_amount'               => $bidding_place_bid_amount,
                'bidding_current_bid_amount'             => $bidding_current_bid_amount,
                'bidding_place_bid_date'                 => $bidding_place_bid_date,
                'bidding_bidder_first_name'              => $result_FetchUser['0']['user_application_first_name'],
                'bidding_bidder_last_name'               => $result_FetchUser['0']['user_application_last_name'],
                'bidding_low_bid_check'                  => '1',
                'bidding_cycle_count'                    => $this->input->post('bidding_cycle_count'),
            );
          
            
             $insertPlanData = $this->User_model->insertdata('bidding_details',$data);

            // $UpdateQueryNewBid = $this->User_model->query("UPDATE plans SET bidding_start_amount_dynamic ='".$bidding_place_bid_amount."' WHERE id = '".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$bidding_cycle_count."'");

            $UpdateQueryNewBid = $this->User_model->query("UPDATE bidding_schedule SET bidding_start_amount_dynamic ='".$bidding_place_bid_amount."' WHERE bidding_schedule_plan_id = '".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$this->input->post('bidding_cycle_count')."'");



            $query_FetchPlan = $this->User_model->query("SELECT * FROM plans WHERE id ='".$this->input->post('bidding_plan_id')."'");

            if($query_FetchPlan->num_rows() > 0)
            {
                $result_FetchPlan = $query_FetchPlan->result_array();
            }
            else
            {
                $result_FetchPlan = '';
            }            


            $query_FetchPlan3 = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id ='".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$this->input->post('bidding_cycle_count')."' ");

            if($query_FetchPlan3->num_rows() > 0)
            {
                $result_FetchPlan3 = $query_FetchPlan3->result_array();
            }
            else
            {
                $result_FetchPlan3 = '';
            }

           


            // $bidding_start_amount_dynamic = $result_FetchPlan['0']['bidding_start_amount_dynamic'];
            $bidding_start_amount_dynamic = $result_FetchPlan3['0']['bidding_start_amount_dynamic'];
            // $biddingMinThrshold = $result_FetchPlan['0']['bidding_start_amount_Threshold_deduct'];
            $biddingMinThrshold = $result_FetchPlan['0']['bidding_start_amount_Threshold_deduct'];
            // $thresholdDeduct = number_format(floatval($bidding_start_amount_dynamic) -floatval($biddingMinThrshold),2);
            $thresholdDeduct = number_format($bidding_start_amount_dynamic -$biddingMinThrshold,2);

    

            $removeCommathresholddeduct= str_replace( ',', '', $thresholdDeduct );
            

            // $UpdateQueryDeductAMount = $this->User_model->query("UPDATE plans SET bidding_start_amount_dynamic ='".$removeCommathresholddeduct."' , bidding_start_amount_without_deduct ='".$bidding_start_amount_dynamic."' WHERE id = '".$this->input->post('bidding_plan_id')."'");
            $UpdateQueryDeductAMount = $this->User_model->query("UPDATE bidding_schedule SET bidding_start_amount_dynamic ='".$removeCommathresholddeduct."' , bidding_start_amount_without_deduct ='".$bidding_start_amount_dynamic."' WHERE bidding_schedule_plan_id = '".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$this->input->post('bidding_cycle_count')."'");
             

        ////////////////////////////////////// BID COUNT ////////////////////////////////////////////
            $query_bidding_count = $this->User_model->query("SELECT * FROM plans p JOIN bidding_details b on p.id=b.bidding_plan_id WHERE b.bidding_plan_id= '".$this->input->post('bidding_plan_id')."'");
            if($query_bidding_count->num_rows() > 0)
            {
                $result_bidding_count = $query_bidding_count->result_array();
            }
            else
            {
                $result_bidding_count = '';
            }


            echo json_encode($result_bidding_count);

        ////////////////////////////////////// BID COUNT ////////////////////////////////////////////

               }

            }else{
            $bidding_place_bid_amount   = sprintf('%0.2f', $this->input->post('bid_place_amount'));
            $bidding_current_bid_amount_with_comma = sprintf('%0.2f', $this->input->post('current_bid_amount'));
            $bidding_current_bid_amount = str_replace( ',', '', $this->input->post('current_bid_amount'));

            $bidding_place_bid_date = date('Y-m-d H:i:s');

            $query_Fetch_User = $this->User_model->query("SELECT * FROM user_application WHERE u_id= '".$this->input->post('bidding_user_id')."' AND user_application_plan_id = '".$this->input->post('bidding_plan_id')."'");
            if($query_Fetch_User->num_rows() > 0)
            {
                $result_FetchUser = $query_Fetch_User->result_array();
            }
            else
            {
                $result_FetchUser = '';
            }

            $queryBidCycle = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id= '".$this->input->post('bidding_plan_id')."'");
            if($queryBidCycle->num_rows() > 0)
            {
                $resultBidCycle = $queryBidCycle->result_array();
                $today_date =date('Y-m-d H:i:s');

                foreach ( $resultBidCycle as $item )
                {
                    if($today_date >= $item['bidding_schedule_date'] && $today_date <= $item['bidding_schedule_end_date'])
                    {
                         $bidding_cycle_count_value = $item['bidding_cycle_count'];
                    }
                }

            }
            else
            {
                $resultBidCycle = '';
            }


             $UpdateQueryLowBid = $this->User_model->query("UPDATE bidding_details SET bidding_low_bid_check ='0' WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' ");


            $data = array(

                'bidding_plan_id'                        => $this->input->post('bidding_plan_id'),
                'bidding_user_id'                        => $this->input->post('bidding_user_id'),
                'bidding_place_bid_amount'               => $bidding_place_bid_amount,
                'bidding_current_bid_amount'             => $bidding_current_bid_amount,
                'bidding_place_bid_date'                 => $bidding_place_bid_date,
                'bidding_bidder_first_name'              => $result_FetchUser['0']['user_application_first_name'],
                'bidding_bidder_last_name'               => $result_FetchUser['0']['user_application_last_name'],
                'bidding_low_bid_check'                  => '1',
                'bidding_cycle_count'                    => $this->input->post('bidding_cycle_count'),
            );

          
             $insertPlanData = $this->User_model->insertdata('bidding_details',$data);

            // $UpdateQueryNewBid = $this->User_model->query("UPDATE plans SET bidding_start_amount_dynamic ='".$bidding_place_bid_amount."' WHERE id = '".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$bidding_cycle_count."'");

            $UpdateQueryNewBid = $this->User_model->query("UPDATE bidding_schedule SET bidding_start_amount_dynamic ='".$bidding_place_bid_amount."' WHERE bidding_schedule_plan_id = '".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$this->input->post('bidding_cycle_count')."'");



            $query_FetchPlan = $this->User_model->query("SELECT * FROM plans WHERE id ='".$this->input->post('bidding_plan_id')."'");

            if($query_FetchPlan->num_rows() > 0)
            {
                $result_FetchPlan = $query_FetchPlan->result_array();
            }
            else
            {
                $result_FetchPlan = '';
            }            


            $query_FetchPlan3 = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id ='".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$this->input->post('bidding_cycle_count')."' ");

            if($query_FetchPlan3->num_rows() > 0)
            {
                $result_FetchPlan3 = $query_FetchPlan3->result_array();
            }
            else
            {
                $result_FetchPlan3 = '';
            }

           


            // $bidding_start_amount_dynamic = $result_FetchPlan['0']['bidding_start_amount_dynamic'];
            $bidding_start_amount_dynamic = $result_FetchPlan3['0']['bidding_start_amount_dynamic'];
            // $biddingMinThrshold = $result_FetchPlan['0']['bidding_start_amount_Threshold_deduct'];
            $biddingMinThrshold = $result_FetchPlan['0']['bidding_start_amount_Threshold_deduct'];
            // $thresholdDeduct = number_format(floatval($bidding_start_amount_dynamic) -floatval($biddingMinThrshold),2);
            $thresholdDeduct = number_format($bidding_start_amount_dynamic -$biddingMinThrshold,2);

    

            $removeCommathresholddeduct= str_replace( ',', '', $thresholdDeduct );
            

            // $UpdateQueryDeductAMount = $this->User_model->query("UPDATE plans SET bidding_start_amount_dynamic ='".$removeCommathresholddeduct."' , bidding_start_amount_without_deduct ='".$bidding_start_amount_dynamic."' WHERE id = '".$this->input->post('bidding_plan_id')."'");
            $UpdateQueryDeductAMount = $this->User_model->query("UPDATE bidding_schedule SET bidding_start_amount_dynamic ='".$removeCommathresholddeduct."' , bidding_start_amount_without_deduct ='".$bidding_start_amount_dynamic."' WHERE bidding_schedule_plan_id = '".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$this->input->post('bidding_cycle_count')."'");
             

        ////////////////////////////////////// BID COUNT ////////////////////////////////////////////
            $query_bidding_count = $this->User_model->query("SELECT * FROM plans p JOIN bidding_details b on p.id=b.bidding_plan_id WHERE b.bidding_plan_id= '".$this->input->post('bidding_plan_id')."'");
            if($query_bidding_count->num_rows() > 0)
            {
                $result_bidding_count = $query_bidding_count->result_array();
            }
            else
            {
                $result_bidding_count = '';
            }


            echo json_encode($result_bidding_count);

        ////////////////////////////////////// BID COUNT ////////////////////////////////////////////

        }
    }
   }
    }       

    //////////////////////////////////////////// BIDDING END ///////////////////////////////////////////////////
    public function count_bid_on_page_load()
    {   
        
        ////////////////////////////////////// BID COUNT ON PAGE LOAD ////////////////////////////////////////////
          $bidding_cycle_count=$this->input->post('bidding_cycle_count');
            $query_bidding_count = $this->User_model->query("SELECT DISTINCT b.bidding_place_bid_amount FROM plans p JOIN bidding_details b on p.id=b.bidding_plan_id WHERE b.bidding_plan_id= '".$this->input->post('bidding_plan_id')."' and b.bidding_cycle_count='".$bidding_cycle_count."'");
            
            if($query_bidding_count->num_rows() > 0)
            {
                $result_bidding_count = $query_bidding_count->result_array();
                 echo json_encode($result_bidding_count);
            }
            else
            {
                echo '0';
            }
           

        ////////////////////////////////////// BID COUNT ON PAGE LOAD ////////////////////////////////////////////
    }    

    //////////////////////////////////////////// AJAX PLAN DETAILS  ///////////////////////////////////////////////////
    public function ajax_plan_details()
    {   
        $plan_id    = $this->input->post('plan_id');
        $query_plan = $this->User_model->query("SELECT * FROM plans WHERE id = '".$plan_id."'");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
            $bidding_cycle_count=$result_plan [0]['no_bidding_cycle'];
        }
        else
        {
            $result_plan = '1';
        }
         $queryBidCycle = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id= '".$plan_id."'");
        if($queryBidCycle->num_rows() > 0)
        {
            $resultBidCycle = $queryBidCycle->result_array();
            $today_date =date('Y-m-d H:i:s');
            foreach($resultBidCycle as $item)
            { 
                 $today_date_int = strtotime($today_date);
                 $bidding_schedule_date_int= strtotime($item['bidding_schedule_date']);
                 $bidding_schedule_end_date_int=strtotime($item['bidding_schedule_end_date']);
                if(($today_date_int<$bidding_schedule_date_int) && ($today_date_int <$bidding_schedule_end_date_int))
                { 
                    $bidding_cycle_count_value1['bidding_cycle_count'] = $item['bidding_cycle_count'];
                    break;
                }
                else
                {
                    $bidding_cycle_count_value1['bidding_cycle_count']='';
                }
            }
        }
       $new_result_plan=array_merge($result_plan,$bidding_cycle_count_value1);
       if($new_result_plan!=null){
       echo json_encode($new_result_plan);
       }
       echo '0';

    }
    ////////////////////////////////////// AJAX PLAN DETAILS ////////////////////////////////////////////

    ////////////////////////////////////// DASHBOARD PLAN INFORMATION /////////////////////////////////////
    public function dashboard_plan_information()
    {   
        $query_plan = $this->User_model->query("SELECT * FROM plans");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
        }
        else
        {
            $result_plan = '0';
        }
        echo json_encode($result_plan);
    }
    ////////////////////////////////////// DASHBOARD PLAN INFORMATION /////////////////////////////////////

    /////////////////////////////////////////// APPLICATION STARTS ////////////////////////////////////////////////

    public function application_status()
    {   
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];

        $query_plan = $this->User_model->query("SELECT * FROM user_application u join assigned_plans a on u.user_application_plan_id = a.assigned_plans_plan_id WHERE a.assigned_plans_user_id='".$user_id."' AND u.u_id='".$user_id."'");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
        }
        else
        {
            $result_plan = '';
        }

        $PlanDetails['PlanDetails'] = $result_plan;

        $data['content'] = $this->load->view('user/application_status',$session_data+$PlanDetails,true);
        $this->load->view('template/template', $data);
    }

    //////////////////////////////////////////// APPLICATION STATUS END ///////////////////////////////////////////////////   

     /////////////////////////////////////////// BIDDING DETAILS STARTS ////////////////////////////////////////////////

    public function bidding_details()
    {   

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];
        $application_plan_id            = $this->uri->segment(2);

        $query_plan = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id= '".$application_plan_id."'");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
        }
        else
        {
            $result_plan = '';
        }


        $BiddinGHistory['BiddinGHistory'] = $result_plan;

        $data['content'] = $this->load->view('user/bidding_details',$session_data+$BiddinGHistory,true);
        $this->load->view('template/template', $data);
    }    

    public function bidding_details_transactons()
    {   

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];
        $application_plan_id            = $this->uri->segment(2);
        $plancycleid                    = $this->uri->segment(3);

        $query_plan = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id= '".$application_plan_id."' AND bidding_cycle_count = '".$plancycleid."'");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
        }
        else
        {
            $result_plan = '';
        }

        
        // echo '<pre>';
        // print_r($result_plan);
        // echo '</pre>';

        // die();
        
        $BiddinGHistory['BiddinGHistory'] = $result_plan;

        $data['content'] = $this->load->view('user/bidding_details',$session_data+$BiddinGHistory,true);
        $this->load->view('template/template', $data);
    }

    //////////////////////////////////////////// BIDDING DETAILS END ///////////////////////////////////////////////////     

    /////////////////////////////////////////// BIDDING CYCLE AJAX ////////////////////////////////////////////////

    public function bidding_cycle_details()
    {   

        $bidding_schedule_plan_id = $this->input->post('bidding_plan_id');

        $query_plan = $this->User_model->query("SELECT * FROM plans as p join bidding_schedule as b on p.id=b.bidding_schedule_plan_id WHERE b.bidding_schedule_plan_id = '".$bidding_schedule_plan_id."'");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
        }
        else
        {
            $result_plan = '';
        }


        echo json_encode($result_plan);
    }

    //////////////////////////////////////////// BIDDING CYCLE AJAX ///////////////////////////////////////////////////

    /////////////////////////////////////////// BIDDING START AMOUNT AJAX ////////////////////////////////////////////////

    public function bidding_start_amount_details()
    {   

        $bidding_schedule_plan_id = $this->input->post('bidding_plan_ids');
        $bidding_cycle_count= $this->input->post('bidding_cycle_count');

        // $query_plan = $this->User_model->query("SELECT * FROM plans where id = '".$bidding_schedule_plan_id."'");
        $query_plan = $this->User_model->query("SELECT * FROM bidding_schedule where bidding_schedule_plan_id = '".$bidding_schedule_plan_id."' AND bidding_cycle_count = '".$bidding_cycle_count."'");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
        }
        else
        {
            $result_plan = '';
        }


        echo json_encode($result_plan['0']);
    }

    //////////////////////////////////////////// BIDDING START AMOUNT AJAX ///////////////////////////////////////////////////



    ///////////////////////////////////////////// TERMS AND CONDITIONS /////////////////////////////////////////////////////
    public function terms_conditions()
    {   

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];

        $query_plan = $this->User_model->query("SELECT * FROM bidding_details");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
        }
        else
        {
            $result_plan = '';
        }

        $BiddinGHistory['BiddinGHistory'] = $result_plan;

        $data['content'] = $this->load->view('terms/terms',$session_data,true);
        $this->load->view('template/template', $data);
    }


    /////////////////////////////////// TERMS AND CONDITIONS END//////////////////////////////////////////////////

    ///////////////////////////////// RESTRIC USER TO ONE BID /////////////////////////////////////////////////////
    public function restric_user_to_one_bid()
    {   

        $biddingUserID = $this->input->post('userIdrestricBid');
        $biddingPlanID = $this->input->post('bidding_plan_id');
        $bidding_cycle_count = $this->input->post('bidding_cycle_count');

        $query_plan_check = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id ='".$biddingPlanID."' and bidding_cycle_count='".$bidding_cycle_count."'");
        $response='';
        if($query_plan_check->num_rows() > 0)
        {
            $result_plan = $query_plan_check->result_array();

            foreach ($result_plan as $key => $value) 
            {
                if($value['bidding_low_bid_check'] == '1')
                {
                    $response=$value['bidding_user_id'];
                }
            }

            // $query_plan_check_user = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id ='".$biddingPlanID."'");
            // if($query_plan_check_user->num_rows() == 1)
            // {
            //     $query_plan = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id ='".$biddingPlanID."' AND bidding_user_id ='".$biddingUserID."' ");
            //     if($query_plan->num_rows() > 0)
            //     {
            //         $result_plan = $query_plan->result_array();
            //         echo '1';
            //     }
            //     else
            //     {
            //         $result_plan = '';
            //         echo '0';
            //     }
            // }
            // else
            // {
            //     $query_plan_get_min_bid = $this->User_model->query("SELECT MIN(bidding_place_bid_amount) as min_bid FROM bidding_details where bidding_plan_id ='".$biddingPlanID."'");
            //         if($query_plan_get_min_bid->num_rows() > 0)
            //         {

            //             $query_plan_22 = $this->User_model->query("SELECT  MIN(bidding_place_bid_amount) as min_bid_user  FROM bidding_details WHERE bidding_plan_id ='".$biddingPlanID."' AND bidding_user_id ='".$biddingUserID."'");
            //             if($query_plan_22->num_rows() > 0)
            //             {
            //                 $result_planquery_plan_22 =$query_plan_22->result_array();
            //             }
            //             else
            //             {

            //             }


            //             $result_plan_get_min_bid = $query_plan_get_min_bid->result_array();
            //             $amount1 = $result_plan_get_min_bid['0']['min_bid'];

            //             $amount2 = $result_planquery_plan_22['0']['min_bid_user'];

            //             if($amount1 == $amount2)
            //             {
            //                 echo '1';
            //             }
            //             else
            //             {
            //                 echo '0';
            //             }
            //         }
            // }
        }
        echo $response;
    }


    //////////////////////////////////// RESTRIC USER TO ONE BID//////////////////////////////////////////////    

    /////////////////////////////////// PLACE THE WINNING BID  ////////////////////////////////////////////////
    public function place_win_bid_ajax()
    {    
        $winBidAmount = $this->input->post('current_bid_amount');

        $bidding_place_bid_date = date('Y-m-d H:i:s');

        $bidding_current_bid_amount = str_replace( ',', '', $winBidAmount);


        $query_Fetch_User = $this->User_model->query("SELECT * FROM user_application WHERE u_id= '".$this->input->post('bidding_user_id')."' AND user_application_plan_id = '".$this->input->post('bidding_plan_id')."'");
        if($query_Fetch_User->num_rows() > 0)
        {
            $result_FetchUser = $query_Fetch_User->result_array();
        }
        else
        {
            $result_FetchUser = '';
        }

        $query_Check_Win_bid_exist = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' and bidding_cycle_count='".$this->input->post('bidding_cycle_count')."'");

        if($query_Check_Win_bid_exist->num_rows() > 0)
        {
                $result_WinbidExist = $query_Check_Win_bid_exist->result_array();

                $UpdateQueryNotaWinCheck = $this->User_model->query("UPDATE bidding_details SET bidding_not_a_winner_check ='1' WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' AND  bidding_user_id != '".$this->input->post('bidding_user_id')."'");


                $data = array(

                'bidding_plan_id'                        => $this->input->post('bidding_plan_id'),
                'bidding_user_id'                        => $this->input->post('bidding_user_id'),
                'bidding_place_bid_date'                 => $bidding_place_bid_date,
                'bidding_place_bid_amount'               => $bidding_current_bid_amount,
                'bidding_bidder_first_name'              => $result_FetchUser['0']['user_application_first_name'],
                'bidding_bidder_last_name'               =>  $result_FetchUser['0']['user_application_last_name'],
                'bidding_check_winning_bid'              =>  '1',
                'bidding_cycle_count'                    => $this->input->post('bidding_cycle_count'),
                );

                $win_bid_check_array = array();
                foreach ($result_WinbidExist as $key => $value) 
                {
                $win_bid_check_array[$key] = $value['bidding_check_winning_bid'];
                }

            
            $win_bid_check_array;

            if( in_array( "1" ,$win_bid_check_array ) )
            {
                echo "1";
            }
            else
            {
                $insertPlanData = $this->User_model->insertdata('bidding_details',$data);
                $UpdateQuery = $this->User_model->query("UPDATE plans SET plan_win_bid_check ='1' WHERE id ='".$this->input->post('bidding_plan_id')."'");


                $query_Fetch_bid_cycle = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' AND bidding_check_winning_bid = '1' and bidding_cycle_count='".$this->input->post('bidding_cycle_count')."'");
                if($query_Fetch_bid_cycle->num_rows() > 0)
                {
                    $result_FetchUser_bid_cycle = $query_Fetch_bid_cycle->result_array();

                    $bid_cycle_win_count= $result_FetchUser_bid_cycle['0']['bidding_cycle_count'];
                }
                else
                {
                    $result_FetchUser_bid_cycle = '';
                    $bid_cycle_win_count ='';
                }


                $UpdateQuery = $this->User_model->query("UPDATE bidding_schedule SET bidding_cycle_winner_f ='".$result_FetchUser['0']['user_application_first_name']."' ,bidding_cycle_winner_l ='".$result_FetchUser['0']['user_application_last_name']."' , bidding_cycle_win_amount = '".$bidding_current_bid_amount."' , bidding_cycle_win_bid_check = '1',bidding_status='bid_over' WHERE bidding_schedule_plan_id ='".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$bid_cycle_win_count."'");

                echo "0";
            }
        }
        else
        {

            $result_WinbidExist = '';
                $data = array(

                'bidding_plan_id'                        => $this->input->post('bidding_plan_id'),
                'bidding_user_id'                        => $this->input->post('bidding_user_id'),
                'bidding_place_bid_date'                 => $bidding_place_bid_date,
                'bidding_place_bid_amount'               => $bidding_current_bid_amount,
                'bidding_bidder_first_name'              => $result_FetchUser['0']['user_application_first_name'],
                'bidding_bidder_last_name'               =>  $result_FetchUser['0']['user_application_last_name'],
                'bidding_check_winning_bid'              =>  '1',
                'bidding_cycle_count'                    => $this->input->post('bidding_cycle_count'),
            );

                $insertPlanData = $this->User_model->insertdata('bidding_details',$data);

                $UpdateQuery = $this->User_model->query("UPDATE plans SET plan_win_bid_check ='1' WHERE id ='".$this->input->post('bidding_plan_id')."'");

                $query_Fetch_bid_cycle = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' AND bidding_check_winning_bid = '1' and bidding_cycle_count='".$this->input->post('bidding_cycle_count')."'");
                if($query_Fetch_bid_cycle->num_rows() > 0)
                {
                    $result_FetchUser_bid_cycle = $query_Fetch_bid_cycle->result_array();

                    $bid_cycle_win_count= $result_FetchUser_bid_cycle['0']['bidding_cycle_count'];
                }
                else
                {
                    $result_FetchUser_bid_cycle = '';
                    $bid_cycle_win_count ='';
                }


                $UpdateQuery = $this->User_model->query("UPDATE bidding_schedule SET bidding_cycle_winner_f ='".$result_FetchUser['0']['user_application_first_name']."' ,bidding_cycle_winner_l ='".$result_FetchUser['0']['user_application_last_name']."' , bidding_cycle_win_amount = '".$bidding_current_bid_amount."' , bidding_cycle_win_bid_check = '1',bidding_status='bid_over'  WHERE bidding_schedule_plan_id ='".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$bid_cycle_win_count."'");

                echo "0";
        }

        ////// INSERT AUTOMATIC TRANSACTION ///////////////

        // DEBIT 

        // Fetch Cycle no 
        $query_Fetch_bid_cycle1 = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' AND bidding_check_winning_bid = '1'");
        if($query_Fetch_bid_cycle1->num_rows() > 0)
        {
            $result_FetchUser_bid_cycle1 = $query_Fetch_bid_cycle1->result_array();

            $bid_cycle_win_count1= $result_FetchUser_bid_cycle1['0']['bidding_cycle_count'];
        }
        else
        {
            $result_FetchUser_bid_cycle1 = '';
            $bid_cycle_win_count1 ='';
        }

        
        // Fetch debit entry amount 


        $query_Fetch_win_bid_amount = $this->User_model->query("SELECT * FROM plans WHERE id = '".$this->input->post('bidding_plan_id')."'");
        if($query_Fetch_win_bid_amount->num_rows() > 0)
        {
            $result_FetchUser_win_bid_amount= $query_Fetch_win_bid_amount->result_array();

            $result_FetchUser_win_amount= $result_FetchUser_win_bid_amount['0']['plan_win_bidding_amount'];
            $result_FetchUser= $result_FetchUser_win_bid_amount['0']['total_no_appliactions'];
        }
        else
        {
            $result_FetchUser_debit = '';
            $result_FetchUser_win_amount ='';
        }




        $insert_credit_transaction= array(  

            'transaction_bidding_cycle'      => $bid_cycle_win_count1,
            'transaction_date'               => date('Y-m-d'),
            'transaction_description'        => 'Bidding Cycle Winner',
            'transaction_credit_amount'       => $result_FetchUser_win_amount,
            'transaction_user_id'            => $this->input->post('bidding_user_id'),
            'transaction_plan_id'            => $this->input->post('bidding_plan_id')

         );         

        $insert_comm_deb_transaction= array(  

            'transaction_bidding_cycle'      => $bid_cycle_win_count1,
            'transaction_date'               => date('Y-m-d'),
            'transaction_description'        => 'Bidding Cycle Commission',
            'transaction_debit_amount'       => number_format(($result_FetchUser_win_amount / 100)*5 ,2),
            'transaction_user_id'            => $this->input->post('bidding_user_id'),
            'transaction_plan_id'            => $this->input->post('bidding_plan_id')

         );  


        $query_get_users = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$this->input->post('bidding_plan_id')."' ");


            if($query_get_users->num_rows() > 0)
            {
                $result_get_users = $query_get_users->result_array();
                $total_rows = $result_FetchUser;
                $total_debit = number_format(($result_FetchUser_win_amount / $total_rows ),2) ;


                foreach ($result_get_users as $key => $value) {

                $insert_debit_transaction= array(  

                    'transaction_bidding_cycle'      => $bid_cycle_win_count1,
                    'transaction_date'               => date('Y-m-d'),
                    'transaction_description'        => 'Bidding Cycle Installment',
                    'transaction_debit_amount'       => $total_debit,
                    'transaction_user_id'            => $value['u_id'],
                    'transaction_plan_id'            => $this->input->post('bidding_plan_id')

                 );  
                // $InsertDebitTransaction = $this->User_model->insertdata('transactions',$insert_debit_transaction);  


                }

            }
            else
            {
                $result_get_users = '';
            }

        // $InsertCreditTransaction = $this->User_model->insertdata('transactions',$insert_credit_transaction);  
        // $InsertComDebTransaction = $this->User_model->insertdata('transactions',$insert_comm_deb_transaction);  




        /////////////// GENERATE STATEMENT /////////////////////
   $query_get_users = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$this->input->post('bidding_plan_id')."' ");


            if($query_get_users->num_rows() > 0)
            {
                $result_get_users = $query_get_users->result_array();
                $total_rows = $result_FetchUser;
                $total_debit = number_format(($result_FetchUser_win_amount / $total_rows ),2) ;


                foreach ($result_get_users as $key => $value) {


                     $query_Fetch_statement = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debit ,SUM(transaction_credit_amount) as credit FROM transactions WHERE transaction_user_id = '".$value['u_id']."' AND transaction_date < CURDATE() ");
                        if($query_Fetch_statement->num_rows() > 0)
                        {
                            $result_Fetch_statement= $query_Fetch_statement->result_array();

                            $debit = $result_Fetch_statement['0']['debit'];
                            $credit = $result_Fetch_statement['0']['credit'];

                            $balance = $debit- $credit;

                        }
                        else
                        {
                            $result_Fetch_statement = '';
                        }        

                        $query_Fetch_statement1 = $this->User_model->query("SELECT * FROM transactions WHERE transaction_user_id = '".$value['u_id']."' AND  transaction_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() ");
                        if($query_Fetch_statement1->num_rows() > 0)
                        {
                            $result_Fetch_statement1= $query_Fetch_statement1->result_array();
                        
                        }
                        else
                        {
                            $result_Fetch_statement1 = '';
                        }        

                        $query_Fetch_statement2 = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debitamt ,SUM(transaction_credit_amount) as creditamt  FROM transactions WHERE transaction_user_id = '".$value['u_id']."' AND  transaction_date = '".date('Y-m-d')."' ");
                        if($query_Fetch_statement2->num_rows() > 0)
                        {
                            $result_Fetch_statement2= $query_Fetch_statement2->result_array();
                            $debitamt = $result_Fetch_statement2['0']['debitamt'];
                            $creditamt = $result_Fetch_statement2['0']['creditamt'];
                            $balanceamt = $debitamt- $creditamt;
                        
                        }
                        else
                        {
                            $result_Fetch_statement2 = '';
                        }



                        if($balance >= 0)
                        {
                            $min_due =  $debit- $credit;
                        }
                        else
                        {
                            $min_due = '0.00';

                        }        

                        if($creditamt >= 0)
                        {
                            $due_amountt =  $debitamt- $creditamt;
                        }
                        else
                        {
                            $due_amountt = '0.00';

                        }

                        $total = $due_amountt + $balance;
                   

                        $email   = 'lovepreet.wartiz@gmail.com';
                        // $message = '<table class="table"><tr><td>transactions</td><td>Due Amount Balance</td><td>Current Balance</td></tr><tr><td>Last 30 Days Balance</td><td>'.$due_amount.'</td><td>'.$balance.'</td></tr></table>';


                        $message='<table id="m_7303196346564942279dfs" width="100%" cellpadding="0" cellspacing="0" border="0"style="background-color:#f3f2f0" bgcolor="#f3f2f0;">
                    <tbody><tr>
                      <td width="100%"><div class="m_7303196346564942279webkit" style="max-width:600px;Margin:0 auto"> 
                          
                           
                          
                          
                          <table class="m_7303196346564942279outer" align="center" cellpadding="0" cellspacing="0" border="0" style="border-spacing:0;Margin:0 auto;width:100%;max-width:600px">
                            <tbody><tr>
                              <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                
                                
                                <table id="m_7303196346564942279d" class="m_7303196346564942279one-column" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0;border-left:1px solid #e8e7e5;border-right:1px solid #e8e7e5;border-bottom:1px solid #e8e7e5;border-top:1px solid #e8e7e5" bgcolor="#FFFFFF">
                                  <tbody><tr>
                                    <td background="#17113a" bgcolor="#17113a" width="600" height="50" valign="top" align="center"> 
                                        <p style="color:#ffffff;font-size:21px;text-align:center;font-family:Verdana,Geneva,sans-serif;line-height:61px;margin:2px;padding:0;float:left;margin-left:19px">STATEMENT DEMO DATA
                                          </p>
                                      </td>
                                  </tr>
                                </tbody></table>
                                
                                 </td>
                                  </tr>
                                
                                <tr>
                                 <td style="padding:20px 36px;background:white"> 
                                <table id="m_7303196346564942279d" class="m_7303196346564942279one-column" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-spacing:0" bgcolor="#FFFFFF">
                                  <tbody>
                                <tr><td><p style="color:#011e40;font-size:20px;font-weight:bold;text-align:left;font-family:Verdana,Geneva,sans-serif;line-height:25px;padding:0;padding:10px 13px"> Details</p></td></tr>
                                   <tr>
                                    <td><span class="im"> 
                                        
                                        <p style="color:#011e40;font-size:16px;text-align:left;font-family:Verdana,Geneva,sans-serif;line-height:25px;padding:0;padding:0px 13px">Due Days :<b>21 Days</b></p>
                                        <p style="color:#011e40;font-size:16px;text-align:left;font-family:Verdana,Geneva,sans-serif;line-height:25px;padding:0;padding:0px 13px">Minimum Payment Due Amount :<b>'.$min_due.'</b></p>
                                    <p style="color:#011e40;font-size:16px;text-align:left;font-family:Verdana,Geneva,sans-serif;line-height:30px;padding:0;padding:0px 13px">Previous Balance :<b>'.$balance.'</b></p>

                                    </span><p style="color:#011e40;font-size:16px;text-align:left;font-family:Verdana,Geneva,sans-serif;line-height:30px;padding:0;padding:0px 13px">Current Balance : <b>'.$due_amountt.'</b></p><p style="color:#011e40;font-size:16px;text-align:left;font-family:Verdana,Geneva,sans-serif;line-height:30px;padding:0;padding:0px 13px">New Balance : <b>'.$total.'</b></p>
                                  </td></tr>
                                </tbody></table>';

                            $this->email->from('support@committi.com', 'Committi');
                            $this->email->to($email);
                            $this->email->subject('STATEMENT');
                            $this->email->message($message);
                            $this->email->set_mailtype('html'); 
                            $this->email->send(); 

                 


                                }

                            }
                            else
                            {
                                $result_get_users = '';
                            }

       



    }


    //////////////////////////////////////////// PLACE THE WINNING BID END ///////////////////////////////////////////////


    ////////////////////////// TRANSACTION DETAILS ////////////////
    public function get_transaction_details()
    {   
        $id = $session_data['session_data']=$this->session->userdata('id');
        $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        else
        {
            $result = '';
        }

        $session_data['session_data']=$result['0'];


        ///////////////////// FETCH PLAN NAMES ////////////////////
        $query_plans = $this->User_model->query("SELECT * FROM plans");
        if($query_plans->num_rows() > 0)
        {
            $result_plans = $query_plans->result_array();
        }
        else
        {
            $result_plans = '';
        }

        $plans['plans']=$result_plans;
        $plan_data['plan_data']='';

        //////////////////////FETCH PLAN NAMES END //////////////////

        $application_plan_id = base64_decode($this->uri->segment(2));

        // $bidding_schedule_plan_id = $this->input->post('bidding_plan_ids');

        $query_plan = $this->User_model->query("SELECT * FROM bidding_details where bidding_plan_id = '".$application_plan_id."' AND bidding_check_winning_bid='1' ");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
            $winning_bid['winning_bid']=$result_plan;

            $query_plan1 = $this->User_model->query("SELECT * FROM bidding_details where bidding_plan_id = '".$application_plan_id."'  ");
            if($query_plan1->num_rows() > 0)
            {
                $count_rowss = $query_plan1->num_rows();
            }
            else
            {
                $count_rowss = '';
            }

            
            $count_rows['count_rows']=$count_rowss;

            
        }
        else
        {
            $result_plan = '';
            $winning_bid['winning_bid']='';
            $count_rows['count_rows']='';
        }

        $application_plan_id_value['application_plan_id_value']=$application_plan_id;




        $data['content'] = $this->load->view('user/transactions',$session_data+$plans+$plan_data+$winning_bid+ $count_rows+$application_plan_id_value,true);
        $this->load->view('template/template', $data);


    }
    ////////////////////////// TRANSACTION DETAILS /////////////////////


    ///////////////////////// AJAX TRANSACTION DETAILS ////////////////////
    public function ajax_transaction_details()
    {   

        $application_plan_id = $this->input->post('plan_id');

        $query_plan = $this->User_model->query("SELECT * FROM bidding_details where bidding_plan_id = '".$application_plan_id."' AND bidding_check_winning_bid='1' ");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();

            echo json_encode($result_plan);
        }
        else
        {
            $result_plan = '';
        }

    }
    ////////////////////////// AJAX TRANSACTION DETAILS ////////////////

    ///////////////////////// AJAX PLAN DATE CHECK DETAILS //////////////

    public function check_date_status()
    {   
        $application_plan_id = $this->input->post('plan_id');
        $query_plan = $this->User_model->query("SELECT * FROM bidding_schedule where bidding_schedule_plan_id = '".$application_plan_id."'");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
            echo json_encode($result_plan);
        }else{
            echo '0';
        }
    }
    //////////////////////////  AJAX PLAN DATE CHECK DETAILS ////////////////


    ///////////////////////// GET USER NOTIFICATIONS ///// //////////////

    public function get_notification()
    {   
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];
        $query_plan = $this->User_model->query("SELECT * FROM notification where notification_type ='user' and user_notification_id='".$user_id."'");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();
            echo json_encode($result_plan);
        }else{
            echo '0';
        }
    }
    //////////////////////////  GET ADMIN NOTIFICATIONS //////////////// 


    ///////////////////////// DELETE  ADMIN NOTIFICATIONS ///// //////////////

    public function delete_user_notification()
    {   
        $id  = $this->input->post('id');
        $query_plan = $this->User_model->query("DELETE FROM notification where notification_type = 'user' AND notification_id ='".$id."' ");

        echo '1';

    }
    //////////////////////////  DELETE ADMIN NOTIFICATIONS ////////////////    


    ///////////////////////// DELETE ALL ADMIN NOTIFICATIONS ///// //////////////

    public function delete_all_user_notification()
    {   
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];
        $query_plan = $this->User_model->query("DELETE FROM notification where notification_type ='user' and  user_notification_id='".$user_id."'");
        echo '1';
    }
    //////////////////////////  GET ADMIN NOTIFICATIONS ///////////////

    /////////////////// MANAGE USER NOTES ///////////////////////////

    public function user_notes()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $data['content'] = $this->load->view('user/user_notes',$session_data,true);
        $this->load->view('template/template', $data);
    }

    public function fetch_user_note()
    {   

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);

        $query_get_notes = $this->User_model->query("SELECT * FROM admin_notes where admin_notes_u_id = '".$recursive_session_value['0']['id']."'  OR admin_notes_posting_id  = '".$recursive_session_value['0']['id']."' ");
        if($query_get_notes->num_rows() > 0)
        {
            $result_get_notes = $query_get_notes->result_array();

            echo json_encode($result_get_notes);
        }
        else
        {
            $result_get_notes = '';
        }
    }

    public function view_user_notes()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];




        $data['content'] = $this->load->view('user/view_user_notes',$session_data,true);
        $this->load->view('template/template', $data);


    }

    public function fetch_user_notes_meta()
    {   

        $id                             = $this->input->post('id');
        $query_get_notes = $this->User_model->query("SELECT * FROM admin_notes_meta where admin_notes_meta_u_id = '".$id."' ");
        if($query_get_notes->num_rows() > 0)
        {
            $result_get_notes = $query_get_notes->result_array();

            echo json_encode($result_get_notes);
        }
        else
        {
            $result_get_notes = '';
        }
    } 

    public function add__user_notes_meta()
    {   

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $name                           = $recursive_session_value['0']['first_name'].' '.$recursive_session_value['0']['last_name'];
        $id                             = $this->input->post('id');

        $query_get_note_no = $this->User_model->query("SELECT * FROM admin_notes where admin_notes_id = '".$id."' ");
        if($query_get_note_no->num_rows() > 0)
        {
            $result_get_note_no = $query_get_note_no->result_array();
            $note_no = $result_get_note_no['0']['admin_notes_note_number'];

        }
        else
        {
            $result_get_note_no = '';
            $note_no= '';
        }

        $insert_notes_meta= array(  
                'admin_notes_meta_u_id'               => $id,
                'admin_notes_meta_desc'               => $this->input->post('description'),
                'admin_notes_meta_note_no'            => $note_no,
                'admin_notes_meta_post_date'          => date('Y-m-d h:i:s'),
                'admin_notes_meta_name'               => $name
             );  

        $NoteInsertMeta = $this->User_model->insertdata('admin_notes_meta',$insert_notes_meta);


        $query_get_notes = $this->User_model->query("SELECT * FROM admin_notes_meta where admin_notes_meta_u_id = '".$id."' ");
        if($query_get_notes->num_rows() > 0)
        {
            $result_get_notes = $query_get_notes->result_array();

            echo json_encode($result_get_notes);
        }
        else
        {
            $result_get_notes = '';
        }
    }  
    //////////////////////////////////////////////////////////////////


    ////////////////////INVITE A FRIEND /////////////////////////////

    public function invite_friend()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];




        $data['content'] = $this->load->view('user/invite_friend',$session_data,true);
        $this->load->view('template/template', $data);


    }

    public function invite_a_friend()
    {   
        $reset_link = base_url();
        $email   = $this->input->post('invite_email');
        $hidden_user_id   = $this->input->post('hidden_user_id');
        $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#110d35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Signup Invite</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello,<br><br>This is a dummy invite mail.Click the link below to signup.&nbsp;</p><p></p><a href="'.$reset_link.'"  target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color: #110d35;">Click Here</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($email);
            $this->email->subject('Invite');
            $this->email->message($message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 

            echo '1';

            $referralsData= array(  
            'referrals_email_id'            => $email,
            'referrals_referred_by'         => $hidden_user_id,
           );  

            $InsertreferralsData = $this->User_model->insertdata('referrals',$referralsData);
    } 


    ////////////////////////////////////////////////////////////////    


    public function refresh_bid_count()
    {   
                ////////////////////////////////////// BID COUNT ////////////////////////////////////////////
            $query_bidding_count = $this->User_model->query("SELECT  DISTINCT b.bidding_place_bid_amount FROM plans p JOIN bidding_details b on p.id=b.bidding_plan_id WHERE b.bidding_plan_id= '".$this->input->post('hidden_plan_idData')."' and b.bidding_cycle_count='".$this->input->post('bidding_cycle_count')."'");

            if($query_bidding_count->num_rows() > 0)
            {
                $result_bidding_count = $query_bidding_count->result_array();
            }
            else
            {
                $result_bidding_count=0;
            }


            // echo json_encode($result_bidding_count);
            echo json_encode($result_bidding_count);

        ////////////////////////////////////// BID COUNT ////////////////////////////////////////////
    } 

    public function fetch_note_per_user()
    {   

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);

        $query_get_notes = $this->User_model->query("SELECT * FROM admin_notes where admin_notes_u_id = '".$recursive_session_value['0']['id']."' AND admin_notes_status='2' ");
        if($query_get_notes->num_rows() > 0)
        {
            $result_get_notes = $query_get_notes->result_array();

            echo json_encode($result_get_notes);
        }
        else
        {
            $result_get_notes = '';
        }
    }    

    public function fetch_not_desc_ajax()
    {   

        $id   = $this->input->post('id');

        $query_get_notes = $this->User_model->query("SELECT * FROM admin_notes where admin_notes_id = '".$id."' ");
        if($query_get_notes->num_rows() > 0)
        {
            $result_get_notes = $query_get_notes->result_array();

            echo json_encode($result_get_notes);
        }
        else
        {
            $result_get_notes = '';
        }
    }


    public function view_user_application()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];

        $user_id = base64_decode($this->uri->segment(2));
        $plan_id = base64_decode($this->uri->segment(3));


        ///////////////////////////FETCHING COMMITTI USERS TABLE DATA //////////////////////////////////////////

        $query_user_application = $this->User_model->query("SELECT * FROM user_application WHERE u_id= '".$user_id."' AND user_application_plan_id= '".$plan_id."'");
        if($query_user_application->num_rows() > 0)
        {
            $result_user_application = $query_user_application->result_array();
            $user_application['user_application']=$result_user_application;
        }
        else
        {
            $result_user_application = '';
            $user_application['user_application']=array();

        }


        ///////////////////////////FECTHING COMMITTI USERS TABLE DATA ENDS ////////////////////////////////////


        $data['content'] = $this->load->view('user/view_user_application',$session_data+$user_application,true);
        $this->load->view('template/template', $data);


    }
    public function ajax_get_plan_transactions()
    {   
        $plan_id   = $this->input->post('plan_id');
        $user_id   = $this->input->post('hidden_user_session_id');

        $get_total_bids = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$plan_id."' ");

        if($get_total_bids->num_rows() > 0)
        {
            $result_get_total_bids= $get_total_bids->result_array();

        }
        else
        {
            $result_get_total_bids = '';
        }        

        $get_username = $this->User_model->query("SELECT * FROM users WHERE id = '".$user_id."' ");


        if($get_username->num_rows() > 0)
        {
            $result_get_username= $get_username->result_array();
    
            $first_name = $result_get_username['0']['first_name'];
            $last_name = $result_get_username['0']['last_name'];
        }
        else
        {
            $result_get_username = '';
            $first_name = '';
            $last_name = '';
        }

        $total_bids = $get_total_bids->num_rows();


        $query_get_transactions = $this->User_model->query("SELECT * FROM transactions where transaction_user_id = '".$user_id."' AND  transaction_plan_id = '".$plan_id."'");
        if($query_get_transactions->num_rows() > 0)
        {
            $result_get_transactions = $query_get_transactions->result_array();

            foreach($result_get_transactions as $key => $row)
            {

                $get_total_bids1 = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$row['transaction_plan_id']."' AND bidding_cycle_count = '".$row['transaction_bidding_cycle']."' ");

                if($get_total_bids1->num_rows() > 0)
                {
                    $result_get_total_bids1= $get_total_bids1->result_array();

                }
                else
                {
                    $result_get_total_bids1 = '';
                }  

                 $total_bidss = $get_total_bids1->num_rows();




              $result_get_transactions[$key]['total_bids']=$total_bidss;
              $result_get_transactions[$key]['first_name']=$first_name;
              $result_get_transactions[$key]['last_name']=$last_name;
            }


            // echo '<pre>';
            // print_r($result_get_transactions);
            // echo '</pre>';

            // die();
            echo json_encode($result_get_transactions);
        }
        else
        {
            $result_get_transactions = '';
        }






    }   

    public function get_bid_less_amount_user_ajax()
    {   

        $bidding_user_id   = $this->input->post('bidding_user_id');
        $bidding_plan_id   = $this->input->post('bidding_plan_id');
        $bidding_cycle_count= $this->input->post('bidding_cycle_count');


        // $query_bidding_details = $this->User_model->query("SELECT * FROM plans p JOIN confirmed_plan_users c on p.id=c.confirmed_plan_plan_id WHERE c.confirmed_plan_user_id= '".$bidding_user_id."' AND c.confirmed_plan_plan_id= '".$bidding_plan_id."'");
        $query_bidding_details = $this->User_model->query("SELECT * FROM bidding_schedule  WHERE bidding_schedule_plan_id= '".$bidding_plan_id."' AND bidding_cycle_count = '".$bidding_cycle_count."'");
        if($query_bidding_details->num_rows() > 0)
        {
            $result_bidding_details = $query_bidding_details->result_array();
            echo json_encode($result_bidding_details['0']);

        }
        else
        {
            $result_bidding_details = '';
        }

    }
   

    public function get_win_bid_and_refresh()
    {   

        $bidding_plan_id   = $this->input->post('bidding_plan_id');
        $bidding_cycle_count  = $this->input->post('bidding_cycle_count');
        $query_bidding_details = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_check_winning_bid = '1' AND bidding_cycle_count ='".$bidding_cycle_count."' AND bidding_plan_id= '".$bidding_plan_id."'");
        if($query_bidding_details->num_rows() > 0)
        {
            $result_bidding_details = $query_bidding_details->result_array();
            echo '1';
        }
        else
        {
            $result_bidding_details = '';
            echo '2';
        }

    }    

    public function get_bidding_history_ajax()
    {   

        $bidding_plan_id   = $this->input->post('bidding_plan_id');
        $bidding_cycle_count   = $this->input->post('bidding_cycle_count');

        $query_bidding_details = $this->User_model->query("SELECT * FROM bidding_details WHERE  bidding_plan_id= '".$bidding_plan_id."' and bidding_cycle_count='".$bidding_cycle_count."'");
        if($query_bidding_details->num_rows() > 0)
        {
            $result_bidding_details = $query_bidding_details->result_array();
            echo json_encode($result_bidding_details);
        }
        else
        {
            $result_bidding_details = '';
        }

    }

    public function payments()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];

      if($this->uri->segment(2)){
            $plan_id['plan_id']=base64_decode($this->uri->segment(2));
        }else{
            $plan_id['plan_id']='';
        }

        $query_fecth_plans = $this->User_model->query("SELECT * FROM user_application WHERE u_id = '".$user_id."'");
        if($query_fecth_plans->num_rows() > 0)
        {
            $result_fetch_planss = $query_fecth_plans->result_array();
            $result_fetch_plans['result_fetch_plans']= $result_fetch_planss;
        }
        else
        {
            $result_fetch_planss = '';
            $result_fetch_plans['result_fetch_plans']= array();
        }        

        $query_fecth_payments = $this->User_model->query("SELECT * FROM payments WHERE payment_user_id = '".$user_id."'");
        if($query_fecth_payments->num_rows() > 0)
        {
            $result_fetch_paymentss = $query_fecth_payments->result_array();
            $result_fetch_payments['result_fetch_payments']= $result_fetch_paymentss;
        }
        else
        {
            $result_fetch_paymentss = '';
            $result_fetch_payments['result_fetch_payments']= '';

        }        

        $query_fecth_bank_account = $this->User_model->query("SELECT * FROM bank_accounts WHERE bank_account_user_id = '".$user_id."'");
        if($query_fecth_bank_account->num_rows() > 0)
        {
            $result_fetch_bank_accounts = $query_fecth_bank_account->result_array();
            $result_fetch_bank_account['result_fetch_bank_account']= $result_fetch_bank_accounts;
        }
        else
        {
            $result_fetch_bank_accounts = '';
            $result_fetch_bank_account['result_fetch_bank_account']= '';

        }
        $data['committi_user'] = '';
        $query_committi_users = $this->User_model->query("SELECT * FROM committi_users WHERE user_login_id= '".$user_id."'");
        if($query_committi_users->num_rows() > 0)
        {
            $result_committi_users = $query_committi_users->result_array();
            $data['committi_user']=$result_committi_users['0'];
        }
        ///////////////////////////FECTHING COMMITTI USERS TABLE DATA ENDS ////////////////////////////////////
        $data['pad_history']   = $this->get_pad_history($user_id);
        $data['pad_plan_list'] = $this->pad_plan_list($user_id);
        $data['content'] = $this->load->view('user/payments',$session_data+$result_fetch_plans+$result_fetch_payments+$result_fetch_bank_account+$plan_id+$data,true);
        $this->load->view('template/template', $data);
    }
    public function get_pad_history($user_id){
      $result='';
      $get_history=$this->User_model->query("select * from  pad_agreement_history where pad_user_id='".$user_id."' order by pad_id DESC");
      if($get_history->num_rows()>0){
        $result=$get_history->result_array();
      }
      return $result;
    }
     public function pad_plan_list($user_id){
        $result='';
        $get_pad_plan_list=$this->User_model->query("Select * from user_application inner join bank_accounts on user_application. user_application_bank_id=bank_accounts.bank_account_id where user_application.u_id='".$user_id."' and  user_application.user_application_pad_status='1'");
        if($get_pad_plan_list->num_rows()>0){
           $result=$get_pad_plan_list->result_array();
        }
        return $result;
    }
    public function get_bidding_cycle_for_payment(){   
        $select_plan   = $this->input->post('select_plan');
        $query_bidding_details = $this->User_model->query("SELECT * FROM bidding_schedule WHERE  bidding_schedule_plan_id= '".$select_plan."'");
        if($query_bidding_details->num_rows() > 0)
        {
            $result_bidding_details = $query_bidding_details->result_array();
            echo json_encode($result_bidding_details);
        }
        else
        {
            $result_bidding_details = '';
        }

    }    

    public function get_last_statement($plan_id,$user_id){
        $result='';
      $get_statement=$this->db->query("select * from statements where statement_plan_id='".$plan_id."' and statement_user_id='".$user_id."' order by statement_id desc limit 1");
      if($get_statement->num_rows()>0){
         $result=$get_statement->result_array();
         $result=$result[0];
      }
      return $result;
    }
    public function get_bidding_cycle_statement_bal()
    {   
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];

        $select_plan   = $this->input->post('select_plan');
        //check user applications information
        $pad_status=0;
        $user_application=$this->User_model->query('select u_id,user_application_plan_id,user_application_pad_status from user_application where u_id="'.$user_id.'" and user_application_plan_id="'.$select_plan.'" and user_application_pad_status="1"');
        if($user_application->num_rows()>0){
           echo '2';
        }else{
        $result_get_plan_details = '';
        $bidding_start_date ='';
        $query_get_plan_details = $this->User_model->query("SELECT * FROM plans WHERE id = '".$select_plan."'");
        if($query_get_plan_details->num_rows() > 0)
        {
            $result_get_plan_details = $query_get_plan_details->result_array();
            $date_bid = $result_get_plan_details['0']['bidding_start_date'];
            $bidding_start_date = date('Y-m-d', strtotime($date_bid));
            $current_date = date('Y-m-d');
        }
        $query_get_plan_transaction = $this->User_model->query("SELECT SUM(transaction_debit_amount) as debitSum ,SUM(transaction_credit_amount) as creditSum ,transaction_date FROM transactions WHERE transaction_plan_id = '".$select_plan."' AND transaction_user_id = '".$user_id."' AND transaction_date >='".$bidding_start_date."' AND transaction_date <='".$current_date."'");
     
          if($query_get_plan_transaction->num_rows() > 0)
          {
            $result_get_plan_transaction = $query_get_plan_transaction->result_array();

            $transaction_date=$result_get_plan_transaction['0']['transaction_date'];

            $new_transaction_due_date=date('m/d/Y', strtotime($transaction_date. ' + 21 days'));                    

            $debit = $result_get_plan_transaction['0']['debitSum'];
            $credit = $result_get_plan_transaction['0']['creditSum'];
            $balance = $debit - $credit;

            if($balance >= '0')
            {
                $min_due_amt = $balance;
                $check_balance ='positive';
            }
            else
            {
                // $min_due_amt = '0.00';
                $min_due_amt = $balance;
                 $check_balance='negative';
            }
            $s_due_date='';
            $statement_data=$this->get_last_statement($select_plan,$user_id);
            if($statement_data!=''){
                $s_due_date=date('m/d/Y',strtotime($statement_data['statement_due_date']));
            }

            $array = array(

                'start_date'    => $bidding_start_date ,
                'end_date'      => $current_date,
                'min_due_amt'   => number_format($min_due_amt,2),
                'min_due_amt_1'   =>$min_due_amt,
                'plan_id'       => $select_plan,
                'transaction_date'=>$new_transaction_due_date,
                'check_balance'  =>$check_balance,
                'due_date'       => $s_due_date,
                
            );
            echo json_encode($array);
        }
        else
        {
            $result_get_plan_transaction = '';
        }
       }
    }
    public function submit_payment_ajax(){ 
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];
        $select_plan                    = $this->input->post('select_plan');
        $enter_custom_amount            = $this->remove_currency_symbol($this->input->post('enter_custom_amount'));
        $enter_custom_date              = $this->input->post('enter_custom_date');
        $select_bank_account            = $this->input->post('select_bank_account');
        $balance_sign                   = $this->input->post('balance_sign');
        $prefered_method                = $this->input->post('pefered_contact_method');
        $service_for                    = $this->input->post('service_value');
        $email_agreement                = $this->input->post('email_agreement');
        $agreement_signed               = $this->input->post('agreement_signed');
        $date_of_sign                   = $this->input->post('sign_date');
        $sign_name                      = $this->input->post('sign_name');
        if($select_plan && $enter_custom_amount && $select_bank_account && $enter_custom_date != ''){
            if($balance_sign=='negative'){
              $PaymentData= array(  
                        'payment_plan_id'            => $select_plan,
                        'payment_user_id'            => $user_id,
                        'payment_bank_account_id'    => $select_bank_account,
                        'payment_refund_amount'      => $enter_custom_amount,
                        'payment_date'               => date('Y-m-d', strtotime($enter_custom_date)),
                        'payment_type'               =>'refund',
                        'payment_agreement_sign_name'=>$sign_name,
                        'payment_agreement_service_for'=>$service_for,
                        'payment_prefered_contact'=>implode(',',$prefered_method),
                        'payment_agreement_on_email'=> $email_agreement,
                        'payment_agreement_sign'=>$agreement_signed,
                        'payment_agreement_sign_date'=>$date_of_sign,
                        'payment_one_time'           =>1,
                       );
            }
            else
            {
                $PaymentData= array(  
                        'payment_plan_id'              => $select_plan,
                        'payment_user_id'              => $user_id,
                        'payment_bank_account_id'      => $select_bank_account,
                        'payment_amount'               => $enter_custom_amount,
                        'payment_date'                 => date('Y-m-d', strtotime($enter_custom_date)),
                        'payment_type'                 =>'payable',
                        'payment_agreement_sign_name'  =>$sign_name,
                        'payment_agreement_service_for'=>$service_for,
                        'payment_prefered_contact'     =>implode(',',$prefered_method),
                        'payment_agreement_on_email'   => $email_agreement,
                        'payment_agreement_sign'       =>$agreement_signed,
                        'payment_agreement_sign_date'  =>$date_of_sign,
                        'payment_one_time'             =>1,
                       );
            }  
            $InsertPaymentData = $this->User_model->insertdata('payments',$PaymentData);
            if($email_agreement==1){
               $query_committi_users = $this->User_model->query("SELECT * FROM committi_users WHERE user_login_id= '".$user_id."'");
               $result_committi_users = $query_committi_users->result_array();
               $committi_user=$result_committi_users['0'];

               $bank_account_info=$this->get_bank_info_by_id($select_bank_account);

               $bank_transit= $bank_account_info['bank_account_transit'];
               $bank_inst_name= $bank_account_info['bank_account_nick_name'];
               $bank_inst_no= $bank_account_info['bank_account_institution'];
               $bank_acc= $bank_account_info['bank_account_number'];
               $service_1='';
               $service_2='';
               $prefered_1='';
               $prefered_2='';
               if($service_for==1){
                  $service_1='checked="checked"';
               }
               if($service_for==2){
                  $service_2='checked="checked"';
               }
               if(in_array('1',$prefered_method)){
                $prefered_1='checked="checked"';
               }
                 if(in_array('2',$prefered_method)){
                $prefered_2='checked="checked"';
               }
                $address     = $committi_user['usert_street'].','.$committi_user['user_street_name'].','.$committi_user['user_unit_no'].','.$committi_user['user_provience'].','.$committi_user['user_postal_code'];
                $contact_no = $committi_user['user_phone_no'];
                $name   =   ucwords($session_data['session_data']['first_name'].' '.$session_data['session_data']['last_name']);
                $email  =  $session_data['session_data']['username'];
                $content='';
        $content.='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agreement terms and conditions</title>
    <link rel="stylesheet" href="'.base_url().'assets/bootstrap3/bootstrap.min.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=The+Nautigal&display=swap" rel="stylesheet" type="text/css">
</head>
<style>
label{
    font-weight: 700;
}
.float-right{
    float: right!important;
}
.color_p_tag{
width: 100%;
margin-top: .5rem;
font-size: .875rem;
color: #d26a5c;
}
.color-class{
background: red!important;
color: #ffffff !important;
}
.aggrement-signature {
font-size: 30px;
font-family: "The Nautigal", cursive!important;
margin-top: 20px;
padding-left: 10px;
line-height: 22px;
color: #45464c;
}
.font-normal{
    font-weight:normal!important;
}
.p{
    padding:4px!important;
}
.pb-2{
 padding-bottom:2px!important;
}
.form-control{
min-height:20px;
height: auto;
display: block;
width: 100%;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
border-radius: 4px;
}
.form-group {
margin-left: 0px;
margin-bottom: 15px;
}
.p-3{
    padding:3px;
}
input[type="text"] {
    display: block;
    width: auto;
    height:auto;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.container{
    margin-left:2px!important;
    margin-right:2px!important;
}
.block-content {
    transition: opacity .25s ease-out;
    width: 100%;
    margin: 0 auto;
    padding: 1.25rem 1.25rem 1px;
    overflow-x: visible;
}
.row{
    width:95.5%;
    display:flex;
    flex-direction:row;
    flex:1
}
.mb{
    margin-bottom:4px;
}
mt-4{
    margin-top:4px;
}
body { margin: 0px;}
.col-xs-3 {
    -ms-flex: 0 0 23%;
    flex: 0 0 23%;
    max-width: 23%;
}
.col-xs-6 {
    -ms-flex: 0 0 45%;
    flex: 0 0 45%;
    max-width:45%;
}
</style>
<body>
<div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="'.base_url().'assets/img/logo.jpg" width="133px" class="float-right mb"></div>
                </div><br></br></br><br>
                <h3 class="text-center mt-4">Pre-Authorize Debit (PAD) Agreement</h3>
                <h5 class="text-bold text-center">
                    <span> Committi Account: <span id="agg_bank_account">'.$bank_acc.'
                             </span></span>
                    <span>Statement Balance: $ </span>
                    <span>Due Date: MM / DD / YYYY </span>
                </h5>
                <h6><b class=" text-capitalize">Client’s Name : </b>'.$name.'</h6>
                <h6><b class=" text-capitalize">Address :
                        '.$address.'</b>
                </h6>
                <h6><b class=" text-capitalize">Phone : </b>'.$contact_no.'</h6>
                <h6><b class=" text-capitalize">Email : </b>'.$email.'</h6>
                <p>
                    What Is Your Preferred Contact Method <span style="color:red"> *</span>:
                    <input type="checkbox" name="prefered_contact_method[]" value="1" id="preferred_contact_method_1" '.$prefered_1.'>
                    Phone
                    <input type="checkbox" name="prefered_contact_method[]" class="ml-3" id="preferred_contact_method_2"
                        value="2" '.$prefered_2.'> Email
                </p>
                <h5 class="text-bold">Banking information</h5>
                <div class="row form-group">
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">
                        <label>Branch/Transit#</label>
                        <input type="text" id="bank_transit" class="form-control" value="'. $bank_transit.'" readonly>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">
                        <label>Institution#</label>
                        <input type="text" id="account_inst_no" class="form-control" value="'.$bank_inst_no.'" readonly>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                        <label>Institution Name</label>
                        <input type="text" id="bank_nick" class="form-control" value="'.$bank_inst_name.'" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                        <label>Bank Account#</label>
                        <input type="text" id="account_no" class="form-control" value="'.$bank_acc.'" readonly="">
                    </div>
                </div>
                <p>These service are for (check one) <span style="color:red"> * </span>:
                    <input type="checkbox" name="service_use_for" id="service_use_for_1" class="service_use_for" value="1" '.$service_1.'> Personal

                    <input type="checkbox" name="service_use_for" id="service_use_for_2" class="ml-3 service_use_for" value="2" '.$service_2.'> Business Use
                </p>
                <div id="term_and_conditions">
                    <h5 class="text-bold">Terms & Conditions:</h5>
                    <p>I/we authorize Committi Inc. and its affiliates and agents (collectively "Committi") and the
                        financial institution designated above (or any other financial institution I/we may authorize at
                        any time) to begin deductions as per my/our instructions for payment of regular payments arising
                        under my/our Committi account mentioned above.</p>
                    <p>Regular payments ("PAP") for the full amount of the Committi account will be debited to my/our
                        specified account identified above on the due date of the payment as set out in the
                        statement.<b>The statement for the above Committi account will be available periodically (either
                            weekly, bi-weekly, bi-monthly or monthly) as identified in Committi’s account agreement,
                            withing 24 hours of periodic bidding. I/we hereby waive my/our right to receive
                            pre-notification of the amount of the PAP.</b></p>
                    <p><b>Committi statements will be provided no less than 3 days before any PAP is made.</b></p>
                    <p>For customers which are a corporation or partnership, my/our submission of this authorization by
                        clicking the submit button below will be confirmation that I/we have the authority to bind the
                        corporation or the partnership.</p>
                    <p>This authorization is to remain in effect until Committi has received notification from me/us in
                        writing, via recorded telephone call or via on-line communication (via Committi’s website) to
                        cancel this authorization. Any cancellation will be effective for the first payment to occur
                        more than 5 days after the date the notice of cancellation is received by Committi. I/we may
                        obtain a sample cancellation form to send to Committi, or more information on my/our right to
                        cancel a PAP agreement at my/our financial institution or by visiting<a href="https://www.payments.ca/" target="_blank" style="color:#1737f5!important;">www.payments.ca</a></p>
                    <p>I/we have certain recourse rights if any debit does not comply with this agreement. For example,
                        I/we have the right to receive reimbursement for any debit that is not authorized or is not
                        consistent with this PAD agreement. To obtain a form for a Reimbursement Claim to send to
                        Committi, or for more information on my/our recourse rights, I/we may contact my/our financial
                        institution or visit <a href="https://www.payments.ca/" target="_blank"
                            style="color:#1737f5!important;">www.payments.ca</a></p>
                    <p>Email me the terms of this agreement <span style="color:red"> * </span>:
                        <input type="checkbox" class="email_agreement" id="email_agreement_1" name="email_agreement"
                            value="1" checked="checked"> Yes
                        <input type="checkbox" class="ml-3 email_agreement" id="email_agreement_2"
                            name="email_agreement" value="0"> No
                    </p>
                    <p>*I/We have read and agree to terms and conditions:
                    </p>
                    <div>
                        <h6><b>Signature : </b><span class="aggrement-signature font-normal" id="user_signature">'.$sign_name.'</span>
                        </h6>
                        <h6><b>Print Name: </b><span id="user_name" class="font-normal">'.$sign_name.'</span></h6>
                        <h6><b>Date: </b><span id="user_sign_date" class="font-normal">'.date('m/d/Y H:i:s',strtotime($date_of_sign)).'</span></h6>
                    </div>
                    <p>
                        <b>Committi Contact Information</b><br>Contact us at 1-866-COMMIT0 (1-866-266-6840) during regular business hours or email us at<a href="info@committi.com">info@committi.com</a><br>
                        My Mail:<br>
                        Committi Inc.<br>
                        200E – 141 Brunel Road<br>
                        Mississauga, ON L4Z 1X3<br>
                    </p>
                </div>
            </div>
    <script src="'.base_url().'assets/js/oneui.core.min.js"></script>
</body>

</html>';

$this->load->library('Dpdf');
$pdf = new Dpdf();
$attachment =$pdf->create($content,'bhawana');
$reset_link=base_url();
$message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#110d35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>PAD Agreement Terms and Conditions</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello,<br><br>Hello '.$name.', following are the PAD agreement terms and conditions document attachment.&nbsp;</p><p></p><a href="'.$reset_link.'"  target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color: #110d35;">Click Here To Login</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
$this->email->from('support@committi.com', 'Committi');
$this->email->to($email);
$this->email->bcc('bhawana.wartiz@gmail.com');
$this->email->subject('PAD Agreement Terms  and Condition Document');
$this->email->message($message);
$this->email->attach($attachment,'application/pdf', "PAD_agreement_terms_and_conditions".date("m-d-H-i-s").".pdf",false);
$this->email->set_mailtype('html'); 
$this->email->send();
            }
            echo '1';
        }
    }        

    public function submit_bank_account_ajax()
    {   

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];
        $bank_routing_number         = $this->input->post('bank_routing_number');
        $bank_account_number         = $this->input->post('bank_account_number');
        $bank_account_type           = $this->input->post('bank_account_type');
        $bank_account_name           = $this->input->post('bank_account_name');
        $transit_number             = $this->input->post('transit_number');
        $institution_no             = $this->input->post('institution_no');
        $bank_terms                 = $this->input->post('bank_term_accept');
        $sign_date                  =$this->input->post('sign_hidden_date');
        $sign_name                  = $this->input->post('sign_name');
        if( $bank_routing_number && $bank_account_number && $bank_account_type && $bank_account_name != '')
        {
            $PaymentData= array(  
                                    'bank_account_user_id'                => $user_id,
                                    'bank_account_number'                 => $bank_account_number,
                                    'bank_account_routing_no'             => $bank_routing_number,
                                    'bank_account_type'                   => $bank_account_type,
                                    'bank_account_nickname'               => $bank_account_name,
                                    'bank_account_transit'                => $transit_number,
                                    'bank_account_institution'            => $institution_no,
                                    'bank_terms'                          =>$bank_terms,
                                    'bank_sign'                           =>$sign_name,
                                    'bank_sign_date_time'                 =>$sign_date,
                                   );  
            $InsertPaymentData = $this->User_model->insertdata('bank_accounts',$PaymentData);
            echo '1';
        }
 

    }    



    public function view_statements()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];


        $query_statement_details = $this->User_model->query("SELECT * FROM statements WHERE  statement_user_id= '".$user_id."'");
        if($query_statement_details->num_rows() > 0)
        {
            $result_statement_detail = $query_statement_details->result_array();
            $result_statement_details['result_statement_details']   = $result_statement_detail;

        }
        else
        {
            $result_statement_detail = '';
            $result_statement_details['result_statement_details']   = array();

        }        

        $query_plans = $this->User_model->query("SELECT * FROM plans");
        if($query_plans->num_rows() > 0)
        {
            $result_plan = $query_plans->result_array();
            $result_plans['result_plans']   = $result_plan;

        }
        else
        {
            $result_plan = '';
            $result_plans['result_plans']   = array();

        }



        $data['content'] = $this->load->view('user/view_statements',$session_data+$result_statement_details+$result_plans,true);
        $this->load->view('template/template', $data);


    }    

    public function edit_bank_account()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];

        $bank_account_id = base64_decode($this->uri->segment(2));



        $query_fecth_bank_accounts = $this->User_model->query("SELECT * FROM bank_accounts WHERE bank_account_id = '".$bank_account_id."'");
        if($query_fecth_bank_accounts->num_rows() > 0)
        {
            $reuslt_fetch_bank_accountss = $query_fecth_bank_accounts->result_array();
            $reuslt_fetch_bank_accounts['reuslt_fetch_bank_accounts']   = $reuslt_fetch_bank_accountss['0'];

        }
        else
        {
            $reuslt_fetch_bank_accountss = '';
            $reuslt_fetch_bank_accounts['reuslt_fetch_bank_accounts']   = array();

        }

        $bank_account_id_value['bank_account_id_value']   = $bank_account_id;

        $data['content'] = $this->load->view('user/edit_bank_account',$session_data+$reuslt_fetch_bank_accounts+$bank_account_id_value,true);
        $this->load->view('template/template', $data);


    }

    public function update_bank_account_ajax()
    {   

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];


        $bank_routing_number         = $this->input->post('bank_routing_number');
        $bank_account_number         = $this->input->post('bank_account_number');
        $bank_account_type           = $this->input->post('bank_account_type');
        $bank_account_name           = $this->input->post('bank_account_name');
        $transit_number             = $this->input->post('transit_number');
        $institution_no             = $this->input->post('institution_no');
        $hidden_bank_id             = $this->input->post('hidden_bank_id');

        if( $bank_routing_number && $bank_account_number && $bank_account_type && $bank_account_name != '')
        {

            $UpdateQuery = $this->User_model->query("UPDATE bank_accounts SET bank_account_number ='".$bank_account_number."',bank_account_routing_no ='".$bank_routing_number."',bank_account_type ='".$bank_account_type."',bank_account_nickname ='".$bank_account_name."',bank_account_transit ='".$transit_number."',bank_account_institution ='".$institution_no."' WHERE bank_account_id= '".$hidden_bank_id."'");

            echo '1';
        }
        else
        {
            echo '2';
        }
 

    }   

    public function delete_bank_account_ajax()
    {   

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];

        $hidden_bank_id             = $this->input->post('hidden_bank_id');

        $UpdateQuery = $this->User_model->query("DELETE FROM bank_accounts WHERE bank_account_id= '".$hidden_bank_id."'");

        echo '1';

    }

    public function get_statement_balance_value_on_plan_change()
    {   

        $plan_id             = $this->input->post('plan_id');
        $user_id             = $this->input->post('hidden_user_session_id');

        $query_fecth_statement = $this->User_model->query("SELECT SUM(transaction_debit_amount) as debit , SUM(transaction_credit_amount) as credit FROM transactions WHERE transaction_plan_id = '".$plan_id."' AND transaction_user_id = '".$user_id."'");
        if($query_fecth_statement->num_rows() > 0)
        {
            $reuslt_fetch_statement = $query_fecth_statement->result_array();

            $total = $reuslt_fetch_statement[0]['debit']-$reuslt_fetch_statement[0]['credit'];

        }
        else
        {
            $reuslt_fetch_statement = '';
            $total = '';

        }

        echo number_format($total,2);

    }    

    public function get_statement_due_date()
    {   
        $plan_id             = $this->input->post('plan_id');
        $user_id             = $this->input->post('hidden_user_session_id');
        $query_fecth_statement = $this->User_model->query("SELECT * from statements WHERE statement_plan_id = '".$plan_id."' AND statement_user_id = '".$user_id."'");
        if($query_fecth_statement->num_rows() > 0)
        {
            $reuslt_fetch_statement = $query_fecth_statement->result_array();


            // $date =date('Y-m-d', strtotime($reuslt_fetch_statement[0]['statement_generated_date']. ' + 21 days'));
            $date=$reuslt_fetch_statement[0]['statement_due_date'];
            $due_date = date('m/d/Y',strtotime($date));
            $due_amount = number_format($reuslt_fetch_statement[0]['statement_due_amount'],2);

        }
        else
        {
            $reuslt_fetch_statement = '';
            $due_date = '';
            $due_amount = '';

        }

        $array = array(

            'due_date' => $due_date,
            'due_amount' => $due_amount,
        );

        echo json_encode($array);


    }    

    public function get_next_cycle_date_ajax()
    {   

        $plan_id             = $this->input->post('plan_id');
        $user_id             = $this->input->post('hidden_user_session_id');
        
        $query_fecth_cycles = $this->User_model->query("SELECT * from bidding_schedule  WHERE  bidding_schedule_plan_id = '".$plan_id."'");
        if($query_fecth_cycles->num_rows() > 0)
        {
            $reuslt_fetch_cycles = $query_fecth_cycles->result_array();
        }
        else
        {
            $reuslt_fetch_cycles = '';
        }        

        $query_fecth_cycles_max = $this->User_model->query("SELECT MAX(bidding_cycle_count) as count FROM bidding_schedule  WHERE  bidding_schedule_plan_id = '".$plan_id."'");
        if($query_fecth_cycles_max->num_rows() > 0)
        {
            $reuslt_fetch_cycles_max = $query_fecth_cycles_max->result_array();
        }
        else
        {
            $reuslt_fetch_cycles_max = '';
        }



        if($reuslt_fetch_cycles)
        {
            foreach ($reuslt_fetch_cycles as $key => $reuslt_fetch_cycles_data) 
            {
                # code...
                $today_date     = date('Y-m-d H:i:s');
                $start_date     = $reuslt_fetch_cycles_data['bidding_schedule_date'];
                $end_date       = $reuslt_fetch_cycles_data['bidding_schedule_end_date'];

               // echo '<pre>';
               // print_r($today_date);
               // print_r($start_date);
               // print_r($end_date);
               // echo '</pre>';


                if(($today_date >= $start_date ) && ($today_date <= $end_date))
                {
                    echo $reuslt_fetch_cycles_data['bidding_cycle_count'];

                    break;
                }
                else
                {
                    if($reuslt_fetch_cycles_max)
                    {
                        $maxcount= $reuslt_fetch_cycles_max['0']['count'];
                    }


                    $next_cycle = 3+1;
                    if($maxcount == $next_cycle)
                    {
                        echo $next_cycle;
                        exit;
                    }
                    else
                    {   
                        $next_cycles = $reuslt_fetch_cycles_data['bidding_cycle_count']+1;
                        echo $next_cycles;

                        break;
                    }
                    
                }
            }
        }

    }

  public function getEncryptedPlanId(){
      $plan_id=$this->input->post('plan_id');
      $new_plan_id=base64_encode($plan_id);
      echo $new_plan_id;
  }

////////////////////////Place win bid if time expire////////////////////////////////////

public function timer_expire_bid(){
         
          $user_id=$this->input->post('bidding_user_id');
          $bidding_cycle_count=$this->input->post('bidding_cycle_count');
          $bidding_plan_id=$this->input->post('bidding_plan_id');
          $bidding_place_bid_date=date('Y-m-d H:i:s');
          



           $fetch_bidding_details=$this->User_model->query("select * from bidding_details where bidding_plan_id='".$bidding_plan_id."' and bidding_cycle_count='".$bidding_cycle_count."' and bidding_low_bid_check='1' order by bidding_details_id DESC limit 1");

            if($fetch_bidding_details->num_rows()>0)
            {
               $fetch_bidding_result=$fetch_bidding_details->result_array();

               $new_user_id=$fetch_bidding_result[0]['bidding_user_id'];

               $bidding_id=$fetch_bidding_result[0]['bidding_details_id'];

               $bidding_current_bid_amount=$fetch_bidding_result[0]['bidding_place_bid_amount'];


            $query_Fetch_User = $this->User_model->query("SELECT * FROM user_application WHERE u_id= '".$new_user_id."' AND user_application_plan_id = '".$bidding_plan_id."'");
            if($query_Fetch_User->num_rows() > 0)
            {
                $result_FetchUser = $query_Fetch_User->result_array();
            }
            else
            {
                $result_FetchUser = '';
            }

            $query_Check_Win_bid_exist = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$bidding_plan_id."' and bidding_cycle_count='".$bidding_cycle_count."'");
           if($query_Check_Win_bid_exist->num_rows() > 0)
            {
                $result_WinbidExist = $query_Check_Win_bid_exist->result_array();
                $UpdateQueryNotaWinCheck = $this->User_model->query("UPDATE bidding_details SET bidding_not_a_winner_check ='1' WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' AND  bidding_user_id != '".$new_user_id."' AND bidding_cycle_count='".$bidding_cycle_count."'");


                $data =array(

                'bidding_plan_id'                        => $this->input->post('bidding_plan_id'),
                'bidding_user_id'                        => $new_user_id,
                'bidding_place_bid_date'                 => $bidding_place_bid_date,
                'bidding_place_bid_amount'               => $bidding_current_bid_amount,
                'bidding_bidder_first_name'              => $result_FetchUser['0']['user_application_first_name'],
                'bidding_bidder_last_name'               => $result_FetchUser['0']['user_application_last_name'],
                'bidding_check_winning_bid'              => '1',
                'bidding_cycle_count'                    =>$bidding_cycle_count,
                );

            $win_bid_check_array = array();
            foreach ($result_WinbidExist as $key => $value) 
            {
                 $win_bid_check_array[$key] = $value['bidding_check_winning_bid'];
            }
            $win_bid_check_array;

            if( in_array( "1" ,$win_bid_check_array ) )
            {
                // echo "1";
                 $first_name1=ucfirst($result_FetchUser['0']['user_application_first_name']);
                $last_name1=ucfirst($result_FetchUser['0']['user_application_last_name']);

                $len = strlen($first_name1);
                $first_name2 = '';
                for($i=0; $i < $len; $i++) {
                if($i != 0) {
                $first_name2.= '*';
                } else {
                $first_name2 .= $first_name1[$i];
                }
                }

                $len = strlen($last_name1);
                $last_name2 = '';
                for($i=0; $i < $len; $i++) {
                if($i != 0) {
                $last_name2.= '*';
                } else {
                $last_name2 .= $last_name1[$i];
                }
                }


                 $winner_name_for_other=$first_name2.' '.$last_name2;
                 
                 ///send  Ajax Response
                 $bid_details_info_array=array(

                 'bidding_cycle_count'     =>$bidding_cycle_count,
                 'winner_name_winner'      =>$first_name1.' '.$last_name1,
                 'winner_name_for_other'   =>$winner_name_for_other,
                 'bidding_place_bid_amount'=> number_format($bidding_current_bid_amount,2),
                 'user_id'                 => $new_user_id,

                );
                echo json_encode($bid_details_info_array);


            }
            else
            {
                $insertPlanData = $this->User_model->insertdata('bidding_details',$data);


                $first_name1=ucfirst($result_FetchUser['0']['user_application_first_name']);
                $last_name1=ucfirst($result_FetchUser['0']['user_application_last_name']);

                $len = strlen($first_name1);
                $first_name2 = '';
                for($i=0; $i < $len; $i++) {
                if($i != 0) {
                $first_name2.= '*';
                } else {
                $first_name2 .= $first_name1[$i];
                }
                }

                $len = strlen($last_name1);
                $last_name2 = '';
                for($i=0; $i < $len; $i++) {
                if($i != 0) {
                $last_name2.= '*';
                } else {
                $last_name2 .= $last_name1[$i];
                }
                }


                 $winner_name_for_other=$first_name2.' '.$last_name2;
                 
                 ///send  Ajax Response
                 $bid_details_info_array=array(

                 'bidding_cycle_count'     =>$bidding_cycle_count,
                 'winner_name_winner'      =>$first_name1.' '.$last_name1,
                 'winner_name_for_other'   =>$winner_name_for_other,
                 'bidding_place_bid_amount'=> number_format($bidding_current_bid_amount,2),
                 'user_id'                 => $new_user_id,

                );

                  
                $UpdateQuery = $this->User_model->query("UPDATE plans SET plan_win_bid_check ='1' WHERE id ='".$bidding_plan_id."'");


                $query_Fetch_bid_cycle = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' AND bidding_check_winning_bid = '1' and bidding_cycle_count='".$bidding_cycle_count."'");
                if($query_Fetch_bid_cycle->num_rows() > 0)
                {
                    $result_FetchUser_bid_cycle = $query_Fetch_bid_cycle->result_array();
                    $bid_cycle_win_count= $result_FetchUser_bid_cycle['0']['bidding_cycle_count'];
                }
                else
                {
                    $result_FetchUser_bid_cycle = '';
                    $bid_cycle_win_count ='';
                }


                $UpdateQuery = $this->User_model->query("UPDATE bidding_schedule SET bidding_cycle_winner_f ='".$result_FetchUser['0']['user_application_first_name']."' ,bidding_cycle_winner_l ='".$result_FetchUser['0']['user_application_last_name']."' , bidding_cycle_win_amount = '".$bidding_current_bid_amount."' , bidding_cycle_win_bid_check = '1',bidding_status='bid_over' WHERE bidding_schedule_plan_id ='".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$bid_cycle_win_count."'");
                  
                   echo json_encode($bid_details_info_array);
            }
        }
        else
        {

            $result_WinbidExist = '';
                $data = array(

                'bidding_plan_id'                        => $this->input->post('bidding_plan_id'),
                'bidding_user_id'                        => $new_user_id,
                'bidding_place_bid_date'                 => $bidding_place_bid_date,
                'bidding_place_bid_amount'               => $bidding_current_bid_amount,
                'bidding_bidder_first_name'              => $result_FetchUser['0']['user_application_first_name'],
                'bidding_bidder_last_name'               =>  $result_FetchUser['0']['user_application_last_name'],
                'bidding_check_winning_bid'              =>  '1',
                'bidding_cycle_count'                    =>$bidding_cycle_count,
            );

                $insertPlanData = $this->User_model->insertdata('bidding_details',$data);



                $first_name1=ucfirst($result_FetchUser['0']['user_application_first_name']);
                $last_name1=ucfirst($result_FetchUser['0']['user_application_last_name']);

                $len = strlen($first_name1);
                $first_name2 = '';
                for($i=0; $i < $len; $i++) {
                if($i != 0) {
                $first_name2.= '*';
                } else {
                $first_name2 .= $first_name1[$i];
                }
                }

                $len = strlen($last_name1);
                $last_name2 = '';
                for($i=0; $i < $len; $i++) {
                if($i != 0) {
                $last_name2.= '*';
                } else {
                $last_name2 .= $last_name1[$i];
                }
                }


                 $winner_name_for_other=$first_name2.' '.$last_name2;
                 
                 ///send  Ajax Response
                 $bid_details_info_array=array(

                 'bidding_cycle_count'     =>$bidding_cycle_count,
                 'winner_name_winner'      =>$first_name1.' '.$last_name1,
                 'winner_name_for_other'   =>$winner_name_for_other,
                 'bidding_place_bid_amount'=> number_format($bidding_current_bid_amount,2),
                 'user_id'                 => $new_user_id,

                );


                $UpdateQuery = $this->User_model->query("UPDATE plans SET plan_win_bid_check ='1' WHERE id ='".$this->input->post('bidding_plan_id')."'");

                $query_Fetch_bid_cycle = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$this->input->post('bidding_plan_id')."' AND bidding_check_winning_bid = '1' AND bidding_cycle_count='".$bidding_cycle_count."'");
                if($query_Fetch_bid_cycle->num_rows() > 0)
                {
                    $result_FetchUser_bid_cycle = $query_Fetch_bid_cycle->result_array();

                    $bid_cycle_win_count= $result_FetchUser_bid_cycle['0']['bidding_cycle_count'];
                }
                else
                {
                    $result_FetchUser_bid_cycle = '';
                    $bid_cycle_win_count ='';
                }


                $UpdateQuery = $this->User_model->query("UPDATE bidding_schedule SET bidding_cycle_winner_f ='".$result_FetchUser['0']['user_application_first_name']."' ,bidding_cycle_winner_l ='".$result_FetchUser['0']['user_application_last_name']."' , bidding_cycle_win_amount = '".$bidding_current_bid_amount."' , bidding_cycle_win_bid_check = '1',bidding_status='bid_over' WHERE bidding_schedule_plan_id ='".$this->input->post('bidding_plan_id')."' AND bidding_cycle_count = '".$bid_cycle_win_count."'");

                echo json_encode($bid_details_info_array);
        }
  
    }

}



function checkBiddingDetailsTable(){
    $bidding_cycle_count=$this->input->post('bidding_cycle_count');
    $bidding_user_id=$this->input->post('bidding_user_id');
    $bidding_plan_id=$this->input->post('bidding_plan_id');

    $check_bidding_table=$this->User_model->query("select * from bidding_details where $bidding_cycle_count='".$bidding_cycle_count."' and bidding_plan_id='".$bidding_plan_id."' order by bidding_details_id DESC limit 1");
    if($check_bidding_table->num_rows()>0){
        $result_data=$check_bidding_table->result_array();

        if($result_data[0]['bidding_user_id']==$bidding_user_id && $result_data[0]['bidding_low_bid_check']=='1'){
            echo '1';
        } else if($result_data[0]['bidding_user_id']==$bidding_user_id && $result_data[0]['bidding_check_winning_bid']=='1'){
            echo '2';
        }else {
            echo '3';
        }
    }
}



 public function check_user_already_winner_or_not()
    {   
        $bidding_plan_id   = $this->input->post('bidding_plan_id');
        $user_id  = $this->session->userdata('id');
        $query_bidding_details = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_check_winning_bid = '1' and bidding_user_id= '".$user_id."' and bidding_plan_id='".$bidding_plan_id."'");
        if($query_bidding_details->num_rows() > 0)
        {
            echo '1';
        }
        else
        {
            echo '2';
        }
    } 

    function show_winner_info_to_other_plan_user(){

        $bidding_cycle_count=$this->input->post('bidding_cycle_count');
        $bidding_plan_id=$this->input->post('bidding_plan_id');

        $query_bidding_details = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_check_winning_bid='1' and bidding_cycle_count= '".$bidding_cycle_count."' and bidding_plan_id='".$bidding_plan_id."'");
        if($query_bidding_details->num_rows() > 0)
        {
            $result_bidding_details=$query_bidding_details->result_array();
                $first_name1=ucfirst($result_bidding_details['0']['bidding_bidder_first_name']);
                 $last_name1=ucfirst($result_bidding_details['0']['bidding_bidder_last_name']);

                                $len = strlen($first_name1);
                                $first_name2 = '';
                                for($i=0; $i < $len; $i++) {
                                if($i != 0) {
                                $first_name2.= '*';
                                } else {
                                $first_name2 .= $first_name1[$i];
                                }
                                }

                                $len = strlen($last_name1);
                                $last_name2 = '';
                                for($i=0; $i < $len; $i++) {
                                if($i != 0) {
                                $last_name2.= '*';
                                } else {
                                $last_name2 .= $last_name1[$i];
                                }
                                }


                 $winner_name_for_other=$first_name2.' '.$last_name2;
                 
                 ///send  Ajax Response
                 $bid_details_info_array=array(

                 'bidding_cycle_count'     =>$bidding_cycle_count,
                 'winner_name_for_other'   =>$winner_name_for_other,
                 'winner_name_winner'      =>$first_name1.' '.$last_name1,
                 'bidding_place_bid_amount'=> number_format($result_bidding_details['0']['bidding_place_bid_amount'],2),
                 'user_id'                 => $result_bidding_details[0]['bidding_user_id'],
                );
                 echo json_encode($bid_details_info_array);
        }else
        {
            echo '0';
        }     
    } 


    public function check_next_bidding_cycle(){
        $bidding_cycle_count=$this->input->post('bidding_cycle_count');
        $plan_id=$this->input->post('bidding_plan_id');
        $check_next_cycle_details=$this->User_model->query("select * from bidding_schedule where bidding_schedule_plan_id='".$plan_id."' and bidding_cycle_count='".$bidding_cycle_count."'");
        if($check_next_cycle_details->num_rows()>0){
            $result=$check_next_cycle_details->result_array();
            $dates_array=array(
            'bidding_start_date'   => $result[0]['bidding_schedule_date'],
            'bidding_end_date'     => $result[0]['bidding_schedule_end_date'],
           );
            echo json_encode($dates_array);
        }
    }
    public function check_bidding_status(){
        $bidding_schedule_plan_id=$this->input->post("bidding_plan_id");
        $bidding_cycle_count=$this->input->post("bidding_cycle_count");
        $current_date=date('Y-m-d H:i:s');

        $check_bidding_statuss=$this->User_model->query("select * from bidding_schedule where bidding_schedule_plan_id='".$bidding_schedule_plan_id."' and bidding_cycle_count='".$bidding_cycle_count."' and bidding_schedule_date < '".date('Y-m-d H:i:s')."' and bidding_schedule_end_date < '".date('Y-m-d H:i:s')."'");
        if($check_bidding_statuss->num_rows()>0){
            echo 'bid_over';
        }
    }

    public function getServerDateTime(){
        echo date('Y-m-d H:i:s');
    }
    public function getServerDateTime_1(){
        $data['date']=date('Y-m-d H:i:s');
        $data['date_format']=date('m/d/Y H:i:s');
        echo json_encode($data);
    }
      public function get_bank_info_by_id($bank_acc_id){
        $result='0';
        $get_bank = $this->User_model->query("SELECT * FROM bank_accounts WHERE bank_account_id = '".$bank_acc_id."'");
        if($get_bank->num_rows() > 0)
        {
            $get_bank =$get_bank->result_array();
            $result=$get_bank[0];
        }
        return $result;
    }
    public function ajax_get_bank_info_by_id(){
        $bank_acc_id=$this->input->post('bank_acc_id');
        $result=$this->get_bank_info_by_id($bank_acc_id);
        echo json_encode($result);
    }
    public function testt(){
        $content='';
        $content.='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agreement terms and conditions</title>
    <link rel="stylesheet" href="'.base_url().'assets/bootstrap3/bootstrap.min.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=The+Nautigal&display=swap" rel="stylesheet" type="text/css">
</head>
<style>
label{
    font-weight: 700;
}
.float-right{
    float: right!important;
}
.color_p_tag{
width: 100%;
margin-top: .5rem;
font-size: .875rem;
color: #d26a5c;
}
.color-class{
background: red!important;
color: #ffffff !important;
}
.aggrement-signature {
font-size: 30px;
font-family: "The Nautigal", cursive!important;
margin-top: 20px;
padding-left: 10px;
line-height: 22px;
color: #45464c;
}
.font-normal{
    font-weight:normal!important;
}
.p{
    padding:4px!important;
}
.pb-2{
 padding-bottom:2px!important;
}
.form-control{
min-height:20px;
height: auto;
display: block;
width: 100%;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
border-radius: 4px;
}
.form-group {
margin-left: 0px;
margin-bottom: 15px;
}
.p-3{
    padding:3px;
}
input[type="text"] {
    display: block;
    width: auto;
    height:auto;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.container{
    margin-left:2px!important;
    margin-right:2px!important;
}
.block-content {
    transition: opacity .25s ease-out;
    width: 100%;
    margin: 0 auto;
    padding: 1.25rem 1.25rem 1px;
    overflow-x: visible;
}
.row{
    width:95.5%;
    display:flex;
    flex-direction:row;
    flex:1
}
.mb{
    margin-bottom:4px;
}
mt-4{
    margin-top:4px;
}
body { margin: 0px;}
.col-xs-3 {
    -ms-flex: 0 0 23%;
    flex: 0 0 23%;
    max-width: 23%;
}
.col-xs-6 {
    -ms-flex: 0 0 45%;
    flex: 0 0 45%;
    max-width:45%;
}
</style>
<body>
<div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <img src="http://committi.com/assets/img/logo.jpg" width="133px" class="float-right mb"></div>
                </div><br></br></br><br>
                <h3 class="text-center mt-4">Pre-Authorize Debit (PAD) Agreement</h3>
                <h5 class="text-bold text-center">
                    <span> Committi Account: <span id="agg_bank_account">
                            111111111111 </span></span>
                    <span>Statement Balance: $ </span>
                    <span>Due Date: MM / DD / YYYY </span>
                </h5>

                <h6><b class=" text-capitalize">Client’s Name : </b>Lovepreet Parmar</h6>
                <h6><b class=" text-capitalize">Address :
                        60 ,Downtown,12,2,A7a 7d7</b>
                </h6>
                <h6><b class=" text-capitalize">Phone : </b>(231) 231-2312</h6>
                <h6><b class=" text-capitalize">Email : </b>lovepreet.wartiz@gmail.com</h6>
                <p>
                    What Is Your Preferred Contact Method <span style="color:red"> *</span>:
                    <input type="checkbox" name="prefered_contact_method[]" value="1" id="preferred_contact_method_1">
                    Phone
                    <input type="checkbox" name="prefered_contact_method[]" class="ml-3" id="preferred_contact_method_2"
                        value="2"> Email
                </p>
                <h5 class="text-bold">Banking information</h5>
                <div class="row form-group">
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">
                        <label>Branch/Transit#</label>
                        <input type="text" id="bank_transit" class="form-control" value="" readonly>
                    </div>
                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">
                        <label>Institution#</label>
                        <input type="text" id="account_inst_no" class="form-control" value="" readonly>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                        <label>Institution Name</label>
                        <input type="text" id="bank_nick" class="form-control" value="" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                        <label>Bank Account#</label>
                        <input type="text" id="account_no" class="form-control" value="" readonly="">
                    </div>
                </div>
                <p>These service are for (check one) <span style="color:red"> * </span>:
                    <input type="checkbox" name="service_use_for" id="service_use_for_1" class="service_use_for" value="1"> Personal
                    <input type="checkbox" name="service_use_for" id="service_use_for_2" class="ml-3 service_use_for" value="2"> Business Use
                </p>
                <div id="term_and_conditions">
                    <h5 class="text-bold">Terms & Conditions:</h5>
                    <p>I/we authorize Committi Inc. and its affiliates and agents (collectively "Committi") and the
                        financial institution designated above (or any other financial institution I/we may authorize at
                        any time) to begin deductions as per my/our instructions for payment of regular payments arising
                        under my/our Committi account mentioned above.</p>

                    <p>Regular payments ("PAP") for the full amount of the Committi account will be debited to my/our
                        specified account identified above on the due date of the payment as set out in the
                        statement.<b>The statement for the above Committi account will be available periodically (either
                            weekly, bi-weekly, bi-monthly or monthly) as identified in Committi’s account agreement,
                            withing 24 hours of periodic bidding. I/we hereby waive my/our right to receive
                            pre-notification of the amount of the PAP.</b></p>
                    <p><b>Committi statements will be provided no less than 3 days before any PAP is made.</b></p>
                    <p>For customers which are a corporation or partnership, my/our submission of this authorization by
                        clicking the submit button below will be confirmation that I/we have the authority to bind the
                        corporation or the partnership.</p>
                    <p>This authorization is to remain in effect until Committi has received notification from me/us in
                        writing, via recorded telephone call or via on-line communication (via Committi’s website) to
                        cancel this authorization. Any cancellation will be effective for the first payment to occur
                        more than 5 days after the date the notice of cancellation is received by Committi. I/we may
                        obtain a sample cancellation form to send to Committi, or more information on my/our right to
                        cancel a PAP agreement at my/our financial institution or by visiting <a
                            href="https://www.payments.ca/" target="_blank"
                            style="color:#1737f5!important;">www.payments.ca</a></p>
                    <p>I/we have certain recourse rights if any debit does not comply with this agreement. For example,
                        I/we have the right to receive reimbursement for any debit that is not authorized or is not
                        consistent with this PAD agreement. To obtain a form for a Reimbursement Claim to send to
                        Committi, or for more information on my/our recourse rights, I/we may contact my/our financial
                        institution or visit <a href="https://www.payments.ca/" target="_blank"
                            style="color:#1737f5!important;">www.payments.ca</a></p>
                    <p>Email me the terms of this agreement <span style="color:red"> * </span>:
                        <input type="checkbox" class="email_agreement" id="email_agreement_1" name="email_agreement"
                            value="1"> Yes
                        <input type="checkbox" class="ml-3 email_agreement" id="email_agreement_2"
                            name="email_agreement" value="0"> No
                    </p>
                    <p>*I/We have read and agree to terms and conditions:
                    </p>
                    <div>
                        <h6><b>Signature : </b><span class="aggrement-signature font-normal" id="user_signature">bhawana</span>
                        </h6>
                        <h6><b>Print Name: </b><span id="user_name" class="font-normal"></span></h6>
                        <h6><b>Date: </b><span id="user_sign_date" class="font-normal"></span></h6>
                    </div>
                    <p>
                        <b>Committi Contact Information</b><br>
                        Contact us at 1-866-COMMIT0 (1-866-266-6840) during regular business hours or email us at
                        <a href="info@committi.com">info@committi.com</a><br>
                        My Mail:<br>
                        Committi Inc.</br>
                        200E – 141 Brunel Road</br>
                        Mississauga, ON L4Z 1X3<br>
                    </p>
                </div>
            </div>
    <script src="'.base_url().'assets/js/oneui.core.min.js"></script>
</body>

</html>';

$this->load->library('Dpdf');
$pdf = new Dpdf();
$attachment =$pdf->create($content,'bhawana');
$reset_link=base_url();
$message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#110d35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Signup Invite</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello,<br><br>Hello Bhawana, following are the terms and coditions document attachment.&nbsp;</p><p></p><a href="'.$reset_link.'"  target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color: #110d35;">Click Here To Login</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
 $this->email->from('support@committi.com', 'Committi');
$this->email->to('bhawana.wartiz@gmail.com');
$this->email->subject('Terms  and Condition Document');
$this->email->message($message);
$this->email->attach($attachment,'application/pdf', "PAD_agreement_terms_and_conditions".date("m-d-H-i-s").".pdf",false);
$this->email->set_mailtype('html'); 
$this->email->send(); 
    }

    public function pad_settings(){  
        $where['u_id']                                    =$this->session->userdata('id');
        $where['user_application_plan_id']                =$this->input->post('pad_select_plan');
        $update['user_application_payment_type']          =$this->input->post('pad_payment_type');
        $update['user_application_pad_terms_check']       =$this->input->post('pad_setting_check');
        $update['user_application_bank_id']               =$this->input->post('pad_select_bank_account');
        $update['user_application_pad_status']            =1;
        $update['user_application_pad_start_date']        =date('Y-m-d h:i:s');
        $this->User_model->updatedata('user_application',$where,$update);
        
        $plan_data         =$this->common_get_plan_by_id($this->input->post('pad_select_plan'));
        $bank_account_info  =$this->common_get_bank_by_id($this->input->post('pad_select_bank_account'));

        $pad_history=array(
          'pad_bank_account'           =>  $bank_account_info['bank_account_number'],
          'pad_plan_name'              =>  $plan_data['plan_name'],
          'pad_plan_id'                =>  $this->input->post('pad_select_plan'),
          'pad_start_date'             =>  date('Y-m-d H:i:s'),
          'pad_bank_acc_id'            =>  $this->input->post('pad_select_bank_account'),
          'pad_user_id'                =>  $this->session->userdata('id'),
        );
        $this->User_model->insertdata('pad_agreement_history',$pad_history);
        echo '1';
   }
   public function pad_settings_deactivate_old(){
    $where['u_id']                                    =$this->session->userdata('id');
    $where['user_application_plan_id']                =$this->input->post('pad_select_plan');
    $update['user_application_pad_status']            =0;
    $update['user_application_pad_start_date']        ='';
    $this->User_model->updatedata('user_application',$where,$update);
    $plan_data         =$this->common_get_plan_by_id($this->input->post('pad_select_plan'));
    $bank_account_info  =$this->common_get_bank_by_id($this->input->post('pad_select_bank_account'));
    $pad_history=array(
        'pad_bank_account'           =>  $bank_account_info['bank_account_number'],
        'pad_plan_name'              =>  $plan_data['plan_name'],
        'pad_plan_id'                =>  $this->input->post('pad_select_plan'),
        'pad_start_date'             =>  date('Y-m-d H:i:s'),
        'pad_deactivate_date'       =>   date('Y-m-d H:i:s'),
        'pad_bank_acc_id'            =>  $this->input->post('pad_select_bank_account'),
        'pad_user_id'                =>  $this->session->userdata('id'),
        );
        $this->User_model->insertdata('pad_agreement_history',$pad_history);
       echo '1';
   }
   public function update_pad_settings(){
    $user_application_id    = $this->input->post('user_application_id');
    $bank_id                = $this->input->post('edit_pad_set_bank');
    $user_application_info  = $this->common_get_user_app_by_id($user_application_id);
    $where['u_id']                                    = $this->session->userdata('id');
    $where['a_id']                                    = $user_application_id;
    $update['user_application_pad_start_date']        = date('Y-m-d h:i:s');
    $update['user_application_bank_id']               = $bank_id;
    $this->User_model->updatedata('user_application',$where,$update);
    $bank_account_info  =$this->common_get_bank_by_id($bank_id);
    $pad_history=array(
        'pad_bank_account'           =>  $bank_account_info['bank_account_number'],
        'pad_plan_name'              =>  $user_application_info['user_application_plan_name'],
        'pad_plan_id'                =>  $user_application_info['user_application_plan_id'],
        'pad_start_date'             =>  date('Y-m-d H:i:s'),
        'pad_bank_acc_id'            =>  $bank_id,
        'pad_user_id'                =>  $this->session->userdata('id'),
        );
        $this->User_model->insertdata('pad_agreement_history',$pad_history);
        echo '1';
   }
   public function pad_settings_deactivate(){
    $user_application_id    = $this->input->post('user_application_id');
    $user_application_info  = $this->common_get_user_app_by_id($user_application_id);
    $where['u_id']                                    = $this->session->userdata('id');
    $where['a_id']                                    = $user_application_id;
    $update['user_application_pad_status']            = 0;
    $update['user_application_pad_start_date']        ='';
    $update['user_application_payment_type']          =1;
    $update['user_application_pad_terms_check']       =0;
    $update['user_application_bank_id']               ='';
    $this->User_model->updatedata('user_application',$where,$update);
    $bank_account_info  =$this->common_get_bank_by_id( $user_application_info['user_application_bank_id']);
    $pad_history=array(
        'pad_bank_account'           =>  $bank_account_info['bank_account_number'],
        'pad_plan_name'              =>  $user_application_info['user_application_plan_name'],
        'pad_plan_id'                =>  $user_application_info['user_application_plan_id'],
        'pad_start_date'             =>  $user_application_info['user_application_pad_start_date'],
        'pad_deactivate_date'       =>   date('Y-m-d H:i:s'),
        'pad_bank_acc_id'            =>  $user_application_info['user_application_bank_id'],
        'pad_user_id'                =>  $this->session->userdata('id'),
        );
        $this->User_model->insertdata('pad_agreement_history',$pad_history);
       echo '1';
   }
   public function user_get_pad_agg_info(){
    $where['u_id'] =$this->session->userdata('id');
    $where['user_application_plan_id'] =$this->input->post('plan_id');
    $user_app_data=$this->User_model->select_where('user_application',$where);
    if($user_app_data->num_rows()>0){
       $result=$user_app_data->result_array();
       $new_result=array(
                    'payment_type'  => $result[0]['user_application_payment_type'],
                    'status'        => str_replace('null',0,$result[0]['user_application_pad_status']),
                    'bank_id'       => $result[0]['user_application_bank_id'],
                    'term'          => $result[0]['user_application_pad_terms_check'],
                );
        echo json_encode($new_result);
    }else{
        echo '0';
    }
   }

   public function email_test(){
        $this->email->from('support@committi.com', 'Committi');
        $this->email->to('bhawana.wartiz@gmail.com');
        $this->email->subject('STATEMENT');
        $this->email->message('Hi this email is for testing purpose only');
        $this->email->set_mailtype('html');
       if($this->email->send()){
   //Success email Sent
   echo $this->email->print_debugger();
}else{
   //Email Failed To Send
   show_error($this->email->print_debugger());
}

   }
}
    
