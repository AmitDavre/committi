<?php 
$gender               = $this->config->item('gender');
$options              = $this->config->item('options');
$tier                 = $this->config->item('tier');
$no_of_bidding_cycle  = $this->config->item('no_of_bidding_cycle');
$BiddingRestriciton   = $this->config->item('BiddingRestriciton');
$Province  = $this->config->item('Province');
$HouseHoldIncome  = $this->config->item('HouseHoldIncome');
$yesnoselect  = $this->config->item('yesnoselect');


?>
<style type="text/css">
button.btn.btn-secondary {
    width: 100px;
    margin: -20px -50px;
    position: relative;
    top: 25%;
    left: 24%;
}

button#submit {
    background-color: #6fb8eb;
    color: #fff;
    width: 100px;
    margin: -20px -50px;
    position: relative;
    top: 25%;
    left: 61%;
}

.auto_capitalize {
    text-transform: capitalize;
}

.color_p_tag {
    width: 100%;
    margin-top: .5rem;
    font-size: .875rem;
    color: #d26a5c;
}

.nav-tabs-block .nav-link:focus,
.nav-tabs-block .nav-link:hover {
    color: #120e35;
}

.page-item.active .page-link {
    z-index: 3;
    color: #110d35 !important;
    background-color: #f9f9f9;
    border-color: #110d35 !important;
}
</style>
<div>
    <!-- Main Container -->

    <main id="main-container">

        <!-- Hero -->

        <div class="content ">
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item"><a class="text-muted"
                            href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>manage-users">Manage
                            User</a></li>
                    <li class="breadcrumb-item"><a class="text-muted"
                            href="<?php echo base_url()?>edit-user/<?php echo base64_encode($user_application['u_id']);?>"><?php echo $user_application['user_application_first_name'].' '.$user_application['user_application_last_name'] ?></a>
                    </li>
                    <li class="breadcrumb-item">Plans</li>
                </ol>
            </nav>
        </div>

        <!-- END Hero -->



        <!-- Page Content -->

        <div class="content content">
            <button class="btn btn-info btn-sm push" data-toggle="modal" data-target="#modal-release-plan">Change
                Plan</button>
            <div class="block">
                <div id="ajax_div_success"></div>

                <div class="block-content">

                    <ul class="nav nav-tabs nav-tabs-block " data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#btabs-animated-fade-home">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#btabs-animated-fade-plans"  data-toggle="tab">Applications</a>
                        </li>


                    </ul>
                    <div class="block-content tab-content">
                        <div class="tab-pane fade active show" id="btabs-animated-fade-home" role="tabpanel">
                            <div class="block-content block-content-full">
                                <form action="<?php base_url()?>review-application" method="POST"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="hidden_u_id" id="hidden_u_id"
                                        value="<?php echo $user_application['u_id']?>">
                                    <input type="hidden" name="hidden_user_application_plan_id"
                                        id="hidden_user_application_plan_id"
                                        value="<?php echo $user_application['user_application_plan_id']?>">
                                    <input type="hidden" name="hidden_user_application_table_id"
                                        id="hidden_user_application_table_id"
                                        value="<?php echo $user_application['a_id']?>">


                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="plan-name">Plan Name </label>
                                                <input type="text" class="form-control" id="" name=""
                                                    value="<?php echo $user_application_plan['plan_name']?>"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label> Bidding Start Date </label>
                                                <input type="text" class="form-control" id="" name=""
                                                    value="<?php $BiddingStartDate= date('m/d/Y',strtotime($user_application_plan['bidding_start_date'])); echo $BiddingStartDate;?>"
                                                    readonly="readonly">

                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label> Bidding Start Amount</label>
                                                <input type="text" class="form-control" id="" name=""
                                                    value="<?php echo $user_application_plan['bidding_start_amount']?>"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="plan-name">Tier 1 Members Left</label>
                                                <input type="text" class="form-control" id="" name=""
                                                    value="<?php echo $user_application_plan['plan_tier_1_left_memebers']?>"
                                                    readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="plan-name">Tier 2 Members Left</label>
                                                <input type="text" class="form-control" id="" name=""
                                                    value="<?php echo $user_application_plan['plan_tier_2_left_memebers']?>"
                                                    readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="plan-name">Tier 3 Members Left</label>
                                                <input type="text" class="form-control" id="" name=""
                                                    value="<?php echo $user_application_plan['plan_tier_3_left_memebers']?>"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="plan-name">Tier 4 Members Left</label>
                                                <input type="text" class="form-control" id="" name=""
                                                    value="<?php echo $user_application_plan['plan_tier_4_left_memebers']?>"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <h3 class="block-title">PERSONAL INFORMATION</h3><br>
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label>First Name  <span style="color:red">* </span></label>
                                                <input type="text" class="auto_capitalize form-control"
                                                    id="user_first_name" name="user_first_name"
                                                    value="<?php echo $user_application['user_application_first_name']?>"
                                                    tabindex="1" required="required" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label> Middle Name </label>
                                                <input type="text" class="auto_capitalize form-control"
                                                    id="user_middle_name" name="user_middle_name"
                                                    value="<?php echo $user_application['user_application_middle_name']?>"
                                                    tabindex="2">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label> Last Name  <span style="color:red">* </span></label>
                                                <input type="text" class="auto_capitalize form-control"
                                                    id="user_last_name" name="user_last_name"
                                                    value="<?php echo $user_application['user_application_last_name']?>"
                                                    tabindex="4" required="required" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">

                                            <div class="form-group">
                                                <label>Gender <span style="color:red">* </span></label>

                                                <select class="form-control" id="user_gender" name="user_gender" required="required" autocomplete="off">
                                                    <?php
                                                    // Iterating through the tier array
                                                    foreach($gender as $key =>$item)
                                                    {
                                                        if($key == $user_application['user_application_gender'])
                                                            {?>
                                                    <option value="<?php  echo strtolower($key);?>">
                                                        <?php echo $item;?>
                                                    </option>
                                                    <?php   }
                                                    }?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-lg-4 col-xl-4">

                                            <div class="form-group">
                                                <label> SIN <span style="color:red">* </span> </label>
                                                <input type="text" class="sin_application_Review_class form-control"
                                                    id="user_sin" name="user_sin"
                                                    value="<?php echo $user_application['user_application_sin']?>"
                                                    maxlength="11" autocomplete="off">
                                                <p id="sin_application_reViewErroR" class="color_p_tag"></p>

                                            </div>


                                        </div>
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label> Date Of Birth <span style="color:red">* </span></label>
                                                <input type="text" class="application_review_dateOfbirth form-control"
                                                    id="user_date_of_birth" name="user_date_of_birth"
                                                    value="<?php echo date('m/d/Y', strtotime($user_application['user_application_dob']));?>"
                                                    onchange="cHeck18YearSAppRev();" required="required" autocomplete="off">
                                                <p id="user_dob_error_application_rev" class="color_p_tag"></p>

                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <h3 class="block-title">Contact Information</h3><br>
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label> Street </label>
                                                <input type="text" class="auto_capitalize form-control" id="user_street"
                                                    name="user_street"
                                                    value="<?php echo $user_application['usert_application_street']?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label> Apt/Suite/Unit </label>
                                                <input type="text" class="auto_capitalize form-control" id="user_suite"
                                                    name="user_suite"
                                                    value="<?php echo $user_application['user_application_unit_no']?>">
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label> Postal Code <span style="color:red">* </span></label>
                                                <input type="text" class="postal_code_review_app_form form-control"
                                                    id="user_postal_code" name="user_postal_code"
                                                    value="<?php echo $user_application['user_application_postal_code']?>"
                                                    style="text-transform: uppercase;" maxlength="7">
                                                <p id="postal_code_error_review_app" class="color_p_tag"></p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label> Street Name </label>
                                                <input type="text"
                                                    class="streetNameAppliCatiOnReviEw auto_capitalize form-control"
                                                    id="user_street_name" name="user_street_name"
                                                    value="<?php echo $user_application['user_application_street_name']?>">
                                                <p id="street_nameErrorApplicationREview" class="color_p_tag"></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4 col-xl-4">


                                            <div class="form-group">
                                                <label> Email Address <span style="color:red">* </span></label>
                                                <input type="text" class="form-control" id="user_email_address"
                                                    name="user_email_address"
                                                    value="<?php echo $user_application['user_application_email']?>">
                                            </div>


                                        </div>
                                        <div class="col-sm-4 col-lg-4 col-xl-4">

                                            <div class="form-group">
                                                <label> Phone Number <span style="color:red">* </span></label>
                                                <input type="text" class=" phoNEappLicationReviewVal form-control"
                                                    id="user_phone_number" name="user_phone_number"
                                                    value="<?php echo $user_application['user_application_phone_no']?>"
                                                    maxlength="14" autocomplete="off" placeholder="(xxx) xxx-xxxx">

                                                <p id="phonenOErrOrApplIcATioNError" class="color_p_tag"></p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">

                                            <div class="form-group">
                                                <label for="example-select">Province <span style="color:red">* </span></label>

                                                <select class="form-control" id="user_provience" name="user_provience">
                                                    <option value="">Please select</option>
                                                    <?php foreach($Province as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>"
                                                        <?php echo (strtolower($key) ==  $user_application['user_application_provience']) ? 'selected' : '' ?>>
                                                        <?php echo $item;?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <br>
                                    <h3 class="block-title">Other Information</h3><br>
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="example-select">Employment Status</label>

                                                <select class="form-control" id="user_employment_status"
                                                    name="user_employment_status">
                                                    <?php foreach($options as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>"
                                                        <?php echo (strtolower($key) ==  $user_application['user_application_employment_status']) ? 'selected' : '' ?>>
                                                        <?php echo $item;?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="example-select">Residential Status</label>

                                                <select class="form-control" id="user_residential"
                                                    name="user_residential">
                                                    <!--    <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $user_application['user_application_residential_status']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?> -->
                                                    <option value="">Please select</option>
                                                    <?php if(isset($residential_data)) {
                                              foreach ($residential_data as $residential) {?>
                                                    <option value="<?php echo $residential->dropdown_values_id;?>"
                                                        <?php if($user_application['user_application_residential_status']==$residential->dropdown_values_id){ echo 'selected';}else {echo '';}?>>
                                                        <?php echo $residential->dropdown_values_name;?></option>
                                                    <?php }} ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="example-select">How soon you need the funds ?</label>

                                                <select class="form-control" id="user_funds_time"
                                                    name="user_funds_time">
                                                    <?php foreach($options as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>"
                                                        <?php echo (strtolower($key) ==  $user_application['user_application_fund_time']) ? 'selected' : '' ?>>
                                                        <?php echo $item;?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="example-select">Gross Annual Household Income</label>

                                                <select class="form-control" id="user_annual_income"
                                                    name="user_annual_income">
                                                    <?php foreach($HouseHoldIncome as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>"
                                                        <?php echo (strtolower($key) ==  $user_application['user_application_gross_income']) ? 'selected' : '' ?>>
                                                        <?php echo $item;?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>


                                        </div>

                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="example-select">How soon you need the funds ?</label>

                                                <select class="form-control" id="user_funds_time"
                                                    name="user_funds_time">
                                                    <?php foreach($options as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>"
                                                        <?php echo (strtolower($key) ==  $user_application['user_application_fund_time']) ? 'selected' : '' ?>>
                                                        <?php echo $item;?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-lg-4 col-xl-4">

                                            <div class="form-group">
                                                <label for="example-select">Why are you joining committi ?</label>

                                                <select class="form-control" id="user_funds" name="user_funds">
                                                    <!--   <?php foreach($options as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $user_application['user_application_planning']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>  -->

                                                    <option value="">Please select</option>
                                                    <?php if(isset($joining_committi_data)) {
                                            foreach ($joining_committi_data as $joining_committi_value) {?>
                                                    <option
                                                        value="<?php echo $joining_committi_value->dropdown_values_id;?>"
                                                        <?php if($user_application['user_application_planning']==$joining_committi_value->dropdown_values_id){ echo 'selected';}else {echo '';}?>>
                                                        <?php echo $joining_committi_value->dropdown_values_name;?>
                                                    </option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h3 class="block-title">Additional Information</h3><br>
                                    <div class="row">
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label id="test" for="example-select">Select Tier&nbsp;<span
                                                        style="color: red;">*</span></label>

                                                <select class="form-control" id="user_application_tier"
                                                    name="user_application_tier"
                                                    onchange="checkTierStatus();disableApprove();">
                                                    <option value="">Please Select</option>
                                                    <?php foreach($tier as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>"
                                                        <?php echo (strtolower($key) ==  $user_application['user_application_tier']) ? 'selected' : '' ?>>
                                                        <?php echo $item;?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="example-select">Do You Want To Restrict This User </label>
                                                <select class="form-control" id="user_application_no_bidding"
                                                    name="user_application_no_bidding"
                                                    onchange="selectRestricionLevel();">
                                                    <option value="">Please Select</option>
                                                    <?php foreach($yesnoselect as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>"
                                                        <?php echo (strtolower($key) ==  $user_application['user_application_restricted']) ? 'selected' : '' ?>>
                                                        <?php echo $item;?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4 col-xl-4">
                                            <div class="form-group">
                                                <label for="example-select">Select Restriction Up To Bidding Cycle
                                                </label>
                                                <select class="form-control" id="user_restriction_level"
                                                    name="user_restriction_level">
                                                    <option value="">Please Select</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="custom-file">
                                                <button type="reset" class="btn btn-secondary">Reset</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-info" type="submit" id="submit" name="submit"
                                                    class="btn btn-alt-success">Approve</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>

                                    </div>
                            </div>
                            </form>

                            <!-- Pop Out Block Modal -->
                            <div class="modal fade" id="modal-release-plan" tabindex="-1" role="dialog"
                                aria-labelledby="modal-release-plan" aria-hidden="true">

                                <input type="hidden" name="hidden_ajax_plan_name" id="hidden_ajax_plan_name" value="">
                                <input type="hidden" name="hidden_ajax_plan_id" id="hidden_ajax_plan_id" value="">
                                <input type="hidden" name="hidden_ajax_enroll_start_date"
                                    id="hidden_ajax_enroll_start_date" value="">
                                <input type="hidden" name="hidden_ajax_enroll_end_date" id="hidden_ajax_enroll_end_date"
                                    value="">
                                <input type="hidden" name="hidden_ajax_bidding_start_date"
                                    id="hidden_ajax_bidding_start_date" value="">
                                <input type="hidden" name="hidden_ajax_bidding_start_amount"
                                    id="hidden_ajax_bidding_start_amount" value="">

                                <div class="modal-dialog modal-dialog-popout" role="document">
                                    <div class="modal-content">
                                        <div class="block block-themed block-transparent mb-0">
                                            <div class="block-header bg-primary-dark">
                                                <h3 class="block-title">Change Plan</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content font-size-sm">
                                                <div class="form-group">
                                                    <label>Select New Plan</label>
                                                    <select class="form-control" id="modal_plan_id" name="modal_plan_id"
                                                        onchange="getPlanDetails();">
                                                        <option value="0">Select</option>
                                                        <?php
                                                    // Iterating through the tier array
                                                     array_unshift($plan_details, "phoney");
                                                     unset($plan_details[0]);

                                                 

                                                    foreach($plan_details as $key =>$item){
                                                    ?>
                                                        <option value="<?php  echo $item['id'];?>">
                                                            <?php echo $item['plan_name'];?>
                                                        </option>
                                                        <?php
                                                    }
                                                ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="block-content block-content-full text-right border-top">
                                                <button type="button" class="btn btn-sm btn-light"
                                                    data-dismiss="modal">Close</button>

                                                <button type="button" class="btn btn-sm btn-info"
                                                    onclick="UpdateOnChangePlan();"><i
                                                        class="fa fa-check mr-1"></i>Change Plan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Pop Out Block Modal -->



                        </div>

                        <div class="tab-pane fade " id="btabs-animated-fade-plans" role="tabpanel">
                            <div class="block-content block-content-full">
                                <table id="admin_application_table_view"
                                    class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap"
                                    style="width:100%!important">
                                    <thead>
                                        <tr>
                                            <th style="width:20%!important" class="text-center">ID</th>
                                            <th style="width:20%!important">Plan Name</th>
                                            <th style="width:20%!important">Plan Applied Date</th>
                                            <th style="width:20%!important">Current Status </th>
                                            <th style="width:20%!important">Status Update Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                                if ($user_application_table != '')
                                                {
                                                    $count =1; 
                                                    foreach($user_application_table as $view_user_application) 
                                                        { 
                                                ?>
                                        <tr>
                                            <td class="text-center font-size-sm"><?php echo $count++ ?></td>
                                            <td class="text-center font-size-sm">
                                                <?php echo $view_user_application['user_application_plan_name']; ?>
                                            </td>
                                            <td class="text-center font-size-sm">
                                                <?php 
                                                                $convertDate= date('m/d/Y', strtotime($view_user_application['user_application_posted_date']));
                                                                        echo $convertDate;
                                                                ?>
                                            </td>

                                            <td class="text-center font-size-sm">
                                                <?php 

                                                                if($view_user_application['user_application_offer_sent'] == '1' && $view_user_application['user_application_plan_confirmation'] == ''){

                                                                    ?>
                                                <a class="text-white badge badge-success">Waiting User</a>

                                                <?php } else if ($view_user_application['user_application_plan_confirmation'] == '1') { ?>

                                                <a class="text-white badge badge-info">Accepted</a>
                                                <?php }
                                                                else if ($view_user_application['user_application_plan_confirmation'] == '0'){ ?>

                                                <a class="text-white badge badge-danger">Rejected</a>

                                                <?php }else {?>
                                                <a style="color: #fff;" class="badge badge-info">Pending</a>
                                                <?php  } ?>
                                            </td>
                                            <td class="text-center font-size-sm">
                                                <?php 
                                                                $convertDates= date('m/d/Y', strtotime($view_user_application['user_application_status_confirm_date']));
                                                                if($view_user_application['user_application_status_confirm_date'] != '')
                                                                {
                                                                        echo $convertDates;
                                                                }
                                                                else
                                                                {
                                                                    echo $convertDates='';
                                                                }
                                                                ?>
                                            </td>
                                        </tr>
                                        <?php 
                                                    } 
                                            }
                                            ?>

                                    </tbody>
                                </table>
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
    <script>
    function UpdateOnChangePlan() {
        var userId = $('#hidden_u_id').val();
        var hidden_ajax_plan_name = $('#hidden_ajax_plan_name').val();
        var hidden_ajax_plan_id = $('#hidden_ajax_plan_id').val();
        var hidden_ajax_enroll_start_date = $('#hidden_ajax_enroll_start_date').val();
        var hidden_ajax_enroll_end_date = $('#hidden_ajax_enroll_end_date').val();
        var hidden_ajax_bidding_start_date = $('#hidden_ajax_bidding_start_date').val();
        var hidden_ajax_bidding_start_amount = $('#hidden_ajax_bidding_start_amount').val();
        var hidden_user_application_table_id = $('#hidden_user_application_table_id').val();
        var hidden_user_application_plan_id = $('#hidden_user_application_plan_id').val();
        var user_email_address = $('#user_email_address').val();





        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/update_on_plan_change";?>',
            data: {
                'userId': userId,
                'hidden_ajax_plan_name': hidden_ajax_plan_name,
                'hidden_ajax_plan_id': hidden_ajax_plan_id,
                'hidden_ajax_enroll_start_date': hidden_ajax_enroll_start_date,
                'hidden_ajax_enroll_end_date': hidden_ajax_enroll_end_date,
                'hidden_ajax_bidding_start_date': hidden_ajax_bidding_start_date,
                'hidden_ajax_bidding_start_amount': hidden_ajax_bidding_start_amount,
                'hidden_user_application_table_id': hidden_user_application_table_id,
                'hidden_user_application_plan_id': hidden_user_application_plan_id,
                'user_email_address': user_email_address
            },
            success: function(response) {

                var data = JSON.parse(response);
                console.log(data);

                if ($.trim(response) != '') {

                    var div =
                        ' <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><button id= "hidden_button" style="display: none;"><a id="hidden_link" href="<?php base_url();?>application-review"></a></button><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Plan Changed Successfully. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

                    $('#ajax_div_success').after(div);




                }

            }
        });
    }

    function getPlanDetails() {
        var planId = $('#modal_plan_id').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/get_plan_details";?>',
            data: {
                'planId': planId
            },
            success: function(response) {

                var data = JSON.parse(response);
                console.log(data);

                if (response != '') {
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

    function close_dialog() {
        window.location.href = '<?php echo base_url();?>application-review';
    }

    function close_dialog_box() {
        $('#main_dialog_boxs').css('display', 'none');
    }

    function get_tier_Details() {
        var tier_value = $('#user_application_tier').find(":selected").val();

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/get_tier_table_value_ajax";?>',
            data: {
                'tier_value': tier_value
            },
            success: function(response) {

                var data = JSON.parse(response);

                if (response != '') {
                    if (data.tier_members_left == '0') {
                        jQuery('#tier_check').click();
                        $("#submit").attr("disabled", "disabled");


                    } else {
                        $('#submit').removeAttr("disabled");

                    }

                    if (data.tier_id == '1') {
                        $("#user_application_no_bidding").val("1");
                    }
                    if (data.tier_id == '2') {
                        $("#user_application_no_bidding").val("2");
                    }
                    if (data.tier_id == '3') {
                        $("#user_application_no_bidding").val("3");
                    }
                    if (data.tier_id == '4') {
                        $("#user_application_no_bidding").val("4");
                    }


                }

            }
        });
    }



    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function cHeck18YearSAppRev() {

        var uSerInput = $('.application_review_dateOfbirth').val();

        var userInputArray = uSerInput.split('/');


        var day = userInputArray[1];
        var month = userInputArray[0];
        var year = userInputArray[2];
        var dateOfBirth = year + '/' + month + '/' + day;
        var ageCount = getAge(dateOfBirth);

        if (ageCount < '18') {
            $("#user_dob_error_application_rev").text("Minimuma Age Required Is 18 Years And Above.");
            $('#submit').prop("disabled", true);
        } else {
            // success!
            $("#user_dob_error_application_rev").text("");
            $('#submit').prop("disabled", false);
        }

    }

    function selectRestricionLevel() {
        var selectYesNo = $('#user_application_no_bidding').find(":selected").val();
        var hidden_user_application_plan_id = $('#hidden_user_application_plan_id').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/get_restriction_level_value";?>',
            data: {
                'selectYesNo': selectYesNo,
                'hidden_user_application_plan_id': hidden_user_application_plan_id
            },
            success: function(response) {

                var data = JSON.parse(response);

                if (response != '') {

                    $.each(data, function(key, value) {
                        $("#user_restriction_level").append('<option value=' + value
                            .bidding_cycle_count + '>' + value.bidding_cycle_count + '</option>'
                            );
                    });
                }

            }
        });
    }

    function checkTierStatus() {
        var tier_value = $('#user_application_tier').find(":selected").val();
        var hidden_user_application_plan_id = $('#hidden_user_application_plan_id').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/checkTierStatusAjax";?>',
            data: {
                'tier_value': tier_value,
                'hidden_user_application_plan_id': hidden_user_application_plan_id
            },
            success: function(response) {

                var data = JSON.parse(response);

                if (response != '') {
                    if (data == '1') {
                        // alert('Selected Tier Has No Space Left Please Choose A Different Tier');
                        var div =
                            '<div  id="main_dialog_boxs" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Selected Tier Has No Space Left Please Choose A Different Tier.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_box();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                        $('#ajax_div_success').after(div);

                        $('#submit').prop("disabled", true);
                    } else {
                        $('#submit').prop("disabled", false);

                    }
                }

            }
        });

    }

    function disableApprove() {
        var getTierVal = $('#user_application_tier').val();

        if ($.trim(getTierVal) == '') {
            $('#submit').prop("disabled", true);
        } else {
            $('#submit').prop("disabled", false);
        }
    }
    </script>