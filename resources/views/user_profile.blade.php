@extends('layouts.main')

@section('content')
    <div>
        <h2>Profil {{$selected_user->email}}</h2>
        <p>Ime: {{$selected_user->first_name}}</p>
        <p>Priimek:{{$selected_user->last_name}}</p>
        <p>Telefon:{{$selected_user->telephone}}</p>
        @if ($selected_user->role->id == 1)
        <p>CV:@if($selected_user->cv_id != 0)

                <a href="/images/{{$selected_user->cv->path}}"><button>Prenesi</button></a>

            @else

                Uporabnik še ni naložil CV-ja

            @endif
        </p>
        @endif
        @if ($selected_user->role->id == 2)
            <p>Email: {{$selected_user->email}}</p>
            @if($selected_user->company)
                <p>Ime podjetja: {{$selected_user->company->company_name}}</p>
                <p>Naslov podjetja: {{$selected_user->company->company_address}}</p>
                <p>Logotip: <img src="/images/{{$selected_user->company->logo ? $selected_user->company->logo->path : ""}}"></p>
            @endif
        @endif
    </div>
@endsection