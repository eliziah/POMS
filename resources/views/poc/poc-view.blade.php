@extends('template.main')
@section('title', $project->poc_id)
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
                            <a href="/poc" class="ml-2 d-inline btn btn-sm btn-warning"><i class="fa-solid fa-undo"></i> Back</a>

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
                            <li class="nav-item">
                                <a class="nav-link" id="criteria-tab" data-toggle="tab" href="#criteria" role="tab" aria-controls="criteria" aria-selected="false">Acceptance Criteria</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="artifacts-tab" data-toggle="tab" href="#artifacts" role="tab" aria-controls="artifacts" aria-selected="false">Artifacts</a>
                            </li>
                            <li class="nav-item d-none d-lg-flex">
                                <a class="nav-link" id="weekly-tab" data-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly Reports</a>
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
                                                                <h4 class="d-inline font-weight-bold">POC | {{$project->short_name}}</h4>
                                                                @if ($project->status == 1)
                                                                    @if ($project->rag == 1)
                                                                    <h6 class="d-inline ml-2"><i class="fa-solid fa-circle" style="color:green"></i></h6>
                                                                    @elseif ($project->rag == 2)
                                                                    <h6 class="d-inline ml-2"><i class="fa-solid fa-circle" style="color:orange"></i></h6>
                                                                    @elseif ($project->rag == 3)
                                                                    <h6 class="d-inline ml-2">
                                                                        <div class="spinner-grow text-danger" role="status">
                                                                          <span class="visually-hidden"></span>
                                                                        </div>
                                                                    </h6>
                                                                    @else
                                                                    <h5 class="d-inline ml-2"><i class="fa-solid fa-circle" style="color:gray"></i></h5>
                                                                    @endif
                                                                @elseif ($project->status == 2)
                                                                    <h5 class="d-inline ml-2"><span class="badge  badge-warning">On-hold</span></h5>
                                                                @elseif ($project->status == 3)
                                                                    <h5 class="d-inline ml-2"><span class="badge  badge-danger">Failed</span></h5>
                                                                @elseif ($project->status == 4)
                                                                    <h5 class="d-inline ml-2"><span class="badge  badge-success">Passed</span></h5>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 text-lg-left text-xl-left text-center">
                                                                <h5>{{$project->description}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 text-lg-right text-xl-right text-center">
                                                        <div class="row">
                                                            <div class="col-lg-12 ">
                                                                <h4 class="mr-2 d-inline"><span class="badge badge-pill badge-primary">Progress {{$project->progress}}%</span></h4>
                                                            </div>
                                                            @if (auth()->user()->role == 2)
                                                            <div class="col-12 d-none d-lg-block mt-2 mb-2">
                                                                <a href="#" class="ml-2 d-inline btn btn-sm btn-outline-secondary elevation-2"><i class="fa-solid fa-user-pen"></i> Switch PM</a>
                                                                <!-- <a href="#" class="ml-2 d-inline btn btn-outline-success elevation-2"><i class="fa-solid fa-arrow-up"></i> Declare Live</a> -->
                                                                @if($project['status'] == 2)
                                                                <a href="/pocupdate/resume/{{$project['id']}}" class="ml-2 d-inline btn btn-sm btn-outline-success elevation-2"><i class="fa-solid fa-arrow-right"></i> Resume Project</a>
                                                                @else
                                                                <a href="/pocupdate/hold/{{$project['id']}}" class="ml-2 d-inline btn btn-sm btn-outline-warning elevation-2"><i class="fa-solid fa-hand"></i> Put On hold</a>
                                                                @endif
                                                                <a href="/pocupdate/terminate/{{$project['id']}}" class="ml-2 d-inline btn btn-sm btn-outline-danger elevation-2"><i class="fa-solid fa-ban"></i> Terminate</a>
                                                            </div>
                                                            @endif
                                                            <div class="col-12 d-none d-lg-block mt-2">
                                                                <a href="{{$project['repository']}}" class="ml-2 d-inline btn btn-sm btn-outline-secondary elevation-2"><i class="fa-solid fa-folder"></i> Project Folder</a>
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
                                                                <span><b>Project Status:</b><br/> <span class="text-primary">On-going</span></span>
                                                                @elseif($project->status == 2)
                                                                <span><b>Project Status:</b><br/> <span class="text-warning">On-hold</span></span>
                                                                @elseif($project->status == 3)
                                                                <span><b>Project Status:</b><br/> <span class="text-danger">Terminated</span></span>
                                                                @elseif($project->status == 4)
                                                                <span><b>Project Status:</b><br/> <span class="text-success">Passed</span></span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                @if($project->phase == 1)
                                                                <span><b>Project Phase:</b><br/> <span class="text-secondary">Planning</span></span>
                                                                @elseif($project->phase == 2)
                                                                <span><b>Project Phase:</b><br/> <span class="text-primary">Development</span></span>
                                                                @elseif($project->phase == 3)
                                                                <span><b>Project Phase:</b><br/> <span class="text-success">Evalutaion</span></span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <span><b>Department:</b><br/> {{$project->department}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-12 mt-3">
                                                                <span><b>Planned Start Date:</b><br/> {{date_format(date_create($project->p_start),'F d, Y')}}</span>
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <span><b>Planned Live Date:</b><br/> {{date_format(date_create($project->p_live),'F d, Y')}}</span>
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <span><b>Planned Eval Date:</b><br/> {{date_format(date_create($project->p_evalutaion),'F d, Y')}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-12 mt-3">
                                                                <span><b>Platform:</b><br/> {{$project->platform}}</span>
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <span><b>Product:</b><br/> {{$project->product}}</span>
                                                            </div>
                                                            <div class="col-lg-12 mt-3">
                                                                <span><b>Project Budget:</b><br/> Php {{number_format($project->budget,2,'.',',')}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 mt-3 order-1 order-lg-2 order-xl-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <span><b>Progress Trend</b></span>
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
                                                            maintainAspectRatio: false,
                                                            // scales: {
                                                            //     yAxes: [{
                                                            //         display: true,
                                                            //         ticks: {suggestedMin: 50,
                                                            //             suggestedMax: 100}
                                                            //     }]
                                                            // }
                                                        }
                                                    });
                                                });
                                            </script>
                                            <div class="col-lg-12 mt-3 d-none d-lg-block   order-lg-3 order-xl-3">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5><b>Weekly Progress</b></h5>
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
                                                                        Evaluation
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
                            <!-- Project Artifacts Tab -->
                            <div class="tab-pane fade" id="criteria" role="tabpanel" aria-labelledby="criteria-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 px-5">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <th width="10%">Criteria #</th>
                                                        <th width="80%">Details</th>
                                                        <th width="10%">Status</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($criteria as $key => $data)
                                                            <tr>
                                                                <td>{{$key+1}}</td>
                                                                <td>{{$data->details}}</td>
                                                                @if($data->status == 0)
                                                                    <td><span class="text-primary">Pending</span></td>
                                                                @elseif($data->status == 1)
                                                                    <td><span class="text-success">Passed</span></td>
                                                                @elseif($data->status == 2)
                                                                    <td><span class="text-danger">Failed</span></td>
                                                                @endif
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
                        </div>
                    </div><!-- /.container-fluid -->
                    
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>
@endsection
