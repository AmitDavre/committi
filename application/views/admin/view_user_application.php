<?php 
$gender  = $this->config->item('gender');
$options  = $this->config->item('options');
$Province  = $this->config->item('Province');
$HouseHoldIncome  = $this->config->item('HouseHoldIncome');
if(isset($rights)){
    $edit_right=$rights[0]['edit_right'];
    $all_rights=$rights[0]['all_rights'];
  }
  else{
      $edit_right="";
      $all_rights="";
  }
?>
<style type="text/css">
.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #110d35;
    background-color: #110d35;
}
.color_p_tag{
    width: 100%;
    margin-top: .5rem;
    font-size: .875rem;
    color: #d26a5c;
}
</style>
<!-- Main Container -->

            <main id="main-container">

                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>manage-users">Manage User</a></li>
                                    <li class="auto_capitalize breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>edit-user/<?php echo base64_encode($user_id_val);?>"><?php echo $users['first_name'].' '.$users['last_name']?></a></li>
                                    <li class="breadcrumb-item">Application Form</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content">

                    <p id="alert_message1"></p>

                    <div class="block">
                    <div id="ajax_div_success"></div>
                        <div id="checkRightsMsg"></div>
                        <div class="block-header">
                            <h3 class="block-title">Application Information</h3>
                        </div>

                        <div class="block-content block-content-full">
            
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                     <div class="form-group">
                                        <label for="example-select">Plan Name</label>
                                        <input type="text" class="form-control" id="plan_name" name="plan_name" readonly="readonly" value="<?php echo $user_application['0']['user_application_plan_name']?>">
                                        <input type="hidden" name="user_plan_id_value" id="user_plan_id_value" value="<?php echo $user_application['0']['user_application_plan_id']?>">
                                        <input type="hidden" name="user_user_id_value" id="user_user_id_value" value="<?php echo $user_application['0']['u_id']?>">
                                        <input type="hidden" name='user_application_tier_value' id="user_application_tier_value" value="<?php echo $user_application['0']['user_application_tier']?>">
                                         <input type="hidden" name="user_application_id" id="user_application_id" value="<?php echo $user_application['0']['a_id']?>">

                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="example-select">Bidding Start Date</label>
                                        <input type="text" class="form-control" id="bidding_start_date" name="bidding_start_date" readonly="readonly" value="<?php $BiddingStartDate= date('m/d/Y',strtotime($user_application['0']['user_application_enrollment_bidding_start_date'])); echo $BiddingStartDate;?>">
                                    </div> 
                                </div>

                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Enrollment Start Date</label>
                                        <input type="text" class="form-control" id="enrollment_start_date" name="enrollment_start_date" readonly="readonly" value="<?php $EnrollmentStartDate= date('m/d/Y',strtotime($user_application['0']['user_application_enrollment_start_date'])); echo $EnrollmentStartDate;?>" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-select">Bidding Start Amount</label>
                                        <input type="text" class="form-control" id="bidding_start_amount" name="bidding_start_amount" readonly="readonly" value="<?php echo '$'.number_format($user_application['0']['user_application_enrollment_bidding_start_amount'],2);?>">
                                    </div> 
 
                                </div>
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Enrollment End Date</label>
                                        <input type="text" class="form-control" id="enrollment_end_date" name="enrollment_end_date" readonly="readonly" value="<?php $EnrollmentEndDate= date('m/d/Y',strtotime($user_application['0']['user_application_enrollment_end_date'])); echo $EnrollmentEndDate;?>" >
                                    </div> 
                                </div>
                            </div>                    
                             <br><h3 class="block-title">Personal Information</h3><br>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                     <div class="form-group">
                                        <label for="example-select">First Name</label>                                            
                                        <input type="text" class="form-control text-capitalize" id="user_first_name" name="user_first_name" readonly="readonly" value="<?php echo $user_application['0']['user_application_first_name']?>">
                                    </div>

                                    <div class="form-group">
                                            <label for="example-select">Gender</label> 
                                            <select class="form-control" id="user_gender" name="user_gender" disabled="disabled">
                                                 <?php
                                                    // Iterating through the tier array
                                                    foreach($gender as $key =>$item)
                                                    {
                                                        if($key == $user_application['0']['user_application_gender'])
                                                            {?>
                                                                <option value="<?php  echo strtolower($key);?>" >
                                                                    <?php echo $item;?>
                                                                </option> 
                                                    <?php   }
                                                    }?>
                                            </select>
                                        </div>
                                </div>

                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Middle Name</label> 
                                        <input type="text" class="form-control text-capitalize" id="user_middle_name" name="user_middle_name" readonly="readonly" value="<?php echo $user_application['0']['user_application_middle_name']?>">
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="example-select">SIN</label> 
                                        <input type="text" class="form-control user_application_sin" id="user_sin" name="user_sin" readonly="readonly" value="<?php echo $user_application['0']['user_application_sin']?>">
                                    </div>
 
                                </div>
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Last Name</label> 
                                        <input type="text" class="form-control text-capitalize" id="user_last_name" name="user_last_name" readonly="readonly" value="<?php echo $user_application['0']['user_application_last_name']?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="example-select">Date of Birth</label> 
                                        <input type="text" class="form-control" id="user_date_of_births" name="user_date_of_births" readonly="readonly" value="<?php $dob_user= date('m/d/Y',strtotime($user_application['0']['user_application_dob'])); echo $dob_user;?> 


                                        ">
                                    </div> 
                                </div>
                            </div>



                            <br><h3 class="block-title">Contact Information</h3><br>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                     <div class="form-group">
                                         <label for="example-select">Street</label> 
                                         <input type="text" class="form-control text-capitalize" id="user_street" name="user_street" value="<?php echo $user_application['0']['usert_application_street']?>" readonly="readonly">
                                    </div> 
                                    <div class="form-group">
                                        <label for="example-select">Street Name</label>
                                        <input type="text" class="street_name_app_form form-control text-capitalize" id="user_street_name" name="user_street_name" value="<?php echo $user_application['0']['user_application_street_name']?>" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-select">Province </label>
                                        <select class="form-control" id="user_provience" name="user_provience" disabled="disabled">
                                            <option value="">Please select</option>
                                       <?php foreach($Province as $key => $item){?>
                                            <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $user_application['0']['user_application_provience']) ? 'selected' : '' ?>>
                                            <?php echo $item;?>
                                            </option>
                                        <?php }?>
                                        </select>
                                    </div>
   
                                </div>

                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">App/Suite/Unit </label>
                                        <input type="text" class="form-control" id="user_suite" name="user_suite" value="<?php echo $user_application['0']['user_application_unit_no']?>" readonly="readonly">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="example-select">Email Address</label>
                                        <input type="text" class="form-control" id="user_email_address" name="user_email_address" readonly="readonly" value="<?php echo $user_application['0']['user_application_email']?>" readonly="readonly">
                                    </div>

                                    
                                </div>
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Postal Code</label>
                                        <input type="text" class="form-control postal_code_user_application" id="user_postal_code" name="user_postal_code" value="<?php echo $user_application['0']['user_application_postal_code']?>" maxlength="7" style="text-transform: uppercase;" readonly="readonly">
                                        </div>

                                    <div class="form-group">
                                          <label for="example-select">Phone Number</label>
                                        <input type="text" class="form-control user_phone_number_application" id="user_phone_number" name="user_phone_number"  value="<?php echo $user_application['0']['user_application_phone_no']?>" maxlength="14" autocomplete="off" readonly="readonly">
                                    </div> 
                                </div>
                            </div>

                            <br><h3 class="block-title">Other Information</h3><br>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Employment Status</label>

                                        <select class="form-control" id="user_employment_status" name="user_employment_status" disabled="disabled">
                                            <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $user_application['0']['user_application_employment_status']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="example-select">Gross annual personal income</label>
                                        
                                        <select class="form-control" id="user_annual_income" name="user_annual_income" disabled="disabled">
                                            <option value="">Please select</option>
                                            <?php foreach($HouseHoldIncome as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $user_application['0']['user_application_gross_income']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>

                                            <?php }?>
                                        </select>
                                    </div>

                                     
                                </div>

                                <div class="col-sm-4 col-lg-4 col-xl-4">

                                    <div class="form-group">
                                        <label for="example-select">Residential Status</label>
                                        
                                        <select class="form-control" id="user_residential" name="user_residential" disabled="disabled">
                                            <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $user_application['0']['user_application_residential_status']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-select">Why are you joining committi ?</label>
                                        
                                        <select class="form-control" id="user_funds" name="user_funds" disabled="disabled">
                                            <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $user_application['0']['user_application_planning']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>                                   
 
                                </div>
                                <div class="col-sm-4 col-lg-4 col-xl-4">

                                    <div class="form-group">
                                        <label for="example-select">How soon you need the funds ?</label>
                                        
                                        <select class="form-control" id="user_funds_time" name="user_funds_time" disabled="disabled">
                                            <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $user_application['0']['user_application_fund_time']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-select">Other household income</label>
                                        
                                        <select class="form-control" id="user_household_income" name="user_household_income" disabled="disabled">
                                            <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $user_application['0']['user_application_household_income']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <br><h3 style="display: none;" class="block-title">Terms and Condition</h3><br>
                            <div class="row" style="display: none;">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="hidden_terms_checkbox_value" id="hidden_terms_checkbox_value" value="<?php echo $user_application['0']['user_application_terms'];?>">
                                            <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms" >
                                            <label class="custom-control-label font-w400" for="signup-terms">
                                            <a style="color: #000;" class="btn-block-option font-size-sm" target="_blank" href="<?php echo base_url()?>terms-conditions" >I agree to Terms &amp; Conditions</a>
                                            
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="hidden_privacy_checkbox_value" id="hidden_privacy_checkbox_value" value="<?php echo $user_application['0']['user_application_privacy'];?>">
                                            <input type="checkbox" class="custom-control-input" id="signup-privacy" name="signup-privacy">
                                            <label class="custom-control-label font-w400" for="signup-privacy">
                                            <a style="color: #000;" class="btn-block-option font-size-sm" target="_blank" href="<?php echo base_url()?>terms-conditions" >I agree to Privacy</a>
                                             
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="hidden_disclaimer_checkbox_value" id="hidden_disclaimer_checkbox_value" value="<?php echo $user_application['0']['user_application_disclaimer'];?>">
                                            <input type="checkbox" class="custom-control-input" id="signup-disclaimer" name="signup-disclaimer">
                                            <label class="custom-control-label font-w400" for="signup-disclaimer">
                                                <a style="color: #000;" class="btn-block-option font-size-sm" target="_blank" href="<?php echo base_url()?>terms-conditions" >I agree to Disclaimer</a>
                                            </label>
                                        </div>
                                    </div> 
                                                             
                                </div>
                         </div>

                         <div class="row">
                             <div class="col-md-12">
                                <button type="button" class="btn btn-sm btn-info" onclick="send_reminder_email();" <?php if($user_application['0']['user_application_plan_confirmation']=='1'){ echo 'disabled';}?>>Send Reminder</button>
                                <button type="button" class="btn btn-sm btn-info" id="app_reject_button" onclick="reject_user_application();"
                                <?php if($user_application['0']['user_application_plan_confirmation']=='1' || $user_application['0']['user_application_plan_confirmation']=='0'){ echo 'disabled';}?>>Reject</button>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-release-plan" <?php if($user_application['0']['user_application_plan_confirmation']=='1'){ echo 'disabled';}?>>Change Plan</button>
                             </div>
                         </div>

                             <!-- Terms Modal -->

        <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms" aria-hidden="true">

            <div class="modal-dialog modal-lg modal-dialog-popout" role="document">

                <div class="modal-content">

                    <div class="block block-themed block-transparent mb-0">

                        <div class="block-header bg-primary-dark">

                            <h3 class="block-title">Terms &amp; Conditions</h3>

                            <div class="block-options">

                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">

                                    <i class="fa fa-fw fa-times"></i>

                                </button>

                            </div>

                        </div>

                        <div class="block-content">

                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>

                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>

                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>

                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>

                            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>

                        </div>

                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-link mr-2" data-dismiss="modal"><span style="color: #000;">Close</span></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            </div>

        </div>

        <!-- END User Profile -->

    </div>

    <!-- END Page Content -->

</main>
<!-- Pop Out Block Modal -->
<div class="modal fade" id="modal-release-plan" tabindex="-1" role="dialog" aria-labelledby="modal-release-plan" aria-hidden="true">

<input type="hidden" name="hidden_ajax_plan_name" id="hidden_ajax_plan_name" value="">
<input type="hidden" name="hidden_ajax_plan_id" id="hidden_ajax_plan_id" value="">
<input type="hidden" name="hidden_ajax_enroll_start_date" id="hidden_ajax_enroll_start_date" value="">
<input type="hidden" name="hidden_ajax_enroll_end_date" id="hidden_ajax_enroll_end_date" value="">
<input type="hidden" name="hidden_ajax_bidding_start_date" id="hidden_ajax_bidding_start_date" value="">
<input type="hidden" name="hidden_ajax_bidding_start_amount" id="hidden_ajax_bidding_start_amount" value="">

<div class="modal-dialog modal-dialog-popout" role="document">
    <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
            <div class="block-header bg-primary-dark">
                <h3 class="block-title">Change Plan</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-fw fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="block-content font-size-sm">
                <div class="form-group">
                    <label>Select New Plan</label>
                    <select class="form-control" id="modal_plan_id" name="modal_plan_id" onchange="getPlanDetails();">
                        <option value="">Select</option>
                     <?php
                        // Iterating through the tier array
                         array_unshift($plan_details, "phoney");
                         unset($plan_details[0]);

                     

                        foreach($plan_details as $key =>$item){
                        ?>
                        <option value="<?php  echo $item['id'];?>" >
                        <?php echo $item['plan_name'];?>
                        </option>
                        <?php
                        }
                    ?>
                    </select>

                </div>
            </div>
            <div class="block-content block-content-full text-right border-top">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-sm btn-info" onclick="UpdateOnChangePlan();"><i class="fa fa-check mr-1" ></i>Change Plan</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END Pop Out Block Modal -->


<!-- END Main Container -->

<script type="text/javascript">
    function close_dialog_rights(){
        $('#checkRightsModal').css('display', 'none');
    }
    function close_dialog() 
    {
      $('#main_dialog_box').css('display', 'none');
    }

    function close_dialog4()
    {
        $('#main_dialog_box4').css('display','none');
        // var link = "<?php echo base_url()?>dashboard";

        //               // window.setTimeout( function(){
        //               window.location = link;
        //              // }, 3000 );

    }

    function send_reminder_email()
    {var admin_type="<?php echo $this->session->userdata('s_admin')?>";
    var all_rights="<?php echo $all_rights  ?>";
    if(admin_type!='1'&& (all_rights=='0' || all_rights=='')){
         var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to send the reminder mail.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
        $('#checkRightsMsg').html(msgData);
        return false;
    }

        var user_email_address  = $('#user_email_address').val();
        var user_first_name     = $('#user_first_name').val();
        var user_last_name      = $('#user_last_name').val();
        var plan_name           = $('#plan_name').val();
        var user_plan_id_value  = $('#user_plan_id_value').val();
        var user_user_id_value  = $('#user_user_id_value').val();

        $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/send_reminder_email_ajax";?>',
              data: {
                'user_email_address':user_email_address,
                'user_first_name':user_first_name,
                'user_last_name':user_last_name,
                'plan_name':plan_name,
                'user_plan_id_value':user_plan_id_value,
                'user_user_id_value':user_user_id_value,
            },
              success: function(response){

               var data = JSON.parse(response);

               if(response != '')
               {
                    var data= '<div id="main_dialog_box4" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Reminder email has been sent successfully for this user. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog4();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

                        $("#alert_message1").html(data);

                        setTimeout(function() 
                        {
                  
                            $.ajax({
                                      type: 'POST',
                                      url: '<?php echo base_url()."Admin/delete_user_application_ajax";?>',
                                      data: {'user_plan_id_value':user_plan_id_value,'user_user_id_value':user_user_id_value},
                                      success: function(response){

                                       var data = JSON.parse(response);

                                       if(response != '')
                                       {
                                           

                                       }

                                      }
                                    });
                            
                        }, 20000);

               }

              }
            });
    }

function reject_user_application()
    {
        var admin_type="<?php echo $this->session->userdata('s_admin')?>";
        var all_rights="<?php echo $all_rights  ?>";
        if(admin_type!='1'&& (all_rights=='0' || all_rights==''))
        {
         var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to send the reminder mail.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
              $('#checkRightsMsg').html(msgData);
              return false;
        }
            var user_plan_id_value  = $('#user_plan_id_value').val();
            var user_user_id_value  = $('#user_user_id_value').val();
            var user_application_tier_value= $('#user_application_tier_value').val();
            var user_email_address  = $('#user_email_address').val();
            var user_application_id  = $('#user_application_id').val();
              $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/reject_user_application";?>',
              data: {
                'user_plan_id_value':user_plan_id_value,
                'user_user_id_value':user_user_id_value,
                'user_application_tier_value':user_application_tier_value,
                'email':user_email_address,
                'user_application_id':user_application_id
              },
              success: function(response){
               var data = JSON.parse(response);
               if(response != '')
               {
                $('#app_reject_button').prop('disabled',true);
                    var data= '<div id="main_dialog_box4" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">User application rejected successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog4();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';
                        $("#alert_message1").html(data);

               }

              }
       });
    }
 function change_user_application_plan(){
            var user_plan_id_value  = $('#user_plan_id_value').val();
            var user_user_id_value  = $('#user_user_id_value').val();
            var user_application_tier_value= $('#user_application_tier_value').val();
            var user_email_address  = $('#user_email_address').val();


 } 
 function UpdateOnChangePlan()
    {
        var userId                              = $('#user_user_id_value').val();
        var hidden_ajax_plan_name               = $('#hidden_ajax_plan_name').val();
        var hidden_ajax_plan_id                 = $('#hidden_ajax_plan_id').val();
        var hidden_ajax_enroll_start_date       = $('#hidden_ajax_enroll_start_date').val();
        var hidden_ajax_enroll_end_date         = $('#hidden_ajax_enroll_end_date').val();
        var hidden_ajax_bidding_start_date      = $('#hidden_ajax_bidding_start_date').val();
        var hidden_ajax_bidding_start_amount    = $('#hidden_ajax_bidding_start_amount').val();
        // var hidden_user_application_table_id    = $('#hidden_user_application_table_id').val();
        var hidden_user_application_plan_id     = $('#user_plan_id_value').val();
        var user_email_address                  = $('#user_email_address').val();
        var hidden_user_application_table_id    = $('#user_application_id').val();
        var user_application_tier_id            = $('#user_application_tier_value').val();
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/change_user_application_plan";?>',
          data: {'userId':userId,'hidden_ajax_plan_name':hidden_ajax_plan_name,'hidden_ajax_plan_id':hidden_ajax_plan_id,'hidden_ajax_enroll_start_date':hidden_ajax_enroll_start_date,'hidden_ajax_enroll_end_date':hidden_ajax_enroll_end_date,'hidden_ajax_bidding_start_date':hidden_ajax_bidding_start_date,'hidden_ajax_bidding_start_amount':hidden_ajax_bidding_start_amount,'hidden_user_application_table_id':hidden_user_application_table_id,'hidden_user_application_plan_id':hidden_user_application_plan_id,'user_email_address':user_email_address,'user_application_tier_id':user_application_tier_id},
          success: function(response){
            var data = JSON.parse(response);
            console.log(data);
            if($.trim(response)!='')
            {
            
                    var div = ' <div id="main_dialog_boxs" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><button id= "hidden_button" style="display: none;"><a id="hidden_link" href="<?php base_url();?>application-review"></a></button><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Plan Changed Successfully. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="return close_dialog_box();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

                    $('#ajax_div_success').after(div);                     
            }
          }
        }); 
    }    
    function getPlanDetails()
    {
        var planId = $('#modal_plan_id').val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/get_plan_details";?>',
          data: {'planId':planId},
          success: function(response){

            var data = JSON.parse(response);
            console.log(data);

            if(response!='')
            {
                $('#hidden_ajax_plan_name').val(data.plan_name);
                $('#hidden_ajax_plan_id').val(data.id);
                $('#hidden_ajax_enroll_start_date').val(data.enrollment_start_date);
                $('#hidden_ajax_enroll_end_date').val(data.enrollment_end_date);
                $('#hidden_ajax_bidding_start_date').val(data.bidding_start_date);
                $('#hidden_ajax_bidding_start_amount').val(data.bidding_start_amount);
            }
            
          }
        }); 
    }
    function close_dialog_box()
    {
        $('#main_dialog_boxs').css('display','none');
        window.location.href="<?php echo base_url()?>dashboard";
    }
  


</script>
<!-------------- JS IN FOLDER template/footer.php------->
