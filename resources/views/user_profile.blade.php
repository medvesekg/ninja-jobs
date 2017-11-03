@extends('layouts.main')

@section('content')
    <div>
        <h2>Profil {{$selected_user->email}}</h2>
        <p>Ime: {{$selected_user->first_name}}</p>
        <p>Priimek:{{$selected_user->last_name}}</p>
        <p>Telefon:{{$selected_user->telephone}}</p>
        <p>CV:@if($selected_user->cv_id != 0)

                <a href="/images/{{$selected_user->cv->path}}"><button>Prenesi</button></a>

            @else

                Uporabnik še ni naložil CV-ja

            @endif
        </p>
    </div>
@endsection