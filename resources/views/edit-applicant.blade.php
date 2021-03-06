@extends('layout')
@section('content')
    <div class="container">
        <h2 class="my-5 text-center">Edit {{$applicant->first_name}} Profile</h2>
        <div class="row">
            <div class="col-md-4 col-sm-2 col-xs-3"></div>
            <div class="col-md-4 col-sm-8 col-xs-6">
                @if (Session::has('failure'))
                    <div class="alert alert-danger">{{Session::get('failure')}}</div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                <form method="post" action="{{route('updateAccount', $applicant->id)}}">

                    <div class="panel panel-default">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label>First Name </label>
                                <div class="icon-holder">
                                    <input type="text" value="{{$applicant->first_name}}" name="first_name" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Last Name </label>
                                <div class="icon-holder">
                                    <input type="text" value="{{$applicant->last_name}}" name="last_name" class="form-control"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Email </label>
                                <div class="icon-holder">
                                    <input type="email" value="{{$applicant->email}}" name="email" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary btn-block">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-2 col-xs-3"></div>
        </div>
    </div>
@endsection
