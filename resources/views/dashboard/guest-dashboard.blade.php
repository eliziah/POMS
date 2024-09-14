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
                            <div class="col-lg-1 text-center">
                                <h3><span class="badge badge-success">CPI .98</span></h3>
                            </div>
                            <div class="col-lg-4 text-center">
                                <h3><b>IPG PROJECT MANAGEMENT OFFICE</b></h3>
                            </div>
                            <div class="col-lg-1 text-center">
                                <h3><span class="badge badge-warning">SPI .76</span></h3>
                            </div>
                            <div class="col-lg-3">
                                
                            </div>
                        </div>
                    </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-6 col-md-12 mb-4 text-center">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="text-xs font-weight-bold text-uppercase">
                                                        <div class="h6 font-weight-bold text-gray">Total Projects</div>
                                                    </div>
                                                    <div class="h4 mb-0 font-weight-bold text-gray">43 Projects</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Completed</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">21 Projects</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Ongoing</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">19 Projects</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Onhold</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">3 Projects</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body text-success">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Recorded Budget</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱ 16,640,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-4 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body text-danger">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Recorded Expenses</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱ 3,320,000</div>
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
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body text-info">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Consumed Cost
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">73%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 73%" aria-valuenow="73" aria-valuemin="0"
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
                        <div class="col-xl-4 col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow mb-4 w-100">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Top Platforms</h6>
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
                                <div class="card-body text-center  d-flex align-items-center justify-content-center">
                                    <div class="row">
                                        <div class="col-lg-12 border-bottom pb-4 mt-4">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-uppercase">
                                                                        <div class="h6 font-weight-bold text-gray">PeopleSoft Projects</div>
                                                                    </div>
                                                                    <div class="h4 mb-0 font-weight-bold text-gray">29</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                                        Completed</div>
                                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">19</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                        Ongoing</div>
                                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 border-bottom pb-4 mt-4">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-uppercase">
                                                                        <div class="h6 font-weight-bold text-gray">Custom Dev Projects</div>
                                                                    </div>
                                                                    <div class="h4 mb-0 font-weight-bold text-gray">20</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                                        Completed</div>
                                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">17</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                        Ongoing</div>
                                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 pb-4 mt-3">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-uppercase">
                                                                        <div class="h6 font-weight-bold text-gray">AI Projects</div>
                                                                    </div>
                                                                    <div class="h4 mb-0 font-weight-bold text-gray">12</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                                        Completed</div>
                                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="row no-gutters align-items-center">
                                                                <div class="col">
                                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                                        Ongoing</div>
                                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow mb-4 w-100">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Top Departments</h6>
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
                                        <canvas id="myBarGraph" height="200px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-4 d-flex align-items-stretch">
                            <div class="card shadow mb-4 w-100">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
                    var btx = document.getElementById("myBarGraph");
                    var myPieChart = new Chart(ctx, {
                      type: 'doughnut',
                      data: {
                        labels: ["Green", "Red", "Amber"],
                        datasets: [{
                          data: [14, 8, 5],
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
                <!-- /.row -->


                    <div class="row">
                        <!-- Area Chart --><!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12 d-flex align-items-stretch">
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
                                    <table class="project_table table table-sm table-striped table-bordered table-hover text-center" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Project ID</th>
                                                <th>Project Name</th>
                                                <th>Project Manager</th>
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
                                                    <td>{{ $data->pmname }}</td>
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
