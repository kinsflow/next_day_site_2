@extends('layout')
@section('content')
    <div class="container">
        <div class="d-flex my-4">
            <h2 class="text-center">Welcome {{$user->first_name}}</h2>
            <img style="height:3rem; margin-left: 1rem" class="img rounded-circle" src="{{asset('storage/'.$user->image_path)}}" alt="">
        </div>

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
