@extends('layout')

@section('title', 'Ügyfél részletei')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Ügyfél részletei</h1>
        <a href="/customers" class="btn btn-secondary">Vissza</a>
    </div>
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <div>
            <div class="form-group">
                <label>Név:</label>
                <p style="font-size: 1.1rem; color: #333;">{{ $customer->name }}</p>
            </div>
            
            <div class="form-group">
                <label>Email:</label>
                <p style="font-size: 1.1rem; color: #333;">{{ $customer->email }}</p>
            </div>
        </div>
        
        <div>
            <div class="form-group">
                <label>Telefon:</label>
                <p style="font-size: 1.1rem; color: #333;">{{ $customer->phone }}</p>
            </div>
            
            <div class="form-group">
                <label>Jogosítvány szám:</label>
                <p style="font-size: 1.1rem; color: #333;">{{ $customer->driver_license }}</p>
            </div>
        </div>
    </div>
    
    <div style="margin-top: 2rem; display: flex; gap: 1rem;">
        <a href="/customers/{{ $customer->id }}/edit" class="btn">Szerkesztés</a>
        <form action="/customers/{{ $customer->id }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
        </form>
    </div>
</div>
@endsection
