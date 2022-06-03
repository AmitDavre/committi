
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
                                    <li class="breadcrumb-item">Application Status</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->
                <!-- Page Content -->

                <div class="content content">

                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Application Status</h3>
                        </div>
                        <div class="block-content block-content-full">
<!--------------------------------- TRANSACTION TABLE DETAILS ------------------------------------->
                               <table id="view_plans_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 20%;" class="text-center">ID</th>
                                                    <th style="width: 30%;" class="text-center">Plan Name </th>
                                                    <th style="width: 30%;" class="text-center">Plan Applied Date</th>
                                                    <th style="width: 20%;" class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php 
                                            if ($PlanDetails != '')
                                            {
                                                $count =1; 
                                                foreach($PlanDetails as $PlanViewData) 
                                                    { 
                                            ?>  
                                                        <tr>
                                                            <td class="text-center font-size-sm"><?php echo $count++ ?>
                                                            </td>
                                                            <td class="text-center font-size-sm"><a class="text-muted" href="<?php $encode_id = base64_encode($PlanViewData['assigned_plans_plan_id']); echo base_url()?>/plan-description/<?php echo $encode_id;?>"><?php echo $PlanViewData['user_application_plan_name']; ?></a></td>
                                                            <td class="text-center font-size-sm">
                                                                <?php 
                                                                $convertDate= date('m/d/Y', strtotime($PlanViewData['user_application_posted_date']));
                                                                echo $convertDate;
                                                                ?> 

                                                            </td>
                                                            <td class="text-center font-size-sm  ">

                                                                <?php 

                                                        if($PlanViewData['user_application_offer_sent'] == '1' && $PlanViewData['user_application_plan_confirmation'] == ''){

                                                            ?>
                                                            <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>view-application/<?php echo base64_encode($PlanViewData['u_id']).'/'.base64_encode($PlanViewData['user_application_plan_id']);?>">Waiting User</a>

                                                        <?php } else if ($PlanViewData['user_application_plan_confirmation'] == '1') { ?>

                                                            <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>view-application/<?php echo base64_encode($PlanViewData['u_id']).'/'.base64_encode($PlanViewData['user_application_plan_id']);?>">
                                                                Accepted
                                                            </a>
                                                        <?php }
                                                        else if ($PlanViewData['user_application_plan_confirmation'] == '0'){ ?>

                                                            <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>view-application/<?php echo base64_encode($PlanViewData['u_id']).'/'.base64_encode($PlanViewData['user_application_plan_id']);?>">Rejected</a>

                                                        <?php }else {?>
                                                             <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>view-application/<?php echo base64_encode($PlanViewData['u_id']).'/'.base64_encode($PlanViewData['user_application_plan_id']);?>">Pending</a>
                                                       <?php  } ?>

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

