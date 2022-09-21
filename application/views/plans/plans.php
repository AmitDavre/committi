 <?php 
$Province  = $this->config->item('Province');
?>

<?php
array_multisort(array_map(function($element) 
{
    return $element['plan_name_sequence_number'];
},  $plan_sequence_result), SORT_ASC, $plan_sequence_result);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Committi</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url();?>assets/css/styles.css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/magnific-popup/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
           <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick-theme.css">

    </head>
    <style type="text/css">
	header.masthead.short_banner {
    margin-top: 0;
    margin-bottom: 25px;
    padding: 198px 0px 65px 1px;  
    font-size: 12px;
    background-position: center left !important;
}
span.p-rc {
    margin-bottom: -10px;
    position: relative;
    float: left;
    width: 100%;
    z-index: 9;
}
section#services {
    padding-bottom: 0;
}footer.footer.py-4 {
    margin-top: -8px;
}
.fa-2x {
    font-size: 21px;
    float: left;
    margin-right: 11px;
    margin-top: 4px !important;
}
ul.list-unstyled.mb-0 li {
    float: left;
    width: 100%;
}
header.masthead.short_banner .masthead-heading {
    font-size: 30px;
    font-weight: 700;
    line-height: 70px;
    margin-bottom: 0rem;
    text-align: left;
}
 ul.list-unstyled.mb-0 .fas {
    font-size: 12px !important;
}
    	section#contact {
		  background-image: url("<?php echo base_url();?>assets/img/map-image.png")!important;
		}
		header.masthead {
		  background-image: url("<?php echo base_url();?>assets/img/slider2.jpg")!important;
		 
		}
		.masthead2 {
		  background-image: url("<?php echo base_url();?>assets/img/our-client.jpg")!important;
		}
    </style>
	  <style type="text/css">
		.view-p button#sendMessageButton {
    line-height: 11px;
    height: 38px;
    border-radius: 0;
    background: #f8f9fa;
    border: 0;
    font-size: 15px;
    padding: 19px 44px 0; 
    margin-top: 4px;
    color: #2e4665;
    text-transform: capitalize !important;
}
.view-p {
    text-align: center;
    padding: 14px 0px 0;
}
      
     

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
    width: 100%;
    margin: 0px auto 0;
}

.pricing-table {
   margin: 0 21px;
    text-align: center;
  /*  width: 21.4%;
    float: left;*/
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
    background: #e60f1f;
    } 
    .pricing-table.recommended .price {
    background: #2f9ecf !important;
    border: 0; outline:none;
}
.pricing-table.recommended .price:after {
    border-top: 35px solid #e60f1f;
    }
    .pricing-table.red .price:after {
    border-top: 35px solid #e93c48 !important;
    }
/*.pricing-table .price {
    background: #2da002 !important;
    }*/
    .pricing-table.red .price {
    background: #e93c48 !important;
    }
     
     
.pricing-title {
     
       color: #FFF;
    background: #e60f1f;
    padding: 8px 0 0px 0;
    font-size: 15px;
      margin:0px;
    text-transform: uppercase;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}

.pricing-table.recommended .pricing-title {
    background: #2f9ecf;
}

.pricing-table.recommended .pricing-action {
    background: #2f9ecf;
}
#portfolio h2.section-heading {
    font-size: 46px;
    margin-top: 0;
    margin-bottom: 21px;
    font-weight: 600;
}
.page-section h2.section-heading {
    font-size: 40px !important;
    margin-top: 0;
    margin-bottom: 59px;
    font-weight: 600;
}
.pricing-table .price { 
float: left;
    width: 100%;
     background: #403e3d;
    position: relative;line-height: 31px;
    font-size: 22px;
    font-weight: 700;
    font-family: 'Lato', sans-serif;
    padding: 0px 0;
    color: #ffffff;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
    margin-bottom: 27px;    margin-top: -1px;
}
ul.table-list li {
    font-size: 15px; 
    font-weight: 400;    font-family: 'Lato', sans-serif; list-style:none;
    padding: 10px 8px;
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
    font-size: 1rem;
    font-weight: 700;
    padding: 18px 8px;
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
    /*background: #e95846;*/
    background: #e60f20;
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
#base {
      background: red;
      display: inline-block;
      height: 55px;
      margin-left: 20px;
      margin-top: 55px;
      position: relative;
      width: 100px;
    }
.red .table-buy .pricing-action {
       float: none;
    color: #FFF;
    background: #e95846; 
    }
.table-buy .pricing-action {
    float: none;
    color: #FFF;
    /*background: #2da002; */
    background: #e60f20; 
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

.blue .color_class_pricing_title-3 {
    color: #FFF;
    background: #39577d!important;
} 
.blue .color_class_price_3 {
    background: #39577d!important;
}
.blue .color_class_price_3:after {
    border-top: 24px solid #39577d!important;
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
     .color_class_price_1:after {
       border-left: 197px solid transparent!important;
    border-right: 175px solid transparent!important; 
}
.color_class_price_2:after {
    border-left: 197px solid transparent!important;
    border-right: 175px solid transparent!important; 
}
.color_class_price_3:after {
   border-left: 197px solid transparent!important;
    border-right: 175px solid transparent!important; 
}

    .pricing-table {
        display: block;
        float: none;
        margin: 0 0 20px 0;
        width: 100%;
    }
     /*new added*/
     .mobile-on
     {
         display:block !important;
     }
     .mobile-off
     {
         display:none !important;
     }
 }
@media only screen and (max-width: 720px) {
    .pricing-wrapper {
        width: 300px;
    }
       .color_class_price_1:after {
       border-left: 280px solid transparent!important;
       border-right: 256px solid transparent!important; 
}
.color_class_price_2:after {
    border-left: 280px solid transparent!important;
    border-right:256px solid transparent!important; 
}
.color_class_price_3:after {
   border-left:280px solid transparent!important;
    border-right: 256px solid transparent!important; 
}
}
@media only screen and (max-width: 479px) {
    .pricing-wrapper {
        width: 300px;
    }
       .color_class_price_1:after {
       border-left: 197px solid transparent!important;
       border-right: 175px solid transparent!important; 
}
.color_class_price_2:after {
    border-left: 197px solid transparent!important;
    border-right: 175px solid transparent!important; 
}
.color_class_price_3:after {
   border-left: 197px solid transparent!important;
    border-right: 175px solid transparent!important; 
}
} 

 .color_class_price_1:after {border-top: 25px solid #e60f1f;
    border-left: 140px solid transparent;
    border-right: 140px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -24px;
    width: 0;
}
.color_class_price_2:after {
    border-top: 25px solid #2ca100;
    border-left: 140px solid transparent;
    border-right: 140px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -24px;
    width: 0;
}
.color_class_price_3:after {
    border-top: 25px solid #d4d729;
        border-left: 140px solid transparent;
    border-right: 140px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -24px;
    width: 0;
}
.color_class_pricing_title-2{
    color: #FFF;
    background: #2ca100!important;
    padding: 8px 0 0px 0;
    font-size: 15px; 
    margin: 0px;
    text-transform: uppercase;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}
.color_class_pricing_title-3{
    color: #FFF;
    background: #d4d729!important;
    padding: 8px 0 0px 0;
    font-size: 15px; 
    margin: 0px;
    text-transform: uppercase;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}
.color_class_price_2{
    background: #2ca100 !important;
    }
.color_class_price_3{
    background: #d4d729 !important;
    }
.color_class_price_1{
    background: #e60f1f !important;
    }
.color_class_price_3{
    background: #d4d729 !important;
    }

.class_color_btn_2{
        background: #2ca100 !important;

    }
.blue .class_color_btn_3 {
    background: #39577d !important;
}
.class_color_btn_3{
        background: #d4d729 !important;

    }
.class_color_btn_1{
        background: #e60f1f !important;

    }
    .class_color_btn_4{
        background: #39577d !important;

    }
    
.color_unlimited_2{
        background: #2f9ecf !important;

}
.color_unlimited_3{
        background: #e93c48 !important;

}
.serv .text-muted {
    color: #ffffff !important;
}
section.page-section.serv .content_head h1 {
    color: #ffffff;
}
section.page-section.serv .content_head p { 
    color: #e8e8e8;
}
section.page-section.serv {
    background: #120d35;
    padding-top: 69px !important;
    padding-bottom: 52px;
}
.serv h2.section-heading.text-uppercase, .serv h4.my-3 {
    color: #ffffff;
}
span.fm-icon {
    color: #ffffff;
       font-size: 31px;
    margin-top: -1px;
}
.liveBidding{
    font-family: "Source Sans Pro","Open Sans",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol"!important;
}
.filter-row
{
    background: red;
}
.nav-link
{
    color: white;
}
.nav-link:hover
{
    color: white;
    background: #120d35;
    width: 125px;
    text-align: center;
}
.filter-nav
{
    margin-left: 7rem!important;
}

/*plan color sec*/
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
   /* background: #2da002!important;*/
    background: #e60f20!important;
}
.color_unlimited_4
{
   /* background: #2da002!important;*/
    background: #39577d!important;
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
/*end plan color sec*/

</style>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/committi_logo.gif" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="home">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="ourplans">Our Plans</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="investing">Investing</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="contact">Contact Us</a></li>
						<li class="nav-item logine"><a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#exampleModal">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead short_banner">
            <div class="container"> 
                <div class="masthead-heading text-uppercase">Our Plans <span>Home / Plans</span></div>
				 
                
            </div>
        </header>
		 
		</div>
        <!-- Services-->
        
		<section class="page-section" id="services" style="padding-top:41px !important;  padding-bottom:71px;">
           <div class="row">
           <div class="container">
            <!-- filter sec -->
                <div class="row ml-4 filter-row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs nav-tabs-block js-tabs-enabled" data-toggle="tabs" role="tablist">
                            <a class="text-muted"></a>
                            
                            <?php foreach($plan_sequence_result as $row){
                            ?>
                            <li class="nav-item ml-5 filter-nav" onclick="funSeqNumber('<?php echo $row['plan_name_sequence_number']; ?>');">
                                <a class="text-muted"></a>
                                <a class="nav-link" ><?php echo '$'.$row['plan_name_sequence_number'] ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
		    <div class="row mt-5">
                 <div id='ajax_div_plan'></div>


                <!-- End filter sec -->

                     <!-- Contenedor -->
               <!--  <div class="pricing-wrapper clearfix">
              
                                <div class="pricing-table ">
                        <h3 class="pricing-title color_class_pricing_title-1">Plan 00100-1064</h3>
                        <div class="color_class_price_1 price"><span class="p-rc">$1000</span></div>
                        
                        <ul class="table-list">
                            <li>Enrollment Start Date<br>
                                <span> 12/22/2020                                </span>
                            </li>
                            <li>Enrollment End Date<br>
                                 <span>
                                    12/22/2020 
                                </span>
                            </li>
                            <li>Bidding Start Date<br>
                                <span>
                                    12/22/2020                                </span>
                            </li>
                            <li>Total No Of Applicants
                                <span class="unlimited color_unlimited_1">
                                    5 
                                </span>
                            </li>
                        </ul>
                     
                        <div class="table-buy">
                            
                            <a href="http://rs200.whb.tempwebhost.net/~dhrivum5/committi/login" class="pricing-action class_color_btn_1">Enroll Now</a>
                        </div>
                    </div>
                                         <div class="pricing-table ">
                        <h3 class="pricing-title color_class_pricing_title-2">Plan 00100-1065</h3>
                        <div class="color_class_price_2 price"><span class="p-rc">$1000</span></div>
                 
                        <ul class="table-list">
                            <li>Enrollment Start Date<br>
                                <span> 12/22/2020                                </span>
                            </li>
                            <li>Enrollment End Date<br>
                                 <span>
                                    12/22/2020 
                                </span>
                            </li>
                            <li>Bidding Start Date<br>
                                <span>
                                    12/22/2020                                </span>
                            </li>
                            <li>Total No Of Applicants
                                <span class="unlimited color_unlimited_2">
                                    5 
                                </span>
                            </li>
                        </ul>
        
                        <div class="table-buy">
                            
                            <a href="http://rs200.whb.tempwebhost.net/~dhrivum5/committi/login" class="pricing-action class_color_btn_2">Enroll Now</a>
                        </div>
                    </div>
                                         <div class="pricing-table ">
                        <h3 class="pricing-title color_class_pricing_title-3">Plan 00100-1066</h3>
                        <div class="color_class_price_3 price"><span class="p-rc">$1000</span></div>
       
                        <ul class="table-list">
                            <li>Enrollment Start Date<br>
                                <span> 12/22/2020                                </span>
                            </li>
                            <li>Enrollment End Date<br>
                                 <span>
                                    12/22/2020 
                                </span>
                            </li>
                            <li>Bidding Start Date<br>
                                <span>
                                    12/22/2020                                </span>
                            </li>
                            <li>Total No Of Applicants
                                <span class="unlimited color_unlimited_3">
                                    5 
                                </span>
                            </li>
                        </ul>
    
                        <div class="table-buy">
                            
                            <a href="http://rs200.whb.tempwebhost.net/~dhrivum5/committi/login" class="pricing-action class_color_btn_3">Enroll Now</a>
                        </div>
                    </div>
                      
                    
<div class="pricing-table blue">
                        <h3 class="pricing-title color_class_pricing_title-3">Plan 00100-1066</h3>
                        <div class="color_class_price_3 price"><span class="p-rc">$1000</span></div>
      
                        <ul class="table-list">
                            <li>Enrollment Start Date<br>
                                <span> 12/22/2020                                </span>
                            </li>
                            <li>Enrollment End Date<br>
                                 <span>
                                    12/22/2020 
                                </span>
                            </li>
                            <li>Bidding Start Date<br>
                                <span>
                                    12/22/2020                                </span>
                            </li>
                            <li>Total No Of Applicants
                                <span class="unlimited color_unlimited_3">
                                    5 
                                </span>
                            </li>
                        </ul>
                  
                        <div class="table-buy">
                            
                            <a href="#" class="pricing-action class_color_btn_3">Enroll Now</a>
                        </div>
                    </div>

                </div> -->
                     
             <div class="col-md-12 slider-div">
                <div class="block">
                    <div class="block-header">
                       <!--  <h3 class="block-title text-center">
                            Our Plans
                        </h3> -->
                        <input type="hidden" name="plan_id" value="" id="plan_id">
                    </div>
                    <div class="block-content mobile-off">
                        <div class="js-slider slick-nav-hover text-center" data-dots="true" data-autoplay="true" data-arrows="true" data-slides-to-show="4">
                <?php 
                if ($data1 != '')
                  {
                    $i=1;
                    $count=0;
                    foreach( $data1 as $key => $PlanValue) {
                        $count++;
                        if($count=='4'){
                            $count=1;
                        }

                    ?>  
                        <div class="py-3">
                        <div class="pricing-table">
                        <h3 class="pricing-title color_class_pricing_title-<?php echo $count;?>" ><?php echo $PlanValue['plan_name']?></h3>
                        <div class="color_class_price_<?php echo $count;?> price"><span class="p-rc">$<?php echo number_format($PlanValue['bidding_amount_per_memeber'],2)?></span></div>
                        <ul class="table-list">
                            <li>Enrollment Start Date<br>
                                <span> <?php 
                                $convertDate= date('m/d/Y', strtotime($PlanValue['enrollment_start_date']));
                                echo $convertDate;
                                ?>
                                </span>
                            </li>
                            <li>Enrollment End Date<br>
                                 <span>
                                    <?php
                                    $convertEnrolledEndDate= date('m/d/Y', strtotime($PlanValue['enrollment_end_date']));
                                    echo $convertEnrolledEndDate;
                                    ?> 
                                </span>
                            </li>
                            <li>Bidding Start Date<br>
                                <span>
                                    <?php 
                                    $convertBiddingDate= date('m/d/Y', strtotime($PlanValue['bidding_start_date']));
                                    echo $convertBiddingDate;
                                    ?>
                                </span>
                            </li>
                            <li>Total No Of Applicants
                                <span class="unlimited color_unlimited_<?php echo $count;?>">
                                    <?php echo $PlanValue['total_no_appliactions']?> 
                                </span>
                            </li>
                        </ul>
                        <div class="table-buy">
                         <!--    <a href="<?php echo base_url();?>login" class="pricing-action class_color_btn_<?php echo $count;?>">Enroll Now</a> -->
                         <a class="nav-link js-scroll-trigger pricing-action class_color_btn_<?php echo $count;?>" data-toggle="modal" data-target="#exampleModal">Enroll Now</a>
                        </div>
        <!--                 <div class="table-buy">
                                                <a href="#" data-toggle="modal" data-target="#liveBiddingModal"
                                                    class="pricing-action class_color_btn_<?php echo $count;?>" onclick="getLivePlanInformation('<?php echo $PlanValue['id']?>');">Check
                                                    Live Bidding</a>
                                            </div> -->
                    </div>
                                        </div>
                                    <?php } } ?>
                                  </div>
                              </div>
                              <!-- Mobile slider  -->
                                <div class="block-content mobile-on" style="display:none;">
                               <div class="js-slider slick-nav-hover text-center" data-autoplay="true" data-dots="true" data-arrows="true" data-slides-to-show="1">
                <?php 
                if ($data1 != '')
                  {
                    $i=1;
                    $count=0;
                    foreach($data1 as $key => $PlanValue) {
                        $count++;
                        if($count=='4'){
                            $count=1;
                        }

                    ?>  
                                        <div class="py-3">
                                            <div class="pricing-table">
                        <h3 class="pricing-title color_class_pricing_title-<?php echo $count;?>" ><?php echo $PlanValue['plan_name']?></h3>
                        <div class="color_class_price_<?php echo $count;?> price"><span class="p-rc">$<?php echo number_format($PlanValue['bidding_amount_per_memeber'],2)?></span></div>
                        <ul class="table-list">
                            <li>Enrollment Start Date<br>
                                <span> <?php 
                                $convertDate= date('m/d/Y', strtotime($PlanValue['enrollment_start_date']));
                                echo $convertDate;
                                ?>
                                </span>
                            </li>
                            <li>Enrollment End Date<br>
                                 <span>
                                    <?php
                                    $convertEnrolledEndDate= date('m/d/Y', strtotime($PlanValue['enrollment_end_date']));
                                    echo $convertEnrolledEndDate;
                                    ?> 
                                </span>
                            </li>
                            <li>Bidding Start Date<br>
                                <span>
                                    <?php 
                                    $convertBiddingDate= date('m/d/Y', strtotime($PlanValue['bidding_start_date']));
                                    echo $convertBiddingDate;
                                    ?>
                                </span>
                            </li>
                            <li>Total No Of Applicants
                                <span class="unlimited color_unlimited_<?php echo $count;?>">
                                    <?php echo $PlanValue['total_no_appliactions']?> 
                                </span>
                            </li>
                        </ul>
                        <div class="table-buy">
                          <!--   <a href="<?php echo base_url();?>login" class="pricing-action class_color_btn_<?php echo $count;?>">Enroll Now</a> -->
                             <a class="nav-link js-scroll-trigger pricing-action class_color_btn_<?php echo $count;?>" data-toggle="modal" data-target="#exampleModal">Enroll Now</a>


                        </div>
                    <!--     <div class="table-buy">
                                                <a href="#" data-toggle="modal" data-target="#liveBiddingModal"
                                                    class="pricing-action class_color_btn_<?php echo $count;?>" onclick="getLivePlanInformation('<?php echo $PlanValue['id']?>');">Check
                                                    Live Bidding</a>
                                            </div> -->
                    </div>
                                        </div>
                                    <?php } } ?>
                                  </div>
                              </div>
                            </div>
                          </div>
                     
                </div>
                </div>
                </div>


        </section>
        <!-- Portfolio Grid-->
<!-- Modal -->
    <div class="modal fade liveBidding" id="liveBiddingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" >
        <div class="modal-dialog modal-lg liveBidding" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color: #120d35;background-color: #3e4a59 !important;">
                    <h5 class="modal-title liveBidding" id="exampleModalLabel" style="color: rgba(255,255,255,.9);">Live Bidding details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body liveBidding">
                <div class="row">
                            <div class="col-sm-12">
                                <table id="live_bidding_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer liveBidding" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" width="width:100%">
                                    <thead>
                                        <tr role="row" class="text-nowrap">
                                            <th width="10%" class="text-center sorting_asc" tabindex="0" aria-controls="DataTables_Table_2"  aria-sort="ascending" aria-label="ID: activate to sort column descending">S.No</th>
                                            <th width="20%"  class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Name: activate to sort column ascending">Plan Name </th>
                                            <th width="20%"  class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Name: activate to sort column ascending">Place Bid Amt</th>
                                            <th width="20%" class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_2"  aria-label="Name: activate to sort column ascending">Bidder Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                          </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal" style="background-color: #110d35 !important;color: #fff;">Close</button>
                   <!--  <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Portfolio Grid-->
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    window.setInterval(function(){
        var plan_id= $('#plan_id').val();
        if(plan_id!=''){
      /// call your function here
      getLivePlanInformation(plan_id);
        }
    }, 3000);
    
    function getLivePlanInformation(plan_id){
        $('#plan_id').val(plan_id);
        $.ajax({
            url:"<?php echo base_url()?>Home/getLivePlanInformation",
            type:"POST",
            data:{'plan_id':plan_id},
            success:function(response){
             $("#live_bidding_table > tbody").html("");
              var response_data=JSON.parse(response);
                if(response!=0){
                  $("#live_bidding_table > tbody").html("");
                  var count =1;
                  $.each(response_data,function(index,value){
                  var counter =count++;
                  var regex = /(?!^)[\s\S]/g;
                  var bidder_first_name=value.bidding_bidder_first_name;
                  var bidder_last_name=value.bidding_bidder_last_name;
                  var first_name =bidder_first_name.replace(regex, "*");
                  var last_name = bidder_last_name.replace(regex, "*");
                  var tr= '<tr><th class="text-center" scope="row">'+counter+'</th><td class="text-center font-w600 font-size-sm">'+value.plan_name+'</td><td class="text-center font-w600 font-size-sm">'+parseFloat(value.bidding_place_bid_amount).toFixed(2)+'</td><td class="text-center font-w600 font-size-sm text-capitalize">'+first_name+' '+last_name+'</td></tr>';
                  $('#live_bidding_table tbody').append(tr);
                });
              }else if(response==0){
                var tr= '<tr><td colspan="4" class="text-center">No Live Bidding Found</td></tr>';
                  $('#live_bidding_table tbody').append(tr);
              }
            }
        });
    }
    //////////////// AJAX FOR DISPLAYING PLANS ON DASHBOARD /////////////////////////////
    function funSeqNumber(value)
    {   
        var plan_value = value;
        alert(plan_value);

        var slider_div = $(".slider-div").css('display', 'none');
          var base_url  = '<?php echo base_url() ?>';
          window.location = base_url+'/ourplans/'+plan_value;

        // $.ajax({
        //             type : 'POST',
        //             //url  : '<?php //echo base_url().'/Home/plan_informations' ?>',
        //             url  : '<?php echo base_url().'/Home/viewsPlans' ?>',
        //             data : {plan_value:plan_value},
        //             success: function(response)
        //             {
        //                 if(response!=0)
        //                 {
        //                     var data = JSON.parse(response);
        //                     console.log(data);
        //                     var count = 0;

        //                     for(var i =0; i<data.length; i++)
        //                     {   
        //                         count++;
        //                         // start date timr sec+++++++++++++++++++++++++++++++++++++>
        //                         // remove time sec++++++++++++++++++>
        //                         var enrollment_s_date = data[i].enrollment_start_date;
        //                         var enrollment_start_date1 = enrollment_s_date.split(' ',)[0];
                                
        //                         // convert  m/d/y format date sec++++++++++++++++++>
        //                         var enrollment_start_date =  new Date(enrollment_start_date1).toLocaleString().split(',')[0];
                              
        //                         // remove time sec++++++++++++++++++>
        //                         var enrollment_e_date = data[i].enrollment_end_date;
        //                         var enrollment_end_date1 = enrollment_e_date.split(' ',)[0];
                                
        //                         // convert  m/d/y format date sec++++++++++++++++++>
        //                         var enrollment_end_date =  new Date(enrollment_end_date1).toLocaleString().split(',')[0];
                                
        //                         // remove time sec++++++++++++++++++>
        //                         var bidding_s_date = data[i].bidding_start_date;
        //                         var bidding_start_date1 = bidding_s_date.split(' ',)[0];

        //                         /// convert  m/d/y format date sec++++++++++++++++++>
        //                          var bidding_start_date =  new Date(bidding_start_date1).toLocaleString().split(',')[0];
        //                         // end sec+++++++++++++++++++++++++++++++++++++++++++++++>

        //                         // append div sec---------------------------------------->
        //                          var div= '<a class="block block-link-shadow block-themed block-fx-shadow text-center" href=""><div class="pricing-table  mb-5"><h3 class="pricing-title change_color_'+count+'">'+ data[i].plan_name +'</h3><div class="color_class_price_'+count+' price">'+ data[i].bidding_amount_per_memeber +'<sup></sup></div> <ul class="table-list"><li>Enrollment Start Date<span> '+enrollment_start_date+'</span></li><li>Enrollment End Date <span>'+enrollment_end_date+'</span></li><li>Bidding Start Date <span>'+bidding_start_date+'</span></li><li>Total No Of Applicants <span class="unlimited color_unlimited_'+count+'">'+data[i].total_no_appliactions+'</span></li></ul><div class="table-buy"> <a href="" class="class_color_btn_'+count+' pricing-action change_color_'+count+'">Enroll Now</a></div><div class="table-buy"><a  class=" pricing-action change_color_'+count+'" href=""><span class="custom_white"> View Info </span></a></div></div></a>';

        //                          //$('#ajax_div_plan').append(div);
        //                          var base_url  = '<?php echo base_url() ?>';
        //                          window.location = base_url+'/ourplans/'+plan_value;

        //                         // append div sec---------------------------------------->
        //                     }
        //                 }
        //             }
        //      }); 
    }
  ///////////// AJAX FOR DISPLAYING PLANS ON DASHBOARD /////////////////////////////
    </script>

