@extends('layout')

@section('title', 'Bérlés részletei')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Bérlés részletei</h1>
        <a href="/rentals" class="btn btn-secondary">Vissza</a>
    </div>
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <div>
            <div class="form-group">
                <label>Autó:</label>
                <p style="font-size: 1.1rem; color: #333;">{{ $rental->car->brand }} {{ $rental->car->model }}</p>
            </div>
            
            <div class="form-group">
                <label>Ügyfél:</label>
                <p style="font-size: 1.1rem; color: #333;">{{ $rental->customer->name }}</p>
            </div>
            
            <div class="form-group">
                <label>Kezdés dátuma:</label>
                <p style="font-size: 1.1rem; color: #333;">{{ $rental->start_date }}</p>
            </div>
        </div>
        
        <div>
            <div class="form-group">
                <label>Vége dátuma:</label>
                <p style="font-size: 1.1rem; color: #333;">{{ $rental->end_date }}</p>
            </div>
            
            <div class="form-group">
                <label>Összeg:</label>
                <p style="font-size: 1.1rem; color: #333;">{{ number_format($rental->total_price, 0, ',', ' ') }} Ft</p>
            </div>
            
            <div class="form-group">
                <label>Státusz:</label>
                <p>
                    @if($rental->status == 'active')
                        <span class="badge badge-success">Aktív</span>
                    @elseif($rental->status == 'completed')
                        <span class="badge badge-warning">Befejezett</span>
                    @else
                        <span class="badge badge-danger">Törölt</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
    
    <div style="margin-top: 2rem; display: flex; gap: 1rem;">
        <a href="/rentals/{{ $rental->id }}/edit" class="btn">Szerkesztés</a>
        <form action="/rentals/{{ $rental->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
        </form>
    </div>
</div>
@endsection
