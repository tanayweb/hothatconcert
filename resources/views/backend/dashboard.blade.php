@extends('backend.layout.app')
@section('content')
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ 'Airtel' }}</a></li>
        <li class="breadcrumb-item">
            {{'Admin'}}
        </li>
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Dashboard <span class='fw-300'></span>
        </h1>
    </div>
    <div class="row">
        <div class="col-sm-3 col-xl-3">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{$total_user}}
                        <small class="m-0 l-h-n">Total Users</small>
                    </h3>
                </div>
                <i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1"
                    style="font-size:6rem"></i>
            </div>
        </div>
        <div class="col-sm-3 col-xl-3">
            <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{$total_male}}
                        <small class="m-0 l-h-n">Total Male</small>
                    </h3>
                </div>
                <i class="fal fa-gem position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4"
                    style="font-size: 6rem;"></i>
            </div>
        </div>
        <div class="col-sm-3 col-xl-3">
            <div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{$total_female}}
                        <small class="m-0 l-h-n">Total Female</small>
                    </h3>
                </div>
                <i class="fal fa-lightbulb position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6"
                    style="font-size: 8rem;"></i>
            </div>
        </div>
        <div class="col-sm-3 col-xl-3">
            <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
                <div class="">
                    <h3 class="display-4 d-block l-h-n m-0 fw-500">
                        {{$total_students}}
                        <small class="m-0 l-h-n">Total Students</small>
                    </h3>
                </div>
                <i class="fal fa-globe position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4"
                    style="font-size: 6rem;"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <canvas id="widget_chart"></canvas>
        </div>
    </div>
</main>
<div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div>
@endsection

@section('js')
<!--for dashboard pie chart-->
<script>
$(document).ready(function() {
    const ctx = document.getElementById('widget_chart');
    let total_students = parseInt("<?= $total_students?>");
    let total_engineers = parseInt("<?= $total_engineers?>");
    let total_doctors = parseInt("<?= $total_doctors?>");
    let total_lawyears = parseInt("<?= $total_lawyears?>");
    let total_teachers = parseInt("<?= $total_teachers?>");
    let total_job_holders = parseInt("<?= $total_job_holders?>");
    let total_businessman = parseInt("<?= $total_businessman?>");
    let total_others = parseInt("<?= $total_others?>");

    let chartData = [total_students, total_engineers, total_doctors, total_lawyears, total_teachers,
        total_job_holders, total_businessman, total_others
    ];
    let chartLabels = ['Students', 'Engineers', 'Doctors', 'Law Years', 'Teachers', 'Job Holders',
        'Businessman', 'Others'
    ];

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'No. of Users',
                data: chartData,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                },
            }
        }
    });
});
</script>
@endsection