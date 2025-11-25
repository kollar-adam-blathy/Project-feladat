@extends('layout')

@section('title', 'Bérléseim')

@section('content')
<h1 style="margin-bottom: 2rem; color: var(--primary-blue);">Bérlési előzmények</h1>

@if(session('success'))
    <div style="padding: 1rem; background: rgba(0, 255, 0, 0.1); border: 1px solid rgba(0, 255, 0, 0.3); border-radius: 8px; margin-bottom: 2rem; color: #00ff00;">
        {{ session('success') }}
    </div>
@endif

@if($rentals->isEmpty())
    <div class="card" style="text-align: center; padding: 3rem;">
        <p style="color: var(--text-secondary); font-size: 1.1rem;">Még nincs aktív bérlésed.</p>
        <a href="/cars" class="btn" style="margin-top: 1.5rem; display: inline-block;">Böngészd az autókat</a>
    </div>
@else
<div style="display: flex; flex-direction: column; gap: 1.5rem;">
    @foreach($rentals as $rental)
    <div class="card" style="display: flex; gap: 2rem; align-items: center; border: 1px solid rgba(59, 130, 246, 0.3);">
        <div style="width: 180px; height: 120px; background: linear-gradient(135deg, rgba(0, 102, 255, 0.3), rgba(30, 64, 175, 0.3)); border-radius: 12px; flex-shrink: 0; overflow: hidden;">
            @if($rental->car->image)
                <img src="{{ $rental->car->image }}" alt="{{ $rental->car->brand }}" style="width: 100%; height: 100%; object-fit: cover;">
            @endif
        </div>
        
        <div style="flex: 1;">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                <div>
                    <h3 style="margin-bottom: 0.5rem;">{{ $rental->car->brand }} {{ $rental->car->model }} {{ $rental->car->year }}</h3>
                    <p style="color: var(--text-secondary);">{{ $rental->car->transmission ?? 'Automata' }} • {{ $rental->car->fuel_type ?? 'Benzin' }} • {{ $rental->car->seats ?? '5' }} férőhely</p>
                </div>
                @if($rental->status === 'active')
                    <span class="badge badge-success">Aktív</span>
                @elseif($rental->status === 'completed')
                    <span class="badge" style="background: rgba(0, 102, 255, 0.2); border: 1px solid rgba(59, 130, 246, 0.4); color: var(--primary-blue);">Lezárt</span>
                @else
                    <span class="badge badge-warning">{{ ucfirst($rental->status) }}</span>
                @endif
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-bottom: 1rem;">
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Kezdés</p>
                    <p style="font-weight: 600;">{{ \Carbon\Carbon::parse($rental->start_date)->format('Y.m.d') }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Befejezés</p>
                    <p style="font-weight: 600;">{{ \Carbon\Carbon::parse($rental->end_date)->format('Y.m.d') }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Összesen</p>
                    <p style="font-weight: 700; color: var(--primary-blue); font-size: 1.25rem;">{{ number_format($rental->total_price, 0, ',', ' ') }} Ft</p>
                </div>
            </div>
            
            <div style="display: flex; gap: 1rem;">
                <a href="/cars/{{ $rental->car->id }}" class="btn-outline" style="padding: 0.5rem 1.5rem; text-decoration: none;">Részletek</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif

    <div class="card" style="display: flex; gap: 2rem; align-items: center; opacity: 0.8;">
        <div style="width: 180px; height: 120px; background: linear-gradient(135deg, var(--primary-dark-blue), var(--primary-navy)); border-radius: 12px; flex-shrink: 0;"></div>
        
        <div style="flex: 1;">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                <div>
                    <h3 style="margin-bottom: 0.5rem;">Audi A4 2024</h3>
                    <p style="color: var(--text-secondary);">Automata • Dízel • 5 férőhely</p>
                </div>
                <span class="badge badge-info">Lezárt</span>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-bottom: 1rem;">
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Kezdés</p>
                    <p style="font-weight: 600;">2025.11.10 14:00</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Befejezés</p>
                    <p style="font-weight: 600;">2025.11.15 14:00</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Összesen</p>
                    <p style="font-weight: 700; color: var(--primary-cyan); font-size: 1.25rem;">100,000 Ft</p>
                </div>
            </div>
            
            <div style="display: flex; gap: 1rem;">
                <button class="btn-outline btn" style="padding: 0.5rem 1.5rem;">Részletek</button>
                <button class="btn-outline btn" style="padding: 0.5rem 1.5rem;">Újrafoglalás</button>
            </div>
        </div>
    </div>

    <div class="card" style="display: flex; gap: 2rem; align-items: center; opacity: 0.8;">
        <div style="width: 180px; height: 120px; background: linear-gradient(135deg, var(--primary-navy), var(--primary-deep)); border-radius: 12px; flex-shrink: 0;"></div>
        
        <div style="flex: 1;">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                <div>
                    <h3 style="margin-bottom: 0.5rem;">Mercedes C-Class 2023</h3>
                    <p style="color: var(--text-secondary);">Automata • Hibrid • 5 férőhely</p>
                </div>
                <span class="badge badge-info">Lezárt</span>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-bottom: 1rem;">
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Kezdés</p>
                    <p style="font-weight: 600;">2025.10.05 09:00</p>
                </div>
                <div>
@endsection
