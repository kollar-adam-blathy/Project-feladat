@extends('layout')

@section('title', 'Bérlések')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Bérlések listája</h1>
        <a href="/rentals/create" class="btn">Új bérlés létrehozása</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Autó</th>
                <th>Ügyfél</th>
                <th>Kezdés</th>
                <th>Vége</th>
                <th>Összeg</th>
                <th>Státusz</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
            <tr>
                <td>{{ $rental->car->brand }} {{ $rental->car->model }}</td>
                <td>{{ $rental->customer->name }}</td>
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
                <td>{{ number_format($rental->total_price, 0, ',', ' ') }} Ft</td>
                <td>
                    @if($rental->status == 'active')
                        <span class="badge badge-success">Aktív</span>
                    @elseif($rental->status == 'completed')
                        <span class="badge badge-warning">Befejezett</span>
                    @else
                        <span class="badge badge-danger">Törölt</span>
                    @endif
                </td>
                <td class="actions">
                    <a href="/rentals/{{ $rental->id }}" class="btn btn-secondary" style="padding: 0.5rem 1rem;">Részletek</a>
                    <a href="/rentals/{{ $rental->id }}/edit" class="btn" style="padding: 0.5rem 1rem;">Szerkesztés</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
