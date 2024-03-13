<li class="@if($active == 1) {{'active'}}@endif">
    <a href="{{route('dashboard')}}" title="Dashboard" data-filter-tags="dashboard " class="waves-effect waves-themed">
        <i class="fal fa-home"></i>
        <span class="nav-link-text" data-i18n="nav.dashboard">Dashboard</span>
    </a>
</li>
<li class="@if($active == 2) {{'active'}}@endif">
    <a href="{{route('report')}}" title="Report" data-filter-tags="dashboard " class="waves-effect waves-themed">
        <i class="fal fa-align-justify"></i>
        <span class="nav-link-text" data-i18n="nav.dashboard">Report</span>
    </a>
</li>