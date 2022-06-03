<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

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
        $this->load->library('email');
        $this->load->library('Pdf');
        $this->load->library('PHPExcel');
      
    }
  public function session_data_recursive()
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

    return $result;
  }
    public function index(){
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $plan_list=$this->User_model->query('SELECT * from plans');
        if($plan_list->num_rows()>0){
          $plan_list_result['plan_list']=$plan_list->result_array();
        }
        else{
            $plan_list_result['plan_list']='';
        }
        $data['content'] = $this->load->view('user/reports',$session_data+$plan_list_result,true);
        $this->load->view('template/template', $data);

    }
     public function admin_index(){
        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $plan_list=$this->User_model->query('SELECT * from plans');
        if($plan_list->num_rows()>0){
          $plan_list_result['plan_list']=$plan_list->result_array();
        }
        else{
            $plan_list_result['plan_list']='';
        }
        $data['content'] = $this->load->view('admin/admin_reports',$session_data+$plan_list_result,true);
        $this->load->view('template/template', $data);

    }
    public function generateTransactionReport()
    {  
      if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
     
      if(isset($_POST['transactions_generate_pdf_button']))
      {
         ob_start();
          $user_id=$this->session->userdata('id');
          $plan_id=$this->input->post('plan_id');
          $from_date=date('Y-m-d',strtotime($this->input->post('from_date')));
          $to_date=date('Y-m-d',strtotime($this->input->post('to_date')));
          if($plan_id && $from_date && $to_date){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date BETWEEN '".$from_date."' and '".$to_date."'" ;
          }
          else if($plan_id && $from_date && $to_date=''){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date >='".$from_date."'" ;
          }else if($plan_id && $to_date && $from_date=''){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date >='".$to_date."'" ;
          }
          else if($plan_id && $from_date='' && $to_date=''){
          $condition="where transaction_plan_id='".$plan_id."'" ;
          }
          else if($from_date && $to_date && !$plan_id){
           $condition="where transaction_date BETWEEN '".$from_date."' and '".$to_date."'" ;
          }
          else{
              $condition='';
          }
          $all_fetch_transactions=$this->User_model->query('select * from transactions inner join plans on transactions.transaction_plan_id=plans.id '.$condition.'');

          if($all_fetch_transactions->num_rows()>0)
          {
            $fetch_transactions=$all_fetch_transactions->result_array();
          }
          else
          {
            $fetch_transactions='';
          }
                    
          $attach_file_name='transaction_report_'.$plan_id.'_'.$user_id.'.pdf';
          $this->load->library('Pdf_2');
          $obj_pdf = new Pdf_2('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
          $obj_pdf->SetCreator(PDF_CREATOR);  
          $obj_pdf->SetTitle("Statement");  
          $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
          $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
          $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
          $obj_pdf->SetDefaultMonospacedFont('helvetica');  
          $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
          $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
          $obj_pdf->setPrintHeader(false);  
          // $obj_pdf->setPrintFooter(false);  
          $obj_pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));
          $obj_pdf->SetAutoPageBreak(TRUE,30);  
          $obj_pdf->SetFont('helvetica', '', 9);  
          $obj_pdf->AddPage('P','A3'); 
          $content = ''; 
          $content = '<table><tr><td><h4 align="left"><img  style="width:200px;height:50px;float:right;" src="'.base_url().'assets/img/logo2.jpg"></h4><br/></td> <td></td><td></td><td style="font-size:12px"><b>Committi Inc.</b><br>
200E - 141 Brunel Road,<br>
Mississauga, ON L4Z 1X3,<br>
CANADA<br>
Phone : 1-866-266-6480<br>
Email : info@committi.com<br></td></tr>
  <tr><td style="font-size:12px">From Date  :  '.date('m/d/Y',strtotime($from_date)).' </td><td></td><td></td></tr>
                    <tr><td style="font-size:12px">To Date : '.date('m/d/Y',strtotime($to_date)).' </td><td></td><td></td></tr></table>';

          $content .= '<style>
                        .table {
                            width: 100%;
                            max-width: 100%;
                            margin-bottom: 20px;
                            border-collapse:collapse;
                        }
                        .table-bordered {
                        border: 1px solid #ddd;
                        }
                        table {
                            border-spacing: 0;
                            border-collapse: collapse;
                        }

                        .th_text_align_center th {
                            text-align: left;
                        }
                        .th_text_align_center td {
                            text-align: left;
                        }

                        .td_large{
                            width:17%;
                        }
                        .small_td{
                            width:4%;
                        }

                        .td_medium{
                            width:5%;
                        }
                        tr.dark_border th{
                            border: 1px solid gray;
                        }
                        .table td{
                            font-size:12px;
                            font-family: "Times New Roman", Georgia, Serif;
                            height:25px;
                        }
                        .table th{
                            height : 20px;
                            font-size : 12px;
                        }

                        tr.table_header th{
                            font-size:12px;
                            font-family: "Times New Roman", Georgia, Serif;
                            text-align:left;
                      background-color:#110d35; 
                     color: rgb(228, 230, 232)
                        }

                        tr.table_bottom th{
                            font-size:12px;
                            font-family: "Times New Roman", Georgia, Serif;
                            text-align:left;
                            background-color:#23baa0;
                        }
                        tr.odd td{
                            background-color:#ededed;
                        }
                        </style>
                        ';

          $content .= '
          <h1 style="text-align:center">Transactions Report</h1>
          <table class="table table-bordered th_text_align_center" style="width:100%;">
          <tr class="table_header">
          <th><strong>Plan Name</strong></th>
          <th><strong>Reference</strong></th>
          <th><strong>Bidding Cycle</strong></th>
          <th><strong>Date</strong></th>
          <th><strong>Description</strong></th>
          <th><strong>Debit Amount</strong></th>
          <th><strong>Credit Amount</strong></th>
          </tr>';
          if($fetch_transactions)
          {
            foreach ($fetch_transactions as $key=>$transaction) 
            {
               if ($key % 2 == 0) {
                    $class_add = "even";
                } else if ($key == 0) {

                    $class_add = "even";
                } else {
                    $class_add = "odd";
                }
             $transaction_date=date('m/d/Y',strtotime($transaction['transaction_date']));
             $content .= '<tr class="'. $class_add .'"><td>'.$transaction['plan_name'].'</td>
             <td>'.$transaction['transaction_ref'].'</td>
             <td>'.$transaction['transaction_bidding_cycle'].'</td>
             <td>'.$transaction_date.'</td>
             <td>'.$transaction['transaction_description'].'</td>
             <td>$'.number_format($transaction['transaction_debit_amount'],2).'</td>
             <td>$'.number_format($transaction['transaction_credit_amount'],2).'</td>
             </tr>';
            }
          }
        $content .= '</table>';
        $obj_pdf->writeHTML($content);
        $obj_pdf->Output($attach_file_name, 'I');  
      }

      if(isset($_POST['transactions_generate_excel_button']))
      {
          $user_id=$this->session->userdata('id');
          $plan_id=$this->input->post('plan_id');
          $from_date=date('Y-m-d',strtotime($this->input->post('from_date')));
          $to_date=date('Y-m-d',strtotime($this->input->post('to_date')));
          if($plan_id && $from_date && $to_date){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date BETWEEN '".$from_date."' and '".$to_date."'" ;
          }
          else if($plan_id && $from_date && $to_date=''){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date >='".$from_date."'" ;
          }else if($plan_id && $to_date && $from_date=''){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date >='".$to_date."'" ;
          }
          else if($plan_id && $from_date='' && $to_date=''){
          $condition="where transaction_plan_id='".$plan_id."'" ;
          }
          else if($from_date && $to_date && !$plan_id){
           $condition="where transaction_date BETWEEN '".$from_date."' and '".$to_date."'" ;
          }
          else{
              $condition='';
          }

          $all_fetch_transactions=$this->User_model->query('select * from transactions inner join plans on transactions.transaction_plan_id=plans.id '.$condition.'');

          if($all_fetch_transactions->num_rows()>0)
          {
            $fetch_transactions=$all_fetch_transactions->result_array();
          }
          else
          {
            $fetch_transactions='';
          }


 
            require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';
            // Create new Spreadsheet object
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

            // add style to the header
            $styleArray = array(
                    'font' => array(
                            'bold' => true,
                    ),
                    'alignment' => array(
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ),
                    'borders' => array(
                            'top' => array(
                                    'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ),
                    ),
                    'fill' => array(
                            'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                            'rotation' => 90,
                            'startcolor' => array(
                                    'argb' => 'FFA0A0A0',
                            ),
                            'endcolor' => array(
                                    'argb' => 'FFFFFFFF',
                            ),
                    ),
            );
            $spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);


            // auto fit column to content

            foreach(range('A','G') as $columnID) {
                $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                        ->setAutoSize(true);
            }
            // set the names of header cells
            $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue("A1",'Plan Name')
                    ->setCellValue("B1",'Reference')
                    ->setCellValue("C1",'Bidding Cycle')
                    ->setCellValue("D1",'Date')
                    ->setCellValue("E1",'Description')
                    ->setCellValue("F1",'Debit Amount')
                    ->setCellValue("G1",'Credit Amount');

            $x = 2;
            foreach($fetch_transactions as $sub)
            {

             $transaction_date = date('m/d/Y',strtotime($sub['transaction_date']));

              $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue("A$x",$sub['plan_name'])
                ->setCellValue("B$x",$sub['transaction_ref'])
                ->setCellValue("C$x",$sub['transaction_bidding_cycle'])
                ->setCellValue("D$x",$transaction_date)
                ->setCellValue("E$x",$sub['transaction_description'])
                ->setCellValue("F$x",$sub['transaction_debit_amount'])
                ->setCellValue("G$x",$sub['transaction_credit_amount']);
              $x++;
            }



            // Rename worksheet
            $spreadsheet->getActiveSheet()->setTitle('Transaction Report ');

            // set right to left direction
            //      $spreadsheet->getActiveSheet()->setRightToLeft(true);

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="TransactionReport.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
            ob_clean();
            $writer->save('php://output');
            exit;

      }

   }
   public function generateTransactionReport_OLD()
    {  
      if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
     
      if(isset($_POST['transactions_generate_pdf_button']))
      {
         ob_start();

          $user_id=$this->session->userdata('id');
          $plan_id=$this->input->post('plan_id');
          $from_date=date('Y-m-d',strtotime($this->input->post('from_date')));
          $to_date=date('Y-m-d',strtotime($this->input->post('to_date')));
          if($plan_id && $from_date && $to_date){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date BETWEEN '".$from_date."' and '".$to_date."'" ;
          }
          else if($plan_id && $from_date && $to_date=''){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date >='".$from_date."'" ;
          }else if($plan_id && $to_date && $from_date=''){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date >='".$to_date."'" ;
          }
          else if($plan_id && $from_date='' && $to_date=''){
          $condition="where transaction_plan_id='".$plan_id."'" ;
          }
          else if($from_date && $to_date && !$plan_id){
           $condition="where transaction_date BETWEEN '".$from_date."' and '".$to_date."'" ;
          }
          else{
              $condition='';
          }
          $all_fetch_transactions=$this->User_model->query('select * from transactions inner join plans on transactions.transaction_plan_id=plans.id '.$condition.'');

          if($all_fetch_transactions->num_rows()>0)
          {
            $fetch_transactions=$all_fetch_transactions->result_array();
          }
          else
          {
            $fetch_transactions='';
          }
                    
          $attach_file_name='transaction_report_'.$plan_id.'_'.$user_id.'.pdf';
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
          $content = ''; 
          $content = '<table><tr><td></td><td></td><td><h4 align="left"><img  style="width:200px;height:50px;float:right;" src="'.base_url().'assets/img/logo2.jpg"></h4><br/></td></tr>
                    <tr><td><h3>From Date  :    '.date('m/d/Y',strtotime($from_date)).'</h3> </td><td></td><td></td></tr>
                    <tr><td><h3>To Date    : '.date('m/d/Y',strtotime($to_date)).'</h3> </td><td></td><td></td></tr></table>';

          $content .= '
          <h1>Transactions Report</h1>
          <table cellpadding="3" border="1">
          <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
          <th><strong>Plan Name</strong></th>
          <th><strong>Reference</strong></th>
          <th><strong>Bidding Cycle</strong></th>
          <th><strong>Date</strong></th>
          <th><strong>Description</strong></th>
          <th><strong>Debit Amount</strong></th>
          <th><strong>Credit Amount</strong></th>
          </tr>';
          if($fetch_transactions)
          {
            foreach ($fetch_transactions as $transaction) 
            {
             $transaction_date=date('m/d/Y',strtotime($transaction['transaction_date']));
             $content .= '<tr><td>'.$transaction['plan_name'].'</td>
             <td>'.$transaction['transaction_ref'].'</td>
             <td>'.$transaction['transaction_bidding_cycle'].'</td>
             <td>'.$transaction_date.'</td>
             <td>'.$transaction['transaction_description'].'</td>
             <td>$'.number_format($transaction['transaction_debit_amount'],2).'</td>
             <td>$'.number_format($transaction['transaction_credit_amount'],2).'</td>
             </tr>';
            }
          }
        $content .= '</table>';
        $obj_pdf->writeHTML($content); 
        $obj_pdf->Output($attach_file_name, 'I');  
      }

      if(isset($_POST['transactions_generate_excel_button']))
      {
          $user_id=$this->session->userdata('id');
          $plan_id=$this->input->post('plan_id');
          $from_date=date('Y-m-d',strtotime($this->input->post('from_date')));
          $to_date=date('Y-m-d',strtotime($this->input->post('to_date')));
          if($plan_id && $from_date && $to_date){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date BETWEEN '".$from_date."' and '".$to_date."'" ;
          }
          else if($plan_id && $from_date && $to_date=''){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date >='".$from_date."'" ;
          }else if($plan_id && $to_date && $from_date=''){
           $condition="where transaction_plan_id='".$plan_id."' and transaction_date >='".$to_date."'" ;
          }
          else if($plan_id && $from_date='' && $to_date=''){
          $condition="where transaction_plan_id='".$plan_id."'" ;
          }
          else if($from_date && $to_date && !$plan_id){
           $condition="where transaction_date BETWEEN '".$from_date."' and '".$to_date."'" ;
          }
          else{
              $condition='';
          }

          $all_fetch_transactions=$this->User_model->query('select * from transactions inner join plans on transactions.transaction_plan_id=plans.id '.$condition.'');

          if($all_fetch_transactions->num_rows()>0)
          {
            $fetch_transactions=$all_fetch_transactions->result_array();
          }
          else
          {
            $fetch_transactions='';
          }


 
            require_once APPPATH . '/third_party/Phpexcel/Bootstrap.php';
            // Create new Spreadsheet object
            $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

            // add style to the header
            $styleArray = array(
                    'font' => array(
                            'bold' => true,
                    ),
                    'alignment' => array(
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ),
                    'borders' => array(
                            'top' => array(
                                    'style' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ),
                    ),
                    'fill' => array(
                            'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                            'rotation' => 90,
                            'startcolor' => array(
                                    'argb' => 'FFA0A0A0',
                            ),
                            'endcolor' => array(
                                    'argb' => 'FFFFFFFF',
                            ),
                    ),
            );
            $spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);


            // auto fit column to content

            foreach(range('A','G') as $columnID) {
                $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                        ->setAutoSize(true);
            }
            // set the names of header cells
            $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue("A1",'Plan Name')
                    ->setCellValue("B1",'Reference')
                    ->setCellValue("C1",'Bidding Cycle')
                    ->setCellValue("D1",'Date')
                    ->setCellValue("E1",'Description')
                    ->setCellValue("F1",'Debit Amount')
                    ->setCellValue("G1",'Credit Amount');

            $x = 2;
            foreach($fetch_transactions as $sub)
            {

             $transaction_date = date('m/d/Y',strtotime($sub['transaction_date']));

              $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue("A$x",$sub['plan_name'])
                ->setCellValue("B$x",$sub['transaction_ref'])
                ->setCellValue("C$x",$sub['transaction_bidding_cycle'])
                ->setCellValue("D$x",$transaction_date)
                ->setCellValue("E$x",$sub['transaction_description'])
                ->setCellValue("F$x",$sub['transaction_debit_amount'])
                ->setCellValue("G$x",$sub['transaction_credit_amount']);
              $x++;
            }



            // Rename worksheet
            $spreadsheet->getActiveSheet()->setTitle('Transaction Report ');

            // set right to left direction
            //      $spreadsheet->getActiveSheet()->setRightToLeft(true);

            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="TransactionReport.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Excel2007');
            ob_clean();
            $writer->save('php://output');
            exit;

      }

   }
    public function generateBiddingDetailsReport()
    { 
        if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
        ob_start();
        $user_id=$this->input->post('userList');
        $plan_id=$this->input->post('plan_id');
        $bid_cycle_count=$this->input->post('bidding_cycle_count');
        if($plan_id && $user_id && $bid_cycle_count){
         $condition="where bidding_plan_id='".$plan_id."' and bidding_user_id='".$user_id."' and bidding_cycle_count='".$bid_cycle_count."'" ;
        }
        else if($plan_id && $user_id && $bid_cycle_count==''){
         $condition="where bidding_plan_id='".$plan_id."' and bidding_user_id='".$user_id."'" ;
        }else if($plan_id && $user_id=='' && $bid_cycle_count){
         $condition="where bidding_plan_id='".$plan_id."' and bidding_user_id='".$user_id."'" ;
        }
        else if($plan_id && $user_id=='' && $bid_cycle_count==''){
        $condition="where bidding_plan_id='".$plan_id."'" ;
        }
        else{
            $condition='';
        }
        $fecth_all_bidding_details=$this->User_model->query('select * from bidding_details inner join plans on bidding_details.bidding_plan_id=plans.id  '.$condition.'');
        if($fecth_all_bidding_details->num_rows()>0){
              $bidding_details=$fecth_all_bidding_details->result_array();
          }
            else{
              $bidding_details='';
            }
                  // $attach_file_name=FCPATH.'assets/users/statement_pdf/transaction_'.$plan_id.'_'.$user_id.'.pdf';
                    $attach_file_name='bidding_detail_report_'.$plan_id.'_'.$user_id.'.pdf';
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
                  $content = '';
                  $content .= '<h4 align="left"><img  src="'.base_url().'assets/img/logo2.jpg"></h4><br/>';
                        $content .= '
                        <h1>Transactions Report</h1>
                        <table cellpadding="3" border="1">
                        <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
                        <th><strong>Plan Name</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Current Bid Amount</strong></th>
                        <th><strong>Placed Bid Amount</strong></th>
                        <th><strong>Date</strong></th>
                        <th><strong>Winner</strong></th>
                        <th><strong>Bidding Cycle</strong></th>
                        </tr>';
                        if($bidding_details){
                        foreach ($bidding_details as $bidding) {
                              $bidding_date=date('m/d/Y H:i:s',strtotime($bidding['bidding_place_bid_date']));
                              if($bidding['bidding_check_winning_bid']=='1'){
                                    $check_winner='Winner';
                              }
                              else{
                                $check_winner='';
                              }
                       $content .= '<tr>
                       <td>'.$bidding['plan_name'].'</td>
                       <td>'.$bidding['bidding_bidder_first_name'].' '.$bidding['bidding_bidder_last_name'].'</td>
                       <td>$'.number_format($bidding['bidding_current_bid_amount'],2).'</td>
                       <td>$'.number_format($bidding['bidding_place_bid_amount'],2).'</td>
                         <td>'.$bidding_date.'</td>
                       <td>'.$check_winner.'</td>
                       <td>'.$bidding['bidding_cycle_count'].'</td>
                       </tr>';
                   }
               }
                      $content .= '</table>';
                      $obj_pdf->writeHTML($content); 
                      $obj_pdf->Output($attach_file_name, 'I');  
    }
    public function fetchBiddingDetails(){
    $plan_id=$this->input->post('plan_id');
    $bidding_query=$this->User_model->query("SELECT * from bidding_schedule where bidding_schedule_plan_id='".$plan_id."'");
    if($bidding_query->num_rows()>0){
       $result_data['bidding_detail_data']=$bidding_query->result_array();
    }
    else{
        $result_data['bidding_detail_data']='';
    }

    $user_query=$this->User_model->query("SELECT id,concat(first_name,'',middle_name,' ',last_name) as fullname from confirmed_plan_users inner join users on confirmed_plan_users.confirmed_plan_user_id=users.id where confirmed_plan_plan_id='".$plan_id."'");
    if($user_query->num_rows()>0){
       $result_data['user_data']=$user_query->result_array();
    }
    else{
        $result_data['user_data']='';
    }
   echo json_encode($result_data);
  }
  function generateFirstPlansReport(){
    
  }

public function generateUserDetailsReport(){
     if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
        ob_start();
    $tier_value=$this->input->post('tier');
    $plan_id=$this->input->post('plan_id');
    $from_date=date('Y-m-d',strtotime($this->input->post('from_date')));
    $to_date=date('Y-m-d',strtotime($this->input->post('to_date')));

    if($tier_value && $plan_id && $from_date && $to_date)
    {
  
     $condition="where user_application_plan_id='".$plan_id."' and user_application_tier='".$tier_value."' and user_application_status_confirm_date BETWEEN '".$from_date."' and '".$to_date."'";
      }
    else if($tier_value && $plan_id=='' && $from_date && $to_date){
     $condition="where user_application_tier='".$tier_value."' and bidding_start_date BETWEEN '".$from_date."' and '".$to_date."'"; 
    }
    else if($tier_value=='' && $plan_id && $from_date && $to_date)
    {
      $condition="where user_application_plan_id='".$plan_id."' and user_application_status_confirm_date BETWEEN '".$from_date."' and '".$to_date."'";
    }
    else{
        $condition=" where user_application_status_confirm_date BETWEEN '".$from_date."' and '".$to_date."'";
    }
    $user_details=$this->User_model->query("Select * from user_application ".$condition." ");
    if($user_details->num_rows()>0){
       $user_application_details=$user_details->result_array();
    }
    else{
      $user_application_details='';
    }
                  $attach_file_name='user_detail_report.pdf';
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
                  $content = '';
                  $content .= '<h4 align="left"><img  src="'.base_url().'assets/img/logo2.jpg"></h4><br/>';
                        $content .= '
                        <h1>Users Details Report</h1>
                        <table cellpadding="3" border="1">
                        <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
                        <th><strong>Name</strong></th>
                        <th><strong>DOB</strong></th>
                        <th><strong>Gender</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Contact No.</strong></th>
                        <th><strong>Address</strong></th>
                        <th><strong>Date</strong></th>
                        </tr>';
                        if($user_application_details){
                        foreach ($user_application_details as $user) {
                              $date=date('m/d/Y',strtotime($user['user_application_status_confirm_date']));
                              if($user['user_application_gender']=='1'){
                                $gender='Male';
                              }
                              else{
                                $gender='Female';
                              }
                              if($user['user_application_dob']!='0000-00-00' && $user['user_application_dob']!=''){
                                $dob=date('m/d/Y',strtotime($user['user_application_dob']));
                              }
                              else{
                                $dob='';
                              }
                         $content .= '<tr>
                        <td>'.$user['user_application_first_name'].' '.$user['user_application_last_name'].'</td>
                         <td>'.$dob.'</td>
                          <td>'.$gender.'</td>
                       <td>'.$user['user_application_email'].'</td>
                        <td>'.$user['user_application_phone_no'].'</td>
                         <td>'.$user['usert_application_street'].','.$user['user_application_street_name'].','.$user['user_application_postal_code'].'</td>
                         <td>'.$date.'</td>
                       </tr>';
                   }
               }
                      $content .= '</table>';
                      $obj_pdf->writeHTML($content); 
                      $obj_pdf->Output($attach_file_name, 'I'); 

  }
  public function userReportByIncomeRange(){
     if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
        ob_start();
    $income_range=$this->input->post('income_range');
    if($income_range){
      $condition="where user_gross_income='".$income_range."'";
    }
    else{
      $condition='';
    }
    $fetch_users=$this->User_model->query("SELECT * from committi_users ".$condition."");
    if($fetch_users->num_rows()>0){
      $fetch_users_details=$fetch_users->result_array();
    }
    else{
      $fetch_users_details='';
    }
                  $attach_file_name='users_detail_report_by_income_range.pdf';
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
                  $content = '';
                  $content .= '<h4 align="left"><img  src="'.base_url().'assets/img/logo2.jpg"></h4><br/>';
                        $content .= '
                        <h1>Users Details Report By Their Income</h1>
                        <table cellpadding="3" border="1">
                        <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
                        <th><strong>Name</strong></th>
                        <th><strong>DOB</strong></th>
                        <th><strong>Gender</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Contact No.</strong></th>
                        <th><strong>Address</strong></th>
                        <th><strong>Income</strong></th>
                        </tr>';
                        if($fetch_users_details){
                        foreach ($fetch_users_details as $user) {
                              if($user['user_gender']=='1'){
                                $gender='Male';
                              }
                              else{
                                $gender='Female';
                              }
                              if($user['user_dob']!='0000-00-00' && $user['user_dob']!=''){
                                $dob=date('m/d/Y',strtotime($user['user_dob']));
                              }
                              else{
                                $dob='';
                              }
                              if($user['user_gross_income']=='1'){
                                $income='$0 - $24,999';
                              }
                              else if($user['user_gross_income']=='2'){
                                $income='$25,000  -  $49,999';
                              }
                              else if($user['user_gross_income']=='3'){
                                $income='$50,000  -  $74,999';
                              }
                               else if($user['user_gross_income']=='4'){
                                 $income='$75,000  -  $99,999';
                              }
                               else if($user['user_gross_income']=='5'){
                                 $income='$100,000 -  $124,999';
                              }
                               else if($user['user_gross_income']=='6'){
                                 $income='$125,000 -  $149,999';
                              }
                               else if($user['user_gross_income']=='7'){
                                 $income='$150,000 -  Up ';
                              }
                              else{
                                $income='';
                              }
                         $content .= '<tr>
                        <td>'.$user['user_first_name'].' '.$user['user_last_name'].'</td>
                         <td>'.$dob.'</td>
                          <td>'.$gender.'</td>
                       <td>'.$user['user_email'].'</td>
                        <td>'.$user['user_phone_no'].'</td>
                         <td>'.$user['usert_street'].','.$user['user_street_name'].','.$user['user_postal_code'].','.$user['user_city'].'</td>
                         <td>'.$income.'</td>
                       </tr>';
                   }
               }
                      $content .= '</table>';
                      $obj_pdf->writeHTML($content); 
                      $obj_pdf->Output($attach_file_name, 'I'); 
  }

  public function userStatementReport(){
     if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
        ob_start();
    $no_of_statement=$this->input->post('no_of_statement');
    $plan_id=$this->input->post('plan_id');
    $user_id=$this->input->post('user_id');
    $from_date=date('Y-m-d',strtotime($this->input->post('from_date')));
    $to_date=date('Y-m-d',strtotime($this->input->post('to_date')));
    if($no_of_statement && $plan_id && $from_date && $to_date && $user_id){
     $condition="where statement_plan_id='".$plan_id."' and statement_user_id='".$user_id."' and statement_no_of_statements='".$no_of_statement."' and statement_generated_date BETWEEN '".$from_date."' and '".$to_date."'";
    }
    elseif($no_of_statement=='' && $plan_id && $from_date && $to_date && $user_id){
    $condition="where statement_plan_id='".$plan_id."' and statement_user_id='".$user_id."' and statement_generated_date BETWEEN '".$from_date."' and '".$to_date."'";
    }
     elseif($no_of_statement && $plan_id && $from_date && $to_date && $user_id==''){
   $condition="where statement_plan_id='".$plan_id."' and statement_no_of_statements='".$no_of_statement."' and statement_generated_date BETWEEN '".$from_date."' and '".$to_date."'";
    }
     else if($no_of_statement && $plan_id=='' && $from_date && $to_date && $user_id==''){
    $condition="where statement_no_of_statements='".$no_of_statement."' and statement_generated_date BETWEEN '".$from_date."' and '".$to_date."'";
    }
     elseif($no_of_statement=='' && $plan_id=='' && $from_date && $to_date && $user_id==''){
    $condition="where statement_generated_date BETWEEN '".$from_date."' and '".$to_date."'";
    }
     else{
       $condition="";
     }
     $fetch_statements_data=$this->User_model->query("Select * from statements inner join committi_users on statements.statement_user_id=committi_users.user_login_id ".$condition."");
     if($fetch_statements_data->num_rows()>0){
        $fetch_statements_details=$fetch_statements_data->result_array();
     }
     else{
      $fetch_statements_details='';
     }
                  $attach_file_name='statement.pdf';
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
                  $content = '';
                  $content .= '<h4 align="left"><img  src="'.base_url().'assets/img/logo2.jpg"></h4><br/>';
                        $content .= '
                        <h1>Statement Report </h1>
                        <table cellpadding="3" border="1">
                        <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
                        <th><strong>Name</strong></th>
                        <th><strong>Generated Date</strong></th>
                        <th><strong>Statement Due Amount</strong></th>
                        <th><strong>No. Of Statments</strong></th>
                        </tr>';
                        if($fetch_statements_details){
                        foreach ($fetch_statements_details as $statement) {
                              $date=date('m/d/Y',strtotime($statement['statement_generated_date']));
                              
                         $content .= '<tr>
                        <td>'.$statement['user_first_name'].' '.$statement['user_last_name'].'</td>
                         <td>'.$date.'</td>
                          <td>$'.number_format($statement['statement_due_amount'],2).'</td>
                         <td>'.$statement['statement_no_of_statements'].'</td>
                       </tr>';
                   }
               }
                      $content .= '</table>';
                      $obj_pdf->writeHTML($content); 
                      $obj_pdf->Output($attach_file_name, 'I');

  }
  function getEnrolledUserList(){
    $plan_id=$this->input->post('plan_id');
    $user_query=$this->User_model->query("SELECT id,concat(first_name,'',middle_name,' ',last_name) as fullname from confirmed_plan_users inner join users on confirmed_plan_users.confirmed_plan_user_id=users.id where confirmed_plan_plan_id='".$plan_id."'");
    if($user_query->num_rows()>0){
       $result_data['user_data']=$user_query->result_array();
    }
    else{
        $result_data['user_data']='';
    }
   echo json_encode($result_data);
  }



////////////////////// ADMIN PLAN REPORT 2 /////////////////////////////
  public function generatePlanReport2()
    { 
      if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
        ob_start();

        $fromDatePlan2        = $this->input->post('fromDatePlan2');
        $to_datePlan2         = $this->input->post('to_datePlan2');
        $statusList           = $this->input->post('statusList');
        $noofBiddingCycle     = $this->input->post('noofBiddingCycle');

        // $queryFetchPlans = $this->User_model->query("SELECT * FROM plans WHERE plan_status = '".$statusList."' AND no_bidding_cycle = '".$noofBiddingCycle."' AND date(bidding_start_date) BETWEEN '".$fromDatePlan2."' AND '".$to_datePlan2."'");

        if(($fromDatePlan2 == '') && ($to_datePlan2 == '') && ($statusList == '') && ($noofBiddingCycle == ''))
        {
          $queryFetchPlans = $this->User_model->query("SELECT * FROM plans ");
        }
        else if(($fromDatePlan2 == '') && ($to_datePlan2 == '') && ($statusList != '') && ($noofBiddingCycle != ''))
        {
          $queryFetchPlans = $this->User_model->query("SELECT * FROM plans WHERE plan_status = '".$statusList."' AND no_bidding_cycle = '".$noofBiddingCycle."'");
        }
        else if( ($statusList == '') && ($fromDatePlan2 != '') && ($to_datePlan2 != '') && ($noofBiddingCycle != ''))
        {
          $queryFetchPlans = $this->User_model->query("SELECT * FROM plans WHERE  no_bidding_cycle = '".$noofBiddingCycle."' AND date(bidding_start_date) BETWEEN '".$fromDatePlan2."' AND '".$to_datePlan2."'");
        } 
        else if( ($noofBiddingCycle == '') && ($fromDatePlan2 != '') && ($to_datePlan2 != '') && ($statusList != ''))
        {
          $queryFetchPlans = $this->User_model->query("SELECT * FROM plans WHERE plan_status = '".$statusList."' AND date(bidding_start_date) BETWEEN '".$fromDatePlan2."' AND '".$to_datePlan2."'");
        }
        else if( ($fromDatePlan2 == '') && ($noofBiddingCycle != '') && ($to_datePlan2 != '') && ($statusList != ''))
        {
          $queryFetchPlans = $this->User_model->query("SELECT * FROM plans ");
        }  
        else if( ($to_datePlan2 == '') && ($noofBiddingCycle != '') && ($fromDatePlan2 != '') && ($statusList != ''))
        {
          $queryFetchPlans = $this->User_model->query("SELECT * FROM plans ");
        }
        else if( ($to_datePlan2 != '') && ($noofBiddingCycle == '') && ($fromDatePlan2 != '') && ($statusList == ''))
        {
          $queryFetchPlans = $this->User_model->query("SELECT * FROM plans WHERE date(bidding_start_date) BETWEEN '".$fromDatePlan2."' AND '".$to_datePlan2."'");
        }
        else if(($fromDatePlan2 != '') && ($to_datePlan2 != '') && ($statusList != '') && ($noofBiddingCycle != ''))
        {
          $queryFetchPlans = $this->User_model->query("SELECT * FROM plans WHERE plan_status = '".$statusList."' AND no_bidding_cycle = '".$noofBiddingCycle."' AND date(bidding_start_date) BETWEEN '".$fromDatePlan2."' AND '".$to_datePlan2."'");
        }
        else
        {
          $queryFetchPlans = $this->User_model->query("SELECT * FROM plans ");
        }


        if($queryFetchPlans->num_rows() > 0)
        {
            $resultFetchPlans = $queryFetchPlans->result_array();
        }
        else
        {
            $resultFetchPlans = '';
        }

        $dateTimeStamp = date('Y-m-d H:i:s');
        $attach_file_name='plan_report_2_'.$dateTimeStamp.'.pdf';
        $this->load->library('Pdf');
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Plan Report");  
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
        $content .= '<h4 align="left"><img  src="'.base_url().'assets/img/logo2.jpg"></h4><br/>';
        $content .= '
        <h1>Plan Report</h1>
        <table cellpadding="3" border="1">
        <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
        <th><strong>Plan Name</strong></th>
        <th><strong>Plan Status</strong></th>
        <th><strong>Plan Description</strong></th>
        <th><strong>No of Bidding Cycles </strong></th>
        <th><strong>Bidding Amount Per Member</strong></th>
        <th><strong>Plan ID</strong></th>
        </tr>';

        if($resultFetchPlans)
        {
          foreach ($resultFetchPlans as $key => $value) 
          {
            $content .= '<tr>
            <td>'.$value['plan_name'].'</td>
            <td>'.$value['plan_status'].'</td>
            <td>'.$value['plan_description'].'</td>
            <td>'.$value['no_bidding_cycle'].'</td>
            <td>$'.number_format($value['bidding_amount_per_memeber'],2).'</td>
            <td>'.$value['plan_series_no'].'</td>
            </tr>';
          }
        }
        

        $content .= '</table>';
        $obj_pdf->writeHTML($content); 
        $obj_pdf->Output($attach_file_name, 'I');  
    }


  ////////////////////// USER ACCOUNT ACTIVITY REPORT  /////////////////////////////
  public function generateAccountActivityReport()
    { 
      if($this->session->userdata('login_type')=='admin')
      {
        redirect(base_url() .'dashboard');
      }
        ob_start();

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];

        $fromDateActivityReport        = $this->input->post('fromDateActivityReport');
        $toDateActivityReport          = $this->input->post('toDateActivityReport');
        $planListActivityReport        = $this->input->post('planListActivityReport');

        $queryFetchTransactions = $this->User_model->query("SELECT * FROM transactions WHERE transaction_date BETWEEN '".$fromDateActivityReport."' AND '".$toDateActivityReport."' AND transaction_plan_id = '".$planListActivityReport."' AND transaction_user_id = '".$user_id."'");

        if($queryFetchTransactions->num_rows() > 0)
        {
            $resultFetchTransactions = $queryFetchTransactions->result_array();
        }
        else
        {
            $resultFetchTransactions = '';
        }

        $dateTimeStamp = date('Y-m-d H:i:s');
        $attach_file_name='plan_report_2_'.$dateTimeStamp.'.pdf';
        $this->load->library('Pdf');
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Plan Report");  
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
        $content .= '<h4 align="left"><img  src="'.base_url().'assets/img/logo2.jpg"></h4><br/>';
        $content .= '
        <h1>Plan Report</h1>
        <table cellpadding="3" border="1">
        <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
        <th><strong>Transaction Reference</strong></th>
        <th><strong>Transaction Description</strong></th>
        <th><strong>Transaction Date</strong></th>
        <th><strong>Transaction Plan </strong></th>
        <th><strong>Bidding Cycle</strong></th>
        <th><strong>Amount</strong></th>

        </tr>';

        if($resultFetchTransactions)
        {
          foreach ($resultFetchTransactions as $key => $value) 
          {

            $queryFetchPlans = $this->User_model->query("SELECT * FROM plans");
            if($queryFetchPlans->num_rows() > 0)
            {
                $resultFetchPlans = $queryFetchPlans->result_array();
            }
            else
            {
                $resultFetchPlans = '';
            }

            foreach ($resultFetchPlans as $key => $values) 
            {
              if($values['id'] == $value['transaction_plan_id'])
              {
                $planName =  $values['plan_name'] ;
              }
            }
            if($value['transaction_debit_amount'] == '0.00')
            {
              $amount = $value['transaction_credit_amount'];
            }
            else
            {
              $amount = $value['transaction_debit_amount'];
            }

            $date =date('m/d/Y',strtotime($value['transaction_date']));
            $content .= '<tr>
            <td>'.$value['transaction_ref'].'</td>
            <td>'.$value['transaction_description'].'</td>
            <td>'.$date.'</td>
            <td>'.$planName.'</td>
            <td> Bidding Cycle '.$value['transaction_bidding_cycle'].'</td>
            <td>$'.number_format($amount,2).'</td>

            </tr>';
          }
        }
        

        $content .= '</table>';
        $obj_pdf->writeHTML($content); 
        $obj_pdf->Output($attach_file_name, 'I');  
    }  


  ////////////////////// Referral REPORT  /////////////////////////////
  public function generateReferaalReport()
    { 
      if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
        ob_start();

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];

        $fromDateReferral         = $this->input->post('fromDateReferral');
        $to_dateReferaal          = $this->input->post('to_dateReferaal');

        $queryFetchReferrals = $this->User_model->query("SELECT * FROM referrals WHERE date(referrals_create_date)  BETWEEN '".$fromDateReferral."' AND '".$to_dateReferaal."'");

        if($queryFetchReferrals->num_rows() > 0)
        {
            $resultFetchReferrals = $queryFetchReferrals->result_array();
        }
        else
        {
            $resultFetchReferrals = '';
        }


        $dateTimeStamp = date('Y-m-d H:i:s');
        $attach_file_name='referral_report_'.$dateTimeStamp.'.pdf';
        $this->load->library('Pdf');
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Referral Report");  
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
        $content .= '<h4 align="left"><img  src="'.base_url().'assets/img/logo2.jpg"></h4><br/>';
        $content .= '
        <h1>Referral Report</h1>
        <table cellpadding="3" border="1">
        <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
        <th><strong>S.No </strong></th>
        <th><strong>Referrals Email</strong></th>
        <th><strong>Referral Date</strong></th>
        <th><strong>Referred By </strong></th>

        </tr>';

        if($resultFetchReferrals)
        {
          $count= 1;
          foreach ($resultFetchReferrals as $key => $value) 
          {

            $queryFetchUsers = $this->User_model->query("SELECT * FROM users");
            if($queryFetchUsers->num_rows() > 0)
            {
                $resultFetchUsers = $queryFetchUsers->result_array();
            }
            else
            {
                $resultFetchUsers = '';
            }

            foreach ($resultFetchUsers as $key => $values) 
            {
              if($values['id'] == $value['referrals_referred_by'])
              {
                $username =  $values['first_name'].' '.$values['last_name'] ;
              }
            }


            $counter = $count++;

            $date =date('m/d/Y',strtotime($value['referrals_create_date']));
            $content .= '<tr>
            <td>'.$counter.'</td>
            <td>'.$value['referrals_email_id'].'</td>
            <td>'.$date.'</td>
            <td>'.$username.'</td>
        

            </tr>';
          }
        }
        

        $content .= '</table>';
        $obj_pdf->writeHTML($content); 
        $obj_pdf->Output($attach_file_name, 'I');  
    }  


    ////////////////////// Statement Outstanding REPORT  /////////////////////////////
  public function generateStatementOutstandingReport()
    { 
      if($this->session->userdata('login_type')=='admin')
      {
        redirect(base_url() .'dashboard');
      }
        ob_start();

        $result                         = '';
        $recursive_session_value        = $this->session_data_recursive($result);
        $session_data['session_data']   = $recursive_session_value['0'];
        $user_id                        = $recursive_session_value['0']['id'];


        $queryFetchOutstanding = $this->User_model->query("SELECT SUM(transaction_debit_amount) as debit , SUM(transaction_credit_amount) as credit FROM transactions WHERE transaction_user_id = '".$user_id."'");

        if($queryFetchOutstanding->num_rows() > 0)
        {
            $resultFetchOutstanding = $queryFetchOutstanding->result_array();
        }
        else
        {
            $resultFetchOutstanding = '';
        }     

        $queryFetchOutstandingentry = $this->User_model->query("SELECT * FROM transactions WHERE transaction_user_id = '".$user_id."'");

        if($queryFetchOutstandingentry->num_rows() > 0)
        {
            $resultFetchOutstandingentry = $queryFetchOutstandingentry->result_array();
        }
        else
        {
            $resultFetchOutstandingentry = '';
        }




        $dateTimeStamp = date('Y-m-d H:i:s');
        $attach_file_name='outstanding_balance_'.$dateTimeStamp.'.pdf';
        $this->load->library('Pdf');
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        $obj_pdf->SetCreator(PDF_CREATOR);  
        $obj_pdf->SetTitle("Statement Outstanding Report");  
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
        $content .= '<h4 align="left"><img  src="'.base_url().'assets/img/logo2.jpg"></h4><br/>';
        $content .= '
        <h1>Statement Outstanding Report</h1>
        <table cellpadding="3" border="1">
        <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
        <th><strong>S.No </strong></th>
        <th><strong>Transaction Refernece </strong></th>
        <th><strong>Transaction Plan</strong></th>
        <th><strong>Transaction Bidding Cycle</strong></th>
        <th><strong>Transaction Date</strong></th>
        <th><strong>Transaction Description</strong></th>
        <th><strong>Amount</strong></th>

        </tr>';

        if($resultFetchOutstanding)
        {
          $debit  = $resultFetchOutstanding['0']['debit'];
          $credit = $resultFetchOutstanding['0']['credit'];
          $balance= number_format($debit-$credit,2);

          if($resultFetchOutstandingentry)
          {
            $count= 1;
            foreach ($resultFetchOutstandingentry as $key => $data1) 
            {
              $counter= $count++;

              $queryFetchPlans = $this->User_model->query("SELECT * FROM plans");
              if($queryFetchPlans->num_rows() > 0)
              {
                  $resultFetchPlans = $queryFetchPlans->result_array();
              }
              else
              {
                  $resultFetchPlans = '';
              }

              foreach ($resultFetchPlans as $key => $data2) 
              {
                if($data2['id'] == $data1['transaction_plan_id'])
                {
                  $planName =  $data2['plan_name'] ;
                }
              }


              if($data1['transaction_debit_amount'] == '0.00')
              {
                $amount= -$data1['transaction_credit_amount'];
              }
              else
              {
                $amount= $data1['transaction_debit_amount'];
              }

              $date =date('m/d/Y',strtotime($data1['transaction_date']));

              $content .= '<tr>
              <td>'.$counter.'</td>
              <td>'.$data1['transaction_ref'].'</td>
              <td>'.$planName.'</td>
              <td> Bidding Cycle '.$data1['transaction_bidding_cycle'].'</td>
              <td>'.$date.'</td>
              <td>'.$data1['transaction_description'].'</td>
              <td>$'.number_format($amount,2).'</td>
              </tr>';
            } 
          }
          
        }

        $content .= '<tr> <td colspan="6"><strong>Outstanding Balance</strong></td><td ><strong>'.$balance.'</strong></td></tr>';
        $content .= '</table>';
        $obj_pdf->writeHTML($content); 
        $obj_pdf->Output($attach_file_name, 'I');  
    }


//////////////////////Generate Payment Refund Report//////////////////////////////////


  public function generatePaymentRefundReport(){
    if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
      ob_clean();
      ob_start();
      $plan_id         =$this->input->post('plan_id');
      $payment_status  =$this->input->post('payment_status');
      $from_date       =date('Y-m-d',strtotime($this->input->post('from_date')));
      $to_date         =date('Y-m-d',strtotime($this->input->post('to_date')));
      if($plan_id){
        $condition_1="and plans.id='".$plan_id."'";
      }else{
        $condition_1="";
      }
     if($payment_status){
        $condition_2="and payments.payment_status='".$payment_status."'";
      }else{
        $condition_2="";
      }
      if($from_date){
        $condition_3="and payments.payment_date >='".$from_date."'";
      }else{
        $condition_3="";
      }
      if($to_date){
        $condition_4="and payments.payment_date<='".$to_date."'";
      }else{
        $condition_4="";
      }


       $fetch_payment_data=$this->User_model->query("select * from payments inner join plans on payments.payment_plan_id=plans.id inner join committi_users on payments.payment_user_id=committi_users.user_login_id where payments.payment_type='refund' ".$condition_1." ".$condition_2." ".$condition_3." ".$condition_4."");

       if($fetch_payment_data->num_rows()>0){

           $result_payments=$fetch_payment_data->result_array();
       }else{
   
             $fetch_payment_data='';
             $result_payments='';
       }
 

          $attach_file_name='Payment_Refund_report.pdf';
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
                    <tr><td><h3>From Date  :    '.$this->input->post('from_date').'</h3> </td><td></td><td></td></tr>
                    <tr><td><h3>To Date    : '.$this->input->post('to_date').'</h3> </td><td></td><td></td></tr></table>';

          $content .= '
          <h1>Payments To Committi Report</h1>
          <table cellpadding="3" border="1">
          <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
          <th><strong>Plan Name</strong></th>
          <th><strong>User Name</strong></th>
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
             <td>$ '.number_format($payment['payment_refund_amount'],2).'</td>
             <td>'.$payment_date.'</td>
             <td>'.$payment['payment_status'].'</td>
             </tr>';
            }
          }
        $content .= '</table>';
        $obj_pdf->writeHTML($content); 
        $obj_pdf->Output($attach_file_name, 'I');
  }


  //////////////////////Generate Payment Payable Report//////////////////////////////////


  public function generatePaymentPayableReport(){
     if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
      ob_clean();
      ob_start();
      $plan_id         =$this->input->post('plan_id');
      $payment_status  =$this->input->post('payment_status');
      $from_date       =date('Y-m-d',strtotime($this->input->post('from_date')));
      $to_date         =date('Y-m-d',strtotime($this->input->post('to_date')));
      if($plan_id){
        $condition_1="and plans.id='".$plan_id."'";
      }else{
        $condition_1="";
      }
     if($payment_status){
        $condition_2="and payments.payment_status='".$payment_status."'";
      }else{
        $condition_2="";
      }
      if($from_date){
        $condition_3="and payments.payment_date >='".$from_date."'";
      }else{
        $condition_3="";
      }
      if($to_date){
        $condition_4="and payments.payment_date<='".$to_date."'";
      }else{
        $condition_4="";
      }


       $fetch_payment_data=$this->User_model->query("select * from payments inner join plans on payments.payment_plan_id=plans.id inner join committi_users on payments.payment_user_id=committi_users.user_login_id where payments.payment_type='payable' ".$condition_1." ".$condition_2." ".$condition_3." ".$condition_4."");

       if($fetch_payment_data->num_rows()>0){

           $result_payments=$fetch_payment_data->result_array();
       }else{
   
             $fetch_payment_data='';
             $result_payments='';
       }


          $attach_file_name='Payment_to_committi_report.pdf';
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
                    <tr><td><h3>From Date  :    '.$this->input->post('from_date').'</h3> </td><td></td><td></td></tr>
                    <tr><td><h3>To Date    : '.$this->input->post('to_date').'</h3> </td><td></td><td></td></tr></table>';

          $content .= '
          <h1>Payments To Committi Report</h1>
          <table cellpadding="3" border="1">
          <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
          <th><strong>Plan Name</strong></th>
          <th><strong>User Name</strong></th>
          <th><strong>Payable Amount</strong></th>
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
             <td>$ '.number_format($payment['payment_amount'],2).'</td>
             <td>'.$payment_date.'</td>
             <td>'.$payment['payment_status'].'</td>
             </tr>';
            }
          }
        $content .= '</table>';
        $obj_pdf->writeHTML($content); 
        $paymentReportAttachment=$obj_pdf->Output($attach_file_name, 'I');
  }



public function generatePadPaymentReport(){
     if($this->session->userdata('login_type')=='user')
      {
        redirect(base_url() .'dashboard');
      }
      ob_clean();
      ob_start();
      $plan_id         =$this->input->post('pad_plan_id');
      $payment_status  =$this->input->post('pad_payment_status');
      $from_date       =date('Y-m-d',strtotime($this->input->post('pad_from_date')));
      $to_date         =date('Y-m-d',strtotime($this->input->post('pad_to_date')));
      $condition_1="";
      $condition_2="";
      $condition_3="";
      $condition_4="";
      if($plan_id){
        $condition_1="and plans.id='".$plan_id."'";
      }
      if($payment_status){
        $condition_2="and payments.payment_status='".$payment_status."'";
      }
      if($from_date){
        $condition_3="and payments.payment_date >='".$from_date."'";
      }
      if($to_date){
        $condition_4="and payments.payment_date<='".$to_date."'";
      }
       $result_payments='';
       $fetch_payment_data=$this->User_model->query("select * from payments inner join plans on payments.payment_plan_id=plans.id inner join committi_users on payments.payment_user_id=committi_users.user_login_id where payments.payment_type='payable' ".$condition_1." ".$condition_2." ".$condition_3." ".$condition_4."");

       if($fetch_payment_data->num_rows()>0){
           $result_payments=$fetch_payment_data->result_array();
       }
          $attach_file_name='Payment_to_committi_report.pdf';
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
                    <tr><td><h3>From Date  :    '.$this->input->post('pad_from_date').'</h3> </td><td></td><td></td></tr>
                    <tr><td><h3>To Date    : '.$this->input->post('pad_to_date').'</h3> </td><td></td><td></td></tr></table>';

          $content .= '
          <h1>Payments Report</h1>
          <table cellpadding="3" border="1">
          <tr style="background-color:#110d35; color: rgb(228, 230, 232);">
          <th><strong>Plan Name</strong></th>
          <th><strong>User Name</strong></th>
          <th><strong>Payable Amount</strong></th>
          <th><strong>Payment Date</strong></th>
          <th><strong>Payment Status</strong></th>
          <th><strong>Payment Type</strong></th>
          </tr>';
          if($result_payments)
          { 
            foreach ($result_payments as $payment) 
            {
              $payment_type ='Recurring Payment';
              if($payment['payment_one_time']!=0){
                  $payment_type ='One Time Payment';
              }
             $payment_date=date('m/d/Y',strtotime($payment['payment_date']));
             $content .= '<tr><td>'.$payment['plan_name'].'</td>
             <td>'.$payment['user_first_name'].' '.$payment['user_last_name'].'</td>
             <td>$ '.number_format($payment['payment_amount'],2).'</td>
             <td>'.$payment_date.'</td>
             <td>'.$payment['payment_status'].'</td>
             <td>'.$payment_type.'</td>
             </tr>';
            }
          }
        $content .= '</table>';
        $obj_pdf->writeHTML($content); 
        $paymentReportAttachment=$obj_pdf->Output($attach_file_name, 'I');
  }
}








// Delete Test Data
// public function truncateDB 
// {

//    $truncate1 = $this->User_model->query("DELETE FROM assigned_plans");
//    $truncate2 = $this->User_model->query("DELETE FROM bidding_details");
//    $truncate3 = $this->User_model->query("DELETE FROM bidding_schedule");
//    $truncate4 = $this->User_model->query("DELETE FROM confirmed_plan_users");
//    $truncate5 = $this->User_model->query("DELETE FROM notification");
//    $truncate6 = $this->User_model->query("DELETE FROM plans");
//    $truncate7 = $this->User_model->query("DELETE FROM statements");
//    $truncate8 = $this->User_model->query("DELETE FROM transactions");
//    $truncate9 = $this->User_model->query("DELETE FROM user_application");
// }