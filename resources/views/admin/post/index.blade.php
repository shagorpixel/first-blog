@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active">Post List</li>
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
                        <div class="card-header ">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="card-title">Post List</h3>
                                </div>
                                <div>
                                    <a class="btn btn-primary" href="{{ route('post.create') }}">Create Post</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th>Author</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Post as $Post)
                                        <tr>
                                            <td>{{ $Post->id }}</td>
                                            <td>
                                                <div style="width:80px"><img style="width: 100%"
                                                        src="{{ asset('website/images/posts/' . $Post->image) }}"
                                                        alt=""></div>
                                            </td>
                                            <td> {{ $Post->title }}</td>
                                            <td> {{ $Post->category->name }}</td>
                                            <td>
                                                @foreach ($Post->tags as $tag)
                                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                                @endforeach
                                            </td>
                                            <td> {{ $Post->user->name }}</td>
                                            <td class=" d-flex">
                                                <a class="btn btn-sm btn-success mr-1"
                                                    href="{{ route('post.show', $Post->id) }}"> <i
                                                        class="fas fa-eye"></i></a>

                                                <a class="btn btn-sm btn-primary mr-1"
                                                    href="{{ route('post.edit', $Post->id) }}"> <i
                                                        class="fas fa-edit"></i></a>

                                                <form action="{{ route('post.destroy', $Post->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button onclick="confirm('Are You Sure to Delete Data?')"
                                                        class="btn btn-sm btn-danger mr-1" type="submit"> <i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
