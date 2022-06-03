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
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>view-plans">View Plans</a></li>
                                    <li class="breadcrumb-item" style="text-transform: capitalize;"><a class="text-muted" href="<?php echo base_url()?>plan-details/<?php echo base64_encode($plan_id);?>"><?php echo $PlanDetails['0']['plan_name'];?></a></li>
                                    <li class="breadcrumb-item">Add Transaction</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content">

                   <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Add Transaction</h3>
                        </div>
                        <p id="alert_message"></p>

                          <?php if($this->session->flashdata('error_statement')) { ?>
                                <div  id="main_dialog_box1" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You have already generated the statement.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog1();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
                            <?php } ?>


                        <div class="block-content block-content-full">
                            <input type="hidden" name="hidden_trans_plan_id" id="hidden_trans_plan_id" value="<?php echo $plan_id;?>">
                            <input type="hidden" name="hidden_cycle_count" id="hidden_cycle_count" value="<?php echo $cycle_count;?>">
                             <div class="row mb-3">   <!---Row 1 ---> 
                                <div class="col-md-4">
                                    <div class="form-group custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="trans_check" name="trans_check" onclick="disable_select();">
                                        <label class="custom-control-label font-w400" for="trans_check">Add To All Users</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group custom-control custom-checkbox">
                                        <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?>  
                                        <button   data-toggle="modal" data-target="#modal-block-statement"  type="button" class="btn btn-info" style="float: right;" >Generate Statement</button><?php } ?>
                                    </div>
                                </div>
                             </div>

                                <div class="row mb-3">   <!---Row 1 ---> 
                                
                                <div class="col-md-4">
                                    <label for="one-profile-edit-username">Select User</label>
                                        <select  class="form-control text-capitalize" id="add_trans_user" name="add_trans_user" >
                                            <option value="">Please Select</option>
                                         <?php
                                            // Iterating through the tier array
                                            foreach($result_get_users as $key =>$item){
                                            ?>
                                            <option value="<?php  echo $item['u_id'];?>" >
                                            <?php echo $item['user_application_first_name'].' '.$item['user_application_last_name'];?>
                                            </option>
                                            <?php
                                            }
                                        ?> 
                                        </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="one-profile-edit-username">Bidding Cycle</label>
                                    <!-- <input  type="text" class="form-control" id="add_trans_cycle" name="add_trans_cycle" placeholder="" value="" > -->
                                     <select  class="form-control" id="add_trans_cycle" name="add_trans_cycle" >
                                    <option value="">Please Select</option>

                                     
                                    </select>
                                        
                                </div>
                                  <div class="col-md-4">
                                    <label for="one-profile-edit-name">Transaction Date</label>
                                    <input type="text" class="js-flatpickr form-control bg-white" id="add_trans_date" name="add_trans_date" placeholder="Please select date" value="" autocomplete="off" style="text-transform: capitalize;">
                                </div>
                            </div>
                            <div class="row mb-3">   <!---Row 2 ---> 
                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">Description</label>
                                    <select  class="form-control" id="add_trans_desc" name="add_trans_desc" onchange="get_entry_type();">
                                    <option value="">Please Select</option>

                                     <?php
                                        // Iterating through the tier array
                                        foreach($result_get_trans_desc as $key =>$item){
                                        ?>
                                        <option value="<?php  echo $item['transaction_type_id'];?>" >
                                        <?php 
                                        $get_initial = substr($item['transaction_type'], 0, 1);

                                        echo $item['transaction_type_desc'].' - '.$get_initial;

                                        ?>
                                        </option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">Transaction Type</label>
                                    <input type="text" class="form-control format_amount" id="entry_type" name="entry_type" value="" autocomplete="off" disabled="disabled">
                                </div>
                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">Amount</label>
                                    <input type="text" class="form-control format_amount" id="add_trans_amount" name="add_trans_amount" placeholder="Enter amount here" value="" autocomplete="off"  onkeypress="return isNumber(event)">
                                </div>
                            </div>

                            <div class="row mb-3">   <!---Row 3 --->
                             
                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">Reference/Notes</label>
                                    <input type="text" class="form-control" id="add_trans_ref" name="add_trans_ref" placeholder="Enter refernece here" value="" autocomplete="off" >
                                </div> 

                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">Bidding Cycle Winner</label>
                                    <input disabled="disabled" type="text" class="form-control text-capitalize" id="bidding_cycle_winner" name="bidding_cycle_winner" value="<?php echo $winning_bid_user['bidding_cycle_winner_f'].' '.$winning_bid_user['bidding_cycle_winner_l'];?>" autocomplete="off" >

                                </div> 

                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">Winning Bid Amount</label>
                                    <input disabled="disabled" type="text" class="form-control" id="win_bid_amount" name="win_bid_amount" value="<?php echo $winning_bid_user['bidding_cycle_win_amount'];?>" autocomplete="off" >
                                </div>
                            </div>     
                            <div class="row mb-3">   <!---Row 3 --->
                                <div class="col-md-4">
                                    <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1'){?><button id="add_trans_btn" name="add_trans_btn" class="btn btn-info btn-sm" onclick="add_transaction();">Add Transaction</button>
                                <?php } ?>
                                </div>
                            </div>


                            <br><h3 class="block-title">View Transactions</h3><br>

                            <div class="row mb-3">
                                 <div class="col-md-3">
                                    <label for="one-profile-edit-name">Select User</label>
                                    <select  class="form-control" id="filter_user" name="filter_user" onchange="get_plan_transactions_per_cycle();">
                                          <option value="0">Select All</option>
                                         <?php
                                            // Iterating through the tier array
                                            foreach($result_get_users as $key =>$item){
                                            ?>
                                            <option value="<?php  echo $item['u_id'];?>" >
                                            <?php echo $item['user_application_first_name'].' '.$item['user_application_last_name'];?>
                                            </option>
                                            <?php
                                            }
                                        ?> 
                                    </select>
                                </div>

                            </div>
                           <table id="transactions_details_table_per_cycle" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 5%;" class="text-center">S.No</th>
                                                    <th style="width: 15%;">Transaction Date </th>
                                                    <th style="width: 50%;">Description</th>
                                                    <th style="width: 10%;">User</th>
                                                    <th style="width: 10%;">Amount $</th>
                                                    <th  style="width: 10%;">Balance $</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                
                                        </table>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- END Page Content -->
                          <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-statement" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Generate Statement</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  method="POST" enctype="multipart/form-data" >
                                         <input type="hidden" name="hidden_trans_plan_idd" id="hidden_trans_plan_idd" value="<?php echo $plan_id;?>">
                                         <input type="hidden" name="hidden_cycle_counts" id="hidden_cycle_counts" value="<?php echo $cycle_count;?>">
                                         <input type="hidden" name="statement_buttons_token" id="statement_buttons_token" value="<?php echo $_SESSION['statement_buttons_token']?>"> 


                               
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Start Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="statement_start_date" name="statement_start_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">End Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="statement_end_date" name="statement_end_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date">
                                                </div>       
                                                <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Due Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="statement_due_date" name="statement_due_date"  value="" style="margin-bottom: 10px;" placeholder="Enter due date">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="block-content block-content-full border-top">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="one-profile-edit-name">Percentage %</label>
                                                     <input type="text" class="form-control bg-white format_amount" id="user_state_percentage_amt" name="user_state_percentage_amt" value="" style="margin-bottom: 10px;" placeholder='0.00' onkeypress="return isNumber(event);" autocomplete="off">
                                            </div>
                                             <div class="col-md-4">
                                                <label for="one-profile-edit-name">Amount in $</label>
                                                     <input type="text" class="form-control bg-white format_amount" id="user_state_amt" name="statement_amount" value="" style="margin-bottom: 10px;" placeholder='0.00' onkeypress="return isNumber(event);" autocomplete="off">
                                            </div>
                                        <div class="col-md-4">
                                        <button  class="btn btn-sm btn-info mt-4"  target="_blank"  id="statement_generate_buttons" name="statement_generate_buttons" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>
                                    </div>
                                </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->
     </main>
                <!-- END Main Container -->

<script type="text/javascript">
    function add_transaction()
    {
        // var plan_seqence_id                  = $('#plan_name_sequence').val();

        var trans_check = $('#trans_check').val();

        if($("#trans_check").is(':checked'))
        {
            var checked = '1';   //checked     
        } 
        else 
        {
            var checked = '0';   //unchecked     
        }

        var add_trans_user          = $('#add_trans_user').val();
        var add_trans_cycle         = $('#add_trans_cycle').val();
        var add_trans_date          = $('#add_trans_date').val();
        var add_trans_desc          = $('#add_trans_desc').val();
        var add_trans_ref           = $('#add_trans_ref').val();
        var add_trans_desc_texts     = $.trim($("#add_trans_desc option:selected").text());
        var add_trans_amount        = $('#add_trans_amount').val();
        var hidden_trans_plan_id    = $('#hidden_trans_plan_id').val();

       if((add_trans_user!=''|| trans_check!='') && (add_trans_cycle=='' || add_trans_date=='' || add_trans_desc =='' || add_trans_ref==''|| add_trans_desc_texts=='' || add_trans_amount=='' || hidden_trans_plan_id=='')){

              var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-danger animated fadeIn" role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-times mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Please fill all the fields !!</span><a href="#" target="_blank" data-notify="url"></a></div>';
                  $("#alert_message").html(data);
                  $("#fadeout_div").delay(2000).fadeOut();
                  return false;

       }else{
        $('#add_trans_btn').prop('disabled',true);

        var str1 = add_trans_desc_texts;
        var str2 = "- D";
        if(str1.indexOf(str2) != -1)
        {
          // found D
          var add_trans_desc_textss =str1.replace("- D", "");
        }
        else
        {
          // not found D check C
          var str3 = "- C";
          if(str1.indexOf(str3) != -1)
          {

            // found C
            var add_trans_desc_textss =str1.replace("- C", "");

          }
          else
          {
            // not found C check N
            var str4 = "- N";
            if(str1.indexOf(str4) != -1)
            {
              // found N
              var add_trans_desc_textss =str1.replace("- N", "");
            }
          }
        } 

        var add_trans_desc_text = $.trim(add_trans_desc_textss);

        // if($.trim(plan_seqence_id) != '')
        // {

            $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/insert_transaction";?>',
              data: {
                'checked':checked,
                'add_trans_user':add_trans_user,
                'add_trans_cycle':add_trans_cycle,
                'add_trans_date':add_trans_date,
                'add_trans_desc':add_trans_desc,
                'add_trans_amount':add_trans_amount,
                'add_trans_desc_text':add_trans_desc_text,
                'add_trans_ref':add_trans_ref,
                'hidden_trans_plan_id':hidden_trans_plan_id
            },
              success: function(response){

               var data = JSON.parse(response);

               if(response != '')
               {
                 $('#add_trans_btn').prop('disabled',false);

                   $('#add_trans_user').val('');
                   $('#add_trans_date').val('');
                   $('#add_trans_desc').val('');
                   $('#add_trans_ref').val('');
                   $('#add_trans_amount').val('');
                   $('#add_trans_cycle').val('');
                   $('#entry_type').val('');
                   $('#trans_check').prop('checked', false);
                   $('#add_trans_user').removeAttr('disabled');
                   var data ='<div id="fadeout_div" data-notify="container" class="col-11 col-sm-4 alert alert-info animated fadeIn " role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px; animation-iteration-count: 1;"><button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="position: absolute; right: 10px; top: 5px; z-index: 1035;">×</button><span data-notify="icon" class="fa fa-fw fa-check mr-1"></span> <span data-notify="title"></span> <span data-notify="message">Transaction added successfully for this Cycle. A notification has been sent to the user.</span><a href="#" target="_blank" data-notify="url"></a></div>';

                     $("#alert_message").html(data);
                     $("#fadeout_div").delay(2000).fadeOut();

                     setTimeout(function() {
                            location.reload()
                      }, 1000);
               }
              }
            });
        }
    }
    function disable_select()
    {
        var trans_check = $('#trans_check').val();

        if($("#trans_check").is(':checked'))
        {
            $('#add_trans_user').attr('disabled','disabled');
        } 
        else 
        {
            $('#add_trans_user').removeAttr('disabled');

        }

    }

    function get_entry_type(){

            var add_trans_desc    = $('#add_trans_desc').val();

            $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/get_description_entry_type";?>',
              data: {
                'add_trans_desc':add_trans_desc
            },
              success: function(response){

               var data = JSON.parse(response);

               if(response != '')
               {
                    $('#entry_type').val(data);
               }
               else
               {
                    $('#entry_type').val('');

               }

              }
            });

    }

    function get_bidding_cycles()
    {
        var hidden_trans_plan_id = $('#hidden_trans_plan_id').val();
            $.ajax({
                  type: 'POST',
                  url: '<?php echo base_url()."Admin/get_bidding_cycle_ajax";?>',
                  data: {
                    'hidden_trans_plan_id':hidden_trans_plan_id
                },
                  success: function(response){

                   var data = JSON.parse(response);

                   if(response != '')
                   {
                        $.each(data, function(index, value) {
                        var option= '<option value="'+value.bidding_cycle_count+'">'+value.bidding_cycle_count+'</option>';

                        $('#add_trans_cycle').append(option);

                        var cycle_count_value =$('#hidden_cycle_count').val();
                        $('#add_trans_cycle').val(cycle_count_value);



            });
                   }

                  }
                });
    }    


  function get_plan_transactions_per_cycle()
  {
      var hidden_cycle_count   = $('#hidden_cycle_count').val();
      var hidden_trans_plan_id = $('#hidden_trans_plan_id').val();
      var filter_user          = $('#filter_user').val();
      $("#transactions_details_table_per_cycle > tbody").html("");
       $.ajax({
        type: 'POST',
        url: '<?php echo base_url()."Admin/get_tranaction_entries_for_cycle_ajax";?>',
        data: {
          'hidden_cycle_count':hidden_cycle_count,
          'filter_user':filter_user,
          'hidden_trans_plan_id':hidden_trans_plan_id
      },
        success: function(response){
            var data1 = JSON.parse(response);
            var data2 = JSON.parse(response);
          if($.trim(response)!='1111'){
              var count =1;
              var str1 =0;
              var str2 =0;
              var sum1 = 0;
              var sum2 = 0;
              var count1 =1;
              var str11 =0;
              var str21 =0;
              var sum11 = 0;
              var sum21 = 0;
              var balancearrays1 = [];
             $.each(data2, function(index, value) {
                  var counter1  = count1++;
                  var new_date1 =   value.transaction_date; 
                  var result1 = new_date1.split('-');
                  var newDates1 = result1[1]+'/'+result1[2]+'/'+result1[0];
                  var debit1 = value.transaction_debit_amount;
                  var credit1 = value.transaction_credit_amount;
                  str11     = (parseFloat(value.transaction_debit_amount));
                  str21     = (parseFloat(value.transaction_credit_amount));
                  streeee   = parseFloat(value.prev_bal);
                  sum11 +=str11;
                  sum21 +=str21;
                  if(debit1 == '0.00'){
                      // alert('if');
                      if(credit1 == '0.00')
                      {
                        var Amt1 = '0.00';
                      }
                      else
                      {
                        var Amt1 = '$ -'+credit1;
                      }
                      var bal1 = '$ '+(sum11-sum21).toFixed(2);

                  }
                  else
                  {
                      // alert('else');
                      if(debit1 == '0.00')
                      {
                        var Amt1 = '0.00';
                      }
                      else
                      {
                        var Amt1 = '$ '+debit1;
                      }
                      var bal1 = '$ '+(sum11-sum21).toFixed(2);
                  }                  
                  balancearrays1 = (sum11-sum21+streeee).toFixed(2);
                  
              });
              if(balancearrays1==NaN){
                    balancearrays1='0.00';
                  }
              console.log(balancearrays1);
                   $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url()."Admin/update_transaction_entries_for_cycle_ajax";?>',
                            data: {
                                        'balancearrays1':balancearrays1,
                                        'hidden_cycle_count':hidden_cycle_count,
                                        'filter_user':filter_user,
                                        'hidden_trans_plan_id':hidden_trans_plan_id,
                                  },
                            success: function(response){
                              if(response!='')
                              {
                                var tr1= '<tr class="odd"><td class="text-center font-size-sm">#</td><td class="text-center font-size-sm"></td><td class="text-left font-size-sm">Previous Cycle Balance</td><td class="text-center font-size-sm"></td><td class="text-center font-size-sm"><span class="font-w600"></span></td><td class="text-center font-size-sm"><span class="font-w600">'+response+'</span></td></tr>';
                                if(filter_user != '0'){
                                    $('#transactions_details_table_per_cycle tbody').append(tr1);
                                }
                                    $.each(data1, function(index, value) {
                                          var counter  = count++;
                                          var new_date =   value.transaction_date; 

                                          var result = new_date.split('-');
                                          var newDates = result[1]+'/'+result[2]+'/'+result[0];

                                          var debit = value.transaction_debit_amount;
                                          var credit = value.transaction_credit_amount;


                                          str1 = (parseFloat(value.transaction_debit_amount));
                                          str2 = (parseFloat(value.transaction_credit_amount));
                                          str3 = (parseFloat(response));
                                          sum1 +=str1;
                                          sum2 +=str2;

                                          // console.log(sum1 +' sum1');
                                          // console.log(sum2 +' sum2');

                                          if(debit == '0.00')
                                          {
                                              // alert('if');
                                              if(credit == '0.00')
                                              {
                                                var Amt = '0.00';
                                              }
                                              else
                                              {
                                                var Amt = '$ -'+credit;
                                              }
                                              if(filter_user == '0')
                                              {
                                                var bal = '$ '+(sum1-sum2).toFixed(2);
                                              }
                                              else
                                              {
                                                var bal = '$ '+(sum1-sum2+str3).toFixed(2);
                                              }

                                          }
                                          else
                                          {
                                              // alert('else');
                                              if(debit == '0.00')
                                              {
                                                var Amt = '0.00';
                                              }
                                              else
                                              {
                                                var Amt = '$ '+debit;
                                              }

                                              if(filter_user == '0')
                                              {
                                                var bal = '$ '+(sum1-sum2).toFixed(2);
                                              }
                                              else
                                              {
                                                var bal = '$ '+(sum1-sum2+str3).toFixed(2);
                                              }

                                          
                                          }                  




                                          var tr= '<tr class="odd"><td class="text-center font-size-sm">'+counter+'</td><td class="text-center font-size-sm">'+newDates+'</td><td class="text-left font-size-sm">'+value.transaction_description+' - '+value.transaction_ref+'</td><td class="text-center font-size-sm">'+value.username+'</td><td class="text-center font-size-sm"><span class="font-w600">'+Amt+'</span></td><td class="text-center font-size-sm"><span class="font-w600">'+bal+'</span></td></tr>';

                                          $('#transactions_details_table_per_cycle tbody').append(tr);


                                      });

                              }

                              
                            }
                        });
                  
          }

            else if($.trim(response) == '1111')
            {
                 if(balancearrays1==NaN){
                    balancearrays1='0.00';
                  }
                $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url()."Admin/update_transaction_entries_for_cycle_ajax";?>',
                            data: {
                                        'balancearrays1':balancearrays1,
                                        'hidden_cycle_count':hidden_cycle_count,
                                        'filter_user':filter_user,
                                        'hidden_trans_plan_id':hidden_trans_plan_id,
                                  },
                            success: function(response){
                              if(response!='')
                              {

                                var tr1= '<tr class="odd"><td class="text-center font-size-sm">#</td><td class="text-center font-size-sm"></td><td class="text-left font-size-sm">Opening Cycle Balance</td><td class="text-center font-size-sm"></td><td class="text-center font-size-sm"><span class="font-w600"></span></td><td class="text-center font-size-sm"><span class="font-w600">'+response+'</span></td></tr>';

                                    if(filter_user != '0') {
                                          $('#transactions_details_table_per_cycle tbody').append(tr1);
                                    }


                              }
                        }
                    });


            }

          
        }
      });
  }
function closeModal()
{
    $('#close_cross').click();

}
function close_dialog1()
{
    $('#main_dialog_box1').css('display','none');
}

</script>