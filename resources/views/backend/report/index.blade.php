@extends('backend.layout.app')
@section('title')
{{ $title }}
@endsection
@section('content')
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item">{{ $menu }}</li>
        <li class="breadcrumb-item active">{{ $title }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        <i class='subheader-icon fal fa-table'></i>{{ $title }}
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <div class="row">
                            <div class="col-md-3">
                                <input type="text" id="start_date" placeholder="Enter Start Date" value="<?= date('Y-m-01');?>" class="form-control date" autocomplete="off"/>
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="end_date" placeholder="Enter End Date" value="<?= date('Y-m-28');?>" class="form-control date" autocomplete="off"/>
                            </div>
                            <div class="col-md-3">
                                <button id="btn_export" class="btn btn-md btn-info">Export</button>
                            </div>
                        </div>
                        <table id="crowd_list" class="table table-bordered table-hover table-striped w-100">
                            <thead class="bg-primary-600">
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Profession</th>
                                    <th>Institution</th>
                                    <th>Social</th>
                                    <th>About</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Profession</th>
                                    <th>Institution</th>
                                    <th>Social</th>
                                    <th>About</th>
                                    <th>Created Date</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function delete_alert(Id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.value) {
                window.location.href = ""
                let url = $(this).attr('href');
            }
        }); //alert ends
    }
    </script>
    <script>
        
    </script>
</main>
<!-- this overlay is activated only when mobile menu is triggered -->
@endsection
@section('js')
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function(){
   $('.date').datepicker({
        dateFormat : 'yy-mm-dd',
        changeMonth : true,
        changeYear : true
   });
});
</script>
@endsection