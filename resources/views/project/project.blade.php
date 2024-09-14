@extends('template.main')
@section('title', 'All Projects')
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
                    @if(count($internal_projects) > 0)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="m-0 d-inline">Internal Projects</h3>
                                    <a href="/project/create/internal" class="ml-2 d-inline btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i></a>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="project_table table table-sm table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>SPI</th>
                                            <th>CPI</th>
                                            @if (auth()->user()->role == 2)
                                            <th>Project Manager</th>
                                            @endif
                                            <th>Dept</th>
                                            <th>Start Date</th>
                                            <th>Live Date</th>
                                            <th>Close Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($internal_projects as $data)
                                            <tr>
                                                <td>
                                                    @if ($data->status == 1)
                                                        <span class="badge badge-primary">On-going</span>
                                                    @elseif ($data->status == 2)
                                                        <span class="badge badge-success">Completed</span>
                                                    @elseif ($data->status == 3)
                                                        <span class="badge badge-warning">On-hold</span>
                                                    @endif
                                                </td>
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
                                                @if (auth()->user()->role == 2)
                                                    <td>{{ $data->pmname }}</td>
                                                @endif
                                                <td>{{$data->sponsor_dept}}</td>
                                                <td>{{date_format(date_create($data->p_start),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_live),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_close),'F d, Y')}}</td>
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

                    @if(count($external_projects) > 0)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="d-inline m-0">External Projects</h3>
                                    <a href="/project/create/external" class="ml-2 d-inline btn btn-sm btn-primary"><i class="fa-solid fa-plus"></i></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="project_table table table-sm table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>SPI</th>
                                            <th>CPI</th>
                                            @if (auth()->user()->role == 2)
                                            <th>Project Manager</th>
                                            @endif
                                            <th>Client</th>
                                            <th>Start Date</th>
                                            <th>Live Date</th>
                                            <th>Close Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($external_projects as $data)
                                            <tr>
                                                <td>
                                                    @if ($data->status == 1)
                                                        <span class="badge badge-primary">On-going</span>
                                                    @elseif ($data->status == 2)
                                                        <span class="badge badge-success">Completed</span>
                                                    @elseif ($data->status == 3)
                                                        <span class="badge badge-warning">On-hold</span>
                                                    @endif
                                                </td>
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
                                                @if (auth()->user()->role == 2)
                                                    <td>{{ $data->pmname }}</td>
                                                @endif
                                                <td>{{$data->sponsor_name}}</td>
                                                <td>{{date_format(date_create($data->p_start),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_live),'F d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_close),'F d, Y')}}</td>
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
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
