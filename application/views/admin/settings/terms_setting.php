
<!-- Main Container -->
<?php if(isset($rights)){
    $edit_right=$rights[0]['edit_right'];
    $all_rights=$rights[0]['all_rights'];
  }
  else{
      $edit_right="";
      $all_rights="";
  }?>
<div>
        <main id="main-container">

            <!-- Hero -->
                <div class="content ">
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>setting">Setting</a></li>
                                <li class="breadcrumb-item">Edit Terms & Conditions</li>
                            </ol>
                        </nav>
                </div>

            <!-- END Hero -->
            <!-- Page Content -->

            <div class="content ">

                <!-- <form action="<?php echo base_url();?>terms-setting" method="POST"> -->
                <form action="<?php echo base_url();?>terms-setting" method="POST">

                    <div class="block-content-full">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                            <button type="submit" style="float: right;" class="btn btn-info" id="update_terms" name="update_terms" onclick="getSummerNote();">Update</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="block-content block-content-full">
                                <div class="form-group">
                                    <textarea id="summernote" class="summernote" name="simplemde"><?php echo $result_selectterms;?></textarea>
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