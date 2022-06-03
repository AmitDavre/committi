<?php $this->load->helper('cookie');?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Committi</title>
        

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/media/favicons/favicon.png">
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

    <style type="text/css">
	header.masthead {
   padding-top: 190px;
    padding-bottom: 83px;
}
    .custom-control-input:checked~.custom-control-label::before {
        color: #fff;
        border-color: #110d35;
        background-color: #110d35;
    }
    .btn-info,.bg-info {
        background-color: #110d35!important;
    }
	button.btn.btn-block.btn-info {
    border-color: red;
}
button.btn.btn-block.btn-info {
    border-color: red !important;
} 
header.masthead {
    float: left;  
     width: 100%;  
}
a.btn-block-option.font-size-sm {
    font-size: 13px;
}
input#username, input#password {
    height: 39px;
    font-size: 16px;
    border-radius: 3px;
}
h3.text-center.block-title {
    margin-bottom: 0;
}
.block.block-themed.block-fx-shadow.mb-0.signim p {
    padding-bottom: 0px;
    margin-bottom: 0; 
}
    </style>
    <body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/logo.jpg" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>ourplans">Our Plans</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>investing">Investing</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>contact">Contact Us</a></li>
                         <li class="nav-item logine"><a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container  "> 
                 <!-- Sign In Block -->
                                    <div class="block block-themed block-fx-shadow mb-0 signim">
                                        <div class="bg-info block-header">
                                            <h3  style="color: #fff;" class="text-center block-title">Sign In</h3>
                                            <div class="block-options">
                                               
                                                
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <div class="p-sm-3 px-lg-2 py-lg-2">
                                                 
                                                <p>Welcome, please login.</p>
                                                    <?php if($this->session->flashdata('error')) { ?>
                                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times"></i>
                                                        </div>
                                                        <div class="flex-fill ml-3">
                                                            <p class="mb-0"><?php echo $this->session->flashdata('error'); ?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <form class="js-validation-signin" action="<?php echo base_url();?>login_validation" method="POST">
                                                    <div class="py-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-alt form-control-lg" id="username" name="username" required="required" placeholder="Username" value="<?php echo get_cookie("username");?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control form-control-alt form-control-lg" id="password" name="password" required="required" placeholder="Password" value="<?php echo get_cookie("password");?>">
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
                                                            <button type="submit" name="submit" class="btn btn-block btn-info">
                                                                <i  style="color: #fff;" class="fa fa-fw fa-sign-in-alt mr-1"></i> <span  style="color: #fff;"> Sign In</span>
                                                            </button>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <a class=" font-size-sm" href="<?php echo base_url(); ?>sign-up"><button  type="button" name="submit" class="btn btn-block btn-info">
                                                                <i  style="color: #fff;" class="fa fa-fw fa-sign-out-alt mr-1"></i> <span  style="color: #fff;"> Sign Up </span>
                                                            </button>

                                                        </div>
                                                    </div>                   
                                                    <div class="form-group row">
                                                        <div class="col-md-6 ">
                                                             <a style="color: #000;" class="btn-block-option font-size-sm" href="<?php echo base_url(); ?>forgot-username">Forgot Username?</a>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <a style="color: #000;" class="btn-block-option font-size-sm" href="<?php echo base_url(); ?>forgot-password">Forgot Password?</a>

                                                        </div>
                                 
                                                    </div>
                                                </form>
                                                <!-- END Sign In Form -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Sign In Block -->
            </div>
        </header>
        <div id="page-container">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('<?php echo base_url(); ?>assets/media/photos/photo6@2x.jpg');">
                    <div class="hero-static bg-white-95">
                      
                        <div class="content content-full font-size-sm text-muted text-center">
                           <div class="footer-f"> <strong>Committi</strong> &copy; <span data-toggle="year-copy"></span></div> 
                        </div> 
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <script src="<?php echo base_url(); ?>assets/js/oneui.core.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/oneui.app.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pages/op_auth_signin.min.js"></script>
    </body>

</html>

