@extends('template.main')
@section('title', 'Minutes View')
@section('content')

<form class="needs-validation" novalidate action="/mom" method="POST">
  @csrf
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <div class="content-header p-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class=" float-sm-right">
                            
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-pencil"></i> Edit Minutes</button>
                        </ol>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row pt-3 pb-3">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3 text-right">
                                        <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-print"></i></button>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-pencil"></i></button>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <img class="d-inline mr-2" src="/assets/dist/img/absi.png" height="55px">
                                        <img class="d-inline" src="/assets/dist/img/pomsfull3.png" height="55px">
                                        <br/>
                                        <h6 class="font-weight-bold mt-2"><i>Minutes of the Meeting</i></h6>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <b>Project Name: </b>{{$mom->name}}
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <b>Meeting Title: </b>{{$mom->title}}
                                    </div>
                                    <div class="col-lg-12 border-bottom pb-3 text-center">
                                        <b>Meeting Date: </b>{{date_format(date_create($mom->date),'F d, Y')}}
                                    </div>
                                    <div class="col-lg-12 pt-2 border-bottom pb-2">
                                        <?php $decoded_attendees = json_decode($mom->attendees); ?>
                                        <b>Attendees: </b><br/>
                                        <ul class="row">
                                            @foreach($decoded_attendees as $data)
                                            <li class="col-lg-6">{{$data}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 pt-2 border-bottom pb-2">
                                        <?php $decoded_decision = json_decode($mom->decision); ?>
                                        <b>Discussion / Decision Points: </b><br/>
                                        <ul>
                                            @foreach($decoded_decision as $data)
                                            <li>{{$data}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 pt-2">
                                        <?php $decoded_action = json_decode($mom->action); ?>
                                        <b>Action Items: </b><br/>
                                        <ul>
                                            @foreach($decoded_action as $data)
                                            <li>{{$data}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
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
