<?php 
$tier                           = $this->config->item('tier');
$bidding_cycle                  = $this->config->item('bidding_cycle');
$status                         = $this->config->item('status');
$no_of_bidding_cycle            = $this->config->item('no_of_bidding_cycle');
// if(empty($_SESSION['success'])){
//   echo $_SESSION['success'];
//   echo '1';
// }
// if(empty($_SESSION['error_no_space'])){
//   echo $_SESSION['error_no_space'];
//   echo '2';
// }
// if(empty($_SESSION['error_already_selected'])){
//   echo $_SESSION['error_already_selected'];
//   echo '3';
// }
print_r($_SESSION);
?>
<div>
<!-- Main Container -->
<style type="text/css">
.pricing-table-title {
    text-transform: uppercase;
    font-weight: 700;
    font-size:2.6em;
    color: #FFF;
    margin-top: 15px;
    text-align: left;
    margin-bottom: 25px;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
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
.pricing-table-title a {
    font-size: 0.6em;
}
a.block.block-link-shadow.block-themed.block-fx-shadow.text-center {
    margin-bottom: 0;
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
    width: 100%;
    margin: 40px auto 0;
}

.pricing-table {
    margin: 0 10px;
    text-align: center;
    width: 23%;
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
    background: #2ca100  !important;
    border: 0; outline:none;
}
.pricing-table.recommended .price:after {
    border-top: 35px solid #e60f1f;
    }
    .pricing-table.red .price:after {
    border-top: 35px solid #d4d729!important;
    }
/*.pricing-table .price {
    background: #2da002 !important;
    }*/
    .pricing-table.red .price {
    background: #d4d729!important;
    }
     
     
.pricing-title {
     
       color: #FFF;
    background: #e60f1f;
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
     background: #e60f1f;
    position: relative;
    font-size: 27px;
    font-weight: 700;
    font-family: 'Lato', sans-serif;
    padding: 0px 0;
    color: #ffffff;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
    margin-bottom: 13px;    margin-top: -1px;
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
    padding: 15px 6px;
    text-align: center;
    overflow: hidden;
    width: 50%;
    float: left;
}
.table-buy .pricing-action {
    font-size: 13px !important;
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
        border-top: 13px solid #e60f1f;
    border-left: 121px solid transparent;
    border-right: 121px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -13px;
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
    background: #e60f1f; 
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

/** ================
 * Responsive
 ===================*/
 @media only screen and (min-width: 768px) and (max-width: 959px) {
    .pricing-wrapper {
        width: 768px;
    }

    .pricing-table {
        width: 236px;
    }
    
    .table-list li {
        font-size: 1.3em;
    }

 }

 @media only screen and (max-width: 767px) {
    .pricing-wrapper {
        width: 420px;
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
        width: 300px;
    }
} 


.pricing-table .price{
    background: #e60f1f;
}



<?php 

for ($j=2; $j<=10; $j+=3){

?>
.change_color_<?php echo $j;?> {
     background: #2ca100  !important;



} 
 
h3.pricing-title.change_color_4, .color_class_price_4.price {
    background: #39577d!important;
}
.color_class_price_4.price:after {
    border-top: 13px solid #39577d;
}
.color_class_price_<?php echo $j;?>:after {
    border-top: 13px solid #2ca100;
    border-left: 121px solid transparent;
    border-right: 121px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -12px;
    width: 0;
}

.color_class_price_<?php echo $j;?>{
    background: #2ca100  !important;
    }

.class_color_btn_<?php echo $j;?>{
    background: #2ca100  !important;

}
.color_unlimited_<?php echo $j;?>{
        background: #2ca100  !important;

}
.color_unlimited_1
{
    background: #2da002!important;
}
.color_unlimited_4
{
    background: #2da002!important;
}
.change_btn_color_<?php echo $j;?>{
        background: #2da002 !important;

}
<?php } ?>

<?php 

for ($j=3; $j<=10; $j+=3){

?>
.change_color_<?php echo $j;?> {
     background: #d4d729!important;



}
.color_class_price_<?php echo $j;?>:after {
    border-top: 13px solid #d4d729!important;
    border-left: 121px solid transparent;
    border-right: 121px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -13px;
    width: 0;
}

.color_class_price_<?php echo $j;?>{
    background: #d4d729!important;
    }

.class_color_btn_<?php echo $j;?>{
    background: #d4d729!important;

}
.color_unlimited_<?php echo $j;?>{
        background: #d4d729!important;

}
.change_btn_color_<?php echo $j;?>{
        background: #d4d729!important;

}
<?php } ?>
    </style>

            <main id="main-container">

                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Now Enrolling</li>
                                </ol>
                            </nav>
                    </div>
                    <?php if($this->session->userdata('error_already_selected')) { ?>
                                <div  id="main_dialog_box1" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You have already enrolled for this plan. Please select another plan to continue.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog1();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
                            <?php }else if($this->session->userdata('success')){ ?>

                                    <div id="main_dialog_box2" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Application form submitted successfully </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog2();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> 
                            <?php } else if($this->session->userdata('error_no_space')) { ?>

                                <div  id="main_dialog_box3" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Please Select Another Plan.This Plan Has No More Space.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog3();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
                            <?php } ?>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content-full">

                    <!-- User Profile -->

                    <div class="block">
                        <div id='ajax_div_plan'></div>
                         

                        <div class="block-header">

                            <h3 class="block-title">Plan Details</h3>

                        </div>

                        <div class="block-content">

                            <div class="row">
                                <?php 
                                    if ($plans != '')
                                    {
                                        $count =0; 
                                        foreach($plans as $view_plans_data_array) 
                                            { 
                                                $count++;
                                        ?> 
                                                    <!-- Titulo -->
                                                     <a onclick="check_plan();" class="block block-link-shadow block-themed block-fx-shadow text-center" href="<?php base_url()?>user-form/<?php echo base64_encode($view_plans_data_array['id'])?>">
                                                    <div class="pricing-table  mb-5">
                                                        <h3 class="pricing-title change_color_<?php echo $count;?>"><?php echo $view_plans_data_array['plan_name']?></h3>
                                                        <div class="color_class_price_<?php echo $count;?> price">$<?php echo number_format($view_plans_data_array['bidding_amount_per_memeber'],2)?><sup></sup></div>
                                                        <!-- Lista de Caracteristicas / Propiedades -->
                                                        <ul class="table-list">
                                                            <li>Enrollment Start Date
                                                            <span> 
                                                                <?php 
                                                                $convertDate= date('m/d/Y', strtotime($view_plans_data_array['enrollment_start_date']));
                                                                echo $convertDate;
                                                                ?>
                                                            </span></li>
                                                             
                                                            <li>Enrollment Start Date 
                                                            <span>
                                                                <?php
                                                                $convertEnrolledEndDate= date('m/d/Y', strtotime($view_plans_data_array['enrollment_end_date']));
                                                                echo $convertEnrolledEndDate;
                                                                ?> 
                                                            </span></li>
                                                            <li>Bidding Start Date 
                                                            <span>
                                                                <?php 
                                                                $convertBiddingDate= date('m/d/Y', strtotime($view_plans_data_array['bidding_start_date']));
                                                                echo $convertBiddingDate;
                                                                ?>
                                                            </span>
                                                            </li>
                                                            <li>Total No Of Applicants <span class="unlimited color_unlimited_<?php echo $count;?>"><?php echo $view_plans_data_array['total_no_appliactions']?> </span></li>


                                                            <!-- <li><a style="color:black;" class=" change_btn_color_<?php echo $count;?>" href="<?php echo base_url();?>plan-description/<?php echo base64_encode($view_plans_data_array['id']);?>"><span class="custom_white"> View Info </span></a></li> -->

                                                        </ul>
                                                        <!-- Contratar / Comprar -->
                                                        <div class="table-buy">
                                                            
                                                            <a href="<?php base_url()?>user-form/<?php echo base64_encode($view_plans_data_array['id'])?>" class="class_color_btn_<?php echo $count;?> pricing-action change_color_<?php echo $count;?>">Enroll Now</a>
															<!-- <p>$<?php echo $view_plans_data_array['bidding_start_amount']?><sup></sup></p> -->
                                                        </div>
                                                        <div class="table-buy">
                                                            <a  class=" pricing-action change_color_<?php echo $count;?>" href="<?php echo base_url();?>plan-description/<?php echo base64_encode($view_plans_data_array['id']);?>"><span class="custom_white"> View Info </span></a>
                                                        </div>
                                                    </div> </a>
                                    <?php  } } ?>

                                </div> 

                            </div>

                        </div>

                    </div>

                    <!-- END User Profile -->

                </div>

                <!-- END Page Content -->

            </main>

            <!-- END Main Container -->
<script type="text/javascript">   
function close_dialog1()
{
    $('#main_dialog_box1').css('display','none');
    $.ajax({
        url:'<?php echo base_url()?>User/destroyAvailablePlansSession',
        type:'POST',
        susccess:function(){

        }
    });
}
function close_dialog2()
{
    $('#main_dialog_box2').css('display','none');
    $.ajax({
        url:'<?php echo base_url()?>User/destroyAvailablePlansSession',
        type:'POST',
        susccess:function(){

        }
    });
}
function close_dialog3()
{
    $('#main_dialog_box3').css('display','none');
    $.ajax({
        url:'<?php echo base_url()?>User/destroyAvailablePlansSession',
        type:'POST',
        susccess:function(){

        }
    });
}
</script>