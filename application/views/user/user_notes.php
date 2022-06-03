<!-- Main Container -->
<main id="main-container">

    <!-- Hero -->

    <div class="content ">
        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-alt">
                <li class="breadcrumb-item"><a class="text-muted" href="<?php echo base_url()?>dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a class="text-muted">Notes </li>
            </ol>
        </nav>
    </div>

    <!-- END Hero -->
    <!-- Page Content -->

    <div class="content content">

        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Messages/Alerts</h3>
            </div>
            <p id="alert_message_notes"></p>
            <input type="hidden" id="hidden_user_id" name="hidden_user_id" value="<?php echo $session_data['id']?>">
                <div class="block-content block-content-full">

                    <table id="view_user_notes"
                        class="table table-bordered table-striped table-vcenter js-dataTable-simple text-nowrap"
                        style="width:100%!important">
                        <thead>
                            <tr role="row">
                                <th style="width: 20%;" class="text-center">ID</th>
                                <th style="width: 30%;" class="text-center">Post Date</th>
                                <th style="width: 30%;" class="text-center">Note Name</th>
                                <th style="width: 20%;" class="text-center">View</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    <!-- Pop Out Block Modal -->
    <div class="modal fade" id="modal-view-note" tabindex="-1" role="dialog" aria-labelledby="modal-edit-doc"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">View Alert </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm">
                        <p id="view_note"></p>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button id="close_modal" type="button" class="btn btn-sm btn-light"
                            data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Pop Out Block Modal -->

</main>
<!-- END Main Container -->

<script type="text/javascript">
    
function fetch_user_notes_onstart() {
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url()."User/fetch_note_per_user";?>',
        success: function(response) {
            var data = JSON.parse(response);

            if (response != '') {

                $("#view_user_notes > tbody").html("");

                var count = 1;
                var hidden_user_id = $('#hidden_user_id').val();
                $.each(data, function(index, value) {
                    var counter = count++;
                    var link = "<?php echo base_url()?>view-user-note/" + value.admin_notes_id;

                    var new_date = value.admin_notes_posted_date;

                    var d = new_date;
                    d = d.split(' ')[0];


                    var result = d.split('-');
                    var newDates = result[1] + '/' + result[2] + '/' + result[0];

                    // $('#view_note').html(value.admin_notes_desc);
                    var tr = '<tr><td class="text-center" scope="row">' + counter +
                        '</td><td class="text-center font-w600 font-size-sm">' + newDates +
                        '</td><td class="text-center font-w600 font-size-sm text-capitalize">' + value
                        .admin_notes_task_name +
                        '</td><td class="text-center font-w600 font-size-sm"><button  class="btn btn-small " data-toggle="modal" data-target="#modal-view-note" onclick="fetch_not_desc(this,' +
                        value.admin_notes_id + ');">View </button></td></tr>';

                    $('#view_user_notes tbody').append(tr);




                });

            }
        }
    });
}


function fetch_not_desc(that, id) {

    $.ajax({
        type: 'POST',
        url: '<?php echo base_url()."User/fetch_not_desc_ajax";?>',
        data: {
            'id': id
        },
        success: function(response) {

            var data = JSON.parse(response);

            if (response != '') {
                $('#view_note').html(data[0]['admin_notes_desc']);

            }
        }
    });

}
</script>