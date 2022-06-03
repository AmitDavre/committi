<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Committi</title>
        

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/media/favicons/apple-touch-icon-180x180.png">

        <!-- END Icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url(); ?>assets/css/oneui.min.css">

    </head>
    <style type="text/css">
        .btn-info,.bg-info {
        background-color: #110d35!important;
    }
    </style>
    <body>

        <div id="page-container">



            <!-- Main Container -->

            <main id="main-container">

                <!-- Page Content -->

                <div class="bg-image" style="background-image: url('assets/media/photos/photo6@2x.jpg');">

                    <div class="hero-static bg-white-95">

                        <div class="content">

                            <div class="row justify-content-center">

                                <div class="col-md-8 col-lg-6 col-xl-4">

                                    <!-- Reminder Block -->

                                    <div class="block block-themed block-fx-shadow mb-0">

                                        <div class="bg-info block-header">

                                            <h3 style="color: #fff;" class="block-title">Username Reminder</h3>

                                            <div class="block-options">

                                                <a style="color: #fff;" class="btn-block-option" href="<?php echo base_url(); ?>login" data-toggle="tooltip" data-placement="left" title="Sign In">

                                                    <i style="color: #fff;" class="fa fa-sign-in-alt"></i>

                                                </a>

                                            </div>

                                        </div>

                                        <div class="block-content">

                                            <div class="p-sm-3 px-lg-4 py-lg-5">

                                                <h1 class="mb-2"><img src="<?php echo base_url(); ?>assets/img/logo.jpg" width="100%"></h1>

                                                <p>Please provide your last 3 digits of SIN & Date Of Birth.</p>
                             
                                                <?php if($this->session->flashdata('error')) { ?>
                                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-times"></i>
                                                        </div>
                                                        <div class="flex-fill ml-3">
                                                            <p class="mb-0"><?php echo $this->session->flashdata('error'); ?></p>
                                                        </div>
                                                    </div>
                                                <?php }else if($this->session->flashdata('success')){ ?>
                                                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                                                        <div class="flex-00-auto">
                                                            <i class="fa fa-fw fa-check"></i>
                                                        </div>
                                                        <div class="flex-fill ml-3">
                                                            <p class="mb-0"><?php echo $this->session->flashdata('success'); ?></p>
                                                        </div>
                                                    </div>

                                                <?php } ?>
                                                <form action="<?php echo base_url() ?>username" method="POST" enctype="multipart/form-data" >

                                                    <div class="form-group py-3">
                                                        <label>Sin</label>
                                                        <input type="text" class="form-control form-control-lg form-control-alt" id="sin" name="sin" placeholder="" maxlength="3" style="border-color:#80808038 !important">

                                                    </div>
                                                    <div class="form-group py-3">
                                                        <label>Date Of Birth</label>
                                                        <input type="date" class="form-control form-control-lg form-control-alt" id="date" name="date" placeholder="Date Of Birth" style="border-color:#80808038 !important;">

                                                    </div>

                                                    <div class="form-group row">

                                                        <div class="col-md-6 ">

                                                            <button type="submit" name="submit" id="submit" class="btn btn-block btn-info">

                                                                <i style="color: #fff;" class="fa fa-fw fa-envelope mr-1"></i> <span style="color: #fff;"> Submit </span>

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

        <script src="<?php echo base_url(); ?>assets/js/oneui.core.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/oneui.app.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pages/op_auth_reminder.min.js"></script>
    </body>

</html>
