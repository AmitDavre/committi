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
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>manage-users">Manage User</a></li>
                                    <li class="auto_capitalize breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>edit-user/<?php echo base64_encode($user_id);?>"><?php echo $users['first_name'].' '.$users['last_name']?></a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>view-transactions/<?php echo base64_encode($plan_id);?>/<?php echo base64_encode($user_id);?>">Plan Transactions</a> </li>
                                    <li class="breadcrumb-item">New Transaction</li>

                                </ol>
                            </nav>
                    </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content content">
                   <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">New Transaction</h3>
                        </div>
                        <p id="alert_message"></p>
                        <div class="block-content block-content-full">
                            <input type="hidden" name="hidden_trans_plan_id" id="hidden_trans_plan_id" value="<?php echo $plan_id;?>">
                            <input type="hidden" name="hidden_trans_user_id" id="hidden_trans_user_id" value="<?php echo $user_id;?>">
           
                                <div class="row mb-3">   <!---Row 1 ---> 
                                
                                <div class="col-md-4">
                                    <label for="one-profile-edit-username">Select User</label>
                                        <select  class="form-control" id="add_trans_user" name="add_trans_user" >
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
                                    <input type="text" class="js-flatpickr form-control bg-white" id="add_trans_date" name="add_trans_date" placeholder="Pleae select date" value="" autocomplete="off" style="text-transform: capitalize;">
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
                                    <input type="text" class="form-control currency_format" id="add_trans_amount" name="add_trans_amount" placeholder="Enter amount here" value="" autocomplete="off" onkeypress="return isNumber(event);">
                                </div>
                            </div>

                            <div class="row mb-3">   <!---Row 3 --->
                             
                                <div class="col-md-4">
                                    <label for="one-profile-edit-name">Reference/Notes</label>
                                    <input type="text" class="form-control" id="add_trans_ref" name="add_trans_ref" placeholder="Enter refernece here" value="" autocomplete="off" >
                                </div>
                            </div>     
                            <div class="row mb-3">   <!---Row 3 --->
                                <div class="col-md-4">
                                    <button id="add_trans_btn" name="add_trans_btn" class="btn btn-info btn-sm" onclick="add_transaction();">Add Transaction</button>
                                </div>
                            </div>


                            <br><h3 class="block-title">View Transactions</h3><br>
                            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="transactions_details_table_per_cycle" class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" width="100%">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 5%;" class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_2"  aria-sort="ascending" aria-label="ID: activate to sort column descending">S.No</th>
                                                    <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Name: activate to sort column ascending">Transaction Date </th>
                                                    <th style="width: 60%;" class="d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Email: activate to sort column ascending">Description</th>
                                                    <th style="width: 10%;" class="d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Access: activate to sort column ascending">Amount $</th>
                                                    <th  style="width: 10%;"class="sorting" tabindex="0" aria-controls="DataTables_Table_2" aria-label="Registered: activate to sort column ascending">Balance $</th>
                                                </tr>
                                            </thead>
                                
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- END Page Content -->
     </main>
                <!-- END Main Container -->

<script type="text/javascript">

  window.onload = function() {

    var hidden_trans_user_id= $('#hidden_trans_user_id').val();
    $('#add_trans_user').val(hidden_trans_user_id);


    var user_name = $("#add_trans_user option:selected").text();

    // $('#user_name').html(user_name);

    get_plan_transactions_per_cycle_user();


  };


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
        var add_trans_desc_texts    = $.trim($("#add_trans_desc option:selected").text());
        var add_trans_amount        = $('#add_trans_amount').val().replace(/,/g,"");
        var hidden_trans_plan_id    = $('#hidden_trans_plan_id').val();

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
        // }
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


  function get_plan_transactions_per_cycle_user()
  {
      var hidden_trans_plan_id = $('#hidden_trans_plan_id').val();
      var hidden_trans_user_id = $('#hidden_trans_user_id').val();

       $.ajax({
        type: 'POST',
        url: '<?php echo base_url()."Admin/get_tranaction_entries_for_cycle_ajax_per_user";?>',
        data: {
          'hidden_trans_user_id':hidden_trans_user_id,
          'hidden_trans_plan_id':hidden_trans_plan_id
      },
        success: function(response){
          var data = JSON.parse(response);

          if(response!='')
          {
              $("#transactions_details_table_per_cycle > tbody").html("");

              var count =1;
              var str1 =0;
              var str2 =0;
              var sum1 = 0;
              var sum2 = 0;
             $.each(data, function(index, value) {
                  var counter  = count++;

                  var new_date =   value.transaction_date; 

                  var result = new_date.split('-');
                  var newDates = result[1]+'/'+result[2]+'/'+result[0];

                  var debit = value.transaction_debit_amount;
                  var credit = value.transaction_credit_amount;

                  str1 = (parseInt(value.transaction_debit_amount));
                  str2 = (parseInt(value.transaction_credit_amount));

                  sum1 +=str1;
                  sum2 +=str2;


                  console.log(sum1);
                  console.log(sum2);


                  if(debit == '0.00')
                  {
                      // alert('if');
                      if(credit == '0.00')
                      {
                        var Amt = ' ';
                      }
                      else
                      {
                        var Amt = '$ -'+formatToCurrency(credit);
                      }
                      var bal = '$ '+formatToCurrency(sum1-sum2);

                  }
                  else
                  {
                      // alert('else');
                      if(debit == '0.00')
                      {
                        var Amt = ' ';
                      }
                      else
                      {
                        var Amt = '$ '+formatToCurrency(debit);
                      }
                      var bal = '$ '+formatToCurrency(sum1-sum2);

                  
                  }              



             
                  var tr= '<tr role="row" class="odd"><td class="text-center font-size-sm sorting_1">'+counter+'</td><td class="text-center font-size-sm sorting_1">'+newDates+'</td><td class="text-left font-size-sm sorting_1">'+value.transaction_description+'</td><td class="text-center font-size-sm sorting_1"><span class="font-w600">'+Amt+'</span></td><td class="text-center font-size-sm sorting_1"><span class="font-w600">'+bal+'</span></td></tr>';

                  $('#transactions_details_table_per_cycle tbody').append(tr);




              });
                  
          }
         
          
        }
      });
  }



</script>