<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		ob_start();
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('captcha');
        $original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
        $original_string = implode("", $original_string);
        $this->rand = substr(str_shuffle($original_string), 0, 5); 
        $this->load->library("form_validation");
        $this->load->helper('email');
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
	public function index()
	{    
        $result = '';
        $this->load->model('User_model'); 
		 $query = $this->User_model->query("SELECT * FROM plans WHERE plan_tier_1_left_memebers != '0' OR plan_tier_2_left_memebers != '0' OR plan_tier_3_left_memebers != '0' OR plan_tier_4_left_memebers != '0'");
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();  
        }
        $data['data']=$result;
        $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }
		// $this->load->view('index',$data);

        $data['content'] = $this->load->view('index', $data , true);
        $this->load->view('home_template/template', $data);
	}

///////////////////////// HOME PAGE ENDS //////////////////////////////////////////////////


public function termsAndConditions()
{
    $this->load->model('User_model'); 

  $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
  if($selectterms->num_rows() > 0)
  {
      $result_selecttermss = $selectterms->result_array();
      $result_selecttermss['result_selecttermss']=$result_selecttermss['0']['setting_terms'];
  }
  else
  {
      $result_get_no_statement = '';
      $result_selecttermss['result_selecttermss'] ='';

  }

         $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }

    $data['content'] = $this->load->view('terms_conditions/terms_condition', $result_selecttermss , true);
  $this->load->view('home_template/template', $data);

}
function captcha_check()
   {
      if($this->input->post('code') != $this->session->userdata('code') && $this->input->post('code') != '')
      {
         $this->session->set_userdata('captcha_check', 'Wrong captcha code, try again.');
         return false;
      }else{
      $this->session->unset_userdata('captcha_check');
      return true;
  }
   }
public function contactUs()
{
    $this->load->model('User_model'); 

    if(isset($_POST['contact_submit']))
    {
       $first_name  =   $this->input->post('first_name'); 
       $last_name   =   $this->input->post('last_name'); 
       $email       =   $this->input->post('email'); 
       $phone_no    =   $this->input->post('inputPhone'); 
       $comments   =   $this->input->post('comments'); 
        $this->form_validation->set_rules("first_name", "First Name", "required");
        $this->form_validation->set_rules("last_name", "Last Name", "trim|required");
        $this->form_validation->set_rules("email", "Email Address", "trim|required|valid_email|xss_clean");
       $this->form_validation->set_rules("inputPhone", "Contact Number", "required");
        $this->form_validation->set_rules('code', 'Captcha', 'required');
        $this->captcha_check();
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if ($this->form_validation->run() === TRUE && $this->captcha_check()==TRUE)
        {
        $InsertContactUs= array(  
                                'contact_us_first_name'          => $first_name,
                                'contact_us_last_name'           => $last_name,
                                'contact_us_email'               => $email,
                                'contact_us_phone'               =>$phone_no,
                                'contact_us_comments'            =>$comments
                               );  
        $InsertContactUsData = $this->User_model->insertdata('contact_us',$InsertContactUs);
        $admin_data=$this->User_model->select_where('users',array('login_type'=>'admin','s_Admin'=>'0'));
        if($admin_data->num_rows()>0){
            $admin_result=$admin_data->result();
            $name=$admin_result[0]->first_name.' '.$admin_result[0]->middle_name.' '.$admin_result[0]->last_name;
        }else{
            $name='';
        }
        $email1='info@committi.com';
        // $email1='bhawana.wartiz@gmail.com';
        $message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#110d35!important; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Contact Request</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello '.$name.',You have a new contact request.<br>Following are the contact information:</p><p style="font-size: 14px;">
             <strong>Name: </strong>'.$first_name.' '.$last_name.'<br>
             <strong>Email: </strong>'.$email.'<br>
             <strong>Contact No.: </strong>'.$phone_no.'<br>
             <strong>Comments: </strong>'.$comments.'
        </p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($email1);
            $this->email->subject('New Contact Request');
            $this->email->message($message);
            $this->email->set_mailtype('html'); 
            $this->email->send(); 
        $this->session->set_flashdata('success', 'Form Submitted Successfully');
        $data2['reset'] = TRUE;
       }
    }
            $config = array(
                 'word' => $this->rand,
                 'img_path'      => 'assets/captcha_images/',
                 'img_url'       => base_url().'assets/captcha_images/',
                 'font_path' => BASEPATH.'fonts/texb.ttf',
                 'img_width' => 200,
                 'img_height' => 50,
                 'expiration' => 7200
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('code');
        $this->session->set_userdata('code', $captcha['word']);
        // Pass captcha image to view
  $data2['captchaImg'] = $captcha['image'];
  $data2['data2']='';

         $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }

  $data['content'] = $this->load->view('contact/contact', $data2 , true);
  $this->load->view('home_template/template', $data);

}

    public function refreshCaptcha()
    {
        // Captcha configuration
 
        $config = array(
                'word' => $this->rand,
                'img_path'      => 'assets/captcha_images/',
                'img_url'       => base_url().'assets/captcha_images/',
                'font_path' => BASEPATH.'fonts/texb.ttf',
                'img_width' => 200,
                'img_height' => 50,
                'expiration' => 7200
        );
   
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('code');
        $this->session->set_userdata('code',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'];
    }
public function aboutUs()
{

  $this->load->model('User_model'); 

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
	// $this->load->view('about/about',$setting_about_us);

       $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }


    $data['content'] = $this->load->view('about/about', $setting_about_us , true);
    $this->load->view('home_template/template', $data);

}
public function viewsPlans()
{

    $url_data    = $this->uri->segment(2); 
     

    //echo sprintf('%04s', $var);
   
    if($url_data == '')
   {
        $query =  $this->User_model->query("SELECT * FROM plans WHERE  plan_tier_1_left_memebers != '0' OR plan_tier_2_left_memebers != '0' OR plan_tier_3_left_memebers != '0' OR plan_tier_4_left_memebers != '0'");

        if($query->num_rows() > 0)
        {
              $result = $query->result_array();
        }
        else
        {
              $result = '';
        }
        $data['data1']=$result;
   }
   else
   {
      $query2 = $this->User_model->query("SELECT * FROM plans WHERE ((plan_tier_1_left_memebers != '0' OR plan_tier_2_left_memebers != '0' OR plan_tier_3_left_memebers != '0' OR plan_tier_4_left_memebers != '0') AND plan_amount_series= '00100')");

      if($query2->num_rows() > 0)
      {
          $result = $query2->result_array();
      }
      else
      {
          $result = '';
      }
      $data['data1']=$result;
   }
 
      $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }

        // get data from the plan seq table+++++++++++++++++++=>
        $plan_sequence = $this->User_model->query("SELECT * FROM plan_name_sequence");
        if($plan_sequence->num_rows() > 0)
        {
            $plan_sequence_result = $plan_sequence->result_array();
            $data['plan_sequence_result'] = $plan_sequence_result;
        }
        else
        {
            $result = '';
        }
        // ens sec get data from the plan seq table+++++++++++++++++++=>


      $data['content'] = $this->load->view('plans/plans', $data , true);
      $this->load->view('home_template/template', $data);
}

//////////////////////// DASHBOARD PLAN INFORMATION /////////////////////

public function plan_informations()
{   
    $plan_amount = $_REQUEST['plan_value'];
   
    $query_plan = $this->User_model->query("SELECT * FROM `plans` WHERE `plan_amount_series`= $plan_amount");

    if($query_plan->num_rows() > 0)
    {
        $query_plan_result = $query_plan->result_array();
    }
    else
    {
       $query_plan_result = '';
    }
    echo json_encode($query_plan_result);
}


//////////////////////// DASHBOARD PLAN INFORMATION //////////////////////




public function investingPlans()
{
   $this->load->model('User_model'); 
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

           $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }


   $data['content'] = $this->load->view('investing/investing', $setting_investing , true);
  $this->load->view('home_template/template', $data);

}

public function privacy()
{
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


         $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }

   $data['content'] = $this->load->view('terms_conditions/privacy', $setting_privacy , true);
  $this->load->view('home_template/template', $data);

}
public function disclaimer()
{
   $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
  if($selectterms->num_rows() > 0)
  {
      $result_selectterms = $selectterms->result_array();
      $setting_disclaimer['setting_disclaimer']=$result_selectterms['0']['setting_disclaimer'];
  }
  else
  {
      $result_get_no_statement = '';
      $setting_disclaimer['setting_disclaimer'] ='';

  }
         $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }

  $data['content'] = $this->load->view('terms_conditions/disclaimer', $setting_disclaimer , true);
  $this->load->view('home_template/template', $data);

}
public function faq()
{
 $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
  if($selectterms->num_rows() > 0)
  {
      $result_selectterms = $selectterms->result_array();
      $data['setting_faqs_1']=$result_selectterms['0']['setting_faqs_1'];
      $data['setting_faqs_2']=$result_selectterms['0']['setting_faqs_2'];
      $data['setting_faqs_3']=$result_selectterms['0']['setting_faqs_3'];
      $data['setting_faqs_4']=$result_selectterms['0']['setting_faqs_4'];
  }
  else
  {
      $data['setting_faqs_1']='';
      $data['setting_faqs_2']='';
      $data['setting_faqs_3']='';
      $data['setting_faqs_4']='';

  }


     $result_faqs_setting = $this->User_model->query("SELECT * FROM faqs_settings");
    if($result_faqs_setting->num_rows() > 0)
    {
        $data['faqs_settings']=$result_faqs_setting->result_array();
    }
    else
    {
      $data['faqs_settings']='';
 
    }

         $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }

  $data['content'] = $this->load->view('faq/faq', $data , true);
  $this->load->view('home_template/template', $data);

}


public function new_release()
{

     $result_news_release_setting = $this->User_model->query("SELECT * FROM news_release_settings");
    if($result_news_release_setting->num_rows() > 0)
    {
        $data['news_release_settings']=$result_news_release_setting->result_array();
    }
    else
    {
      $data['news_release_settings']='';
 
    }

         $selectterms = $this->User_model->query("SELECT * FROM settings WHERE setting_id = '1'");
         if($selectterms->num_rows() > 0)
        {
         $result_selectterms = $selectterms->result_array();
         $data['setting_step_guide_1']=$result_selectterms['0']['setting_step_guide_1'];
         $data['setting_step_guide_2']=$result_selectterms['0']['setting_step_guide_2'];
         $data['setting_step_guide_3']=$result_selectterms['0']['setting_step_guide_3'];
         $data['setting_step_guide_4']=$result_selectterms['0']['setting_step_guide_4'];
         $data['setting_step_guide_5']=$result_selectterms['0']['setting_step_guide_5'];
         $data['setting_step_guide_6']=$result_selectterms['0']['setting_step_guide_6'];
         $data['setting_step_guide_7']=$result_selectterms['0']['setting_step_guide_7'];
         $data['setting_step_guide_8']=$result_selectterms['0']['setting_step_guide_8'];
         $data['setting_step_guide_9']=$result_selectterms['0']['setting_step_guide_9'];
         $data['setting_step_guide_10']=$result_selectterms['0']['setting_step_guide_10'];
         $data['setting_step_guide_11']=$result_selectterms['0']['setting_step_guide_11'];
         $data['setting_step_guide_12']=$result_selectterms['0']['setting_step_guide_12'];
        }
        else
       {
        $data['setting_step_guide_1']='';
        $data['setting_step_guide_2']='';
        $data['setting_step_guide_3']='';
        $data['setting_step_guide_4']='';
        $data['setting_step_guide_5']='';
        $data['setting_step_guide_6']='';
        $data['setting_step_guide_7']='';
        $data['setting_step_guide_8']='';
        $data['setting_step_guide_9']='';
        $data['setting_step_guide_10']='';
        $data['setting_step_guide_11']='';
        $data['setting_step_guide_12']='';
        }

  $data['content'] = $this->load->view('newsrelease/newsrelease', $data , true);
  $this->load->view('home_template/template', $data);

}












public function getLivePlanInformation()
    {   
        $current_date   = date('Y-m-d');
        $plan_id   = $this->input->post('plan_id');
        $get_live_bids_data = $this->User_model->query("SELECT * FROM bidding_details inner join plans on bidding_details.bidding_plan_id=plans.id WHERE date(bidding_start_date) = '".$current_date."' and id='".$plan_id."'");
        // echo $this->db->last_query();
        // die();
        if($get_live_bids_data->num_rows() > 0)
        {
            $result_get_live_bids_data = $get_live_bids_data->result_array();
            echo json_encode($result_get_live_bids_data);
        }
        else
        {
            $result_get_live_bids_data = '';
            echo '0';
        }
        
    } 

}
