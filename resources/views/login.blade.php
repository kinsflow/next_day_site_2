@extends('layout')
@section('content')
    @push('styles')
        <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
    @endpush
    <div class="container">
        <h2 class="my-5 text-center">Login Page</h2>
        <div class="row">
            <div class="col-md-4 col-sm-2 col-xs-3"></div>
            <div class="col-md-4 col-sm-8 col-xs-6">
                @if (Session::has('failure'))
                    <div class="alert alert-danger">{{Session::get('failure')}}</div>
                @endif
                <form method="POST" action="{{route('loginAction')}}">

                    <div class="panel panel-default">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Email </label>
                                <div class="icon-holder">
                                    <input type="email" name="email" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="icon-holder">
                                    <input type="password" name="password" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 col-sm-2 col-xs-3"></div>
        </div>
    </div>
@endsection
