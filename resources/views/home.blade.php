@extends('layout')
@section('content')
    <div class="container">
        <h2 class="my-5 text-center">Welcome {{$user->first_name}}</h2>
        @if (Session::has('failure'))
            <div class="alert alert-danger">{{Session::get('failure')}}</div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <div class="row">
            Wanna Apply for the scholarship? click button below to apply
        </div>
        <div class="row my-3">
            <form method="POST" action="{{route('apply', ['applicant_id' => $user->id])}}">
                @csrf
                <input type="submit" {{$user->application ? 'disabled': null}} value="{{$user->application ? 'applied': 'apply'}}" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
