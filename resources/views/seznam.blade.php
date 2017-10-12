@extends ('layouts.main')

@section('content')


    <ul>

    @foreach($all_users as $single_user)


            <li>{{$single_user->email}}</li>

        @endforeach

    </ul>

    @endsection