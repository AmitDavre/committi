<?php 
$tier                           = $this->config->item('tier');
$bidding_cycle                  = $this->config->item('bidding_cycle');
$status                         = $this->config->item('status');
$no_of_bidding_cycle            = $this->config->item('no_of_bidding_cycle');
?>
<style type="text/css">
.page-item.active .page-link {
    z-index: 3;
    color: #110d35!important;
    background-color: #f9f9f9;
    border-color: #110d35!important;
}
.grey_color
{
    color: #575757!important;
}    
</style>
<!-- Main Container -->

            <main id="main-container">

                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo  base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Plans</li>
                                    <li class="breadcrumb-item">View Plans</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->


                <!-- Page Content -->

                <div class="content content">

                   <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">All Plans Detail</h3>
                        </div>
                        <div class="block-content block-content-full">

                        <table id="view_plans_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap">
                                <thead>
                                    <tr>
                                        <tr>
                                        <th class="text-center">ID</th>
                                        <th>Plan Name</th>
                                        <th>Plan Status</th>
                                        <th>Plan Description</th>
                                        <th>Enrolment Start Date</th>
                                        <th>Estimated Enrolment End Date</th>
                                        <th>Estimated Bidding Start Date</th>
                                        <th>No of Bidding Cycle</th>
                                        <th>Bidding Cycle</th>
                                        <th>Bidding Start Amount</th>
                                        <th>Bidding Decrement %</th>
                                        <th>Maximum Bidding Discount (%)</th>
                                        <th>Bidding Late Fee</th>
                                        <th>Interest On Late Payment</th>
                                        <th>Total No Of Applications</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                    if ($plans_view_data != '')
                                    {
                                        $count =1; 
                                        foreach($plans_view_data as $view_plans_data_array) 
                                            { 
                                    ?> 
                                                <tr>
                                                    <td class="text-center font-size-sm"><?php echo $count++ ?></td>
                                                    <td class="text-center font-size-sm"><a class="grey_color text-grey" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>"><?php echo $view_plans_data_array['plan_name']; ?> </a></td>
                                                    <td class="text-center font-size-sm">
                                                       <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>"> <?php 
                                                            foreach ($status as $key => $value) {
                                                                if($key == $view_plans_data_array['plan_status'])
                                                                {
                                                                    echo $value;  
                                                                }
                                                            }
                                                        ?>
                                                    </a>
                                                    </td>
                                                    <td class="text-center font-size-sm"><a class="grey_color text-dark" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>"><?php echo $view_plans_data_array['plan_description']; ?>
                                                    </a>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                            <?php echo $view_plans_data_array['enrollment_start_date']; ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                            <?php echo $view_plans_data_array['enrollment_end_date']; ?>
                                                        </a>
                                                        </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                        <?php echo $view_plans_data_array['bidding_start_date']; ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                        <?php echo $view_plans_data_array['no_bidding_cycle']; ?>
                                                        </a>

                                                    </td>
                                                    
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                            <?php 
                                                            foreach ($bidding_cycle as $key => $value) {
                                                                if($key == $view_plans_data_array['bidding_cycle'])
                                                                {
                                                                    echo $value;  
                                                                }
                                                            }
                                                        ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                            <?php echo '$'.number_format($view_plans_data_array['bidding_start_amount'],2); ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                            <?php echo $view_plans_data_array['bidding_decrement']; ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                        <?php echo $view_plans_data_array['bidding_min_threshold']; ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                            <?php echo '$'.number_format($view_plans_data_array['bidding_late_fee'],2); ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                            <?php echo $view_plans_data_array['interest_late_fee']; ?>
                                                        </a>
                                                    </td>
                                                    <td class="text-center font-size-sm">
                                                        <a class="text-dark grey_color" href="<?php echo base_url();?>plan-details/<?php echo base64_encode($view_plans_data_array['id']) ?>">
                                                            <?php echo $view_plans_data_array['total_no_appliactions']; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                <?php 
                                            } 
                                    }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                 </div>
            </div>
        </div>
                <!-- END Page Content -->
 </main>

