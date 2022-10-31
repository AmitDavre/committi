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

        .formClass{
            margin-bottom:0px!important;
        }
            .formClass1{
            margin-top:0px!important;
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
                <div class="masthead-heading text-uppercase">Contact Us  
				<span>Home / Contact</span>
				</div>
				
                
            </div>
        </header>
		 
		</div>
        <!-- Services-->
        
		<section class="page-section" id="services" style="padding-top:10px;">
            <div class="container">
                 <?php if($this->session->flashdata('success')){ ?>
                                    <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Form Submitted Successfully </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> 

                            <?php } ?>
                <div class="row">
				<!--Section: Contact v.2-->
 
<!--Section: Contact v.2-->
						<div class="col-md-5">
						<h4 class="my-3">Get in Touch</h4>
						<p>Our team is happy to answer your questions or suggestions. Fill out the form and one of our support specialist will get in touch as soon as possible.</p>
						<ul class="list-unstyled mb-0">
							<li><i class="fas fa-map-marker-alt fa-2x"></i>
								<p> &nbsp;&nbsp;200E - 141 Brunel Road,<br> &nbsp;&nbsp;Mississauga, ON L4Z 1X3,<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CANADA</p>
							</li>
							<li><i class="fas fa-phone mt-4 fa-2x"></i>
								<p>1-866-266-6480</p> 
							</li>
							<li><i class="fas fa-envelope mt-4 fa-2x"></i>
								<p>info@committi.com</p>
							</li>
						</ul> 
						</div>
						<div class="col-md-7 ">
							<form id="myContactUsForm" action="<?php base_url()?>contact" method="POST">
							  <div class="form-row">
								<div class="form-group col-md-6 formClass">
								  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name"  value="<?php echo isset($reset) ? "" : set_value('first_name'); ?>" autocomplete="off">
                                  <p class="text-danger"><?php echo form_error('first_name'); ?></p>
								</div>
								<div class="form-group col-md-6 formClass">
								  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="<?php echo isset($reset) ? "" : set_value('last_name'); ?>" autocomplete="off">
                                  <p class="text-danger"><?php echo form_error('last_name'); ?></p>
								</div>
							  </div>
							  <div class="form-row">
                                <div class="form-group col-md-6 formClass">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email-id"  value="<?php echo isset($reset) ? "" : set_value('email'); ?>" autocomplete="off">
                                <p class="text-danger"><?php echo form_error('email'); ?></p>
							  </div>
                                <div class="form-group col-md-6 formClass">
                                  <input type="text" class="form-control inputPhone" id="inputPhone" name="inputPhone" value="<?php echo isset($reset) ? "" : set_value('inputPhone'); ?>" onkeypress="return isNumber(event);" placeholder="Enter contact number" autocomplete="off" maxlength="14">
                                  <p class="text-danger"><?php echo form_error('inputPhone'); ?></p>
                                   <p class="text-danger" id="inputPhone_error"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 formClass">
                                <textarea class="form-control" id="comments" name="comments" placeholder="Comments"  autocomplete="off"><?php echo isset($reset) ? "" : set_value('comments'); ?></textarea>
                              </div>
                            </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                            <p id="captImg" style="margin-top:15px;"><?php echo $captchaImg; ?></p>
                            <p>Can't read the image? click <a href="javascript:void(0);" class="refreshCaptcha" onclick="return refreshCaptcha();">here</a> to refresh.</p>
                               <input type="text" id="code" name="code" class="form-control" value="<?php echo isset($reset) ? "" :set_value('code'); ?>" placeholder="Enter the captcha" autocomplete="off"/>
                               <p class="text-danger"><?php echo form_error('code');?></p>
                              <div class="text-danger"><?php if($this->session->userdata('captcha_check') !=''){ ?> <p> <?=$this->session->userdata('captcha_check');?></p> <?php } ?></div>
                                   </div>
                                  </div> 
		                       <br>
							  <button type="submit" class="btn btn-primary" id="contact_submit" name="contact_submit">Submit</button>

							</form>
							 
						</div>
					</div>
				<div class="row"> 
					<div class="col-md-12"> 
						
					</div>
				</div>
				</div>
				<section class="row map_row">
    
        
            <div id="mapBox" class="m0" style="position: relative; overflow: hidden; width:100%;">
          <!--   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d379.12563971649337!2d-74.28273669513035!3d40.51937796853623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3ca75fd752715%3A0xc312a14a23394683!2sNew+Brunswick+Ave+at+Baker+Pl!5e0!3m2!1sen!2sin!4v1558608794189!5m2!1sen!2sin" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen=""></iframe> -->
              </div>
         
    </section>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <script>
             var check_session="<?php echo $this->session->flashdata('success')?>";
             if(check_session!=''){
                var form=document.getElementById("myContactUsForm").reset();
              }
             function refreshCaptcha(){
              $.get('<?php echo base_url().'Home/refreshCaptcha'; ?>', function(data){
              $('#captImg').html(data);
               });
              }
              function isNumber(evt) {
               var iKeyCode = (evt.which) ? evt.which : evt.keyCode
              if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
             // $(".errorr").text('Please enter only numeric digit');
           return false;
            return true;
            }
        </script>
         

