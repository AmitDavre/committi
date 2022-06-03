<?php if($status == 'true'){ ?>

<!DOCTYPE html>
<html lang="en">
   <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Forogt Password </title>

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url() ?>assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url() ?>assets/css/oneui.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
       
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-i mage" style="background-image: url('<?php echo base_url() ?>assets/media/photos/photo6@2x.jpg');">
                    <div class="hero-static bg-white-95">
                        <div class="content">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-4">
                                    <!-- Reminder Block -->
                                    <div class="block block-themed block-fx-shadow mb-0">
                                        <div class="bg-info block-header" style="background-color:#110d35!important;">
                                            <h3 style="color: #fff;" class="block-title">Reset Password</h3>
                                            <div class="block-options">
                                                <a class="btn-block-option" href="<?php echo base_url() ?>login" data-toggle="tooltip" data-placement="left" title="Sign In">
                                                    <i style="color: #000;" class="fa fa-sign-in-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                                <h1 class="mb-2"><img src="<?php echo base_url(); ?>assets/img/logo.jpg" width="100%"></h1>

                                                <?php if($msgerror){ ?>
                                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times"></i>
                                                        </div>
                                                        <div class="flex-fill ml-3">
                                                            <p class="mb-0"><?php echo $msgerror; ?></p>
                                                        </div>
                                                    </div>
                                                <?php }else if($msg){ ?>
                                                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-check"></i>
                                                        </div>
                                                        <div class="flex-fill ml-3">
                                                            <p class="mb-0"><?php echo $msg; ?></p>
                                                        </div>
                                                    </div>

                                                <?php } ?>

                                        
                                                 
                                               <form action="<?php echo base_url() ?>newPassword" method="POST" enctype="multipart/form-data" >
                                                <input type="hidden" name="UserId" value="<?php echo $id;?>">
                                                    <div class="form-group py-3">
                                                        <input type="password"  id="new_password" name="new_password" minlength="8" class="passworduser form-control" placeholder="New Password" required onkeyup ="validatePassword();">
                                                    </div>
                                                    <p id="password_strength"></p>

                                                    <div class="form-group py-3">
                                                        <input type="password" id="re_password" name="re_password" class="form-control" placeholder="Confirm Password" required>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12 ">
                                                            <button name="submit" id="submit" type="submit" class="btn btn-info" style="color: #fff;background-color:#110d35!important;">
                                                                <i style="color: #fff;" class="fa fa-fw fa-key mr-1"></i> <span  style="color: #fff;background-color:#110d35!important;">Confrim Password </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END Reminder Form -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Reminder Block -->
                                </div>
                            </div>
                        </div>
                        <div class="content content-full font-size-sm text-muted text-center">
                            <strong>Committi</strong> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->


        <script src="<?php echo base_url() ?>assets/js/oneui.core.min.js"></script>

      
        <script src="<?php echo base_url() ?>assets/js/oneui.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="<?php echo base_url() ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url() ?>assets/js/pages/op_auth_reminder.min.js"></script>
    </body>
</html>

<?php }else{ ?>

    <h2 style="color:red;text-align: center;"><strong><?php echo $msg;?></strong></h2>

<?php } ?>

<script type="text/javascript">

$(document).on('keyup', '.passworduser', function(){
    var txtInput = $(this).val();  
    var color="Red";
    var uppercase = /[A-Z]/ ;
    var lowercase = /[a-z]/ ;
    var number    = /[0-9]/ ;
    var special   = /[\W]{1,}/ ; 
    var pswd_length    = txtInput.length < 8;
    if(!uppercase.test(txtInput) || !lowercase.test(txtInput) || !number.test(txtInput) || !special.test(txtInput) || pswd_length) 
    {
        $('#password_strength').html('Password must be at least 8 characters. Password must contain at least one upper case letter, one lower case letter and one digit.');
        $("#password_strength").css("color", color); 
        //return false;

        $('#re_password').prop("disabled", true);
        $('#submit').prop("disabled", true);
    } 
    else 
    {
        $('#password_strength').html("");
        $('#re_password').prop("disabled", false);
        $('#submit').prop("disabled", false);
    }

});
</script>