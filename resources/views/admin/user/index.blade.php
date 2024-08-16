@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
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
                                    <h3 class="card-title">User List</h3>
                                </div>
                                <div>
                                    <a class="btn btn-primary" href="{{ route('user.create') }}">Create User</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $User)
                                        <tr>
                                            <td>{{ $User->id }}</td>
                                            <td>
                                                <img style=" border-radious:50%; height: 40px; width:40px; " src="{{asset('backend/img/user/'.$User->image)}}" alt="">
                                            </td>
                                            <td>{{ $User->name }}</td>
                                            <td> {{ $User->email }}</td>

                                            <td class=" d-flex">
                                                <a class="btn btn-sm btn-primary mr-1"
                                                    href="{{ route('user.edit', $User->id) }}"> <i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('user.destroy', $User->id) }}"
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
