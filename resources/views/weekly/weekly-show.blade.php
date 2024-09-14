@extends('template.main')
@section('title', 'Week '.$weekly['workweek'].' for '.$weekly['project_name'])
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <div class="text-right">
                            <a href="/weeklyreport" class="ml-2 d-inline btn btn-warning"><i class="fa-solid fa-undo"></i> Back</a>

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
                    <div class="col-7">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <h3><b>{{$weekly['project_name']}} 
                                                                    @if ($weekly['rag'] == 1)
                                                                        <i class="fa-solid fa-circle" style="color:green"></i>
                                                                    @elseif ($weekly['rag'] == 2)
                                                                        <i class="fa-solid fa-circle" style="color:orange"></i>
                                                                    @elseif ($weekly['rag'] == 3)
                                                                        <i class="fa-solid fa-circle" style="color:red"></i>
                                                                    @else
                                                                        <i class="fa-solid fa-circle" style="color:gray"></i>
                                                                    @endif
                                                                </b></h3>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h6>{{date_format(date_create($weekly['start']),'F d, Y')}} --- {{date_format(date_create($weekly['end']),'F d, Y')}}</h6>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h5><b>Executive Summary:</b> {{$weekly['executive']}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-1">
                                                                <div class="form-group">
                                                                    <label for="progress">Progress</label>
                                                                    <input type="text" name="progress" class=" form-control" value="{{$weekly['progress']}}%" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-1">
                                                                <div class="form-group">
                                                                    <label for="workweek">Work Week</label>
                                                                    <input type="text" name="workweek" class=" form-control" value="{{$weekly['workweek']}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-1">
                                                                <div class="form-group">
                                                                    <label for="phase">Phase</label>
                                                                    @if($weekly['phase'] == 1)
                                                                    <input type="text" name="phase" class=" form-control" value="Planning" disabled>
                                                                    @elseif($weekly['phase'] == 2)
                                                                    <input type="text" name="phase" class=" form-control" value="Development" disabled>
                                                                    @elseif($weekly['phase'] == 3)
                                                                    <input type="text" name="phase" class=" form-control" value="Testing" disabled>
                                                                    @elseif($weekly['phase'] == 4)
                                                                    <input type="text" name="phase" class=" form-control" value="User Acceptance" disabled>
                                                                    @elseif($weekly['phase'] == 5)
                                                                    <input type="text" name="phase" class=" form-control" value="Live" disabled>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-1">
                                                                <div class="form-group">
                                                                    <label for="gate">Gate</label>
                                                                    @if($weekly['gate'] == 1)
                                                                    <input type="text" name="gate" class=" form-control" value="G1 - Initiation" disabled>
                                                                    @elseif($weekly['gate'] == 2)
                                                                    <input type="text" name="gate" class=" form-control" value="G2 - Planning" disabled>
                                                                    @elseif($weekly['gate'] == 3)
                                                                    <input type="text" name="gate" class=" form-control" value="G3 - Execution" disabled>
                                                                    @elseif($weekly['gate'] == 4)
                                                                    <input type="text" name="gate" class=" form-control" value="G4 - Closing" disabled>
                                                                    @elseif($weekly['gate'] == 5)
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
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h4><label for="highlights">Project Highlights</label></h4>
                                                    <textarea name="description" class="form-control" rows="5" disabled>{{$weekly['highlights']}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h4><label for="risks">Project Risks</label></h4>
                                                    <textarea name="risks" class="form-control" rows="5" disabled>{{$weekly['risks']}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h4><label for="nextsteps">Project Next Steps</label></h4>
                                                    <textarea name="nextsteps" class="form-control" rows="5" disabled>{{$weekly['nextsteps']}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <h4><label for="help">Project Help Needed</label></h4>
                                                    <textarea name="help" class="form-control" rows="5" disabled>{{$weekly['help']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
