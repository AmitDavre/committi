<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Activity extends MY_Controller
{

     public function __construct() {
        ob_start();


          parent::__construct();
          $this->load->model('User_model'); 
          $this->load->library('Pdf');
          $this->load->library('PHPExcel');
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


     public function generatePaymentReport(){
        //-----------------------------------------------------
        //
        //  
        //  check cpanel for cronjob details
        //  
        //  curl --silent http://rs200.whb.tempwebhost.net/~dhrivum5/committi/Payment_Activity/generatePaymentReport
        //---------------------------------------------------------


       ob_clean();
       $previous_date=date('Y-m-d', strtotime('-1 day'));


       $new_previous_date=date('m/d/Y',strtotime($previous_date));

       $fetch_payment_data=$this->User_model->query("select * from payments inner join plans on payments.payment_plan_id=plans.id inner join committi_users on payments.payment_user_id=committi_users.user_login_id where payments.payment_date>='".$previous_date."'");

       if($fetch_payment_data->num_rows()>0){

           $result_payments=$fetch_payment_data->result_array();
       }else{
   
             $fetch_payment_data='';
             $result_payments='';
       }
       // echo "<pre>";
       // print_r($result_payments);
       // echo "</pre>";
       // die();

          $attach_file_name=FCPATH.'assets/Payment_report.pdf';
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
          $content = '<table><tr><td></td><td></td><td><h4 align="left"><img  style="width:200px;height:50px;float:right;" src="'.base_url().'assets/img/logo2.jpg"></h4><br/></td></tr>
                    <tr><td><h3> Report Date  :    '.$new_previous_date.'</h3> </td><td></td><td></td></tr>
                    <tr><td><h3>Today Date    : '.date('m/d/Y').'</h3> </td><td></td><td></td></tr></table>';

          $content .= '
          <h1>Payments Report</h1>
          <table cellpadding="3" border="1">
          <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
          <th><strong>Plan Name</strong></th>
          <th><strong>User Name</strong></th>
          <th><strong>Payable Amount</strong></th>
          <th><strong>Refundable Amount</strong></th>
          <th><strong>Payment Date</strong></th>
          <th><strong>Payment Status</strong></th>
          </tr>';
          if($result_payments)
          {
            foreach ($result_payments as $payment) 
            {
             $payment_date=date('m/d/Y',strtotime($payment['payment_date']));
             $content .= '<tr><td>'.$payment['plan_name'].'</td>
             <td>'.$payment['user_first_name'].' '.$payment['user_last_name'].'</td>
             <td>$'.number_format($payment['payment_amount'],2).'</td>
             <td>$'.number_format($payment['payment_refund_amount'],2).'</td>
             <td>'.$payment_date.'</td>
             <td>'.$payment['payment_status'].'</td>
             </tr>';
            }
          }
        $content .= '</table>';
        $obj_pdf->writeHTML($content); 
        $paymentReportAttachment=$obj_pdf->Output($attach_file_name, 'F');

        $attachment =base_url().'assets/Payment_report.pdf';

        $fetch_admin_data=$this->User_model->query("select first_name,last_name,username from users where s_admin='1' and login_type='admin'");
        if($fetch_admin_data->num_rows()>0){
         $result_admin_data=$fetch_admin_data->result_array();
         $email=$result_admin_data[0]['username'];
         $name=$result_admin_data[0]['first_name'].' '.$result_admin_data[0]['last_name'];
        }else{
             $email='';
             $name='';
        }

     
         $link= base_url();

          $password_message = '<div style="background-color: #eeeeef; padding: 50px 0; "><div style="max-width:640px; margin:0 auto; "><div style="color: #fff; text-align: center; background-color:#110d35; padding: 30px; border-top-left-radius: 3px; border-top-right-radius: 3px; margin: 0;"><h1>Payments Report</h1></div><div style="padding: 20px; background-color: rgb(255, 255, 255); color:#555;"><p style="font-size: 14px;"> Hello '.$name.',<br><br>Payments Report Attachment .&nbsp;</p><p></p><a href="'.$link.'"  target="_blank" style="display: inline-block; padding: 10px 12px; font-family: Source Sans Pro, Helvetica, Arial, sans-serif; font-size: 14px; color: #ffffff; text-decoration: none; border-radius: 0px;background-color: #110d35;">Click Here To Login</a><p style="font-size: 14px;"><br></p><p style="font-size: 14px;">Thank you - <br>Committi</p></div></div></div>';
                    
            $this->email->from('support@committi.com', 'Committi');
            $this->email->to($email);
            $this->email->subject('Payment Report');
            $this->email->message($password_message);
            $this->email->set_mailtype('html'); 
            $this->email->attach($attachment);
            $this->email->send();   
     }
}
