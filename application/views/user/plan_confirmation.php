<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Confirmation</title>
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url(); ?>assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url(); ?>assets/css/oneui.min.css">
        <!-- END Stylesheets -->
    </head>
    <style type="text/css">
    .hero-static {
    min-height: 0vh;
    }
     .btn-info,.bg-info,.badge-info {
        background-color: #110d35!important;
    }
    </style>
    <body>
        <!-- Page Container -->
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="hero-static d-flex align-items-center">
                    <div class="w-100">
                        <!-- Status Section -->
                        <div class="bg-white">
                            <div class="content content-full">
                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                                        <!-- Header -->
                                        <div class="text-center mb-5">
                                            <p class="mb-2">
                                                <!-- <i class="fa fa-2x fa-circle-notch text-primary"></i> -->
                                                <img src="<?php echo base_url(); ?>assets/media/Logo-new3.gif" width="50%">
                                            </p>
                                            <h1 class="h4 mb-1">
                                                Plan Confirmation Page
                                            </h1>
                                            <h2 class="h6 font-w400 text-muted mb-3">
                                                Accept or Reject the offer.
                                            </h2>
                                        </div>
                                        <!-- END Header -->

                                        <!-- Services -->
                                        <form  action="<?php echo base_url();?>update-user" method="POST">
                                            <input type="hidden" name="hidden_url_user_id" id="hidden_url_user_id" value="<?php echo $url_data_2; ?>" >
                                            <input type="hidden" name="hidden_url_plan_id" id="hidden_url_plan_id" value="<?php echo $url_data_3; ?>" >
                                            <div class="d-flex justify-content-between">
                                                <button type="submit" name="reject" id="reject" class="btn btn-lg btn-secondary"><i class="fa fa-times mr-1"></i> Reject</button>

                                                <button type="submit" name="accept" id="accept" class="btn btn-lg btn-info"><i class="fa fa-check"></i> <span class="d-none d-sm-inline-block ml-1">Accept</span></button>
                                            </div>
                                        </form>
                                        <hr>
                                        <!-- END Services -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Status Section -->

                        <!-- Footer -->
                        <div class="content content-full font-size-sm text-muted text-center">
                            <strong>Committi</strong> &copy; <span data-toggle="year-copy"></span>
                        </div>
                        <!-- END Footer -->
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
        <script src="<?php echo base_url(); ?>assets/js/oneui.core.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/oneui.app.min.js"></script>
    </body>
</html>
