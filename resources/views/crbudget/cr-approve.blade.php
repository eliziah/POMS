@extends('template.main')
@section('title', $cr_details['crb_id'])
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
                  <div class="col-lg-12">
                    <b>Project Budget: </b>Php {{number_format($project->budget,2,'.',',')}}
                    <input type="number" name="old_budget" value="{{$project->budget}}" hidden>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <b>Status: </b>
                    @if ($cr_details['status'] == 0)
                        <span class="badge badge-pill badge-warning">For Approval</span>
                    @elseif ($cr_details['status'] == 1)
                        <span class="badge badge-pill badge-success">Approved</span>
                    @elseif ($cr_details['status'] == 2)
                        <span class="badge badge-pill badge-danger">Rejected</span><br/>
                        <b>Reject Remarks: </b><span class="text-danger">{{ $cr_details['reason'] }}</span>
                    @endif
                    <input type="number" name="old_budget" value="{{$project->budget}}" hidden>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="group_budget">New Project Budget</label>
                      <div name="group_budget" class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input type="text" name="new_budget" class="form-control"value="{{number_format($cr_details['new_budget'],2,'.',',')}}" readonly>
                        @error('new_budget')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                    <label for="group_delta">Delta</label>
                      <div name="group_delta" class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Php</span>
                        </div>
                        <input type="text" name="delta" name="new_budget" value="{{number_format($cr_details['delta'],2,'.',',')}}" class="form-control" readonly>
                        @error('delta')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <label for="link">CRF Link</label>
                    <div class="input-group" name="link">
                        <input type="text" name="link" class="form-control" aria-describedby="basic-addon2" value="{{$cr_details['link']}}" readonly>
                        <div class="input-group-append">
                            <a class="btn btn-secondary" target="_blank" href="{{$cr_details['link']}}" type="button">Go to Link</a>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="remarks">Remarks</label>
                      <textarea name="remarks" class="form-control" rows="3" readonly>{{$cr_details['remarks']}}</textarea>
                      @error('remarks')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              @if ($cr_details['status'] == 0 && auth()->user()->id_user == 1)
              <div class="card-footer ">
                <div class="row">
                  <div class="col-lg-6 text-left">
                    <button class="btn btn-danger mr-1" data-toggle="modal" data-target="#exampleModalCenter" type="submit"><i class="fa-solid fa-x"></i> Reject</button>
                  </div>
                  <div class="col-lg-6 text-right">
                    <form action="/crbudget/approve/{{$cr_details['crb_id']}}/1" method="GET">
                    @csrf
                    <button class="btn btn-success" type="submit"><i class="fa-solid fa-check"></i> Approve</button>
                    </form>
                  </div>
                </div>
              </div>
              @endif
          </div>
        </div>
        <!-- /.content -->
      </div>
    </div>
  </div>
</div>
<!-- Reject Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Reject {{$cr_details['crb_id']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/crbudget/reject/{{$cr_details['crb_id']}}" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="reason" class="text-danger">Reason for Rejection</label>
                <textarea name="reason" class="form-control" rows="3" minlength="20" maxlength="255"></textarea>
                @error('reason')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          @csrf
          <button type="submit" class="btn btn-danger"><i class="fa-solid fa-x"></i> Reject</button>
        </div>
      </form>   
    </div>
  </div>
</div>
@endsection