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
                                                <div class="h4 mb-0 font-weight-bold text-gray">{{$p_a}} Projects</div>
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
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$p_c}} Projects</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Ongoing</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$p_o}} Projects</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Onhold</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$p_h}} Projects</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 mb-4 text-center">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    External</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a style="color:black;" href="/guest/dashboard/external">{{$p_ex}} Projects</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                    Internal</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a style="color:black" href="/guest/dashboard/internal">{{$p_in}} Projects</a></div>
                                            </div>
                                        </div>
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
                    <!-- Pie Chart -->
                    <div class="col-xl-8 col-lg-4">
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
                                        <canvas id="myBarGraph" height="87px"></canvas>
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
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
