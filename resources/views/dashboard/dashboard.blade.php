@extends('template.main')
@section('title', 'Dashboard')
@section('content')

    <div class="content-wrapper">
        
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid p-3">
                <!-- Small boxes (Stat box) -->
                <!-- Content Row -->
                <div class="row">

                    <div class="col-lg-12 mb-3 mt-3">
                        <div class="row">
                            <div class="col-lg-3">
                                
                            </div>
                            <div class="col-lg-1 text-center ">
                                @if ($cpi < .75)
                                <h3><span class="badge badge-danger">CPI {{number_format((float)$cpi, 2, '.', '')}}</span></h3>
                                @elseif ($cpi < .85)
                                <h3><span class="badge badge-warning">CPI {{number_format((float)$cpi, 2, '.', '')}}</span></h3>
                                @elseif ($cpi < 1.5)
                                <h3><span class="badge badge-success">CPI {{number_format((float)$cpi, 2, '.', '')}}</span></h3>
                                @elseif ($cpi >= 1.5)
                                <h3><span class="badge blink_me badge-success">CPI {{number_format((float)$cpi, 2, '.', '')}}</span></h3>
                                @endif
                            </div>
                            <div class="col-lg-4 text-center">
                                <h3><b>IPG - PMO DASHBOARD</b></h3>
                            </div>
                            <div class="col-lg-1 text-center ">
                                @if ($spi < .75)
                                <h3><span class="badge badge-danger">SPI {{number_format((float)$spi, 2, '.', '')}}</span></h3>
                                @elseif ($spi < .85)
                                <h3><span class="badge badge-warning">SPI {{number_format((float)$spi, 2, '.', '')}}</span></h3>
                                @elseif ($spi < 1.5)
                                <h3><span class="badge badge-success">SPI {{number_format((float)$spi, 2, '.', '')}}</span></h3>
                                @elseif ($spi >= 1.5)
                                <h3><span class="badge blink_me badge-success">SPI {{number_format((float)$spi, 2, '.', '')}}</span></h3>
                                @endif
                            </div>
                            <div class="col-lg-3">
                                
                            </div>
                        </div>
                    </div>
                        <!-- Project Statistics Card -->
                    <div class="col-xl-6 col-md-12 mb-4 text-center">
                        <div class="card card-outline card-secondary border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 mb-3 mb-lg-0 mb-xl-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-uppercase">
                                                    <div class="h6 mb-0 font-weight-bold text-gray">Total Projects</div>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray">{{$p_a}} Projects</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-3 mb-lg-0 mb-xl-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-0 mb-lg-1 mb-xl-1">
                                                    Completed</div>
                                                <div class="h6 mb-0 font-weight-bold text-gray-800">{{$p_c}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-3 mb-lg-0 mb-xl-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-0 mb-lg-1 mb-xl-1">
                                                    Ongoing</div>
                                                <div class="h6 mb-0 font-weight-bold text-gray-800">{{$p_o}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 mb-3 mb-lg-0 mb-xl-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-0 mb-lg-1 mb-xl-1">
                                                    Onhold</div>
                                                <div class="h6 mb-0 font-weight-bold text-gray-800">{{$p_h}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Recorded Budget Card -->
                    <div class="col-xl-2 col-md-4 mb-4">
                        <div class="card  card-outline card-success shadow h-100 py-2">
                            <div class="card-body text-success">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Rec Budget</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">{{number_format($budget,2,'.',',')}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-peso-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Expenses Card -->
                    <div class="col-xl-2 col-md-4 mb-4">
                        <div class="card card-outline card-danger border-left-success shadow h-100 py-2">
                            <div class="card-body text-danger">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Rec Expenses</div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">₱ {{number_format($cost,2,'.',',')}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-peso-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-2 col-md-4 mb-4">
                        <div class="card card-outline card-primary border-left-info shadow h-100 py-2">
                            <div class="card-body text-info">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Consumed Cost
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">{{number_format((float)$consumed, 1, '.', '')}}%</div>
                                            </div>
                                            <div class="col">
                                                <div class="progress progress-sm mr-2">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                        style="width: {{$consumed}}%" aria-valuenow="{{$consumed}}" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7 d-flex align-items-stretch">
                        <div class="card shadow mb-4 w-100">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Ongoing Projects</h6>
                                <!-- <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div> -->
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="dashboard_table table table-sm table-striped table-bordered table-hover">
                                    <thead>
                                        <th width="20%">Project ID</th>
                                        <th>Project Name</th>
                                        <th width="15%">Live Date</th>
                                        <th>Phase</th>
                                    </thead>
                                    <tbody>
                                        @foreach($projects as $data)
                                        <tr>
                                            <td>
                                                @if ($data->status == 1)
                                                    @if ($data->rag == 1)
                                                        <i class="fa-solid fa-circle" style="color:green"></i>
                                                    @elseif ($data->rag == 2)
                                                        <i class="fa-solid fa-circle" style="color:orange"></i>
                                                    @elseif ($data->rag == 3)
                                                        <div class="spinner-grow spinner-grow-sm text-danger" role="status">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                    @else
                                                        <i class="fa-solid fa-circle" style="color:gray"></i>
                                                    @endif
                                                @else
                                                    <i class="fa-solid fa-circle" style="color:gray"></i>
                                                @endif    
                                                <a href="/project/{{ $data->proj_id }}">{{ $data->proj_id }}
                                            </td>
                                            <td>{{ $data->short_name }}</td>
                                            <td>{{date_format(date_create($data->p_live),'M d, Y')}}</td>
                                            <td>
                                                @if($data->phase == 1)
                                                    Planning
                                                @elseif($data->phase == 2)
                                                    Development
                                                @elseif($data->phase == 3)
                                                    Testing
                                                @elseif($data->phase == 4)
                                                    User Acceptance
                                                @elseif($data->phase == 5)
                                                    Live
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5 d-flex align-items-stretch">
                        <div class="card shadow mb-4 w-100">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Rag Status</h6>
                                <!-- <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div> -->
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> GREEN
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-warning"></i> AMBER
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-danger"></i> RED
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page level plugins -->
                <script src="/assets/plugins/chart.js/Chart.min.js"></script>
                <script>
                    
                // Set new default font family and font color to mimic Bootstrap's default styling
                Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#858796';

                // Pie Chart Example
                var ctx = document.getElementById("myPieChart");
                var myPieChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                    labels: ["Green", "Amber", "Red"],
                    datasets: [{
                        data: @json($rag_count),
                        backgroundColor: ["#28a745","#ffc107","#dc3545"],
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                    },
                    options: {
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 0,
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                    },
                });

                </script>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card shadow mb-4 w-100">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Internal Latest Updates</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="20%">Project Name</th>
                                            <th width="5%">As Of</th>
                                            <th width="5%">Progress</th>
                                            <th width="10%">Phase</th>
                                            <th width="50%">Executive Summary</th>
                                            <th width="10%">Project Manager</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($weekly_reports_in as $data)
                                        <tr>
                                            <td>
                                                @if ($data->rag == 1)
                                                <i class="fa-solid fa-circle" style="color:green"></i>
                                                @elseif ($data->rag == 2)
                                                    <i class="fa-solid fa-circle" style="color:orange"></i>
                                                @elseif ($data->rag == 3)
                                                    <i class="fa-solid fa-circle" style="color:red"></i>
                                                @else
                                                    <i class="fa-solid fa-circle" style="color:gray"></i>
                                                @endif
                                                <a href="/project/{{ $data->proj_id }}">{{ $data->short_name }}
                                            </td>
                                            <td>{{date_format(date_create($data->created_at),'M d')}}</td>
                                            <td>{{$data->progress}}%</td>
                                            <td>
                                                @if ($data->phase == 1)
                                                Planning
                                                @elseif ($data->phase == 2)
                                                Development
                                                @elseif ($data->phase == 3)
                                                Testing
                                                @elseif ($data->phase == 4)
                                                User Acceptance
                                                @elseif ($data->phase == 5)
                                                Live
                                                @endif
                                            </td>
                                            <td>{{$data->executive}}</td>
                                            <td>{{$data->pmname}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card shadow mb-4 w-100">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">External Latest Updates</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="20%">Project Name</th>
                                            <th width="5%">As Of</th>
                                            <th width="5%">Progress</th>
                                            <th width="10%">Phase</th>
                                            <th width="50%">Executive Summary</th>
                                            <th width="10%">Project Manager</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($weekly_reports_ex as $data)
                                        <tr>
                                            <td>
                                                @if ($data->rag == 1)
                                                <i class="fa-solid fa-circle" style="color:green"></i>
                                                @elseif ($data->rag == 2)
                                                    <i class="fa-solid fa-circle" style="color:orange"></i>
                                                @elseif ($data->rag == 3)
                                                    <i class="fa-solid fa-circle" style="color:red"></i>
                                                @else
                                                    <i class="fa-solid fa-circle" style="color:gray"></i>
                                                @endif
                                                <a href="/project/{{ $data->proj_id }}">{{ $data->short_name }}
                                            </td>
                                            <td>{{date_format(date_create($data->created_at),'M d')}}</td>
                                            <td>{{$data->progress}}%</td>
                                            <td>
                                                @if ($data->phase == 1)
                                                Planning
                                                @elseif ($data->phase == 2)
                                                Development
                                                @elseif ($data->phase == 3)
                                                Testing
                                                @elseif ($data->phase == 4)
                                                User Acceptance
                                                @elseif ($data->phase == 5)
                                                Live
                                                @endif
                                            </td>
                                            <td>{{$data->executive}}</td>
                                            <td>{{$data->pmname}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (count($crb) > 0)
                    <div class="col-xl-12">
                        <div class="card shadow mb-4 w-100">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Change Requests</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">

                                <table class="makethistable table table-sm table-striped table-bordered table-hover text-center" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>CR ID</th>
                                            <th>Type</th>
                                            <th>Project Name</th>
                                            <th>New Budget / Live</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($crb as $data)
                                            @if ($data->type == 'crb')
                                            <tr>
                                                <td><a href="/crbudget/{{$data->cr_id}}">{{$data->cr_id}}</a></td>
                                                <td><span class="badge badge-pill"  style="background-color:#8e44ad; color:white">Budget</span></td>
                                                <td><b>{{ $data->name }}</b></td>
                                                <td><b style="color:orange;">Php {{ number_format($data->new,2,'.',',') }}</b></td>
                                                <td>
                                                    @if ($data->status == 0)
                                                        <span class="badge badge-pill badge-warning">For Approval</span>
                                                    @elseif ($data->status == 1)
                                                        <span class="badge badge-pill badge-success">Approved</span>
                                                    @elseif ($data->status == 2)
                                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @if ($data->type == 'crs')
                                            <tr>
                                                <td><a href="/crbudget/{{$data->cr_id}}">{{$data->cr_id}}</a></td>
                                                <td><span class="badge badge-pill" style="background-color:#2980b9; color:white">Schedule</span></td>
                                                <td><b>{{ $data->name }}</b></td>
                                                <td><b style="color:orange;">{{date_format(date_create($data->new),'F d, Y')}}</b></td>
                                                <td>
                                                    @if ($data->status == 0)
                                                        <span class="badge badge-pill badge-warning">For Approval</span>
                                                    @elseif ($data->status == 1)
                                                        <span class="badge badge-pill badge-success">Approved</span>
                                                    @elseif ($data->status == 2)
                                                        <span class="badge badge-pill badge-danger">Rejected</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    @endif
                    @if (count($logs) > 0)
                    <div class="col-xl-12">
                        <div class="card shadow mb-4 w-100">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Phase Changes</h6>
                                <!-- <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div> -->
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="makethistable table table-sm table-striped table-bordered table-hover text-center" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th width="20%">Project Name</th>
                                            <th width="20%">Date</th>
                                            <th width="60%">Change Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $data)
                                            <tr>
                                                <td><b>{{ $data->short_name }}</b></td>
                                                <td>{{$data->created_at}}</td>
                                                <td>{{$data->remarks}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
