<!-- Main Container -->
<?php 
$bank_account_type                  = $this->config->item('bank_account_type');
?>
<style type="text/css">
        .color_p_tag{
        width: 100%;
        margin-top: .5rem;
        font-size: .875rem;
        color: #d26a5c;
    }
</style>
<div>
        <main id="main-container">

            <!-- Hero -->
                <div class="content ">
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class="text-muted" href="<?php echo base_url()?>payments">Payments </a></li>
                                <li class="breadcrumb-item">Edit Bank Account </li>
                            </ol>
                        </nav>
                </div>

            <!-- END Hero -->
            <!-- Page Content -->

            <div class="content content">
                <p id="alert_message"></p>
                <p id="alert_error_message"></p>
                <form id="valid_edit_bank_form_id" method="post">
                <input type="hidden" name="hidden_bank_id" id="hidden_bank_id" value="<?php echo $bank_account_id_value;?>">
                <div class="block">
                    <div class="block-content block-content-full">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="example-select"> Transit <span style="color:red">* </span></label> 
                                <input type="text" class="form-control" id="transit_number" name="transit_number" placeholder="Enter here" value="<?php echo $reuslt_fetch_bank_accounts['bank_account_transit'];?>" maxlength="5" onkeypress="return isNumber(event)" autocomplete="off">
                                <p class="text-danger error_transit_no"></p>
                            </div>  
                            <div class="col-md-4">
                                <label for="example-select">Institution <span style="color:red">* </span></label> 
                                <input type="text" class="form-control" id="institution_no" name="institution_no" placeholder="Enter here" value="<?php echo $reuslt_fetch_bank_accounts['bank_account_institution'];?>" maxlength="3" onkeypress="return isNumber(event)" autocomplete="off">
                                 <p class="text-danger error_institution_no"></p>
                            </div>

                            <div class="col-md-4 items-push js-gallery img-fluid-100 animated fadeIn"> 
                                <br>           
                                <a class="img-link img-link-zoom-in img-thumb img-lightbox" href="<?php echo base_url();?>assets/img/check_bank_account_demo.png">
                                <img class="img-fluid" src="<?php echo base_url();?>assets/img/check_bank_account_demo.png" alt="" style="width:25%!important">
                                </a>
                            </div>
                        </div> 
                        <hr>                                
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="example-select">Bank Account Number <span style="color:red">* </span></label> 
                                <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" placeholder="Enter here" value="<?php echo $reuslt_fetch_bank_accounts['bank_account_number'];?>" maxlength="7" onkeypress="return isNumber(event)" autocomplete="off">
                                <p class="text-danger error_account_no"></p>
                            </div>
                            <div class="col-md-4">
                                <label for="example-select">Re-Enter Bank Account Number <span style="color:red">* </span></label> 
                                <input type="text" class="form-control" id="confirm_bank_account_number" name="confirm_bank_account_number" placeholder="Enter here" value="<?php echo $reuslt_fetch_bank_accounts['bank_account_number'];?>" maxlength="7" onkeypress="return isNumber(event)" autocomplete="off">
                                <p  style="display: none;" id="re_enter_bank_no" ></p>
                            </div>
                        </div>                                         
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="example-select">Account Type  <span style="color:red">* </span></label> 
                                <select  class="form-control" id="bank_account_type" name="bank_account_type">
                                    <option value="">Please Select</option>
                                      <?php foreach($bank_account_type as $key => $item){?>
                                            <option value="<?php  echo strtolower($key);?>" <?php echo (strtolower($key) ==  $reuslt_fetch_bank_accounts['bank_account_type']) ? 'selected' : '' ?>>
                                            <?php echo $item;?>
                                            </option>
                                        <?php }?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="example-select"> Bank Account Nickname  <span style="color:red">* </span></label> 
                                <input type="text" class="form-control" id="bank_account_name" name="bank_account_name" placeholder="Enter here" value="<?php echo $reuslt_fetch_bank_accounts['bank_account_nickname'];?>" >
                            </div>
                        </div>                                         
                        <hr>
                    
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-sm btn-info" id="update_btn" onclick="update_bank_account();">Update</button>                              
                                <button class="btn btn-sm btn-danger" onclick="delete_bank_account();">Delete</button>                              
                            </div>
                        </div> 
                        </form> 
                    </div>
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
    $('#main_dialog_box_payment').css('display','none');
    // location.reload();

}

function close_dialog5()
{
    $('#main_dialog_box5').css('display','none');
    location.reload();

}
function close_dialog_delete()
{
    $('#main_dialog_box6').css('display','none');

    link = '<?php echo base_url()?>payments';
    location.href = link;

}

function update_bank_account()
    {
        payment_bank_tab_validations('#valid_edit_bank_form_id');
        if($('#valid_edit_bank_form_id').valid()){
        var institution_no       = $('#institution_no').val();
        var transit_number       = $('#transit_number').val();
        var bank_routing_number  = transit_number +institution_no;
        var bank_account_number  = $('#bank_account_number').val();
        var bank_account_type    = $('#bank_account_type').val();
        var bank_account_name    = $('#bank_account_name').val();
        var hidden_bank_id       = $('#hidden_bank_id').val();
    

        if(bank_routing_number && bank_account_number && bank_account_type && transit_number && institution_no && bank_account_name != '')
        {
             $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."User/update_bank_account_ajax";?>',
              data: {
                'bank_routing_number':bank_routing_number,
                'bank_account_number':bank_account_number,
                'bank_account_type':bank_account_type,
                'bank_account_name':bank_account_name,
                'transit_number':transit_number,
                'hidden_bank_id':hidden_bank_id,
                'institution_no':institution_no,
            },
              success: function(response){

               var data = JSON.parse(response);

               if($.trim(response) == '1')
               {    

                    var data= '<div id="main_dialog_box_payment" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You bank account has been updated successfully. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

                      $("#alert_message").html(data);



               }
               else  if($.trim(response) == '2')
               {
                    location.reload();
               }

              }
            });
        }
        else
        {
            // display error popup
           var data = '  <div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please fill all the details.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
              $("#alert_error_message").html(data);
        }
    }
    }


function delete_bank_account()
    {
      var hidden_bank_id       = $('#hidden_bank_id').val();

       $.ajax({
        type: 'POST',
        url: '<?php echo base_url()."User/delete_bank_account_ajax";?>',
        data: {'hidden_bank_id':hidden_bank_id,
      },
        success: function(response){

         var data = JSON.parse(response);

           if(response != '')
           {
               var data= '<div id="main_dialog_box6" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You bank account has been deleted successfully. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_delete();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

                 $("#alert_message").html(data);
           }
        }
      });
    }
</script>