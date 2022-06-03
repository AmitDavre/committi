<?php 
$Province  = $this->config->item('Province');
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
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/magnific-popup/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.css">

    </head>
    <style type="text/css">
	header.masthead.short_banner {
    margin-top: 0;
    margin-bottom: 25px;
    padding: 198px 0px 65px 1px;  
    font-size: 12px;
    background-position: center left !important;
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
		  background-image: url("<?php echo base_url()?>assets/img/map-image.png")!important;
		}
		header.masthead {
		  background-image: url("<?php echo base_url()?>assets/img/slider2.jpg")!important;
		 
		}
		.masthead2 {
		  background-image: url("<?php echo base_url()?>assets/img/our-client.jpg")!important;
		}
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
                <div class="masthead-heading text-uppercase">About Us <span>Home / About</span></div>
				 
            </div>
        </header>
		 
		</div>
        <!-- Services-->
        
		<section class="page-section" id="services" style="padding-top:26px !important;  padding-bottom:40px;">
            <div class="container">
                 <p ><?php echo $setting_about_us;?></p>
				</div> 
            </div>
        </section>
        <!-- Portfolio Grid-->


         
    