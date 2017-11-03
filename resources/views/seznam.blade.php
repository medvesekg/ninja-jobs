@extends ('layouts.main')

@section('content')


    <ul>

    @foreach($all_users as $single_user)


            <li><a href="/seznam/{{$single_user->id}}">{{$single_user->email}}</a> {{$single_user->role->name}}</li>


        @endforeach

    </ul>

    @endsection