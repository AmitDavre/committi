<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    // branch 1 commit
    /**
     * Index Page for this controll
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

     
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
          'smtp_pass' => 'sdasdas',
          'mailtype'  => 'html', 
          'charset'   => 'iso-8859-1'
      );


        $this->load->library('email',$config);

    }

public function session_data_recursive()
{
    $result = '';
    $id = $session_data['session_data']=$this->session->userdata('id');
    $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
    if($query->num_rows() > 0)
    {
        $result = $query->result_array();
    }
    return $result;
}
public function application_review()
{

    $id=$this->session->userdata('id');
    $check_tab_rights=$this->checkRights('Application Review',$id);
    $rights=array();
    if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
    } else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
        $rights['view_right']=$check_tab_rights[0]['view_right'];
        $rights['edit_right']=$check_tab_rights[0]['edit_right'];
        $rights['all_rights']=$check_tab_rights[0]['all_rights'];
    }
    $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
    if($query->num_rows() > 0)
    {
        $result = $query->result_array();
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
    ///////////////////FETCH THE DETAILS FROM USER APPLICATION TABLE/////////////////
    if(isset($_POST['filter_submit']))
    {
        if($this->input->post('from_filter_date') !='')
        {
            $fromDate   = $this->input->post('from_filter_date');
            $todaTe     = $this->input->post('to_filter_date');
            // $applicationStatus     = $this->input->post('to_filter_date');

            $convertFromDate= date('Y-m-d', strtotime($fromDate));
            $convertToDate= date('Y-m-d', strtotime($todaTe));

            $_SESSION['fromdateapplicationreview'] = $fromDate;
            $_SESSION['todateapplicationreview'] = $todaTe;


            $query_application = $this->User_model->query("SELECT * FROM user_application WHERE user_application_posted_date BETWEEN '".$convertFromDate."' AND '".$convertToDate."'");

        }
        else
        {
            // erro mesage
             redirect(base_url() .'application-review');
        }
    }
    else
    {
        $query_application = $this->User_model->query("SELECT * FROM user_application ");
    }

    if($query_application->num_rows() > 0)
    {
        $result_application = $query_application->result_array();
    }
    else
    {
        $result_application = '';
    }

    $user_application['user_application']=$result_application;

    ///////////////////FETCH THE DETAILS FROM USER APPLICATION TABLE ENDS/////////////////

    $data['content'] = $this->load->view('admin/application_review',$session_data+$user_application+$rights,true);
    $this->load->view('template/template', $data);
}
/////////////////////////////////////// APPLICATION REVIEW END //////////////////////////////////////////////////////////////////////

public function generate_key($length){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
}

//////////////////////////////  REVIEW EACH APPLICATION STARTS /////////////////////////////////////////////////////////////

public function review_application()
{
    $id =$this->session->userdata('id');
    $check_tab_rights=$this->checkRights('Application Review',$id);
    if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
    }
    ob_start();
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
    ob_start();
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

    $url_data       = $this->uri->segment(2);                   // FETCHING VALUE FROM URL 
    $url_plan_id    = $this->uri->segment(3);                   // FETCHING VALUE FROM URL 

    ///////////////////FETCH THE DETAILS FROM USER APPLICATION TABLE/////////////////
    $query_application = $this->User_model->query("SELECT * FROM user_application WHERE u_id ='".$url_data."' AND user_application_plan_id = '".$url_plan_id."'");
    if($query_application->num_rows() > 0)
    {
        $result_application = $query_application->result_array();
        $user_application['user_application']=$result_application['0'];

    }
    else
    {
        $result_application = '';
        $user_application['user_application']=array();

    }

    $query_application_plan = $this->User_model->query("SELECT * FROM plans WHERE id = '".$url_plan_id."'");
    if($query_application_plan->num_rows() > 0)
    {
        $result_application_plan = $query_application_plan->result_array();
        $user_application_plan['user_application_plan']=$result_application_plan['0'];

    }
    else
    {
        $result_application_plan = '';
        $user_application_plan['user_application_plan']=array();

    }

    $plans_details = $this->User_model->query("SELECT * FROM plans ");
    if($plans_details->num_rows() > 0)
    {
        $result_plans_details = $plans_details->result_array();
        $plan_details['plan_details']=$result_plans_details;

    }
    else
    {
        $result_plans_details = '';
        $plan_details['plan_details']=array();

    }

    $session_data['session_data']=$result['0'];


    ///////////////////FETCH THE DETAILS FROM USER APPLICATION TABLE ENDS/////////////////

    if(isset($_POST['submit']))
    {
           if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1'))
           {
            redirect(base_url() . 'dashboard');
           } else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
           if($check_tab_rights[0]['all_rights']==0 && $check_tab_rights[0]['edit_right']==0)
           redirect(base_url() . 'dashboard');
          }
        // FETCH DATA FROM INPUT FIELDS 
        $u_id                                   =  $this->input->post('hidden_u_id');
        $user_application_first_name            =  $this->input->post('user_first_name');
        $user_application_middle_name           =  $this->input->post('user_middle_name');
        $user_application_last_name             =  $this->input->post('user_last_name');
        $user_application_gender                =  $this->input->post('user_gender');
        $user_application_sin                   =  $this->input->post('user_sin');
        $user_application_dob                   =  date('Y-m-d',strtotime($this->input->post('user_date_of_birth')));
        $usert_application_street               =  $this->input->post('user_street');
        $user_application_street_name           =  $this->input->post('user_street_name');
        $user_application_unit_no               =  $this->input->post('user_suite');
        $user_application_provience             =  $this->input->post('user_provience');
        $user_application_postal_code           =  $this->input->post('user_postal_code');
        $user_application_phone_no              =  $this->input->post('user_phone_number');
        $user_application_email                 =  $this->input->post('user_email_address');
        $user_application_employment_status     =  $this->input->post('user_employment_status');
        $user_application_gross_income          =  $this->input->post('user_annual_income');
        $user_application_household_income      =  $this->input->post('user_household_income');
        $user_application_residential_status    =  $this->input->post('user_residential');
        $user_application_planning              =  $this->input->post('user_funds');
        $user_application_fund_time             =  $this->input->post('user_funds_time');
        $user_application_tier                  =  $this->input->post('user_application_tier');
        $user_application_no_bidding_cycle      =  $this->input->post('user_application_no_bidding');
        $hidden_user_application_plan_id        =  $this->input->post('hidden_user_application_plan_id');
        $user_restriction_level                 =  $this->input->post('user_restriction_level');
       // UPDATE DATA IN USERS TABLE 
        $UpdateUserData = $this->User_model->query("UPDATE users SET first_name ='".$user_application_first_name."',middle_name ='".$user_application_middle_name."',last_name ='".$user_application_last_name."',username ='".$user_application_email."',dob='".$user_application_dob."' WHERE id= '".$u_id."'");
        // UPDATE DATA IN COMMITTI_USERS TABLE 

          $UpdateCommittiUserData= $this->User_model->query("UPDATE committi_users SET user_first_name ='".$user_application_first_name."',user_middle_name ='".$user_application_middle_name."',user_last_name ='".$user_application_last_name."',user_gender ='".$user_application_gender."',user_sin ='".$user_application_sin."',user_dob ='".$user_application_dob."',usert_street ='".$usert_application_street."',user_street_name ='".$user_application_street_name."',user_unit_no ='".$user_application_unit_no."',user_provience ='".$user_application_provience."',user_postal_code ='".$user_application_postal_code."',user_phone_no ='".$user_application_phone_no."',user_email ='".$user_application_email."',user_employment_status ='".$user_application_employment_status."',user_gross_income ='".$user_application_gross_income."',user_household_income ='".$user_application_household_income."',user_residential_status ='".$user_application_residential_status."',user_planning ='".$user_application_planning."',user_fund_time ='".$user_application_fund_time."' WHERE user_login_id= '".$u_id."'");


        // UPDATE DATA IN APPLICATION TABLE 

         $UpdateQuery = $this->User_model->query("UPDATE user_application SET user_application_first_name ='".$user_application_first_name."',user_application_middle_name ='".$user_application_middle_name."',user_application_last_name ='".$user_application_last_name."',user_application_gender ='".$user_application_gender."',user_application_sin ='".$user_application_sin."',user_application_dob ='".$user_application_dob."',usert_application_street ='".$usert_application_street."',user_application_street_name ='".$user_application_street_name."',user_application_unit_no ='".$user_application_unit_no."',user_application_provience ='".$user_application_provience."',user_application_postal_code ='".$user_application_postal_code."',user_application_phone_no ='".$user_application_phone_no."',user_application_email ='".$user_application_email."',user_application_employment_status ='".$user_application_employment_status."',user_application_gross_income ='".$user_application_gross_income."',user_application_household_income ='".$user_application_household_income."',user_application_residential_status ='".$user_application_residential_status."',user_application_planning ='".$user_application_planning."',user_application_fund_time ='".$user_application_fund_time."',user_application_tier ='".$user_application_tier."',user_application_no_bidding_cycle ='".$user_application_no_bidding_cycle."' ,user_application_offer_sent ='1',user_application_restricted ='".$user_application_no_bidding_cycle."',user_application_restriction_upto ='".$user_restriction_level."' WHERE u_id= '".$u_id."' and user_application_plan_id ='".$hidden_user_application_plan_id."'");





        $hiddenUserApplicationPlanId = $this->input->post('hidden_user_application_plan_id');


        ///// USER ALERT NOTIFICATION

        $ApplicationFormAlert= array(  

                                        'notification_detail'                     => 'Please check your mail to confirm plan',
                                        'user_notification_id'                    => $u_id,
                                        'notification_type'                       => 'user'
                                       );  

        $InsertApplicationFormAlert = $this->User_model->insertdata('notification',$ApplicationFormAlert);
        $tierId = $this->input->post('user_application_tier');


        $queryGetTier = $this->User_model->query("SELECT * FROM plans WHERE id ='".$hiddenUserApplicationPlanId."'");
        if($queryGetTier->num_rows() > 0)
        {
            $result_GetTier = $queryGetTier->result_array();
        }
        else
        {
            $result_GetTier = '';
        }

        $tier1MembersLeft = $result_GetTier['0']['plan_tier_1_left_memebers'];
        $tier2MembersLeft = $result_GetTier['0']['plan_tier_2_left_memebers'];
        $tier3MembersLeft = $result_GetTier['0']['plan_tier_3_left_memebers'];
        $tier4MembersLeft = $result_GetTier['0']['plan_tier_4_left_memebers'];


   

        if($tierId == '1')
        {
            $updateTier = $tier1MembersLeft -1;
            $update_condiionset = plan_tier_1_left_memebers ;
        }
        else if($tierId == '2')
        {
            $updateTier = $tier2MembersLeft -1;
            $update_condiionset = plan_tier_2_left_memebers ;
        }
        else if($tierId == '3')
        {
            $updateTier = $tier3MembersLeft -1;
            $update_condiionset = plan_tier_3_left_memebers ;
        }
        else if($tierId == '4')
        {
            $updateTier = $tier4MembersLeft -1;
            $update_condiionset = plan_tier_4_left_memebers ;
        }


        $UpdateQuery = $this->User_model->query("UPDATE plans SET ".$update_condiionset." = '".$updateTier."' WHERE id = '".$hiddenUserApplicationPlanId."'");


      
  


        /////////////////////////////////

        $this->session->set_flashdata('success', 'Record Updated Successfully');  

          $plan_id       = $this->input->post('hidden_user_application_plan_id');
          $reset_link    = base_url().'plan-confirmation/'.$u_id.'/'.$plan_id;


          $password_message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#110d35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Plan Confirmation</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello '.$user_application_first_name.',<br><br>We received a request for the confirmation of the plan.Click the link below to accept or reject the offer within 72 hours.&nbsp;</p><p></p><a href="'.$reset_link.'"  target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color: #110d35;">Click Here</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($user_application_email);
            $this->email->subject('Plan Confirmation ');
            $this->email->message($password_message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 

        redirect(base_url() . 'application-review'); // REDIRECT TO SAME PAGE AFTER UPDATING THE DATA 



    }



    $query_application = $this->User_model->query("SELECT * FROM user_application  WHERE u_id ='".$url_data."' ");

    if($query_application->num_rows() > 0)
    {
        $result_application = $query_application->result_array();
        $user_application_table['user_application_table']=$result_application;

    }
    else
    {
        $result_application = '';
        $user_application_table['user_application_table']='';
    }

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
     $data['content'] = $this->load->view('admin/review_application',$session_data+$user_application+$user_application_plan+$plan_details+$user_application_table+$committi_joining_data+$residential_data,true);
    $this->load->view('template/template', $data);
}
///////////////////////////////////////  REVIEW  EACH APPLICATION END /////////////////////////////////////////////////////


////////////////////////////////////// TIER TAB IN PLANS IN ADMIN PANEL  //////////////////////////////////////////////////
public function tier()
{   
    $result                         = '';
    $recursive_session_value        = $this->session_data_recursive($result);
    $session_data['session_data']   = $recursive_session_value['0'];

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
    ///////////////////// FETCH PLAN NAMES FROM DATABASE ////////////////////

    //////////////////// ADD TIER TO  PLAN ////////////////////
    

    if(isset($_POST['submit']))
    {   
        $plan_id              =  $this->input->post('plan_id');

        $query_tier = $this->User_model->query("SELECT * FROM tier WHERE tier_plan_id='".$plan_id."'" );
        if($query_tier->num_rows() > 0)
        {
            $result_tier = $query_tier->result_array();
        
        }
        else
        {
            $result_tier = '';
            $insertData= array(  

                'tier_1'            => $this->input->post('tier-1'),
                'tier_2'            => $this->input->post('tier-2'),
                'tier_3'            => $this->input->post('tier-3'),
                'tier_4'            => $this->input->post('tier-4'),
                'tier_plan_id'      => $this->input->post('plan_id'),
             );  

            $insertTier = $this->User_model->insertdata('tier',$insertData);
            $this->session->set_flashdata('tier_added_successfully','msg'); 

        }
  
    }

    

    //////////////////// ADD TIER TO A PLAN ////////////////////

    $data['content'] = $this->load->view('admin/tier',$session_data+$plans,true);
    $this->load->view('template/template', $data);
}
////////////////////////////////////// TIER TAB IN PLANS IN ADMIN PANEL  //////////////////////////////////////////////////

    public function display_checked_tier()
    {
        $plan_id =  $this->input->post('plan_id');  
        $query_tier = $this->User_model->query("SELECT * FROM tier WHERE tier_plan_id='".$plan_id."'" );
        if($query_tier->num_rows() > 0)
        {
            $result_tier = $query_tier->result_array();
            echo json_encode($result_tier['0']);

        }
        else
        {

            $result_tier = array(
                'tier_plan_id' =>'',
            );
            echo json_encode($result_tier);


        }

    }


    public function view_plan_tab()
    {
        $id = $session_data['session_data']=$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Plans',$id);
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];

        $PlanId = base64_decode($this->uri->segment(2));    
        $query_PlanDetails = $this->User_model->query("SELECT * FROM plans WHERE id='".$PlanId."'   ");
        if($query_PlanDetails->num_rows() > 0)
        {
            $resultPlanDetails = $query_PlanDetails->result_array();
        }
        else
        {
            $resultPlanDetails = '';
        }

        $PlanDetails['PlanDetails']=$resultPlanDetails;


        $query_fetch_bidding_cycles = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id='".$PlanId."'");
        if($query_fetch_bidding_cycles->num_rows() > 0)
        {
            $result_fetch_details = $query_fetch_bidding_cycles->result_array();
        }
        else
        {
            $result_fetch_details = '';
        }

        $BiddingCycleDetails['BiddingCycleDetails']=$result_fetch_details;        


        $query_fetch_plans_details =  $this->User_model->query("SELECT * FROM plans WHERE id='".$PlanId."'   ");
        if($query_fetch_plans_details->num_rows() > 0)
        {
            $result_fetch_plans_details = $query_fetch_plans_details->result_array();
        }
        else
        {
            $result_fetch_plans_details = '';
        }

        $plan_details_data['plan_details_data']=$result_fetch_plans_details;

$query_get_users = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$PlanId."' ");

         $tier1=0;
         $tier2=0;
         $tier3=0;
         $tier4=0;
 
        if($query_get_users->num_rows() > 0)
        {
            $result_get_userss = $query_get_users->result_array();
            $result_get_users['result_get_users'] = $result_get_userss;
            
            foreach($result_get_userss as $tier_value){

                   if($tier_value['user_application_tier']=='1'){
                     $tier1++;
                   }
                     if($tier_value['user_application_tier']=='2'){
                        $tier2++;
                    
                   }
                       if($tier_value['user_application_tier']=='3'){
                        $tier3++;
                    
                   }
                       if($tier_value['user_application_tier']=='4'){
                        $tier4++;
                    
                   }
            }

        }
        else
        {
            $result_get_userss = '';
            $result_get_users['result_get_users'] = array();

        }


        $tiers_array['tiers_array']=array(
            'total_tiers'=>$tier1+$tier2+$tier3+$tier4,
            'tier1'=>$tier1,
            'tier2'=>$tier2,
            'tier3'=>$tier3,
            'tier4'=>$tier4,
        );
    
        $winner_ids_array=array();
        $previous_winner_ids=$this->User_model->query("SELECT bidding_user_id from bidding_details where bidding_plan_id='".$PlanId."' and bidding_check_winning_bid='1'");
        if($previous_winner_ids->num_rows()>0){

            $result_winners_ids=$previous_winner_ids->result_array();
            foreach($result_winners_ids as $winner_id){
                array_push($winner_ids_array,$winner_id['bidding_user_id']);
            }
        }

         if(!empty($winner_ids_array)){

            $winner_ids=implode(',',$winner_ids_array);

            $fetch_users=$this->User_model->query("SELECT u_id,user_application_first_name,user_application_last_name from user_application where u_id NOT IN($winner_ids) and user_application_plan_confirmation='1' and user_application_plan_id='".$PlanId."'");
            if($fetch_users->num_rows()>0)
            {
                $user_list['users_list']=$fetch_users->result_array();
            }else{
                $user_list['users_list']=''; 
            }

         }else{
            $fetch_users=$this->User_model->query("SELECT u_id,user_application_first_name,user_application_last_name from user_application where user_application_plan_confirmation='1' and user_application_plan_id='".$PlanId."'");
            if($fetch_users->num_rows()>0)
            {
                $user_list['users_list']=$fetch_users->result_array();
            }else{
                $user_list['users_list']=''; 
            }

         }

        $data['content'] = $this->load->view('admin/view_plan_tab',$session_data+$PlanDetails + $BiddingCycleDetails + $plan_details_data+$result_get_users+$tiers_array+$user_list,true);
        $this->load->view('template/template', $data);


    }
    public function calaculate_bidding_schedule()
    {
        $bidding_start_date = $this->input->post('bidding_start_date');
        // $start = $month = strtotime($bidding_start_date);

        $bidding_count= $this->input->post('TotalNoApplications');

        $start = $month = strtotime($bidding_start_date);

        $new_month = date('Y-m-d H:i:s', $month);

        $sales_due_date = $new_month;
        // create a time stamp of the date
        $time = strtotime($sales_due_date);

        $selectBiddingCycle = $this->input->post('BiddingCycleCount');


        if($selectBiddingCycle == '2')
        {

            // FOR WEEKLY CYCLE 

            for ($x = 1; $x <= $bidding_count; $x++) 
            { 
                // convert timestamp back to date string
                $date = date('Y-m-d H:i:s', $time);
                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
                $due_dates[] = array(
                    'date' => $date,
                );
                // move to next timestamp
                $time = strtotime('+7 days', $time);
            }   
            echo json_encode($due_dates); 
            
        }        

        if($selectBiddingCycle == '3')
        {

            // FOR BI WEEKLY  CYCLE 

            for ($x = 1; $x <= $bidding_count; $x++) 
            { 
                // convert timestamp back to date string
                $date = date('Y-m-d H:i:s', $time);
                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
                $due_dates[] = array(
                    'date' => $date,
                );
                // move to next timestamp
                $time = strtotime('+14 days', $time);
            }  

            echo json_encode($due_dates); 
        }        

        if($selectBiddingCycle == '4')
        {

            // FOR MONTHLY CYCLE 

            for ($x = 1; $x <= $bidding_count; $x++) 
            { 
                // convert timestamp back to date string
                $date = date('Y-m-d H:i:s', $time);
                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
                $due_dates[] = array(
                    'date' => $date,
                );
                // move to next timestamp
                $time = strtotime('+1 month', $time);
            }

      

            echo json_encode($due_dates); 

        
        }        

        if($selectBiddingCycle == '5')
        {

            // FOR BI MONYHLY  CYCLE 


            for ($x = 1; $x <= $bidding_count; $x++) 
            { 
                // convert timestamp back to date string
                $date = date('Y-m-d H:i:s', $time);
                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
                $due_dates[] = array(
                    'date' => $date,
                );
                // move to next timestamp
                $time = strtotime('+15 days', $time);
            }
            echo json_encode($due_dates); 

        
        }        

        if($selectBiddingCycle == '6')
        {

            // FOR QUARTERLY  CYCLE 

            for ($x = 1; $x <= $bidding_count; $x++) 
            { 
                // convert timestamp back to date string
                $date = date('Y-m-d H:i:s', $time);
                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
                $due_dates[] = array(
                    'date' => $date,
                );
                // move to next timestamp
                $time = strtotime('+3 month', $time);
            } 
            echo json_encode($due_dates); 

        
        }        

        if($selectBiddingCycle == '7')
        {

            // FOR SEMI ANNUALY  CYCLE 

            for ($x = 1; $x <= $bidding_count; $x++) 
            { 
                // convert timestamp back to date string
                $date = date('Y-m-d H:i:s', $time);
                $date1 = date('Y-m-d H:i:s', strtotime('+30 minute', $time));
                $due_dates[] = array(
                    'date' => $date,
                );
                // move to next timestamp
                $time = strtotime('+6 month', $time);
            }
            echo json_encode($due_dates); 

        
        }

    }

    public function manage_users()
    {
        $id = $session_data['session_data']=$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Manage Users',$id);
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];

        $query_users = $this->User_model->query("SELECT * FROM users as u join committi_users as c on u.id=c.user_login_id WHERE u.login_type ='user'");
        if($query_users->num_rows() > 0)
        {
            $result_users = $query_users->result_array();
        }
        else
        {
            $result_users = '';
        }

        $users['users']=$result_users;




        $data['content'] = $this->load->view('admin/manage_users',$session_data+$users,true);
        $this->load->view('template/template', $data);


    }
    
    public function calculate_due_amount($per,$amount,$entered_amt){
        $per_amt=$amount*$per/100;
        $due_amt=$entered_amt;
        $data['criteria_value']=number_format($entered_amt,2);
        $data['criteria']='Amount';

        if($per_amt>$entered_amt){
           $data['due_amt']=$per_amt;
           $data['criteria_value']=number_format($per,2);
           $data['criteria']='Percentage';
        }
        if($amount=='0' || $amount=='0.00' || $amount==''){
           $data['due_amt']='0'; 
        }
        return $data; 
    }
    public function edit_user_profile()
    { 
        ob_start();
        $id = $session_data['session_data']=$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Manage Users',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
        }else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
        $rights['rights']=$check_tab_rights;
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        =  base64_decode($this->uri->segment(2));    


        $query_users = $this->User_model->query("SELECT * FROM users u join committi_users c on u.id=c.user_login_id WHERE id = '".$user_id."'");
        if($query_users->num_rows() > 0)
        {
            $result_users = $query_users->result_array();
        }
        else
        {
            $result_users = '';
        }

        $users['users']=$result_users['0'];


        $query_users_get_plan_details = $this->User_model->query("SELECT * FROM user_application WHERE u_id = '".$user_id."'");
        if($query_users_get_plan_details->num_rows() > 0)
        {
            $result_users_get_plan_details = $query_users_get_plan_details->result_array();
        }
        else
        {
            $result_users_get_plan_details = '';
        }

        $usersResultCheck['usersResultCheck']=$result_users_get_plan_details;


        if(isset($_POST['submit_doc'])) 
        {
            if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
                if($check_tab_rights[0]['all_rights']==0 && $check_tab_rights[0]['edit_right']==0)
                redirect(base_url() . 'dashboard');
            }
           if(isset($_SESSION['document_token']))
                    {
                        if(isset($_POST['document_token']))
                        {
                            if($_POST['document_token']==$_SESSION['document_token'])
                            {

            if($_FILES['upload_doc']['name'] !='')
            {

                $config['upload_path'] = 'assets/users/'; 
                $config['allowed_types'] =  'docx|rtf|doc|pdf';
                $config['max_size'] = '10243'; // max_size in kb
                $config['file_name'] = $_FILES['upload_doc']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('upload_doc'))
                {
                    $uploadData = $this->upload->data();

                     $insertImage= array(  
                    'document_records_userid'               => $this->input->post('hidden_userId_fetch_Val'),
                    'document_records_image_name'           => $uploadData['raw_name'],
                    'document_records_image_originalname'   => $uploadData['file_name'],
                    'document_records_format'               => $uploadData['file_ext'],
                    'document_records_upload_date'          => date('Y-m-d'),
                    'document_upload_type'                  => 'admin',
                    'document_records_custom_name'          => $this->input->post('document_name')
                 );  

                    $insertImaGe = $this->User_model->insertdata('document_records',$insertImage);

                }
                else
                 {
                    echo  $this->upload->display_errors();
                 }
            }
        }
    }
}
}       
        if(isset($_POST['statement_generate_button'])) 
        {
            if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
                if($check_tab_rights[0]['all_rights']==0 && $check_tab_rights[0]['edit_right']==0)
                redirect(base_url() . 'dashboard');
            }
            if(isset($_SESSION['statement_button_token']))
            {
             if(isset($_POST['statement_button_token']))
                {
                    if($_POST['statement_button_token']==$_SESSION['statement_button_token']){
                        $statement_start_date    = $this->input->post('statement_start_date');
                        $statement_end_date      = $this->input->post('statement_end_date');
                        $statement_due_date      = $this->input->post('statement_due_date');
                        $user_id                 = $this->input->post('hidden_user_id_statement');
                        $plan_id_modal           = $this->input->post('plan_id_modal');
                        $percentage              = $this->input->post('user_state_percentage_amt');
                        $user_state_amt_value    = $this->remove_currency_symbol($this->input->post('statement_amount'));

                        if(($statement_start_date != '') && ($statement_start_date != '')){
                            $query_get_statements= $this->User_model->query("SELECT * FROM transactions WHERE transaction_date >='".date('Y-m-d',strtotime($statement_start_date))."' and transaction_date <= '".date('Y-m-d',strtotime($statement_end_date))."' AND transaction_user_id = '".$user_id."' AND transaction_plan_id = '".$plan_id_modal."'");
                            if($query_get_statements->num_rows() > 0){
                                $result_get_statements = $query_get_statements->result_array();
                                    $output ='';
                                    $count = '1'; 
                                    $debsum =0;
                                    $cresum = 0;
                                    foreach ($result_get_statements as $key => $value) 
                                    {
                                        $debsum+= $value['transaction_debit_amount'];
                                        $cresum+= $value['transaction_credit_amount'];
                                        $credit = $value['transaction_credit_amount'];
                                        $debit  =$value['transaction_debit_amount'];
                                        if($debit == '0.00')
                                        {
                                            if($credit == '0.00')
                                            {
                                                $amount = '';
                                            }
                                            else
                                            {
                                                $amount = '$ -'.number_format($credit,2);
                                            }
                                        }
                                        else
                                        {
                                            if($debit == '0.00')
                                            {
                                                $amount = '';
                                            }
                                            else
                                            {
                                                $amount = '$'.number_format($debit,2);
                                            }
                                        }
                                        $credit2 = $value['transaction_credit_amount'];
                                        $debit2  = $value['transaction_debit_amount'];
                                        if($debit2 == '0.00')
                                        {
                                            $balance= $debsum-$cresum ;
                                            $balanceAmt = '$'.number_format($balance,2);
                                        }
                                        else
                                        {
                                            $balance= $debsum-$cresum ;
                                            $balanceAmt = '$'.number_format($balance,2);
                                        }
                                        $counter = $count ++ ;
                                        $output .= '<tr>  
                                                          <td style="width:8%;">'.$counter.'</td>  
                                                          <td style="width:17%;">'.date('m/d/Y',strtotime($value["transaction_date"])).'</td>  
                                                          <td style="width:25%;">'.$value["transaction_description"].'</td>  
                                                          <td style="width:20%;">'.$value["transaction_ref"].'</td>  
                                                          <td style="width:15%;">'. $amount.'</td>  
                                                          <td style="width:15%;">'.$balanceAmt.'</td>  
                                               
                                                        </tr>  
                                                        ';  
                                    }

                            }
                            else
                            {
                                $result_get_statements = '';
                            
                            }
                            ///////////////////// FETCH PREVIOUS BALANCE /////////////////////
                            $prev_balance=0;
                            $result_Fetch_statement = '';
                            $query_Fetch_statement = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debit ,SUM(transaction_credit_amount) as credit FROM transactions WHERE transaction_user_id = '".$user_id."' AND transaction_date <'".date('Y-m-d',strtotime($statement_start_date))."'");
                            if($query_Fetch_statement->num_rows() > 0)
                            {
                                $result_Fetch_statement= $query_Fetch_statement->result_array();

                                $debit = $result_Fetch_statement['0']['debit'];
                                $credit = $result_Fetch_statement['0']['credit'];
                                $prev_balance = $debit- $credit;
                            }
                            $min_due = '0.00'; 
                            $due_amt_cal         = $this->calculate_due_amount($percentage,$check_amt,$user_state_amt_value);
                            if($prev_balance>0)
                            {
                                $new_prev=$balance+$prev_balance;
                                $due_amt_cal     = $this->calculate_due_amount($percentage,$new_prev,$user_state_amt_value);
                                $min_due  =$due_amt_cal['due_amt'];
                            }
                            $query_Fetch_statement2 = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debitamt ,SUM(transaction_credit_amount) as creditamt  FROM transactions WHERE transaction_user_id = '".$user_id."' AND  transaction_date = '".date('Y-m-d')."' ");
                            if($query_Fetch_statement2->num_rows() > 0)
                            {
                                $result_Fetch_statement2    = $query_Fetch_statement2->result_array();
                                $debitamt = $result_Fetch_statement2['0']['debitamt'];
                                $creditamt = $result_Fetch_statement2['0']['creditamt'];
                                $balanceamt = $debitamt- $creditamt;
                            }else{
                                $result_Fetch_statement2 = '';
                            }
                            if($creditamt >= 0)
                            {
                                $due_amountt = $debitamt- $creditamt;
                            }
                            else
                            {
                                $due_amountt = '0.00';
                            }
                            $total             = number_format(($balance + $prev_balance),2);
                            $todayDate         = strtotime(date('Y-m-d H:i:s'));
                            $attach_file_name  = FCPATH.'assets/users/statement_pdf/statement_'.$plan_id_modal.'_'.$user_id.'_'.$todayDate.'.pdf';

                            ////////////fecth information from transaction table
                            $fetch_transactions_for_user=$this->User_model->query("select * from transactions where transaction_user_id='".$user_id."' AND  transaction_plan_id='".$plan_id_modal."' and transaction_date >='".date('Y-m-d',strtotime($statement_start_date))."' AND transaction_date <='".date('Y-m-d',strtotime($statement_end_date))."'");
                            $transaction_count=$fetch_transactions_for_user->num_rows();
                            if($fetch_transactions_for_user->num_rows()>0)
                            {
                                $result_fetch_transactions_for_user['result_fetch_transactions_for_user']=$fetch_transactions_for_user->result_array();
                                $total_statement_rowss= $fetch_transactions_for_user->num_rows();
                            }else{
                                $result_fetch_transactions_for_user['result_fetch_transactions_for_user']='';
                            }
                            /////////////user account number series///////////
                            $query_get_plan_series = $this->User_model->query("SELECT * FROM plans WHERE  id = '".$plan_id_modal."' ");
                                if($query_get_plan_series->num_rows() > 0)
                                {
                                    $result_get_plan_series = $query_get_plan_series->result_array();
                                    $plan_amount_series     = $result_get_plan_series['0']['plan_amount_series'];
                                    $plan_series_no         = $result_get_plan_series['0']['plan_series_no'];
                                }else{
                                    $result_get_plan_series     = '';
                                    $plan_amount_series         = '';
                                    $plan_series_no             = '';
                                }             
                             $query_get_user_series = $this->User_model->query("SELECT * FROM user_application WHERE  user_application_plan_id= '".$plan_id_modal."' AND u_id = '".$user_id."'");

                                if($query_get_user_series->num_rows() > 0)
                                {
                                    $result_get_user_series = $query_get_user_series->result_array();
                                    $u_series_no        = $result_get_user_series['0']['u_series'];
                                }
                                else
                                {
                                    $result_get_user_series = '';
                                    $u_series_no= '';
                                } 

                                $series_no = $u_series_no.' '.$plan_amount_series.' '.$plan_series_no;
                                
                                $transaction_counter=0;


                                $todaysDate = date('m/d/y');
                                $datetime1 = new DateTime($todaysDate);

                                $datetime2 = new DateTime($statement_due_date);

                                $difference = $datetime1->diff($datetime2);

                                $duedaysNumeric  = $difference->d;

                            //////////////////////////////////
                            $this->load->library('Pdf');
                              $obj_pdf = new Pdf('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
                              $obj_pdf->SetCreator(PDF_CREATOR);  
                              $obj_pdf->SetTitle("Statement");  
                              $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
                              $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
                              $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
                              $obj_pdf->SetDefaultMonospacedFont('helvetica');  
                              $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
                              $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
                              $obj_pdf->setPrintHeader(false);  
                              $obj_pdf->setPrintFooter(false);  
                              $obj_pdf->SetAutoPageBreak(TRUE, 10);  
                              $obj_pdf->SetFont('helvetica', '', 9);  
                              $obj_pdf->AddPage();  
                              $style = array('width' => 0.5, 'dash' => '2,2,2,2', 'phase' => 0, 'color' => array(0, 0, 0));
                              $obj_pdf->Line(-1, -70,200,-70, $style);
                              $content = ''; 
                              $footerTxt='';

                              $content .= '<h6 align="left"><img  src="'.base_url().'assets/img/logo2.jpg" width="200" height="40"></h6><br/>';
                                  $content .= '
                                    <table cellpadding="1">
                                    <tr>
                                    <th colspan="14"><h1 style="color:#032c4c;">Your Account Statement</h1><br><h2 style="color:#032c4c;background-color:#eaeae6;"> PAYMENT INFORMATION</h2></th>
                                    <th colspan="1"></th>
                                    <th colspan="6" style="background-color:#eaeae6;padding-top:40px;margin:20px;"><h3 style="color:#032c4c;margin:20px;">Statement Period:</h3><br>    From : '.$statement_start_date.'<br>    To : '.$statement_end_date.' <br>    Due Date : '.$statement_due_date.'<br></th>
                                    </tr>
                                    <tr style="border-bottom-style: dotted;">
                                    <td colspan="11" style="border-bottom-style: dotted;">     Opening Balance</td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.number_format($prev_balance,2).'</td>
                                    <td colspan="1"></td>
                                    </tr>
                                    <tr style="border-bottom-style: dotted;">
                                    <td colspan="11" style="border-bottom-style: dotted;">   Minimum Payment Due Amount</td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.number_format($min_due,2).'</td>
                                    <td colspan="1"></td>
                                    </tr>
                                    <tr style="border-bottom-style: dotted;">
                                    <td colspan="11" style="border-bottom-style: dotted;">     Current Balance</td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.number_format($due_amountt,2).'</td>
                                    <td colspan="1"></td>
                                    </tr>
                                    <tr style="border-bottom-style: dotted;">
                                    <td colspan="11" style="border-bottom-style: dotted;">     New Balance</td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.$total.'</td>
                                    <td colspan="1"></td>
                                    </tr>
                                    <br>
                                    <tr>
                                    <td colspan="14"><h3>Estimate Time To Pay</h3></td>
                                    </tr>
                                    <br>
                                    <tr>
                                    <td colspan="14" style="color:#032c4c;">The estimated time to pay your New Balance in full is '.$duedaysNumeric.' days.</td>
                                    </tr>
                                    <br><br>
                                    <tr>
                                    <th colspan="14"><h2 style="color:#032c4c; background-color:#eaeae6;">TRANSACTIONS</h2></th>
                                    <th colspan="1"></th>
                                    <th colspan="6" style="background-color:#eaeae6;"><h4 style="color:#032c4c;"> Pay online at committi.com</h4></th>
                                    </tr>
                                    <tr style="border-bottom-style: dotted;">
                                    <td colspan="11" style="border-bottom-style: dotted;">Opening Statement Balance From : '.$statement_start_date.'</td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.number_format($prev_balance,2).'</td>
                                    <td colspan="1"></td>
                                    </tr>';
                                     
                                    if($result_fetch_transactions_for_user['result_fetch_transactions_for_user']!='') {
                                    foreach($result_fetch_transactions_for_user['result_fetch_transactions_for_user'] as $transaction_info){ 
                                        
                                        $transaction_counter++;
                                        
                                        if($transaction_info['transaction_debit_amount']!='0.00'){
                                              $transaction_amount='+'.number_format($transaction_info['transaction_debit_amount'],2);
                                        }else{
                                           $transaction_amount='-'.number_format($transaction_info['transaction_credit_amount'],2);
                                        }

                                    $content .= '<tr>
                                    <td colspan="11" style="border-bottom-style: dotted;">'.$transaction_info["transaction_description"].'</td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$transaction_amount.'</td>
                                    <td colspan="1"></td>';
                                     $content .='</tr>';
                                } 
                                   if($total_statement_rowss==1){
                                   $content .= '
                                    <tr>
                                    <td colspan="11" style="border-bottom-style: dotted;">Subtotal:</td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">$0.00</td>
                                    <td colspan="1"></td>
                                    <td colspan="20" style="background-color:#eaeae6;">     Mississauga, ON L4Z 1X3,</td>
                                    </tr>
                                    <tr>
                                    <td colspan="11" style="border-bottom-style: dotted;"><h3>    Your New Balance:</h3></td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                    <td colspan="1"></td>
                                    <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Phone: </b>: 1-866-266-6480</td>

                                    </tr>
                                    <tr>
                                    <td colspan="11"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email: </b>: info@committi.com</td>

                                    </tr>';

                                 }else if($total_statement_rowss==2){
                                     $content .= '
                                    <tr>
                                    <td colspan="11" style="border-bottom-style: dotted;"><h3>    Your New Balance:</h3></td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                    <td colspan="1"></td>
                                    <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Phone: </b>: 1-866-266-6480</td>

                                    </tr>
                                    <tr>
                                    <td colspan="11"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email: </b>: info@committi.com</td>

                                    </tr>';
                                }
                                     else{

                                   $content .= '
                                    <tr>
                                    <td colspan="11" style="border-bottom-style: dotted;">Subtotal:</td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">$0.00</td>
                                    <td colspan="1"></td>
                                    <td colspan="20" style=""><b></b></td>
                                    </tr>
                                    <tr>
                                    <td colspan="11" style="border-bottom-style: dotted;"><h3>  Your New Balance:</h3></td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                    <td colspan="1"></td>
                                    <td colspan="20"><b></b></td>
                                    </tr>';

                                 }
                                }
                                 else {
                                     $content .= '<tr>
                                    <td colspan="11"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                   <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>   200E - 141 Brunel Road</b></td>
                                    </tr>
                                    <tr>
                                    <td colspan="11" style="border-bottom-style: dotted;">Subtotal:</td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">$0.00</td>
                                    <td colspan="1"></td>
                                    <td colspan="20" style="background-color:#eaeae6;">     Mississauga, ON L4Z 1X3,</td>
                                    </tr>
                                    <tr>
                                    <td colspan="11" style="border-bottom-style: dotted;"><h3>    Your New Balance:</h3></td>
                                    <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                    <td colspan="1"></td>
                                    <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Phone: </b>: 1-866-266-6480</td>

                                    </tr>
                                    <tr>
                                    <td colspan="11"></td>
                                    <td colspan="3"></td>
                                    <td colspan="1"></td>
                                    <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email: </b>: info@committi.com</td>

                                    </tr>';
                                   }
                                    
                                    $content .= '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                    </table><br>';
                                    $footerTxt.='<hr><br><table cellpadding="1"><tr>
                                    <th colspan="11"><img src="'.base_url().'assets/img/logo2.jpg" width="100" height:80></th>
                                    <th colspan="6"></th>
                                    <th colspan="6" aligh="right"></th>
                                    </tr>
                                    <tr><td colspan="11">Committi Inc.</td>
                                    <td colspan="6">Account Number</td>
                                    <td colspan="6" aligh="right"><b>'.$series_no.'</b></td></tr>

                                    <tr><td colspan="11">ADDRESS</td>
                                    <td colspan="6">Your New Balance</td>
                                    <td colspan="6" aligh="right"><b></b></td></tr>

                                    <tr><td colspan="11">200E - 141 Brunel Road</td>
                                    <td colspan="6">Your Minimum Payment</td>
                                    <td colspan="6" aligh="right"><b></b></td>
                                    </tr>

                                    <tr><td colspan="11">Mississauga, ON L4Z 1X3,<br>CANADA</td>
                                    <td colspan="6">Your Minimum Payment Due Date</td>
                                    <td colspan="6" aligh="right"><b></b></td>
                                    </tr>
                                    </table>';

                               $obj_pdf->writeHTML($content);
                               $obj_pdf->writeHTMLCell('', '', '', '-60',$footerTxt, 0,0,0,true,'',true);
                              // $obj_pdf->writeHTMLCell($footerTxt, true, 0, true, 0, '');

                                   // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                             // reset pointer to the last page
                                 $obj_pdf->lastPage();
                              // $obj_pdf->Output($attach_file_name, 'I'); 

                              // INSERT INTO STATEMENT TABLE 

                              $obj_pdf->Output($attach_file_name, 'F'); 
                                // insert statements in statement table 
                             $url =base_url().'assets/users/statement_pdf/statement_'.$plan_id_modal.'_'.$user_id.'_'.$todayDate.'.pdf';

                                // FETCH PLAN NAME 

                                $query_fecth_plan_name = $this->User_model->query("SELECT * FROM plans  WHERE id ='".$plan_id_modal."' ");

                                if($query_fecth_plan_name->num_rows() > 0)
                                {
                                    $result_fecth_plan_name = $query_fecth_plan_name->result_array();
                                    $plan_name = $result_fecth_plan_name['0']['plan_name'];
                                }
                                else
                                {
                                    $result_fecth_plan_name = '';
                                    $plan_name = '';
                                }

                                $new_today_date = date('Y-m-d');
                                $insert_statement= array(  
                                        'statement_pdf_path'              => $url,
                                        'statement_generated_date'        => date('Y-m-d H:i:s'),
                                        'statement_plan_id'               => $plan_id_modal,
                                        'statement_user_id'               => $user_id,
                                        'statement_due_amount'            => $min_due,
                                        'statement_due_amount_criteria'   => $due_amt_cal['criteria'],
                                        'criteria_value'                  => $due_amt_cal['criteria_value'],
                                        'statement_plan_name'             => $plan_name,
                                        'statement_due_date'              => date('Y-m-d', strtotime($statement_due_date)),

                                     ); 
                                $InsertStatement = $this->User_model->insertdata('statements',$insert_statement);
                                $this->session->set_flashdata('new_state_success','Statement generated successfully.');
                        }
                    }
                }
            }
        }
        $query_application = $this->User_model->query("SELECT * FROM user_application  WHERE u_id ='".$user_id."' ");

        if($query_application->num_rows() > 0)
        {
            $result_application = $query_application->result_array();
            $user_application_table['user_application_table']=$result_application;

        }
        else
        {
            $result_application = '';
            $user_application_table['user_application_table']='';
        }



        $query_fetch_plans = $this->User_model->query("SELECT * FROM plans ");

        if($query_fetch_plans->num_rows() > 0)
        {
            $result_fetch_plans = $query_fetch_plans->result_array();
            $plans_details_data['plans_details_data']=$result_fetch_plans;

        }
        else
        {
            $result_fetch_plans = '';
            $plans_details_data['plans_details_data']=array();
        }
        
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




         $data['content'] = $this->load->view('admin/edit_user_profile',$session_data+$users+$usersResultCheck+$user_application_table+$plans_details_data+$rights+$residential_data+$committi_joining_data,true);
        $this->load->view('template/template', $data);
    }



    public function update_user_profile_ajax()
    {
        $user_id = $this->input->post('userId');

        $where['id'] = $user_id; 
        $where3['user_login_id'] = $user_id;
        $where4['u_id'] = $user_id;

        $UsDateOfBirthFormat = $this->input->post('user_date_of_Birth');
        $DateOfBirth= date('Y-m-d', strtotime(str_replace('/', '/', $UsDateOfBirthFormat)));


        $data2 = array(

                    'first_name'        => $this->input->post('first_name'),
                    'middle_name'       => $this->input->post('middle_name'),
                    'last_name'         => $this->input->post('last_name'),

                ); 

        $data3 = array(

                    'user_first_name'           => $this->input->post('first_name'),
                    'user_middle_name'          => $this->input->post('middle_name'),
                    'user_last_name'            => $this->input->post('last_name'),
                    'user_gender'               => $this->input->post('user_gender'),
                    'user_sin'                  => $this->input->post('user_sin'),
                    'user_dob'                  => $DateOfBirth,
                    'usert_street'              => $this->input->post('user_street'),
                    'user_street_name'          => $this->input->post('user_street_name'),
                    'user_unit_no'              => $this->input->post('user_unit_no'),
                    'user_provience'            => $this->input->post('user_provience'),
                    'user_postal_code'          => $this->input->post('user_postal_code'),
                    'user_phone_no'             => $this->input->post('user_phone_number'),
                    'user_unit_no'              => $this->input->post('user_suite'),
                    'user_employment_status'    => $this->input->post('user_employment_status'),
                    'user_gross_income'         => $this->input->post('user_annual_income'),
                    'user_household_income'     => $this->input->post('user_household_income'),
                    'user_residential_status'   => $this->input->post('user_residential'),
                    'user_planning'             => $this->input->post('user_funds'),
                    'user_fund_time'            => $this->input->post('user_funds_time'),
                    'user_sin'                  => $this->input->post('user_sin'),
                    'user_city'                 => $this->input->post('user_city'),
                );


                 // echo '<pre>';
                 // print_r($data3);   
                 // print_r($data2);   
                 // echo '</pre>';   

                $insertAdminData            = $this->User_model->updatedata('users',$where,$data2);
                $insertAdminUpdateData      = $this->User_model->updatedata('committi_users',$where3,$data3);

                $user_application_data=array(
                  
                'user_application_first_name'           => $this->input->post('first_name'),
                'user_application_middle_name'          => $this->input->post('middle_name'),
                'user_application_last_name'            => $this->input->post('last_name'),
                'user_application_gender'               => $this->input->post('user_gender'),
                'user_application_sin'                  => $this->input->post('user_sin'),
                'user_application_dob'                  => $DateOfBirth,
                'usert_application_street'              => $this->input->post('user_street'),
                'user_application_street_name'          => $this->input->post('user_street_name'),
                'user_application_unit_no'              => $this->input->post('user_unit_no'),
                'user_application_provience'            => $this->input->post('user_provience'),
                'user_application_postal_code'          => $this->input->post('user_postal_code'),
                'user_application_phone_no'             => $this->input->post('user_phone_number'),
                'user_application_unit_no'              => $this->input->post('user_suite'),
                'user_application_employment_status'    => $this->input->post('user_employment_status'),
                'user_application_gross_income'         => $this->input->post('user_annual_income'),
                'user_application_household_income'     => $this->input->post('user_household_income'),
                'user_application_residential_status'   => $this->input->post('user_residential'),
                'user_application_planning'             => $this->input->post('user_funds'),
                'user_application_fund_time'            => $this->input->post('user_funds_time'),
            );
            $check_user_application_table=$this->User_model->query("select * from user_application where u_id='".$user_id."'");
            if($check_user_application_table->num_rows()>0){
                $UpdateuserApplicationData = $this->User_model->updatedata('user_application',$where4, $user_application_data);
            }

                echo '1';


    }


    public function update_on_plan_change()
    {
        $user_id = $this->input->post('userId');
        $hidden_user_application_table_id = $this->input->post('hidden_user_application_table_id');
        $plan_id = $this->input->post('hidden_user_application_plan_id');
        $user_email_address = $this->input->post('user_email_address');

        // UPDATE NEW PLAN IN USER APPLICATION TABLE 

        $Updateassigned_plans = $this->User_model->query("UPDATE assigned_plans SET assigned_plans_plan_id = '".$this->input->post('hidden_ajax_plan_id')."' WHERE assigned_plans_plan_id = '".$plan_id."' and assigned_plans_user_id='".$user_id."'");

        $Updateuser_application = $this->User_model->query("UPDATE user_application SET user_application_plan_name = '".$this->input->post('hidden_ajax_plan_name')."',user_application_enrollment_start_date = '".$this->input->post('hidden_ajax_enroll_start_date')."',user_application_enrollment_end_date = '".$this->input->post('hidden_ajax_enroll_end_date')."',user_application_enrollment_bidding_start_date = '".$this->input->post('hidden_ajax_bidding_start_date')."',user_application_enrollment_bidding_start_amount = '".$this->input->post('hidden_ajax_bidding_start_amount')."',user_application_plan_id = '".$this->input->post('hidden_ajax_plan_id')."' WHERE user_application_plan_id = '".$plan_id."' and u_id='".$user_id."' and a_id='".$hidden_user_application_table_id."'");
        // SEND EMAIL TO USER FOR NEW PLAN CHANGE NOTIFICATION 
        // echo  $this->db->last_query();
        // die();
        $email = $user_email_address;
        $base_url=base_url().'application-status';
        $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#6fb8eb; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Plan Confirmation</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello,<br><br>Your plan is changed to another plan for bidding.&nbsp;</p><p></p><a href="'.$base_url.'" target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color: #6fb8eb;">Click Here</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($email);
            // $this->email->to('lovepreet.wartiz@gmail.com');
            $this->email->subject('Plan Confirmation ');
            $this->email->message($message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 

        // UPDATE BIDDING START WITH 24 HOURS IF TIER IS NOT FULL

        // WORKING IN CRON JOB Controller


        echo '1';

    }    

    public function get_plan_details()
    {
        $planId = $this->input->post('planId');

        $query_plans = $this->User_model->query("SELECT * FROM plans WHERE id = '".$planId."'");
        if($query_plans->num_rows() > 0)
        {
            $result_plans = $query_plans->result_array();
        }
        else
        {
            $result_plans = '';
        }

        echo json_encode($result_plans['0']);

    }

    public function insert_tier_values()
    {
        $tier_id = $this->input->post('tier_value');
       
        $total_tier_members = $this->input->post('total_tier_members');



        $where['tier_id'] = $tier_id;

        $tierData = array(
                            'tier_total_members'  => $this->input->post('total_tier_members'),
                        );

        if($tier_id !='' && $total_tier_members != '')
        {
            $UpdateTierData= $this->User_model->updatedata('tier',$where,$tierData);
            echo '1';
        }
        else
        {
            echo '0';
        }

    }    

    public function get_tier_table_value()
    {
        $tier_id = $this->input->post('tier_value');
       

        $query_tier = $this->User_model->query("SELECT * FROM tier WHERE tier_id = '".$tier_id."'");
        if($query_tier->num_rows() > 0)
        {
            $result_tier = $query_tier->result_array();
            echo json_encode($result_tier['0']);

        }
        else
        {
            $result_tier = '';
            echo '1';

        }


    }    

    public function get_tier_table_value_ajax()
    {
        $tier_id = $this->input->post('tier_value');
       

        $query_tier = $this->User_model->query("SELECT * FROM tier WHERE tier_id = '".$tier_id."'");
        if($query_tier->num_rows() > 0)
        {
            $result_tier = $query_tier->result_array();
            echo json_encode($result_tier['0']);

        }
        else
        {
            $result_tier = '';

        }


    }    


    public function uploadfield()
    {

       if($_FILES['file']['name'] !=''){

         // Set preference
         $config['upload_path'] = 'assets/users/'; 
         $config['allowed_types'] =  'docx|rtf|doc|pdf';
         $config['max_size'] = '10243'; // max_size in kb
         $config['file_name'] = $_FILES['file']['name'];

         $this->load->library('upload',$config); 
         $this->upload->initialize($config);

         // File upload
         if($this->upload->do_upload('file'))
         {
           // Get data about the file
           $uploadData = $this->upload->data();


           $insertImage= array(  
                'document_records_userid'               => $this->input->post('id'),
                'document_records_image_name'           => $uploadData['raw_name'],
                'document_records_image_originalname'   => $uploadData['file_name'],
                'document_records_format'               => $uploadData['file_ext'],
                'document_records_upload_date'          => date('Y-m-d'),
                'document_upload_type'                  => 'admin',
                'document_records_custom_name'          => $this->input->post('name')
             );  

            $insertImaGe = $this->User_model->insertdata('document_records',$insertImage);

        }

         else
         {
            echo  $this->upload->display_errors();
         }
       }
    }
     


    public function get_restriction_level_value()
    {
        $selectYesNo = $this->input->post('selectYesNo');

        $planId = $this->input->post('hidden_user_application_plan_id');

        if($selectYesNo == '1')
        {
            $query_tier = $this->User_model->query("SELECT * FROM bidding_schedule WHERE bidding_schedule_plan_id = '".$planId."'");
            if($query_tier->num_rows() > 0)
            {
                $result_tier = $query_tier->result_array();
                echo json_encode($result_tier);
            }
            else
            {
                $result_tier = '';


            }

        }


    }


    public function view_documents_data()
    {
        $document_records_userid = $this->input->post('userIdvalueGet');

        $query_get_doc = $this->User_model->query("SELECT * FROM document_records WHERE document_records_userid = '".$document_records_userid."' AND document_upload_type ='admin'");
        if($query_get_doc->num_rows() > 0)
        {
            $result_get_doc = $query_get_doc->result_array();
            echo json_encode($result_get_doc);
        }
        else
        {
            echo '0';
        }


    }     

    public function checkTierStatusAjax()
    {
        $tier_value                      = $this->input->post('tier_value');
        $hidden_user_application_plan_id = $this->input->post('hidden_user_application_plan_id');

        $query_get_tier = $this->User_model->query("SELECT * FROM plans WHERE id = '".$hidden_user_application_plan_id."'");
        if($query_get_tier->num_rows() > 0)
        {
            $result_get_tier = $query_get_tier->result_array();


            if($tier_value == '1')
            {
                $tier_left_space = $result_get_tier['0']['plan_tier_1_left_memebers'];
                if($tier_left_space == '0')
                {
                    echo '1'; // No space left
                }
                else
                {
                    echo '2' ;  // Space available 
                }
            }
            else if($tier_value == '2')
            {
                $tier_left_space = $result_get_tier['0']['plan_tier_2_left_memebers'];
                if($tier_left_space == '0')
                {
                    echo '1'; // No space left
                }
                else
                {
                    echo '2' ;// Space available 
                }
            }
            else if($tier_value == '3')
            {
                $tier_left_space = $result_get_tier['0']['plan_tier_3_left_memebers'];
                if($tier_left_space == '0')
                {
                    echo '1'; // No space left
                }
                else
                {
                    echo '2' ;// Space available 
                }
            }
            else if($tier_value == '4')
            {
                $tier_left_space = $result_get_tier['0']['plan_tier_4_left_memebers'];
                if($tier_left_space == '0')
                {
                    echo '1'; // No space left
                }
                else
                {
                    echo '2'; // Space available 
                }
            }
            


        }
        else
        {
            $result_get_tier = '';
        }


    }    

    public function get_active_plan_status()
    {
        $select_filter                      = $this->input->post('select_filter');
        $hidden_user_id_profile_update      = $this->input->post('hidden_user_id_profile_update');

        // Inactive
        
            if($select_filter == '1')
            {
                $query_users_get_plan_details = $this->User_model->query("SELECT * FROM user_application as u join plans p on u.user_application_plan_id=p.id WHERE u.u_id = '".$hidden_user_id_profile_update."' and p.plan_status ='3'");
            }

            // Active
            if($select_filter == '2')
            {
                $query_users_get_plan_details = $this->User_model->query("SELECT * FROM user_application as u join plans p on u.user_application_plan_id=p.id WHERE u.u_id = '".$hidden_user_id_profile_update."' and p.plan_status ='2'");
            }

            // All 
            if($select_filter == '3')
            {
                $query_users_get_plan_details = $this->User_model->query("SELECT * FROM user_application as u join plans p on u.user_application_plan_id=p.id WHERE u.u_id = '".$hidden_user_id_profile_update."' ");
            }


            if($query_users_get_plan_details->num_rows() > 0)
            {
                $result_users_get_plan_details = $query_users_get_plan_details->result_array();

                echo json_encode($result_users_get_plan_details);
            }
            else
            {
                $result_users_get_plan_details = '';
                echo '0';
            }

    }    



    ///////////////////////// GET ADMIN NOTIFICATIONS ///// //////////////

    public function get_notifications()
    {   
        $admin_id=$this->session->userdata('id');
        $query_plan = $this->User_model->query("SELECT * FROM notification where notification_type = 'admin' ");
        if($query_plan->num_rows() > 0)
        {
            $result_plan = $query_plan->result_array();

            echo json_encode($result_plan);
        }
        else
        {
         echo '0';
        }

    }
    //////////////////////////  GET ADMIN NOTIFICATIONS ////////////////    


    ///////////////////////// DELETE  ADMIN NOTIFICATIONS ///// //////////////

    public function delete_admin_notification()
    {   
        $id  = $this->input->post('id');
        $admin_id=$this->session->userdata('id');
        $query_plan = $this->User_model->query("DELETE FROM notification where notification_type = 'admin' AND notification_id ='".$id."' AND user_notification_id='".$admin_id."'");

        echo '1';

    }
    //////////////////////////  DELETE ADMIN NOTIFICATIONS ////////////////    

    ///////////////////////// DELETE ALL ADMIN NOTIFICATIONS ///// //////////////

    public function delete_all_admin_notification()
    {   
        $admin_id=$this->session->userdata('id');
        $query_plan = $this->User_model->query("DELETE FROM notification where notification_type = 'admin' and user_notification_id='".$admin_id."'");
        echo '1';

    }
    //////////////////////////  DELETE ADMIN NOTIFICATIONS ////////////////


    ///////////////////////// MANAGE ADMIN NOTES /////////////////////////

    public function manage_notes()
    {

        $id =$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Notes',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
            redirect(base_url() . 'dashboard');
        }else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
        $rights['rights']=$check_tab_rights;
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];


        $query_get_admin = $this->User_model->query("SELECT * FROM users where login_type = 'admin' and id!='".$id."'");
        if($query_get_admin->num_rows() > 0)
        {
            $result_get_admin = $query_get_admin->result_array();

        }
        else
        {
            $result_get_admin = '';
        }

        $query_get_note_sequence = $this->User_model->query("SELECT * FROM plan_sequence where plan_sequence_id = '3'  ");
        if($query_get_note_sequence->num_rows() > 0)
        {
            $result_get_note_no = $query_get_note_sequence->result_array();
            $note_number_sequence = $result_get_note_no['0']['note_number_sequence'];
        }
        else
        {
            $result_get_note_no = '';
            $note_number_sequence = '';
        }

        $result_get_note_no['result_get_note_no'] = $note_number_sequence;

 

        if(!empty($result_get_admin))
        {
            $data['content'] = $this->load->view('admin/manage_notes',$session_data+$result_get_admin+$result_get_note_no+$rights,true);
        }
        else
        {
            $data['content'] = $this->load->view('admin/manage_notes',$session_data+$result_get_note_no+$rights,true);
        }
        $this->load->view('template/template', $data);


    }

    public function insert_note()
    {   
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $name                           = $recursive_session_value['0']['first_name'].' '.$recursive_session_value['0']['last_name'];

        // insert

        $query_get_admin = $this->User_model->query("SELECT * FROM users where id = '".$this->input->post('admin_id')."'  ");
        if($query_get_admin->num_rows() > 0)
        {
            $result_get_admin = $query_get_admin->result_array();
            $u_name = $result_get_admin['0']['first_name'].' '.$result_get_admin['0']['last_name'];
        }
        else
        {
            $result_get_admin = '';
            $u_name = '';
        }

        $insert_notes= array(  
                'admin_notes_u_id'               => $this->input->post('admin_id'),
                'admin_notes_u_name'             => $u_name,
                'admin_notes_desc'               => $this->input->post('note_description'),
                'admin_notes_posted_date'        => date('Y-m-d h:i:s'),
                'admin_notes_posting_id'         => $recursive_session_value['0']['id'],
                'admin_notes_note_number'        => $this->input->post('note_number'),
                'admin_notes_user_name'          => $name,
                'admin_notes_task_name'          => $this->input->post('note_name'),
                'admin_notes_status'             => '1'
             );  

        $NoteInsert = $this->User_model->insertdata('admin_notes',$insert_notes); 
         $insert_id = $this->db->insert_id();

        $insert_notes_meta= array(  
                'admin_notes_meta_u_id'               => $insert_id,
                'admin_notes_meta_desc'               => $this->input->post('note_description'),
                'admin_notes_meta_note_no'            => $this->input->post('note_number'),
                'admin_notes_meta_post_date'          => date('Y-m-d h:i:s'),
                'admin_notes_meta_name'               => $name
             );  

        $NoteInsertMeta = $this->User_model->insertdata('admin_notes_meta',$insert_notes_meta);

        $new_note_no =$this->input->post('note_number')+1;
        $UpdateQuery = $this->User_model->query("UPDATE plan_sequence SET note_number_sequence = '".$new_note_no."' WHERE plan_sequence_id = '3'");
         
        //// New notes notification
         $notification_data=array(
                      'user_notification_id'       =>$this->input->post('admin_id'),
                      'notification_detail'       =>'New Notes Added',
                      'notification_type'          =>'admin',
                      'notification_route'          =>'notes'
         );
        $insertNotificationData = $this->User_model->insertdata('notification',$notification_data);
        //// fetch 
        $id     = $this->input->post('admin_id');
        $query_get_notes = $this->User_model->query("SELECT * FROM admin_notes where admin_notes_u_id  = '".$recursive_session_value['0']['id']."'  OR admin_notes_posting_id  = '".$recursive_session_value['0']['id']."' ");
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

    public function fetch_note()
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


    public function view_notes()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];

        $query_get_admin = $this->User_model->query("SELECT * FROM users where login_type = 'admin'  ");
        if($query_get_admin->num_rows() > 0)
        {
            $result_get_admin = $query_get_admin->result_array();

        }
        else
        {
            $result_get_admin = '';
        }

        $result_get_admin['result_get_admin'] = $result_get_admin;





        $data['content'] = $this->load->view('admin/view_note',$session_data+$result_get_admin,true);
        $this->load->view('template/template', $data);


    }

    public function add_notes_meta()
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


    public function fetch_notes_meta()
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

    public function fetch_admin_dropdown()
    {   
        $id=$this->session->userdata('id');
        $query_get_notes = $this->User_model->query("SELECT * FROM users where login_type = 'admin' and id!='".$id."'");
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


    //////////////////////////MANAGE ADMIN NOTES//////////////////////////

    public function display_documents_data()
    {
        $document_records_userid = $this->input->post('userIdvalueGet');

        $query_get_doc = $this->User_model->query("SELECT * FROM document_records WHERE document_records_userid = '".$document_records_userid."' AND document_upload_type ='admin'");
        if($query_get_doc->num_rows() > 0)
        {
            $result_get_doc = $query_get_doc->result_array();
            echo json_encode($result_get_doc);
        }
        else
        {
             echo '0';
        }


    }        

    public function update_document_namee()
    {
        $hidden_document_id = $this->input->post('hidden_document_id');
        $edit_doc_name = $this->input->post('edit_doc_name');

        $query_update_doc = $this->User_model->query("UPDATE document_records SET document_records_custom_name = '".$edit_doc_name."' WHERE document_records_id = '".$hidden_document_id."'");
        echo '1';


    }      
   

    public function delete_doc_record()
    {
        $id = $this->input->post('id');
        $adminPaswd = md5($this->input->post('adminPaswd'));
        $adminid = $_SESSION['id'];


        $query_get_doc = $this->User_model->query("SELECT * FROM users WHERE id = '".$adminid."' AND password = '".$adminPaswd."'");
        if($query_get_doc->num_rows() > 0)
        {
            $result_get_doc = $query_get_doc->result_array();

            $query_get_doc = $this->User_model->query("DELETE FROM document_records WHERE document_records_id = '".$id."' AND document_upload_type ='admin'");
            echo '1';
        }
        else
        {
            $result_get_doc = '';
            echo '0';
        }


     


    }    

    public function add_note_per_user()
    {
        $alert_desc = $this->input->post('alert_desc');
        $hidden_user_id_add_note = $this->input->post('hidden_user_id_add_note');

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $name                           = $recursive_session_value['0']['first_name'].' '.$recursive_session_value['0']['last_name'];

        // insert

        $query_get_admin = $this->User_model->query("SELECT * FROM users where id = '".$this->input->post('hidden_user_id_add_note')."'  ");
        if($query_get_admin->num_rows() > 0)
        {
            $result_get_admin = $query_get_admin->result_array();
            $u_name = $result_get_admin['0']['first_name'].' '.$result_get_admin['0']['last_name'];
        }
        else
        {
            $result_get_admin = '';
            $u_name = '';
        }

        $insert_notes= array(  
                'admin_notes_u_id'               => $this->input->post('hidden_user_id_add_note'),
                'admin_notes_u_name'             => $u_name,
                'admin_notes_desc'               => $this->input->post('alert_desc'),
                'admin_notes_posted_date'        => date('Y-m-d h:i:s'),
                'admin_notes_posting_id'         => $recursive_session_value['0']['id'],
                'admin_notes_user_name'          => $name,
                'admin_notes_task_name'          => $this->input->post('note_name'),
                'admin_notes_status'             => '2'

             );  

        $NoteInsert = $this->User_model->insertdata('admin_notes',$insert_notes); 



        /// Send email 

        $reset_link = base_url();
        $email   = $this->input->post('email');
        $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#110d35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>New Notification</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello,<br><br>You have received a new message.Click on the below link to check.&nbsp;</p><p></p><a href="'.$reset_link.'"  target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color: #110d35;">Click Here</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($email);
            $this->email->subject('Notification');
            $this->email->message($message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 

        echo '1';

    }
    public function view_notes_history()
    {
        $id = $session_data['session_data']=$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Notes',$id);
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
            redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $data['session_data']           = $recursive_session_value['0'];
        $url_data                       = base64_decode($this->uri->segment(2));                   // FETCHING VALUE FROM URL 
        $query_get_admin = $this->User_model->query("SELECT * FROM admin_notes where admin_notes_u_id = '".$url_data."'  ");
        $result_get_admin='';
        if($query_get_admin->num_rows() > 0){
            $result_get_admin = $query_get_admin->result_array();
        }
        $data['result_get_admin'] = $result_get_admin;  
        $result_get_admin_type = '';
        $data['result_admin'] = array();     
        $query_get_admin_type = $this->User_model->query("SELECT * FROM users where login_type = 'admin'  ");
        if($query_get_admin_type->num_rows() > 0){
            $result_get_admin_type = $query_get_admin_type->result_array();
            $data['result_admin'] = $result_get_admin_type;
        }
        $data['content'] = $this->load->view('admin/view_notes_history',$data,true);
        $this->load->view('template/template', $data);
    } 

    public function fetch_not_desc_admin_ajax()
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
    function deleteNotes(){
        $notes_id= $this->input->post('notes_id');
        $admin_id= $this->session->userdata('id');
        if($notes_id!='' and $admin_id!=''){
        $this->User_model->query('delete from admin_notes where admin_notes_id="'.$notes_id.'" and admin_notes_posting_id="'.$admin_id.'"');
        $this->User_model->query('delete from admin_notes_meta where admin_notes_meta_u_id="'.$notes_id.'"');
        echo '1';
      }
    }



    //////////////////////////////////////////////////// ADMIN TRANSACTIONS ////////////////////////////////////////


    public function add_transaction()
    {
        $id = $session_data['session_data']=$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Plans',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
            redirect(base_url() . 'dashboard');
        }else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
            $rights['rights']=$check_tab_rights;
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $url_data                       = base64_decode($this->uri->segment(2));                   // FETCHING VALUE FROM URL 
        $url_data_2                     = base64_decode($this->uri->segment(3));                   // FETCHING VALUE FROM URL 
        $cycle_count['cycle_count']     = $url_data_2;
        $plan_id['plan_id']             = $url_data;

        $query_PlanDetails = $this->User_model->query("SELECT * FROM plans WHERE id='".$url_data."'   ");
        if($query_PlanDetails->num_rows() > 0)
        {
            $resultPlanDetails = $query_PlanDetails->result_array();
            $PlanDetails['PlanDetails']=$resultPlanDetails;
        }
        else
        {
            $resultPlanDetails = '';
            $PlanDetails['PlanDetails']=array();
        }

        $query_get_bidding_cyclye_winner = $this->User_model->query("SELECT * FROM bidding_schedule where bidding_schedule_plan_id = '".$url_data."' and bidding_cycle_win_bid_check = '1' AND bidding_cycle_count = '".$url_data_2."'");

        if($query_get_bidding_cyclye_winner->num_rows() > 0)
        {
            $result_get_bidding_cycle_winner = $query_get_bidding_cyclye_winner->result_array();
            $winning_bid_user_data =$result_get_bidding_cycle_winner['0'];
            $winning_bid_user['winning_bid_user'] = $winning_bid_user_data;
        }
        else
        {
            $result_get_bidding_cycle_winner = '';
            $winning_bid_user['winning_bid_user'] = array(
                'bidding_cycle_winner_f' => '',
                'bidding_cycle_winner_l' => '',
                'bidding_cycle_win_amount' => ''
            );

        }   




        $query_get_users = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$url_data."' and user_application_plan_confirmation='1'");

        if($query_get_users->num_rows() > 0)
        {
            $result_get_userss = $query_get_users->result_array();
            $result_get_users['result_get_users'] = $result_get_userss;
        }
        else
        {
            $result_get_userss = '';
            $result_get_users['result_get_users'] = array();
        }         

        $query_get_trans_desc = $this->User_model->query("SELECT * FROM transaction_type ");

        if($query_get_trans_desc->num_rows() > 0)
        {
            $result_get_trans_desc = $query_get_trans_desc->result_array();
            $result_get_trans_desc_1['result_get_trans_desc'] = $result_get_trans_desc;
        }
        else
        {
            $result_get_trans_desc = '';
            $result_get_trans_desc_1['result_get_trans_desc'] = array();
        }     


        if(isset($_POST['statement_generate_buttons'])) 
        {
            if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
                if($check_tab_rights[0]['all_rights']==0 && $check_tab_rights[0]['edit_right']==0)
                redirect(base_url() . 'dashboard');
            }
           if(isset($_SESSION['statement_buttons_token']))
            {
             if(isset($_POST['statement_buttons_token']))
                {
                    if($_POST['statement_buttons_token']==$_SESSION['statement_buttons_token']){
                            $statement_start_date    = $this->input->post('statement_start_date');
                            $statement_end_date      = $this->input->post('statement_end_date');
                            $statement_due_date      = $this->input->post('statement_due_date');
                            $plan_value_id           = $this->input->post('hidden_trans_plan_idd');
                            $cycle_counts           =  $this->input->post('hidden_cycle_counts');
                            $percentage              = $this->input->post('user_state_percentage_amt');
                            $user_state_amt_value    = $this->remove_currency_symbol($this->input->post('statement_amount'));
                            
                            $query_get_users1 = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$plan_value_id."' ");
                            if($query_get_users1->num_rows() > 0)
                            {
                                $result_get_userss1 = $query_get_users1->result_array();
                            }
                            else
                            {
                                $result_get_userss1 = '';
                            }             
                            if($result_get_userss1!=''){
                            foreach ($result_get_userss1 as $key => $values) 
                            {
                                $todayDate = strtotime(date('Y-m-d H:i:s'));
                                $attach_file_name =FCPATH.'assets/users/statement_pdf/statement_'.$plan_value_id.'_'.$values['u_id'].'_'.$todayDate.'.pdf';
                               if(file_exists($attach_file_name))
                               {
                                    $this->session->set_flashdata('error_statement', 'error');  
                               }
                                if(($statement_start_date != '') && ($statement_start_date != ''))
                                {
                                    $query_get_statements= $this->User_model->query("SELECT * FROM transactions WHERE transaction_date >= '".date('Y-m-d',strtotime($statement_start_date))."' AND transaction_date <= '".date('Y-m-d',strtotime($statement_end_date))."' AND transaction_plan_id = '".$plan_value_id."' AND transaction_user_id = '".$values['u_id']."'");

                                    if($query_get_statements->num_rows() > 0)
                                    {
                                        $result_get_statements = $query_get_statements->result_array();
                                        $total_statement_rows=$query_get_statements->num_rows();
                                    }
                                    else
                                    {
                                        $result_get_statements = '';
                                        $total_statement_rows='';
                                    }
                                    $output ='';
                                    $count = '1'; 
                                    $debsum ='0';
                                    $cresum ='0';
                                    $prev_balance='0';
                                    $balance='0';
                                    if($result_get_statements != '')
                                    {
                                        foreach ($result_get_statements as $key => $value) 
                                        {
                                            $debsum+= $value['transaction_debit_amount'];
                                            $cresum+= $value['transaction_credit_amount'];

                                            $credit = $value['transaction_credit_amount'];
                                            $debit  = $value['transaction_debit_amount'];

                                            if($debit == '0.00')
                                            {
                                                if($credit == '0.00')
                                                {
                                                    $amount = '';
                                                }
                                                else
                                                {
                                                    $amount = '$ -'.$credit;
                                                }
                                            }
                                            else
                                            {
                                                if($debit == '0.00')
                                                {
                                                    $amount = '';
                                                }
                                                else
                                                {
                                                    $amount = '$'.$debit;
                                                }
                                            }
                                            $credit2 = $value['transaction_credit_amount'];
                                            $debit2  = $value['transaction_debit_amount'];
                                            if($debit2 == '0.00')
                                            {
                                                $balance= $debsum-$cresum ;
                                                $balanceAmt = '$'.number_format($balance,2);
                                            }
                                            else
                                            {
                                                $balance= $debsum-$cresum ;
                                                $balanceAmt = '$'.number_format($balance,2);
                                            }                                           
                                            $counter = $count++;
                                            $output .= '<tr>  
                                                              <td style="width:8%;">'.$counter.'</td>  
                                                              <td style="width:17%;">'.date('m/d/Y',strtotime($value["transaction_date"])).'</td>  
                                                              <td style="width:25%;">'.$value["transaction_description"].'</td>  
                                                              <td style="width:20%;">'.$value["transaction_ref"].'</td>  
                                                              <td style="width:15%;">'. $amount.'</td>  
                                                              <td style="width:15%;">'.$balanceAmt.'</td>  
                                                   
                                                            </tr>  
                                                            ';  
                                        }
                                    }
                                    ///////////////////// FETCH PREVIOUS BALANCE /////////////////////

                                    $query_Fetch_statement = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debit ,SUM(transaction_credit_amount) as credit FROM transactions WHERE transaction_user_id = '".$values['u_id']."' AND transaction_date < '".date('Y-m-d',strtotime($statement_start_date))."' AND  transaction_plan_id = '".$plan_value_id."'");
                                    if($query_Fetch_statement->num_rows() > 0)
                                    {
                                        $result_Fetch_statement= $query_Fetch_statement->result_array();

                                        $debit = $result_Fetch_statement['0']['debit'];
                                        $credit = $result_Fetch_statement['0']['credit'];
                                        $prev_balance = $debit- $credit;

                                    }
                                    else
                                    {
                                        $result_Fetch_statement = '';
                                    }  


                                     $min_due = '0.00'; 
                                     $due_amt_cal         = $this->calculate_due_amount($percentage,$check_amt,$user_state_amt_value);
                                    if($prev_balance>0)
                                    {
                                        $new_prev=$balance+$prev_balance;
                                        $due_amt_cal     = $this->calculate_due_amount($percentage,$new_prev,$user_state_amt_value);
                                        $min_due  =$due_amt_cal['due_amt'];
                                    }

                                    $query_Fetch_statement2 = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debitamt ,SUM(transaction_credit_amount) as creditamt  FROM transactions WHERE transaction_user_id = '".$values['u_id']."' AND  transaction_date = '".date('Y-m-d')."' AND  transaction_plan_id = '".$plan_value_id."'");
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
                                    if($creditamt >= 0)
                                    {
                                        $due_amountt = $debitamt- $creditamt;
                                    }
                                    else
                                    {
                                        $due_amountt = '0.00';
                                    }
                                    $total = number_format(($balance + $prev_balance),2);
                                    $query_get_plan_series = $this->User_model->query("SELECT * FROM plans WHERE  id = '".$plan_value_id."' ");
                                    if($query_get_plan_series->num_rows() > 0)
                                    {
                                        $result_get_plan_series = $query_get_plan_series->result_array();
                                        $plan_amount_series     = $result_get_plan_series['0']['plan_amount_series'];
                                        $plan_series_no         = $result_get_plan_series['0']['plan_series_no'];
                                    }
                                    else
                                    {
                                        $result_get_plan_series     = '';
                                        $plan_amount_series         = '';
                                        $plan_series_no              = '';
                                    }             
                                    $query_get_user_series = $this->User_model->query("SELECT * FROM user_application WHERE  user_application_plan_id    = '".$plan_value_id."' AND u_id    = '".$values['u_id']."' ");
                                    if($query_get_user_series->num_rows() > 0)
                                    {
                                        $result_get_user_series = $query_get_user_series->result_array();
                                        $u_series        = $result_get_user_series['0']['u_series'];
                                    }
                                    else
                                    {
                                        $result_get_user_series     = '';
                                        $u_series            = '';
                                    } 
                                    $series = $u_series.' '.$plan_amount_series.' '.$plan_series_no;
                                    $transaction_counter = 0;
                                    // get due days from now date 
                                    $todaysDate = date('m/d/y');
                                    $datetime1 = new DateTime($todaysDate);

                                    $datetime2 = new DateTime($statement_due_date);

                                    $difference = $datetime1->diff($datetime2);

                                    $duedaysNumeric  = $difference->d;
                                    //////////////////////////////////
                                      $this->load->library('Pdf');
                                      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
                                      $obj_pdf->SetCreator(PDF_CREATOR);  
                                      $obj_pdf->SetTitle("Statement");  
                                      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
                                      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
                                      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
                                      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
                                      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
                                      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
                                      $obj_pdf->setPrintHeader(false);  
                                      $obj_pdf->setPrintFooter(false);  
                                      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
                                      $obj_pdf->SetFont('helvetica', '', 9);  
                                      $obj_pdf->AddPage();  
                                      // $style = array('width' => 0.5, 'dash' => '2,2,2,2', 'phase' => 0, 'color' => array(0, 0, 0));
                                      // $obj_pdf->Line(-1, 210, 250, 210, $style);

                                        $style = array('width' => 0.5, 'dash' => '2,2,2,2', 'phase' => 0, 'color' => array(0, 0, 0));
                                        $obj_pdf->Line(-1, -70,200,-70, $style);
                                        
                                        $content = ''; 
                                        $footerTxt='';

                                       $content .= '<h6 align="left"><img  src="'.base_url().'assets/img/logo2.jpg" width="200" height="40"></h6><br/>';
                                      $content .= '
                                        <table cellpadding="1">
                                        <tr>
                                        <th colspan="14"><h1 style="color:#032c4c;">Your Account Statement</h1><br><h2 style="color:#032c4c;background-color:#eaeae6;"> PAYMENT INFORMATION</h2></th>
                                        <th colspan="1"></th>
                                        <th colspan="6" style="background-color:#eaeae6;padding-top:40px;margin:20px;"><h3 style="color:#032c4c;margin:20px;">Statement Period:</h3><br>    From : '.$statement_start_date.'<br>    To : '.$statement_end_date.'<br>    Due Date : '.$statement_due_date.'<br></th>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">     Opening Balance</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.number_format($prev_balance,2).'</td>
                                        <td colspan="1"></td>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">   Minimum Payment Due Amount</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.number_format($min_due,2).'</td>
                                        <td colspan="1"></td>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">     Current Balance</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.number_format($due_amountt,2).'</td>
                                        <td colspan="1"></td>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">     New Balance</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.number_format($total,2).'</td>
                                        <td colspan="1"></td>
                                        </tr>
                                        <br>
                                        <tr>
                                        <td colspan="14"><h3>Estimate Time To Pay</h3></td>
                                        </tr>
                                        <br>
                                        <tr>
                                        <td colspan="14" style="color:#032c4c;">The estimated time to pay your New Balance in full is '.$duedaysNumeric.' days.</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                        <th colspan="14"><h2 style="color:#032c4c; background-color:#eaeae6;">TRANSACTIONS</h2></th>
                                        <th colspan="1"></th>
                                        <th colspan="6" style="background-color:#eaeae6;"><h4 style="color:#032c4c;"> Pay online at committi.com</h4></th>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">Opening Statement Balance  From : '.$statement_start_date.'</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.number_format($prev_balance,2).'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;"><b>     Committi Inc.</b></td>
                                        </tr>';
                                            if($result_get_statements){
                                                $transaction_amount = '';
                                                 foreach($result_get_statements as $transaction){
                                                    $transaction_counter++;
                                                    if($transaction['transaction_credit_amount']!='0.00'){
                                                        $transaction_amount='-'.$transaction['transaction_credit_amount'];
                                                    }
                                                    else if($transaction['transaction_debit_amount']!='0.00'){
                                                           $transaction_amount='+'.$transaction['transaction_debit_amount'];
                                                    }
                                                    else{
                                                        $transaction_amount='0.00';
                                                    }
                                            //     $content.='<tr style="border-bottom-style: dotted;">
                                            //      <td colspan="11" style="border-bottom-style: dotted;">'.$transaction['transaction_description'].'</td>
                                            //      <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$transaction_amount.'</td>
                                            //      </tr>';
                                            //     }
                                            // }
                                         $content .= '<tr>
                                        <td colspan="11" style="border-bottom-style: dotted;">'.$transaction["transaction_description"].'</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.number_format($transaction_amount,2).'</td>
                                        <td colspan="1"></td>';
                                         $content .='</tr>';
                                    }
                                     if($total_statement_rows==1){
                                       $content .= '
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;">Subtotal:</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$0.00</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;">     Mississauga, ON L4Z 1X3,</td>
                                        </tr>
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;"><h3>    Your New Balance:</h3></td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Phone: </b>: 1-866-266-6480</td>
                                        </tr>
                                        <tr>
                                        <td colspan="11"></td>
                                        <td colspan="3"></td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email: </b>: info@committi.com</td>
                                        </tr>';

                                     }else if($total_statement_rows==2){
                                         $content .= '
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;"><h3>    Your New Balance:</h3></td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Phone: </b>: 1-866-266-6480</td>

                                        </tr>
                                        <tr>
                                        <td colspan="11"></td>
                                        <td colspan="3"></td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email: </b>: info@committi.com</td>
                                        </tr>';
                                     }
                                     else{
                                       $content .= '
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;">Subtotal:</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$0.00</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style=""><b></b></td>
                                        </tr>
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;"><h3>  Your New Balance:</h3></td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20"><b></b></td>
                                        </tr>';

                                     }
                                    }

                                    else  {
                                         $content .= '<tr>
                                        <td colspan="11"></td>
                                        <td colspan="3"></td>
                                        <td colspan="1"></td>
                                       <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>   200E - 141 Brunel Road</b></td>
                                        </tr>
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;">Subtotal:</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$0.00</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;">     Mississauga, ON L4Z 1X3,</td>
                                        </tr>
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;"><h3>    Your New Balance:</h3></td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Phone: </b>: 1-866-266-6480</td>

                                        </tr>
                                        <tr>
                                        <td colspan="11"></td>
                                        <td colspan="3"></td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email: </b>: info@committi.com</td>

                                        </tr>';
                                       }
                                        
                                        $content .= '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                        </table><br>';
                                        $footerTxt.='<hr><br><table cellpadding="1"><tr>
                                        <th colspan="11"><img src="'.base_url().'assets/img/logo2.jpg" width="100" height:80></th>
                                        <th colspan="6"></th>
                                        <th colspan="6" aligh="right"></th>
                                        </tr>
                                        <tr><td colspan="11">Committi Inc.</td>
                                        <td colspan="6">Account Number</td>
                                        <td colspan="6" aligh="right"><b>'.$series.'</b></td></tr>

                                        <tr><td colspan="11">ADDRESS</td>
                                        <td colspan="6">Your New Balance</td>
                                        <td colspan="6" aligh="right"><b></b></td></tr>

                                        <tr><td colspan="11">200E - 141 Brunel Road</td>
                                        <td colspan="6">Your Minimum Payment</td>
                                        <td colspan="6" aligh="right"><b></b></td>
                                        </tr>

                                        <tr><td colspan="11">Mississauga, ON L4Z 1X3,<br>CANADA</td>
                                        <td colspan="6">Your Minimum Payment Due Date</td>
                                        <td colspan="6" aligh="right"><b></b></td>
                                        </tr>
                                        </table>';

                                        $obj_pdf->writeHTML($content);
                                        $obj_pdf->writeHTMLCell('', '', '', '-60',$footerTxt, 0,0,0,true,'',true);
                                  // $obj_pdf->writeHTMLCell($footerTxt, true, 0, true, 0, '');

                                       // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

                                  // reset pointer to the last page
                                      $obj_pdf->lastPage();

                                      $obj_pdf->Output($attach_file_name, 'F'); 


                                                        // insert statements in statement table 
                                       $url = base_url().'assets/users/statement_pdf/statement_'.$plan_value_id.'_'.$values['u_id'].'_'.$todayDate.'.pdf';

                                        $query_fecth_plan_name1 = $this->User_model->query("SELECT * FROM plans  WHERE id ='".$plan_value_id."' ");

                                        if($query_fecth_plan_name1->num_rows() > 0)
                                        {
                                            $result_fecth_plan_name1 = $query_fecth_plan_name1->result_array();
                                            $plan_name1 = $result_fecth_plan_name1['0']['plan_name'];
                                        }
                                        else
                                        {
                                            $result_fecth_plan_name1 = '';
                                            $plan_name1 = '';
                                        }


                                        $new_today_date = date('Y-m-d');
                                        $insert_statement= array(  
                                            'statement_pdf_path'         => $url,
                                            'statement_generated_date'   => date('Y-m-d H:i:s'),
                                           'statement_due_date'         => date('Y-m-d', strtotime($statement_due_date)),
                                            'statement_plan_id'          => $plan_value_id,
                                            'statement_user_id'          => $values['u_id'],
                                            'statement_due_amount'        => $min_due,
                                            'statement_due_amount_criteria'  => $due_amt_cal['criteria'],
                                            'criteria_value'                  => $due_amt_cal['criteria_value'],
                                            'statement_plan_name'        => $plan_name1,
                                         ); 
                                        $InsertStatement = $this->User_model->insertdata('statements',$insert_statement);



                                        $query_get_users2= $this->User_model->query("SELECT * FROM statements where statement_plan_id = '".$plan_value_id."' AND statement_user_id = '".$values['u_id']."'");

                                        if($query_get_users2->num_rows() > 0)
                                        {
                                            $result_get_userss2 = $query_get_users2->result_array();
                                            $statement_id = $result_get_userss2['0']['statement_id'];
                                            $pdf_url = $result_get_userss2['0']['statement_pdf_path'];
                                            $statement_id = $result_get_userss2['0']['statement_id'];
                                            $no_of_statement = $result_get_userss2['0']['statement_no_of_statements'];
                                            $number=1;
                                            $statementNumber=$no_of_statement+$number;

                                        }
                                        else
                                        {
                                            $result_get_userss2 = '';
                                            $statement_id = '';


                                            if($InsertStatement){
                                                $ApplicationFormAlert= array(  
                                                        'notification_detail'                     => 'Your Payment Statement Has Been Generated Succuessfully',
                                                        'user_notification_id'                    => $values['u_id'],
                                                        'notification_type'                       => 'user'
                                                       ); 
                                                       $InsertApplicationFormAlert = $this->User_model->insertdata('notification',$ApplicationFormAlert);
                                                       $email   =$values['user_application_email'];
                                                       $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#110d35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Payment Statement</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello '.$values['user_application_first_name'].'  '.$values['user_application_last_name'].',<br><br>Your Payment Statement Has Been Generated Succuessfully&nbsp;</p><p></p><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                                                            $this->email->clear(TRUE);
                                                            $this->email->from('support@committi.com', 'Committi');
                                                            $this->email->to($email);
                                                            $this->email->subject('Payments Statement');
                                                            $this->email->message($message);
                                                            $this->email->attach($url);
                                                            $this->email->set_mailtype('html'); 
                                                            $this->email->send(); 
                                        }
                                    } 
                                }  
                            } 
                        }

                    }

                }
            }    
        }
        $data['content'] = $this->load->view('admin/add_transaction',$session_data+$result_get_users+$plan_id+$result_get_trans_desc_1+$cycle_count+$winning_bid_user+$PlanDetails+$rights,true);
        $this->load->view('template/template', $data);
    }  
    public function insert_transaction()
    {   
        $search=array('$',',');
        $replace=array('','');
        $checked                = $this->input->post('checked');
        $add_trans_user         = $this->input->post('add_trans_user');
        $add_trans_cycle        = $this->input->post('add_trans_cycle');
        $add_trans_date         = $this->input->post('add_trans_date');
        $add_trans_desc         = $this->input->post('add_trans_desc');
        $add_trans_desc_text    = $this->input->post('add_trans_desc_text');
        $add_trans_amount       = str_replace($search,$replace,$this->input->post('add_trans_amount'));
        $add_trans_ref          = $this->input->post('add_trans_ref');
        $hidden_trans_plan_id   = $this->input->post('hidden_trans_plan_id');

        // get transaction description 
        $result_get_entry_type = '';
        $entry_type ='';

        $query_get_entry_type = $this->User_model->query("SELECT * FROM transaction_type where transaction_type_id = '".$add_trans_desc."' ");
        if($query_get_entry_type->num_rows() > 0)
        {
            $result_get_entry_type = $query_get_entry_type->result_array();
            $entry_type = $result_get_entry_type['0']['transaction_type'];

        }

         // 0 = SINGLE ENTRY AND 1 = MULTIPLE ENTRIES 
        if($checked == '0')
        {
            if($entry_type  == 'Debit')
            {
                $insert_transaction= array(  

                    'transaction_bidding_cycle'      => $add_trans_cycle,
                    'transaction_date'               => date('Y-m-d', strtotime($add_trans_date)),
                    'transaction_description'        => $add_trans_desc_text,
                    'transaction_debit_amount'       => $add_trans_amount,
                    'transaction_user_id'            => $add_trans_user,
                    'transaction_ref'                => $add_trans_ref,
                    'transaction_plan_id'            => $hidden_trans_plan_id
                 );  
                $InsertTransaction = $this->User_model->insertdata('transactions',$insert_transaction);
                echo '1';
            }

            if($entry_type  == 'Credit')
            {
                $insert_transaction= array(  

                    'transaction_bidding_cycle'      => $add_trans_cycle,
                    'transaction_date'               => date('Y-m-d', strtotime($add_trans_date)),
                    'transaction_description'        => $add_trans_desc_text,
                    'transaction_credit_amount'      => $add_trans_amount,
                    'transaction_user_id'            => $add_trans_user,
                    'transaction_ref'                => $add_trans_ref,
                    'transaction_plan_id'            => $hidden_trans_plan_id

                 );  

                $InsertTransaction = $this->User_model->insertdata('transactions',$insert_transaction);
                echo '1';
            }            

            if($entry_type  == 'Neutral')
            {
                $insert_transaction= array(  

                    'transaction_bidding_cycle'      => $add_trans_cycle,
                    'transaction_date'               => date('Y-m-d', strtotime($add_trans_date)),
                    'transaction_description'        => $add_trans_desc_text,
                    'transaction_user_id'            => $add_trans_user,
                    'transaction_ref'                => $add_trans_ref,
                    'transaction_plan_id'            => $hidden_trans_plan_id

                 );  

                $InsertTransaction = $this->User_model->insertdata('transactions',$insert_transaction);

                echo '1';
            }

        }
        else
        {   
            
            $query_get_users = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$hidden_trans_plan_id."' ");


            if($query_get_users->num_rows() > 0)
            {
                $result_get_users = $query_get_users->result_array();

                foreach ($result_get_users as $key => $value) {

                    if($entry_type  == 'Debit')
                    {
                        $insert_transaction= array(  

                            'transaction_bidding_cycle'      => $add_trans_cycle,
                            'transaction_date'               => date('Y-m-d', strtotime($add_trans_date)),
                            'transaction_description'        => $add_trans_desc_text,
                            'transaction_debit_amount'       => $add_trans_amount,
                            'transaction_user_id'            => $value['u_id'],
                            'transaction_ref'                => $add_trans_ref,
                            'transaction_plan_id'            => $hidden_trans_plan_id

                         );  

                        $InsertTransaction = $this->User_model->insertdata('transactions',$insert_transaction);  
                    }
                    
                    if($entry_type  == 'Credit')
                    {
                        $insert_transaction= array(  

                            'transaction_bidding_cycle'      => $add_trans_cycle,
                            'transaction_date'               => date('Y-m-d', strtotime($add_trans_date)),
                            'transaction_description'        => $add_trans_desc_text,
                            'transaction_credit_amount'      => $add_trans_amount,
                            'transaction_user_id'            => $value['u_id'],
                            'transaction_ref'                => $add_trans_ref,
                            'transaction_plan_id'            => $hidden_trans_plan_id

                         );  

                        $InsertTransaction = $this->User_model->insertdata('transactions',$insert_transaction);  
                    }
                    
                    if($entry_type  == 'Neutral')
                    {
                        $insert_transaction= array(  

                            'transaction_bidding_cycle'      => $add_trans_cycle,
                            'transaction_date'               => date('Y-m-d', strtotime($add_trans_date)),
                            'transaction_description'        => $add_trans_desc_text,
                            'transaction_user_id'            => $value['u_id'],
                            'transaction_ref'                => $add_trans_ref,
                            'transaction_plan_id'            => $hidden_trans_plan_id

                         );  

                        $InsertTransaction = $this->User_model->insertdata('transactions',$insert_transaction);  
                    }
                }

                echo '1';
            }
            else
            {
                $result_get_users = '';
            }
        }

    }


    public function assign_new_admin_to_note()
    {   

        $id   = $this->input->post('modal_select_id');
        $admin_note_id   = $this->input->post('admin_note_id');

        $query_assign_admin = $this->User_model->query("UPDATE admin_notes SET admin_notes_assigned_to = '".$id."' WHERE admin_notes_id = '".$admin_note_id."'");

        echo '1';
       
    }    

    public function update_task_status()
    {   

        $id   = $this->input->post('modal_select_status');
        $admin_note_id   = $this->input->post('admin_note_id');

        $query_assign_admin = $this->User_model->query("UPDATE admin_notes SET admin_notes_status = '".$id."' WHERE admin_notes_id = '".$admin_note_id."'");

        echo '1';
       
    }

    public function view_transactions()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $url_data                       = base64_decode($this->uri->segment(2));                   // FETCHING VALUE FROM URL 
        $url_data_2                     = base64_decode($this->uri->segment(3));  

        $plan_id['plan_id']=$url_data;
        $user_id['user_id']=$url_data_2;
         // FETCHING VALUE FROM URL 

        $query_users = $this->User_model->query("SELECT * FROM users u join committi_users c on u.id=c.user_login_id WHERE id = '".$url_data_2."'");
        if($query_users->num_rows() > 0)
        {
            $result_users = $query_users->result_array();
            $users['users']=$result_users['0'];

        }
        else
        {
            $result_users = '';
            $users['users']= array();

        }




        $query_get_transactions = $this->User_model->query("SELECT * FROM transactions WHERE transaction_user_id = '".$url_data_2."' AND transaction_plan_id = '".$url_data."' ");



        if($query_get_transactions->num_rows() > 0)
        {
            $result_get_transactionss = $query_get_transactions->result_array();
            $result_get_transactions['result_get_transactions'] = $result_get_transactionss;

        }
        else
        {
            $result_get_transactionss = '';
            $result_get_transactions['result_get_transactions'] = array();


        }        


        $data['content'] = $this->load->view('admin/view_transactions',$session_data+$result_get_transactions+$plan_id+$user_id+$users,true);
        $this->load->view('template/template', $data);


    }  


    public function manage_transactions()
    {
         $id = $session_data['session_data']=$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Master Transaction',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
            redirect(base_url() . 'dashboard');
        }else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
            $rights['rights']=$check_tab_rights;
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];


        $data['content'] = $this->load->view('admin/manage_transactions',$session_data+$rights,true);
        $this->load->view('template/template', $data);


    } 

        public function insert_transaction_description()
    {   

        $description_value   = $this->db->escape(ucwords($this->input->post('description_value')));
        $entry_type_value    = ucwords($this->input->post('entry_type_value'));

        if(($description_value != '') && ($entry_type_value != ''))
        {
            $check_transaction_description=$this->User_model->query("select * from transaction_type where transaction_type_desc=$description_value and transaction_type='".$entry_type_value."'");
            if($check_transaction_description->num_rows()==0){
            // $insert_transaction_desc= array(  

            //     'transaction_type_desc'      => $description_value,
            //     'transaction_type'           => $entry_type_value

            //  );  

            //  $InsertTransactionDesc = $this->User_model->insertdata('transaction_type',$insert_transaction_desc);

             $inserTransactionDesc=$this->User_model->query("INSERT into transaction_type(`transaction_type_desc`,`transaction_type`) VALUES($description_value,'".$entry_type_value."')");

            echo '1';
        }else{
            echo '2';
        }
        }
        else
        {
            echo '0';
        }

        
       
    }

    public function insert_transaction_description_old()
    {   

        $description_value   = $this->input->post('description_value');
        $entry_type_value    = $this->input->post('entry_type_value');

        if(($description_value != '') && ($entry_type_value != ''))
        {
            $check_transaction_description=$this->User_model->query("select * from transaction_type where transaction_type_desc='".ucwords($description_value)."' and transaction_type='".ucwords($entry_type_value)."'");
            if($check_transaction_description->num_rows()==0){
            $insert_transaction_desc= array(  

                'transaction_type_desc'      => ucwords($description_value),
                'transaction_type'           => ucwords($entry_type_value)

             );  

             $InsertTransactionDesc = $this->User_model->insertdata('transaction_type',$insert_transaction_desc);

            echo '1';
        }else{
            echo '2';
        }
        }
        else
        {
            echo '0';
        }

        
       
    }



    public function get_description_entry_type()
    {   

        $add_trans_desc   = $this->input->post('add_trans_desc');

        $query_get_entry_type = $this->User_model->query("SELECT * FROM transaction_type where transaction_type_id = '".$add_trans_desc."' ");
        if($query_get_entry_type->num_rows() > 0)
        {
            $result_get_entry_type = $query_get_entry_type->result_array();
            $entry_type = $result_get_entry_type['0']['transaction_type'];

            echo json_encode($entry_type);
        }
        else
        {
            $result_get_entry_type = '';
            $entry_type ='';
            echo json_encode($entry_type);
        }
    }
    
    public function get_bidding_cycle_ajax()
    {   

        $hidden_trans_plan_id   = $this->input->post('hidden_trans_plan_id');

        $query_get_bidding_cycle = $this->User_model->query("SELECT * FROM bidding_schedule where bidding_schedule_plan_id = '".$hidden_trans_plan_id."' ");
        if($query_get_bidding_cycle->num_rows() > 0)
        {
            $result_get_bid_cycle = $query_get_bidding_cycle->result_array();

            echo json_encode($result_get_bid_cycle);
        }
        else
        {
            $result_get_bid_cycle = '';
        
        }
    }


    public function view_user_application()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id = base64_decode($this->uri->segment(2));
        $plan_id = base64_decode($this->uri->segment(3));

        $plan_ids_array=[];

        $user_id_val['user_id_val'] =$user_id;

         $user_application_info=$this->User_model->query("Select * from user_application where u_id='".$user_id."'");
         if($user_application_info->num_rows()>0){
            $fetch_user_applications_plan_ids=$user_application_info->result_array();
            foreach($fetch_user_applications_plan_ids as $fetch_user_applications_plan_id){
                      array_push($plan_ids_array,$fetch_user_applications_plan_id['user_application_plan_id']);
            }

         }
         if($plan_ids_array!=''){
            $plan_ids=implode(",",$plan_ids_array);
         }
        $plans_details = $this->User_model->query("SELECT * FROM plans where id NOT in($plan_ids) and enrollment_left!='0'");
        if($plans_details->num_rows() > 0)
        {
            $result_plans_details = $plans_details->result_array();
            
            $plan_details['plan_details']=$result_plans_details;
        }
        else
        {
            $result_plans_details = '';
            $plan_details['plan_details']=array();
        }
        $query_users = $this->User_model->query("SELECT * FROM users u join committi_users c on u.id=c.user_login_id WHERE id = '".$user_id."'");
        if($query_users->num_rows() > 0)
        {
            $result_users = $query_users->result_array();
            $users['users']=$result_users['0'];

        }
        else
        {
            $result_users = '';
            $users['users']= array();

        }


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






        $data['content'] = $this->load->view('admin/view_user_application',$session_data+$user_application+$users+$user_id_val+$plan_details,true);
        $this->load->view('template/template', $data);


    }

    public function get_transaction_desc_ajax()
    {   

        $query_get_transc_desc = $this->User_model->query("SELECT * FROM transaction_type ");
        if($query_get_transc_desc->num_rows() > 0)
        {
            $result_get_transc_desc = $query_get_transc_desc->result_array();

            echo json_encode($result_get_transc_desc);
        }
        else
        {
            $result_get_transc_desc = '';
        
        }
    }    

    public function delete_trans_desc_ajax()
    {   

        $id   = $this->input->post('id');

        $query_del_transc_desc = $this->User_model->query("DELETE FROM transaction_type WHERE transaction_type_id = '".$id."'");

        echo '1';
        
    }   

    public function get_tranaction_entries_for_cycle_ajax()
    {   
        $hidden_cycle_count   = $this->input->post('hidden_cycle_count');
        $hidden_trans_plan_id   = $this->input->post('hidden_trans_plan_id');
        $filter_user   = $this->input->post('filter_user');
        // update balance in table 
        if($filter_user == '0')
        {
            $query_get_transc_desc = $this->User_model->query("SELECT * FROM transactions WHERE transaction_plan_id = '".$hidden_trans_plan_id."' AND transaction_bidding_cycle = '".$hidden_cycle_count."' ");
        }else {
            $query_get_transc_desc = $this->User_model->query("SELECT * FROM transactions WHERE transaction_plan_id = '".$hidden_trans_plan_id."' AND transaction_bidding_cycle = '".$hidden_cycle_count."' AND transaction_user_id = '".$filter_user."'");
        }
        if($query_get_transc_desc->num_rows() > 0){
            $result_get_transc_desc = $query_get_transc_desc->result_array();
            if(!empty($result_get_transc_desc)){
                foreach ($result_get_transc_desc as $key1 => $value1) {
                    $query_get_transc_desc111 = $this->User_model->query("SELECT * FROM users WHERE id = '".$value1['transaction_user_id']."' ");
                    if($query_get_transc_desc111->num_rows() > 0)
                    {
                        $result_get_transc_desc111 = $query_get_transc_desc111->result_array();
                        $result_get_transc_desc[$key1]['username'] = $result_get_transc_desc111[0]['first_name'];
                        if($hidden_cycle_count > 1)
                        {
                             $newcyclecount= $hidden_cycle_count - 1 ;
                             $unsearlizeValbal = unserialize($result_get_transc_desc[0]['previous_cycle_balance']);
                             $result_get_transc_desc[$key1]['prev_bal'] = $unsearlizeValbal['Cycle_'.$newcyclecount];
                        }
                    }
                }
            }
            echo json_encode($result_get_transc_desc);
        }
        else
        {
            $result_get_transc_desc = '';
            echo '1111';
        
        }
    }
    public function new_transaction(){
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $url_data                       = base64_decode($this->uri->segment(2));                   // FETCHING VALUE FROM URL 
        $url_data_2                     = base64_decode($this->uri->segment(3));                   // FETCHING VALUE FROM URL 
        $plan_id['plan_id']             = $url_data;
        $user_id['user_id']             = $url_data_2;
        $query_users = $this->User_model->query("SELECT * FROM users u join committi_users c on u.id=c.user_login_id WHERE id = '".$url_data_2."'");
        if($query_users->num_rows() > 0)
        {
            $result_users = $query_users->result_array();
            $users['users']=$result_users['0'];

        }else{
            $result_users = '';
            $users['users']= array();
        }
        $query_get_users = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$url_data."' AND u_id ='".$url_data_2."' ");
        if($query_get_users->num_rows() > 0)
        {
            $result_get_userss = $query_get_users->result_array();
            $result_get_users['result_get_users'] = $result_get_userss;
        }
        else
        {
            $result_get_userss = '';
            $result_get_users['result_get_users'] = array();
        }         
        $query_get_trans_desc = $this->User_model->query("SELECT * FROM transaction_type ");
        if($query_get_trans_desc->num_rows() > 0)
        {
            $result_get_trans_desc = $query_get_trans_desc->result_array();
            $result_get_trans_desc_1['result_get_trans_desc'] = $result_get_trans_desc;
        }else{
            $result_get_trans_desc = '';
            $result_get_trans_desc_1['result_get_trans_desc'] = array();
        }        
        $data['content'] = $this->load->view('admin/new_transaction',$session_data+$result_get_users+$plan_id+$user_id+$result_get_trans_desc_1+$users,true);
        $this->load->view('template/template', $data);
    }  
    public function get_tranaction_entries_for_cycle_ajax_per_user()
    {   
        $hidden_trans_user_id   = $this->input->post('hidden_trans_user_id');
        $hidden_trans_plan_id   = $this->input->post('hidden_trans_plan_id');
        $query_get_transc_desc = $this->User_model->query("SELECT * FROM transactions WHERE transaction_plan_id = '".$hidden_trans_plan_id."' AND transaction_user_id = '".$hidden_trans_user_id."'");
        if($query_get_transc_desc->num_rows() > 0)
        {
            $result_get_transc_desc = $query_get_transc_desc->result_array();

            echo json_encode($result_get_transc_desc);
        }else{
            $result_get_transc_desc = '';
        }
    }    
    public function statements()
    {
        $id = $this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Application Review',$id);
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
            redirect(base_url() . 'dashboard');
        }
       if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
            redirect(base_url() . 'dashboard');
        } else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
            if($check_tab_rights[0]['all_rights']==0 && $check_tab_rights[0]['edit_right']==0)
            redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];

        $query_users = $this->User_model->query("SELECT * FROM users WHERE login_type ='user' ");
        if($query_users->num_rows() > 0)
        {
            $result_users = $query_users->result_array();
            $users['users']=$result_users;
        }else{
            $result_users = '';
            $users['users']= array();
        }
        if(isset($_POST['statement_generate_btn'])) 
        {
            $statement_start_date    = $this->input->post('statement_start_date');
            $statement_end_date      = $this->input->post('statement_end_date');
            $user_id                 = $this->input->post('hidden_user_id_statement');

            if(($statement_start_date != '') && ($statement_start_date != ''))
            {
                $query_get_statements= $this->User_model->query("SELECT * FROM transactions WHERE transaction_date BETWEEN'".date('Y-m-d',strtotime($statement_start_date))."' AND '".date('Y-m-d',strtotime($statement_end_date))."' AND transaction_user_id = '".$user_id."'");
                if($query_get_statements->num_rows() > 0)
                {
                    $result_get_statements = $query_get_statements->result_array();
                }else{
                    $result_get_statements = '';
                }
                $output ='';
                $count = '1'; 
                $debsum ='0';
                $cresum ='0';
                $balance='0';
                foreach ($result_get_statements as $key => $value) 
                {
                    $debsum+= $value['transaction_debit_amount'];
                    $cresum+= $value['transaction_credit_amount'];
                    $credit = number_format($value['transaction_credit_amount'],2);
                    $debit  = number_format($value['transaction_debit_amount'],2);
                    if($debit == '0.00')
                    {
                        if($credit == '0.00')
                        {
                            $amount = '';
                        }
                        else
                        {
                            $amount = '$ -'.$credit;
                        }
                    }
                    else
                    {
                        if($debit == '0.00')
                        {
                            $amount = '';
                        }
                        else
                        {
                            $amount = '$'.$debit;
                        }
                    }
                    $credit2 = $value['transaction_credit_amount'];
                    $debit2  = $value['transaction_debit_amount'];
                    if($debit2 == '0.00')
                    {
                        $balance= $debsum-$cresum ;
                        $balanceAmt = '$'.number_format($balance,2);
                    }
                    else
                    {
                        $balance= $debsum-$cresum ;
                        $balanceAmt = '$'.number_format($balance,2);
                    }
                    $counter = $count ++ ;
                    $counter = $count ++ ;
                    $output .= '<tr>  
                                      <td style="width:8%;">'.$counter.'</td>  
                                      <td style="width:17%;">'.date('m/d/Y',strtotime($value["transaction_date"])).'</td>  
                                      <td style="width:25%;">'.$value["transaction_description"].'</td>  
                                      <td style="width:20%;">'.$value["transaction_ref"].'</td>  
                                      <td style="width:15%;">'. $amount.'</td>  
                                      <td style="width:15%;">'.$balanceAmt.'</td>  
                           
                                    </tr>  
                                    ';  
                }


                ///////////////////// FETCH PREVIOUS BALANCE /////////////////////

                $query_Fetch_statement = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debit ,SUM(transaction_credit_amount) as credit FROM transactions WHERE transaction_user_id = '".$user_id."' AND transaction_date < CURDATE() ");
                if($query_Fetch_statement->num_rows() > 0)
                {
                    $result_Fetch_statement= $query_Fetch_statement->result_array();

                    $debit = $result_Fetch_statement['0']['debit'];
                    $credit = $result_Fetch_statement['0']['credit'];

                    $prev_balance = $debit- $credit;

                }
                else
                {
                    $result_Fetch_statement = '';
                }  


                if($prev_balance >= 0)
                {
                    $min_due =  $debit- $credit;
                }
                else
                {
                    $min_due = '0.00';

                } 

                $query_Fetch_statement2 = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debitamt ,SUM(transaction_credit_amount) as creditamt  FROM transactions WHERE transaction_user_id = '".$user_id."' AND  transaction_date = '".date('Y-m-d')."' ");
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
                if($creditamt >= 0)
                {
                    $due_amountt =  $debitamt- $creditamt;
                }
                else
                {
                    $due_amountt = '0.00';

                }

                $total = number_format(($due_amountt + $prev_balance),2);

                //////////////////////////////////
                $this->load->library('Pdf');
                  $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
                  $obj_pdf->SetCreator(PDF_CREATOR);  
                  $obj_pdf->SetTitle("Statement");  
                  $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
                  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
                  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
                  $obj_pdf->SetDefaultMonospacedFont('helvetica');  
                  $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
                  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
                  $obj_pdf->setPrintHeader(false);  
                  $obj_pdf->setPrintFooter(false);  
                  $obj_pdf->SetAutoPageBreak(TRUE, 10);  
                  $obj_pdf->SetFont('helvetica', '', 9);  
                  $obj_pdf->AddPage();  
                  $content = '';  

                  $content .= '  
                  <h4 align="center">Statement</h4><br />';
                  $content .= '<h5> Previous Balance = '.$prev_balance.'</h5><h5> Minimum Payment Due Amount = '.$min_due.'</h5><h5> Current Balance = '.$due_amountt.'</h5><h5> New Balance = '.$total.'</h5>';
                  $content .= '  
                  <table border="1" cellspacing="0" cellpadding="3" table-striped >  
                       <tr>  
                            <th width="8%">S.No</th>  
                            <th width="17%">Tranascation Date</th>  
                            <th width="25%">Tranascation Description</th>  
                            <th width="20%">Reference/Notes</th>  
                            <th width="15%">Amount</th>  
                            <th width="15%">Balance </th>  
                       </tr>  
                  ';   
                  $content .=$output;  
                  $content .= '</table>'; 
                  $obj_pdf->writeHTML($content); 
                  ob_end_clean(); 
                  $obj_pdf->Output('file.pdf', 'D'); 








                }
          
            }



        $data['content'] = $this->load->view('admin/statements',$session_data+$users,true);
        $this->load->view('template/template', $data);


    }  



    public function get_statement_balance_ajax()
    {   

        $plan_id   = $this->input->post('plan_id');
        $user_id   = $this->input->post('user_id');
        if($plan_id != '')
        {   

            // fetch bidding start date 
            $query_get_plan_details = $this->User_model->query("SELECT * FROM plans WHERE id = '".$plan_id."'");
            if($query_get_plan_details->num_rows() > 0)
            {
                $result_get_plan_details = $query_get_plan_details->result_array();
                $date_bid = $result_get_plan_details['0']['bidding_start_date'];
                $bidding_start_date = date('Y-m-d', strtotime($date_bid));
                $current_date = date('Y-m-d');

            }
            else
            {
                $result_get_plan_details = '';
                $bidding_start_date ='';
            }

            // fetch transactions between bidding start date and current date 

            $query_get_plan_transaction = $this->User_model->query("SELECT SUM(transaction_debit_amount) as debitSum ,SUM(transaction_credit_amount) as creditSum FROM transactions WHERE transaction_plan_id = '".$plan_id."' AND transaction_user_id = '".$user_id."'AND transaction_date between '".$bidding_start_date."' AND '".$current_date."'");
           
            if($query_get_plan_transaction->num_rows() > 0)
            {
                $result_get_plan_transaction = $query_get_plan_transaction->result_array();

                $debit = $result_get_plan_transaction['0']['debitSum'];
                $credit = $result_get_plan_transaction['0']['creditSum'];
                $balance = $debit - $credit;

                if($balance >= '0')
                {
                    $min_due_amt = $balance;
                }
                else
                {
                    $min_due_amt = '0.00';
                }




                $array = array(

                    'start_date'    => $bidding_start_date ,
                    'end_date'      => $current_date,
                    'min_due_amt'   => number_format($min_due_amt,2),
                    'plan_id'       => $plan_id,
                );

                echo json_encode($array);
            }
            else
            {
                $result_get_plan_transaction = '';
            }



        }

        
    }    


    public function send_reminder_email_ajax()
    {   

        $user_email_address     = $this->input->post('user_email_address');
        $user_first_name        = $this->input->post('user_first_name');
        $user_last_name         = $this->input->post('user_last_name');
        $plan_name              = $this->input->post('plan_name');
        $user_user_id_value              = $this->input->post('user_user_id_value');
        $user_plan_id_value              = $this->input->post('user_plan_id_value');


        $reset_link    = base_url().'plan-confirmation/'.$user_user_id_value.'/'.$user_plan_id_value;



          $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#120e35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Plan Reminder</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello '.$user_first_name.' '.$user_last_name.',<br><br>This is a reminder email for your <b>'.$plan_name.' </b><br>Please click the link below to accept or reject the offer within 72 hours.&nbsp;</p><p></p><a href="'.$reset_link.'"  target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color: #110d35;">Click Here</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($user_email_address);
            $this->email->subject('Plan Reminder ');
            $this->email->message($message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 

            echo '1';
        
    }

    public function saveComment(){
        $id=$this->input->post('id');
        $a_id=$this->input->post('a_id');
        $comment=$this->input->post('comments');
        $saveComment = $this->User_model->query("UPDATE user_application SET user_application_comments = '".$comment."' WHERE u_id = '".$id."' and a_id='".$a_id."'");
     } 

    public function delete_user_application_ajax()
    {   
        $user_plan_id_value=$this->input->post('user_plan_id_value');
        $user_user_id_value=$this->input->post('user_user_id_value');

        $UpdateExpireLink = $this->User_model->query("UPDATE user_application SET user_application_link_expre = '1' WHERE u_id = '".$user_user_id_value."' and user_application_plan_id='".$user_plan_id_value."'");
        
    }


    public function bidding_monitor()
    {
         $id=$this->session->userdata('id');
         $check_tab_rights=$this->checkRights('Bidding Monitor',$id);
         $rights=array();
         if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
    
        $querySelectPlans = $this->User_model->query("SELECT * FROM plans");
        if($querySelectPlans->num_rows() > 0)
        {
            $resultSelectPlans = $querySelectPlans->result();
            $data['allplans']  = $resultSelectPlans;
        }
        else
        {
            $resultSelectPlans = '';
            $data['allplans']  = '';

        }        

        $data['content'] = $this->load->view('admin/bidding_monitor',$session_data+$data,true);
        $this->load->view('template/template', $data);
    }  

    public function getBiddingCycles()
    {   

        $select_plan_value   = $this->input->post('select_plan_value');

        $query_get_bidding_cycle = $this->User_model->query("SELECT * FROM bidding_schedule where bidding_schedule_plan_id = '".$select_plan_value."' ");
        if($query_get_bidding_cycle->num_rows() > 0)
        {
            $result_get_bid_cycle = $query_get_bidding_cycle->result_array();

            echo json_encode($result_get_bid_cycle);
        }
        else
        {
            $result_get_bid_cycle = '';
        
        }
    }    

    public function getEnrolledPLanUsers()
    {   

        $select_plan_value   = $this->input->post('select_plan_value');

        $query_get_bidding_cycle = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$select_plan_value."' AND user_application_plan_confirmation = '1' ");
        if($query_get_bidding_cycle->num_rows() > 0)
        {
            $result_get_bid_cycle = $query_get_bidding_cycle->result_array();
            echo json_encode($result_get_bid_cycle);
        }
        else
        {
            $result_get_bid_cycle = '';
        }
    }    

    public function getBiddingData()
    {   

        $select_plan_value   = $this->input->post('select_plan_value');

        $query_get_bidding_cycle = $this->User_model->query("SELECT * FROM bidding_details where bidding_plan_id = '".$select_plan_value."'");
        if($query_get_bidding_cycle->num_rows() > 0)
        {
            $result_get_bid_cycle = $query_get_bidding_cycle->result_array();
            echo json_encode($result_get_bid_cycle);
        }
        else
        {
            $result_get_bid_cycle = '';
        }
    }    

    public function getBiddingDataOnChangeCycle()
    {   

        $select_plan_value   = $this->input->post('select_plan_value');
        $select_cycle_value   = $this->input->post('select_cycle_value');

        $query_get_bidding_cycle = $this->User_model->query("SELECT * FROM bidding_details where bidding_plan_id = '".$select_plan_value."' AND bidding_cycle_count ='".$select_cycle_value."'");
        if($query_get_bidding_cycle->num_rows() > 0)
        {
            $result_get_bid_cycle = $query_get_bidding_cycle->result_array();
            echo json_encode($result_get_bid_cycle);
        }
        else
        {
            $result_get_bid_cycle = '';
        }
    }    

    public function getBiddingDataOnChangeUser()
    {   

        $select_plan_value   = $this->input->post('select_plan_value');
        $select_cycle_value   = $this->input->post('select_cycle_value');
        $select_user_value   = $this->input->post('select_user_value');

        $query_get_bidding_cycle = $this->User_model->query("SELECT * FROM bidding_details where bidding_plan_id = '".$select_plan_value."' AND bidding_cycle_count ='".$select_cycle_value."' AND bidding_user_id = '".$select_user_value."'");
        if($query_get_bidding_cycle->num_rows() > 0)
        {
            $result_get_bid_cycle = $query_get_bidding_cycle->result_array();
            echo json_encode($result_get_bid_cycle);
        }
        else
        {
            $result_get_bid_cycle = '';
        }
    }    

    public function get_no_of_statements()
    {   

        $plan_id   = $this->input->post('plan_id');
        $user_id   = $this->input->post('user_id');

        $query_get_no_statement = $this->User_model->query("SELECT * FROM statements where statement_plan_id = '".$plan_id."' AND statement_user_id ='".$user_id."' ");
        if($query_get_no_statement->num_rows() > 0)
        {
            $result_get_no_statement = $query_get_no_statement->result_array();
            echo json_encode($result_get_no_statement);
        }
        else
        {
            $result_get_no_statement = '';
        }
    }    

    public function getBiddingPlanOnDateChange()
    {   

        $bidding_monitor_date   = date('Y-m-d');
        $bidding_monitor_enddate   =  $this->input->post('bidding_monitor_enddate');
        $bidding_monitor_Startdate   =  $this->input->post('bidding_monitor_date');


        $query_get_no_statement = $this->User_model->query("SELECT * FROM plans WHERE bidding_start_date BETWEEN '".date('Y-m-d',strtotime($bidding_monitor_Startdate))."'  AND  '".date('Y-m-d',strtotime($bidding_monitor_enddate))."' ");
        if($query_get_no_statement->num_rows() > 0)
        {
            
            $result_get_no_statement = $query_get_no_statement->result_array();
            echo json_encode($result_get_no_statement);
        }
        else
        {
            $result_get_no_statement = '';
        }
        

    }    

    public function getBiddingLivePlan()
    {   

        $bidding_monitor_date   = date('Y-m-d');
        $bidding_monitor_enddate   =  $this->input->post('bidding_monitor_enddate');
        $bidding_monitor_Startdate   =  $this->input->post('bidding_monitor_date');


        $query_get_no_statement = $this->User_model->query("SELECT * FROM plans WHERE date(bidding_start_date) = '".$bidding_monitor_date."' ");
        if($query_get_no_statement->num_rows() > 0)
        {
            
            $result_get_no_statement = $query_get_no_statement->result_array();
            echo json_encode($result_get_no_statement);
        }
        else
        {
            $result_get_no_statement = '';
        }
        

    }    

    public function getBiddingPlanOnDefault()
    {   

        $bidding_monitor_date   = date('Y-m-d');
        $new_time = date("Y-m-d H:i", strtotime('+24 hours', strtotime($bidding_monitor_date))); // $now + 3 hours

        $date_new = date("Y-m-d",strtotime($new_time)) ;

        $query_get_no_statement = $this->User_model->query("SELECT * FROM plans WHERE date(bidding_start_date) <= '".$date_new."' AND date(bidding_start_date) > '".$bidding_monitor_date."'");
        if($query_get_no_statement->num_rows() > 0)
        {
            $result_get_no_statement = $query_get_no_statement->result_array();
            echo json_encode($result_get_no_statement);
        }
        else
        {
            $result_get_no_statement = '';
        }
        

    }


    public function settings()
    { 
        $id =$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Settings',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
    

        $data['content'] = $this->load->view('admin/settings/settings',$session_data,true);
        $this->load->view('template/template', $data);
    }    

    public function terms_setting()
    {
        $id =$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Settings',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
        }else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
            $rights['rights']=$check_tab_rights;
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        
        // Updating terms and conditions 

        if(isset($_POST['update_terms']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('simplemde'));

              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_terms= $summernote_text WHERE setting_id = '1'");

        }


        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $result_selectterms['result_selectterms']=$result_selectterms['0']['setting_terms'];
        }
        else
        {
            $result_get_no_statement = '';
            $result_selectterms['result_selectterms'] ='';

        }



        $data['content'] = $this->load->view('admin/settings/terms_setting',$session_data+$result_selectterms+$rights,true);
        $this->load->view('template/template', $data);
    } 
         

    public function aboutus_setting()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        
        // Updating terms and conditions 

        if(isset($_POST['update_terms']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('simplemde'));

              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_about_us=$summernote_text WHERE setting_id = '1'");

        }


        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_about_us['setting_about_us']=$result_selectterms['0']['setting_about_us'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_about_us['setting_about_us'] ='';

        }



        $data['content'] = $this->load->view('admin/settings/edit_about_us',$session_data+$setting_about_us,true);
        $this->load->view('template/template', $data);
    }     

    public function investing_setting()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        
        // Updating terms and conditions 

        if(isset($_POST['update_terms']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('simplemde'));

              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_investing=$summernote_text WHERE setting_id = '1'");

        }


        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_investing['setting_investing']=$result_selectterms['0']['setting_investing'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_investing['setting_investing'] ='';

        }



        $data['content'] = $this->load->view('admin/settings/edit_investing',$session_data+$setting_investing,true);
        $this->load->view('template/template', $data);
    }   

    public function EXPORT_DATABASE($host,$user,$pass,$name,       $tables=false, $backup_name=false)
        { 
            set_time_limit(3000); $mysqli = new mysqli($host,$user,$pass,$name); $mysqli->select_db($name); $mysqli->query("SET NAMES 'utf8'");
            $queryTables = $mysqli->query('SHOW TABLES'); while($row = $queryTables->fetch_row()) { $target_tables[] = $row[0]; }   if($tables !== false) { $target_tables = array_intersect( $target_tables, $tables); } 
            $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `".$name."`\r\n--\r\n\r\n\r\n";
            foreach($target_tables as $table){
                if (empty($table)){ continue; } 
                $result = $mysqli->query('SELECT * FROM `'.$table.'`');     $fields_amount=$result->field_count;  $rows_num=$mysqli->affected_rows;     $res = $mysqli->query('SHOW CREATE TABLE '.$table); $TableMLine=$res->fetch_row(); 
                $content .= "\n\n".$TableMLine[1].";\n\n";   $TableMLine[1]=str_ireplace('CREATE TABLE `','CREATE TABLE IF NOT EXISTS `',$TableMLine[1]);
                for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
                    while($row = $result->fetch_row())  { //when started (and every after 100 command cycle):
                        if ($st_counter%100 == 0 || $st_counter == 0 )  {$content .= "\nINSERT INTO ".$table." VALUES";}
                            $content .= "\n(";    for($j=0; $j<$fields_amount; $j++){ $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); if (isset($row[$j])){$content .= '"'.$row[$j].'"' ;}  else{$content .= '""';}     if ($j<($fields_amount-1)){$content.= ',';}   }        $content .=")";
                        //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                        if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {$content .= ";";} else {$content .= ",";} $st_counter=$st_counter+1;
                    }
                } $content .="\n\n\n";
            }
            $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
            $backup_name = $backup_name ? $backup_name : $name.'___('.date('H-i-s').'_'.date('d-m-Y').').sql';
            ob_get_clean(); header('Content-Type: application/octet-stream');  header("Content-Transfer-Encoding: Binary");  header('Content-Length: '. (function_exists('mb_strlen') ? mb_strlen($content, '8bit'): strlen($content)) );    header("Content-disposition: attachment; filename=\"".$backup_name."\""); 
            echo $content; exit;
        }

    public function backup_database()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        
        // Updating terms and conditions 

        $this->EXPORT_DATABASE("localhost","dhrivum5_committi","committi@1234","dhrivum5_committi" );
    }

      public function add_new_faqs(){
            $result                         = '';
            $recursive_session_value        = $this->session_data_recursive($result);
            $session_data['session_data']   = $recursive_session_value['0'];
        
        // Updating terms and conditions 
        if(isset($_POST['update_faqs']))
        {
             $faqs_settings_id=$this->input->post('faqs_settings_id');
             $faqs_settings_heading=$this->db->escape($this->input->post('faqs_settings_heading'));
             $faqs_settings_description=$this->db->escape($this->input->post('faqs_settings_description'));
             $UpdateTerms = $this->User_model->query("UPDATE faqs_settings SET faqs_settings_heading=$faqs_settings_heading,faqs_settings_description=$faqs_settings_description WHERE faqs_settings_id ='".$faqs_settings_id."'");
             $this->session->set_flashdata('update_msg', 'FAQ updated successfully');
             redirect('add-new-faqs/'.base64_encode($faqs_settings_id));
        }
        if(isset($_POST['save_faqs']))
        {  

                    if(isset($_SESSION['faqs_token']))
                    {
                        if(isset($_POST['faqs_token']))
                        {
                            if($_POST['faqs_token']==$_SESSION['faqs_token'])
                            {  
                                $faqs_settings_heading=$this->db->escape($this->input->post('faqs_settings_heading'));
                                $faqs_settings_description=$this->db->escape($this->input->post('faqs_settings_description'));
                                $add_faqs = $this->User_model->query("insert into  faqs_settings (`faqs_settings_heading`,`faqs_settings_description`) values($faqs_settings_heading,$faqs_settings_description)");
                                $this->session->set_flashdata('success_msg', 'FAQ added successfully');

                                unset($_SESSION['faqs_token']);
                            }
                        }
                    }
        }
        if($this->uri->segment(2)!=''){
        $faqs_setting_id=base64_decode($this->uri->segment(2));
        $fetch_faqs_data = $this->User_model->query("SELECT * FROM faqs_settings WHERE faqs_settings_id ='".$faqs_setting_id."' ");
        if($fetch_faqs_data->num_rows() > 0)
        {
            $result_selectterms = $fetch_faqs_data->result_array();
            $setting_faqs['setting_faqs']=$result_selectterms;
        }else{
           $setting_faqs['setting_faqs'] =''; 
        }
        }
        else
        {
            $setting_faqs['setting_faqs']='';
        }
        $data['content'] = $this->load->view('admin/settings/faqs/add_new_faqs',$session_data+$setting_faqs,true);
        $this->load->view('template/template', $data); 
    }

    public function faqs_setting_page()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];

        $fetch_faqs_setting=$this->User_model->query("select * from faqs_settings");
        if($fetch_faqs_setting->num_rows()>0){
           $setting_faqs_array['setting_faqs_array']=$fetch_faqs_setting->result();
        }else{
          $setting_faqs_array['setting_faqs_array']='';
        }
        $data['content'] = $this->load->view('admin/settings/faqs/setting_faqs',$session_data+$setting_faqs_array,true);
        $this->load->view('template/template', $data);
    }

     public function deleteFaqs(){
        $faqs_settings_id=$this->input->post('faqs_id');
        if($faqs_settings_id!=''){
            $this->User_model->query("Delete from faqs_settings where faqs_settings_id='".$faqs_settings_id."'");
            echo '1';
        }
     }
      public function saveFaqsForBiddingPage(){
         $this->User_model->query("update faqs_settings set faqs_settings_show_faqs_for_bidding_page='0' where faqs_settings_show_faqs_for_bidding_page='1'");
         $faqs_setting_ids_array=$this->input->post('faqs_setting_ids');
         $faqs_setting_ids=implode(',',$faqs_setting_ids_array);
         $this->User_model->query("update faqs_settings set faqs_settings_show_faqs_for_bidding_page='1' where faqs_settings_id in($faqs_setting_ids)");
        echo '1';
     }
   

   public function setting_news_release(){
       $result                         = '';
            $recursive_session_value        = $this->session_data_recursive($result);
            $session_data['session_data']   = $recursive_session_value['0'];
        
        // Updating terms and conditions 
        if(isset($_POST['update_news_release']))
        {
             $news_release_settings_id=$this->input->post('news_release_settings_id');
             $news_release_settings_heading=$this->db->escape($this->input->post('news_release_settings_heading'));
             $news_release_settings_description=$this->db->escape($this->input->post('news_release_settings_description'));
             $UpdateTerms = $this->User_model->query("UPDATE news_release_settings SET news_release_settings_heading=$news_release_settings_heading,news_release_settings_description=$news_release_settings_description ,news_release_settings_updated_at='".date('Y-m-d H:i:s')."' WHERE news_release_settings_id ='".$news_release_settings_id."'");
             $this->session->set_flashdata('update_msg', 'News Release updated successfully');
             redirect('setting-news-release/'.base64_encode($news_release_settings_id));
        }
        if(isset($_POST['save_news_release']))
        {  
            if (isset($_SESSION['news_release_token']))
            {
            if (isset($_POST['news_release_token']))
            {
            if ($_POST['news_release_token']== $_SESSION['news_release_token'])
            {
           $news_release_settings_heading=$this->db->escape($this->input->post('news_release_settings_heading'));
            $news_release_settings_description=$this->db->escape($this->input->post('news_release_settings_description'));
            $add_news_release= $this->User_model->query("insert into  news_release_settings (`news_release_settings_heading`,`news_release_settings_description`,`news_release_settings_created_at`) values($news_release_settings_heading,$news_release_settings_description,'".date('Y-m-d H:i:s')."')");
               $this->session->set_flashdata('success_msg', 'News Release added successfully');

               unset($_SESSION['news_release_token']);
            }
            }
            }
           
        }
        if($this->uri->segment(2)!=''){
        $news_release_setting_id=base64_decode($this->uri->segment(2));
        $fetch_news_release_data = $this->User_model->query("SELECT * FROM news_release_settings WHERE news_release_settings_id ='".$news_release_setting_id."' ");
        if($fetch_news_release_data->num_rows() > 0)
        {
            $result_selectterms = $fetch_news_release_data->result_array();
            $setting_news_release['setting_news_release']=$result_selectterms;
        }else{
           $setting_news_release['setting_news_release'] =''; 
        }
        }
        else
        {
            $setting_news_release['setting_news_release']='';
        }
        $data['content'] = $this->load->view('admin/settings/newsrelease/news_release',$session_data+$setting_news_release,true);
        $this->load->view('template/template', $data); 
   }


   public function news_release_setting_page()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];

        $fetch_news_release_setting=$this->User_model->query("select * from  news_release_settings");
        if($fetch_news_release_setting->num_rows()>0){
           $setting_news_release_array['setting_news_release_array']=$fetch_news_release_setting->result();
        }else{
          $setting_news_release_array['setting_news_release_array']='';
        }
        $data['content'] = $this->load->view('admin/settings/newsrelease/setting_news_release',$session_data+$setting_news_release_array,true);
        $this->load->view('template/template', $data);
    }

     public function deletenewsRelease(){
        $news_release_settings_id=$this->input->post('news_release_id');
        if($news_release_settings_id!=''){
            $this->User_model->query("Delete from news_release_settings where news_release_settings_id='".$news_release_settings_id."'");
            echo '1';
        }
     }






    
    public function privacy_setting()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_privacy']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('privacy'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_privacy=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_privacy['setting_privacy']=$result_selectterms['0']['setting_privacy'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_privacy['setting_privacy'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/edit_setting_privacy',$session_data+$setting_privacy,true);
        $this->load->view('template/template', $data);
    }      

     public function setting_step_guide()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
    

        $data['content'] = $this->load->view('admin/settings/step_guide/settings_step_guide',$session_data,true);
        $this->load->view('template/template', $data); 
    }
      public function setting_step_guide1()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_1']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_1'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_1=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_1['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_step_guide_1['setting_step_guide_1'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide1',$session_data+$setting_step_guide_1,true);
        $this->load->view('template/template', $data);

    }
    public function setting_step_guide2()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_2']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_2'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_2=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_2['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_step_guide_2['setting_step_guide_2'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide2',$session_data+$setting_step_guide_2,true);
        $this->load->view('template/template', $data);
    }
    public function setting_step_guide3()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_3']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_3'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_3=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_3['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_step_guide_3['setting_step_guide_3'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide3',$session_data+$setting_step_guide_3,true);
        $this->load->view('template/template', $data);
    }
    public function setting_step_guide4()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_4']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_4'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_4=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_4['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_step_guide_4['setting_step_guide_4'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide4',$session_data+$setting_step_guide_4,true);
        $this->load->view('template/template', $data);   
    }
    public function setting_step_guide5()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_5']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_5'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_5=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_5['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_step_guide_5['setting_step_guide_5'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide5',$session_data+$setting_step_guide_5,true);
        $this->load->view('template/template', $data);
    }
    public function setting_step_guide6(){
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_6']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_6'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_6=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_6['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_step_guide_6['setting_step_guide_6'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide6',$session_data+$setting_step_guide_6,true);
        $this->load->view('template/template', $data); 
    }
    public function setting_step_guide7()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_7']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_7'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_7=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_7['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_step_guide_7['setting_step_guide_7'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide7',$session_data+$setting_step_guide_7,true);
        $this->load->view('template/template', $data);
    }
    public function setting_step_guide8()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_8']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_8'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_8= $summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_8['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
        }
        else
        {
            $result_get_no_statement = '';
            $setting_step_guide_8['setting_step_guide_8'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide8',$session_data+$setting_step_guide_8,true);
        $this->load->view('template/template', $data);
    }
    public function setting_step_guide9()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_9']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_9'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_9=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_9['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
        }
        else
        {
            $setting_step_guide_9['setting_step_guide_9'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide9',$session_data+$setting_step_guide_9,true);
        $this->load->view('template/template', $data);
    }
    public function setting_step_guide10(){
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_10']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_10'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_10=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_10['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
        }
        else
        {
            $setting_step_guide_10['setting_step_guide_10'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide10',$session_data+$setting_step_guide_10,true);
        $this->load->view('template/template', $data);
    }
    public function setting_step_guide11()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_11']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_11'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_11=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_11['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
        }
        else
        {
            $setting_step_guide_11['setting_step_guide_11'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide11',$session_data+$setting_step_guide_11,true);
        $this->load->view('template/template', $data);  
    }
    public function setting_step_guide12()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_step_guide_12']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('setting_step_guide_12'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_step_guide_12=$summernote_text WHERE setting_id = '1'");

        }

        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($selectterms->num_rows() > 0)
        {
            $result_selectterms = $selectterms->result_array();
            $setting_step_guide_12['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
        {
            $setting_step_guide_1['setting_step_guide_12'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/step_guide/edit_setting_step_guide12',$session_data+$setting_step_guide_12,true);
        $this->load->view('template/template', $data);
    }

    public function setting_disclaimer()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        // Updating terms and conditions 

        if(isset($_POST['update_disclaimer']))
        {
             $summernote_text   =  $this->db->escape($this->input->post('disclaimer'));
              $UpdateTerms = $this->User_model->query("UPDATE settings SET setting_disclaimer=$summernote_text WHERE setting_id = '1'");
        }

        $setting_disclaimer_data = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
        if($setting_disclaimer_data->num_rows() > 0)
        {
            $result_setting_disclaimer= $setting_disclaimer_data->result_array();
            $setting_disclaimer['setting_disclaimer']=$result_setting_disclaimer['0']['setting_disclaimer'];
        }
        else
        {
            $setting_disclaimer['setting_disclaimer'] ='';

        }
        $data['content'] = $this->load->view('admin/settings/edit_setting_disclaimer',$session_data+$setting_disclaimer,true);
        $this->load->view('template/template', $data);
    }
    public function dropdown()
    { 
        $id =$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Settings',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $data['content'] = $this->load->view('admin/settings/dropdown/dropdown',$session_data,true);
        $this->load->view('template/template', $data);
    } 
     public function residential_dropdown()
    { 
        $id =$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Settings',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
        }else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
          $rights['rights']=$check_tab_rights;
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $data['content'] =$this->load->view('admin/settings/dropdown/residential_dropdown',$session_data+$rights,true);
        $this->load->view('template/template',$data);
    } 
    public function insert_residential_status()
    {
        $residential_status=$this->input->post('residential_status');
        if($residential_status!=''){
            $check_status_exist=$this->User_model->query('select * from dropdown_values where dropdown_values_name="'.$residential_status.'" and dropdown_values_type="residential status"');
            if($check_status_exist->num_rows()>0){
                echo '2';
            }else{
                $insertResidentialStatus=$this->User_model->query('insert into dropdown_values (`dropdown_values_name`,`dropdown_values_type`) values("'.$residential_status.'","residential status")');
                echo '1';
            }
        }
    }
    public function get_residential_status_list(){
        $fetch_residential_list=$this->User_model->query('select * from dropdown_values where dropdown_values_type="residential status"');
        if($fetch_residential_list->num_rows()>0){
            $result=$fetch_residential_list->result_array();
            }
            else{
                $result='';
            }
            echo json_encode($result);
    }
    public function edit_residential_status(){
        $residential_status_id=$this->input->post('residential_status_id');
        $fetch_residential_status=$this->User_model->query("select *from dropdown_values where dropdown_values_id='".$residential_status_id."'");
        if($fetch_residential_status->num_rows()>0){
            $result=$fetch_residential_status->result();
        }else{
            $result='';
        }
         echo json_encode($result);
    }
    public function update_residential_status(){
        $residential_status=$this->input->post('residential_status');
        $residential_status_id=$this->input->post('residential_status_id');
        $this->User_model->query("update dropdown_values set dropdown_values_name='".$residential_status."' where dropdown_values_id='".$residential_status_id."'");
        echo '1';
    }
    public function delete_residential_status(){
        $residential_status_id=$this->input->post('residential_status_id');
        $this->User_model->query("DELETE from dropdown_values where dropdown_values_id='".$residential_status_id."'");
        echo '1';
    }

     public function committiiJoiningReasonDropdown()
    { 
       $id =$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Settings',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
        redirect(base_url() . 'dashboard');
        }else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
          $rights['rights']=$check_tab_rights;
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $data['content'] =$this->load->view('admin/settings/dropdown/committi_joining_reason',$session_data+$rights,true);
        $this->load->view('template/template',$data);
    } 

    public function insert_committi_joining_reason()
    {
        $commiti_reason=$this->input->post('committi_reason_name');
        if($commiti_reason!=''){
            $check_commiti_reason_exist=$this->User_model->query('select * from dropdown_values where dropdown_values_name="'.$commiti_reason.'" and dropdown_values_type="commiti_joining_reasons"');
            if($check_commiti_reason_exist->num_rows()>0){
                echo '2';
            }else{
                $insert_commiti_reason=$this->User_model->query('insert into dropdown_values (`dropdown_values_name`,`dropdown_values_type`) values("'.$commiti_reason.'","committi_joining_reasons")');
                echo '1';
            }
        }
    }   

    public function get_committi_joining_reasons_list(){
        $committi_joining_reasons_list=$this->User_model->query('select * from dropdown_values where dropdown_values_type="committi_joining_reasons"');
        if($committi_joining_reasons_list->num_rows()>0){
            $result=$committi_joining_reasons_list->result_array();
            }
            else{
                $result='';
            }
            echo json_encode($result);
    }
    public function edit_committi_joining_reason(){
        $committi_reason_id=$this->input->post('committi_reason_id');
        $fetch_committi_joining_reason_data=$this->User_model->query("select *from dropdown_values where dropdown_values_id='".$committi_reason_id."'");
        if($fetch_committi_joining_reason_data->num_rows()>0){
            $result=$fetch_committi_joining_reason_data->result();
        }else{
            $result='';
        }
         echo json_encode($result);
    }
    public function update_committi_joining_reason(){
        $committi_reason_name=$this->input->post('committi_reason_name');
        $committi_reason_id=$this->input->post('committi_reason_id');
        $this->User_model->query("update dropdown_values set dropdown_values_name='".$committi_reason_name."' where dropdown_values_id='".$committi_reason_id."'");
        echo '1';
    }
    public function delete_committi_joining_reason(){
        $committi_reason_id=$this->input->post('committi_reason_id');
        $this->User_model->query("DELETE from dropdown_values where dropdown_values_id='".$committi_reason_id."'");
        echo '1';
    }






       public function createAdmin()
    {
        if($this->session->userdata('s_admin')!='1'){
            redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $data['content'] = $this->load->view('admin/create_admin',$session_data,true);
        $this->load->view('template/template', $data);

    }
    public function storeAdmin()
    {
        $username=$this->input->post('email');
        $check_username=$this->User_model->query('select * from users where username="'.$username.'"');
        if($check_username->num_rows()>0)
        {
            echo '2';
        }
        else
        {
             $now=date('Y-m-d H:i:s');
             $config['upload_path'] ='assets/media/profile_images';
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $new_image_name= $now.'-'.$_FILES['profile_image']['name'];
             $config['file_name'] = $new_image_name;
             //Load upload library and initialize configuration
             $this->load->library('upload',$config);
             $this->upload->initialize($config);
             if($this->upload->do_upload('profile_image'))
             {
                $uploadData = $this->upload->data();
                $profile_image = $uploadData['file_name'];
             }
             else
             {
                $profile_image = '';
             }
            $admin_data=array(
            'first_name'=>$this->input->post('first_name'),
            'last_name'=>$this->input->post('last_name'),
            'middle_name'=>$this->input->post('middle_name'),
            'username'=>$this->input->post('email'),
            'password'=>md5($this->input->post('password')),
            'profile_image'=>$profile_image,
            'login_type'=>'admin',
            's_admin'=>'0',
            'dob'=>date('Y-m-d',strtotime($this->input->post('dob'))),
            );
            $this->User_model->insertdata('users',$admin_data);
            $user_id = $this->db->insert_id();
            $this->db->query("insert into admin_accesses (`user_id`,`admin_accesses_tab_list_id`,`view_right`,`edit_right`,`all_rights`) values('".$user_id."','1','1','1','1')");
            echo '1';
        }
    }
    public function viewOtherAdmin()
    {
        if($this->session->userdata('s_admin')!='1'){
            redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $view_admin_data['session_data']   = $recursive_session_value['0'];
        $admin_id=base64_decode($this->uri->segment(2));
        $fetch_other_admin=$this->User_model->query("SELECT * from users where id='".$admin_id."' and login_type='admin' and s_admin='0'");
        if($fetch_other_admin->num_rows()>0){
            $view_admin_data['fetch_other_admin_details']=$fetch_other_admin->result_array();
        }
        else{
            $view_admin_data['fetch_other_admin_details']='';
        }
        $fetch_tabs=$this->User_model->query("SELECT * from tab_list left join admin_accesses on tab_list.tab_list_id=admin_accesses.admin_accesses_tab_list_id and user_id='".$admin_id."'");
        if($fetch_tabs->num_rows()>0){
            $view_admin_data['tab_rights_details']=$fetch_tabs->result_array();
        }
        else{
               $fetch_tabs=$this->User_model->query("SELECT * from tab_list");
               if($fetch_tabs->num_rows()>0){
                $view_admin_data['tab_rights_details']=$fetch_tabs->result_array();
            }
                // $view_admin_data['tab_rights_details']='';
        }

        $data['content'] = $this->load->view('admin/create_admin',$view_admin_data,true);
        $this->load->view('template/template', $data);
    }
    function grantAllRights()
    {
        $tab_id=$this->input->post('tab_id');
        $user_id=$this->input->post('user_id');
        $check_tab_access=$this->User_model->query('select * from admin_accesses where admin_accesses_tab_list_id="'.$tab_id.'" and user_id="'.$user_id.'"');
        if($check_tab_access->num_rows()>0){
            $this->db->query("update admin_accesses  set all_rights='1' where user_id='".$user_id."' and admin_accesses_tab_list_id='".$tab_id."'");
            echo 1;
        }
        else{
        $this->db->query("insert into admin_accesses (`user_id`,`admin_accesses_tab_list_id`,`view_right`,`edit_right`,`all_rights`) values('".$user_id."','".$tab_id."','0','0','1')");
        echo 1;
        }
    }
    function revokeAllRights(){
        $tab_id=$this->input->post('tab_id');
        $user_id=$this->input->post('user_id');
        $this->db->query("update admin_accesses  set all_rights='0' where user_id='".$user_id."' and admin_accesses_tab_list_id='".$tab_id."'");
        echo 1;
    }
    function editAddRightToTheAdmin(){
        $tab_id=$this->input->post('tab_id');
        $user_id=$this->input->post('user_id');
        $check_tab_access=$this->User_model->query('select * from admin_accesses where admin_accesses_tab_list_id="'.$tab_id.'" and user_id="'.$user_id.'"');
        if($check_tab_access->num_rows()>0){
            $this->db->query("update admin_accesses  set edit_right='1' where user_id='".$user_id."' and admin_accesses_tab_list_id='".$tab_id."'");
            echo 1;
        }
        else{
        $this->db->query("insert into admin_accesses (`user_id`,`admin_accesses_tab_list_id`,`view_right`,`edit_right`,`all_rights`) values('".$user_id."','".$tab_id."','0','1','0')");
        echo 1;
        }
    }
    function revokeEditAddRightFromTheAdmin(){
        $tab_id=$this->input->post('tab_id');
        $user_id=$this->input->post('user_id');
        $this->db->query("update admin_accesses  set edit_right='0' where user_id='".$user_id."' and admin_accesses_tab_list_id='".$tab_id."'");
        echo 1;
    }
    function viewRightToTheAdmin(){
        $tab_id=$this->input->post('tab_id');
        $user_id=$this->input->post('user_id');
        $check_tab_access=$this->User_model->query('select * from admin_accesses where admin_accesses_tab_list_id="'.$tab_id.'" and user_id="'.$user_id.'"');
        if($check_tab_access->num_rows()>0){
            $this->db->query("update admin_accesses  set view_right='1' where user_id='".$user_id."' and admin_accesses_tab_list_id='".$tab_id."'");
            echo 1;
        }
        else{
        $this->db->query("insert into admin_accesses (`user_id`,`admin_accesses_tab_list_id`,`view_right`,`edit_right`,`all_rights`) values('".$user_id."','".$tab_id."','1','0','0')");
        echo 1;
        }     
    }
    function revokeViewRightFromTheAdmin()
    {
        $tab_id=$this->input->post('tab_id');
        $user_id=$this->input->post('user_id');
        $this->db->query("update admin_accesses  set view_right='0' where user_id='".$user_id."' and admin_accesses_tab_list_id='".$tab_id."'");
        echo 1;
    }
    public function updateOtherAdmin()
    {
        $now=date('Y-m-d H:i:s');
         $where=array('id'=>$this->input->post('admin_id'),);
         if($_FILES['profile_image']['name']!='')
         {
             $unlink_image=$this->User_model->query("select profile_image from users where id='".$this->input->post('admin_id')."' and profile_image!=''");
            if($unlink_image->num_rows()>0){
                $image=$unlink_image->result_array();
            //    $base_url=base_url();
            //    $image_path=str_replace($base_url,'',$image[0]['profile_image']);
               $image_path='assets/media/profile_images/'.$image[0]['profile_image'];
               if (file_exists($image_path)){
               unlink($image_path);
               }
            }
        }
         $config['upload_path'] ='assets/media/profile_images';
         $config['allowed_types'] = 'jpg|jpeg|png|gif';
         $config['file_name'] = $now.'-'.$_FILES['profile_image']['name'];
        //  print_r($_FILES);

         //Load upload library and initialize configuration
         $this->load->library('upload',$config);
         $this->upload->initialize($config);
         if($this->upload->do_upload('profile_image'))
         {
             $uploadData = $this->upload->data();
             $profile_image= $uploadData['file_name'];
         }
         else
         {
             $profile_image = '';
         } 

         if($this->input->post('password')!=''){
            $admin_data=array(
                'first_name'=>$this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'middle_name'=>$this->input->post('middle_name'),
                'username'=>$this->input->post('email'),
                'password'=>md5($this->input->post('password')),
                'profile_image'=>$profile_image,
                'dob'=>date('Y-m-d',strtotime($this->input->post('dob'))),
            );
         }else{
            $admin_data=array(
                'first_name'=>$this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'middle_name'=>$this->input->post('middle_name'),
                'username'=>$this->input->post('email'),
                'profile_image'=>$profile_image,
                'dob'=>date('Y-m-d',strtotime($this->input->post('dob'))),
            );
         }
         $updateAdminData=$this->User_model->updatedata('users',$where,$admin_data);
         echo '1';
    }
    public function otherAdminList()
    {
        if($this->session->userdata('s_admin')!='1'){
            redirect(base_url() . 'dashboard');
        }
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $data_admin['session_data']   = $recursive_session_value['0'];
        $fetch_other_admin=$this->User_model->query("SELECT * from users where login_type='admin' and s_admin='0'");
        if($fetch_other_admin->num_rows()>0){
            $data_admin['fetch_other_admin_details']=$fetch_other_admin->result_array();
        }
        else{
            $data_admin['fetch_other_admin_details']='';
        }
        $data['content'] = $this->load->view('admin/view_admin',$data_admin,true);
        $this->load->view('template/template', $data);
    }
    public function checkEmail()
    {
         $username=$this->input->post('username');
         $check_username=$this->User_model->query('select * from users where username="'.$username.'"');
         if($check_username->num_rows()>0){
           echo '1';
         }
    }
    public function deleteOtherAdmin()
    {
       $id=$this->input->post('id');
       if($id){
       $unlink_image=$this->User_model->query("select profile_image from users where id='".$id."' and profile_image!=''");
       if($unlink_image->num_rows()>0){
         $image=$unlink_image->result_array();
         $image_path='assets/media/profile_images/'.$image[0]['profile_image'];
          if (file_exists($image_path)){
            unlink($image_path);
          }
      }
       $this->User_model->query("DELETE from users where id='".$id."' and login_type='admin' and s_admin='0'");
       $this->User_model->query("DELETE from admin_accesses where user_id='".$id."'");
       $this->User_model->query("DELETE from admin_notes where admin_notes_u_id='".$id."'");
       $this->User_model->query("DELETE from admin_notes_meta where admin_notes_meta_u_id='".$id."'");
       $this->User_model->query("DELETE from notification where user_notification_id='".$id."' and notification_type='admin'");
       echo '1';
      }
    }

    public function insert_plan_sequence_number()
    {
        $plan_sequence_number=$this->input->post('plan_sequence_number');
        if($plan_sequence_number!=''){
            $check_plan_exist=$this->User_model->query('select * from plan_name_sequence where plan_name_sequence_number="'.$plan_sequence_number.'"');
            if($check_plan_exist->num_rows()>0){
                echo '2';
            }else{
                  $field_name='plan_sequence_'.$plan_sequence_number;
                 if(!$this->db->field_exists($field_name, 'plan_sequence')){
                   $this->User_model->query("alter table plan_sequence ADD ".$field_name." int");
                   $this->User_model->query('update plan_sequence set '.$field_name.'="1001" where plan_sequence_id="1"');
                 }
                $insertPlanSquenceNumber=$this->User_model->query('insert into plan_name_sequence (`plan_name_sequence_number`) values("'.$plan_sequence_number.'")');
                echo '1';
            }
        }
    }
    public function get_plan_sequence_list(){
        $fetch_plan_sequence_list=$this->User_model->query('select * from plan_name_sequence');
        if($fetch_plan_sequence_list->num_rows()>0){
            $result=$fetch_plan_sequence_list->result_array();
            }
            else{
                $result='';
            }
            echo json_encode($result);
    }
    public function deletePlanSequenceNumber(){
        $plan_name_sequence_id=$this->input->post('plan_name_sequence_id');
        if($plan_name_sequence_id){
            $this->User_model->query('Delete from plan_name_sequence where plan_name_sequence_id="'.$plan_name_sequence_id.'"');
            echo '1';
        }
    }


    public function reject_user_application(){
        $base_url=base_url();
        $email= $this->input->post('email');
        $user_id=$this->input->post('user_user_id_value');
        $plan_id=$this->input->post('user_plan_id_value');
        $user_application_id=$this->input->post('user_application_id');
        $user_applcation_tier=$this->input->post('user_application_tier_value');
        $fecth_plan_info=$this->User_model->query("Select * from plans where id='".$plan_id."'");
        $result=$fecth_plan_info->result();

        if($user_applcation_tier=='1'){
            $plan_tier_1_left_memebers=$result[0]->plan_tier_1_left_memebers;
            $new_members_count=$plan_tier_1_left_memebers+1;
           $query="plan_tier_1_left_memebers='".$new_members_count."',";
        }else if($user_applcation_tier=='2'){
            $plan_tier_2_left_memebers=$result[0]->plan_tier_2_left_memebers;
            $new_members_count=$plan_tier_2_left_memebers+1;
            $query="plan_tier_2_left_memebers='".$new_members_count."',";
        }else if($user_applcation_tier=='3'){
             $plan_tier_3_left_memebers=$result[0]->plan_tier_3_left_memebers;
            $new_members_count=$plan_tier_3_left_memebers+1;
         $query="plan_tier_3_left_memebers='".$new_members_count."',";
        }else if($user_applcation_tier=='4'){
            $plan_tier_4_left_memebers=$result[0]->plan_tier_4_left_memebers;
            $new_members_count=$plan_tier_4_left_memebers+1;
        $query="plan_tier_4_left_memebers='".$new_members_count."',"; 
        }else{
            $query='';
        }
        if($result[0]->enrollment_left==$result[0]->total_no_appliactions)
        {
        $enrollment_left=$result[0]->enrollment_left;
        }else{
        $enrollment_left=$result[0]->enrollment_left+1;
        }

        // $update_plan_tier_count=$this->User_model->query("update plans set ".$query."enrollment_left='".$enrollment_left."' where id='".$plan_id."'");
        
        $update_user_application=$this->User_model->query("Update user_application set user_application_plan_confirmation='0',user_application_link_expre='1',user_application_tier=NULL,user_application_tier=NULL,user_application_no_bidding_cycle=NULL,user_application_offer_sent=NULL where user_application_plan_id='".$plan_id."' and u_id='".$user_id."' and  a_id='".$user_application_id."'");
        
        $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#120e35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Application Rejected</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello,<br><br>Your application has been rejected.For further enquiry,please contact with the adminstrator.</p><p></p><a href="'.$base_url.'" target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color:#120e35;">Click Here</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';     
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($email);
            $this->email->subject('Application Rejected');
            $this->email->message($message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 
        echo 1;
    }
    public function change_user_application_plan(){
        $user_id = $this->input->post('userId');
        $hidden_user_application_table_id = $this->input->post('hidden_user_application_table_id');
        $plan_id = $this->input->post('hidden_user_application_plan_id');
        $user_email_address = $this->input->post('user_email_address');
        
        $user_applcation_tier = $this->input->post('user_application_tier_id');
        
        $fecth_plan_info=$this->User_model->query("Select * from plans where id='".$plan_id."'");
        $result=$fecth_plan_info->result();

        if($user_applcation_tier=='1'){
            $plan_tier_1_left_memebers=$result[0]->plan_tier_1_left_memebers;
            $new_members_count=$plan_tier_1_left_memebers+1;
           $query="plan_tier_1_left_memebers='".$new_members_count."',";
        }else if($user_applcation_tier=='2'){
            $plan_tier_2_left_memebers=$result[0]->plan_tier_2_left_memebers;
            $new_members_count=$plan_tier_2_left_memebers+1;
            $query="plan_tier_2_left_memebers='".$new_members_count."',";
        }else if($user_applcation_tier=='3'){
             $plan_tier_3_left_memebers=$result[0]->plan_tier_3_left_memebers;
            $new_members_count=$plan_tier_3_left_memebers+1;
         $query="plan_tier_3_left_memebers='".$new_members_count."',";
        }else if($user_applcation_tier=='4'){
            $plan_tier_4_left_memebers=$result[0]->plan_tier_4_left_memebers;
            $new_members_count=$plan_tier_4_left_memebers+1;
           $query="plan_tier_4_left_memebers='".$new_members_count."',"; 
        }else{
            $query='';
        }
        if($result[0]->enrollment_left==$result[0]->total_no_appliactions)
        {
        $enrollment_left=$result[0]->enrollment_left;
        }else{
        $enrollment_left=$result[0]->enrollment_left+1;
        }

        
        $enrollment_left=$result[0]->enrollment_left+1;
        $update_plan_tier_count=$this->User_model->query("update plans set ".$query."  where id='".$plan_id."'");
        

        // UPDATE NEW PLAN IN USER APPLICATION TABLE 

        $Updateassigned_plans = $this->User_model->query("UPDATE assigned_plans SET assigned_plans_plan_id = '".$this->input->post('hidden_ajax_plan_id')."' WHERE assigned_plans_plan_id = '".$plan_id."' and assigned_plans_user_id='".$user_id."'");

        $Updateuser_application = $this->User_model->query("UPDATE user_application SET user_application_plan_name = '".$this->input->post('hidden_ajax_plan_name')."',user_application_enrollment_start_date = '".$this->input->post('hidden_ajax_enroll_start_date')."',user_application_enrollment_end_date = '".$this->input->post('hidden_ajax_enroll_end_date')."',user_application_enrollment_bidding_start_date = '".$this->input->post('hidden_ajax_bidding_start_date')."',user_application_enrollment_bidding_start_amount = '".$this->input->post('hidden_ajax_bidding_start_amount')."',user_application_plan_id = '".$this->input->post('hidden_ajax_plan_id')."',user_application_link_expre=0,user_application_plan_confirmation=NULL,user_application_tier=NULL,user_application_no_bidding_cycle=NULL,user_application_offer_sent=NULL WHERE user_application_plan_id = '".$plan_id."' and u_id='".$user_id."' and a_id='".$hidden_user_application_table_id."'");
        // SEND EMAIL TO USER FOR NEW PLAN CHANGE NOTIFICATION 
        // echo  $this->db->last_query();
        // die();
    

        ///////Decrease the application enrollment_left count for new plan
        $new_fecth_plan_info=$this->User_model->query("Select * from plans where id='".$this->input->post('hidden_ajax_plan_id')."'");
        $new_enrollment_result=$new_fecth_plan_info->result();
        if($new_enrollment_result[0]->enrollment_left!='0'){
        $new_enrollment_left=$new_enrollment_result[0]->enrollment_left-1;

        // $new_update_plan_tier_count=$this->User_model->query("update plans set enrollment_left='".$new_enrollment_left."' where id='".$this->input->post('hidden_ajax_plan_id')."'");
        }


        $email = $user_email_address;
        // $base_url=base_url();
        $base_url=base_url().'application-status';
        
        $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#120e35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Plan Confirmation</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello,<br><br>Your plan is changed to another plan for bidding.&nbsp;</p><p></p><a href="'.$base_url.'" target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color:#120e35;">Click Here</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($email);
            $this->email->subject('Plan Confirmation ');
            $this->email->message($message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 

        // UPDATE BIDDING START WITH 24 HOURS IF TIER IS NOT FULL

        // WORKING IN CRON JOB Controller
        echo '1';
    }

    public function sendUserConfirmationEmail(){
        $email = $this->input->post('email');
         $user_id = $this->input->post('user_id');
          $reset_link = base_url().'verify-email/'.$user_id;
            $password_message = '<div style="background-color: #eeeeef; padding: 50px 0;"><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center;background-color:#120e35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Email Verification</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello ,<br><br>Please verify your email before logging into committi. Click the link below to verify.&nbsp;</p><p></p><a href="'.$reset_link.'" target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color:#120e35;">Verify Email</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($email);
            $this->email->subject('Email Verification');
            $this->email->message($password_message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 
            echo 1;
    }
    public function get_bidding_history_ajax(){   
        $bidding_plan_id   = $this->input->post('bidding_plan_id');
        // $bidding_cycle_count   = $this->input->post('bidding_cycle_count');
        $query_bidding_details = $this->User_model->query("SELECT * FROM bidding_details WHERE  bidding_plan_id= '".$bidding_plan_id."' order by bidding_details_id DESC");
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
    public function payment_activities(){
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $data['session_data']           = $recursive_session_value['0'];
        $fetch_payment_information=$this->User_model->query("select * from payments inner join user_application on payments.payment_user_id=user_application.u_id where payments.payment_plan_id=user_application.user_application_plan_id order by payments.payment_id DESC");
        if($fetch_payment_information->num_rows()>0){
            $data['fetch_payment_result']=$fetch_payment_information->result_array();
        }else{
           $data['fetch_payment_result']='';
        }
        $data['content'] = $this->load->view('admin/payment_activities',$data,true);
        $this->load->view('template/template', $data);
   }

   public function change_payment_status(){
    $payment_status=$this->input->post('payment_status');
    $payment_id=$this->input->post('payment_id');
    if($payment_status!=''&& $payment_id!=''){
        $update_status=$this->User_model->query("UPDATE payments set payment_status='".$payment_status."' where payment_id='".$payment_id."'");
        echo '1';
    }
   }

////////////////////////////////Show the tier popup info on plan details tab/////////////////////////////////////

   public function tier_modal_info()
   {
        $plan_id=$this->input->post('plan_id');
        $tier_value=$this->input->post('tier_value');

        $fetch_tier_user_info=$this->User_model->query("SELECT * from user_application where user_application_tier='".$tier_value."' and user_application_plan_id='".$plan_id."'");

        if($fetch_tier_user_info->num_rows()>0)
        {
            $tier_user_result=$fetch_tier_user_info->result_array();
            echo json_encode($tier_user_result);
        }else
        {
             $tier_user_result='';
        }
   }

/////////////////////////////////////////select winner manually when there is no winner ////////////////

   public function selectWinnerManually()
   {

        $winner_id           =    $this->input->post('winner_id');
        $winning_amount      = $this->input->post('winning_amount');
        $bidding_cycle_count =    $this->input->post('bidding_cycle_count');
        $plan_id             =    $this->input->post('plan_id');

        $user_application_data=$this->User_model->query("Select * from user_application where u_id='".$winner_id."' and user_application_plan_id='".$plan_id."'");
        if($user_application_data->num_rows()>0)
        {
            $user_result=$user_application_data->result_array();
             $check_bidding_details_table=$this->User_model->query("Select * from bidding_details where bidding_user_id='".$winner_id."' and bidding_plan_id='".$plan_id."' and bidding_check_winning_bid='1'");
             if($check_bidding_details_table->num_rows()==0)
             {

                 $biddingData = array(

                        'bidding_plan_id'                        => $plan_id,
                        'bidding_user_id'                        => $winner_id,
                        'bidding_place_bid_date'                 => date('Y-m-d H:i:s'),
                        'bidding_place_bid_amount'               => $winning_amount,
                        'bidding_bidder_first_name'              => $user_result['0']['user_application_first_name'],
                        'bidding_bidder_last_name'               => $user_result['0']['user_application_last_name'],
                        'bidding_check_winning_bid'              => '1',
                        'bidding_cycle_count'                    =>$bidding_cycle_count,
                        );

                        $insertPlanData = $this->User_model->insertdata('bidding_details',$biddingData);

                        $UpdateQuery1 = $this->User_model->query("UPDATE plans SET plan_win_bid_check ='1' WHERE id ='".$plan_id."'");

                        $UpdateQuery2 = $this->User_model->query("UPDATE bidding_schedule SET bidding_cycle_winner_f ='".$user_result['0']['user_application_first_name']."' ,bidding_cycle_winner_l ='".$user_result['0']['user_application_last_name']."' , bidding_cycle_win_amount = '".$winning_amount."' , bidding_cycle_win_bid_check = '1',bidding_status='bid_over' WHERE bidding_schedule_plan_id ='".$plan_id."' AND bidding_cycle_count = '".$bidding_cycle_count."'");
                        echo '1';
               }

          
        }
    }




 // =========================================UPDATE PREVIOUS TRANSACTION BALANCE =================================//


    public function update_transaction_entries_for_cycle_ajax()
    {   
        $hidden_trans_plan_id   = $this->input->post('hidden_trans_plan_id');
        $filter_user   = $this->input->post('filter_user');
        $balancearray   = $this->input->post('balancearrays1');
        if($balancearray==NaN || $balancearray=='NaN'){
           $balancearray='0.00';   
        }

        $hidden_cycle_count   = $this->input->post('hidden_cycle_count');

        // get all plans in array
        $getallplansresultvalue = '';
        $getallplans = $this->User_model->query("SELECT * FROM plans WHERE id = '".$hidden_trans_plan_id."'");
        if($getallplans->num_rows() > 0)
        {
            $getallplansresult = $getallplans->result_array();
           $getallplansresultvalue = $getallplansresult[0]['no_bidding_cycle'];

        }
        for ($i=1; $i <=$getallplansresultvalue; $i++) { 

            $planArrayVal['Cycle_'.$i] = '';
        }


        $query_get_transc_desc1111 = $this->User_model->query("SELECT * FROM transactions WHERE transaction_plan_id = '".$hidden_trans_plan_id."' AND transaction_user_id = '".$filter_user."'");
        if($query_get_transc_desc1111->num_rows() > 0)
        {
            $result_get_transc_desc111= $query_get_transc_desc1111->result_array();

            if($result_get_transc_desc111)
            {
                $planArrayVal = unserialize($result_get_transc_desc111['0']['previous_cycle_balance']);
            }
        }
        else
        {
            $result_get_transc_desc111 = '';
            $previous_cycle_balanceArray = '' ;
        }
        if($hidden_cycle_count > 1)
        {

             $newcyclecount= $hidden_cycle_count - 1 ;
             if($filter_user != '0')
             {
                $planArrayVal['Cycle_'.$hidden_cycle_count] = $balancearray;
                $query_get_transc_desc = $this->User_model->query("UPDATE  transactions  SET previous_cycle_balance = '".serialize($planArrayVal)."' WHERE transaction_plan_id = '".$hidden_trans_plan_id."' AND transaction_user_id = '".$filter_user."' ");
             }



            $query_get_transc_desc1 = $this->User_model->query("SELECT * FROM transactions WHERE transaction_plan_id = '".$hidden_trans_plan_id."' AND transaction_user_id = '".$filter_user."' AND transaction_bidding_cycle = '".$newcyclecount."'");
            if($query_get_transc_desc1->num_rows() > 0)
            {
                $result_get_transc_desc1 = $query_get_transc_desc1->result_array();


                 $unseralaizeval = unserialize($result_get_transc_desc1[0]['previous_cycle_balance']);
                 echo $unseralaizeval['Cycle_'.$newcyclecount];

            }
            else
            {
                $result_get_transc_desc = '';
            
            }



        }
        else if($hidden_cycle_count == '1')
        {
            $planArrayVal['Cycle_'.$hidden_cycle_count] = $balancearray;


            $query_get_transc_desc = $this->User_model->query("UPDATE  transactions  SET previous_cycle_balance = '".serialize($planArrayVal)."' WHERE transaction_plan_id = '".$hidden_trans_plan_id."' AND transaction_user_id = '".$filter_user."' ");

            echo '0.00';

        }


        

    }



    public function master_statements()
    {
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $data['session_data']   = $recursive_session_value['0'];


        $query_application_plan = $this->User_model->query("SELECT * FROM plans ");
        if($query_application_plan->num_rows() > 0)
        {
            $result_application_plan = $query_application_plan->result_array();
            $data['user_application_plan']=$result_application_plan;
        }
        else
        {
            $result_application_plan = '';
            $data['user_application_plan']=array();
        }



        if(isset($_POST['statement_generate_buttons'])) 
        {
            if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
                if($check_tab_rights[0]['all_rights']==0 && $check_tab_rights[0]['edit_right']==0)
                redirect(base_url() . 'dashboard');
            }

            if(isset($_SESSION['statement_buttons_token']))
            {
                if(isset($_POST['statement_buttons_token']))
                {
                    if($_POST['statement_buttons_token']==$_SESSION['statement_buttons_token'])
                    {

                            $statement_start_date    = $this->input->post('statement_start_date_master');
                            $statement_end_date      = $this->input->post('statement_end_date_master');
                            $statement_due_date      = $this->input->post('statement_due_date_master');
                            $plan_value_id           = $this->input->post('all_plans_value');
                            $plan_usersss           = $this->input->post('plan_user');
                            $cycle_counts           = $this->input->post('bidding_cycle');


                            // select all or select one user
                            if($plan_usersss == 'all')
                            {
                                $query_get_users1 = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$plan_value_id."' ");
                            }
                            else
                            {
                                $query_get_users1 = $this->User_model->query("SELECT * FROM user_application where user_application_plan_id = '".$plan_value_id."' AND u_id = '".$plan_usersss."' ");
                            }
                            if($query_get_users1->num_rows() > 0)
                            {
                                $result_get_userss1 = $query_get_users1->result_array();
                            }
                            else
                            {
                                $result_get_userss1 = '';
                            }             
                            if($result_get_userss1!=''){
                            foreach ($result_get_userss1 as $key => $values) 
                            {
                                $todayDate = strtotime(date('Y-m-d H:i:s'));
                               $attach_file_name =FCPATH.'assets/users/statement_pdf/statement_'.$plan_value_id.'_'.$values['u_id'].'_'.$todayDate.'.pdf';
                               if (file_exists($attach_file_name))
                               {
                                    $this->session->set_flashdata('error_statement', 'error');  
                               }
                                if(($statement_start_date != '') && ($statement_start_date != ''))
                                {
                                    $query_get_statements= $this->User_model->query("SELECT * FROM transactions WHERE transaction_date >= '".date('Y-m-d',strtotime($statement_start_date))."' AND transaction_date <= '".date('Y-m-d',strtotime($statement_end_date))."' AND transaction_plan_id = '".$plan_value_id."' AND transaction_user_id = '".$values['u_id']."'");

                                    if($query_get_statements->num_rows() > 0)
                                    {
                                        $result_get_statements = $query_get_statements->result_array();
                                        $total_statement_rows=$query_get_statements->num_rows();
                                    }
                                    else
                                    {
                                        $result_get_statements = '';
                                        $total_statement_rows='';
                                    }
                                    $output ='';
                                    $count = '1'; 
                                    $debsum ='0';
                                    $cresum ='0';
                                    if($result_get_statements != '')
                                    {
                                        foreach ($result_get_statements as $key => $value) 
                                        {
                                            $debsum+= $value['transaction_debit_amount'];
                                            $cresum+= $value['transaction_credit_amount'];

                                            $credit = number_format($value['transaction_credit_amount'],2);
                                            $debit  = number_format($value['transaction_debit_amount'],2);

                                            if($debit == '0.00')
                                            {
                                                if($credit == '0.00')
                                                {
                                                    $amount = '';
                                                }
                                                else
                                                {
                                                    $amount = '$ -'.$credit;
                                                }
                                            }
                                            else
                                            {
                                                if($debit == '0.00')
                                                {
                                                    $amount = '';
                                                }
                                                else
                                                {
                                                    $amount = '$'.$debit;
                                                }
                                            }
                                            $credit2 = $value['transaction_credit_amount'];
                                            $debit2  = $value['transaction_debit_amount'];
                                            if($debit2 == '0.00')
                                            {
                                                $balance= $debsum-$cresum ;
                                                $balanceAmt = '$'.number_format($balance,2);
                                            }
                                            else
                                            {
                                                $balance= $debsum-$cresum ;
                                                $balanceAmt = '$'.number_format($balance,2);
                                            }                                           
                                            $counter = $count ++ ;
                                            $counter = $count ++ ;
                                            $output .= '<tr>  
                                                              <td style="width:8%;">'.$counter.'</td>  
                                                              <td style="width:17%;">'.date('m/d/Y',strtotime($value["transaction_date"])).'</td>  
                                                              <td style="width:25%;">'.$value["transaction_description"].'</td>  
                                                              <td style="width:20%;">'.$value["transaction_ref"].'</td>  
                                                              <td style="width:15%;">'. $amount.'</td>  
                                                              <td style="width:15%;">'.$balanceAmt.'</td>  
                                                   
                                                            </tr>  
                                                            ';  
                                        }
                                    }
                                    ///////////////////// FETCH PREVIOUS BALANCE /////////////////////

                                    $query_Fetch_statement = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debit ,SUM(transaction_credit_amount) as credit FROM transactions WHERE transaction_user_id = '".$values['u_id']."' AND transaction_date < CURDATE() AND  transaction_plan_id = '".$plan_value_id."'");
                                    if($query_Fetch_statement->num_rows() > 0)
                                    {
                                        $result_Fetch_statement= $query_Fetch_statement->result_array();

                                        $debit = $result_Fetch_statement['0']['debit'];
                                        $credit = $result_Fetch_statement['0']['credit'];
                                        $prev_balance = $debit- $credit;

                                    }
                                    else
                                    {
                                        $result_Fetch_statement = '';
                                    }  


                                    if($prev_balance >= 0)
                                    {
                                        $min_due =  $debit- $credit;
                                    }
                                    else
                                    {
                                        $min_due = '0.00';

                                    } 

                                    $query_Fetch_statement2 = $this->User_model->query("SELECT SUM(transaction_debit_amount)  as debitamt ,SUM(transaction_credit_amount) as creditamt  FROM transactions WHERE transaction_user_id = '".$values['u_id']."' AND  transaction_date = '".date('Y-m-d')."' AND  transaction_plan_id = '".$plan_value_id."'");
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
                                    if($creditamt >= 0)
                                    {
                                        $due_amountt = $debitamt- $creditamt;
                                    }
                                    else
                                    {
                                        $due_amountt = '0.00';

                                    }

                                    $total = number_format(($due_amountt + $prev_balance),2);

                                    $query_get_plan_series = $this->User_model->query("SELECT * FROM plans WHERE  id = '".$plan_value_id."' ");

                                    if($query_get_plan_series->num_rows() > 0)
                                    {
                                        $result_get_plan_series = $query_get_plan_series->result_array();
                                        $plan_amount_series     = $result_get_plan_series['0']['plan_amount_series'];
                                        $plan_series_no         = $result_get_plan_series['0']['plan_series_no'];
                                    }
                                    else
                                    {
                                        $result_get_plan_series     = '';
                                        $plan_amount_series         = '';
                                        $plan_series_no              = '';
                                    }             

                                    $query_get_user_series = $this->User_model->query("SELECT * FROM user_application WHERE  user_application_plan_id    = '".$plan_value_id."' AND u_id    = '".$values['u_id']."' ");

                                    if($query_get_user_series->num_rows() > 0)
                                    {
                                        $result_get_user_series = $query_get_user_series->result_array();
                                        $u_series        = $result_get_user_series['0']['u_series'];
                                    }
                                    else
                                    {
                                        $result_get_user_series     = '';
                                        $u_series            = '';
                                    } 
                                    $series = $u_series.' '.$plan_amount_series.' '.$plan_series_no;
                                    $transaction_counter = 0;

                                    // get due days from now date 
                                    $todaysDate = date('m/d/y');
                                    $datetime1 = new DateTime($todaysDate);
                                    $datetime2 = new DateTime($statement_due_date);
                                    $difference = $datetime1->diff($datetime2);
                                    $duedaysNumeric  = $difference->d;
                                    //////////////////////////////////
                                      $this->load->library('Pdf');
                                      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
                                      $obj_pdf->SetCreator(PDF_CREATOR);  
                                      $obj_pdf->SetTitle("Statement");  
                                      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
                                      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
                                      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
                                      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
                                      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
                                      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
                                      $obj_pdf->setPrintHeader(false);  
                                      $obj_pdf->setPrintFooter(false);  
                                      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
                                      $obj_pdf->SetFont('helvetica', '', 9);  
                                      $obj_pdf->AddPage();  
                                      // $style = array('width' => 0.5, 'dash' => '2,2,2,2', 'phase' => 0, 'color' => array(0, 0, 0));
                                      // $obj_pdf->Line(-1, 210, 250, 210, $style);

                                        $style = array('width' => 0.5, 'dash' => '2,2,2,2', 'phase' => 0, 'color' => array(0, 0, 0));
                                        $obj_pdf->Line(-1, -70,200,-70, $style);
                                        
                                        $content = ''; 
                                        $footerTxt='';

                                       $content .= '<h6 align="left"><img  src="'.base_url().'assets/img/logo2.jpg" width="200" height="40"></h6><br/>';
                                      $content .= '
                                        <table cellpadding="1">
                                        <tr>
                                        <th colspan="14"><h1 style="color:#032c4c;">Your Account Statement</h1><br><h2 style="color:#032c4c;background-color:#eaeae6;"> PAYMENT INFORMATION</h2></th>
                                        <th colspan="1"></th>
                                        <th colspan="6" style="background-color:#eaeae6;padding-top:40px;margin:20px;"><h3 style="color:#032c4c;margin:20px;">Statement Period:</h3><br>    From : '.$statement_start_date.'<br>    To : '.$statement_end_date.'<br>    Due Date : '.$statement_due_date.'<br></th>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">     Opening Balance</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.$prev_balance.'</td>
                                        <td colspan="1"></td>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">   Minimum Payment Due Amount</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.$min_due.'</td>
                                        <td colspan="1"></td>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">     Current Balance</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.$due_amountt.'</td>
                                        <td colspan="1"></td>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">     New Balance</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.$total.'</td>
                                        <td colspan="1"></td>
                                        </tr>
                                        <br>
                                        <tr>
                                        <td colspan="14"><h3>Estimate Time To Pay</h3></td>
                                        </tr>
                                        <br>
                                        <tr>
                                        <td colspan="14" style="color:#032c4c;">The estimated time to pay your New Balance in full is '.$duedaysNumeric.' days.</td>
                                        </tr>
                                        <br><br>
                                        <tr>
                                        <th colspan="14"><h2 style="color:#032c4c; background-color:#eaeae6;">TRANSACTIONS</h2></th>
                                        <th colspan="1"></th>
                                         <th colspan="6" style="background-color:#eaeae6;"><h4 style="color:#032c4c;"> Pay online at committi.com</h4></th>
                                        </tr>
                                        <tr style="border-bottom-style: dotted;">
                                        <td colspan="11" style="border-bottom-style: dotted;">Opening Statement Balance  From : '.$statement_start_date.'</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">     $'.$prev_balance.'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;"><b>     Committi Inc.</b></td>
                                        </tr>';
                                            if($result_get_statements){
                                                $transaction_amount = '';

                                                 foreach($result_get_statements as $transaction){

                                                    $transaction_counter++;

                                                    if($transaction['transaction_credit_amount']!='0.00'){
                                                        $transaction_amount='-'.$transaction['transaction_credit_amount'];
                                                    }
                                                    else if($transaction['transaction_debit_amount']!='0.00'){
                                                           $transaction_amount='+'.$transaction['transaction_debit_amount'];
                                                    }
                                                    else{
                                                        $transaction_amount='0.00';
                                                    }
                                            //     $content.='<tr style="border-bottom-style: dotted;">
                                            //      <td colspan="11" style="border-bottom-style: dotted;">'.$transaction['transaction_description'].'</td>
                                            //      <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$transaction_amount.'</td>
                                            //      </tr>';
                                            //     }
                                            // }

                                         $content .= '<tr>
                                        <td colspan="11" style="border-bottom-style: dotted;">'.$transaction["transaction_description"].'</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$transaction_amount.'</td>
                                        <td colspan="1"></td>';
                                       //  if($transaction_counter==1){
                                       //   $content .='<td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>   200E - 141 Brunel Road</b></td>';}
                                       //   if($transaction_counter==2){
                                       // $content .='<td colspan="20" style="background-color:#eaeae6;">     Mississauga, ON L4Z 1X3,</td>';
                                       //   }
                                       //  if($transaction_counter==3){
                                       // $content .='<td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email</b>: info@committi.com</td>';
                                       //   }

                                         $content .='</tr>';
                                    }
                                     if($total_statement_rows==1){
                                       $content .= '
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;">Subtotal:</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$0.00</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;">     Mississauga, ON L4Z 1X3,</td>
                                        </tr>
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;"><h3>    Your New Balance:</h3></td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Phone: </b>: 1-866-266-6480</td>

                                        </tr>
                                        <tr>
                                        <td colspan="11"></td>
                                        <td colspan="3"></td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email: </b>: info@committi.com</td>

                                        </tr>';

                                     }else if($total_statement_rows==2){
                                         $content .= '
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;"><h3>    Your New Balance:</h3></td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Phone: </b>: 1-866-266-6480</td>

                                        </tr>
                                        <tr>
                                        <td colspan="11"></td>
                                        <td colspan="3"></td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email: </b>: info@committi.com</td>

                                        </tr>';
                                     }
                                     else{

                                       $content .= '
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;">Subtotal:</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$0.00</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style=""><b></b></td>
                                        </tr>
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;"><h3>  Your New Balance:</h3></td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20"><b></b></td>
                                        </tr>';

                                     }
                                    }

                                    else  {
                                         $content .= '<tr>
                                        <td colspan="11"></td>
                                        <td colspan="3"></td>
                                        <td colspan="1"></td>
                                       <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>   200E - 141 Brunel Road</b></td>
                                        </tr>
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;">Subtotal:</td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$0.00</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;">     Mississauga, ON L4Z 1X3,</td>
                                        </tr>
                                        <tr>
                                        <td colspan="11" style="border-bottom-style: dotted;"><h3>    Your New Balance:</h3></td>
                                        <td colspan="3" align="right" style="border-bottom-style: dotted;">$'.$total.'</td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Phone: </b>: 1-866-266-6480</td>

                                        </tr>
                                        <tr>
                                        <td colspan="11"></td>
                                        <td colspan="3"></td>
                                        <td colspan="1"></td>
                                        <td colspan="20" style="background-color:#eaeae6;color:#032c4c;"><b>    Email: </b>: info@committi.com</td>

                                        </tr>';
                                       }
                                        
                                        $content .= '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                        </table><br>';
                                        $footerTxt.='<hr><br><table cellpadding="1"><tr>
                                        <th colspan="11"><img src="'.base_url().'assets/img/logo2.jpg" width="100" height:80></th>
                                        <th colspan="6"></th>
                                        <th colspan="6" aligh="right"></th>
                                        </tr>
                                        <tr><td colspan="11">Committi Inc.</td>
                                        <td colspan="6">Account Number</td>
                                        <td colspan="6" aligh="right"><b>'.$series.'</b></td></tr>

                                        <tr><td colspan="11">ADDRESS</td>
                                        <td colspan="6">Your New Balance</td>
                                        <td colspan="6" aligh="right"><b></b></td></tr>

                                        <tr><td colspan="11">200E - 141 Brunel Road</td>
                                        <td colspan="6">Your Minimum Payment</td>
                                        <td colspan="6" aligh="right"><b></b></td>
                                        </tr>

                                        <tr><td colspan="11">Mississauga, ON L4Z 1X3,<br>CANADA</td>
                                        <td colspan="6">Your Minimum Payment Due Date</td>
                                        <td colspan="6" aligh="right"><b></b></td>
                                        </tr>
                                        </table>';

                                        $obj_pdf->writeHTML($content);
                                        $obj_pdf->writeHTMLCell('', '', '', '-60',$footerTxt, 0,0,0,true,'',true);
                                  // $obj_pdf->writeHTMLCell($footerTxt, true, 0, true, 0, '');

                                       // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

                                  // reset pointer to the last page
                                      $obj_pdf->lastPage();

                                      $obj_pdf->Output($attach_file_name, 'F'); 


                                                        // insert statements in statement table 
                                       $url = base_url().'assets/users/statement_pdf/statement_'.$plan_value_id.'_'.$values['u_id'].'_'.$todayDate.'.pdf';

                                        $query_fecth_plan_name1 = $this->User_model->query("SELECT * FROM plans  WHERE id ='".$plan_value_id."' ");

                                        if($query_fecth_plan_name1->num_rows() > 0)
                                        {
                                            $result_fecth_plan_name1 = $query_fecth_plan_name1->result_array();
                                            $plan_name1 = $result_fecth_plan_name1['0']['plan_name'];
                                        }
                                        else
                                        {
                                            $result_fecth_plan_name1 = '';
                                            $plan_name1 = '';
                                        }


                                        $new_today_date = date('Y-m-d');
                                        $insert_statement= array(  
                                            'statement_pdf_path'         => $url,
                                            'statement_generated_date'   => date('Y-m-d H:i:s'),
                                           'statement_due_date'         => date('Y-m-d', strtotime($statement_due_date)),
                                            'statement_plan_id'          => $plan_value_id,
                                            'statement_user_id'          => $values['u_id'],
                                            'statement_due_amount'       => $total,
                                            'statement_plan_name'        => $plan_name1,
                                         ); 
                                        $InsertStatement = $this->User_model->insertdata('statements',$insert_statement);



                                        $query_get_users2= $this->User_model->query("SELECT * FROM statements where statement_plan_id = '".$plan_value_id."' AND statement_user_id = '".$values['u_id']."'");

                                        if($query_get_users2->num_rows() > 0)
                                        {
                                            $result_get_userss2 = $query_get_users2->result_array();
                                            $statement_id = $result_get_userss2['0']['statement_id'];
                                            $pdf_url = $result_get_userss2['0']['statement_pdf_path'];
                                            $statement_id = $result_get_userss2['0']['statement_id'];
                                            $no_of_statement = $result_get_userss2['0']['statement_no_of_statements'];
                                            $number=1;
                                            $statementNumber=$no_of_statement+$number;

                                        }
                                        else
                                        {
                                            $result_get_userss2 = '';
                                            $statement_id = '';


                                            if($InsertStatement){
                                                $ApplicationFormAlert= array(  
                                                        'notification_detail'                     => 'Your Payment Statement Has Been Generated Succuessfully',
                                                        'user_notification_id'                    => $values['u_id'],
                                                        'notification_type'                       => 'user'
                                                       ); 
                                                       $InsertApplicationFormAlert = $this->User_model->insertdata('notification',$ApplicationFormAlert);
                                                       $email   =$values['user_application_email'];
                                                       $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#110d35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Payment Statement</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello '.$values['user_application_first_name'].'  '.$values['user_application_last_name'].',<br><br>Your Payment Statement Has Been Generated Succuessfully&nbsp;</p><p></p><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                                                            $this->email->clear(TRUE);
                                                            $this->email->from('support@committi.com', 'Committi');
                                                            $this->email->to($email);
                                                            $this->email->subject('Payments Statement');
                                                            $this->email->message($message);
                                                            $this->email->attach($url);
                                                            $this->email->set_mailtype('html'); 
                                                            $this->email->send(); 
                                        }
                                    } 
                                }  
                            } 

                            // die();
                        }

                    }
                }

            }

        }



        $data['content'] = $this->load->view('admin/master_statements',$data,true);
        $this->load->view('template/template', $data);
    }    


    public function get_plan_bidding_cycles()
    {


        $plan_id   = $this->input->post('plan_id');

        $query_application_plan = $this->User_model->query("SELECT * FROM plans WHERE id = '".$plan_id."'");
        if($query_application_plan->num_rows() > 0)
        {
            $result_application_plan = $query_application_plan->result_array();
            $user_application_plan = $result_application_plan[0]['no_bidding_cycle'];
        }
        else
        {
            $result_application_plan = '';
            $user_application_plan = '';
        }

        for ($i=1; $i <=$user_application_plan; $i++) { 
            # code...
            $biddingCycleArray[] = $i;
        }

        echo json_encode($biddingCycleArray); 
        // echo '<pre>';
        // print_r($user_application_plan);
        // echo '</pre>';

    }    

    public function get_plan_bidding_users()
    {


        $plan_id   = $this->input->post('plan_id');

        $query_application_plan = $this->User_model->query("SELECT * FROM `confirmed_plan_users` as confirmuser join users as userdata on confirmuser.`confirmed_plan_user_id` = userdata.id WHERE `confirmed_plan_plan_id` = '".$plan_id."'");
        if($query_application_plan->num_rows() > 0)
        {
            $result_application_plan = $query_application_plan->result_array();
            $user_application_plan = $result_application_plan;
        }
        else
        {
            $result_application_plan = '';
            $user_application_plan = '';
        }


        echo json_encode($user_application_plan); 
        // echo '<pre>';
        // print_r($user_application_plan);
        // echo '</pre>';

    }



}
