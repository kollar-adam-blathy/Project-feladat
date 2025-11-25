@extends('layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="hero fade-in">
    <h1 style="font-size: 2.5rem; background: linear-gradient(135deg, var(--primary-cyan), var(--primary-blue)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Admin Vezérlőpult</h1>
    <p style="color: var(--text-secondary);">Autókölcsönző rendszer kezelése</p>
</div>

<div class="grid">
    <div class="card">
        <h3 style="color: var(--primary-cyan); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <span style="font-size: 1.5rem;">📊</span> Statisztikák
        </h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: rgba(0, 252, 255, 0.05); border: 1px solid rgba(0, 252, 255, 0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                <span style="color: var(--text-secondary);">Összes autó</span>
                <span style="font-size: 2rem; font-weight: 700; background: linear-gradient(135deg, var(--primary-cyan), var(--primary-blue)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $stats['total_cars'] }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: rgba(76, 196, 255, 0.05); border: 1px solid rgba(76, 196, 255, 0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                <span style="color: var(--text-secondary);">Aktív bérlések</span>
                <span style="font-size: 2rem; font-weight: 700; color: var(--primary-blue);">{{ $stats['active_rentals'] }}</span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 1.25rem; background: rgba(52, 132, 234, 0.05); border: 1px solid rgba(52, 132, 234, 0.1); border-radius: 16px; backdrop-filter: blur(10px);">
                <span style="color: var(--text-secondary);">Felhasználók</span>
                <span style="font-size: 2rem; font-weight: 700; color: var(--primary-dark-blue);">{{ $stats['total_users'] }}</span>
            </div>
        </div>
    </div>

    <div class="card">
        <h3 style="color: var(--primary-blue); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
            <span style="font-size: 1.5rem;">⚡</span> Gyors műveletek
        </h3>
        <div style="display: flex; flex-direction: column; gap: 0.75rem;">
            <a href="/admin/cars/create" class="btn">+ Új autó hozzáadása</a>
            <a href="/admin/cars" class="btn-secondary btn">🚗 Autók kezelése</a>
            <a href="/admin/users" class="btn-outline btn">👥 Felhasználók kezelése</a>
            <a href="/rentals" class="btn-outline btn">📋 Bérlések megtekintése</a>
        </div>
    </div>
</div>

<div class="card" style="margin-top: 2rem;">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-blue);">Legutóbbi bérlések</h2>
    @if($recentRentals->isEmpty())
        <p style="color: var(--text-secondary); text-align: center; padding: 2rem;">Még nincs bérlés.</p>
    @else
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kép</th>
                    <th>Felhasználó</th>
                    <th>Autó</th>
                    <th>Kezdés</th>
                    <th>Befejezés</th>
                    <th>Összeg</th>
                    <th>Státusz</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentRentals as $rental)
                <tr>
                    <td>#{{ $rental->id }}</td>
                    <td>
                        <div style="width: 60px; height: 40px; border-radius: 8px; overflow: hidden; background: linear-gradient(135deg, rgba(0, 102, 255, 0.3), rgba(30, 64, 175, 0.3));">
                            @if($rental->car->image)
                                <img src="{{ $rental->car->image }}" alt="{{ $rental->car->brand }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                        </div>
                    </td>
                    <td>{{ $rental->user->name }}</td>
                    <td>{{ $rental->car->brand }} {{ $rental->car->model }}</td>
                    <td>{{ \Carbon\Carbon::parse($rental->start_date)->format('Y.m.d') }}</td>
                    <td>{{ \Carbon\Carbon::parse($rental->end_date)->format('Y.m.d') }}</td>
                    <td style="font-weight: 600; color: var(--primary-blue);">{{ number_format($rental->total_price, 0, ',', ' ') }} Ft</td>
                    <td>
                        @if($rental->status === 'active')
                            <span class="badge badge-success">Aktív</span>
                        @elseif($rental->status === 'completed')
                            <span class="badge" style="background: rgba(0, 102, 255, 0.2); border: 1px solid rgba(59, 130, 246, 0.4); color: var(--primary-blue);">Lezárt</span>
                        @else
                            <span class="badge badge-warning">{{ ucfirst($rental->status) }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="/cars/{{ $rental->car->id }}" class="btn-outline" style="padding: 0.5rem 1rem; font-size: 0.85rem; text-decoration: none;">Megtekintés</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
