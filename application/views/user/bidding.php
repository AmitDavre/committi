<style type="text/css">
.table-bordered td, .table-bordered th 
{
    border: 1px solid #000;
}
.custom-alig-table
{
    text-align: center!important;
    vertical-align: middle!important;
}
i.si.si-arrow-down {
    color: black!important;
}
i.si.si-arrow-up {
    color: black!important;
}
.block-header.blacl td {
    border: 0;
    text-align: left !important;
    font-size: 15px;
}
.border_box_css{
    border: 1px solid;  
}
.block-header.blacl {
    background: whitesmoke !important;
}
.block-header.blacl td {
    border: 0;
    text-align: left;
    font-size: 12px;
}
.block-header.blacl span#bidding_cycle {
    font-size: 12px !important;
    text-align: left !important;
}
span.text-white {
    font-size: 12px;
}
td {
    font-size: 12px;
    text-align: left !important;
}
tr.cruntbid td {
    background: #e0e0e0;
    border: 0 !important;
}
input#current_bid_amount, input#bid_amount, input#current_bid_amount  
 {
    width: 100% !important;
    border: 1px solid #d2cdcd !important;border-radius: 0;
    padding: 6px 0px !important;
}
.text_align_center{
    text-align: center;
}
tr.cruntbid, tr.cruntbid td {
    border: 0 !IMPORTANT;
    background: #e6e3e3;
}
.block-header {
    background: #f9f9f9;
    border: 1px solid #e6e3e3!important;
    box-shadow: none !important;
}
.border_box_css.block {
    border: solid;
    border: solid;
    border: 1px solid #f1f1f1;
}
.block-header.bg-info {
    background: #e6e3e3 !important;
    color: #000000 !important;
    margin-bottom: 21px;
}
.block-header.bg-info h3 {
    color: #000000 !important;
}
.color_p_tag{
    width: 100%;
    margin-top: .5rem;
    font-size: .875rem;
    color: #d26a5c;
}
tr.cruntbid.pad td {
    padding-top: 34px !important;
    /* float: left; */
    /* width: 100%; */
}
tr.cruntbid2 td {
    border: 0px;
    background: #f9f9f9;
    border-color: #f9f9f9 !important;
}
.font_weight{
    font-weight: bold;
}
</style>
<div>
<!-- Main Container -->
            
            <main id="main-container">

                <!-- Hero -->
                <div id="page-loader" class="show"></div>
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Transactions/Plans</li>
                                    <li class="breadcrumb-item">Plans</li>
                                    <li class="breadcrumb-item">Bidding</li>
                                    <li class="breadcrumb-item"><?php echo $result_bidding_details['plan_name']?></li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->
                <!-- Page Content -->

                <div class="content content-full">

                    <!-- User Profile -->

                    <div class="block">
                        <p id="alert_message"></p>
                        <p id="alert_message1"></p>
                        <p id="alert_message_last_bid"></p>
                        <p id="alert_message_outbidpopup"></p>


                        

                        <div class="block-content">  
                            <div class="row"> 
                                <div class="col-md-8 block block-themed block-transparent mb-0">
								<div class="block-header blacl ">
                            <div class="table-responsive">
                  
                                <input type="hidden" name="total_bidding_cycle" id="total_bidding_cycle" value="<?php echo $result_bidding_details['no_bidding_cycle']; ?>">


                                <input type="hidden" name="check_bid_over" value="" id="check_bid_over">
                                <input type="hidden" name="chcek_bid_amount" id="chcek_bid_amount" value="">
                                <input type="hidden" name="check_next_cycle_bid" id="check_next_cycle_bid" value="">
                                <input type="hidden" name="current_bidding_status" id="current_bidding_status" value="<?php  echo $current_bidding_status; ?>">
                                 <input type="hidden" id="winner_user_id" name="winner_user_id" value="<?php if(isset($winner_user_id)) { echo $winner_user_id;}?>">
                                 <input type="hidden" id="first_name" name="first_name" value="<?php if(isset($session_data)) { echo $session_data['first_name'];}?>">

                                  <input type="hidden" id="last_name" name="last_name" value="<?php if(isset($session_data)) { echo $session_data['last_name'];}?>">

                                 <input type="hidden" id="winner_user_id" name="winner_user_id" value="<?php if(isset($winner_user_id)) { echo $winner_user_id;}?>">

                                <input type="hidden" name="hidden_plan_idData" id="hidden_plan_idData" value="<?php echo $result_bidding_cycle_data['0']['id'];?>">
                                <input type="hidden" name="hidden_user_idData" id="hidden_user_idData" value="<?php echo $session_data['id'];?>">
                                <table class="table table-bordered">
                                     
									 
                                    <tr>
									<td style="width: 171px;">
                                       
                                        
                                        <input type="hidden" id="bidding_plan_id" name="bidding_plan_id" value="<?php echo $result_bidding_details['confirmed_plan_plan_id']?>">

                                            <input type="hidden" id="bidding_user_id" name="bidding_user_id" value="<?php echo $result_bidding_details['confirmed_plan_user_id']?>">

                                            <span id="bidding_cycle" style="font-size: 12px;font-weight:700;"> 
                                            <input type="hidden" name="plan_name" id="plan_name" value="<?php echo $result_bidding_details['plan_name']?>">
                                            <?php echo $result_bidding_details['plan_name']?>

                                            (Bidding Cycle #

                                                <?php 
                                                 if ($resultBidCycleData != '')
                                                {

                                                foreach ($resultBidCycleData as $key => $value) {
                                                        $date = date('Y-m-d H:i:s');
                                                        // echo $date ;
                                                        // die();
                                                        if($date >= $value['bidding_schedule_date'] && $date <= $value['bidding_schedule_end_date'])
                                                        {
                                                            echo $value['bidding_cycle_count'];
                                                        }
                                                        else
                                                        {

                                                        }
                                                    }
                                                }
                                                ?>
                                             )
                                            </span>
                                            </td>

                                        <td class="text_align_center">
                                            <b>
                                                <span class="text-dark"> Bidding Starts @ 
                                                <?php 

                                                 if ($resultBidCycleData != '')
                                                {
                                                foreach ($resultBidCycleData as $key => $value) {
                                                        $date = date('Y-m-d H:i:s');
                                                        // echo $date.'<br>' ;

                                                        // echo $value['bidding_schedule_date'];
                                                        // die();
                                                        if($date >= $value['bidding_schedule_date'] && $date <= $value['bidding_schedule_end_date'])
                                                        {
                                                            echo $value['bidding_schedule_date'];
                                                        }
                                                        else
                                                        {
                                                            
                                                        }
                                                    }
                                                }
                                                ?>



                                             </b></span>
                                        </td>
                                        <td>
                                            <!-- <b class="text-dark">Time Left</b> -->
                                            <span id="demo2" style="float: right;" class="text-dark font-weight-bold"></span>
                                        </td>
										</tr>
										<tr>
										<td>&nbsp;</td>
                                        <td class="text_align_center">
                                            <b>
                                                <span class="text-dark"> Bidding Ends @ 

                                                <?php 

                                                if ($resultBidCycleData != '')
                                                {
                                                foreach ($resultBidCycleData as $key => $value) {
                                                        $date = date('Y-m-d H:i:s');
                                                        // echo $date ;
                                                        // die();
                                                        if($date >= $value['bidding_schedule_date'] && $date <= $value['bidding_schedule_end_date'])
                                                        {
                                                            echo $value['bidding_schedule_end_date'];
                                                        }
                                                        else
                                                        {

                                                        }
                                                    }
                                                }
                                                ?> </span>
                                            </b>

                                        </td>
                                        
                                    </tr>
									<tr>
									<td><span class="text-dark" style="font-size: 12px;font-weight:700;">Your Status:</span></td>
									<td class="text_align_center">
                                            <!-- <span class="text-dark"> Bid Now/Won/Retrictions </span> -->
                                             <span class="text-dark" id="bidding_status_text"><?php if(isset($restricted_bid_upto) && isset($bidding_cycle_count_value1) && $restricted_bid_upto!='' && $bidding_cycle_count_value1!='' && $restricted_bid_upto>=$bidding_cycle_count_value1){ echo "You are restricted upto ".$restricted_bid_upto.' cycle';} else if($bidding_cycle_count_value1=='' && $restricted_bid_upto!='') { echo "You are restricted upto ".$restricted_bid_upto.' cycle'; } else if($bidding_cycle_count_value1=='') { echo 'Bid Inactive'; } else{echo 'Active Bid';}?></span>
                                        </td>
									</tr>
                                </table>
                            </div>

                        </div>
                                    <div class="block-header bg-info" style="display:none;">
                                        <div class="col-md-4">
                                            <span class="block-title">Time Left:</span>
                                        </div>
                                        <div class="col-md-4">
                                            <span id="demo" style="float: right;" class=" block-title"></span>
                                        </div>
                                    </div>
                                        <div class="table-responsive">
                                            <table id="bidding_table" class="table table-bordered align">
                                                <tr class="cruntbid pad" >
                                                    <td class="custom-alig-table" style="border-right: 1px solid #fff; text-align: left !important;
    width: 191px;
    padding-left: 34px;">
                                                        <span class="text-dark" style="font-size: 12px;font-weight:700;">Current Bid :</span>
                                                    </td>
                                                    <td id="current_bid_td" class="custom-alig-table" style="border-right: 1px solid #fff;">
                                                         <input class="custom-alig-table" type="text" id="current_bid_amount" name="current_bid_amount" value="$<?php echo number_format($result_bidding_details1['bidding_start_amount_without_deduct'],2)?>" style="font-weight: 700;border: none;" readonly="readonly">
                                                    </td>
                                                    <td class="">
                                                         <!-- <a target="_blank" href="<?php echo base_url();?>bidding-details/<?php echo $result_bidding_cycle_data['0']['id'];?>"><span id="bid_count" class="bid_count text-dark font_weight"> Bids [ <span style="color:#0654ba;text-decoration: underline;">0</span> ] </span></a> -->

                                                         <p onclick="open_bid_history_popup();" data-toggle="modal" data-target="#modal-block-bid-history"  href="#"><span id="bid_count" class="bid_count text-dark font_weight"> Bids [ <span style="color:#0654ba;text-decoration: underline;"></span> ] </span></p>
                                                    </td>
                                                </tr> 
                                                <tr class="cruntbid">
                                                    <td style="border-right: 1px solid #fff;">
                                                        <span id= "bid_or_less" class="text-dark" style="font-weight: 700;">Enter $ <?php echo number_format($result_bidding_details1['bidding_start_amount_dynamic'],2)?> or Less</span>
                                                    </td>
                                                    <td class="custom-alig-table" style="border-right: 1px solid #fff;">
                                                        <span class='placeBidButton'><input class="text-dark custom-alig-table form-control placeBidButton format_amount" type="text" name="bid_amount" id="bid_amount" value="$0.00" onkeypress="return isNumber(event);"></span><br>

                                                        
                                                         <p id="fadeout_div_bid_error_msg"></p>
                                                        <input type="hidden" name="hidden_dynamic_bid_val" id="hidden_dynamic_bid_val" value="<?php  $valueBidDVal=number_format($result_bidding_details1['bidding_start_amount_dynamic'],2);
                                                        echo $newValBiDDynamic = str_replace( ',', '', $valueBidDVal );
                                                        ?>">

                                                         
                                                    </td>
                                                    <td class="" style="border-left: 1px solid #fff;">
                                                         <input type="hidden" id="restricted_bid_upto" name="restricted_bid_upto" value="<?php if($restricted_bid_upto){ echo $restricted_bid_upto;}?>">
                                                          <input type="hidden" id="bidding_cycle_count_value1" name="bidding_cycle_count_value1" value="<?php if($bidding_cycle_count_value1){ echo $bidding_cycle_count_value1;}?>">
                                                         <span class='placeBidButton'><button id="place_a_bid_btn_1" type="button" class="btn btn-info" onclick="place_a_bid(this);" <?php if($restricted_bid_upto && $bidding_cycle_count_value1) {if($restricted_bid_upto>=$bidding_cycle_count_value1) {echo 'disabled';}}?>><span class="text-white placeBidButton" style="font-weight: 700;">Place Bid</span></button></span>
                                                    </td>
                                                </tr>
              
                                                <tr class="cruntbid2">
                                                    <td class="custom-alig-table" style="border-right: 1px solid #fff;text-align: left !important;
    width: 191px;
    padding-left: 34px;">
                                                        <span class="text-dark" style="font-weight: 700;">Win Bid Now :</span>
                                                    </td>
                                                    <td class="custom-alig-table" style="border-right: 1px solid #fff;">
                                                        <span id="winBidAmount" class="text-dark" style="font-weight: 700;">$<?php echo number_format($result_bidding_details['plan_win_bidding_amount'],2)?></span>
                                                        <input type="hidden" name="hidden_win_bid_amount" id="hidden_win_bid_amount" value="<?php echo $result_bidding_details['plan_win_bidding_amount'];?>">
                                                    </td>
                                                    <td class="" >
                                                        <button id="place_a_bid_btn_2" type="button" class="btn btn-info" onclick="place_win_bid();" <?php if(isset($restricted_bid_upto) && isset($bidding_cycle_count_value1)){if($restricted_bid_upto>=$bidding_cycle_count_value1) {echo 'disabled';}}?>><span class="text-white" style="font-weight: 700;"> Place Bid </span></button>
                                                    </td>
                                                </tr>
                                            
                                            </table>
                                        </div>
                                </div>  
                                <div class="col-md-4 block block-themed block-transparent mb-0">
                                    <div class="block-header bg-info">
                                        <h3 class="block-title">Common FAQ's </h3>
                                    </div>
                                  <?php if(isset($result_faqs_settings) && $result_faqs_settings!=''){ foreach($result_faqs_settings as $faq){?>
                                    <div class="border_box_css block block-mode-hidden">
                                        <div class="block-header">
                                            <h3 class="block-title"><?php echo $faq['faqs_settings_heading'];?></h3>
                                            <div class="block-options">
                                                <!-- To toggle block's content, just add the following properties to your button: data-toggle="block-option" data-action="content_toggle" -->
                                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-down"></i></button>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                        <?php echo $faq['faqs_settings_description'];?>
                                        </div>
                                    </div>
                                    <?php } }?>

                                    
                                  
                                  


                                </div>
                            </div>
                        </div> 

                        </div>

                    </div>

                </div>

                <!-- END User Profile -->
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
                                                    <th style="width: 30%;" class="text-center">Bidder Name</th>
                                                    <th style="width: 30%;" class="text-center">Bidding Amount</th>
                                                    <th style="width: 30%;" class="text-center">Bidding Date</th>
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


            </div>

            <!-- END Page Content -->

        </main>

        <!-- END Main Container -->

<script>


function next_bidding_cycle(){
     $('#next_bidding_cycle').css('display','none');
     var link = "<?php echo base_url()?>dashboard";
     window.location = link;
}



function place_a_bid(that)
{


    var bid_place_amount     = $('#bid_amount').val().replace('$', '').replace(',','');


    if(bid_place_amount == '0.00' || bid_place_amount =='')
    {
        var data = '  <div  id="main_dialog_box_winner" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Enter valid amount to bid.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="dialog_winner();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#fadeout_div_bid_error_msg").html(data);

            return false;

    }
  

    var current_bid_amount_with_sign     = $('#current_bid_amount').val();
    var current_bid_amount               = current_bid_amount_with_sign.replace('$', '').replace(',','');
    var bidding_plan_id                  = $('#bidding_plan_id').val();
    var bidding_user_id                  = $('#bidding_user_id').val();
    var bidding_cycle_count_value1=$('#bidding_cycle_count_value1').val();



    var bidGetLess = $("#hidden_dynamic_bid_val").val();
    var bidGetLessText = $("#bid_or_less").text();

    var win_Bid_amount = $('#hidden_win_bid_amount').val();

    var winner_user_id=$('#winner_user_id').val();

    // console.log(win_Bid_amount);
    // console.log(bid_place_amount);


    if(win_Bid_amount ==  bid_place_amount)
    {
     place_win_bid();   
     return false;

    }


    if(winner_user_id!='')
    {
        var data = '  <div  id="main_dialog_box_winner" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You are already winner of the previous plan cycle.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="dialog_winner();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#fadeout_div_bid_error_msg").html(data);
            return false;

    }
     
    else if(Number.parseFloat(bid_place_amount) < Number.parseFloat(win_Bid_amount))
       {

         var data = '  <div  id="main_dialog_box1" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Enter more than or equal to $'+win_Bid_amount+'</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog1();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#fadeout_div_bid_error_msg").html(data);
     }
     else if(Number.parseFloat(bid_place_amount) > Number.parseFloat(bidGetLess))
     {


        var data = '  <div  id="main_dialog_box2" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">'+bidGetLessText+'</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog2();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

            $("#fadeout_div_bid_error_msg").html(data);

     }
     else
     {


        
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."User/place_a_bid_data";?>',
          cache:false,
         
          data: {'bid_place_amount':bid_place_amount,'current_bid_amount':current_bid_amount,'bidding_plan_id':bidding_plan_id,'bidding_user_id':bidding_user_id,'bidding_cycle_count':bidding_cycle_count_value1},
          success: function(response){
            // console.log(data2);
            if($.trim(response)=='bid_with_same_amount_not_allowed'){
                   $('#bid_amount').val('$0.00');
                  var data = '<div  id="main_dialog_box3" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Already someone has placed bid with same amount.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog3();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                      $("#fadeout_div_bid_error_msg").html(data);

            }
            else if(response !='' && ($.trim(response)!='bid_with_same_amount_not_allowed'))
            {
                  var data2 = JSON.parse(response);
        // console.log('check4');

                    $('#place_a_bid_btn_1').attr("disabled", 'disabled');
                    // $('#place_a_bid_btn_2').prop("disabled", true);
                    $('#bid_amount').attr("readonly", 'readonly');
                    $('#bid_amount').val('$0.00');

                var data= '<div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Bid added successfully for the plan </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_success();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';
                     $('#current_bid_amount').val('');
                     $("#alert_message").html(data);
                     $("#alert_message_outbidpopup").html('');
                     
                     $('#bid_amount').val('$0.00');
                     var biDiscounT = 'Bids [ <span style="color:#0654ba;text-decoration: underline;">'+data2.length+' </span>]';
                     $("#bid_count").html(biDiscounT);


                  var bidding_plan_ids = $('#hidden_plan_idData').val();
                  /////////// Bidding Start Amount  ////////////////// 
                  $.ajax({
                  type: 'POST',
                  url: '<?php echo base_url()."User/bidding_start_amount_details";?>',
                  cache:false,
                  data: {'bidding_plan_ids':bidding_plan_ids,'bidding_cycle_count':bidding_cycle_count_value1},

                  success: function(responses){

                    var data = JSON.parse(responses);
             

                    if(responses!='')
                    {     
                       var amt_1= formatToCurrency(data.bidding_start_amount_without_deduct);
                       var amt_2= formatToCurrency(data.bidding_start_amount_dynamic);
                      var biddinGDyanmicAmount = $('#current_bid_amount').val('$'+ amt_1);
                      var biddinGlessAmount = $("#bid_or_less").text('Enter $ '+amt_2+' or less');



                    }
                    
                  }
                });
            }
            
          }
        }); 
     }
}

function place_win_bid()
{
    var winBidAmount        = $('#winBidAmount').text();
    var current_bid_amount  = winBidAmount.replace('$', '').replace(',','');
    var bidding_plan_id     = $('#bidding_plan_id').val();
    var bidding_user_id     = $('#bidding_user_id').val();
    var bidding_cycle_count_value1=$('#bidding_cycle_count_value1').val();

    var winner_user_id=$('#winner_user_id').val();
    if(winner_user_id!=''){
        var data = '  <div  id="main_dialog_box_winner" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You are already winner of the previous plan cycle.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="dialog_winner();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#fadeout_div_bid_error_msg").html(data);
            return false;
    }else{

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/place_win_bid_ajax";?>',
      cache:false,
     
      data: {'current_bid_amount':current_bid_amount,'bidding_plan_id':bidding_plan_id,'bidding_user_id':bidding_user_id,'bidding_cycle_count':bidding_cycle_count_value1},
      success: function(response){

        var data = JSON.parse(response);

 
        if(data == '1')
        {    
            // Win Bid exists

            var data = '<div  id="main_dialog_box3" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Winning Bid Has Already Placed!!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog3();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#fadeout_div_bid_error_msg").html(data);


            // var link = "<?php echo base_url()?>dashboard";

            // window.setTimeout( function(){
            // window.location = link;
            //  }, 5000 );


        }
        else 
        {    
            
            // Win Bid doesn't exists 
    
            var data= '<div id="main_dialog_box4" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Winning Bid added successfully for the plan </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog4();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

                 $("#alert_message1").html(data);

                 // var link = "<?php echo base_url()?>dashboard";

                 //  window.setTimeout( function(){
                 //  window.location = link;
                 // }, 3000 );

        }
        
      }
    });
}
}	


 window.setInterval(function(){
      /// call your function here
      refresh_bids_count();
    }, 2000);
    
    function refresh_bids_count()
    {
        var hidden_plan_idData = $('#hidden_plan_idData').val();
        var bidding_cycle_count_value1=$('#bidding_cycle_count_value1').val();

          $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."User/refresh_bid_count"?>',
         
          data: {'hidden_plan_idData':hidden_plan_idData,'bidding_cycle_count':bidding_cycle_count_value1},
          cache:false,
          success: function(response){
           var data = JSON.parse(response);
            if(response==0){
                 var bid_count=0;
            }else{
             bid_count=data.length;
            }
            if(response!='')
              {
                 var biDiscounT = 'Bids [ <span style="color:#0654ba;text-decoration: underline;">'+bid_count+'</span> ]';
                   $("#bid_count").html(biDiscounT);
               }
       }
        }); 
    }


 var button_refresh=window.setInterval(function(){
      /// call your function here
      refresh_button();
    }, 3200);
    
    function refresh_button()
    {
          var userIdrestricBid = $('#bidding_user_id').val();
          var bidding_plan_id  = $('#bidding_plan_id').val();

          var bidding_cycle_count_value1=$("#bidding_cycle_count_value1").val();
          
          var restricted_bid_upto=$("#restricted_bid_upto").val();

          var current_bidding_status=$('#current_bidding_status').val();

           var winner_user_id=$('#winner_user_id').val();

          if(restricted_bid_upto!=''&& restricted_bid_upto>=bidding_cycle_count_value1){
            clearInterval(button_refresh);
        // console.log('check5');

            $('#place_a_bid_btn_1').attr("disabled",true);
            $('#place_a_bid_btn_2').prop("disabled", true);
            $('#bid_amount').attr("readonly", 'readonly');
            $('#bid_amount').val('$0.00');
            }
            else if(winner_user_id!=''){
            clearInterval(button_refresh);
        // console.log('check10');

            $('#place_a_bid_btn_1').attr("disabled", true);
            $('#place_a_bid_btn_2').attr('disabled',true);
            $('#bid_amount').attr('disabled',true);
            
            }
            else{
              $.ajax({
                      type: 'POST',
                      url: '<?php echo base_url()."User/restric_user_to_one_bid";?>',
                      data: {'userIdrestricBid':userIdrestricBid,'bidding_plan_id':bidding_plan_id,'bidding_cycle_count':bidding_cycle_count_value1},
                      cache:false,
                      success: function(response){

                        var data = JSON.parse(response);
                     

                        if(response!='')
                        {    
                          if(data == userIdrestricBid)
                          {
        // console.log('check9');

                             $('#place_a_bid_btn_1').attr("disabled",true);
                             // $('#place_a_bid_btn_2').prop("disabled", true);
                             $('#bid_amount').attr("readonly", 'readonly');
                             $('#bid_amount').val('$0.00');
                          }else if(restricted_bid_upto>=bidding_cycle_count_value1){
        // console.log('check8');

                            $('#place_a_bid_btn_1').attr("disabled",true);
                            // $('#place_a_bid_btn_2').prop("disabled", true);
                            $('#bid_amount').attr("readonly", 'readonly');
                            $('#bid_amount').val('$0.00');
                          }else if(bidding_cycle_count_value1==''){
        // console.log('check7');

                             $('#place_a_bid_btn_1').attr("disabled",true);
                            $('#bid_amount').attr("readonly", 'readonly');
                            $('#bid_amount').val('$0.00');
                          }else if(current_bidding_status=='bid_over'){
        // console.log('check6');

                            $('#place_a_bid_btn_1').prop("disabled", true);
                            $('#place_a_bid_btn_2').attr('disabled',true);
                            $('#bid_amount').attr('disabled',true);
                            $('#bid_amount').val('$0.00');
                          }
                          else
                          {
        // console.log('check11');

                            // you have been outbid popup

                            var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You have been outbid by another user please bid again to make it the highest bid.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                            

                            var getalertData  = $("#alert_message_outbidpopup").html();
                            if(!getalertData)
                            {
                                $("#alert_message_outbidpopup").html(data);
                            }







                            $('#place_a_bid_btn_1').prop("disabled", false);
                            $('#bid_amount').attr('disabled',false);
                            $('#bid_amount').attr("readonly",false);
                            // $('#place_a_bid_btn_2').prop("disabled", false);
                            $('#bid_amount').prop("disabled", false);
                          }

                        }
                        
                      }
                    });
            }
        }


 var amount_refresh=window.setInterval(function(){
      /// call your function here
      refresh_amount();
    }, 3000);
    
    function refresh_amount()
    {
            var bidding_plan_ids = $('#hidden_plan_idData').val();
            var bidding_cycle_count_value1=$("#bidding_cycle_count_value1").val();
                  /////////// Bidding Start Amount  ////////////////// 
                  $.ajax({
                  type: 'POST',
                  url: '<?php echo base_url()."User/bidding_start_amount_details";?>',
                 
                  data: {'bidding_plan_ids':bidding_plan_ids,'bidding_cycle_count':bidding_cycle_count_value1},
                  cache:false,
                  success: function(response){

                    var data = JSON.parse(response);
             

                    if(response!='')
                    {     
                       
                        var amt_1= formatToCurrency(data.bidding_start_amount_without_deduct);
                       var amt_2= formatToCurrency(data.bidding_start_amount_dynamic);
                      var biddinGDyanmicAmount = $('#current_bid_amount').val('$'+amt_1);
                      var biddinGlessAmount = $("#bid_or_less").text('Enter $ '+amt_2+' or less');


                      // var link = "<?php echo base_url()?>dashboard";

                      // window.location = link;

                    }
                    
                  }
                });
    }


 var bid_less_amount_user=window.setInterval(function(){
      /// call your function here
      get_bid_less_amount_user();
    }, 3100);
    

    function get_bid_less_amount_user()
    {
        var bidding_user_id = $('#bidding_user_id').val();
        var bidding_plan_id  = $('#bidding_plan_id').val();
          var bidding_cycle_count_value1=$("#bidding_cycle_count_value1").val();
                  $.ajax({
                  type: 'POST',
                  url: '<?php echo base_url()."User/get_bid_less_amount_user_ajax";?>',
                  data: {'bidding_plan_id':bidding_plan_id,'bidding_user_id':bidding_user_id,'bidding_cycle_count':bidding_cycle_count_value1},
                  cache:false,
                  success: function(response){

                    var data = JSON.parse(response);
             

                    if(response!='')
                    {     
                       var hidden_dynamic_bid_val = data['bidding_start_amount_dynamic'];

                       $('#hidden_dynamic_bid_val').val(hidden_dynamic_bid_val);
                    }
                    
                  }
                });
    }




// window.onload = function() {
// get_restrict_user_check();

// };


    function get_restrict_user_check()
    {
        var userIdrestricBid = $('#bidding_user_id').val();
        var bidding_plan_id  = $('#bidding_plan_id').val();
        var bidding_cycle_count_value1=$("#bidding_cycle_count_value1").val();
        $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."User/restric_user_to_one_bid";?>',
              data: {'userIdrestricBid':userIdrestricBid,'bidding_plan_id':bidding_plan_id,'bidding_cycle_count':bidding_cycle_count_value1},
              cache:false,
              success: function(response){

                var data = JSON.parse(response);
         

                if(response!='')
                {     
                  if(data == userIdrestricBid)
                  { 

                   
                   var data = '<div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You have the last highest bid please wait for another user to make the highest bid.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                       $("#alert_message_last_bid").html(data);


                  }

                }
                
              }
            });
    }


    function open_bid_history_popup ()
    {
        var bidding_plan_id  = $('#bidding_plan_id').val();
        var bidding_cycle_count_value1=$("#bidding_cycle_count_value1").val();
        $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."User/get_bidding_history_ajax";?>',
              data: {'bidding_plan_id':bidding_plan_id,'bidding_cycle_count':bidding_cycle_count_value1},
              cache:false,
              success: function(response){

                var data = JSON.parse(response);
         

                if(response!='')
                {     
                    $("#bidding_history_popup_table > tbody").html("");

                    var count =1;
                   $.each(data, function(index, value) {
                        var previous_user_id=$('#check_user_id_'+count).val();
                        var check_previous_bid_amount=$('#check_previous_bid_amount_'+count).val();

                        if(((value.bidding_user_id!=previous_user_id) || (value.bidding_user_id==previous_user_id)) && value.bidding_place_bid_amount!=check_previous_bid_amount)
                         {
                
                                var counter  = count++;

                                // Date
                                var dob= value.bidding_place_bid_date;
                                var result = dob.split('-');
                                var time= result[2].split(' ');
                                var newDate = result[1]+'/'+time[0]+'/'+result[0]+' '+time[1];

                                // Name 

                                var regex = /(?!^)[\s\S]/g;
                                var w_first = value.bidding_bidder_first_name;
                                var w_last = value.bidding_bidder_last_name;
                                var censored_f = w_first.replace(regex, "*");
                                var censored_l = w_last.replace(regex, "*");


                                var tr= '<tr><input type="hidden" name="check_user_id" id="check_user_id_'+count+'" value="'+value.bidding_user_id+'"><input type="hidden" name="check_previous_bid_amount" id="check_previous_bid_amount_'+count+'" value="'+value.bidding_place_bid_amount+'"><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm text-capitalize">'+censored_f+' '+censored_l +'</td><td class="text-center font-w600 font-size-sm">$'+formatToCurrency(value.bidding_place_bid_amount)+'</td><td class="text-center font-w600 font-size-sm">'+newDate+'</td></tr>';

                                   $('#bidding_history_popup_table tbody').append(tr);
                      
                        }

                    });

                }
                
              }
            });
    }







// function show_the_winner_info_dialog(){
//    $('#main_dialog_box4').css('display','none');
//     var first_name=$('#first_name').val();
//     var last_name=$('#last_name').val();
//     var plan_name=$('#plan_name').val();
//     var winBidAmount        = $('#winBidAmount').text();
//     var bidding_plan_id     = $('#bidding_plan_id').val();
//     var bidding_user_id     = $('#bidding_user_id').val();
//     var bidding_cycle_count=$('#bidding_cycle_count_value1').val();

//     var data= '<div id="winner_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">'+plan_name+'</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Congratulations '+first_name+' '+last_name+', Your are the winner of bidding cycle '+bidding_cycle_count+'<br><strong>Winning Amount :</strong>'+winBidAmount+'</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_winner();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

//         $("#alert_message").html(data);
// }



var winner_infoo= window.setInterval(function(){
      /// call your function here
     show_winner_info_to_other_plan_user();
    }, 3000);
    

    function show_winner_info_to_other_plan_user()
    {
        var bidding_plan_id     =   $('#bidding_plan_id').val();
        var bidding_cycle_count =   $('#bidding_cycle_count_value1').val();
        var plan_name           =   $('#plan_name').val();
        var bidding_user_id     =   $('#bidding_user_id').val();
                  $.ajax({
                  type: 'POST',
                  url: '<?php echo base_url()."User/show_winner_info_to_other_plan_user"?>',
                  data: {'bidding_plan_id':bidding_plan_id,'bidding_cycle_count':bidding_cycle_count},
                  cache:false,
                  success: function(response){
                    if(response!=0)
                    { 
                        clearInterval(winner_infoo);
                        // clearInterval(amount_refresh);
                        clearInterval(button_refresh);
                        clearInterval(BiddingDetailsTable);
                        // clearInterval(bid_less_amount_user); 
                        winner_infoo=null;
                        amount_refresh=null;
                        button_refresh=null;
                        BiddingDetailsTable=null;
                        // bid_less_amount_user=null;


                        var bidding_info_array=JSON.parse(response);
                    
                    if(bidding_info_array.user_id!=bidding_user_id)
                    {
                    
                    var data= '<div id="winner_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">'+plan_name+'</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">The winner of bidding cycle '+bidding_info_array.bidding_cycle_count+' is '+bidding_info_array.winner_name_for_other+'<br><strong>Winning Amount :</strong>$'+bidding_info_array.bidding_place_bid_amount+'</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_winner();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';
                        $("#alert_message").html(data);
                     }
                     else if(bidding_info_array.user_id==bidding_user_id)
                     {
                        var data= '<div id="winner_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">'+plan_name+'</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Congratulations '+bidding_info_array.winner_name_winner+', Your are the winner of bidding cycle '+bidding_info_array.bidding_cycle_count+'<br><strong>Winning Amount :</strong>$ '+bidding_info_array.bidding_place_bid_amount+'</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog_winner();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';
                        $("#alert_message").html(data);
                       
                     }

                   }
                  }
        });
    }


function close_dialog1()
{
    $('#main_dialog_box1').css('display','none');

}
function close_dialog2()
{
    $('#main_dialog_box2').css('display','none');

}
function close_dialog3()
{
    $('#main_dialog_box3').css('display','none');

    // var link = "<?php echo base_url()?>dashboard";

            // window.setTimeout( function(){
            // window.location = link;
             // }, 5000 );

}


function dialog_winner()
{
    // alert('test');
    $('#main_dialog_box_winner').css('display','none');
}

function close_dialog4()
{
    $('#main_dialog_box4').css('display','none');
    // var link = "<?php echo base_url()?>dashboard";

                  // window.setTimeout( function(){
                  // window.location = link;
                 // }, 3000 );

}
function close_dialog5()
{
    $('#main_dialog_box5').css('display','none');


}
function close_dialog_success()
{
    $('#main_dialog_box').css('display','none');
    // location.reload(); 
}

var BiddingDetailsTable=window.setInterval(function(){
 checkBiddingDetailsTable();
},3000);
function checkBiddingDetailsTable(){
    var bidding_plan_id     = $('#bidding_plan_id').val();
    var bidding_user_id     = $('#bidding_user_id').val();
    var bidding_cycle_count_value1=$('#bidding_cycle_count_value1').val();
          
    var restricted_bid_upto=$("#restricted_bid_upto").val();
    var winner_user_id=$('#winner_user_id').val();

    if(restricted_bid_upto!=''&& restricted_bid_upto>=bidding_cycle_count_value1)
    {
        // console.log('check1');
        $('#place_a_bid_btn_1').attr("disabled",true);
        $('#place_a_bid_btn_2').prop("disabled", true);
        $('#bid_amount').attr("readonly", 'readonly');
        $('#bid_amount').val('$0.00');
        clearInterval(BiddingDetailsTable);
    }
    else if(winner_user_id!='')
    {
        // console.log('check2');

        $('#place_a_bid_btn_1').attr("disabled", true);
        $('#place_a_bid_btn_2').attr('disabled',true);
        $('#bid_amount').attr('disabled',true);
        clearInterval(BiddingDetailsTable);
    }

    else{

    $.ajax({
        url:"<?php echo base_url()?>User/checkBiddingDetailsTable",
        type:"post",
        data:{'bidding_plan_id':bidding_plan_id,'bidding_user_id':bidding_user_id,'bidding_cycle_count':bidding_cycle_count_value1},
        cache:false,
            success:function(response){
             if(response==3){
        // console.log('check13');

                $('#place_a_bid_btn_1').attr("disabled", false);
                $('#bid_amount').attr("readonly",false); 
             }
        }
       
    });
}

}

var next_cycle_bid=window.setInterval(function(){
 check_next_bidding_cycle();
},3000);


function check_next_bidding_cycle(){
    var bidding_cycle_count_value1=$("#bidding_cycle_count_value1").val();
    var bidding_plan_id           = $('#bidding_plan_id').val();
    var next_bidding_cycle=parseInt(bidding_cycle_count_value1)+parseInt(1);
    $.ajax({
        url:"<?php echo base_url()?>User/check_next_bidding_cycle",
        type:"POST",
        cache:false,
        data:{'bidding_cycle_count':next_bidding_cycle,'bidding_plan_id':bidding_plan_id},
        success:function(response){
            if(response!=''){

                var data=JSON.parse(response);
        
                var bidding_schedule_date=data.bidding_start_date;
                var bidding_schedule_end_date=data.bidding_end_date;
            
                var start_date=new Date(bidding_schedule_date).getTime();
                var end_date=new Date(bidding_schedule_end_date).getTime();
   
                var newDate=new Date($('#servertime').text());

                var new_date=newDate.getTime();
                if(start_date <= new_date && end_date >= new_date){
                    clearInterval(next_cycle_bid);
                    var data = '<div  id="next_bidding_cycle" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Next Bidding Cycle '+next_bidding_cycle+' Started.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="next_bidding_cycle();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
                      $("#fadeout_div_bid_error_msg").html(data);    
                }
            }
      
        }

    });
}

var bid_over=window.setInterval(function(){
    
    to_check_bidding_is_over_or_not();

},2000);

function to_check_bidding_is_over_or_not()
{

    var total_bidding_cycle=$('#total_bidding_cycle').val();
    var bidding_cycle_count_value1=$("#bidding_cycle_count_value1").val();
    var bidding_plan_id=$('#bidding_plan_id').val();
    $.ajax({
            url:"<?php echo base_url()?>/User/check_bidding_status",
            type:"post",
            cache:false,
            data:{'bidding_cycle_count':bidding_cycle_count_value1,'bidding_plan_id':bidding_plan_id},
            success:function(response){

                if($.trim(response)!='')
                {
                var bid_overr=($.trim(response));
                $('#check_bid_over').val(bid_overr);
                clearInterval(bid_over);
                }else{
                $('#check_bid_over').val('');
                }
            }
});
}

</script>