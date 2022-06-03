<?php 
$tier                           = $this->config->item('tier');
$bidding_cycle                  = $this->config->item('bidding_cycle');
$status                         = $this->config->item('status');
$no_of_bidding_cycle            = $this->config->item('no_of_bidding_cycle');

?>

<!-- Main Container -->
<style type="text/css">
    .page-item.active .page-link {
    z-index: 3;
    color: #110d35!important;
    background-color: #f9f9f9;
    border-color: #110d35!important;
}

</style>
            <main id="main-container">

                  <!-- Hero -->

                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Application Review</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content">

                   <div class="block">
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
                                   <div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Application form submitted successfully.<br>An email has sent to the user. </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>

                            <?php } ?>
                        <div class="block-header">
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-simple class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                                        <form action="<?php base_url()?>application-review" method="POST">
                                        <table id="application_review_table" class="mb-3">
                                            <tr>
                                                <td width="17%"> 

                                                    <input type="text" class="js-flatpickr form-control bg-white" id="from_filter_date" name="from_filter_date"   placeholder="From Date">
                                                </td>
                                                <td width="17%"> 

                                                <input type="text" class="js-flatpickr form-control bg-white" id="to_filter_date" name="to_filter_date" placeholder=" To Date" >  
                                                </td>
                       <!--                          <td width="17%">
                                                    
                                                    <select class="form-control" id="applicationStatus" name="applicationStatus" >
                                                        
                                                            <option value="" >Select Status</option>
                                                            <option value="2" >Accepted</option>
                                                            <option value="3" >Pending </option>
                                                            <option value="4" >Rejected</option>
                                                            <option value="5" >Waiting User</option>
                                                      
                                                    </select>
                                                    
                                                </td> -->
                                                <td>
                                                    <button type="submit" id="filter_submit" name="filter_submit" class=" btn btn-info">Search</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                             <!--    <table id="view_plans_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" style="width: 180%;"> -->

                                <table id="view_plans_table" class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap" style="width:100%!important">
                                <thead>
                                    <tr role="row" class="text-nowrap">
                                        <th class="text-center">ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email ID</th>
                                        <th>Plan Name</th>
                                        <th >Application Received Date</th>
                                        <th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" aria-sort="descending" >View</th>
                                        <th style="width:30%!important;">Comments</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                <?php 
                                    if ($user_application != '')
                                    {
                                        $count =1; 
                                        foreach($user_application as $view_user_application) 
                                            { 
                                    ?> 
                                                <tr role="row" class="odd">
                                                    <td class="text-center font-size-sm sorting_1"><?php echo $count++ ?></td>
                                                    <td class="text-center font-size-sm sorting_1 text-capitalize"><?php echo $view_user_application['user_application_first_name']; ?></td>
                                                    <td class="text-center font-size-sm sorting_1 text-capitalize"><?php echo $view_user_application['user_application_last_name']; ?></td>
                                                    <td class="text-center font-size-sm sorting_1"><?php echo $view_user_application['user_application_email']; ?></td>
                                                    <td class="text-center font-size-sm sorting_1"><?php echo $view_user_application['user_application_plan_name']; ?></td>
                                                    <td class="text-center font-size-sm sorting_1">
                                                        <?php 
                                                        $convertDate= date('m/d/Y', strtotime($view_user_application['user_application_posted_date']));
                                                                echo $convertDate;
                                                        ?>
                                                    </td>
                                                    <td class="text-center font-size-sm sorting_1">
                                                        <?php 

                                                        if($view_user_application['user_application_offer_sent'] == '1' && $view_user_application['user_application_plan_confirmation'] == ''){

                                                            ?>
                                                            <a  style="color: #fff;" class="badge badge-success" href="<?php echo base_url();?>view-user-application/<?php echo base64_encode($view_user_application['u_id']).'/'.base64_encode($view_user_application['user_application_plan_id']);?>">Waiting User</a>

                                                        <?php } else if ($view_user_application['user_application_plan_confirmation'] == '1') { ?>

                                                             <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>view-user-application/<?php echo base64_encode($view_user_application['u_id']).'/'.base64_encode($view_user_application['user_application_plan_id']);?>">Accepted</a>
                                                        <?php }
                                                        else if ($view_user_application['user_application_plan_confirmation'] == '0'){ ?>

                                                            <a  style="color: #fff;" class="badge badge-danger" href="<?php echo base_url();?>view-user-application/<?php echo base64_encode($view_user_application['u_id']).'/'.base64_encode($view_user_application['user_application_plan_id']);?>">Rejected</a>

                                                        <?php }else {?>
                                                            <a  style="color: #fff;" class="badge badge-info" href="<?php echo base_url();?>review-application/<?php echo $view_user_application['u_id'].'/'.$view_user_application['user_application_plan_id'];?>">Pending</a>
                                                       <?php  } ?>
                                                    </td>
                                                    <td><input type="hidden" id='u_id' value="<?php echo $view_user_application['u_id']?>"><input type="hidden" id='a_id' value="<?php echo $view_user_application['a_id']?>">
                                                        <textarea <?php if($this->session->userdata('s_admin')!='1') if($edit_right=='0' && $all_rights=='0'){ echo 'disabled';}?>  onkeyup="saveCommentdata(this,<?php echo $count ?>,<?php echo $view_user_application['u_id']?>,<?php echo $view_user_application['a_id']?>);"class="form-control user_application_comments" id="user_application_comments_<?php echo $count;?>" value=""><?php echo $view_user_application['user_application_comments'];?></textarea>
                                                    </td>
                                                </tr>
                                <?php 
                                            } 
                                    }
                                    ?>
                                    </tbody>
                                </table>
                 </div>
            </div>
        </div>
                <!-- END Page Content -->
 </main>
            <!-- END Main Container -->

<script type="text/javascript">   
function close_dialog()
{
    $('#main_dialog_box').css('display','none');
}

function saveCommentdata (that,value,uid,a_id)
{
        // var uid=$('#u_id').val();
        // var a_id=$('#a_id').val();
        


        // var comments = $(this).val().replace(/\n/g, '<br/>');
        var comments = $('#user_application_comments_'+value).val().replace(/\n/g, '<br/>');

        console.log(uid);
        console.log(a_id);
        console.log(comments);


        $.ajax({
            url:"<?php echo base_url()?>Admin/saveComment",
            type:"POST",
            data:{'comments':comments,
            'id':uid,
            'a_id':a_id
          },
          success:function(response){
            }
       });

  
}
</script>