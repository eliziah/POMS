@extends('template.main')
@section('title', 'Add Weekly Report for '.$project->short_name)
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
            <li class="breadcrumb-item"><a href="/project/{{$project->proj_id}}">{{$project->short_name}}</a></li>
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
        <div class="col-md-8">
          <div class="card">
            <form class="needs-validation" action="/weeklyreport/create/{{$project->id}}" method="POST">
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
                  <div class="col-lg-12">
                    <h4>
                    <b>{{$project->proj_id}} | {{$project->short_name}}</b></h4>
                  </div>
                  <div class="col-lg-12">
                    <b>Week Number: </b>{{$week}}
                  </div>
                  <div class="col-lg-12 pb-3 mb-3 border-2 border-bottom ">
                    <b>Report Scope: </b><u>{{$week_friday_start_text}}</u> to <u>{{$week_thursday_end_text}}</u>
                    <input type="text" name="start" value="{{$week_friday_start}}" hidden>
                    <input type="text" name="end" value="{{$week_thursday_end}}" hidden>
                    <input type="text" name="workweek" value="{{$week}}" hidden>
                    <input type="text" name="old_phase" value="{{$project->phase}}" hidden>
                    <input type="text" name="old_rag" value="{{$project->rag}}" hidden>
                    <input type="text" name="old_progress" value="{{$project->progress}}" hidden>
                    <input type="text" name="old_gate" value="{{$project->gate}}" hidden>
                  </div>
                  <div class="col-lg-2 col-md-3">
                    <div class="form-group">
                      <label for="rag">RAG <i class="text-secondary fa-solid fa-question-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="Your subjective assessment of the project's status<br/><br/><b>Green</b> - All is on track<br/><b>Amber</b> - There is a risk<br/><b>Red</b> - Alert, alert, alert!" ></i></label>
                      <select name="rag" id="rag" class="form-control @error('rag') is-invalid @enderror" value="{{$project->rag}}" required>
                        <option value="1" style="color:green">GREEN</option>
                        <option value="2" style="color:orange">AMBER</option>
                        <option value="3" style="color:red">RED</option>
                      </select>
                      @error('rag')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3">
                    <div class="form-group">
                      <label for="progress">Progress <i class="text-secondary fa-solid fa-question-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="This is based on the progress of your Project Plan this reporting week" ></i></label>
                      <div class="input-group">
                          <input type="number" class="form-control" name="progress" aria-describedby="basic-addon2" value="{{$project->progress}}" >
                          <div class="input-group-append">
                              <span class="input-group-text">%</span>
                          </div>
                      </div>
                      @error('short_name')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <div class="form-group">
                      <label for="phase">Phase <i class="text-secondary fa-solid fa-question-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="This is the current phase of your project this reporting week" ></i></label>
                      <select name="phase" id="phase" class="form-control @error('phase') is-invalid @enderror" value="{{$project->phase}}" required>
                        <option value="1">Planning</option>
                        <option value="2">Development</option>
                        <option value="3">Testing</option>
                        <option value="4">User Acceptance</option>
                        <option value="5">Live</option>
                      </select>
                      @error('phase')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <div class="form-group">
                      <label for="gate">Gate  <i class="text-secondary fa-solid fa-question-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="This is the current gate of your project this reporting week" ></i></label>
                      <select name="gate" id="gate" class="form-control @error('gate') is-invalid @enderror" value="{{$project->gate}}" required>
                        <option value="1">G1-Initiation</option>
                        <option value="2">G2-Planning</option>
                        <option value="3">G3-Execution</option>
                        <option value="4">G4-Closing</option>
                        <option value="5">BR-Benefits</option>
                      </select>
                      @error('gate')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                        <label for="executive">Executive Summary  <i class="text-secondary fa-solid fa-question-circle" data-toggle="tooltip" data-placement="top" data-html="true" title="A summary of your project update for this reporting week. An executive must be able to understand all your updates by reading this executive update alone.<br/><br/>Minimum of 150 Characters;<br/>Maximum of 255 Characters" ></i></label>
                        <textarea name="executive" placeholder="This is required. All on-going project must have an executive update." id="executive" minlength="150" maxlength="255" class="form-control @error('executive') is-invalid @enderror" rows="2">{{old('executive')}}</textarea>
                        @error('executive')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="highlights">Project Highlights</label>
                        <textarea name="highlights" placeholder="Leave it blank if no entry." id="highlights" maxlength="1000" class="form-control @error('highlights') is-invalid @enderror" rows="4">{{old('highlights')}}</textarea>
                        @error('highlights')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="risks">Project Risks</label>
                        <textarea name="risks" placeholder="Leave it blank if no entry." id="risks" maxlength="1000" class="form-control @error('risks') is-invalid @enderror" rows="4">{{old('risks')}}</textarea>
                        @error('risks')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nextsteps">Project Next Steps</label>
                        <textarea name="nextsteps" placeholder="Leave it blank if no entry." id="nextsteps" maxlength="1000" class="form-control @error('nextsteps') is-invalid @enderror" rows="4">{{old('nextsteps')}}</textarea>
                        @error('nextsteps')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="help">Project Help Needed</label>
                        <textarea name="help" placeholder="Leave it blank if no entry." id="help" maxlength="1000" class="form-control @error('help') is-invalid @enderror" rows="4">{{old('help')}}</textarea>
                        @error('help')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-md btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
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
  // select phase and gate current value on load
  document.getElementById("phase").value = {{$project->phase}};
  document.getElementById("rag").value = {{$project->rag}};
  document.getElementById("gate").value = {{$project->gate}};
</script>
@endsection