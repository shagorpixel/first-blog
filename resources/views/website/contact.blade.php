@extends('layouts.website')
@section('content')

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mb-5">
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

                    <form action="{{ route('contactmsg.store') }}" method="Post" class="p-5 bg-white">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="fname">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Email">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subject</label>
                                <input type="subject" id="subject" name="subject" class="form-control"
                                    placeholder="Subject">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="4" class="form-control"
                                    placeholder="Write your notes or questions here..."></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>


                    </form>
                </div>
                <div class="col-md-5">

                    <div class="p-4 mb-3 bg-white">
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">{{ $appSetting->location }}</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">{{ $appSetting->phone }}</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#">{{ $appSetting->email }}</a></p>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
