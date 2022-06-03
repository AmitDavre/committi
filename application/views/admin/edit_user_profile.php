<?php 
$gender  = $this->config->item('gender');
$options  = $this->config->item('options');
$HouseHoldIncome  = $this->config->item('HouseHoldIncome');
$Province  = $this->config->item('Province');
if(isset($rights)){
    $edit_right=$rights[0]['edit_right'];
    $all_rights=$rights[0]['all_rights'];
  }
  else{
      $edit_right="";
      $all_rights="";
  }
// echo '<pre>';
// print_r($session_data);
// echo '</pre>';
// die();
?>

<?php   $_SESSION['document_token']=md5(session_id() . time());

        $_SESSION['statement_button_token']=md5(session_id() . time());


?>
 <!-- Main Container -->
<style type="text/css">
.auto_capitalize
{
    text-transform: capitalize;
}
.nav-tabs-block .nav-link:focus, .nav-tabs-block .nav-link:hover {
    color: #120e35;
}
.page-item.active .page-link {
    z-index: 3;
    color: #110d35!important;
    background-color: #f9f9f9;
    border-color: #110d35!important;
}
.color_p_tag{
    width: 100%;
    margin-top: .5rem;
    font-size: .875rem;
    color: #d26a5c;
}
</style>
            <main id="main-container">
                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>manage-users">Manage User</a></li>
                                    <li class="auto_capitalize breadcrumb-item text-capitalize"><?php echo $users['first_name'].' '.$users['last_name']?></li>
                                </ol>
                            </nav>
                    </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content content-full">
                    <div id='ajax_div'>
                    </div>
                    <p id="fadeout_div_msg"></p>
                     <?php if($this->session->flashdata('new_state_success')){ ?>
                                <div id="new_main_dialog_box" class=" main_dialog_box swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;"><?php echo $this->session->flashdata('new_state_success'); ?></div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
                            <?php } ?>

                    <!-- User Profile -->

                    <div class="block">
                        <div id="checkRightsMsg"></div>
                        <div class="block-content">

                            <ul class="nav nav-tabs nav-tabs-block " data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#btabs-animated-fade-home">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-plans" data-toggle="view_plan_table_admin_tab">Plans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-documents" data-toggle="view_documents_table_tab" onclick="return display_documents();">Documents</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-application" data-toggle="tab">Applications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-alerts">Messages/Alerts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-statements" data-toggle="view_statement_table_tab" id="user_statement_id">Statements</a>
                                </li>

                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade active show" id="btabs-animated-fade-home" role="tabpanel">
                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                            <label for="one-profile-edit-name">First Name <span style="color:red;"> *</span></label>
                                            <input type="hidden" name="hidden_user_id_profile_update" id="hidden_user_id_profile_update" value="<?php echo $users['user_login_id']?>">

                                            <input type="text" class="auto_capitalize form-control" id="first_name" name="first_name" placeholder="Enter your name.." value="<?php echo $users['first_name']?>"  maxlength="20">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_first_name" role="alert"></p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="one-profile-edit-name">Middle Name</label>

                                            <input type="text" class="auto_capitalize form-control" id="middle_name" name="middle_name" placeholder="" value="<?php echo $users['middle_name']?>" maxlength="20" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="one-profile-edit-name">Last Name  <span style="color:red;"> *</span></label>

                                            <input type="text" class="auto_capitalize form-control" id="last_name" name="last_name" placeholder="Enter your name.." value="<?php echo $users['last_name']?>" maxlength="20">
                                             <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_last_name" role="alert"></p>
                                        </div>
                                    </div>                                    

                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                            <label for="example-select">Gender  <span style="color:red;"> *</span></label> 
                                            <select class="form-control" id="user_gender" name="user_gender" >
                                                 <?php
                                                    // Iterating through the tier array
                                                    foreach($gender as $key =>$item)
                                                    {
                                                    ?>
                                                        <option value="<?php  echo strtolower($key);?>" <?php if($key == $users['user_gender']) {
                                                            echo 'selected';
                                                        }?>>
                                                            <?php echo $item;?>
                                                        </option>

                                                <?php }?>
                                            </select>
                                             <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_user_gender" role="alert"></p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">SIN  <span style="color:red;"> *</span></label>
                                            <input type="text" class="sin_manage_profile_val form-control" id="user_sin" name="user_sin" value="<?php echo $users['user_sin']?>" maxlength="11" autocomplete="off" onkeypress="return isNumber(event)">
                                            <p id="sin_error_manage_profile" class="color_p_tag"></p>

                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">Date Of Birth  <span style="color:red;"> *</span></label> 
                                            <input type="hidden" name="hidden_date_of_Birth" id="hidden_date_of_Birth" value="<?php echo $users['user_dob']?>">
                                            <input style= "background-color: #fff!important;" type="text" class="form-control" id="user_date_of_Birth" name="user_date_of_Birth"  onchange="cHeck18YearS();">
                                             <p id="userDateoFbirthError" class="color_p_tag"></p>
                                              <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_user_date_of_birth" role="alert"></p>
                                        </div>
                                    </div>                                    
                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                            <label for="example-select">Phone Number  <span style="color:red;"> *</span></label>
                                            <input type="text" class="minLengthmanageprofilePHoneNo form-control" id="user_phone_number" name="user_phone_number"  value="<?php echo $users['user_phone_no']?>" maxlength="14" autocomplete="off" onkeypress="return isNumber(event)" placeholder="(xxx) xxx-xxxx">
                                            <p id="minLengthmanageprofilePHoneNoError" class="color_p_tag"></p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="one-profile-edit-email">Email Address  <span style="color:red;"> *</span></label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email.." value="<?php echo $users['username']?>"  readonly="readonly">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="one-profile-edit-username">Username  <span style="color:red;"> *</span></label>

                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username.." value="<?php echo $users['username']?>" readonly="readonly">
                                            <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $users['id']?>">
                                        </div>
                                    </div>                                    
                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                            <label for="example-select">Street No.</label> 
                                            <input type="text" class="auto_capitalize form-control" id="user_street" name="user_street" value="<?php echo $users['usert_street']?>" tabindex='-1' maxlength="10">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">Street Name  <span style="color:red;"> *</span></label>
                                            <input type="text" class="user_street_name_manage_profile auto_capitalize form-control" id="user_street_name" name="user_street_name" value="<?php echo $users['user_street_name']?>" maxlength="20">
                                            <p id="street_name_error_manage_profile" class="color_p_tag"></p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">App/Suite/Unit </label>
                                            <input type="text" class="auto_capitalize form-control" id="user_suite" name="user_suite" value="<?php echo $users['user_unit_no']?>" maxlength="10">
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                            <label for="example-select">City  <span style="color:red;"> *</span></label> 
                                            <input type="text" class="auto_capitalize form-control" id="user_city" name="user_city" value="<?php echo $users['user_city']?>" >
                                      <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_user_city" role="alert"></p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">Province <span style="color:red;"> *</span></label>
                                            <select class="form-control" id="user_provience" name="user_provience">
                                               <?php foreach($Province as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $users['user_provience']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">Postal Code  <span style="color:red;"> *</span></label> 
                                            <input type="text" class="manage_user_profile_val form-control" id="user_postal_code" name="user_postal_code" value="<?php echo $users['user_postal_code']?>" maxlength="7" style="text-transform: uppercase;">
                                            <p id="postal_code_error_manage_profile" class="color_p_tag"></p>
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_user_postal_code" role="alert"></p>
                                        </div>
                                    </div>                                    

                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                            <label for="example-select">Gross Annual Household Income</label>
                                                    
                                            <select class="form-control" id="user_annual_income" name="user_annual_income">
                                                <option value="">Please select</option>
                                                <?php foreach($HouseHoldIncome as $key => $item){?>
                                                <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $users['user_gross_income']) ? 'selected' : '' ?>>
                                                <?php echo $item;?>
                                                </option>
                                            <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">Residential Status</label>
                                                
                                            <select class="form-control" id="user_residential" name="user_residential">
                                                <!-- <?php foreach($options as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $users['user_residential_status']) ? 'selected' : '' ?>>
                                                    <?php echo $item;?>
                                                    </option>
                                                <?php }?> -->
                                                <option value="">Please select</option>
                                                <?php if(isset($residential_data)) {
                                                foreach ($residential_data as $residential) {?>
                                                <option value="<?php echo $residential->dropdown_values_id;?>" <?php if($users['user_residential_status']==$residential->dropdown_values_id){ echo 'selected';}else {echo '';}?>><?php echo $residential->dropdown_values_name;?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">Employment Status</label>

                                            <select class="form-control" id="user_employment_status" name="user_employment_status" tabindex="-1">
                                                <?php foreach($options as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $users['user_employment_status']) ? 'selected' : '' ?>>
                                                    <?php echo $item;?>
                                                    </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>                                    

                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                            <label for="example-select">Why are you joining committi ?</label>
                                                    
                                            <select class="form-control" id="user_funds" name="user_funds">
                                                            <option value="">Please select</option>
                                                                  <?php if(isset($joining_committi_data)) {
                                                                foreach ($joining_committi_data as $joining_committi_value) {?>
                                                                    <option value="<?php echo $joining_committi_value->dropdown_values_id;?>" <?php if($users['user_planning']==$joining_committi_value->dropdown_values_id){ echo 'selected';}else {echo '';}?>><?php echo $joining_committi_value->dropdown_values_name;?></option>
                                                                <?php }} ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">How Soon You Need The Funds ?</label>
                                                    
                                            <select class="form-control" id="user_funds_time" name="user_funds_time">
                                                <?php foreach($options as $key => $item){?>
                                                    <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $users['user_fund_time']) ? 'selected' : '' ?>>
                                                    <?php echo $item;?>
                                                    </option>
                                                <?php }?>
                                            </select>
                                        </div>

                                    </div>                                    

                                    <div class="row" style="margin-bottom: 20px">
                                         <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?>
                                        <div class="col-md-1">
                                             <button style="color: #fff;" type="submit" name="submit" id="submit"  class="btn btn-info" onclick="updateUserAjax();">Update</button>
                                        </div>
                                        <div class="col-md-4">
                                             <button style="color: #fff;margin-left:25px;" type="button" name="sendConfirmationEmail" id="sendConfirmationEmail"  class="btn btn-info" onclick="sendUserConfirmationEmail();" <?php if($users['email_verify']=='1'){echo 'disabled';}?>>Send User Confirmation Email</button>
                                        </div>

                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="btabs-animated-fade-plans" role="tabpanel">

                                <div class="block-content block-content-full">
                                <div class="row">
                                    <div class="col-md-4">
                                            <label for="example-select">Status Filter</label>
                                            <select class="form-control" id="active_status_filter" style="width: 50%;margin-bottom: 15px;" onchange="active_status_filter();">
                                                <option value="0">Please Select</option>
                                                <option value="1">Inactive</option>
                                                <option value="2">Active</option>
                                                <option value="3">All Plans</option>
                                            </select>
                                        </div>
                                </div>   
                                <div class="row">
                                    <div class="col-sm-12">

                                       <table id="view_plans_table_admin" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important;">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 20%;" class="text-center">ID</th>
                                                    <th style="width: 30%;" class="text-center">Plan Name </th>
                                                    <th style="width: 30%;" class="text-center">Plan Applied Date</th>
                                                    <th style="width: 20%;" class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                    <?php if ($usersResultCheck != '')
                                            {
                                                $count =1; 
                                                foreach($usersResultCheck as $view_plans_data_array) 
                                                { 
                                    ?>          <tr>
                                                <td class="text-center font-size-sm">
                                                    <a class="text-muted" style="color: #575757!important;" href="<?php echo base_url()?>view-transactions/<?php echo base64_encode($view_plans_data_array['user_application_plan_id']);?>/<?php echo base64_encode($view_plans_data_array['u_id']);?>"><?php echo $count++ ?>
                                                    </a>
                                                </td>

                                                <td class="text-center font-size-sm">
                                                    <a class="text-muted" style="color: #575757!important;" href="<?php echo base_url()?>view-transactions/<?php echo base64_encode($view_plans_data_array['user_application_plan_id']);?>/<?php echo base64_encode($view_plans_data_array['u_id']);?>"><?php echo $view_plans_data_array['user_application_plan_name'] ?>
                                                    </a>
                                                </td>

                                                <td class="text-center font-size-sm">
                                                    <a class="text-muted" style="color: #575757!important;" href="<?php echo base_url()?>view-transactions/<?php echo base64_encode($view_plans_data_array['user_application_plan_id']);?>/<?php echo base64_encode($view_plans_data_array['u_id']);?>"><?php echo date('m/d/Y',strtotime($view_plans_data_array['user_application_posted_date'])); ?>
                                                    </a>
                                                </td>

                                                <td class="text-center font-size-sm">
                                                    

                                                        <?php 

                                                        if($view_plans_data_array['user_application_offer_sent'] == '1' && $view_plans_data_array['user_application_plan_confirmation'] == ''){

                                                            ?>
                                                           <a class="text-white badge badge-success"  href="<?php echo base_url()?>view-user-application/<?php echo base64_encode($view_plans_data_array['u_id']);?>/<?php echo base64_encode($view_plans_data_array['user_application_plan_id']);?>">Waiting User</a>

                                                        <?php } else if ($view_plans_data_array['user_application_plan_confirmation'] == '1') { ?>

                                                            <a class="text-white badge badge-info"  href="<?php echo base_url()?>view-user-application/<?php echo base64_encode($view_plans_data_array['u_id']);?>/<?php echo base64_encode($view_plans_data_array['user_application_plan_id']);?>">Accepted</a>
                                                        <?php }
                                                        else if ($view_plans_data_array['user_application_plan_confirmation'] == '0'){ ?>

                                                            <a class="text-white badge badge-danger"  href="<?php echo base_url()?>view-user-application/<?php echo base64_encode($view_plans_data_array['u_id']);?>/<?php echo base64_encode($view_plans_data_array['user_application_plan_id']);?>">Rejected</a>

                                                        <?php }else {?>
                                                           <a class="text-white badge badge-info"  href="<?php echo base_url()?>view-user-application/<?php echo base64_encode($view_plans_data_array['u_id']);?>/<?php echo base64_encode($view_plans_data_array['user_application_plan_id']);?>">Pending</a>
                                                       <?php  } ?>
                                                </td>
                                                </tr>


                                    <?php       }}?>

                                            
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                             
                                </div>

                                <div class="tab-pane fade " id="btabs-animated-fade-documents" role="tabpanel">
                                      <form  method="POST" enctype="multipart/form-data" >
                                        <input type="hidden" name="hidden_userId_fetch_Val" id="hidden_userId_fetch_Val" value="<?php echo $users['user_login_id']?>">
                                         <input type="hidden" id="document_token" name="document_token" value="<?php echo $_SESSION['document_token'] ?>">

                                        <div class="row">
                                            <div class="col-lg-4">
                                            <label>Document Name  <span style="color:red">* </span></label>
                                                <input type="text" class="form-control document_name text-capitalize" name="document_name" id="document_name" value="" placeholder="Enter document name" >
                                                <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_document" role="alert"></p>
                                            </div>
                                        </div>
                                    
                                    <br>
                                    <div class="row"  >
                                        <div class="col-lg-4 " >
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input js-custom-file-input-enabled" data-toggle="custom-file-input" id="upload_doc" name="upload_doc" onchange="return imageValidation();">
                                                <label class="custom-file-label" for="one-profile-edit-avatar">Choose a file</label>
                                                <span id="error_upload_doc" style="color:red"></span>
                                                <p id ="document_filename" style="padding: 4px;font-weight: 600;margin-top: 10px"> </p>

                                            </div>
                                        </div>
                                
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 " >
                                            <br>
                                           <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?><button
                                        style="color: #fff;" type="submit" name="submit_doc" id="submit_doc"
                                        class="btn btn-info">Submit</button><?php } ?>
                                        </div>
                                    </div>
                                </form>
                                     <br><h3 class="block-title">Documents Information</h3><br>
                                                    <input type="hidden" name="hidden_userID_fetch_Val" id="hidden_userID_fetch_Val" value="<?php echo $users['user_login_id']?>">
                                                    <input type="hidden" name="hidden_document_name" id="hidden_document_name" value="">
                                               
                                                    <table id="view_documents_table_value" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important;">
                                                <thead>
                                                    <tr role="row">
                                                        <th style="width: 10%;"class="text-center">ID</th>
                                                        <th style="width: 20%;">Document Name </th>
                                                        <th style="width: 20%;">Upload date </th>
                                                        <th style="width: 10%;">File Format</th>
                                                        <th style="width: 20%;">Download </th>
                                                        <th style="width: 10%;">Delete </th>
                                                        <th style="width: 10%;">Edit </th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="ad_doc_tbody">
                                                    
                                                </tbody>
                
                                    </table>
                                </div>                               
                                <div class="tab-pane fade " id="btabs-animated-fade-application" role="tabpanel">
                                     <br><h3 class="block-title">Applications Information</h3><br>
    
                                        <!-- <div class="block-content block-content-full"> -->
    
                                                    <input type="hidden" name="hidden_userID_fetch_Val" id="hidden_userID_fetch_Val" value="<?php echo $users['user_login_id']?>">
                                                    <input type="hidden" name="hidden_document_name" id="hidden_document_name" value="">

                                                <table id="admin_application_table_view" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">


                                                    <thead>
                                                        <tr role="row">
                                                            <th style="width: 20%;" class="text-center">ID</th>
                                                            <th style="width: 20%;">Plan Name</th>
                                                            <th style="width: 20%;">Plan Applied Date</th>
                                                            <th  style="width: 20%;">Status Update Date</th>
                                                            <th style="width: 20%;">Current Status </th>
                                                            
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
                                                                    <tr role="row" class="odd">
                                                                        <td class="text-center font-size-sm"><?php echo $count++ ?></td>


                                                                        <td class="text-center font-size-sm sorting_1"><?php echo $view_user_application['user_application_plan_name']; ?>
                                                                        </td>

                                                                        <td class="text-center font-size-sm">
                                                                          <?php 
                                                                            $convertDate= date('m/d/Y', strtotime($view_user_application['user_application_posted_date']));
                                                                                    echo $convertDate;
                                                                            ?>
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
                                                                        
                                                                        <td class="text-center font-size-sm">
                                                                            <?php 

                                                                            if($view_user_application['user_application_offer_sent'] == '1' && $view_user_application['user_application_plan_confirmation'] == ''){

                                                                                ?>
                                                                              <a  style="color: #fff;" class="badge badge-success" href="<?php echo base_url();?>view-user-application/<?php echo base64_encode($view_user_application['u_id']).'/'.base64_encode($view_user_application['user_application_plan_id']);?>">Waiting User</a>

                                                                            <?php } else if ($view_user_application['user_application_plan_confirmation'] == '1') { ?>

                                                                               <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>view-user-application/<?php echo base64_encode($view_user_application['u_id']).'/'.base64_encode($view_user_application['user_application_plan_id']);?>">Accepted</a>
                                                                            <?php }
                                                                            else if ($view_user_application['user_application_plan_confirmation'] == '0'){ ?>

                                                                               <a  style="color: #fff;" class="badge badge-danger" href="<?php echo base_url();?>view-user-application/<?php echo base64_encode($view_user_application['u_id']).'/'.base64_encode($view_user_application['user_application_plan_id']);?>">Rejected</a>

                                                                            <?php }else {?>
                                                                                <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>review-application/<?php echo $view_user_application['u_id'].'/'.$view_user_application['user_application_plan_id'];?>">Pending</a>
                                                                           <?php  } ?>
                                                                        </td>
                                                               
                                                                    </tr>
                                                    <?php 
                                                                } 
                                                        }
                                                        ?>
                                       
                                                    </tbody>
                                                    </table>
                                </div>                                

                                <div class="tab-pane fade " id="btabs-animated-fade-alerts" role="tabpanel">
                                     <br><h3 class="block-title">Messages/Alerts</h3><br>
                                    <input type="hidden" name="hidden_user_id_add_note" id="hidden_user_id_add_note" value="<?php echo $users['user_login_id']?>">
                                     <div class="row">
                                        <div class="block-content block-content-full">
                                            <!-- <button type="button" class="btn btn-info">Add New</button> -->
                                            <button type="button" class="btn btn-info" style="float: right;"><a class="text-muted" style="color: #fff!important;" href="<?php echo base_url()?>note-history/<?php echo base64_encode( $users['user_login_id']);?>">View History</a></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="block-content block-content-full">
                                            <!-- <button type="button" class="btn btn-info">Add New</button> -->

                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Note Name  <span style="color:red">* </span></label>
                                                    <input type="text" class="form-control text-capitalize" name="note_name" id="note_name" value="" style="margin-bottom: 10px;" placeholder="Enter note document_name">
                                                    <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;margin-top:-10px;" class="font_size form-group alert alert-danger" id ="error_note_name" role="alert"></p>
                                                </div>
                                            </div>
                                            <div class="row" >
                                                
                                                <div class="col-md-12">
                                                    <label for="one-profile-edit-name">Description</label>
                                                    <textarea  class="form-control" id="alert_desc" name="alert_desc" rows="4" placeholder="Enter note description..."> 
                                                    </textarea>
                                                </div>
                                               
                                            </div>  
                                            <div class="row" >
                                                <div class="col-md-12">
                                                    <button type="button" id="add_new_note_button" class="btn btn-info" style="float: right;margin-top: 13px;" onclick="add_new_note_per_user();">Add New Note</button>
                                                </div>
                                               
                                            </div>  
                                        </div>
                                    </div>
                                    
                            </div>                                


                            <!------------TAB STATEMENTS  ---------------->

                            <div class="tab-pane fade " id="btabs-animated-fade-statements" role="tabpanel">
                                     <br><h3 class="block-title">Recent Statement</h3><br>
                                        <div class="block-content block-content-full">

                                            <div class="row mb-3" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Select Plan</label>
                                                    <select class="form-control" id="plan_table_id" name="user_provience" onchange="get_statement_no();">
                                                        <option value="">Please Select</option>
                                                       <?php foreach($user_application_table as $key => $item){?>
                                                        <option value="<?php  echo $item['user_application_plan_id'];?>" >
                                                        <?php echo $item['user_application_plan_name'];?>
                                                        </option>
                                                    <?php }?>
                                                    </select>
                                                </div>

                                          <!--       <div class="col-md-4 col-md-offset-4">
                                                </div> -->

                                                <div class="col-md-8">
        
                                                    <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?>
                                        <button data-toggle="modal" data-target="#modal-block-statement" type="button"
                                            class="btn btn-info form-control-sm" style="float: right;">Generate Statement</button>
                                    <?php } ?>
                                                </div>

                                            </div>       
                                                <table id="view_statement_no_table" class="table table-bordered table-striped text-nowrap"  role="grid" style="width:100%!important">
                                                    <thead>
                                                        <tr role="row">
                                                            <th style="width: 25%;" class="text-center " > Plan Name</th>
                                                            <th style="width: 25%;" class="text-center ">Due Date </th>
                                                            <th style="width: 25%;" class="text-center ">Due Amount </th>
                                                            <th style="width: 25%;" class="text-center ">Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                               
                                                </table>
                                    </div>
                            </div>

                        </div>

                    </div>

                    <!-- END User Profile -->

                </div>

                <!-- END Page Content -->
                <!-- Pop Out Block Modal -->
                        <div class="modal fade" id="modal-edit-doc" tabindex="-1" role="dialog" aria-labelledby="modal-edit-doc" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-popout" role="document">
                                <div class="modal-content">

                                    <input type="hidden" name="hidden_document_id" id="hidden_document_id" value="">
                                    <div class="block block-themed block-transparent mb-0">
                                        <div class="block-header bg-primary-dark">
                                            <h3 class="block-title">Edit Document Name </h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content font-size-sm">
                                            <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?>
                                           <div class="form-group">
                                           <label>Enter Document Name</label>
                                           <input type="text" class="form-control text-capitalize" name="edit_doc_name" id="edit_doc_name" value=""
                                            placeholder="Enter document name here">
                                          </div> <?php } else {?>
                                           <p>You Dont Have Right To Edit The Information.<p>
                                                <?php } ?>
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <button id="close_modal" type="button" class="btn btn-sm btn-light" data-dismiss="modal" onclick="reset_document_id();">Close</button>

                                             <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?>
                                                <button type="button" class="btn btn-sm btn-info" onclick="update_document_name();"><i
                                              class="fa fa-check mr-1"></i>Update</button> <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END Pop Out Block Modal -->                

                    <!-- Pop Out Block Modal -->
                        <div class="modal fade" id="modal-edit-del" tabindex="-1" role="dialog" aria-labelledby="modal-edit-del" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-popout" role="document">
                                <div class="modal-content">

                                    <div class="block block-themed block-transparent mb-0">
                                        <div class="block-header bg-primary-dark">
                                            <h3 class="block-title">Delete Document</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content font-size-sm">
                                            <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?>
                                           <div class="form-group">
                                           <label>Are you sure, you want to delete this document ? Please type your password to confirm. </label>
                                           <input type="password" class="form-control text-capitalize" name="admin_password" id="admin_password" value="" placeholder="Enter your password here">
                                           <input type="hidden" name="hidden_delete_id" id="hidden_delete_id" value="">
                                          </div> <?php } else {?>
                                           <p>You Dont Have Right To Edit The Information.<p>
                                                <?php } ?>
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <button id="close_modal_delete" type="button" class="btn btn-sm btn-light" data-dismiss="modal" onclick="reset_document_del_id();">Close</button>

                                             <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?>
                                                <button type="button" class="btn btn-sm btn-info" onclick="delete_docs();"><i
                                              class="fa fa-trash mr-1"></i> Delete</button> <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END Pop Out Block Modal -->

                    <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-statement" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate Statement</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  method="POST" enctype="multipart/form-data" >
                                        <input type="hidden" name="hidden_user_id_statement" id="hidden_user_id_statement" value="<?php echo $users['user_login_id']?>">
                                        <input type="hidden" name="statement_button_token" id="statement_button_token" value="<?php echo $_SESSION['statement_button_token']?>"> 
                                            <label for="one-profile-edit-name">Select Plan</label>
                                                    <select class="form-control" id="plan_id_modal" name="plan_id_modal" onchange="get_statement_balance();">
                                                        <option value="">Please Select</option>
                                                      <?php foreach($user_application_table as $key => $item){?>
                                                        <option value="<?php  echo $item['user_application_plan_id'];?>" >
                                                        <?php echo $item['user_application_plan_name'];?>
                                                        </option>
                                                    <?php }?>
                                                    </select>
                                                    <br>
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Start Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="statement_start_date" name="statement_start_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">End Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="statement_end_date" name="statement_end_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date" onchange=" return due_date_validation('#statement_due_date','#statement_end_date');">
                                                </div>   
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Due Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="statement_due_date" name="statement_due_date"  value="" style="margin-bottom: 10px;" placeholder="Enter Due date" >
                                                </div>
                                            </div>
                                    </div>
                                    <div class="block-content block-content-full border-top">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="one-profile-edit-name">Percentage %</label>
                                                     <input type="text" class="form-control bg-white format_amount" id="user_state_percentage_amt" name="user_state_percentage_amt" value="" style="margin-bottom: 10px;" placeholder='0.00' onkeypress="return isNumber(event);" autocomplete="off">
                                            </div>
                                             <div class="col-md-4">
                                                <label for="one-profile-edit-name">Amount in $</label>
                                                     <input type="text" class="form-control bg-white format_amount currency_format" id="user_state_amt" name="statement_amount" value="" style="margin-bottom: 10px;" placeholder='0.00' onkeypress="return isNumber(event);" autocomplete="off">
                                            </div>
                                             <div class="col-md-4">
                                        <button  class="btn btn-sm btn-info mt-4"  target="_blank"  id="statement_generate_button" name="statement_generate_button" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>
                                    </div>
                                </div>
                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->

            </main>

            <!-- END Main Container -->
<script>
window.onload=function(){
    var check_session='<?php echo $this->session->flashdata('new_state_success') ?>';
    if(check_session!=''){
        // setTimeout(function(){ 
        $('#user_statement_id').click();
    // },500);
    }
}
function close_dialog_rights(){
    $('#checkRightsModal').css('display', 'none');
}
function updateUserAjax()
{
    var userId              = $('#hidden_user_id_profile_update').val();
    var first_name          = $('#first_name').val();
    var middle_name         = $('#middle_name').val();
    var last_name           = $('#last_name').val();
    var user_gender         = $('#user_gender').val();
    var user_sin            = $('#user_sin').val();
    var user_date_of_Birth  = $('#user_date_of_Birth').val();
    var user_street         = $('#user_street').val();
    var user_street_name    = $('#user_street_name').val();
    var user_unit_no        = $('#user_unit_no').val();
    var user_provience      = $('#user_provience').val();
    var user_postal_code    = $('#user_postal_code').val();
    var user_phone_number   = $('#user_phone_number').val();
    var user_suite          = $('#user_suite').val();
    var user_employment_status          = $('#user_employment_status').val();
    var user_annual_income              = $('#user_annual_income').val();
    var user_household_income           = $('#user_household_income').val();
    var user_residential                = $('#user_residential').val();
    var user_funds                      = $('#user_funds').val();
    var user_funds_time                 = $('#user_funds_time').val();
    var user_sin                        = $('#user_sin').val();
    var user_city                       = $('#user_city').val();
    // var username                        = $('#username').val();
var selectedGender = $('#user_gender').find(":selected").val();
    if(selectedGender=='0')
    {
        $('#error_user_gender').css("display", "");
        $('#error_user_gender').text('Required*')
        return false;
    }
    else
    {
        $('#error_user_gender').css("display", "none");
    }
    if(first_name == '')
    {
        $('#error_first_name').css("display", "");
        $('#error_first_name').text('Required*')
        return false;
    }
    else
    {
        $('#error_first_name').css("display", "none");
    }
    if(last_name == '')
    {
        $('#error_last_name').css("display", "");
        $('#error_last_name').text('Required*')
        return false;
    }
    else
    {
        $('#error_last_name').css("display", "none");
    }
     if(user_city == '')
    {
        $('#error_user_city').css("display", "");
        $('#error_user_city').text('Required*')
        return false;
    }
    else
    {
        $('#error_user_city').css("display", "none");
    }
    if(user_postal_code == '')
    {
        $('#error_user_postal_code').css("display", "");
        $('#error_user_postal_code').text('Required*')
        return false;
    }
    else
    {
        $('#error_user_city').css("display", "none");
    }
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."Admin/update_user_profile_ajax";?>',
      data: {'userId':userId,'first_name':first_name,'middle_name':middle_name,'last_name':last_name,'user_gender':user_gender,'user_sin':user_sin,'user_date_of_Birth':user_date_of_Birth,'user_street':user_street,'user_street_name':user_street_name,'user_unit_no':user_unit_no,'user_provience':user_provience,'user_postal_code':user_postal_code,'user_phone_number':user_phone_number,'user_suite':user_suite,'user_employment_status':user_employment_status,'user_annual_income':user_annual_income,'user_household_income':user_household_income,'user_residential':user_residential,'user_funds':user_funds,'user_funds_time':user_funds_time,'user_sin':user_sin,'user_city':user_city},
      success: function(response){

        var data = JSON.parse(response);
        console.log(data);

        if(response!='')
        {

          if($.trim(response) == '1')
          {

             var div = '<div id="main_dialog_box" class=" main_dialog_box swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">User Updated Successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                 $('#ajax_div').append( div);
          }

        }
        
      }
    });
}
function close_dialog()
{
    $('#main_dialog_box').css('display','none');
    $('.main_dialog_box').css('display','none');
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
function cHeck18YearS()
{
    var uSerInput = $('#user_date_of_Birth').val();

    var userInputArray = uSerInput.split('/');


    var day = userInputArray[1];
    var month = userInputArray[0];
    var year = userInputArray[2];
    var dateOfBirth = year+'/'+month +'/'+ day;
    var ageCount =getAge(dateOfBirth);


    if(ageCount < '18')
    {
        $("#userDateoFbirthError").text("Minimuma Age Required Is 18 Years And Above.");
        $('#submit').prop("disabled", true);
    }
    else
    {
        // success!
        $("#userDateoFbirthError").text("");
        $('#submit').prop("disabled", false);
    }

}

function active_status_filter()
{   
    One.loader('show');
    var select_filter                 = $('#active_status_filter').val();
    var hidden_user_id_profile_update = $('#hidden_user_id_profile_update').val();
    if(select_filter != '0')
    {
        $.ajax({
        type : 'POST',
        url  : '<?php echo base_url()."Admin/get_active_plan_status"; ?>',
        data : {'select_filter':select_filter,'hidden_user_id_profile_update':hidden_user_id_profile_update},
        success : function(response){
           var data = JSON.parse(response);
         if($.trim(response) != '0')
          {
            $("#view_plans_table_admin > tbody").html("");
            var count =1;
               $.each(data, function(index, value) {
                    var counter  = count++;
                    if(value.user_application_offer_sent == '1' && value.user_application_plan_confirmation == '')
                    {
                       var status=  ' <a class="text-white badge badge-success">Waiting User</a>';

                    } else if (value.user_application_plan_confirmation == '1') { 

                         var status=  ' <a class="text-white badge badge-info">Accepted</a>';
                    
                    } else if (value.user_application_plan_confirmation == '0'){ 

                         var status=  '<a class="text-white badge badge-danger">Rejected</a>';
                    } 
                    else { 
                        var link ="<?php echo base_url()?>review-application/"+value.u_id+'/'+value.user_application_plan_id;
                        var status=  '<a  style="color: #fff;" class="badge badge-info" href="'+link+'">Pending</a>';
                    }
                    var tbody = '<tbody><tr><td class="text-center font-size-sm sorting_1">'+counter+'</td><td class="text-center font-size-sm sorting_1">'+value.user_application_plan_name+'</td><td class="text-center font-size-sm sorting_1">'+value.user_application_posted_date+'</td><td class="text-center font-size-sm sorting_1">'+status+'</td></tr></tbody>';

                    $('#view_plans_table_admin ').append(tbody);


                });

            One.loader('hide');

          }else{
             $("#view_plans_table_admin > tbody").html("");
             One.loader('hide');
          }
          

        }
      });
    }
    else
    {
        One.loader('hide');
    }
    
}
    // window.setInterval(function(){
    //   /// call your function here
    //   display_documents();
    // }, 2000);
    function display_documents(){   
        var userIdvalueGet = $('#hidden_userID_fetch_Val').val();
          $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/display_documents_data"?>',
          data: {'userIdvalueGet':userIdvalueGet},
          success: function(response){
           if(response != 0)
           {
            destory_data_table('#view_documents_table_value');

            $('#ad_doc_tbody tr').remove();
             var data = JSON.parse(response);
                var count =1;
               $.each(data, function(index, value){
                    var counter  = count++;
                    var link ="<?php echo base_url()?>assets/users";
                    var new_date =   value.document_records_upload_date; 
                    var result = new_date.split('-');
                     var newDates = result[1]+'/'+result[2]+'/'+result[0];
                    var tr= '<tr><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm text-capitalize">'+value.document_records_custom_name+'</td><td class="text-center font-w600 font-size-sm">'+newDates+'</td><td class="text-center font-w600 font-size-sm">'+value.document_records_format+'</td><td><button  class="btn btn-small "><a style="color:#575757!important;"  target="_blank" href='+link+'/'+value.document_records_image_originalname+'>Download </a></button></td><td><button class="btn btn-small" onclick="opendelmodal(this,'+value.document_records_id+');">Delete</button></td><td><button class="btn btn-small" data-toggle="modal" data-target="#modal-edit-doc" onclick="insert_hidden_id(this,'+value.document_records_id+');">Edit</button></td></tr>';
                    $('#ad_doc_tbody').append(tr);
                });
               intializeDatatable('#view_documents_table_value');
           } 
          }
        }); 
    }
function insert_hidden_id(that,id)
{
    $('#hidden_document_id').val(id);
}
function reset_document_id()
{
    $('#hidden_document_id').val('');
}
function reset_document_del_id()
{
    $('#hidden_delete_id').val('');
}
function delete_doc(that,id)
{
    var admin_type="<?php echo $this->session->userdata('s_admin')?>";
    var all_rights="<?php echo $all_rights  ?>";
    if(admin_type!='1'&& (all_rights=='0' || all_rights=='')){
         var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to delete the records.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
        $('#checkRightsMsg').html(msgData);
        return false;
    }
    $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/delete_doc_record";?>',
          data: {'id':id},
          success: function(response){

           var data = JSON.parse(response);

           if(response != '')
           {
            location.reload();
           }
          }
        });
}

function update_document_name()
{
   var admin_type="<?php echo $this->session->userdata('s_admin')?>";
    var all_rights="<?php echo $all_rights  ?>";
    if(admin_type!='1'&& (all_rights=='0' || all_rights=='')){
         var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to edit the records.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
        $('#checkRightsMsg').html(msgData);
        return false;
    }
    var hidden_document_id = $('#hidden_document_id').val();
    var edit_doc_name = $('#edit_doc_name').val();



    $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/update_document_namee";?>',
          data: {'hidden_document_id':hidden_document_id,'edit_doc_name':edit_doc_name},
          success: function(response){

           var data = JSON.parse(response);

           if(response != '')
           {

                $('#close_modal').click();
                $('#hidden_document_id').val('');
                $('#edit_doc_name').val('');

                var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Document name updated successfully for the plan</span><a href="#" target="_blank" data-notify="url"></a></div>';
                    $("#fadeout_div_msg").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
           }
          }
        });
}


function add_new_note_per_user()
{
     var admin_type="<?php echo $this->session->userdata('s_admin')?>";
     var all_rights="<?php echo $all_rights  ?>";
     var edit_right="<?php echo $edit_right ?>";
     if(admin_type!='1'&& (all_rights=='0' && edit_right=='0')){
        var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to post the notes</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
           $('#checkRightsMsg').html(msgData);
           return false;
      } 
    var hidden_user_id_add_note  = $('#hidden_user_id_add_note').val();
    var alert_desc               = $('#alert_desc').val();
    var note_name                = $('#note_name').val();
    var email                    = $('#email').val();
    if(note_name==''){
        $('#error_note_name').css("display", "");
        $('#error_note_name').text('Required*');
        return false;
    }
    else
    {
        $('#error_note_name').css("display", "none");
        $('#add_new_note_button').prop('disabled',true);
    }
    $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/add_note_per_user";?>',
          data: {'alert_desc':alert_desc,'hidden_user_id_add_note':hidden_user_id_add_note,'note_name':note_name,'email':email},
          success: function(response){

           var data = JSON.parse(response);

           if(response != '')
           {
             $('#add_new_note_button').prop('disabled',false);
                $('#alert_desc').val('');
                $('#note_name').val('');


                var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">New note added successfully.</span><a href="#" target="_blank" data-notify="url"></a></div>';
                    $("#fadeout_div_msg").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
           }
          }
        });


}

function generate_statement()
{
        var admin_type="<?php echo $this->session->userdata('s_admin')?>";
        var all_rights="<?php echo $all_rights  ?>";
        if(admin_type!='1'&& (all_rights=='0' || all_rights=='')){
         var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to generate the statement.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $('#checkRightsMsg').html(msgData);
            return false;
           }
    var statement_start_date                = $('#statement_start_date').val();
    var statement_end_date                  = $('#statement_end_date').val();
    var user_id                             = $('#hidden_user_id_add_note').val();


    $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/generate_statement_ajax";?>',
          data: {'statement_start_date':statement_start_date,'statement_end_date':statement_end_date,'user_id':user_id},
          success: function(response){

           var data = JSON.parse(response);

           if(response != '')
           {

           }
          }
        });

}

function get_statement_balance()
{
    var plan_id                = $('#plan_table_id').val();
    var user_id                = $('#hidden_user_id_add_note').val();

    $('#statement_f_date').val('');
    $('#statement_l_date').val('');
    $('#statement_min_amount').val('');
    $('#statement_due_date').val('');



    $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/get_statement_balance_ajax";?>',
          data: {'plan_id':plan_id,'user_id':user_id},
          success: function(response){

           var data = JSON.parse(response);

           if($.trim(response) != '')
           {
                var fromDate = data.start_date;
                var toDate   = data.end_date;
                var formatFromDate = fromDate.split('-');
                var formatFromDatenew = formatFromDate[1]+'/'+formatFromDate[2]+'/'+formatFromDate[0]; 

                var formatToDate = toDate.split('-');
                var formatToDatenew = formatToDate[1]+'/'+formatToDate[2]+'/'+formatToDate[0];



                $('#statement_f_date').val(formatFromDatenew);
                $('#statement_l_date').val(formatToDatenew);
                $('#statement_min_amount').val('$ '+data.min_due_amt);
                $('#statement_due_date').val();
           }
           else
           {

                $('#statement_f_date').val('');
                $('#statement_l_date').val('');
                $('#statement_min_amount').val('');
                $('#statement_due_date').val('');
           }
          }
        });
}
function get_statement_no()
{
    var plan_id                = $('#plan_table_id').val();
    var user_id                = $('#hidden_user_id_add_note').val();
    $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/get_no_of_statements";?>',
          data: {'plan_id':plan_id,'user_id':user_id},
          success: function(response){
          if($.trim(response) != '')
           {
           var data = JSON.parse(response);
                destory_data_table("#view_statement_no_table");
                $("#view_statement_no_table > tbody").html("");
               $.each(data, function(index, value) {
                   var due_amount='$'+' 0.00';
                   var due_amt=value.statement_due_amount;
                   if(due_amt!=null && due_amt!=''){
                    var due_amount='$ '+formatToCurrency(due_amt);
                   }
                    var tr= '<tr><td class="text-center font-w600 font-size-sm">'+value.statement_plan_name+'</td><td class="text-center font-w600 font-size-sm">'+value.statement_due_date+'</td><td class="text-center font-w600 font-size-sm">'+due_amount+'</td><td><button  class="btn btn-small "><a style="color:#575757!important;"  target="_blank" href='+value.statement_pdf_path+'>Download </a></button></td></tr>';
                    $('#view_statement_no_table tbody').append(tr);
                });
                intializeDatatable("#view_statement_no_table");
           }
          }
        });
}
function closeModal(){
  $('#close_cross').click();
}
function sendUserConfirmationEmail(){
    var user_id = $('#hidden_user_id_profile_update').val();
    var email  = $('#email').val();
    $.ajax({
        url:"<?php echo base_url()?>Admin/sendUserConfirmationEmail",
        type:"post",
        data:{'user_id':user_id,'email':email},
        success:function(response){
            if(response==1){
             var div = '<div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Confirmation Email Send To User Successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                 $('#ajax_div').append( div);
            }
        }
    });
}
function imageValidation() {
    var fileInput = document.getElementById('upload_doc');
    var filePath = fileInput.value;
    var filename_var = filePath.replace(/C:\\fakepath\\/i, '');
    var filename = $.trim(filename_var);
    $('#document_filename').html('Selected File : ' +filename);
    // Allowing file type 
    var allowedExtensions = /(\.rtf|\.docx|\.doc|\.pdf)$/i;
    if (!allowedExtensions.exec(filePath)) {
        $('#error_upload_doc').fadeIn().delay(3000).fadeOut();
        $('#error_upload_doc').html('Please upload the file with docx/rtf/doc/pdf file formats');
        fileInput.value = '';
        return false;
    } else {
        $('#error_upload_doc').css('display', 'none');
        $('#error_upload_doc').html('');
    }
}
function opendelmodal(that,id){
    // send id to modal hidden field
    $('#hidden_delete_id').val(id);
    $('#modal-edit-del').modal('show');
}
function delete_docs()
{
    // check if password field is blank or not 
    var adminPaswd = $('#admin_password').val();
    var documentId = $('#hidden_delete_id').val();
    if(adminPaswd)
    {
        // run ajax to check the username exists or nor 
            $.ajax({
                url:"<?php echo base_url()?>Admin/delete_doc_record",
                type:"post",
                data:{'id':documentId,'adminPaswd':adminPaswd},
                success:function(response){
                    if($.trim(response)==1){
                        display_documents();
                        $('#close_modal_delete').click();
                     var div = '<div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Document Deleted Successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                         $('#ajax_div').append( div);
                    }else if($.trim(response)==0){
                        display_documents();
                     var div = '<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Error</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please check your password and try again.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                         $('#ajax_div').append( div);
                    }
                }
        });
    }

}
</script>
