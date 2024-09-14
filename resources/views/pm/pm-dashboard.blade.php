@extends('template.main')
@section('title', 'My PM Dashboard')
@section('content')

    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid p-3">
                <div class="alert blink_me_fast alert-danger alert-dismissible fade show" role="alert">
                    <strong>THIS IS FOR TESTING ONLY</strong> | Alert! Your project <a href="#">Project Moses</a> is already past its Go Live Date, please file a <a href="#">Schedule Change Request</a> now.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-3 mt-3">
                        <div class="row">
                            <div class="col-lg-4">
                                
                            </div>
                            <div class="col-lg-4 text-center">
                                <h3><b>{{auth()->user()->name}}</b></h3>
                            </div>
                            <div class="col-lg-4">
                                
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
                        <div class="col-xl-2 col-md-4  col-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                SPI Score</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">.98</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-2 col-md-4 col-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                CPI Score</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">.89</div>
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
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">FW Score
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
                                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
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
                                    <table class="dashboard_table table table-sm table-striped table-bordered table-hover">
                                        <thead>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>SPI</th>
                                            <th>CPI</th>
                                            <th>Phase</th>
                                            <th>Sponsor</th>
                                            <th>Live Date</th>
                                            <th>Close Date</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($projs as $data)
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
                                                <td><b>{{ $data->short_name }}</b></td>
                                                @if ($data->spi < .75)
                                                    <td><span class="badge badge-pill badge-danger">{{number_format((float)$data->spi, 2, '.', '')}}</span> </td>                                               
                                                @elseif ($data->spi < .89)
                                                    <td><span class="badge badge-pill badge-warning">{{number_format((float)$data->spi, 2, '.', '')}}</span> </td>    
                                                @elseif ($data->spi >= .89)
                                                    <td><span class="badge badge-pill badge-success">{{number_format((float)$data->spi, 2, '.', '')}}</span> </td>    
                                                @endif
                                                @if ($data->cpi < .75)
                                                    <td><span class="badge badge-pill badge-danger">{{number_format((float)$data->cpi, 2, '.', '')}}</span> </td>
                                                @elseif ($data->cpi < .89)
                                                    <td><span class="badge badge-pill badge-warning">{{number_format((float)$data->cpi, 2, '.', '')}}</span> </td>        
                                                @elseif ($data->cpi >= .89)
                                                    <td><span class="badge badge-pill badge-success">{{number_format((float)$data->cpi, 2, '.', '')}}</span> </td>        
                                                @endif

                                                @if($data->phase == 1)
                                                <td>Planning</td>
                                                @elseif($data->phase == 2)
                                                <td>Development</td>
                                                @elseif($data->phase == 3)
                                                <td>Testing</td>
                                                @elseif($data->phase == 4)
                                                <td>User Acceptance</td>
                                                @elseif($data->phase == 5)
                                                <td>Live</td>
                                                @endif
                                                <td>{{$data->sponsor_name}}</td>
                                                <td>{{date_format(date_create($data->p_live),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_close),'F d, Y')}}</td>

                                                
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-5 col-lg-5 d-flex align-items-stretch">
                            <div class="card shadow mb-4 w-100">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Change Requests</h6>
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
                                    <table class="cr_pm_dashboard_table table table-sm table-striped table-bordered table-hover text-center" style="width: 100%">
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
                                                    <td><span class="badge badge-pill badge-secondary">Budget</span></td>
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
                                                    <td><span class="badge badge-pill badge-secondary">Schedule</span></td>
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

                    
                    <!-- /.row -->
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                                google.charts.load("current", {packages:["timeline"]});
                              google.charts.setOnLoadCallback(drawChart);
                              function drawChart() {

                                var date = new Date("2024-03-13");
                                console.log(typeof(date));

                                var container = document.getElementById('pms_gantt');
                                var chart = new google.visualization.Timeline(container);
                                var dataTable = new google.visualization.DataTable();
                                dataTable.addColumn({ type: 'string', id: 'Project Manager' });
                                dataTable.addColumn({ type: 'string', id: 'Project Name' });
                                dataTable.addColumn({ type: 'date', id: 'Start' });
                                dataTable.addColumn({ type: 'date', id: 'End' });

                                var pm_caps = @json($pm_capacity);
                                var datarows = [];

                                for (var i = pm_caps.length - 1; i >= 0; i--) {
                                    datarows.push([
                                        pm_caps[i][0],
                                        pm_caps[i][1],
                                        new Date(pm_caps[i][2]),
                                        new Date(pm_caps[i][3]),
                                    ]);
                                }
                                
                                dataTable.addRows(datarows);


                                var options = {
                                    timeline: {  },

                                    avoidOverlappingGridLines: false
                                  };

                                chart.draw(dataTable, options);

                        }
                        </script>
                    <div class="col-xl-7 col-lg-7 d-none d-lg-flex align-items-stretch">
                        <div class="card shadow mb-4 w-100">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                                <h6 class="m-0 font-weight-bold text-primary">Current Capacity</h6>
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
                                <div id="pms_gantt" class="" style="height: auto;"></div>

                            </div>

                        </div>

                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
