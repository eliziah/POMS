@extends('template.main')
@section('title', 'Add Internal Project')
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
        <div class="col-md-12">
          <div class="card">
            <form class="needs-validation" novalidate action="/project" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label for="initiative_type">Type</label>
                      <select name="initiative_type" id="initiative_type" class="form-control @error('initiative_type') is-invalid @enderror" value="{{old('initiative_type')}}" required>
                        <option value="Project">Project</option>
                        <option value="CRF">CRF</option>
                      </select>
                      @error('initiative_type')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label for="platform">Platform</label>
                      <select name="platform" id="platform" class="form-control @error('platform') is-invalid @enderror" value="{{old('platform')}}" required>
                        @foreach ($platforms as $data)
                        <option value="{{$data->name}}">{{$data->name}}</option>
                        @endforeach
                      </select>
                      @error('platform')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="short_name">Short Project Name</label>
                      <input type="text" name="short_name" class="form-control @error('short_name') is-invalid @enderror" id="short_name" placeholder="Short Project Name" value="{{old('short_name')}}" required>
                      @error('short_name')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-5">
                    <div class="form-group">
                      <label for="name">Long Project Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Long Project Name" value="{{old('name')}}" required>
                      @error('name')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="description">Project Description</label>
                      <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="10" rows="5" minlength="115" minlength="170" placeholder="Project Description">{{old('description')}}</textarea>
                      @error('description')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label for="sponsor_sub">Subsidiary</label>
                      <select name="sponsor_sub" id="sponsor_sub" class="form-control @error('sponsor_sub') is-invalid @enderror" value="{{old('sponsor_sub')}}" required>
                        <option value="ABSI">ABSI</option>
                        <option value="ACQUIRO">ACQUIRO</option>
                        <option value="FINSI">FINSI</option>
                      </select>
                      @error('sponsor_sub')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label for="area_type">Area</label>
                      <select name="area_type" id="area_type" class="form-control @error('area_type') is-invalid @enderror" value="{{old('area_type')}}" readonly>
                          <option value="Internal">Internal</option>
                      </select>
                      @error('area_type')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="sponsor_name">Sponsor Name</label>
                      <select name="sponsor_name" id="sponsor_name" class="form-control @error('sponsor_name') is-invalid @enderror" value="{{old('sponsor_name')}}" required>
                        <option>Select Sponsor</option>
                        @foreach ($sponsor as $sp)
                          <option value="{{$sp->name}}">{{$sp->name}}</option>
                        @endforeach
                      </select>
                      @error('sponsor_name')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label for="sponsor_dept">Sponsor Department</label>
                      <select name="sponsor_dept" id="sponsor_dept" class="form-control @error('sponsor_dept') is-invalid @enderror" value="{{old('sponsor_dept')}}" required>
                        <option>Select Department</option>
                        @foreach ($departments as $dep)
                          <option value="{{$dep->name}}">{{$dep->name}}</option>
                        @endforeach
                      </select>
                      @error('sponsor_dept')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="pm">Project Manager</label>
                      <select name="pm" id="pm" class="form-control @error('pm') is-invalid @enderror" value="{{old('pm')}}" required>
                        <option>Select Project Manager</option>
                        @foreach ($pms as $pm)
                          <option value="{{$pm->id_user}}">{{$pm->name}}</option>
                        @endforeach
                      </select>
                      @error('pm')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="p_start">Project Start Date</label>
                      <input type="date" step=".01" name="p_start" class="form-control @error('p_start') is-invalid @enderror" id="p_start" placeholder="Start Date" value="{{old('p_start')}}" required>
                      @error('p_start')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="p_live">Project Go Live Date</label>
                      <input type="date" step=".01" name="p_live" class="form-control @error('p_live') is-invalid @enderror" id="p_live" placeholder="Live Date" value="{{old('p_live')}}" required>
                      @error('p_live')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="p_close">Project Closure Date</label>
                      <input type="date" step=".01" name="p_close" class="form-control @error('p_close') is-invalid @enderror" id="p_close" placeholder="Closure Date" value="{{old('p_close')}}" required>
                      @error('p_close')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label for="budget">Project Budget</label>
                      <input type="number" step=".01" name="budget" class="form-control @error('budget') is-invalid @enderror" id="budget" placeholder="Project Budget" value="{{old('budget')}}" required>
                      @error('budget')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="artifact">Business Case Document</label>
                      <input type="text" step=".01" name="artifact" class="form-control @error('artifact') is-invalid @enderror" id="artifact" placeholder="Project Contract Link Here" value="{{old('artifact')}}">
                      @error('artifact')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="repository">Project Repository</label>
                      <input type="text" step=".01" name="repository" class="form-control @error('repository') is-invalid @enderror" id="repository" placeholder="Project Repository (Google Drive) Link Here" value="{{old('repository')}}">
                      @error('repository')
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