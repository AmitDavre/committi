<?php 
if($session_data['login_type'] == 'admin'){
    $id=$session_data['id'];
    $CI =& get_instance();
    $CI->load->model('User_model');
    $tab_array=array();
    $check_tab_rightss=$this->User_model->query("select * from admin_accesses inner join tab_list on admin_accesses.admin_accesses_tab_list_id = tab_list.tab_list_id where user_id='".$id."' and (view_right='1' or edit_right='1' or all_rights='1')");
      if($check_tab_rightss->num_rows()>0){
          $check_tab_rights=$check_tab_rightss->result_array();
        foreach($check_tab_rights as $tab_right){
               array_push($tab_array,$tab_right['tab_name']);
        }
      }

      ?> 

<!------------------------------------------------ ADMIN HEADER STARTS -------------------------------------->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Committi</title>

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url()?>assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/dropzone/dist/min/dropzone.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/datatables/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/magnific-popup/magnific-popup.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/simplemde/simplemde.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url()?>assets/css/oneui.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <style type="text/css">
    .content-side.content-side-full {
        background-color: #fff!important;
    }
    .simplebar-content-wrapper {
        background-color: #fff!important;
    }
    .dropdown-item.active, .dropdown-item:active {
        color: #fff;
        text-decoration: none;
        background-color: #110d35!important;
    }
     #page-container.sidebar-dark #sidebar {
        color: #ebebeb;
        background-color: #fff!important;
        box-shadow: none;
    }
    .btn-info,.bg-info,.badge-info {
        background-color: #110d35!important;
    }
    .page-item.active .page-link {
    z-index: 3;
    color: #110d35!important;
    background-color: #f9f9f9;
    border-color: #110d35!important;
}

   /*New Css Added*/
    .table thead th {
    font-size: .7rem!important;
}

   div.dataTables_wrapper div.dataTables_length label {
    font-size: .7rem!important;
    }

  div.dataTables_wrapper div.dataTables_filter label{
      font-size: .7rem!important;
  }

  .font-size-sm {
    font-size: .7rem!important;
}

.btn-group-sm>.btn, .btn-sm {
    padding: .1rem .5rem!important;
    font-size: .7rem!important;
    }

    div.dataTables_wrapper div.dataTables_info{
        font-size: .7rem!important;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
      font-size: .7rem!important;  
    }
    body{
        font-size: 0.8rem!important;
    }

    .form-control {
    font-size: 0.8rem!important;
}
.btn{
    font-size: 0.8rem!important;
  padding: .2rem 1.5rem!important;;
}

.nav-tabs-block .nav-link{
     font-size: 0.8rem!important;
}

.breadcrumb.breadcrumb-alt .breadcrumb-item {
    font-size: 0.8rem!important;
}

.block-title {
    font-size: .7rem!important;
    }

    .block-header{
        padding: .4rem 1.25rem;
    }

 .dropdown-header {
      font-size: 0.7rem!important;
 }

 .h3, h3 {
    font-size: 1.25rem!important;
}

.h4, h4 {
    font-size: 0.80rem!important;
}

.font-size-h2 {
    font-size: 1.0rem!important;
}

.nav-main-link{
     font-size: 0.79rem!important;
}
.input-group-text {
    padding: .2rem .5rem!important;
    font-size: 0.8rem!important;
    }

    .nav-tabs-block .nav-link:focus,
.nav-tabs-block .nav-link:hover {
    color: #120d34 !important;
    background-color: #f9f9f9;
    border-color: transparent;
}

.nav-tabs-block .nav-item.show .nav-link, .nav-tabs-block .nav-link.active 
{
    color: #120d34 !important;
}

/*End New Css Added*/

    </style>
    <body>
        <div id="page-loader" class="show"></div>
        <!-- Page Container -->
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay" class="font-size-sm">
                <!-- Side Header -->
                <div class="content-header border-bottom">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="<?php echo base_url()?>assets/media/avatars/avatar10.jpg" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="link-fx text-dark font-w600" href="javascript:void(0)">Adam McCoy</a>
                    </div>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="ml-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-fw fa-times text-danger"></i>
                    </a>
                    <!-- END Close Side Overlay -->
                </div>
                <!-- END Side Header -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="#">
                        <!-- <img src="<?php echo base_url();?>assets/media/clogo.png " width=40px;> -->
                        <span class="smini-hide">
                            <span class="font-w700 font-size-h5"><img src="<?php echo base_url();?>assets/img/logo.jpg" width="133px"></span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Extra -->
                    <div>
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Extra -->
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">

                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="<?php echo base_url()?>dashboard">
                                <i class="text-black nav-main-link-icon si si-speedometer"></i>
                                <span class="text-black nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <?php if(in_array('Profile',$tab_array)|| $this->session->userdata('s_admin')=='1'){?>
                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>profile">
                                <i class="text-black nav-main-link-icon si si-badge"></i>
                                <span class="text-black nav-main-link-name">Profile</span>
                            </a>
                        </li>
                    <?php } if(in_array('Plans',$tab_array)|| $this->session->userdata('s_admin')=='1'){?>
                         <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="text-black nav-main-link-icon si si-energy"></i>
                                <span class="text-black nav-main-link-name">Plans</span>
                            </a>

                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo base_url();?>create-plan">
                                        <span class="text-black nav-main-link-name">Create Plan</span>
                                    </a>
                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo base_url();?>view-plans">
                                        <span class="text-black nav-main-link-name">View Plans</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo base_url();?>tier">
                                        <span class="text-black nav-main-link-name">Tier</span>
                                    </a>
                                </li> -->

                            </ul>

                        </li>
                    <?php } if(in_array('Application Review',$tab_array)|| $this->session->userdata('s_admin')=='1'){?>
                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>application-review">
                                <i class="text-black nav-main-link-icon si si-note"></i>
                                <span class="text-black nav-main-link-name">Application Review</span>
                            </a>
                        </li>
                    <?php } ?>
      <!--                   <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>statements">
                                <i class="text-black nav-main-link-icon si si-note"></i>
                                <span class="text-black nav-main-link-name">Statements</span>
                            </a>
                        </li> -->
                         <?php  if(in_array('Manage Users',$tab_array)|| $this->session->userdata('s_admin')=='1'){ ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>manage-users">
                                <i class="text-black nav-main-link-icon si si-users"></i>
                                <span class="text-black nav-main-link-name">Manage Users</span>
                            </a>
                        </li>
                        <?php } if(in_array('Master Transaction',$tab_array)|| $this->session->userdata('s_admin')=='1'){ ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>manage-transactions">
                                <i class="text-black nav-main-link-icon si si-docs"></i>
                                <span class="text-black nav-main-link-name">Master Transaction</span>
                            </a>
                        </li>  

                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>master-statements">
                                <i class="text-black nav-main-link-icon si si-docs"></i>
                                <span class="text-black nav-main-link-name">Master Statements</span>
                            </a>
                        </li>
                    <?php }  if(in_array('Notes',$tab_array)|| $this->session->userdata('s_admin')=='1'){ ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>notes">
                                <i class="text-black nav-main-link-icon si si-users"></i>
                                <span class="text-black nav-main-link-name">Notes</span>
                            </a>
                        </li>
                    <?php }  if(in_array('Reports',$tab_array)|| $this->session->userdata('s_admin')=='1'){ ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>admin-reports">
                                <i class="text-black nav-main-link-icon si si-note"></i>
                                <span class="text-black nav-main-link-name">Reports</span>
                            </a>
                        </li>
                    <?php }  if(in_array('Bidding Monitor',$tab_array)|| $this->session->userdata('s_admin')=='1'){ ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>bidding-monitor">
                                <i class="text-black nav-main-link-icon si si-screen-desktop"></i>
                                <span class="text-black nav-main-link-name">Bidding Monitor</span>
                            </a>
                        </li> 
                    <?php } ?>
                     <?php if($this->session->userdata('s_admin')=='1') {?>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="text-black nav-main-link-icon si si-users"></i>
                                <span class="text-black nav-main-link-name">Admin Management</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo base_url();?>create-admin">
                                        <span class="text-black nav-main-link-name">Create Admin</span>
                                    </a>
                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo base_url();?>view-admin-list">
                                        <span class="text-black nav-main-link-name">View Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </li> 
                        <?php } ?>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?php echo base_url()?>payment-activities">
                               <i class="text-black nav-main-link-icon si si-credit-card"></i>
                                <span class="text-black nav-main-link-name">Payment Activity</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
						
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded" src="<?php if($session_data['profile_image']==''){echo base_url('assets/media/avatars/avatar10.jpg'); } else { echo base_url('assets/media/profile_images/').$session_data['profile_image'];}?>" alt="Header Avatar" style="width:18px;">
                                <span class="d-none d-sm-inline-block ml-1 text-capitalize"><?php echo $session_data['first_name'];?></span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-info">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php if($session_data['profile_image']==''){ echo base_url('assets/media/avatars/avatar10.jpg');}else{ echo base_url('assets/media/profile_images/').$session_data['profile_image'];}?>" alt="">
                                </div>
                                <div class="p-2">
                                    <h5 class="dropdown-header text-uppercase">User Options</h5>
 
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url()?>profile">
                                        <span>Profile</span>
                                        <span>
                                            <!-- <span class="badge badge-pill badge-success">1</span> -->
                                            <i class="si si-user ml-1"></i>
                                        </span>
                                    </a>
                                    <?php if(in_array('Settings',$tab_array)|| $this->session->userdata('s_admin')=='1'){?>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url();?>setting">
                                        <span>Settings</span>
                                        <i class="si si-settings"></i>
                                    </a>
                                <?php } ?>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <h5 class="dropdown-header text-uppercase">Actions</h5>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url();?>logout">
                                        <span>Log Out</span>
                                        <i class="si si-logout ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Notifications Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="si si-bell"></i>
                                <span class="badge badge-info badge-pill" id="admin_notification_count"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm pre-scrollable" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-2 bg-info text-center">
                                    <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                                </div>
                                <ul class="nav-items mb-0" id="admin_notification">

                                    
                                </ul>
                                <div class="p-2 border-top" onclick="delete_all_admin_notification();">
                                    <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-times mr-1"></i> Clear All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Notifications Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->



                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-white">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->


<!------------------------------------------------ ADMIN HEADER ENDS --------------------------------------------------------->
<?php } else if($session_data['login_type'] == 'user'){ ob_start();?>


<!------------------------------------------------ USER HEADER STARTS -------------------------------------------------------->

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Committi</title>


        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url()?>assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->



        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/dropzone/dist/min/dropzone.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/datatables/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/magnific-popup/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/slick-carousel/slick-theme.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/sweetalert2/sweetalert2.min.css">

         <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
      <!--   <link href="http://rs200.whb.tempwebhost.net/~dhrivum5/committi/assets/css/styles.css" rel="stylesheet" /> -->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        

        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?php echo base_url()?>assets/css/oneui.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <style type="text/css">
    .content-side.content-side-full {
        background-color: #fff!important;
    }
    .simplebar-content-wrapper {
    background-color: #fff!important;
    }
    .dropdown-item.active, .dropdown-item:active {
        color: #fff;
        text-decoration: none;
        background-color: #110d35!important;
    }
    #page-container.sidebar-dark #sidebar {
        color: #ebebeb;
        background-color: #fff!important;
        box-shadow: none;
    }
     .btn-info,.bg-info,.badge-info {
        background-color: #110d35!important;
    }

    .content-header.bg-white-5 {
    background: white !important;
}
body .bg-white-5 {
    background-color: rgb(255 255 255)!important;
}

.content-side-full .nav-main-submenu li.nav-main-item:hover {
    background: #d9d9d9;
}
.content-side-full .nav-main-submenu li.nav-main-item  {
    padding-left:43px;
}
.content-side-full .nav-main-submenu  {
    background: #ffffff !important;
}

.page-item.active .page-link {
    z-index: 3;
    color: #110d35!important;
    background-color: #f9f9f9;
    border-color: #110d35!important;
}





   /*New Css Added*/
    .table thead th {
    font-size: .7rem!important;
}

   div.dataTables_wrapper div.dataTables_length label {
    font-size: .7rem!important;
    }

  div.dataTables_wrapper div.dataTables_filter label{
      font-size: .7rem!important;
  }

  .font-size-sm {
    font-size: .7rem!important;
}

.btn-group-sm>.btn, .btn-sm {
    padding: .1rem .5rem!important;
    font-size: .7rem!important;
    }

    div.dataTables_wrapper div.dataTables_info{
        font-size: .7rem!important;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
      font-size: .7rem!important;  
    }
    body{
        font-size: 0.8rem!important;
    }

    .form-control {
    font-size: 0.8rem!important;
}
.btn{
    font-size: 0.8rem!important;
    padding: .1rem 1.5rem!important;;
}

.nav-tabs-block .nav-link{
     font-size: 0.8rem!important;
}

.breadcrumb.breadcrumb-alt .breadcrumb-item {
    font-size: 0.8rem!important;
}

.block-title {
    font-size: .7rem!important;
    }

    .block-header{
        padding: .4rem 1.25rem;
    }

 .dropdown-header {
      font-size: 0.7rem!important;
 }

 .h3, h3 {
    font-size: 1.25rem!important;
}

.h4, h4 {
    font-size: 0.80rem!important;
}

.font-size-h2 {
    font-size: 1.0rem!important;
}

.nav-main-link{
     font-size: 0.79rem!important;
}

.input-group-text {
    padding: .2rem .5rem!important;
    font-size: 0.8rem!important;
    }

    .nav-tabs-block .nav-link:focus,
.nav-tabs-block .nav-link:hover {
    color: #120d34 !important;
    background-color: #f9f9f9;
    border-color: transparent;
}
.nav-tabs-block .nav-item.show .nav-link, .nav-tabs-block .nav-link.active 
{
    color: #120d34 !important;
}
/*End New Css Added*/
    </style>
    <body>
        <!-- Page Container -->
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay" class="font-size-sm">
                <!-- Side Header -->
                <div class="content-header border-bottom">
                    <!-- User Avatar -->
                    <a class="img-link mr-1" href="javascript:void(0)">
                        <img class="img-avatar img-avatar32" src="<?php echo base_url()?>assets/media/avatars/avatar10.jpg" alt="">
                    </a>
                    <!-- END User Avatar -->

                    <!-- User Info -->
                    <div class="ml-2">
                        <a class="link-fx text-dark font-w600" href="javascript:void(0)">Adam McCoy</a>
                    </div>
                    <!-- END User Info -->

                    <!-- Close Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="ml-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-fw fa-times text-danger"></i>
                    </a>
                    <!-- END Close Side Overlay -->
                </div>
                <!-- END Side Header -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="#">
                        <span class="smini-hide">
                            <span class="font-w700 font-size-h5"><img src="<?php echo base_url();?>assets/img/logo.jpg" width="133px"></span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Extra -->
                    <div>
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none btn btn-sm btn-dual ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Extra -->
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="<?php echo base_url()?>dashboard">
                                <i class=" text-black nav-main-link-icon si si-speedometer"></i>
                                <span class="text-black nav-main-link-name">User Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="text-black nav-main-link-icon si si-user"></i>
                                <span class=" text-black nav-main-link-name">Profile</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo base_url() ?>profile">
                                        <i class="text-black nav-main-link-icon si si-note"></i>
                                        <span class="text-black nav-main-link-name">Edit Profile</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo base_url() ?>change-password">
                                        <i class="text-black nav-main-link-icon si si-note"></i>
                                        <span class="text-black nav-main-link-name">Change Password</span>
                                    </a>
                                </li>
                            </ul>
                         </li>


                        <!-- <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo base_url() ?>plans">
                                        <i class="text-black nav-main-link-icon si si-notebook"></i>
                                        <span class="text-black nav-main-link-name">Plans</span>
                                    </a>
                        </li> -->

                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>transactions">
                                <i class="text-black nav-main-link-icon si si-drawer"></i>
                                <span class="text-black nav-main-link-name">My Committi's</span>
                            </a>
                        </li>

           <!--              <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="text-black nav-main-link-icon si si-notebook"></i>
                                <span class="text-black nav-main-link-name">Transactions/Plans</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="<?php echo base_url() ?>transactions">
                                        <i class="text-black nav-main-link-icon si si-notebook"></i>
                                        <span class="text-black nav-main-link-name">My Plans</span>
                                    </a>
                                </li>
                            </ul>
                         </li> -->

                        <!-- <li class="nav-main-item">
                            <a class="nav-main-link "  href="#">
                                <i class="text-black nav-main-link-icon si si-wallet   "></i>
                                <span class="text-black nav-main-link-name">Payment Accounts</span>
                            </a>
                        </li> -->

                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>available-plans">
                                <i class="text-black nav-main-link-icon si si-social-dropbox"></i>
                                <span class="text-black nav-main-link-name">Now Enrolling</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>invite">
                                <i class="text-black nav-main-link-icon si si-share"></i>
                                <span class="text-black nav-main-link-name">Invite a friend</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>application-status">
                                <i class="text-black nav-main-link-icon si si-hourglass"></i>
                                <span class="text-black nav-main-link-name">Application Status</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>user-notes">
                                <i class="text-black nav-main-link-icon si si-envelope"></i>
                                <span class="text-black nav-main-link-name">Messages/Alerts</span>
                            </a>
                        </li>  

                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>payments">
                                <i class="text-black nav-main-link-icon si si-credit-card"></i>
                                <span class="text-black nav-main-link-name">Payment</span>
                            </a>
                        </li>                         

                        <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>view-statement">
                                <i class="text-black nav-main-link-icon si si-note"></i>
                                <span class="text-black nav-main-link-name">Statements</span>
                            </a>
                        </li> 
                         <!--  <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>reports">
                                <i class="text-black nav-main-link-icon si si-note"></i>
                                <span class="text-black nav-main-link-name">Reports</span>
                            </a>
                        </li>  -->
         

  <!--                       <li class="nav-main-item">
                            <a class="nav-main-link "  href="<?php echo base_url()?>test-page">
                                <i class="nav-main-link-icon si si-envelope"></i>
                                <span class="nav-main-link-name">Test Page</span>
                            </a>
                        </li>
 -->
                        

                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
					 <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
						
						 
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded" src="<?php if($session_data['profile_image']==''){echo base_url('assets/media/avatars/avatar10.jpg'); } else { echo base_url('assets/media/profile_images/').$session_data['profile_image'];}?>" alt="Header Avatar" style="width: 18px;">
                                <span class="d-none d-sm-inline-block ml-1 text-capitalize"><?php echo $session_data['first_name'];?></span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-info">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php if($session_data['profile_image']==''){ echo base_url('assets/media/avatars/avatar10.jpg'); } else { echo base_url('assets/media/profile_images/').$session_data['profile_image'];}?>" alt="">
                                </div>
                                <div class="p-2">
                                    <h5 class="dropdown-header text-uppercase">User Options</h5>

                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url()?>profile">
                                        <span>Profile</span>
                                        <span>
                                            <!-- <span class="badge badge-pill badge-success">1</span> -->
                                            <i class="si si-user ml-1"></i>
                                        </span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span>Settings</span>
                                        <i class="si si-settings"></i>
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <h5 class="dropdown-header text-uppercase">Actions</h5>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo base_url();?>logout">
                                        <span>Log Out</span>
                                        <i class="si si-logout ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Notifications Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="si si-bell"></i>
                                <span class="text-white badge badge-info badge-pill" id="user_notification_count"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm pre-scrollable" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-2 bg-info text-center">
                                    <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                                </div>
                                <ul id= "user_notification" class="nav-items mb-0">
                                    
                                </ul>
                                <div class="p-2 border-top" onclick="delete_all_user_notification();">
                                    <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-times mr-1"></i> Clear All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END Notifications Dropdown -->
                    </div>
                    <!-- END Right Section --> 
                </div>
                <!-- END Header Content -->



                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-white">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

<!------------------------------------------------ USER HEADER ENDS  ------------------------------------------------------------>



<?php }?>
           
