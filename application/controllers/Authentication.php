<?php defined('BASEPATH') OR exit('No direct script access allowed');  
 class Authentication extends MY_Controller {  

    function __construct() {
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
        $this->load->library('session');

    }


public function login()  
    {  
      if($this->session->userdata('username') != '')  
       {
           redirect(base_url() . 'dashboard');  
       }
       else
       {
           // $this->load->view("login/login");  
           redirect(base_url());
       }
    }  


public function login_validation()  
    {  
         $this->load->library('form_validation');  
         $this->form_validation->set_rules('username', 'Username', 'required');  
         $this->form_validation->set_rules('password', 'Password', 'required');  
         if($this->form_validation->run())  
         {  
              //true  
              $username = $this->input->post('username');  
              $password = $this->input->post('password');  
              $remember = $this->input->post('login-remember');  
              //model function  
              $this->load->model('User_model'); 


               $query = $this->User_model->query("SELECT * FROM  users WHERE username ='".$username."' AND password='".md5($password)."' ");
        
              if($query->num_rows() > 0)
              {
                  $result = $query->result_array();
                  $email_verify=$result[0]['email_verify'];

                /////////////check email verified or not,1 mean verified///////////
                  if($email_verify=='0'){
                    $this->session->set_flashdata('email-not-verified', 'email not verified');  
                    redirect(base_url());  
                   }
    
                  $session_data = array(  
                        'username'     => $username,
                        'login_type'   => $result['0']['login_type'], 
                        'first_name'   => $result['0']['first_name'], 
                        'last_name'    => $result['0']['last_name'], 
                        'id'           => $result['0']['id'],
                        's_admin'      => $result['0']['s_admin'],
                        'profile_image'=>$result['0']['profile_image']
                   ); 
             
                   $this->session->set_userdata($session_data);  
                    if($remember == 1){

                            $cookie = array(
                                   'name'   => 'username',
                                   'value'  => $username,
                                   'expire' => '604800',
                                   'prefix' => ''
                                );

                            $this->input->set_cookie($cookie);

                            $cookie = array(
                                   'name'   => 'password',
                                   'value'  =>  $this->input->post('password'),
                                   'expire' => '604800',
                                   'prefix' => ''
                                );

                            $this->input->set_cookie($cookie);
                        }
                   redirect(base_url() . 'dashboard');  

              }
              else
              {
                  $result = '';
                   $this->session->set_flashdata('error', 'Invalid Username and Password');  
                   redirect(base_url() . 'login');  
              }  


         }  
         else  
         {  
              //false  
              $this->login();  
         }  
    }  

public function dashboard()
    {
      $id = $session_data['session_data']=$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Application Review',$id);
        $rights=array();
        if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
        $rights['rights']=$check_tab_rights;
        }

       if($this->session->userdata('username') != '')  
       {
          $session_data['session_data']=$this->session->userdata();
          $query = $this->User_model->query("SELECT * FROM plans WHERE plan_status ='2' and enrollment_left!='0' order by id ASC");
          if($query->num_rows() > 0)
          {
              $result = $query->result_array();
          }
          else
          {
              $result = '';
          }

          $available_plans['available_plans']= $result;

          $userid = $this->session->userdata('id');


          $query_enrolled_plans = $this->User_model->query("SELECT * FROM plans p join confirmed_plan_users c on p.id=c.confirmed_plan_plan_id WHERE c.confirmed_plan_user_id='".$userid."'");
          if($query_enrolled_plans->num_rows() > 0)
          {
              $result_enrolled_plans = $query_enrolled_plans->result_array();
          }
          else
          {
              $result_enrolled_plans = '';
          }

          $enrolled_plans['enrolled_plans']= $result_enrolled_plans;



          $query_count_users = $this->User_model->query("SELECT * FROM users ");
          if($query_count_users->num_rows() > 0)
          {
              $result_count_users = $query_count_users->result_array();
          }
          else
          {
              $result_count_users = '';
          }

          $count_userS['count_userS'] =$query_count_users->num_rows();

          $query_count_plans = $this->User_model->query("SELECT * FROM plans ");
          if($query_count_plans->num_rows() > 0)
          {
              $result_count_plans = $query_count_plans->result_array();
          }
          else
          {
              $result_count_plans = '';
          }          
          $count_Plans['count_Plans'] =$query_count_plans->num_rows();


          $query_count_application = $this->User_model->query("SELECT * FROM user_application ");
          if($query_count_application->num_rows() > 0)
          {
              $result_count_application = $query_count_application->result_array();
          }
          else
          {
              $result_count_application = '';
          }

          $count_Application['count_Application'] =$query_count_application->num_rows();          


          $query_count_pendingapplication = $this->User_model->query("SELECT * FROM user_application WHERE user_application_plan_confirmation IS NULL");
          if($query_count_pendingapplication->num_rows() > 0)
          {
              $result_count_pendingapplication = $query_count_pendingapplication->result_array();
          }
          else
          {
              $result_count_pendingapplication = '';
          }

          $count_pendingApplication['count_pendingApplication'] =$query_count_pendingapplication->num_rows();



          $available_plans['available_plans']= $result;

          $query_application = $this->User_model->query("SELECT * FROM user_application ");

          if($query_application->num_rows() > 0)
          {
              $result_application = $query_application->result_array();
          }
          else
          {
              $result_application = '';
          }

          $user_application['user_application']=$result_application;


          if($result_enrolled_plans != '' )
          {
            foreach ($result_enrolled_plans as $key => $value) 
            {
              # code...
              $results =$this->getStatus($value['id']);
              $statusaa[] = $results;

            }
             
            $statusArry['statusArry'] = $statusaa;
          }
          else
          {
            $statusArry['statusArry'] = array();

          }
    
          // die();


          $data['content'] = $this->load->view('dashboard/dashboard',$session_data+$available_plans+$enrolled_plans+$count_userS+$count_Plans+$count_Application+$count_pendingApplication+ $user_application+$statusArry+$rights,true);
          $this->load->view('template/template', $data);
       }
       else
       {
          redirect(base_url() . 'login'); 
       }

    }





public function getStatus($plan_id)  
{  
    $status[$plan_id] = '';
    $session_data['session_data']=$this->session->userdata();
    $userid = $this->session->userdata('id');

$fetch_plan_starting_data=$this->User_model->query("SELECT * from plans where id='".$plan_id."'");
$result_plan_starting_data=$fetch_plan_starting_data->result_array();


     $fetch_info=$this->User_model->query("SELECT * from bidding_schedule left join user_application on bidding_schedule.bidding_schedule_plan_id=user_application.user_application_plan_id where bidding_schedule_plan_id='".$plan_id."' and user_application.u_id='".$userid."'");
    
    if($fetch_info->num_rows()>0)
    {
        $previous_bidding_cycle=array();
         $result_info=$fetch_info->result_array();
         foreach($result_info as $value)
        {         
                 array_push($previous_bidding_cycle, $value['bidding_cycle_count']);

                  $today_date =date('Y-m-d H:i:s');
                  $today_date_int = strtotime($today_date);
                  $bidding_schedule_date_int = strtotime($value['bidding_schedule_date']);
                  $bidding_schedule_end_date_int = strtotime($value['bidding_schedule_end_date']);
                  $bidding_cycle_win_bid_check= strtotime($value['bidding_cycle_win_bid_check']); 
                 
        
                if($value['user_application_restriction_upto']!='' && $value['user_application_restriction_upto'] >= $value['bidding_cycle_count'] && ($today_date_int >= $bidding_schedule_date_int) && ($today_date_int <= $bidding_schedule_end_date_int))
                {
                            $status[$plan_id] = 'Restricted upto '.$value['user_application_restriction_upto'].' cycle';
                            break;
                 }

                 if($value['user_application_restriction_upto']!='' && $value['user_application_restriction_upto'] >= $value['bidding_cycle_count'] && ($today_date_int<$bidding_schedule_date_int) && ($today_date_int <$bidding_schedule_end_date_int))
                 {
                            $status[$plan_id] = 'Restricted upto '.$value['user_application_restriction_upto'].' cycle';
                            break;
                 }

                if(($today_date_int >= $bidding_schedule_date_int) && ($today_date_int <= $bidding_schedule_end_date_int))
                { 
                  // $check_bidding_cycle=implode(',',$previous_bidding_cycle);
                  // $check_previous_cycle_winner=$this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$plan_id."' AND bidding_cycle_count in('".$check_bidding_cycle."') ");

                  $query_check_win_bid = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$plan_id."' AND bidding_cycle_count = '".$value['bidding_cycle_count']."'");
                    $exist_bidding_user_id=array();
                    $check_winner_array=array();
                        if($query_check_win_bid->num_rows() > 0)
                        {
                            $current_bid_count=$value['bidding_cycle_count'];
                            $result_check_win_bid = $query_check_win_bid->result_array();
                          

                            foreach ($result_check_win_bid as $key => $value1) 
                            {
                              # code...
                              array_push($exist_bidding_user_id, $value1['bidding_user_id']);
                              array_push($check_winner_array, $value1['bidding_check_winning_bid']);

                              $win_bid_value = $value1['bidding_check_winning_bid'];
                              $win_bid_user_value = $value1['bidding_user_id'];
                              $low_bid_user_value = $value1['bidding_low_bid_check'];
                              $bidding_not_a_winner_check = $value1['bidding_not_a_winner_check'];

                              if($win_bid_value == '1' && $win_bid_user_value==$userid)
                              {
                                $status[$plan_id] = 'Winner Name';                           
                              }
                              else if($bidding_not_a_winner_check == '1' && $win_bid_user_value==$userid)
                              {
                                $status[$plan_id] = 'Winner';
                          
                              }
                              else  if($low_bid_user_value == '1' && $win_bid_user_value==$userid)
                              {
                                $status[$plan_id] = 'Low Bid';
                              }
                              else  if($low_bid_user_value == '0' && $win_bid_user_value ==$userid)
                              {
                                $status[$plan_id] = 'Out Bid';
                   
                              }
                              else if($win_bid_user_value!= $userid && $win_bid_value=='1'){

                                $name= ucfirst($value1['bidding_bidder_first_name']);
                                        $len = strlen($name);
                                        $name1 = '';
                                        for($i=0; $i < $len; $i++) {
                                        if($i != 0) {
                                        $name1 .= '*';
                                        } else {
                                        $name1 .= $name[$i];
                                        }
                                        }
                                 $status[$plan_id] = 'Winner -  '.$name1;
                              }else if((!in_array($userid,$exist_bidding_user_id)) && $win_bid_value=='1'){
                                        $name= ucfirst($value1['bidding_bidder_first_name']);
                                        $len = strlen($name);
                                        $name1 = '';
                                        for($i=0; $i < $len; $i++) {
                                        if($i != 0) {
                                        $name1 .= '*';
                                        } else {
                                        $name1 .= $name[$i];
                                        }
                                        }
                                 $status[$plan_id] = 'Winner -  '.$name1;
                              }
                            }
                            if((!in_array($userid,$exist_bidding_user_id)) && (!in_array('1',$check_winner_array))){
                                 $status[$plan_id] = 'Bid Now';
                                 break;
                              }
                        }
                        else 
                        {
                        $result_check_win_bid = '';
                        $status[$plan_id] = 'Bid Now';  
                        }
                       break;
                      }
                      else
                       {
                             $plan_bidding_start_date=strtotime($result_plan_starting_data['0']['bidding_start_date']);
                               $plan_bidding_end_date=strtotime($result_plan_starting_data['0']['bidding_end_date']);

                               if(($today_date_int>$plan_bidding_start_date) && ($today_date_int>$plan_bidding_end_date) && $value['bidding_cycle_count']!='1' &&($today_date_int <$bidding_schedule_date_int) && ($today_date_int <$bidding_schedule_end_date_int))
                               {
                                $status[$plan_id] = 'Next Cycle  ' . $value['bidding_cycle_count'].' '. date('m/d/Y H:i:s', strtotime($value['bidding_schedule_date']));
                                 break;
                               }
                                else if(($today_date_int<$plan_bidding_start_date) && ($today_date_int<$plan_bidding_end_date) && ($today_date_int<$bidding_schedule_date_int)&&($today_date_int<$bidding_schedule_end_date_int)){
                                   $status[$plan_id] = 'Bidding Starts  '.date('m/d/Y H:i:s',strtotime($value['bidding_schedule_date']));
                                 break;
                            }else{
                               $status[$plan_id] = 'Restricted-Date'; 
                            }
                        }
        }
    }
    else {
        $fetch_info = '';
        $status[$plan_id] = 'error';
    }
  return $status;
}

public function getStatus3($plan_id){
     $status[$plan_id] = '';
     $session_data['session_data']=$this->session->userdata();
     $userid = $this->session->userdata('id');

      $today_date =date('Y-m-d H:i:s');
      $today_date_int = strtotime($today_date);

     $fetch_plan_data=$this->User_model->query("SELECT * from plans where id='".$plan_id."'");
     $result_plan_starting_data=$fetch_plan_data->result_array();
     $plan_bidding_start_date=strtotime($result_plan_starting_data['0']['bidding_start_date']);
     $plan_bidding_end_date=strtotime($result_plan_starting_data['0']['bidding_end_date']);

     $time_interval= $plan_bidding_end_date-$plan_bidding_start_date;
     

       $fetch_info=$this->User_model->query("SELECT * from bidding_schedule left join user_application on bidding_schedule.bidding_schedule_plan_id=user_application.user_application_plan_id where bidding_schedule_plan_id='".$plan_id."' and user_application.u_id='".$userid."' and bidding_schedule.bidding_schedule_end_date='".$now_date."'");
                if($fetch_info->num_rows()>0)
                {
                  $result_info=$fetch_info->result_array();
                  $bidding_schedule_date_int = strtotime($result_info[0]['bidding_schedule_date']);
                  $bidding_schedule_end_date_int = strtotime($result_info[0]['bidding_schedule_end_date']);
                  $bidding_cycle_win_bid_check= strtotime($result_info[0]['bidding_cycle_win_bid_check']); 
 
                    if($result_info[0]['user_application_restriction_upto']!='')
                   {
                         if($result_info[0]['user_application_restriction_upto'] >= $result_info[0]['bidding_cycle_count'])
                         {
                            $status[$plan_id] = 'Restricted upto '.$result_info[0]['user_application_restriction_upto'].' cycle';
                         }
                   }
                   else if(($today_date_int >= $bidding_schedule_date_int) && ($today_date_int <= $bidding_schedule_end_date_int))
                   {
                      $query_check_win_bid = $this->User_model->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '".$plan_id."' AND bidding_cycle_count = '".$result_info[0]['bidding_cycle_count']."'");
                        if($query_check_win_bid->num_rows() > 0)
                        {
                            $current_bid_count=$result_info[0]['bidding_cycle_count'];
                            $result_check_win_bid = $query_check_win_bid->result_array();

                            foreach ($result_check_win_bid as $key => $value1) 
                            {
                              # code...
                              $win_bid_value = $value1['bidding_check_winning_bid'];
                              $win_bid_user_value = $value1['bidding_user_id'];
                              $low_bid_user_value = $value1['bidding_low_bid_check'];
                              $bidding_not_a_winner_check = $value1['bidding_not_a_winner_check'];

                              if($win_bid_value == '1' && $win_bid_user_value == $userid )
                              {
                                $status[$plan_id] = 'Winner Name';
                           
                              }
                              else if($bidding_not_a_winner_check == '1' && $win_bid_user_value == $userid)
                              {
                                $status[$plan_id] = 'Winner';
                          
                              }
                              else  if($low_bid_user_value == '1' && $win_bid_user_value == $userid)
                              {
                                $status[$plan_id] = 'Low Bid';
                              }
                              else  if($low_bid_user_value == '0' && $win_bid_user_value == $userid)
                              {
                                $status[$plan_id] = 'Out Bid';
                   
                              }
                              else if($win_bid_user_value!= $userid && $win_bid_value=='1'){
                                 $status[$plan_id] = 'Winner - '.$value1['bidding_bidder_first_name'];
                              }else{
                                $status[$plan_id] = 'Bid Now';  
                              }
                            }
                        }
                        else 
                        {
                        $result_check_win_bid = '';
                        $status[$plan_id] = 'Bid Now';  
                        }
                      }
                     else{
                      if(($today_date_int>$plan_bidding_start_date) && ($today_date_int>$plan_bidding_end_date) && $result_info[0]['bidding_cycle_count']!='1' && $result_info[0]['bidding_cycle_count']<=$result_plan_starting_data[0]['no_bidding_cycle'] &&($today_date_int <$bidding_schedule_date_int) && ($today_date_int <$bidding_schedule_end_date_int))
                               {
                                $status[$plan_id] = 'Next Cycle'.$result_info[0]['bidding_cycle_count'];
                                }
                                else if(($today_date_int<$plan_bidding_start_date) && ($today_date_int<$plan_bidding_end_date) && ($today_date_int<$bidding_schedule_date_int)&&($today_date_int<$bidding_schedule_end_date_int))
                                {
                                   $status[$plan_id] = 'Restricted By Date'.$result_info[0]['bidding_schedule_date'];
                           
                            }
                            else{
                               $status[$plan_id] = 'Restricted-Date'; 
                            }
       }
   }
   else{
     $status[$plan_id] = 'Restricted-Date'; 
   }
   return $status;



   


}


public function logout()  
      {  
           $this->session->unset_userdata('username');  
           redirect(base_url());  
      }  


  ////////////////////////////////////////////// ADMIN LOGIN ENDS /////////////////////////////////////////////////////////////

  ///////////////////////////////////////////// USER SIGN UP STARTS////////////////////////////////////////////////////////////

public function sign_up()  
    {  
      if($this->session->userdata('username') != '')  
       {
           redirect(base_url() . 'dashboard');  
       }
       else
       {

        if(isset($_POST['submit'])) 
        {

          $emailcheck =$this->User_model->query("SELECT * FROM  users WHERE username = '".$this->input->post('email')."' ");
        
          if($emailcheck->num_rows() > 0)
          {
            $resultemailcheck = $emailcheck->result_array();
            $this->session->set_flashdata('alreadyemail', 'Submitted Successfully');
            redirect(base_url() . 'sign-up');
          }
          else
          {
            $UsDateOfBirthFormat = $this->input->post('user_dob');
            $DateOfBirth= date('Y-m-d', strtotime(str_replace('/', '/', $UsDateOfBirthFormat)));
            $resultemailcheck = '';
                      $user_data= array(  
                          'username'                => $this->input->post('email'),
                          'password'                => md5($this->input->post('signup_password')),
                          'first_name'              => $this->input->post('user_first_name'),
                          'middle_name'             => $this->input->post('user_middle_name'),
                          'last_name'               => $this->input->post('user_last_name'),
                          'login_type'              => 'user',
                          'dob'                     => $DateOfBirth,

                     );  

          $insertUserData = $this->User_model->insertdata('users',$user_data);
          $last_insert_id = $this->db->insert_id();


          $SignupTermsCheckbox      = $this->input->post('signup-terms');
          $SignupPrivacyCheckbox    = $this->input->post('signup-privacy');
          $SignupDisclaimerCheckbox = $this->input->post('signup-disclaimer');

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

      

          if($this->input->post('user_employment_status') == '3')
          {
            $employment_source  = $this->input->post('source_employement');
          }
          else
          {
            $employment_source = '';
          }
          $committi_users_data= array(  
                                        'user_login_id'           => $last_insert_id,
                                        'user_first_name'         => $this->input->post('user_first_name'),
                                        'user_middle_name'        => $this->input->post('user_middle_name'),
                                        'user_last_name'          => $this->input->post('user_last_name'),
                                        'user_gender'             => $this->input->post('user_gender'),
                                        'user_sin'                => $this->input->post('user_sin'),
                                        'user_dob'                => $DateOfBirth,
                                        'usert_street'            => $this->input->post('user_street'),
                                        'user_street_name'        => $this->input->post('user_street_name'),
                                        'user_unit_no'            => $this->input->post('user_unit_no'),
                                        'user_provience'          => $this->input->post('user_provience'),
                                        'user_postal_code'        => $this->input->post('user_postal_code'),
                                        'user_phone_no'           => $this->input->post('user_phone_no'),
                                        'user_email'              => $this->input->post('email'),
                                        'user_employment_status'  => $this->input->post('user_employment_status'),
                                        'user_gross_income'       => $this->input->post('user_gross_income'),
                                        'user_household_income'   => $this->input->post('user_household_income'),
                                        'user_residential_status' => $this->input->post('user_residential_status'),
                                        'user_planning'           => $this->input->post('user_planning'),
                                        'user_fund_time'          => $this->input->post('user_fund_time'),
                                        'user_city'               => $this->input->post('user_city'),
                                        'user_terms'              => $SignupTermsCheckbox,
                                        'user_privacy'            => $SignupPrivacyCheckbox,
                                        'user_disclaimer'         => $SignupDisclaimerCheckbox,
                                        'user_employment_source'  => $employment_source,
                                   );  



          $insertCommittiUsersData = $this->User_model->insertdata('committi_users',$committi_users_data);
          $this->session->set_flashdata('success', 'Submitted Successfully'); 
          $test_email = $this->input->post('email');
          // SEND CONFIRMATION EMAIL 
          $reset_link = base_url().'verify-email/'.$last_insert_id;

            $password_message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center;background-color:#120e35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Email Verification</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello '.$this->input->post('user_first_name').' '.$this->input->post('user_last_name').',<br><br>Please verify your email before logging into committi. Click the link below to verify.&nbsp;</p><p></p><a href="'.$reset_link.'" target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color:#120e35;">Verify Email</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($test_email);
            $this->email->subject('Email Verification');
            $this->email->message($password_message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 


          redirect(base_url() . 'sign-up'); // REDIRECT TO SAME PAGE AFTER INSERTING THE DATA 
          }



        }  $joining_committi_data_array=array();
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
                 $data['joining_committi_data']=$joining_committi_data_array;
                 $data['residential_data']=$residential_data_array;
            }else{
                 $data['joining_committi_data']='';
                 $data['residential_data']='';
            }
           $this->load->view("login/sign_up",$data);  
       }
    }
  //////////////////////////////////////////// USER SIGN UP ENDS ///////////////////////////////////////////////////////////////  


public function email_verification()
{
     $url_data   = $this->uri->segment(2);
     $UpdateQuery = $this->User_model->query("UPDATE users SET email_verify ='1' WHERE id ='".$url_data."'");
     $this->session->set_userdata('email-verified','email verified');
     redirect(base_url());
}

///////////////////////////////////////////// FORGOT PASSWORD STARTS ////////////////////////////////////////////////////////////

public function forgot_password()  
    {  
           $this->load->view("login/forgot_password");  
    }  

public function generate_pwd($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars), 0, $length);
    }

public function forgotPassword(){

        if(isset($_POST['submit'])){

            $email = $this->input->post('email');
            $dob = $this->input->post('dob');
            if($email !='' and $dob!=''){
                $where=array(
                    'username'=>$email,
                    'dob'=>$dob);

                $check_useremail =  $this->User_model->select_where('users',$where);
                if($check_useremail->num_rows() > 0){

                    $check_useremail = $check_useremail->result();

                    $ids            = $check_useremail[0]->id;
                    $email_address  = $check_useremail[0]->username;
                    $fullname       = $check_useremail[0]->first_name;

                    $security   = $this->generate_pwd(16);
                    $reset_link = base_url().'forget_password_secure/'.$security;

                    $updation['forget_pass_time']       = date('Y-m-d h:i:s');
                    $updation['pass_security']          = $security;
                    $where['id']                        = $ids;

                    $this->User_model->updatedata('users',$where,$updation);

                    $password_message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#120e35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Forgot Password</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello '.$fullname.',<br><br>We received a request to reset your Committi login password. Click the link below to choose a new one.&nbsp;</p><p></p><a href="'.$reset_link.'" target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color:#120e35;">Reset Your Password</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
                    $this->email->from('support@committi.com', 'Committi');
                    $this->email->to($email_address);
                    $this->email->subject('Forgot Password');
                    $this->email->message($password_message);
                    $this->email->set_mailtype('html'); 
                    $this->email->send(); 
               

                    $this->session->set_flashdata('success','A reset password link has been sent to your email address.');
                    $this->load->view('login/forgot_password');

                }else{

                    $this->session->set_flashdata('error','This email is not associated with any account!');
                    $this->load->view('login/forgot_password');
                }

            }else{

                $this->session->set_flashdata('error','Email and DOB fields are required!');
                $this->load->view('login/forgot_password');
            }

        }else{

             $this->load->view('login/forgot_password');
        }

    }

public function forget_password_secure(){

        $url_data   = $this->uri->segment(2);

        if($url_data != '')
        {
          
          $user['pass_security']  = $url_data;

          $fetch_user_data  = $this->User_model->select_where('users',$user);
          if($fetch_user_data->num_rows() > 0)
          {
            $fetch_user_data    = $fetch_user_data->result();
            $id           = $fetch_user_data[0]->id;
            $forget_pass_time   = $fetch_user_data[0]->forget_pass_time;

            $current_time       =  date('Y-m-d H:i:s');
            $forget_time        =  strtotime($forget_pass_time);
            $now_time         =  strtotime($current_time);

            $check_forget_pass_time = round(abs($forget_time - $now_time) / 60,2);

            if($check_forget_pass_time < 1440){  

              $data['id'] = $id;
              $data['status'] = 'true';
              $data['msg'] = '';
              $data['msgerror'] = '';
              $this->load->view('login/new_password',$data);
              
            }else{

              $data['status'] = 'false';
              $data['msg'] = 'Link expire. Time out!';
              $data['id'] = '';
              $this->load->view('login/new_password',$data);
            }

          }else{

              $data['status'] = 'false';
              $data['msg'] = 'Link not valid!';
              $data['id'] = '';
              $this->load->view('login/new_password',$data);
          }

        }else{
              $data['status'] = 'false';
              $data['msg'] = 'Link not valid!';
              $data['id'] = '';
              $this->load->view('login/new_password',$data);
        }

    }

public function newPassword(){

        $input = $this->input->post();

            if($input['UserId'] && $input['new_password'] && $input['re_password'] !=''){

                if($input['new_password'] == $input['re_password']){

                    $password                 = $input['new_password'];
                    $data['password']         = md5($password);
                    $data['forget_pass_time']     = NULL;
                    $data['pass_security']      = NULL;
                    $where['id']              = $input['UserId'];

                    $this->User_model->updatedata('users',$where,$data);
                    
                    $data['status'] = 'true';
                    $data['id'] = $input['UserId'];
                    $data['msg'] = 'Password updated successfully';
                    $data['msgerror'] = '';
                    $this->load->view('login/new_password',$data);

                }else{

                    $data['status'] = 'true';
                    $data['msgerror'] = 'Password not match';
                    $data['msg'] = '';
                    $data['id'] = $input['UserId'];
                    $this->load->view('login/new_password',$data);
                }

            }else{

                  $data['status'] = 'true';
                  $data['msgerror'] = 'All fields required';
                  $data['msg'] = '';
                  $data['id'] = $input['UserId'];
                  $this->load->view('login/new_password',$data);
            }

    }


///////////////////////////////////////////// FORGOT PASSWORD ENDS /////////////////////////////////////////////////////////////

///////////////////////////////////////////// FORGOT USERNAME STARTS////////////////////////////////////////////////////////////   
public function forgot_username()  
    {  
      
        $this->load->view("login/forgot_username");  
    }  

public function username()  
    {  
      
        if(isset($_POST['submit'])) 
        {
          $sin=$this->input->post('sin');
          $date=$this->input->post('date');
          if($sin && $date !='')
          {
            // run query
            $query = $this->User_model->query("SELECT * FROM  committi_users WHERE user_sin LIKE '%".$sin."' AND user_dob='".$date."' ");
        
              if($query->num_rows() > 0)
              {
                $result = $query->result_array();
                $username= $result['0']['user_email'];
                $this->session->set_flashdata('success','Your Username is '.$username.'');
               $this->load->view("login/username"); 
              }
              else
              {
                $result='';
                $this->session->set_flashdata('error','Check SIN or Date field !');
                $this->load->view("login/forgot_username");  
              }
          }
          else
          {
            //reload with empty error 
             $this->session->set_flashdata('error','SIN and Date field required!');
             $this->load->view("login/forgot_username");  
          }
        } 
        else
        {
          redirect(base_url() . 'login'); 
        }
    }  


///////////////////////////////////////////// FORGOT USERNAME ENDS////////////////////////////////////////////////////////////    

/////////////////////////////////////// PLAN CONFIRMATION STARTS //////////////////////////////////////////////////



public function plan_confirmation()
{
   $url_data_2   = $this->uri->segment(2);
   $url_data_3   = $this->uri->segment(3);

   $data = array(
    'url_data_2' => $url_data_2,
    'url_data_3' => $url_data_3,
   );


  $query = $this->User_model->query("SELECT * FROM user_application WHERE u_id= '".$url_data_2."' AND user_application_plan_id= '".$url_data_3."'");
  if($query->num_rows() > 0)
  {
      $result = $query->result_array();
  }
  else
  {
      $result = '';
  }

   // echo '<pre>';
   // print_r($result);
   // echo '</pre>';

  // link_expire_check_value        = 1 = link expired 


  foreach($result as $item)
  {

    $link_expire_check_value = $item['user_application_link_expre'];

    if($link_expire_check_value == '0')
    {
     $this->load->view('user/plan_confirmation',$data);    
    }
    else
    {
     $this->load->view('error_pages/link_expire');
    }
  }
// die();


}

  public function update_user()
  {
    $hidden_url_user_id   = $this->input->post('hidden_url_user_id');
    $hidden_url_plan_id   = $this->input->post('hidden_url_plan_id');

    $status_update_date = date('Y-m-d');

    // user_application_plan_confirmation = 0 = reject offer 
    // user_application_plan_confirmation = 1 = accept offer 
    // user_application_link_expre        = 1 = link expired 

      




     if(isset($_POST['reject'])) 
     {
        // die('');
        //  print_r($_POST);
        // die('1');
        $this->load->view('user/confirmation_message');
    

        $getTier = $this->User_model->query("SELECT * FROM user_application WHERE user_application_plan_id='".$hidden_url_plan_id."' AND u_id= '".$hidden_url_user_id."'");

        if($getTier->num_rows() > 0)
        {
          $resultGetTier = $getTier->result_array();
          $getTierValue =  $resultGetTier['0']['user_application_tier'];

          if($getTierValue == '1')
          {
            $plan1Tier = $this->User_model->query("SELECT * FROM plans WHERE  id= '".$hidden_url_plan_id."'");
            if($plan1Tier->num_rows() > 0)
            {
              $resultplan1Tier = $plan1Tier->result_array();
              $plan1TierVal1 = $resultplan1Tier['0']['plan_tier_1_left_memebers'] +1;

             $UpdateQueryPlan = $this->User_model->query("UPDATE plans SET plan_tier_1_left_memebers ='".$plan1TierVal1."' WHERE id='".$hidden_url_plan_id."'" );


            }


          }        

          if($getTierValue == '2')
          {
            $plan1Tier = $this->User_model->query("SELECT * FROM plans WHERE  id= '".$hidden_url_plan_id."'");

            if($plan1Tier->num_rows() > 0)
            {
              $resultplan1Tier = $plan1Tier->result_array();
              $plan1TierVal2 = $resultplan1Tier['0']['plan_tier_2_left_memebers'] +1;
            }

             $UpdateQueryPlan = $this->User_model->query("UPDATE plans SET plan_tier_2_left_memebers ='".$plan1TierVal2."'  WHERE id='".$hidden_url_plan_id."'" );
          }        

          if($getTierValue == '3')
          {
             $plan1Tier = $this->User_model->query("SELECT * FROM plans WHERE  id= '".$hidden_url_plan_id."'");

            if($plan1Tier->num_rows() > 0)
            {
              $resultplan1Tier = $plan1Tier->result_array();
              $plan1TierVal3 = $resultplan1Tier['0']['plan_tier_3_left_memebers'] +1;
            }


             $UpdateQueryPlan = $this->User_model->query("UPDATE plans SET plan_tier_3_left_memebers ='".$plan1TierVal3."'  WHERE id='".$hidden_url_plan_id."'" );
          }        

          if($getTierValue == '4')
          {
            
            $plan1Tier = $this->User_model->query("SELECT * FROM plans WHERE  id= '".$hidden_url_plan_id."'");

            if($plan1Tier->num_rows() > 0)
            {
              $resultplan1Tier = $plan1Tier->result_array();
              $plan1TierVal4 = $resultplan1Tier['0']['plan_tier_4_left_memebers'] +1;
            }

             $UpdateQueryPlan = $this->User_model->query("UPDATE plans SET plan_tier_4_left_memebers ='".$plan1TierVal4."'  WHERE id='".$hidden_url_plan_id."'" );
          }


          $application_enrollment_left = $this->User_model->query("SELECT * FROM plans WHERE  id= '".$hidden_url_plan_id."'");
          if($application_enrollment_left->num_rows()>0){
            $current_enrollment_left=$application_enrollment_left->result_array();
             $increase_enrollment_left_application=$current_enrollment_left[0]['enrollment_left']+1;
             $UpdateQueryPlanApplication = $this->User_model->query("UPDATE plans SET enrollment_left ='". $increase_enrollment_left_application."'  WHERE id='".$hidden_url_plan_id."'" );
          }

          $UpdateQuery = $this->User_model->query("UPDATE user_application SET user_application_plan_confirmation ='0' , user_application_link_expre= '1',user_application_tier=NULL,user_application_tier=NULL,user_application_no_bidding_cycle=NULL,user_application_offer_sent=NULL,user_application_status_confirm_date = '".$status_update_date."' WHERE user_application_plan_id='".$hidden_url_plan_id."' AND u_id= '".$hidden_url_user_id."'" );
        }
        else
        {
            $resultGetTier = '';
            $getTierValue = '';
        }



     }
     else if(isset($_POST['accept'])) 
     {


        $UpdateQuery = $this->User_model->query("UPDATE user_application SET user_application_plan_confirmation ='1',user_application_link_expre= '1',user_application_status_confirm_date = '".$status_update_date."' WHERE user_application_plan_id='".$hidden_url_plan_id."' AND u_id= '".$hidden_url_user_id."'" );

          $confirmed_user= array(  
                                'confirmed_plan_user_id'           => $hidden_url_user_id,
                                'confirmed_plan_plan_id'           => $hidden_url_plan_id,

                           );


          $check_confirmed_plan=$this->User_model->query("select * from confirmed_plan_users where confirmed_plan_user_id='".$hidden_url_user_id."' and confirmed_plan_plan_id='".$hidden_url_plan_id."'");
            if($check_confirmed_plan->num_rows()==0)
           {
           $insertConfirmedUsersData = $this->User_model->insertdata('confirmed_plan_users',$confirmed_user);
           }

        // ////////////////////////////////// CALCULATION OF LEFT APPLICATIONS IN THE PLAN ////////////////////
        $query_plans1 = $this->User_model->query("SELECT * FROM confirmed_plan_users WHERE  confirmed_plan_plan_id= '".$hidden_url_plan_id."'");

        if($query_plans1->num_rows() > 0)
        {
          $result_plans1 = $query_plans1->result_array();
        }
        else
        {
            $result_plans1 = '';
        }
 
        $total=count($result_plans1);

        ////////// FOR ONLY TOTAL NUMBER OF APPLICATION////////////
        $query_plans = $this->User_model->query("SELECT * FROM plans WHERE id= '".$hidden_url_plan_id."'");
        if($query_plans->num_rows() > 0)
        {
          $result_plans = $query_plans->result_array();
        }
        else
        {
            $result_plans = '';
        }
        //////////////////////////////////////////////////////////

        $total_value_applications = $result_plans['0']['total_no_appliactions'] - $total ;
        $latest_count = $result_plans['0']['enrollment_left']-1;

        $UpdateQuery = $this->User_model->query("UPDATE plans SET left_applications ='".$total_value_applications."', enrollment_left ='".$latest_count."' WHERE id ='".$hidden_url_plan_id."'");
        // ////////////////////////////////// CALCULATION OF LEFT APPLICATIONS IN THE PLAN ////////////////////


        ///////////////////////////////// SEND EMAIL IF LEFT APPLICATIONS REACHES ZERO //////////////////////



        $query_plan_user = $this->User_model->query("SELECT * FROM user_application WHERE user_application_plan_id= '".$hidden_url_plan_id."'");
        if($query_plans->num_rows() > 0)
        {
          $result_plan_user = $query_plan_user->result_array();
        }
        else
        {
            $result_plan_user = '';
        }


        $query_plans_left = $this->User_model->query("SELECT * FROM plans WHERE id= '".$hidden_url_plan_id."'");
        if($query_plans_left->num_rows() > 0)
        {
          $result_plans_left = $query_plans_left->result_array();
          $plan_bidding_schedule_date=date('m/d/Y H:i:s',strtotime($result_plans_left[0]['bidding_start_date']));
          $plan_bidding=$result_plans_left[0]['plan_name'];


        }
        else
        {
            $result_plans_left          = '';
            $plan_bidding_schedule_date ='';
            $plan_bidding               ='';
        }

        $left_applications= $result_plans_left['0']['left_applications'];

        if($left_applications == '0')
        {

         
          foreach($result_plan_user as $item)
          {
            $email               = $item['user_application_email'];
            $first_name_user     = $item['user_application_first_name'];
            $last_name_user      = $item['user_application_last_name'];
              $baselink = base_url().'dashboard';

            $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center;background-color:#120e35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Plan Confirmation</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello '.$first_name_user.' '.$last_name_user.',<br><br>The bidding for Plan '.$plan_bidding.' will start on '.$plan_bidding_schedule_date.'.&nbsp;</p><p></p><a  href="'.$baselink.'" target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color:#120e35;">Click Here</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($email);
            $this->email->subject('Plan Confirmation ');
            $this->email->message($message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 
          }
        }

        ///////////////////////////////// SEND EMAIL IF LEFT APPLICATIONS REACHES ZERO //////////////////////

        $this->load->view('user/confirmation_message');


     }
     else
     {
      $this->load->view('error_pages/404_error');
     }
    
  }
/////////////////////////////////////// PLAN CONFIRMATION END ///////////////////////////////////////////////////    

public function destroyEmailVerficationSession(){
  unset($_SESSION['email-verified']); 
}

public function loginValidation(){
    $username=$this->input->post('username');
    $password=$this->input->post("password");
   $query = $this->User_model->query("SELECT * FROM  users WHERE username ='".$username."' AND password='".md5($password)."' ");
              if($query->num_rows()==0)
              {
                echo 1;
              }
}



public function getLiveBiddingStatus()
{
    $today_date = date('Y-m-d H:i:s');
    $statusArray = array();
    $plan_ids_array = json_decode($this->input->post('plan_ids_array'));
    $plan_ids = implode(',', $plan_ids_array);

    $session_data['session_data'] = $this->session->userdata();
    $userid = $this->session->userdata('id');

    $fetch_plan_starting_data = $this->User_model->query("SELECT * from plans where id in(" . $plan_ids . ")");
    if ($fetch_plan_starting_data->num_rows() > 0)
    {
        $result_plan_starting_data = $fetch_plan_starting_data->result_array();

        foreach ($result_plan_starting_data as $plan_data)
        {
            $fetch_info = $this->User_model->query("SELECT * from bidding_schedule left join user_application on bidding_schedule.bidding_schedule_plan_id=user_application.user_application_plan_id where bidding_schedule_plan_id='" . $plan_data['id'] . "' and user_application.u_id='" . $userid . "'");

            if ($fetch_info->num_rows() > 0)
            {
                $result_info = $fetch_info->result_array();

                foreach ($result_info as $value)
                {
                    $today_date = date('Y-m-d H:i:s');
                    $today_date_int = strtotime($today_date);
                    $bidding_schedule_date_int = strtotime($value['bidding_schedule_date']);
                    $bidding_schedule_end_date_int = strtotime($value['bidding_schedule_end_date']);
                    $bidding_cycle_win_bid_check = strtotime($value['bidding_cycle_win_bid_check']);

                    if ($value['user_application_restriction_upto'] != '' && $value['user_application_restriction_upto'] >= $value['bidding_cycle_count'] && ($today_date_int >= $bidding_schedule_date_int) && ($today_date_int <= $bidding_schedule_end_date_int))
                    {
                        $status_value = 'Restricted upto ' . $value['user_application_restriction_upto'] . ' cycle';
                        array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                        ));
                        break;
                    }

                    if ($value['user_application_restriction_upto'] != '' && $value['user_application_restriction_upto'] >= $value['bidding_cycle_count'] && ($today_date_int < $bidding_schedule_date_int) && ($today_date_int < $bidding_schedule_end_date_int))
                    {
                        $status_value = 'Restricted upto ' . $value['user_application_restriction_upto'] . ' cycle';
                        array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                        ));
                        break;
                    }

                    if (($today_date_int >= $bidding_schedule_date_int) && ($today_date_int <= $bidding_schedule_end_date_int))
                    {
                        $query_check_win_bid = $this
                            ->User_model
                            ->query("SELECT * FROM bidding_details WHERE bidding_plan_id = '" . $plan_data['id'] . "' AND bidding_cycle_count = '" . $value['bidding_cycle_count'] . "'");
                        $exist_bidding_user_id = array();
                        $check_winner=array();
                        if ($query_check_win_bid->num_rows() > 0)
                        {
                            $current_bid_count = $value['bidding_cycle_count'];
                            $result_check_win_bid = $query_check_win_bid->result_array();

                            foreach ($result_check_win_bid as $key => $value1)
                            {
                                # code...
                                array_push($exist_bidding_user_id, $value1['bidding_user_id']);
                                array_push($check_winner, $value1['bidding_check_winning_bid']);
                                $win_bid_value = $value1['bidding_check_winning_bid'];
                                $win_bid_user_value = $value1['bidding_user_id'];
                                $low_bid_user_value = $value1['bidding_low_bid_check'];
                                $bidding_not_a_winner_check = $value1['bidding_not_a_winner_check'];

                                if ($win_bid_value == '1' && $win_bid_user_value == $userid)
                                {
                                    $status_value = 'Winner Name';
                                    array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                        ));

                                }
                                else if ($bidding_not_a_winner_check == '1' && $win_bid_user_value == $userid)
                                {
                                    $status_value = 'Winner';
                                    array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                         ));

                                }
                                else if ($low_bid_user_value == '1' && $win_bid_user_value == $userid)
                                {
                                    $status_value = 'Low Bid';
                                    array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                       ));
                                }
                                else if ($low_bid_user_value == '0' && $win_bid_user_value == $userid)
                                {
                                    $status_value = 'Out Bid';
                                    array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                        ));
                                }
                                else if ($win_bid_user_value != $userid && $win_bid_value == '1')
                                {

                                        $name= ucfirst($value1['bidding_bidder_first_name']);
                                        $len = strlen($name);
                                        $name1 = '';
                                        for($i=0; $i < $len; $i++) {
                                        if($i != 0) {
                                        $name1 .= '*';
                                        } else {
                                        $name1 .= $name[$i];
                                        }
                                        }


                                    $status_value = 'Winner-  ' .$name1;
                                   array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                        ));
                                }
                                else if((!in_array($userid, $exist_bidding_user_id)) && $win_bid_value == '1'){
                                  $name= ucfirst($value1['bidding_bidder_first_name']);
                                        $len = strlen($name);
                                        $name1 = '';
                                        for($i=0; $i < $len; $i++) {
                                        if($i != 0) {
                                        $name1 .= '*';
                                        } else {
                                        $name1 .= $name[$i];
                                        }
                                        }


                                    $status_value = 'Winner-  ' .$name1;
                                    array_push($statusArray,array(
                                    $plan_data['id']=>$status_value
                                   ));
                                }
                            }
                            if ((!in_array('1',$check_winner)) && (!in_array($userid, $exist_bidding_user_id)))
                            {
                                $status_value = 'Bid Now';
                               array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                        ));
                                break;
                            }
                        }
                        else
                        {
                            $result_check_win_bid = '';
                            $status_value = 'Bid Now';
                            array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                        ));
                        }
                        break;
                    }
                    else
                    {
                        $plan_bidding_start_date = strtotime($plan_data['bidding_start_date']);
                        $plan_bidding_end_date = strtotime($plan_data['bidding_end_date']);

                        if (($today_date_int > $plan_bidding_start_date) && ($today_date_int > $plan_bidding_end_date) && $value['bidding_cycle_count'] != '1' && ($today_date_int < $bidding_schedule_date_int) && ($today_date_int < $bidding_schedule_end_date_int))
                        {
                            $status_value = 'Next Cycle  ' . $value['bidding_cycle_count'].' '. date('m/d/Y H:i:s', strtotime($value['bidding_schedule_date']));
                           array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                        ));
                            break;
                        }
                        else if (($today_date_int < $plan_bidding_start_date) && ($today_date_int < $plan_bidding_end_date) && ($today_date_int < $bidding_schedule_date_int) && ($today_date_int < $bidding_schedule_end_date_int))
                        {
                            $status_value = 'Bidding Starts  ' . date('m/d/Y H:i:s', strtotime($value['bidding_schedule_date']));
                           array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                         ));                            break;
                        }
                        else
                        {
                            $status_value = 'Restricted-Date';
                            array_push($statusArray,array(
                            $plan_data['id']=>$status_value
                                                   ));
                        }
                    }
                }
            }

        }
      
     echo json_encode($statusArray);
    }
 }
}  
