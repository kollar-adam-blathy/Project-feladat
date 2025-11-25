@extends('layout')

@section('title', 'Ügyfél szerkesztése')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Ügyfél szerkesztése</h1>
        <a href="/customers" class="btn btn-secondary">Vissza</a>
    </div>
    
    <form action="/customers/{{ $customer->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Név:</label>
            <input type="text" id="name" name="name" value="{{ $customer->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $customer->email }}" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Telefon:</label>
            <input type="text" id="phone" name="phone" value="{{ $customer->phone }}" required>
        </div>
        
        <div class="form-group">
            <label for="driver_license">Jogosítvány szám:</label>
            <input type="text" id="driver_license" name="driver_license" value="{{ $customer->driver_license }}" required>
        </div>
        
        <button type="submit" class="btn">Mentés</button>
    </form>
</div>
@endsection
