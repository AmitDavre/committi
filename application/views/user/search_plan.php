
<!-- Main Container -->

            <main id="main-container">

                           <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Transactions/Plans</li>
                                    <li class="breadcrumb-item">Transactions</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->

                <!-- Page Content -->

                <div class="content content">

                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Plan Details</h3>
                        </div>

                        <div class="block-content block-content-full">
                            <form action="<?php echo base_url()?>search-plan" method="POST" enctype="multipart/form-data" >
                                <div class="row">
                                    <div class="col-sm-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        Select Plan
                                                    </span>
                                                </div>
                                                <select class="form-control" id="plan_id" name="plan_id">
                                                    <option value="0">Select</option>
                                                 <?php
                                                    // Iterating through the tier array
                                                     array_unshift($plans, "phoney");
                                                     unset($plans[0]);
                                                    foreach($plans as $key =>$item){
                                                    ?>
                                                    <option value="<?php  echo $item['id'];?>" >
                                                    <?php echo $item['plan_name'];?>
                                                    </option>
                                                    <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-sm-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <button type="submit" id="submit" name="submit" class="text-black btn btn-info">
                                                  Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </form>
                                <div class="row">                              
                                    <div class="col-sm-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="example-select">Plan ID</label>
                                            <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="<?php echo $plan_data['id']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-select">Plan Name</label>
                                            <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="<?php echo $plan_data['plan_name']?>" readonly>
                                        </div> 
                                        <div class="form-group">
                                            <label for="example-select">Total Bidding Cycle</label>
                                            <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="<?php echo $plan_data['no_bidding_cycle']?>" readonly>
                                        </div> 
                                    </div>

                                   <div class="col-sm-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label for="example-select"> Start Date</label>
                                            <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="<?php echo $plan_data['enrollment_start_date']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-select">End Date</label>
                                            <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" value="<?php echo $plan_data['enrollment_end_date']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-select"> Statement Due Date</label>
                                            <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" readonly>
                                        </div>
                                    </div>
                                 <div class="col-sm-4 col-lg-4 col-xl-4">
                                     <div class="form-group">
                                            <label for="example-select"> Statement Balance</label>
                                            <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1"readonly>
                                     </div>
                                    <div class="form-group">
                                            <label for="example-select">  Next Bidding Cycle</label>
                                            <input type="text" class="form-control" id="example-group1-input1" name="example-group1-input1" readonly>
                                     </div>
                                 </div>
                                </div>




<!--------------------------------- TRANSACTION TABLE DETAILS ------------------------------------->
                                <br><h3 class="block-title">Transaction Details</h3><br>
                            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="view_plans_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" width="100%">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 10%;" class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_2"  aria-sort="ascending" aria-label="ID: activate to sort column descending">ID</th>
                                                    <th style="width: 15%;" class="sorting" tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Name: activate to sort column ascending">Transaction Date </th>
                                                    <th style="width: 35%;" class="d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Email: activate to sort column ascending">Description</th>
                                                    <th style="width: 20%;" class="d-none d-sm-table-cell sorting"  tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Access: activate to sort column ascending">Amount $</th>
                                                    <th  style="width: 20%;"class="sorting" tabindex="0" aria-controls="DataTables_Table_2" aria-label="Registered: activate to sort column ascending">Balance $</th>
                                                </tr>
                                            </thead>
                                            <tbody>  
                                           
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