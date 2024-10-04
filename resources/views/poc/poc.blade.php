@extends('template.main')
@section('title', 'All Projects')
@section('content')

    <div class="content-wrapper">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 text-center mb-3 mt-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3><b>IPG - PROOF OF CONCEPTS</b></h3>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" href="/poc?status=all"  class="btn btn-secondary">All POCs</a>
                                    <a type="button" href="/poc?status=1"  class="btn btn-primary">Ongoing</a>
                                    <a type="button" href="/poc?status=2"  class="btn btn-warning">Onhold</a>
                                    <a type="button" href="/poc?status=3"  class="btn btn-danger">Failed</a>
                                    <a type="button" href="/poc?status=4"  class="btn btn-success">Passed</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($pocs) > 0)
                    <div class="col-12">
                        <div class="card border-left-warning shadow  ">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="project_table table table-sm table-striped table-bordered table-hover text-center"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Status</th> 
                                            <th>POC ID</th>
                                            <th>POC Name</th>
                                            <th>Phase</th>
                                            <th>Department</th>
                                            <th>Product</th>
                                            <th>Platform</th>
                                            <th>Project Manager</th>
                                            <th>Start Date</th>
                                            <th>Live Date</th>
                                            <th>Eval Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pocs as $data)
                                            <tr>
                                                <td>
                                                    @if ($data->status == 1)
                                                        <span class="badge badge-primary">On-going ({{$data->progress}}%)</span>
                                                    @elseif ($data->status == 2)
                                                        <span class="badge badge-warning">On-hold ({{$data->progress}}%)</span>
                                                    @elseif ($data->status == 3)
                                                        <span class="badge badge-success">Passed</span>
                                                    @elseif ($data->status == 4)
                                                        <span class="badge badge-danger">Failed</span>
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
                                                    <a href="/project/{{ $data->poc_id }}">{{ $data->poc_id }}
                                                </td>
                                                <td><b>{{ $data->short_name }}</b></td>
                                                <td>
                                                @if ($data->phase == 1)
                                                    <span class="badge badge-secondary">Planning</span>
                                                @elseif ($data->status == 2)
                                                    <span class="badge badge-primary">Development</span>
                                                @elseif ($data->status == 3)
                                                    <span class="badge badge-success">Evaluation</span>
                                                @endif
                                                </td>
                                                <td>{{$data->department}}</td>
                                                <td>{{$data->product}}</td>
                                                <td>{{$data->platform}}</td>
                                                <td>{{ $data->pmname }}</td>
                                                <td>{{date_format(date_create($data->p_start),'M d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_live),'M d, Y')}}</td>
                                                <td>{{date_format(date_create($data->p_evaluation),'M d, Y')}}</td>
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
