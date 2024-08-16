@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$post->title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content col-lg-12 mx-auto">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary col-lg-10 mx-auto p-4">
                        <table border="">
                            <tr>
                                <th>Post Title</th>
                                <td>{{$post->title}}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{$post->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Post Image</th>
                                <td style="text-align: center">
                                    <img style=" width: 400px; margin:20px;" src="{{asset('website/images/posts/'.$post->image)}}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <th>Post Description</th>
                                <td style="max-width: 600px;"><p style="margin:10px">{!!$post->description!!}</p></td>
                            </tr>
                            <tr>
                                <th>Post Tag</th>
                                <td style="max-width: 600px;">
                                    @foreach ($post->tags as $tag)
                                        <span style="margin: 5px;">#{{$tag->name}}</span>
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
