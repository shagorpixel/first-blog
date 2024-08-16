@extends('layouts.admin')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row card">
                <div class="card-header ">
                    <div class="d-flex align-items-center justify-content-between ">
                        <div>
                            <h3 class="">Dashboard</h3>
                        </div>
                    </div>
                    <!--Dashboard Count Design Start Here -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{$postCount}}</h3>

                                    <p>Post</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-vote-yea"></i>
                                </div>
                                <a href="{{route('post.index')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{$categoryCount}}</h3>

                                    <p>Categories</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <a href="{{route('category.index')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{$messegeCount}}</h3>

                                    <p>Message</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <a href="{{route('message.index')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{$userCount}}</h3>

                                    <p>Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="{{route('user.index')}}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!--Dashboard Count Design End Here -->
                    <!--Post List Design Start Here -->
                    <div class="card-header ">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="card-title">Post List</h3>
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
                                                href="{{ route('post.show', $Post->id) }}"> <i class="fas fa-eye"></i></a>

                                            <a class="btn btn-sm btn-primary mr-1"
                                                href="{{ route('post.edit', $Post->id) }}"> <i class="fas fa-edit"></i></a>

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

                    <!-- /.row -->
                </div><!-- /.container-fluid -->

                <!--Post List Design End Here -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
