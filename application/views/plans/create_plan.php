<?php 
$tier                           = $this->config->item('tier');
$bidding_cycle                  = $this->config->item('bidding_cycle');
$status                         = $this->config->item('status');
$no_of_bidding_cycle            = $this->config->item('no_of_bidding_cycle');
$plan_sequence                  = $this->config->item('plan_sequence');
if(isset($rights)){
  $edit_right=$rights[0]['edit_right'];
  $all_rights=$rights[0]['all_rights'];
}
else{
    $edit_right="";
    $all_rights="";
}
?>
<!-- To avoid the multiple entries into the database -->
<?php  $_SESSION['create_plan_token']=md5(session_id() . time());?>
<!-- Main Container -->
<style type="text/css">
    .font_size{
        font-size: 10px;
        font-weight:600;
    }
</style>
            <main id="main-container">

                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo  base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Plans</li>
                                    <li class="breadcrumb-item">Create Plan</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content-full">

                    <!-- User Profile -->

                    <div class="block">

                        <div class="block-header">

                            <h3 class="block-title">Plan Details</h3>
                            

                        </div>

                        <div class="block-content">
                            <?php if($this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <div class="flex-00-auto">
                                        <i class="fa fa-fw fa-times"></i>
                                    </div>
                                    <div class="flex-fill ml-3">
                                        <p class="mb-0"><?php echo $this->session->flashdata('error'); ?></p>
                                    </div>
                                </div>
                            <?php }else if($this->session->flashdata('success')){ ?>
                                      <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Plan created successfully </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> 

                            <?php } ?>

                            <form id="myForm" action="<?php base_url()?>create-plan" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="hidden_plan_sequence_value" id="hidden_plan_sequence_value" value="">
                            <input type="hidden" name="hidden_plan_sequence_column" id="hidden_plan_sequence_column" value="">
                            <input type="hidden" name="hidden_sequence_100" id="hidden_sequence_100" value="">
                            <input type="hidden" name="hidden_sequence_1000" id="hidden_sequence_1000" value="">
                            <input type="hidden" name="hidden_plan_amount_series" id="hidden_plan_amount_series" value="">
                            <input type="hidden" name="create_plan_token" id="create_plan_token" value="<?php echo $_SESSION['create_plan_token'] ?>">

                            <div class="row mb-3">   <!---Row 1 ---> 
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-username">Plan Name Sequence <span style="color:red">* </span></label>

                                            <select  class="form-control" id="plan_name_sequence" name="plan_name_sequence" onchange="get_plan_sequence();">
                                            <option value="">Please Select</option>

                                             <?php
                                                // Iterating through the tier array
                                             if($plan_sequence_number)
                                             {
                                                foreach($plan_sequence_number as $number){
                                                ?>
                                                <option value="<?php  echo strtolower($number->plan_name_sequence_id);?>" >
                                                <?php echo $number->plan_name_sequence_number;?>
                                                </option>
                                                <?php
                                                } }
                                            ?>
                                            </select>
                                            <!-- <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_plan_status" role="alert"></p> -->
                                    </div>
                                        <div class="col-md-6">
                                        <label for="one-profile-edit-name">Plan Name <span style="color:red">* </span></label>

                                            <input type="text" class="form-control" id="plan_name" name="plan_name" placeholder="" value="" autocomplete="off" style="text-transform: capitalize;">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_plan_name" role="alert"></p>
                                        
                                    </div>


                                </div>


                             <div class="row mb-3">   <!---Row 1 ---> 
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-username">Plan Status <span style="color:red">* </span></label>

                                            <select  class="form-control" id="plan_status" name="plan_status" >
                                             <?php
                                                // Iterating through the tier array
                                                foreach($status as $key =>$item){
                                                ?>
                                                <option value="<?php  echo strtolower($key);?>" >
                                                <?php echo $item;?>
                                                </option>
                                                <?php
                                                }
                                            ?>
                                            </select>
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_plan_status" role="alert"></p>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="one-profile-edit-email">Enrolment Start Date <span style="color:red">* </span></label>

                                            <input type="text" class="js-flatpickr form-control bg-white" id="start_date" name="start_date"  value="" >
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_start_date" role="alert"></p>
                                    </div>
                                    
                                </div>
                                <div class="row mb-3">   <!---Row 2 ---> 
                                   
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-email">Estimated Enrolment End Date <span style="color:red">* </span></label>

                                            <input type="text" class="js-flatpickr form-control bg-white" id="end_date" name="end_date" value=""  onchange="end_date_check();">
                                            <input type="hidden" name="hidden_end_date" id="hidden_end_date" value="" >
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_end_date" role="alert"></p>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="one-profile-edit-email">Estimated Bidding Start Date <span style="color:red">* </span></label>

                                            <input type="text" class="js-flatpickr form-control bg-white" id="bidding_start_date" name="bidding_start_date" disabled="disabled" >
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_bidding_start_date" role="alert"></p>
                                    </div>
                                </div>
                                <div class="row mb-3">   <!---Row 3 ---> 
                                    
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Bidding Decrement (%) <span style="color:red">* </span></label>

                                            <input type="text" class="form-control" id="bidding_decrement" name="bidding_decrement"  value="" onkeypress="return isNumber(event)" autocomplete="off" onchange="return autoFormatDecimal('bidding_decrement')">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_bidding_decrement" role="alert"></p>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="one-profile-edit-name">Maximum Bidding Discount (%) <span style="color:red">* </span></label>

                                            <input type="text" class="format_input_field_create_plan form-control" id="bidding_threshold" name="bidding_threshold"  value="" onkeypress="return isNumber(event)" autocomplete="off" maxlength="4" onchange="return autoFormatDecimal('bidding_threshold')" onkeyup="insert_value_in_bidding_start_amount();">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_bidding_threshold" role="alert"></p>
                                    </div>
                                </div>
                                <div class="row mb-3">   <!---Row 4 ---> 
                                   
                                    <div class="col-md-6">
                                     <label for="one-profile-edit-name">Regular Late Fee ($) <span style="color:red">* </span></label>

                                            <input type="text" class="form-control currency_format" id="bidding_late_fee" name="bidding_late_fee"  value="" autocomplete="off" onkeypress="return isNumber(event)">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_bidding_late_fee" role="alert"></p>
                                    </div>
                                        <div class="col-md-6">
                                        <label for="one-profile-edit-name">Interest On Late Payment (%) <span style="color:red">* </span></label>

                                            <input type="text" class="form-control" id="ineterest_on_late_payment" name="ineterest_on_late_payment" value="" onkeypress="return isNumber(event)" autocomplete="off" maxlength="5">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_interest" role="alert"></p>
                                    </div>

                                </div>
                         
                                <div class="row mb-3">   <!---Row 6 ---> 
                                    
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Bidding Cycle <span style="color:red">* </span></label>

                                             <select class="form-control" id="bidding_cycle" name="bidding_cycle" >
                                             <?php
                                                // Iterating through the tier array
                                                foreach($bidding_cycle as $key =>$item){
                                                ?>
                                                <option value="<?php  echo strtolower($key);?>" >
                                                <?php echo $item;?>
                                                </option>
                                                <?php
                                                }
                                            ?>
                                            </select>
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_bidding_cycle" role="alert"></p>
                                    </div>
                                        <div class="col-md-6">
                                        <label for="one-profile-edit-name">Total No Of Approved Members  <span style="color:red">* </span></label>

                                            <input type="text" class="form-control" id="total_no_appliactions" name="total_no_appliactions" value="" onkeyup="insert_value_in_cycle();insert_value_in_bidding_start_amount();" autocomplete="off"  onkeypress="return isNumber(event)">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_total_application" role="alert"></p>
                                    </div>
                                </div>
                                <div class="row mb-3">   <!---Row 7 ---> 
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">No of Bidding Cycle</label>

                                            <input type="text" class="form-control" id="no_of_bidding_cycle" name="no_of_bidding_cycle"  value="" readonly="readonly" onkeypress="return isNumber(event)">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_no_bidding_cycle" role="alert"></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Bidding Cycle Maximum Amount Per Member ($) <span style="color:red">* </span></label>
                                            <input type="text" class="form-control currency_format" id="bidding_amount_per_memeber" name="bidding_amount_per_memeber" value=""  onkeyup="insert_value_in_bidding_start_amount();" autocomplete="off">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_amount_per_member" role="alert"></p>
                                    </div>
                                </div>
                                <div class="row mb-3">   <!---Row 8 ---> 
                                    
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Bidding Start Amount ($) </label>

                                            <input type="text" class="form-control currency_format" id="bidding_start_amount" name="bidding_start_amount"  value=""  readonly="readonly" autocomplete="off">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_bidding_start_amount" role="alert"></p>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="one-profile-edit-email">Plan Description <span style="color:red">* </span></label>

                                            <textarea type="text" class="form-control" id="plan_descriptions" name="plan_description"   > 
                                            </textarea>



                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_plan_description" role="alert"></p>
                                    </div>
                    
                                </div>
                                <div class="row mb-3">   <!---Row 5 ---> 
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Win Bid Amount</label>

                                            <input type="text" class="form-control currency_format" id="min_win_bid_amount" name="min_win_bid_amount"  autocomplete="off" value="" onkeypress="return isNumber(event)" readonly="readonly">

                                            <input type="hidden" id="hidden_win_amount" name="hidden_win_amount" value="">


                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_winning_bid_amount" role="alert"></p>
                                    </div>
                                </div>      

                                <div class="row mb-3">   <!---Row 6 ---> 
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Schedule</label><br>
                                             <button style="color: #fff;" type="button" name="cal" id="cal"  class=" btn  btn-info" onclick="calculate_schedule();" data-toggle="modal" data-target="#calaculate_bidding_schedule_modal" <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){ echo ''; } else { echo 'disabled'; }?>>
                                                 Calculate  Schedule
                                            </button>
                                    </div>
                                </div>

                                <br><h3 class="block-title">Tier Details</h3><br>

                                <div class="row mb-3">   <!---Row 10 ---> 
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Tier 1 Members <span style="color:red">* </span></label>
                                        <select  class="form-control" id="tier_1_select" name="tier_1_select" onchange="addtier1Val();" >
                                            <option value="" >Please Select</option>
                  
                                        </select>
                                            
                                    </div>
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Tier 2 Members <span style="color:red">* </span></label>
                                        <select  class="form-control" id="tier_2_select" name="tier_2_select" onchange="addtier2Val();">
                                            <option value="" >Please Select</option>
                                             
                                        </select>
                                    </div>
                    
                                </div>

                                <div class="row mb-3">   <!---Row 10 ---> 
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Tier 3 Members <span style="color:red">* </span></label>
                                        <select  class="form-control" id="tier_3_select" name="tier_3_select" onchange="addtier3Val();">
                                             <option value="" >Please Select</option>
                                        </select>
                                            
                                    </div>
                                    <div class="col-md-6">
                                        <label for="one-profile-edit-name">Tier 4 Members <span style="color:red">* </span></label>
                                        <select  class="form-control" id="tier_4_select" name="tier_4_select" onchange="addtier4Val();" >
                                             <option value="" >Please Select</option>
                                        </select>
                                    </div>
                    
                                </div>


                                <div class="row mb-3">   <!---Row 9 ---> 
                                    <div class="col-md-6">
                                        <button style="color: #fff;" type="submit" name="submit" id="submit"  class="btn  btn-info create_plan_submit_button" onclick="validate();" <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){ echo ''; } else { echo 'disabled'; }?>>
                                            <i style="color: #fff;" class="fa fa-plus mr-1"></i> Create Plan
                                            </button>
                                    </div>
                                </div>

                            </form>

                            <!-- Pop Out Block Modal -->
                            <div class="modal fade" id="calaculate_bidding_schedule_modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-popout " role="document">
                                    <div class="modal-content">
                                        <div class="block block-themed block-transparent mb-0">
                                            <div class="block-header bg-primary-dark">
                                                <h3 class="block-title">Bidding Schedule</h3>
                                                <div class="block-options">
                                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                        <i class="fa fa-fw fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content font-size-sm">
                                                <table id="biddingSchedule" class="table table-hover table-vcenter">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width: 50%;">Bidding Cycle</th>
                                                        <th class="text-center" style="width: 50%;">Bidding Start Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody >
                                                    
                                                </tbody>
                                            </table>
                                            </div>
                                            <div class="block-content block-content-full text-right border-top">
                                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-sm btn-info" data-dismiss="modal"><i class="fa fa-check mr-1"></i>Ok</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Pop Out Block Modal -->
                        </div>
                    </div>

                    <!-- END User Profile -->

                </div>

                <!-- END Page Content -->

            </main>

            <!-- END Main Container -->
<script type="text/javascript">
function close_dialog()
{
    $('#main_dialog_box').css('display','none');
}
function insert_value_in_cycle()
{
    var TotalNoApplications = $('#total_no_appliactions').val();
    $('#no_of_bidding_cycle').val(TotalNoApplications);
}


function end_date_check()
{
     var end_date = $("#end_date").val();
    $("#hidden_end_date").val(end_date);
    bidding_start_date1();
}

function bidding_start_date1()
{
    $('#bidding_start_date').removeAttr("disabled"); 
    var enrollment_end_date= $("#hidden_end_date").val();
    console.log(enrollment_end_date);

    $("#bidding_start_date").flatpickr({
       disable: ["2020-12-30", "2020-12-31", "2020-12-29" ],

       dateFormat: "m/d/Y H:i",
       minDate: enrollment_end_date,
       enableTime: true,

    });
}

function validate()
{   
    // PLAN STATUS
    var selectedOption  = $('#plan_status').find(":selected").val();

    if(selectedOption == '1')
    {
        $('#error_plan_status').css("display", "");
        $('#error_plan_status').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_plan_status').css("display", "none");
    }

    // PLAN NAME 
    var planName  = $.trim($('#plan_name').val());
    if(planName == '')
    {
        $('#error_plan_name').css("display", "");
        $('#error_plan_name').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_plan_name').css("display", "none");
    }

    // ENROLlMENT START DATE  
    var enrollmentStartDate  = $('#start_date').val();
    if(enrollmentStartDate == '')
    {
        $('#error_start_date').css("display", "");
        $('#error_start_date').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_start_date').css("display", "none");
    }

    // ENROLlMENT END DATE  
    var enrollmentEndDate  = $('#end_date').val();
    if(enrollmentEndDate == '')
    {
        $('#error_end_date').css("display", "");
        $('#error_end_date').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_end_date').css("display", "none");
    }

    // BIDDING START DATE  
    var bidingStartDate  = $('#bidding_start_date').val();
    if(bidingStartDate == '')
    {
        $('#error_bidding_start_date').css("display", "");
        $('#error_bidding_start_date').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_bidding_start_date').css("display", "none");
    }

    // NO OF BIDDING CYCLE  
    var noOfBddingCycle  = $.trim($('#no_of_bidding_cycle').val());
    if(noOfBddingCycle == '')
    {
        $('#error_no_bidding_cycle').css("display", "");
        $('#error_no_bidding_cycle').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_no_bidding_cycle').css("display", "none");
    }

    // NO OF BIDDING CYCLE  
    var biddingCycle  = $('#bidding_cycle').val();
    if(biddingCycle == '1')
    {
        $('#error_bidding_cycle').css("display", "");
        $('#error_bidding_cycle').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_bidding_cycle').css("display", "none");
    }

    // BIDDING START AMOUNT  
    var biddingStartAmount  = $.trim($('#bidding_start_amount').val());
    if(biddingStartAmount == '')
    {
        $('#error_bidding_start_amount').css("display", "");
        $('#error_bidding_start_amount').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_bidding_start_amount').css("display", "none");
    }

    // BIDDING DECREMENT  
    var biddingDecrement  = $.trim($('#bidding_decrement').val());
    if(biddingDecrement == '')
    {
        $('#error_bidding_decrement').css("display", "");
        $('#error_bidding_decrement').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_bidding_decrement').css("display", "none");
    }

    // BIDDING THRESHOLD  
    var biddingThreshold  = $.trim($('#bidding_threshold').val());
    if(biddingThreshold == '')
    {
        $('#error_bidding_threshold').css("display", "");
        $('#error_bidding_threshold').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_bidding_threshold').css("display", "none");
    }

    // BIDDING LATE FEE  
    var lateFee  = $.trim($('#bidding_late_fee').val());
    if(lateFee == '')
    {
        $('#error_bidding_late_fee').css("display", "");
        $('#error_bidding_late_fee').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_bidding_late_fee').css("display", "none");
    }

    // BIDDING LATE FEE  INTEREST 
    var lateFeeInterest  = $.trim($('#ineterest_on_late_payment').val());
    if(lateFeeInterest == '')
    {
        $('#error_interest').css("display", "");
        $('#error_interest').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_interest').css("display", "none");
    }

    // TOTAL NO OF APPLICATIONS 
    var totalNoOfApplication  = $.trim($('#total_no_appliactions').val());
    if(totalNoOfApplication == '')
    {
        $('#error_total_application').css("display", "");
        $('#error_total_application').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_total_application').css("display", "none");
    }

    // PLAN DESCRIPTION 
    var planDescription  = $.trim($('#plan_descriptions').val());

    if(planDescription == '')
    {

        $('#error_plan_description').css("display", "block");
        $('#error_plan_description').text('Required*')
        event.preventDefault();

    }
    else
    {
        $('#error_plan_description').css("display", "none");
    }

    // TOTAL NO OF APPLICATIONS 
    var biddingAmountPerUser  = $.trim($('#bidding_amount_per_memeber').val());

    if((biddingAmountPerUser == '') || (biddingAmountPerUser == '0.00'))
    {
        $('#error_amount_per_member').css("display", "");
        $('#error_amount_per_member').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_amount_per_member').css("display", "none");
    }

    // BIDDING START AMOUNT  
    var winBidAmount  = $.trim($('#min_win_bid_amount').val());

    if(winBidAmount == '')
    {
        $('#error_winning_bid_amount').css("display", "");
        $('#error_winning_bid_amount').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_winning_bid_amount').css("display", "none");
    }


}

function calculate_schedule()
{
    var bidding_start_date                  = $('#bidding_start_date').val();
    var TotalNoApplications                 = $('#total_no_appliactions').val();
    var BiddingCycleCount                   = $('#bidding_cycle').val();

      $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."Admin/calaculate_bidding_schedule";?>',
      data: {'bidding_start_date':bidding_start_date,'TotalNoApplications':TotalNoApplications,'BiddingCycleCount':BiddingCycleCount},
      success: function(response){

       var data = JSON.parse(response);

       if(response != '')
       {
            $("#biddingSchedule > tbody").html("");

            var count =1;
           $.each(data, function(index, value) {
                var counter  = count++;

                var result =   value.date.split('-');
                var results =result[2].split(' ');

                var newDate = result[1]+'/'+results[0]+'/'+result[0]+' '+results[1];


                var tr= '<tr><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm">'+newDate+'</td></tr>';

                $('#biddingSchedule tbody').append(tr);


            });
       }
       else
       {

       }
       
        
      }
    }); 
}

function insert_value_in_bidding_start_amount(){
    var BiddingAmountperMember  =  $('#bidding_amount_per_memeber').val().replace(',','').replace('$','');
    var TotalNoApplications     = $('#total_no_appliactions').val();
    if(TotalNoApplications!=''){
    var BiddingStartAmount =  (BiddingAmountperMember * TotalNoApplications).toFixed(2);
    var BiddingStartAmount_1= '$'+formatToCurrency(BiddingStartAmount);
    $('#bidding_start_amount').val(BiddingStartAmount_1);
    var thresholdPercent = $('#bidding_threshold').val();
    var newStartAmt= (thresholdPercent/100)*BiddingStartAmount;
    var startAmt    =(BiddingStartAmount - newStartAmt).toFixed(2);
        startAmt    ='$'+formatToCurrency(startAmt);
    $('#min_win_bid_amount').val(startAmt);
 }
}

// function bidding_cycle_2_decimal(value){
// var Value = value;
// var newvalue = parseFloat(Value);
//     if(newvalue == 'NaN')
//     {
//         $('#bidding_amount_per_memeber').val('0.00');
//     }
//     else{
//         var bid_per_per_amt=formatToCurrency(Value);
//         $('#bidding_amount_per_memeber').val(bid_per_per_amt);
//     }
// }

function addtier1Val()
{
    var tier1selectedVal = $('#tier_1_select').find(":selected").val();

    var totalNo =  $('#total_no_appliactions').val();

    var tier2Val = totalNo - tier1selectedVal;


    var oneToHundredArray=[];
     for(var value = 1; value <= tier2Val; value++) {
        oneToHundredArray.push(value);
    }

    for(var index = 0; index < oneToHundredArray.length; index++) {
        console.log(oneToHundredArray[index]);

    var output = [];
    output.push('<option value="">Please Select</option>');
    $.each(oneToHundredArray, function(key, value)
    { 
      output.push('<option value="'+ value +'">'+ value +'</option>');
    });

    $('#tier_2_select').html(output.join(''));

    }
    $('#tier_3_select').empty();
    $('#tier_4_select').empty();

    var tier2Value = $('#tier_2_select').val();
    var tier3Value = $('#tier_3_select').val();
    var tier4Value = $('#tier_4_select').val();

    if($.trim(tier2Value) == '' || tier3Value == null || tier4Value == null)
    {
        $('#submit').prop("disabled", true);
    }
    else
    {
        $('#submit').prop("disabled", false);

    }

}

function addtier2Val()
{
    var tier1selectedVal = $('#tier_1_select').find(":selected").val();
    var tier2selectedVal = $('#tier_2_select').find(":selected").val();
    var totaltIer = parseFloat(tier1selectedVal)+parseFloat(tier2selectedVal);


    var totalNo =  $('#total_no_appliactions').val();

    var tier3Val = totalNo - totaltIer;

    var oneToHundredArray=[];
     for(var value = 1; value <= tier3Val; value++) {
        oneToHundredArray.push(value);
    }

    for(var index = 0; index < oneToHundredArray.length; index++) {
        console.log(oneToHundredArray[index]);

    var output = [];
    output.push('<option value="">Please Select</option>');
    $.each(oneToHundredArray, function(key, value)
    { 
      output.push('<option value="'+ value +'">'+ value +'</option>');
    });

    $('#tier_3_select').html(output.join(''));


    }
    $('#tier_4_select').empty();



    var tier1Value = $('#tier_1_select').val();
    var tier3Value = $('#tier_3_select').val();
    var tier4Value = $('#tier_4_select').val();

    if($.trim(tier1Value) == null || tier3Value == '' || tier4Value == null)
    {
        $('#submit').prop("disabled", true);
    }
    else
    {
        $('#submit').prop("disabled", false);

    }





}

function addtier3Val()
{
    var tier1selectedVal = $('#tier_1_select').find(":selected").val();
    var tier2selectedVal = $('#tier_2_select').find(":selected").val();
    var tier3selectedVal = $('#tier_3_select').find(":selected").val();
    var totaltIer = parseFloat(tier1selectedVal)+parseFloat(tier2selectedVal)+parseFloat(tier3selectedVal);


    var totalNo =  $('#total_no_appliactions').val();

    var tier4Val = totalNo - totaltIer;

    var oneToHundredArray=[];
     for(var value = 1; value <= tier4Val; value++) {
        oneToHundredArray.push(value);
    }

    for(var index = 0; index < oneToHundredArray.length; index++) {
        console.log(oneToHundredArray[index]);

    var output = [];
    output.push('<option value="">Please Select</option>');
    output.push('<option value="'+tier4Val+'">'+tier4Val+'</option>');
    // $.each(oneToHundredArray, function(key, value)
    // { 
    //   output.push('<option value="'+ value +'">'+ value +'</option>');
    // });

    $('#tier_4_select').html(output.join(''));

    }




    var tier1Value = $('#tier_1_select').val();
    var tier2Value = $('#tier_2_select').val();
    var tier4Value = $('#tier_4_select').val();



    if($.trim(tier1Value) == null || tier4Value == '' || tier2Value == null || tier4Value == null)
    {
        $('#submit').prop("disabled", true);
    }
    else
    {
        $('#submit').prop("disabled", false);

    }




}

function addtier4Val()
{
    var tier1Value = $('#tier_1_select').val();
    var tier2Value = $('#tier_2_select').val();
    var tier3Value = $('#tier_3_select').val();
    var tier4Value = $('#tier_4_select').val();


    if($.trim(tier1Value) == '' || tier4Value == '' || tier2Value == ''|| tier3Value == '')
    {
        $('#submit').prop("disabled", true);
    }
    else
    {
        $('#submit').prop("disabled", false);
    }
}

// function get_plan_sequence()
// {
//     var plan_seqence_id                  = $('#plan_name_sequence').val();
//     var plan_sequence_value              = $('#plan_name_sequence option:selected').text();
//     var selectedPlan                     = $('#plan_name_sequence').find(":selected").text();

//     var start_seq= '00000';

//     var middle_seq=  parseFloat(selectedPlan);

//     // alert(middle_seq.length);
//     var midLength  = middle_seq.toString().length;

//     if(midLength == 3)
//     {
//         var plan_amount_series = '00'+middle_seq;
//     }
//     else if(midLength == 4)
//     {
//         var plan_amount_series = '0'+middle_seq;
//     }


//     $('#hidden_plan_amount_series').val(plan_amount_series);

//     if($.trim(plan_seqence_id) != '')
//     {

//         $.ajax({
//           type: 'POST',
//           url: '<?php echo base_url()."Plans/get_plan_sequence_ajax";?>',
//           data: {'plan_seqence_id':plan_seqence_id},
//           success: function(response){
//            var data = JSON.parse(response);

//            if(response != '')
//            {
//             $('#hidden_sequence_100').val(data.plan_sequence_100);
//             $('#hidden_sequence_1000').val(data.plan_sequence_1000);


//             if(plan_seqence_id == '1')
//             {  
//                  var sequencE= data.plan_sequence_100;
//             }
//             if(plan_seqence_id == '2')
//             {  
//                  var sequencE= data.plan_sequence_1000;
//             }
//              // alert(sequencE);
//              $('#plan_name').val('Plan '+plan_amount_series+'-'+sequencE);


               
//            }
//           }
//         });
//     }
    
// }
function get_plan_sequence()
{
    var plan_seqence_id                  = $('#plan_name_sequence').val();
    var plan_sequence_value               = $('#plan_name_sequence option:selected').text();
    var selectedPlan                     = $('#plan_name_sequence').find(":selected").text();

    // console.log($.trim(selectedPlan));
    var plan_sequence='plan_sequence_'+selectedPlan;
    var plan_sequence_column=plan_sequence.replace(/\s/g, '');
    var start_seq= '00000';

    var middle_seq=  parseFloat(selectedPlan);

    // alert(middle_seq.length);
    var midLength  = middle_seq.toString().length;

    if(midLength == 3)
    {
        var plan_amount_series = '00'+middle_seq;
    }
    else if(midLength == 4)
    {
        var plan_amount_series = '0'+middle_seq;
    }    
    else
    {
        var plan_amount_series = middle_seq;

    }


    var middle_seqFormat = '$'+formatToCurrency(middle_seq);
    $('#bidding_amount_per_memeber').val(middle_seqFormat);
    $('#total_no_appliactions').val('');
    $('#bidding_cycle').val('1');
    $('#no_of_bidding_cycle').val('');
    $('#min_win_bid_amount').val('');
    $('#bidding_start_amount').val('');

    $('#hidden_plan_amount_series').val(plan_amount_series);

    if($.trim(plan_seqence_id) != '')
    {

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Plans/get_plan_sequence_ajax";?>',
          data: {'plan_seqence_id':plan_seqence_id},
          success: function(response){
      
           var data = JSON.parse(response);

           if(response != '')
           {
            $('#hidden_sequence_100').val(data.plan_sequence_100);
            $('#hidden_sequence_1000').val(data.plan_sequence_1000);
            $.each(data,function(index,value){
            // console.log(value);
            // console.log (index); 
            if(index==plan_sequence_column){
                var sequencE=value;
                $('#hidden_plan_sequence_value').val(sequencE);
                $('#hidden_plan_sequence_column').val(index);
                $('#plan_name').val('Plan '+plan_amount_series+'-'+sequencE);
            }
            });
           }
          }
        });
    }
    
}

function autoFormatDecimal(id){
    
 var value_data = $('#'+id).val();
  if(value_data!= '')
  {
   $('#'+id).val((parseFloat(value_data)).toFixed(2));

   var formatAmount = (parseFloat(value_data)).toFixed(2);

  $('#'+id).val(formatAmount);

  }
  else
  {
  $('#'+id).val('');
  }

}



</script>