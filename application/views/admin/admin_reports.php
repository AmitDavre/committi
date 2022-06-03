<?php $series_list=$this->config->item('plan_sequence');
$tier_list=$this->config->item('tier');
$income_list=$this->config->item('HouseHoldIncome');
$payment_status_array=$this->config->item('payment_status');
?>
<style type="text/css">
    .si-arrow-down ,.si-arrow-up
    {
        color: #000;
    }
</style>
<!-- Main Container -->
            <main id="main-container">
                  <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" >Reports</li>
                                </ol>
                            </nav>
                    </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content content">

                   <div class="block">
                    <p id="alert_message_trans_desc"></p>
                    <p id="alert_message_trans_desc_error"></p>
                    <p id="alert_message_trans_desc_del"></p>
                        <div class="block-content">
                            <h1 class="content-heading">Reports</h1>
                        <!--     <ul class="nav nav-tabs nav-tabs-block " data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#btabs-animated-fade-home">Reports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-plans">View Description</a>
                                </li>
                           </ul>-->
                            <div class="block-content tab-content overflow-hidden">
                        <div class="row">
                            <div class="col-md-4 block block-themed block-transparent mb-0">
                                <div class="border_box_css block block-mode-hidden">
                                    <div class="block-header">
                                        <h3 class="block-title ">Transactions</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i  class="si si-arrow-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="block block-themed">
                                            <div class="block-header">
                                            <h3 class="block-title">All Transactions</h3>
                                                <div class="block-options">
                                                 <button type="button" class="btn-block-option" data-target="#modal-block-all_transactions" data-toggle="modal">
                                                    <i class="far fa-file-pdf"></i>
                                                 </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                            <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-md-4 block block-themed block-transparent mb-0">
                                <div class="border_box_css block block-mode-hidden">
                                    <div class="block-header">
                                        <h3 class="block-title">Plans</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="block block-themed">
                                            <div class="block-header bg-primary-dark">
                                                <h3 class="block-title">Plans-1</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-toggle='modal' data-target='#modal-block-plans-report-1'>
                                                        <i class="far fa-file-pdf"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <p></p>
                                            </div>
                                        </div>

                                    <div class="block block-themed">
                                        <div class="block-header bg-primary-darker">
                                            <h3 class="block-title">Plans-2</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-toggle='modal' data-target='#modal-block-plans-report-2'>
                                                    <i class="far fa-file-pdf"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <p></p>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 block block-themed block-transparent mb-0">
                                <div class="border_box_css block block-mode-hidden">
                                    <div class="block-header">
                                        <h3 class="block-title ">Bidding</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i  class="si si-arrow-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="block block-themed">
                                            <div class="block-header bg-primary-darker">
                                            <h3 class="block-title">Bidding Details</h3>
                                                <div class="block-options">
                                                 <button type="button" class="btn-block-option" data-target="#modal-block-bidding-details" data-toggle="modal">
                                                    <i class="far fa-file-pdf"></i>
                                                 </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                             

                            <div class="col-md-4 block block-themed block-transparent mb-0">
                                <div class="border_box_css block block-mode-hidden">
                                    <div class="block-header">
                                        <h3 class="block-title ">Users</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i  class="si si-arrow-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="block block-themed">
                                            <div class="block-header bg-primary-darker">
                                                <h3 class="block-title">User Details</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-target="#modal-block-user-details" data-toggle="modal">
                                                        <i class="far fa-file-pdf"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <p></p>
                                            </div>
                                        </div>

                                        <div class="block block-themed">
                                            <div class="block-header bg-success">
                                                <h3 class="block-title">Report By Income</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option"data-target="#modal-block-users-income-report" data-toggle="modal">
                                                        <i class="far fa-file-pdf"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <div class="col-md-4 block block-themed block-transparent mb-0">
                                <div class="border_box_css block block-mode-hidden">
                                    <div class="block-header">
                                        <h3 class="block-title ">Statements</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i  class="si si-arrow-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="block block-themed">
                                            <div class="block-header bg-primary-light">
                                                <h3 class="block-title">Statement Report</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option"data-target="#modal-block-users-statement-report" data-toggle="modal">
                                                        <i class="far fa-file-pdf"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                             

                            <div class="col-md-4 block block-themed block-transparent mb-0">
                                <div class="border_box_css block block-mode-hidden">
                                    <div class="block-header">
                                        <h3 class="block-title ">Referral </h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i  class="si si-arrow-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="block block-themed">
                                            <div class="block-header bg-success">
                                                <h3 class="block-title">Referral Report</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-toggle='modal' data-target='#modal-block-refferral-report'>
                                                        <i class="far fa-file-pdf"></i>
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 


                             <div class="col-md-4 block block-themed block-transparent mb-0">
                                <div class="border_box_css block block-mode-hidden">
                                    <div class="block-header">
                                        <h3 class="block-title">Payment Activity</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-down"></i></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="block block-themed">
                                            <div class="block-header bg-primary-dark">
                                                <h3 class="block-title">Payment To Committi</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-toggle='modal' data-target='#modal-block-payment-to-committi'>
                                                        <i class="far fa-file-pdf"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <p></p>
                                            </div>
                                        </div>

                                    <div class="block block-themed">
                                        <div class="block-header bg-primary-darker">
                                            <h3 class="block-title">Payment From Committi</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-toggle='modal' data-target='#modal-block-payment-from-committi'>
                                                    <i class="far fa-file-pdf"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <p></p>
                                        </div>
                                    </div>
                                      <div class="block block-themed">
                                        <div class="block-header bg-primary-darker">
                                            <h3 class="block-title">Payments</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-toggle='modal' data-target='#modal-block-pad_payments'>
                                                    <i class="far fa-file-pdf"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <p></p>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </main>
 <!-- END Main Container -->

                        <!-- Pop Out Block Modal Payment To Commiti-->
                    <div class="modal fade" id="modal-block-payment-to-committi" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Payment To Committi Report</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generatePaymentPayableReport" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white fromDate" id="fromDate" name="from_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">To Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white toDate" id="toDate" name="to_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date">
                                                </div>
                                                  <div class="col-md-3">
                                                    <label for="one-profile-edit-name">Payment Status</label>
                                                    <select class='form-control' id='payment_status' name='payment_status'>
                                                      <option value=''>Select Payment Status</option>
                                                      <?php if($payment_status_array){
                                                        foreach($payment_status_array as $payment){ ?>
                                                          <option value="<?php echo $payment;?>"><?php echo $payment;?></option>

                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                                    <div class="col-md-3">
                                                    <label for="one-profile-edit-name">Plan List</label>
                                                    <select class='form-control' id='planListBiddingDetails' name='plan_id' onchange='selectedBiddingDetailData();'>
                                                      <option value=''>Select Plan</option>
                                                      <?php if($plan_list){
                                                        foreach($plan_list as $plan){ ?>
                                                          <option value="<?php echo $plan['id']?>"><?php echo $plan['plan_name'] ?></option>
                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                            </div>
                                             <br>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="transactions_generate_pdf_button" name="transactions_generate_pdf_button" type="submit"><i class="fa fa-file-pdf mr-1" onclick="closeModal();"></i>PDF</button>

                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->
                       <!-- Pop Out Block Modal pad Payment From Commiti-->
                    <div class="modal fade" id="modal-block-pad_payments" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Payment From Committi Report</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generatePadPaymentReport" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white fromDate" id="padfromDate" name="pad_from_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">To Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white toDate" id="padtoDate" name="pad_to_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date">
                                                </div>
                                                  <div class="col-md-3">
                                                    <label for="one-profile-edit-name">Payment Status</label>
                                                    <select class='form-control' id='pad_payment_status' name='pad_payment_status'>
                                                      <option value=''>Select Payment Status</option>
                                                      <?php if($payment_status_array){
                                                        foreach($payment_status_array as $payment){ ?>
                                                          <option value="<?php echo $payment;?>"><?php echo $payment;?></option>

                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                                 <div class="col-md-3">
                                                    <label for="one-profile-edit-name">Plan List</label>
                                                    <select class='form-control' id='padplanListBiddingDetails' name='pad_plan_id' onchange='selectedBiddingDetailData();'>
                                                      <option value=''>Select Plan</option>
                                                      <?php if($plan_list){
                                                        foreach($plan_list as $plan){ ?>
                                                          <option value="<?php echo $plan['id']?>"><?php echo $plan['plan_name'] ?></option>
                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                            </div>
                                             <br>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="padPAY" name="padPAY" type="submit"><i class="fa fa-file-pdf mr-1" onclick="closeModal();"></i>PDF</button>

                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out pad Block Modal -->


                        <!-- Pop Out Block Modal Payment From Commiti-->
                    <div class="modal fade" id="modal-block-payment-from-committi" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Payment From Committi Report</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generatePaymentRefundReport" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white fromDate" id="fromDate" name="from_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">To Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white toDate" id="toDate" name="to_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date">
                                                </div>
                                                  <div class="col-md-3">
                                                    <label for="one-profile-edit-name">Payment Status</label>
                                                    <select class='form-control' id='payment_status' name='payment_status'>
                                                      <option value=''>Select Payment Status</option>
                                                      <?php if($payment_status_array){
                                                        foreach($payment_status_array as $payment){ ?>
                                                          <option value="<?php echo $payment;?>"><?php echo $payment;?></option>

                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                                 <div class="col-md-3">
                                                    <label for="one-profile-edit-name">Plan List</label>
                                                    <select class='form-control' id='planListBiddingDetails' name='plan_id' onchange='selectedBiddingDetailData();'>
                                                      <option value=''>Select Plan</option>
                                                      <?php if($plan_list){
                                                        foreach($plan_list as $plan){ ?>
                                                          <option value="<?php echo $plan['id']?>"><?php echo $plan['plan_name'] ?></option>
                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                            </div>
                                             <br>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="transactions_generate_pdf_button" name="transactions_generate_pdf_button" type="submit"><i class="fa fa-file-pdf mr-1" onclick="closeModal();"></i>PDF</button>

                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->

                      <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-all_transactions" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate Transaction Statement</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generateTransactionReport" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white fromDate" id="fromDate" name="from_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">To Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white toDate" id="toDate" name="to_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date">
                                                </div>
                                                  <div class="col-md-6">
                                                    <label for="one-profile-edit-name">Plan List</label>
                                                    <select class='form-control' id='planListTransaction' name='plan_id'>
                                                      <option value=''>Select Plan</option>
                                                      <?php if($plan_list){
                                                        foreach($plan_list as $plan){ ?>
                                                          <option value="<?php echo $plan['id']?>"><?php echo $plan['plan_name'] ?></option>

                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                            </div>
                                             <br>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="transactions_generate_excel_button" name="transactions_generate_excel_button" type="submit"><i class="fa fa-file-excel mr-1" onclick="closeModal();"></i>Excel</button>
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="transactions_generate_pdf_button" name="transactions_generate_pdf_button" type="submit"><i class="fa fa-file-pdf mr-1" onclick="closeModal();"></i>PDF</button>

                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->
                    <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-bidding-details" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate Bidding Details Statement</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generateBiddingDetailsReport" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                 <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Plan List</label>
                                                    <select class='form-control' id='planListBiddingDetails' name='plan_id' onchange='selectedBiddingDetailData();'>
                                                      <option value=''>Select Plan</option>
                                                      <?php if($plan_list){
                                                        foreach($plan_list as $plan){ ?>
                                                          <option value="<?php echo $plan['id']?>"><?php echo $plan['plan_name'] ?></option>
                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Select Cycle</label>
                                                    <select class='form-control' id='cycleList' name='bidding_cycle'>
                                                      <option value=''>Select Bidding Cycle</option>
                                    
                                                    </select>
                                                     
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Select User</label>
                                                     <select class='form-control' id='userList' name='userList'>
                                                      <option value=''>Select User</option>
                                    
                                                    </select>
                                                     
                                                </div>
                                                 
                                            </div>
                                             <br>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="statement_generate_buttons" name="statement_bidding_details_buttons" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->
                    <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-plans-report-1" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate Plan Statement-1</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generatePlanReport1" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                    <input type="text" class="js-flatpickr form-control bg-white fromDate" name="from_date"  value="" style="margin-bottom: 10px;" placeholder="From Date">
                                                 </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">To Date</label>
                                                   <input type="text" class="js-flatpickr form-control bg-white toDate" name="to_date"  value="" style="margin-bottom: 10px;" placeholder="To Date">
                                                </div>
                                                 <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Series List</label>
                                                    <select class='form-control' id='seriesList' name='series_list'>
                                                      <option value=''>Select Plan Series</option>
                                                      <?php
                                                        foreach($series_list as $key=>$series){ ?>
                                                          <option value="<?php echo $key;?>"><?php echo $series; ?></option>
                                                        <?php }
                                                       ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Winner</label>
                                                     <select class='form-control' id='seriesList' name='series_list'>
                                                      <option value=''>Select Winner</option>
                                                      <?php
                                                        foreach($series_list as $key=>$series){ ?>
                                                          <option value="<?php echo $key;?>"><?php echo $series; ?></option>
                                                        <?php }
                                                       ?>
                                                    </select>
                                                     
                                                 </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Winning Bid Amount</label>         <input type="text" id="winningBidAmount" name="winnig_bid_amount" class="form-control currency_format" placeholder="$0.00" onkeypress="return isNumber(event)">                            
                                                </div>
                                                 <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Start Amount</label>
                                                             <input type="text" id="startAmount" name="start_amount" class="form-control currency_format" placeholder="$0.00" onkeypress="return isNumber(event)">
                                                </div>
                                            </div>
                                             <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Min Amount</label>
                                                    <input type="text" id="minAmount" name="min_amount" class="form-control currency_format" placeholder="$0.00" onkeypress="return isNumber(event)">
                                                 </div>
                                            </div>
                                           
                                                    <br>
                                    
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="statement_generate_buttons" name="statement_bidding_details_buttons" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->
                     <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-user-details" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate User details Report</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generateUserDetailsReport" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white fromDate" name="from_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">To Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white toDate" name="to_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date">
                                                </div>
                                                  <div class="col-md-3">
                                                    <label for="one-profile-edit-name">Plan List</label>
                                                    <select class='form-control' id='planListUserDetails' name='plan_id'>
                                                      <option value=''>Select Plan</option>
                                                      <?php if($plan_list){
                                                        foreach($plan_list as $plan){ ?>
                                                          <option value="<?php echo $plan['id']?>"><?php echo $plan['plan_name'] ?></option>

                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                                 <div class="col-md-3">
                                                    <label for="one-profile-edit-name">Plan List</label>
                                                    <select class='form-control' id='tierlist' name='tier'>
                                                      <option value=''>Select Tier</option>
                                                      <?php
                                                        foreach($tier_list as $key=>$tier){ ?>
                                                          <option value="<?php echo $key;?>"><?php echo $tier; ?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                             <br>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="statement_generate_buttons" name="statement_generate_buttons" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>

                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->
                       <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-users-income-report" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate Users Report By Their Income Range</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/userReportByIncomeRange" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">By Income Range</label>
                                                    <select class='form-control' id='incomeList' name='income_range'>
                                                      <option value=''>Select Income Range</option>
                                                      <?php
                                                        foreach($income_list as $key=>$income){ ?>
                                                          <option value="<?php echo $key;?>"><?php echo $income; ?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                                </div>
                                             <br>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="user_income_report_button" name="user_income_report_button" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>

                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->
                      <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-users-statement-report" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate Statement Report</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/userStatementReport" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                 <div class="col-md-4">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white fromDate" name="from_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">To Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white toDate" name="to_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Plan List</label>
                                                   <select class='form-control' id="statementPlanList" name='plan_id' onchange="getEnrolledUsersList();">
                                                      <option value=''>Select Plan</option>
                                                      <?php
                                                        foreach($plan_list as $plan){ ?>
                                                           <option value="<?php echo $plan['id']?>"><?php echo $plan['plan_name'] ?></option>
                                                        <?php }
                                                       ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">User List</label>
                                                   <select class='form-control' id="enrollUserList" name='user_id'>
                                                      <option value=''>Select User</option>
                                                      
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">No.of Generated Statement</label>
                                                 <input type="number" min='0' name="no_of_statement" class="form-control" placeholder="Enter Number">
                                                </div>
                                            </div>
                                             <br>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="statement_report_button" name="statement_report_button" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->
                       <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-users-applications-report" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate Users Applications Report</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/usersApplicationsReport" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                 <div class="col-md-4">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white fromDate" name="from_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">To Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white toDate" name="to_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Application Status</label>
                                                   <select class='form-control' id="applicationStatus" name='application_status'>
                                                      <option value=''>Select Application Status</option>
                                                      <?php
                                                        foreach($user_application_status as $key=>$status){ ?>
                                                           <option value="<?php echo $key;?>"><?php echo $status; ?></option>
                                                        <?php }
                                                       ?>
                                                    </select>
                                                </div>
                                            </div>
                                             <br>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="users_applications_button" name="users_applications_report_button" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->

                    <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-plans-report-2" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate Plan Statement-2</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generatePlanReport2" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                    <input type="text" class="js-flatpickr form-control bg-white fromDate" id="fromDatePlan2" name="fromDatePlan2"  value="" style="margin-bottom: 10px;" placeholder="From Date">
                                                 </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">To Date</label>
                                                   <input type="text" class="js-flatpickr form-control bg-white toDate" id="to_datePlan2" name="to_datePlan2"  value="" style="margin-bottom: 10px;" placeholder="To Date">
                                                </div>
                                                 <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Status </label>
                                                    <select class='form-control' id='statusList' name='statusList'>
                                                      <option value=''>Please Select</option>
                                                      <option value="2">Active</option>
                                                      <option value="3">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-4">
                                                     <label for="one-profile-edit-name">No of Bidding Cycle</label>
                                                    <input type="text" class="form-control bg-white" id="noofBiddingCycle" name="noofBiddingCycle"  value="" style="margin-bottom: 10px;" placeholder="Enter here">
                                                </div>
                                            </div>
                                 
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="statement_generate_buttons" name="statement_bidding_details_buttons" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->

                    <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-refferral-report" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Referral Report</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generateReferaalReport" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                    <input type="text" class="js-flatpickr form-control bg-white fromDate" id="fromDateReferral" name="fromDateReferral"  value="" style="margin-bottom: 10px;" placeholder="From Date">
                                                 </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">To Date</label>
                                                   <input type="text" class="js-flatpickr form-control bg-white toDate" id="to_dateReferaal" name="to_dateReferaal"  value="" style="margin-bottom: 10px;" placeholder="To Date">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="statement_generate_buttons" name="statement_bidding_details_buttons" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->

 <script type="text/javascript">
   function closeModal()
   {
    $('#close_cross').click();
   }
   function selectedBiddingDetailData(){
    $('#userList').html('');
    $('#cycleList').html('');
    var plan_id=$('#planListBiddingDetails').find(":selected").val();
    var bidding_cycle_count=$('#cycleList').find(":selected").val();
    $.ajax({
        url:'<?php echo base_url()?>Report/fetchBiddingDetails',
        type:'POST',
        data:{
            'plan_id':plan_id,
            'bidding_cycle_count':bidding_cycle_count
        },
        success:function(response){
            var responseData=JSON.parse(response);
            $('#cycleList').html('');
            $('#userList').html('');
             $('#cycleList').append("<option value=''>Select Bidding Cycle </option>");
             $('#userList').append("<option value=''>Select User</option>");
            $.each(responseData.bidding_detail_data,function(index){
               $('#cycleList').append('<option value="'+responseData.bidding_detail_data[index].bidding_cycle_count+'">'+responseData.bidding_detail_data[index].bidding_cycle_count+'</option>')
            });
            if(responseData.user_data!='')
            {
              $.each(responseData.user_data,function(index){
               $('#userList').append('<option value="'+responseData.user_data[index].id+'">'+responseData.user_data[index].fullname+'</option>')
            });
         }
        }
    });
   }
   function getEnrolledUsersList(){
    $('#enrollUserList').html('');
    var plan_id=$('#statementPlanList').find(":selected").val();

    $.ajax({
        url:'<?php echo base_url()?>Report/getEnrolledUserList',
        type:'POST',
        data:{
            'plan_id':plan_id,
        },
        success:function(response){
            var responseData=JSON.parse(response);
            $('#enrollUserList').html('');
             $('#enrollUserList').append("<option value=''>Select User</option>");
            if(responseData.user_data!='')
            {
              $.each(responseData.user_data,function(index){
               $('#enrollUserList').append('<option value="'+responseData.user_data[index].id+'">'+responseData.user_data[index].fullname+'</option>')
            });
         }
        }
    });
   }
 </script>


