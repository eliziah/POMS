@extends('template.main')
@section('title', 'Add MOM')
@section('content')

<form class="needs-validation" novalidate action="/mom" method="POST">
  @csrf
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class=" float-sm-right">
                            
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save Minutes</button>
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
                    <div class="col-lg-4 pl-3 pr-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="project_id">Project</label>
                                                <select name="project_id" id="momselect" class="form-control" required>
                                                    @foreach ($my_projects as $data)
                                                    <option value="{{$data['id']}}">{{$data['short_name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="date">Meeting Date</label>
                                                <input type="date" id="momDatePicker" name="date" rows="2" class="form-control" minlength="15" maxlength="255" requried>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="title">Meeting Title</label>
                                                <input type="text" name="title" rows="2" class="form-control" minlength="15" maxlength="255" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label for="agenda">Agenda</label>
                                                <textarea name="agenda" rows="2" class="form-control" minlength="30" maxlength="500" requried></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="form-group">
                                            <label for="group_delta">Attendees</label>
                                            <div id="attendee_add">
                                                <div name="group_delta" class="input-group mb-1"> <input type="text" name="attendee[]" placeholder="Atendee" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required> <div class="input-group-append"> <a onclick="minus_field(this)" class="btn-minus-attendee btn btn-danger"><i class="fas fa-minus"></i></a> </div> </div>
                                                <div name="group_delta" class="input-group mb-1"> <input type="text" name="attendee[]" placeholder="Atendee" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required> <div class="input-group-append"> <a onclick="minus_field(this)" class="btn-minus-attendee btn btn-danger"><i class="fas fa-minus"></i></a> </div> </div>
                                            </div>
                                            <div name="group_delta" class="input-group">
                                                <input type="text" name="attendee[]" placeholder="Atendee" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required>
                                                <div class="input-group-append">
                                                  <a class="btn btn-success btn-add-attendee"><i class="fas fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 border-left border-right pl-3 pr-3">
                        <div class="form-group">
                            <label for="group_delta">Decition Points</label>
                            <div id="decision_add">
                                <div name="group_delta" class="input-group mb-1"> <input type="text" name="decision[]" placeholder="Decision Point" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required> <div class="input-group-append"> <a onclick="minus_field(this)" class="btn-minus-decision btn btn-danger"><i class="fas fa-minus"></i></a> </div> </div>
                                <div name="group_delta" class="input-group mb-1"> <input type="text" name="decision[]" placeholder="Decision Point" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required> <div class="input-group-append"> <a onclick="minus_field(this)" class="btn-minus-decision btn btn-danger"><i class="fas fa-minus"></i></a> </div> </div>
                            </div>
                            <div name="group_delta" class="input-group">
                                <input type="text" name="decision[]" placeholder="Decision Point" class="form-control" minlength="10" maxlength="255" required>
                                <div class="input-group-append">
                                  <a class="btn btn-success btn-add-decision"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 pl-3 pr-3">
                        <div class="form-group">
                            <label for="group_delta">Action Items</label>
                            <div id="action_add">
                                <div name="group_delta" class="input-group mb-1"> <input type="text" name="action[]" placeholder="Action Item" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required> <div class="input-group-append"> <a onclick="minus_field(this)" class="btn-minus-action btn btn-danger"><i class="fas fa-minus"></i></a> </div> </div>
                                <div name="group_delta" class="input-group mb-1"> <input type="text" name="action[]" placeholder="Action Item" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required> <div class="input-group-append"> <a onclick="minus_field(this)" class="btn-minus-action btn btn-danger"><i class="fas fa-minus"></i></a> </div> </div>
                            </div>
                            <div name="group_delta" class="input-group">
                                <input type="text" name="action[]" placeholder="Action Item" class="form-control" minlength="10" maxlength="255" required>
                                <div class="input-group-append">
                                  <a class="btn btn-success btn-add-action"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    
    $(document).ready(function() {
        document.getElementById('momDatePicker').valueAsDate = new Date();

            $('#example1').DataTable({
                responsive: true
            });
            $('#momselect').on('change',function () {
                $('.removeme').remove();
                console.log('asdasd');
            });
            $('.btn-add-attendee').on('click',function () {
                $('#attendee_add').append('<div name="group_delta" class="input-group mb-1"> <input type="text" name="attendee[]" placeholder="Atendee" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required> <div class="input-group-append"> <a onclick="minus_field(this)" class="btn-minus-attendee btn btn-danger"><i class="fas fa-minus"></i></a> </div> </div>');
            });
            $('.btn-add-decision').on('click',function () {
                $('#decision_add').append('<div name="group_delta" class="input-group mb-1"> <input type="text" name="decision[]" placeholder="Decision Point" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required> <div class="input-group-append"> <a onclick="minus_field(this)" class="btn-minus-decision btn btn-danger"><i class="fas fa-minus"></i></a> </div> </div>');
            });
            $('.btn-add-action').on('click',function () {
                $('#action_add').append('<div name="group_delta" class="input-group mb-1"> <input type="text" name="action[]" placeholder="Action Item" class="form-control" id="realtimedelta" minlength="10" maxlength="255" required> <div class="input-group-append"> <a onclick="minus_field(this)" class="btn-minus-action btn btn-danger"><i class="fas fa-minus"></i></a> </div> </div>');
            });
        });
</script>
@endsection
