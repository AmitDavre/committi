<style type="text/css">
.page-item.active .page-link {
    z-index: 3;
    color: #6fb8eb!important;
    background-color: #f9f9f9;
    border-color: #6fb8eb!important;
}    
</style>

<div>
<!-- Main Container -->

            <main id="main-container">

                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo  base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Transactions/Plans</li>
                                    <li class="breadcrumb-item">Plans</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->
                <!-- Page Content -->

                <div class="content content-full">

                    <!-- User Profile -->

                    <div class="block">

                        <div class="block-header">

                            <h3 class="block-title">Plan Details</h3>

                        </div>

                        <div class="block-content">
                            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="view_plans_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" width="100%">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 10%;" class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_2"  aria-sort="ascending" aria-label="ID: activate to sort column descending">S.No</th>
                                                    <th style="width: 20%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Name: activate to sort column ascending">Plan Name</th>
                                                    <th style="width: 35%;" class="d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Email: activate to sort column ascending">Plan Description</th>
                                                    <th style="width: 25%;" class="d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Access: activate to sort column ascending">Status</th>
                                                    <th  style="width: 10%;"class="sorting" tabindex="0" aria-controls="DataTables_Table_2" aria-label="Registered: activate to sort column ascending">View </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            if ($ResultUserSignedUpPlans != '')
                                            {
                                                $count =1; 
                                                foreach($ResultUserSignedUpPlans as $item) 
                                                    { 
                                            ?> 
                                                    <tr role="row" class="odd">
                                                        <td class="text-center font-size-sm sorting_1"><?php echo $count++ ?></td>
                                                        <td class="text-center font-size-sm sorting_1"><?php echo $item['plan_name'] ?></td>
                                                        <td class="text-center font-size-sm sorting_1"><?php echo $item['plan_description'] ?>
                                                        </td>
                                                        <td class="text-center font-size-sm sorting_1">Open</td>
                                                        <td class="text-center font-size-sm sorting_1">
                                                            <a  class="btn btn-block btn-info text-black" href="<?php echo base_url();?>bidding/<?php echo $item['confirmed_plan_user_id'].'/'.$item['confirmed_plan_plan_id']?> ">View
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php   }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                           

                        </div>

                    </div>

                </div>

                <!-- END User Profile -->

            </div>

            <!-- END Page Content -->

        </main>

        <!-- END Main Container -->