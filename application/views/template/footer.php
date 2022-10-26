


       <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div id="padding_bottom" class="content content-full">
                    <span id="1234"><a style="color: #110d35;" class="font-w600" href="#" target="_blank">Committi</a> &copy; <span data-toggle="year-copy"></span> </span>
                </div>
            </footer>
            <!-- END Footer -->
            <style type="text/css">
                footer {
                    position: fixed;
                   width: 100%;
                    bottom: 0;
                    margin-bottom: 0px!important;
                }
                #padding_bottom{
                    padding-bottom: 8px!important;
                    padding-top: 8px!important;
                }
            </style>
        </div>
        <!-- END Page Container -->

        <span id="servertime" style="display:none;"><?php echo date('Y-m-d H:i:s') ?></span>


        <script src="<?php  echo base_url()?>assets/js/oneui.core.min.js"></script>


        <script src="<?php echo base_url()?>assets/js/oneui.app.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick.min.js"></script>


        <!-- Page JS Plugins -->
        <script src="<?php echo base_url()?>assets/js/plugins/chart.js/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url()?>assets/js/pages/be_pages_dashboard.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/pages/be_comp_dialogs.min.js"></script>
        
               <!-- Page JS Plugins -->

        <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/dropzone/dropzone.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/flatpickr/flatpickr.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/es6-promise/es6-promise.auto.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="<?php echo base_url() ?>assets/js/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/simplemde/simplemde.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/jquery-validation/additional-methods.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/formatCurrency.min.js"></script>


        <script>jQuery(function(){ One.helpers(['summernote']); });</script>
        <script>jQuery(function(){ One.helpers(['simplemde']); });</script>

        <script>jQuery(function(){ One.helpers('notify'); });</script>

        <script>jQuery(function(){ One.helpers('slick'); });</script>

        <script>jQuery(function(){ One.helpers('magnific-popup'); });</script>

        <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
        <script>jQuery(function(){ One.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>


<!-- Fecth Server time Info -->

<script type="text/javascript">
function payment_bank_tab_validations(bank_form_id){
 $(bank_form_id).validate({
        rules: {
            transit_number: {
                required: true,
                digits: true,
                minlength:5,
                maxlength:5,
            },
            institution_no: {
                required: true,
                digits: true,
                minlength:3,
                maxlength:3,
            },
            bank_account_number: {
                required: true,
                digits: true,
                minlength:7,
                maxlength:7,
            },
            confirm_bank_account_number: {
                required: true,
                digits: true,
                minlength:7,
                maxlength:7,
                equalTo:'#bank_account_number',
            },
            bank_account_type:{
               required: true,
            },
        },
        messages: {
            transit_number: {
                required: "Please enter the bank transit number",
            },
            institution_no: {
                required: "Please enter the institution number",
            },
            bank_account_number: {
                required: "Please enter the bank account number",
            },
            confirm_bank_account_number:{
                 required: "Please confirm the bank account number",
            },
            bank_account_type:{
                 required: "Please select the bank account number",
            }
            
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.after(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
}
function func_defined(func){
console.log(typeof(func));
console.log($.isFunction(func));
if(typeof(func)!='undefined' && $.isFunction(func)!=false){
       func;
} 
}
function destory_data_table(id){
  $(id).DataTable().destroy();
}
function intializeDatatable(id){
$(id).DataTable({
  "scrollX": true,
  "scrollCollapse": true,
  "bInfo" : false,  
  "targets": 'no-sort',
  "bSort": false,
  "order": []
});
}
function is Number(evt){
}
function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
     // $(".errorr").text('Please enter only numeric digit');
 return false;

    return true;
}
function due_date_validation(due_date_id,end_date_id){
  var end_date = $(end_date_id).val();
  if(end_date!=''){
    var new_end_date=''+formatDate(end_date)+'';
    $(due_date_id).flatpickr().destroy();
  $(due_date_id).flatpickr({
       minDate:new_end_date,
       dateFormat: "m/d/Y",                   
    }); 
}
}
function formatDate(date) {
     var d = new Date(date),
         month = '' + (d.getMonth() + 1),
         day = '' + d.getDate(),
         year = d.getFullYear();

     if (month.length < 2) month = '0' + month;
     if (day.length < 2) day = '0' + day;

     return [year, month, day].join('-');
 }
function onchange_get_statement_balance(plan_id,start_id,end_id,due_date_id,amt_id)
{

}
var currenttime = '<?php echo date('Y-m-d H:i:s')?>'; //PHP method of getting server date
var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime);
function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}
$(document).ready(function(){
setInterval("displaytime()", 1000);
});
</script>
<script type="text/javascript">

    var current_tab_cookie=getCookie('tab_cookie');
    var current_tab_panel=getCookie('tab_panel_id');


if(current_tab_cookie!=null && current_tab_panel!=null && current_tab_panel!='' && current_tab_panel!=''){
    $('#tabs_1').removeClass('active');
    $('#btabs-animated-fade-home').removeClass('active show');
    $('#'+current_tab_cookie).addClass('active');
    $('#'+current_tab_panel).addClass('active show');
    deleteCookie();
}
else if(current_tab_panel!='' && current_tab_panel!=''){
    $('#tabs_1').addClass('active');
    $('#btabs-animated-fade-home').addClass('active show');
    $('#'+current_tab_cookie).removeClass('active');
    $('#'+current_tab_panel).removeClass('active show');   
}


function getCookie(name) 
{
    function escape(s) { return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1'); }
    var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
    return match ? match[1] : null;
}

function setCookie(id,panel_id)
{
    document.cookie='tab_cookie='+id;
    document.cookie='tab_panel_id='+panel_id;
}

function deleteCookie(){
    document.cookie='tab_cookie=';
    document.cookie='tab_panel_id=';
}


            $(document).ready(function(){
            $('#bidding_history_popup_table').DataTable( {
            "scrollY":        "400px",
            "scrollCollapse": true,
            "paging":         false,
            "bInfo" : false,
            "searching": false,
            "targets": 'no-sort',
            "bSort": false,
            "order": [],
            "scrollX":true
            } );

            $('#modal-block-bid-history').on('shown.bs.modal', function (e) {
             $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
               });  
             });  

            $(document).ready(function() 
            {

                $('#transactions_details_table').DataTable
                ({
                    "scrollX": true,
                    // "scrollY":        "400px",
                    "scrollCollapse": true,
                    // "paging":         false,
                    "bInfo" : false,
                    // "searching": false,
                    "targets": 'no-sort',
                    "bSort": false,
                    "order": []
                });




                $('#table_bid_msg').DataTable({
                // "paging": false,
                "bInfo" : false,
                // "searching": false,
                // "scrollY":        "400px",
                "scrollCollapse": true,
                "scrollX":true,
              });
            });

        $(document).on('keyup', '.passwordUser', function(){
            var txtInput = $(this).val();  
            var color="Red";
            var uppercase = /[A-Z]/ ;
            var lowercase = /[a-z]/ ;
            var number    = /[0-9]/ ;
            var special   = /[\W]{1,}/ ; 
            var pswd_length    = txtInput.length < 8;
            if(!uppercase.test(txtInput) || !lowercase.test(txtInput) || !number.test(txtInput) || !special.test(txtInput) || pswd_length) 
            {
                $('.error_password').html('Password must be contain at least 8 characters. Password must contain at least one upper case letter, one lower case letter , one special character and one digit.');
                $('#confirm_new_password').prop("disabled", true);
                $('.submit_password').prop("disabled", true);

            }else
            {
               $('.submit_password').prop("disabled", false);
               $('#confirm_new_password').prop("disabled", false);
               $('.error_password').html('');
            } 
        });
             $(document).ready(function() {
                  // $(".format_amount").on("change", function(){
                  //    var minBiDamount = $(this).val();
                  //    if(minBiDamount != '')
                  //    {
                  //     var formatAmount = (parseFloat(minBiDamount)).toFixed(2);
                  //     $(this).val(formatAmount);
                  //   }
                  //  });
                   // $(".currency_format").on("change", function(){
                   //   var minBiDamount = $(this).val();
                   //   if(minBiDamount != '')
                   //   {
                   //    var formatAmount=formatToCurrency(minBiDamount);
                   //    $(this).val(formatAmount);
                   //  }
                   // });
                  $("#fromDate").flatpickr({
                           defaultDate: new Date(),
                           dateFormat: "m/d/Y",                   
                    }); 
                    $("#toDate").flatpickr({
                           defaultDate: new Date(),
                           dateFormat: "m/d/Y",              
                    }); 
                       $(".fromDate").flatpickr({
                           defaultDate: new Date(),
                           dateFormat: "m/d/Y",                   
                    }); 
                    $(".toDate").flatpickr({
                           defaultDate: new Date(),
                           dateFormat: "m/d/Y",              
                    }); 
                    var payNowDate = $('#pay_now_date').val();

                    var paynowvalue = 'Pay Now '+payNowDate;
                    $("#paynow_btn").prop('value', paynowvalue);


                    $("#due_date").flatpickr({
                           minDate: "today",
                           dateFormat: "m/d/Y",
                                             
                    });     

                   $("#enter_custom_date").flatpickr({
                         minDate: "today",
                         dateFormat: "m/d/Y",
                                           
                  }); 


            } );
        </script>         

        <script type="text/javascript">
                $(document).ready(function() {
                $('#view_plans_table').DataTable( {
                    "scrollX": true
                });
                $('#view_manage_user').DataTable({
                     "scrollX": true
                });
            });
        </script> 

         <script type="text/javascript">
                $(document).ready(function() {
                $('#view_plans_table_1').DataTable( {
                });
            });
        </script> 

        <script type="text/javascript">
                $(document).ready(function() {
                $('#admin_view_user_plans').DataTable( {
                    
                } );
            } );
        </script>        
        <script type="text/javascript">
                $(document).ready(function() {
                $('#view_bidding_cycle_table').DataTable( {
                    'scrollX':true
                    
                });
                $('a[data-toggle="bidding_cycle_table_tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
               });
            });
        </script>        
        <script type="text/javascript">
                $(document).ready(function() {
                $('#view_tier_data_plans_table').DataTable( {
                    'scrollX':true
                } );
                $('a[data-toggle="tier_details_table_tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
               });
            } );
        </script>
        <script type="text/javascript">
                $(document).ready(function() {
                $('#view_documents_table_value').DataTable({
                    "scrollX": true,
                    // "scrollY":        "400px",
                    "scrollCollapse": true,
                    // "paging":         false,
                    "bInfo" : false,
                    // "searching": false,
                    "targets": 'no-sort',
                    "bSort": false,
                    "order": []
                });
               //   $('a[data-toggle="view_documents_table_tab"]').on('shown.bs.tab', function (e) {
               //   $($.fn.dataTable.tables(true)).DataTable()
               //  .columns.adjust()
               //  .responsive.recalc();
               // });  
            });
        </script>        
        <script type="text/javascript">
                $(document).ready(function() {
                $('#admin_application_table_view').DataTable( {
                     "scrollX": true,
                      // "responsive": true
                });
                 $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
               });  
            } );
        </script>



<!------------- APPLICATION FORM JS ------------------->
<script type="text/javascript">
$(document).ready(function() {
    func_defined(fetch_user_notes_onstart());
    func_defined(fetch_user_notess_meta());
    $('#notes_user_view_detail').DataTable( {
        // "scrollY":        "200px",
        // "scrollCollapse": true,
        // "paging":         false,
        // "bInfo" : false,
        //  "searching": false
        "scrollX": true
    } );
} );


 // window.setInterval(function(){
 //      /// call your function here
 //      refresh_if_win_bid();
 //    }, 3000);
    

 //    function refresh_if_win_bid()
 //    {
 //        var bidding_plan_id  = $('#bidding_plan_id').val();
 //        var bidding_cycle_count_value1=$('#bidding_cycle_count_value1').val();
 //                  $.ajax({
 //                  type: 'POST',
 //                  url: '<?php echo base_url()."User/get_win_bid_and_refresh";?>',
 //                  data: {'bidding_plan_id':bidding_plan_id,'bidding_cycle_count':bidding_cycle_count_value1},
 //                  success: function(response){
 //                    var data = JSON.parse(response);
 //                    if($.trim(response) =='1')
 //                    {     
 //                        var link = "<?php echo base_url()?>dashboard";
 //                        window.location = link;
 //                    }
 //                  }
 //                });
 //    }


    // window.setInterval(function(){
    //   /// call your function here
    //  check_user_already_winner_or_not();
    // }, 1000);
    

    // function check_user_already_winner_or_not()
    // {
    //     var bidding_plan_id  = $('#bidding_plan_id').val();
    //               $.ajax({
    //               type: 'POST',
    //               url: '<?php echo base_url()."User/check_user_already_winner_or_not";?>',
    //               data: {'bidding_plan_id':bidding_plan_id},
    //               success: function(response){
    //                 if($.trim(response) =='1')
    //                 {  
    //                    $('#bid_amount').attr('disabled',true);   
    //                    $('#place_a_bid_btn_1').attr('disabled',true);
    //                    $('#place_a_bid_btn_2').attr('disabled',true);
    //                 }else{
    //                   $('#place_a_bid_btn_1').attr('disabled',false);
    //                   $('#place_a_bid_btn_2').attr('disabled',false);
    //                   $('#bid_amount').attr('disabled',false);  
    //                 }
    //               }
    //             });
    // }









//////////////////////// USER  ALERT ///////////////

$(document).ready(function(){
                $('#view_user_notes').DataTable( {
                        "scrollX": true,
                        // "scrollY":        "400px",
                        // "scrollCollapse": true,
                        // "paging":         false,
                        "bInfo" : false,
                        // "searching": false,
                        "targets": 'no-sort',
                        "bSort": false,
                        "order": []
                });
  // display_documents();
      $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/get_notification";?>',
      cache:false,
      success: function(response){
       if(response !=0)
       {
          var data = JSON.parse(response);
          var count =1;
          $.each(data, function(index, value) {
                var counter= count ++;
                var li ='<li onclick="delete_user_notification(this,'+value.notification_id+');"><a href="javascript:void(0)" class="text-dark media py-2" ><div class="mr-2 ml-3"> <i class="fa fa-fw fa-check-circle text-success"></i> </div> <div class="media-body pr-2"> <div class="font-w600">'+value.notification_detail+'</div><small class="text-muted">NEW</small></div> </a></li>';
                $('#user_notification').append(li);
                $('#user_notification_count').html(counter);
            });
       }
      }
    }); 
  });


function delete_user_notification (that,id)
{
      $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/delete_user_notification";?>',
      data: {'id':id},
      success: function(response){
       if(response != ''){
          location.reload();
       }
      }
    }); 
}

function delete_all_user_notification ()
{
      $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/delete_all_user_notification";?>',
      success: function(response){
       if(response != '')
       {
        location.reload();
       }
      }
    }); 


}

///////////////////////////////////////////


  ///////////////////////////// AJAX FOR RESTRICITNG USER TO ONE BID ////////////////////////

  function tConvert(time) {
      var now = new Date(); 
      var hours = now.getHours(); 
      var d = new Date(); 
      var n = d.toLocaleString([], { 
          hour: '2-digit', 
          minute: '2-digit',
          second: '2-digit'
      }); 

      var text = n.replace("PM", "");
      var newValue = text.replace("AM", "");
      return newValue;

  }

$(document).ready(function(){

  var plan_id_1 = $('#hidden_plan_idData').val();
      $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."User/check_date_status";?>',
              data: {'plan_id':plan_id_1},
              success: function(response){
                if(response!=0)
                {     
                var data      = JSON.parse(response);
                  var date    = new Date();
                  var yr      = date.getFullYear();
                  var month   = date.getMonth()+1;
                  var day     = date.getDate();
                  var time    = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();

                  var times = tConvert(time);


                  var newDate = yr + '-' + month + '-' + day +' '+ times ;


                  $.each(data, function(index, value) {

                    console.log(newDate);
                    console.log(value.bidding_schedule_date);
                    console.log(value.bidding_schedule_end_date);

                    if(newDate >= value.bidding_schedule_date && newDate <= value.bidding_schedule_end_date)
                    {
                      // calculate days


                      // Set the date we're counting down to
                      var countDownDate = new Date(value.bidding_schedule_end_date).getTime();

                      // Update the count down every 1 second
                      var x = setInterval(function() {

                        // Get today's date and time
                        var now = new Date().getTime();
                          
                        // Find the distance between now and the count down date
                        var distance = now- countDownDate ;

                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                          
                        // Output the result in an element with id="demo"
                        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                        + minutes + "m " + seconds + "s ";

                          
                        // If the count down is over, write some text 
                        if (distance < 0) {
                          clearInterval(x);
                          document.getElementById("demo").innerHTML = "EXPIRED";
                          // var link ="<?php echo base_url()?>dashboard";
                          // location.href = link;
                        }
                      }, 1000);




                    } 
                    else 
                    
                    {
                      // redirect 
                      // var link ="<?php echo base_url()?>dashboard";

                      // location.href = link;
                    }




                  });
                }
                
              }
            });
  });

$(document).ready(function(){

   
    var current_bidding_status=$('#current_bidding_status').val();
    if(current_bidding_status=='bid_over'){
       $('#place_a_bid_btn_1').prop("disabled", true);
       $('#place_a_bid_btn_2').attr('disabled',true);
       $('#bid_amount').attr('disabled',true);
       $('#bidding_status_text').text('Bid Over');
       document.getElementById("demo2").innerHTML ="Bidding Over";
       }

  var plan_id_2= $('#hidden_plan_idData').val();
      $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."User/check_date_status";?>',
              data: {'plan_id':plan_id_2},
              cache:false,
              success: function(response){
                console.log(response);
                if(response!='')
                {
                var data = JSON.parse(response);
                  
                 var newDate=new Date($('#servertime').text());
               
                var new_date=newDate.getTime();
              
                  console.log(new_date);
                  $.each(data, function(index, value) {
                    console.log(new_date);
                    console.log(value.bidding_schedule_date);
                    console.log(value.bidding_schedule_end_date);
                    // var new_date=new Date(newDate).getTime();
                    var start_date=new Date(value.bidding_schedule_date).getTime();
                    var end_date=new Date(value.bidding_schedule_end_date).getTime();
                    console.log(new_date);
                    console.log(start_date);
                    console.log(end_date);
                    if(new_date>=start_date && new_date<=end_date && value.bidding_status!='bid_over')
                    {
                        console.log('if');
                      var countDownDate = new Date(value.bidding_schedule_end_date).getTime();
                      console.log(countDownDate);
                      // Update the count down every 1 second
                      var x = setInterval(function() {
                       
                        var newDate1=new Date($('#servertime').text());
                        var now=newDate1.getTime();
                        // Find the distance between now and the count down date
                        var distance = countDownDate-now;
                        console.log(distance);
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
                        // Output the result in an element with id="demo2"
                        document.getElementById("demo2").innerHTML ='Time Left : '+days + "d " + hours + "h "
                        + minutes + "m " + seconds + "s ";
                        // If the count down is over, write some text 
                        if (distance==0 || distance < 0) {
                            document.getElementById("demo2").innerHTML ="TIME EXPIRED";

                      
                              var bidding_plan_id     = $('#bidding_plan_id').val();
                              var bidding_user_id     = $('#bidding_user_id').val();
                              var plan_name           = $('#plan_name').val();
                               $.ajax({
                                url:"<?php echo base_url()?>User/timer_expire_bid",
                                type:"POST",
                                cache:false,
                                data:{'bidding_cycle_count':value.bidding_cycle_count,'bidding_plan_id':bidding_plan_id,'bidding_user_id':bidding_user_id},
                               
                                success:function(response){
                                 clearInterval(x);
                  
                                 document.getElementById("demo2").innerHTML ="TIME EXPIRED";

                                 $('#bidding_status_text').text('TIME EXPIRED');

                                 $('#place_a_bid_btn_1').prop("disabled", true);
                                 $('#place_a_bid_btn_2').attr('disabled',true);
                                 $('#bid_amount').attr('disabled',true);
                                  
                                }
                           });
                        }
                      }, 1000);
                    } 
                    else 
                    {
                    //////////////////////
                    }
                  });
                }
                
              }
            });
  });
function close_dialog_winner(){
    $('#place_a_bid_btn_1').prop("disabled", true);
    $('#place_a_bid_btn_2').attr('disabled',true);
    $('#bid_amount').attr('disabled',true);
    $('#bidding_status_text').text('Bid Over');
    $('#winner_dialog_box').css('display','none');
    $('#demo2').css('display','none');
    // clearInterval(amount_refresh);
    // clearInterval(button_refresh);
    // clearInterval(BiddingDetailsTable);
    // clearInterval(bid_less_amount_user);
    // clearInterval(winner_infoo);
}

$(document).ready(function(){

  var userIdrestricBid = $('#bidding_user_id').val();
  var bidding_plan_id  = $('#bidding_plan_id').val();
      $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."User/restric_user_to_one_bid";?>',
              cache:false,
             
              data: {'userIdrestricBid':userIdrestricBid,'bidding_plan_id':bidding_plan_id},
              success: function(response){
                if(response!='')
                {  
                // var data = JSON.parse(response);
                  if(response == userIdrestricBid)
                  {
                     $('#place_a_bid_btn_1').attr("disabled",'disabled');
                    // $('#place_a_bid_btn_2').prop("disabled", true);
                    $('#bid_amount').attr("readonly",'readonly');
                  }

                }
                
              }
            });
  });
$( document ).ready(function() {
  // biddingScheduleAjax();
     var terms      =$('#hidden_terms_checkbox_value').val();
     var privacy    =$('#hidden_privacy_checkbox_value').val();
     var disclaimer =$('#hidden_disclaimer_checkbox_value').val();

    if(terms == '1')
    {
        $("#signup-terms").prop( "checked", true );                     // TERMS CHECKBOX
    }
    else
    {
        $("#signup-terms").prop( "checked", false );
    }

    if(privacy == '1')
    {
        $("#signup-privacy").prop( "checked", true );                     // PRIVACY CHECKBOX
    }   
    else
    {
        $("#signup-privacy").prop( "checked", false );
    }

    if(disclaimer == '1')
    {
        $("#signup-disclaimer").prop( "checked", true );                      // DISCLAIMER CHECKBOX
    }
    else
    {
        $("#signup-disclaimer").prop( "checked", false );
    }
});


/////////////////////// INPUT FIELD RESTRICTIONS ONLY NUMBERS  ///////////////////////////
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

$("#bid_amount").inputFilter(function(value) {
  return /^-?\d*[.,]?\d*$/.test(value); });

/////////////////////// INPUT FIELD RESTRICTIONS ONLY NUMBERS   ///////////////////////////



       var bidding_plan_id                  = $('#bidding_plan_id').val();
       var bidding_user_id                  = $('#bidding_user_id').val();
       var bidding_cycle_count_value1=$('#bidding_cycle_count_value1').val();

      $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/count_bid_on_page_load";?>',
      cache:false,
      data: {'bidding_plan_id':bidding_plan_id,'bidding_user_id':bidding_user_id,'bidding_cycle_count': bidding_cycle_count_value1},
      success: function(response){
       
        // alert(response.length);
        // // console.log(data2);
         if(response==0){
                 var bid_count=0;
            }else{
                 var data2 = JSON.parse(response);
             bid_count=data2.length;
            }

        if(response!='')
        {
                 var biDiscounT = 'Bids [ <span style="color:#0654ba;text-decoration: underline;">'+bid_count+'</span> ]';
                   $("#bid_count").html(biDiscounT);
        
      }
     }
    }); 



///////////////// FLAT PICKER SETTING FOR CREATE PLAN PAGE/////////////
$( document ).ready(function() {
 $("#start_date").flatpickr({
           minDate: "today",
           enableTime: true,
           dateFormat: "m/d/Y H:i",
                             
    }); 
 $("#end_date").flatpickr({
           minDate: "today",
           enableTime: true,
           dateFormat: "m/d/Y H:i",
                             
    });  


var fromdateapplicationreview = '<?php if(isset($_SESSION['fromdateapplicationreview'])){echo $_SESSION['fromdateapplicationreview'] ;}else{echo '';}?>';

var todateapplicationreview = '<?php if(isset($_SESSION['todateapplicationreview'])){echo $_SESSION['todateapplicationreview'] ;}else{echo '';}?>';

 $("#from_filter_date").flatpickr({
           dateFormat: "m/d/Y",
           defaultDate: fromdateapplicationreview,
                             
    }); 
 $("#to_filter_date").flatpickr({
           dateFormat: "m/d/Y",
            defaultDate: todateapplicationreview,
                             
    }); 


    var oneYearFromNow = new Date();
    var date = oneYearFromNow.setFullYear(oneYearFromNow.getFullYear() - 18);

  $("#user_date_of_Birth").flatpickr({
          dateFormat: "m/d/Y",
          maxDate:date,
                             
    });




});
///////////////// FLAT PICKER SETTING FOR CREATE PLAN PAGE/////////////
$( document ).ready(function() {
  var DateOfBirth = $('#hidden_date_of_Birth').val();
  if(DateOfBirth!=undefined){
  var result = DateOfBirth.split('-');
  var newDate = result[1]+'/'+result[2]+'/'+result[0];
  $('#user_date_of_Birth').val(newDate);
  }
  });


///////////////// ASTERISK FOR SIN AND DATE OF BIRTH OF USER PROFILE//////////////////
$( document ).ready(function() {
  var DateOfBirth = $('#hidden_date_of_birth').val();
  if(DateOfBirth!=undefined){
  var result = DateOfBirth.split('-');
  var last2 =  result[0].slice(-2);
  var asterisk_dob = '**/**/**'+last2;

  $('#user_date_of_birth').val(asterisk_dob);
   }
  });

$(document).ready(function(){
$('#user_sin_profile').val('*********');
});


///////////////// ASTERISK FOR SIN AND DATE OF BIRTH OF USER PROFILE//////////////////
 
//////////////// AJAX FOR DISPLAYING PLANS ON DASHBOARD /////////////////////////////
$(document).ready(function(){
      $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/dashboard_plan_information";?>',
      // data: {'bidding_plan_id':bidding_plan_id},
      success: function(response){
       if(response!=0)
        {
        var data = JSON.parse(response);
        // console.log(data);
          for (var i = 0; i < data.length; i++)
          {
                var div= '<div class="col-md-6 col-xl-3"><a class="block block-link-pop text-center" href="javascript:void(0)"><div class="block-header"> <h3 class="block-title">Startup</h3> </div><div class="block-content bg-info"><div class="py-2"><p class="h1 font-w700 text-black mb-2">$29</p> <p class="h6 text-black-75">per month</p></div></div><div class="block-content"><div class="font-size-sm py-2"><p><strong>10</strong> Projects</p><p><strong>100</strong> Clients</p> <p><strong>30GB</strong> Storage</p></div></div><div class="block-content block-content-full bg-body-light"><span style="color: #000!important;" class="btn btn-square btn-info px-4">Select</span></div></a> </div>';
                  // $('#ajax_div').append( div);
          }
        }
        
      }
    }); 
  });
//////////////// AJAX FOR DISPLAYING PLANS ON DASHBOARD /////////////////////////////


//////////////// USER SIGNUP RESTRICITONS /////////////////////////////////
$('#user_sin').on('input', function() {              //Using input event for instant effect
  let text=$(this).val()                             //Get the value
  text=text.replace(/\D/g,'')                        //Remove illegal characters 
  if(text.length>3) text=text.replace(/.{3}/,'$&-')  //Add hyphen at pos.4
  if(text.length>7) text=text.replace(/.{7}/,'$&-')  //Add hyphen at pos.8
  $(this).val(text);  

  // $('#hidden_SinVal').val(text);

});

$('#user_sin_profile').on('input', function() {              //Using input event for instant effect
  let text=$(this).val()                             //Get the value
  text=text.replace(/\D/g,'')                        //Remove illegal characters 
  if(text.length>3) text=text.replace(/.{3}/,'$&-')  //Add hyphen at pos.4
  if(text.length>7) text=text.replace(/.{7}/,'$&-')  //Add hyphen at pos.8
  $(this).val(text); 

  $('#hidden_SinVal').val(text);


});


$('#user_sin').bind("cut copy paste",function(e) {
     e.preventDefault();
 });

$('#user_phone_number').bind("cut copy paste",function(e) {
     e.preventDefault();
 });

$('#user_postal_code').keypress(function() {
  var foo = $(this).val().split(" ").join(""); // remove hyphens
  if (foo.length > 0) {
    foo = foo.match(new RegExp('.{1,3}', 'g')).join(" ");
  }
  $(this).val(foo);
});



function isNumberWithoutDecimal(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57)){     
      return false;
    }
}

$('#user_phone_number').keydown(function(e) {              //Using input event for instant effect
 var curchr = this.value.length;
    var curval = $(this).val();
    if (curchr == 3) {
        if( e.keyCode!=8 ){
            $(this).val("(" + curval + ")" + " ");
        }
    } else if (curchr == 9) {
        if( e.keyCode!=8 ){
            $(this).val(curval + "-");
        }
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) && e.keyCode !=8 ) {
        e.preventDefault();
    }                             //Set the new text
});

//////////////// USER SIGNUP RESTRICITONS END/////////////////////////////////


///////////////////////////////////EDIT PROFILE ///////////////////////////////////////


var minLengthSin = 11;
$(".profileuser_sin_profile").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthSin)
    {
        $("#sin_error").text("SIN Must Be 9 digits.");
        $('#submit').prop("disabled", true);
    }
    else
    {
       $("#sin_error").text("");
       $('#submit').prop("disabled", false);
    }
   
});

var minLengthPostalUser = 7;
$(".user_postal_profile").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthPostalUser)
    {
        $("#postal_code_error").text("Postal Code Must Be 6 Characters.");
        $('#submit').prop("disabled", true);
    }
    else
    {
       $("#postal_code_error").text("");
       $('#submit').prop("disabled", false);
    }
   
});

var minLengthprOfile = 14;
$(".profile_phone_error").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthprOfile)
    {
        $("#phone_profile_error").text("Phone no must be 10 digits.");
        $('#submit').prop("disabled", true);
    }
    else
    {
       $("#phone_profile_error").text("");
       $('#submit').prop("disabled", false);
    }
   
});
///////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////// APPLICATION FORM //////////////////////////////
var minLengthphone = 14;
$(".user_phone_number_application").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthphone)
    {
        $("#phone_code_error").text("Phone no must be 10 digits.");
        $('#submit').prop("disabled", true);
    }
    else
    {
       $("#phone_code_error").text("");
       $('#submit').prop("disabled", false);
    }
   
});

var minLengthpostalCodE = 7;
$(".postal_code_user_application").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthpostalCodE)
    {
        $("#postal_code_error").text("Postal Code Must Be 6 Characters.");
        $('#submit').prop("disabled", true);
    }
    else
    {
       $("#postal_code_error").text("");
       $('#submit').prop("disabled", false);
    }
   
});


$('.postal_code_user_application').on("keyup", function()
{
    var zip = $('.postal_code_user_application').val();

    var zipRegex = /^(?:[A-Z]\d[A-Z][ -]?\d[A-Z]\d)$/i;

    if (!zipRegex.test(zip))
    {
        $("#postal_code_errors").text("Please Enter Correct Postal Code.");
        $('#submit').prop("disabled", true);
    }
    else
    {
        // success!
        $("#postal_code_errors").text("");
        $('#submit').prop("disabled", false);
    }
});

$('.user_postal_profile').on("keyup", function()
{
    var zip = $('.user_postal_profile').val();

    var zipRegex = /^(?:[A-Z]\d[A-Z][ -]?\d[A-Z]\d)$/i;

    if (!zipRegex.test(zip))
    {
        $("#postal_code_errors").text("Please Enter Correct Postal Code.");
        $('#submit').prop("disabled", true);
    }
    else
    {
        // success!
        $("#postal_code_errors").text("");
        $('#submit').prop("disabled", false);
    }
});



var charReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;
$('.user_street_name_edit_profile').on("keyup", function(){
    var inputVal = $('.user_street_name_edit_profile').val();

    if (!charReg.test(inputVal))
    {
        $("#street_name_error_edit_profile").text("Special Characters Are Not Allowed.");
        $('#submit').prop("disabled", true);
    }
    else
    {
        // success!
        $("#street_name_error_edit_profile").text("");
        $('#submit').prop("disabled", false);
    }

});

var charRegAppForm = /^\s*[a-zA-Z0-9,\s]+\s*$/;
$('.street_name_app_form').on("keyup", function(){
    var inputVal = $('.street_name_app_form').val();

    if (!charRegAppForm.test(inputVal))
    {
        $("#street_name_error_app_form").text("Special Characters Are Not Allowed.");
        $('#submit').prop("disabled", true);
    }
    else
    {
        // success!
        $("#street_name_error_app_form").text("");
        $('#submit').prop("disabled", false);
    }

});
///////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////// ADDING DATE OF BIRTH LIMIT APPLICATION REVIEW //////////////////////
$(function () {
  var maxBirthdayDate = new Date();
  maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18,11,31);
    $(".application_review_dateOfbirth").datepicker({
        changeMonth: true,
        changeYear: true,
        maxDate: maxBirthdayDate,
      yearRange: '1950:'+maxBirthdayDate.getFullYear(),
    });
});

////////////////////  ADDING SCROLL FOR APPLICATION REVIEW TABLE/////////////
$(document).ready(function() {
    $('#application_review_table').DataTable( {
        "scrollX": true
    } );
});



//////////////////// CHECK POSTAL CODE FORMAT IN APPLICATION REVIEW FORM  //////////////////////////


$('.postal_code_review_app_form').on("keyup", function()
{
    var zip = $('.postal_code_review_app_form').val();

    var zipRegex = /^(?:[A-Z]\d[A-Z][ -]?\d[A-Z]\d)$/i;

    if (!zipRegex.test(zip))
    {
        $("#postal_code_error_review_app").text("Please Enter Correct Postal Code.");
        $('#submit').prop("disabled", true);
    }
    else
    {
        // success!
        $("#postal_code_error_review_app").text("");
        $('#submit').prop("disabled", false);
    }
});


$(document).ready(function(){
    var winner_user_id=$('#winner_user_id').val();
    var total_bidding_cycle=$('#total_bidding_cycle').val();
    var bidding_cycle_count_value1=$("#bidding_cycle_count_value1").val();
    var restricted_bid_upto=$("#restricted_bid_upto").val();
    var bidding_plan_id=$('#bidding_plan_id').val();
  
    if(winner_user_id!='')
    {
     $('#place_a_bid_btn_1').attr("disabled", true);
     $('#place_a_bid_btn_2').attr('disabled',true);
     $('#bid_amount').attr('disabled',true);
    }

    $('.placeBidButton').on('click',function() {
    var check_bid_over=$('#check_bid_over').val();
   

    if(check_bid_over=='bid_over' && (total_bidding_cycle==bidding_cycle_count_value1))
    {
        $('#place_a_bid_btn_1').attr("disabled", true);
        $('#place_a_bid_btn_2').attr('disabled',true);
        $('#bid_amount').attr('disabled',true);  
        var data = '  <div  id="main_dialog_box_winner" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">All bidding cycles are completed for this plan.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="dialog_winner();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#fadeout_div_bid_error_msg").html(data);
            return false;

    } else if((check_bid_over=='bid_over') && (total_bidding_cycle>bidding_cycle_count_value1))
    {
                  

      $('#place_a_bid_btn_1').attr("disabled", true);
      $('#place_a_bid_btn_2').attr('disabled',true);
      $('#bid_amount').attr('disabled',true);  
      var data = '  <div  id="main_dialog_box_winner" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Bidding Over for bidding cycle '+bidding_cycle_count_value1+'.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="dialog_winner();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
        $("#fadeout_div_bid_error_msg").html(data);
       return false;
    }
    else if(winner_user_id!='')
    {
     $('#place_a_bid_btn_1').attr("disabled", true);
     $('#place_a_bid_btn_2').attr('disabled',true);
     $('#bid_amount').attr('disabled',true);  
        var data = '  <div  id="main_dialog_box_winner" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You are already winner of the previous plan cycle.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="dialog_winner();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#fadeout_div_bid_error_msg").html(data);
            return false;
    }else if(restricted_bid_upto!='' && bidding_cycle_count_value1!='' && restricted_bid_upto>=bidding_cycle_count_value1)
    {
            $('#place_a_bid_btn_1').attr("disabled",true);
            $('#place_a_bid_btn_2').prop("disabled", true);
            $('#bid_amount').attr("readonly", 'readonly');
            var data = '  <div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You are restricted upto '+restricted_bid_upto+' cycle.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
               $("#alert_message_last_bid").html(data);
               return false;
    }else if(bidding_cycle_count_value1=='' && restricted_bid_upto!=''){
             var data = '  <div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You are restricted upto '+restricted_bid_upto+'.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
               $("#alert_message_last_bid").html(data);
               return false;
    }
    else if(bidding_cycle_count_value1=='')
    {
             var data = '  <div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Bid Inactive.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
               $("#alert_message_last_bid").html(data);
               return false;
    }
    else if ($("#place_a_bid_btn_1").prop('disabled') && $("#bid_amount").prop('readonly')) 
    { 
            var data = '  <div  id="main_dialog_box5" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You have the last lowest bid please wait for another user to make the highest bid.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog5();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';
            $("#alert_message_last_bid").html(data);
    }
});

 var plan_id_3 = $('#hidden_application_plan_id_value').val();
     $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."User/ajax_plan_details";?>',
      cache:false,
     
      data: {'plan_id':plan_id_3},
      success: function(response){
        if($.trim(response)!=0){
           var data = JSON.parse(response);
            $('#PlanId').val(data[0].id);    
            $('#plan_id').val(data[0].id);    
            $('#PlanName').val(data[0].plan_name);    
            $('#TotalNoBiddingCycle').val(data[0].no_bidding_cycle);    
            $('#StartDate').val(data[0].enrollment_start_date);    
            $('#EndDate').val(data[0].enrollment_end_date);    
        }
        else if(response == '1')
        {
            $('#PlanId').val('');    
            $('#PlanName').val('');    
            $('#TotalNoBiddingCycle').val('');    
            $('#StartDate').val('');    
            $('#EndDate').val(''); 
        }
      }
    });
});

/////////////////////////////////////////////ADMIN JQUERY//////////////////////////////////////////////////





//////////TIER DROPDOWN JQUERY ///////////
<?php if($this->session->userdata('login_type') =='admin') 
{?>



    $(document).ready(function(){
  $('#summernote').summernote();
  $('.summernote').summernote();
});
$('#total_no_appliactions').on("keyup", function()
{
var tierCount = $('#total_no_appliactions').val();

var oneToHundredArray=[];
 for(var value = 1; value <= tierCount; value++) {
    oneToHundredArray.push(value);
}

for(var index = 0; index < oneToHundredArray.length; index++) {
    console.log(oneToHundredArray[index]);

var output = [];
output.push('<option value="">Please Select</option>');
$.each(oneToHundredArray, function(key, value)
{ 
  output.push('<option value="'+ value +'">'+ value +'</option>');
});

$('#tier_1_select').html(output.join(''));

}
$('#tier_2_select').empty();
$('#tier_3_select').empty();
$('#tier_4_select').empty();

  });



/////////////////////////// MANAGE USER EDIT PROFILE JQUERY ///////////////////////////////////////////////

var minLengthmANAGEprFilePhoneNo = 14;
$(".minLengthmanageprofilePHoneNo").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthmANAGEprFilePhoneNo)
    {
        $("#minLengthmanageprofilePHoneNoError").text("Phone no must be 10 digits.");
        $('#submit').prop("disabled", true);
    }
    else
    {
       $("#minLengthmanageprofilePHoneNoError").text("");
       $('#submit').prop("disabled", false);
    }
   
});

var charRegmanageprofile = /^\s*[a-zA-Z0-9,\s]+\s*$/;
$('.user_street_name_manage_profile').on("keyup", function(){
    var inputVal = $('.user_street_name_manage_profile').val();

    if (!charRegmanageprofile.test(inputVal))
    {
        $("#street_name_error_manage_profile").text("Special Characters Are Not Allowed.");
        $('#submit').prop("disabled", true);
    }
    else
    {
        // success!
        $("#street_name_error_manage_profile").text("");
        $('#submit').prop("disabled", false);
    }

});


$('.manage_user_profile_val').on("keyup", function()
{
    var zip = $('.manage_user_profile_val').val();

    var zipRegex = /^(?:[A-Z]\d[A-Z][ -]?\d[A-Z]\d)$/i;

    if (!zipRegex.test(zip))
    {
        $("#postal_code_error_manage_profile").text("Please Enter Correct Postal Code.");
        $('#submit').prop("disabled", true);
    }
    else
    {
        // success!
        $("#postal_code_error_manage_profile").text("");
        $('#submit').prop("disabled", false);
    }
});


var minLengthSinmanageProFilE = 11;
$(".sin_manage_profile_val").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthSinmanageProFilE)
    {
        $("#sin_error_manage_profile").text("SIN Must Be 9 digits.");
        $('#submit').prop("disabled", true);
    }
    else
    {
       $("#sin_error_manage_profile").text("");
       $('#submit').prop("disabled", false);
    }
   
});

/////////////////////////// MANAGE USER EDIT PROFILE JQUERY ///////////////////////////////////////////////


/////////////////////////// MANAGE APPLICATION REVIEW JQUERY///////////////////////////////////////////////

var minLengthSinaPPLICaTIONrEvIEw = 11;
$(".sin_application_Review_class").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthSinaPPLICaTIONrEvIEw)
    {
        $("#sin_application_reViewErroR").text("SIN Must Be 9 digits.");
        $('#submit').prop("disabled", true);
    }
    else
    {
       $("#sin_application_reViewErroR").text("");
       $('#submit').prop("disabled", false);
    }
   
});


var charRegApplIcatiOnRevIeW = /^\s*[a-zA-Z0-9,\s]+\s*$/;
$('.streetNameAppliCatiOnReviEw').on("keyup", function(){
    var inputVal = $('.streetNameAppliCatiOnReviEw').val();

    if (!charRegApplIcatiOnRevIeW.test(inputVal))
    {
        $("#street_nameErrorApplicationREview").text("Special Characters Are Not Allowed.");
        $('#submit').prop("disabled", true);
    }
    else
    {
        // success!
        $("#street_nameErrorApplicationREview").text("");
        $('#submit').prop("disabled", false);
    }

});


var minLengthAppliCationReviEwPhnNo = 14;
$(".phoNEappLicationReviewVal").on("keyup", function(){
    var value = $(this).val();
    if (value.length < minLengthAppliCationReviEwPhnNo)
    {
        $("#phonenOErrOrApplIcATioNError").text("Phone no must be 10 digits.");
        $('#submit').prop("disabled", true);
    }
    else
    {
       $("#phonenOErrOrApplIcATioNError").text("");
       $('#submit').prop("disabled", false);
    }
   
});


/////////////////////////// MANAGE APPLICATION REVIEW JQUERY///////////////////////////////////////////////

/////////////////////////// DRAG AND DROP MENU //////////////////////////////////////////////


// $("#document_name").on("keyup", function(){
//     var value = $(this).val();

//     if (value.length > 0 )
//     {
//       $("#document_row").removeAttr( 'style' );
//       $("#hidden_document_name").val(value);
//     }
//     else
//     {
//       $("#document_row").css('pointer-events','none');
//     }
   
// });


// //Disabling autoDiscover
// Dropzone.autoDiscover = false;


//     //Dropzone class
//     var userIdvalueGet = $('#hidden_userID_fetch_Val').val();
//     var document_name =  $('#hidden_document_name').val();

//     alert(userIdvalueGet);

//     var myDropzone = new Dropzone(".dropzone", {
//         url: '<?php echo base_url()."Admin/uploadfield";?>',
//         paramName: "file",
//         maxFilesize: 2,
//         maxFiles: 10,
//         // acceptedFiles: "image/*,application/pdf",
//         params: {'id':userIdvalueGet,'name':document_name}
//     });


// Dropzone.autoDiscover = false;

// function on_change_document_name()
// {
//     //Disabling autoDiscover


//     //Dropzone class
//     var userIdvalueGet = $('#hidden_userID_fetch_Val').val();
//     var document_name =  $('#hidden_document_name').val();

//     alert(document_name);

//     var myDropzone = new Dropzone(".dropzone", {
//         url: '<?php echo base_url()."Admin/uploadfield";?>',
//         paramName: "file",
//         maxFilesize: 2,
//         maxFiles: 10,
//         // acceptedFiles: "image/*,application/pdf",
//         params: {'id':userIdvalueGet,'name':document_name}
//     });
// }


/////////////////////////// DRAG AND DROP MENU //////////////////////////////////////////////

///////////////////////////////////  DOCUMENTS TABLE DATA  /////////////////////////////////////

$(document).ready(function(){
    //     var uid=$('#u_id').val();
    //     var a_id=$('#a_id').val();
    //     $('.user_application_comments').keyup(function() {
    //     var comments = $(this).val().replace(/\n/g, '<br/>');
    //     $.ajax({
    //         url:"<?php echo base_url()?>Admin/saveComment",
    //         type:"POST",
    //         data:{'comments':comments,
    //         'id':uid,
    //         'a_id':a_id
    //       },
    //       success:function(response){
    //         }
    //    });

    // });
    // var userIdvalueGet = $('#hidden_userID_fetch_Val').val();
    //   $.ajax({
    //   type: 'POST',
    //   url: '<?php echo base_url()."Admin/view_documents_data";?>',
    //   cache:false,
    //   data: {'userIdvalueGet':userIdvalueGet},
    //   success: function(response){
    //    if(response != 0){
    //    var data = JSON.parse(response);
    //         $("#view_documents_table_value > tbody").html("");
    //         destory_data_table("#view_documents_table_value");
    //         var count =1;
    //        $.each(data, function(index, value) {
    //             var counter  = count++;
    //                 var link ="<?php echo base_url()?>assets/users";
    //                 var new_date =   value.document_records_upload_date; 
    //                 var result = new_date.split('-');
    //                  var newDates = result[1]+'/'+result[2]+'/'+result[0];
    //                 var tr= '<tr><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm text-capitalize">'+value.document_records_custom_name+'</td><td class="text-center font-w600 font-size-sm">'+newDates+'</td><td class="text-center font-w600 font-size-sm">'+value.document_records_format+'</td><td><button  class="btn btn-small "><a style="color:#575757!important;"  target="_blank" href='+link+'/'+value.document_records_image_originalname+'>Download </a></button></td><td><button class="btn btn-small" onclick="opendelmodal(this,'+value.document_records_id+');">Delete</button></td><td><button class="btn btn-small" data-toggle="modal" data-target="#modal-edit-doc" onclick="insert_hidden_id(this,'+value.document_records_id+');">Edit</button></td></tr>';
    //                    $('#view_documents_table_value tbody').append(tr);
    //         });
    //        intializeDatatable('#view_documents_table_value');
    //    }
    //   }
    // }); 
  });



///////////////////////////////////  DOCUMENTS TABLE DATA  /////////////////////////////////////


///////////////////

$('.bidding_amount_per_memeber').on('input blur paste', function(){
    $('.bidding_amount_per_memeber').toNumber().formatCurrency();
 //  var Value=$(this).val();
 //      Value=formatToCurrency(Value)
 // // $(this).val($(this).val().replace(/\D/g, ''))
 // $(this).val(Value);
});

///////////////////////


////////// WIN BID AMOUNT FORMAT ON KEY PRESS //////////////////

$("#min_win_bid_amount").on("change", function(){

  var minBiDamount = $(this).val();
  if(minBiDamount != '')
  {
   $(this).val((parseFloat(minBiDamount)).toFixed(2));

   var formatAmount = (parseFloat(minBiDamount)).toFixed(2);

   $("#min_win_bid_amount").val(formatAmount);
   $("#hidden_win_amount").val(formatAmount);
  }
  else
  {
   $(this).val('');
   $("#hidden_win_amount").val('');

  }
});

///Bidding Late fees Format
$("#bidding_late_fee").on("change", function(){

  var bidding_late_fee = $(this).val();
  if(bidding_late_fee != '')
  {
   $(this).val((parseFloat(bidding_late_fee)).toFixed(2));

   var formatAmount = (parseFloat(bidding_late_fee)).toFixed(2);

   $("#bidding_late_fee").val(formatAmount);
  }
  else
  {
   $(this).val('');
  }
});
///ineterest_on_late_payment
$("#ineterest_on_late_payment").on("change", function(){

  var ineterest_on_late_payment = $(this).val();
  if(ineterest_on_late_payment != '')
  {
   $(this).val((parseFloat(ineterest_on_late_payment)).toFixed(2));

   var formatAmount = (parseFloat(ineterest_on_late_payment)).toFixed(2);

   $("#ineterest_on_late_payment").val(formatAmount);

  }
  else
  {
   $(this).val('');
  }
});




/// PLAN NAME SEQUENCE 


// $("#plan_name").on("change", function(){
//     var value = $('#plan_name_sequence').val();

//     if($.trim(value) != '')
//     {
//       if($.trim(value) == '1')
//       {
//         var sequence = $('#hidden_sequence_100').val();
//       }
//       if($.trim(value) == '2')
//       {
//         var sequence = $('#hidden_sequence_1000').val();
//       }


//       var plan_value =$(this).val();
//       $(this).val(plan_value+'-'+sequence);
//     }
   
// });


////////////WIN BID AMOUNT FORMAT ON KEY PRESS END//////////////////////////////////



//////////////////////// ADMIN  ALERT ///////////////

$(document).ready(function(){
      $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."Admin/get_notifications";?>',
      cache:false,
      success: function(response){
        if(response != 0)
       {
       var data = JSON.parse(response);
          var count =1;
          $.each(data, function(index, value) {
                var counter= count ++;
                var notification_route="'"+value.notification_route+"'";
                var li ='<li onclick="delete_admin_notification(this,'+value.notification_id+','+notification_route+');"><a href="javascript:void(0)" class="text-dark media py-2" ><div class="mr-2 ml-3"> <i class="fa fa-fw fa-check-circle text-success"></i> </div> <div class="media-body pr-2"> <div class="font-w600">'+value.notification_detail+'</div><small class="text-muted">NEW</small></div> </a></li>';
                $('#admin_notification').append(li);
                $('#admin_notification_count').html(counter);
            });
       }
      }
    }); 
  });





function delete_admin_notification (that,id,notification_route)
{
      $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."Admin/delete_admin_notification";?>',
      cache:false,
     
      data: {'id':id},
      success: function(response){
       if(response != '' && notification_route=='notes')
       {
          // id="btabs-animated-fade-plans"
          var link ="<?php echo base_url()?>notes#btabs-animated-fade-plans";
          location.href = link;

       }else if(response != '')
       {
          var link ="<?php echo base_url()?>application-review";
          location.href = link;
       }
      }
    }); 


}


function delete_all_admin_notification (){
      $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."Admin/delete_all_admin_notification";?>',
      success: function(response){
        if(response != '')
       {
        location.reload();
       }
      }
    }); 
}

$(document).ready(function() {
    func_defined(fetch_notes_onstart());
    func_defined(fetch_notess_meta());
    func_defined(get_select_user());
} );





$(document).ready(function() {
    $('#notes_view_detail').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false,
        "bInfo" : false,
         "searching": false
    } );
});

$(document).ready(function() {
$('#view_approved_plan_user').DataTable( {
     "scrollX": true
} );
} );
$(document).ready(function() {
$('#view_approved_plan_rejected_users').DataTable( {
    "scrollX": true
} );
} );
$(document).ready(function() {
$('#view_approved_plan_restricted_users').DataTable({
    "scrollX": true
});
$('a[data-toggle="user_approved_table_tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
});
$('a[data-toggle="user_approved_table_tab_1"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
}); 
$('a[data-toggle="user_rejected_table_tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
});  

$('a[data-toggle="user_restrited_table_tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
});  



});

$(document).ready(function() {
$('#view_transaction_table').DataTable( {
    "scrollX": true
} );
} );

$(document).ready(function() {
$('#view_trans_desc_Table').DataTable( {
        "paging":         false,
        "bInfo" : false,
        "searching": false,
} );
} );
$(document).ready(function() {
$('#view_plans_table_admin').DataTable({
        "scrollX": true,
        // "scrollY":        "400px",
        "scrollCollapse": true,
        // "paging":         false,
        "bInfo" : false,
        // "searching": false,
        "targets": 'no-sort',
        "bSort": false,
        "order": [],
     });

$('a[data-toggle="view_plan_table_admin_tab"]').on('shown.bs.tab', function (e) 
{
    // $($.fn.dataTable.tables(true)).DataTable()
    // .columns.adjust()
    // .responsive.recalc();
    destory_data_table('#view_plans_table_admin');
    intializeDatatable('#view_plans_table_admin');
});  

$('#transactions_details_table_per_cycle').DataTable( {
        "scrollX": true,
        // "scrollY":        "400px",
        "scrollCollapse": true,
        // "paging":         false,
        "bInfo" : false,
        // "searching": false,
        "targets": 'no-sort',
        "bSort": false,
        "order": []

});
$('#bidding_monior_table').DataTable( {
        "paging":         false,
        "bInfo" : false,
        "searching": false,
        "scrollY":        "400px",
        "scrollCollapse": true,
        "targets": 'no-sort',
        "bSort": false,
        "order": [],
        "scrollX":true,
} );
$('#bidding_monior_table_s').DataTable( {
        "paging":         false,
        "bInfo" : false,
        "searching": false,
        "scrollY":        "400px",
        "scrollCollapse": true,
        "targets": 'no-sort',
        "bSort": false,
        "order": [],
        "scrollX":true,
});
$('#view_statement_no_table').DataTable( {
        // "paging":false,
        "bInfo" : false,
        // "searching": false,
         "targets": 'no-sort',
        "bSort": false,
        "order": [],
        "scrollX":true,
} );
$('a[data-toggle="view_statement_table_tab"]').on('shown.bs.tab', function (e) {
                //  $($.fn.dataTable.tables(true)).DataTable()
                // .columns.adjust()
                // .responsive.recalc();
    destory_data_table('#view_statement_no_table');
    intializeDatatable('#view_statement_no_table');
}); 
$('#view_plan_sequence_table').DataTable({
        // "paging":false,
        "bInfo" : false,
        // "searching": false,
         "targets": 'no-sort',
        "bSort": false,
        "order": [],
        "scrollX":true,
} );
$('a[data-toggle="view_plan_sequence_table_tab"]').on('shown.bs.tab', function (e) {
                //  $($.fn.dataTable.tables(true)).DataTable()
                // .columns.adjust()
                // .responsive.recalc();
                 destory_data_table('#view_plan_sequence_table');
                 intializeDatatable('#view_plan_sequence_table');
});
$('#view_trans_desc_Table_1').DataTable( {
        // "paging":false,
        "bInfo" : false,
        // "searching": false,
         "targets": 'no-sort',
        "bSort": false,
        "order": [],
        "scrollX":true,
} );
$('a[data-toggle="master_transaction_trans_desc_table_tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
               });    

$('#admin_access_table').DataTable({
        "scrollX":true,
} );
$('a[data-toggle="admin_access_table_tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
               });    
$('#view_notes').DataTable( {
        // "paging":false,
        "bInfo" : false,
        // "searching": false,
         "targets": 'no-sort',
        "bSort": false,
        "order": [],
        "scrollX":true,
});
$('a[data-toggle="view_notes_tab"]').on('shown.bs.tab', function (e) {
                 $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
               });    
$('#view_other_admin_table').DataTable({
        "scrollX":true,
});
});
$(document).ready(function() {
 $("#add_trans_date").flatpickr({
           minDate: "today",
           maxDate:"today",
           dateFormat: "m/d/Y ",               
    }); 
});
$(document).ready(function() {
 $("#bidding_monitor_date").flatpickr({
           // minDate: "today",
           dateFormat: "m/d/Y ",
                             
    });  
 $("#bidding_monitor_enddate").flatpickr({
           minDate: "today",
           dateFormat: "m/d/Y ",
                             
    }); 
} );
    $(document).ready(function() {
     var note_path = window.location.href.split('#')[1];
    if(note_path){
       $('#btabs-animated-fade-home').removeClass('active show');
       $('#newNote').removeClass('active');
       $('#btabs-animated-fade-plans').addClass('active show');
       $('#viewNote').addClass('active');
    }

} );
$(document).ready(function() {
func_defined(get_bidding_cycles());
func_defined(get_transaction_desc());
func_defined(get_plan_transactions_per_cycle());
$('#test').addClass('test');
// Disable approve button 
func_defined(disableApprove());
});

$(document).ready(function() {
  var dateToday = new Date(); 
 $("#statement_end_date").flatpickr({
           dateFormat: "m/d/Y",
           // minDate:start_date
    //   onClose: function (selected) {
    //   if(selected.length <= 0) {
    //       // selected is empty
    //       $("#statement_start_date").flatpickr('disable');
    //   } else {
    //       $("#statement_start_date").flatpickr('enable');
    //   }
    //   $("#statement_start_date").flatpickr("option", "maxDate", selected);
    // }                  
    });  
 $("#statement_start_date").flatpickr({
           dateFormat: "m/d/Y", 
           // maxDate:end_date
    //        onClose: function (selected) {
    //      if(selected.length <= 0) {
    //       // selected is empty
    //       $("#statement_end_date").flatpickr('disable');
    //   } else {
    //       $("#statement_end_date").flatpickr('enable');
    //   }
    //   $("#statement_end_date").flatpickr("option", "minDate", selected);
    // }                
    });  
 $("#statement_due_date").flatpickr({
           dateFormat: "m/d/Y", 
           // maxDate:end_date
    //        onClose: function (selected) {
    //      if(selected.length <= 0) {
    //       // selected is empty
    //       $("#statement_end_date").flatpickr('disable');
    //   } else {
    //       $("#statement_end_date").flatpickr('enable');
    //   }
    //   $("#statement_end_date").flatpickr("option", "minDate", selected);
    // }                
    });  

 $("#statement_due_date_master").flatpickr({
           dateFormat: "m/d/Y",               
    });  
 $("#statement_start_date_master").flatpickr({
           dateFormat: "m/d/Y",               
    });  
 $("#statement_end_date_master").flatpickr({
           dateFormat: "m/d/Y",               
    }); 
} );

 // $("#dob").datepicker({     
 //   // dateFormat: "m/d/Y",                  
 //   });


   $("#dob").flatpickr({
           dateFormat: "m/d/Y", 
            maxDate: "today",
    }); 

//disable create plan button 

$(document).ready(function() 
{
    var tier1Value = $('#tier_1_select').val();
    var tier2Value = $('#tier_2_select').val();
    var tier3Value = $('#tier_3_select').val();
    var tier4Value = $('#tier_4_select').val();


    // alert(tier1Value);
    // alert(tier2Value);
    // alert(tier3Value);
    // alert(tier4Value);

    if($.trim(tier1Value) == '' || tier4Value == '' || tier2Value == ''|| tier3Value == '')
    {
        $('.create_plan_submit_button').prop("disabled", true);
    }
    else
    {
        $('.create_plan_submit_button').prop("disabled", false);
    }

      $('#user_tier_popup_table').DataTable({
        "paging":false,
        "bInfo" : false,
        "searching":false,
        "scrollY": "400px",
        "scrollCollapse": true,
        "targets":'no-sort',
        "bSort": false,
        "order": [],
        "scrollX":true,
    });
    $('#modal-block-tier-modal').on('shown.bs.modal', function (e) 
    {
    $($.fn.dataTable.tables(true)).DataTable()
    .columns.adjust()
    .responsive.recalc();
    }); 

});
<?php 
}
?>


function formatToCurrency(amount){
  return parseFloat(amount).toFixed(2).replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function formatToCurrency2(amount){
    var dollarUS = Intl.NumberFormat("en-US", {
      style: "currency",
      currency: "USD",
      useGrouping: true,
   });
   return dollarUS.format(amount);
}

$(document).ready(function(){
  $('#pad_history_table').DataTable();
  $('#pad_history_table_1').DataTable();
  var current_segment='<?php echo $this->uri->segment(1)?>';
 
  $('.currency_format').blur(function()
    {
        $('.currency_format').toNumber().formatCurrency();
    });

if(current_segment!='create-plan'){
  $('.currency_format').mouseout(function()
    {
        $('.currency_format').toNumber().formatCurrency();
    });
  $('.format_amount').mouseout(function()
    {
        $('.format_amount').toNumber().formatCurrency();
    });
}
  $('.format_amount').blur(function()
    {
        $('.format_amount').toNumber().formatCurrency();
    });
});
 function intializeDatatable_2(id){
  $(id).DataTable();
  }
/////////////////////////////////////////////ADMIN JQUERY//////////////////////////////////////////////////
</script>
    </body>
</html>


