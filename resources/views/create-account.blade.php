@extends('layout')
@section('content')
    <div class="container">
        <h2 class="my-5 text-center">Profile Applicants</h2>
        <div class="row">
            <div class="col-md-4 col-sm-2 col-xs-3"></div>
            <div class="col-md-4 col-sm-8 col-xs-6">
                @if (Session::has('failure'))
                    <div class="alert alert-danger">{{Session::get('failure')}}</div>
                @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <a href="/student">View all Applicant</a>
                <form method="POST" action="{{route('createAccount')}}" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label>First Name </label>
                                <div class="icon-holder">
                                    <input type="text" name="first_name" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Last Name </label>
                                <div class="icon-holder">
                                    <input type="text" name="last_name" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email </label>
                                <div class="icon-holder">
                                    <input type="email" name="email" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Photo </label>
                                <div class="icon-holder">
                                    <input type="file" name="image" class="form-control"/>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary btn-block">Create</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-2 col-xs-3"></div>
        </div>
    </div>
@endsection
