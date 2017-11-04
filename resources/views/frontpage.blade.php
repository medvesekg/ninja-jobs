@extends ('layouts.main')

@section('content')

    @foreach($jobs as $job)

    <div class="postit-note">
        <div class="postit-note-close">X</div>
        <h3>{{$job->company->company_name}}</h3>
        <p>{{$job->name}}</p>
        <div class="postit-date">
            {{$job->created_at->diffForHumans()}}
        </div>
        <div class="postit-expanded-content">
            <h5>Opis delovnega mesta</h5>
            <p>{{$job->body}}</p>
            <h5>Zahtevana znanja</h5>
            <p>{{$job->skills}}</p>
        </div>
        <a href="mailto:{{$job->company->user->email}}"><button class="postit-contact-btn">Kontakt</button></a>
    </div>

    @endforeach

    <div class="pagination-corner">
        <a href="{{$jobs->previousPageUrl()}}">&lt;&lt;</a> {{$jobs->currentPage()}} <a href="{{$jobs->nextPageUrl()}}">&gt;&gt;</a>
    </div>

    @endsection

@section('left-menu')

    <div class="menu-box">
        <h2>Iskanje</h2>
        <form>
            <input type="text">
            <p><input type="checkbox"> Filter</p>
            <p><input type="checkbox"> Filter</p>
            <p><input type="checkbox"> Filter</p>
            <p><input type="checkbox"> Filter</p>
            <p><input type="checkbox"> Filter</p>
            <p><input type="checkbox"> Filter</p>
            <input type="submit" value="Išči" class="btn-ninja">
        </form>
    </div>

@endsection