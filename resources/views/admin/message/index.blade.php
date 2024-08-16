@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Message List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active">Message List</li>
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
                                    <h3 class="card-title">Message List</h3>
                                </div>

                            </div>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $Message)
                                        <tr>
                                            <td> {{$Message->id }}</td>
                                            <td> {{$Message->name }}</td>
                                            <td> {{ $Message->email }}</td>
                                            <td> {{ $Message->subject }}</td>
                                            <td> {{ $Message->created_at->format('d M Y') }}</td>

                                            <td class=" d-flex">
                                                <a class="btn btn-sm btn-success mr-1"
                                                    href="{{route('message.show',$Message->id)}}"> <i
                                                        class="fas fa-eye"></i></a>

                                                <form action="{{route('message.destroy',$Message->id)}}"
                                                    method="Post">
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
