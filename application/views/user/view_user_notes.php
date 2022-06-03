
<style type="text/css">
.page-item.active .page-link {
    z-index: 3;
    color: #6fb8eb!important;
    background-color: #f9f9f9;
    border-color: #6fb8eb!important;
}    
</style>
<!-- Main Container -->
<div>
            <main id="main-container">

                <!-- Hero -->
                    <div class="content ">
                            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item">Notes View</li>
                                </ol>
                            </nav>
                    </div>

                <!-- END Hero -->
                <!-- Page Content -->

                <div class="content content">

                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Notes Details</h3>
                        </div>
                        <div class="block-content block-content-full">

                            <table id="notes_user_view_detail" class="table table-borderless table-vcenter table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 10%;">#</th>
                                                <th style="width: 20%;">Name</th>
                                                <th style="width: 50%;">Note description</th>
                                                <th class="text-center" style="width: 20%;">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                        </tbody>
                                    </table>

                                    <br>
                                <div class="form-group">
                                    <label for="one-ecom-customer-note">Note</label>
                                    <textarea class="form-control" id="notes_meta_desc" name="notes_meta_desc" rows="4" placeholder="Type here..."></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" onclick="add_user_note_meta();">Add Note</button>
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
    
    function add_user_note_meta()
    {
        var url = window.location.pathname;
        var id = url.substring(url.lastIndexOf('/') + 1);

        var description  = $('#notes_meta_desc').val();

        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."User/add__user_notes_meta";?>',
          data:{'id':id,'description':description},
          success: function(response){

           var data = JSON.parse(response);

           if(response != '')
           {
            $('#notes_meta_desc').val('');

            $("#notes_user_view_detail > tbody").html("");
                 
            var count =1;
           $.each(data, function(index, value) {
                var counter  = count++;


                var tr = '<tr class="table-active"><th class="text-center" scope="row">'+counter+'</th><td class="font-w600 font-size-sm text-capitalize">'+value.admin_notes_meta_name+'</td><td class="font-w600 font-size-sm">'+value.admin_notes_meta_desc+'</td> <td class="font-w600 font-size-sm">'+value.admin_notes_meta_post_date+'</td></tr>';

                $('#notes_user_view_detail tbody').append(tr);


            });

           }
          }
        }); 
    }    


    function fetch_user_notess_meta()
    {
        var url = window.location.pathname;
        var id = url.substring(url.lastIndexOf('/') + 1);


        $.ajax({
          type: 'POST',
          url: '<?php echo base_url()."User/fetch_user_notes_meta";?>',
          data:{'id':id},
          success: function(response){

           var data = JSON.parse(response);

           if(response != '')
           {

            $("#notes_user_view_detail > tbody").html("");
                 
            var count =1;
           $.each(data, function(index, value) {
                var counter  = count++;


                var tr = '<tr class="table-active"><th class="text-center" scope="row">'+counter+'</th><td class="font-w600 font-size-sm text-capitalize">'+value.admin_notes_meta_name+'</td><td class="font-w600 font-size-sm">'+value.admin_notes_meta_desc+'</td> <td class="font-w600 font-size-sm">'+value.admin_notes_meta_post_date+'</td></tr>';

                $('#notes_user_view_detail tbody').append(tr);


            });

           }
          }
        }); 
    }
</script>