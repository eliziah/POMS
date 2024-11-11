@extends('template.guest')
@section('title', $project->proj_id)
@section('content')

    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-3">
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
                                                    <div class="col-lg-12 ">
                                                        <h3 class="mr-2 d-inline"><span class="badge badge-pill badge-success">CPI {{number_format((float)$project->cpi, 2, '.', '')}}</span></h3>
                                                        <h3 class="mr-2 d-inline"><span class="badge badge-pill badge-warning">SPI {{number_format((float)$project->spi, 2, '.', '')}}</span></h3>
                                                        <h3 class="mr-2 d-inline"><span class="badge badge-pill badge-secondary">FW {{number_format((float)$project->fw, 2, '.', '')}}%</span></h3>
                                                        <h3 class="mr-2 d-inline"><span class="badge badge-pill badge-primary">Progress {{$project->progress}}%</span></h3>
                                                    </div>
                                                    <div class="col-12 d-none d-lg-block mt-3">
                                                        <a href="/project" class="ml-2 d-inline btn btn-outline-secondary elevation-2"><i class="fa-solid fa-folder"></i> Repo</a>
                                                        @if ($project['area_type'] == 'Internal')
                                                        <a href="{{$project['repository']}}" target="_blank" class="ml-2 d-inline btn btn-outline-secondary elevation-2"><i class="fa-solid fa-file"></i> BCD</a>
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
                                                    <div class="col-lg-12 mt-3">
                                                        <h5><b>T3 Project ID:</b><br/> {{$project->t3_id}}</h5>
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
                                                        @if($project->area_type == "Internal")
                                                        <h5><b>Overall Budget:</b><br/> Php {{number_format($project->overall_budget,2,'.',',')}}</h5>
                                                        @elseif($project->area_type == "External")
                                                        <h5><b>Contract Value:</b><br/> Php {{number_format($project->overall_budget,2,'.',',')}}</h5>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-12 mt-3">
                                                        <h5><b>T3 Budget:</b><br/> Php {{number_format($project->budget,2,'.',',')}}</h5>
                                                    </div>
                                                    <div class="col-lg-12 mt-3">
                                                        <h5><b>T3 Earned Value:</b><br/> Php {{number_format(($project->budget*($project->progress/100)),2,'.',',')}}</h5>
                                                    </div>
                                                    <div class="col-lg-12 mt-3">
                                                        <h5><b>T3 Actual Cost:</b><br/> Php {{number_format($project->actual_cost,2,'.',',')}}</h5>
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
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mt-3 order-1 order-lg-2 order-xl-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5><b>Progress Trend</b></h5>
                                            </div>
                                            <div class="col-lg-12">
                                                <canvas id="guest_trend_chart" style="width:100%;max-height: 350px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            const xValues = @json($trend_ends);
                                            const yValues = @json($trend_progress);
                                            new Chart("guest_trend_chart", {
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
                                                    maintainAspectRatio: false,
                                                    // scales: {
                                                    //     yAxes: [{
                                                    //         display: true,
                                                    //         ticks: {suggestedMin: 0,
                                                    //             suggestedMax: 100}
                                                    //     }]
                                                    // }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($weekly_3_reversed) > 0)
                        <div class="col-lg-12 mt-3 d-none d-lg-flex align-items-stretch order-lg-3 order-xl-3">
                            <div class="card">
                                <div class="card-body">    
                                    <div class="row">
                                            <div class="col-lg-12">
                                                <h5><b>Weekly Progress</b></h5>
                                            </div>
                                            <div class="col-lg-12">
                                                <table class="table table-sm table-striped table-hover text">
                                                    <thead>
                                                        <th scope="col">Work Week</th>
                                                        <th scope="col">Progress</th>
                                                        <th scope="col">RAG</th>
                                                        <th scope="col">Phase</th>
                                                        <th scope="col" width="60%">Executive Summary</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($weekly_3_reversed as $week)
                                                        <tr>
                                                            <td>{{date_format(date_create($week->start),'M d, Y')}} ({{$week->workweek}})</td>
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
                    @endif
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>
@endsection
