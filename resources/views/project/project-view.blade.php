@extends('template.main')
@section('title', $project->proj_id)
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-6">
                        <div class="text-right">
                            <a href="/project" class="ml-2 d-inline btn btn-sm btn-warning"><i class="fa-solid fa-undo"></i> Back</a>

                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="myProfile" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item d-none d-lg-flex">
                                <a class="nav-link" id="ledger-tab" data-toggle="tab" href="#ledger" role="tab" aria-controls="ledger" aria-selected="false">Ledger</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="artifacts-tab" data-toggle="tab" href="#artifacts" role="tab" aria-controls="artifacts" aria-selected="false">Artifacts</a>
                            </li>
                            <li class="nav-item d-none d-lg-flex">
                                <a class="nav-link" id="crs-tab" data-toggle="tab" href="#crs" role="tab" aria-controls="crs" aria-selected="false">Change Requests</a>
                            </li>
                            <li class="nav-item d-none d-lg-flex">
                                <a class="nav-link" id="logs-tab" data-toggle="tab" href="#logs" role="tab" aria-controls="logs" aria-selected="false">Logs</a>
                            </li>
                            <li class="nav-item d-none d-lg-flex">
                                <a class="nav-link" id="weekly-tab" data-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly Reports</a>
                            </li>
                            <li class="nav-item d-none d-lg-flex">
                                <a class="nav-link" id="mom-tab" data-toggle="tab" href="#mom" role="tab" aria-controls="mom" aria-selected="false">Minutes</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myProfileContent">
                            <!-- Project Details Tab -->
                            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-12 text-lg-left text-xl-left text-center">
                                                                <h3 class="d-inline font-weight-bold">{{$project->initiative_type}} | {{$project->short_name}}</h3>
                                                                @if ($project->status == 1)
                                                                    @if ($project->rag == 1)
                                                                    <h4 class="d-inline ml-2"><i class="fa-solid fa-circle" style="color:green"></i></h4>
                                                                    @elseif ($project->rag == 2)
                                                                    <h4 class="d-inline ml-2"><i class="fa-solid fa-circle" style="color:orange"></i></h4>
                                                                    @elseif ($project->rag == 3)
                                                                    <h5 class="d-inline ml-2">
                                                                        <div class="spinner-grow text-danger" role="status">
                                                                          <span class="visually-hidden"></span>
                                                                        </div>
                                                                    </h5>
                                                                    @else
                                                                    <h4 class="d-inline ml-2"><i class="fa-solid fa-circle" style="color:gray"></i></h4>
                                                                    @endif
                                                                @elseif ($project->status == 2)
                                                                    <h4 class="d-inline ml-2"><span class="badge  badge-success">Completed</span></h4>
                                                                @elseif ($project->status == 3)
                                                                    <h4 class="d-inline ml-2"><span class="badge  badge-warning">On-hold</span></h4>
                                                                @elseif ($project->status == 4)
                                                                    <h4 class="d-inline ml-2"><span class="badge  badge-danger">Terminated</span></h4>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 text-lg-left text-xl-left text-center">
                                                                <h4>{{$project->description}}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-lg-right text-xl-right text-center">
                                                        <div class="row">
                                                            <!-- <div class="col-lg-12">
                                                                @if ($project->status == 1)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">On-going</span></h3>
                                                                @elseif ($project->status == 2)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-success">Completed</span></h3>
                                                                @endif
                                                                
                                                                @if ($project->gate == 1)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">G1-Initiation</span></h3>
                                                                @elseif ($project->gate == 2)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">G2-Planning</span></h3>
                                                                @elseif ($project->gate == 3)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">G3-Execution</span></h3>
                                                                @elseif ($project->gate == 4)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">G4-Closing</span></h3>
                                                                @elseif ($project->gate == 5)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">BR-Benefits</span></h3>
                                                                @endif
                                                                
                                                                @if ($project->phase == 1)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">Pre-development</span></h3>
                                                                @elseif ($project->phase == 2)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">Development</span></h3>
                                                                @elseif ($project->phase == 3)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">Testing</span></h3>
                                                                @elseif ($project->phase == 4)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">User Acceptance</span></h3>
                                                                @elseif ($project->phase == 5)
                                                                    <h3 class="d-inline mr-2"><span class="badge badge-pill badge-secondary">Live</span></h3>
                                                                @endif
                                                            </div> -->
                                                            <div class="col-lg-12 ">
                                                                <h3 class="mr-2 d-inline"><span class="badge badge-pill badge-success">CPI {{number_format((float)$cpi, 2, '.', '')}}</span></h3>
                                                                <h3 class="mr-2 d-inline"><span class="badge badge-pill badge-warning">SPI {{number_format((float)$spi, 2, '.', '')}}</span></h3>
                                                                <h3 class="mr-2 d-inline"><span class="badge badge-pill badge-secondary">FW {{number_format((float)78.2938, 2, '.', '')}}%</span></h3>
                                                                <h3 class="mr-2 d-inline"><span class="badge badge-pill badge-primary">Progress {{$project->progress}}%</span></h3>
                                                            </div>
                                                            @if (auth()->user()->role == 2)
                                                            <div class="col-12 d-none d-lg-block mt-3 mb-2">
                                                                <a href="#" class="ml-2 d-inline btn btn-outline-secondary elevation-2"><i class="fa-solid fa-user-pen"></i> Switch PM</a>
                                                                <!-- <a href="#" class="ml-2 d-inline btn btn-outline-success elevation-2"><i class="fa-solid fa-arrow-up"></i> Declare Live</a> -->
                                                                <a href="#" class="ml-2 d-inline btn btn-outline-warning elevation-2"><i class="fa-solid fa-hand"></i> Put On hold</a>
                                                                <a href="#" class="ml-2 d-inline btn btn-outline-danger elevation-2"><i class="fa-solid fa-ban"></i> Terminate</a>
                                                            </div>
                                                            @endif
                                                            <div class="col-12 d-none d-lg-block mt-3">
                                                                <a href="{{$project['repository']}}" class="ml-2 d-inline btn btn-outline-secondary elevation-2"><i class="fa-solid fa-folder"></i> Project Folder</a>
                                                                @if ($project['area_type'] == 'Internal')
                                                                <a href="{{$project['artifact']}}" target="_blank" class="ml-2 d-inline btn btn-outline-secondary elevation-2"><i class="fa-solid fa-file"></i> Business Case</a>
                                                                @elseif ($project['area_type'] == 'External')
                                                                <a href="{{$project['artifact']}}" target="_blank" class="ml-2 d-inline btn btn-outline-secondary elevation-2"><i class="fa-solid fa-file"></i> Coms</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-12 text-lg-left  text-xl-left text-center order-2 order-lg-1 order-xl-1">
                                                <div class="row">
                                                    <!-- <div class="col-lg-3">
                                                        <div class="row">
                                                            <div class="col-lg-12 mt-3">
                                                                @if($project->status == 1)
                                                                <h6><b>Project Status:</b><br/> <span class="text-primary">On-going</span></h6>
                                                                @elseif($project->status == 2)
                                                                <h6><b>Project Status:</b><br/> <span class="text-success">Completed</span></h6>
                                                                @elseif($project->status == 3)
                                                                <h6><b>Project Status:</b><br/> <span class="text-warning">On-hold</span></h6>
                                                                @elseif($project->status == 4)
                                                                <h6><b>Project Status:</b><br/> <span class="text-warning">Terminated</span></h6>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                @if($project->phase == 1)
                                                                <h6><b>Project Phase:</b><br/> <span class="text-primary">Planning</span></h6>
                                                                @elseif($project->phase == 2)
                                                                <h6><b>Project Phase:</b><br/> <span class="text-primary">Development</span></h6>
                                                                @elseif($project->phase == 3)
                                                                <h6><b>Project Phase:</b><br/> <span class="text-primary">Testing</span></h6>
                                                                @elseif($project->phase == 4)
                                                                <h6><b>Project Phase:</b><br/> <span class="text-primary">User Acceptance</span></h6>
                                                                @elseif($project->phase == 5)
                                                                <h6><b>Project Phase:</b><br/> <span class="text-success">Live</span></h6>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                @if($project->gate == 1)
                                                                <h6><b>Project Gate:</b><br/> <span class="text-primary">Gate 1</span></h6>
                                                                @elseif($project->gate == 2)
                                                                <h6><b>Project Gate:</b><br/> <span class="text-primary">Gate 2</span></h6>
                                                                @elseif($project->gate == 3)
                                                                <h6><b>Project Gate:</b><br/> <span class="text-primary">Gate 3</span></h6>
                                                                @elseif($project->gate == 4)
                                                                <h6><b>Project Gate:</b><br/> <span class="text-primary">Gate 4</span></h6>
                                                                @elseif($project->gate == 5)
                                                                <h6><b>Project Gate:</b><br/> <span class="text-success">Gate BR</span></h6>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-12 mt-3">
                                                                @if($project->status == 1)
                                                                <h5><b>Project Status:</b><br/> <span class="text-primary">On-going</span></h5>
                                                                @elseif($project->status == 2)
                                                                <h5><b>Project Status:</b><br/> <span class="text-success">Completed</span></h5>
                                                                @elseif($project->status == 3)
                                                                <h5><b>Project Status:</b><br/> <span class="text-warning">On-hold</span></h5>
                                                                @elseif($project->status == 4)
                                                                <h5><b>Project Status:</b><br/> <span class="text-warning">Terminated</span></h5>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <h5><b>Subsidiary:</b><br/> {{$project->sponsor_sub}}</h5>
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                @if($project->area_type == "Internal")
                                                                <h5><b>Sponsoring Person:</b><br/> {{$project->sponsor_name}}</h5>
                                                                @elseif($project->area_type == "External")
                                                                <h5><b>Client:</b><br/> {{$project->sponsor_name}}</h5>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                @if($project->area_type == "Internal")
                                                                <h5><b>Sponsoring Dept:</b><br/> {{$project->sponsor_dept}}</h5>
                                                                @elseif($project->area_type == "External")
                                                                <h5><b>Implementor:</b><br/> {{$project->sponsor_dept}}</h5>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-12 mt-3">
                                                                @if($project->phase == 1)
                                                                <h5><b>Project Phase:</b><br/> <span class="text-primary">Planning</span></h5>
                                                                @elseif($project->phase == 2)
                                                                <h5><b>Project Phase:</b><br/> <span class="text-primary">Development</span></h5>
                                                                @elseif($project->phase == 3)
                                                                <h5><b>Project Phase:</b><br/> <span class="text-primary">Testing</span></h5>
                                                                @elseif($project->phase == 4)
                                                                <h5><b>Project Phase:</b><br/> <span class="text-primary">User Acceptance</span></h5>
                                                                @elseif($project->phase == 5)
                                                                <h5><b>Project Phase:</b><br/> <span class="text-success">Live</span></h5>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <h5><b>Planned Start Date:</b><br/> {{date_format(date_create($project->p_start),'F d, Y')}}</h5>
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <h5><b>Planned Live Date:</b><br/> {{date_format(date_create($project->p_live),'F d, Y')}}</h5>
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <h5><b>Planned Close Date:</b><br/> {{date_format(date_create($project->p_close),'F d, Y')}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-12 mt-3">
                                                                @if($project->gate == 1)
                                                                <h5><b>Project Gate:</b><br/> <span class="text-primary">Gate 1</span></h5>
                                                                @elseif($project->gate == 2)
                                                                <h5><b>Project Gate:</b><br/> <span class="text-primary">Gate 2</span></h5>
                                                                @elseif($project->gate == 3)
                                                                <h5><b>Project Gate:</b><br/> <span class="text-primary">Gate 3</span></h5>
                                                                @elseif($project->gate == 4)
                                                                <h5><b>Project Gate:</b><br/> <span class="text-primary">Gate 4</span></h5>
                                                                @elseif($project->gate == 5)
                                                                <h5><b>Project Gate:</b><br/> <span class="text-success">Gate BR</span></h5>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <h5><b>Project Budget:</b><br/> Php {{number_format($project->budget,2,'.',',')}}</h5>
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <h5><b>Earned Value:</b><br/> Php {{number_format($earned_value,2,'.',',')}}</h5>
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <h5><b>Actual Cost:</b><br/> Php {{number_format($actual_cost,2,'.',',')}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 mt-3 order-1 order-lg-2 order-xl-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5><b>Progress Trend</b></h5>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <canvas id="trend_chart" style="width:100%;max-height: 350px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    const xValues = @json($trend_ends);
                                                    const yValues = @json($trend_progress);
                                                    new Chart("trend_chart", {
                                                        type: "line",
                                                        data: {
                                                            labels: xValues,
                                                            datasets: [{
                                                                backgroundColor:"rgba(0,0,255,1.0)",
                                                                borderColor: "rgba(0,0,255,0.1)",
                                                                tension: 0,
                                                                data: yValues,
                                                                fill:false                    
                                                            }]
                                                        },
                                                        options: {
                                                            legend: {display: false},
                                                            maintainAspectRatio: false
                                                        }
                                                    });
                                                });
                                            </script>
                                            <div class="col-lg-12 mt-3 d-none d-lg-block   order-lg-3 order-xl-3">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5><b>3-week Progress</b></h5>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <table class="table table-sm table-striped table-hover text">
                                                            <thead>
                                                                <th scope="col">Week</th>
                                                                <th scope="col">Progress</th>
                                                                <th scope="col">RAG</th>
                                                                <th scope="col">Phase</th>
                                                                <th scope="col" width="70%">Executive</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($weekly_3_reversed as $week)
                                                                <tr>
                                                                    <td>{{$week->workweek}}</td>
                                                                    <td>{{$week->progress}}%</td>
                                                                    <td>
                                                                        @if ($week->rag == 1)
                                                                        <i class="fa-solid fa-circle" style="color:green"></i>
                                                                        @elseif ($week->rag == 2)
                                                                        <i class="fa-solid fa-circle" style="color:orange"></i>
                                                                        @elseif ($week->rag == 3)
                                                                        <i class="fa-solid fa-circle" style="color:red"></i>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if ($week->phase == 1)
                                                                        Planning
                                                                        @elseif ($week->phase == 2)
                                                                        Development
                                                                        @elseif ($week->phase == 3)
                                                                        Testing
                                                                        @elseif ($week->phase == 4)
                                                                        User Acceptance
                                                                        @elseif ($week->phase == 5)
                                                                        Live
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$week->executive}}</td>
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
                            <!-- Project Ledger Tab -->
                            <div class="tab-pane fade " id="ledger" role="tabpanel" aria-labelledby="ledger-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-sm table-striped table-hover">
                                                    <thead>
                                                        <th scope="col" width="15%">Date</th>
                                                        <th scope="col" width="15%">Cost Component</th>
                                                        <th scope="col" width="25%">Remarks</th>
                                                        <th scope="col" width="15%">Positive</th>
                                                        <th scope="col" width="15%">Negative</th>
                                                        <th scope="col" width="15%">Attachment</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($ledger as $data)
                                                            @if ($data->cost_type == 1)
                                                                <tr>
                                                                    <td>{{date_format(date_create($data->created_at),'F d, Y')}}</td>
                                                                    <td>{{$data->costname}}</td>
                                                                    <td>{{$data->description}}</td>
                                                                    <td><b style="color:#05b014">Php {{number_format($data->value,2,'.',',')}}</b></td>
                                                                    <td></td>
                                                                    @if(!empty($data->link))
                                                                    <td><a target="_blank" href="{{$data->link}}">Attachment Here</a></td>
                                                                    @else
                                                                    <td></td>
                                                                    @endif
                                                                </tr>
                                                            @elseif ($data->cost_type == 2)
                                                                <tr>
                                                                    <td>{{date_format(date_create($data->created_at),'F d, Y')}}</td>
                                                                    <td>{{$data->costname}}</td>
                                                                    <td>{{$data->description}}</td>
                                                                    <td></td>
                                                                    <td><b style="color:#a10603">Php {{number_format($data->value,2,'.',',')}}</b></td>
                                                                    @if(!empty($data->link))
                                                                    <td><a target="_blank" href="{{$data->link}}">Attachment Here</a></td>
                                                                    @else
                                                                    <td></td>
                                                                    @endif
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        <tr class="bg-secondary">
                                                            <td><b>TOTAL</b></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><b style="color:#05e626">Php {{number_format($sum_positive,2,'.',',')}}</b></td>
                                                            <td><b style="color:#ff7b78">Php {{number_format($actual_cost,2,'.',',')}}</b></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <form action="/ledger/negative/{{$project['id']}}" method="POST">
                                        @csrf
                                            <div class="row align-text-bottom">
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                      <label for="cost_component">Cost Component</label>
                                                      <select name="cost_component" id="cost_component" class="form-control @error('cost_component') is-invalid @enderror" value="{{old('cost_component')}}" required>
                                                        @foreach($cost_components as $com)
                                                        <option value="{{$com->id}}">{{$com->name}}</option>
                                                        @endforeach
                                                      </select>
                                                      @error('cost_component')
                                                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group">
                                                        <label for="group_budget">Project Expense Value</label>
                                                          <div name="group_budget" class="input-group">
                                                            <div class="input-group-prepend">
                                                              <span class="input-group-text">Php</span>
                                                            </div>
                                                            <input type="number" name="value" class="form-control" placeholder="00.00" value="{{old('value')}}">
                                                            @error('value')
                                                            <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                            @enderror
                                                          </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                      <label for="description">Remarks</label>
                                                      <input type="text" step=".01" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Insert remarks here" value="{{old('description')}}">
                                                      @error('description')
                                                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                      <label for="link">Attachment</label>
                                                      <input type="text" step=".01" name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Insert attachment link here" value="{{old('link')}}">
                                                      @error('link')
                                                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                      @enderror
                                                    </div>
                                                </div>
                                                  <div class="col-lg-12 text-right">
                                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa-solid fa-plus"></i> Insert Expense</button>
                                                  </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Project Artifacts Tab -->
                            <div class="tab-pane fade" id="artifacts" role="tabpanel" aria-labelledby="artifacts-tab">
                                <form class="needs-validation" novalidate action="/artifact/batchupdate" method="POST">
                                <input type="text" name="proj_id" value="{{$project->proj_id}}" hidden>
                                @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <table class="table table-sm">
                                                        <tbody>
                                                            @foreach ($artifacts as $data)
                                                                <tr>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">{{$data->artifact_name}}</span>
                                                                            </div>
                                                                            <input type="text" class="form-control" name="artifacts_updated[{{$data->id}}]" aria-describedby="basic-addon2" value="{{$data->link}}" >
                                                                            @if(!empty($data->link))
                                                                            <div class="input-group-append">
                                                                                <a class="btn btn-success" target="_blank" href="{{$data->link}}" type="button">Go to Link</a>
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                                            Reset</button>
                                            <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                            Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Project Change Requests Tab -->
                            <div class="tab-pane fade" id="crs" role="tabpanel" aria-labelledby="crs-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="text-left">
                                                            <h3 class="m-0 d-inline">Budget Change Requests</h3>
                                                            <a href="/crbudget/create/{{$project['proj_id']}}" class="ml-2 d-inline btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i></a>

                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        @if(count($crb) > 0)
                                                            <table class="project_table table table-sm table-striped table-bordered table-hover text-center"
                                                                style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>CR ID</th>
                                                                        <th>Project Name</th>
                                                                        <th>From</th>
                                                                        <th>To</th>
                                                                        <th>Delta</th>
                                                                        <th>PM</th>
                                                                        <th>Status</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($crb as $data)
                                                                        <tr>
                                                                            <td>{{ $data->crb_id }}</td>
                                                                            <td><b>{{ $data->project_name }}</b></td>
                                                                            <td>Php {{ number_format($data->old_budget,2,'.',',') }}</td>
                                                                            <td><b style="color:orange;">Php {{ number_format($data->new_budget,2,'.',',') }}</b></td>
                                                                            <td><b style="color:orange;">Php {{ number_format($data->delta,2,'.',',') }}</b></td>
                                                                            <td>{{ $data->pmname }}</td>
                                                                            <td>
                                                                                @if ($data->status == 0)
                                                                                    <span class="badge badge-pill badge-warning">For Approval</span>
                                                                                @elseif ($data->status == 1)
                                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                                @elseif ($data->status == 2)
                                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                                @endif
                                                                            </td>
                                                                            <td><a href="/crbudget/{{$data->crb_id}}" class="ml-2 d-inline btn btn-xs btn-secondary"><i class="fa-solid fa-eye"></i></a></td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        @else
                                                            <h4><i>You have no Schedule Change Requests</i></h4>  
                                                        @endif
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.row -->
                                            </div><!-- /.container-fluid -->
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="text-left">
                                                            <h3 class="d-inline m-0">Schedule Change Requests</h3>
                                                            <a href="/crsched/create/{{$project['proj_id']}}" class="ml-2 d-inline btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        @if(count($crs) > 0)
                                                            <table class="project_table table table-sm table-striped table-bordered table-hover text-center"
                                                                style="width: 100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>CR ID</th>
                                                                        <th>Project Name</th>
                                                                        <th>Current Live Date</th>
                                                                        <th>New Live Date</th>
                                                                        <th>Current Close Date</th>
                                                                        <th>New Close Date</th>
                                                                        <th>PM</th>
                                                                        <th>Status</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($crs as $data)
                                                                        <tr>
                                                                            <td>{{ $data->crs_id }}</td>
                                                                            <td><b>{{ $data->project_name }}</b></td>
                                                                            <td>{{date_format(date_create($data->old_live),'F d, Y')}}</td>
                                                                            <td><b style="color:orange;">{{date_format(date_create($data->new_live),'F d, Y')}}</b></td>
                                                                            <td>{{date_format(date_create($data->old_close),'F d, Y')}}</td>
                                                                            <td><b style="color:orange;">{{date_format(date_create($data->new_close),'F d, Y')}}</b></td>
                                                                            <td>{{ $data->pmname }}</td>
                                                                            <td>
                                                                                @if ($data->status == 0)
                                                                                    <span class="badge badge-pill badge-warning">For Approval</span>
                                                                                @elseif ($data->status == 1)
                                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                                @elseif ($data->status == 2)
                                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                                @endif
                                                                            </td>
                                                                            <td><a href="/crbudget/{{$data->crb_id}}" class="ml-2 d-inline btn btn-xs btn-secondary"><i class="fa-solid fa-eye"></i></a></td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        @else
                                                            <h4><i>You have no Schedule Change Requests</i></h4>  
                                                        @endif
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Project Logs Tab -->
                            <div class="tab-pane fade" id="logs" role="tabpanel" aria-labelledby="logs-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-sm table-striped table-hover">
                                                    <tbody>
                                                        @foreach($logs as $log)
                                                        <tr>
                                                            <td>
                                                                <b>{{date_format(date_create($log->created_at),'F d, Y')}}</b> | 
                                                                @if($log->action == 1)
                                                                Created
                                                                @elseif($log->action == 2)
                                                                Updated
                                                                @elseif($log->action == 3)
                                                                Approved
                                                                @elseif($log->action == 4)
                                                                Rejected
                                                                @endif

                                                                @if($log->item == 1)
                                                                project by {{$log->name}}
                                                                @elseif($log->item == 2)
                                                                budget change request by {{$log->name}}
                                                                @elseif($log->item == 3)
                                                                schedule by {{$log->name}}
                                                                @elseif($log->item == 4)
                                                                weekly report by {{$log->name}}
                                                                @endif

                                                                @if(!empty($log->remarks))
                                                                ({{$log->remarks}})
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Project Weekly Reports Tab -->
                            <div class="tab-pane fade " id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                    <a href="/weeklyreport/create/{{$project->proj_id}}" class="ml-2 d-inline btn btn-primary"><i class="fa-solid fa-plus"></i> Add Weekly Report</a>
                                            </div>
                                            <div class="col-lg-7">
                                                <div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
                                                    <ol class="carousel-indicators">
                                                        <?php $forcount_ind = 1; ?>
                                                        @foreach ($weekly as $week)
                                                            @if ($forcount_ind == $weekly_count)
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$forcount_ind}}" class="active"></li>
                                                            @else
                                                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$forcount_ind}}" class=""></li>
                                                            @endif
                                                        <?php $forcount_ind++; ?>
                                                        @endforeach
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <?php $forcount = 1; ?>
                                                        @foreach ($weekly as $week)

                                                        @if($forcount == $weekly_count)
                                                            <div class="carousel-item p-3 active" style="background-color:#d9d9d9">
                                                        @else
                                                            <div class="carousel-item p-3" style="background-color:#d9d9d9">
                                                        @endif
                                                            <div class="row">
                                                                <div class="col-lg-12 mb-3 mt-3">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="row">
                                                                                <div class="col-lg-8">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12">
                                                                                            <h3><b>{{$project->short_name}} 
                                                                                                @if ($week->rag == 1)
                                                                                                    <i class="fa-solid fa-circle" style="color:green"></i>
                                                                                                @elseif ($week->rag == 2)
                                                                                                    <i class="fa-solid fa-circle" style="color:orange"></i>
                                                                                                @elseif ($week->rag == 3)
                                                                                                    <i class="fa-solid fa-circle" style="color:red"></i>
                                                                                                @else
                                                                                                    <i class="fa-solid fa-circle" style="color:gray"></i>
                                                                                                @endif
                                                                                            </b></h3>
                                                                                        </div>
                                                                                        <div class="col-lg-12">
                                                                                            <h6>{{date_format(date_create($week->start),'F d, Y')}} --- {{date_format(date_create($week->end),'F d, Y')}}</h6>
                                                                                        </div>
                                                                                        <div class="col-lg-12">
                                                                                            <h5><b>Executive Summary:</b> {{$week->executive}}</h5>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6 mb-1">
                                                                                            <div class="form-group">
                                                                                                <label for="progress">Progress</label>
                                                                                                <input type="text" name="progress" class=" form-control" value="{{$week->progress}}%" disabled>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-1">
                                                                                            <div class="form-group">
                                                                                                <label for="workweek">Work Week</label>
                                                                                                <input type="text" name="workweek" class=" form-control" value="{{$week->workweek}}" disabled>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-1">
                                                                                            <div class="form-group">
                                                                                                <label for="phase">Phase</label>
                                                                                                @if($week->phase == 1)
                                                                                                <input type="text" name="phase" class=" form-control" value="Planning" disabled>
                                                                                                @elseif($week->phase == 2)
                                                                                                <input type="text" name="phase" class=" form-control" value="Development" disabled>
                                                                                                @elseif($week->phase == 3)
                                                                                                <input type="text" name="phase" class=" form-control" value="Testing" disabled>
                                                                                                @elseif($week->phase == 4)
                                                                                                <input type="text" name="phase" class=" form-control" value="User Acceptance" disabled>
                                                                                                @elseif($week->phase == 5)
                                                                                                <input type="text" name="phase" class=" form-control" value="Live" disabled>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6 mb-1">
                                                                                            <div class="form-group">
                                                                                                <label for="gate">Gate</label>
                                                                                                @if($week->gate == 1)
                                                                                                <input type="text" name="gate" class=" form-control" value="G1 - Initiation" disabled>
                                                                                                @elseif($week->gate == 2)
                                                                                                <input type="text" name="gate" class=" form-control" value="G2 - Planning" disabled>
                                                                                                @elseif($week->gate == 3)
                                                                                                <input type="text" name="gate" class=" form-control" value="G3 - Execution" disabled>
                                                                                                @elseif($week->gate == 4)
                                                                                                <input type="text" name="gate" class=" form-control" value="G4 - Closing" disabled>
                                                                                                @elseif($week->gate == 5)
                                                                                                <input type="text" name="gate" class=" form-control" value="BR - Benefits Realization" disabled>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mb-3 mt-3">
                                                                    <div class="row">
                                                                        @if(!(empty($week->highlights)))
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <h4><label for="highlights">Project Highlights</label></h4>
                                                                                <textarea name="description" class="form-control" rows="5" disabled>{{$week->highlights}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @if(!(empty($week->risks)))
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <h4><label for="risks">Project Risks</label></h4>
                                                                                <textarea name="risks" class="form-control" rows="5" disabled>{{$week->risks}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @if(!(empty($week->nextsteps)))
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <h4><label for="nextsteps">Project Next Steps</label></h4>
                                                                                <textarea name="nextsteps" class="form-control" rows="5" disabled>{{$week->nextsteps}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @if(!(empty($week->help)))
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <h4><label for="help">Project Help Needed</label></h4>
                                                                                <textarea name="help" class="form-control" rows="5" disabled>{{$week->help}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php $forcount++; ?>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MOMs Tab -->
                            <div class="tab-pane fade" id="mom" role="tabpanel" aria-labelledby="mom-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="text-left">
                                            <h3 class="d-inline m-0">Minutes of the Meeting (MOMs)</h3>
                                            <a href="/mom/create" class="ml-2 d-inline btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @if(count($crs) > 0)
                                            <table class="project_table table table-sm table-striped table-bordered table-hover text-center"
                                                style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Meeting Title</th>
                                                        <th>Agenda</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($crs as $data)
                                                        <tr>
                                                            <td>July 25, 2024</td>
                                                            <td><b><a href="/crbudget/{{$data->crb_id}}" class="d-inline">CTG Meeting for Infra Requirements</a></b></td>
                                                            <td>This meeting will address the current production concerns in the Moses Website. This will also allow the stakeholders to assign a CTG POC.</td>
                                                            <td></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <h4><i>You have no recorded MOMs</i></h4>  
                                        @endif
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>


                        </div>
                            
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                    
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>
@endsection
