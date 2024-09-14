@extends('template.main')
@section('title', 'Add Schedule CR')
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
            <form class="needs-validation" novalidate action="/crsched/create/{{$project->id}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
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
                  <div class="col-lg-12">
                    <b>Planned Start Date: </b>{{date_format(date_create($project->p_start),'F d, Y')}}
                  </div>
                  <div class="col-lg-12">
                    <b>Planned Go Live Date: </b>{{date_format(date_create($project->p_live),'F d, Y')}}
                    <input type="text" name="old_live" value="{{$project->p_live}}" hidden>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <b>Planned Closure Date: </b>{{date_format(date_create($project->p_close),'F d, Y')}}
                    <input type="text" name="old_close" value="{{$project->p_close}}" hidden>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="new_live">New Go Live Date</label>
                        <input type="date" step=".01" name="new_live" class="form-control @error('new_live') is-invalid @enderror" id="new_live" placeholder="Closure Date" value="{{old('new_live')}}" required>
                        @error('new_live')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="new_close">New Closure Date</label>
                        <input type="date" step=".01" name="new_close" class="form-control @error('new_close') is-invalid @enderror" id="new_close" placeholder="Closure Date" value="{{old('new_close')}}" required>
                        @error('new_close')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
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