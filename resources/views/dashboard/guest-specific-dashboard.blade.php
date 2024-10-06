@extends('template.guest')
@section('title', 'Guest Dashboard')
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
                            <div class="col-lg-4 text-center text-uppercase">
                                <h3><b>{{$area_type}} PORTFOLIO</b></h3>
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
                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-2 col-md-12 mb-4 text-center">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-uppercase">
                                                    <div class="h6 font-weight-bold text-gray">Total Projects</div>
                                                </div>
                                                <div class="h4 mb-0 font-weight-bold text-gray"><a style="color:gray" href="">{{$p_a}} Projects</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 mb-4 text-center">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Completed</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a style="color:black" href="">{{$p_c}} Projects</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Ongoing</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a style="color:black" href="">{{$p_o}} Projects</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Onhold</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a style="color:black" href="">{{$p_h}} Projects</a></div>
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
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">₱ {{number_format($budget,2,'.',',')}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
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

                    <!-- Content Row -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="card shadow mb-4 w-100">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">RAG Status (Ongoing)</h6>
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
                    <!-- Pie Chart -->
                    <div class="col-xl-8 col-lg-4">
                        <div class="card shadow mb-4 w-100">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                @if($area_type=="external")
                                <h6 class="m-0 font-weight-bold text-primary">Top Clients</h6>
                                @elseif($area_type=="internal")
                                <h6 class="m-0 font-weight-bold text-primary">Top Departments</h6>
                                @endif
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
                                    <canvas id="myBarGraph" height="87px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty($red_updates))
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4 w-100">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-danger">Red Projects Updates</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="table table-sm table-striped table-bordered table-hover text-center" style="width: 100%">
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
                                    @foreach ($red_updates as $data)
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
                    @endif
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4 w-100">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Projects List</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <table class="project_table table table-sm table-striped table-bordered table-hover text-center" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Dept</th>
                                            <th>(P) Start Date</th>
                                            <th>(P) Live Date</th>
                                            <th>(P) Close Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $data)
                                            <tr>
                                                <td>
                                                    @if ($data->status == 1)
                                                        <span class="badge badge-primary">On-going</span>
                                                    @elseif ($data->status == 2)
                                                        <span class="badge badge-success">Completed</span>
                                                    @elseif ($data->status == 3)
                                                        <span class="badge badge-warning">On-hold</span>
                                                    @endif
                                                </td>
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
                                                    <a href="/guest/project/{{ $data->proj_id }}">{{ $data->proj_id }}
                                                </td>
                                                <td><b>{{ $data->short_name }}</b></td>
                                                <td>{{$data->sponsor_dept}}</td>
                                                <td>{{date_format(date_create($data->p_start),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_live),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_close),'F d, Y')}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    var btx = document.getElementById("myBarGraph");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
        labels: ["Green", "Amber", "Red"],
        datasets: [{
            data: @json($rag_count),
            backgroundColor: ["#78e08f","#eb2f06","#fa983a"],
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
    var myBarGraph = new Chart(btx, {
        type: 'bar',
        data: {
        labels: @json($depts_name),
        datasets: [{
            data: @json($depts_count),
            backgroundColor: ["#fad390", "#f8c291","#6a89cc","#82ccdd","#b8e994","#78e08f","#60a3bc","#4a69bd","#f6b93b","#fa983a"],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
        },
        options: {
        legend: {
            display: false
        },
        cutoutPercentage: 80,
        scales: {
            y: { beginAtZero: true }
        }
        },
    });
    </script>
@endsection
