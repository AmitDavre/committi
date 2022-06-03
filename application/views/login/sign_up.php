<?php
$Province  = $this->config->item('Province');
$HouseHoldIncome  = $this->config->item('HouseHoldIncome');
$employmentStatus  = $this->config->item('employmentStatus');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Committi</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/magnific-popup/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick-theme.css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    </head>
    <style type="text/css">
    header.masthead.short_banner {
    margin-top: 0;
    margin-bottom: 25px;
    padding: 198px 0px 65px 1px;  
    font-size: 12px;
    background-position: center left !important;
}
section#services {
    padding-bottom: 0;
}footer.footer.py-4 {
    margin-top: -8px;
}
.fa-2x {
    font-size: 21px;
    float: left;
    margin-right: 11px;
    margin-top: 4px !important;
}
ul.list-unstyled.mb-0 li {
    float: left;
    width: 100%;
}
header.masthead.short_banner .masthead-heading {
    font-size: 30px;
    font-weight: 700;
    line-height: 70px;
    margin-bottom: 0rem;
    text-align: left;
}
 ul.list-unstyled.mb-0 .fas {
    font-size: 12px !important;
}
        section#contact {
          background-image: url("<?php echo base_url(); ?>assets/img/map-image.png")!important;
        }
        header.masthead {
          background-image: url("<?php echo base_url(); ?>assets/img/slider2.jpg")!important;
         
        }
        .masthead2 {
          background-image: url("<?php echo base_url(); ?>assets/img/our-client.jpg")!important;
        }
    </style>

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

    #signup_form_new{
        margin-top: 2em!important;
    }

    </style>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/committi_logo.gif" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="home">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="ourplans">Our Plans</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="investing">Investing</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="contact">Contact Us</a></li>
                        <li class="nav-item logine"><a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#exampleModal">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead short_banner">
            <div class="container"> 
                <div class="masthead-heading text-uppercase">Create New Account<span>Home / Sign-up</span></div>
                
                
            </div>
        </header>
         
        </div>
        <!-- Services-->
        
        <section class="page-section" id="services" style="padding-top:26px !important;  padding-bottom:40px;">
            <div class="container">


                 <?php if($this->session->flashdata('alreadyemail')) { ?>
                                <div  id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Email Already Registered!!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
                            <?php }else if($this->session->flashdata('success')){ ?>
                                    <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You are signed up successfully,please check your email to verify your account.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="return close_dialog1();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> 

                            <?php } ?>
                 <p >  <p>Please fill the following details to create a new account.</p>


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
                                    <form class="js-wizard-validation2-form" action="<?php base_url()?>sign-up" method="POST"  id="signup_form_new" autocomplete="false">

                                    <!-- Steps Content -->
                                    <div class="block-content block-content-full tab-content  lr" style="min-height: 314px;">
                                        <!-- Step 1 -->
                                        <div class="tab-pane active" id="wizard-progress2-step1" role="tabpanel">
                                            
                                            <div class="row col-md-12">
                                                <div class="col-md-4">

                                                    <div class="form-group">
                                                    <label for="wizard-progress2-firstname">First Name <span style="color:red;"> * </span></label>
                                                    <input type="text" class="auto_capitalize form-control form-control-alt" id="user_first_name" name="user_first_name" placeholder="Enter First Name" required ="required" maxlength="20" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-middlename">Middle Name</label>
                                                     <input type="text" class="auto_capitalize form-control form-control-alt" id="user_middle_name" name="user_middle_name" placeholder="Enter Middle Name " maxlength="20" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-lastname">Last Name <span style="color:red;"> * </span></label>
                                                    <input type="text" class="auto_capitalize form-control form-control-alt" id="user_last_name" name="user_last_name" placeholder="Enter Last Name" required ="required" maxlength="20" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>

                                            
<!--------------------------ROW 3 --------------------->
                                            <div class="row col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-gender">Gender <span style="color:red;"> * </span></label>
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
                                                    <label for="wizard-progress2-sin">SIN <span style="color:red;"> * </span></label>
                                                    <input type="text" class="signup_sin_field form-control form-control-alt" id="user_sin" name="user_sin" placeholder="Enter SIN" required ="required" maxlength="11" autocomplete="off" onkeypress="return isNumber(event)">
                                                    <p id="sin_error" class="color_p_tag"></p>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-dob">Date Of Birth <span style="color:red;"> * </span></label>
                                                     <input type="text" class="form-control form-control-alt  bg-white" id="user_dob" name="user_dob" required ="required" value="" readonly="readonly" onchange="cHeck18YearS();" placeholder="Enter Date Of Birth">
                                                     <p id="user_dob_error" class="color_p_tag"></p>

                                                    </div>
                                                </div>
                                                
                             
                                            </div>
<!--------------------------ROW 2 --------------------->
                                            <div class="row col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-email">Email <span style="color:red;"> * </span></label>
                                                    <input type="email" class="form-control form-control-alt" id="email" name="email" placeholder="Enter Email" required ="required" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-confirm-email">Confirm Email <span style="color:red;"> * </span></label>
                                                     <input type="email" class="form-control form-control-alt" id="confrim_email" name="confrim_email" placeholder="Confirm Email" required ="required" autocomplete="off">
                                                     <p  style="display: none;" id="email_confirm" ></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-password">Password <span style="color:red;"> * </span></label>
                                                    <input type="password" class="form-control form-control-alt passworduser" id="signup_password" name="signup_password" placeholder="Enter Password" required ="required" autocomplete="new-password">
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
                                                    <label for="wizard-progress2-street">Street No. <span style="color:red;"> * </span></label>
                                                    <input type="text" class="auto_capitalize form-control form-control-alt" id="user_street" name="user_street" placeholder="Enter Street No." required ="required" maxlength="10" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-street-name">Street Name <span style="color:red;"> * </span></label>
                                                     <input type="text" class="user_street_name_signup auto_capitalize form-control form-control-alt" id="user_street_name" name="user_street_name" placeholder="Enter Street Name " required ="required" maxlength="20" autocomplete="off">
                                                    </div>
                                                    <p id="street_name_error" class="color_p_tag"></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-unit">Apt/Suite/Unit </label>
                                                     <input type="text" class="auto_capitalize form-control form-control-alt" id="user_unit_no" name="user_unit_no" placeholder="Enter Apt/Suite/Unit"  maxlength="10" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
<!-----------------------------ROW 2------------------------->
                                            <div class="row col-md-12">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-unit">City <span style="color:red;"> * </span></label>
                                                    <input type="text" class="auto_capitalize form-control form-control-alt" id="user_city" name="user_city" placeholder="Enter City" required="required" autocomplete="off">
                                                    </div>
                                                </div>
                                              
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-unit">Postal Code <span style="color:red;"> * </span></label>
                                                    <input type="text" class="form-control form-control-alt" id="user_postal_code" name="user_postal_code" placeholder="Enter Postal Code" required="required"  maxlength="7" style="text-transform: uppercase;" autocomplete="off">
                                                    <p id="postal_code_error" class="color_p_tag"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-provience">Province </label>
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
                                                    <label for="wizard-progress2-phone-no">Phone No <span style="color:red;"> * </span></label>
                                                    <input type="text" class="signup_phoneno form-control form-control-alt" id="user_phone_no" name="user_phone_no"  required ="required"  maxlength="14" autocomplete="off" onkeypress="return isNumber(event)" placeholder="(xxx) xxx-xxxx">
                                                    <p id="phone_code_error" class="color_p_tag"></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label for="wizard-progress2-gross">Gross Annual Household Income <span style="color:red;"> * </span></label>
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
                                                    <label for="wizard-progress2-residential">Residential Status <span style="color:red;"> * </span></label>
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
                                                    <label for="wizard-progress2-plan-funds">Why are you joining committi ? <span style="color:red;"> * </span></label>
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
                                                    <label for="wizard-progress2-employment">Source of Income <span style="color:red;"> * </span></label>
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
                                </div></p>
                </div> 
            </div>
        </section>
        <!-- Portfolio Grid-->



    <div class="side-panel-cont">
  <div class="buttons-panel">
    <div class="buttons-list">
      <div class="single-button contact-us action action-contact">
        <div class="btn-ico"></div>
        <span class="btn-name"><a href="<?php echo base_url()?>contact">Contact us</a></span>
      </div>
      <div class="single-button live-chat action-chat action" id="accc">
        <div class="btn-ico"></div>
        <span class="btn-name">Live Chat</span>
      </div>
      <div class="single-button phone-call action-contact action">
        <div class="btn-ico"></div>
        <span class="btn-name">1-866-266-6480</span>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="viewmore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">How it Works</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="timeline"> 
  <div class="container2 left">
    <div class="content">
    <i>1</i>
      <h2><?php echo $setting_step_guide_1; ?></h2>
      
    </div>
  </div>
  <div class="container2 right">
    <div class="content y">
    <i>2</i>
      <h2><?php echo $setting_step_guide_2; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content b">
    <i>3</i>
      <h2><?php echo $setting_step_guide_3; ?></h2>
      
    </div>
  </div>
  <div class="container2 right">
    <div class="content g">
    <i>4</i>
      <h2><?php echo $setting_step_guide_4; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content y">
    <i>5</i>
      <h2><?php echo $setting_step_guide_5; ?></h2>
       
    </div>
  </div>
  <div class="container2 right">
    <div class="content b">
    <i>6</i>
      <h2><?php echo $setting_step_guide_6; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content g">
    <i>7</i>
      <h2><?php echo $setting_step_guide_7; ?></h2>
       
    </div>
  </div>
  <div class="container2 right">
    <div class="content ">
    <i>8</i>
      <h2><?php echo $setting_step_guide_8; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content b">
    <i>9</i>
      <h2><?php echo $setting_step_guide_9; ?></h2>
       
    </div>
  </div>
  <div class="container2 right">
    <div class="content g">
    <i>10</i>
      <h2><?php echo $setting_step_guide_10; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content ">
    <i>11</i>
      <h2><?php echo $setting_step_guide_11; ?></h2>
       
    </div>
  </div>
  <div class="container2 right">
    <div class="content y">
    <i>12</i>
      <h2><?php echo $setting_step_guide_12; ?></h2>
      
    </div>
  </div>
</div>
      </div>
       
    </div>
  </div>
</div>

<?php if($this->session->flashdata('email-not-verified')){?>
  <div  id="email_verification" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You are registered successfully.Please verify your account before login.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialoge_email_verification();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
  <?php } ?>

  <?php if($this->session->userdata('email-verified')){?>

   <div id="email_verification_modal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Your email has been verified successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;"  onclick="return emailVerifcation();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div><?php }?>
<!-- Modal Login -->

<div class="modal fade login" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="block block-themed block-fx-shadow mb-0 signim">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="block-header">
            <h3 style="color: #fff;" class="text-center block-title">Sign In</h3>
          </div>
          <div class="block-content">
            <div class="p-sm-3 px-lg-2 py-lg-2">
              <p>Welcome, please login.</p>
              <form id="loginForModal" onsubmit="return loginValidation(event);" class="js-validation-signin" action="<?php echo base_url();?>login_validation" method="POST" novalidate>
                <div class="alert alert-danger" id="loginError" style="display:none;"></div>
                <div class="py-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-alt form-control-lg" id="username" name="username" required placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-alt form-control-lg" id="password" name="password" required placeholder="Password" value="">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember" value="1">
                      <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 ">
                    <button type="submit" name="submit" class="btn btn-block btn-info "  id="loginSubmitButton" > <svg style="color: #fff;" class="svg-inline--fa fa-sign-in-alt fa-w-16 fa-fw mr-1" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="sign-in-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path>
                    </svg><!-- <i style="color: #fff;" class="fa fa-fw fa-sign-in-alt mr-1"></i> --> <span style="color: #fff;"> Sign In</span> </button>
                  </div>
                  <div class="col-md-12"> <a class=" font-size-sm" href="<?php echo base_url();?>sign-up">
                    <button type="button" name="submit" class="btn btn-block btn-info new-commiti" style="background: red!important;color: #ffffff !important;"> <svg style="color:#ffffff !important;" class="svg-inline--fa fa-sign-out-alt fa-w-16 fa-fw mr-1" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                    </svg><!-- <i style="color: #fff;" class="fa fa-fw fa-sign-out-alt mr-1"></i> --> <span style="background: red;color: #ffffff !important;"> New To Committi </span> </button>
                    </a></div>
                  <a class=" font-size-sm" href="<?php echo base_url();?>sign-up"> </a></div>
                <a class=" font-size-sm" href="<?php echo base_url();?>sign-up"> </a>
                <div class="form-group row"><a class=" font-size-sm" href="<?php echo base_url();?>sign-up"> </a>
                  <div class="col-md-6 "><a class=" font-size-sm" href="<?php echo base_url();?>sign-up"> </a><a style="color: #000;" class="btn-block-option font-size-sm" href="<?php echo base_url();?>forgot-username">Forgot Username?</a> </div>
                  <div class="col-md-6"> <a style="color: #000;" class="btn-block-option font-size-sm" href="<?php echo base_url();?>forgot-password">Forgot Password?</a> </div>
                </div>
              </form>
              <!-- END Sign In Form --> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Login Box End -->

        <!-- Pop In Block Modal -->
        <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
            <div class="modal-dialog newsletter modal-dialog-popin" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                             
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                        <!-- Begin Mailchimp Signup Form -->
                        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                        <style type="text/css">
                          #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                          /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                             We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                        </style>
                        <div id="mc_embed_signup">
                        <form action="https://committi.us7.list-manage.com/subscribe/post?u=1e22a1b105cdaa09f20f9d2a4&amp;id=f9b09c3bd3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                          <h2>Subscribe</h2>
                        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                        <div class="mc-field-group">
                          <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                        </label>
                          <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>
                        <div class="mc-field-group">
                          <label for="mce-FNAME">First Name </label>
                          <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                        </div>
                        <div class="mc-field-group">
                          <label for="mce-LNAME">Last Name </label>
                          <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                        </div>
       <!--                  <div class="mc-field-group size1of2">
                          <label for="mce-BIRTHDAY-month">Birthday </label>
                          <div class="datefield">
                            <span class="subfield monthfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="MM" size="2" maxlength="2" name="BIRTHDAY[month]" id="mce-BIRTHDAY-month"></span> / 
                            <span class="subfield dayfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="DD" size="2" maxlength="2" name="BIRTHDAY[day]" id="mce-BIRTHDAY-day"></span> 
                            <span class="small-meta nowrap">( mm / dd )</span>
                          </div>
                        </div>   -->
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                          </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_1e22a1b105cdaa09f20f9d2a4_f9b09c3bd3" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                            </div>
                        </form>
                        </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
        <!-- END Pop In Block Modal -->

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
            <div class="row text-left">
                    <div class="col-md-4 b-bottom"> 
                        <div class="f-logo">
                        <!--  <img src="<?php //echo base_url();?>assets/img/Committi-Logo2.png"> -->
                        </div>
                       <!--  <p class="text-muted">Smart Borrowings....Great Investment</p>-->
                        <h4 class="my-3">Committi inc.</h4>
                        <ul>
                            <li>200E - 141 Brunel Road,</li>
                            <li>Mississauga, ON L4Z 1X3,</li>
              <li>CANADA</li>
                            <li>Phone: 1-866-266-6480</li>
                            <li>Email: info@committi.com</li> 
                        </ul>
                        <h4 class="my-3">Our Newsletter</h4>
              <!-- <p class="newsletter1"><b>Click Here</p></b> -->
              <button style="height: 25px;width: 96px;padding: 0px;" type="button" class="btn btn-sm btn-primary push " data-toggle="modal" data-target="#modal-block-popin"><span style="text-transform: capitalize;">Click Here</span></button>
              <p>Join Our Newsletter for new offers and updates</p>
                          
           </div> 
                     <div class="col-md-4  ">
                     &nbsp;
                     </div>
                    <div class="col-md-4 f-right b-bottom"> 
                        <h4 class="my-3">Usefull Links</h4>
                        <ul class="half-w">
                            <li><a href="<?php echo base_url();?>about">About us</a></li>
                            <li><a href="<?php echo base_url();?>ourplans">Our Plans</a></li>
                            <li><a href="<?php echo base_url();?>faq">FAQ's</a></li>
                            <li><a href="<?php echo base_url();?>investing">investing</a></li> 
                            <li><a href="<?php echo base_url();?>contact">Contact us</a></li> 

                        </ul>
                         <ul class="half-w">
                            <li><a href=" " data-toggle="modal" data-target="#viewmore">How it works</a></li>
                            <li><a href="<?php echo base_url();?>terms-conditions">Terms and conditions</a></li>
                            <li><a href="<?php echo base_url();?>privacy">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url();?>disclaimer">Legal Disclaimer</a></li>
                            <li><a href="<?php echo base_url();?>newsrelease">News Release</a></li> 
                        </ul>
                    </div>
                    
                     
                </div> 
                <div class="row align-items-center copyrt">
                <div class="col-lg-4 text-center"> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div class="col-lg-4 text-center">Committi inc, © 2021 Copyrights </div>
                    <div class="col-lg-4 text-center"><div class="social-mediaw">
                    <li><a href="#" class="fa-facebook"></a> </li> 
                    <li><a href="#" class="fa-twitter"></a> </li> 
                    <li><a href="#" class="fa-linkedin"></a> </li> 
                    <li><a href="#" class="fa-instagram"></a> </li> 
                    </div></div> 
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Modal 1-->




<!-- Page JS Code -->


<script src="<?php echo base_url(); ?>assets/js/oneui.core.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/oneui.app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/op_auth_signup.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick.min.js"></script>
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
          var user_email=$('#email').val();
          var confirm_email=$('#confrim_email').val();

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

$('#email').blur(function() {

    var email = $('#email').val();

    var confirmEmail =$('#confrim_email').val();

    if(email != confirmEmail)
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


