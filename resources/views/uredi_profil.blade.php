@extends('layouts.main')

@section('content')

    <form class="main-form" enctype="multipart/form-data" method="post">
        <div class="polovica">
            {{csrf_field()}}
            <label>Ime</label>
            <input name="first_name" value="{{$user->first_name}}">
            <label>Priimek</label>
            <input name="last_name" value="{{$user->last_name}}">
            <label>Telfon</label>
            <input name="telephone" value="{{$user->telephone}}">
        </div>
        <div class="polovica">
            @if($user->role->id == 1)
            <label>CV</label>
            <input type="file" name="cv">
                @if($user->cv_id != 0)
                    Naložen CV: <a href="/images/{{$user->cv->path}}">Prenesi</a>
                @endif
            @endif
        </div>

        <button type="submit" class="btn-ninja" style="height:50px">Pošlji</button>

    </form>


@endsection