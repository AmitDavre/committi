
<!-- Main Container -->
<div>
        <main id="main-container">

            <!-- Hero -->
                <div class="content ">
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>setting">Setting</a></li>
                                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>faqs-setting-page">FAQ's</a></li>
                                <li class="breadcrumb-item">Edit FAQ's-2</li>
                            </ol>
                        </nav>
                </div>

            <!-- END Hero -->
            <!-- Page Content -->

            <div class="content ">

                <!-- <form action="<?php echo base_url();?>terms-setting" method="POST"> -->
                <form action="<?php echo base_url();?>faqs-setting-2" method="POST">

                    <div class="block-content-full">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            <button type="submit" style="float: right;" class="btn btn-info" id="update_faqs_2" name="update_faqs_2" onclick="getSummerNote();">Update</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="block-content block-content-full">
                                <div class="form-group">
                                    <textarea id="summernote" class="summernote" name="faqs_2"><?php echo $setting_faqs_2;?></textarea>
                                </div>
                            </div>   
                        </div>

                    </div>
                <!-- </form> -->
            </div>
            <!-- END User Profile -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

<script type="text/javascript">
    function getSummerNote()
    {

    }
</script>