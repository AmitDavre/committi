<?php $payment_status_array=$this->config->item('payment_status');?>
<style type="text/css">
.page-item.active .page-link {
    z-index: 3;
    color: #6fb8eb!important;
    background-color: #f9f9f9;
    border-color: #6fb8eb!important;
}

/*.dataTables_wrapper {
   
    font-size:12px;
}    */
</style>
<!-- Main Container -->
<div>
            <main id="main-container">

                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo  base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Statements</li>
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
                                                    <th style="width: 20%;" class="text-center"> Plan Name</th>
                                                    <th style="width: 20%;" class="text-center">Due Date </th>
                                                    <th style="width: 20%;" class="text-center">Due Amount </th>
                                                    <th style="width: 20%;" class="text-center">Download</th>
                                                    <th style="width: 20%;" class="text-center">Pay Now</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php 


                                            if ($result_statement_details != '')
                                            {
                                                $count =1; 
                                                foreach($result_statement_details as $result_statementData) 
                                                    { 
                                            ?>  
                                                        <tr>
                                                         
                                                            <td class="text-center font-size-sm"><?php 
                                                            foreach ($result_plans as $key => $value) 
                                                            {
                                                                if($value['id'] == $result_statementData['statement_plan_id'])
                                                                {
                                                                    echo $value['plan_name'];
                                                                }
                                                            }

                                                            ?> </td>
                                                            <td class="text-center font-size-sm">
                                                                <?php 
                                                                $convertDate= date('m/d/Y', strtotime($result_statementData['statement_generated_date']. ' + 21 days'));
                                                                echo $convertDate;
                                                                ?> 

                                                            </td>               
                                                            <td class="text-center font-size-sm">
                                                               
                                                                $<?php 
                                                                
                                                                echo number_format($result_statementData['statement_due_amount'],'2');
                                                                ?> 
                                                            </td> 
                                                            <td class="text-center font-size-sm">
                                                               
                                                                <button class="btn btn-sm btn-info"><a style="color: #fff;" target="_blank" href="<?php echo $result_statementData['statement_pdf_path']; ?>">Download</a></button>
                                                            </td> 
                                                            <td class="text-center font-size-sm">
                                                               
                                                               <?php 
                                                               if($result_statementData['statement_due_amount'] == 0)
                                                               { ?>


                                                               <?php } else{ 
                                                                 $check_balance_sign=substr($result_statementData['statement_due_amount'], 0, 1);
                                                                  if($check_balance_sign=='-'){

                                                                ?>

                                                                <button class="btn btn-sm btn-info"><a style="color: #fff;" onclick="return paymentInformation('<?php echo $result_statementData['statement_plan_id'] ?>');">Request Fund</a></button>

                                                            <?php } else{ ?>
                                                                    
                                                               <button class="btn btn-sm btn-info"><a style="color: #fff;" onclick="return paymentInformation('<?php echo $result_statementData['statement_plan_id'] ?>');">Pay Now</a></button>
                                                               <?php }
                                                           }
                                                               ?>
                                                            </td> 

                                                        </tr>
                                    <?php           }
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
<script>
function paymentInformation(plan_id)
{
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
    }
}
</script>