@extends('template.main')
@section('title', 'Project Managers')
@section('content')

    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- <div class="col-4 mt-3">
                        <div class="card">
                            <form action="/profile" method="POST">
                            @csrf
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="m-0 d-inline">My Profile</h3>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3 text-center">
                                        <div class="image">
                                            @if(empty(auth()->user()->image))
                                            <img src="/assets/dist/img/anon.png" class="img-circle elevation-2" height="100px" alt="User Image">
                                            @else
                                            <img src="{{ auth()->user()->image }}" class="img-circle elevation-2" height="100px" alt="User Image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="image_group">Profile Picture</label>
                                            <div name="image_group" class="input-group">
                                                <input type="file" name="image" style="border:0px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name_group">Full Name</label>
                                            <div name="name_group" class="input-group">
                                                <input type="text" value="{{auth()->user()->name}}" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email_group">Role</label>
                                            <div name="email_group" class="input-group">
                                                @if(auth()->user()->role == 1)
                                                <input type="text" value="Project Manager" class="form-control" readonly>
                                                @elseif(auth()->user()->role == 2)
                                                <input type="text" value="PMO Head" class="form-control" readonly>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email_group">Email</label>
                                            <div name="email_group" class="input-group">
                                                <input type="text" value="{{auth()->user()->email}}" class="form-control" readonly>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <button class="btn btn-success" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div> -->

                    <div class="col-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="m-0 d-inline">Change My Password</h3>
                                </div>
                            </div>
                            <form class="needs-validation" novalidate action="/changepassword" method="POST">
                            @csrf
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="oldpassword">Current Password</label>
                                                <div name="oldpassword" class="input-group">
                                                    <input type="password" name="oldpassword" class="form-control @error('oldpassword') is-invalid @enderror">
                                                    @error('oldpassword')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="password">New Password</label>
                                                <div name="password" class="input-group">
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                                    @error('password')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="passwordConfirm">Confirm New Password</label>
                                                <div name="passwordConfirm" class="input-group">
                                                    <input type="password" name="passwordConfirm" class="form-control @error('passwordConfirm') is-invalid @enderror">
                                                    @error('passwordConfirm')
                                                    <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            <button class="btn btn-warning" type="submit">Change Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
