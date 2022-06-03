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
            
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                     <div class="form-group">
                                        <label for="example-select">Plan Name</label>
                                        <input type="text" class="form-control" id="plan_name" name="plan_name" readonly="readonly" value="<?php echo $user_application['0']['user_application_plan_name']?>">

                                        
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
                                        <input type="text" class="form-control" id="bidding_start_amount" name="bidding_start_amount" readonly="readonly" value="<?php echo '$'.number_format($user_application['0']['user_application_enrollment_bidding_start_amount'],2)?>">
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
                                        <label for="example-select">What are you planning to do with the funds ?</label>
                                        
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

                            <br><h3 class="block-title">Terms and Condition</h3><br>
                            <div class="row">
                                <div class="col-sm-4 col-lg-4 col-xl-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="hidden_terms_checkbox_value" id="hidden_terms_checkbox_value" value="<?php echo $user_application['0']['user_application_terms'];?>">
                                            <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms" disabled="disabled">
                                            <label class="custom-control-label font-w400" for="signup-terms">
                                            <a style="color: #000;" class="btn-block-option font-size-sm" target="_blank" href="<?php echo base_url()?>terms-conditions" >I agree to Terms &amp; Conditions</a>
                                            
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="hidden_privacy_checkbox_value" id="hidden_privacy_checkbox_value" value="<?php echo $user_application['0']['user_application_privacy'];?>">
                                            <input type="checkbox" class="custom-control-input" id="signup-privacy" name="signup-privacy"  disabled="disabled">
                                            <label class="custom-control-label font-w400" for="signup-privacy">
                                            <a style="color: #000;" class="btn-block-option font-size-sm" target="_blank" href="<?php echo base_url()?>terms-conditions" >I agree to Privacy</a>
                                             
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" name="hidden_disclaimer_checkbox_value" id="hidden_disclaimer_checkbox_value" value="<?php echo $user_application['0']['user_application_disclaimer'];?>"  >
                                            <input type="checkbox" class="custom-control-input" id="signup-disclaimer" name="signup-disclaimer"  disabled="disabled">
                                            <label class="custom-control-label font-w400" for="signup-disclaimer">
                                                <a style="color: #000;" class="btn-block-option font-size-sm" target="_blank" href="<?php echo base_url()?>terms-conditions" >I agree to Disclaimer</a>
                                            </label>
                                        </div>
                                    </div> 
                                                             
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

<!-- END Main Container -->


<!-------------- JS IN FOLDER template/footer.php------->
