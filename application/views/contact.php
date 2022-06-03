<?php ob_start();

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
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
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
        section#contact {
          background-image: url("<?php echo base_url()?>assets/img/map-image.png")!important;
        }
        header.masthead {
          background-image: url("<?php echo base_url()?>assets/img/slider.jpg")!important;
         
        }
        .masthead2 {
          background-image: url("<?php echo base_url()?>assets/img/our-client.jpg")!important;
          
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
    width: 21.4%;
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
    padding: 11px 0 0px 0;
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
     background: #403e3d;
    position: relative;
    font-size: 27px;
    font-weight: 700;
    font-family: 'Lato', sans-serif;
    padding: 0px 0;
    color: #ffffff;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
    margin-bottom: 12px;    margin-top: -1px;
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
#base {
      background: red;
      display: inline-block;
      height: 55px;
      margin-left: 20px;
      margin-top: 55px;
      position: relative;
      width: 100px;
    }
    .price:after {border-top: 15px solid #e60f1f;
    border-left: 131px solid transparent;
    border-right: 131px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -15px;
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

.blue .color_class_pricing_title-3 {
    color: #FFF;
    background: #39577d!important;
} 
.blue .color_class_price_3 {
    background: #39577d!important;
}
.blue .color_class_price_3:after {
    border-top: 15px solid #39577d!important;
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


.color_class_price_2:after {
    border-top: 15px solid #2ca100;
        border-left: 131px solid transparent;
    border-right: 131px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -15px;
    width: 0;
}
.color_class_price_3:after {
    border-top: 15px solid #d4d729;
        border-left: 131px solid transparent;
    border-right: 131px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -15px;
    width: 0;
}
.color_class_pricing_title-2{
    color: #FFF;
    background: #2ca100!important;
    padding: 11px 0 0px 0;
    font-size: 20px;
    font-size: 20px;
    margin: 0px;
    text-transform: uppercase;
    text-shadow: 0 1px 1px rgba(0,0,0,0.4);
}
.color_class_pricing_title-3{
    color: #FFF;
    background: #d4d729!important;
    padding: 11px 0 0px 0;
    font-size: 20px;
    font-size: 20px;
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
    margin-top: 11px;
}
    </style>

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?php echo base_url();?>assets/img/logo.jpg" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Our Plans</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Investing</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact Us</a></li>
                        <li class="nav-item logine"><a class="nav-link js-scroll-trigger" data-toggle="modal" data-target="#exampleModal">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container"> 
                <div class="masthead-heading text-uppercase">Smart Borrowings &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
Great Investment!</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Start Today</a>
            </div>
        </header>
		<div class="login-box" style="display:none;">
		<div class="login-inner">
		 <div class="text-center">
                    <h2 class="section-heading text-uppercase">Login Here</h2> 
                </div>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch">
                        <div class="col-md-12">
						<div class="row">
                            <div class="form-group col-md-4">
							<label>User Name</label>
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." /> 
								<span>NOT REGISTER? <a href="#">SIGN IN</a></span>
                            </div>
							<div class="form-group col-md-4">
							<label>Password</label>
                                <input class="form-control" id="email" type="email" placeholder="Email *" required="required" data-validation-required-message="Please enter your email address." /> 
								<span><a href="#">FORGET PASSWORD?</a></span>
                            </div>
							
                            <div class="form-group col-md-2">
							<label>CAPTCHA</label>
                                <input class="form-control" id="email" type="email" placeholder="Captcha *" required="required" data-validation-required-message="Please enter your email address." /> 
                            </div>
							 <div id="success"></div>
							 <label>&nbsp;</label>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Login</button>
                             
                        </div>
                        </div>
                         
                        </div>
                    </div> 
                </form>
            </div>
            </div>
		</div>
        <!-- Services-->
        <section class="page-section" id="services"  > 
            <div class="container">
                <div class="content_head ">
    <h1 class="nocaps">how its <span>work?</span></h1><div class="sep"></div><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis commodo augue. Aliquam ornare hendrerit augue</p></div>
                 
                <div class="row text-left">
                    <div class="col-md-6 margi-rgt22">
                       <img src="<?php echo base_url();?>assets/img/child.jpg">
                    </div>
                    <div class="col-md-6">
                         
                        <p class="text-muted ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vehicula gravida neque, nec pharetra velit porttitor sit amet. Vivamus fringilla tristique ipsum, vel accumsan ante dictum ut. Vivamus rutrum at arcu ac suscipit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus in nisi bibendum, consequat justo eget,  <br><br>
 
 sit amet. Vivamus fringilla tristique ipsum, vel accumsan ante dictum ut. Vivamus rutrum at arcu ac suscipit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus in nisi bibendum, consequat justo eget. Fusce risus ante, congue in magna varius, sodales tristique tellus. Sed semper lacus ex, vitae blandit risus placerat nec.  <br> velit porttitor sit amet. Vivamus fringilla tristique ipsum, vel accumsan ante dictum ut.  
</p><button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Read More</button>
                    </div>
                    
                </div>
            </div>
        </section>
		<section class="page-section serv" id="services" style="padding-top:10px;">
            <div class="container">
                <div class="content_head ">
    <h1 class="nocaps">TOP  REASONS <span>WHY PEOPLE COME TO US?</span></h1><div class="sep"></div><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis commodo augue. Aliquam ornare hendrerit augue</p></div>
                
                <div class="row">
                    <div class="col-md-4 left-mrg">
                        <span class="fm-icon">
							<i class="fa fa-id-badge "></i>
						</span>
						
                        <h4 class="my-3">Better ROI</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="col-md-4 left-mrg">
					<span class="fm-icon">
						<i class="fa fa-gavel"></i>
						</span>
                       
                        <h4 class="my-3">Safe Investment</h4>
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></div>
                    <div class="col-md-4 left-mrg">
					<span class="fm-icon">
							<i class="fa fa-address-card "></i>
						</span>
                        <h4 class="my-3">Down Payment For A House</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></div>
                </div>
				
				<div class="row">
                    <div class="col-md-4 left-mrg">
                        <span class="fm-icon">
							<i class="fa fa-users "></i>
						</span>
                        <h4 class="my-3">Debt Consolidation</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></div>
                    <div class="col-md-4 left-mrg">
					<span class="fm-icon">
							<i class="fa fa-tags "></i>
						</span>
                       
                        <h4 class="my-3">Vacation</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></div>
                    <div class="col-md-4 left-mrg">
					<span class="fm-icon">
							<i class="fa fa-arrows-alt "></i>
						</span>
                        <h4 class="my-3">Unexpected Expense</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> </div>
                </div>
				<div class="row">
                    <div class="col-md-4 left-mrg">
                        <span class="fm-icon">
							<i class="fa fa-bars  "></i>
						</span>
                        <h4 class="my-3">Major Repairs</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></div>
                    <div class="col-md-4 left-mrg">
					<span class="fm-icon">
							<i class="fa fa-credit-card "></i>
						</span>
                       
                        <h4 class="my-3">Bill Payment & Expense</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></div>
                    <div class="col-md-4 left-mrg">
					<span class="fm-icon">
							<i class="fa fa-globe"></i>
						</span>
                        <h4 class="my-3">Planning a Party</h4>
                       <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                 <div class="content_head ">
    <h1 class="nocaps">Our <span>Plans</span></h1><div class="sep"></div><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis commodo augue. Aliquam ornare hendrerit augue</p></div>
                 
                
                <div class="row">
                     <!-- Contenedor -->
                <div class="pricing-wrapper clearfix">
                    <!-- Titulo -->
            <?php 
             if ($data != '')
                {
                    $i=1;
                    $count=0;
                    foreach( $data as $key => $PlanValue) {
                        $count++;

                    ?>
                    <div class="pricing-table ">
                        <h3 class="pricing-title color_class_pricing_title-<?php echo $count;?>" ><?php echo $PlanValue['plan_name']?></h3>
                        <div class="color_class_price_<?php echo $count;?> price">$<?php echo $PlanValue['bidding_amount_per_memeber']?></div>
                        <!-- Lista de Caracteristicas / Propiedades -->
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
                        <!-- Contratar / Comprar -->
                        <div class="table-buy">
                            
                            <a href="<?php echo base_url();?>login" class="pricing-action class_color_btn_<?php echo $count;?>">Enroll Now</a>
                        </div>
                    </div>
                     <?php if ($i++ == 3) break;
                    }
                } ?> 
                    
<div class="pricing-table blue">
                        <h3 class="pricing-title color_class_pricing_title-<?php echo $count;?>" ><?php echo $PlanValue['plan_name']?></h3>
                        <div class="color_class_price_<?php echo $count;?> price">$<?php echo $PlanValue['bidding_amount_per_memeber']?></div>
                        <!-- Lista de Caracteristicas / Propiedades -->
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
                        <!-- Contratar / Comprar -->
                        <div class="table-buy">
                            
                            <a href="#" class="pricing-action class_color_btn_<?php echo $count;?>">Enroll Now</a>
                        </div>
                    </div>
                </div>
                     
                    
                     
                </div>
				<div class="view-p">
				<button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit"><a href="<?php echo base_url()?>login">View all Plans</a></button>
				</div>
				
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about" style="display:none;">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Exprience the Diference</h2>
                    <h3 class="section-subheading text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-3 border-right">
                        <img src="<?php echo base_url();?>assets/img/logos/icon/icon_19.jpg">
                        <h4 class="my-3">Finance <br>Professionals</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-3 border-right">
                        <img src="<?php echo base_url();?>assets/img/logos/icon/icon_21.jpg">
                        <h4 class="my-3">INDIVIDUAL <br>INVESTORS</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-3 border-right">
                        <img src="<?php echo base_url();?>assets/img/logos/icon/icon_23.jpg">
                        <h4 class="my-3">THE BEST <br>INSTITUTIONS</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
					<div class="col-md-3">
                        <img src="<?php echo base_url();?>assets/img/logos/icon/icon_25.jpg">
                        <h4 class="my-3">DEFINED <br>CONTRIBUTION</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                </div> 
            </div>
        </section>
        <!-- Team-->
		<div class="masthead2" style="display:none;">
            <div class="container"> 
                <div class="masthead-heading text-uppercase">Global Presence is key to our clients Success</div>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Our Global Offices</a>
            </div>
        </div>
          
        <!-- Clients-->
      
        <!-- Contact-->
         
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
			<div class="row text-left">
                    <div class="col-md-3"> 
                        <h4 class="my-3">Commitee</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-3"> 
                        <h4 class="my-3">Links</h4>
                        <ul>
							<li><a href="#">New Releases</a></li>
							<li><a href="#">Comment Letters</a></li>
							<li><a href="#">Member Alert</a></li>
							<li><a href="#">Newsletters</a></li>
							<li><a href="#">Newsletters Update</a></li>
							<li><a href="#">Blog</a></li> 
						</ul>
                    </div>
                    <div class="col-md-3"> 
                        <h4 class="my-3">Recent Project</h4>
                        <p class="text-muted">Instagram has returend invalid data</p>
                    </div>
					<div class="col-md-3"> 
                        <h4 class="my-3">Recent Comment</h4>
                        <ul>
							<li><a href="#">Joshy Lynch on Standard Post</a></li> 
							<li><a href="#">Joshy Lynch on Standard Post</a></li> 
							<li><a href="#">Joshy Lynch on Standard Post</a></li> 
							<li><a href="#">Joshy Lynch on Standard Post</a></li> 
							<li><a href="#">Joshy Lynch on Standard Post</a></li> 
						</ul>
                    </div>
                </div>
                <div class="row align-items-center copyrt">
                    <div class="col-lg-12 text-center">Copyright © Committi 2020</div>
                    
                     
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Modal 1-->
        <!-- Modal Login -->
        <div class="modal fade login" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="block block-themed block-fx-shadow mb-0 signim">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                  <div class="block-header">
                    <h3 style="color: #fff;" class="text-center block-title">Sign In</h3>
                  </div>
                  <div class="block-content">
                    <div class="p-sm-3 px-lg-2 py-lg-2">
                      <p>Welcome, please login.</p>
                      <form class="js-validation-signin" action="<?php echo base_url()?>login_validation" method="POST" novalidate>
                        <div class="py-3">
                          <div class="form-group">
                            <input type="text" class="form-control form-control-alt form-control-lg" id="username" name="username" required placeholder="Username" value="">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control form-control-alt form-control-lg" id="password" name="password" required placeholder="Password" value="">
                          </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember" value="1">
                              <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-6 ">
                            <button type="submit" name="submit" class="btn btn-block btn-info"> <svg style="color: #fff;" class="svg-inline--fa fa-sign-in-alt fa-w-16 fa-fw mr-1" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="sign-in-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path>
                            </svg><!-- <i style="color: #fff;" class="fa fa-fw fa-sign-in-alt mr-1"></i> --> <span style="color: #fff;"> Sign In</span> </button>
                          </div>
                          <div class="col-md-6"> <a class=" font-size-sm" href="<?php echo base_url()?>sign-up">
                            <button type="button" name="submit" class="btn btn-block btn-info"> <svg style="color: #fff;" class="svg-inline--fa fa-sign-out-alt fa-w-16 fa-fw mr-1" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                            </svg><!-- <i style="color: #fff;" class="fa fa-fw fa-sign-out-alt mr-1"></i> --> <span style="color: #fff;"> Sign Up </span> </button>
                            </a></div>
                          <a class=" font-size-sm" href="<?php echo base_url()?>sign-up"> </a></div>
                        <a class=" font-size-sm" href="<?php echo base_url()?>sign-up"> </a>
                        <div class="form-group row"><a class=" font-size-sm" href="<?php echo base_url()?>sign-up"> </a>
                          <div class="col-md-6 "><a class=" font-size-sm" href="<?php echo base_url()?>sign-up"> </a><a style="color: #000;" class="btn-block-option font-size-sm" href="<?php echo base_url()?>forgot-username">Forgot Username?</a> </div>
                          <div class="col-md-6"> <a style="color: #000;" class="btn-block-option font-size-sm" href="<?php echo base_url()?>forgot-password">Forgot Password?</a> </div>
                        </div>
                      </form>
                      <!-- END Sign In Form --> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
         
         
       
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="<?php echo base_url();?>assets/mail/jqBootstrapValidation.js"></script>
        <script src="<?php echo base_url();?>assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
    </body>
</html>
