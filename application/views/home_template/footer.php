<?php $this->load->helper('cookie');?>
<div class="side-panel-cont">
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
        <span class="btn-name">1-866-266-6480</span>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="viewmore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">How it Works</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div class="timeline"> 
  <div class="container2 left">
    <div class="content">
	<i>1</i>
      <h2><?php echo $setting_step_guide_1; ?></h2>
      
    </div>
  </div>
  <div class="container2 right">
    <div class="content y">
	<i>2</i>
      <h2><?php echo $setting_step_guide_2; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content b">
	<i>3</i>
      <h2><?php echo $setting_step_guide_3; ?></h2>
      
    </div>
  </div>
  <div class="container2 right">
    <div class="content g">
	<i>4</i>
      <h2><?php echo $setting_step_guide_4; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content y">
	<i>5</i>
      <h2><?php echo $setting_step_guide_5; ?></h2>
       
    </div>
  </div>
  <div class="container2 right">
    <div class="content b">
	<i>6</i>
      <h2><?php echo $setting_step_guide_6; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content g">
	<i>7</i>
      <h2><?php echo $setting_step_guide_7; ?></h2>
       
    </div>
  </div>
  <div class="container2 right">
    <div class="content ">
	<i>8</i>
      <h2><?php echo $setting_step_guide_8; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content b">
	<i>9</i>
      <h2><?php echo $setting_step_guide_9; ?></h2>
       
    </div>
  </div>
  <div class="container2 right">
    <div class="content g">
	<i>10</i>
      <h2><?php echo $setting_step_guide_10; ?></h2>
      
    </div>
  </div>
  <div class="container2 left">
    <div class="content ">
	<i>11</i>
      <h2><?php echo $setting_step_guide_11; ?></h2>
       
    </div>
  </div>
  <div class="container2 right">
    <div class="content y">
	<i>12</i>
      <h2><?php echo $setting_step_guide_12; ?></h2>
      
    </div>
  </div>
</div>
      </div>
       
    </div>
  </div>
</div>

<?php if($this->session->flashdata('email-not-verified')){?>
  <div  id="email_verification" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-danger" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">You are registered successfully.Please verify your account before login.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialoge_email_verification();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
  <?php } ?>

  <?php if($this->session->userdata('email-verified')){?>

   <div id="email_verification_modal" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Your email has been verified successfully.</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;"  onclick="return emailVerifcation();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div><?php }?>
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
              <form id="loginForModal" onsubmit="return loginValidation(event);" class="js-validation-signin" action="<?php echo base_url();?>login_validation" method="POST" novalidate>
                <div class="alert alert-danger" id="loginError" style="display:none;"></div>
                <div class="py-3">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-alt form-control-lg" id="username" name="username" required placeholder="Username" value="<?php echo get_cookie('username');?>">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-alt form-control-lg" id="password" name="password" required placeholder="Password" value="<?php echo get_cookie('password');?>">
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember" value="1">
                      <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12 ">
                    <button type="submit" name="submit" class="btn btn-block btn-info "  id="loginSubmitButton" > <svg style="color: #fff;" class="svg-inline--fa fa-sign-in-alt fa-w-16 fa-fw mr-1" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="sign-in-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path>
                    </svg><!-- <i style="color: #fff;" class="fa fa-fw fa-sign-in-alt mr-1"></i> --> <span style="color: #fff;"> Sign In</span> </button>
                  </div>
                  <div class="col-md-12"> <a class=" font-size-sm" href="<?php echo base_url();?>sign-up">
                    <button type="button" name="submit" class="btn btn-block btn-info new-commiti" style="background: red!important;color: #ffffff !important;"> <svg style="color:#ffffff !important;" class="svg-inline--fa fa-sign-out-alt fa-w-16 fa-fw mr-1" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                    </svg><!-- <i style="color: #fff;" class="fa fa-fw fa-sign-out-alt mr-1"></i> --> <span style="background: red;color: #ffffff !important;"> New To Committi </span> </button>
                    </a></div>
                  <a class=" font-size-sm" href="<?php echo base_url();?>sign-up"> </a></div>
                <a class=" font-size-sm" href="<?php echo base_url();?>sign-up"> </a>
                <div class="form-group row"><a class=" font-size-sm" href="<?php echo base_url();?>sign-up"> </a>
                  <div class="col-md-6 "><a class=" font-size-sm" href="<?php echo base_url();?>sign-up"> </a><a style="color: #000;" class="btn-block-option font-size-sm" href="<?php echo base_url();?>forgot-username">Forgot Username?</a> </div>
                  <div class="col-md-6"> <a style="color: #000;" class="btn-block-option font-size-sm" href="<?php echo base_url();?>forgot-password">Forgot Password?</a> </div>
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
<!-- Login Box End -->

        <!-- Pop In Block Modal -->
        <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
            <div class="modal-dialog newsletter modal-dialog-popin" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                             
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                        <!-- Begin Mailchimp Signup Form -->
                        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                        <style type="text/css">
                          #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                          /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                             We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                        </style>
                        <div id="mc_embed_signup">
                        <form action="https://committi.us7.list-manage.com/subscribe/post?u=1e22a1b105cdaa09f20f9d2a4&amp;id=f9b09c3bd3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                          <h2>Subscribe</h2>
                        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                        <div class="mc-field-group">
                          <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                        </label>
                          <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>
                        <div class="mc-field-group">
                          <label for="mce-FNAME">First Name </label>
                          <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                        </div>
                        <div class="mc-field-group">
                          <label for="mce-LNAME">Last Name </label>
                          <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                        </div>
       <!--                  <div class="mc-field-group size1of2">
                          <label for="mce-BIRTHDAY-month">Birthday </label>
                          <div class="datefield">
                            <span class="subfield monthfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="MM" size="2" maxlength="2" name="BIRTHDAY[month]" id="mce-BIRTHDAY-month"></span> / 
                            <span class="subfield dayfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="DD" size="2" maxlength="2" name="BIRTHDAY[day]" id="mce-BIRTHDAY-day"></span> 
                            <span class="small-meta nowrap">( mm / dd )</span>
                          </div>
                        </div>   -->
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                          </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_1e22a1b105cdaa09f20f9d2a4_f9b09c3bd3" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                            </div>
                        </form>
                        </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
        <!-- END Pop In Block Modal -->

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
			<div class="row text-left">
                    <div class="col-md-4 b-bottom"> 
                        <div class="f-logo">
						<!--  <img src="<?php //echo base_url();?>assets/img/Committi-Logo2.png"> -->
						</div>
                       <!--  <p class="text-muted">Smart Borrowings....Great Investment</p>-->
						<h4 class="my-3">Committi inc.</h4>
                        <ul>
							<li>200E - 141 Brunel Road,</li>
							<li>Mississauga, ON L4Z 1X3,</li>
              <li>CANADA</li>
							<li>Phone: 1-866-266-6480</li>
							<li>Email: info@committi.com</li> 
						</ul>
						<h4 class="my-3">Our Newsletter</h4>
              <!-- <p class="newsletter1"><b>Click Here</p></b> -->
              <button style="height: 25px;width: 96px;padding: 0px;" type="button" class="btn btn-sm btn-primary push " data-toggle="modal" data-target="#modal-block-popin"><span style="text-transform: capitalize;">Click Here</span></button>
              <p>Join Our Newsletter for new offers and updates</p>
						  
           </div> 
					 <div class="col-md-4  ">
					 &nbsp;
					 </div>
                    <div class="col-md-4 f-right b-bottom"> 
                        <h4 class="my-3">Usefull Links</h4>
                        <ul class="half-w">
							<li><a href="<?php echo base_url();?>about">About us</a></li>
							<li><a href="<?php echo base_url();?>ourplans">Our Plans</a></li>
							<li><a href="<?php echo base_url();?>faq">FAQ's</a></li>
							<li><a href="<?php echo base_url();?>investing">investing</a></li> 
                            <li><a href="<?php echo base_url();?>contact">Contact us</a></li> 

						</ul>
						 <ul class="half-w">
							<li><a href=" " data-toggle="modal" data-target="#viewmore">How it works</a></li>
							<li><a href="<?php echo base_url();?>terms-conditions">Terms and conditions</a></li>
							<li><a href="<?php echo base_url();?>privacy">Privacy Policy</a></li>
							<li><a href="<?php echo base_url();?>disclaimer">Legal Disclaimer</a></li>
							<li><a href="<?php echo base_url();?>newsrelease">News Release</a></li> 
						</ul>
                    </div>
                    
					 
                </div> 
                <div class="row align-items-center copyrt">
				<div class="col-lg-4 text-center"> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                    <div class="col-lg-4 text-center">Committi inc, © 2021 Copyrights </div>
					<div class="col-lg-4 text-center"><div class="social-mediaw">
					<li><a href="#" class="fa-facebook"></a> </li> 
					<li><a href="#" class="fa-twitter"></a> </li> 
					<li><a href="#" class="fa-linkedin"></a> </li> 
					<li><a href="#" class="fa-instagram"></a> </li> 
					</div></div> 
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Modal 1-->
       
          <script src="<?php  echo base_url()?>assets/js/oneui.core.min.js"></script>
            <!-- <script src="<?php  echo base_url()?>assets/js/oneui.app.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="<?php echo base_url()?>assets/js/oneui.app.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick.min.js"></script>
        <!-- Bootstrap core JS-->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="<?php echo base_url();?>assets/mail/jqBootstrapValidation.js"></script>
        <script src="<?php echo base_url();?>assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/es6-promise/es6-promise.auto.min.js"></script>
        <script>jQuery(function(){ One.helpers('magnific-popup'); });</script>
        <script src="<?php echo base_url() ?>assets/js/pages/be_comp_dialogs.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script>jQuery(function(){ One.helpers('slick'); });</script>

        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

        
    
   

        <script type="text/javascript">
            function close_dialog()
        {
            $('#main_dialog_box').css('display','none');
        }
        </script>
       <script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="f590e3c3-5a1e-4c7e-bdba-6788d5598752";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); 
       $('#accc').on('click',function(){
        $crisp.push(["do", "chat:show"]); 
        $crisp.push(['do', 'chat:open']);
        });

     </script>
     <script>
      $(document).ready(function(){
        var minLengthprOfile = 14;
        $(".inputPhone").on('keyup',function(){
        var value = $(this).val();
       if (value.length < minLengthprOfile)
       {
        $("#inputPhone_error").text("Phone no must be 10 digits.");
        $('#contact_submit').prop("disabled", true);
    }
    else
    {
       $("#inputPhone_error").text("");
       $('#contact_submit').prop("disabled", false);
    }
});
$('.inputPhone').keypress(function(e) {              //Using input event for instant effect
 var curchr = this.value.length; 
    var curval = $(this).val();
    if (curchr == 3) {
        if( e.keyCode!=8 ){
            $(this).val("(" + curval + ")" + " ");
        }
    } else if (curchr == 9) {
        if( e.keyCode!=8 ){
            $(this).val(curval + "-");
        }
    }else if(curchr>14){
      $("#inputPhone_error").text("Phone no must be 10 digits.");
      $('#contact_submit').prop("disabled", true);
      return false;
    }else{
      $("#inputPhone_error").text("");
      $('#contact_submit').prop("disabled", false);
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) && e.keyCode !=8 ) {
        e.preventDefault();
    }                             //Set the new text
});
});
$('#inputPhone').bind("cut copy paste",function(e) {
  e.preventDefault();
 });

function close_dialoge_email_verification(){
  $('#email_verification').css('display','none');
}

function emailVerifcation(){
   $('#email_verification_modal').css('display','none');
   $.ajax({
    url:"<?php echo base_url()?>Authentication/destroyEmailVerficationSession",
    type:"POST",
    success:function(response){
      //
    }
   });
}
function loginValidation(event){
  var username=$("#username").val();
  var password=$("#password").val();
  if(username==''||password==''){
    $("#loginError").html('All Fields Are Required*').fadeIn().delay(1000).fadeOut();
    return false;
  }
  $.ajax({
    url:"<?php echo base_url()?>Authentication/loginValidation",
    type:"POST",
    async: false,
    cache: false,
    data:{'username':username,"password":password},
    success:function(response){
      if(response==1){
        event.preventDefault();
        $("#loginError").html('Invalid Username And Password').fadeIn().delay(1000).fadeOut();
      }
      else{
        form.get(0).submit();
       $('#loginForModal').submit();
      }
    }
  });
}


     </script>



    </body>
</html>



