@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Post</h1>
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
                    <div class="card">
                        <div class="card-header mb-3 ">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="card-title">Create Post</h3>
                                </div>
                                <div>
                                    <a class="btn btn-primary" href="{{ route('post.index') }}">Go Back To Post
                                        List</a>
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary col-lg-10 mx-auto">

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

                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Post Title</label>
                                        <input value="{{old('title')}}" name="title" type="text" class="form-control" id="name"
                                            placeholder="Post Names">
                                    </div>
                                    <div class="form-group">
                                        <label  for="category">Select Category</label>
                                        <select name="category_id" id="category"
                                            class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                            data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option style="display: none" selected value="">Select Category</option>
                                            @foreach ($category as $category)
                                                <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block" for="picture">Add Picture</label>
                                        <input id="picture" type="file" name="image">
                                    </div>

                                    <div>
                                        @foreach ($tag as $t)
                                            <span class="mr-2">
                                                <input id="{{$t->name.$t->id}}" name="tags[]" value="{{$t->id}}" type="checkbox" style="cursor: pointer">
                                                <label style="cursor: pointer" for="{{$t->name.$t->id}}">{{$t->name}}</label>
                                            </span>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Post Description</label>
                                        <textarea  name="description" rows="6" class="form-control " id="description" > {{old('description')}} </textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Post Now</button>
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
@section('style')
<link rel="stylesheet" href="{{asset('backend/css/summernote-bs4.min.css')}}">
@endsection
@section('script')
<script src="{{asset('backend/js/summernote-bs4.min.js')}}"></script>
<script>
    $('#description').summernote({
      placeholder: 'Write Blog..',
      tabsize: 2,
      height: 500
    });
  </script>
@endsection
