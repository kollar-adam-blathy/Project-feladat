@extends('layout')

@section('title', 'Üdvözlünk')

@section('content')
<div class="hero fade-in">
    <h1>AutoRent Pro</h1>
    <p>Modern autóbérlés egyszerűen, gyorsan, biztonságosan.</p>
    <div style="display:flex; gap:1rem; justify-content:center; margin-top:2rem; position:relative; z-index:1;">
        <a href="/cars" class="btn">Autók megtekintése</a>
        @guest
            <a href="/login" class="btn-outline btn">Belépés</a>
        @endguest
    </div>
</div>
@endsection
