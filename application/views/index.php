<?php ob_start();


// define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'production');


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
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url()?>assets/css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick-theme.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/js/plugins/sweetalert2/sweetalert2.min.css">
         <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- <link rel="stylesheet" id="css-main" href="<?php echo base_url() ?>assets/css/oneui.min.css"> -->
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
video:focus {
    outline:none !important;
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
/*    width: 21.4%;
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
    .price:after {border-top: 25px solid #e60f1f;
    border-left: 140px solid transparent;
    border-right: 133px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -25px;
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
 @media only screen and (min-width: 480px) and (max-width: 768px) {
   body .price:after {
    
    border-left: 247px solid transparent;
    border-right: 271px solid transparent;
  
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

@media only screen and (max-width: 479px) {
    .pricing-wrapper {
        width: 300px;
    }
} 

.pricing-table {
    overflow: hidden;
}
.color_class_price_2:after {
    border-top: 25px solid #2ca100;
    border-left: 140px solid transparent;
    border-right: 133px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -25px;
    width: 0;
}
.color_class_price_3:after {
    border-top: 25px solid #d4d729;
        border-left: 140px solid transparent;
    border-right: 133px solid transparent;
    content: "";
    height: 0;
    left: 0;
    position: absolute;
    bottom: -25px;
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
    background: #110c34;
    padding-top: 69px !important;
    padding-bottom: 52px;
}
.serv h2.section-heading.text-uppercase, .serv h4.my-3 {
    color: #ffffff;
}
h4.my-3 {
    text-transform: none;
    font-weight: 600;
    font-size: 18px;
    line-height: 36px;
    letter-spacing: 1px;
    margin-bottom: 9px !important;
    padding-top: 0px;
    margin-top: 4px !important;
}
span.fm-icon {
        color: #ffffff;
    
    /* display: contents; */
    
    float: none;
    
    vertical-align: revert;
    
    line-height: 31px;
}
/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
     content: '';
    position: absolute;
    width: 1px;
    background-color: #ffffff;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: 0px;
    border: 1px dashed #b5b3b3;
}

/* Container around content */
.timeline .container2 {
  padding: 0px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.timeline .container2::after {
  content: '';
    position: absolute; 
    width: 25px;
    /* height: 25px; */
    right: 3px; 
    background-color: white;
    border: 1px dashed #b5b3b3;
    top: 20px;
    border-radius: 0;
    z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
         content: " ";
    height: 0;
    position: absolute;
    top: 14px;
    width: 0;
    z-index: 1;
    right: 30px;
    border: medium solid #b7b7b7;
    border-width: 7px 0 7px 7px;
    border-color: transparent transparent transparent #b7b7b7;
    transform: rotate(177deg);
}

/* Add arrows to the right container (pointing left) */
.right::before {
 content: " ";
    height: 0;
    position: absolute;
    top: 14px;
    width: 0;
    z-index: 1;
    left: 31px;
    border: medium solid #b5b3b3;
    border-width: 7px 7px 7px 0;
    border-color: transparent #b5b3b3 transparent transparent;
    transform: rotate(177deg);
}
.container2.right .content {
    padding-left: 38px;
    padding-right: 0; 
}
/* Fix the circle for containers on the right side */
.right::after {
  left: 5px;
}

/* The actual content */
.timeline .content {
     padding: 6px 37px 0px 0px;
    background-color: #ffffff;
    position: relative;
    border-radius: 6px;
 
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .timeline .container2 {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .timeline .container2::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
.container2.left {
    padding-left: 0;
}
.timeline h2 {
    font-size: 16px;
    font-size: 15px;
    font-weight: 600;
    font-family: 'Lato', sans-serif;
    letter-spacing: 0.4px;
    line-height: 21px;
    margin-top: -8px;
    text-align: center;
    color: red;
}
.container2.right {
    padding-right: 0;
}
.container2.right i {
   background: red;
    width: 28px;
    height: 28px;
    border-radius: 38px;
    float: right;
    text-align: center;
    font-style: initial;
    color: #ffffff;
    line-height: 27px;
    font-size: 14px;
    position: absolute;
    left: 3px;
}
.container2.left i {
    background: red;
    width: 28px;
    height: 28px;
    border-radius: 38px;
    float: right;
    text-align: center;
    font-style: initial;
    color: #ffffff;
    line-height: 27px;
    font-size: 14px;
    position: absolute;
    right: 0;
}
.timeline {
    margin-top: 23px;
}
.timeline:before {
    position: absolute;
    top: -10px;
    bottom: 0;
    left: 49.8% !important;
    width: 8px;
    margin-left: -1.5px;
    content: "";
    background-color: #b5b3b3;
    height: 8px;
    border-radius: 71%;
}
button.btn.btn-primary.btn-xl.text-uppercase.timln {
    padding: 3px 16px !important;
    margin-left: 41% !important;
    font-size: 13px !important;
    line-height: 20px !important;
    height: 34px !important;
}
.y i {
    background: #eac601 !important;
}
.y h2 {
   color: #c7ad1c !important;
}
.g i {
    background: #2da001 !important
}
.g h2 {
   color: #2da001 !important
}
.b i {
    background: #314770 !important
}
.b h2 {
   color: #314770 !important
}
span.p-rc {
    margin-bottom: -10px;
    position: relative;
    float: left;
    width: 100%;
    z-index: 9;
    padding-bottom: 10px!important;
}

    </style>
  
<!-- <div class="side-panel-cont">
  <div class="buttons-panel">
    <div class="buttons-list">
      <div class="single-button contact-us action action-contact">
        <div class="btn-ico"></div>
        <span class="btn-name"><a href="<?php echo base_url()?>contact">Contact us</a></span>
      </div>
      <div class="single-button live-chat action-chat action" id="accc">
        <div class="btn-ico"></div>
        <span class="btn-name">Live Chat</span>
      </div>
      <div class="single-button phone-call action-contact action">
        <div class="btn-ico"></div>
        <span class="btn-name">1-123-456-0847</span>
      </div>
    </div>
  </div>
</div> -->
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <header class="masthead">
            <div class="container auto-h"> 
            
                <div class="masthead-heading text-uppercase" style="text-transform:capitalize !important;">
                
                <div class="apt">
                Smart <b>Borrowings&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><br></div>
<div class="auto-h2"><div class="apt2 ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Great <b>Investment</b></div>
</div>
</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#portfolio">Start Today</a>
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
                
    <h1 class="nocaps">how it <span>works?</span></h1><div class="sep"></div><p>&nbsp;</p></div>
                 
                <div class="row text-left">
                    <div class="col-md-6 margi-rgt22">
                     
                    <video width="100%" height="400" controls="" poster="<?php echo base_url();?>assets/media/intro1.png">
                  <source src="<?php echo base_url();?>assets/media/Committi_Overview_Final.mp4" type="video/mp4"> 
                </video>
                      <!-- <img src="<?php //echo base_url();?>assets/img/child.jpg"> -->
                       

                    </div>
                    <div class="col-md-6">
                         
                      <div class="timeline">
  <div class="container2 left">
    <div class="content">
    <i>1</i>
      <h2><?php echo $setting_step_guide_1; ?></h2>
      
    </div>
  </div>
  <div class="container2 right">
    <div class="content y">
    <i >2</i>
      <h2><?php echo $setting_step_guide_2; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content b">
    <i >3</i>
      <h2><?php echo $setting_step_guide_3; ?></h2>
      
    </div>
  </div>
  <div class="container2 right">
    <div class="content g">
    <i >4</i>
      <h2><?php echo $setting_step_guide_4; ?></h2>
      
    </div>
  </div>
  
   
   
   
  
</div><button class="btn btn-primary btn-xl text-uppercase timln" id="sendMessageButton" type="submit" data-toggle="modal" data-target="#viewmore">Read More</button>
                    </div>
                    
                </div>
            </div>
        </section>
        <section class="page-section serv" id="services" style="padding-top:10px;">
            <div class="container">
                <div class="content_head ">
    <h1 class="nocaps">TOP  REASONS <span>WHY PEOPLE COME TO US?</span></h1><div class="sep"></div><p>&nbsp;</p></div>
                
                <div class="row">
                    <div class="col-md-4 left-mrg">
                        <span class="fm-icon">
                            <img src="<?php echo base_url();?>assets/img/grph.png">
                        </span>
                        <br>
                        <h4 class="my-3">Better ROI</h4>
                         
                    </div>
                    <div class="col-md-4 left-mrg">
                    <span class="fm-icon">
                        <img src="<?php echo base_url();?>assets/img/safee.png">
                    
                        
                        </span>
                       
                        <h4 class="my-3">Safe Investment</h4>
                      </div>
                    <div class="col-md-4 left-mrg">
                    <span class="fm-icon">
                            <img src="<?php echo base_url();?>assets/img/inv.png">
                            
                        </span>
                        <h4 class="my-3">Down Payment For A House</h4>
                        </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 left-mrg">
                        <span class="fm-icon">
                                <img src="<?php echo base_url();?>assets/img/cut.png">
                        </span>
                        <h4 class="my-3">Debt Consolidation</h4>
                       </div>
                    <div class="col-md-4 left-mrg">
                    <span class="fm-icon">
                            <img src="<?php echo base_url();?>assets/img/Vacation.png">
                        </span>
                       
                        <h4 class="my-3">Vacation</h4>
                        </div>
                    <div class="col-md-4 left-mrg">
                    <span class="fm-icon">
                            <img src="<?php echo base_url();?>assets/img/exp.png">
                        </span>
                        <h4 class="my-3">Unexpected Expense</h4>
                         </div>
                </div>
                <div class="row">
                    <div class="col-md-4 left-mrg"> 
                        <span class="fm-icon">
                            <img src="<?php echo base_url();?>assets/img/safe.png">
                            
                            
                        </span>
                        <h4 class="my-3">Major Repairs</h4>
                        </div>
                    <div class="col-md-4 left-mrg">
                    <span class="fm-icon">
                            <img src="<?php echo base_url();?>assets/img/card2.png">
                            
                        </span>
                       
                        <h4 class="my-3">Bill Payment & Expense</h4>
                        </div>
                    <div class="col-md-4 left-mrg">
                    <span class="fm-icon">
                            
                            <img src="<?php echo base_url();?>assets/img/party.png">
                        </span>
                        <h4 class="my-3">Planning a Party</h4>
                     </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                 <div class="content_head">
    <h1 class="nocaps">Our <span>Plans</span></h1><div class="sep"></div><p>&nbsp;</p></div>
                 
      <!--           
                <div class="row">
                <div class="pricing-wrapper clearfix">
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
                        <div class="color_class_price_<?php echo $count;?> price"><span class="p-rc">$<?php echo $PlanValue['bidding_amount_per_memeber']?></span></div>
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
                            
                            <a href="<?php echo base_url();?>login" class="pricing-action class_color_btn_<?php echo $count;?>">Enroll Now</a>
                        </div>
                    </div>
                     <?php if ($i++ == 3) break;
                    }
                } ?> 
                    
<div class="pricing-table blue">
                        <h3 class="pricing-title color_class_pricing_title-<?php echo $count;?>" ><?php echo $PlanValue['plan_name']?></h3>
                        <div class="color_class_price_<?php echo $count;?> price"><span class="p-rc">$<?php echo $PlanValue['bidding_amount_per_memeber']?></span></div>
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
                            
                            <a href="#" class="pricing-action class_color_btn_<?php echo $count;?>">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div> -->

                <div class="row">
                 <div class="col-md-12">
                            <div class="block">
                                <div class="block-header">
                                   <!--  <h3 class="block-title text-center">
                                        Our Plans
                                    </h3> -->
                                </div>
                                <div class="block-content mobile-off">
                                    <div class="js-slider slick-nav-hover text-center pricing-wrapper clearfix" data-dots="true" data-autoplay="true" data-arrows="true" data-slides-to-show="4">
                <?php 
                if ($data != '')
                  {
                    $i=1;
                    $count=0;
                    foreach( $data as $key => $PlanValue) {
                   
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
                    </div>
                                        </div>
                                    <?php } }?>
                                  </div>
                              </div>
                              <!-- Mobile slider  -->
                                <div class="block-content mobile-on" style="display:none;">
                               <div class="js-slider slick-nav-hover text-center" data-autoplay="true" data-dots="true" data-arrows="true" data-slides-to-show="1">
                <?php 
                if ($data != '')
                  {
                    $i=1;
                    $count=0;
                    foreach( $data as $key => $PlanValue) {
                        
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
                        <!--     <a href="<?php echo base_url();?>login" class="pricing-action class_color_btn_<?php echo $count;?>">Enroll Now</a> -->
                           <a class="nav-link js-scroll-trigger pricing-action class_color_btn_<?php echo $count;?>" data-toggle="modal" data-target="#exampleModal">Enroll Now</a>
                        </div>
                    </div>
                                        </div>
                                    <?php } } ?>
                                  </div>
                              </div>
                            </div>
                          </div>
                    </div>

                <div class="view-p">
                <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit"><a href="<?php echo base_url()?>ourplans">View all Plans</a></button>
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
         
