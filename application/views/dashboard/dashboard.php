   <?php 

if($session_data['login_type'] == 'admin'){
    $edit_right="";
    $all_rights="";
    $view_right="";
 
    if(isset($rights)){
        $edit_right=$rights[0]['edit_right'];
        $all_rights=$rights[0]['all_rights'];
        $view_right=$rights[0]['view_right'];
      }
    ?>

<!------------------------------------------------ ADMIN DASHBOARD STARTS -------------------------------------->
 <style type="text/css">
     
     .border-info {
        border-color: #110d35!important;
    }
	 
 </style>
 <!-- Main Container -->

            <main id="main-container">
                <!-- Hero -->
                <div class="content content-narrow">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <h2 class="h4 font-w400 text-black-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome <?php echo $session_data['first_name'].' '.$session_data['last_name']?></h2>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content content-narrow">
                    <!-- Stats -->
                    <div class="row">
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-info border-4x" href="<?php echo base_url()?>manage-users">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Users</div>
                                    <div class="font-size-h2 font-w400 text-dark"><?php echo $count_userS;?></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-info border-4x" href="<?php echo base_url()?>view-plans">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Plans </div>
                                    <div class="font-size-h2 font-w400 text-dark"><?php echo $count_Plans;?></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-info border-4x" href="<?php echo base_url()?>application-review">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Application</div>
                                    <div class="font-size-h2 font-w400 text-dark"><?php echo $count_Application;?></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                            <a class="block block-rounded block-link-pop border-left border-info border-4x" href="<?php echo base_url()?>application-review">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Pending Applications</div>
                                    <div class="font-size-h2 font-w400 text-dark"><?php echo $count_pendingApplication;?></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->
        <?php if($this->session->userdata('s_admin')=='1' || $edit_right=='1' || $all_rights=='1' || $view_right=='1'){?>
                       <div class="row">
                        <div class="col-xl-12">
                            <!-- Default Table -->
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title">Applications</h3>
                                    <div class="block-options">
                                        <div class="block-options-item">
                                        </div>
                                    </div>
                                </div>

                                <div class="block-content">
                                    <!-- <table class="table table-vcenter"> -->
                                <div class="block-content block-content-full">
                                <table id="table_bid_msg" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 10%;">S.No</th>
                                                <th style="width: 25%;">Applicant Name</th>
                                                <th style="width: 15%;">Applied Date</th>
                                                <th style="width: 20%;">Email</th>
                                                <th style="width: 20%;">Plan Name</th>
                                                <th style="width: 10%;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                <?php  if ($user_application != '')
                                    {   
                                        $count =1;
                                        foreach($user_application as $user_application_data) 
                                            {  ?>
                                            <tr>
                                                <th class="text-center" scope="row"><?php echo $count++;?></th>
                                                <td class="font-w600 font-size-sm">
                                                    <a class="text-muted text-capitalize" href="#"><?php echo $user_application_data['user_application_first_name'].' '.$user_application_data['user_application_last_name']?></a>
                                                </td>
                                                <td class="font-w600 font-size-sm">
                                                    <?php 
                                                        $convertDate= date('m/d/Y', strtotime($user_application_data['user_application_posted_date']));
                                                                echo $convertDate;
                                                        ?>
                                                </td>
                                                <td class="font-w600 font-size-sm">
                                                    <?php echo $user_application_data['user_application_email']?>
                                                </td>
                                                <td class="font-w600 font-size-sm">
                                                    <?php echo $user_application_data['user_application_plan_name']?>
                                                </td>
                                            
                                                <td class="text-center">
                                                    <?php 

                                                        if($user_application_data['user_application_offer_sent'] == '1' && $user_application_data['user_application_plan_confirmation'] == ''){

                                                            ?>
                                                            <a  style="color: #fff;" class="badge badge-success" href="<?php echo base_url();?>view-user-application/<?php echo base64_encode($user_application_data['u_id']).'/'.base64_encode($user_application_data['user_application_plan_id']);?>">Waiting User</a>

                                                        <?php } else if ($user_application_data['user_application_plan_confirmation'] == '1') { ?>

                                                            <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>view-user-application/<?php echo base64_encode($user_application_data['u_id']).'/'.base64_encode($user_application_data['user_application_plan_id']);?>">Accepted</a>
                                                        <?php }
                                                        else if ($user_application_data['user_application_plan_confirmation'] == '0'){ ?>

                                                            <a  style="color: #fff;" class="badge badge-danger" href="<?php echo base_url();?>view-user-application/<?php echo base64_encode($user_application_data['u_id']).'/'.base64_encode($user_application_data['user_application_plan_id']);?>">Rejected</a>

                                                        <?php }else {?>
                                                            <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>review-application/<?php echo $user_application_data['u_id'].'/'.$user_application_data['user_application_plan_id'];?>">Pending</a>
                                                       <?php  } ?>
                                                </td>
                                            </tr>
                                        <?php }}?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            <!-- END Default Table -->
                        </div>
                    </div>
                <?php } ?>

                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

<!------------------------------------------------ ADMIN DASHBOARD ENDS  ------------------------------------------------------------>

<?php } else if($session_data['login_type'] == 'user'){ 

    // echo '<pre>';
    // print_r($statusArry);
    // echo '</pre>';
    // die();
    ?>


<!------------------------------------------------ USER DASHBOARD STARTS -------------------------------------->

<!-- <?php 

echo date('Y-m-d H:i:s');
// die();

?> -->


<style type="text/css">
    
.pricing-table-title {
    text-transform: uppercase;
    font-weight: 700;
    font-size: 2.6em;
    color: #FFF;
    margin-top: 15px;
    text-align: left;
    margin-bottom: 25px;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}

.pricing-table-title a {
    font-size: 0.6em;
}

.clearfix:after {
    content: '';
    display: block;
    height: 0;
    width: 0;
    clear: both;
}
/** ========================
 * Contenedor
 ============================*/
.pricing-wrapper {
        /* width: 249px !important; */
    margin: 20px 3px 20px;
}
a.pricing-action.change_color_4.class_color_btn_4 {
    background: #d4d729;
}
a.pricing-action.change_color_1.class_color_btn_1 {
    background: #39577d;
}
.pricing-table {
    margin: 0 10px;
    text-align: center;
    width: 96%;
    float: left;
    -webkit-box-shadow: 0 0 15px rgba(0,0,0,0.4);
    box-shadow: 0 0 15px rgba(0,0,0,0.4);
    -webkit-transition: all 0.25s ease;
    -o-transition: all 0.25s ease;
    transition: all 0.25s ease;background: white;
}

.pricing-table:hover div {
  outline:none; border:0px;
}
.pricing-table:hover {
    -webkit-transform: scale(1.06);
    -ms-transform: scale(1.06);
    -o-transform: scale(1.06);
    transform: scale(1.06);
}
.red .pricing-title {
    color: #FFF;
    background: #e93c48;
    } 
    .pricing-table.recommended .price {
    background: #2f9ecf !important;
    border: 0; outline:none;
}
.pricing-table.recommended .price:after {
    border-top: 35px solid #2f9ecf;
    }
    .pricing-table.red .price:after {
    border-top: 35px solid #2ca100 !important;
    }
/*.pricing-table .price {
    background: #2da002 !important;
    }*/
    .pricing-table.red .price {
    background: #e93c48 !important;
    }
     
     
.pricing-title {
     
       color: #FFF;
    background: #d4d729;
    padding: 8px 0 0px 0;
    font-size: 20px;
    font-size: 20px; margin:0px;
    text-transform: uppercase;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}

.pricing-table.recommended .pricing-title {
    background: #2f9ecf;
}

.pricing-table.recommended .pricing-action {
    background: #2f9ecf;
}

.pricing-table .price { 
     background: #d4d729;
    position: relative;
    font-size: 27px;
    font-weight: 700;
    font-family: 'Lato', sans-serif;
    padding: 0px 0;
    color: #ffffff;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
    margin-bottom: 9px;    margin-top: -1px;
}
ul.table-list li {
    list-style: none;font-family: 'Lato', sans-serif;
}

.pricing-table .price sup {
    font-size: 0.4em;
    position: relative;
    left: 5px;
}

.table-list {
    background: #FFF;
    color: #403d3a;margin: 0;
    padding: 0;
}
 
.table-list li { 
        font-size: 15px;
    font-weight: 400;
    font-family: 'Lato', sans-serif;
    list-style: none;
    padding: 8px 15px;
}

.table-list li:before {
    content: "\f00c";
    font-family: 'FontAwesome';
    color: #2f9ecf;
    display: inline-block;
    position: relative;
    right: 5px;
    font-size: 16px;
} 

.table-list li span {
    font-weight: 400;
}

.table-list li span.unlimited {
    color: #FFF;
    background: #e95846;
    font-size: 0.9em;
    padding: 5px 7px;
    display: inline-block;
    -webkit-border-radius: 38px;
    -moz-border-radius: 38px;
    border-radius: 38px;
}


.table-list li:nth-child(2n) {
    background: #F0F0F0;
}

.table-buy {
    background: #FFF;
    padding: 15px;
    text-align: center;
    overflow: hidden;
}

.table-buy p {
    float: left;
    color: #37353a;
    font-weight: 700;
    font-size: 2.4em;
}

.table-buy p sup {
    font-size: 0.5em;
    position: relative;
    left: 5px; 
}
.color_class_price_1.price, h3.pricing-title.change_color_1 {
    background: #39577d !important;
}
.color_class_price_1.price:after
{
	border-top: 15px solid #39577d !important;
    
}
#base {
      background: red;
      display: inline-block;
      height: 55px;
      margin-left: 20px;
      margin-top: 55px;
      position: relative;
      width: 100px;
    }
    .price:after {
     border-top: 15px solid #d4d729;
    border-left: 121px solid transparent;
    border-right: 121px solid transparent;
      content: "";
      height: 0;
      left: 0;
      position: absolute;
      bottom: -14px;
      width: 0;
    }

.red .table-buy .pricing-action {
       float: none;
    color: #FFF;
    background: #e95846; 
    }
.table-buy .pricing-action {
       float: none;
    color: #FFF;
    background: #2da002; 
    padding: 6px 16px;
    -webkit-border-radius: 2px;
    font-family: 'Lato', sans-serif;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-weight: 400;
    font-size: 16px;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
    -webkit-transition: all 0.25s ease;
    -o-transition: all 0.25s ease;
    transition: all 0.25s ease;
    margin: 0px auto;
    width: 123px; 
}

.table-buy .pricing-action:hover {
    background: #cf4f3e;
}

.recommended .table-buy .pricing-action:hover {
    background: #2f9ecf;    
}
.pricing-wrapper { 
        min-width:250px; 
    }
/** ================
 * Responsive
 ===================*/
 @media only screen and (min-width: 768px) and (max-width: 959px) {
    .pricing-wrapper {
         
    }
	

    .pricing-table {
        width: 236px;
    }
    
    .table-list li {
        font-size: 1.3em; 
    }

 }
 @media only screen and (max-width: 767px) and (min-width: 650px) {
	 .color_class_price_3:after, .price:after, .color_class_price_2:after { 
    border-left: 110vh solid transparent  !important;
    border-right: 110vh solid transparent !important;
	 }
 }
 @media only screen and (max-width: 650px) and (min-width: 550px) {
	 .color_class_price_3:after, .price:after, .color_class_price_2:after { 
    border-left: 90vh solid transparent  !important;
    border-right: 90vh solid transparent !important;
	 }
 }
 @media only screen and (max-width: 550px) and (min-width: 500px) {
	 .color_class_price_3:after, .price:after, .color_class_price_2:after { 
    border-left: 80vh solid transparent  !important;
    border-right: 80vh solid transparent !important;
	 }
 }
 @media only screen and (max-width: 500px) and (min-width: 450px) {
	 .color_class_price_3:after, .price:after, .color_class_price_2:after { 
    border-left: 78vh solid transparent  !important;
    border-right: 78vh solid transparent !important;
	 }
	 .pricing-table {
    overflow: hidden;
}
 }
 @media only screen and (max-width: 450px) and (min-width: 380px) {
	 .color_class_price_3:after, .price:after, .color_class_price_2:after { 
    border-left: 180px solid transparent  !important;
    border-right: 180px solid transparent !important;
	 }
	 .pricing-table {
    overflow: hidden;
}
 }
 @media only screen and (max-width: 380px)  {
	 .color_class_price_3:after, .price:after, .color_class_price_2:after { 
    border-left: 150px solid transparent  !important;
    border-right: 150px solid transparent !important;
	 }
	 .pricing-table {
    overflow: hidden;
}
 }
 @media only screen and (max-width: 767px) {
	 
	 .mobile-on
	 {
		 display:block !important;
	 }
	 .mobile-off
	 {
		 display:none !important;
	 }
    body .pricing-wrapper {
         
    }

    .pricing-table {
        display: block;
        float: none;
        margin: 0 0 20px 0;
        width: 100%;
    }
 }

@media only screen and (max-width: 479px) {
    .pricing-wrapper {
         
    }
} 



.pricing-table .price{
    background: #d4d729;
}



<?php 

for ($j=2; $j<=10; $j+=3){

?>
.change_color_<?php echo $j;?> {
     background: #e60f1f!important;



}
.color_class_price_<?php echo $j;?>:after {
    border-top: 15px solid #e60f1f;
    border-left: 121px solid transparent;
    border-right: 121px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -14px;
    width: 0;
}

.color_class_price_<?php echo $j;?>{
    background: #e60f1f !important;
    }

.class_color_btn_<?php echo $j;?>{
    background:#e60f1f !important;

}
.color_unlimited_<?php echo $j;?>{
        background: #e60f1f !important;

}
.color_unlimited_1
{
    background: #2da002!important;
}
.color_unlimited_4
{
    background: #2da002!important;
}
<?php } ?>

<?php 

for ($j=3; $j<=10; $j+=3){

?>
.change_color_<?php echo $j;?> {
     background: #2ca100!important;



}
.color_class_price_<?php echo $j;?>:after {
    border-top: 15px solid #2ca100 !important;
    border-left: 121px solid transparent;
    border-right: 121px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -14px;
    width: 0;
}

.color_class_price_<?php echo $j;?>{
    background: #2ca100 !important;
    }

.class_color_btn_<?php echo $j;?>{
    background: #2ca100 !important;

}
.color_unlimited_<?php echo $j;?>{
        background: #2ca100 !important;

}
<?php } ?>
    </style>
 <!-- Main Container -->
 <div>
            <main id="main-container">
                <!-- Hero -->
                <div class="content content-full">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h1 style="margin-left: 11px;" class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <h2 style="margin-left: 11px;" class="h4 font-w400 text-black-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome <?php echo $session_data['first_name'].' '.$session_data['last_name']?></h2>
                </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class=" block-content">
                     <div class="row " >
                        <div class="col-xl-12">
                            <!-- Default Table -->
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title">My Plans</h3>
                                      <!-- <button class="btn" onclick="send_statement();">statements</button> -->

                                    <div class="block-options">
                                        <div class="block-options-item">
                                        </div>
                                    </div>
                                </div>

                                <div class="block-content">
                                    <!-- <table class="table table-vcenter" id="table_bid_msg"> -->
                                <div class="block-content block-content-full">
                                <table id="table_bid_msg" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 50px;">#</th>
                                                <th>Plan Name </th>
                                                <th>Bidding Start Amount</th>
                                                <th>Bidding Start Date </th>
                                                <th style="width: 15%;">Status</th>
                                                <th class="text-center" style="width: 100px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php $plan_name_array=array();

                                     if ($enrolled_plans != '')
                                                {   
                                                    $count ='1';
                                    

                                                    foreach($enrolled_plans as $enrolled_plans_data) 
                                                        {  
                                                            array_push($plan_name_array,
                                                                 $enrolled_plans_data['id']);                          
                                                    $counter = $count++;
                                                ?>
                                                    <tr>

                                                        <th class="text-center" scope="row"><?php echo $counter;?></th>
                                                        <td class="font-w600 font-size-sm">
                                                            <?php echo $enrolled_plans_data['plan_name'];?>
                                                        </td>
                                                        <td class="font-w600 font-size-sm">
                                                            <a class="text-muted" href="#">$<?php echo number_format($enrolled_plans_data['bidding_start_amount'],2);?></a>
                                                        </td>
                                                        <td class="font-w600 font-size-sm">
                                                            <?php $biddingStartDate= date('m/d/Y',strtotime($enrolled_plans_data['bidding_start_date'])); echo $biddingStartDate?>

                                                        </td>
                                                        <td>
                                                            <span class="">
                                                            <?php 
                                                            if($enrolled_plans_data['plan_status'] =='2')
                                                            {
                                                                echo 'Active';
                                                            }
                                                            else
                                                            {
                                                                echo 'Inactive';
                                                            }
                                                            ?>
                                                            </span>
                                                        </td>
                                                        <input type="hidden" name="encoded_plan_id_<?php echo $enrolled_plans_data['id']?>"  id="encoded_plan_id_<?php echo $enrolled_plans_data['id']?>"  value="<?php echo base64_encode($enrolled_plans_data['id']);?>">

                                                        <td class="text-center plan_id_<?php echo $enrolled_plans_data['id']?>" id="bidding_over" >
                                                            


                                                        <?php 

                                                            error_reporting(0);
                                                            foreach ($statusArry as $key => $value) {
                                                                $string = preg_replace('/\s+/', '', $value[$enrolled_plans_data['id']]);
                                                                // die();
                                                                // echo 'Restricted_'.$rest;
                                                                if($value[$enrolled_plans_data['id']] == 'Winner Name')
                                                                { ?>

                                                                    <span class=" badge badge-info"><a style="color: #fff;" href="<?php echo base_url()?>transactions/<?php echo base64_encode($enrolled_plans_data['id']);?>">Winner</a></span>

                                                                <?php }


                                                                else if ($string == 'BidNow')
                                                                { ?>

                                                                    <a href="<?php echo base_url();?>bidding/<?php echo $session_data['id']?>/<?php echo $enrolled_plans_data['id']?> "><span class="blink badge badge-success">Bid Now</span></a>
                                                                <?php } 
                                                                else if ($string == 'Restricted-Date')
                                                                { ?>
                                                                    <a href="<?php echo base_url();?>transactions/<?php echo base64_encode($enrolled_plans_data['id'])?> "><span class=" badge badge-success">Plan Completed</span></a>
                                                                <?php }  
                                                                else if ($string == 'Restricted')
                                                                { 
                                                                    ?>
                                                                    <a href="<?php echo base_url();?>bidding/<?php echo $session_data['id']?>/<?php echo $enrolled_plans_data['id']?>"><span class=" badge badge-success">Restricted By Cycle</span></a>
                                                                <?php }
                                                                else if ($string == 'LowBid')
                                                                { ?>
                                                                    <a href="<?php echo base_url();?>bidding/<?php echo $session_data['id']?>/<?php echo $enrolled_plans_data['id']?> "><span class="blink badge badge-success">Lowest Bid</span></a>
                                                                <?php }  
                                                                else if ($string == 'OutBid')
                                                                { ?>
                                                                    <a href="<?php echo base_url();?>bidding/<?php echo $session_data['id']?>/<?php echo $enrolled_plans_data['id']?> "><span class="blink badge badge-success">Out Bid</span></a>
                                                                <?php } 
                                                                else
                                                                {   $firstWord=str_word_count($string, 1)[0];
                                                                     if($firstWord=='Restrictedupto'){?>
                                                                     <a href="<?php echo base_url();?>bidding/<?php echo $session_data['id']?>/<?php echo $enrolled_plans_data['id']?>"><span class="blink badge badge-success"><?php echo $value[$enrolled_plans_data['id']];?></span></a>
                                                                     <?php } else if($firstWord=='NextCycle'){ ?>
                                                                               <a style="cursor:pointer;"><span class="blink badge badge-success"><?php echo $value[$enrolled_plans_data['id']];?></span></a>
                                                                     <?php }else {?>
                                                                          <a  style="color: #fff;" href="<?php echo base_url()?>transactions/<?php echo base64_encode($enrolled_plans_data['id']);?>"><span class="badge badge-info"><?php echo $value[$enrolled_plans_data['id']];?></span></a>
                                                                     <?php }
                                                                    ?>

                                                                    <!-- // echo $value[$enrolled_plans_data['id']]; -->

                                                                 
                                                                <?php }
                                                            }
 
                                                        
                                                            
                                                            ?> 
                                                            
                                                        </td>
                                                    </tr>
                                                    <?php } 
                                                }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                            <!-- END Default Table -->
                        </div>
                    </div>
                    <div class="block">
                     <div class="row">
                        <div class="col-md-12">
                            <!-- Tiles Slider 3 -->
                            <div class="block-header">
                                    <h3 class="block-title">Now Enrolling</h3>
                                    <div class="block-options">
                                        <div class="block-options-item">
                                        </div>
                                    </div>
                                </div>
								<!-- Desktop slider  -->
                                <div class="block-content mobile-off">
                            <div id="ajax_div" class="js-slider slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true" data-slides-to-show="4">
                                <?php  if ($available_plans != '')
                                    {   
                                        $count =0;
                                        foreach($available_plans as $plans_data) 
                                            {  $count++;

                                    ?>
                                                <div class="pricing-wrapper clearfix">
                                                    <!-- Titulo -->
                                                     
                                                    <div class="pricing-table color_class_pricing_title-<?php echo $count;?>">
                                                        <h3 class="pricing-title change_color_<?php echo $count;?>"><?php echo $plans_data['plan_name']?></h3>
                                                        <div class="color_class_price_<?php echo $count;?> price">$<?php echo number_format($plans_data['bidding_amount_per_memeber'],2);?><sup></sup></div>
                                                        <!-- Lista de Caracteristicas / Propiedades -->
                                                        <ul class="table-list">
                                                            <li>Enrollment Start Date
                                                            <span> 
                                                                <?php 
                                                                $convertDate= date('m/d/Y', strtotime($plans_data['enrollment_start_date']));
                                                                echo $convertDate;
                                                                ?>
                                                            </span></li>
                                                            <li>Enrollment Start Date 
                                                            <span>
                                                                <?php
                                                                $convertEnrolledEndDate= date('m/d/Y', strtotime($plans_data['enrollment_end_date']));
                                                                echo $convertEnrolledEndDate;
                                                                ?> 
                                                            </span></li>
                                                            <li>Bidding Start Date 
                                                            <span>
                                                                <?php 
                                                                $convertBiddingDate= date('m/d/Y', strtotime($plans_data['bidding_start_date']));
                                                                echo $convertBiddingDate;
                                                                ?>
                                                            </span>
                                                            </li>
                                                        
                                                            <li>Total No Of Applicants <span class="unlimited color_unlimited_<?php echo $count;?>"><?php echo $plans_data['total_no_appliactions']?> </span></li>
                                                           <!--  <li>
                                                                <a style="background-color: #e95846!important;" class="btn" href="<?php echo base_url();?>plan-description/<?php echo base64_encode($plans_data['id']);?>"><span class="custom_white"> View Info </span></a>
                                                            </li> -->

                                                        </ul>
                                                        <!-- Contratar / Comprar -->
                                                        <div class="table-buy">
                                                            <!-- <p>$<?php echo $plans_data['bidding_start_amount']?><sup></sup></p> -->
                                                            <a href="<?php echo base_url();?>plan-description/<?php echo base64_encode($plans_data['id']);?>" class="pricing-action change_color_<?php echo $count;?> class_color_btn_<?php echo $count;?>">Enroll Now</a>
                                                        </div>
                                                    </div>
                                                </div>  
                                <?php       }
                                    } ?>                             

                            </div>
                        </div>
						<!-- Desktop slider  End -->
						<!-- Mobile slider  -->
                                <div class="block-content mobile-on" style="display:none;">
                            <div id="ajax_div" class="js-slider slick-nav-hover" data-dots="true" data-autoplay="true" data-arrows="true" data-slides-to-show="1">
                                <?php  if ($available_plans != '')
                                    {   
                                        $count =0;
                                        foreach($available_plans as $plans_data) 
                                            {  $count++;

                                    ?>
                                                <div class="pricing-wrapper clearfix">
                                                    <!-- Titulo -->
                                                     
                                                    <div class="pricing-table color_class_pricing_title-<?php echo $count;?>">
                                                        <h3 class="pricing-title change_color_<?php echo $count;?>"><?php echo $plans_data['plan_name']?></h3>
                                                        <div class="color_class_price_<?php echo $count;?> price">$<?php echo number_format($plans_data['bidding_amount_per_memeber'],2);?><sup></sup></div>
                                                        <!-- Lista de Caracteristicas / Propiedades -->
                                                        <ul class="table-list">
                                                            <li>Enrollment Start Date
                                                            <span> 
                                                                <?php 
                                                                $convertDate= date('m/d/Y', strtotime($plans_data['enrollment_start_date']));
                                                                echo $convertDate;
                                                                ?>
                                                            </span></li>
                                                            <li>Enrollment Start Date 
                                                            <span>
                                                                <?php
                                                                $convertEnrolledEndDate= date('m/d/Y', strtotime($plans_data['enrollment_end_date']));
                                                                echo $convertEnrolledEndDate;
                                                                ?> 
                                                            </span></li>
                                                            <li>Bidding Start Date 
                                                            <span>
                                                                <?php 
                                                                $convertBiddingDate= date('m/d/Y', strtotime($plans_data['bidding_start_date']));
                                                                echo $convertBiddingDate;
                                                                ?>
                                                            </span>
                                                            </li>
                                                        
                                                            <li>Total No Of Applicants <span class="unlimited color_unlimited_<?php echo $count;?>"><?php echo $plans_data['total_no_appliactions']?> </span></li>
                                                           <!--  <li>
                                                                <a style="background-color: #e95846!important;" class="btn" href="<?php echo base_url();?>plan-description/<?php echo base64_encode($plans_data['id']);?>"><span class="custom_white"> View Info </span></a>
                                                            </li> -->

                                                        </ul>
                                                        <!-- Contratar / Comprar -->
                                                        <div class="table-buy">
                                                            <!-- <p>$<?php echo $plans_data['bidding_start_amount']?><sup></sup></p> -->
                                                            <a href="<?php echo base_url();?>plan-description/<?php echo base64_encode($plans_data['id']);?>" class="pricing-action change_color_<?php echo $count;?> class_color_btn_<?php echo $count;?>">Enroll Now</a>
                                                        </div>
                                                    </div>
                                                </div>  
                                <?php       }
                                    } ?>                             

                            </div>
                        </div>
						<!-- Mobile slider  End -->

                            <!-- END Tiles Slider 3 -->

                        </div>

                    </div>
                </div>
                </div>

                    <!-- END Content Sliders -->

                </div>

                <!-- END Page Content -->



                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

<!------------------------------------------------ USER DASHBOARD ENDS  ------------------------------------------------------------>

<script>

    window.setInterval(function(){
      getBiddingStatus();
    },3000);

    function getBiddingStatus(){
        var plan_ids_array='<?php echo json_encode($plan_name_array)?>';
        // alert(plan_ids_array);
        if(plan_ids_array){
        $.ajax({
            url:'<?php echo base_url()?>Authentication/getLiveBiddingStatus',
            type:"POST",
            cache:false,
            data:{'plan_ids_array':plan_ids_array},
            success:function(response){
                  if(response!=''){

                    var statusArray=JSON.parse(response);

                    $.each(statusArray,function(index,data){
                        // console.log(index);
                        // console.log(value);
                         $.each(data, function (plan_id, data) {
                         // console.log(plan_id, data);
                         var statusFirstWord = data.replace(/ .*/, '');

                         var statusFirstTwoWords=data.split(' ').slice(0,2).join('-');

                         console.log(statusFirstWord);
                         console.log(statusFirstTwoWords);

                         var encoded_plan_id=$('#encoded_plan_id_'+plan_id).val();

                         if(data=="Winner Name"){
                            var link='<span class="badge badge-info"><a style="color: #fff;" href="<?php echo base_url()?>transactions/'+encoded_plan_id+'">Winner</a></span>';

                         }else if(data=="Out Bid"){
                            var link='<a href="<?php echo base_url();?>bidding/<?php echo $session_data['id']?>/'+plan_id+'"><span class="blink badge badge-success">Out Bid</span></a>';

                         }else if(data=="Low Bid"){

                            var link='<a href="<?php echo base_url();?>bidding/<?php echo $session_data['id']?>/'+plan_id+'"><span class="blink badge badge-success">Lowest Bid</span></a>'

                         }else if(data=="Bid Now"){

                          var link = '<a href="<?php echo base_url();?>bidding/<?php echo $session_data['id']?>/'+plan_id+'"><span class="blink badge badge-success">Bid Now</span></a>';
                         }
                         else if(data=="Restricted-Date"){
                            var link = '<a href="<?php echo base_url()?>transactions/'+encoded_plan_id+'"><span class=" badge badge-success">Plan Completed</span></a>';
                         }else if(statusFirstWord=="Next"){

                            var link= '<a style="cursor:pointer;"><span class="blink badge badge-success">'+data+'</span></a>'

                         }else if(statusFirstWord=="Winner-"){
                            var link='<span class="badge badge-info"><a style="color: #fff;" href="<?php echo base_url()?>transactions/'+encoded_plan_id+'">'+data+'</a></span>';

                         }else if(statusFirstTwoWords=="Bidding-Starts"){
                              var link='<a  style="color: #fff;" href="<?php echo base_url()?>transactions/'+encoded_plan_id+'"><span class="badge badge-info">'+data+'</span></a';

                         }else if(statusFirstTwoWords="Restricted-upto"){
                              var link='<a href="<?php echo base_url();?>bidding/<?php echo $session_data['id']?>/'+plan_id+'"><span class="blink badge badge-success">'+data+'</span></a>'
                         }

                        $('.plan_id_'+plan_id).html(link);
                        });

                    });

                  }
            }
        });
    }
        
    }

</script>

<?php }?>

<script type="text/javascript">
    function blink_text() {
    $('.blink').fadeOut(500);
    $('.blink').fadeIn(500);
}
setInterval(blink_text, 1000);

    function send_statement()
    {
        $.ajax({
              type: 'POST',
              url: '<?php echo base_url()."User/send_statements";?>',
              success: function(response){

                var data = JSON.parse(response);
         

                if(response!='')
                {     
                  
                }
                
              }
            });
    }

    
</script>           

     