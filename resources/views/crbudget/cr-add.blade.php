@extends('template.main')
@section('title', 'Add Budget CR')
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
            <li class="breadcrumb-item"><a href="/project">Project</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
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
        <div class="col-md-6">
          <div class="card">
            <form class="needs-validation" novalidate action="/crbudget/create/{{$project->id}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="alert alert-sm alert-secondary alert-dismissible fade show" role="alert">
                    Please make sure that a formal Change Request Form has been <strong>fully approved</strong> based on IPG PMO's approval matrix.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="col-lg-12">
                    <b>Project ID: </b>{{$project->proj_id}}
                  </div>
                  <div class="col-lg-12">
                    <b>Project Name: </b>{{$project->name}}
                  </div>
                  <div class="col-lg-12 mb-3">
                    <b>Project Budget: </b>Php {{number_format($project->budget,2,'.',',')}}
                    <input type="number" name="old_budget" value="{{$project->budget}}" hidden>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="group_budget">New Project Budget</label>
                      <div name="group_budget" class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input type="number" name="old_budget" value="{{$project->budget}}" hidden>
                        <input type="number" step=".01" data-old="{{$project->budget}}" name="new_budget" class="form-control @error('budget') is-invalid @enderror" id="realtimebudget" placeholder="Project Budget" value="{{old('new_budget')}}" required>
                        @error('new_budget')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div><div class="col-lg-6">
                    <div class="form-group">
                    <label for="group_delta">Delta</label>
                      <div name="group_delta" class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input type="text" name="delta" name="new_budget" value="{{old('delta')}}" class="form-control" id="realtimedelta" readonly required>
                        @error('delta')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="link">CRF Link <i style="color:#ab0202;">(please attach the file link, not the project folder link)</i></label>
                      <input type="text" step=".01" name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Google Drive Link" value="{{old('link')}}">
                      @error('link')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="remarks">Remarks</label>
                      <textarea name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror" rows="3" placeholder="Change Request Remarks">{{old('remarks')}}</textarea>
                      @error('remarks')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                  Reset</button>
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                  Save</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.content -->
      </div>
    </div>
  </div>
</div>

@endsection