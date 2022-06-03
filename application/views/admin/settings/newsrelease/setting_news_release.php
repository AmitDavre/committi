<style type="text/css">
.anchor_css {
    cursor: default;
    text-decoration: none;
    color: black;
}
</style>
<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->
    <div class="content ">
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>setting">Setting</a>
                </li>
                <li class="breadcrumb-item">News Release</li>
            </ol>
        </nav>
    </div>

    <!-- END Hero -->
    <!-- Page Content -->

    <div class="content content">
        <div class="block">
            <div id="checkRightsMsg"></div>
            <div id="successMsg"></div>
            <p id="alert_message_trans_desc"></p>
            <p id="alert_message_trans_desc_error"></p>
            <p id="alert_message_trans_desc_del"></p>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo base_url()?>setting-news-release" style="float:right;"
                            class="btn btn-info text-white" id="add_news_release" name="update_news_release">Add New FAQ's</a>
                    </div>
                </div>


                <div class="row">
                    <?php if($setting_news_release_array){
                                $count=0;
                                foreach($setting_news_release_array as $faq) {
                                    $count++;
                                    $news_release_settings_id=base64_encode($faq->news_release_settings_id);
                                    ?>
                    <div class="col-sm-3">
                        <a class="text-muted" href="<?php echo base_url('setting-news-release/').$news_release_settings_id?>">
                            <div class="block invisible" data-toggle="appear">
                                <div class="block-content block-content-full">
                                    <div class="py-4 text-center">
                                        <div class="item item-2x item-rounded bg-success text-white mx-auto">
                                            <i class="fa fa-2x fa-sticky-note"></i>
                                        </div>
                                        <div class="font-size-h4 font-w600 pt-3 mb-0">News Release -<?php echo $count;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } } ?>
                </div>
            </div>

        </div>
    </div>
    <!-- END User Profile -->
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
