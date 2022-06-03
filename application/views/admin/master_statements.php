<?php if(isset($rights)){
  $edit_right=$rights[0]['edit_right'];
  $all_rights=$rights[0]['all_rights'];
}
else{
    $edit_right="";
    $all_rights="";
}?>

<?php 


    $_SESSION['statement_buttons_token']=md5(session_id() . time());






?>
<style type="text/css">
        .custom-control-input:checked~.custom-control-label::before {
            color: #fff;
            border-color: #110d35;
            background-color: #110d35;
    }
</style>
            <main id="main-container">

                  <!-- Hero -->

                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" href="#">Master Statements</a></li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content">

                   <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Master Statements</h3>
                        </div>
                        <p id="alert_message"></p>

                          <?php if($this->session->flashdata('error_statement')) { ?>
                                <div  id="main_dialog_box1" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You have already generated the statement.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog1();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
                            <?php } ?>


                        <div class="block-content block-content-full">
                            <form  method="POST" enctype="multipart/form-data" >

                            <input type="hidden" name="statement_buttons_token" id="statement_buttons_token" value="<?php echo $_SESSION['statement_buttons_token']?>"> 



                                <div class="row mb-3">   <!---Row 1 ---> 
                                
                                <div class="col-md-4">
                                    <label for="one-profile-edit-username">Select Plan</label>
                                        <select  class="form-control text-capitalize" id="all_plans_value" name="all_plans_value" onchange="get_all_bidding_cycles();">
                                            <option value="">Please Select</option>
                                         <?php
                                            // Iterating through the plan array
                                            foreach($user_application_plan as $key =>$item){
                                            ?>
                                            <option value="<?php  echo $item['id'];?>" >
                                            <?php echo $item['plan_name']; ?>
                                            </option>
                                            <?php
                                            }
                                        ?> 
                                        </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="one-profile-edit-username">Select Bidding Cycle</label>
                                     <select  class="form-control" id="bidding_cycle" name="bidding_cycle" >
                                    <option value="">Please Select</option>

                                     
                                    </select>
                                        
                                </div>

                                <div class="col-md-4">
                                    <label for="one-profile-edit-username">Select User </label>
                                     <select  class="form-control" id="plan_user" name="plan_user" >
                                    <option value="">Please Select</option>

                                     
                                    </select>
                                        
                                </div>
                                  
                            </div>
                            <div class="row mb-3">   <!---Row 2 ---> 
                              
                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">Start Date</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="statement_start_date_master" name="statement_start_date_master" placeholder="Please select date" value="" autocomplete="off" style="text-transform: capitalize;">
                                </div>
                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">End Date</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="statement_end_date_master" name="statement_end_date_master" placeholder="Please select date" value="" autocomplete="off" style="text-transform: capitalize;">
                                </div>

                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">Due Date</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="statement_due_date_master" name="statement_due_date_master" placeholder="Please select date" value="" autocomplete="off" style="text-transform: capitalize;">
                                </div>
                                
                            </div>

                            <div class="row mb-3">   <!---Row 1 ---> 
      
                                <div class="col-md-12">
                                    <div class="form-group custom-control custom-checkbox">
                                        <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?>  
                                        <button id= "statement_generate_buttons" name="statement_generate_buttons" type="submit" class="btn btn-info" style="float: right;" >Generate Statement</button><?php } ?>
                                    </div>
                                </div>
                             </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

     </main>
                <!-- END Main Container -->

<script type="text/javascript">
  
function closeModal()
{
    $('#close_cross').click();

}
function close_dialog1()
{
    $('#main_dialog_box1').css('display','none');
}

function get_all_bidding_cycles(){

    var plan_id = $('#all_plans_value').val();
    if(!plan_id)
    {
        alert('Select Plan First');
        return false ; 
    }

    $('#bidding_cycle').empty()
    $('#plan_user').empty()

    $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/get_plan_bidding_cycles";?>',
              data: {
                'plan_id':plan_id
            },
              success: function(response){

               var data = JSON.parse(response);

               if(response != '')
               {
                // append to dropdown
                 $.each(data, function(index, value) {
                        var option= '<option value="'+value+'">Bidding Cycle '+value+'</option>';

                        $('#bidding_cycle').append(option);

                });

               }
              }
            });    


        $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/get_plan_bidding_users";?>',
              data: {
                'plan_id':plan_id
            },
              success: function(response){

               var data = JSON.parse(response);

               if(response != '')
               {
                 var option= '<option value="all">Select All</option>';

                 $('#plan_user').append(option);
                // append to dropdown
                 $.each(data, function(index, value) {
                        var option= '<option value="'+value.id+'">'+value.first_name+' '+value.last_name+'</option>';

                        $('#plan_user').append(option);

                });

               }
              }
            });


}

</script>