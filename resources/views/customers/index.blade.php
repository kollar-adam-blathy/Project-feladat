@extends('layout')

@section('title', 'Ügyfelek')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Ügyfelek listája</h1>
        <a href="/customers/create" class="btn">Új ügyfél hozzáadása</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Név</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Jogosítvány</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->driver_license }}</td>
                <td class="actions">
                    <a href="/customers/{{ $customer->id }}" class="btn btn-secondary" style="padding: 0.5rem 1rem;">Részletek</a>
                    <a href="/customers/{{ $customer->id }}/edit" class="btn" style="padding: 0.5rem 1rem;">Szerkesztés</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
