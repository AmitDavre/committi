
<!-- Main Container -->
<style>
    .h2{
    font-size: 1.3rem!important;
}
  .h3{
    font-size: 1rem!important;
}
.font-size-lg {
    font-size: 0.8rem !important;
    }
</style>
<main id="main-container">
      <!-- Hero -->
        <div class="content ">
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item">Plan Description</li>
                    </ol>
                </nav>
                <!--  <div class="text-right">
                      <a class="btn btn-rounded btn-info px-4 py-2 invisible" data-toggle="appear" data-class="animated zoomIn" href="<?php echo base_url(); ?>user-form/<?php echo base64_encode($plan_details['id']);?>">Enroll In The Plan</a>
                  </div> -->

        </div>

    <!-- END Hero -->
    <!-- Hero Content -->
   <!--              <div class="bg-image" style="background-image: url('<?php echo base_url(); ?>assets/img/slider2.jpg');">
                        <div class="content content-full overflow-hidden">
                            <div class="mt-7 mb-5 text-center">
                                <h3 class="h2 text-dark mb-2 invisible text-center" data-toggle="appear" data-class="animated fadeInDown">Dashboard / Plan Description</h3>

                                <a class="btn btn-rounded btn-info px-4 py-2 invisible" data-toggle="appear" data-class="animated zoomIn" href="<?php echo base_url(); ?>user-form/<?php echo base64_encode($plan_details['id']);?>">Click Here To Enroll In The Plan</a>
                            </div>
                    </div>
                </div> -->
                <!-- END Hero Content -->








    <!-- Page Content -->
                <div class="content content-full">
                 <div class="block">
                    <div class="bg-white">

                    <div class="bg-white-op py-2">
                        <div class="content content-full content-boxed text-center">
                               <div class="text-right pt-2 mb-3">
                         <a class="btn btn-rounded btn-info px-4 py-2 invisible" data-toggle="appear" data-class="animated zoomIn" href="<?php echo base_url(); ?>user-form/<?php echo base64_encode($plan_details['id']);?>">Enroll In The Plan</a>
                         </div>

                            <h2 class="h2 text-dark mb-2 js-appear-enabled animated fadeInDown" data-toggle="appear" data-offset="50" data-class="animated fadeInDown">Plan Name : <?php echo $plan_details['plan_name']?></h2>
                            <h3 class="h3 text-dark-75 js-appear-enabled animated fadeInDown" data-toggle="appear" data-timeout="300" data-class="animated fadeInDown">Plan Description <br><p class="font-size-lg "><?php echo $plan_details['plan_description']?></p></h3>
                            <div class="row items-push mt-5">
                                <div class="col-md-3 js-appear-enabled animated fadeInRight" data-toggle="appear" data-offset="-150" data-timeout="150" data-class="animated fadeInRight">
                                     <i class="fa fa-2x fa-fw fa-book mr-1"></i> 
                                    <div class="font-size-lg text-dark mt-3">Total No Of Applicants <br><?php echo $plan_details['total_no_appliactions']?></div>
                                </div>
                                <div class="col-md-3 js-appear-enabled animated zoomIn" data-toggle="appear" data-offset="-150" data-class="animated zoomIn">
                                  <i class="fa fa-2x fa-fw fa-clock mr-1"></i>
                                    <div class="font-size-lg text-dark mt-3"> Enrollment Start Date <br>
                                                    <?php 
                                                    $EnrollmentStartDate= date('m/d/Y H:i',strtotime($plan_details['enrollment_start_date']));

                                                    echo $EnrollmentStartDate;
                                                    ?></div>
                
                                </div>
                                   
                                <div class="col-md-3 js-appear-enabled animated fadeInLeft" data-toggle="appear" data-offset="-150" data-timeout="150" data-class="animated fadeInLeft">
                                    <!-- <img class="img-avatar img-avatar-thumb" src="assets/media/avatars/avatar3.jpg" alt=""> -->
                                     <i class="fa fa-2x fa-fw fa-clock mr-1"></i>
                                    <div class="font-size-lg text-dark mt-3">Enrollment End Date <br>
                                                    <?php 
                                                    $EnrollmentEndDate= date('m/d/Y H:i',strtotime($plan_details['enrollment_end_date']));
                                                    echo $EnrollmentEndDate; ?></div>
                                </div>

                                 <div class="col-md-3 js-appear-enabled animated fadeInLeft" data-toggle="appear" data-offset="-150" data-timeout="150" data-class="animated fadeInLeft">
                                     <i class="fa fa-2x fa-fw fa-calendar mr-1"></i>
                                    <div class="font-size-lg text-dark mt-3"> Bidding Start Date <br>
                                                    <?php 
                                                    $biddingStartDate= date('m/d/Y H:i',strtotime($plan_details['bidding_start_date']));
                                                    echo $biddingStartDate?></div>
                                </div>
                            </div>

                             <div class="row items-push mt-3">
                                <div class="col-md-3 js-appear-enabled animated fadeInRight" data-toggle="appear" data-offset="-150" data-timeout="150" data-class="animated fadeInRight">
                                    <i class="fa fa-2x fa-fw fa-calendar mr-1"></i>
                                    <div class="font-size-lg text-dark mt-3">Bidding Start Amount <br>$<?php echo number_format($plan_details['bidding_start_amount'],2);?></div>
                                </div>
                                <div class="col-md-3 js-appear-enabled animated zoomIn" data-toggle="appear" data-offset="-150" data-class="animated zoomIn">
                                  <i class="fa fa-2x fa-fw fa-calendar mr-1"></i> 
                                    <!-- <div class="font-size-lg text-dark mt-3"> Lowest Bidding Amount <br>$<?php echo number_format($plan_details['bidding_win_bid_amount'],2);?> <?php echo number_format($plan_details['bidding_min_threshold'],2)?>%</div> -->
                                    <div class="font-size-lg text-dark mt-3"> Lowest Bidding Amount <br><?php echo number_format($plan_details['bidding_min_threshold'],2)?>%</div>
                                </div>
                                  <div class="col-md-3 js-appear-enabled animated zoomIn" data-toggle="appear" data-offset="-150" data-class="animated zoomIn">
                                  <i class="fa fa-2x fa-fw fa-calendar mr-1"></i> 
                                    <div class="font-size-lg text-dark mt-3"> Maximum Bidding Discount <br>$<?php 

                                    $percentagebidmax = $plan_details['bidding_start_amount'] * ($plan_details['bidding_min_threshold']/100);

                                    $percentagebidmaxminus = $plan_details['bidding_start_amount']  - $percentagebidmax;
                                    echo number_format($percentagebidmaxminus,2);



                                    ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>


                <div class="bg-body-dark">
                    <div class="content content-full">
                        <div class="row">
                         <div class="col-xl-12">
                            <h4>Important Notes</h4>
                             <p><i class="far fa-hand-point-right"></i>&nbsp;&nbsp;If the enrollment is not fulfilled by the Enrollment End date, then the End date will be pushed out by 48 hours and the bidding date by another 48 hours until the enrollment is fulfilled. </p>
                             <p><i class="far fa-hand-point-right"></i>&nbsp;&nbsp;By enrolling in this plan, you are agreeing to all these plan specific conditions along with master <a class="text-info" href="<?php echo base_url()?>terms-conditions" style="color:blue!important;">terms and conditions</a></p>
                             <p><i class="far fa-hand-point-right"></i>&nbsp;&nbsp;APR on outstanding balance if not paid by due date.</p>
                         </div>
                    </div>
                    </div>
                </div>
                </div>
    <!-- END Page Content -->



   
</main>
<!-- END Main Container -->

