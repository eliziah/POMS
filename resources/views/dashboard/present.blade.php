@extends('template.main')
@section('title', 'Guest Dashboard')
@section('content')

    <div class="content-wrapper">
        
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid p-3">
                <!-- Small boxes (Stat box) -->
                <!-- Content Row -->
                <div class="row">

                    <div class="col-lg-12 mb-3 mt-3">
                        <div class="row">
                            <div class="col-lg-4">
                                
                            </div>
                            <div class="col-lg-4 text-center">
                                <h3><b>{{auth()->user()->name}}</b></h3>
                            </div>
                            <div class="col-lg-4">
                                
                            </div>
                        </div>
                    </div>
                </div>
                    
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
