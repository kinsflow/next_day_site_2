@extends('layout')
@section('content')
    <div class="container">
        <h2 class="my-5 text-center">Applicants</h2>
        @if (Session::has('failure'))
            <div class="alert alert-danger">{{Session::get('failure')}}</div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <a href="/create">Create New Account</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th class="text-center" colspan="2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($applicants as $applicant)
                <tr>
                    <td>{{$applicant->first_name}}</td>
                    <td>{{$applicant->last_name}}</td>
                    <td>{{$applicant->email}}</td>
                    <td>
                        <form method="POST" action="{{route('deleteAccount', ['applicant_id' => $applicant->id])}}">
                            @csrf
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                    <td>
                    <a href="{{route('editAccount', ['applicant_id' => $applicant->id])}}">
                        <input type="submit" value="edit" class="btn btn-primary">
                    </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
