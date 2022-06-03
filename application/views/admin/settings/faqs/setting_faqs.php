<style type="text/css">
.anchor_css {
    cursor: default;
    text-decoration: none;
    color: black;
}
</style>
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
                <li class="breadcrumb-item">FAQ's</li>
            </ol>
        </nav>
    </div>

    <!-- END Hero -->
    <!-- Page Content -->

    <div class="content content">
        <div class="block">
            <div id="checkRightsMsg"></div>
            <div id="successMsg"></div>
            <p id="alert_message_trans_desc"></p>
            <p id="alert_message_trans_desc_error"></p>
            <p id="alert_message_trans_desc_del"></p>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-5">
                        <!-- <label for="val-select2-multiple">Select2 Multiple</label> -->
                        <select class="js-select2 form-control" id="faqsSelection" name="faqsSelection[]"
                            data-placeholder="Choose FAQ's To Show On The Bidding Page" multiple
                            onchange="return bidding_page_faqs();" style="width:100%;">
                            <?php if($setting_faqs_array){ foreach($setting_faqs_array as $faq){?>
                            <option value="<?php echo $faq->faqs_settings_id;?>"
                                <?php if($faq->faqs_settings_show_faqs_for_bidding_page=='1') { echo 'selected';}?>>
                                <?php echo $faq->faqs_settings_heading;?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="button" style="float: right;" class="btn btn-info" id="saveFaqsSelection"
                            name="saveFaqsSelection" onclick="return saveFaqs();">Save</button>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo base_url()?>add-new-faqs" style="float:right;"
                            class="btn btn-info text-white" id="add_faqs" name="update_faqs">Add New FAQ's</a>
                    </div>
                </div>


                <div class="row">
                    <?php if($setting_faqs_array){
                                $count=0;
                                foreach($setting_faqs_array as $faq) {
                                    $count++;
                                    $faqs_settings_id=base64_encode($faq->faqs_settings_id);
                                    ?>
                    <div class="col-sm-3">
                        <a class="text-muted" href="<?php echo base_url('add-new-faqs/').$faqs_settings_id?>">
                            <div class="block invisible" data-toggle="appear">
                                <div class="block-content block-content-full">
                                    <div class="py-4 text-center">
                                        <div class="item item-2x item-rounded bg-success text-white mx-auto">
                                            <i class="fa fa-2x fa-sticky-note"></i>
                                        </div>
                                        <div class="font-size-h4 font-w600 pt-3 mb-0">FAQ's-<?php echo $count;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } } ?>
                </div>
            </div>

        </div>
    </div>
    <!-- END User Profile -->
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
<script>
function bidding_page_faqs() {
    var selected_faqs_count = $('#faqsSelection option:selected').length;
    if (selected_faqs_count > 4) {
        var data =
            '<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please select only four FAQs !! </span><a href="#" target="_blank" data-notify="url"></a></div>';
        $("#alert_message_trans_desc_error").html(data);
        $("#fadeout_div_desc_error").delay(2000).fadeOut();
        return false;
    }
}

function saveFaqs() {
    var selected_faqs_count = $('#faqsSelection option:selected').length;
    // var selected_faqs_value = $('#faqsSelection option:selected').val;
    if (selected_faqs_count > 4) {
        var data =
            '<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please select only four FAQs !! </span><a href="#" target="_blank" data-notify="url"></a></div>';
        $("#alert_message_trans_desc_error").html(data);
        $("#fadeout_div_desc_error").delay(2000).fadeOut();
        return false;
    }
    var selected_faqs_value = [];
    $.each($("#faqsSelection option:selected"), function() {
        selected_faqs_value.push($(this).val());
    });
    $.ajax({
        url: "<?php echo base_url()?>Admin/saveFaqsForBiddingPage",
        type: "post",
        data: {
            'faqs_setting_ids': selected_faqs_value
        },
        success: function(response) {
            if (response == 1) {
                var msgData =
                    '<div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">FAQs are saved for bidding page successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                $("#successMsg").html(msgData);
            }
        }
    });
}

function close_dialog() {
    $('#main_dialog_box').css('display', 'none');
}
</script>