@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tag List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tag List</li>
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
                                    <h3 class="card-title">Tag List</h3>
                                </div>
                                <div>
                                    <a class="btn btn-primary" href="{{ route('tag.create') }}">Create Tag</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($Tags->count()>0)
                                    @foreach ($Tags as $Tag)
                                        <tr>
                                            <td>{{ $Tag->id }}</td>
                                            <td>{{ $Tag->name }}</td>
                                            <td> {{ $Tag->slug }}</td>
                                            <td class=" d-flex">
                                                <a class="btn btn-sm btn-primary mr-1"
                                                    href="{{ route('tag.edit', $Tag->id) }}"> <i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('tag.destroy', $Tag->id) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button onclick="confirm('Are You Sure to Delete Data?')"
                                                        class="btn btn-sm btn-danger mr-1" type="submit"> <i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5">
                                            <h1 class=" text-center">No Tag Found</h1>
                                        </td>
                                    </tr>
                                    @endif
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
