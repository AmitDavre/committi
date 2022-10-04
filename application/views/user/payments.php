<?php $pad_settings=$this->config->item('PAD_payment_setting'); ?>
<!-- Main Container -->
<link href="https://fonts.googleapis.com/css2?family=The+Nautigal&display=swap" rel="stylesheet" type="text/css">
<style type="text/css">
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
    font-family: 'The Nautigal', cursive!important;
    margin-top: 20px;
    padding-left: 10px;
    line-height: 22px;
    /*border-bottom: 2px dotted #5f6066;*/
    color: #45464c;
}
.font-normal{
    font-weight:normal!important;
}
</style>
            <main id="main-container">
                  <!-- Hero -->
                  <div id="page-loader" class="show"></div>
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted">Payments</li>
                                </ol>
                            </nav>
                    </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content content">
                   <div class="block">
                    <p id="alert_message"></p>
                    <p id="alert_error_message"></p>
                    <p id="all_required"></p>
                        <div class="block-header">
                            <h3 class="block-title">Make a Payment</h3>
                        </div>
                        <div class="block-content">
                            <ul class="nav nav-tabs nav-tabs-block " data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#btabs-animated-fade-payment">Payment </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-payment-activity" data-toggle="payment-table-tab">Payment Activity</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#btabs-animated-fade-payment-bank" id="add_bank_account_link">Add Bank Account</a>
                                </li>      
                                <li class="nav-item">
                                    <a class="nav-link" href="#btabs-animated-fade-view-bank" data-toggle="bank_table_tab">View Bank Accounts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-view-settings" id="pads_setting_tabb" data-toggle="bank_table_tab">PAD'S</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade active show" id="btabs-animated-fade-payment" role="tabpanel">
                                    <h3 class="block-title mb-3">Select Plan</h3>
                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="example-select">Select Plan  <span style="color:red">* </span></label> 
                                             <select  class="form-control" id="select_plan" name="select_plan" onchange="get_bidding_cycle_statement();">
                                                <option value="">Please Select</option>
                                             <?php
                                                // Iterating through the tier array
                                                foreach($result_fetch_plans as $key =>$item){
                                                ?>
                                                <option value="<?php  echo $item['user_application_plan_id'];?>" <?php if($plan_id!='' && $plan_id==$item['user_application_plan_id']){ echo 'selected';}?>>
                                                <?php echo $item['user_application_plan_name'];?>
                                                </option>
                                                <?php
                                                }
                                            ?> 
                                            </select>
                                        </div>   
                                    </div>      
                                    <hr>  
                                    <h3 class="block-title mb-3">Select Amount</h3>
                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="example-select">Statement Balance</label> 
                                            <input type="text" class="form-control" id="statement_balance" name="statement_balance" value="" readonly="readonly">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">Minimum Balance Due</label> 
                                            <input type="text" class="form-control" id="min_bal_due" name="min_bal_due"  value="" readonly="readonly">
                                        </div>         
                                        <div class="col-md-4">
                                            <label for="example-select">Enter Amount  <span style="color:red">* </span></label> 
                                            <input type="hidden" name="hidden_statement_balance" value="" id="hidden_statement_balance">
                                            <input type="hidden" id="balance_sign" name="balance_sign" value="">
                                            <input type="text" class="form-control currency_format" id="enter_custom_amount" name="enter_custom_amount" placeholder="Enter here" value="" autocomplete="off" onkeypress="return isNumber(event)" onchange="return amount_validation();">
                                            <span class="text-danger amount_error"></span>
                                        </div>
                                    </div>      
                                    <hr>                               
                                    <h3 class="block-title mb-3">Select Payment Date </h3>
                                    <hr>
                                    <div class="row mb-3">
                                            <input  style="display: none;" type="text" class="js-flatpickr form-control bg-white" id="pay_now_date" name="pay_now_date"  value="" autocomplete="off" readonly="readonly">
                                        <div class="col-md-4">
                                            <label for="example-select">Due Date</label> 
                                            <input type="text" class="js-flatpickr form-control bg-white" id="due_date" name="due_date"  value="" autocomplete="off" disabled style="background-color: #e9ecef!important">
                                        </div>         
                                        <div class="col-md-4">
                                            <label for="example-select">Enter Date  <span style="color:red">* </span></label> 
                                            <input type="text" class="js-flatpickr form-control bg-white" id="enter_custom_date" name="enter_custom_date"  value="" autocomplete="off" placeholder="Please Select">
                                        </div>
                                    </div> 

                                    <hr>                               
                                    <h3 class="block-title mb-3">Select Account </h3>
                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="example-select">Select Bank Account  <span style="color:red">* </span></label> 
                                            <select  class="form-control" id="select_bank_account" name="select_bank_account" onchange="return get_bank_info_by_id(this);">
                                                <option value="">Please Select</option>
                                             <?php
                                                 if($result_fetch_bank_account != '')
                                                 {
                                                    foreach($result_fetch_bank_account as $key =>$item){
                                                    ?>
                                                    <option value="<?php  echo $item['bank_account_id'];?>" >
                                                    <?php echo $item['bank_account_nickname'];?>
                                                    </option>
                                                    <?php
                                                    }
                                                 }
                                            ?> 
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                        <label for="addBankAccount" style="visibility:hidden;">Add Bank Account</label>
                                         <button onclick="return openTheBankaccountTab();" class="form-control-sm btn btn-sm btn-info" id="addBankAccount" type="button">Add Bank Account</button>
                                        </div>
                                    </div>                    
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <button class="form-control-sm btn btn-sm btn-info" id="PaymentButton" onclick="submit_payment();">Pay Now</button>
                                        </div>
                                    </div> 
                                </div>            
                                <style type="text/css">
                                    .dataTables_scrollHeadInner{
                                        width: 981px!important;
                                    }
                                </style>
                                <div class="tab-pane fade" id="btabs-animated-fade-payment-activity" role="tabpanel">
                                    <table id="payment_history_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                                    <thead>
                                                        <tr role="row">
                                                            <th style="width: 20%;" class="text-center">S.No</th>
                                                            <th style="width: 20%;" class="text-center"> Payment Date </th>
                                                            <th style="width: 20%;" class="text-center">Payment Amount</th>
                                                            <th style="width: 20%;" class="text-center">Refund Amount</th>
                                                            <th style="width: 20%;" class="text-center">Payment Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                        if ($result_fetch_payments != '')
                                                        {
                                                            $count =1; 
                                                            foreach($result_fetch_payments as $item) 
                                                                { 
                                                        ?> 
                                                                <tr>
                                                                    <td class="text-center font-size-sm"><?php echo $count++ ?></td>
                                                                    <td class="text-center font-size-sm ">

                                                                     <?php $bidding_place_bid_date= date('m/d/Y',strtotime($item['payment_date'])); echo $bidding_place_bid_date;?>

                                                                </td>
                                                                    
                                                                    <td class="text-center font-size-sm">$<?php echo number_format($item['payment_amount'],2);?> </td>
                                                                     <td class="text-center font-size-sm">$<?php echo number_format($item['payment_refund_amount'],2);?> </td>

                                                                    <td class="text-center font-size-sm"><b><?php echo $item['payment_status'];?></b></td>
                                                        
                                                                </tr>
                                                        <?php   }
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                    </div>
                                    <div class="tab-pane fade" id="btabs-animated-fade-view-settings" role="tabpanel">
                                        <div class="pad_set_div">
                                        <hr>
                                        <form id="payment_settings" method="post">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                            <label for="example-select">Select Plan  <span style="color:red">* </span></label> 
                                             <select  class="form-control" id="pad_select_plan" name="pad_select_plan" onchange="get_pad_setting_information(this)">
                                                <option value="">Please Select</option>
                                             <?php
                                                // Iterating through the tier array
                                                foreach($result_fetch_plans as $key =>$item){
                                                ?>
                                                <option value="<?php  echo $item['user_application_plan_id'];?>" <?php if($plan_id!='' && $plan_id==$item['user_application_plan_id']){ echo 'selected';}?>>
                                                <?php echo $item['user_application_plan_name'];?>
                                                </option>
                                                <?php
                                                }
                                            ?> 
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                                <label for="example-select">Payment Type</label> 
                                             <select  class="form-control" id="pad_payment_type" name="pad_payment_type">
                                              <?php foreach($pad_settings as $p_key=>$p_set){?>
                                                   <option value="<?php echo $p_key; ?>" <?php if($session_data['pad_payment_type']==$p_key){ echo 'selected'; } ?>><?php echo $p_set; ?></option>
                                              <?php } ?>
                                            </select>
                                            </div> 
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="example-select">Select Bank Account  <span style="color:red">* </span></label> 
                                            <select  class="form-control" id="pad_select_bank_account" name="pad_select_bank_account" onchange="return get_bank_info_by_id(this);">
                                                <option value="">Please Select</option>
                                             <?php
                                                // Iterating through the tier array
                                                 if($result_fetch_bank_account != '')
                                                 {
                                                    foreach($result_fetch_bank_account as $key =>$item){
                                                    ?>
                                                    <option value="<?php  echo $item['bank_account_id'];?>" >
                                                    <?php echo $item['bank_account_nickname'];?>
                                                    </option>
                                                    <?php
                                                    }
                                                 }
                                            ?> 
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                        <label for="addBankAccount" class="mb-2" style="visibility:hidden;">Add Bank Account</label>
                                         <button onclick="return openTheBankaccountTab();" class="form-control-sm btn btn-sm btn-info" id="addBankAccount" type="button">Add Bank Account</button>
                                        </div>
                                    </div>
                                        <hr>                                                              
                                        <div class="row mb-3">
                                            <div class="col-md-12 ">
                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="pad_setting_check" value="1" name="pad_setting_check" <?php if($session_data['pad_payment_setting_check']==1){ echo 'checked';}?>>
                                                <label class="form-check-label" for="pad_setting_check">I/We have read and agree to <a href="#settings_pad_terms_condition" data-toggle="modal" style="color:#1737f5!important;">terms and conditions.</a></label>
                                            </div>
                                        </div>
                                       </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-sm btn-info" id="submit_btn" onclick="PAD_settings();">Submit</button>
                                                <!-- <button type="button" class="btn btn-sm btn-info d-none" id="submit_btn_1" onclick="PAD_settings_deactivate();">Deactivate</button>                   -->    
                                            </div>  
                                        </div>
                                    </form>
                                    <hr class="mb-4 mt-4">
                                    <label for="pad_history_table_1" class="mb-4 mt-4">Active PAD's</label>
                                    <table id="pad_history_table_1" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                                    <thead>
                                                        <tr role="row">
                                                            <th style="width: 20%;" class="text-center">S.No</th>
                                                            <th style="width: 40%;" class="text-center">Bank Account</th>
                                                            <th style="width: 20%;" class="text-center">Plan Name</th>
                                                            <th style="width: 20%;" class="text-center">Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                        if($pad_plan_list != ''){
                                                            $pad_plan_count =1; 
                                                            foreach($pad_plan_list as $pad_plan_item) 
                                                                { ?> 
                                                                <tr role="row" class="odd">
                                                                    <td class="text-center font-size-sm"><?php echo $pad_plan_count++; ?></td>
                                                                    <td class="text-center font-size-sm"><?php echo $pad_plan_item['bank_account_number'];?></td>
                                                                    <td class="text-center font-size-sm"><?php echo $pad_plan_item['user_application_plan_name'];?></td>
                                                                     <td class="text-center font-size-sm"><a style="cursor:pointer;" data-planid="<?php echo $pad_plan_item['user_application_plan_id'];?>" data-appid="<?php echo $pad_plan_item['a_id'];?>" data-bankid="<?php echo $pad_plan_item['user_application_bank_id'];?>" onclick="change_pad_agreement_bank(this);"><i class="text-dark nav-main-link-icon si si-pencil"></i></a></td>
                                        
                                                                </tr>
                                                        <?php   }
                                                        }
                                                        ?>
                                                        </tbody> 
                                                    </table>
                                    <hr class="mb-4 mt-4">
                                     <label for="pad_history_table" class="mb-4 mt-4">PAD's History</label>
                                     <table id="pad_history_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                                    <thead>
                                                        <tr role="row">
                                                            <th style="width: 20%;" class="text-center">S.No</th>
                                                            <th style="width: 40%;" class="text-center">Bank Account</th>
                                                            <th style="width: 20%;" class="text-center">Plan</th>
                                                            <th style="width: 20%;" class="text-center">Start Date</th>
                                                            <th style="width: 20%;" class="text-center">Deactivated Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                        if ($pad_history != ''){
                                                            $pad_count =1; 
                                                            foreach($pad_history as $pad_item) 
                                                                { ?> 
                                                                <tr role="row" class="odd">
                                                                    <td class="text-center font-size-sm"><?php echo $pad_count++; ?></td>
                                                                    <td class="text-center font-size-sm"><?php echo $pad_item['pad_bank_account'];?></td>
                                                                    <td class="text-center font-size-sm"><?php echo $pad_item['pad_plan_name'];?></td>
                                                                    <td class="text-center font-size-sm"><?php if($pad_item['pad_start_date']!='' && $pad_item['pad_start_date']!='0000-00-00 00:00:00'){ echo date('m/d/Y',strtotime($pad_item['pad_start_date']));}?></td>
                                                                     <td class="text-center font-size-sm"><?php if($pad_item['pad_deactivate_date']!='' && $pad_item['pad_deactivate_date']!='0000-00-00 00:00:00'){ echo date('m/d/Y',strtotime($pad_item['pad_deactivate_date']));} ?></td>
                                                                </tr>
                                                        <?php   }
                                                        }
                                                        ?>
                                                        </tbody> 
                                                    </table>
                                                </div>
                                    </div>                                    
                                    <div class="tab-pane fade" id="btabs-animated-fade-view-bank" role="tabpanel">
                                        <table id="bank_account_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                                    <thead>
                                                        <tr role="row">
                                                            <th style="width: 20%;" class="text-center">S.No</th>
                                                            <th style="width: 40%;" class="text-center"> Bank Account Name </th>
                                                            <th style="width: 20%;" class="text-center">Bank Account Number </th>
                                                            <th style="width: 20%;" class="text-center">Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> 
                                                        <?php 
                                                        if ($result_fetch_bank_account != ''){
                                                            $count =1; 
                                                            foreach($result_fetch_bank_account as $item) 
                                                                { ?> 
                                                                <tr role="row" class="odd">
                                                                    <td class="text-center font-size-sm"><?php echo $count++ ?></td>
                                                                    <td class="text-center font-size-sm"><?php echo $item['bank_account_nickname'];?></td>
                                                                    <td class="text-center font-size-sm"><?php echo $item['bank_account_number'];?></td>
                                                                    <td class="text-center font-size-sm"> <a href="<?php base_url()?>edit-b-account/<?php echo base64_encode($item['bank_account_id']);?>"><i class="text-dark nav-main-link-icon si si-pencil"></i> </a></td>
                                                                    
                                                                </tr>
                                                        <?php   }
                                                        }
                                                        ?>
                                                        </tbody> 
                                                    </table>
                                    </div>
                                      <div class="tab-pane fade" id="btabs-animated-fade-payment-bank" role="tabpanel">
                                        <hr>
                                        <form id="valid_add_bank_form" method="post">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="example-select"> Transit  <span style="color:red">* </span></label> 
                                                <input type="text" class="form-control" id="transit_number" name="transit_number" placeholder="Enter here" value="" maxlength="5" onkeypress="return isNumber(event)" autocomplete="off">
                                                 <p class="text-danger error_transit_no"></p>
                                            </div>  

                                            <div class="col-md-4">
                                                <label for="example-select">Institution  <span style="color:red">* </span></label> 
                                                <input type="text" class="form-control" id="institution_no" name="institution_no" placeholder="Enter here" value="" maxlength="3" onkeypress="return isNumber(event)" autocomplete="off">
                                                 <p class="text-danger error_institution_no"></p>
                              
                                            </div>

                                            <div class="col-md-4 items-push js-gallery img-fluid-100 animated fadeIn">
                                            <label for="example-select"></label>          
                                                <a class="img-link img-link-zoom-in img-thumb img-lightbox" href="<?php echo base_url();?>assets/img/check_bank_account_demo.png">
                                            <img class="img-fluid" src="<?php echo base_url();?>assets/img/check_bank_account_demo.png" alt="" style="width:25%!important">
                                            </a>
                                        </div>
                                        </div> 
                                        <hr>                                
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="example-select">Bank Account Number  <span style="color:red">* </span></label> 
                                                <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" placeholder="Enter here" value=""  maxlength="7" onkeypress="return isNumber(event)" autocomplete="off">
                                                <p class="text-danger error_bank_account"></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="example-select">Re-Enter Bank Account Number <span style="color:red">* </span></label> 
                                                <input type="text" class="form-control" id="confirm_bank_account_number" name="confirm_bank_account_number" placeholder="Enter here" value=""  maxlength="7" onkeypress="return isNumber(event)" autocomplete="off">
                                                <p  style="display: none;" id="re_enter_bank_no" ></p>
                                            </div>
                                                
                                        </div>                                         
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="example-select">Account Type  <span style="color:red">* </span></label> 
                                                <select  class="form-control" id="bank_account_type" name="bank_account_type">
                                                    <option value="">Please Select</option>
                                                    <option value="1">Checking Account</option>
                                                    <option value="2">Savings Account</option>
                                                </select>
                              
                                            </div>
                                            <div class="col-md-4">
                                                <label for="example-select"> Bank Account Nickname</label> 
                                                <input type="text" class="form-control" id="bank_account_name" name="bank_account_name" placeholder="Enter here" value="" >
                                            </div>  
                                        </div>                                         
                                        <hr>
                                    </form>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <button class="btn btn-sm btn-info" id="submit_btn" onclick="bank_term_and_condition();">Submit</button>                              
                                            </div> 
                                        </div> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                 </main>
                 <!-- END Main Container -->
<div class="modal" id="pad_agreement_modal" tabindex="-1" role="dialog" aria-labelledby="pad_agreement_modal" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title"> One Time Agreement</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content pl-6 pr-6">
                            <div class="row p-3">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12"><img src="<?php echo base_url(); ?>assets/img/logo.jpg" width="133px" class="float-right"></div>
                            </div>
                           <h3 class="text-center">One Time Agreement</h3>
                        <h5 class="text-bold text-center">
                            <span> Committi Account: <span id="agg_bank_account"></span></span>
                            <span>Statement Balance: $              </span>
                            <span>Due Date: MM / DD / YYYY           </span>
                        </h5>

                        <h6><b class=" text-capitalize">Client’s Name : </b><?php echo $session_data['first_name'].' '.$session_data['last_name'];?></h6> 
                        <h6><b class=" text-capitalize">Address : </span>
                         <?php echo $committi_user['usert_street'].','.$committi_user['user_street_name'].','.$committi_user['user_unit_no'].','.$committi_user['user_provience'].','.$committi_user['user_postal_code']; ?></b>
                        </h6>
                        <h6><b class=" text-capitalize">Phone : </b><?php echo $committi_user['user_phone_no']; ?></h6>
                        <h6><b class=" text-capitalize">Email : </b><?php echo $committi_user['user_email']; ?></h6>
                        <p>
                        What Is Your Preferred Contact Method <span style="color:red"> *</span>:
                        <input type="checkbox" name="prefered_contact_method[]" value="1" id="preferred_contact_method_1"> Phone
                        <input type="checkbox" name="prefered_contact_method[]" class="ml-3" id="preferred_contact_method_2" value="2"> Email
                        </p>
                        <!-- <p class="text-center">
                            <img src="<?php echo base_url() ?>assets/img/check_bank_account_demo.png" alt="" style="width:66%!important;">
                        </p> -->
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
                                <input type="text" id="account_no" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <p>These service are for (check one) <span style="color:red"> * </span>:
                            <input type="checkbox" name="service_use_for"  id="service_use_for_1" class="service_use_for" onchange="only_one_checkbox('.service_use_for')" value="1"> Personal
                            <input type="checkbox" name="service_use_for"  id="service_use_for_2" class="ml-3 service_use_for" onchange="only_one_checkbox('.service_use_for')" value="2"> Business Use
                        </p>
                        <div id="term_and_conditions">
                            <h5 class="text-bold">Terms & Conditions:</h5>
<p>I/we authorize Committi Inc. and its affiliates and agents (collectively "Committi") and the financial institution designated above (or any other financial institution I/we may authorize at any time) to begin deductions as per my/our instructions for payment of regular payments arising under my/our Committi account mentioned above.</p>

<p>Regular payments ("PAP") for the full amount of the Committi account will be debited to my/our specified account identified above on the due date of the payment as set out in the statement.<b>The statement for the above Committi account will be available periodically (either weekly, bi-weekly, bi-monthly or monthly) as identified in Committi’s account agreement, withing 24 hours of periodic bidding. I/we hereby waive my/our right to receive pre-notification of the amount of the PAP.</b></p>
<p><b>Committi statements will be provided no less than 3 days before any PAP is made.</b></p>
<p>For customers which are a corporation or partnership, my/our submission of this authorization by clicking the submit button below will be confirmation that I/we have the authority to bind the corporation or the partnership.</p>
<p>This authorization is to remain in effect until Committi has received notification from me/us in writing, via recorded telephone call or via on-line communication (via Committi’s website) to cancel this authorization. Any cancellation will be effective for the first payment to occur more than 5 days after the date the notice of cancellation is received by Committi. I/we may obtain a sample cancellation form to send to Committi, or more information on my/our right to cancel a PAP agreement at my/our financial institution or by visiting <a href="https://www.payments.ca/" target="_blank" style="color:#1737f5!important;">www.payments.ca</a></p>
<p>I/we have certain recourse rights if any debit does not comply with this agreement. For example, I/we have the right to receive reimbursement for any debit that is not authorized or is not consistent with this PAD agreement. To obtain a form for a Reimbursement Claim to send to Committi, or for more information on my/our recourse rights, I/we may contact my/our financial institution or visit <a href="https://www.payments.ca/" target="_blank"style="color:#1737f5!important;">www.payments.ca</a></p>
<p>Email me the terms of this agreement <span style="color:red"> * </span>:
<input type="checkbox" class="email_agreement" id="email_agreement_1" name="email_agreement" value="1" onchange="only_one_checkbox('.email_agreement')"> Yes
<input type="checkbox" class="ml-3 email_agreement" id="email_agreement_2" name="email_agreement" onchange="only_one_checkbox('.email_agreement')" value="0"> No
</p>
<p>*I/We have read and agree to terms and conditions:
<button type="button" class="btn btn-info btn-sm mr-2" onclick="sign_agreement();">Accept</button>
<button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Decline</button>
</p>
<div>
<input type="hidden" name="hidden_agreement_sign" value="" id="hidden_agreement_sign">
<input type="hidden" name="sign_name" value="" id="sign_name">
<h6><b>Signature : </b><span class="aggrement-signature font-normal" id="user_signature"></span></h6>
<h6><b>Print Name: </b><span id="user_name" class="font-normal"></span></h6>
<h6><b >Date:  </b><span id="user_sign_date" class="font-normal"></span></h6>
<input type="hidden" value="" name="hidden_user_sign_date" id="hidden_user_sign_date" value="">
</div>
<p>
Committi Contact Information
Contact us at 1-866-COMMIT0 (1-866-266-6840) during regular business hours or email us at
info@committi.com
My Mail:
Committi Inc.
200E – 141 Brunel Road
Mississauga, ON L4Z 1X3
</p>
                         </div>
                      </div>
                    <div id="agreement_err_div"></div>
                    <div  id="agreement_error" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto; display:none"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">All star marked fields are required.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="agreement_error_close();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-sm btn-info" onclick="return submit_payment_2()"><i class="fa fa-check mr-1"></i>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="modal" id="sign_agreement_modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Sign Aggreement</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" onclick="return hide_modal('#sign_agreement_modal');" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                           <form id="signContractForm">              
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Type your legal name</label>
                            <input type="text" name="sign_agreement_name" id="sign_agreement_name" class="form-control form-control-sm" value="" maxlength="100">
                            <p class="text-danger agreement_sign_error"></p>
                        </div>
                    </div>
                </form>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" onclick="return hide_modal('#sign_agreement_modal');">Close</button>
                            <button type="button" class="btn btn-sm btn-info" onclick="save_user_aggreement_data()"><i class="fa fa-check mr-1"></i>Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="bank_term_and_condition" tabindex="-1" role="dialog" aria-labelledby="modal-block-extra-large" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Bank term and conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div id="bank_ERR"></div>
                        <div class="block-content font-size-sm pl-6 pr-6">
                            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                        
                        <p>*I/We have read and agree to terms and conditions:
                        <button type="button" class="btn btn-info btn-sm mr-2" onclick="bank_sign();">Accept</button>
                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Decline</button>
                        </p>
                        <p>
                        <input type="hidden" name="hidden_bank_sign_date" id="hidden_bank_sign_date" value="">
                        <input type="hidden" name="bank_hidden_agreement_sign" id="bank_hidden_agreement_sign" value="">
                        <input type="hidden" name="bank_hidden_sign_name" id="bank_hidden_sign_name" value="">
                        <h5><strong>Signature : </strong><span class="aggrement-signature font-normal" id="bank_user_signature"></span></h5>
                        <h5><strong>Print Name : </strong><span class="font-normal" id="bank_user_name"></span></h5>
                        <h5><strong>Sign Date : </strong><span class="font-normal" id="bank_user_sign_date"></span></h5>
                        </p>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-sm btn-info" onclick="submit_bank_account();"><i class="fa fa-check mr-1"></i>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="modal" id="bank_sign_agreement_modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Accept terms and conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" onclick="return hide_modal('#bank_sign_agreement_modal');" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                           <form id="signContractForm">              
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Type your legal name</label>
                            <input type="text" name="bank_sign_agreement_name" id="bank_sign_agreement_name" class="form-control form-control-sm" value="" maxlength="100">
                            <p class="text-danger agreement_sign_error"></p>
                        </div>
                    </div>
                </form>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" onclick="return hide_modal('#bank_sign_agreement_modal');">Close</button>
                            <button type="button" class="btn btn-sm btn-info" onclick="save_bank_aggreement_data()"><i class="fa fa-check mr-1"></i>Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal" id="settings_pad_terms_condition" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Terms and conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                         <div class="row mb-3">
                                            <div class="col-md-12">
                                               I/we authorize Enbridge Inc. and its affiliates and agents (Enbridge) and the financial institution designated (or any other financial institution I/we may authorize at any time) to begin deductions as per my/our instructions for monthly regular recurring payments and/or one-time payments from time to time, for payment of all charges arising under my/our Enbridge account. Regular monthly payments for the full amount of the Enbridge monthly bill will be debited to my/our specified account. Monthly debits will be made on the day before any Enbridge late payment penalties are incurred. The late payment effective date is indicated on each monthly Enbridge bill. I/we hereby waive my/our right to receive pre-notification of the amount of the PAP and agree that you do not require advance notice of the amount of PAPs before the debit is processed. Enbridge monthly bills are provided no less than 17 days before any regular monthly debit is made and Enbridge will obtain my/our authorization for any other one-time or sporadic debits. For business account customers, my/our completion of the application process confirms that I/we have the authority to bind the corporation. This authority is to remain in effect until Enbridge has received notification from me/us in writing, via recorded telephone call or via on-line communication to change or cancel this authority. This notification must be received at least 30 days before the next debit is scheduled. I/we may obtain a sample cancellation form, or more information on my/our right to cancel a PAP agreement at my/our financial institution or by visiting www.cdnpay.ca Enbridge may not assign this authorization, whether directly or indirectly, by operation of law, change of control or otherwise, without providing at least 10 days prior written notice to me/us. I/we have certain recourse rights if any debit does not comply with this agreement. For example, I/we have the right to receive reimbursement for any PAP that is not authorized or is not consistent with this PAP agreement. To obtain a form for a Reimbursement Claim, or for more information on my/our recourse rights, I/we may contact my/our financial institution or visit <a href="https://www.payments.ca/" target="_blank" style="color:#1737f5!important;">www.payments.ca</a>
                                            </div>   
                                        </div>                                         
                                        <hr>  
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="change_pad_agreement_bank" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Change Plan Info</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" onclick="return hide_modal('#change_pad_agreement_bank');" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                        <form id="changePadAgree_info">
                        <input type="hidden" name="user_application_id" value="" id="user_application_id">   
                         <div class="form-group row">  
                           <div class="col-md-6">
                            <label>Plan</label><select class="form-control" id="edit_pad_set_plan_id" name="edit_pad_set_plan_id" disabled>     
                                           <?php
                                                // Iterating through the tier array
                                                foreach($result_fetch_plans as $key =>$item){
                                                ?>
                                                <option value="<?php  echo $item['user_application_plan_id'];?>" <?php if($plan_id!='' && $plan_id==$item['user_application_plan_id']){ echo 'selected';}?>>
                                                <?php echo $item['user_application_plan_name'];?>
                                                </option>
                                                <?php
                                                }
                                            ?>
                            </select> 
                        </div>
                       
                        <div class="col-md-6">
                            <label>Bank Account</label>
                              <select  class="form-control" id="edit_pad_set_bank" name="edit_pad_set_bank">
                                                <option value="">Please Select</option>
                                             <?php
                                                // Iterating through the tier array
                                                 if($result_fetch_bank_account != '')
                                                 {
                                                    foreach($result_fetch_bank_account as $key =>$item){
                                                    ?>
                                                    <option value="<?php  echo $item['bank_account_id'];?>" >
                                                    <?php echo $item['bank_account_nickname'];?>
                                                    </option>
                                                    <?php
                                                    }
                                                 }
                                            ?> 
                                            </select>
                        </div>
                    </div>
                </form>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" onclick="return hide_modal('#bank_sign_agreement_modal');">Close</button>
                             <button type="button" class="btn btn-sm btn-info" onclick="return PAD_settings_deactivate();">Deactivate</button>
                            <button type="button" class="btn btn-sm btn-info" onclick="update_pad_setting()"><i class="fa fa-check mr-1"></i>Update</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function openTheBankaccountTab(){
    $('#add_bank_account_link')[0].click();
}

window.onload = function() 
{
    /// MAKE A PAYMENT DATES 
    $('#payment_history_table').DataTable( {
        "scrollX": true,

    });    

    $('#bank_account_table').DataTable( {
        "scrollX": true,

    });

    $('a[data-toggle="payment-table-tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
    });
    $('a[data-toggle="bank_table_tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
               });

     var select_plan = $('#select_plan').val();
     $('#PaymentButton').attr('disabled',false);
     if(select_plan!=''){
     // One.loader('show');
       $.ajax({
        type: 'POST',
        url: '<?php echo base_url()."User/get_bidding_cycle_statement_bal"?>',
        data: {
            'select_plan': select_plan
        },
        success: function(response) {
         if($.trim(response)==2){
            $('#PaymentButton').attr('disabled',true);
               var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Pad agreement is activated. For one time payment you have to deactivate the PAD Agreement. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#alert_error_message").html(data);
           }
           if(response != '' && $.trim(response)!=2){ 
                var data = JSON.parse(response);
                if(data.check_balance == 'negative'){
                    $('#PaymentButton').text('Refund Request');
                }else{
                $('#PaymentButton').text('Pay Now');

                }
                $('#statement_balance').val('$ ' + data.min_due_amt);
                $('#min_bal_due').val('$ ' + data.min_due_amt);
                $('#due_date').val(data.transaction_date);
                $('#hidden_statement_balance').val(data.min_due_amt_1);
                $('#balance_sign').val(data.check_balance);
                // One.loader('hide');
            }

        }
    });
    }

    };


function get_bidding_cycle_statement()
{
    $('#PaymentButton').attr('disabled',false);
    One.loader('show');
    var select_plan = $('#select_plan').val();
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."User/get_bidding_cycle_statement_bal";?>',
          data: {
            'select_plan':select_plan
        },
          success: function(response){
           if($.trim(response)==2){
            $('#PaymentButton').attr('disabled',true);
            One.loader('hide');
               var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Pad agreement is activated. For one time payment you have to deactivate the PAD Agreement. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#alert_error_message").html(data);
           }
           if(response != '' && $.trim(response)!=2){ 
                var data = JSON.parse(response);
                $('#PaymentButton').text('Pay Now');
                if(data.check_balance == 'negative'){
                    $('#PaymentButton').text('Refund Request');
                }
               $('#statement_balance').val('$ '+data.min_due_amt);
               var coolDates = Date.parse(data.due_date);
               $("#enter_custom_date").flatpickr({
                 minDate: "today",
                 dateFormat: "m/d/Y",
                 maxDate:data.due_date, 
                 onDayCreate: function(dObj, dStr, fp, dayElem) {
                   if(coolDates==(+dayElem.dateObj)) {
                      dayElem.className += "color-class";
                      dayElem.innerHTML += '<i class="bg-info text-light badge badge-sm" style="font-size:8px;">Due</i>';
                     }
                    }         
                }); 
               $('#min_bal_due').val('$ '+data.min_due_amt);
               $('#due_date').val(data.due_date);
               $('#hidden_statement_balance').val(data.min_due_amt_1);
               $('#balance_sign').val(data.check_balance);
                One.loader('hide');
           }

          }
        });
}
function close_dialog(){
    $('#main_dialog_box_payment').css('display','none');
    location.reload();
}
function close_dialog5(){
    $('#main_dialog_box5').css('display','none');
    // location.reload();
}
function check_pads_agg_status(value){
    $.ajax({
        url:"<?php echo base_url('User/') ?>user_get_pad_agg_info",
        type:"POST",
        cache:false,
        async:false,
        data:{'plan_id':value},
        success:function(respo){
             var response_data=JSON.parse(respo);
            if(response_data.status!=0){
             var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Pad agreement is activated. For one time payment you have to deactivate the PAD Agreement. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#alert_error_message").html(data);
          }else{
            var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Do you want to add pad payment for this?</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="redirect_on_pads_setting();">Yes</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" onclick="submit_payment_3()">no</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
               $("#alert_error_message").html(data);
          }
        }
    });
  return false;
}
   function submit_payment(){
    var select_plan          = $('#select_plan').val();
    $("#alert_error_message").html('');
    var select_plan          = $('#select_plan').val();
    var enter_custom_amount  = $('#enter_custom_amount').val();
    var enter_custom_date    = $('#enter_custom_date').val();
    var select_bank_account  = $('#select_bank_account').val();
    var balance_sign         = $('#balance_sign').val();
    var select_bank_account_text  = $('#select_bank_account option:selected').text();
    var statement_balance_1  = $('#hidden_statement_balance').val().replace('-','');
    var hidden_statement_balance=parseFloat(statement_balance_1);
    if((enter_custom_amount>hidden_statement_balance))
    {
        $('.amount_error').html('Please enter the amount less than or equal to the statement balance');
           return false;
    }else{
        $('.amount_error').html('');
    }
    if(select_plan==''  || enter_custom_date=='' || select_bank_account=='' ||enter_custom_amount == '' || statement_balance_1==''){
        var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please fill all the details.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#alert_error_message").html(data);
            return false;
    }
     if(select_plan!=''){
        check_pads_agg_status(select_plan);
        return false;
    }
   }

    function submit_payment_3(){
      $("#alert_error_message").html('');
      var select_bank_account_text  = $('#select_bank_account option:selected').text();
      $('#agg_bank_account').html(select_bank_account_text);
      $('#pad_agreement_modal').modal('show');
}
function submit_payment_2(){
    var select_plan          = $('#select_plan').val();
    var enter_custom_amount  =$('#enter_custom_amount').val();
    var enter_custom_date    = $('#enter_custom_date').val();
    var select_bank_account  = $('#select_bank_account').val();
    var balance_sign         =$('#balance_sign').val();
    var statement_balance_1  =$('#hidden_statement_balance').val().replace('-','');
    var hidden_statement_balance=parseFloat(statement_balance_1);
    var agreement_signed    =$('#hidden_agreement_sign').val();
    var sign_date           =$('#hidden_user_sign_date').val();
    var sign_name           =$('#sign_name').val();
    if(agreement_signed=='' || agreement_signed!='1'){
       var data ='<div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please accept and PAD agreement terms and conditions.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#agreement_err_div").html(data);
    return false;
    }
     var prefArray=[];
    $("input:checkbox[name='prefered_contact_method[]']:checked").each(function(){
    prefArray.push($(this).val());
    });
    var service_value='';
    var email_agreement='';
    if($("#service_use_for_1").is(":checked")){
        service_value=$("#service_use_for_1").val();
    }else if($("#service_use_for_2").is(":checked")){
        service_value=$("#service_use_for_2").val();
    }
    if($("#email_agreement_1").is(":checked")){ 
        email_agreement=$("#email_agreement_1").val();
    }else if($("#email_agreement_2").is(":checked")){
         email_agreement=$("#email_agreement_2").val();
    }

    if((enter_custom_amount>hidden_statement_balance))
    {
        $('.amount_error').html('Please enter the amount less than or equal to the statement balance');
           return false;
    }else{
        $('.amount_error').html('');
    }
    if(select_plan  && enter_custom_date && select_bank_account && enter_custom_amount != '' && statement_balance_1!='')
    {
        
        One.loader('show');

         $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."User/submit_payment_ajax";?>',
          data: {
            'select_plan':select_plan,
            'enter_custom_amount':enter_custom_amount,
            'enter_custom_date':enter_custom_date,
            'select_bank_account':select_bank_account,
            'balance_sign':balance_sign,
            'pefered_contact_method[]':prefArray,
            'email_agreement':email_agreement,
            'service_value':service_value,
            'agreement_signed':agreement_signed,
            'sign_date': sign_date,
            'sign_name':sign_name,
        },
          success: function(response){
           var data = JSON.parse(response);

           if(response != '')
           {    
                $('#select_plan').val('');
                $('#select_bank_account').val('');
                $('#enter_custom_amount').val('');
                $('#enter_custom_date').val('');
                $('#statement_balance').val('');
                $('#min_bal_due').val('');
                $('#balance_sign').val('');
                $('#bank_transit').val('');
                $('#account_inst_no').val('');
                $('#bank_nick').val('');
                $('#account_no').val('');
                $(":checkbox").attr("checked", false);
                $('#pad_agreement_modal input[type="checkbox"]').attr('disabled',false);
                $("#user_signature").html('');
                $("#user_name").html('');
                $("#user_sign_date").html('');
                $('#hidden_agreement_sign').val('');
                $('#hidden_user_sign_date').val('');
                $('#sign_name').val();
                One.loader('hide');
                $('#pad_agreement_modal').modal('hide');
                var data= '<div id="main_dialog_box_payment" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You payment has been submitted successfully for the respective plan and cycle. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

                    $("#alert_message").html(data);


           }
           else
           {
                One.loader('hide');
                location.reload();

           }

          }
        });
    }
    else
    {
        // display error popup
        var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please fill all the details.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#alert_error_message").html(data);
    }

}
function submit_payment_2_old(){
    var select_plan          = $('#select_plan').val();
    var enter_custom_amount  =$('#enter_custom_amount').val();
    var enter_custom_date    = $('#enter_custom_date').val();
    var select_bank_account  = $('#select_bank_account').val();
    var balance_sign         =$('#balance_sign').val();
    var statement_balance_1  =$('#hidden_statement_balance').val().replace('-','');

      var hidden_statement_balance=parseFloat(statement_balance_1);

    if((enter_custom_amount>hidden_statement_balance))
    {
        $('.amount_error').html('Please enter the amount less than or equal to the statement balance');
           return false;
    }else{
        $('.amount_error').html('');
    }
    if(select_plan  && enter_custom_date && select_bank_account && enter_custom_amount != '' && statement_balance_1!='')
    {
        
        One.loader('show');

         $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."User/submit_payment_ajax";?>',
          data: {
            'select_plan':select_plan,
            'enter_custom_amount':enter_custom_amount,
            'enter_custom_date':enter_custom_date,
            'select_bank_account':select_bank_account,
            'balance_sign':balance_sign
        },
          success: function(response){

           var data = JSON.parse(response);

           if(response != '')
           {    
                $('#select_plan').val('');
                $('#select_bank_account').val('');
                $('#enter_custom_amount').val('');
                $('#enter_custom_date').val('');
                $('#statement_balance').val('');
                $('#min_bal_due').val('');
                $('#balance_sign').val('');
                One.loader('hide');


                var data= '<div id="main_dialog_box_payment" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You payment has been submitted successfully for the respective plan and cycle. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

                    $("#alert_message").html(data);


           }
           else
           {
                One.loader('hide');
                location.reload();

           }

          }
        });
    }
    else
    {
        // display error popup
        var data = '  <div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please fill all the details.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#alert_error_message").html(data);
    }

}
    function bank_term_and_condition(){
        payment_bank_tab_validations('#valid_add_bank_form');
        if($('#valid_add_bank_form').valid()){
        var institution_no       = $('#institution_no').val();
        var transit_number       = $('#transit_number').val();
        var bank_routing_number  = transit_number +institution_no;
        var bank_account_number  = $('#bank_account_number').val();
        var bank_account_type    = $('#bank_account_type').val();
        var bank_account_name    = $('#bank_account_name').val();

        if(bank_routing_number=='' || bank_account_number=='' || bank_account_type=='' || bank_account_name == ''){
            var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please fill all the details.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
              $("#alert_error_message").html(data);
              return false;
        }
        $('#bank_term_and_condition').modal('show');
       }
    }
    function submit_bank_account()
    {
        if($('#bank_hidden_agreement_sign').val()!=1){
             var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Kindly accept the bank terms and conditions.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
              $("#bank_ERR").html(data);
            return false;
        }else{
            var bank_term_accept ='1';
        }
        var institution_no       = $('#institution_no').val();
        var transit_number       = $('#transit_number').val();
        var bank_routing_number  = transit_number +institution_no;
        var bank_account_number  = $('#bank_account_number').val();
        var bank_account_type    = $('#bank_account_type').val();
        var bank_account_name    = $('#bank_account_name').val();
        var sign_name            = $('#bank_hidden_sign_name').val();
        var sign_hidden_date     = $('#hidden_bank_sign_date').val();
        if(bank_routing_number && bank_account_number && bank_account_type && bank_account_name != '')
        {
            One.loader('show');

             $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."User/submit_bank_account_ajax";?>',
              data: {
                'bank_routing_number':bank_routing_number,
                'bank_account_number':bank_account_number,
                'bank_account_type':bank_account_type,
                'bank_account_name':bank_account_name,
                'transit_number':transit_number,
                'institution_no':institution_no,
                'bank_term_accept':bank_term_accept,
                'sign_hidden_date':sign_hidden_date,
                'sign_name':sign_name,
            },
              success: function(response){
               var data = JSON.parse(response);
               $('#bank_term_and_condition').modal('hide');
               if(response != '')
               {    
                    $('#bank_routing_number').val('');
                    $('#bank_account_number').val('');
                    $('#bank_account_type').val('');
                    $('#bank_account_name').val('');
                    $('#confirm_bank_account_number').val('');
              
                    One.loader('hide');
                    var data= '<div id="main_dialog_box_payment" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Your bank account has been added successfully. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';
                        $("#alert_message").html(data);
               }
               else{
                    One.loader('hide');
                    location.reload();

               }
              }
            });
        }
        else
        {
            // display error popup
           var data = '  <div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please fill all the details.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
              $("#alert_error_message").html(data);
        }
    }
    function amount_validation(){

   

        var statement_balance_1     = $('#hidden_statement_balance').val().replace('-','');
        var statement_balance_1     = statement_balance_1.replace(',','');
        var statement_balance_1     = statement_balance_1.replace('$','');
        var statement_balance       = parseFloat(statement_balance_1);
        var minBiDamount            = $('#enter_custom_amount').val().replace(',','');
        var minBiDamount            = minBiDamount.replace('$','');
        var enter_custom_amount     = parseFloat(minBiDamount);
        var select_plan             = $('#select_plan').val();
        var sign                    = $('#balance_sign').val();
        var signn='$ ';
        if(sign=='negative'){
            signn='$ -';
        }

        if((statement_balance_1=='' || (enter_custom_amount>statement_balance)) && select_plan!=''){
            $('.amount_error').html('Please enter the amount less than or equal to the statement balance.');
             $('#PaymentButton').css('display','none');
            var exist_state_bal=signn+statement_balance;
            $('#min_bal_due').val(exist_state_bal);
            $('#statement_balance').val(exist_state_bal);
            return false;
        }else
        {
          $('.amount_error').html('');
           $('#PaymentButton').css('display','');
        }
        if(minBiDamount!='' && select_plan!=''){
            $(this).val((parseFloat(minBiDamount)).toFixed(2));
           var formatAmount =(parseFloat(minBiDamount)).toFixed(2);
           $("#enter_custom_amount").val(formatAmount);
           if(statement_balance!='0.00' || statement_balance!='0'){
               var remainning_amt=(parseFloat(statement_balance-enter_custom_amount).toFixed(2));
               if(remainning_amt!='0.00'){
                 remainning_amt=signn+remainning_amt;
               }

               $('#min_bal_due').val(remainning_amt);
               $('#statement_balance').val(remainning_amt);


          }
        }
         else if(minBiDamount=='' && select_plan!=''){
            var exist_state_bal=signn+statement_balance;
            $('#min_bal_due').val(exist_state_bal);
            $('#statement_balance').val(exist_state_bal);
            $('.amount_error').html(''); 
        }else{
            $('#enter_custom_amount').val('');
        }


             // if balance is zero hide pay now button 

                // console.log(statement_balance_1);



         if(enter_custom_amount == '0')
         {
          $('#PaymentButton').css('display','none');
         }
         else
         {
          $('#PaymentButton').css('display','');
         }


    }
function sign_agreement(){
    var prefArray=[];
    $("input:checkbox[name='prefered_contact_method[]']:checked").each(function(){
    prefArray.push($(this).val());
    });
    if(prefArray.length ==0 || (!$("#service_use_for_1").is(":checked") && !$("#service_use_for_2").is(":checked")) || (!$("#email_agreement_1").is(":checked") && !$("#email_agreement_2").is(":checked"))){
       $('#agreement_error').css('display','');
       return false;
    }
    $('#sign_agreement_modal').modal('show');
}
function save_user_aggreement_data(){
 var check_sign=$('#sign_agreement_name').val();
 if(check_sign==''){
     $('.agreement_sign_error').html("Please sign the agreement.").fadeIn().delay(2000).fadeOut();
    return false;
 }
 $('#user_signature').html(check_sign);
 $('#user_name').html(check_sign);
 $('#hidden_agreement_sign').val('1');
 $('#sign_name').val(check_sign);
    $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."User/getServerDateTime_1"?>',
            success: function(response){
            var response_data=JSON.parse(response);
            $('#user_sign_date').html(response_data.date_format);
            $('#hidden_user_sign_date').val(response_data.date);
        }
    });
    $('#pad_agreement_modal input[type="checkbox"]').attr('disabled', true);
    hide_modal('#sign_agreement_modal');
    $('#pad_agreement_modal').modal('show');
}
function save_bank_aggreement_data(){
 var check_sign=$('#bank_sign_agreement_name').val();
 if(check_sign==''){
     $('.agreement_sign_error').html("Please sign the agreement.").fadeIn().delay(2000).fadeOut();
    return false;
 }
 $('#bank_user_signature').html(check_sign);
 $('#bank_user_name').html(check_sign);
 $('#bank_hidden_agreement_sign').val('1');
 $('#bank_hidden_sign_name').val(check_sign);
    $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."User/getServerDateTime_1"?>',
            success: function(response){
            var response_data=JSON.parse(response);
            $('#bank_user_sign_date').html(response_data.date_format);
            $('#hidden_bank_sign_date').val(response_data.date);
        }
    });
    $('#pad_agreement_modal input[type="checkbox"]').attr('disabled', true);
    hide_modal('#bank_sign_agreement_modal');
    $('#bank_sign_agreement_modal').modal('show');
}
function only_one_checkbox(element){
    $(element).on('change', function() {
        $(element).not(this).prop('checked', false);  
    });
}
function agreement_error_close(){
    $('#agreement_error').css('display','none');
}
function get_bank_info_by_id(element){
  var bank_id=element.value;
    $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."User/ajax_get_bank_info_by_id"?>',
            data:{
            'bank_acc_id':bank_id,
            },
            success: function(response){
                var response_data=JSON.parse(response);
                if(response_data!=0){
                    $('#bank_transit').val(response_data.bank_account_transit);
                    $('#account_inst_no').val(response_data.bank_account_institution);
                    $('#bank_nick').val(response_data.bank_account_nick_name);
                    $('#account_no').val(response_data.bank_account_number);
                }
            }
    });  
}
function hide_modal(ele){
  $(ele).modal('hide');
   $('body').addClass('modal-open');
}
function bank_sign(){
    $('#bank_sign_agreement_modal').modal('show');
}
function PAD_settings(){
    payment_settings_validations();
    if($('#payment_settings').valid()){
       One.loader('show');
       $.ajax({
        url:"<?php echo base_url('User/')?>pad_settings",
        type:"POST",
        cache:false,
        data:$('#payment_settings').serialize(),
        success:function(data){
         if($.trim(data)==1){
            One.loader('hide');
                    var data= '<div id="main_dialog_box_payment" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">PAD agreement data has been saved successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="new_close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';
                        $("#alert_message").html(data);
                        reload_particular_div('.pad_set_div',' .pad_set_div');
         }
        }
       });
    }
}
function update_pad_setting(){
    One.loader('show');
       $.ajax({
        url:"<?php echo base_url('User/')?>update_pad_settings",
        type:"POST",
        cache:false,
        data:$('#changePadAgree_info').serialize(),
        success:function(data){
         if($.trim(data)==1){
            One.loader('hide');
                    var data= '<div id="main_dialog_box_payment" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">PAD agreement bank account has been updated successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="new_close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';
                        $("#alert_message").html(data);
            
            reload_particular_div('.pad_set_div',' .pad_set_div');
         }
        }
       });
}
function PAD_settings_deactivate(){
       One.loader('show');
       $.ajax({
        url:"<?php echo base_url('User/') ?>pad_settings_deactivate",
        type:"POST",
        cache:false,
        data:$('#changePadAgree_info').serialize(),
        success:function(data){
         if($.trim(data)==1){
            One.loader('hide');
                    var data= '<div id="main_dialog_box_payment" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">PAD agreement has been deactivated successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="new_close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';
                        $("#alert_message").html(data);
                        reload_particular_div('.pad_set_div',' .pad_set_div');
         }
        }
       });
}
function PAD_settings_deactivate_old(){
       One.loader('show');
       $.ajax({
        url:"<?php echo base_url('User/') ?>pad_settings_deactivate",
        type:"POST",
        cache:false,
        data:$('#payment_settings').serialize(),
        success:function(data){
         if($.trim(data)==1){
            One.loader('hide');
                    var data= '<div id="main_dialog_box_payment" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">PAD agreement has been deactivated successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';
                        $("#alert_message").html(data);
         }
        }
       });
}
function payment_settings_validations(){
    $('#payment_settings').validate({
        rules: {
            pad_select_plan:{
                required: true,
            },
            pad_setting_check: {
                required: true,
            },
            pad_select_bank_account:{
                required: true,
            }
        },
        messages: {
            pad_select_plan: {
                required: "Please select the plan.",
            },
            pad_select_bank_account: {
                required: "Please accept select the bank account",
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.after(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
}
function get_pad_setting_information(element){
    $('#pad_payment_type').val();
    $('#pad_select_bank_account').val();
    $('#submit_btn').removeClass('d-none');
    $('#submit_btn_1').addClass('d-none');
    $('#pad_setting_check').attr('checked',false);
    if(element.value!=''){
    $.ajax({
        url:"<?php echo base_url('User/') ?>user_get_pad_agg_info",
        type:"POST",
        cache:false,
        data:{'plan_id':element.value},
        success:function(data){
            if(data!=0){
                var response_data=JSON.parse(data);
              // $('#pad_payment_type').val(response_data.payment_type);
              $('#pad_select_bank_account').val(response_data.bank_id);
              if(response_data.term==1){
              $('#pad_setting_check').attr('checked',true);
              }
              if(response_data.status==1){
               $('#submit_btn').addClass('d-none');
               $('#submit_btn_1').removeClass('d-none');
              }
            }
        }
       });
    }
}
function redirect_on_pads_setting(){
    $("#alert_error_message").html('');
    $('#pads_setting_tabb')[0].click();
}
function change_pad_agreement_bank(element){
  var bank_id=element.getAttribute('data-bankid');
  var user_application_id=element.getAttribute('data-appid');
  var plan_id=element.getAttribute('data-planid');
  $('#edit_pad_set_plan_id').val(plan_id);
  $('#edit_pad_set_bank').val(bank_id);
  $('#user_application_id').val(user_application_id);
  $('#change_pad_agreement_bank').modal('show');
}
function reload_particular_div(main_id,load_id){
    $(main_id).load('<?php echo current_url() ?>' +  load_id);
    setTimeout(function(){
     intializeDatatable_2('#pad_history_table_1');
     intializeDatatable_2('#pad_history_table');
 },500);
}
function new_close_dialog(){
    $('#change_pad_agreement_bank').modal('hide');
    $('#main_dialog_box_payment').css('display','none');
}
</script>
