@extends('layout')

@section('title', 'Felhasználók kezelése - Admin')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h1>Felhasználók kezelése</h1>
    <button onclick="document.getElementById('createUserModal').style.display='flex'" class="btn">+ Új felhasználó</button>
</div>

@if(session('success'))
<div style="padding: 1rem; background: rgba(16, 185, 129, 0.2); border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 12px; margin-bottom: 2rem; color: #10b981;">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div style="padding: 1rem; background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.3); border-radius: 12px; margin-bottom: 2rem; color: #ef4444;">
    {{ session('error') }}
</div>
@endif

<div class="card">
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Név</th>
                    <th>Email</th>
                    <th>Telefonszám</th>
                    <th>Jogosultság</th>
                    <th>Regisztráció</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>
                        @if($user->is_admin)
                            <span class="badge badge-info">Admin</span>
                        @else
                            <span class="badge badge-success">Felhasználó</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('Y.m.d') }}</td>
                    <td>
                        <div style="display: flex; gap: 0.5rem;">
                            @if($user->email !== 'admin@admin')
                                <form action="/admin/users/{{ $user->id }}/toggle-admin" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn-outline" style="padding: 0.5rem 1rem; font-size: 0.85rem;">
                                        @if($user->is_admin)
                                            Admin eltávolítás
                                        @else
                                            Admin jogosultság
                                        @endif
                                    </button>
                                </form>
                                <form action="/admin/users/{{ $user->id }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-secondary" style="padding: 0.5rem 1rem; font-size: 0.85rem;" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
                                </form>
                            @else
                                <span style="color: var(--text-secondary); font-size: 0.85rem;">Főadmin - védett</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="createUserModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); backdrop-filter: blur(5px); z-index: 2000; align-items: center; justify-content: center;">
    <div class="card" style="max-width: 500px; width: 90%; margin: 2rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2>Új felhasználó létrehozása</h2>
            <button onclick="document.getElementById('createUserModal').style.display='none'" style="background: none; border: none; color: var(--text-secondary); font-size: 1.5rem; cursor: pointer;">&times;</button>
        </div>

        <form action="/admin/users" method="POST">
            @csrf
            <div class="form-group">
                <label>Név</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Jelszó</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Telefonszám</label>
                <input type="tel" name="phone">
            </div>

            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                    <input type="checkbox" name="is_admin" value="1" style="width: auto;">
                    <span>Admin jogosultság</span>
                </label>
            </div>

            <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                <button type="button" onclick="document.getElementById('createUserModal').style.display='none'" class="btn-outline btn">Mégse</button>
                <button type="submit" class="btn">Létrehozás</button>
            </div>
        </form>
    </div>
</div>
@endsection
