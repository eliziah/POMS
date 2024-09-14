@extends('template.guest')
@section('title', 'All Projects')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">



                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content pt-3">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="m-0 d-inline">Internal Projects</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="project_table table table-sm table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Project Manager</th>
                                            <th>Sponsor</th>
                                            <th>Start Date</th>
                                            <th>Live Date</th>
                                            <th>Close Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($internal_projects as $data)
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
                                                    <a href="/guest/project/{{ $data->proj_id }}">{{ $data->proj_id }}
                                                </td>
                                                <td><b>{{ $data->short_name }}</b></td>
                                                <td>{{ $data->pmname }}</td>
                                                <td>{{$data->sponsor_name}}</td>
                                                <td>{{date_format(date_create($data->p_start),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_live),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_close),'F d, Y')}}</td>
                                                <td>
                                                    @if ($data->status == 1)
                                                        <span class="badge badge-primary">On-going</span>
                                                    @elseif ($data->status == 2)
                                                        <span class="badge badge-success">Completed</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="d-inline m-0">External Projects</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="project_table table table-sm table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Project Manager</th>
                                            <th>Client</th>
                                            <th>Start Date</th>
                                            <th>Live Date</th>
                                            <th>Close Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($external_projects as $data)
                                            <tr>
                                                <td>
                                                    @if ($data->status == 1)
                                                        @if ($data->rag == 1)
                                                            <i class="fa-solid fa-circle" style="color:green"></i>
                                                        @elseif ($data->rag == 2)
                                                            <i class="fa-solid fa-circle" style="color:orange"></i>
                                                        @elseif ($data->rag == 3)
                                                            <i class="fa-solid fa-circle" style="color:red"></i>
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
                                                <td>{{$data->sponsor_name}}</td>
                                                <td>{{date_format(date_create($data->p_start),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_live),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_close),'F d, Y')}}</td>
                                                <td>
                                                    @if ($data->status == 1)
                                                        <span class="badge badge-primary">On-going</span>
                                                    @elseif ($data->status == 2)
                                                        <span class="badge badge-success">Completed</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
