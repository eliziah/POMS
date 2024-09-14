@extends('template.main')
@section('title', 'Project Managers')
@section('content')

    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-4 mt-3">
                        <div class="card">
                            <form action="/profile" method="POST">
                            @csrf
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="m-0 d-inline">My Profile</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->

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
                    </div>

                    <div class="col-4 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-left">
                                    <h3 class="m-0 d-inline">Change My Password</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name_group">Current Password</label>
                                            <div name="name_group" class="input-group">
                                                <input type="password" name="name" class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email_group">New Password</label>
                                            <div name="email_group" class="input-group">
                                                <input type="password" name="email" class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                <span class="invalid-feedback text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email_group">Confirm New Password</label>
                                            <div name="email_group" class="input-group">
                                                <input type="password" name="email" class="form-control @error('email') is-invalid @enderror">
                                                @error('email')
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
                        </div>
                    </div>
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>

@endsection
