@extends('layout')

@section('title', 'Bérlés szerkesztése')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Bérlés szerkesztése</h1>
        <a href="/rentals" class="btn btn-secondary">Vissza</a>
    </div>
    
    <form action="/rentals/{{ $rental->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="car_id">Autó:</label>
            <select id="car_id" name="car_id" required>
                @foreach($cars as $car)
                <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>
                    {{ $car->brand }} {{ $car->model }} ({{ $car->license_plate }})
                </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="customer_id">Ügyfél:</label>
            <select id="customer_id" name="customer_id" required>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $rental->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }} ({{ $customer->email }})
                </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="start_date">Kezdés dátuma:</label>
            <input type="date" id="start_date" name="start_date" value="{{ $rental->start_date }}" required>
        </div>
        
        <div class="form-group">
            <label for="end_date">Vége dátuma:</label>
            <input type="date" id="end_date" name="end_date" value="{{ $rental->end_date }}" required>
        </div>
        
        <div class="form-group">
            <label for="total_price">Összeg (Ft):</label>
            <input type="number" id="total_price" name="total_price" value="{{ $rental->total_price }}" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label for="status">Státusz:</label>
            <select id="status" name="status" required>
                <option value="active" {{ $rental->status == 'active' ? 'selected' : '' }}>Aktív</option>
                <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>Befejezett</option>
                <option value="cancelled" {{ $rental->status == 'cancelled' ? 'selected' : '' }}>Törölt</option>
            </select>
        </div>
        
        <button type="submit" class="btn">Mentés</button>
    </form>
</div>
@endsection
