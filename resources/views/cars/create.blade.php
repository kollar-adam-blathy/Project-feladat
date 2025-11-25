@extends('layout')

@section('title', 'Új autó')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Új autó hozzáadása</h1>
        <a href="/cars" class="btn btn-secondary">Vissza</a>
    </div>
    
    <form action="/cars" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="brand">Márka:</label>
            <input type="text" id="brand" name="brand" required>
        </div>
        
        <div class="form-group">
            <label for="model">Modell:</label>
            <input type="text" id="model" name="model" required>
        </div>
        
        <div class="form-group">
            <label for="year">Évjárat:</label>
            <input type="number" id="year" name="year" min="1990" max="2025" required>
        </div>
        
        <div class="form-group">
            <label for="license_plate">Rendszám:</label>
            <input type="text" id="license_plate" name="license_plate" required>
        </div>
        
        <div class="form-group">
            <label for="image">Kép URL:</label>
            <input type="text" id="image" name="image" placeholder="https://...">
        </div>
        
        <div class="form-group">
            <label for="daily_price">Napi ár (Ft):</label>
            <input type="number" id="daily_price" name="daily_price" step="0.01" required>
        </div>
        
        <div class="form-group">
            <label for="available">Elérhető:</label>
            <select id="available" name="available">
                <option value="1">Igen</option>
                <option value="0">Nem</option>
            </select>
        </div>
        
        <button type="submit" class="btn">Mentés</button>
    </form>
</div>
@endsection
