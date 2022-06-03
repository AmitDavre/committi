<?php if(isset($rights)){
    $edit_right=$rights[0]['edit_right'];
    $all_rights=$rights[0]['all_rights'];
  }
  else{
      $edit_right="";
      $all_rights="";
  }?>

<!-- Main Container -->
            <main id="main-container">

                  <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>setting">Setting</a></li>
                                     <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>setting-dropdown">Dropdown's</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" >Why are you joining committi?</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->

                <!-- Page Content -->

                <div class="content content">

                   <div class="block">
                    <div id="checkRightsMsg"></div>
                    <p id="alert_message_trans_desc"></p>
                    <p id="alert_message_trans_desc_error"></p>
                    <p id="alert_message_trans_desc_del"></p>
                        <div class="block-content">
                            <ul class="nav nav-tabs nav-tabs-block " data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#newReason" id="newReasonTab" onclick="return emptyTheFields();">Why are you joining committi?</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="viewReasonTab" href="#viewReasonList" onclick="return emptyTheFields();">View Committi Joining Reasons List</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                
                            <!-- Add Residential Status -->
                               <div class="tab-pane fade show active" id="newReason" role="tabpanel">
                                    <div class="row" style="margin-bottom: 20px">
                                       <div class="col-md-6"> 
                                        <div class="form-group">
                                            <div class="input-group">
                                              <input type="hidden" name="reason_id" id="reason_id" value="">
                                                <input type="text" class="form-control" id="committi_reason_name" name="committi_reason_name" placeholder="Why are you joining committi?" value="" required="required">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-info" id="saveButton" onclick="insert_committi_joining_reason();" style="display:block;">Save</button>
                                                     <button type="button" class="btn btn-info" id="updateButton" onclick="return update_committi_joining_reason();" style="display:none;">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div> 
                                </div>
                                <!-- view residential status -->
                                 <div class="tab-pane fade" id="viewReasonList" role="tabpanel">
                                    <div class="block-content block-content-full">

                                 <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                 <div class="row">
                                    <div class="col-sm-8">
                                        <table id="view_committi_reason_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" width="100%">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 10%;" class="text-left" tabindex="0" aria-controls="DataTables_Table_2"  aria-sort="ascending" aria-label="ID: activate to sort column descending">S.No</th>
                                                    <th style="width: 40%;" class="text-left sorting" tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Name: activate to sort column ascending">Committi Joining Reasons</th>
                                                    <th style="width: 30%;" class="text-left d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Access: activate to sort column ascending">Action</th>  
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
            </div>
        </div>
    </div>

 </main>
 <!-- END Main Container -->

 <script type="text/javascript">
      function close_dialog_rights(){
    $('#checkRightsModal').css('display', 'none');
}
   function insert_committi_joining_reason()
   {
    var admin_type="<?php echo $this->session->userdata('s_admin')?>";
    var all_rights="<?php echo $all_rights  ?>";
    var edit_right="<?php echo $edit_right ?>";
    if(admin_type!='1'&& all_rights=='0' && edit_right=='0'){
        var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to add/edit the records.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
        $('#checkRightsMsg').html(msgData);
        return false;
    }
       var committi_reason_name  = $('#committi_reason_name').val();
           if(committi_reason_name!=''){
            $('#saveButton').prop('disabled',true);
            $.ajax({
              type: 'POST',
              url: '<?php echo base_url()?>Admin/insert_committi_joining_reason',
              data: {
                'committi_reason_name':committi_reason_name
                },
              success: function(response){
               if(response==1)
               {
                   $('#committi_reason_name').val('');
                   $('#saveButton').prop('disabled',false);
                   var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Residential status added successfully.</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
                     get_committi_joining_reasons_list();
               }
               else if(response ==2){
                    $('#committi_reason_name').val('');
                    $('#saveButton').prop('disabled',false);
                     var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Residential status already exist.</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
               }
               else
               {
                $('#saveButton').prop('disabled',false);
                   var data ='<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please fill the field !!</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc_error").html(data);
                     $("#fadeout_div_desc_error").delay(2000).fadeOut();

               }
              }
            });
        }else{
          var data ='<div id="fadeout_div_desc_error_1" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please fill the field !!</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc_error").html(data);
                     $("#fadeout_div_desc_error_1").delay(2000).fadeOut();  
        }
   }
    window.setInterval(function(){
      /// call your function here
      get_committi_joining_reasons_list();
    }, 1000);
    function get_committi_joining_reasons_list(){
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/get_committi_joining_reasons_list";?>',
            success: function(response)
            {
                var data = JSON.parse(response);
                $("#view_committi_reason_table > tbody").html("");
                if(response!= '')
                {
                 var count =1;
                  $.each(data, function(index, value) 
                   { 
                        var counter= count ++;
                        var tr ='<tr id="committi_reason_row_id_'+value.dropdown_values_id+'"><td>'+counter+'</td><td>'+value.dropdown_values_name+'</td><td><button class="btn btn-sm btn-info" onclick="delete_committi_joining_reason('+value.dropdown_values_id+')">Delete</button>&nbsp;&nbsp;&nbsp;&nbsp;<button style="cursor:pointer;" onclick="return editCommittiReason('+value.dropdown_values_id+');" class="btn btn-sm btn-info">Edit</button></td></tr>';
                        $('#view_committi_reason_table tbody').append(tr);
                    });
                 }
            }
            });
   }
   function editCommittiReason(committi_reason_id){
    $.ajax({
        url:'<?php echo base_url()?>Admin/edit_committi_joining_reason',
        type:'POST',
        data:{'committi_reason_id':committi_reason_id},
        success:function(response){
          var data = JSON.parse(response);
          if(response!=''){
            $.each(data, function(index, value){ 
            $('#committi_reason_name').val(value.dropdown_values_name);
            $('#reason_id').val(value.dropdown_values_id);
            $('#newReason').addClass('active show');
            $('#newReasonTab').addClass('active');
            $('#viewReasonTab').removeClass('active')
            $('#viewReasonList').removeClass('active show');
            $('#updateButton').css('display','block');
            $('#saveButton').css('display','none');

          });
          }
        }
   });
  }
  function emptyTheFields(){
     $('#reason_id').val('');
     $('#committi_reason_name').val('');
     $('#updateButton').css('display','none');
     $('#saveButton').css('display','block');
  }
  function update_committi_joining_reason(){
    var committi_reason_id=$('#reason_id').val();
    var committi_reason_name=$('#committi_reason_name').val();
            if(committi_reason_name==''){
                  var data ='<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please fill the field !! </span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc_error").html(data);
                     $("#fadeout_div_desc_error").delay(2000).fadeOut();
                     return false;
           }
           $.ajax({
              type: 'POST',
              url: '<?php echo base_url()?>Admin/update_committi_joining_reason',
              data: {
                'committi_reason_id':committi_reason_id,
                'committi_reason_name':committi_reason_name
               },
               success: function(response){
               if(response==1)
               {
                   var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Committi joining reason updated successfully.</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
                     get_committi_joining_reasons_list();
               }else{
                var data ='<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Error while updation</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc_error").html(data);
                     $("#fadeout_div_desc_error").delay(2000).fadeOut();
               }

             }
         });

  }
   function delete_committi_joining_reason(committi_reason_id){
    $.ajax({
        url:'<?php echo base_url()?>Admin/delete_committi_joining_reason',
        type:'POST',
        data:{'committi_reason_id':committi_reason_id},
        success:function(response){
            if(response!=''){
                var data ='<div id="fadeout_div_1" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Records deleted successfully.</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc_del").html(data);
                     $("#fadeout_div_1").delay(2000).fadeOut();
                     $('#committi_reason_row_id_'+committi_reason_id).remove();
            }
        }
    });
  }
 </script>


