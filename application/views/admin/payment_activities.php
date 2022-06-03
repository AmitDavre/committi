
<?php $payment_status_array=$this->config->item('payment_status');?>
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
                                    <li class="breadcrumb-item">Payment Activities</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->
                <!-- Page Content -->

                <div class="content content">

                    <div class="block">
                        <div class="block-content block-content-full">
<!--------------------------------- TRANSACTION TABLE DETAILS ------------------------------------->

                                        <table id="view_plans_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center">Sr.no</th>
                                                    <th style="width: 20%;" class="text-center"> Plan Name</th>
                                                    <th style="width: 20%;" class="text-center">User Name </th>
                                                    <th style="width: 20%;" class="text-center">Payment Amount</th>
                                                    <th style="width: 20%;" class="text-center">Refund Amount</th>
                                                    <th style="width: 20%;" class="text-center">Payment Date</th>
                                                    <th style="width: 20%;" class="text-center">Payment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php if($fetch_payment_result){ $count=1;
                                                foreach($fetch_payment_result as $payment){?>

                                                    <tr>
                                                        <td class="text-center font-size-sm"><?php echo $count++;?></td>

                                                        <td class="text-center font-size-sm"><?php echo $payment['user_application_plan_name']; ?></td>

                                                        <td class="text-center text-capitalize font-size-sm sorting_1"><?php echo $payment['user_application_first_name'].' '.$payment['user_application_last_name'];?></td>

                                                        <td class="text-center font-size-sm"><?php echo  '$ '.number_format($payment['payment_amount'],2);?></td>

                                                        <td class="text-center font-size-sm"><?php echo  '$ '.number_format($payment['payment_refund_amount'],2);?></td>

                                                        <td class="text-center font-size-sm"><?php echo date('m/d/Y',strtotime($payment['payment_date']))?></td>
                                                        <td class="text-center font-size-sm">
                                                        <select class="form-control font-size-sm" name="payment_status" id="payment_status" onchange="return change_payment_status('<?php echo $payment["payment_id"]?>');">
                                                            <?php foreach($payment_status_array as $key=>$value){ ?>

                                                            <option value="<?php echo $value; ?>" <?php if($payment['payment_status']==$value) { echo 'selected';}?>><?php echo $value;?></option>
                                                           
                                                           <?php } ?>
                                                       </select>




                                                        </td>
            
                                                    </tr>


                                                    <?php } }?>
                                           
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

window.onload = function() 
{
    };

function change_payment_status(payment_id){
    var payment_status =$('#payment_status').val();
    $.ajax({
        url:"<?php echo base_url() ?>Admin/change_payment_status",
        type:"Post",
        cache:false,
        data:{'payment_status':payment_status,'payment_id':payment_id},
        success:function(response){
         //
        }
    });

}


</script>
