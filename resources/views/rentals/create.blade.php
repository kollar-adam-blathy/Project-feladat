@extends('layout')

@section('title', 'Új bérlés')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Új bérlés létrehozása</h1>
        <a href="/rentals" class="btn btn-secondary">Vissza</a>
    </div>
    
    <form action="/rentals" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="car_id">Autó:</label>
            <select id="car_id" name="car_id" required>
                <option value="">Válassz autót</option>
                @foreach($cars as $car)
                <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }} ({{ $car->license_plate }})</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="customer_id">Ügyfél:</label>
            <select id="customer_id" name="customer_id" required>
                <option value="">Válassz ügyfelet</option>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->email }})</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="start_date">Kezdés dátuma:</label>
            <input type="date" id="start_date" name="start_date" required>
        </div>
        
        <div class="form-group">
            <label for="end_date">Vége dátuma:</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>
        
        <div class="form-group">
            <label for="total_price">Összeg (Ft):</label>
            <input type="number" id="total_price" name="total_price" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label for="status">Státusz:</label>
            <select id="status" name="status" required>
                <option value="active">Aktív</option>
                <option value="completed">Befejezett</option>
                <option value="cancelled">Törölt</option>
            </select>
        </div>
        
        <button type="submit" class="btn">Mentés</button>
    </form>
</div>
@endsection
