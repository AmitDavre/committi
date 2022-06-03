<?php
$Province  = $this->config->item('Province');
$HouseHoldIncome  = $this->config->item('HouseHoldIncome');
$employmentStatus  = $this->config->item('employmentStatus');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Committi</title>
    

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/media/favicons/apple-touch-icon-180x180.png">





        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/dropzone/dist/min/dropzone.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/datatables/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/magnific-popup/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick-theme.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        


        <!-- END Icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url(); ?>assets/css/oneui.min.css">

    </head>
    <style type="text/css">
    .bg-success {
        background-color: #dbdf30!important;
    }
    .nav-tabs-alt .nav-item.show .nav-link, .nav-tabs-alt .nav-link.active {
        color: #575757;
        background-color: transparent;
        border-color: transparent;
        box-shadow: inset 0 -2px #110d35;
    }
	.lr {
    padding-left: 0; 
    padding-right: 0;
}
    .custom-control-input:checked~.custom-control-label::before {
            color: #fff;
            border-color: #110d35;
            background-color: #110d35;
    }
    .nav-tabs-alt .nav-link:focus, .nav-tabs-alt .nav-link:hover {
        color: #110d35!important;
        background-color: transparent;
        border-color: transparent;
        box-shadow: inset 0 -2px #110d35!important;
    }
    .auto_capitalize{
        text-transform: capitalize;
    }
    .color_p_tag{
        width: 100%;
        margin-top: .5rem;
        font-size: .875rem;
        color: #d26a5c;
    }
    .btn-info,.bg-info {
        background-color: #110d35!important;
    }
    </style>
    <body>

 <div id="page-container">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="hero-static">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <!-- Sign Up Block -->
                                <div class="block block-themed block-fx-shadow mb-0">
                                    <div class="block-header bg-info">
                                        <h3 style="color: #fff;" class="block-title">Create Account</h3>
                                        <div class="block-options">
                                            <a style="color: #fff;" class="btn-block-option font-size-sm" href="<?php echo base_url();?>terms-conditions" >View Terms</a>
                                            <a style="color: #fff;" class="btn-block-option font-size-sm" href="<?php echo base_url();?>privacy" >Privacy</a>
                                            <a style="color: #fff;" class="btn-block-option font-size-sm" href="<?php echo base_url();?>disclaimer" >Disclaimer</a>
                                            <a style="color: #fff;" class="btn-block-option" href="<?php echo base_url(); ?>" data-toggle="tooltip" data-placement="left" title="Sign In">
                                                <i style="color: #fff;" class="fa fa-sign-in-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="block-content">

                                        <div class="p-sm-3 px-lg-4 py-lg-5">
                                            <h1 class="mb-2"><img style="width: 60%;" src="assets/img/logo.jpg" ></h1>
                              <?php if($this->session->flashdata('alreadyemail')) { ?>
                                <div  id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Email Already Registered!!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
                            <?php }else if($this->session->flashdata('success')){ ?>
                                    <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You are signed up successfully,please check your email to verify your account.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="return close_dialog1();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> 

                            <?php } ?>
                                            <p>Please fill the following details to create a new account.</p>


                                            <!-- Sign Up Form -->




                            <!-- Progress Wizard 2 -->
                                <div class="js-wizard-validation2 block block">
                                <!-- Wizard Progress Bar -->
                                <div class="progress rounded-0" data-wizard="progress" style="height: 8px;">
                                    <div class="bg-info progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" id="forProgressBar">
                                    </div>
                                </div>
                                <!-- END Wizard Progress Bar -->

                                <!-- Step Tabs -->
                                <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#wizard-progress2-step1" data-toggle="tab" id="step_1" id="step_1">1. Personal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#wizard-progress2-step2" data-toggle="tab" id="step_2" id="step_2">2. Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#wizard-progress2-step3" data-toggle="tab" id="step_3" id="step_3">3. Terms and Conditions</a>
                                    </li>
                                </ul>
                                <!-- END Step Tabs -->

                                <!-- Form -->
                                    <form class="js-wizard-validation2-form" action="<?php base_url()?>sign-up" method="POST" >

                                    <!-- Steps Content -->
                                    <div class="block-content block-content-full tab-content  lr" style="min-height: 314px;">
                                        <!-- Step 1 -->
                                        <div class="tab-pane active" id="wizard-progress2-step1" role="tabpanel">
                                            
                                            <div class="row col-md-12">
                                                <div class="col-md-4">

                                                	<div class="form-group">
                                                    <label for="wizard-progress2-firstname">First Name</label>
                                                    <input type="text" class="auto_capitalize form-control form-control-lg form-control-alt" id="user_first_name" name="user_first_name" placeholder="" required ="required" maxlength="20" autocomplete="off">
                                                	</div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-middlename">Middle Name</label>
                                                     <input type="text" class="auto_capitalize form-control form-control-lg form-control-alt" id="user_middle_name" name="user_middle_name" placeholder=" " maxlength="20" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-lastname">Last Name</label>
                                                    <input type="text" class="auto_capitalize form-control form-control-lg form-control-alt" id="user_last_name" name="user_last_name" placeholder=" " required ="required" maxlength="20" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>

                                            
<!--------------------------ROW 3 --------------------->
                                            <div class="row col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-gender">Gender</label>
                                                    <select class="form-control form-control-alt" id="user_gender" name="user_gender" required ="" >

                                                            <option value="">Please select</option>

                                                            <option value="1">Male</option>
                                                            <option value="2">Female</option>
                                                            <option value="3">Other </option>

                                                           

                                                        </select>
                                                       

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-sin">SIN</label>
                                                    <input type="text" class="signup_sin_field form-control form-control-lg form-control-alt" id="user_sin" name="user_sin" placeholder="" required ="required" maxlength="11" autocomplete="off" onkeypress="return isNumber(event)">
                                                    <p id="sin_error" class="color_p_tag"></p>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-dob">Date Of Birth</label>
                                                     <input type="text" class="form-control form-control-lg form-control-alt  bg-white" id="user_dob" name="user_dob" required ="required" value="" readonly="readonly" onchange="cHeck18YearS();">
                                                     <p id="user_dob_error" class="color_p_tag"></p>

                                                    </div>
                                                </div>
                                                
                             
                                            </div>
<!--------------------------ROW 2 --------------------->
                                            <div class="row col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-email">Email</label>
                                                    <input type="email" class="form-control form-control-lg form-control-alt" id="email" name="email" placeholder="" required ="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-confirm-email">Confirm Email</label>
                                                     <input type="email" class="form-control form-control-lg form-control-alt" id="confrim_email" name="confrim_email" placeholder="" required ="required" autocomplete="off">
                                                     <p  style="display: none;" id="email_confirm" ></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-password">Password </label>
                                                    <input type="password" class="form-control form-control-lg form-control-alt passworduser" id="signup_password" name="signup_password" placeholder="" required ="required" autocomplete="new-password">
                                                    <p id="password_strength"></p>
                                                    </div>
                                                </div>
                             
                                            </div>


                                            
                                        </div>
                                        <!-- END Step 1 -->

                                        <!-- Step 2 -->
                                        <div class="tab-pane" id="wizard-progress2-step2" role="tabpanel">
                                             <div class="row col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-street">Street No.</label>
                                                    <input type="text" class="auto_capitalize form-control form-control-lg form-control-alt" id="user_street" name="user_street" placeholder="" required ="required" maxlength="10" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-street-name">Street Name</label>
                                                     <input type="text" class="user_street_name_signup auto_capitalize form-control form-control-lg form-control-alt" id="user_street_name" name="user_street_name" placeholder=" " required ="required" maxlength="20" autocomplete="off">
                                                    </div>
                                                    <p id="street_name_error" class="color_p_tag"></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-unit">Apt/Suite/Unit</label>
                                                     <input type="text" class="auto_capitalize form-control form-control-lg form-control-alt" id="user_unit_no" name="user_unit_no" placeholder=""  maxlength="10" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
<!-----------------------------ROW 2------------------------->
                                            <div class="row col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-unit">City</label>
                                                    <input type="text" class="auto_capitalize form-control form-control-lg form-control-alt" id="user_city" name="user_city" placeholder="" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                              
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-unit">Postal Code</label>
                                                    <input type="text" class="form-control form-control-lg form-control-alt" id="user_postal_code" name="user_postal_code" placeholder="" required="required"  maxlength="7" style="text-transform: uppercase;" autocomplete="off">
                                                    <p id="postal_code_error" class="color_p_tag"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-provience">Province</label>
                                                    <select class="form-control form-control-alt" id="user_provience" name="user_provience" required>
                                                            <option value="">Please select</option>
                                                       <?php foreach($Province as $key => $item){?>
                                                            <option value="<?php  echo strtolower($key);?>">
                                                            <?php echo $item;?>
                                                            </option>
                                                        <?php }?>
                                                    </select>
                                                    </div>
                                                </div>
                                                
                                            </div>
<!------------------------------ROW 3--------------------------------->
                                            <div class="row col-md-12">
                                                  <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-phone-no">Phone No</label>
                                                    <input type="text" class="signup_phoneno form-control form-control-lg form-control-alt" id="user_phone_no" name="user_phone_no"  required ="required"  maxlength="14" autocomplete="off" onkeypress="return isNumber(event)" placeholder="(xxx) xxx-xxxx">
                                                    <p id="phone_code_error" class="color_p_tag"></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-gross">Gross Annual Household Income</label>
                                                    <select class="form-control form-control-alt" id="user_gross_income" name="user_gross_income" required>

                                                            <option value="">Please select</option>
                                                       <?php foreach($HouseHoldIncome as $key => $item){?>
                                                            <option value="<?php  echo strtolower($key);?>">
                                                            <?php echo $item;?>
                                                            </option>
                                                        <?php }?>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-residential">Residential Status</label>
                                                    <select class="form-control form-control-alt" id="user_residential_status" name="user_residential_status" required>

                                                             <option value="">Please select</option>
                                                            <?php if(isset($residential_data)) {
                                                                foreach ($residential_data as $residential) {?>
                                                                    <option value="<?php echo $residential->dropdown_values_id;?>"><?php echo $residential->dropdown_values_name;?></option>
                                                                <?php }} ?>

                                                            <!-- <option value="1">Option 1</option>

                                                            <option value="2">Option 2</option> -->

                                                           

                                                        </select>
                                                    </div>
                                                </div>
                          
                                               
                                            </div>
                                            <div class="row col-md-12">
                                            	<div class="col-md-4">
                                                    <div class="form-group ">
                                                    <label for="wizard-progress2-plan-funds">Why are you joining committi ?</label>
                                                    <select class="form-control form-control-alt" id="user_planning" name="user_planning" required>

                                                            <option value="">Please select</option>
                                                                  <?php if(isset($joining_committi_data)) {
                                                                foreach ($joining_committi_data as $joining_committi_value) {?>
                                                                    <option value="<?php echo $joining_committi_value->dropdown_values_id;?>"><?php echo $joining_committi_value->dropdown_values_name;?></option>
                                                                <?php }} ?>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-employment">Source of Income</label>
                                                               <select class="form-control form-control-alt" id="user_employment_status" name="user_employment_status" required onchange="employementStatusChange();">

                                                            <option value="">Please select</option>
                                                       <?php foreach($employmentStatus as $key => $item){?>
                                                            <option value="<?php  echo strtolower($key);?>">
                                                            <?php echo $item;?>
                                                            </option>
                                                        <?php }?>

                                                           

                                                        </select>
                                                         <div id="hidden_div">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- END Step 2 -->

                                        <!-- Step 3 -->
                                        <div class="tab-pane" id="wizard-progress2-step3" role="tabpanel">
                                            <div class="row col-md-12">
                                                 
                                         

                                                <!-- <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-time-funds">How Soon You Need The Funds ?</label>
                                                    <select class="form-control form-control-alt" id="user_fund_time" name="user_fund_time" required>

                                                            <option value="">Please select</option>

                                                            <option value="1">Option 1</option>

                                                            <option value="2">Option 2</option>

                                                           

                                                        </select>
                                                    </div>
                                                </div> -->
                                                

                                            </div>           
                                            <!-- <div class="row col-md-12">

                                                <div class="col-md-4">
                                                    <div class="form-group ">
                                                    <label for="wizard-progress2-plan-funds">What Are You Planning To Do With The Funds ?</label>
                                                    <select class="form-control form-control-alt" id="user_planning" name="user_planning" required>

                                                            <option value="">Please select</option>

                                                            <option value="1">Option 1</option>

                                                            <option value="2">Option 2</option>

                                                           

                                                        </select>
                                                    </div>
                                                </div>

                                            </div> -->
                                            <div class="row col-md-12">

                                                <div class="col-md-4">
                                                    <div class="form-group custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms" required ="required">
                                                            <label class="custom-control-label font-w400" for="signup-terms"><a style="color: #575757;" target="_blank" href="<?php echo base_url();?>terms-conditions">I Agree To Terms &amp; Conditions</a></label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row col-md-12">

                                                <div class="col-md-4">
                                                    <div class="form-group custom-control custom-checkbox">
                                                   <input type="checkbox" class="custom-control-input" id="signup-privacy" name="signup-privacy" required ="required">
                                                            <label class="custom-control-label font-w400" for="signup-privacy"><a style="color: #575757;" target="_blank" href="<?php echo base_url();?>privacy">I Agree To Privacy </label></a>
                                                    </div>
                                                </div>

                                            </div><div class="row col-md-12">

                                                <div class="col-md-4">
                                                    <div class="form-group custom-control custom-checkbox">
                                                     <input type="checkbox" class="custom-control-input" id="signup-disclaimer" name="signup-disclaimer" required ="required">
                                                            <label class="custom-control-label font-w400" for="signup-disclaimer"><a style="color: #575757;" target="_blank" href="<?php echo base_url();?>disclaimer">I Agree To Disclaimer </label></a>
                                                    </div>
                                                </div>

                                            </div>
                           
                                        </div>
                                        <!-- END Step 3 -->
                                    </div>
                                    <!-- END Steps Content -->

                                    <!-- Steps Navigation -->
                                    <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary" data-wizard="prev">
                                                    <i class="fa fa-angle-left mr-1"></i> Previous
                                                </button>
                                            </div>
                                            <div class="col-6 text-right">
                                                <button id= "nextButton" type="button" class="btn btn-secondary" data-wizard="next">
                                                    Next <i class="fa fa-angle-right ml-1"></i>
                                                </button>
                                                <button type="submit" class="btn btn-info d-none" name="submit" id="submit" data-wizard="finish">
                                                    <i class="fa fa-check mr-1"></i> Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Navigation -->
         
                            </div>
                            <!-- END Progress Wizard 2 -->

                                            </form>
                                            <!-- END Sign Up Form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END Sign Up Block -->
                            </div>
                        </div>
                    </div>

                    <div class="content content-full font-size-sm text-muted text-center">
                        <strong>Committi</strong> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->


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

                            <button type="button" class="btn btn-sm btn-info mr-2" data-dismiss="modal">Close</button>

                            <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">I Agree</button>

                        </div>

                    </div>

                </div>

            </div>

        </div>




<!-- Page JS Code -->


<script src="<?php echo base_url(); ?>assets/js/oneui.core.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/oneui.app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/op_auth_signup.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/jquery-validation/additional-methods.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/be_forms_wizard.min.js"></script>


<script src="<?php echo base_url()?>assets/js/plugins/chart.js/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url()?>assets/js/pages/be_pages_dashboard.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/pages/be_comp_dialogs.min.js"></script>
        
               <!-- Page JS Plugins -->

        <!-- <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script> -->
        <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/dropzone/dropzone.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/es6-promise/es6-promise.auto.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



        <script>jQuery(function(){ One.helpers('magnific-popup'); });</script>

        <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
        <script>jQuery(function(){ One.helpers(['flatpickr', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>


<script type="text/javascript">
    $(document).ready(function(){
    $('#nextButton').on('mouseover',function(){
     var step_id = $(".active").attr("id");
      if(step_id=='step_1'){
          var password=$('.passworduser').val();
          var user_sin=$('#user_sin').val();
          var user_dob=$('#user_dob').val();
          var user_email=$('#user_email').val();
          var confirm_email=$('#user_email').val();
          if($("#sin_error").text()!=''|| $("#user_dob_error").text()!=''|| $("#email_confirm").text()!=''|| $("#password_strength").text()!=''){
            $('#wizard-progress2-step1').addClass('active');
            $('#step_1').addClass('active');
            $('#wizard-progress2-step2').removeClass('active');
            $('#step_2').removeClass('active');
            $('#nextButton').prop("disabled", true);
            $('#forProgressBar').css('width','30%');
            return false;
           }
         }
       if(step_id=='step_2' &&($("#postal_code_error").text()!=''||$("#street_name_error").text()!=''||$("#phone_code_error").text()!='')){
            $('#wizard-progress2-step2').addClass('active');
            $('#step_2').addClass('active');
            $('#wizard-progress2-step1').removeClass('active');
            $('#step_1').removeClass('active');
            $('#wizard-progress2-step3').removeClass('active');
            $('#step_3').removeClass('active');
            $('#nextButton').prop("disabled", true);
            $('#forProgressBar').css('width','67.6666%');
            return false;
     }
 });
 });
$(document).on('keyup', '.passworduser', function(){
    var txtInput = $(this).val();  
    var color="Red";
    var uppercase = /[A-Z]/ ;
    var lowercase = /[a-z]/ ;
    var number    = /[0-9]/ ;
    var special   = /[\W]{1,}/ ; 
    var pswd_length    = txtInput.length < 8;
    if(!uppercase.test(txtInput) || !lowercase.test(txtInput) || !number.test(txtInput) || !special.test(txtInput) || pswd_length) 
    {
        $('#password_strength ').html('Password must be at least 8 characters. Password must contain at least one upper case letter, one lower case letter , one special character and one digit.');
         $("#password_strength").addClass("color_p_tag");

        //return false;

        $('#re_password').prop("disabled", true);
        $('#submit').prop("disabled", true);
        $('#nextButton').prop("disabled", true);
    } 
    else 
    {
        $('#password_strength').text("");
        $('#re_password').prop("disabled", false);
        $('#submit').prop("disabled", false);
        $('#nextButton').prop("disabled", false);

    }

});

$(function () {
	var maxBirthdayDate = new Date();
	maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18,11,31);
    $("#user_dob").datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: maxBirthdayDate,
  		yearRange: '1950:'+maxBirthdayDate.getFullYear(),
    });
});

function close_dialog()
{
    $('#main_dialog_box').css('display','none');
}
function close_dialog1()
{
    $('#main_dialog_box').css('display','none');
    window.location.href="<?php echo base_url()?>";
}


$('#user_sin').on('input', function() {              //Using input event for instant effect
  let text=$(this).val()                             //Get the value
  text=text.replace(/\D/g,'')                        //Remove illegal characters 
  if(text.length>3) text=text.replace(/.{3}/,'$&-')  //Add hyphen at pos.4
  if(text.length>7) text=text.replace(/.{7}/,'$&-')  //Add hyphen at pos.8
  $(this).val(text);                                 //Set the new text
});

$('#user_sin').bind("cut copy paste",function(e) {
     e.preventDefault();
 });

$('#user_phone_no').bind("cut copy paste",function(e) {
     e.preventDefault();
 });

$('#user_postal_code').keypress(function() {
  var foo = $(this).val().split(" ").join(""); // remove hyphens
  if (foo.length > 0) {
    foo = foo.match(new RegExp('.{1,3}', 'g')).join(" ");
  }else if(foo.length<7){
     $("#postal_code_error").text("Please Enter Correct Postal Code.");
     $('#nextButton').prop("disabled", true);
  }
  $(this).val(foo);
});

function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
     // $(".errorr").text('Please enter only numeric digit');
 return false;

    return true;
}


$('#user_phone_no').keypress(function(e) {              //Using input event for instant effect
 var curchr = this.value.length;
    var curval = $(this).val();
    if (curchr == 3) {
        if( e.keyCode!=8 ){
            $(this).val("(" + curval + ")" + " ");
        }
    } else if (curchr == 9) {
        if( e.keyCode!=8 ){
            $(this).val(curval + "-");
        }
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) && e.keyCode !=8 ) {
        e.preventDefault();
    }                             //Set the new text
});


//////// EMAIL MATCH SCRIPT ///////////////
$('#confrim_email').blur(function() {

    var email = $('#email').val();

    var confirmEmail =$('#confrim_email').val();

    if(email != confirmEmail )
    {
        $('#email_confirm').html('Email Does Not Match.');
         $("#email_confirm").addClass("color_p_tag");
         $('#email_confirm').css('display','');
         $('#nextButton').prop("disabled", true);
    }
    else
    {
        $('#email_confirm').text('');
        $('#nextButton').prop("disabled", false);

    }
 
});


var minLengthSin = 11;
$(".signup_sin_field").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthSin)
    {
        $("#sin_error").text("SIN Must Be 9 digits.");
        $('#nextButton').prop("disabled", true);
    }
    else
    {
       $("#sin_error").text("");
       $('#nextButton').prop("disabled", false);
    }
   
});

var minLengthphone = 14;
$(".signup_phoneno").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthphone)
    {
        $("#phone_code_error").text("Phone no must be 10 digits.");
        $('#nextButton').prop("disabled", true);
    }
    else
    {
       $("#phone_code_error").text("");
       $('#nextButton').prop("disabled", false);
    }
   
});



function employementStatusChange()
{
	var employementValue  = $('#user_employment_status').find(":selected").val();

	if(employementValue == '3')
	{
		var input = '<input type="text" class="auto_capitalize form-control" name="source_employement" id="source_employement" value="" placeholder="Enter Source">';

		$('#hidden_div').append(input);
	}
	else
	{
		$('#source_employement').remove();	
	}

} 


$('#user_postal_code').on("keyup", function()
{
    var zip = $('#user_postal_code').val();

    var zipRegex = /^(?:[A-Z]\d[A-Z][ -]?\d[A-Z]\d)$/i;

    if (!zipRegex.test(zip))
    {
        $("#postal_code_error").text("Please Enter Correct Postal Code.");
        $('#nextButton').prop("disabled", true);
        $('#nextButton').attr("disabled", true);
    }
    else
    {
        // success!
        $("#postal_code_error").text("");
        $('#nextButton').prop("disabled", false);
    }
});


var charReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
$('.user_street_name_signup').on("keyup", function(){
    var inputVal = $('.user_street_name_signup').val();

    if (!charReg.test(inputVal))
    {
        $("#street_name_error").text("Special Characters Are Not Allowed.");
        $('#nextButton').prop("disabled", true);
    }
    else
    {
        // success!
        $("#street_name_error").text("");
        $('#nextButton').prop("disabled", false);
    }

});


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

function cHeck18YearS()
{

    var uSerInput = $('#user_dob').val();

    var userInputArray = uSerInput.split('/');


    var day = userInputArray[1];
    var month = userInputArray[0];
    var year = userInputArray[2];
    var dateOfBirth = year+'/'+month +'/'+ day;
    var ageCount =getAge(dateOfBirth);

    if(ageCount < '18')
    {
        $("#user_dob_error").text("Minimuma Age Required Is 18 Years And Above.");
        $('#nextButton').prop("disabled", true);
    }
    else
    {
        // success!
        $("#user_dob_error").text("");
        $('#nextButton').prop("disabled", false);
    }

}
</script>

    </body>

</html>

