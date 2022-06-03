
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
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>manage-users">Manage User</a></li>
                                    <li class="auto_capitalize breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>edit-user/<?php echo base64_encode($user_id);?>"><?php echo $users['first_name'].' '.$users['last_name']?></a></li>
                                    <li class="breadcrumb-item">Plan Transactions </li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->
                <!-- Page Content -->

                <div class="content content">

                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Transactions Details</h3>
                        </div>
                   
                        <div class="block-content block-content-full">
<!--------------------------------- TRANSACTION TABLE DETAILS ------------------------------------->
                            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="hidden" name="hidden_user_id" id="hidden_user_id" value="<?php echo $user_id;?>">
                                        <button style="width: 67%;border-color: #110d35!important;" id="new_transaction_btn" class=" btn btn-info btn-sm mb-3">  <a class="text-muted" style="color: #fff!important;" href="<?php echo base_url()?>new-transaction/<?php echo base64_encode($plan_id);?>/<?php echo base64_encode($user_id);?>">New Transaction</a></button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="view_transaction_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" width="100%">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 5%;" class="text-center" tabindex="0" aria-controls="DataTables_Table_2"  aria-sort="ascending" aria-label="ID: activate to sort column descending">S.No</th>
                                                    <th style="width: 20%;" class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Name: activate to sort column ascending">Transaction Date </th>
                                                    <th style="width: 25%;" class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Name: activate to sort column ascending">Description </th>
                                                    <th style="width: 20%;" class="text-center d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Email: activate to sort column ascending">Refernece/Notes</th>
                                                    <th style="width: 15%;" class="text-center d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Access: activate to sort column ascending">Amount</th>
                                                    <th style="width: 15%;" class="text-center d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Access: activate to sort column ascending">Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php 
                                            if ($result_get_transactions != '')
                                            {
                                                $debsum='0';
                                                $cresum='0';
                                                $count =1; 
                                                foreach($result_get_transactions as $result_get_transactions) 
                                                    { 
                                                         $debsum+= $result_get_transactions['transaction_debit_amount'];
                                                         $cresum+= $result_get_transactions['transaction_credit_amount'];
                                            ?>  
                                                        <tr>
                                                            <td class="text-center font-size-sm sorting_1"><?php echo $count++ ?>
                                                            </td>
                                                            
                                                            <td class="text-left font-size-sm sorting_1">
                                                                <?php 
                                                                $convertDate= date('m/d/Y', strtotime($result_get_transactions['transaction_date']));
                                                                echo $convertDate;
                                                                ?> 

                                                            </td>
                                                            <td class="text-left font-size-sm sorting_1"><?php echo $result_get_transactions['transaction_description']; ?></td>

                                                            <td class="text-center font-size-sm  "><?php echo $result_get_transactions['transaction_ref']; ?></td>

                                                            <td class="text-center font-size-sm  "><span class="font-w600">
                                                                <?php 
                                                                $credit = $result_get_transactions['transaction_credit_amount'];
                                                                $debit  = $result_get_transactions['transaction_debit_amount'];

                                                                if($debit == '0.00')
                                                                {
                                                                    if($credit == '0.00')
                                                                    {
                                                                        echo '';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '$ -'.number_format($credit,2);
                                                                    }

                                                                }
                                                                else
                                                                {
                                                                    if($debit == '0.00')
                                                                    {
                                                                        echo '';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '$'.number_format($debit,2);
                                                                    }
                                                                }
                                                                
                                                              ?>

                                                                <span></td>

                                                            <td class="text-center font-size-sm  "><span class="font-w600">

                                                            <?php 
                                                                $credit = $result_get_transactions['transaction_credit_amount'];
                                                                $debit  = $result_get_transactions['transaction_debit_amount'];
                                                                

                                                                if($debit == '0.00')
                                                                {
                                                                    $balance= $debsum-$cresum ;

                                                                    echo '$'.number_format($balance,2);
                                                                }
                                                                else
                                                                {
                                                                    $balance= $debsum-$cresum ;

                                                                    echo '$'.number_format($balance,2);
                                                                }
                                                                
                                                             
                                                            ?>

                                                                <span></td>
                                                           
                                                        </tr>
                                    <?php           }
                                            }
                                            ?>
                                            </tbody> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

<!---------------------------------- TRANSACTION TABLE --------------------------------->

                    </div>

                </div>

                <!-- END User Profile -->

            </div>

            <!-- END Page Content -->

        </main>

        <!-- END Main Container -->

