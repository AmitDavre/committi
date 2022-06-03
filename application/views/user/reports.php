<!-- Main Container -->
            <main id="main-container">

                  <!-- Hero -->

                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" >Reports</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content content">

                   <div class="block">
                    <p id="alert_message_trans_desc"></p>
                    <p id="alert_message_trans_desc_error"></p>
                    <p id="alert_message_trans_desc_del"></p>
                        <div class="block-content">
                            <h1 class="content-heading">Reports</h1>
                        <!--     <ul class="nav nav-tabs nav-tabs-block " data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#btabs-animated-fade-home">Reports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#btabs-animated-fade-plans">View Description</a>
                                </li>
                           </ul>-->
                            <div class="block-content tab-content overflow-hidden">
                        <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-themed">
                                <div class="block-header bg-primary-dark">
                                    <h3 class="block-title">Account Activity</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-target="#modal-block-account-activity-report" data-toggle="modal">
                                            <i class="far fa-file-pdf"></i>
                                         </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-themed">
                                <div class="block-header bg-primary-darker">
                                    <h3 class="block-title">Statement Outstanding</h3>
                                    <div class="block-options">
                                        <form  action="<?php echo base_url()?>Report/generateStatementOutstandingReport" method="POST" enctype="multipart/form-data">
                                            <button class="btn-block-option"  formtarget="_blank"  id="statement_generate_buttons" name="statement_generate_buttons" type="submit"> <i class="far fa-file-pdf" ></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p></p>
                                </div>
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
 </main>
 <!-- END Main Container -->
                    <!-- Pop Out Block Modal -->
                    <div class="modal fade" id="modal-block-account-activity-report" tabindex="-1" role="dialog" aria-labelledby="modal-block-popout" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent mb-0">
                                    <div class="block-header bg-primary-dark">
                                        <h3 class="block-title">Account Activity Report</h3>
                                        <div class="block-options">
                                            <button type="button" id="close_cross" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-fw fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content font-size-sm">
                                        <form  action="<?php echo base_url()?>Report/generateAccountActivityReport" method="POST" enctype="multipart/form-data">
                                            <div class="row" >
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">From Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="fromDateActivityReport" name="fromDateActivityReport"  value="" style="margin-bottom: 10px;" placeholder="Enter start date " required="required">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="one-profile-edit-name">To Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="toDateActivityReport" name="toDateActivityReport"  value="" style="margin-bottom: 10px;" placeholder="Enter end date" required="required">
                                                </div>
                                                  <div class="col-md-6">
                                                    <label for="one-profile-edit-name">Plan List</label>
                                                    <select class='form-control' id='planListActivityReport' name='planListActivityReport' required="required">
                                                      <option value=''>Select Plan</option>
                                                      <?php if($plan_list){
                                                        foreach($plan_list as $plan){ ?>
                                                          <option value="<?php echo $plan['id']?>"><?php echo $plan['plan_name'] ?></option>

                                                        <?php }
                                                      } ?>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="block-content block-content-full text-right border-top">
                                        <button class="btn btn-sm btn-info"  formtarget="_blank"  id="statement_generate_buttons" name="statement_generate_buttons" type="submit"><i class="fa fa-check mr-1" onclick="closeModal();"></i>Submit</button>

                                    </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Pop Out Block Modal -->

 <script type="text/javascript">
   function closeModal()
   {
    $('#close_cross').click();
   }
 </script>


