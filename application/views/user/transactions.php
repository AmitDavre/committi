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
                                    <li class="breadcrumb-item">Transactions/Plans</li>
                                    <li class="breadcrumb-item">Transactions</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->
                <!-- Page Content -->

                <div class="content content">

                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Plan Details</h3>
                            <input type="hidden" name="hidden_application_plan_id_value" id="hidden_application_plan_id_value" value="<?php echo $application_plan_id_value; ?>">
                            <input type="hidden" name="hidden_user_session_id" id="hidden_user_session_id" value="<?php echo $session_data['id']; ?>">
                        </div>

                        <div class="block-content block-content-full">
                            <form action="<?php echo base_url()?>search-plan" method="POST" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-sm-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Select Plan
                                                    </span>
                                                </div>
                                                <!-- <select class="form-control" id="plan_id" name="plan_id" onchange="plan_details(this);get_transaction_details(this);"> -->
                                                <select class="form-control" id="plan_id" name="plan_id" onchange="plan_details(this);get_plan_transactions(this);get_statement_due_date();">
                                                    <option value="">Select</option>
                                                 <?php
                                                    // Iterating through the tier array
                                                     // array_unshift($plans, "phoney");
                                                     // unset($plans[0]);
                                                    foreach($plans as $key =>$item){
                                                    ?>
                                                    <option value="<?php  echo $item['id'];?>" >
                                                    <?php echo $item['plan_name'];?>
                                                    </option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                       

                                    <div class="col-sm-4 col-lg-4 col-xl-4">
                                        <!-- <div class="form-group">
                                            <button type ="button"class="btn btn-sm btn-info" onclick="pay_now_modal();">Pay Now</button>
                                        </div> -->
                                        <div class="form-group">
                                            <button type ="button"class=" form-control-sm btn btn-sm btn-info" onclick="return paymentInformation();">Pay Now</button>
                                        </div>
                                    </div>

                                </div>
                            </form>

                                <div class="row">                              
                                    <div class="col-sm-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="example-select">Plan ID</label>
                                            <input type="text" class="form-control" id="PlanId" name="PlanId" value="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-select">Plan Name</label>
                                            <input type="text" class="form-control" id="PlanName" name="PlanName" value="" readonly>
                                        </div> 
                                        <div class="form-group">
                                            <label for="example-select">Total Bidding Cycle</label>
                                            <input type="text" class="form-control" id="TotalNoBiddingCycle" name="TotalNoBiddingCycle" value="" readonly>
                                        </div> 
                                    </div>

                                   <div class="col-sm-4 col-lg-4 col-xl-4">

                                        <div class="form-group">
                                            <label for="example-select"> Start Date</label>
                                            <input type="text" class="form-control" id="StartDate" name="StartDate" value="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-select">End Date</label>
                                            <input type="text" class="form-control" id="EndDate" name="EndDate" value="" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-select"> Statement Due Date</label>
                                            <input type="text" class="form-control" id="DueDate" name="DueDate" readonly>
                                        </div>
                                    </div>
                                 <div class="col-sm-4 col-lg-4 col-xl-4">
                                     <div class="form-group">
                                            <label for="example-select"> Statement Balance ($)</label>
                                            <input type="text" class="form-control" id="StatementBalance" name="StatementBalance" readonly>
                                     </div>
                                    <div class="form-group">
                                            <label for="example-select">  Next Bidding Cycle</label>
                                            <input type="text" class="form-control" id="NextBiddingCycle" name="NextBiddingCycle" readonly>
                                     </div>
                                 </div>
                                </div>
<!--------------------------------- TRANSACTION TABLE DETAILS ------------------------------------->
                                <br><h3 class="block-title">Transaction Details</h3><br>
                                              <table  id="transactions_details_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                            <thead>
                                                <tr role="row" class="text-nowrap">
                                                    <th style="width: 5%;" class="text-center">ID</th>
                                                    <th style="width: 15%;">Transaction Date </th>
                                                    <th style="width:40%;">Description</th>
                                                    <th style="width:15%;">Bidding Cycle</th>
                                                     <th style="width: 15%;">Total Bids</th>
                                                    <th style="width: 15%;">Amount $</th>
                                                    <th  style="width: 10%;">Balance $</th>
                                                </tr>
                                            </thead>
                                            <tbody>  
                                            <?php 
                                            if ($winning_bid != '')
                                            {
                                                $count =1; 
                                                foreach($winning_bid as $item) 
                                                    { 
                                            ?> 
                                                    <tr role="row" class="odd">
                                                        <td class="text-center font-size-sm"><?php echo $count++ ?></td>
                                                        <td class="text-center font-size-sm">

                                                         <?php $bidding_place_bid_date= date('m/d/Y',strtotime($item['bidding_place_bid_date'])); echo $bidding_place_bid_date?>

                                                    </td>
                                                        <td class="text-center font-size-sm">Cycle  Winning Bid <!-- @ <?php echo $item['bidding_place_bid_amount'] ?>/<?php echo $count_rows;?> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  <?php echo $item['bidding_bidder_first_name'].' '.$item['bidding_bidder_last_name']; ?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="text-muted" href="<?php echo base_url()?>bidding-details/<?php echo $item['bidding_plan_id'];?>">Total Bids(<?php echo $count_rows;?>) </a> -->
                                                        </td>
                                               <!--          <td class="text-center font-size-sm text-capitalize"><?php echo $item['bidding_bidder_first_name'].' '.$item['bidding_bidder_last_name']; ?> </td> -->
                                                        <td class="text-center font-size-sm"><a class="text-muted" href="<?php echo base_url()?>bidding-details/<?php echo $item['bidding_plan_id'];?>">Total Bids(<?php echo $count_rows;?>) </a></td>
                                                        <td class="text-center font-size-sm">-</td>
                                                        <td class="text-center font-size-sm">-</td>
                                                        
                                                    </tr>
                                            <?php   }
                                            }
                                            ?>
                                           
                                            </tbody>
                                        </table>
                        </div>

<!---------------------------------- TRANSACTION TABLE --------------------------------->

                    </div>

                </div>

                <!-- END User Profile -->

            </div>

            <!-- END Page Content -->

        </main>

        <!-- END Main Container -->

<script type="text/javascript">

function plan_details(that)
{
    var plan_id = $('#plan_id').find(":selected").val();
    var hidden_user_session_id = $('#hidden_user_session_id').val();


    if(plan_id != '')
    {
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."User/ajax_plan_details";?>',
          data: {'plan_id':plan_id},
          success: function(response){

            var data = JSON.parse(response);


            if(response!='')
            {
                // alert('2');


                var startDate= data[0].enrollment_start_date ;
                // var date_1    = new Date(startDate);
                // alert(date_1);
                // var yr_1      = date_1.getFullYear();
                // var month_1   = date_1.getMonth();
                // var day_1     = date_1.getDate();
                var result = startDate.split('-');
                var day=result[2].substr(0,2);
                var newDate_1 = result[1]+'/'+day+'/'+result[0];
                // var newDate_1 = month_1 + '/' + day_1 + '/' + yr_1;


                

                var endDate= data[0].enrollment_end_date ;
                // var date_2    = new Date(endDate);
                // var yr_2      = date_2.getFullYear();
                // var month_2   = date_2.getMonth();
                // var day_2     = date_2.getDate();
                // var newDate_2 = month_2 + '/' + day_2 + '/' + yr_2;
                 var result2 = endDate.split('-');
                 var day1=result2[2].substr(0,2);
                 var newDate_2 = result2[1]+'/'+day1+'/'+result2[0];




                $('#PlanId').val(data[0].id);    
                $('#PlanName').val(data[0].plan_name);    
                $('#TotalNoBiddingCycle').val(data[0].no_bidding_cycle);    
                $('#StartDate').val(newDate_1);    
                $('#EndDate').val(newDate_2);
                $('#NextBiddingCycle').val(data.bidding_cycle_count);    
            }
            else if(response == '1')
            {
                $('#PlanId').val('');    
                $('#PlanName').val('');    
                $('#TotalNoBiddingCycle').val('');    
                $('#StartDate').val('');    
                $('#EndDate').val('');
                $('#NextBiddingCycle').val('');
            }
            
          }
        });
    }
    else
    {
        $('#PlanId').val('');    
        $('#PlanName').val('');    
        $('#TotalNoBiddingCycle').val('');    
        $('#StartDate').val('');    
        $('#EndDate').val(''); 
        $('#NextBiddingCycle').val('');
    }
     
}


function get_transaction_details(that)
{
    var plan_id = $('#plan_id').find(":selected").val();

     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/ajax_transaction_details";?>',
      data: {'plan_id':plan_id},
      success: function(response){
        var data = JSON.parse(response);
        if(response!='')
        {
            destory_data_table("#transactions_details_table");
            $("#transactions_details_table > tbody").html("");
            var count =1;
           $.each(data, function(index, value) {
                var counter  = count++;
                var link ="<?php echo base_url()?>bidding-details/";

                var bidDate= value.bidding_place_bid_date ;

                var date    = new Date(bidDate);
                var yr      = date.getFullYear();
                var month   = date.getMonth();
                var day     = date.getDate();
                var newDate = month + '/' + day + '/' + yr;

              // var tr= '<tr role="row" class="odd"><td class="text-center font-size-sm sorting_1">'+counter+'</td><td class="text-center font-size-sm sorting_1">'+newDate+'</td><td class="text-center font-size-sm sorting_1">Cycle  Winning Bid @ '+value.bidding_place_bid_amount+' / '+counter+'&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  '+value.bidding_bidder_first_name+' '+value.bidding_bidder_last_name+'   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" class="text-muted" href='+link+'>Total Bids('+counter+') </a></td></td><td class="text-center font-size-sm sorting_1">10</td><td class="text-center font-size-sm sorting_1">20</td></tr>';
                
                var tr= '<tr role="row" class="odd"><td class="text-center font-size-sm sorting_1">'+counter+'</td><td class="text-center font-size-sm sorting_1">'+newDate+'</td><td class="text-center font-size-sm sorting_1">Cycle  Winning Bid @ '+value.bidding_place_bid_amount+' / '+counter+'&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  '+value.bidding_bidder_first_name+' '+value.bidding_bidder_last_name+'   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" class="text-muted" href='+link+'>Total Bids('+counter+') </a></td><td class="text-center font-size-sm sorting_1">'+value.bidding_bidder_first_name+' '+value.bidding_bidder_last_name+'</td><td class="text-center font-size-sm sorting_1"><a target="_blank" class="text-muted" href='+link+value.bidding_plan_id+'>Total Bids('+counter+')</a></td><td class="text-center font-size-sm sorting_1">10</td><td class="text-center font-size-sm sorting_1">20</td></tr>';

                // $('#transactions_details_table tbody').append(tr);
            });
           intializeDatatable("#transactions_details_table");  

        }
      }
    });
}
function get_plan_transactions(that)
{
    var plan_id = $('#plan_id').find(":selected").val();
    var hidden_user_session_id = $('#hidden_user_session_id').val();
    var link ="<?php echo base_url()?>bidding-details-transactions/";
    $("#transactions_details_table > tbody").html("");
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/ajax_get_plan_transactions";?>',
      data: {
        'plan_id':plan_id,
        'hidden_user_session_id':hidden_user_session_id
    },
      success: function(response){
        
        if(response!='')
        {
            var data = JSON.parse(response);
            $("#transactions_details_table > tbody").html("");
             destory_data_table("#transactions_details_table");  

            var count =1;
            var str1 =0;
            var str2 =0;
            var sum1 = 0;
            var sum2 = 0;
           $.each(data, function(key, row) {
                var counter  = count++;
                var new_date =   row.transaction_date; 
                var result = new_date.split('-');
                var newDates = result[1]+'/'+result[2]+'/'+result[0];
                var debit = row.transaction_debit_amount;
                var credit = row.transaction_credit_amount;
                str1 = (parseFloat(row.transaction_debit_amount));
                str2 = (parseFloat(row.transaction_credit_amount));
                sum1 +=str1;
                sum2 +=str2;
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


                 // alert(row.first_name);    
                  
                // var trr= '<tr role="row" class="odd"><td class="text-center font-size-sm sorting_1">'+counter+'</td><td class="text-center font-size-sm sorting_1">'+newDates+'</td><td class="text-left font-size-sm sorting_1">'+row.transaction_description+'</td><td class="text-center font-size-sm sorting_1">'+row.first_name+' '+row.last_name+'</td><td class="text-center font-size-sm sorting_1"><a target="_blank" class="text-muted" href='+link+row.transaction_plan_id+'>Total Bids('+row.total_bids+') </a></td><td class="text-center font-size-sm sorting_1"><span class="font-w600">'+Amt+'</span></td><td class="text-center font-size-sm sorting_1"><span class="font-w600">'+bal+'</span></td></tr>';    

                var trr= '<tr role="row" class="odd"><td class="text-center font-size-sm sorting_1">'+counter+'</td><td class="text-center font-size-sm sorting_1">'+newDates+'</td><td class="text-left font-size-sm sorting_1">'+row.transaction_description+'</td><td class="text-center font-size-sm sorting_1">'+row.transaction_bidding_cycle+'</td><td class="text-center font-size-sm sorting_1"><a target="_blank" class="text-muted" href='+link+row.transaction_plan_id+'/'+row.transaction_bidding_cycle+'>Total Bids('+row.total_bids+') </a></td><td class="text-center font-size-sm sorting_1"><span class="font-w600">'+Amt+'</span></td><td class="text-center font-size-sm sorting_1"><span class="font-w600">'+bal+'</span></td></tr>';

              
                $('#transactions_details_table tbody').append(trr);
            }); 
         intializeDatatable("#transactions_details_table");  
        }
      }
    });
}
function pay_now_modal(){
    alert('Dummy Pay Now Popup');
}
function get_plan_transactions_statement_balance(that)
{
    var plan_id = $('#plan_id').find(":selected").val();
    var hidden_user_session_id = $('#hidden_user_session_id').val();
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/get_statement_balance_value_on_plan_change";?>',
      data: {
        'plan_id':plan_id,
        'hidden_user_session_id':hidden_user_session_id
    },
      success: function(response){
        if(response!='')
        {
          var data = JSON.parse(response);
          $('#StatementBalance').val(response);
        }
      }
    });
}
function get_statement_due_date()
{
    var plan_id = $('#plan_id').find(":selected").val();
    var hidden_user_session_id = $('#hidden_user_session_id').val();
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/get_statement_due_date";?>',
      data: {
        'plan_id':plan_id,
        'hidden_user_session_id':hidden_user_session_id
    },
      success: function(response){
        if(response!='')
        { 
          var data = JSON.parse(response);
          if(data.due_amount!=''){
          $('#StatementBalance').val('$'+data.due_amount);
          }
          $('#DueDate').val(data.due_date);
        }
      }
    });
}

function get_next_cycle_date()
{
    var plan_id = $('#plan_id').find(":selected").val();
    var hidden_user_session_id = $('#hidden_user_session_id').val();


     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/get_next_cycle_date_ajax";?>',
      data: {
        'plan_id':plan_id,
        'hidden_user_session_id':hidden_user_session_id
    },
      success: function(response){
        
        if(response!='')
        {
            var data = JSON.parse(response);
            if(data.due_amount!=''){
          $('#StatementBalance').val(data.due_amount);
        }
        }
      }
    });
}
function paymentInformation(){
    var plan_id=$('#plan_id').val();
    if(plan_id!='')
    {
        $.ajax({
            url:"<?php echo base_url()?>User/getEncryptedPlanId",
            type:"POST",
            data:{'plan_id':plan_id},
            success:function(response){
                window.location.href="<?php echo base_url('payments-info/')?>"+response;
            }
        });
    }else{
        window.location.href="<?php echo base_url('payments')?>";
    }
}
</script>
