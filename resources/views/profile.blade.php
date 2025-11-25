@extends('layout')

@section('title', 'Profilom')

@section('content')
<div class="hero fade-in" style="padding: 3rem 2rem;">
    <h1 style="color: var(--primary-blue);">Profilom</h1>
    <p>Személyes adatok és bérlési előzmények</p>
</div>

<div class="grid" style="grid-template-columns: 1fr 2fr;">
    <div class="card">
        <div style="text-align: center;">
            <div style="width: 120px; height: 120px; margin: 0 auto 1.5rem; background: linear-gradient(135deg, rgba(0, 102, 255, 0.3), rgba(30, 64, 175, 0.3)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: var(--primary-blue); border: 2px solid rgba(59, 130, 246, 0.4);">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <h3 style="margin-bottom: 0.5rem;">{{ auth()->user()->name }}</h3>
            <p style="color: var(--text-secondary); margin-bottom: 1.5rem;">{{ auth()->user()->email }}</p>
            @if(auth()->user()->is_admin)
                <span class="badge" style="background: rgba(255, 215, 0, 0.2); border: 1px solid rgba(255, 215, 0, 0.5); color: #FFD700;">Admin</span>
            @else
                <span class="badge" style="background: rgba(0, 102, 255, 0.2); border: 1px solid rgba(59, 130, 246, 0.4); color: var(--primary-blue);">Felhasználó</span>
            @endif
        </div>

        <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid rgba(59, 130, 246, 0.3);">
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Email</p>
                    <p style="font-weight: 600;">{{ auth()->user()->email }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Telefonszám</p>
                    <p style="font-weight: 600;">{{ auth()->user()->phone ?? 'Nincs megadva' }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Regisztráció dátuma</p>
                    <p style="font-weight: 600;">{{ auth()->user()->created_at->format('Y. m. d.') }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Összes bérlés</p>
                    <p style="font-weight: 600; color: var(--primary-blue);">{{ auth()->user()->rentals->count() }} bérlés</p>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="card" style="margin-bottom: 2rem;">
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-blue);">Személyes adatok</h2>
            <form>
                <div class="grid">
                    <div class="form-group">
                        <label>Teljes név</label>
                        <input type="text" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email cím</label>
                        <input type="email" value="{{ auth()->user()->email }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Telefonszám</label>
                    <input type="tel" value="{{ auth()->user()->phone ?? '' }}" placeholder="+36 30 123 4567">
                </div>
                <button type="submit" class="btn">Mentés</button>
            </form>
        </div>

        <div class="card">
            <h2 style="margin-bottom: 1.5rem;">Jelszó módosítása</h2>
            <form>
                <div class="form-group">
                    <label>Jelenlegi jelszó</label>
                    <input type="password" placeholder="••••••••">
                </div>
                <div class="grid">
                    <div class="form-group">
                        <label>Új jelszó</label>
                        <input type="password" placeholder="••••••••">
                    </div>
                    <div class="form-group">
                        <label>Új jelszó megerősítése</label>
                        <input type="password" placeholder="••••••••">
                    </div>
                </div>
                <button type="submit" class="btn-secondary btn">Jelszó frissítése</button>
            </form>
        </div>
    </div>
</div>
@endsection
