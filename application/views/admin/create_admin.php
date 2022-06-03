<!-- Main Container -->
<style type="text/css">
.font_size {
    font-size: 10px;
    font-weight: 600;
}
</style>
<main id="main-container">

    <!-- Hero -->
    <div class="content ">
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Admin Management</li>
                <?php if(isset($fetch_other_admin_details)){?><li class="breadcrumb-item">Edit Admin</li>
                <?php } else {?>
                <li class="breadcrumb-item">Create Admin</li>
                <?php } ?>
            </ol>
        </nav>
    </div>

    <!-- END Hero -->
    <!-- Page Content -->

    <div class="content content-full">

        <!-- User Profile -->

        <div class="block">

            <div class="block-header">

                <?php if(!isset($fetch_other_admin_details)){?><h3 class="block-title">Admin Details</h3><?php } ?>


            </div>

            <div class="block-content">
                <?php if(isset($fetch_other_admin_details)){?><ul class="nav nav-tabs nav-tabs-block "
                    data-toggle="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#adminDetails">Admin Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#adminAccess" data-toggle="admin_access_table_tab">Admin Accesses</a>
                    </li>
                </ul><?php } ?>
                <div id="createAdminMessage"></div>
                <div class="block-content tab-content overflow-hidden">
                    <div class="tab-pane fade tab-pane fade active show" id="adminDetails" role="tabpanel">
                        <div class="row">
                            <div class="block-content block-content-full">
                                <form id="createAdminForm" method="POST" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <!---Row 1 --->
                                        <div class="col-md-6">
                                            <input type="hidden" id="admin_id" name="admin_id"
                                                value="<?php if(isset($fetch_other_admin_details)){echo $fetch_other_admin_details[0]['id'];}?>">
                                            <label for="one-profile-edit-username">First Name <span style="color:red">* </span></label>
                                            <input type="text" name="first_name"
                                                value="<?php if(isset($fetch_other_admin_details)){echo $fetch_other_admin_details[0]['first_name'];}?>"
                                                id="firstName" class="form-control text-capitalize"
                                                placeholder="First Name">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;"
                                                class="font_size form-group alert alert-danger" id="error_first_name"
                                                role="alert"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="one-profile-edit-username">Middle Name</label>
                                            <input type="text" name="middle_name"
                                                value="<?php if(isset($fetch_other_admin_details)){echo $fetch_other_admin_details[0]['middle_name'];}?>"
                                                id="middleName" class="form-control text-capitalize"
                                                placeholder="Middle Name">
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <!---Row 1 --->
                                        <div class="col-md-6">
                                            <label for="one-profile-edit-username">Last Name <span style="color:red">* </span></label>
                                            <input type="text" name="last_name"
                                                value="<?php if(isset($fetch_other_admin_details)){echo $fetch_other_admin_details[0]['last_name'];}?>"
                                                id="lastName" class="form-control text-capitalize"
                                                placeholder="Last Name">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;"
                                                class="font_size form-group alert alert-danger" id="error_last_name"
                                                role="alert"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="one-profile-edit-name">Email <span style="color:red">* </span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email"
                                                value="<?php if(isset($fetch_other_admin_details)){echo $fetch_other_admin_details[0]['username'];}?>"
                                                autocomplete="off"
                                                <?php if(isset($fetch_other_admin_details)){ echo 'readonly';} else{ echo 'onkeyup="checkEmail(this.value);"' ;}?>>
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;"
                                                class="font_size form-group alert alert-danger" id="error_email"
                                                role="alert"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <!---Row 2 --->
                                        <div class="col-md-6">
                                            <label for="one-profile-edit-name">Password <?php if(!isset($fetch_other_admin_details)){?><span style="color:red">* </span><?php } ?></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" value="" autocomplete="off"
                                                onkeyup="passwordValidation(this.value);">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;"
                                                class="font_size form-group alert alert-danger" id="error_password"
                                                role="alert"></p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="one-profile-edit-name">Confirm Password <?php if(!isset($fetch_other_admin_details)){?><span style="color:red">* </span><?php } ?></label>
                                            <input type="password" class="form-control" id="c_password"
                                                name="c_password" placeholder="Confirm Password" value=""
                                                autocomplete="off">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;"
                                                class="font_size form-group alert alert-danger" id="error_c_password"
                                                role="alert"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <!--  <label for="one-profile-edit-email">Profile Image</label>
                                            <input type="file" name="profile_image" id="profile_image" value=""
                                                class="form-control" onchange="imageValidation();"> -->
                                            <label for="one-profile-edit-email">Profile Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control"
                                                    data-toggle="custom-file-input" name="profile_image"
                                                    id="profile_image" onchange="return imageValidation();">
                                                <label class="custom-file-label" for="one-profile-edit-avatar">Choose Image</label>

                                            </div>




                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;"
                                                class="font_size form-group alert alert-danger" id="error_profile_image"
                                                role="alert"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="one-profile-edit-dob">Date of Birth <span style="color:red">* </span></label>
                                            <input type="text" class="form-control" id="dob" name="dob"
                                                required="required"
                                                value="<?php if(isset($fetch_other_admin_details)){ if($fetch_other_admin_details[0]['dob']!='' and $fetch_other_admin_details[0]['dob']!='0000-00-00'){echo date('d/m/Y',strtotime($fetch_other_admin_details[0]['dob']));}}?>"
                                                readonly="readonly" placeholder="Date Of Birth">
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;"
                                                class="font_size form-group alert alert-danger" id="error_dob"
                                                role="alert"></p>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <!---Row 2 --->
                                        <div class="col-md-6">
                                            <label for="one-profile-edit-email"></label>
                                            <?php if(isset($fetch_other_admin_details)){?>
                                            <input type="button" name="createAdminButton" id="createAdminButton"
                                                value="Back" class="btn btn-info" onclick="return backToAdminList();">
                                            <input type="submit" name="createAdminButton_1" id="createAdminButton_1"
                                                value="Update" class="btn btn-info"
                                                onclick="return updateValidate(event);">

                                            <?php } else {?>
                                            <input type="submit" name="createAdminButton" id="createAdminButton"
                                                value="Create" class="btn btn-info" onclick="return validate(event);">
                                            <?php }?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="adminAccess" role="tabpanel">
                        <div class="block-content block-content-full">
                            <table id="admin_access_table"
                                class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap"
                                style="width:100%!important">
                                <thead>
                                    <tr role="row">
                                        <th style="width:10%;" class="text-center">ID</th>
                                        <th style="width:20%;" class="text-center text-capitalize">Tab Name
                                        </th>
                                        <th style="width:30%;" class="text-center text-capitalize">Tab
                                            Description
                                        </th>
                                        <th style="width:40%;" class="text-center text-capitalize">Admin Accesses Level
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                                    if (isset($tab_rights_details))
                                                    {
                                                        $count =1; 
                                                        foreach($tab_rights_details as $tab) 
                                                            { 
                                                    ?>
                                    <tr>
                                        <td class="text-center font-size-sm">
                                            <?php echo $count++ ?></td>
                                        <td class="text-center font-size-sm text-capitalize">
                                            <?php echo $tab['tab_name']; ?></td>
                                        <td class="text-center font-size-sm text-capitalize">
                                            <?php echo $tab['tab_description']; ?></td>
                                        <td class="text-center font-size-sm text-capitalize">
                                            <input type="checkbox"
                                                id="<?php echo 'view_check_box_'.$tab['tab_list_id'];?>"
                                                name="view_right" value="<?php echo $tab['tab_list_id'];?>"
                                                <?php if(isset($tab['user_id']))if($tab['user_id']==$fetch_other_admin_details[0]['id'] && $tab['view_right']=='1'){ echo "checked='checked'";} else{ echo '';}?>
                                                onchange="viewRightToTheAdmin('<?php echo $tab['tab_list_id'];?>','<?php echo $fetch_other_admin_details[0]['id'];?>')">
                                            View Only
                                            <input type="checkbox"
                                                id="<?php echo 'edit_check_box_'.$tab['tab_list_id'];?>"
                                                name="edit_add_right" value="<?php echo $tab['tab_list_id'];?>"
                                                <?php if(isset($tab['user_id']))if($tab['user_id']==$fetch_other_admin_details[0]['id'] && $tab['edit_right']=='1'){ echo "checked='checked'";} else{ echo '';}?>
                                                onchange="editAddRightToTheAdmin('<?php echo $tab['tab_list_id'];?>','<?php echo $fetch_other_admin_details[0]['id'];?>')">
                                            Edit/Add Only
                                            <input type="checkbox" id="<?php echo 'check_box_'.$tab['tab_list_id'];?>"
                                                name="all_rights" value="<?php echo $tab['tab_list_id'];?>"
                                                <?php if(isset($tab['user_id']))if($tab['user_id']==$fetch_other_admin_details[0]['id'] && $tab['all_rights']=='1'){ echo "checked='checked'";} else{ echo '';}?>
                                                onchange="grantAllRights('<?php echo $tab['tab_list_id'];?>','<?php echo $fetch_other_admin_details[0]['id'];?>');">
                                            All Rights
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

            <!-- END User Profile -->

        </div>
    </div>

    <!-- END Page Content -->

</main>

<!-- END Main Container -->
<script type="text/javascript">
function close_dialog5() {
    $('#main_dialog_box5').css('display', 'none');
}

function backToAdminList() {
    window.location.href = "<?php echo base_url()?>view-admin-list";
}

function updateValidate(e) {
    e.preventDefault();
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var first_name = $('#firstName').val();
    var last_name = $('#lastName').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var c_password = $('#c_password').val();
    var dob = $('#dob').val();
    if (first_name == '' && last_name == '' && email == '' && dob) {
        $('#error_email').fadeIn().delay(3000).fadeOut();
        $('#error_email').html('Required*');
        $('#error_last_name').fadeIn().delay(3000).fadeOut();
        $('#error_last_name').html('Required*');
        $('#error_first_name').fadeIn().delay(3000).fadeOut();
        $('#error_first_name').html('Required*');
        $('#error_dob').fadeIn().delay(3000).fadeOut();
        $('#error_dob').html('Required*');
        return false;
    }
    if (first_name == '') {
        $('#error_first_name').fadeIn().delay(3000).fadeOut();
        $('#error_first_name').html('Required*');
        return false;
    } else {
        $('#error_first_name').css('display', 'none');
        $('#error_first_name').html('');
    }
    if (last_name == '') {
        $('#error_last_name').fadeIn().delay(3000).fadeOut();
        $('#error_last_name').html('Required*');
        return false;
    } else {
        $('#error_last_name').css('display', 'none');
        $('#error_last_name').html('');
    }
    if (email == '') {
        $('#error_email').fadeIn().delay(3000).fadeOut();
        $('#error_email').html('Required*');
        return false;
    } else {
        $('#error_email').css('display', 'none');
        $('#error_email').html('');
    }
    if (!emailReg.test(email)) {
        $('#error_email').fadeIn().delay(3000).fadeOut();
        $('#error_email').html('Please enter valid email');
        return false;
    } else {
        $('#error_email').css('display', 'none');
        $('#error_email').html('');
    }
    if (password != c_password && (password != '' || c_password != '')) {
        $('#error_c_password').fadeIn().delay(3000).fadeOut();
        $('#error_c_password').html('Please enter the confirm password same as password.');
        return false;
    } else {
        $('#error_c_password').css('display', 'none');
        $('#error_c_password').html('');
    }
    if (dob == '') {
        $('#error_dob').fadeIn().delay(3000).fadeOut();
        $('#error_dob').html('Required*');
        return false;
    } else {
        $('#error_dob').css('display', 'none');
        $('#error_dob').html('');
    }
    if (first_name && last_name && email && dob) {
        $('#error_c_password').css('display', 'none');
        $('#error_password').css('display', 'none');
        $('#error_last_name').css('display', 'none');
        $('#error_email').css('display', 'none');
        $('#error_first_name').css('display', 'none');
        $('#error_dob').css('display', 'none');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Admin/updateOtherAdmin",
            contentType: false,
            processData: false,
            data: new FormData($('#createAdminForm')[0]),
            success: function(response) {
                if (response == 1) {

                    var msgData =
                        '<div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Admin updated successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                    $("#createAdminMessage").html(msgData);
                } else {
                    var msgData =
                        '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Error while update the admin</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                }
            }
        });
    }
}

function validate(e) {
    e.preventDefault();
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var first_name = $('#firstName').val();
    var last_name = $('#lastName').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var c_password = $('#c_password').val();
    var dob = $('#dob').val();
    if (first_name == '' && last_name == '' && email == '' && password == '' && c_password == '' && dob == '') {
        $('#error_c_password').fadeIn().delay(3000).fadeOut();
        $('#error_c_password').html('Required*');
        $('#error_password').fadeIn().delay(3000).fadeOut();
        $('#error_password').html('Required*');
        $('#error_email').fadeIn().delay(3000).fadeOut();
        $('#error_email').html('Required*');
        $('#error_last_name').fadeIn().delay(3000).fadeOut();
        $('#error_last_name').html('Required*');
        $('#error_first_name').fadeIn().delay(3000).fadeOut();
        $('#error_first_name').html('Required*');
        $('#error_dob').fadeIn().delay(3000).fadeOut();
        $('#error_dob').html('Required*');
        return false;
    }

    if (first_name == '') {
        $('#error_first_name').fadeIn().delay(3000).fadeOut();
        $('#error_first_name').html('Required*');
        return false;
    } else {
        $('#error_first_name').css('display', 'none');
        $('#error_first_name').html('');
    }
    if (last_name == '') {
        $('#error_last_name').fadeIn().delay(3000).fadeOut();
        $('#error_last_name').html('Required*');
        return false;
    } else {
        $('#error_last_name').css('display', 'none');
        $('#error_last_name').html('');
    }
    if (email == '') {
        $('#error_email').fadeIn().delay(3000).fadeOut();
        $('#error_email').html('Required*');
        return false;
    } else {
        $('#error_email').css('display', 'none');
        $('#error_email').html('');
    }
    if (!emailReg.test(email)) {
        $('#error_email').fadeIn().delay(3000).fadeOut();
        $('#error_email').html('Please enter valid email');
        return false;
    } else {
        $('#error_email').css('display', 'none');
        $('#error_email').html('');
    }
    if (password == '') {
        $('#error_password').fadeIn().delay(3000).fadeOut();
        $('#error_password').html('Required*');
        return false;
    } else {
        $('#error_password').css('display', 'none');
        $('#error_password').html('');
    }
    if (c_password == '') {
        $('#error_c_password').fadeIn().delay(3000).fadeOut();
        $('#error_c_password').html('Required*');
        return false;
    } else {
        $('#error_c_password').css('display', 'none');
        $('#error_c_password').html('');
    }
    if (password != c_password) {
        $('#error_c_password').fadeIn().delay(3000).fadeOut();
        $('#error_c_password').html('Please enter the confirm password same as password.');
        return false;
    } else {
        $('#error_c_password').css('display', 'none');
        $('#error_c_password').html('');
    }
    if (dob == '') {
        $('#error_dob').fadeIn().delay(3000).fadeOut();
        $('#error_dob').html('Required*');
        return false;
    } else {
        $('#error_dob').css('display', 'none');
        $('#error_dob').html('');
    }
    if (first_name && last_name && email && password && c_password && dob) {
        $('#error_c_password').css('display', 'none');
        $('#error_password').css('display', 'none');
        $('#error_last_name').css('display', 'none');
        $('#error_email').css('display', 'none');
        $('#error_first_name').css('display', 'none');
        $('#error_dob').css('display', 'none');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Admin/storeAdmin",
            contentType: false,
            processData: false,
            data: new FormData($('#createAdminForm')[0]),
            success: function(response) {
                if (response == 1) {
                    document.getElementById('createAdminForm').reset();
                    var msgData =
                        '<div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Admin created successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                    $("#createAdminMessage").html(msgData);
                } else if (response == 2) {
                    var msgData =
                        '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Email Already Exist.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                } else {
                    var msgData =
                        '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Error while create the new admin</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                }
            }
        });
    }
}
//////// EMAIL MATCH SCRIPT ///////////////
function passwordValidation(value) {
    var txtInput = value;
    var color = "Red";
    var uppercase = /[A-Z]/;
    var lowercase = /[a-z]/;
    var number = /[0-9]/;
    var special = /[\W]{1,}/;
    var pswd_length = txtInput.length < 8;
    if (!uppercase.test(txtInput) || !lowercase.test(txtInput) || !number.test(txtInput) || !special.test(txtInput) ||
        pswd_length) {
        $('#error_password').css('display', 'block');
        $('#error_password').html(
            'Password must be at least 8 characters. Password must contain at least one upper case letter, one lower case letter , one special character and one digit.'
        );
        $('#c_password').prop("disabled", true);
        $('#createAdminButton').prop("disabled", true);
        return false;
    } else {
        $('#error_password').css('display', 'none');
        $('#error_password').html("");
        $('#c_password').prop("disabled", false);
        $('#createAdminButton').prop("disabled", false);
    }
}

function imageValidation() {
    var fileInput = document.getElementById('profile_image');
    var filePath = fileInput.value;
    // Allowing file type 
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
        $('#error_profile_image').fadeIn().delay(3000).fadeOut();
        $('#error_profile_image').html('Please upload the file with jpg/jpeg/png/gif file formats');
        fileInput.value = '';
        return false;
    } else {
        $('#error_profile_image').css('display', 'none');
        $('#error_profile_image').html('');

    }
}

function checkEmail(check_email) {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url();?>Admin/checkEmail",
        data: {
            'username': check_email
        },
        success: function(response) {
            if (response == 1) {
                $("#createAdminButton").attr("disabled", true);
                $('#error_email').css('display', 'block');
                $('#error_email').html('Email already exist.');
            } else if (response == 0) {
                $("#createAdminButton").attr("disabled", false);
                $('#error_email').html('');
                $('#error_email').css('display', 'none');
            }
        }
    });
}

function grantAllRights(tab_id, user_id) {
    var check_tab_id = $('#check_box_' + tab_id).is(":checked");
    if (check_tab_id == true) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url();?>Admin/grantAllRights",
            data: {
                'tab_id': tab_id,
                'user_id': user_id
            },
            success: function(result) {
                if (result == 1) {
                    var msgData =
                        '<div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Granted all rights to admin successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                    $("#createAdminMessage").html(msgData);
                } else {
                    var msgData =
                        '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Error while  assign the all rights to the admin</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                }
            }
        });
    } else {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url();?>Admin/revokeAllRights",
            data: {
                'tab_id': tab_id,
                'user_id': user_id
            },
            success: function(result) {
                if (result == 1) {

                    var msgData =
                        '<div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Revoke all rights from the admin successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                    $("#createAdminMessage").html(msgData);
                } else {
                    var msgData =
                        '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Error while revoke the all rights from the admin</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                }
            }
        });
    }
}

function editAddRightToTheAdmin(tab_id, user_id) {
    var check_tab_id = $('#edit_check_box_' + tab_id).is(":checked");
    if (check_tab_id == true) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url();?>Admin/editAddRightToTheAdmin",
            data: {
                'tab_id': tab_id,
                'user_id': user_id
            },
            success: function(result) {
                if (result == 1) {
                    var msgData =
                        '<div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Granted add/edit right to admin successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                    $("#createAdminMessage").html(msgData);
                } else {
                    var msgData =
                        '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Error while assign the Edit/Add right to the admin</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                }
            }
        });
    } else {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url();?>Admin/RevokeEditAddRightFromTheAdmin",
            data: {
                'tab_id': tab_id,
                'user_id': user_id
            },
            success: function(result) {
                if (result == 1) {
                    var msgData =
                        '<div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Revoke edit/add right from the admin successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                } else {
                    var msgData =
                        '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Error while revoke the Edit/Add right from the admin</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                }
            }
        });
    }
}

function viewRightToTheAdmin(tab_id, user_id) {
    var check_tab_id = $('#view_check_box_' + tab_id).is(":checked");
    if (check_tab_id == true) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url();?>Admin/viewRightToTheAdmin",
            data: {
                'tab_id': tab_id,
                'user_id': user_id
            },
            success: function(result) {
                if (result == 1) {
                    var msgData =
                        '<div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Granted view right to the admin successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                    $("#createAdminMessage").html(msgData);
                } else {
                    var msgData =
                        '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Error while assign the View right to the admin</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                }
            }
        });
    } else {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url();?>Admin/revokeViewRightFromTheAdmin",
            data: {
                'tab_id': tab_id,
                'user_id': user_id
            },
            success: function(result) {
                if (result == 1) {
                    var msgData =
                        '<div id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Revoke view right from the admin successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                    $("#createAdminMessage").html(msgData);
                } else {
                    var msgData =
                        '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Error while revoke the View right from the admin</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                    $("#createAdminMessage").html(msgData);
                }
            }
        });
    }
}
</script>