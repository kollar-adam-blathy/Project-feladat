@extends('layout')

@section('title', 'Főoldal')

@section('content')
<div class="hero fade-in">
    <h1 style="font-size: 3rem; font-weight: 700; margin-bottom: 1rem; position: relative; z-index: 1;">Prémium autókölcsönzés</h1>
    <p style="font-size: 1.25rem; color: var(--text-secondary); position: relative; z-index: 1;">Fedezd fel a luxus autók világát és élvezd a szabadságot</p>
    <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem; position: relative; z-index: 1;">
        <a href="/cars" class="btn" style="padding: 1rem 2.5rem; font-size: 1.1rem;">Autóink megtekintése</a>
        @guest
            <a href="/register" class="btn-outline btn" style="padding: 1rem 2.5rem; font-size: 1.1rem;">Regisztráció</a>
        @endguest
    </div>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
    <div class="card" style="text-align: center;">
        <div style="width: 70px; height: 70px; margin: 0 auto 1.5rem; background: rgba(0, 102, 255, 0.2); border: 2px solid var(--primary-blue); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 2rem;">
            🚗
        </div>
        <h3 style="margin-bottom: 1rem; color: var(--primary-blue);">150+ Autó</h3>
        <p style="color: var(--text-secondary);">Széles választék prémium járművekből</p>
    </div>
    
    <div class="card" style="text-align: center;">
        <div style="width: 70px; height: 70px; margin: 0 auto 1.5rem; background: rgba(0, 102, 255, 0.2); border: 2px solid var(--primary-blue); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 2rem;">
            ⚡
        </div>
        <h3 style="margin-bottom: 1rem; color: var(--primary-blue);">Azonnali foglalás</h3>
        <p style="color: var(--text-secondary);">Gyors és egyszerű online rendszer</p>
    </div>
    
    <div class="card" style="text-align: center;">
        <div style="width: 70px; height: 70px; margin: 0 auto 1.5rem; background: rgba(0, 102, 255, 0.2); border: 2px solid var(--primary-blue); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 2rem;">
            ✓
        </div>
        <h3 style="margin-bottom: 1rem; color: var(--primary-blue);">Teljes biztosítás</h3>
        <p style="color: var(--text-secondary);">Minden autónk teljesen biztosított</p>
    </div>

    <div class="card" style="text-align: center;">
        <div style="width: 70px; height: 70px; margin: 0 auto 1.5rem; background: rgba(0, 102, 255, 0.2); border: 2px solid var(--primary-blue); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 2rem;">
            💳
        </div>
        <h3 style="margin-bottom: 1rem; color: var(--primary-blue);">Rugalmas fizetés</h3>
        <p style="color: var(--text-secondary);">Több fizetési lehetőség</p>
    </div>
</div>

<div class="card" style="margin-bottom: 3rem;">
    <h2 style="text-align: center; margin-bottom: 3rem; color: var(--primary-blue);">Kiemelt ajánlataink</h2>
    <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
        @foreach($cars->take(3) as $car)
        <div style="border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 12px; overflow: hidden; transition: all 0.3s ease; background: rgba(30, 38, 57, 0.4);">
            <div style="height: 200px; background: linear-gradient(135deg, rgba(0, 102, 255, 0.3), rgba(30, 64, 175, 0.3)); position: relative;">
                @if($car->image)
                    <img src="{{ $car->image }}" alt="{{ $car->brand }}" style="width: 100%; height: 100%; object-fit: cover;">
                @endif
                <div style="position: absolute; top: 1rem; right: 1rem;">
                    @if($car->available)
                        <span class="badge badge-success">Elérhető</span>
                    @else
                        <span class="badge badge-warning">Foglalt</span>
                    @endif
                </div>
            </div>
            <div style="padding: 1.5rem;">
                <h3 style="margin-bottom: 0.5rem;">{{ $car->brand }} {{ $car->model }}</h3>
                <p style="color: var(--text-secondary); margin-bottom: 1rem; font-size: 0.9rem;">{{ $car->transmission ?? 'Automata' }} • {{ $car->fuel_type ?? 'Benzin' }} • {{ $car->seats ?? '5' }} férőhely</p>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; padding-top: 1rem; border-top: 1px solid rgba(59, 130, 246, 0.2);">
                    <div>
                        <p style="color: var(--text-secondary); font-size: 0.85rem;">Napi díj</p>
                        <p style="font-size: 1.75rem; font-weight: 700; color: var(--primary-blue);">{{ number_format($car->daily_price, 0, ',', ' ') }} Ft</p>
                    </div>
                </div>
                <a href="/cars/{{ $car->id }}" class="btn" style="width: 100%; text-align: center;">Részletek és bérlés</a>
            </div>
        </div>
        @endforeach

    </div>
</div>

<div class="card" style="background: linear-gradient(135deg, rgba(0, 102, 255, 0.2), rgba(30, 64, 175, 0.2)); border: 1px solid rgba(59, 130, 246, 0.4); text-align: center; padding: 4rem 2rem; margin-top: 3rem;">
    <h2 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 2.5rem;">Kezdd el most!</h2>
    <p style="font-size: 1.25rem; margin-bottom: 2rem; color: var(--text-secondary);">Regisztrálj és bérelj autót néhány kattintással</p>
    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
        <a href="/register" class="btn" style="font-size: 1.1rem; padding: 1rem 2.5rem;">Ingyenes regisztráció</a>
        <a href="/cars" class="btn-outline" style="font-size: 1.1rem; padding: 1rem 2.5rem;">Autók böngészése</a>
    </div>
</div>
@endsection
