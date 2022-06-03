<!-- Main Container -->
            <main id="main-container">

                  <!-- Hero -->

                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a class="text-muted" >Manage Transactions </li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->



                <!-- Page Content -->

                <div class="content content">

                   <div class="block">
                    <div class="block-header">
                            <h3 class="block-title">Generate Statements</h3>
                        </div>
                        <div class="block-content">
                            
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade active show" id="btabs-animated-fade-home" role="tabpanel">
                                    <form  method="POST" enctype="multipart/form-data" >
                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-4">
                                            <label for="example-select">Select User</label> 
                                             <select class="form-control" id="hidden_user_id_statement" name="hidden_user_id_statement" >
                                              <option value="">Please Select</option>
                                                <?php
                                                    // Iterating through the tier array
                                                if($users != '')
                                                {
                                                    foreach($users as $key =>$item)
                                                    {
                                                    ?>
                                                        <option value="<?php  echo $item['id'];?>" >
                                                            <?php echo $item['first_name'].' '.$item['last_name'];?>
                                                        </option>

                                                <?php } }?>
                                            </select>
                                            <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;" class="font_size form-group alert alert-danger" id ="error_name" role="alert"></p>
                                        </div>
                                        <div class="col-md-4">
                                                    <label for="one-profile-edit-name">Start Date</label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="statement_start_date" name="statement_start_date"  value="" style="margin-bottom: 10px;" placeholder="Enter start date ">
                                                     <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;margin-top: -10px;" class="font_size form-group alert alert-danger" id ="error_start_date" role="alert"></p>
                                        </div>
                                        <div class="col-md-4">
                                                    <label for="one-profile-edit-name">End Date </label>
                                                     <input type="text" class="js-flatpickr form-control bg-white" id="statement_end_date" name="statement_end_date"  value="" style="margin-bottom: 10px;" placeholder="Enter end date">
                                                     <p style="display: none; padding-left: 15px!important;padding-top: 5px!important;padding-bottom: 5px!important;margin-top: -10px;" class="font_size form-group alert alert-danger" id ="error_end_date" role="alert"></p>
                                        </div>
                                    </div> 

                                    <div class="row" style="margin-bottom: 20px">
                                         <div class="col-md-12">
                                            <button  target="_blank"  id="statement_generate_btn" name="statement_generate_btn" type="submit" class="btn btn-info" style="float: left;margin-top: 13px;" onclick="validate();">Submit</button>
                                        </div>
                                    </div>
                                  </form>
                                </div>
               
                </div>
            </div>
        </div>
    </div>

 </main>
 <!-- END Main Container -->
 <script>
    function validate()
{   
    // PLAN STATUS
    var selectedOption = $('#hidden_user_id_statement').find(":selected").val();
    if(selectedOption=='')
    {
        $('#error_name').css("display", "");
        $('#error_name').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_name').css("display", "none");
    }


    // Statement START DATE  
    var statement_start_date  = $('#statement_start_date').val();
    if(statement_start_date == '')
    {
        $('#error_start_date').css("display", "");
        $('#error_start_date').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_start_date').css("display", "none");
    }
      // Statement START DATE  
    var statement_end_date  = $('#statement_end_date').val();
    if(statement_end_date == '')
    {
        $('#error_end_date').css("display", "");
        $('#error_end_date').text('Required*')
        event.preventDefault();
    }
    else
    {
        $('#error_end_date').css("display", "none");
    }
}
 </script>



