<?php 
$tier                           = $this->config->item('tier');
$bidding_cycle                  = $this->config->item('bidding_cycle');
$status                         = $this->config->item('status');
$no_of_bidding_cycle            = $this->config->item('no_of_bidding_cycle');

?>

<!-- Main Container -->
<style type="text/css">
    .page-item.active .page-link {
    z-index: 3;
    color: #110d35!important;
    background-color: #f9f9f9;
    border-color: #110d35!important;
}
</style>
            <main id="main-container">

                  <!-- Hero -->

                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>manage-users">Manage User</a></li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content">

                   <div class="block">
                        <div class="block-header">
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-simple class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                            <table id="view_manage_user" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important;">
                                <thead>
                                    <tr>
                                        <th style="width:10%;"class="text-center">ID</th>
                                        <th style="width:25%;">First Name</th>
                                        <th style="width:25%;">Last Name</th>
                                        <th style="width:30%;">Email ID</th>
                                        <th  style="width:10%;">View</th>
                                        <th  style="display: none;">DOB</th>
                                    </tr>
                                </thead>
                               <tbody>  
                                <?php 
                                    if ($users != '')
                                    {
                                        $count =1; 
                                        foreach($users as $users_data) 
                                            { 
                                    ?> 
                                                <tr>
                                                    <td class="text-center font-size-sm"><?php echo $count++ ?></td>
                                                    <td class="text-center font-size-sm text-capitalize"><?php echo $users_data['first_name']; ?></td>
                                                    <td class="text-center font-size-sm text-capitalize"><?php echo $users_data['last_name']; ?></td>
                                                    <td class="text-center font-size-sm"><?php echo $users_data['username']; ?></td>
                                                    <td class="text-center font-size-sm">
                                                            <a  style="color: #fff;" class="btn btn-sm btn-info" href="<?php echo base_url();?>edit-user/<?php echo base64_encode( $users_data['id']);?>">View</a>
                                                    </td>
                                                    <td style= "display: none;" class="text-center font-size-sm"><?php echo $users_data['user_dob']; ?></td>
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
                <!-- END Page Content -->
 </main>
            <!-- END Main Container -->

