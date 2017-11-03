@extends('layouts.main')

@section('content')

    <div style="width:100%">
        <form style="width:100%;" method="post">
            {{csrf_field()}}
            <label>Ime delovnega mesta</label>
            <input name="name">
            <label>Opis delovnega mesta</label>
            <textarea rows="8" name="body"></textarea>
            <label>Zahtevana znanja</label>
            <input name="skills">
            <button type="submit" class="btn-ninja">Objavi</button>
        </form>
    </div>
@endsection