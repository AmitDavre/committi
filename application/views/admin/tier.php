<?php 
$tier                           = $this->config->item('tier');
$bidding_cycle                  = $this->config->item('bidding_cycle');
$tier                           = $this->config->item('tier');
?>
<!-- Main Container -->
<style type="text/css">
.custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: #110d35;
    background-color: #110d35;
}
</style>
            <main id="main-container">

                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Plans</li>
                                    <li class="breadcrumb-item">Tier</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content-full">

                    <!-- User Profile -->

                    <div class="block">
                        <div id="ajax_div_tier">
                        </div>
                        <div class="block-header">

                            <h3 class="block-title">Tier Details</h3>

                        </div>

                        <div class="block-content">


                                <div class="col-md-12 row push">
                                    
                                    <div class="col-md-4 ">

                                        <div class="form-group">

                                            <label for="one-profile-edit-username">Select Tier </label>
                                            <select  class="form-control" id="tier_value" name="tier_value" onchange="get_tier_details();">
                                                <option value="">Please Select</option>
                                             <?php
                                                // Iterating through the tier array
                                                foreach($tier as $key =>$item){
                                                ?>
                                                <option value="<?php  echo strtolower($key);?>" >
                                                <?php echo $item;?>
                                                </option>
                                                <?php
                                                }
                                            ?>
                                            </select>

                                        </div>

                                        <div class="form-group">

                                            <label for="one-profile-edit-username">Risk Factor (%)</label>
                                            <input type="text" class="form-control" id="total_tier_members" name="total_tier_members" placeholder="" value="" >

                                        </div>
                                       

                                     <div class="form-group">

                                            <button style="float: left;color: #fff;" type="button" name="submit" id="submit"  class="btn  btn-info" onclick="total_tier_members_ajax();">

                                                <i style="color: #fff;" class="fa fa-check mr-1" ></i> Submit

                                            </button>

                                        </div>
                                    </div>
      

                                </div>

                            


                            <br><h3 class="block-title">Tier Details</h3><br>
                            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="tierViewTable" class="table table-bordered table-striped table-vcenter js-dataTable-simple dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" width="100%">
                                            <thead>
                                                <tr role="row">
                                                    <th style="width: 20%;" class="text-center" >Tier</th>
                                                    <th style="width: 40%;" class="text-center">Risk Factor (%)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- END User Profile -->

                </div>

                <!-- END Page Content -->

            </main>

            <!-- END Main Container -->

<script type="text/javascript">
function total_tier_members_ajax()
{
    var tier_value          = $('#tier_value').find(":selected").val();

    var total_tier_members  = $('#total_tier_members').val();

    $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."Admin/insert_tier_values";?>',
      data: {'tier_value':tier_value,'total_tier_members':total_tier_members},
      success: function(response){

        var data = JSON.parse(response);

        if(response== '1')
        {
            var div = '<div id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div><span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span><div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div><div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Success</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Tier Members Updated Successfully </div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div> ';

            $('#ajax_div_tier').append(div); 


        }
        else if(response== '0')
        {
            var div ='  <div  id="main_dialog_box" class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;"><div class="swal2-icon-content">!</div></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">Warning</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">Select Tier And Total Members To Update</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm btn btn-success m-1" aria-label="" style="display: inline-block;" onclick="close_dialog();">OK</button><button type="button" class="swal2-cancel btn btn-danger m-1" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>';

            $('#ajax_div_tier').append(div); 
        }

      }
    });
}

function get_tier_details()
{
    var tier_value  = $('#tier_value').find(":selected").val();


    $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."Admin/get_tier_table_value";?>',
      data: {'tier_value':tier_value},
      success: function(response){

        var data = JSON.parse(response);
        
        if(response != '')
        {
            $("#tierViewTable > tbody").html("");
            $('#total_tier_members').val(data.tier_total_members); 

            var tr= '<tr><td class="text-center">'+data.tier_id+'</td><td class="text-center">'+data.tier_total_members+'</td></tr> ';

                $('#tierViewTable tbody').append(tr);
        }
        else if(response == '1')
        {
            $("#tierViewTable > tbody").html("");
            $('#total_tier_members').val(''); 
        }    
      }
    });
}

function close_dialog()
{
    $('#main_dialog_box').css('display','none');
    location.reload();
}
</script>

