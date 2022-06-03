<?php
if(isset($rights)){
    $edit_right=$rights[0]['edit_right'];
    $all_rights=$rights[0]['all_rights'];
  }
  else{
      $edit_right="";
      $all_rights="";
  }
?>
<!-- Main Container -->
            <main id="main-container">

                  <!-- Hero -->

                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" >Notes </li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content">

                   <div class="block">
                    <div id="checkRightsMsg"></div>
                    <p id="alert_message_notes"></p>
                        <div id="test" class="block-content">
                            <input type="hidden" id="hidden_admin_id" name="hidden_admin_id" value="<?php echo $session_data['id']?>">
                            <input type="hidden" id="hidden_note_no" name="hidden_note_no" value="">
                            <ul class="nav nav-tabs nav-tabs-block " data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#btabs-animated-fade-home" id="newNote">New Note</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-plans" id="viewNote" data-toggle="view_notes_tab">View Notes</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade active show" id="btabs-animated-fade-home" role="tabpanel">
                                    <div class="row" style="margin-bottom: 20px">
                                        

                                        <div class="col-md-6">
                                            <div class="row">
                                             <div class="col-md-12">
                                            <label for="example-select">Select Admin <span style="color:red">* </span></label> 
                                            <select class="form-control" id="admin_value" name="admin_value" >
                                            </select>
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_admin_value" role="alert"></p>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="example-select">Note Name <span style="color:red">* </span></label> 
                                            <input type="text" class="form-control text-capitalize" id="note_name_admin" name="note_name_admin" value="" placeholder="Enter notes name..." autocomplete="off">
                                               
                                            <!-- </select> -->
                                          <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_note_name_admin" role="alert"></p>
                                        </div>
                                    </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="row">
                                        <div class="col-md-12">
                                            <label for="one-profile-edit-name">Note Description</label>
                                            <textarea  class="form-control" id="note_description" name="note_description" rows="4" placeholder="Enter notes description..."> 
                                            </textarea>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                    <!-- <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-12">
                                            <label for="one-profile-edit-name">Note Description</label>
                                            <textarea  class="form-control" id="note_description" name="note_description" rows="4"> 
                                            </textarea>
                                        </div>
                                       
                                    </div>   -->
                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                            <label for="one-profile-edit-name">Note ID</label>
                                            <input type="text" class="form-control" name="note_number" id="note_number" value="<?php echo $result_get_note_no;?>" disabled="disabled">
                                        </div>
                                       
                                    </div>                                    

                                                                       

                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                             <button onclick="insert_note();" style="color: #fff;" type="button" name="submit" id="submit"  class="btn btn-info" >Send</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="btabs-animated-fade-plans" role="tabpanel">

                                <div class="block-content block-content-full">

                                        <table id="view_notes" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 20%;" class="text-center">ID</th>
                                                    <th style="width: 30%;" class="text-center">Name </th>
                                                    <th style="width: 20%;" class="text-center">Post Date</th>  
                                                    <th style="width: 15%;" class="text-center">Status</th>
                                                    <th style="width: 15%;" class="text-center">View</th>
                                                </tr>
                                            </thead>
                                           <tbody> 
                           
                                             </tbody>
                                        </table>
                        </div>
                             
                    </div>
                </div>
            </div>
        </div>
    </div>


          <!-- Pop Out Block Modal -->
                        <div class="modal fade" id="modal-view-note" tabindex="-1" role="dialog" aria-labelledby="modal-edit-doc" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-popout" role="document">
                                <div class="modal-content">
                                    <div class="block block-themed block-transparent mb-0">
                                        <div class="block-header bg-primary-dark">
                                            <h3 class="block-title">View Alert </h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content font-size-sm">
                                            <p id="view_notesss"></p>
                                            <input type="hidden" name="hidden_note_id" id="hidden_note_id" value="">
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <button id="deleteNoteButton" type="button" data-target="#modal-delete-confirmation" data-toggle="modal" data class="btn btn-sm btn-danger" onclick="return hideViewModal();">Delete</button>
                                            <button id="close_modal" type="button" class="btn btn-sm btn-info" data-dismiss="modal" >Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END Pop Out Block Modal -->
                    <!-- Pop Out Block Modal -->
                        <div class="modal fade" id="modal-delete-confirmation" tabindex="-1" role="dialog" aria-labelledby="modal-edit-doc" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-popout" role="document">
                                <div class="modal-content">
                                    <div class="block block-themed block-transparent mb-0">
                                        <div class="block-header bg-primary-dark">
                                            <h3 class="block-title">Delete Confirmation</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                    <i class="fa fa-fw fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content font-size-sm">
                                            <p> Are you sure you wants to delete this record?
                                        </div>
                                        <div class="block-content block-content-full text-right border-top">
                                            <button id="deleteNote" type="button" class="btn btn-sm btn-info" onclick="deleteNote();">Confirm</button>
                                            <button id="close_modal" type="button" class="btn btn-sm btn-info" data-dismiss="modal" >cancel</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END Pop Out Block Modal -->


 </main>
            <!-- END Main Container -->

<script type="text/javascript">
    function hideViewModal(){
        $('#modal-view-note').modal('hide');
    }
    function close_dialog_rights() {
    $('#checkRightsModal').css('display', 'none');
}
    function insert_note()
    {
         var admin_type = "<?php echo $this->session->userdata('s_admin')?>";
         var all_rights = "<?php echo $all_rights  ?>";
         var edit_right = "<?php echo $edit_right ?>";
        if (admin_type != '1' && all_rights == '0' && edit_right == '0') 
        {
            var msgData =
            '<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to post the notes</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
              $('#checkRightsMsg').html(msgData);
              return false;
        }
        var admin_id             = $('#admin_value').val();
        var note_description     = $('#note_description').val();
        var note_number          = $('#note_number').val();
        var note_name          = $('#note_name_admin').val();
       
       var selectedAdminOption = $('#admin_value').find(":selected").val();
    if(selectedAdminOption=='')
    {
        $('#error_admin_value').css("display", "");
        $('#error_admin_value').text('Required*');
        event.preventDefault();
    }
    else
    {
        $('#error_admin_value').css("display", "none");
    }
    if(note_name == '')
    {
        $('#error_note_name_admin').css("display", "");
        $('#error_note_name_admin').text('Required*');
        event.preventDefault();
    }
    else
    {
        $('#error_note_name_admin').css("display", "none");
     
    }
    if(selectedAdminOption!='' && note_name!= '')
    {
       $('#submit').prop('disabled',true);

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/insert_note";?>',
          data:{'admin_id':admin_id,'note_description':note_description,'note_number':note_number,'note_name':note_name},
          success: function(response){

           var data = JSON.parse(response);

           if(response != '')
           {
            $('#submit').prop('disabled',false);
            var datas ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Note sent successfully.</span><a href="#" target="_blank" data-notify="url"></a></div>';

                 $("#alert_message_notes").html(datas);
                 $("#fadeout_div").delay(2000).fadeOut();
                 $('#admin_value').val('');
                 $('#note_description').val('');
                 $('#note_number').val('');
                 $('#note_name_admin').val();


                 ////// put value in table 
            destory_data_table("#view_notes");
            $("#view_notes > tbody").html("");

            var count =1;
            var hidden_admin_id=$('#hidden_admin_id').val();

           $.each(data, function(index, value) {
                var counter  = count++;
                var link ="<?php echo base_url()?>view-note/"+value.admin_notes_id;

                if(value.admin_notes_posting_id == hidden_admin_id)
                {
                    var status = 'Sent';
                }
                else
                {
                    var status = 'Recevied';
                }

                // $('#view_notesss').html(value.admin_notes_desc);


                var tr= '<tr id="notes_row_id_'+value.admin_notes_id+'"><td class="text-center" scope="row">'+counter+'</td><td class="text-center font-w600 font-size-sm text-capitalize">'+value.admin_notes_u_name+'</td><td class="text-center font-w600 font-size-sm">'+value.admin_notes_posted_date+'</td><td class="text-center font-w600 font-size-sm text-capitalize">'+status+'</td><td class="text-center font-w600 font-size-sm"><button  class="btn btn-small " data-toggle="modal" data-target="#modal-view-note" onclick="fetch_not_desc_admin(this,'+value.admin_notes_id+');">View </button></td></tr>';

                $('#view_notes tbody').append(tr);
                $('#note_number').val(parseInt(value.admin_notes_note_number)+1);

            });
           intializeDatatable("#view_notes");

           }
          }
        });
      }
    }

    function fetch_notes_onstart()
    {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/fetch_note";?>',
          success: function(response){
            if(response != '')
           {
           var data = JSON.parse(response);
            destory_data_table("#view_notes");
             $("#view_notes > tbody").html("");
                 
            var count =1;
            var hidden_admin_id=$('#hidden_admin_id').val();
           $.each(data, function(index, value) {
                var counter  = count++;
                var link ="<?php echo base_url()?>view-note/"+value.admin_notes_id;


                if(value.admin_notes_posting_id == hidden_admin_id)
                {
                    var status = 'Sent';
                }
                else
                {
                    var status = 'Recevied';
                }


                // $('#view_notesss').html(value.admin_notes_desc);


                var tr= '<tr id="notes_row_id_'+value.admin_notes_id+'"><td class="text-center" scope="row">'+counter+'</td><td class="text-center font-w600 font-size-sm text-capitalize">'+value.admin_notes_u_name+'</td><td class="text-center font-w600 font-size-sm">'+value.admin_notes_posted_date+'</td><td class="text-center font-w600 font-size-sm text-capitalize">'+status+'</td><td class="text-center font-w600 font-size-sm"><button  class="btn btn-small " data-toggle="modal" data-target="#modal-view-note" onclick="fetch_not_desc_admin(this,'+value.admin_notes_id+');">View </button></td></tr>';

                $('#view_notes tbody').append(tr);


            });
           intializeDatatable("#view_notes");

           }
          }
        }); 
    }



    function get_select_user()
    {
        // var select_user_type = $('#select_user_type').val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/fetch_admin_dropdown";?>',
          // data:{'select_user_type':select_user_type},
          success: function(response){
           var data = JSON.parse(response);
           if(response != '')
           {
            $("#admin_value option").remove();
            $('#admin_value').append('<option value="">Please select</option>');
            $.each(data, function(index, value) {

                var option = '<option value="'+value.id+'">'+value.first_name+' '+value.last_name+'</option>';

                $('#admin_value').append(option);


            });

           
           }
          }
        }); 
    }


    function fetch_not_desc_admin(that,id)
    {
       One.loader('show');
        var hidden_admin_id=$('#hidden_admin_id').val();
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/fetch_not_desc_admin_ajax";?>',
          data:{'id':id},
          success: function(response){
           One.loader('hide');
           var data = JSON.parse(response);

           if(response != '')
           {
                $('#view_notesss').html(data[0]['admin_notes_desc']);
                $('#hidden_note_id').val(data[0]['admin_notes_id']);
                var admin_notes_posting_id=data[0]['admin_notes_posting_id'];
                if(admin_notes_posting_id!=hidden_admin_id){
                    $('#deleteNoteButton').hide();
                }else{
                    $('#deleteNoteButton').show();
                }
           }
          }
        }); 
    }
    function deleteNote(){
        $('#modal-delete-confirmation').modal('hide');
        var admin_type = "<?php echo $this->session->userdata('s_admin')?>";
         var all_rights = "<?php echo $all_rights  ?>";
        if (admin_type != '1' && all_rights == '0') 
        {
            var msgData =
            '<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to delete the notes</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
              $('#checkRightsMsg').html(msgData);
              return false;
        }
        var notes_id=$('#hidden_note_id').val();
         $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."Admin/deleteNotes";?>',
          data:{'notes_id':notes_id},
          success: function(response){
           var data = JSON.parse(response);
           if(response = '1')
           {
               var datas ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Note deleted successfully.</span><a href="#" target="_blank" data-notify="url"></a></div>';

                 $("#alert_message_notes").html(datas);
                 $("#fadeout_div").delay(2000).fadeOut();
                 $('#notes_row_id_'+notes_id).remove();
                 $('#hidden_note_id').val('');
           }
          }
        }); 
    }
</script>