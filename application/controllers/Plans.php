<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans extends MY_Controller {

    /**
     * Index Page for this controller.
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

      
    }


    public function iterateMonths(DateTime $date, $months, $iterations,$time)
    {
        $day = $date->format('d');

        for ($a = 0; $a < $iterations; $a++)
        {
            // Increment at least one month, but cap at the last day
            $date->modify("last day of next month");

            // Add on additional months if required
            if ($months > 1)
            {
                $mDiff = $months-1;
                $date->modify("+{$mDiff} months");
            }

            // If we are billing earlier than the last day of the month,
            // rewind that number of days
            if ($day < $date->format('d'))
            {
                $dDiff = $date->format('d') - $day;
                $date->modify("-{$dDiff} days");
            }

            $testtt= $date->format('Y-m-d');

            $tesssst = date("H:i:s", strtotime($time));

            // echo $tesssst;
             $add_min = date('Y-m-d H:i:s', strtotime("$testtt $tesssst"));

            // echo '<pre>';
            // print_r($add_min);
            // echo '</pre>';

        }
    }

public function getMonthCycle ($new_month)
{
    $monthToAdd = 1;

    $d1 = DateTime::createFromFormat('Y-m-d H:i:s', $new_month);

    $year = $d1->format('Y');
    $month = $d1->format('n');
    $day = $d1->format('d');

    $year += floor($monthToAdd/12);
    $monthToAdd = $monthToAdd%12;
    $month += $monthToAdd;
    if($month > 12) {
        $year ++;
        $month = $month % 12;
        if($month === 0)
            $month = 12;
    }

    if(!checkdate($month, $day, $year)) {
        $d2 = DateTime::createFromFormat('Y-n-j', $year.'-'.$month.'-1');
        $d2->modify('last day of');
    }else {
        $d2 = DateTime::createFromFormat('Y-n-d', $year.'-'.$month.'-'.$day);
    }
    $d2->setTime($d1->format('H'), $d1->format('i'), $d1->format('s'));
    $newdata = $d2->format('Y-m-d H:i:s');

    return $newdata;
}
/////////////////////////////////////// CREATE NEW PLAN ///////////////////////////////////////////////////////////////
    public function create_new_plan()
    {


        $id = $session_data['session_data']=$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Plans',$id);
        $rights=array();
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
            redirect(base_url() . 'dashboard');
        }else if($check_tab_rights!='' && ($this->session->userdata('s_admin')!='1')){
            $rights['rights']=$check_tab_rights;
        }
        if(isset($_SESSION['success'])){
            unset($_SESSION['success']);
        }
        $fetch_plan_sequence_number=$this->User_model->query('select * from plan_name_sequence ORDER BY plan_name_sequence_number ASC');
        if($fetch_plan_sequence_number->num_rows()>0){
            $plan_sequence_number['plan_sequence_number']=$fetch_plan_sequence_number->result();
        }else{
            $plan_sequence_number['plan_sequence_number']='';
        }              

        if(isset($_POST['submit'])) 
        {   
         // Array for insertion 
          if(isset($_SESSION['create_plan_token']))
            {
                if (isset($_POST['create_plan_token']))
                {
                    if ($_POST['create_plan_token']== $_SESSION['create_plan_token'])
                    {
                         $StartDate = $this->input->post('start_date');   
                         $FormatStartDate=date('Y-m-d H:i', strtotime($StartDate));         

                         $EndDate = $this->input->post('end_date');   
                         $FormatEndDate=date('Y-m-d H:i:', strtotime($EndDate));

                         $FormatEndDatecheck=date('Y-m-d H:i', strtotime($EndDate)- 60 * 60 * 24);
                         $BiddingStartDate = $this->input->post('bidding_start_date');   
                         $FormatBiddingStartDate=date('Y-m-d H:i', strtotime($BiddingStartDate));
                         $time  =date('H:i', strtotime($BiddingStartDate));
                         $curtime = $time;
                         $newtime = strtotime($curtime) + (30 * 60);
                         $newwww= date('H:i', $newtime);
                         // $FormatBiddingENDDate=date('Y-m-d H:i', strtotime($newwww));
                           
                           $FormatBiddingENDDate=date('Y-m-d H:i', strtotime($BiddingStartDate."+30 minutes"));

                         // $FormatBiddingEndDate  =date('Y-m-d H:i', strtotime($BiddingStartDate));


                         $removePercentThreshOld = str_replace('%', '', $this->input->post('bidding_decrement'));
                         $bidding_start_amountwithcomma = $this->remove_currency_symbol($this->input->post('bidding_start_amount'));
                         $thresholdDeduct = number_format(($removePercentThreshOld / 100)*$bidding_start_amountwithcomma,2);



                         $BiddingMinThresholdVal =  $this->input->post('bidding_threshold');
                         $TotalAmount            =  $this->input->post('bidding_start_amount');

                         $minBIddingValue = ($BiddingMinThresholdVal/100) * $TotalAmount ;
                         $data = array(
                            'plan_status'                           => $this->input->post('plan_status'),
                            'plan_name'                             => ucfirst($this->input->post('plan_name')),
                            'plan_description'                      => $this->input->post('plan_description'),
                            'enrollment_start_date'                 => $FormatStartDate,
                            'enrollment_end_date'                   => $FormatEndDate,
                            'bidding_start_date'                    => $FormatBiddingStartDate,
                            'no_bidding_cycle'                      => $this->input->post('no_of_bidding_cycle'),
                            'bidding_cycle'                         => $this->input->post('bidding_cycle'),
                            'bidding_start_amount'                  => $this->remove_currency_symbol($this->input->post('bidding_start_amount')),
                            'bidding_decrement'                     => $this->input->post('bidding_decrement'),
                            'bidding_min_threshold'                 => $this->input->post('bidding_threshold'),
                            'bidding_late_fee'                      => $this->remove_currency_symbol($this->input->post('bidding_late_fee')),
                            'interest_late_fee'                     => $this->input->post('ineterest_on_late_payment'),
                            'total_no_appliactions'                 => $this->input->post('total_no_appliactions'),
                            'bidding_amount_per_memeber'            => $this->remove_currency_symbol($this->input->post('bidding_amount_per_memeber')),
                            'bidding_start_amount_dynamic'          => $this->remove_currency_symbol($this->input->post('bidding_start_amount')),
                            'bidding_start_amount_Threshold_deduct' => $this->remove_currency_symbol($thresholdDeduct),
                            'bidding_end_date'                      => $FormatBiddingENDDate,
                            'bidding_start_amount_without_deduct'   => $this->remove_currency_symbol($this->input->post('bidding_start_amount')),
                            'bidding_win_bid_amount'                => $this->remove_currency_symbol($minBIddingValue),
                            'plan_tier_1_left_memebers'             => $this->input->post('tier_1_select'),
                            'plan_tier_2_left_memebers'             => $this->input->post('tier_2_select'),
                            'plan_tier_3_left_memebers'             => $this->input->post('tier_3_select'),
                            'plan_tier_4_left_memebers'             => $this->input->post('tier_4_select'),
                            'plan_win_bidding_amount'               => $this->remove_currency_symbol($this->input->post('min_win_bid_amount')),
                            'plan_amount_series'                    => $this->input->post('hidden_plan_amount_series'),
                            // 'plan_series_no'                        => $this->input->post('hidden_sequence_100'),
                            'plan_series_no'                        => $this->input->post('hidden_plan_sequence_value'),
                            'enrollment_end_date_check'             => $FormatEndDatecheck,
                            'enrollment_left'                       => $this->input->post('total_no_appliactions'),


                        );

                         // echo '<pre>';
                         // print_r($data);
                         // echo '</pre>';

                         // die();
                        $insertPlanData = $this->User_model->insertdata('plans',$data);

                        

                         ////// CREATE BDDING SCHEDULE //////////
                        $start = $month = strtotime($BiddingStartDate);

                        $insert_id = $this->db->insert_id();
                        $bidding_count= $this->input->post('total_no_appliactions');


                        $new_month = date('Y-m-d H:i:s', $month);

                        $sales_due_date = $new_month;
                        // create a time stamp of the date
                        $time = strtotime($sales_due_date);

                        $selectBiddingCycle = $this->input->post('bidding_cycle');


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

                            $b_start_amt=$this->remove_currency_symbol($this->input->post('bidding_start_amount'));
                            $b_start_amt_2=$this->remove_currency_symbol($this->input->post('bidding_start_amount'));

                            $InsertBidCycleQuery = $this->User_model->query("INSERT INTO bidding_schedule (bidding_schedule_date,bidding_schedule_plan_id,bidding_cycle_count,bidding_schedule_end_date,bidding_start_amount_dynamic,bidding_start_amount_without_deduct) VALUES ('".$due_datesValue[0]."' , '".$insert_id."','".$countY."','".$due_datesValue[1]."','".$b_start_amt."','".$b_start_amt_2."') ");

                        }
                        $plan_sequence=$this->input->post('hidden_plan_sequence_value')+1;
                        $plan_sequence_column_name=$this->input->post('hidden_plan_sequence_column');
                        $UpdatePlanSequence = $this->User_model->query("UPDATE plan_sequence SET $plan_sequence_column_name ='".$plan_sequence."' WHERE plan_sequence_id='1'");

                        // $plan_sequence = $this->input->post('plan_name_sequence');
                        // if($plan_sequence == '1')
                        // {
                        //     $plan_sequence_100 = $this->input->post('hidden_sequence_100')+1;

                        //     $UpdatePlanSequence = $this->User_model->query("UPDATE plan_sequence SET plan_sequence_100 ='".$plan_sequence_100."' WHERE plan_sequence_id='1'");

                        // }
                        // if($plan_sequence == '2')
                        // {
                        //     $plan_sequence_1000 = $this->input->post('hidden_sequence_1000')+1;
                        //     $UpdatePlanSequence = $this->User_model->query("UPDATE plan_sequence SET plan_sequence_1000='".$plan_sequence_1000."' WHERE plan_sequence_id='1'");

                        // }
                         unset($_SESSION['create_plan_token']);
                    }
                }
            }
            $this->session->set_flashdata('success', 'Submitted Successfully');          
        }
        
        $id=$this->session->userdata('id');
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
        $data['content'] = $this->load->view('plans/create_plan',$session_data+$rights+$plan_sequence_number,true);
        $this->load->view('template/template', $data);
    }

/////////////////////////////////////// CREATE NEW PLAN ENDS ///////////////////////////////////////////////////////////////


/////////////////////////////////////// VIEW PLAN  ///////////////////////////////////////////////////////////////


public function view_plans()
{

        // Header name data 
         $id=$this->session->userdata('id');
        $check_tab_rights=$this->checkRights('Plans',$id);
        
        if($check_tab_rights=='' && ($this->session->userdata('s_admin')!='1')){
            redirect(base_url() . 'dashboard');
        }
        $id=$this->session->userdata('id');
        $query = $this->User_model->query("SELECT * FROM users WHERE id= '".$id."'");
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        else
        {
            $result = '';
        }

        // Plans View Data

        $query_plans_view_data = $this->User_model->query("SELECT * FROM plans");
        if($query_plans_view_data->num_rows() > 0)
        {
            $result_plans_view_data = $query_plans_view_data->result_array();
        }
        else
        {
            $result_plans_view_data = '';
        }

        $plans_view_data['plans_view_data']=$result_plans_view_data;

        $session_data['session_data']=$result['0'];
        $data['content'] = $this->load->view('plans/view_plans',$session_data+$plans_view_data,true);
        $this->load->view('template/template', $data);
    }


/////////////////////////////////////// VIEW PLAN ENDS  /////////////////////////////////////////////

/////////////////////////////////////// GET PLAN SEQUENCE AJAX   ////////////////////////////////////


public function get_plan_sequence_ajax()
    {

        $query_get_plan_sequence = $this->User_model->query("SELECT * FROM plan_sequence where plan_sequence_id ='1'");
        if($query_get_plan_sequence->num_rows() > 0)
        {
            $result_plans_sequence = $query_get_plan_sequence->result_array();

            echo json_encode($result_plans_sequence['0']);
        }
        else
        {
            $result_plans_sequence = '';
        }
    }


/////////////////////////////////////// GET PLAN SEQUENCE AJAX   //////////////////////////////////////



}
