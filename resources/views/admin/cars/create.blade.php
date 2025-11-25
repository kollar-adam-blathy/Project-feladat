@extends('layout')

@section('title', 'Új autó hozzáadása')

@section('content')
<div style="max-width: 800px; margin: 0 auto;">
    <h1 style="margin-bottom: 2rem;">Új autó hozzáadása</h1>
    
    <div class="card">
        <form action="/admin/cars" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid" style="grid-template-columns: 1fr 1fr;">
                <div class="form-group">
                    <label>Márka</label>
                    <input type="text" name="brand" required placeholder="pl. BMW">
                </div>

                <div class="form-group">
                    <label>Modell</label>
                    <input type="text" name="model" required placeholder="pl. X5">
                </div>
            </div>

            <div class="grid" style="grid-template-columns: 1fr 1fr;">
                <div class="form-group">
                    <label>Évjárat</label>
                    <input type="number" name="year" required min="2000" max="2025" placeholder="2023">
                </div>

                <div class="form-group">
                    <label>Rendszám</label>
                    <input type="text" name="license_plate" required placeholder="ABC-123">
                </div>
            </div>

            <div class="grid" style="grid-template-columns: 1fr 1fr;">
                <div class="form-group">
                    <label>Váltó típusa</label>
                    <select name="transmission" required>
                        <option value="">Válassz...</option>
                        <option value="manual">Manuális</option>
                        <option value="automatic">Automata</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Üzemanyag típusa</label>
                    <select name="fuel_type" required>
                        <option value="">Válassz...</option>
                        <option value="petrol">Benzin</option>
                        <option value="diesel">Dízel</option>
                        <option value="electric">Elektromos</option>
                        <option value="hybrid">Hibrid</option>
                    </select>
                </div>
            </div>

            <div class="grid" style="grid-template-columns: 1fr 1fr;">
                <div class="form-group">
                    <label>Napi ár (Ft)</label>
                    <input type="number" name="daily_rate" required min="0" placeholder="15000">
                </div>

                <div class="form-group">
                    <label>Férőhelyek száma</label>
                    <input type="number" name="seats" required min="2" max="9" placeholder="5">
                </div>
            </div>

            <div class="form-group">
                <label>Szín</label>
                <input type="text" name="color" required placeholder="pl. Fekete">
            </div>

            <div class="form-group">
                <label>Kilométeróra állása</label>
                <input type="number" name="mileage" required min="0" placeholder="25000">
            </div>

            <div class="form-group">
                <label>Kép feltöltése</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div class="form-group">
                <label>Leírás</label>
                <textarea name="description" rows="4" placeholder="Rövid leírás az autóról..."></textarea>
            </div>

            <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
                <a href="/admin/cars" class="btn-outline btn">Mégse</a>
                <button type="submit" class="btn">Mentés</button>
            </div>
        </form>
    </div>
</div>
@endsection
