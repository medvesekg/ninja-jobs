<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet" type="text/css">
    <title>Title</title>
</head>
<body>
<div class="inactive-background" id="greyed-out-background"></div>
<div class="header">
    <div class="vrsta ninja-vrsta">

        <div class="napis-ninja">
            <h1>NINJA</h1>
        </div>
        <div class="ninja-image">
            <img src="{{ asset('img/ninja.png') }}">
        </div>
        <div class="napis-jobs">
            <h1>JOBS</h1>
        </div>

    </div>
</div>


<div class="main">

    <div class="menu left-menu">
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

    </div>


    <div class="board">
        @if ($user)
            <form class="login-corner" method="post" action="{{route('logout')}}" id="logout-button">
                {{csrf_field()}}
                <button type="submit">Odjava</button>
            </form>
            <div class="login-corner" id="mobile-menu-button">
                <span>Meni</span>
            </div>

        @else
            <div class="login-corner" id="sign-up-button">
                <span>Prijavi se</span>
            </div>
        @endif

        <div class="search-corner">
            <a href="#">Išči</a>
        </div>

        @yield('content')


    </div>


    <div class="menu right-menu">
        @if ($user)
            <div class="menu-box">
                <p>Dobrodošel</p>
                <p>{{$user->email}}</p>

                <br>
                <br>
                <p><a href="/seznam">Seznam uporabnikov</a></p>
                <br>
                <p class="inactive-link"">Objavi delovno mesto</p>
                <br>
                <p class="inactive-link">Preglej prijave</p>
                <br>
                <p class="inactive-link">Uredi profil</p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        @endif
    </div>

</div>

<!-- Sign in form -->
<div class="form-modal login-form" id="sign-up-form-modal">
    <div class="login-modal-login-corner" id="login-modal-login-corner">
        <span>Prijava</span>
    </div>
    <div class="login-modal-signup-corner" id="login-modal-signup-corner">
        <span>Ustvari račun</span>
    </div>
    <form class="login-form" id="modal-login-form" method="post" action="{{ route('login') }}">
        {{csrf_field()}}
        <label for="login-email">Email</label>
        <input type="text" id="login-email" name="email">
        <label for="login-password">Geslo</label>
        <input type="password" id="login-password" name="password">
        <button type="submit" class="btn-ninja">Prijavi se</button>
    </form>
    <form class="login-form" id="modal-signup-form" style="display:none;" method="post" action="{{ route('register') }}">
        {{csrf_field()}}
        <label for="signup-email">Email</label>
        <input type="text" id="signup-email" name="email">
        <label for="signup-password">Geslo</label>
        <input type="password" id="signup-password" name="password">
        <label for="signup-password-retype">Potrdi geslo</label>
        <input type="password" id="signup-password-retype"  name="password_confirmation">
        <button type="submit" class="btn-ninja">Ustvari račun</button>
    </form>
</div>


<!-- mobile menu modal -->
<div class="form-modal login-form" id="mobile-menu-modal">
    <p><a href="/">Domov</a></p>
    <br>
    <p><a href="/seznam">Seznam uporabnikov</a></p>
    <br>
    <p class="inactive-link"">Objavi delovno mesto</p>
    <br>
    <p class="inactive-link">Preglej prijave</p>
    <br>
    <p class="inactive-link">Uredi profil</p>
    <br>
    <form method="post" action="{{route('logout')}}">
        {{csrf_field()}}
        <button type="submit">Odjava</button>
    </form>
</div>


</body>

<script src="{{ asset('js/scripts.js') }}">
</script>
</html>