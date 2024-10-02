@extends('template.main')
@section('title', 'IPG Portfolio Status')
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table table-sm table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Project Name</th>
                                                    <th width="5%">As Of</th>
                                                    <th width="5%">Progress</th>
                                                    <th width="10%">Phase</th>
                                                    <th width="50%">Executive Summary</th>
                                                    <th width="10%">Project Manager</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($weekly_reports as $data)
                                                <tr>
                                                    <td>
                                                        @if ($data->rag == 1)
                                                        <i class="fa-solid fa-circle" style="color:green"></i>
                                                        @elseif ($data->rag == 2)
                                                            <i class="fa-solid fa-circle" style="color:orange"></i>
                                                        @elseif ($data->rag == 3)
                                                            <i class="fa-solid fa-circle" style="color:red"></i>
                                                        @else
                                                            <i class="fa-solid fa-circle" style="color:gray"></i>
                                                        @endif
                                                        <a href="/project/{{ $data->proj_id }}">{{ $data->short_name }}
                                                    </td>
                                                    <td>{{date_format(date_create($data->created_at),'M d')}}</td>
                                                    <td>{{$data->progress}}%</td>
                                                    <td>
                                                        @if ($data->phase == 1)
                                                        Planning
                                                        @elseif ($data->phase == 2)
                                                        Development
                                                        @elseif ($data->phase == 3)
                                                        Testing
                                                        @elseif ($data->phase == 4)
                                                        User Acceptance
                                                        @elseif ($data->phase == 5)
                                                        Live
                                                        @endif
                                                    </td>
                                                    <td>{{$data->executive}}</td>
                                                    <td>{{$data->pmname}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
