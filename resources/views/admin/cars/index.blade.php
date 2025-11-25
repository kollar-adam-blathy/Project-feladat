@extends('layout')

@section('title', 'Autók kezelése - Admin')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h1 style="background: linear-gradient(135deg, var(--primary-cyan), var(--primary-blue)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Autók kezelése</h1>
    <a href="/admin/cars/create" class="btn">+ Új autó</a>
</div>

<div class="card">
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Kép</th>
                    <th>Márka</th>
                    <th>Modell</th>
                    <th>Évjárat</th>
                    <th>Váltó</th>
                    <th>Üzemanyag</th>
                    <th>Ár/nap</th>
                    <th>Státusz</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>
                        <div style="width: 80px; height: 60px; background: linear-gradient(135deg, var(--primary-cyan), var(--primary-blue)); border-radius: 12px; overflow: hidden;">
                            @if($car->image)
                                <img src="{{ $car->image }}" alt="{{ $car->brand }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                        </div>
                    </td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->transmission ?? 'N/A' }}</td>
                    <td>{{ $car->fuel_type ?? 'N/A' }}</td>
                    <td style="color: var(--primary-cyan); font-weight: 600;">{{ number_format($car->daily_price, 0, ',', ' ') }} Ft</td>
                    <td>
                        @if($car->available)
                            <span class="badge badge-success">Elérhető</span>
                        @else
                            <span class="badge badge-warning">Foglalt</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="/cars/{{ $car->id }}/edit" class="btn-outline btn" style="padding: 0.5rem 1rem; font-size: 0.85rem;">Szerkesztés</a>
                            <form action="/cars/{{ $car->id }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-secondary btn" style="padding: 0.5rem 1rem; font-size: 0.85rem;" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
