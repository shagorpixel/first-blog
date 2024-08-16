@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$message->name}}</h1>
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
                        <table >
                            <tr class="border">
                                <th class="col-lg-4">Name</th>
                                <td class="border-left p-2">{{$message->name}}</td>
                            </tr>
                            <tr class="border">
                                <th class="col-lg-4">Email</th>
                                <td class="border-left p-2">{{$message->email}}</td>
                            </tr>
                            <tr class="border">
                                <th class="col-lg-4">Subject</th>
                                <td class="border-left p-2">{{$message->subject}}</td>
                            <tr class="border m-2">
                                <th class="col-lg-4">Message Description</th>
                                <td class="border-left p-2" ><p>{{$message->message}}</p></td>
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
