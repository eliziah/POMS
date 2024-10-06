@extends('template.main')
@section('title', 'Add POC')
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
          <!-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/poc">POCs</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol> -->
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
            <form class="needs-validation" novalidate action="/poc" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-lg-12 mb-3">
                        <h3>POC Details</h3>
                      </div>
                      <div class="col-lg-6">
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
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="product">Product</label>
                          <select name="product" id="product" class="form-control @error('product') is-invalid @enderror" value="{{old('product')}}" required>
                            @foreach ($products as $data)
                            <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                          </select>
                          @error('product')
                          <span class="invalid-feedback text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="short_name">Short Name</label>
                          <input type="text" name="short_name" class="form-control @error('short_name') is-invalid @enderror" id="short_name" placeholder="AI B&C - Outbound" value="{{old('short_name')}}" required>
                          @error('short_name')
                          <span class="invalid-feedback text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <label for="name">Long Name</label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="AI Collections - Outbound Sales Calls" value="{{old('name')}}" required>
                          @error('name')
                          <span class="invalid-feedback text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="description">POC Description</label>
                          <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="10" rows="5" placeholder="This POC seeks to lessen human intervention and incorporate a system based calls to pursue payments from customers including follow ups and reminders">{{old('description')}}</textarea>
                          @error('description')
                          <span class="invalid-feedback text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="department">Department</label>
                          <select name="department" id="department" class="form-control @error('department') is-invalid @enderror" value="{{old('department')}}" required>
                            <option>Select Department</option>
                            @foreach ($departments as $dep)
                              <option value="{{$dep->name}}">{{$dep->name}}</option>
                            @endforeach
                          </select>
                          @error('department')
                          <span class="invalid-feedback text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6">
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
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="p_start">Start Date</label>
                          <input type="date" step=".01" name="p_start" class="form-control @error('p_start') is-invalid @enderror" id="p_start" placeholder="Start Date" value="{{old('p_start')}}" required>
                          @error('p_start')
                          <span class="invalid-feedback text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="p_live">Live Date</label>
                          <input type="date" step=".01" name="p_live" class="form-control @error('p_live') is-invalid @enderror" id="p_live" placeholder="Live Date" value="{{old('p_live')}}" required>
                          @error('p_live')
                          <span class="invalid-feedback text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="p_evaluation">Evaluation Date</label>
                          <input type="date" step=".01" name="p_evaluation" class="form-control @error('p_evaluation') is-invalid @enderror" id="p_evaluation" placeholder="End Date" value="{{old('p_evaluation')}}" required>
                          @error('p_evaluation')
                          <span class="invalid-feedback text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label for="budget">Approved Budget</label>
                          <input type="number" step=".01" name="budget" class="form-control @error('budget') is-invalid @enderror" id="budget" placeholder="Project Budget" value="{{old('budget')}}" required>
                          @error('budget')
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
                  <div class="col-lg-6 pl-4">
                    <div class="row" id="acceptance_criteria">
                        <div class="col-lg-12 mb-3">
                          <h3>Acceptance Criteria</h3>
                        </div>
                        <div class="col-lg-12">
                          <label>Criteria for Projectization</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="">Criteria<br>Details</span>
                            </div>
                            <textarea name="criteria[]" rows="3" placeholder="The AI must be able to verify verbally during the call if it is communicating with the correct client by confirming the client's name." class="form-control"></textarea>
                            <div class="input-group-append">
                              <a class="btn btn-success btn-add-criteria"><i class="fas fa-plus"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="">Criteria<br>Details</span>
                            </div>
                            <textarea name="criteria[]" rows="3" class="form-control"></textarea>
                            <div class="input-group-append">
                              <a onclick="minus_field_criteria(this)" class="btn-minus-decision btn btn-danger"><i class="fas fa-minus"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="">Criteria<br>Details</span>
                            </div>
                            <textarea name="criteria[]" rows="3" class="form-control"></textarea>
                            <div class="input-group-append">
                              <a onclick="minus_field_criteria(this)" class="btn-minus-decision btn btn-danger"><i class="fas fa-minus"></i></a>
                            </div>
                          </div>
                        </div>
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
<script>
  $(document).ready(function() {
            $('.btn-add-criteria').on('click',function () {
                $('#acceptance_criteria').append('<div class="col-lg-12 mt-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="">Criteria<br>Details</span></div><textarea name="criteria[]" rows="3" class="form-control"></textarea><div class="input-group-append"><a onclick="minus_field_criteria(this)" class="btn-minus-decision btn btn-danger"><i class="fas fa-minus"></i></a></div></div></div>');
            });
        });
</script>
@endsection