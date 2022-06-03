<style type="text/css">
.page-item.active .page-link {
    z-index: 3;
    color: #6fb8eb!important;
    background-color: #f9f9f9;
    border-color: #6fb8eb!important;
}    
</style>
<!-- Main Container -->
<div>
            <main id="main-container">
                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">View Notes History</li>
                                </ol>
                            </nav>
                    </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content content">

                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Notes History</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <input type="hidden" name="hidden_admin_notes_id" id="hidden_admin_notes_id" value="">
                            <p id="alert_message"></p>
                            <table id="notes_user_view_detail" class="table table-borderless table-vcenter table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 10%;">S.No</th>
                                                <th style="width: 20%;">Note Name</th>
                                                <th style="width: 25%;">Note description</th>
                                                <th  style="width: 10%;">Date</th>
                                                <th  style="width: 7%;">Status</th>
                                                <th  style="width: 18%;">Change Status</th>
                                                <th  style="width: 10%;">Assign</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                                            if ($result_get_admin != '')
                                                            {
                                                                $count =1; 
                                                                foreach($result_get_admin as $view_user_application) 
                                                                    { 
                                                            ?> 
                                                                    <tr role="row" class="odd">
                                                                        <td class="text-center font-size-sm sorting_1"><?php echo $count++ ?></td>
                                                                        <td class="text-left font-size-sm sorting_1 text-capitalize"><?php echo $view_user_application['admin_notes_task_name']; ?>
                                                                        <td class="text-left font-size-sm sorting_1"><?php echo $view_user_application['admin_notes_desc']; ?>
                                                                        </td>
                                                                        <td class="text-left font-size-sm sorting_1">
                                                                            <?php 
                                                                            $convertDate= date('m/d/Y', strtotime($view_user_application['admin_notes_posted_date']));
                                                                                    echo $convertDate;
                                                                            ?>
                                                                        </td>
                                                                        
                                                                         <td class="text-center font-size-sm sorting_1">
                                                                            <?php
                                                                              
                                                                            if($view_user_application['admin_notes_status'] == '1')
                                                                            { ?>
                                                                                <span class="badge badge-info">Pending</span>

                                                                            <?php } else if($view_user_application['admin_notes_status'] == '2'){?>
                                                                                 <span class="badge badge-success">Resolved</span>

                                                                            <?php }?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-status-change" onclick="send_id_hidden(this,<?php echo $view_user_application['admin_notes_id']; ?>);">Change </button>

                                                                        </td>
                                                                         <td class="text-center font-size-sm sorting_1"><button class="btn btn-sm  btn-info" data-toggle="modal" data-target="#modal-assign-admin" onclick="send_id_hidden(this,<?php echo $view_user_application['admin_notes_id']; ?>);">Assign</button>
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

                <!-- END User Profile -->

            </div>

            <!-- END Page Content -->

             <!-- Pop Out Block Modal -->
                        <div class="modal fade" id="modal-assign-admin" tabindex="-1" role="dialog" aria-labelledby="modal-assign-admin" aria-hidden="true">
        

                            <div class="modal-dialog modal-dialog-popout" role="document">
                                <div class="modal-content">
                                    <div class="block block-themed block-transparent mb-0">
                                        <div class="block-header bg-primary-dark">
                                            <h3 class="block-title">Assign Admin</h3>
                                            <div class="block-options">
                                                <button onclick="reset_hidden_admin_notes_id();" type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content font-size-sm">
                                            <div class="form-group">
                                                <label>Select Admin</label>
                                                <select class="form-control" id="modal_select_id" name="modal_select_id">
                                                    <option value="">Please Select</option>
                                                 <?php
                                                    // Iterating through the tier array
                                                     // array_unshift($plan_details, "phoney");
                                                     // unset($plan_details[0]);

                                                 

                                                    foreach($result_admin as $key =>$item){
                                                    ?>
                                                    <option value="<?php  echo $item['id'];?>" class="text-capitalize">
                                                    <?php echo $item['first_name'].' '.$item['last_name'];?>
                                                    </option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal" onclick="reset_hidden_admin_notes_id();">Close</button>

                                            <button type="button" class="btn btn-sm btn-info" onclick="UpdateOnChangeAdmin();"><i class="fa fa-check mr-1" ></i>Assign</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END Pop Out Block Modal --> 

                    <!-- Pop Out Block Modal -->
                        <div class="modal fade" id="modal-status-change" tabindex="-1" role="dialog" aria-labelledby="modal-status-change" aria-hidden="true">
        

                            <div class="modal-dialog modal-dialog-popout" role="document">
                                <div class="modal-content">
                                    <div class="block block-themed block-transparent mb-0">
                                        <div class="block-header bg-primary-dark">
                                            <h3 class="block-title">Task Status</h3>
                                            <div class="block-options">
                                                <button  type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content font-size-sm">
                                            <div class="form-group">
                                                <label>Select Status</label>
                                                <select class="form-control" id="modal_select_status" name="modal_select_status">
                                                    <option value="">Please Select</option>
                                                    <option value="1" >Pending</option>
                                                    <option value="2" >Resolved</option>
                                                  
                                                </select>

                                            </div>
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal" >Close</button>

                                            <button type="button" class="btn btn-sm btn-info" onclick="UpdateStatus();"><i class="fa fa-check mr-1" ></i>Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END Pop Out Block Modal -->

        </main>

        <!-- END Main Container -->

<script type="text/javascript">

    function send_id_hidden(that,id){

        $('#hidden_admin_notes_id').val(id);

    }
    function reset_hidden_admin_notes_id(){

        $('#hidden_admin_notes_id').val('');

    }
    function UpdateOnChangeAdmin(){
        var modal_select_id = $('#modal_select_id').val();
        var admin_note_id = $('#hidden_admin_notes_id').val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/assign_new_admin_to_note";?>',
          data: {'modal_select_id':modal_select_id,'admin_note_id':admin_note_id},
          success: function(response){

            var data = JSON.parse(response);

            if(response!='')
            {
                $('#hidden_admin_notes_id').val('');
                $('#modal_select_id').val();

                var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Admin assigned successfully for the task. A notification has been sent to the admin.</span><a href="#" target="_blank" data-notify="url"></a></div>';

                     $("#alert_message").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
                     $('#modal-assign-admin').css('display','none');
                     $('.modal-backdrop').css('display','none');

                      setTimeout(function() {
                        location.reload();
                    }, 1000);

                
            }
            
          }
        }); 
    }    


    function UpdateStatus(){
        var modal_select_status = $('#modal_select_status').val();
        var admin_note_id = $('#hidden_admin_notes_id').val();


        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/update_task_status";?>',
          data: {'modal_select_status':modal_select_status,'admin_note_id':admin_note_id},
          success: function(response){

            var data = JSON.parse(response);

            if(response!='')
            {
                $('#modal_select_status').val();

                var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Admin assigned successfully for the task. A notification has been sent to the admin.</span><a href="#" target="_blank" data-notify="url"></a></div>';

                     $("#alert_message").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
                     $('#modal-status-change').css('display','none');
                     $('.modal-backdrop').css('display','none');

                      setTimeout(function() {
                        location.reload();
                    }, 1000);

                
            }
            
          }
        }); 
    }
</script>