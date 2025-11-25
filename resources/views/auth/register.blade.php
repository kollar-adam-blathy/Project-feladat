@extends('layout')

@section('title', 'Regisztráció')

@section('content')
<div style="max-width: 550px; margin: 4rem auto;">
    <div class="card fade-in" style="padding: 3rem;">
        <div style="text-align: center; margin-bottom: 2.5rem;">
            <div style="width: 80px; height: 80px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, var(--primary-blue), var(--primary-navy)); border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; box-shadow: 0 8px 32px rgba(76, 196, 255, 0.3);">
                ✨
            </div>
            <h2 style="margin-bottom: 0.5rem; background: linear-gradient(135deg, var(--primary-cyan), var(--primary-dark-blue)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size: 2rem;">Csatlakozz hozzánk!</h2>
            <p style="color: var(--text-secondary);">Készítsd el a fiókodat most</p>
        </div>

        @if($errors->any())
        <div style="padding: 1rem; background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.3); border-radius: 12px; margin-bottom: 1.5rem;">
            <ul style="margin: 0; padding-left: 1.5rem; color: #ef4444;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label>Teljes név</label>
                <input type="text" name="name" required placeholder="Kovács János" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label>Email cím</label>
                <input type="email" name="email" required placeholder="pelda@email.com" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>Telefonszám</label>
                <input type="tel" name="phone" required placeholder="+36 30 123 4567" value="{{ old('phone') }}">
            </div>

            <div class="grid" style="grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label>Jelszó</label>
                    <input type="password" name="password" required placeholder="Min. 6 karakter">
                </div>

                <div class="form-group">
                    <label>Jelszó megerősítése</label>
                    <input type="password" name="password_confirmation" required placeholder="••••••••">
                </div>
            </div>

            <div class="form-group">
                <label>Telefonszám <span style="color: var(--text-secondary); font-size: 0.85rem;">(opcionális)</span></label>
                <input type="tel" name="phone" placeholder="+36 30 123 4567" value="{{ old('phone') }}">
            </div>

            <button type="submit" class="btn" style="width: 100%; margin-bottom: 1rem; padding: 1rem;">Regisztráció</button>

            <div style="text-align: center; margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--border-color);">
                <p style="color: var(--text-secondary); margin-bottom: 0.75rem; font-size: 0.9rem;">Van már fiókod?</p>
                <a href="/login" style="color: var(--primary-cyan); text-decoration: none; font-weight: 600; font-size: 1.05rem;">Belépés →</a>
            </div>
        </form>
    </div>
</div>
@endsection
