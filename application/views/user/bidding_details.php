
<!-- Main Container -->
<style type="text/css">
.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #110d35;
    background-color: #110d35;
}
</style>
            <main id="main-container">

                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Bidding</li>
                                    <li class="breadcrumb-item">BIdding History</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content-full">

                    <!-- User Profile -->

                    <div class="block">
                        <div id="ajax_div_tier">
                        </div>
                        <div class="block-header">

                            <h3 class="block-title">Bidding History</h3>

                        </div>

                        <div class="block-content">
                            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="tierViewTable" class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" width="100%">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 10%;" class="text-center" >ID</th>
                                                    <th style="width: 25%;" class="text-center">Bidder Name</th>
                                                    <th style="width: 15%;" class="text-center">Bidding Cycle</th>
                                                    <th style="width: 25%;" class="text-center">Bidding Amount</th>
                                                    <th style="width: 25%;" class="text-center">Bidding Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                if ($BiddinGHistory != '')
                                                {
                                                    $count =1; 
                                                    foreach($BiddinGHistory as $BiddinGHistoryData) 
                                                        { 
                                                ?> 
                                                        <tr>
                                                            <td class="text-center"><?php echo $count++ ?></td>
                                                            <td class="text-center text-capitalize">
                                                                <?php 

                                                                $var1 = $BiddinGHistoryData['bidding_bidder_first_name'];
                                                                $var2 = $BiddinGHistoryData['bidding_bidder_last_name'];
                                                                $charToKeep = 1;

                                                                $myStr1= strlen($var1) > $charToKeep ?  substr_replace($var1, str_repeat ( '*' ,  strlen($var1) - $charToKeep), $charToKeep) : $var1;
                                                                $myStr2= strlen($var2) > $charToKeep ?  substr_replace($var2, str_repeat ( '*' ,  strlen($var2) - $charToKeep), $charToKeep) : $var2;


                                                                if($_SESSION['id'] == $BiddinGHistoryData['bidding_user_id'])
                                                                {
                                                                    echo $var1.' '.$var2;
                                                                }
                                                                else
                                                                {
                                                                    echo $myStr1.' '.$myStr2; 
                                                                }


                                                                ?>
                                                            </td>
                                                            <td class="text-center"><?php echo $BiddinGHistoryData['bidding_cycle_count']; ?></td> 
                                                            <td class="text-center"><?php echo $BiddinGHistoryData['bidding_place_bid_amount']; ?></td>
                                                            <td class="text-center">
                                                                <?php 
                                                         
                                                                $convertDate= date('m/d/Y H:i', strtotime($BiddinGHistoryData['bidding_place_bid_date']));
                                                                echo $convertDate;
                                                                
                                                                ?>
                                                                    
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

                    </div>

                    <!-- END User Profile -->

                </div>

                <!-- END Page Content -->

            </main>

            <!-- END Main Container -->



