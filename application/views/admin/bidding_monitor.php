
<!-- Main Container -->
<div>
        <main id="main-container">

            <!-- Hero -->
                <div class="content ">
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item">Bidding Monitor </li>
                            </ol>
                        </nav>
                </div>

            <!-- END Hero -->
            <!-- Page Content -->

            <div class="content content">
                <div class="block">
                    <div class="block-header">
                        <h3 class="block-title">Bidding Monitor</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row col-md-12">
                          <div class="col-md-4">
                              <label for="one-profile-edit-username">From Date</label>
                                <input style= "background-color: #fff!important;"  type="text" class="form-control" id="bidding_monitor_date" name="bidding_monitor_date"  onchange="getbiddingplans();" placeholder="Select start date here">
                          </div>     
                          <div class="col-md-4">
                              <label for="one-profile-edit-username">To Date</label>
                                <input style= "background-color: #fff!important;"  type="text" class="form-control" id="bidding_monitor_enddate" name="bidding_monitor_enddate" onchange="getbiddingplans();" placeholder="Select end date here">
                          </div>
                        </div>
                        <br>
                        <div class="row mt-3">
                          <div class="col-sm-12">
                               <h3 class="block-title">Live Bidding </h3>
                          </div>
                        </div>
                                    <table id="bidding_monior_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 20%;" class="text-center">S.No</th>
                                            <th style="width: 20%;" class="text-center">Plan Name </th>
                                            <th style="width: 20%;" class="text-center">Start Date</th>
                                            <th style="width: 20%;" class="text-center">End Date </th>
                                            <th style="width: 20%;" class="text-center">Bids</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                                </table>          

                          <div class="row mt-3">
                          <div class="col-sm-12">
                               <h3 class="block-title">Scheduled Bidding </h3>
                          </div>
                        </div>
                                <table id="bidding_monior_table_s" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 25%;" class="text-center">S.No</th>
                                            <th style="width: 25%;" class="text-center">Plan Name </th>
                                            <th style="width: 25%;" class="text-center">Start Date</th>
                                            <th style="width: 25%;" class="text-center">End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                    </tbody>
                                </table>
                                
                    </div>
                </div>
            </div>
            <!-- END User Profile -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->


    <!----------------- MODALS ---------------------->
        <!-- Pop Out Block Modal -->
        <div class="modal fade" id="modal-block-bid-history" tabindex="-1" role="dialog" aria-labelledby="modal-block-bid-history" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Bidding History</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">

                        <table id="bidding_history_popup_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10%;" class="text-center" >ID</th>
                                                    <th style="width: 20%;" class="text-center">Bidder Name</th>
                                                    <th style="width: 20%;" class="text-center">Bidding Amount</th>
                                                    <th style="width: 20%;" class="text-center">Bidding Date</th>
                                                    <th style="width: 10%;" class="text-center">Bidding Cycle</th>
                                                    <th style="width: 20%;" class="text-center">Winner</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           
                                            </tbody>
                                        </table>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Pop Out Block Modal -->
<!----------------- MODALS ---------------------->

<script type="text/javascript">
  

 window.setInterval(function(){
      /// call your function here
      getbiddingliveplans();
    }, 3000);



 function getbiddingliveplans()
 {
   var bidding_monitor_date = $('#bidding_monitor_date').val();
   var bidding_monitor_enddate = $('#bidding_monitor_enddate').val();

      // GET BID DATA 
      $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/getBiddingLivePlan";?>',
            data: 
            {
              'bidding_monitor_date':bidding_monitor_date,
              'bidding_monitor_enddate':bidding_monitor_enddate,
            },
            success: function(response)
            {
             if($.trim(response) != '')
             {  
                var data = JSON.parse(response);
                 $("#bidding_monior_table > tbody").html("");   

                  var count =1;
                  $.each(data, function(index, value) {
                  var counter =count++;
                  
                  // Start Date
                  var dob= value.bidding_start_date;
                  var result = dob.split('-');
                  var time= result[2].split(' ');
                  var newDate = result[1]+'/'+time[0]+'/'+result[0]+' '+time[1];    

                  // End Date
                  var dob1= value.bidding_end_date;
                  var result1 = dob1.split('-');
                  var time1= result1[2].split(' ');
                  var newDate1 = result1[1]+'/'+time1[0]+'/'+result1[0]+' '+time1[1];


                  var tr= '<tr><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm">'+value.plan_name+'</td><td class="text-center font-w600 font-size-sm">'+newDate +'</td><td class="text-center font-w600 font-size-sm">'+newDate1+'</td><td class="text-center font-w600 font-size-sm"><p style="cursor:pointer;" onclick="open_bid_history_popup('+value.id+');" data-toggle="modal" data-target="#modal-block-bid-history"  href="#" data-toggle="bid_datatable"><span id="bid_count" class="bid_count text-dark font_weight" style="color:#0654ba!important;text-decoration: underline;"> Check Bids </span></p></td></tr>';

                  $('#bidding_monior_table tbody').append(tr);
                  });
             }
            }
          });
 } 

 function getbiddingplans()
 {
   var bidding_monitor_date = $('#bidding_monitor_date').val();
   var bidding_monitor_enddate = $('#bidding_monitor_enddate').val();
   $("#bidding_monior_table_s > tbody").html("");   

      // GET BID DATA 
      $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/getBiddingPlanOnDateChange";?>',
            data: 
            {
              'bidding_monitor_date':bidding_monitor_date,
              'bidding_monitor_enddate':bidding_monitor_enddate,
            },
            success: function(response)
            {
             if($.trim(response) != '')
             {
                var data = JSON.parse(response);
                  var count =1;
                  $.each(data, function(index, value) {
                  var counter =count++;

                  // Start Date
                  var dob= value.bidding_start_date;
                  var result = dob.split('-');
                  var time= result[2].split(' ');
                  var newDate = result[1]+'/'+time[0]+'/'+result[0]+' '+time[1];    

                  // End Date
                  var dob1= value.bidding_end_date;
                  var result1 = dob1.split('-');
                  var time1= result1[2].split(' ');
                  var newDate1 = result1[1]+'/'+time1[0]+'/'+result1[0]+' '+time1[1];

                  
                  var tr= '<tr><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm">'+value.plan_name+'</td><td class="text-center font-w600 font-size-sm">'+newDate +'</td><td class="text-center font-w600 font-size-sm">'+newDate1+'</td></tr>';

                  $('#bidding_monior_table_s tbody').append(tr);
                  });
             }
             else
             {
                  $("#bidding_monior_table_s > tbody").html("");

             }
            }
          });
 }  



window.onload = function() {
      getbiddingplansDefault();
};

 function getbiddingplansDefault()
 {
   var bidding_monitor_date = $('#bidding_monitor_date').val();
   var bidding_monitor_enddate = $('#bidding_monitor_enddate').val();
   $("#bidding_monior_table_s > tbody").html("");   

      // GET BID DATA 
      $.ajax({
            type: 'POST',
            url: '<?php echo base_url()."Admin/getBiddingPlanOnDefault";?>',
            data: 
            {
              'bidding_monitor_date':bidding_monitor_date,
              'bidding_monitor_enddate':bidding_monitor_enddate,
            },
            success: function(response){
             if($.trim(response) != '')
             {
                 var data = JSON.parse(response);
                  var count =1;
                  $.each(data, function(index, value) {
                  var counter =count++;
                  // Start Date
                  var dob= value.bidding_start_date;
                  var result = dob.split('-');
                  var time= result[2].split(' ');
                  var newDate = result[1]+'/'+time[0]+'/'+result[0]+' '+time[1];    

                  // End Date
                  var dob1= value.bidding_end_date;
                  var result1 = dob1.split('-');
                  var time1= result1[2].split(' ');
                  var newDate1 = result1[1]+'/'+time1[0]+'/'+result1[0]+' '+time1[1];


                  
                  var tr= '<tr><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm">'+value.plan_name+'</td><td class="text-center font-w600 font-size-sm">'+newDate +'</td><td class="text-center font-w600 font-size-sm">'+newDate1+'</td></tr>';

                  $('#bidding_monior_table_s tbody').append(tr);
                  });
             }
             else
             {
                  $("#bidding_monior_table_s > tbody").html("");

             }
            }
          });
 } 


 function open_bid_history_popup (bidding_plan_id)
    {
        // var bidding_plan_id  = $('#bidding_plan_id').val();
        $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."Admin/get_bidding_history_ajax";?>',
              data: {'bidding_plan_id':bidding_plan_id},
              success: function(response){
                $("#bidding_history_popup_table > tbody").html("");
                if($.trim(response) != '')
                { 
                   var data = JSON.parse(response);
                   $("#bidding_history_popup_table > tbody").html("");
                   var count =1;
                   $.each(data, function(index, value) {
                        var previous_user_id=$('#check_user_id_'+count).val();
                        var check_previous_bid_amount=$('#check_previous_bid_amount_'+count).val();
                        if(previous_user_id!='' && check_previous_bid_amount !='' &&( previous_user_id!=value.bidding_user_id && (check_previous_bid_amount!= value.bidding_place_bid_amount) || (check_previous_bid_amount== value.bidding_place_bid_amount && value.bidding_check_winning_bid==1 && previous_user_id==value.bidding_user_id)) || (check_previous_bid_amount!= value.bidding_place_bid_amount && previous_user_id==value.bidding_user_id)){
                            
                            var counter  = count++;

                        // Date
                        var dob= value.bidding_place_bid_date;
                        var result = dob.split('-');
                        var time= result[2].split(' ');
                        var newDate = result[1]+'/'+time[0]+'/'+result[0]+' '+time[1];
                      
                        if(value.bidding_check_winning_bid=='1'){
                              var check_winner='Winner'
                        }else{
                          var check_winner='';
                        }

                        var tr= '<tr><input type="hidden" name="check_user_id" id="check_user_id_'+count+'" value="'+value.bidding_user_id+'"><input type="hidden" name="check_previous_bid_amount" id="check_previous_bid_amount_'+count+'" value="$'+formatToCurrency(value.bidding_place_bid_amount)+'"><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm text-capitalize">'+value.bidding_bidder_first_name+' '+value.bidding_bidder_last_name +'</td><td class="text-center font-w600 font-size-sm">$'+formatToCurrency(value.bidding_place_bid_amount)+'</td><td class="text-center font-w600 font-size-sm">'+newDate+'</td><td class="text-center font-w600 font-size-sm">'+value.bidding_cycle_count+'</td><td class="text-center font-w600 font-size-sm">'+check_winner+'</td></tr>';

                        $('#bidding_history_popup_table tbody').append(tr);
                }
                    });


                }
                
              }
            });
    }
</script>