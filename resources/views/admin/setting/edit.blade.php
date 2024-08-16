@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2" style="background: white; padding:10px;">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Setting</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header mb-3 ">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="card-title">Edit Setting</h3>
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
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card card-primary col-lg-10 mx-auto">
                            <form action="{{route('setting.update',$appSetting->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body col-lg-12 row">
                                    <div class="form-group col-lg-12">
                                        <label for="name">Site Name</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Site Name" value="{{$appSetting->name}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input name="facebook" type="text" class="form-control" id="facebook" placeholder="Facebook" value="{{$appSetting->facebook}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram">Instagram</label>
                                            <input name="instagram" type="text" class="form-control" id="instagram"
                                            placeholder="Instagram" value="{{$appSetting->twitter}}">
                                        </div>
                                        <div class="form-group col-span-6">
                                            <label for="email">Email</label>
                                            <input name="email" type="email" class="form-control" id="email"
                                             placeholder="Email" value="{{$appSetting->email}}">
                                        </div>
                                        <div class="form-group col-span-6">
                                            <label for="phone">Phone Number</label>
                                            <input name="phone" type="text" class="form-control" id="email"
                                             placeholder="phone" value="{{$appSetting->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input name="twitter" type="text" class="form-control" id="twitter"
                                             placeholder="Twitter" value="{{$appSetting->twitter}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="reddit">Reddit</label>
                                            <input name="reddit" type="text" class="form-control" id="reddit"
                                            placeholder="Reddit" value="{{$appSetting->reddit}}">
                                        </div>
                                        <div class="form-group col-span-6">
                                            <label for="copywright">Copy Wright</small></label>
                                            <input name="copywright" type="text" class="form-control" id="copywright"
                                                placeholder="Copywright" value="{{$appSetting->copywright}}">
                                        </div>
                                        <div class="form-group col-span-6">
                                            <label for="location">Location</small></label>
                                            <input name="location" type="text" class="form-control" id="location"
                                                placeholder="location" value="{{$appSetting->location}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-8">
                                        <input name="image" type="file" />
                                    </div>

                                    <div class="col-lg-4 " style="overflow: hidden; text-align:right;">
                                        <img style="width:100px;" src="{{asset('setting/image/'.$appSetting->logo)}}" alt="">
                                    </div>

                                        <div  class="form-group col-lg-12">
                                            <label for="description">Site Description</label>
                                            <textarea name="description" rows="5" cols="10" class="form-control" id="description" placeholder="Description">{{$appSetting->description}}
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update Setting</button>
                                    </div>
                                </form>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
