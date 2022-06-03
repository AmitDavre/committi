<!-- Main Container -->
<div>
        <main id="main-container">

            <!-- Hero -->
                <div class="content ">
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item">Invite </li>
                            </ol>
                        </nav>
                </div>

            <!-- END Hero -->
            <!-- Page Content -->

            <div class="content content">


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
                            <div id="swal2-content" class="swal2-html-container" style="display: block;">Please Enter The Email.
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
                <div id="ajax_sucess_div"></div>
                <input type="hidden" name="hidden_user_id" id="hidden_user_id" value="<?php echo $session_data['id'];?>">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">Invite a Friend</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="email" class="form-control" id="invite_email" name="invite_email" placeholder="Enter email here.." required="required" autocomplete="off">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info" onclick="invite_friend();">Invite</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                    
                        </div>  
                    </div>
                </div>
            </div>
            <!-- END User Profile -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

<script type="text/javascript">
    








    function invite_friend()
    {
         var invite_email = $('#invite_email').val();
         var hidden_user_id = $('#hidden_user_id').val();

         if(invite_email==''){
             $('#empty_field_error').css('display','block');
            return false;
         }

          $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."User/invite_a_friend";?>',
          data: {'invite_email':invite_email,'hidden_user_id':hidden_user_id},
          success: function(response){

           var data = JSON.parse(response);

           if(response != '')
           {
             $('#invite_email').val('');

             var div = '<div id="main_dialog_box_invite" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Invite sent successfully.<br>An email has sent to the user. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

                $('#ajax_sucess_div').after(div);


           }
          }
        }); 

    }
    function close_dialog()
    {
        $('#main_dialog_box_invite').css('display','none');
    }

    function empty_field_dialog(){
         $('#empty_field_error').css('display','none');
    }



</script>