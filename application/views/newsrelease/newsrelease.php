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
    </head>
    <style type="text/css">
	header.masthead.short_banner {
    margin-top: 0;
    margin-bottom: 25px;
    padding: 220px 0px 62px 1px;  
    font-size: 12px;
}
header.masthead.short_banner .masthead-heading {
        font-size: 30px;
    font-weight: 700;
    line-height: 70px;
    margin-bottom: 0rem;
    text-align: left;
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
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?php echo base_url()?>assets/img/logo.jpg" alt="" /></a>
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
                <div class="masthead-heading text-uppercase">News Release <span>Home / News Release</span></div>
				
                
            </div>
        </header>
		 
		</div>
        <!-- Services--> 
        
		<section class="page-section" id="services" style="padding-top:10px !important;">
            <div class="container">
                 
            <div class="col-lg-122">
        <div class="faqs">
            <div class="tab-content" id="faq-tab-content">
                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                    <div class="accordion" id="accordion-tab-1">
                      <?php if($news_release_settings) { $count=0;foreach($news_release_settings as $news_release){ $count++;?>
                        <div class="card">
                            <div class="card-header" id="accordion-tab-1-heading-<?php echo $count;?>">
                                <h5>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#accordion-tab-1-content-<?php echo $count;?>" aria-expanded="false" aria-controls="accordion-tab-1-content-<?php echo $count;?>"><?php echo $news_release['news_release_settings_heading'];?></button>
                                </h5>
                            </div>
                            <div class="collapse <?php if($count==1) echo 'show';?>" id="accordion-tab-1-content-<?php echo $count;?>" aria-labelledby="accordion-tab-1-heading-<?php echo $count;?>" data-parent="#accordion-tab-1">
                                <div class="card-body">
                                    <p><?php echo $news_release['news_release_settings_description'];?></p>
    
                                </div>
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
     
         

