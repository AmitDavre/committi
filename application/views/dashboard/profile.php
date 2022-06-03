<?php 
$gender  = $this->config->item('gender');
$options  = $this->config->item('options');
$Province  = $this->config->item('Province');
$HouseHoldIncome  = $this->config->item('HouseHoldIncome');

if($session_data['login_type'] == 'user')
{
?>
<!-- Main Container -->
<style type="text/css">
.auto_capitalize {
    text-transform: capitalize;
}

.color_p_tag {
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
                <li class="breadcrumb-item"><a class="text-muted" href="<?php base_url()?>dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Profile</li>
                <li class="breadcrumb-item">Edit Profile</li>
            </ol>
        </nav>
    </div>

    <!-- END Hero -->
    <!-- Page Content -->

    <div class="content content-full">
        <!-- User Profile -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">User Profile</h3>
            </div>
            <div class="block-content">
            	<div id="main_dialog_box1" class="swal2-container swal2-center swal2-backdrop-show"
                    style="overflow-y: auto; display:none">
                    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                        class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog"
                        aria-live="assertive" aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                            <ul class="swal2-progress-steps" style="display: none;"></ul>
                            <div class="swal2-icon swal2-error" style="display: none;"></div>
                            <div class="swal2-icon swal2-question" style="display: none;"></div>
                            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                <div class="swal2-icon-content">!</div>
                            </div>
                            <div class="swal2-icon swal2-info" style="display: none;"></div>
                            <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image"
                                style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button
                                type="button" class="swal2-close" aria-label="Close this dialog"
                                style="display: none;">×</button>
                        </div>
                        <div class="swal2-content">
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">Please choose the file having jpg|jpeg|png|gif extension!
                                </div><input class="swal2-input" style="display: none;"><input type="file"
                                class="swal2-file" style="display: none;">
                            <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                            <select class="swal2-select" style="display: none;"></select>
                            <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                                class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                                    class="swal2-label"></span></label><textarea class="swal2-textarea"
                                style="display: none;"></textarea>
                            <div class="swal2-validation-message" id="swal2-validation-message"></div>
                        </div>
                        <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1"
                                aria-label="" style="display: inline-block;"
                                onclick="close_image_dialog();">OK</button><button type="button"
                                class="swal2-cancel btn btn-danger m-1" aria-label=""
                                style="display: none;">Cancel</button></div>
                        <div class="swal2-footer" style="display: none;"></div>
                        <div class="swal2-timer-progress-bar-container">
                            <div class="swal2-timer-progress-bar" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <?php if($this->session->flashdata('error')) { ?>
                <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show"
                    style="overflow-y: auto;">
                    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                        class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog"
                        aria-live="assertive" aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                            <ul class="swal2-progress-steps" style="display: none;"></ul>
                            <div class="swal2-icon swal2-error" style="display: none;"></div>
                            <div class="swal2-icon swal2-question" style="display: none;"></div>
                            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                <div class="swal2-icon-content">!</div>
                            </div>
                            <div class="swal2-icon swal2-info" style="display: none;"></div>
                            <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image"
                                style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button
                                type="button" class="swal2-close" aria-label="Close this dialog"
                                style="display: none;">×</button>
                        </div>
                        <div class="swal2-content">
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">Check password
                                again!</div><input class="swal2-input" style="display: none;"><input type="file"
                                class="swal2-file" style="display: none;">
                            <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                            <select class="swal2-select" style="display: none;"></select>
                            <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                                class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                                    class="swal2-label"></span></label><textarea class="swal2-textarea"
                                style="display: none;"></textarea>
                            <div class="swal2-validation-message" id="swal2-validation-message"></div>
                        </div>
                        <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1"
                                aria-label="" style="display: inline-block;"
                                onclick="close_dialog();">OK</button><button type="button"
                                class="swal2-cancel btn btn-danger m-1" aria-label=""
                                style="display: none;">Cancel</button></div>
                        <div class="swal2-footer" style="display: none;"></div>
                        <div class="swal2-timer-progress-bar-container">
                            <div class="swal2-timer-progress-bar" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <?php }else if($this->session->flashdata('profile_update')){ ?>
                <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show"
                    style="overflow-y: auto;">
                    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                        class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog"
                        aria-live="assertive" aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                            <ul class="swal2-progress-steps" style="display: none;"></ul>
                            <div class="swal2-icon swal2-error" style="display: none;"></div>
                            <div class="swal2-icon swal2-question" style="display: none;"></div>
                            <div class="swal2-icon swal2-warning" style="display: none;"></div>
                            <div class="swal2-icon swal2-info" style="display: none;"></div>
                            <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                                <div class="swal2-success-circular-line-left"
                                    style="background-color: rgb(255, 255, 255);"></div><span
                                    class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                                <div class="swal2-success-ring"></div>
                                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                <div class="swal2-success-circular-line-right"
                                    style="background-color: rgb(255, 255, 255);"></div>
                            </div><img class="swal2-image" style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button
                                type="button" class="swal2-close" aria-label="Close this dialog"
                                style="display: none;">×</button>
                        </div>
                        <div class="swal2-content">
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">Profile Updated
                                successfully </div><input class="swal2-input" style="display: none;"><input type="file"
                                class="swal2-file" style="display: none;">
                            <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                            <select class="swal2-select" style="display: none;"></select>
                            <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                                class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                                    class="swal2-label"></span></label><textarea class="swal2-textarea"
                                style="display: none;"></textarea>
                            <div class="swal2-validation-message" id="swal2-validation-message"></div>
                        </div>
                        <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1"
                                aria-label="" style="display: inline-block;"
                                onclick="close_dialog();">OK</button><button type="button"
                                class="swal2-cancel btn btn-danger m-1" aria-label=""
                                style="display: none;">Cancel</button></div>
                        <div class="swal2-footer" style="display: none;"></div>
                        <div class="swal2-timer-progress-bar-container">
                            <div class="swal2-timer-progress-bar" style="display: none;"></div>
                        </div>
                    </div>
                </div>

                <?php } 
                            else if($this->session->flashdata('password_changed')){ ?>
                <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show"
                    style="overflow-y: auto;">
                    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                        class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog"
                        aria-live="assertive" aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                            <ul class="swal2-progress-steps" style="display: none;"></ul>
                            <div class="swal2-icon swal2-error" style="display: none;"></div>
                            <div class="swal2-icon swal2-question" style="display: none;"></div>
                            <div class="swal2-icon swal2-warning" style="display: none;"></div>
                            <div class="swal2-icon swal2-info" style="display: none;"></div>
                            <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                                <div class="swal2-success-circular-line-left"
                                    style="background-color: rgb(255, 255, 255);"></div><span
                                    class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                                <div class="swal2-success-ring"></div>
                                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                <div class="swal2-success-circular-line-right"
                                    style="background-color: rgb(255, 255, 255);"></div>
                            </div><img class="swal2-image" style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button
                                type="button" class="swal2-close" aria-label="Close this dialog"
                                style="display: none;">×</button>
                        </div>
                        <div class="swal2-content">
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">Password
                                Updated successfully </div><input class="swal2-input" style="display: none;"><input
                                type="file" class="swal2-file" style="display: none;">
                            <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                            <select class="swal2-select" style="display: none;"></select>
                            <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                                class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                                    class="swal2-label"></span></label><textarea class="swal2-textarea"
                                style="display: none;"></textarea>
                            <div class="swal2-validation-message" id="swal2-validation-message"></div>
                        </div>
                        <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1"
                                aria-label="" style="display: inline-block;"
                                onclick="close_dialog();">OK</button><button type="button"
                                class="swal2-cancel btn btn-danger m-1" aria-label=""
                                style="display: none;">Cancel</button></div>
                        <div class="swal2-footer" style="display: none;"></div>
                        <div class="swal2-timer-progress-bar-container">
                            <div class="swal2-timer-progress-bar" style="display: none;"></div>
                        </div>
                    </div>
                </div>


                <?php } ?>



                <form action="<?php base_url()?>profile" method="POST" enctype="multipart/form-data">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-4">
                            <label for="one-profile-edit-name">First Name</label>
                            <input type="text" class="auto_capitalize form-control" id="first_name" name="first_name"
                                placeholder="Enter your name.." value="<?php echo $session_data['first_name']?>"
                                readonly="readonly">
                        </div>
                        <div class="col-md-4">
                            <label for="one-profile-edit-name">Middle Name</label>
                            <input type="text" class="auto_capitalize form-control" id="first_name" name="middle_name"
                                placeholder="" value="<?php echo $session_data['middle_name']?>" readonly="readonly">
                        </div>
                        <div class="col-md-4">
                            <label for="one-profile-edit-name">Last Name</label>
                            <input type="text" class="auto_capitalize form-control" id="first_name" name="last_name"
                                placeholder="Enter your name.." value="<?php echo $session_data['last_name']?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-4">
                            <label for="example-select">Gender</label>
                            <select class="form-control" id="user_gender" name="user_gender" readonly="readonly">
                                <?php
                                                    // Iterating through the tier array
                                                    foreach($gender as $key =>$item)
                                                    {
                                                        if($key == $session_data['user_gender'])
                                                            {?>
                                <option value="<?php  echo strtolower($key);?>">
                                    <?php echo $item;?>
                                </option>
                                <?php   }
                                                    }?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="example-select">SIN</label>
                            <input type="hidden" name="hidden_SinVal" id="hidden_SinVal"
                                value="<?php echo $session_data['user_sin']?>">
                            <input type="text" class="form-control profileuser_sin_profile" id="user_sin_profile"
                                name="user_sin" value="" maxlength="11" autocomplete="off"
                                onkeypress="return isNumber(event);" readonly="readonly">
                            <p id="sin_error" class="color_p_tag"></p>
                        </div>
                        <div class="col-md-4">
                            <label for="example-select">Date Of Birth</label>
                            <input type="hidden" name="hidden_date_of_birth" id="hidden_date_of_birth"
                                value="<?php echo $session_data['user_dob']?>">
                            <input type="text" class="form-control" id="user_date_of_birth" name="user_date_of_birth"
                                readonly="readonly" value="">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-4">
                            <label for="example-select">Phone Number</label>
                            <input type="text" class="form-control profile_phone_error" id="user_phone_number"
                                name="user_phone_number" value="<?php echo $session_data['user_phone_no']?>"
                                onkeypress="return isNumber(event)" maxlength="14" autocomplete="off">
                            <p id="phone_profile_error" class="color_p_tag"></p>
                        </div>
                        <div class="col-md-4">
                            <label for="one-profile-edit-email">Email Address</label>

                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter your email.." value="<?php echo $session_data['username']?>"
                                readonly="readonly">
                        </div>
                        <div class="col-md-4">
                            <label for="one-profile-edit-username">Username</label>

                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter your username.." value="<?php echo $session_data['username']?>"
                                readonly="readonly">
                            <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $session_data['id']?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-4">
                            <label for="example-select">Street No.</label>
                            <input type="text" class="auto_capitalize form-control" id="user_street" name="user_street"
                                value="<?php echo $session_data['usert_street']?>">
                        </div>
                        <div class="col-md-4">
                            <label for="example-select">Street Name</label>
                            <input type="text" class="user_street_name_edit_profile auto_capitalize form-control"
                                id="user_street_name" name="user_street_name"
                                value="<?php echo $session_data['user_street_name']?>">
                            <p id="street_name_error_edit_profile" class="color_p_tag"></p>

                        </div>
                        <div class="col-md-4">
                            <label for="example-select">App/Suite/Unit </label>
                            <input type="text" class="auto_capitalize form-control" id="user_suite" name="user_suite"
                                value="<?php echo $session_data['user_unit_no']?>">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-4">
                            <label for="example-select">City</label>
                            <input type="text" class="auto_capitalize form-control" id="user_city" name="user_city"
                                value="<?php echo $session_data['user_city']?>">
                        </div>
                        <div class="col-md-4">
                            <label for="example-select">Province </label>
                            <select class="form-control" id="user_provience" name="user_provience">
                                <?php foreach($Province as $key => $item){?>
                                <option value="<?php  echo strtolower($key);?>"
                                    <?php echo (strtolower($key) ==  $session_data['user_provience']) ? 'selected' : '' ?>>
                                    <?php echo $item;?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="example-select">Postal Code</label>
                            <input type="text" class="form-control user_postal_profile" id="user_postal_code"
                                name="user_postal_code" value="<?php echo $session_data['user_postal_code']?>"
                                maxlength="7" style="text-transform: uppercase;">
                            <p style="margin-bottom: 0;" id="postal_code_error" class="color_p_tag"></p>
                            <p style="margin-top: 0;" id="postal_code_errors" class="color_p_tag"></p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-4">
                            <label for="example-select">Gross Annual Household Income</label>

                            <select class="form-control" id="user_annual_income" name="user_annual_income">
                                <?php foreach($HouseHoldIncome as $key => $item){?>
                                <option value="<?php  echo strtolower($key);?>"
                                    <?php echo (strtolower($key) ==  $session_data['user_gross_income']) ? 'selected' : '' ?>>
                                    <?php echo $item;?>
                                </option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="example-select">Residential Status</label>

                            <select class="form-control" id="user_residential" name="user_residential">
                                <!-- <?php foreach($options as $key => $item){?>
                                <option value="<?php  echo strtolower($key);?>"
                                    <?php echo (strtolower($key) ==  $session_data['user_residential_status']) ? 'selected' : '' ?>>
                                    <?php echo $item;?>
                                </option>
                                <?php }?> -->
                                <option value="">Please select</option>
                                <?php if(isset($residential_data)) {
                                   foreach ($residential_data as $residential) {?>
                               <option value="<?php echo $residential->dropdown_values_id;?>" <?php if($session_data['user_residential_status']==$residential->dropdown_values_id){ echo 'selected';}else {echo '';}?>><?php echo $residential->dropdown_values_name;?></option>
                               <?php }} ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="example-select">Employment Status</label>

                            <select class="form-control" id="user_employment_status" name="user_employment_status">
                                <?php foreach($options as $key => $item){?>
                                <option value="<?php  echo strtolower($key);?>"
                                    <?php echo (strtolower($key) ==  $session_data['user_employment_status']) ? 'selected' : '' ?>>
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
                               <!--  <?php foreach($options as $key => $item){?>
                                <option value="<?php  echo strtolower($key);?>"
                                    <?php echo (strtolower($key) ==  $session_data['user_planning']) ? 'selected' : '' ?>>
                                    <?php echo $item;?>
                                </option>
                                <?php }?> -->
                                <option value="">Please select</option>
                                   <?php if(isset($joining_committi_data)) {
                                  foreach ($joining_committi_data as $joining_committi_value) {?>
                              <option value="<?php echo $joining_committi_value->dropdown_values_id;?>" <?php if($session_data['user_planning']==$joining_committi_value->dropdown_values_id){ echo 'selected';}else {echo '';}?>><?php echo $joining_committi_value->dropdown_values_name;?></option>
                                    <?php }} ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="example-select">How Soon You Need The Funds ?</label>

                            <select class="form-control" id="user_funds_time" name="user_funds_time">
                                <?php foreach($options as $key => $item){?>
                                <option value="<?php  echo strtolower($key);?>"
                                    <?php echo (strtolower($key) ==  $session_data['user_fund_time']) ? 'selected' : '' ?>>
                                    <?php echo $item;?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px;display: none;">
                        <div class="col-md-4">
                            <label>Your Avatar</label>

                            <div class="push">

                                <img class="img-avatar"
                                    src="assets/media/profile_images/<?php echo $session_data['profile_image']?>"
                                    alt="">

                            </div>

                            <div class="custom-file">
                                <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->

                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="upload"
                                    name="upload" onchange="return imageValidation();">
                                <label class="custom-file-label" for="one-profile-edit-avatar">Choose A New
                                    Avatar</label>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-4">
                            <button style="color: #fff;" type="submit" name="submit" id="submit" class="btn btn-info">

                                Update

                            </button>
                        </div>
                    </div>

                </form>

            </div>

        </div>

        <!-- END User Profile -->

    </div>

    <!-- END Page Content -->

</main>

<!-- END Main Container -->
<script type="text/javascript">
function close_dialog() {
    $('#main_dialog_box').css('display', 'none');
}

function blanKthEFiEld() {
    $('#user_sin_profile').val('');
}
</script>

<?php }else { 
        if(isset($rights)){
        $edit_right=$rights[0]['edit_right'];
        $all_rights=$rights[0]['all_rights'];
      }
      else{
          $edit_right="";
          $all_rights="";
      }   ?>

<!-- Main Container -->

<main id="main-container">

    <!-- Hero -->

    <div class="content ">

        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a class="text-muted" href="<?php base_url()?>dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Profile</li>
            </ol>
        </nav>
    </div>

    <!-- END Hero -->



    <!-- Page Content -->

    <div class="content content-full">

        <!-- User Profile -->

        <div class="block">

            <div class="block-header">

                <h3 class="block-title">User Profile</h3>

            </div>

            <div class="block-content">
             <div id="main_dialog_box1" class="swal2-container swal2-center swal2-backdrop-show"
                    style="overflow-y: auto; display:none">
                    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                        class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog"
                        aria-live="assertive" aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                            <ul class="swal2-progress-steps" style="display: none;"></ul>
                            <div class="swal2-icon swal2-error" style="display: none;"></div>
                            <div class="swal2-icon swal2-question" style="display: none;"></div>
                            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                <div class="swal2-icon-content">!</div>
                            </div>
                            <div class="swal2-icon swal2-info" style="display: none;"></div>
                            <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image"
                                style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button
                                type="button" class="swal2-close" aria-label="Close this dialog"
                                style="display: none;">×</button>
                        </div>
                        <div class="swal2-content">
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">Please choose the file having jpg|jpeg|png|gif extension!
                                </div><input class="swal2-input" style="display: none;"><input type="file"
                                class="swal2-file" style="display: none;">
                            <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                            <select class="swal2-select" style="display: none;"></select>
                            <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                                class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                                    class="swal2-label"></span></label><textarea class="swal2-textarea"
                                style="display: none;"></textarea>
                            <div class="swal2-validation-message" id="swal2-validation-message"></div>
                        </div>
                        <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1"
                                aria-label="" style="display: inline-block;"
                                onclick="close_image_dialog();">OK</button><button type="button"
                                class="swal2-cancel btn btn-danger m-1" aria-label=""
                                style="display: none;">Cancel</button></div>
                        <div class="swal2-footer" style="display: none;"></div>
                        <div class="swal2-timer-progress-bar-container">
                            <div class="swal2-timer-progress-bar" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <?php if($this->session->flashdata('error')) { ?>
                <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show"
                    style="overflow-y: auto;">
                    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                        class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog"
                        aria-live="assertive" aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                            <ul class="swal2-progress-steps" style="display: none;"></ul>
                            <div class="swal2-icon swal2-error" style="display: none;"></div>
                            <div class="swal2-icon swal2-question" style="display: none;"></div>
                            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                <div class="swal2-icon-content">!</div>
                            </div>
                            <div class="swal2-icon swal2-info" style="display: none;"></div>
                            <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image"
                                style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button
                                type="button" class="swal2-close" aria-label="Close this dialog"
                                style="display: none;">×</button>
                        </div>
                        <div class="swal2-content">
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">Check password
                                again!</div><input class="swal2-input" style="display: none;"><input type="file"
                                class="swal2-file" style="display: none;">
                            <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                            <select class="swal2-select" style="display: none;"></select>
                            <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                                class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                                    class="swal2-label"></span></label><textarea class="swal2-textarea"
                                style="display: none;"></textarea>
                            <div class="swal2-validation-message" id="swal2-validation-message"></div>
                        </div>
                        <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1"
                                aria-label="" style="display: inline-block;"
                                onclick="close_dialog();">OK</button><button type="button"
                                class="swal2-cancel btn btn-danger m-1" aria-label=""
                                style="display: none;">Cancel</button></div>
                        <div class="swal2-footer" style="display: none;"></div>
                        <div class="swal2-timer-progress-bar-container">
                            <div class="swal2-timer-progress-bar" style="display: none;"></div>
                        </div>
                    </div>
                </div>
                <?php }else if($this->session->flashdata('success')){ ?>
                <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show"
                    style="overflow-y: auto;">
                    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                        class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog"
                        aria-live="assertive" aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                            <ul class="swal2-progress-steps" style="display: none;"></ul>
                            <div class="swal2-icon swal2-error" style="display: none;"></div>
                            <div class="swal2-icon swal2-question" style="display: none;"></div>
                            <div class="swal2-icon swal2-warning" style="display: none;"></div>
                            <div class="swal2-icon swal2-info" style="display: none;"></div>
                            <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                                <div class="swal2-success-circular-line-left"
                                    style="background-color: rgb(255, 255, 255);"></div><span
                                    class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                                <div class="swal2-success-ring"></div>
                                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                <div class="swal2-success-circular-line-right"
                                    style="background-color: rgb(255, 255, 255);"></div>
                            </div><img class="swal2-image" style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button
                                type="button" class="swal2-close" aria-label="Close this dialog"
                                style="display: none;">×</button>
                        </div>
                        <div class="swal2-content">
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">Profile Updated
                                successfully </div><input class="swal2-input" style="display: none;"><input type="file"
                                class="swal2-file" style="display: none;">
                            <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                            <select class="swal2-select" style="display: none;"></select>
                            <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                                class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                                    class="swal2-label"></span></label><textarea class="swal2-textarea"
                                style="display: none;"></textarea>
                            <div class="swal2-validation-message" id="swal2-validation-message"></div>
                        </div>
                        <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1"
                                aria-label="" style="display: inline-block;"
                                onclick="close_dialog();">OK</button><button type="button"
                                class="swal2-cancel btn btn-danger m-1" aria-label=""
                                style="display: none;">Cancel</button></div>
                        <div class="swal2-footer" style="display: none;"></div>
                        <div class="swal2-timer-progress-bar-container">
                            <div class="swal2-timer-progress-bar" style="display: none;"></div>
                        </div>
                    </div>
                </div>

                <?php }
                    ?>
                    <div id="empty_field_error" class="swal2-container swal2-center swal2-backdrop-show"
                    style="overflow-y: auto; display:none">
                    <div aria-labelledby="swal2-title" aria-describedby="swal2-content"
                        class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog"
                        aria-live="assertive" aria-modal="true" style="display: flex;">
                        <div class="swal2-header">
                            <ul class="swal2-progress-steps" style="display: none;"></ul>
                            <div class="swal2-icon swal2-error" style="display: none;"></div>
                            <div class="swal2-icon swal2-question" style="display: none;"></div>
                            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                <div class="swal2-icon-content">!</div>
                            </div>
                            <div class="swal2-icon swal2-info" style="display: none;"></div>
                            <div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image"
                                style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button
                                type="button" class="swal2-close" aria-label="Close this dialog"
                                style="display: none;">×</button>
                        </div>
                        <div class="swal2-content">
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">Please Enter Your Name.
                                </div><input class="swal2-input" style="display: none;"><input type="file"
                                class="swal2-file" style="display: none;">
                            <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                            <select class="swal2-select" style="display: none;"></select>
                            <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                                class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                                    class="swal2-label"></span></label><textarea class="swal2-textarea"
                                style="display: none;"></textarea>
                            <div class="swal2-validation-message" id="swal2-validation-message"></div>
                        </div>
                        <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1"
                                aria-label="" style="display: inline-block;"
                                onclick="empty_field_dialog();">OK</button><button type="button"
                                class="swal2-cancel btn btn-danger m-1" aria-label=""
                                style="display: none;">Cancel</button></div>
                        <div class="swal2-footer" style="display: none;"></div>
                        <div class="swal2-timer-progress-bar-container">
                            <div class="swal2-timer-progress-bar" style="display: none;"></div>
                        </div>
                    </div>
                </div>
   




                <form action="<?php base_url()?>profile" method="POST" enctype="multipart/form-data">

                    <div class="col-md-12 row push">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="one-profile-edit-username">Username</label>

                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your username.." value="<?php echo $session_data['username']?>"
                                    readonly="readonly">
                                <input type="hidden" name="admin_id" id="admin_id"
                                    value="<?php echo $session_data['id']?>">

                            </div>

                            <div class="form-group">

                                <label for="one-profile-edit-email">Email Address</label>

                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email.." value="<?php echo $session_data['username']?>"
                                    readonly="readonly">

                            </div>

                            <div class="form-group">

                                <label for="one-profile-edit-name">First Name <span style="color:red">* </span></label>

                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="Enter your name.." value="<?php echo $session_data['first_name']?>">

                            </div>

                            <div class="form-group">

                                <button style="color: #fff;" type="submit" name="submit" id="submit_admin_profile"
                                    class="btn btn-info"   <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){ echo '' ;} else { echo 'disabled';}?> onclick="return admin_profile_valdation();">

                                    Update

                                </button>

                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">

                                <label>Your Avatar</label>

                                <div class="push">

                                    <img class="img-avatar"
                                        src="assets/media/profile_images/<?php echo $session_data['profile_image']?>"
                                        alt="">

                                </div>

                                <div class="custom-file">

                                    <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->

                                    <input type="file" class="custom-file-input" data-toggle="custom-file-input"
                                        id="upload" name="upload" onchange="return imageValidation();">

                                    <label class="custom-file-label" for="one-profile-edit-avatar">Choose a new
                                        avatar</label>

                                </div>

                            </div>



                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- END User Profile -->



        <!-- Change Password -->

        <div class="block">

            <div class="block-header">

                <h3 class="block-title">Change Password</h3>

            </div>

            <div class="block-content">

                <form action="<?php base_url()?>change-password" method="POST">
                    <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $session_data['id']?>">


                    <div class="col-md-12 row push">

                        <div class="col-md-6">

                            <div class="form-group row">

                                <div class="col-12">

                                    <label for="one-profile-edit-password-new">New Password <span style="color:red">* </span></label>

                                    <input type="password" class="form-control passwordUser" id="new_password" name="new_password" autocomplete="off">
                                    <p class="text-danger error_password"><p>

                                </div>

                            </div>


                            <div class="form-group">

                                <button style="color: #fff;" type="submit" name="submit" id="submit_password_admin"
                                    class="btn btn-info submit_password" <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){ echo '';} else { echo 'disabled';}?>>

                                    Change Password

                                </button>

                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">

                                <div class="col-12">

                                    <label for="one-profile-edit-password-new-confirm">Confirm New Password <span style="color:red">* </span></label>

                                    <input type="password" class="form-control" id="confirm_new_password"
                                        name="confirm_new_password" autocomplete="off">

                                        <p class="text-danger error_confirm_password"><p>

                                </div>

                            </div>


                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- END Change Password -->

    </div>

    <!-- END Page Content -->

</main>

<!-- END Main Container -->
<script type="text/javascript">
function close_dialog() {
    $('#main_dialog_box').css('display', 'none');
}

function close_image_dialog() {
    $('#main_dialog_box1').css('display','none');
}

function imageValidation() {
    var fileInput = document.getElementById('upload');
    var filePath = fileInput.value;
    // Allowing file type 
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
    	$('#main_dialog_box1').css('display','block');
        fileInput.value = '';
        return false;
    }
}

function admin_profile_valdation(){
    var first_name=$('#first_name').val();
    if(first_name==''){
        $('#empty_field_error').css('display','block');
        return false;
    }
}


function empty_field_dialog(){
    $('#empty_field_error').css('display','none');
}
</script>

<?php } ?>