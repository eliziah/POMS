@extends('template.main')
@section('title', 'Weekly Reports')
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
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">



                            </li>
                        </ol>
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
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-sm table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th width="30%">Project Name</th>
                                            @for($i = 5; $i >= 0; $i--)
                                            <th>{{$week_now - $i}}</th>
                                            @endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $data)
                                            <tr>
                                                <td>{{ $data->short_name }}</td>
                                                @for($i = 5; $i >= 0; $i--)
                                                    <td>
                                                    @foreach($all_weekly as $weekly)
                                                        @if($weekly->workweek == ($week_now - $i) && $weekly->project_id == $data->id)
                                                        YES
                                                        @endif
                                                    @endforeach
                                                    </td>
                                                @endfor
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                    @if(count($all_weekly) > 0)
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="project_table table table-sm table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Week</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Project Name</th>
                                            <th>Executive Summary</th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_weekly as $data)
                                            <tr>
                                                <td>{{ $data->workweek }}</td>
                                                <td>{{date_format(date_create($data->start),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->end),'F d, Y')}}</td>
                                                <td><b>{{ $data->project_name }}</b></td>
                                                <td>{{ $data->executive }}</td>
                                                <td><a href="/weeklyreport/{{$data->id}}" class="btn btn-xs btn-secondary"><i class="fa-solid fa-eye"></i> View</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                    @endif
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
