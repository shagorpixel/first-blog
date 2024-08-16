@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Category</li>
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
                                    <h3 class="card-title">Create Category</h3>
                                </div>
                                <div>
                                    <a class="btn btn-primary" href="{{ route('category.index') }}">Go Back To Category
                                        List</a>
                                </div>
                            </div>
                        </div>


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li >{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

                        <div class="card card-primary">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Category Names">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Category Description</label>
                                        <textarea name="description" cols="10" class="form-control" id="description" placeholder="Password"> </textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
