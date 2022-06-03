<?php 
$tier                           = $this->config->item('tier');
$bidding_cycle                  = $this->config->item('bidding_cycle');
$status                         = $this->config->item('status');
$no_of_bidding_cycle            = $this->config->item('no_of_bidding_cycle');

?>

<!-- Main Container -->
<style type="text/css">
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
                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                <li class="breadcrumb-item">Admin Management</li>
                <li class="breadcrumb-item">View Admin</li>
            </ol>
        </nav>
    </div>

    <!-- END Hero -->



    <!-- Page Content -->

    <div class="content content">

        <div class="block">
            <div class="block-header">
                <div id="deleteAdminMessage"></div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-simple class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
              
                        <table id="view_other_admin_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                <thead>
                                    <tr role="row" class="text-nowrap">
                                        <th style="width:10%;" class="text-center">ID</th>
                                        <th style="width:15%;">First Name</th>
                                        <th style="width:15%;">Last Name</th>
                                        <th style="width:10%;">Email ID</th>
                                        <th style="width:15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if ($fetch_other_admin_details != '')
                                    {
                                        $count =1; 
                                        foreach($fetch_other_admin_details as $admin)
                                            { 
                                    ?>
                                    <input type="hidden" name="admin_id"
                                        value="<?php echo base64_encode($admin['id'])?>" id="admin_id">
                                    <tr role="row" class="odd" id="admin_row_<?php echo $admin['id']?>">
                                        <td class="text-center font-size-sm"><?php echo $count++; ?></td>
                                        <td class="text-center font-size-sm text-capitalize">
                                            <?php echo $admin['first_name']; ?></td>
                                        <td class="text-center font-size-sm text-capitalize">
                                            <?php echo $admin['last_name']; ?></td>
                                        <td class="text-center font-size-sm">
                                            <?php echo $admin['username']; ?></td>
                                        <!-- <td class="text-center font-size-sm sorting_1 text-capitalize"></td> -->
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button"
                                                    onclick=" return viewAdminForm('<?php echo base64_encode($admin['id']); ?>');"
                                                    class="btn-sm btn-info js-tooltip-enabled" data-toggle="tooltip" title=""
                                                    data-original-title="Edit"
                                                    style="color: #fff;">
                                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                                </button>
                                                <button type="button" data-target="#confirmToDelete<?php echo $admin['id']?>" data-toggle="modal"
                                                    class="btn-sm btn-info js-tooltip-enabled" data-toggle="tooltip" title=""
                                                    data-original-title="Delete"
                                                    style="color: #fff;margin-left:25px;">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                        </td>
                                        <div class="modal fade confirmToDelete" id="confirmToDelete<?php echo $admin['id']?>" tabindex="-1" role="dialog"
                                            aria-labelledby="modal-block-popout" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-popout" role="document">
                                                <div class="modal-content">
                                                    <div class="block block-themed block-transparent mb-0">
                                                        <div class="block-header bg-primary-dark">
                                                            <h3 class="block-title">Delete Confirmation</h3>
                                                            <div class="block-options">
                                                                <button type="button" id="close_cross"
                                                                    class="btn-block-option" data-dismiss="modal"
                                                                    aria-label="Close" onclick="closeModal();">
                                                                    <i class="fa fa-fw fa-times"
                                                                        onclick="closeModal();"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="block-content font-size-sm">
                                                            <p>Are you sure to delete this record?</p>
                                                        </div>
                                                        <br>
                                                        <div
                                                            class="block-content block-content-full text-right border-top">
                                                            <button class="btn btn-sm btn-info" type="button"
                                                                onclick="closeModal();"><i class="fa fa-times mr-1"
                                                                    onclick="closeModal('<?php echo $admin['id']?>');"></i>Cancel</button>
                                                            <button class="btn btn-sm btn-info"
                                                                onclick="deleteOtherAdmin('<?php echo $admin['id']?>');"
                                                                id="deleteOtherAdmin" name="deleteOtherAdmin"
                                                                type="button"><i class="fa fa-check mr-1"
                                                                    onclick="deleteOtherAdmin();"></i>Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
<script>
function closeModal() {
    $('.confirmToDelete').modal('hide');
}

function close_dialog6() {
    $('#main_dialog_box6').css('display', 'none');
}

function delete_close_dialog(admin_id) {
    $('#main_dialog_box6').css('display', 'none');
    $('.modal-backdrop').remove();
    $('#admin_row_' + admin_id).remove();
}

function viewAdminForm(admin_id) {
    window.location.href = "<?php echo base_url()?>view-other-admin/" + admin_id;
}

function deleteOtherAdmin(admin_id) {
    $('#confirmToDelete'+admin_id).hide('modal');
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url()?>Admin/deleteOtherAdmin",
        data: {
            'id': admin_id
        },
        success: function(response) {
            if (response == 1) {
                var msgData =
                    '<div id="main_dialog_box6" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Record Deleted Successfully</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="delete_close_dialog('+admin_id +');">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                $("#deleteAdminMessage").html(msgData);
            } else {
                var msgData =
                    '<div  id="main_dialog_box6" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Error while delete admin</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog6();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                $("#deleteAdminMessage").html(msgData);
            }
        }
    });
}
</script>