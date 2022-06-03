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
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo  base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" >Manage Transactions </li>
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
                                    <a class="nav-link active" href="#btabs-animated-fade-home">New Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-plans" data-toggle="master_transaction_trans_desc_table_tab" onclick="get_transaction_desc();">View Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#addPlanSequence">Add Plan Sequence</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#viewPlanSequence" data-toggle="view_plan_sequence_table_tab" onclick="get_plan_sequence_list();">View Plan Sequence</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade active show" id="btabs-animated-fade-home" role="tabpanel">
                                    <div class="row" style="margin-bottom: 20px">

                                        <div class="col-md-4">
                                            <label for="example-select">Description Name <span style="color:red">* </span></label> 
                                            <input type="text" class="form-control" id="description_value" name="description_value" placeholder="Enter description here" value="" style="text-transform:capitalize;">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="example-select">Entry Type <span style="color:red">* </span></label> 
                                            <!-- <input type="text" class="form-control" id="entry_type_value" name="entry_type_value" placeholder="Enter type here" value="" style="text-transform:capitalize;"> -->

                                             <select class="form-control" id="entry_type_value" name="entry_type_value" >
                                                <option value="">Please Select</option>
                                                <option value="Debit">Debit</option>
                                                <option value="Credit">Credit</option>
                                                <option value="Neutral">Neutral</option>
                                            </select>


                                        </div>
                                    </div> 

                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-8">
                                             <button style="color: #fff;" type="button" name="submit_transaction" id="submit_transaction"  class="btn btn-info" onclick="insert_transaction();">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="btabs-animated-fade-plans" role="tabpanel">

                                <div class="block-content block-content-full">



                             <table id="view_trans_desc_Table_1"
                                class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap responsive_view_trans_desc_table"
                                 style="width:100%!important">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 10%;" class="text-center" >S.No</th>
                                                    <th style="width: 30%;" class="text-center">Transaction Description </th>
                                                    <th style="width: 30%;" class="text-center">Transaction Type</th> 
                                                    <th style="width: 30%;" class="text-center">Delete </th>  
                                                </tr>
                                            </thead>
                                           <tbody> 
                           
                                             </tbody>
                                        </table>
                                
                        </div>
                             
                    </div>

                    <!-- Add Plan Sequence -->

                               <div class="tab-pane fade" id="addPlanSequence" role="tabpanel">
                                    <div class="row" style="margin-bottom: 20px">
                                       <div class="col-md-6"> 
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="plan_sequence_number" name="plan_sequence_number" placeholder="Plan Sequence Number" value="" onkeypress="return isNumberWithoutDecimal(event)" maxlength="5" required="required">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-info" id="plan_sequence_button" onclick="insert_plan_sequence_number();">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div> 
                                </div>
                                <!-- view plan sequence number -->
                                 <div class="tab-pane fade" id="viewPlanSequence" role="tabpanel">
                                    <div class="block-content block-content-full" >
                                <div style="width:70%!important;">
                                <table id="view_plan_sequence_table"
                                  class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important;">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width:30%;" class="text-center">S.No</th>
                                                    <th style="width:35%;" class="text-center">Plan Sequence Number</th>
                                                    <th style="width:35%;" class="text-center">Delete </th>  
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

 </main>
 <!-- END Main Container -->

 <script type="text/javascript">
      function close_dialog_rights(){
    $('#checkRightsModal').css('display', 'none');
}
   function insert_transaction()
   {
    var admin_type="<?php echo $this->session->userdata('s_admin')?>";
    var all_rights="<?php echo $all_rights  ?>";
    var edit_right="<?php echo $edit_right ?>";
    if(admin_type!='1'&& all_rights=='0' && edit_right=='0'){
        var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to post/edit the records.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
        $('#checkRightsMsg').html(msgData);
        return false;
    }
       var description_value    = $('#description_value').val();
       var entry_type_value     = $('#entry_type_value').val();
       if(description_value!='' && entry_type_value!='')
       {
         $('#submit_transaction').prop('disabled',true);

            $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/insert_transaction_description";?>',
              data: {
                'description_value':description_value,
                'entry_type_value':entry_type_value
                
            },
              success: function(response){

               var data = JSON.parse(response);


               if($.trim(response) == '1')
               {

                   $('#entry_type_value').val('');
                   $('#description_value').val('');
             
                   var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Transaction description and type added successfully.</span><a href="#" target="_blank" data-notify="url"></a></div>';

                     $("#alert_message_trans_desc").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
                     get_transaction_desc();
                     $('#submit_transaction').prop('disabled',false);
               }else if($.trim(response) == '2'){
                $('#entry_type_value').val('');
                $('#description_value').val('');
                var data ='<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Transaction deascription and type alredy exist !!</span><a href="#" target="_blank" data-notify="url"></a></div>';

                     $("#alert_message_trans_desc_error").html(data);
                     $("#fadeout_div_desc_error").delay(2000).fadeOut();
                     $('#submit_transaction').prop('disabled',false);
               }
               else
               {
                   var data ='<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please fill all the fields !!</span><a href="#" target="_blank" data-notify="url"></a></div>';

                     $("#alert_message_trans_desc_error").html(data);
                     $("#fadeout_div_desc_error").delay(2000).fadeOut();

               }
              }
            });
        }else{
               var data ='<div id="fadeout_div_desc_errorr" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please fill all the fields !!</span><a href="#" target="_blank" data-notify="url"></a></div>';

                     $("#alert_message_trans_desc_error").html(data);
                     $("#fadeout_div_desc_errorr").delay(2000).fadeOut();
        }
   }

 // window.setInterval(function(){
 //      /// call your function here
 //      get_transaction_desc();
 //    }, 1000);
    

  function get_transaction_desc()
   {
            $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/get_transaction_desc_ajax";?>',
              success: function(response){
                
               if(response != '1')
               {
                destory_data_table("#view_trans_desc_Table_1");
                $("#view_trans_desc_Table_1 > tbody").html("");
               var data = JSON.parse(response);
                   var count =1;
                  $.each(data, function(index, value) {
                        var counter= count ++;
                        var tr ='<tr><td class="text-center">'+counter+'</td><td class="text-center">'+value.transaction_type_desc+'</td><td class="text-center">'+value.transaction_type+'</td><td class="text-center"><button class="btn-sm btn-info" onclick="delete_trans_desc(this,'+value.transaction_type_id+')">Delete</button></td></tr>';
                        $('#view_trans_desc_Table_1 tbody').append(tr);
                    });
                  intializeDatatable("#view_trans_desc_Table_1");
               }
              }
            });
   }
   function delete_trans_desc(that,id)
   {
         var admin_type="<?php echo $this->session->userdata('s_admin')?>";
         var all_rights="<?php echo $all_rights  ?>";
         if(admin_type!='1'&& all_rights=='0')
         {
           var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to delete the records.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
           $('#checkRightsMsg').html(msgData);
           return false;
          }

            $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/delete_trans_desc_ajax";?>',
              data: {
                'id':id
            },
              success: function(response){

               var data = JSON.parse(response);


               if($.trim(response) == '1')
               {
             
                   var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Transaction description deleted successfully.</span><a href="#" target="_blank" data-notify="url"></a></div>';

                     $("#alert_message_trans_desc_del").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
               }
         
              }
            });
   }
   function insert_plan_sequence_number()
   {
    var admin_type="<?php echo $this->session->userdata('s_admin')?>";
    var all_rights="<?php echo $all_rights  ?>";
    var edit_right="<?php echo $edit_right ?>";
    if(admin_type!='1'&& all_rights=='0' && edit_right=='0'){
        var msgData='<div id="checkRightsModal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You dont have right to add/edit the records.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_rights();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
        $('#checkRightsMsg').html(msgData);
        return false;
    }
       var plan_sequence_number    = $('#plan_sequence_number').val();
          if(plan_sequence_number!=''){
            if(plan_sequence_number.length>5||plan_sequence_number.length<5){
                var data ='<div id="fadeout_divv" data-notify="container" class=" fadeout_divv col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Plan sequence number must be consist on 5 digits only.</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc").html(data);
                     $(".fadeout_divv").delay(2000).fadeOut();
                     $('#plan_sequence_button').prop('disabled',false);
                     return false;
            }
            $('#plan_sequence_button').prop('disabled',true);
            $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/insert_plan_sequence_number";?>',
              data: {
                'plan_sequence_number':plan_sequence_number
            },
              success: function(response){
               if(response==1)
               {
                   $('#plan_sequence_number').val('');
                   var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Plan sequence number added successfully.</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
                     get_plan_sequence_list();
                     $('#plan_sequence_button').prop('disabled',false);
               }
               else if(response ==2){
                    $('#plan_sequence_number').val('');
                     var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Plan sequence number already exist.</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();
                     $('#plan_sequence_button').prop('disabled',false);
               }
               else
               {
                   var data ='<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please fill all the fields !!</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc_error").html(data);
                     $("#fadeout_div_desc_error").delay(2000).fadeOut();
                     $('#plan_sequence_button').prop('disabled',false);

               }
              }
            });
        }else{
           var data ='<div id="fadeout_div_desc_error" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please fill all the fields !!</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc_error").html(data);
                     $("#fadeout_div_desc_error").delay(2000).fadeOut(); 
        }
   }
    // window.setInterval(function(){
    //   /// call your function here
    //   get_plan_sequence_list();
    // }, 1000);
    function get_plan_sequence_list(){
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/get_plan_sequence_list";?>',
            success: function(response){
                 if(response!= ''){
                var data = JSON.parse(response);
                destory_data_table("#view_plan_sequence_table");
                 $("#view_plan_sequence_table > tbody").html("");

               
                 var count =1;
                  $.each(data, function(index, value) 
                   { 
                        var counter= count ++;
                        var tr ='<tr id="plan_number_row_id_'+value.plan_name_sequence_id+'"><td class="text-center">'+counter+'</td><td class="text-center">'+value.plan_name_sequence_number+'</td><td class="text-center"><button class="btn-sm btn-info" onclick="delete_plan_sequence_number('+value.plan_name_sequence_id+')">Delete</button></td></tr>';
                        $('#view_plan_sequence_table tbody').append(tr);
                    });
                  intializeDatatable("#view_plan_sequence_table");
                 }
            }
            });
   }
   function delete_plan_sequence_number(plan_name_sequence_id){
    $.ajax({
        url:'<?php echo base_url()?>Admin/deletePlanSequenceNumber',
        type:'POST',
        data:{'plan_name_sequence_id':plan_name_sequence_id},
        success:function(response){
            if(response!=''){
                var data ='<div id="fadeout_divv" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Plan sequence_number deleted successfully</span><a href="#" target="_blank" data-notify="url"></a></div>';
                     $("#alert_message_trans_desc_del").html(data);
                     $("#fadeout_divv").delay(2000).fadeOut();
                     $('#plan_number_row_id_'+plan_name_sequence_id).remove();
            }
        }
    });
  }
 </script>


