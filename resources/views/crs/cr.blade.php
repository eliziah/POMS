@extends('template.main')
@section('title', 'Change Requests')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <!-- <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">



                            </li>
                        </ol>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    @if(count($crb)>0)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="m-0 d-inline">Budget Change Requests</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="cr_view_table table table-sm table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>CR ID</th>
                                            <th>Project Name</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Delta</th>
                                            @if (auth()->user()->role == 2)
                                            <th>Project Manager</th>
                                            @endif
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($crb as $data)
                                            <tr>
                                                <td><a href="/crbudget/{{$data->crb_id}}">{{ $data->crb_id }}</a></td>
                                                <td><b>{{ $data->project_name }}</b></td>
                                                <td>Php {{ number_format($data->old_budget,2,'.',',') }}</td>
                                                <td><b style="color:orange;">Php {{ number_format($data->new_budget,2,'.',',') }}</b></td>
                                                <td><b style="color:orange;">Php {{ number_format($data->delta,2,'.',',') }}</b></td>
                                                @if (auth()->user()->role == 2)
                                                <td>{{ $data->pmname }}</td>
                                                @endif
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                    @endif

                    @if(count($crs)>0)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="d-inline m-0">Schedule Change Requests</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="cr_view_table table table-sm table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>CR ID</th>
                                            <th>Project Name</th>
                                            <th>Current Live Date</th>
                                            <th>New Live Date</th>
                                            <th>Current Close Date</th>
                                            <th>New Close Date</th>
                                            @if (auth()->user()->role == 2)
                                            <th>Project Manager</th>
                                            @endif
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($crs as $data)
                                            <tr>
                                                <td><a href="/crsched/{{$data->crs_id}}">{{ $data->crs_id }}</a></td>
                                                <td><b>{{ $data->project_name }}</b></td>
                                                <td>{{date_format(date_create($data->old_live),'F d, Y')}}</td>
                                                <td><b style="color:orange;">{{date_format(date_create($data->new_live),'F d, Y')}}</b></td>
                                                <td>{{date_format(date_create($data->old_close),'F d, Y')}}</td>
                                                <td><b style="color:orange;">{{date_format(date_create($data->new_close),'F d, Y')}}</b></td>
                                                @if (auth()->user()->role == 2)
                                                <td>{{ $data->pmname }}</td>
                                                @endif
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.row -->
                    </div>
                    @endif
                    @if(count($crb)==0 && count($crs)==0)
                    <div class="row">
                        <div class="col-lg-12 text-center ml-2"><h3>You have no change requests</h3></div>
                    </div>
                    @endif
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
