@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header mb-3 ">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="card-title">User Profile</h3>
                                </div>
                                <div>
                                    <a class="btn btn-primary" href="{{ route('user.index') }}">Go Back To User
                                        List</a>
                                </div>
                            </div>
                        </div>


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ 'Profile '.session('status') }}
                            </div>
                        @endif

                        <div class="card card-primary">
                            <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div  class="card-body col-lg-12 row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input name="name" type="text" class="form-control" id="name"
                                                value="{{$user->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">User Email</label>
                                            <input name="email" type="email" class="form-control" id="email"
                                                value="{{$user->email}}"">
                                        </div>
                                        <div class="form-group col-span-6">
                                            <label for="password">User Password</label>
                                            <input name="password" type="password" class="form-control" id="password"
                                                placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for=""> Profile Picture</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                              <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                              <span class="input-group-text" id="">Upload</span>
                                            </div>
                                          </div>


                                        <div class="form-group col-span-6">
                                            <label class="mt-3"" for="description">User Description</label>
                                            <textarea class="form-control" name="description" id="" cols="30" rows="5">{{$user->description}}</textarea>
                                        </div>
                                    </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-lg-3">
                    <div style="text-align: center" class="card p-3">
                        <img src="{{asset('backend/img/user/'.$user->image)}}" alt="">
                        <h2 class="mt-2 mb-0">{{$user->name}}</h2>
                        <p>{{$user->email}}</p>
                        <p style="text-align: left"><strong>Description:</strong></p>
                        <p style="text-align: left">{{$user->description}}</p>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
@endsection
