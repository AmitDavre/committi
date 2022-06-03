<?php 
$tier                           = $this->config->item('tier');
$bidding_cycle                  = $this->config->item('bidding_cycle');
$status                         = $this->config->item('status');
$no_of_bidding_cycle            = $this->config->item('no_of_bidding_cycle');
?>
<!-- Main Container -->
<style type="text/css">
.font_size {
    font-size: 10px;
    font-weight: 600;
}
.nav-tabs-block .nav-link:focus,
.nav-tabs-block .nav-link:hover {
    color: #120d34 !important;
    background-color: #f9f9f9;
    border-color: transparent;
}
.page-item.active .page-link {
    z-index: 3;
    color: #110d35 !important;
    background-color: #f9f9f9;
    border-color: #110d35 !important;
}
</style>
<main id="main-container">

    <!-- Hero -->
    <div class="content ">
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>view-plans">View
                        Plans</a></li>
                <li class="breadcrumb-item" style="text-transform: capitalize;">
                    <?php echo $PlanDetails['0']['plan_name'];?></li>
            </ol>
        </nav>
    </div>

    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content content-full">

        <!-- User Profile -->

        <div class="block">
         <div id="error_message"></div>
          <div id="success_message"></div>
           <div id="confirmation_message"></div>



            <div class="block-content">
                <ul class="nav nav-tabs nav-tabs-block " data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tabs_1" href="#btabs-animated-fade-home"
                            onclick="return hideUsersTabs();">Plan Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tabs_2" href="#btabs-animated-fade-approved-users"
                            onclick="return showUserTabs();" id="users-tab" data-toggle="user_approved_table_tab_1">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="tabs_3" href="#btabs-animated-fade-bidding-cycle"
                            onclick="return hideUsersTabs();" data-toggle="bidding_cycle_table_tab">Bidding Cycle Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "id="tabs_4"  href="#btabs-animated-fade-tier-details"
                            onclick="return hideUsersTabs();" data-toggle="tier_details_table_tab">Tier Details</a>
                    </li>


                </ul>
                <ul class="nav nav-tabs nav-tabs-block " data-toggle="tabs" role="tablist" style="display:none;"
                    id="usersTabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="aprroved_table" href="#btabs-animated-fade-approved-users" data-toggle="user_approved_table_tab">Approved Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#btabs-animated-fade-rejected-users" data-toggle="user_rejected_table_tab">Rejected Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#btabs-animated-fade-restricted-users" data-toggle="user_restrited_table_tab">Restricted Users</a>
                    </li>
                </ul>
                <div class="block-content tab-content overflow-hidden">
                    <div class="tab-pane fade active show" id="btabs-animated-fade-home" role="tabpanel">
                         <input type="hidden" class="form-control" id="tier_plan_id" name="tier_plan_id" 
                                                 value="<?php echo $PlanDetails['0']['id'];?>">
                         <input type="hidden" class="form-control" id="hidden_bidding_start_amount" name="hidden_bidding_start_amount" 
                                                 value="<?php echo $PlanDetails['0']['bidding_start_amount'];?>">


                        <div class="row mb-3">
                            <!---Row 1 --->
                            <div class="col-md-6">
                                <label for="one-profile-edit-username">Plan Status</label>

                                <select class="form-control" id="plan_status" name="plan_status" disabled="disabled">
                                    <?php foreach($status as $key => $item){?>
                                    <option value="<?php  echo strtolower($key);?>"
                                        <?php echo (strtolower($key) ==  $PlanDetails['0']['plan_status']) ? 'selected' : '' ?>>
                                        <?php echo $item;?>
                                    </option>
                                    <?php }?>
                                </select>
                                <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;"
                                    class="font_size form-group alert alert-danger" id="error_plan_status" role="alert">
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label for="one-profile-edit-name">Plan Name</label>
                                <input type="text" class="form-control" id="plan_name" name="plan_name" placeholder=""
                                    value="<?php echo $PlanDetails['0']['plan_name'];?>" disabled="disabled">

                            </div>

                        </div>
                        <div class="row mb-3">
                            <!---Row 2 --->
                            <div class="col-md-6">
                                <label for="one-profile-edit-email">Enrolment Start Date</label>

                                <input type="text" class=" form-control " id="start_date" name="start_date"
                                    value="<?php echo date('m/d/Y H:i', strtotime($PlanDetails['0']['enrollment_start_date']));?>"
                                    disabled="disabled">
                            </div>
                            <div class="col-md-6">
                                <label for="one-profile-edit-email">Estimated Enrolment End Date</label>

                                <input type="text" class=" form-control " id="end_date" name="end_date"
                                    value="<?php echo date('m/d/Y H:i', strtotime($PlanDetails['0']['enrollment_end_date']));?>"
                                    disabled="disabled">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!---Row 3 --->
                            <div class="col-md-6">
                                <label for="one-profile-edit-email">Estimated Bidding Start Date</label>

                                <input type="text" class=" form-control " id="bidding_start_date"
                                    name="bidding_start_date" disabled="disabled"
                                    value="<?php echo date('m/d/Y H:i', strtotime($PlanDetails['0']['bidding_start_date']));?>"
                                    disabled="disabled">
                            </div>
                            <div class="col-md-6">
                                <label for="one-profile-edit-name">Bidding Decrement (%)</label>

                                <input type="text" class="form-control" id="bidding_decrement" name="bidding_decrement"
                                    value="<?php echo $PlanDetails['0']['bidding_decrement']; ?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!---Row 4 --->
                            <div class="col-md-6">
                                <label for="one-profile-edit-name">Maximum Bidding Discount (%)</label>

                                <input type="text" class="format_input_field_create_plan form-control"
                                    id="bidding_threshold" name="bidding_threshold"
                                    value="<?php echo $PlanDetails['0']['bidding_min_threshold']; ?>"
                                    disabled="disabled">
                            </div>
                            <div class="col-md-6">
                                <label for="one-profile-edit-name">Bidding Late Fee ($)</label>

                                <input type="text" class="form-control" id="bidding_late_fee" name="bidding_late_fee"
                                    value="<?php echo '$'.number_format($PlanDetails['0']['bidding_late_fee'],2); ?>" disabled="disabled">
                            </div>

                        </div>

                        <div class="row mb-3">
                            <!---Row 6 --->

                            <div class="col-md-6">
                                <label for="one-profile-edit-name">Interest On Late Payment (%)</label>

                                <input type="text" class="form-control" id="ineterest_on_late_payment"
                                    name="ineterest_on_late_payment"
                                    value="<?php echo $PlanDetails['0']['interest_late_fee']; ?>" disabled="disabled">
                            </div>
                            <div class="col-md-6">
                                <label for="one-profile-edit-name">Bidding Cycle</label>

                                <select class="form-control" id="bidding_cycle" name="bidding_cycle"
                                    disabled="disabled">
                                    <?php foreach($bidding_cycle as $key => $item){?>
                                    <option value="<?php  echo strtolower($key);?>"
                                        <?php echo (strtolower($key) ==  $PlanDetails['0']['bidding_cycle']) ? 'selected' : '' ?>>
                                        <?php echo $item;?>
                                    </option>
                                    <?php }?>
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!---Row 7 --->
                            <div class="col-md-6">
                                <label for="one-profile-edit-name">Total No Of Approved Members </label>

                                <input type="text" class="form-control" id="total_no_appliactions"
                                    name="total_no_appliactions"
                                    value="<?php echo $PlanDetails['0']['no_bidding_cycle']; ?>" disabled="disabled">
                            </div>

                            <div class="col-md-6">
                                <label for="one-profile-edit-name">No of Bidding Cycle</label>

                                <input type="text" class="form-control" id="no_of_bidding_cycle"
                                    name="no_of_bidding_cycle"
                                    value="<?php echo $PlanDetails['0']['no_bidding_cycle']; ?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!---Row 8 --->
                            <div class="col-md-6">
                                <label for="one-profile-edit-name">Bidding Cycle Maximum Amount Per Member ($)</label>
                                <input type="text" class="form-control" id="bidding_amount_per_memeber"
                                    name="bidding_amount_per_memeber"
                                    value="<?php echo '$'.number_format($PlanDetails['0']['bidding_amount_per_memeber'],2); ?>"
                                    disabled="disabled">
                            </div>
                            <div class="col-md-6">
                                <label for="one-profile-edit-name">Bidding Start Amount ($)</label>

                                <input type="text" class="form-control" id="bidding_start_amount"
                                    name="bidding_start_amount"
                                    value="<?php echo '$'.number_format($PlanDetails['0']['bidding_start_amount'],2); ?>"
                                    disabled="disabled">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <!---Row 5 --->
                            <div class="col-md-6">
                                <label for="one-profile-edit-email">Plan Description</label>

                                <textarea type="text" class="form-control" id="plan_descriptions"
                                    name="plan_description" disabled="disabled"><?php echo $PlanDetails['0']['plan_description']; ?>
                                            </textarea>

                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade " id="btabs-animated-fade-bidding-cycle" role="tabpanel">

                        <div class="row">
                            <div class="block-content block-content-full">
                                   <table  id="view_bidding_cycle_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%;" class="text-center">ID</th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Bidding
                                                        Cycle Start Date </th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Bidding
                                                        Cycle End Date </th>
                                                    <th style="width: 20%;" class="text-center">Bidding
                                                        Cycle No </th>
                                                    <th style="width: 20%;" class="text-center">Bidding
                                                        Cycle Winner </th>
                                                    <th style="width: 15%;" class="text-center">Win Bid
                                                        Amount </th>
                                                    <th class="text-center"></th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if ($BiddingCycleDetails != '')
                                                {
                                                    $count =1; 
                                                    foreach($BiddingCycleDetails as $bidding_cycle_data) 
                                                        {

                                                            $current_date_time=strtotime(date('Y-m-d H:i:s'));
                                                            $bidding_schedule_start_date=strtotime($bidding_cycle_data['bidding_schedule_date']);
                                                            $bidding_schedule_end_date=strtotime($bidding_cycle_data['bidding_schedule_end_date']); 
                                                ?>
                                                <tr>
                                                    <td class="text-center font-size-sm"><a class="text-muted"
                                                            style="color: #575757!important;"
                                                            href="<?php echo base_url()?>add-transactions/<?php echo base64_encode($bidding_cycle_data['bidding_schedule_plan_id']);?>/<?php echo base64_encode($bidding_cycle_data['bidding_cycle_count']);?>"><?php echo $count++ ?></a>
                                                    </td>

                                                    <td class="text-center font-size-sm"><a class="text-muted"
                                                            style="color: #575757!important;"
                                                            href="<?php echo base_url()?>add-transactions/<?php echo base64_encode($bidding_cycle_data['bidding_schedule_plan_id']);?>/<?php echo base64_encode($bidding_cycle_data['bidding_cycle_count']);?>"><?php echo date('m/d/Y H:i',strtotime($bidding_cycle_data['bidding_schedule_date'])); ?></a>
                                                    </td>

                                                    <td class="text-center font-size-sm"><a class="text-muted"
                                                            style="color: #575757!important;"
                                                            href="<?php echo base_url()?>add-transactions/<?php echo base64_encode($bidding_cycle_data['bidding_schedule_plan_id']);?>/<?php echo base64_encode($bidding_cycle_data['bidding_cycle_count']);?>"><?php echo  date('m/d/Y H:i',strtotime($bidding_cycle_data['bidding_schedule_end_date'])); ?></a>
                                                    </td>

                                                    <td class="text-center font-size-sm"><a class="text-muted"
                                                            style="color: #575757!important;"
                                                            href="<?php echo base_url()?>add-transactions/<?php echo base64_encode($bidding_cycle_data['bidding_schedule_plan_id']);?>/<?php echo base64_encode($bidding_cycle_data['bidding_cycle_count']);?>"><?php echo $bidding_cycle_data['bidding_cycle_count']; ?></a>
                                                    </td>

                                                    <td class="text-center font-size-sm text-capitalize">
                                                         <input type="hidden" name="bidding_cycle_count_<?php echo $count; ?>" id="bidding_cycle_count_<?php echo $count; ?>" value="<?php echo $bidding_cycle_data['bidding_cycle_count']; ?>">
                                                        <?php if($current_date_time>$bidding_schedule_end_date && $bidding_cycle_data['bidding_cycle_winner_f']=='') { 
                                                        
                                                             ?>
                                                                <select class="form-control form-control-sm text-capitalize" name="winner_<?php echo $count ?>" id="winner_<?php echo $count ?>">
                                                                <option value="">Please Select..</option>
                                                             <?php if($users_list){ foreach($users_list as $user){ ?>
                                                                
                                                             <option value="<?php echo $user['u_id']; ?>" ><?php echo $user['user_application_first_name'].' '.$user['user_application_last_name'];?></option>
                                           
                                                            <?php
                                                          } } ?>
                                                      </select>

                                                         <?php 
                                                     }else{ ?>
                                                        <a class="text-muted" style="color: #575757!important;"
                                                            href="<?php echo base_url()?>add-transactions/<?php echo base64_encode($bidding_cycle_data['bidding_schedule_plan_id']);?>/<?php echo base64_encode($bidding_cycle_data['bidding_cycle_count']);?>">


                                                            <?php echo $bidding_cycle_data['bidding_cycle_winner_f'].' '.$bidding_cycle_data['bidding_cycle_winner_l']; ?>
                                                        <?php } ?>

                                                        </a>
                                                    </td>

                                                    <td class="text-center font-size-sm">
                                                        <?php if($current_date_time>$bidding_schedule_end_date && $bidding_cycle_data['bidding_cycle_winner_f']=='') { ?>
                                                         <input type="text" name="winner_amount_<?php echo $count ?>" id="winner_amount_<?php echo $count ?>" class="form-control form-control-sm format_amount" value="" placeholder="Enter Amount" onkeypress="return isNumber(event);">
                                                           
                                                        <?php } else { ?>
                                                        <a class="text-muted"
                                                            style="color: #575757!important;"
                                                            href="<?php echo base_url()?>add-transactions/<?php echo base64_encode($bidding_cycle_data['bidding_schedule_plan_id']);?>/<?php echo base64_encode($bidding_cycle_data['bidding_cycle_count']);?>"><?php if($bidding_cycle_data['bidding_cycle_win_amount']!=''){ echo '$'.number_format($bidding_cycle_data['bidding_cycle_win_amount'],2);} ?></a>

                                                        <?php } ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php if($current_date_time>$bidding_schedule_end_date && $bidding_cycle_data['bidding_cycle_winner_f']=='') { ?>
                                                        <button type="button" class="btn-sm btn-info" onclick="return selectWinnerManually('<?php echo $count ?>');">Submit</button> <?php } ?></td>


                                                </tr>
                                                <?php 
                                                        } 
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                <!-- end -->
                            </div>





                        </div>
                    </div>

                    <div class="tab-pane fade " id="btabs-animated-fade-tier-details" role="tabpanel">
                        <div class="row">
                            <div class="block-content block-content-full">

                                            <table  id="view_tier_data_plans_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%;" class="text-center">Total</th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Tier 1
                                                    </th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Tier 2
                                                    </th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Tier 3
                                                    </th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Tier 4
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if ($tiers_array!= '')
                                                    {

                                                            // echo '<pre>';
                                                            // echo print_r($tiers_array);
                                                            // echo "</pre>";

                                                    ?>
                                                <tr>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo  $tiers_array['total_tiers']; ?>  
                                                    </td>

                                                    <td class="text-center font-size-sm"><a class="text-muted" style="color: #575757!important;cursor:pointer;" onclick="return tier_modal('1');">
                                                        <?php echo  $tiers_array['tier1']; ?></a>
                                                    </td>
                                                    <td class="text-center font-size-sm"><a class="text-muted" style="color: #575757!important;cursor:pointer;" onclick="return tier_modal('2');">
                                                        <?php echo $tiers_array['tier2']; ?></a>
                                                    </td>
                                                    <td class="text-center font-size-sm"><a class="text-muted" style="color: #575757!important;cursor:pointer;" onclick="return tier_modal('3');">
                                                        <?php echo $tiers_array['tier3'];  ?></a>
                                                    </td>
                                                    <td class="text-center font-size-sm"><a class="text-muted" style="color: #575757!important;cursor:pointer;" onclick="return tier_modal('4');">
                                                        <?php echo $tiers_array['tier4'];  ?></a>
                                                    </td>
                                                </tr>
                                                <?php 
                                                    
                                                    }
                                                    ?>
                                            </tbody>
                                        </table>
                                <!-- end -->
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade " id="btabs-animated-fade-approved-users" role="tabpanel">
                        <div class="row">
                            <div class="block-content block-content-full">
                                            <table id="view_approved_plan_user" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">ID</th>
                                                    <th
                                                        class="text-center">First Name
                                                    </th>
                                                    <th
                                                        class="text-center">Last Name
                                                    </th>
                                                    <th
                                                        class="text-center">Email</th>
                                                    <th
                                                        class="text-center">Phone No
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if ($result_get_users != '')
                                                    {
                                                        $count =1; 
                                                        foreach($result_get_users as $plan_details_data_value) 
                                                        { if($plan_details_data_value['user_application_plan_confirmation']=='1'){ 
                                                    ?>
                                                <tr>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $count++ ?></td>
                                                    <td class="text-center font-size-sm">
                                                       <?php echo $plan_details_data_value['user_application_first_name']; ?>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_last_name']; ?>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_email']; ?>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_phone_no']; ?>
                                                    </td>
                                                </tr>
                                                <?php 
                                                            } 
                                                    } }
                                                    ?>
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade " id="btabs-animated-fade-rejected-users" role="tabpanel">
                        <div class="row">
                            <div class="block-content block-content-full">
                                              <table id="view_approved_plan_rejected_users" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%;" class="text-center">ID</th>
                                                    <th style="width: 20%;"
                                                        class="text-center">First Name
                                                    </th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Last Name
                                                    </th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Email</th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Phone No
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if ($result_get_users != '')
                                                    {
                                                        $count =1; 
                                                        foreach($result_get_users as $plan_details_data_value) 
                                                        { if($plan_details_data_value['user_application_plan_confirmation']=='0'){ 
                                                    ?>
                                                <tr role="row" class="odd">
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $count++ ?></td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_first_name']; ?>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_last_name']; ?>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_email']; ?>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_phone_no']; ?>
                                                    </td>
                                                </tr>
                                                <?php 
                                                            } 
                                                    } }
                                                    ?>
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>

                     <div class="tab-pane fade " id="btabs-animated-fade-restricted-users" role="tabpanel">
                        <div class="row">
                            <div class="block-content block-content-full">
                                              <table id="view_approved_plan_restricted_users" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap"  style="width: 100%!important;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%;" class="text-center">ID</th>
                                                    <th style="width: 20%;"
                                                        class="text-center">First Name
                                                    </th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Last Name
                                                    </th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Email</th>
                                                    <th style="width: 20%;"
                                                        class="text-center">Phone No
                                                    </th>

                                                     <th style="width: 20%;"
                                                        class="text-center">Restricted Upto
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if ($result_get_users != '')
                                                    {
                                                        $count =1; 
                                                        foreach($result_get_users as $plan_details_data_value) 
                                                        { if($plan_details_data_value['user_application_restricted']=='1'){ 
                                                    ?>
                                                <tr role="row" class="odd">
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $count++ ?></td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_first_name']; ?>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_last_name']; ?>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_email']; ?>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <?php echo $plan_details_data_value['user_application_phone_no']; ?>
                                                    </td>
                                                      <td class="text-center font-size-sm">
                                                        <?php echo 'Bidding Cycle  ' .$plan_details_data_value['user_application_restriction_upto']; ?>
                                                    </td>
                                                </tr>
                                                <?php 
                                                            } 
                                                    } }
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

    <!----------------- MODALS ---------------------->
        <!-- Pop Out Block Modal -->
        <div class="modal fade" id="modal-block-tier-modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-bid-history" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Tier Details</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">

                        <table id="user_tier_popup_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%;" class="text-center" >ID</th>
                                                    <th style="width: 20%;" class="text-center">Name</th>
                                                    <th style="width: 20%;" class="text-center">Email</th>
                                                    <th style="width: 20%;" class="text-center">Restricted</th>
                                                    <th style="width: 20%;" class="text-center">Application Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           
                                            </tbody>
                                        </table>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Pop Out Block Modal -->
<!----------------- MODALS ---------------------->

                <div class="modal fade winner_confirmation_modal" id="winner_confirmation_modal" tabindex="-1" role="dialog"
                                            aria-labelledby="modal-block-popout" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-popout" role="document">
                                                <div class="modal-content">
                                                    <div class="block block-themed block-transparent mb-0">
                                                        <div class="block-header bg-primary-dark">
                                                            <h3 class="block-title">Confirmation</h3>
                                                            <div class="block-options">
                                                                <button type="button" id="close_cross"
                                                                    class="btn-block-option" data-dismiss="modal"
                                                                    aria-label="Close" onclick="closeModal();">
                                                                    <i class="fa fa-fw fa-times"
                                                                        onclick="closeModal();"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="manualWinnerCount" id="manualWinnerCount" value="">
                                                        <div class="block-content font-size-sm">
                                                            <p id="confiramtion_text">Are you sure you to make change?</p>
                                                        </div>
                                                        <br>
                                                        <div
                                                            class="block-content block-content-full text-right border-top">
                                                            <button class="btn btn-sm btn-info" type="button"
                                                                onclick="closeModal();"><i class="fa fa-times mr-1"
                                                                    onclick="closeModal();"></i>Cancel</button>
                                                            <button class="btn btn-sm btn-info"
                                                                onclick="winnerConfirm();"
                                                                type="button"><i class="fa fa-check mr-1"
                                                                    onclick="winnerConfirm();"></i>Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<script>
function showUserTabs(){
    $('#usersTabs').show();
    deleteCookie();
}
function hideUsersTabs(){
    $('#usersTabs').css('display','none');
    deleteCookie();
}


function tier_modal(tier){
    $('#modal-block-tier-modal').modal('show');
    var plan_id=$('#tier_plan_id').val();
     One.loader('show');;  
    $.ajax({
        url:"<?php echo base_url() ?>Admin/tier_modal_info",
        type:"post",
        data:{'plan_id':plan_id,'tier_value':tier},
        cache:false,
        success:function(response){
             One.loader('hide');  
            $('#user_tier_popup_table >tbody').html('');
            if($.trim(response!='')){
             var response_data=JSON.parse(response);
             var counter=0;
             $.each(response_data,function(index,value){
                 counter++;
                 if(value.user_application_restriction_upto!=''){
                    var check_restriction='Restricted upto' +value.user_application_restriction_upto+' cycle';
                 }else{
                    var check_restriction='No';
                 }
                 if(value.user_application_plan_confirmation=='1'){
                    var application_status="Accepted";
                 }else{
                    var application_status="Waiting User";
                 }
             var tr= '<tr><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm text-capitalize">'+value.user_application_first_name+' '+value.user_application_last_name+'</td><td class="text-center font-w600 font-size-sm">'+value.user_application_email+'</td><td class="text-center font-w600 font-size-sm">'+check_restriction+'</td><td class="text-center font-w600 font-size-sm">'+application_status+'</td></tr>';

                  $('#user_tier_popup_table tbody').append(tr);
              });
            }
        }

    });


}

function selectWinnerManually(count){
    var winner_id              =    $('#winner_'+count).val();
    var winner_name            =   $('#winner_'+count).text();
    var winning_amount         =  $('#winner_amount_'+count).val();
    var plan_id                =  $('#tier_plan_id').val();
    var bidding_cycle_count    =  $('#bidding_cycle_count_'+count).val();

    var hidden_bidding_start_amount=$('#hidden_bidding_start_amount').val();

    if(winning_amount>hidden_bidding_start_amount){

        var msgData =
                        '<div  id="error_boxx" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please enter amount less than or equal to '+hidden_bidding_start_amount+'</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog3();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                           $("#error_message").html(msgData);

                        return false;
    }

    if(winner_id!='' && winning_amount!='' && plan_id!='' && bidding_cycle_count!='')
    {      
           $('#manualWinnerCount').val(count);
           $('.winner_confirmation_modal').modal('show');

    }else{
        var msgData =
                        '<div  id="error_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">All fields are  required</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#error_message").html(msgData);
    }
}

function winnerConfirm(){
    $('.winner_confirmation_modal').modal('hide');
    var count= $('#manualWinnerCount').val();
    var winner_id              =    $('#winner_'+count).val();
    var winner_name            =   $('#winner_'+count).text();
    var winning_amount         =  $('#winner_amount_'+count).val();
    var plan_id                =  $('#tier_plan_id').val();
    var bidding_cycle_count    =  $('#bidding_cycle_count_'+count).val();
    if(winner_id!='' && winning_amount!='' && plan_id!='' && bidding_cycle_count!='')
    {     
     $.ajax({
            url:"<?php echo base_url()?>Admin/selectWinnerManually",
            type:"post",
            data:{
                'winner_id':winner_id,'winning_amount':winning_amount,'plan_id':plan_id,'bidding_cycle_count':bidding_cycle_count
            },
            cache:false,
            success:function(response){
                if($.trim(response)!=''){

                   var msgData =
                        '<div id="winner_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Information saved successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog2();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                           $("#success_message").html(msgData);
                           // $('#winner_'+count).val('');
                           // $('#winner_'+count).hide();
                           // $('#winner_amount_'+count).val('');
                           // $('#winner_amount_'+count).hide();
                           // $('#bidding_cycle_count_'+count).val('');
                           $('#manualWinnerCount').val('');
                           setCookie('tabs_3','btabs-animated-fade-bidding-cycle');



                }
            }
        });
    }
}

function close_dialog(){
 $('#error_box').css('display','none');
}
function close_dialog3(){
 $('#error_boxx').css('display','none');
}
function close_dialog2(){
    $('#manualWinnerCount').val('');
    $('.winner_confirmation_modal').modal('hide');
    $('#winner_box').css('display','none');
    window.location.reload();
 
   }
function closeModal() {
    $('#manualWinnerCount').val('');
    $('.winner_confirmation_modal').modal('hide');
}



</script>