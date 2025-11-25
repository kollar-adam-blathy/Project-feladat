@extends('layout')

@section('title', 'Új ügyfél')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Új ügyfél hozzáadása</h1>
        <a href="/customers" class="btn btn-secondary">Vissza</a>
    </div>
    
    <form action="/customers" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Név:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Telefon:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        
        <div class="form-group">
            <label for="driver_license">Jogosítvány szám:</label>
            <input type="text" id="driver_license" name="driver_license" required>
        </div>
        
        <button type="submit" class="btn">Mentés</button>
    </form>
</div>
@endsection
