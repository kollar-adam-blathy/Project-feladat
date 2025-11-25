@extends('layout')

@section('title', 'Belépés')

@section('content')
<div style="max-width: 480px; margin: 4rem auto;">
    <div class="card fade-in" style="padding: 3rem;">
        <div style="text-align: center; margin-bottom: 2.5rem;">
            <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, var(--primary-cyan), var(--primary-blue)); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; box-shadow: 0 8px 32px rgba(0, 252, 255, 0.3);">
                🚗
            </div>
            <h2 style="margin-bottom: 0.5rem; background: linear-gradient(135deg, var(--primary-cyan), var(--primary-dark-blue)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 2rem;">Üdvözlünk!</h2>
            <p style="color: var(--text-secondary);">Lépj be a fiókodba</p>
        </div>

        @if($errors->any())
        <div style="padding: 1rem; background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.3); border-radius: 12px; margin-bottom: 1.5rem; color: #ef4444;">
            {{ $errors->first() }}
        </div>
        @endif
        
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label>Email cím</label>
                <input type="email" name="email" required placeholder="pelda@email.com" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>Jelszó</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>

            <div style="display: flex; align-items: center; margin-bottom: 1.5rem;">
                <input type="checkbox" name="remember" id="remember" style="width: auto; margin-right: 0.5rem;">
                <label for="remember" style="margin-bottom: 0; color: var(--text-secondary); font-size: 0.9rem;">Jegyezz meg</label>
            </div>

            <button type="submit" class="btn" style="width: 100%; margin-bottom: 1rem; padding: 1rem;">Belépés</button>

            <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--border-color);">
                <p style="color: var(--text-secondary); margin-bottom: 0.75rem; font-size: 0.9rem;">Még nincs fiókod?</p>
                <a href="/register" style="color: var(--primary-cyan); text-decoration: none; font-weight: 600; font-size: 1.05rem;">Regisztráció →</a>
            </div>
        </form>
    </div>
</div>
@endsection
