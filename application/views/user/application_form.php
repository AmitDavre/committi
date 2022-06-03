<?php 
$gender  = $this->config->item('gender');
$options  = $this->config->item('options');
$Province  = $this->config->item('Province');
$HouseHoldIncome  = $this->config->item('HouseHoldIncome');
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
                                    <li class="breadcrumb-item">Application Form</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content">

                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Plan Information</h3>
                        </div>

                        <div class="block-content block-content-full">


                            <?php if($_SESSION['error_checkbox'] != ''){ ?>
                                      <div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Error</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please check all the chexboxes to continue.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>

                            <?php } ?>




                            <form action="<?php base_url()?>user-form" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" class="form-control" id="plan_hidden_id" name="plan_hidden_id" readonly="readonly" value="<?php echo $plan_data['0']['id']?>">

                            <input type="hidden" name="hidden_user_id" id="hidden_user_id" value="<?php echo $committi_user['user_login_id']?>">
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                     <div class="form-group">
                                        <label for="example-select">Plan Name</label>
                                        <input type="text" class="form-control" id="plan_name" name="plan_name" readonly="readonly" value="<?php echo $plan_data['0']['plan_name']?>">

                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="example-select">Bidding Start Date</label>
                                        <input type="text" class="form-control" id="bidding_start_date" name="bidding_start_date" readonly="readonly" value="<?php $BiddingStartDate= date('m/d/Y',strtotime($plan_data['0']['bidding_start_date'])); echo $BiddingStartDate;?>">
                                    </div> 
                                </div>

                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Enrollment Start Date</label>
                                        <input type="text" class="form-control" id="enrollment_start_date" name="enrollment_start_date" readonly="readonly" value="<?php $EnrollmentStartDate= date('m/d/Y',strtotime($plan_data['0']['enrollment_start_date'])); echo $EnrollmentStartDate;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-select">Bidding Start Amount</label>
                                        <input type="text" class="form-control" id="bidding_start_amount" name="bidding_start_amount" readonly="readonly" value="<?php echo '$'.number_format($plan_data['0']['bidding_start_amount'],2);?>">
                                    </div> 
                                </div>
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Enrollment End Date</label>
                                        <input type="text" class="form-control" id="enrollment_end_date" name="enrollment_end_date" readonly="readonly" value="<?php $EnrollmentEndDate= date('m/d/Y',strtotime($plan_data['0']['enrollment_end_date'])); echo $EnrollmentEndDate;?>">
                                    </div> 
                                </div>
                            </div>                    
                             <br><h3 class="block-title">Personal Information</h3><br>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                     <div class="form-group">
                                        <label for="example-select">First Name</label>                                            
                                        <input type="text" class="form-control text-capitalize" id="user_first_name" name="user_first_name" readonly="readonly" value="<?php echo $committi_user['user_first_name']?>">
                                    </div>

                                    <div class="form-group">
                                            <label for="example-select">Gender</label> 
                                            <select class="form-control" id="user_gender" name="user_gender" readonly="readonly">
                                                 <?php
                                                    // Iterating through the tier array
                                                    foreach($gender as $key =>$item)
                                                    {
                                                        if($key == $committi_user['user_gender'])
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
                                        <input type="text" class="form-control text-capitalize" id="user_middle_name" name="user_middle_name" readonly="readonly" value="<?php echo $committi_user['user_middle_name']?>">
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="example-select">SIN</label> 
                                        <input type="text" class="form-control user_application_sin" id="user_sin" name="user_sin" readonly="readonly" value="<?php echo $committi_user['user_sin']?>">
                                        <p id="sin_error" class="color_p_tag"></p>
                                    </div>
 
                                </div>
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Last Name</label> 
                                        <input type="text" class="form-control text-capitalize" id="user_last_name" name="user_last_name" readonly="readonly" value="<?php echo $committi_user['user_last_name']?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="example-select">Date of Birth</label> 
                                        <input type="date" class="form-control" id="user_date_of_birth" name="user_date_of_birth" readonly="readonly" value="<?php echo $committi_user['user_dob']?>">
                                    </div> 
                                </div>
                            </div>



                            <br><h3 class="block-title">Contact Information</h3><br>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                     <div class="form-group">
                                         <label for="example-select">Street</label> 
                                         <input type="text" class="form-control text-capitalize" id="user_street" name="user_street" value="<?php echo $committi_user['usert_street']?>">
                                    </div> 
                                    <div class="form-group">
                                        <label for="example-select">Street Name</label>
                                        <input type="text" class="street_name_app_form form-control text-capitalize" id="user_street_name" name="user_street_name" value="<?php echo $committi_user['user_street_name']?>">
                                        <p id="street_name_error_app_form" class="color_p_tag"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-select">Province </label>
                                        <select class="form-control" id="user_provience" name="user_provience">
                                            <option value="">Please select</option>
                                       <?php foreach($Province as $key => $item){?>
                                            <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $committi_user['user_provience']) ? 'selected' : '' ?>>
                                            <?php echo $item;?>
                                            </option>
                                        <?php }?>
                                        </select>
                                    </div>
   
                                </div>

                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">App/Suite/Unit </label>
                                        <input type="text" class="form-control" id="user_suite" name="user_suite" value="<?php echo $committi_user['user_unit_no']?>">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="example-select">Email Address</label>
                                        <input type="text" class="form-control" id="user_email_address" name="user_email_address" readonly="readonly" value="<?php echo $committi_user['user_email']?>">
                                    </div>

                                    
                                </div>
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Postal Code</label>
                                        <input type="text" class="form-control postal_code_user_application" id="user_postal_code" name="user_postal_code" value="<?php echo $committi_user['user_postal_code']?>" maxlength="7" style="text-transform: uppercase;">
                                        </div>
                                        <p style="margin-bottom: 0;" id="postal_code_error" class="color_p_tag"></p>
                                        <p style="margin-top: 0;" id="postal_code_errors" class="color_p_tag"></p>

                                    <div class="form-group">
                                          <label for="example-select">Phone Number</label>
                                        <input type="text" class="form-control user_phone_number_application" id="user_phone_number" name="user_phone_number"  value="<?php echo $committi_user['user_phone_no']?>" maxlength="14" autocomplete="off">
                                        <p id="phone_code_error" class="color_p_tag"></p>
                                    </div> 
                                </div>
                            </div>

                            <br><h3 class="block-title">Other Information</h3><br>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="example-select">Employment Status</label>

                                        <select class="form-control" id="user_employment_status" name="user_employment_status">
                                            <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $committi_user['user_employment_status']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="example-select">Gross annual personal income</label>
                                        
                                        <select class="form-control" id="user_annual_income" name="user_annual_income">
                                            <option value="">Please select</option>
                                            <?php foreach($HouseHoldIncome as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $committi_user['user_gross_income']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>

                                            <?php }?>
                                        </select>
                                    </div>

                                     
                                </div>

                                <div class="col-sm-4 col-lg-4 col-xl-4">

                                    <div class="form-group">
                                        <label for="example-select">Residential Status</label>
                                        
                                        <select class="form-control" id="user_residential" name="user_residential">
                                           <!--  <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $committi_user['user_residential_status']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?> -->

                                   <option value="">Please select</option>
                                    <?php if(isset($residential_data)) {
                                    foreach ($residential_data as $residential) {?>
                                    <option value="<?php echo $residential->dropdown_values_id;?>" <?php if($committi_user['user_residential_status']==$residential->dropdown_values_id){ echo 'selected';}else {echo '';}?>><?php echo $residential->dropdown_values_name;?></option>
                                     <?php }} ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-select">Why are you joining committi?</label>
                                        
                                        <select class="form-control" id="user_funds" name="user_funds">
                                           <!--  <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $committi_user['user_planning']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?> -->

                                            <option value="">Please select</option>
                                           <?php if(isset($joining_committi_data)) {
                                            foreach ($joining_committi_data as $joining_committi_value) {?>
                                          <option value="<?php echo $joining_committi_value->dropdown_values_id;?>" <?php if($committi_user['user_planning']==$joining_committi_value->dropdown_values_id){ echo 'selected';}else {echo '';}?>><?php echo $joining_committi_value->dropdown_values_name;?></option>
                                          <?php }} ?>
                                        </select>
                                    </div>                                   
 
                                </div>
                                <div class="col-sm-4 col-lg-4 col-xl-4">

                                    <div class="form-group">
                                        <label for="example-select">How soon you need the funds ?</label>
                                        
                                        <select class="form-control" id="user_funds_time" name="user_funds_time">
                                            <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $committi_user['user_fund_time']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="example-select">Other household income</label>
                                        
                                        <select class="form-control" id="user_household_income" name="user_household_income">
                                            <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $committi_user['user_residential_status']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <br><h3 class="block-title">Terms and Condition</h3><br>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="hidden_terms_checkbox_value" id="hidden_terms_checkbox_value" value="">
                                            <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms" required="required">
                                            <label class="custom-control-label font-w400" for="signup-terms" >
                                            <a style="color: #000;" class="btn-block-option font-size-sm" target="_blank" href="<?php echo base_url()?>terms-conditions" >I agree to Terms &amp; Conditions</a>
                                            
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="hidden_privacy_checkbox_value" id="hidden_privacy_checkbox_value" value="">
                                            <input type="checkbox" class="custom-control-input" id="signup-privacy" name="signup-privacy" required="required">
                                            <label class="custom-control-label font-w400" for="signup-privacy" required="required">
                                            <a style="color: #000;" class="btn-block-option font-size-sm" target="_blank" href="<?php echo base_url()?>privacy" >I agree to Privacy</a>
                                             
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="hidden_disclaimer_checkbox_value" id="hidden_disclaimer_checkbox_value" value="">
                                            <input type="checkbox" class="custom-control-input" id="signup-disclaimer" name="signup-disclaimer" required="required" >
                                            <label class="custom-control-label font-w400" for="signup-disclaimer">
                                                <a style="color: #000;" class="btn-block-option font-size-sm" target="_blank" href="<?php echo base_url()?>disclaimer" >I agree to Disclaimer</a>
                                            </label>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <div class="custom-file">
                                            <button style="color: #fff;" type="submit" id="submit" name="submit" class="btn btn-info">
                                               Submit 
                                            </button>
                                        </div>
                                    </div>
                                                             
                                </div>
                         </div>
                     </form>

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

<!-- END Main Container -->


<!-------------- JS IN FOLDER template/footer.php------->

<script type="text/javascript">
    function close_dialog_rights(){
    $('#checkRightsModal').css('display', 'none');
}

</script>
