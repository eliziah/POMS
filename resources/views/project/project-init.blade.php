@extends('template.main')
@section('title', 'Initialize - '.$project['name'])
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
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/project">Projects</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
<?php //var_dump($project); ?>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <div class="text-left">
                                    <a href="/project/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add
                                        Project</a>
                                </div>
                            </div> -->
                            <!-- /.card-header -->
                            <div class="card-body">
                            <form action="/project/{{$project['id_projects']}}/initialize/save" method="POST">
                            @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>Project Details</h4>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Name</b></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$project['name']}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Tagging</b></span>
                                            </div>
                                            <input type="text" class="form-control" value="OPEX" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Area</b></span>
                                            </div>
                                            <input type="text" class="form-control" value="INTERNAL" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Dept</b></span>
                                            </div>
                                            <input type="text" class="form-control" value="IT COE" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Budget</b></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{number_format($project['budget'],2,'.',',')}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12">
                                        <div class="input-group mb-3 input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>PM</b></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$project['pmname']}}" disabled>
                                        </div>
                                    </div>
                                    

                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4>Project Activities</h4>
                                            </div>
                                            <div class="col-lg-12">
                                                <table class="makethistable table table-striped table-bordered table-hover text-center" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Include</th>
                                                            <th>Activity</th>
                                                            <th>Category</th>
                                                            <th>Tag</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($activities as $data)
                                                            <tr>
                                                                <td>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" name="activities[]" value="{{ $data->id_activities }}" class="custom-control-input" id="switch{{$loop->iteration}}">
                                                                        <label class="custom-control-label" for="switch{{$loop->iteration}}">Include</label>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $data->name }}</td>
                                                                <td>{{ $data->category_name }}</td>
                                                                <td>{{ $data->tag_name }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4>Project Members</h4>
                                            </div>
                                            <div class="col-lg-12">
                                                <table class="makethistable table table-striped table-bordered table-hover text-center"style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Include</th>
                                                            <th>Name</th>
                                                            <th>Rate Card</th>
                                                            <th>Dept</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $us)
                                                            <tr>
                                                                <td>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" name="users[]" class="custom-control-input" value="{{ $us->id_user }}" id="switchus{{$loop->iteration}}">
                                                                        <label class="custom-control-label" for="switchus{{$loop->iteration}}">Include</label>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $us->name }}</td>
                                                                <td>{{ $us->rate }}</td>
                                                                <td>{{ $us->dept_name }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-right">
                                <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                                Reset</button>
                                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                Save</button>
                            </div>
                        </form>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
