
<?php  $_SESSION['faqs_token']=md5(session_id() . time());?>


<!-- Main Container -->
<main id="main-container">
    <!-- Hero -->
    <div class="content ">
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>setting">Setting</a>
                </li>
                <li class="breadcrumb-item"><a class="text-muted"
                        href="<?php echo base_url()?>faqs-setting-page">FAQ's</a></li>
                <li class="breadcrumb-item"><?php if($this->uri->segment(2)){?>Edit FAQ's<?php }else{?>Add
                    FAQ's<?php }?> </li>
            </ol>
        </nav>
    </div>

    <!-- END Hero -->
    <!-- Page Content -->

    <div class="content ">
        <div id="checkRightsMsg"></div>
        <p id="alert_message_trans_desc"></p>
        <p id="alert_message_trans_desc_error"></p>
        <p id="alert_message_trans_desc_del"></p>
        <?php if($this->session->flashdata('success_msg')){ ?>
        <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
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
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);">
                        </div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div>
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);">
                        </div>
                    </div><img class="swal2-image" style="display: none;">
                    <h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button"
                        class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
                </div>
                <div class="swal2-content">
                    <div id="swal2-content" class="swal2-html-container" style="display: block;">New FAQ's Added
                        Successfully</div><input class="swal2-input" style="display: none;"><input type="file"
                        class="swal2-file" style="display: none;">
                    <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                    <select class="swal2-select" style="display: none;"></select>
                    <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                        class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                            class="swal2-label"></span></label><textarea class="swal2-textarea"
                        style="display: none;"></textarea>
                    <div class="swal2-validation-message" id="swal2-validation-message"></div>
                </div>
                <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label=""
                        style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button"
                        class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button>
                </div>
                <div class="swal2-footer" style="display: none;"></div>
                <div class="swal2-timer-progress-bar-container">
                    <div class="swal2-timer-progress-bar" style="display: none;"></div>
                </div>
            </div>
        </div>

        <?php } if($this->session->flashdata('update_msg')){ ?>
        <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
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
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);">
                        </div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div>
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);">
                        </div>
                    </div><img class="swal2-image" style="display: none;">
                    <h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button"
                        class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
                </div>
                <div class="swal2-content">
                    <div id="swal2-content" class="swal2-html-container" style="display: block;">FAQ's Updated
                        Successfully</div><input class="swal2-input" style="display: none;"><input type="file"
                        class="swal2-file" style="display: none;">
                    <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                    <select class="swal2-select" style="display: none;"></select>
                    <div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox"
                        class="swal2-checkbox" style="display: none;"><input type="checkbox"><span
                            class="swal2-label"></span></label><textarea class="swal2-textarea"
                        style="display: none;"></textarea>
                    <div class="swal2-validation-message" id="swal2-validation-message"></div>
                </div>
                <div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label=""
                        style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button"
                        class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button>
                </div>
                <div class="swal2-footer" style="display: none;"></div>
                <div class="swal2-timer-progress-bar-container">
                    <div class="swal2-timer-progress-bar" style="display: none;"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <form action="<?php echo base_url();?>add-new-faqs" onsubmit="return validate();" method="POST">
            <div class="block-content-full">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <?php if($this->uri->segment(2)){?>
                        <button type="button" style="float: right;" class="btn btn-danger" id="delete_faqs"
                            name="delete_faqs"
                            onclick="return deleteFaqs('<?php echo $setting_faqs[0]['faqs_settings_id'];?>');">Delete</button>
                        <button type="submit" style="float: right;margin-right:5px;" class="btn btn-info"
                            id="update_faqs" name="update_faqs" onclick="validate();">Update</button>
                    </div>
                    <?php } else {?>
                          <input type="hidden" id="faqs_token" name="faqs_token" value="<?php echo $_SESSION['faqs_token'] ?>">
                    <button type="submit" style="float: right;" class="btn btn-info" id="save_faqs" name="save_faqs"
                        onclick="validate();">Save</button>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="block-content block-content-full">
                    <input type="hidden" name="faqs_settings_id" id="faqs_settings_id"
                        value="<?php if(isset($setting_faqs) && $setting_faqs!='') {echo $setting_faqs[0]['faqs_settings_id'];}else{echo '';}?>">
                    <div class="form-group">
                        <label>FAQ's Heading</label>
                        <textarea id="faqs_settings_heading" class="summernote"
                            name="faqs_settings_heading"><?php if(isset($setting_faqs) && $setting_faqs!='') {echo $setting_faqs[0]['faqs_settings_heading'];}else{echo '';}?></textarea>
                    </div>
                    <div class="form-group">
                        <label>FAQ's Description</label>
                        <textarea id="faqs_settings_description" class="summernote"
                            name="faqs_settings_description"><?php if(isset($setting_faqs) && $setting_faqs!='') {echo $setting_faqs[0]['faqs_settings_description'];}else{echo '';}?></textarea>
                    </div>
                </div>
            </div>

    </div>
    <!-- </form> -->
    <!-- END User Profile -->
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<script type="text/javascript">
function deleteFaqs(faqs_id) {
    $.ajax({
        url: '<?php echo base_url()?>Admin/deleteFaqs',
        type: 'POST',
        data: {
            'faqs_id': faqs_id
        },
        success: function(response) {
            if (response != '') {
                // window.location.href="<?php echo base_url()?>faqs-setting-page";  
                var msgData =
                    '<div id="main_dialog_box2" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">FAQ deleted successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_delete();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                $("#alert_message_trans_desc_del").html(msgData);
            }
        }
    });
}

function validate() {
    var heading = $('#faqs_settings_heading').val();
    var description = $('#faqs_settings_description').val();
    if (heading == '' || description == '') {
        var data =
            '<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please fill all the fields !! </span><a href="#" target="_blank" data-notify="url"></a></div>';
        $("#alert_message_trans_desc_error").html(data);
        $("#fadeout_div_desc_error").delay(2000).fadeOut();
        return false;
    }
}

function close_dialog() {
    $('#main_dialog_box').css('display', 'none');
}

function close_dialog_delete() {
    $('#main_dialog_box2').css('display', 'none');
    window.location.href = "<?php echo base_url()?>faqs-setting-page";
}
</script>